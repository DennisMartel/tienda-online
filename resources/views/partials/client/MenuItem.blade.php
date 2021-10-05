{{-- @if ($item['submenu'] == [])
    <li><a class="dropdown-item" href="#">{{ $item['name'] }}</a></li>
@else
    <li class="has-submenu">
        <a class="dropdown-item dropdown-toggle" href="#">{{ $item['name'] }}</a>
        <div class="megasubmenu dropdown-menu">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. 
        </div>
    </li>
@endif

@if($item['submenu'] == [])
    <li><a class="dropdown-item" href="#">{{ $item['name'] }}</a></li>
@else
    <div class="row">
        @foreach ($item['submenu'] as $submenu)
            @if ($submenu['submenu'] == [])
                <li class="menu-item-has-children">
                    <a href="{{ url('category', $submenu['slug']) }}">{{ $submenu['name'] }}</a>
                </li>
            @else
                <li class="menu-item-has-children">
                    <a href="{{ url('category', $submenu['slug']) }}">{{ $submenu['name'] }}</a>
                </li>
            @endif
        @endforeach
    </div>
@endif --}}