<ul>
    @if(!empty($menuItems))
        @foreach($menuItems as $menuItem)
            @include('filament-menu-builder::components.plain.menu-item', ['item' => $menuItem])
        @endforeach
    @endif
</ul>
