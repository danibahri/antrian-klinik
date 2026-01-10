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
            'today_queues' => Queue::whereDate('created_at', today())->count(),
        ];

        return view('pages.admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->paginate(15);
        return view('pages.admin.users', compact('users'));
    }

    public function doctors()
    {
        $doctors = Doctor::with('poli')->paginate(15);
        return view('pages.admin.doctors', compact('doctors'));
    }

    public function polis()
    {
        $polis = Poli::withCount('doctors')->paginate(15);
        return view('pages.admin.polis', compact('polis'));
    }

    public function queues()
    {
        $queues = Queue::with(['user', 'doctor', 'poli'])->latest()->paginate(15);
        return view('pages.admin.queues', compact('queues'));
    }
}
