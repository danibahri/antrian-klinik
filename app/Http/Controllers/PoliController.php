<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli;

class PoliController extends Controller
{
    public function polis()
    {
        $polis = Poli::withCount('doctors')->paginate(10);

        $stats = [
            'total_polis' => Poli::count(),
            'total_doctors' => \App\Models\Doctor::count(),
        ];

        return view('pages.admin.poli.index', compact('polis', 'stats'));
    }

    public function create()
    {
        return view('pages.admin.poli.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:polis,name',
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Nama poli wajib diisi',
            'name.unique' => 'Nama poli sudah digunakan',
            'name.max' => 'Nama poli maksimal 255 karakter',
            'description.max' => 'Deskripsi maksimal 1000 karakter',
        ]);

        Poli::create($validated);

        return redirect()->route('admin.polis')->with('success', 'Poli berhasil ditambahkan');
    }

    public function edit(Poli $poli)
    {
        return view('pages.admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, Poli $poli)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:polis,name,' . $poli->id,
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Nama poli wajib diisi',
            'name.unique' => 'Nama poli sudah digunakan',
            'name.max' => 'Nama poli maksimal 255 karakter',
            'description.max' => 'Deskripsi maksimal 1000 karakter',
        ]);

        $poli->update($validated);

        return redirect()->route('admin.polis')->with('success', 'Poli berhasil diperbarui');
    }

    public function destroy(Poli $poli)
    {
        if ($poli->doctors()->count() > 0) {
            return redirect()->route('admin.polis')->with('error', 'Tidak dapat menghapus poli yang masih memiliki dokter');
        }

        $poli->delete();

        return redirect()->route('admin.polis')->with('success', 'Poli berhasil dihapus');
    }
}
