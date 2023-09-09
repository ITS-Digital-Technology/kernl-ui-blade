<ul class="-mx-2 flex items-center">
    @foreach ($supportNav as $item)
        @isset ($item['children'])
            @if(count($item['children']) > 0)
                @include('kernl-ui::includes.menus.mega-menu.support-navigation.link-with-children', ['item' => $item])
            @else
                @include('kernl-ui::includes.menus.mega-menu.support-navigation.link', ['item' => $item])
            @endif
        @endif
    @endforeach
</ul>
