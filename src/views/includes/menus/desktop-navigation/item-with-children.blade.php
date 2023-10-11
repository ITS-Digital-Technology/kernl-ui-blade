<li
    class="relative"
    @isset ($item['slug'])
        x-on:mouseenter="activeSection = '{{ $item['slug'] }}'"
    @else
        x-on:mouseenter="activeSection = '{{ $loop->index }}'"
    @endisset
    x-on:mouseleave="activeSection = null"
    x-on:keydown.window.escape="activeSection = null"
>
    <a
        id="navbar-dropdown-{!! $loop->index !!}"
        class="
            inline-flex items-end px-4 py-1 rounded-sm 
            text-sm leading-none text-right
            hover:bg-gray-100 hover:text-gray-800 
            focus:outline-none focus:ring focus:ring-blue-400
            {{ $dark ? 'text-white' : 'text-gray-800' }} 
        "
        href="{{ $item['href'] }}"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true"
        @isset ($item['slug'])
            :aria-expanded="activeSection === '{{ $item['slug'] }}' ? 'true' : 'false'"
            @keydown.space.prevent="toggle('{{ $item['slug'] }}')"
            @keydown.enter.prevent="toggle('{{ $item['slug'] }}')"
            @keydown.arrow-down.prevent="focusNextLink($event, '{{ $item['slug'] }}')"
        @else
            :aria-expanded="activeSection === {{ $loop->index }} ? 'true' : 'false'"
            @keydown.space.prevent="toggle({{ $loop->index }})"
            @keydown.enter.prevent="toggle({{ $loop->index }})"
            @keydown.arrow-down.prevent="focusNextLink($event, {{ $loop->index }})"
        @endisset
        {!! $currentPath == $item['href'] ? 'aria-current="page"' : '' !!}
    >
        <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
        <span 
            class="
                py-1 border-b-2 
                {{ 
                    isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) 
                        ? 'border-gray-900' 
                        : 'border-transparent' 
                }}
            "
        >
            {{ $item['text'] }}
        </span>
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="24" 
            height="24" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="currentColor" 
            stroke-width="2" 
            stroke-linecap="round" 
            stroke-linejoin="round"
            @isset ($item['slug']) 
                :class="{ 
                    'text-gray-800': activeSection === '{{ $item['slug'] }}'
                }"
            @else
                :class="{ 
                    'text-gray-800': activeSection === '{{ $loop->index }}'
                }"
            @endisset
            class="
                feather feather-chevron-down ml-1 w-8 h-4 mb-1 
                {{ $dark ? 'text-gray-200' : 'text-gray-800' }}
            "
        >
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </a>
    <div
        @isset ($item['slug'])
            :class="{ 
                'flex': activeSection === '{{ $item['slug'] }}', 
                'hidden': activeSection !== '{{ $item['slug'] }}' 
            }"
        @else
            :class="{ 
                'flex': activeSection === '{{ $loop->index }}', 
                'hidden': activeSection !== '{{ $loop->index }}' 
            }"
        @endisset
        class="
            absolute right-0 top-0 z-10 w-64 mt-8 flex-col items-start justify-start py-2 text-left
            shadow-sm rounded-sm
            {{ $dark ? 'bg-gray-700' : 'bg-white' }}
        "
        aria-labelledby="navbar-dropdown-{!! $loop->index !!}"
        x-cloak
    >
        @foreach ($item['children'] as $child)
            <!-- When this page is active, remove `text-gray-600` and add `text-gray-900` to the anchor below -->
            <a
               
                class="
                    block w-full py-1.5 px-3 
                    text-sm transition-colors 
                    focus:outline-none focus:ring focus:ring-blue-500 hover:underline
                    {{ $dark ?'text-gray-200 hover:text-gray-50' : 'text-gray-800' }}
                "
                href="{{ $child['href'] }}"
                @if($loop->last)
                    x-on:keydown.tab="activeSection = null"
                @endif
                @keydown.arrow-up.prevent="focusPreviousLink"
                @keydown.arrow-down.prevent="focusNextLink"
            >
                <!-- When this page is active, remove `border-transparent` and add `border-gray-600` to the span below -->
                <span class="block w-full px-2 border-l-2 border-transparent">
                    {!! $child['text'] !!}
                </span>
            </a>
        @endforeach
    </div>
</li>