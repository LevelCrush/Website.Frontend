<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @if(!empty($menuItems))
        @foreach($menuItems as $menuItem)

            @if($menuItem->parameters->isNotEmpty() && isset($menuItem->parameters['guest']))
                @auth
                    @continue
                @endauth
            @endif

            @if($menuItem->parameters->isNotEmpty() && isset($menuItem->parameters['member']))
                @guest
                    @continue
                @endguest
            @endif

            @if($menuItem->parameters->isNotEmpty() && isset($menuItem->parameters['admin']))

                @guest
                    @continue
                @endguest

                @if(session('metadata',['discord' => ['isAdmin' => false]])['discord']['isAdmin'] === false)
                    @continue
                @endif

            @endif

            @include('filament-menu-builder::components.offcanvas.menu-item', ['item' => $menuItem])
        @endforeach
    @endif
</ul>
