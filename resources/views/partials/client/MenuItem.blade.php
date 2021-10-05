<header class="navbar shadow-sm navbar-expand-lg navbar-light bg-light px-0 py-0">
    <div class="container px-3">
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#main_nav">
        <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase border-left border-right" href="#" data-toggle="dropdown">Departamentos <i class="fas fa-bars ml-4"></i></a>
                    <ul class="dropdown-menu">
                        @foreach ($menus as $key => $item)
                            @if ($item['parent'] != 0)
                                @break
                            @endif
                            @if($item['submenu'] == [])
                                {{-- <li><a href="{{ url('category', $item['slug']) }}"><i class="{{ $item['icono'] }}"></i>{{ $item['nombre'] }}</a> --}}
                                <li><a class="dropdown-item" href="#">{{ $item['name'] }}</a></li>
                            @else 
                                <li class="has-submenu">
                                    <a class="dropdown-item" href="#">Menu 2</a>
                                    @foreach ($item['submenu'] as $submenu)
                                        @if ($submenu['submenu'] == [])
                                            <li><a class="dropdown-item" href="#">Menu 1</a></li>
                                        @else
                                            <div class="megasubmenu dropdown-menu">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6 class="title text-danger">Title Menu One</h6>
                                                        <hr>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="dropdown-item" href="#">Menu 1</a>
                                                            </li>
                                                        </ul> 
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </li>
                                {{-- <li class="menu-item-has-children"><a href=""><i class="{{ $item['icono'] }}"></i>{{ $item['nombre'] }}</a>
                                    <ul class="category-mega-menu">
                                        @foreach ($item['submenu'] as $submenu)
                                            @if ($submenu['submenu'] == [])
                                                <li class="menu-item-has-children">
                                                    <a href="{{ url('category', $submenu['slug']) }}">{{ $submenu['nombre'] }}</a>
                                                </li>
                                            @else
                                                <li class="menu-item-has-children">
                                                    <a href="{{ url('category', $submenu['slug']) }}">{{ $submenu['nombre'] }}</a>
                                                    <ul>
                                                        @include('partials._menu_item', ['item' => $submenu])
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li> --}}
                            @endif
                        @endforeach
                        {{-- <li>
                            <a class="dropdown-item" href="#">Menu 1</a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item text-dark ml-4">
                    <a class="nav-link" href=""><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item text-dark ml-4">
                    <a class="nav-link" href=""><i class="fas fa-bookmark"></i> Marcas</a>
                </li>
                <li class="nav-item text-dark ml-4">
                    <a class="nav-link" href=""><i class="fas fa-box-open"></i> Nuevos Productos</a>
                </li>
            </ul>
            </div>
        <!-- navbar-collapse.// -->
    </div>
    <!-- container-fluid.// -->
</header>