<button
    @click="
        isOpen = !isOpen;
        let windowSize = screen.width;
        megaMenu($el, windowSize);
    "
    @isset($item['children'])
        @if($item['children'])
            x-on:click.prevent
            aria-expanded="false"
        @endif
    @endif
    :class="isOpen ? 'bg-gray-100 text-gray-800' : ''"
    class="inline-flex items-center pl-4 py-1 text-sm rounded-sm hover:bg-gray-100 transition duration-200 hover:text-gray-800 hover:cursor-pointer focus:outline-none focus:ring focus:ring-blue-400
        {{ $dark ? 'text-white' : 'text-gray-800' }}
        @empty($item['children'])
            pr-4
        @endif
    "
>
    <span class="py-1 border-b-2 border-transparent">{!! $item['text'] !!}</span>
    @isset($item['children'])
        @if ($item['children'])
            <svg 
                class="text-gray-400 mx-4 xl:ml-1 xl:mr-5 h-5 w-5 group-hover:text-gray-500 transition ease-in-out duration-150" 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 20 20" 
                fill="currentColor" 
                aria-hidden="true"
            >
                <path 
                    fill-rule="evenodd" 
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                    clip-rule="evenodd" 
                />
            </svg>
        @endif
    @endif
</button>