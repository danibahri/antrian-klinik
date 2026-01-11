<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Doctor;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Get user statistics
        $stats = [
            'total_visits' => $user->queues()->count(),
            'active_queues' => $user->queues()->where('status', 'WAITING')->count(),
            'completed' => $user->queues()->where('status', 'DONE')->count(),
            'completed_this_month' => $user->queues()
                ->where('status', 'DONE')
                ->whereMonth('visit_date', now()->month)
                ->whereYear('visit_date', now()->year)
                ->count(),
            'canceled' => $user->queues()->where('status', 'CANCELED')->count(),
        ];

        // Get recent queues (last 10)
        $recentQueues = $user->queues()
            ->with(['doctor.poli'])
            ->orderBy('visit_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Get all polis for registration form
        $polis = Poli::orderBy('name')->get();

        return view('pages.user', compact('stats', 'recentQueues', 'polis'));
    }

    public function getDoctorsByPoli($poliId)
    {
        $doctors = Doctor::where('poli_id', $poliId)
            ->orderBy('name')
            ->get(['id', 'name', 'schedule_day', 'start_time', 'end_time', 'specialization']);

        return response()->json($doctors);
    }

    public function storeQueue(Request $request)
    {
        $user = Auth::user();

        // Validation
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'visit_date' => 'required|date|after_or_equal:today',
            'complaint' => 'required|string|min:10|max:500',
        ], [
            'doctor_id.required' => 'Dokter harus dipilih',
            'doctor_id.exists' => 'Dokter tidak valid',
            'visit_date.required' => 'Tanggal kunjungan harus diisi',
            'visit_date.after_or_equal' => 'Tanggal kunjungan tidak boleh kurang dari hari ini',
            'complaint.required' => 'Keluhan harus diisi',
            'complaint.min' => 'Keluhan minimal 10 karakter',
            'complaint.max' => 'Keluhan maksimal 500 karakter',
        ]);

        $doctor = Doctor::findOrFail($validated['doctor_id']);
        $visitDate = $validated['visit_date'];

        // Use database transaction to prevent race condition
        try {
            $queue = DB::transaction(function () use ($user, $doctor, $visitDate, $validated) {
                // Check if user already has queue for this doctor on this date (with locking)
                $existingQueue = Queue::where('user_id', $user->id)
                    ->where('doctor_id', $doctor->id)
                    ->whereDate('visit_date', $visitDate)
                    ->whereIn('status', ['WAITING', 'CALLED'])
                    ->lockForUpdate()
                    ->first();

                if ($existingQueue) {
                    throw new \Exception('Anda sudah mendaftar ke dokter ini pada tanggal yang sama');
                }

                // Check maximum queue per doctor per day (20) - only count active queues
                $queueCount = Queue::where('doctor_id', $doctor->id)
                    ->whereDate('visit_date', $visitDate)
                    ->whereIn('status', ['WAITING', 'CALLED'])
                    ->lockForUpdate()
                    ->count();

                if ($queueCount >= 20) {
                    throw new \Exception('Kuota antrian dokter ini sudah penuh untuk tanggal tersebut (maksimal 20 antrian)');
                }

                // Generate queue number (auto increment per doctor per date)
                // Get the last queue number for this doctor and date (from ALL statuses)
                $lastQueue = Queue::where('doctor_id', $doctor->id)
                    ->whereDate('visit_date', $visitDate)
                    ->lockForUpdate()
                    ->orderBy('queue_number', 'desc')
                    ->first();

                $queueNumber = $lastQueue ? $lastQueue->queue_number + 1 : 1;

                // Create queue
                $queue = Queue::create([
                    'user_id' => $user->id,
                    'doctor_id' => $doctor->id,
                    'visit_date' => $visitDate,
                    'queue_number' => $queueNumber,
                    'complaint' => $validated['complaint'],
                    'status' => 'WAITING',
                ]);

                return $queue;
            });

            return redirect()->route('user.dashboard')
                ->with('success', 'Pendaftaran antrian berhasil! Nomor antrian Anda: ' . $queue->queue_number);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }

    public function cancelQueue($queueId)
    {
        $user = Auth::user();

        try {
            DB::transaction(function () use ($queueId, $user) {
                // Lock the queue to prevent concurrent updates
                $queue = Queue::where('id', $queueId)
                    ->where('user_id', $user->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // Only allow cancel if status is WAITING
                if ($queue->status !== 'WAITING') {
                    throw new \Exception('Antrian hanya dapat dibatalkan jika statusnya masih WAITING');
                }

                // Update queue status to CANCELED
                $queue->update([
                    'status' => 'CANCELED',
                    'canceled_at' => now(),
                ]);
            });

            return redirect()->route('user.dashboard')
                ->with('success', 'Antrian berhasil dibatalkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('pages.user-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('user.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function allQueues()
    {
        $user = Auth::user();

        // Get all queues with pagination
        $queues = $user->queues()
            ->with(['doctor.poli'])
            ->orderBy('visit_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Get statistics
        $stats = [
            'total' => $user->queues()->count(),
            'waiting' => $user->queues()->where('status', 'WAITING')->count(),
            'called' => $user->queues()->where('status', 'CALLED')->count(),
            'done' => $user->queues()->where('status', 'DONE')->count(),
            'canceled' => $user->queues()->where('status', 'CANCELED')->count(),
        ];

        return view('pages.user-queues', compact('queues', 'stats'));
    }
}
