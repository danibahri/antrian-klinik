@extends('layouts.app')

@section('title', 'Kelola Antrian')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">
            {{-- Header --}}
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Kelola Antrian</h1>
                    <p class="mt-1 text-sm text-gray-600">Daftar semua antrian pasien</p>
                </div>
                <form method="POST" action="{{ route('admin.queues.call-next') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 focus:bg-emerald-700 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        Panggil Berikutnya
                    </button>
                </form>
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

            @if (session('error'))
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <p class="ml-3 text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            {{-- Stats Summary --}}
            <div class="mb-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-gray-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Menunggu</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['waiting'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-50">
                            <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Dipanggil</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['called'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Selesai</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['done'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-50">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Dibatalkan</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['canceled'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-red-50">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filters --}}
            <form method="GET" action="{{ route('admin.queues') }}"
                class="mb-6 rounded-lg border border-gray-200 bg-white p-4">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <label for="filter-date" class="mb-2 block text-sm font-medium text-gray-900">
                            Tanggal
                        </label>
                        <input type="date" id="filter-date" name="date"
                            class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                            value="{{ request('date', date('Y-m-d')) }}">
                    </div>

                    <div>
                        <label for="filter-status" class="mb-2 block text-sm font-medium text-gray-900">
                            Status
                        </label>
                        <select id="filter-status" name="status"
                            class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="">Semua Status</option>
                            <option value="WAITING" {{ request('status') === 'WAITING' ? 'selected' : '' }}>Menunggu
                            </option>
                            <option value="CALLED" {{ request('status') === 'CALLED' ? 'selected' : '' }}>Dipanggil
                            </option>
                            <option value="DONE" {{ request('status') === 'DONE' ? 'selected' : '' }}>Selesai</option>
                            <option value="CANCELED" {{ request('status') === 'CANCELED' ? 'selected' : '' }}>Dibatalkan
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="filter-poli" class="mb-2 block text-sm font-medium text-gray-900">
                            Poli
                        </label>
                        <select id="filter-poli" name="poli"
                            class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="">Semua Poli</option>
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}" {{ request('poli') == $poli->id ? 'selected' : '' }}>
                                    {{ $poli->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="filter-search" class="mb-2 block text-sm font-medium text-gray-900">
                            Cari Pasien
                        </label>
                        <div class="relative">
                            <input type="text" id="filter-search" name="search"
                                class="block w-full rounded-lg border-gray-300 px-4 py-2.5 pl-10 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                placeholder="Nama pasien..." value="{{ request('search') }}">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex gap-2">
                    <button type="submit"
                        class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Filter
                    </button>
                    <a href="{{ route('admin.queues') }}"
                        class="inline-flex items-center gap-x-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Reset
                    </a>
                </div>
            </form>

            {{-- Queue Table --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    No. Antrian
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Pasien
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Dokter / Poli
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Tanggal
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Keluhan
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
                            @forelse($queues as $queue)
                                <tr class="hover:bg-gray-50">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <span class="text-lg font-bold text-gray-900">{{ $queue->queue_number }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="bg-{{ ['blue', 'purple', 'green', 'orange', 'red', 'indigo'][$loop->index % 6] }}-100 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full">
                                                <span
                                                    class="text-{{ ['blue', 'purple', 'green', 'orange', 'red', 'indigo'][$loop->index % 6] }}-700 text-sm font-semibold">
                                                    {{ strtoupper(substr($queue->user->name, 0, 2)) }}
                                                </span>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $queue->user->name ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">{{ $queue->user->phone ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $queue->doctor->name ?? '-' }}</div>
                                        <div class="text-xs text-gray-500">{{ $queue->doctor->poli->name ?? '-' }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $queue->visit_date ? $queue->visit_date->format('d M Y') : '-' }}</div>
                                        <div class="text-xs text-gray-500">
                                            {{ $queue->created_at ? $queue->created_at->format('H:i') : '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="max-w-xs truncate text-sm text-gray-600">{{ $queue->complaint ?? '-' }}
                                        </p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if ($queue->status === 'WAITING')
                                            <span
                                                class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                                Menunggu
                                            </span>
                                        @elseif($queue->status === 'CALLED')
                                            <span
                                                class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                                Dipanggil
                                            </span>
                                        @elseif($queue->status === 'DONE')
                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                                Selesai
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            @if ($queue->status === 'WAITING')
                                                <form method="POST" action="{{ route('admin.queues.call', $queue) }}"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-x-1 rounded-lg border border-emerald-600 bg-emerald-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-emerald-700">
                                                        <svg class="h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                                        </svg>
                                                        Panggil
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.queues.cancel', $queue) }}"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-x-1 rounded-lg border border-red-300 bg-white px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50">
                                                        Batalkan
                                                    </button>
                                                </form>
                                            @elseif($queue->status === 'CALLED')
                                                <form method="POST"
                                                    action="{{ route('admin.queues.complete', $queue) }}" class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-x-1 rounded-lg border border-green-600 bg-green-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-green-700">
                                                        <svg class="h-3 w-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Selesai
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="mt-4 text-sm font-medium text-gray-900">Belum ada data antrian</p>
                                            <p class="mt-1 text-sm text-gray-500">Data antrian akan muncul di sini</p>
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
                            Menampilkan <span class="font-semibold">{{ $queues->firstItem() ?? 0 }}</span> sampai
                            <span class="font-semibold">{{ $queues->lastItem() ?? 0 }}</span> dari
                            <span class="font-semibold">{{ $queues->total() }}</span> data
                        </div>
                        <div>
                            {{ $queues->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
