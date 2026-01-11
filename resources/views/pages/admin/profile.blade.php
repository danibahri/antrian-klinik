@extends('layouts.app')

@section('title', 'Profil Admin')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Profil Admin</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola informasi profil Anda</p>
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

            <div class="mx-auto max-w-4xl">
                <div class="grid gap-6 lg:grid-cols-3">
                    {{-- Profile Card --}}
                    <div class="rounded-lg border border-gray-200 bg-white p-6 lg:col-span-1">
                        <div class="flex flex-col items-center text-center">
                            <div
                                class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-emerald-600 to-teal-600">
                                <span class="text-4xl font-bold text-white">{{ substr($admin->name, 0, 1) }}</span>
                            </div>
                            <h2 class="mt-4 text-xl font-bold text-gray-900">{{ $admin->name }}</h2>
                            <p class="mt-1 text-sm text-gray-600">{{ $admin->email }}</p>
                            <span
                                class="mt-3 inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">
                                <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Administrator
                            </span>
                        </div>

                        <div class="mt-6 space-y-3 border-t border-gray-200 pt-6">
                            <div class="flex items-center text-sm">
                                <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-gray-600">{{ $admin->phone ?? 'Belum diisi' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-600">
                                    {{ $admin->date_of_birth ? $admin->date_of_birth->format('d F Y') : 'Belum diisi' }}
                                </span>
                            </div>
                            <div class="flex items-start text-sm">
                                <svg class="mr-3 mt-0.5 h-5 w-5 flex-shrink-0 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-gray-600">{{ $admin->address ?? 'Belum diisi' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Edit Form --}}
                    <div class="rounded-lg border border-gray-200 bg-white p-6 lg:col-span-2">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Edit Profil</h3>
                            <p class="mt-1 text-sm text-gray-600">Perbarui informasi profil Anda</p>
                        </div>

                        <form method="POST" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="space-y-5">
                                {{-- Name --}}
                                <div>
                                    <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $admin->name) }}"
                                        class="@error('name') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                        required>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="mb-2 block text-sm font-medium text-gray-900">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="email" name="email"
                                        value="{{ old('email', $admin->email) }}"
                                        class="@error('email') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                        required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <label for="phone" class="mb-2 block text-sm font-medium text-gray-900">
                                        Nomor Telepon
                                    </label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ old('phone', $admin->phone) }}"
                                        class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                        placeholder="08123456789">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Date of Birth --}}
                                <div>
                                    <label for="date_of_birth" class="mb-2 block text-sm font-medium text-gray-900">
                                        Tanggal Lahir
                                    </label>
                                    <input type="date" id="date_of_birth" name="date_of_birth"
                                        value="{{ old('date_of_birth', $admin->date_of_birth ? $admin->date_of_birth->format('Y-m-d') : '') }}"
                                        class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    @error('date_of_birth')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div>
                                    <label for="address" class="mb-2 block text-sm font-medium text-gray-900">
                                        Alamat
                                    </label>
                                    <textarea id="address" name="address" rows="3"
                                        class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                        placeholder="Alamat lengkap">{{ old('address', $admin->address) }}</textarea>
                                    @error('address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Password Section --}}
                                <div class="rounded-lg border border-blue-200 bg-blue-50 p-4">
                                    <div class="flex items-start">
                                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-blue-900">Ubah Password</h3>
                                            <p class="mt-1 text-sm text-blue-700">
                                                Kosongkan field password jika tidak ingin mengubah password.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid gap-4 sm:grid-cols-2">
                                    <div>
                                        <label for="password" class="mb-2 block text-sm font-medium text-gray-900">
                                            Password Baru
                                        </label>
                                        <input type="password" id="password" name="password"
                                            class="@error('password') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                        @error('password')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation"
                                            class="mb-2 block text-sm font-medium text-gray-900">
                                            Konfirmasi Password
                                        </label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="mt-6 flex items-center gap-3 border-t border-gray-200 pt-6">
                                <button type="submit"
                                    class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="inline-flex items-center gap-x-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
