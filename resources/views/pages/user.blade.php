@extends('layouts.app')

@section('title', 'Dashboard Pasien')

@section('content')
    <div class="min-h-screen bg-gray-50">
        {{-- Header Section --}}
        <header class="bg-gradient-to-r from-emerald-600 to-teal-600 shadow-lg">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="text-white">
                            <p class="text-sm opacity-90">Halo,</p>
                            <h1 class="text-2xl font-bold">{{ Auth::user()->name ?? 'Guest' }}</h1>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <a href="{{ route('user.profile') }}"
                            class="inline-flex items-center gap-x-2 rounded-lg border border-white/30 bg-white/10 px-4 py-2 text-sm font-medium text-white backdrop-blur-sm hover:bg-white/20">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profil
                        </a>
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
            </div>
        </header>

        {{-- Main Content --}}
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="dismiss-toast"
                    class="hs-removing:translate-x-5 hs-removing:opacity-0 fixed right-3 top-3 mb-6 max-w-xs rounded-xl border border-green-300 bg-green-100 shadow-lg transition duration-300"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex gap-5 p-4">
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700">
                            {{ session('success') }}
                        </p>

                        <div class="ms-auto">
                            <button type="button"
                                class="focus:outline-hidden inline-flex size-5 shrink-0 items-center justify-center rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:opacity-100"
                                aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                <span class="sr-only">Close</span>
                                <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->has('error'))
                <div id="dismiss-toast"
                    class="hs-removing:translate-x-5 hs-removing:opacity-0 fixed right-3 top-3 mb-6 max-w-xs rounded-xl border border-red-300 bg-red-100 shadow-lg transition duration-300"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex gap-5 p-4">
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700">
                            {{ $errors->first('error') }}
                        </p>

                        <div class="ms-auto">
                            <button type="button"
                                class="focus:outline-hidden inline-flex size-5 shrink-0 items-center justify-center rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:opacity-100"
                                aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                <span class="sr-only">Close</span>
                                <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Stats Grid --}}
            <div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Total Kunjungan</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_visits'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-100">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-emerald-600">Semua waktu</p>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Antrian Aktif</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['active_queues'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-blue-600">Sedang menunggu</p>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Selesai</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['completed'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-green-600">Bulan ini: {{ $stats['completed_this_month'] }}</p>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Dibatalkan</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['canceled'] }}</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-red-100">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-red-600">Total</p>
                </div>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">
                {{-- Left Column - Form --}}
                <div class="space-y-6 lg:col-span-2">
                    {{-- Registration Form --}}
                    <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                        <div class="mb-6 flex items-center space-x-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-600">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Daftar Antrian</h2>
                                <p class="text-sm text-gray-600">Buat janji temu dengan dokter</p>
                            </div>
                        </div>

                        <form class="space-y-5" method="POST" action="{{ route('user.queues.store') }}">
                            @csrf

                            {{-- Button to open schedule modal --}}
                            <div class="rounded-lg border border-emerald-100 bg-emerald-50 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-600">
                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-emerald-900">Lihat Jadwal Dokter</p>
                                            <p class="text-xs text-emerald-700">Cek ketersediaan dokter sebelum daftar</p>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700 focus:bg-emerald-700 disabled:pointer-events-none disabled:opacity-50"
                                        aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="hs-doctor-schedule-modal"
                                        data-hs-overlay="#hs-doctor-schedule-modal">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat Jadwal
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label for="poli_id" class="mb-2 block text-sm font-medium text-gray-900">
                                    Pilih Poli <span class="text-red-500">*</span>
                                </label>
                                <select id="poli_id" name="poli_id" required
                                    class="block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <option value="" selected disabled>Pilih poli klinik</option>
                                    @foreach ($polis as $poli)
                                        <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="doctor_id" class="mb-2 block text-sm font-medium text-gray-900">
                                    Pilih Dokter <span class="text-red-500">*</span>
                                </label>
                                <select id="doctor_id" name="doctor_id" required
                                    class="@error('doctor_id') border-red-500 @enderror block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    disabled>
                                    <option value="" selected>Pilih poli terlebih dahulu</option>
                                </select>
                                <div id="doctor-schedule" class="mt-2 hidden">
                                    <div class="rounded-lg bg-blue-50 p-3">
                                        <p class="text-xs font-semibold text-blue-900">Jadwal Praktik:</p>
                                        <p id="schedule-info" class="mt-1 text-xs text-blue-700"></p>
                                    </div>
                                </div>
                                @error('doctor_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="visit_date" class="mb-2 block text-sm font-medium text-gray-900">
                                    Tanggal Kunjungan <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="visit_date" name="visit_date" value="{{ old('visit_date') }}"
                                    min="{{ date('Y-m-d') }}"
                                    class="@error('visit_date') border-red-500 @enderror block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    required>
                                @error('visit_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="complaint" class="mb-2 block text-sm font-medium text-gray-900">
                                    Keluhan <span class="text-red-500">*</span>
                                </label>
                                <textarea id="complaint" name="complaint" rows="4"
                                    class="@error('complaint') border-red-500 @enderror block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Jelaskan keluhan Anda (minimal 10 karakter)" required minlength="10">{{ old('complaint') }}</textarea>
                                <p class="mt-2 text-xs text-gray-500">Minimal 10 karakter</p>
                                @error('complaint')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="rounded-lg border border-blue-200 bg-blue-50 p-4">
                                <div class="flex">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-600" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div class="ms-3">
                                        <p class="text-sm font-semibold text-blue-900">Perhatian</p>
                                        <ul class="mt-2 space-y-1 text-sm text-blue-800">
                                            <li>• Maksimal 20 antrian per dokter per hari</li>
                                            <li>• Tidak bisa daftar 2x ke dokter yang sama di tanggal yang sama</li>
                                            <li>• Nomor antrian akan diberikan otomatis</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="inline-flex w-full items-center justify-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Daftar Sekarang
                            </button>
                        </form>
                    </div>

                    {{-- Queue History --}}
                    <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                        <div class="mb-6 flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Riwayat Antrian</h2>
                                    <p class="text-sm text-gray-600">Status kunjungan Anda</p>
                                </div>
                            </div>
                            <a href="{{ route('user.queues') }}"
                                class="text-sm font-medium text-emerald-600 hover:text-emerald-700">Lihat
                                Semua</a>
                        </div>

                        <div class="space-y-4">
                            @forelse ($recentQueues as $queue)
                                @php
                                    $statusConfig = [
                                        'WAITING' => [
                                            'bg' => 'bg-blue-50',
                                            'border' => 'border-blue-200',
                                            'badge' => 'bg-blue-600 text-white',
                                            'text' => 'text-blue-900',
                                            'textLight' => 'text-blue-700',
                                        ],
                                        'CALLED' => [
                                            'bg' => 'bg-yellow-50',
                                            'border' => 'border-yellow-200',
                                            'badge' => 'bg-yellow-600 text-white',
                                            'text' => 'text-yellow-900',
                                            'textLight' => 'text-yellow-700',
                                        ],
                                        'DONE' => [
                                            'bg' => 'bg-gray-50',
                                            'border' => 'border-gray-200',
                                            'badge' => 'bg-green-100 text-green-800',
                                            'text' => 'text-gray-900',
                                            'textLight' => 'text-gray-600',
                                        ],
                                        'CANCELED' => [
                                            'bg' => 'bg-gray-50',
                                            'border' => 'border-gray-200',
                                            'badge' => 'bg-red-100 text-red-800',
                                            'text' => 'text-gray-900',
                                            'textLight' => 'text-gray-600',
                                        ],
                                    ];
                                    $config = $statusConfig[$queue->status] ?? $statusConfig['WAITING'];
                                @endphp

                                <div
                                    class="{{ $config['border'] }} {{ $config['bg'] }} rounded-lg border-2 p-4 hover:shadow-sm">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="mb-3 flex items-center space-x-2">
                                                <span
                                                    class="{{ $config['badge'] }} inline-flex items-center gap-x-1.5 rounded-full px-3 py-1.5 text-xs font-medium">
                                                    {{ $queue->status }}
                                                </span>
                                                <span class="{{ $config['text'] }} text-lg font-bold">No.
                                                    {{ $queue->queue_number }}</span>
                                            </div>
                                            <div class="space-y-2 text-sm">
                                                <p class="{{ $config['text'] }} font-semibold">
                                                    {{ $queue->doctor->name ?? 'Dokter Tidak Diketahui' }}
                                                </p>
                                                <p class="{{ $config['textLight'] }}">
                                                    {{ \Carbon\Carbon::parse($queue->visit_date)->isoFormat('dddd, D MMMM Y') }}
                                                </p>
                                                <p class="{{ $config['textLight'] }}">
                                                    {{ $queue->doctor->poli->name ?? 'Poli Tidak Diketahui' }}
                                                </p>
                                                <p class="{{ $config['textLight'] }} text-xs">
                                                <p class="font-semibold">
                                                    Keluhan:
                                                </p>
                                                {{ Str::limit($queue->complaint, 60) }}
                                                </p>
                                            </div>
                                        </div>
                                        @if ($queue->status === 'WAITING')
                                            <form method="POST" action="{{ route('user.queues.cancel', $queue->id) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin membatalkan antrian ini?')">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center gap-x-2 rounded-lg border border-red-300 bg-white px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Batalkan
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="rounded-lg border border-gray-200 bg-gray-50 p-8 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="mt-4 text-sm text-gray-600">Belum ada riwayat antrian</p>
                                    <p class="mt-1 text-xs text-gray-500">Daftar antrian baru untuk memulai</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Right Column - Sidebar --}}
                <div class="space-y-6 lg:col-span-1">
                    <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                        <h3 class="mb-4 text-lg font-bold text-gray-900">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="{{ route('user.queues') }}"
                                class="flex items-center space-x-3 rounded-lg border border-gray-200 p-3 transition hover:border-blue-500 hover:bg-gray-50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Riwayat Lengkap</p>
                                    <p class="text-xs text-gray-600">Semua kunjungan</p>
                                </div>
                            </a>

                            <a href="{{ route('user.profile') }}"
                                class="flex items-center space-x-3 rounded-lg border border-gray-200 p-3 transition hover:border-purple-500 hover:bg-gray-50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100">
                                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Edit Profil</p>
                                    <p class="text-xs text-gray-600">Update data diri</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- Tips Card --}}
                    <div class="rounded-xl bg-gradient-to-br from-emerald-600 to-teal-600 p-6 text-white shadow-sm">
                        <div class="mb-4 flex items-center space-x-2">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <h3 class="font-bold">Tips</h3>
                        </div>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start space-x-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Datang 15 menit sebelum jadwal</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Bawa kartu identitas dan riwayat medis</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Aktifkan notifikasi untuk update status</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Contact Card --}}
                    <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                        <div class="mb-4 flex items-center space-x-2">
                            <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <h3 class="font-bold text-gray-900">Bantuan</h3>
                        </div>
                        <p class="mb-4 text-sm text-gray-600">Hubungi kami untuk pertanyaan</p>
                        <div class="space-y-3">
                            <a href="tel:08123456789"
                                class="flex items-center space-x-3 rounded-lg bg-emerald-50 p-3 text-emerald-700 hover:bg-emerald-100">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-sm font-medium">0812-3456-7890</span>
                            </a>
                            <a href="mailto:info@kliniksehat.com"
                                class="flex items-center space-x-3 rounded-lg bg-blue-50 p-3 text-blue-700 hover:bg-blue-100">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm font-medium">info@kliniksehat.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Validation Notification Modal --}}
    <div id="hs-validation-modal"
        class="hs-overlay pointer-events-none fixed start-0 top-0 z-[80] hidden size-full overflow-y-auto overflow-x-hidden"
        role="dialog" tabindex="-1" aria-labelledby="hs-validation-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out sm:mx-auto sm:w-full sm:max-w-lg">
            <div class="pointer-events-auto flex w-full flex-col rounded-xl border border-gray-200 bg-white shadow-lg">
                <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3">
                    <h3 id="hs-validation-modal-label" class="font-bold text-gray-800">
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Tanggal Tidak Sesuai
                        </div>
                    </h3>
                    <button type="button"
                        class="focus:outline-hidden inline-flex size-8 items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50"
                        aria-label="Close" data-hs-overlay="#hs-validation-modal">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="mb-2 font-semibold text-gray-900">Tanggal yang Anda pilih tidak sesuai dengan
                                jadwal dokter.</p>
                            <p id="modal-notification-message" class="text-sm text-gray-600"></p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-2 border-t border-gray-200 px-4 py-3">
                    <button type="button"
                        class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700 focus:bg-emerald-700 disabled:pointer-events-none disabled:opacity-50"
                        data-hs-overlay="#hs-validation-modal">
                        Mengerti
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Doctor Schedule Modal --}}
    <div id="hs-doctor-schedule-modal"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden"
        role="dialog" tabindex="-1" aria-labelledby="hs-doctor-schedule-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out sm:mx-auto sm:w-full sm:max-w-4xl">
            <div class="shadow-2xs pointer-events-auto flex w-full flex-col rounded-xl border border-gray-200 bg-white">
                <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3">
                    <h3 id="hs-doctor-schedule-modal-label" class="font-bold text-gray-800">
                        Jadwal Praktik Dokter
                    </h3>
                    <button type="button"
                        class="focus:outline-hidden inline-flex size-8 items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50"
                        aria-label="Close" data-hs-overlay="#hs-doctor-schedule-modal">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4">
                    <p class="mb-4 text-sm text-gray-600">
                        Berikut adalah daftar jadwal praktik dokter di klinik kami. Pilih dokter sesuai kebutuhan Anda.
                    </p>

                    {{-- Filter by Poli --}}
                    <div class="mb-4">
                        <label for="modal-poli-filter" class="mb-2 block text-sm font-medium text-gray-900">
                            Filter berdasarkan Poli
                        </label>
                        <select id="modal-poli-filter"
                            class="block w-full rounded-lg border-gray-200 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="">Semua Poli</option>
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Doctor Schedule List --}}
                    <div class="space-y-3" id="doctor-schedule-list">
                        @php
                            $doctors = \App\Models\Doctor::with('poli')->orderBy('name')->get();
                        @endphp

                        @forelse ($doctors as $doctor)
                            <div class="doctor-item rounded-lg border border-gray-200 p-4 transition hover:border-emerald-300 hover:bg-emerald-50"
                                data-poli-id="{{ $doctor->poli_id }}">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex flex-1 items-start gap-3">
                                        <div
                                            class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-100">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">{{ $doctor->name }}</h4>
                                            <p class="mt-1 text-sm text-gray-600">
                                                <span
                                                    class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-800">
                                                    <svg class="h-3 w-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                    {{ $doctor->poli->name }}
                                                </span>
                                            </p>
                                            @if ($doctor->specialization)
                                                <p class="mt-1 text-xs text-gray-500">
                                                    Spesialisasi: {{ $doctor->specialization }}
                                                </p>
                                            @endif

                                            <div class="mt-3 grid gap-2 text-sm sm:grid-cols-2">
                                                <div class="flex items-center gap-2 text-gray-700">
                                                    <svg class="h-4 w-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="font-medium">
                                                        @php
                                                            $dayIndo = [
                                                                'Monday' => 'Senin',
                                                                'Tuesday' => 'Selasa',
                                                                'Wednesday' => 'Rabu',
                                                                'Thursday' => 'Kamis',
                                                                'Friday' => 'Jumat',
                                                                'Saturday' => 'Sabtu',
                                                                'Sunday' => 'Minggu',
                                                            ];
                                                        @endphp
                                                        {{ $dayIndo[$doctor->schedule_day] ?? $doctor->schedule_day }}
                                                    </span>
                                                </div>
                                                <div class="flex items-center gap-2 text-gray-700">
                                                    <svg class="h-4 w-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>
                                                        {{ \Carbon\Carbon::parse($doctor->start_time)->format('H:i') }} -
                                                        {{ \Carbon\Carbon::parse($doctor->end_time)->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-8 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <p class="mt-4 text-sm text-gray-600">Belum ada jadwal dokter tersedia</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-2 border-t border-gray-200 px-4 py-3">
                    <button type="button"
                        class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50"
                        data-hs-overlay="#hs-doctor-schedule-modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript for dynamic doctor selection --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const poliSelect = document.getElementById('poli_id');
            const doctorSelect = document.getElementById('doctor_id');
            const doctorSchedule = document.getElementById('doctor-schedule');
            const scheduleInfo = document.getElementById('schedule-info');

            // Handle poli selection change
            poliSelect.addEventListener('change', function() {
                const poliId = this.value;

                // Reset doctor select
                doctorSelect.innerHTML = '<option value="">Memuat dokter...</option>';
                doctorSelect.disabled = true;
                doctorSchedule.classList.add('hidden');

                if (poliId) {
                    // Fetch doctors by poli
                    fetch(`/user/api/polis/${poliId}/doctors`)
                        .then(response => response.json())
                        .then(doctors => {
                            doctorSelect.innerHTML = '<option value="">Pilih dokter</option>';

                            if (doctors.length === 0) {
                                doctorSelect.innerHTML =
                                    '<option value="">Tidak ada dokter tersedia</option>';
                            } else {
                                doctors.forEach(doctor => {
                                    const option = document.createElement('option');
                                    option.value = doctor.id;
                                    option.textContent = doctor.name;
                                    option.dataset.schedule = doctor.schedule_day;
                                    option.dataset.startTime = doctor.start_time;
                                    option.dataset.endTime = doctor.end_time;
                                    option.dataset.specialization = doctor.specialization;
                                    doctorSelect.appendChild(option);
                                });
                                doctorSelect.disabled = false;
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching doctors:', error);
                            doctorSelect.innerHTML = '<option value="">Gagal memuat dokter</option>';
                        });
                }
            });

            // Handle doctor selection change
            doctorSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];

                if (selectedOption.value && selectedOption.dataset.schedule) {
                    const schedule = selectedOption.dataset.schedule;
                    const startTime = new Date(selectedOption.dataset.startTime).toLocaleTimeString(
                        'id-ID', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                    const endTime = new Date(selectedOption.dataset.endTime).toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const specialization = selectedOption.dataset.specialization || '-';

                    // Translate schedule day to Indonesian
                    const dayTranslations = {
                        'Monday': 'Senin',
                        'Tuesday': 'Selasa',
                        'Wednesday': 'Rabu',
                        'Thursday': 'Kamis',
                        'Friday': 'Jumat',
                        'Saturday': 'Sabtu',
                        'Sunday': 'Minggu'
                    };
                    const scheduleIndo = dayTranslations[schedule] || schedule;

                    scheduleInfo.innerHTML = `
                        <strong>Hari:</strong> ${scheduleIndo}<br>
                        <strong>Jam:</strong> ${startTime} - ${endTime}<br>
                        <strong>Spesialisasi:</strong> ${specialization}
                    `;
                    doctorSchedule.classList.remove('hidden');

                    // Validate visit date when doctor changes
                    validateVisitDate();
                } else {
                    doctorSchedule.classList.add('hidden');
                }
            });

            // Visit date validation
            const visitDateInput = document.getElementById('visit_date');
            const dayTranslations = {
                'Monday': 'Senin',
                'Tuesday': 'Selasa',
                'Wednesday': 'Rabu',
                'Thursday': 'Kamis',
                'Friday': 'Jumat',
                'Saturday': 'Sabtu',
                'Sunday': 'Minggu'
            };
            const dayToNumber = {
                'Monday': 1,
                'Tuesday': 2,
                'Wednesday': 3,
                'Thursday': 4,
                'Friday': 5,
                'Saturday': 6,
                'Sunday': 0
            };

            function validateVisitDate() {
                const selectedOption = doctorSelect.options[doctorSelect.selectedIndex];
                const visitDate = visitDateInput.value;

                if (!selectedOption.value || !visitDate || !selectedOption.dataset.schedule) {
                    return;
                }

                const doctorDay = selectedOption.dataset.schedule;
                const doctorDayNumber = dayToNumber[doctorDay];
                const selectedDate = new Date(visitDate + 'T00:00:00');
                const selectedDayNumber = selectedDate.getDay();

                if (selectedDayNumber !== doctorDayNumber) {
                    const scheduleIndo = dayTranslations[doctorDay] || doctorDay;

                    // Update modal content
                    document.getElementById('modal-notification-message').textContent =
                        `Dokter hanya praktik pada hari ${scheduleIndo}. Silakan pilih tanggal yang sesuai.`;

                    // Show modal
                    window.HSOverlay.open(document.getElementById('hs-validation-modal'));

                    visitDateInput.value = '';
                }
            }

            visitDateInput.addEventListener('change', validateVisitDate);

            // Modal filter functionality
            const modalPoliFilter = document.getElementById('modal-poli-filter');
            if (modalPoliFilter) {
                modalPoliFilter.addEventListener('change', function() {
                    const selectedPoliId = this.value;
                    const doctorItems = document.querySelectorAll('.doctor-item');

                    doctorItems.forEach(item => {
                        if (selectedPoliId === '' || item.dataset.poliId === selectedPoliId) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }

            // Optional: Auto-refresh queue history every 30 seconds
            setInterval(function() {
                // Simple polling - reload page to refresh data
                // You can implement AJAX refresh for better UX
                const hasActiveQueue = {{ $stats['active_queues'] > 0 ? 'true' : 'false' }};
                if (hasActiveQueue) {
                    // Only reload if user has active queues
                    // Uncomment the line below to enable auto-refresh
                    // location.reload();
                }
            }, 30000); // 30 seconds
        });
    </script>
@endsection
