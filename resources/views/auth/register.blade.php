@extends('layouts.app')

@section('title', 'Daftar - Sistem Antrian Klinik')

@section('content')
    <div class="relative flex min-h-screen">
        <!-- Left Side - Illustration -->
        <div
            class="relative hidden overflow-hidden bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 p-12 lg:flex lg:w-1/2 lg:flex-col lg:justify-center">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0"
                    style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
                </div>
            </div>

            <div class="relative z-10 mx-auto max-w-lg text-white">
                <!-- Medical Illustration -->
                <div class="mb-8 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 animate-pulse rounded-full bg-white/20 blur-3xl"></div>
                        <svg class="relative h-64 w-64" viewBox="0 0 200 200" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <!-- Patient Icon -->
                            <circle cx="100" cy="100" r="90" fill="white" opacity="0.1" />
                            <circle cx="100" cy="100" r="75" fill="white" opacity="0.15" />
                            <g transform="translate(50, 40)">
                                <!-- Head -->
                                <circle cx="50" cy="35" r="25" fill="white" opacity="0.95" />
                                <!-- Body -->
                                <path d="M25 60c0-13.807 11.193-25 25-25s25 11.193 25 25v50H25V60z" fill="white"
                                    opacity="0.9" />
                                <!-- Face -->
                                <circle cx="43" cy="32" r="3" fill="#1a1a1a" />
                                <circle cx="57" cy="32" r="3" fill="#1a1a1a" />
                                <path d="M43 42c0 3.866 3.134 7 7 7s7-3.134 7-7" stroke="#1a1a1a" stroke-width="2"
                                    stroke-linecap="round" fill="none" />
                                <!-- Registration Document -->
                                <rect x="65" y="70" width="30" height="35" rx="2" fill="#10b981"
                                    opacity="0.9" />
                                <line x1="70" y1="77" x2="90" y2="77" stroke="white"
                                    stroke-width="2" stroke-linecap="round" />
                                <line x1="70" y1="85" x2="90" y2="85" stroke="white"
                                    stroke-width="2" stroke-linecap="round" />
                                <line x1="70" y1="93" x2="85" y2="93" stroke="white"
                                    stroke-width="2" stroke-linecap="round" />
                                <!-- Checkmark -->
                                <path d="M72 98l3 3 6-6" stroke="white" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" fill="none" />
                            </g>
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-6 text-center">
                    <div>
                        <h2 class="mb-3 text-4xl font-bold leading-tight">Bergabung Bersama Kami</h2>
                        <p class="text-xl text-white/90">Daftar dan nikmati kemudahan layanan antrian digital</p>
                    </div>

                    <!-- Benefits -->
                    <div class="mt-12 space-y-4">
                        <div
                            class="flex items-start gap-4 rounded-xl bg-white/10 p-4 backdrop-blur-sm transition-transform hover:scale-105">
                            <div class="flex-shrink-0 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="font-semibold">Daftar Cepat & Mudah</h3>
                                <p class="text-sm text-white/80">Proses pendaftaran hanya beberapa menit</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 rounded-xl bg-white/10 p-4 backdrop-blur-sm transition-transform hover:scale-105">
                            <div class="flex-shrink-0 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="font-semibold">Aman & Terpercaya</h3>
                                <p class="text-sm text-white/80">Data Anda terlindungi dengan baik</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 rounded-xl bg-white/10 p-4 backdrop-blur-sm transition-transform hover:scale-105">
                            <div class="flex-shrink-0 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="font-semibold">Akses 24/7</h3>
                                <p class="text-sm text-white/80">Daftar antrian kapan saja, dimana saja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Elements -->
            <div class="absolute left-10 top-10 h-20 w-20 animate-bounce rounded-full bg-white/10 backdrop-blur-lg"
                style="animation-duration: 3s;"></div>
            <div class="absolute bottom-10 right-10 h-16 w-16 animate-bounce rounded-full bg-white/10 backdrop-blur-lg"
                style="animation-duration: 4s; animation-delay: 1s;"></div>
            <div class="absolute right-20 top-1/2 h-12 w-12 animate-bounce rounded-full bg-white/10 backdrop-blur-lg"
                style="animation-duration: 5s; animation-delay: 2s;"></div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="flex w-full flex-col justify-center px-6 py-12 lg:w-1/2 lg:px-12 xl:px-20">
            <div class="mx-auto w-full max-w-md">
                <!-- Logo & Header -->
                <div class="mb-8">
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg">
                            <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Klinik Sehat</h1>
                            <p class="text-sm text-gray-500">Sistem Antrian Digital</p>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Buat Akun Baru</h2>
                        <p class="text-base text-gray-600">Lengkapi data diri Anda untuk mendaftar</p>
                    </div>
                </div>

                <!-- Register Form -->
                <form class="space-y-5" method="POST" action="#">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Nama Lengkap
                            </span>
                        </label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap"
                            class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                            required>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                Alamat Email
                            </span>
                        </label>
                        <input type="email" id="email" name="email" placeholder="nama@email.com"
                            class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                            required>
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Nomor Telepon
                            </span>
                        </label>
                        <input type="tel" id="phone" name="phone" placeholder="08xx-xxxx-xxxx"
                            class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                            required>
                    </div>

                    <!-- Date of Birth Field -->
                    <div>
                        <label for="date_of_birth" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Tanggal Lahir
                            </span>
                        </label>
                        <input type="date" id="date_of_birth" name="date_of_birth"
                            class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                            required>
                    </div>

                    <!-- Address Field -->
                    <div>
                        <label for="address" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Alamat Lengkap
                            </span>
                        </label>
                        <textarea id="address" name="address" rows="2" placeholder="Masukkan alamat lengkap"
                            class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                            required></textarea>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Password
                            </span>
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter"
                                class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                                required>
                            <button type="button"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Password Confirmation Field -->
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Konfirmasi Password
                            </span>
                        </label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Ulangi password"
                                class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                                required>
                            <button type="button"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="flex items-start">
                        <input id="terms" name="terms" type="checkbox"
                            class="mt-1 h-4 w-4 rounded border-gray-300 text-emerald-600 transition-colors focus:ring-2 focus:ring-emerald-500 focus:ring-offset-0"
                            required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            Saya menyetujui <a href="#"
                                class="font-semibold text-emerald-600 hover:text-emerald-700">Syarat
                                & Ketentuan</a> serta <a href="#"
                                class="font-semibold text-emerald-600 hover:text-emerald-700">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="group relative flex w-full items-center justify-center gap-2 overflow-hidden rounded-lg bg-gradient-to-r from-emerald-600 to-teal-600 px-4 py-3.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 transition-all duration-200 hover:shadow-xl hover:shadow-emerald-500/40 focus:outline-none focus:ring-4 focus:ring-emerald-500/50 active:scale-[0.98]">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Daftar Sekarang
                        </span>
                        <div
                            class="absolute inset-0 -z-10 bg-gradient-to-r from-emerald-700 to-teal-700 opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                        </div>
                    </button>
                </form>

                <!-- Footer Info -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                            class="font-semibold text-emerald-600 transition-colors hover:text-emerald-700">
                            Login di sini
                        </a>
                    </p>
                </div>

                <!-- Additional Info -->
                <div class="mt-6">
                    <div class="flex items-start gap-3 rounded-lg border border-emerald-100 bg-emerald-50 p-4">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-sm">
                            <p class="font-semibold text-emerald-900">Info Penting</p>
                            <p class="text-emerald-700">Pastikan data yang Anda masukkan sudah benar. Data ini akan
                                digunakan untuk keperluan pendaftaran antrian.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
