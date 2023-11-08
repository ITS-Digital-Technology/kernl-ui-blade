<ul class="-mx-2 flex items-center">
    @foreach ($supportNav as $item)
        @isset ($item['children'])
            @if(count($item['children']) > 0)
                @include('kernl-ui::includes.menus.support-navigation.link-with-children', [
                    'item' => $item, 
                    'dark' => $dark, 
                    'currentPath' => $currentPath 
                ])
            @else
                @include('kernl-ui::includes.menus.support-navigation.link', [
                    'item' => $item, 
                    'dark' => $dark, 
                    'currentPath' => $currentPath 
                ])
            @endif
        @endisset
    @endforeach
</ul>
