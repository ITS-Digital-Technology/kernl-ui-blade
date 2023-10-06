<div x-ref="desktopNav" class="hidden xl:flex flex-col items-end" x-cloak>
    @if ($supportNav)
        @include('kernl-ui::menus.support-navigation')
    @endif

    @if ($links)
        <ul class="-mx-2 flex {{ $supportNav ? 'items-center my-3' : 'items-center' }}">
            @foreach ($links as $item)
                {{-- Mega Menu Item --}}
                <div 
                    x-data="{
                        isOpen: false
                    } 
                    "class="relative" 
                    role="listitem"
                >
                    <div>
                        @if ($item['children'])
                            @include('kernl-ui::includes.menus.mega-menu.link-with-children', [
                                'item' => $item
                            ])
                        @else
                            @include('kernl-ui::includes.menus.mega-menu.link', [
                                'item' => $item 
                            ])
                        @endif
                        @isset($item['children'])
                            @if($item['children'])
                                @include('kernl-ui::includes.menus.mega-menu.pop-out', [
                                    'item' => $item,
                                    'megaMenuCta' => $megaMenuCta, 
                                    'megaMenuCopy' => $megaMenuCopy, 
                                    'megaMenuAlert' => $megaMenuAlert 
                                ])
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
            @isset($afterLinksDesktop)
                {{ $afterLinksDesktop }}
            @endif
            @if ($search)
                @include('kernl-ui::includes.headers.search-desktop')
            @endif
        </ul>
    @endif
</div>