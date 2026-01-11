@extends('layouts.app')

@section('title', 'Edit Poli')

@section('content')
    <div class="min-h-screen bg-gray-50 lg:ps-64">
        <div class="w-full p-4 sm:p-6 lg:p-8">
            {{-- Breadcrumb --}}
            <div class="mb-4">
                <x-breadcrumb :items="[
                    ['label' => 'Dashboard', 'url' => route('admin.dashboard'), 'icon' => true],
                    ['label' => 'Kelola Poli', 'url' => route('admin.polis')],
                    ['label' => 'Edit Poli'],
                ]" />
            </div>

            {{-- Form --}}
            <div class="mx-auto max-w-3xl">
                <div class="rounded-lg border border-gray-200 bg-white p-6">

                    {{-- Header --}}
                    <div class="mb-6 border-b border-gray-200 pb-4">
                        <h1 class="text-2xl font-bold text-gray-900">Edit Data Poli</h1>
                        <p class="mt-1 text-sm text-gray-600">Perbarui informasi poli</p>
                    </div>

                    <form method="POST" action="{{ route('admin.polis.update', $poli) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-5">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Poli <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name', $poli->name) }}"
                                    class="@error('name') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Contoh: Poli Umum" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div>
                                <label for="description" class="mb-2 block text-sm font-medium text-gray-900">
                                    Deskripsi
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="@error('description') border-red-500 @enderror block w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-emerald-500"
                                    placeholder="Deskripsi singkat tentang poli ini">{{ old('description', $poli->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                            </div>

                            {{-- Doctor Count Info --}}
                            <div class="rounded-lg border border-blue-200 bg-blue-50 p-4">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-900">Informasi</h3>
                                        <p class="mt-1 text-sm text-blue-700">
                                            Poli ini saat ini memiliki <span
                                                class="font-semibold">{{ $poli->doctors()->count() }} dokter</span> yang
                                            terdaftar.
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
                            <a href="{{ route('admin.polis') }}"
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
