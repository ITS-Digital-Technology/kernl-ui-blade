<a
    class="inline-block w-full py-4 px-3 border-b rounded-sm focus:outline-none focus:ring focus:ring-blue-400 
        {{ $item['classes'] ?? '' }}
        {{ $item['active'] ? 'active' : '' }}
        {{ $dark ? 'hover:text-gray-50 hover:bg-gray-900' : 'hover:text-gray-900 hover:bg-gray-50'}}
    "
    href="{{ $item['href'] }}"
    {!! $currentPath == $item['href'] ? 'aria-current="page"' : '' !!}
    {!! \Illuminate\Support\Str::startsWith($item['href'], '#') ? '@click="navIsOpen = false"' : '' !!}
>
    {{ $item['text'] }}
</a>