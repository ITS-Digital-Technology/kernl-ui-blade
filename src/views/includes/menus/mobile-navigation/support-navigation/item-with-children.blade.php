<div class="w-full flex items-center justify-between text-left w-full border-b rounded-sm focus:outline-none focus:shadow-outline {{ $dark ? ' hover:bg-gray-900 hover:text-gray-100' : 'hover:bg-gray-50 text-gray-900'}}">
    <a 
        id="mobile-navbar-dropdown-{!! $loop->index !!}"
        class="inline-flex w-full items-center justify-between py-4 px-3"
        href="{{ $item['href'] }}"
    >
        {!! $item['text'] !!}
    </a>
    <button
        class="px-3 py-4"
        data-toggle="dropdown"
        aria-haspopup="true"
        @isset ($item['slug'])
            :aria-expanded="activeSection === '{{ $item['slug'] }}' ? 'true' : 'false'"
            x-on:keydown.space.prevent="toggle('{{ $item['slug'] }}')"
            x-on:keydown.enter.prevent="toggle('{{ $item['slug'] }}')"
            x-on:click.prevent="toggle('{{ $item['slug'] }}')"
        @else
            :aria-expanded="activeSection === '{{ $loop->index }}' ? 'true' : 'false'"
            x-on:keydown.space.prevent="toggle('{{ $loop->index }}')"
            x-on:keydown.enter.prevent="toggle('{{ $loop->index }}')"
            x-on:click.prevent="toggle('{{ $loop->index }}')"
        @endif
    >
        <i class="w-4 h-4 {{ $dark ? 'text-gray-50' : 'text-gray-900'}}" data-feather="chevron-down"></i>
    </button>
</div>
@isset ($item['children'])
    @if(count($item['children']) > 0)
        <ul 
            @isset ($item['slug'])
                x-show.transition.opacity.duration.300ms="activeSection == '{{ $item['slug'] }}'" 
            @else
                x-show.transition.opacity.duration.300ms="activeSection == '{{ $loop->index }}'" 
            @endif
            aria-labelledby="mobile-navbar-dropdown-{!! $loop->index !!}"
        >
            @foreach ($item['children'] as $child)
                <li class="relative w-full">
                    <span 
                        aria-hidden="true" 
                        class="absolute inset-y-0 left-0 ml-3 flex items-center text-xl leading-none"
                    >
                        &middot;
                    </span>
                    <a 
                        class="block py-4 pr-4 pl-8 whitespace-no-wrap focus:outline-none focus:shadow-outline 
                            {{ $dark ? 'text-gray-50 hover:bg-gray-50 hover:text-gray-900' : 'text-gray-900 hover:text-gray-50 hover:bg-gray-900'}}
                        "
                        href="{{ $child['href'] }}"
                        {!! $currentPath == $child['href'] ? 'aria-current="page"' : '' !!}
                        {!! \Illuminate\Support\Str::startsWith($child['href'], '#') ? '@click="navIsOpen = false"' : '' !!}
                    >
                        {!! $child['text'] !!}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endisset