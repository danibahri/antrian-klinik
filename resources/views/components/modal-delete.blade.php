@props([
    'id' => 'deleteModal',
    'title' => 'Konfirmasi Hapus',
    'message' => 'Apakah Anda yakin ingin menghapus data ini?',
])

<div id="{{ $id }}"
    class="hs-overlay pointer-events-none fixed start-0 top-0 z-[80] hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
    role="dialog" tabindex="-1" aria-labelledby="{{ $id }}-label" data-hs-overlay-keyboard="false">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 m-3 mt-0 opacity-0 transition-all ease-out sm:mx-auto sm:w-full sm:max-w-lg">
        <div
            class="shadow-2xs pointer-events-auto flex flex-col rounded-xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3 dark:border-neutral-700">
                <h3 id="{{ $id }}-label" class="font-bold text-gray-800 dark:text-white">
                    {{ $title }}
                </h3>
                <button type="button"
                    class="focus:outline-hidden inline-flex size-8 items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#{{ $id }}">
                    <span class="sr-only">Close</span>
                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="overflow-y-auto p-4">
                <div class="flex gap-x-4">
                    <div
                        class="flex size-[46px] shrink-0 items-center justify-center rounded-lg bg-red-100 dark:bg-red-700/30">
                        <svg class="size-5 shrink-0 text-red-600 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z">
                            </path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                        </svg>
                    </div>
                    <div class="grow">
                        <h3 class="mb-2 text-sm font-semibold text-gray-800 dark:text-white">
                            Perhatian
                        </h3>
                        <p class="text-sm text-gray-800 dark:text-neutral-400">
                            {{ $message }}
                        </p>
                        <p class="mt-2 text-xs text-gray-600 dark:text-neutral-500">
                            Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="flex items-center justify-end gap-x-2 border-t border-gray-200 px-4 py-3 dark:border-neutral-700">
                <button type="button"
                    class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                    data-hs-overlay="#{{ $id }}">
                    Batal
                </button>
                <button type="button"
                    class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700 focus:bg-red-700 disabled:pointer-events-none disabled:opacity-50"
                    onclick="document.getElementById('delete-form-{{ $id }}').submit()">
                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M3 6h18"></path>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                        <line x1="10" x2="10" y1="11" y2="17"></line>
                        <line x1="14" x2="14" y1="11" y2="17"></line>
                    </svg>
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
