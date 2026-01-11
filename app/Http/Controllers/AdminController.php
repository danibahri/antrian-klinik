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
}
