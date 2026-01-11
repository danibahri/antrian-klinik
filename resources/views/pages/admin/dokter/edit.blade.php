@extends('layouts.app')

@section('title', 'Edit Dokter')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">
            {{-- Breadcrumb --}}
            <div class="mb-4">
                <x-breadcrumb :items="[
                    ['label' => 'Dashboard', 'url' => route('admin.dashboard'), 'icon' => true],
                    ['label' => 'Kelola Dokter', 'url' => route('admin.doctors')],
                    ['label' => 'Edit Dokter'],
                ]" />
            </div>

            {{-- Form --}}
            <div class="mx-auto max-w-3xl">
                <div class="rounded-lg border border-gray-200 bg-white p-6">

                    {{-- Header --}}
                    <div class="mb-6 border-b border-gray-200 pb-4">
                        <h1 class="text-2xl font-bold text-gray-900">Edit Data Dokter</h1>
                        <p class="mt-1 text-sm text-gray-600">Perbarui informasi dokter</p>
                    </div>

                    <form method="POST" action="{{ route('admin.doctors.update', $doctor) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-5">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name', $doctor->name) }}"
                                    class="@error('name') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Dr. Ahmad Santoso, Sp.PD" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Poli --}}
                            <div>
                                <label for="poli_id" class="mb-2 block text-sm font-medium text-gray-900">
                                    Poli <span class="text-red-500">*</span>
                                </label>
                                <select id="poli_id" name="poli_id"
                                    class="@error('poli_id') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    required>
                                    <option value="">Pilih Poli</option>
                                    @foreach ($polis as $poli)
                                        <option value="{{ $poli->id }}"
                                            {{ old('poli_id', $doctor->poli_id) == $poli->id ? 'selected' : '' }}>
                                            {{ $poli->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('poli_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Specialization --}}
                            <div>
                                <label for="specialization" class="mb-2 block text-sm font-medium text-gray-900">
                                    Spesialisasi
                                </label>
                                <input type="text" id="specialization" name="specialization"
                                    value="{{ old('specialization', $doctor->specialization) }}"
                                    class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Contoh: Penyakit Dalam">
                                @error('specialization')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Schedule Day --}}
                            <div>
                                <label for="schedule_day" class="mb-2 block text-sm font-medium text-gray-900">
                                    Hari Praktik <span class="text-red-500">*</span>
                                </label>
                                <select id="schedule_day" name="schedule_day"
                                    class="@error('schedule_day') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    required>
                                    <option value="">Pilih Hari</option>
                                    @foreach ($days as $day)
                                        <option value="{{ $day }}"
                                            {{ old('schedule_day', $doctor->schedule_day) == $day ? 'selected' : '' }}>
                                            {{ $day }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('schedule_day')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Time Range --}}
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="start_time" class="mb-2 block text-sm font-medium text-gray-900">
                                        Jam Mulai <span class="text-red-500">*</span>
                                    </label>
                                    <input type="time" id="start_time" name="start_time"
                                        value="{{ old('start_time', $doctor->start_time ? \Carbon\Carbon::parse($doctor->start_time)->format('H:i') : '') }}"
                                        class="@error('start_time') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                        required>
                                    @error('start_time')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="end_time" class="mb-2 block text-sm font-medium text-gray-900">
                                        Jam Selesai <span class="text-red-500">*</span>
                                    </label>
                                    <input type="time" id="end_time" name="end_time"
                                        value="{{ old('end_time', $doctor->end_time ? \Carbon\Carbon::parse($doctor->end_time)->format('H:i') : '') }}"
                                        class="@error('end_time') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                        required>
                                    @error('end_time')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label for="phone" class="mb-2 block text-sm font-medium text-gray-900">
                                    Nomor Telepon
                                </label>
                                <input type="text" id="phone" name="phone"
                                    value="{{ old('phone', $doctor->phone) }}"
                                    class="block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="08123456789">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
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
                            <a href="{{ route('admin.doctors') }}"
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
