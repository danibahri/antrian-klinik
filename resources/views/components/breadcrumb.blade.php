@props(['items' => []])

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        @foreach ($items as $index => $item)
            @if ($loop->last)
                {{-- Current page --}}
                <li aria-current="page">
                    <div class="flex items-center">
                        @if (!$loop->first)
                            <svg class="mx-1 h-3 w-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif
                        <span class="text-sm font-medium text-gray-500">{{ $item['label'] }}</span>
                    </div>
                </li>
            @else
                {{-- Breadcrumb link --}}
                <li>
                    <div class="flex items-center">
                        @if (!$loop->first)
                            <svg class="mx-1 h-3 w-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif
                        <a href="{{ $item['url'] }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-emerald-600">
                            @if ($loop->first && isset($item['icon']))
                                <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            @endif
                            {{ $item['label'] }}
                        </a>
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
