<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;

class QueueController extends Controller
{
    public function queues(Request $request)
    {
        $query = Queue::with(['user', 'doctor.poli']);

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('visit_date', $request->date);
        }

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

        $queues = $query->latest('visit_date')
            ->latest('created_at')
            ->paginate(15)
            ->withQueryString();

        $stats = [
            'waiting' => Queue::where('status', 'WAITING')->count(),
            'called' => Queue::where('status', 'CALLED')->count(),
            'done' => Queue::where('status', 'DONE')->count(),
            'canceled' => Queue::where('status', 'CANCELED')->count(),
        ];

        // Get all polis for filter dropdown
        $polis = \App\Models\Poli::all();

        return view('pages.admin.queues.index', compact('queues', 'stats', 'polis'));
    }

    public function callQueue(Queue $queue)
    {
        if ($queue->status === 'WAITING') {
            $queue->update([
                'status' => 'CALLED',
                'called_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Antrian berhasil dipanggil');
        }

        return redirect()->back()->with('error', 'Antrian tidak dapat dipanggil');
    }

    public function completeQueue(Queue $queue)
    {
        if (in_array($queue->status, ['WAITING', 'CALLED'])) {
            $queue->update([
                'status' => 'DONE',
                'completed_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Antrian berhasil diselesaikan');
        }

        return redirect()->back()->with('error', 'Antrian tidak dapat diselesaikan');
    }

    public function cancelQueue(Queue $queue)
    {
        if ($queue->status === 'WAITING') {
            $queue->update([
                'status' => 'CANCELED',
                'canceled_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Antrian berhasil dibatalkan');
        }

        return redirect()->back()->with('error', 'Antrian tidak dapat dibatalkan');
    }

    public function callNextQueue()
    {
        $nextQueue = Queue::where('status', 'WAITING')
            ->whereDate('visit_date', today())
            ->orderBy('queue_number')
            ->first();

        if ($nextQueue) {
            $nextQueue->update([
                'status' => 'CALLED',
                'called_at' => now(),
            ]);
            return redirect()->back()->with('success', "Antrian {$nextQueue->queue_number} berhasil dipanggil");
        }

        return redirect()->back()->with('error', 'Tidak ada antrian yang menunggu');
    }
}
