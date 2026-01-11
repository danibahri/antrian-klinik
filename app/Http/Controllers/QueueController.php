<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Queue;

class QueueController extends Controller
{
    public function queues(Request $request)
    {
        // Set default date to today if not provided
        $filterDate = $request->filled('date') ? $request->date : date('Y-m-d');

        $query = Queue::with(['user', 'doctor.poli']);

        // Filter by date
        $query->whereDate('visit_date', $filterDate);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by poli
        if ($request->filled('poli')) {
            $query->whereHas('doctor', function ($q) use ($request) {
                $q->where('poli_id', $request->poli);
            });
        }

        // Search by patient name
        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Order by queue number first (most important for same date)
        $queues = $query->orderBy('queue_number', 'asc')
            ->orderBy('created_at', 'asc')
            ->paginate(15)
            ->withQueryString();

        // Get statistics for the filtered date
        $stats = [
            'waiting' => Queue::where('status', 'WAITING')->whereDate('visit_date', $filterDate)->count(),
            'called' => Queue::where('status', 'CALLED')->whereDate('visit_date', $filterDate)->count(),
            'done' => Queue::where('status', 'DONE')->whereDate('visit_date', $filterDate)->count(),
            'canceled' => Queue::where('status', 'CANCELED')->whereDate('visit_date', $filterDate)->count(),
        ];

        // Get all polis for filter dropdown
        $polis = \App\Models\Poli::all();

        return view('pages.admin.queues.index', compact('queues', 'stats', 'polis'));
    }

    public function callQueue(Queue $queue)
    {
        try {
            \Illuminate\Support\Facades\DB::transaction(function () use ($queue) {
                // Lock the queue to prevent concurrent updates
                $lockedQueue = Queue::where('id', $queue->id)->lockForUpdate()->first();

                if ($lockedQueue && $lockedQueue->status === 'WAITING') {
                    $lockedQueue->update([
                        'status' => 'CALLED',
                        'called_at' => now(),
                    ]);
                } else {
                    throw new \Exception('Antrian tidak dapat dipanggil');
                }
            });

            return redirect()->back()->with('success', 'Antrian berhasil dipanggil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function completeQueue(Queue $queue)
    {
        try {
            \Illuminate\Support\Facades\DB::transaction(function () use ($queue) {
                // Lock the queue to prevent concurrent updates
                $lockedQueue = Queue::where('id', $queue->id)->lockForUpdate()->first();

                if ($lockedQueue && in_array($lockedQueue->status, ['WAITING', 'CALLED'])) {
                    $lockedQueue->update([
                        'status' => 'DONE',
                        'completed_at' => now(),
                    ]);
                } else {
                    throw new \Exception('Antrian tidak dapat diselesaikan');
                }
            });

            return redirect()->back()->with('success', 'Antrian berhasil diselesaikan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function cancelQueue(Queue $queue)
    {
        try {
            \Illuminate\Support\Facades\DB::transaction(function () use ($queue) {
                // Lock the queue to prevent concurrent updates
                $lockedQueue = Queue::where('id', $queue->id)->lockForUpdate()->first();

                if ($lockedQueue && $lockedQueue->status === 'WAITING') {
                    $lockedQueue->update([
                        'status' => 'CANCELED',
                        'canceled_at' => now(),
                    ]);
                } else {
                    throw new \Exception('Antrian tidak dapat dibatalkan');
                }
            });

            return redirect()->back()->with('success', 'Antrian berhasil dibatalkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function callNextQueue()
    {
        try {
            // Use transaction with locking to prevent race condition
            $nextQueue = \Illuminate\Support\Facades\DB::transaction(function () {
                // Get the next waiting queue for today with locking
                $queue = Queue::where('status', 'WAITING')
                    ->whereDate('visit_date', today())
                    ->orderBy('queue_number', 'asc')
                    ->orderBy('created_at', 'asc')
                    ->lockForUpdate()
                    ->first();

                if ($queue) {
                    $queue->update([
                        'status' => 'CALLED',
                        'called_at' => now(),
                    ]);
                }

                return $queue;
            });

            if ($nextQueue) {
                $doctorName = $nextQueue->doctor->name ?? 'Dokter';
                $patientName = $nextQueue->user->name ?? 'Pasien';

                return redirect()->back()->with('success', "Antrian nomor {$nextQueue->queue_number} ({$patientName} - {$doctorName}) berhasil dipanggil");
            }

            return redirect()->back()->with('error', 'Tidak ada antrian yang menunggu untuk hari ini');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
