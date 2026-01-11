@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">
            {{-- Stats Cards --}}
            <div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Total Patients --}}
                <div class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">Total Pasien</p>
                            <div class="mt-2 flex items-baseline gap-2">
                                <h3 class="text-3xl font-bold text-gray-900">{{ $stats['total_users'] }}</h3>
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-700">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                    12%
                                </span>
                            </div>
                        </div>
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100 transition group-hover:scale-110">
                            <svg class="h-7 w-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span>Terdaftar bulan ini: <span class="font-semibold text-emerald-600">+23</span></span>
                    </div>
                </div>

                {{-- Total Doctors --}}
                <div class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">Total Dokter</p>
                            <div class="mt-2 flex items-baseline gap-2">
                                <h3 class="text-3xl font-bold text-gray-900">{{ $stats['total_doctors'] }}</h3>
                            </div>
                        </div>
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-100 transition group-hover:scale-110">
                            <svg class="h-7 w-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Aktif praktek: <span
                                class="font-semibold text-emerald-600">{{ $stats['total_doctors'] }}</span></span>
                    </div>
                </div>

                {{-- Total Poli --}}
                <div class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">Total Poli</p>
                            <div class="mt-2 flex items-baseline gap-2">
                                <h3 class="text-3xl font-bold text-gray-900">{{ $stats['total_polis'] }}</h3>
                            </div>
                        </div>
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-xl bg-purple-100 transition group-hover:scale-110">
                            <svg class="h-7 w-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Semua beroperasi</span>
                    </div>
                </div>

                {{-- Today Queues --}}
                <div class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500">Antrian Hari Ini</p>
                            <div class="mt-2 flex items-baseline gap-2">
                                <h3 class="text-3xl font-bold text-gray-900">{{ $stats['today_queues'] }}</h3>
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-700">
                                    Live
                                </span>
                            </div>
                        </div>
                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-xl bg-orange-100 transition group-hover:scale-110">
                            <svg class="h-7 w-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Total seluruh: <span
                                class="font-semibold text-orange-600">{{ $stats['total_queues'] }}</span></span>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                {{-- Left Section - Tables --}}
                <div class="space-y-6 lg:col-span-2">
                    {{-- Recent Queues --}}
                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900">Antrian Terbaru</h2>
                                    <p class="mt-1 text-sm text-gray-500">Daftar pasien hari ini</p>
                                </div>
                                <a href="{{ route('admin.queues') }}"
                                    class="inline-flex items-center gap-x-1 text-sm font-medium text-emerald-600 hover:text-emerald-700">
                                    Lihat Semua
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            Pasien
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            Dokter
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            No. Antrian
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse($recentQueues as $queue)
                                        <tr class="hover:bg-gray-50">
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-{{ ['blue', 'purple', 'green', 'orange', 'pink'][$loop->index % 5] }}-100 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full">
                                                        <span
                                                            class="text-{{ ['blue', 'purple', 'green', 'orange', 'pink'][$loop->index % 5] }}-700 text-sm font-semibold">
                                                            {{ strtoupper(substr($queue->user->name, 0, 2)) }}
                                                        </span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $queue->user->name }}</div>
                                                        <div class="text-xs text-gray-500">
                                                            {{ $queue->user->phone ?? '-' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="text-sm text-gray-900">{{ $queue->doctor->name ?? '-' }}</div>
                                                <div class="text-xs text-gray-500">{{ $queue->doctor->poli->name ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="text-base font-bold text-gray-900">
                                                    {{ $queue->queue_number ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <span
                                                    class="bg-{{ $queue->status_color }}-100 text-{{ $queue->status_color }}-800 inline-flex rounded-full px-3 py-1 text-xs font-semibold">
                                                    {{ $queue->status_label }}
                                                </span>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                                @if ($queue->status === 'WAITING')
                                                    <form method="POST"
                                                        action="{{ route('admin.queues.call', $queue) }}" class="inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-emerald-600 hover:text-emerald-900">Panggil</button>
                                                    </form>
                                                @elseif($queue->status === 'CALLED')
                                                    <form method="POST"
                                                        action="{{ route('admin.queues.complete', $queue) }}"
                                                        class="inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-green-600 hover:text-green-900">Selesai</button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">
                                                Belum ada antrian hari ini
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Doctor Schedule --}}
                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900">Jadwal Dokter Hari Ini</h2>
                                    <p class="mt-1 text-sm text-gray-500">{{ now()->isoFormat('dddd, D MMMM Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4">
                                @forelse($todaySchedule as $doctor)
                                    <div
                                        class="flex items-center justify-between rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="bg-{{ ['emerald', 'blue', 'purple', 'orange'][$loop->index % 4] }}-100 flex h-12 w-12 items-center justify-center rounded-full">
                                                <svg class="text-{{ ['emerald', 'blue', 'purple', 'orange'][$loop->index % 4] }}-600 h-6 w-6"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">{{ $doctor->name }}</h3>
                                                <p class="text-sm text-gray-500">{{ $doctor->poli->name }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ \Carbon\Carbon::parse($doctor->start_time)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($doctor->end_time)->format('H:i') }}
                                            </p>
                                            <p class="text-xs text-gray-500">{{ $doctor->queues_count }} pasien</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="rounded-lg border border-gray-200 p-8 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-500">Tidak ada dokter praktik hari ini</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Section - Sidebar --}}
                <div class="space-y-6 lg:col-span-1">
                    {{-- Quick Stats --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="mb-4 text-lg font-bold text-gray-900">Status Antrian</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-100">
                                        <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Menunggu</p>
                                        <p class="text-xs text-gray-500">Waiting</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900">{{ $stats['waiting_queues'] }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Dipanggil</p>
                                        <p class="text-xs text-gray-500">Called</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900">{{ $stats['called_queues'] }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100">
                                        <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Selesai</p>
                                        <p class="text-xs text-gray-500">Done</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900">{{ $stats['done_queues'] }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100">
                                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Dibatalkan</p>
                                        <p class="text-xs text-gray-500">Canceled</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900">{{ $stats['canceled_queues'] }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Actions --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="mb-4 text-lg font-bold text-gray-900">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.patients') }}"
                                class="flex w-full items-center gap-3 rounded-lg border border-gray-200 p-3 text-left hover:border-emerald-500 hover:bg-emerald-50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Kelola Pasien</p>
                                    <p class="text-xs text-gray-500">Lihat & edit data</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.queues') }}"
                                class="flex w-full items-center gap-3 rounded-lg border border-gray-200 p-3 text-left hover:border-blue-500 hover:bg-blue-50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Kelola Antrian</p>
                                    <p class="text-xs text-gray-500">Lihat semua</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.doctors') }}"
                                class="flex w-full items-center gap-3 rounded-lg border border-gray-200 p-3 text-left hover:border-purple-500 hover:bg-purple-50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100">
                                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Kelola Dokter</p>
                                    <p class="text-xs text-gray-500">Jadwal & data</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- Alert Card --}}
                    <div class="rounded-xl bg-gradient-to-br from-emerald-600 to-teal-600 p-6 text-white shadow-sm">
                        <div class="mb-4 flex items-center gap-2">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="font-bold">Pengingat</h3>
                        </div>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start gap-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Backup database dilakukan setiap hari pukul 23:00</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Periksa jadwal dokter setiap minggu</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Update sistem keamanan bulanan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
