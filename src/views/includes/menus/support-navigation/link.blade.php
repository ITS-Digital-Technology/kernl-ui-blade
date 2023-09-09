<li>
    <a 
        class="
            inline-flex items-center px-3 text-xs border-gray-500 
            transition duration-100 tracking-wide uppercase
            hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-400
            {{ $item['isLast'] ? '' : ' border-r' }}
            {{ $item['isFeatured'] ? ' font-bold' : '' }}
            @if($dark)
                text-white
            @else
                text-gray-800
            @endif 
        "
        href="{{ $item['href'] }}"
    >
        <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
        <span 
            class="
                py-1 border-b-2 
                {{ 
                    isset($item['match']) 
                        && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) 
                        ? 'border-gray-900' : 'border-transparent' 
                }}
            "
        >
            {{ $item['text'] }}
        </span>
    </a>
</li>