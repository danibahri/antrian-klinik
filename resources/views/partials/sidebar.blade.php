<!-- Sidebar -->
<div id="hs-sidebar-content-push"
    class="hs-overlay hs-overlay-open:translate-x-0 lg:hs-overlay-layout-open:translate-x-0 hs-overlay-open:translate-x-0 z-60 fixed bottom-0 start-0 top-0 hidden h-full w-64 -translate-x-full transform border-e border-gray-200 bg-white transition-all duration-300 [--auto-close:lg] [--body-scroll:true] [--body-scroll:true] [--is-layout-affect:true] [--opened:lg] lg:bottom-0 lg:end-auto lg:block lg:-translate-x-full lg:[--overlay-backdrop:false]"
    role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex h-full max-h-full flex-col">
        <!-- Header -->
        <header class="flex items-center justify-between gap-x-2 p-4">

            <a class="focus:outline-hidden flex-none text-xl font-semibold text-black focus:opacity-80" href="#"
                aria-label="Brand">Brand</a>

            <div class="-me-2 lg:hidden">
                <!-- Close Button -->
                <button type="button"
                    class="focus:outline-hidden flex size-6 items-center justify-center gap-x-3 rounded-full border border-gray-200 text-sm text-gray-600 hover:bg-gray-100 focus:bg-gray-100 disabled:pointer-events-none disabled:opacity-50"
                    data-hs-overlay="#hs-sidebar-content-push">
                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
                <!-- End Close Button -->
            </div>
        </header>
        <!-- End Header -->

        <!-- Body -->
        <nav
            class="h-full overflow-y-auto [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar]:w-2">
            <div class="hs-accordion-group flex w-full flex-col flex-wrap px-2 pb-0" data-hs-accordion-always-open>
                <ul class="space-y-1">
                    {{-- Dashboard --}}
                    <li>
                        <a class="focus:outline-hidden {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }} flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:bg-gray-100"
                            href="{{ route('admin.dashboard') }}">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    {{-- Antrian --}}
                    <li>
                        <a class="focus:outline-hidden {{ request()->routeIs('admin.queues*') ? 'bg-gray-100' : '' }} flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:bg-gray-100"
                            href="{{ route('admin.queues') }}">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Antrian
                        </a>
                    </li>

                    {{-- Dokter --}}
                    <li>
                        <a class="focus:outline-hidden {{ request()->routeIs('admin.doctors*') ? 'bg-gray-100' : '' }} flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:bg-gray-100"
                            href="{{ route('admin.doctors') }}">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="10" y1="10" x2="14" y2="10"></line>
                            </svg>
                            Dokter
                        </a>
                    </li>

                    {{-- Poli --}}
                    <li>
                        <a class="focus:outline-hidden {{ request()->routeIs('admin.polis*') ? 'bg-gray-100' : '' }} flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:bg-gray-100"
                            href="{{ route('admin.polis') }}">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                <line x1="12" y1="2" x2="12" y2="9"></line>
                                <line x1="9" y1="6" x2="15" y2="6"></line>
                            </svg>
                            Poli
                        </a>
                    </li>

                    {{-- Pasien --}}
                    <li>
                        <a class="focus:outline-hidden {{ request()->routeIs('admin.patients*') ? 'bg-gray-100' : '' }} flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:bg-gray-100"
                            href="{{ route('admin.patients') }}">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Pasien
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Body -->
    </div>
</div>
<!-- End Sidebar -->

<!-- Content -->
<div class="sm:hs-overlay-layout-open:ms-64 sticky top-0 z-50 transition-all duration-300">
    <!-- Navigation Toggle -->
    <div class="p-2 lg:hidden">
        <button type="button"
            class="focus:outline-hidden flex size-8 items-center justify-center gap-x-3 rounded-full text-sm text-gray-600 hover:bg-gray-100 focus:bg-gray-100 disabled:pointer-events-none disabled:opacity-50"
            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-sidebar-content-push"
            aria-label="Toggle navigation" data-hs-overlay="#hs-sidebar-content-push">
            <svg class="size-4 shrink-0 sm:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" />
                <path d="m8 9 3 3-3 3" />
            </svg>
            <svg class="hidden size-4 shrink-0 sm:block" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" />
                <path d="m10 15-3-3 3-3" />
            </svg>
            <span class="sr-only">Navigation Toggle</span>
        </button>
    </div>
    <!-- End Navigation Toggle -->
</div>
<!-- End Content -->
