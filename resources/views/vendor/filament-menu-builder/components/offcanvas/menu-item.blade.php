<li class="nav-item {{ $item->wrapper_class }} @if(! $item->children->isEmpty()) dropdown @endif">
    @if($item->children->isEmpty())
        <a
            target="{{ $item->target }}"
            class="nav-link {{ $item->link_class }}"
            href="{{ $item->link }}"
        >
            {{ $item->name }}
        </a>
    @else
        <a
            class="nav-link dropdown-toggle {{ $item->link_class }}"
            href="{{ $item->link }}"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            {{ $item->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($item->children as $child)
                @if($child->parameters->isNotEmpty() && isset($child->parameters['guest']))
                    @auth
                        @continue
                    @endauth
                @endif

                @if($child->parameters->isNotEmpty() && isset($child->parameters['member']))
                    @guest
                        @continue
                    @endguest
                @endif

                @if($child->parameters->isNotEmpty() && isset($child->parameters['admin']))

                    @guest
                        @continue
                    @endguest

                    @if(session('metadata',['discord' => ['isAdmin' => false]])['discord']['isAdmin'] === false)
                        @continue
                    @endif

                @endif
                @include('filament-menu-builder::components.offcanvas.menu-sub-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
