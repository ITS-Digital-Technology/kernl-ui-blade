<li>
    <a 
        class="
            inline-flex items-center px-4 py-1 text-sm rounded-sm leading-none
            hover:text-gray-800 hover:bg-gray-100 
            focus:outline-none focus:ring focus:ring-blue-400
            transition duration-200 
            {{ $dark ? 'text-white' : 'text-gray-800' }}
        " 
        href="{{ $item['href'] }}"
    >
        <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
        <span 
            class="
                py-1 border-b-2 
                {{ isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) 
                    ? 'border-gray-900' 
                    : 'border-transparent' 
                }}
            "
        >
            
            {{ $item['text'] }}
        </span>
    </a>
</li>