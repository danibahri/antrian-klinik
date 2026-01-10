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
                        <button type="button"
                            class="inline-flex items-center gap-x-2 rounded-lg border border-white/30 bg-white/10 px-4 py-2 text-sm font-medium text-white backdrop-blur-sm hover:bg-white/20">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profil
                        </button>
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
            {{-- Stats Grid --}}
            <div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Total Kunjungan</p>
                            <p class="text-3xl font-bold text-gray-900">12</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-100">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-emerald-600">+2 bulan ini</p>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Antrian Aktif</p>
                            <p class="text-3xl font-bold text-gray-900">1</p>
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
                            <p class="text-3xl font-bold text-gray-900">10</p>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-green-600">Bulan ini: 2</p>
                </div>

                <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-1 text-sm text-gray-600">Dibatalkan</p>
                            <p class="text-3xl font-bold text-gray-900">1</p>
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
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Daftar Antrian</h2>
                                <p class="text-sm text-gray-600">Buat janji temu dengan dokter</p>
                            </div>
                        </div>

                        <form class="space-y-5" method="POST" action="#">
                            @csrf

                            <div>
                                <label for="poli_id" class="mb-2 block text-sm font-medium text-gray-900">
                                    Pilih Poli
                                </label>
                                <select id="poli_id" name="poli_id"
                                    class="block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <option selected disabled>Pilih poli klinik</option>
                                    <option value="1">Poli Umum</option>
                                    <option value="2">Poli Gigi</option>
                                    <option value="3">Poli Anak</option>
                                    <option value="4">Poli Mata</option>
                                    <option value="5">Poli THT</option>
                                </select>
                            </div>

                            <div>
                                <label for="doctor_id" class="mb-2 block text-sm font-medium text-gray-900">
                                    Pilih Dokter
                                </label>
                                <select id="doctor_id" name="doctor_id"
                                    class="block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <option selected disabled>Pilih dokter terlebih dahulu</option>
                                </select>
                                <p class="mt-2 text-xs text-gray-500">Jadwal praktik akan ditampilkan setelah memilih
                                    dokter
                                </p>
                            </div>

                            <div>
                                <label for="visit_date" class="mb-2 block text-sm font-medium text-gray-900">
                                    Tanggal Kunjungan
                                </label>
                                <input type="date" id="visit_date" name="visit_date"
                                    class="block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    required>
                            </div>

                            <div>
                                <label for="complaint" class="mb-2 block text-sm font-medium text-gray-900">
                                    Keluhan
                                </label>
                                <textarea id="complaint" name="complaint" rows="4"
                                    class="block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Jelaskan keluhan Anda (minimal 10 karakter)" required minlength="10"></textarea>
                                <p class="mt-2 text-xs text-gray-500">Minimal 10 karakter</p>
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
                            <a href="#" class="text-sm font-medium text-emerald-600 hover:text-emerald-700">Lihat
                                Semua</a>
                        </div>

                        <div class="space-y-4">
                            {{-- Active Queue --}}
                            <div class="rounded-lg border-2 border-blue-200 bg-blue-50 p-4">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="mb-3 flex items-center space-x-2">
                                            <span
                                                class="inline-flex items-center gap-x-1.5 rounded-full bg-blue-600 px-3 py-1.5 text-xs font-medium text-white">
                                                WAITING
                                            </span>
                                            <span class="text-lg font-bold text-blue-900">No. A-005</span>
                                        </div>
                                        <div class="space-y-2 text-sm text-blue-900">
                                            <p class="font-semibold">Dr. Ahmad Santoso, Sp.PD</p>
                                            <p class="text-blue-700">Jumat, 10 Januari 2026</p>
                                            <p class="text-blue-700">Poli Umum</p>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 rounded-lg border border-red-300 bg-white px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                                        Batalkan
                                    </button>
                                </div>
                            </div>

                            {{-- Completed Queue --}}
                            <div class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="mb-3 flex items-center space-x-2">
                                            <span
                                                class="inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-3 py-1.5 text-xs font-medium text-green-800">
                                                DONE
                                            </span>
                                            <span class="text-lg font-bold text-gray-900">No. A-003</span>
                                        </div>
                                        <div class="space-y-2 text-sm">
                                            <p class="font-semibold text-gray-900">Dr. Siti Rahmawati, Sp.A</p>
                                            <p class="text-gray-600">Senin, 6 Januari 2026</p>
                                            <p class="text-gray-600">Poli Anak</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Waiting Queue --}}
                            <div class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="mb-3 flex items-center space-x-2">
                                            <span
                                                class="inline-flex items-center gap-x-1.5 rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-medium text-yellow-800">
                                                WAITING
                                            </span>
                                            <span class="text-lg font-bold text-gray-900">No. B-012</span>
                                        </div>
                                        <div class="space-y-2 text-sm">
                                            <p class="font-semibold text-gray-900">Dr. Budi Hartono, Sp.M</p>
                                            <p class="text-gray-600">Rabu, 8 Januari 2026</p>
                                            <p class="text-gray-600">Poli Mata</p>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 rounded-lg border border-red-300 bg-white px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                                        Batalkan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column - Sidebar --}}
                <div class="space-y-6 lg:col-span-1">
                    {{-- Quick Actions --}}
                    <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                        <h3 class="mb-4 text-lg font-bold text-gray-900">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="#"
                                class="flex items-center space-x-3 rounded-lg border border-gray-200 p-3 transition hover:border-emerald-500 hover:bg-gray-50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Jadwal Dokter</p>
                                    <p class="text-xs text-gray-600">Lihat ketersediaan</p>
                                </div>
                            </a>

                            <a href="#"
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

                            <a href="#"
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
@endsection
