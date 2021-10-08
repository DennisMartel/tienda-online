<header class="navbar shadow-sm navbar-expand-md navbar-light bg-light px-0 py-0 d-none d-sm-none d-md-none d-lg-block">
    <div class="container px-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#main_nav">
        <span class="navbar-toggler-icon"></span>
        </button>
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
                                <li><a class="dropdown-item" href="#">{{ $item['name'] }}</a></li>
                            @else
                                <li class="has-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">{{ $item['name'] }}</a>
                                    <div class="megasubmenu dropdown-menu">
                                        <div class="row">
                                            @foreach ($item['submenu'] as $submenu)
                                                @if ($submenu['submenu'] == [])
                                                    <div class="col-md-4">
                                                        <h6 class="text-danger border-bottom pb-1">{{ $submenu['name'] }}</h6>
                                                    </div>
                                                @else
                                                    <div class="col-md-4">
                                                        <h6 class="text-danger border-bottom pb-1">{{ $submenu['name'] }}</h6>
                                                        <ul class="list-unstyled">
                                                            @if($submenu['submenu'] == [])
                                                                <li><a class="dropdown-item" href="#">{{ $submenu['submenu'] }}</a></li>
                                                            @else
                                                                @foreach ($submenu['submenu'] as $submenu)
                                                                    @if ($submenu['submenu'] == [])
                                                                        <li class="mb-2"><a href="" class="text-decoration-none text-dark">{{ $submenu['name'] }}</a></li>
                                                                    @else
                                                                        <li class="mb-2"><a href="" class="text-decoration-none text-dark">{{ $submenu['name'] }}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
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