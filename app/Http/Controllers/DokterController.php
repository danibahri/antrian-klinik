<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Poli;

class DokterController extends Controller
{
    public function doctors()
    {
        $doctors = Doctor::with('poli')->latest()->paginate(15);
        $stats = [
            'total_doctors' => Doctor::count(),
            'active_doctors' => Doctor::count(),
        ];
        return view('pages.admin.dokter.index', compact('doctors', 'stats'));
    }

    public function create()
    {
        $polis = Poli::all();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('pages.admin.dokter.create', compact('polis', 'days'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'poli_id' => 'required|exists:polis,id',
            'schedule_day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'specialization' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Doctor::create($validated);

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil ditambahkan');
    }

    public function edit(Doctor $doctor)
    {
        $polis = Poli::all();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        return view('pages.admin.dokter.edit', compact('doctor', 'polis', 'days'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'poli_id' => 'required|exists:polis,id',
            'schedule_day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'specialization' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $doctor->update($validated);

        return redirect()->route('admin.doctors')->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil dihapus');
    }
}
