<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Poli;
use App\Models\Queue;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_doctors' => Doctor::count(),
            'total_polis' => Poli::count(),
            'total_queues' => Queue::count(),
            'today_queues' => Queue::whereDate('visit_date', today())->count(),
            'waiting_queues' => Queue::where('status', 'WAITING')->whereDate('visit_date', today())->count(),
            'called_queues' => Queue::where('status', 'CALLED')->whereDate('visit_date', today())->count(),
            'done_queues' => Queue::where('status', 'DONE')->whereDate('visit_date', today())->count(),
            'canceled_queues' => Queue::where('status', 'CANCELED')->whereDate('visit_date', today())->count(),
        ];

        // Recent queues today
        $recentQueues = Queue::with(['user', 'doctor.poli'])
            ->whereDate('visit_date', today())
            ->latest()
            ->limit(5)
            ->get();

        // Today's doctor schedule
        $todaySchedule = Doctor::with(['poli'])
            ->where('schedule_day', now()->format('l')) // Monday, Tuesday, etc.
            ->withCount(['queues' => function ($query) {
                $query->whereDate('visit_date', today());
            }])
            ->get();

        return view('pages.admin.dashboard', compact('stats', 'recentQueues', 'todaySchedule'));
    }

    public function patients()
    {
        $patients = User::where('role', 'user')
            ->withCount('queues')
            ->latest()
            ->paginate(10);

        $stats = [
            'total_patients' => User::where('role', 'user')->count(),
            'active_patients' => User::where('role', 'user')->whereHas('queues', function ($q) {
                $q->whereDate('visit_date', '>=', now()->subDays(30));
            })->count(),
        ];

        return view('pages.admin.pasien.index', compact('patients', 'stats'));
    }

    public function createPatient()
    {
        return view('pages.admin.pasien.create');
    }

    public function storePatient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $validated['role'] = 'user';
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin.patients')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function editPatient(User $patient)
    {
        // Ensure we're only editing users with 'user' role
        if ($patient->role !== 'user') {
            abort(404);
        }

        return view('pages.admin.pasien.edit', compact('patient'));
    }

    public function updatePatient(Request $request, User $patient)
    {
        // Ensure we're only updating users with 'user' role
        if ($patient->role !== 'user') {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $patient->update($validated);

        return redirect()->route('admin.patients')->with('success', 'Data pasien berhasil diperbarui');
    }

    public function destroyPatient(User $patient)
    {
        // Ensure we're only deleting users with 'user' role
        if ($patient->role !== 'user') {
            abort(404);
        }

        if ($patient->queues()->count() > 0) {
            return redirect()->route('admin.patients')->with('error', 'Tidak dapat menghapus pasien yang masih memiliki riwayat antrian');
        }

        $patient->delete();

        return redirect()->route('admin.patients')->with('success', 'Pasien berhasil dihapus');
    }

    public function profile()
    {
        $admin = auth()->user();
        return view('pages.admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $admin->update($validated);

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
