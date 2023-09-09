{{-- Mega Menu - Pop-out --}}
<div
    id="pop-out-{!! $loop['index'] !!}"
    aria-labelledby="pop-out-btn-{!! $loop['index'] !!}"
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-1"
    @click.away="isOpen = false"
    @mouseleave="isOpen = false"
    x-on:keydown.window.escape="isOpen = false"
    class="absolute z-10 transform mt-3 px-2 w-screen shadow-lg max-w-md sm:px-0 lg:max-w-max"                    
>
    <div class="pt-4 pl-8 pr-16 bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="relative bg-white px-5 py-3 mt-6">
            <a 
                href="{!! $item['href'] !!}" 
                class="-m-3 pr-1 flex mb-1 items-start  border-l-3 border-transparent hover:border-red-700 transition ease-in-out duration-150"
            >
                <div class="mx-4">
                    <p class="text-base uppercase font-medium text-gray-800 text-sm leading-5">
                        {!! $item['text'] !!}
                    </p>
                </div>
            </a>
        </div>
        @php 
            $childrenCount = count($item['children']);
            $cols = ceil($childrenCount/6);
        @endphp
        <ul class="relative grid gap-6 bg-white px-5 py-3 sm:gap-8 sm:p-8 lg:grid-cols-{!! $cols !!}">
            @foreach ($item['children'] as $child)
                <li>
                    <a 
                        @if($loop->last && !$megaMenuCta )
                            x-on:keydown.tab="isOpen = false"
                        @endif
                        href="{!! $child['href'] !!}" 
                        class="-m-3 pr-1 flex mb-1 h-5 items-center border-l-3 border-transparent hover:border-red-700 transition ease-in-out duration-150"
                    >
                        <div class="mx-4">
                            <p class="text-base font-medium hover:underline text-gray-800 leading-5 hover:text-black">
                                {!! $child['text'] !!}
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Mega Menu CTA --}}
    @if($megaMenuCta)
        <div class="p-5 w-full bg-gray-cool-100 sm:p-8">
            <a 
                x-on:keydown.tab="isOpen = false"
                target="{!! $megaMenuCta['target'] !!}" 
                href="{!! $megaMenuCta['url'] !!}" 
                class="-m-3 p-1 flow-root rounded-md hover:bg-gray-100 transition ease-in-out duration-150"
            >
                <span class="flex items-center">
                    <span class="text-base font-medium text-gray-800 leading-5">
                        {!! $megaMenuCta['title'] !!}
                    </span>
                
                    @if ($megaMenuAlert)
                        <span class="ml-3 inline-flex items-center px-3 py-0.5 text-xs font-medium leading-5 bg-gray-cool-300">
                            {!! $megaMenuAlert !!}
                        </span>
                    @endif

                </span>
                
                @if($megaMenuCopy)
                    <span class="mt-1 block text-sm text-gray-500">
                        {!! $megaMenuCopy !!}
                    </span>
                @endif
            </a>
        </div>
    @endif
</div>