@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">
            {{-- Breadcrumb --}}
            <div class="mb-4">
                <x-breadcrumb :items="[
                    ['label' => 'Dashboard', 'url' => route('admin.dashboard'), 'icon' => true],
                    ['label' => 'Kelola Pasien', 'url' => route('admin.patients')],
                    ['label' => 'Edit Pasien'],
                ]" />
            </div>

            {{-- Form --}}
            <div class="mx-auto max-w-3xl">
                <div class="rounded-lg border border-gray-200 bg-white p-6">

                    {{-- Header --}}
                    <div class="mb-6 border-b border-gray-200 pb-4">
                        <h1 class="text-2xl font-bold text-gray-900">Edit Data Pasien</h1>
                        <p class="mt-1 text-sm text-gray-600">Perbarui informasi pasien</p>
                    </div>

                    <form method="POST" action="{{ route('admin.patients.update', $patient) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-5">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $patient->name) }}"
                                    class="@error('name') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Ahmad Santoso" required>
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
                                    value="{{ old('email', $patient->email) }}"
                                    class="@error('email') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="ahmad@example.com" required>
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
                                    value="{{ old('phone', $patient->phone) }}"
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
                                    value="{{ old('date_of_birth', $patient->date_of_birth ? $patient->date_of_birth->format('Y-m-d') : '') }}"
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
                                    placeholder="Alamat lengkap pasien">{{ old('address', $patient->address) }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="rounded-lg border border-blue-200 bg-blue-50 p-4">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-900">Informasi Password</h3>
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
                                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-900">
                                        Konfirmasi Password
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                </div>
                            </div>

                            {{-- Queue History Info --}}
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-gray-900">Riwayat Kunjungan</h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Pasien ini memiliki <span
                                                class="font-semibold">{{ $patient->queues()->count() }} kunjungan</span>
                                            yang tercatat.
                                        </p>
                                    </div>
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
                                Perbarui Data
                            </button>
                            <a href="{{ route('admin.patients') }}"
                                class="inline-flex items-center gap-x-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
