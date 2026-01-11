@extends('layouts.app')

@section('title', 'Kelola Dokter')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">
            {{-- Header --}}
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Kelola Dokter</h1>
                    <p class="mt-1 text-sm text-gray-600">Manajemen data dokter dan jadwal praktik</p>
                </div>
                <a href="{{ route('admin.doctors.create') }}"
                    class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Dokter
                </a>
            </div>

            {{-- Alert Messages --}}
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-3 text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Stats --}}
            <div class="mb-6 grid gap-4 sm:grid-cols-2">
                <div class="rounded-lg border border-gray-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Dokter</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['total_doctors'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-50">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Dokter Aktif</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['active_doctors'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Doctors Table --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Nama Dokter
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Poli
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Spesialisasi
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Jadwal Praktik
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Kontak
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($doctors as $doctor)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="bg-{{ ['emerald', 'blue', 'purple', 'orange'][$loop->index % 4] }}-100 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full">
                                                <svg class="text-{{ ['emerald', 'blue', 'purple', 'orange'][$loop->index % 4] }}-600 h-5 w-5"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{ $doctor->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                            {{ $doctor->poli->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $doctor->specialization ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $doctor->schedule_day }}</div>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($doctor->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($doctor->end_time)->format('H:i') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $doctor->phone ?? '-' }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.doctors.edit', $doctor) }}"
                                                class="inline-flex items-center gap-x-1 rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                                <svg class="h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <button type="button" data-hs-overlay="#deleteModalDoctor{{ $doctor->id }}"
                                                class="inline-flex items-center gap-x-1 rounded-lg border border-red-300 bg-white px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50">
                                                <svg class="h-3 w-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>

                                            {{-- Hidden Delete Form --}}
                                            <form id="delete-form-deleteModalDoctor{{ $doctor->id }}" method="POST"
                                                action="{{ route('admin.doctors.destroy', $doctor) }}" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            {{-- Delete Modal --}}
                                            <x-modal-delete id="deleteModalDoctor{{ $doctor->id }}"
                                                title="Hapus Dokter"
                                                message="Apakah Anda yakin ingin menghapus dokter {{ $doctor->name }}? Data yang sudah dihapus tidak dapat dikembalikan." />
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <p class="mt-4 text-sm font-medium text-gray-900">Belum ada data dokter</p>
                                            <p class="mt-1 text-sm text-gray-500">Tambahkan dokter untuk memulai</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="border-t border-gray-200 bg-white px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan <span class="font-semibold">{{ $doctors->firstItem() ?? 0 }}</span> sampai
                            <span class="font-semibold">{{ $doctors->lastItem() ?? 0 }}</span> dari
                            <span class="font-semibold">{{ $doctors->total() }}</span> data
                        </div>
                        <div>
                            {{ $doctors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
