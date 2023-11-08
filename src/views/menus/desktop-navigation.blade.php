<div x-ref="desktopNav" class="hidden xl:flex flex-col items-end">
    @if ($supportNav)
        @include('kernl-ui::menus.support-navigation')
    @endif

    @if ($links)
        <ul class="-mx-2 flex {{ $supportNav ? 'items-center my-3 text-right' : 'items-center' }}">
            @foreach ($links as $item)
                @isset($item['children'])
                    @if(count($item['children']) > 0)
                        @include('kernl-ui::includes.menus.desktop-navigation.item-with-children', [ 
                            'item' => $item, 
                            'dark' => $dark, 
                            'currentPath' => $currentPath 
                        ])
                    @else
                        @include('kernl-ui::includes.menus.desktop-navigation.item', [ 
                            'item' => $item, 
                            'dark' => $dark, 
                            'currentPath' => $currentPath 
                        ])
                    @endif
                @else
                    @include('kernl-ui::includes.menus.desktop-navigation.item', [ 
                        'item' => $item, 
                        'dark' => $dark, 
                        'currentPath' => $currentPath 
                    ])
                @endisset
            @endforeach

            @isset($afterLinksDesktop)
                {{ $afterLinksDesktop }}
            @endisset

            @if ($search)
                @include('kernl-ui::includes.headers.search-desktop')
            @endif
        </ul>
    @endif
</div>