@extends('layouts.app')

@section('title', 'Klinik Sehat - Sistem Antrian Digital')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute left-10 top-10 h-20 w-20 animate-bounce rounded-full bg-white/10 backdrop-blur-lg"
            style="animation-duration: 3s;"></div>
        <div class="absolute bottom-20 right-10 h-16 w-16 animate-bounce rounded-full bg-white/10 backdrop-blur-lg"
            style="animation-duration: 4s; animation-delay: 1s;"></div>
        <div class="absolute right-20 top-1/3 h-12 w-12 animate-bounce rounded-full bg-white/10 backdrop-blur-lg"
            style="animation-duration: 5s; animation-delay: 2s;"></div>

        <div class="relative z-10 mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="mb-8 flex items-center gap-3">
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-xl bg-white/20 shadow-lg backdrop-blur-sm">
                            <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold">Klinik Sehat</h1>
                            <p class="text-white/90">Sistem Antrian Digital</p>
                        </div>
                    </div>

                    <h2 class="mb-6 text-5xl font-bold leading-tight">
                        Antrian Lebih Mudah,<br>Pelayanan Lebih Cepat
                    </h2>
                    <p class="mb-8 text-xl text-white/90">
                        Sistem manajemen antrian modern untuk meningkatkan kualitas pelayanan kesehatan Anda. Daftar online,
                        pantau real-time, tanpa antre lama.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('login') }}"
                            class="group relative inline-flex items-center gap-2 overflow-hidden rounded-lg bg-white px-8 py-4 text-base font-semibold text-emerald-600 shadow-xl transition-all duration-200 hover:shadow-2xl active:scale-95">
                            <span class="relative z-10">Daftar Antrian Sekarang</span>
                            <svg class="relative z-10 h-5 w-5 transition-transform group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#features"
                            class="inline-flex items-center gap-2 rounded-lg border-2 border-white/30 bg-white/10 px-8 py-4 text-base font-semibold text-white backdrop-blur-sm transition-all duration-200 hover:bg-white/20">
                            Lihat Fitur
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="mt-12 grid grid-cols-3 gap-6">
                        <div class="rounded-xl bg-white/10 p-4 backdrop-blur-sm">
                            <div class="text-3xl font-bold">20+</div>
                            <div class="text-sm text-white/80">Dokter Ahli</div>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4 backdrop-blur-sm">
                            <div class="text-3xl font-bold">10+</div>
                            <div class="text-sm text-white/80">Poli Klinik</div>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4 backdrop-blur-sm">
                            <div class="text-3xl font-bold">1000+</div>
                            <div class="text-sm text-white/80">Pasien Terlayani</div>
                        </div>
                    </div>
                </div>

                <!-- Right Illustration -->
                <div class="flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 animate-pulse rounded-full bg-white/20 blur-3xl"></div>
                        <svg class="relative h-96 w-96" viewBox="0 0 200 200" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="100" cy="100" r="90" fill="white" opacity="0.1" />
                            <circle cx="100" cy="100" r="75" fill="white" opacity="0.15" />
                            <g transform="translate(40, 30)">
                                <path
                                    d="M60 100c-16.569 0-30-13.431-30-30V50c0-16.569 13.431-30 30-30s30 13.431 30 30v20c0 16.569-13.431 30-30 30z"
                                    fill="white" />
                                <ellipse cx="60" cy="50" rx="25" ry="30" fill="white"
                                    opacity="0.9" />
                                <path d="M30 100v20c0 16.569 13.431 30 30 30s30-13.431 30-30v-20H30z" fill="white"
                                    opacity="0.95" />
                                <circle cx="50" cy="50" r="3" fill="#1a1a1a" />
                                <circle cx="70" cy="50" r="3" fill="#1a1a1a" />
                                <path d="M50 60c0 5.523 4.477 10 10 10s10-4.477 10-10" stroke="#1a1a1a" stroke-width="2"
                                    stroke-linecap="round" fill="none" />
                                <path d="M35 80c-5 10-5 20 0 30M85 80c5 10 5 20 0 30" stroke="#10b981" stroke-width="3"
                                    stroke-linecap="round" opacity="0.8" />
                                <circle cx="35" cy="110" r="5" fill="#10b981" opacity="0.8" />
                                <circle cx="85" cy="110" r="5" fill="#10b981" opacity="0.8" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-gray-50 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Fitur Unggulan Sistem Kami
                </h2>
                <p class="text-lg text-gray-600">
                    Solusi lengkap untuk manajemen antrian klinik yang efisien dan modern
                </p>
            </div>

            <div class="mx-auto mt-16 grid max-w-7xl gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Feature 1 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white p-8 shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div
                        class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-lg">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-gray-900">Manajemen Dokter & Poli</h3>
                    <p class="text-gray-600">
                        Kelola data dokter, poli klinik, dan jadwal praktik dengan mudah. Admin dapat menambah, mengubah,
                        dan menghapus data sesuai kebutuhan.
                    </p>
                    <div
                        class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-emerald-500 to-teal-600 transition-all duration-300 group-hover:w-full">
                    </div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white p-8 shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div
                        class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-lg">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-gray-900">Pendaftaran Antrian Online</h3>
                    <p class="text-gray-600">
                        Pasien dapat mendaftar antrian secara online. Pilih dokter, tanggal kunjungan, dan isi keluhan.
                        Nomor antrian otomatis ter-generate.
                    </p>
                    <div
                        class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-emerald-500 to-teal-600 transition-all duration-300 group-hover:w-full">
                    </div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white p-8 shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div
                        class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-lg">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-gray-900">Notifikasi Real-time</h3>
                    <p class="text-gray-600">
                        Dapatkan notifikasi email saat giliran Anda dipanggil. Pantau status antrian secara real-time tanpa
                        perlu menunggu di klinik.
                    </p>
                    <div
                        class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-emerald-500 to-teal-600 transition-all duration-300 group-hover:w-full">
                    </div>
                </div>

                <!-- Feature 4 -->
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white p-8 shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div
                        class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-lg">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold text-gray-900">Riwayat Kunjungan</h3>
                    <p class="text-gray-600">
                        Lihat riwayat pendaftaran dan status antrian Anda. Batalkan antrian yang masih dalam status menunggu
                        kapan saja.
                    </p>
                    <div
                        class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-emerald-500 to-teal-600 transition-all duration-300 group-hover:w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Cara Kerja Sistem
                </h2>
                <p class="text-lg text-gray-600">
                    Mudah dan cepat, hanya dalam 4 langkah sederhana
                </p>
            </div>

            <div class="mx-auto mt-16 max-w-5xl">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Step 1 -->
                    <div class="relative text-center">
                        <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100">
                            <span class="text-3xl font-bold text-emerald-600">1</span>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-gray-900">Pilih Dokter</h3>
                        <p class="text-sm text-gray-600">Pilih dokter dan poli sesuai kebutuhan Anda</p>
                        <div class="absolute -right-4 top-10 hidden text-emerald-300 lg:block">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative text-center">
                        <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-teal-100">
                            <span class="text-3xl font-bold text-teal-600">2</span>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-gray-900">Daftar Antrian</h3>
                        <p class="text-sm text-gray-600">Isi form pendaftaran dengan keluhan Anda</p>
                        <div class="absolute -right-4 top-10 hidden text-teal-300 lg:block">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative text-center">
                        <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-cyan-100">
                            <span class="text-3xl font-bold text-cyan-600">3</span>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-gray-900">Dapatkan Nomor</h3>
                        <p class="text-sm text-gray-600">Nomor antrian otomatis diberikan sistem</p>
                        <div class="absolute -right-4 top-10 hidden text-cyan-300 lg:block">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center">
                        <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100">
                            <span class="text-3xl font-bold text-emerald-600">4</span>
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-gray-900">Pantau Status</h3>
                        <p class="text-sm text-gray-600">Tunggu giliran dan datang saat dipanggil</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Queue Rules Section -->
    <section class="bg-gradient-to-br from-emerald-50 to-teal-50 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Aturan & Ketentuan Antrian
                </h2>
                <p class="text-lg text-gray-600">
                    Perhatikan ketentuan berikut untuk kelancaran layanan
                </p>
            </div>

            <div class="mx-auto mt-16 grid max-w-5xl gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Rule 1 -->
                <div class="rounded-2xl bg-white p-8 shadow-lg">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-100">
                        <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Kuota Maksimal</h3>
                    <p class="text-gray-600">Maksimal 20 antrian per dokter per hari untuk kualitas pelayanan terbaik</p>
                </div>

                <!-- Rule 2 -->
                <div class="rounded-2xl bg-white p-8 shadow-lg">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-teal-100">
                        <svg class="h-6 w-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Satu Dokter Per Hari</h3>
                    <p class="text-gray-600">Tidak boleh mendaftar dua kali ke dokter yang sama di tanggal yang sama</p>
                </div>

                <!-- Rule 3 -->
                <div class="rounded-2xl bg-white p-8 shadow-lg">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-cyan-100">
                        <svg class="h-6 w-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Pembatalan Antrian</h3>
                    <p class="text-gray-600">Hanya bisa membatalkan antrian yang masih berstatus WAITING (Menunggu)</p>
                </div>

                <!-- Rule 4 -->
                <div class="rounded-2xl bg-white p-8 shadow-lg">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-100">
                        <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Keluhan Minimal</h3>
                    <p class="text-gray-600">Keluhan harus diisi minimal 10 karakter untuk membantu dokter memahami
                        kondisi</p>
                </div>

                <!-- Rule 5 -->
                <div class="rounded-2xl bg-white p-8 shadow-lg">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-teal-100">
                        <svg class="h-6 w-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Jadwal Praktik</h3>
                    <p class="text-gray-600">Perhatikan jadwal praktik dokter sebelum mendaftar antrian</p>
                </div>

                <!-- Rule 6 -->
                <div class="rounded-2xl bg-white p-8 shadow-lg">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-cyan-100">
                        <svg class="h-6 w-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">Notifikasi</h3>
                    <p class="text-gray-600">Aktifkan notifikasi email untuk mendapat pemberitahuan saat giliran dipanggil
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Status Section -->
    <section class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Status Antrian
                </h2>
                <p class="text-lg text-gray-600">
                    Pahami setiap status untuk memantau perkembangan antrian Anda
                </p>
            </div>

            <div class="mx-auto mt-16 grid max-w-4xl gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- WAITING -->
                <div class="rounded-2xl border-2 border-yellow-200 bg-yellow-50 p-6 text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-yellow-100">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-yellow-900">WAITING</h3>
                    <p class="text-sm text-yellow-700">Menunggu giliran dipanggil</p>
                </div>

                <!-- CALLED -->
                <div class="rounded-2xl border-2 border-blue-200 bg-blue-50 p-6 text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-blue-900">CALLED</h3>
                    <p class="text-sm text-blue-700">Sedang dipanggil, segera datang</p>
                </div>

                <!-- DONE -->
                <div class="rounded-2xl border-2 border-green-200 bg-green-50 p-6 text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-green-900">DONE</h3>
                    <p class="text-sm text-green-700">Pemeriksaan selesai</p>
                </div>

                <!-- CANCELED -->
                <div class="rounded-2xl border-2 border-red-200 bg-red-50 p-6 text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-red-100">
                            <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-red-900">CANCELED</h3>
                    <p class="text-sm text-red-700">Antrian dibatalkan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative overflow-hidden bg-gradient-to-r from-emerald-600 to-teal-600 py-24">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="relative z-10 mx-auto max-w-4xl px-6 text-center lg:px-8">
            <h2 class="mb-6 text-4xl font-bold text-white">
                Siap Menggunakan Sistem Antrian Digital?
            </h2>
            <p class="mb-10 text-xl text-white/90">
                Daftar sekarang dan nikmati kemudahan mengatur jadwal kunjungan ke klinik
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('register') }}"
                    class="group relative inline-flex items-center gap-2 overflow-hidden rounded-lg bg-white px-8 py-4 text-base font-semibold text-emerald-600 shadow-xl transition-all duration-200 hover:shadow-2xl active:scale-95">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="relative z-10">Daftar Sebagai Pasien</span>
                </a>
                <a href="#"
                    class="inline-flex items-center gap-2 rounded-lg border-2 border-white/30 bg-white/10 px-8 py-4 text-base font-semibold text-white backdrop-blur-sm transition-all duration-200 hover:bg-white/20">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login Admin
                </a>
            </div>
        </div>
    </section>

@endsection
