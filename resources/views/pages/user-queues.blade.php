@extends('layouts.app')

@section('title', 'Semua Antrian')

@section('content')
    <div class="min-h-screen bg-gray-50">
        {{-- Header Section --}}
        <header class="bg-gradient-to-r from-emerald-600 to-teal-600 shadow-lg">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('user.dashboard') }}"
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/20 backdrop-blur-sm transition hover:bg-white/30">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                        <div class="text-white">
                            <p class="text-sm opacity-90">Riwayat</p>
                            <h1 class="text-2xl font-bold">Semua Antrian</h1>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center gap-x-2 rounded-lg border border-white/30 px-4 py-2 text-sm font-medium text-white hover:bg-white/10">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </header>

        {{-- Main Content --}}
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
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

            @if ($errors->has('error'))
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <p class="ml-3 text-sm font-medium text-red-800">{{ $errors->first('error') }}</p>
                    </div>
                </div>
            @endif

            {{-- Statistics Cards --}}
            <div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600">Total</p>
                            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gray-100">
                            <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600">Menunggu</p>
                            <p class="mt-1 text-2xl font-bold text-blue-900">{{ $stats['waiting'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                            <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600">Dipanggil</p>
                            <p class="mt-1 text-2xl font-bold text-yellow-900">{{ $stats['called'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-100">
                            <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600">Selesai</p>
                            <p class="mt-1 text-2xl font-bold text-green-900">{{ $stats['done'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100">
                            <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600">Dibatalkan</p>
                            <p class="mt-1 text-2xl font-bold text-red-900">{{ $stats['canceled'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100">
                            <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Queue List --}}
            <div class="rounded-xl border border-gray-100 bg-white shadow-sm">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Antrian</h2>
                    <p class="mt-1 text-sm text-gray-600">Riwayat lengkap pendaftaran antrian Anda</p>
                </div>

                <div class="divide-y divide-gray-200">
                    @forelse ($queues as $queue)
                        @php
                            $statusConfig = [
                                'WAITING' => [
                                    'bg' => 'bg-blue-50',
                                    'badge' => 'bg-blue-600 text-white',
                                    'text' => 'text-blue-900',
                                    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                ],
                                'CALLED' => [
                                    'bg' => 'bg-yellow-50',
                                    'badge' => 'bg-yellow-600 text-white',
                                    'text' => 'text-yellow-900',
                                    'icon' =>
                                        'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
                                ],
                                'DONE' => [
                                    'bg' => 'bg-green-50',
                                    'badge' => 'bg-green-600 text-white',
                                    'text' => 'text-green-900',
                                    'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                ],
                                'CANCELED' => [
                                    'bg' => 'bg-red-50',
                                    'badge' => 'bg-red-600 text-white',
                                    'text' => 'text-red-900',
                                    'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                                ],
                            ];
                            $config = $statusConfig[$queue->status] ?? $statusConfig['WAITING'];
                        @endphp

                        <div class="p-6 hover:bg-gray-50">
                            <div class="flex items-start justify-between gap-4">
                                {{-- Left: Queue Info --}}
                                <div class="flex flex-1 items-start gap-4">
                                    {{-- Icon --}}
                                    <div
                                        class="{{ $config['bg'] }} flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg">
                                        <svg class="{{ $config['text'] }} h-6 w-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $config['icon'] }}" />
                                        </svg>
                                    </div>

                                    {{-- Details --}}
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-2 flex items-center gap-3">
                                            <span
                                                class="{{ $config['badge'] }} inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold">
                                                {{ $queue->status }}
                                            </span>
                                            <span class="text-sm font-bold text-gray-900">No.
                                                {{ $queue->queue_number }}</span>
                                        </div>

                                        <h3 class="text-base font-semibold text-gray-900">
                                            {{ $queue->doctor->name ?? 'Dokter Tidak Diketahui' }}
                                        </h3>

                                        <div class="mt-2 grid gap-2 text-sm text-gray-600 sm:grid-cols-2">
                                            <div class="flex items-center gap-2">
                                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($queue->visit_date)->isoFormat('dddd, D MMMM Y') }}</span>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                                <span>{{ $queue->doctor->poli->name ?? 'Poli Tidak Diketahui' }}</span>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <p class="text-xs text-gray-500">
                                                <span class="font-semibold">Keluhan:</span>
                                                {{ $queue->complaint }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right: Action --}}
                                @if ($queue->status === 'WAITING')
                                    <form method="POST" action="{{ route('user.queues.cancel', $queue->id) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan antrian ini?')">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center gap-x-2 rounded-lg border border-red-300 bg-white px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Batalkan
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <p class="mt-4 text-base text-gray-600">Belum ada riwayat antrian</p>
                            <p class="mt-1 text-sm text-gray-500">Daftar antrian baru dari dashboard</p>
                            <a href="{{ route('user.dashboard') }}"
                                class="mt-6 inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Daftar Antrian
                            </a>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if ($queues->hasPages())
                    <div class="border-t border-gray-200 px-6 py-4">
                        {{ $queues->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
