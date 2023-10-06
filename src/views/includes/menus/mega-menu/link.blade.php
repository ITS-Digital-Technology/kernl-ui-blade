<a
    @if ($item['href'])
        href="{{ $item['href'] }}"
    @endif
    class="
        inline-flex items-center px-4 py-1 text-sm rounded-sm 
        hover:bg-gray-100 transition duration-200 hover:text-gray-800 hover:cursor-pointer focus:outline-none focus:ring focus:ring-blue-400
        {{ $dark ? 'text-white' : 'text-gray-800' }}
    "
>
    <span class="py-1 border-b-2 border-transparent">{!! $item['text'] !!}</span>
</a>