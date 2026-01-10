@extends('layouts.app')

@section('title', 'Login - Sistem Antrian Klinik')

@section('content')
    <div class="relative flex min-h-screen">
        <!-- Left Side - Login Form -->
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
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Selamat Datang</h2>
                        <p class="text-base text-gray-600">Silakan login untuk mengakses sistem antrian</p>
                    </div>
                </div>

                {{-- error messages --}}
                @if ($errors->any())
                    <!-- Toast -->
                    <div id="dismiss-toast"
                        class="hs-removing:translate-x-5 hs-removing:opacity-0 mb-5 w-full rounded-xl border border-gray-200 bg-white transition duration-300"
                        role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                        <div class="flex p-4">
                            <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>

                            <div class="ms-auto">
                                <button type="button"
                                    class="focus:outline-hidden inline-flex size-5 shrink-0 items-center justify-center rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:opacity-100"
                                    aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                    <span class="sr-only">Close</span>
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Toast -->
                @endif

                <!-- Login Form -->
                <form class="space-y-6" method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                Email / Username
                            </span>
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email" placeholder="nama@email.com"
                                class="block w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-colors placeholder:text-gray-400 hover:border-gray-300 focus:border-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/10"
                                required>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Password
                            </span>
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Masukkan password"
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

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-emerald-600 transition-colors focus:ring-2 focus:ring-emerald-500 focus:ring-offset-0">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                Ingat saya
                            </label>
                        </div>
                        <a href="#"
                            class="text-sm font-semibold text-emerald-600 transition-colors hover:text-emerald-700">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="group relative flex w-full items-center justify-center gap-2 overflow-hidden rounded-lg bg-gradient-to-r from-emerald-600 to-teal-600 px-4 py-3.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 transition-all duration-200 hover:shadow-xl hover:shadow-emerald-500/40 focus:outline-none focus:ring-4 focus:ring-emerald-500/50 active:scale-[0.98]">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Masuk ke Sistem
                        </span>
                        <div
                            class="absolute inset-0 -z-10 bg-gradient-to-r from-emerald-700 to-teal-700 opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                        </div>
                    </button>

                    {{-- register link --}}
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                                class="font-semibold text-emerald-600 transition-colors hover:text-emerald-700">
                                Daftar di sini
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Footer Info -->
                <div class="mt-8 space-y-4">
                    <div class="flex items-center gap-3 rounded-lg border border-emerald-100 bg-emerald-50 p-4">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-sm">
                            <p class="font-semibold text-emerald-900">Butuh bantuan?</p>
                            <p class="text-emerald-700">Hubungi admin di <span class="font-semibold">0812-3456-7890</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Illustration -->
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
                            <!-- Doctor Icon -->
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
                                <!-- Stethoscope -->
                                <path d="M35 80c-5 10-5 20 0 30M85 80c5 10 5 20 0 30" stroke="#10b981" stroke-width="3"
                                    stroke-linecap="round" opacity="0.8" />
                                <circle cx="35" cy="110" r="5" fill="#10b981" opacity="0.8" />
                                <circle cx="85" cy="110" r="5" fill="#10b981" opacity="0.8" />
                            </g>
                        </svg>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="space-y-6 text-center">
                    <div>
                        <h2 class="mb-3 text-4xl font-bold leading-tight">Sistem Antrian Digital</h2>
                        <p class="text-xl text-white/90">Kelola antrian pasien dengan mudah dan efisien</p>
                    </div>

                    <!-- Features -->
                    <div class="mt-12 space-y-4">
                        <div
                            class="flex items-start gap-4 rounded-xl bg-white/10 p-4 backdrop-blur-sm transition-transform hover:scale-105">
                            <div class="flex-shrink-0 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="font-semibold">Real-time Updates</h3>
                                <p class="text-sm text-white/80">Pantau antrian secara langsung</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 rounded-xl bg-white/10 p-4 backdrop-blur-sm transition-transform hover:scale-105">
                            <div class="flex-shrink-0 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="font-semibold">Manajemen Pasien</h3>
                                <p class="text-sm text-white/80">Data pasien terorganisir dengan baik</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start gap-4 rounded-xl bg-white/10 p-4 backdrop-blur-sm transition-transform hover:scale-105">
                            <div class="flex-shrink-0 rounded-lg bg-white/20 p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h3 class="font-semibold">Laporan & Statistik</h3>
                                <p class="text-sm text-white/80">Analisis performa layanan klinik</p>
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
    </div>
@endsection
