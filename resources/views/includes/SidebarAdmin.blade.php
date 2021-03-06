<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Tienda Online" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tienda Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrador</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('departamentos.index') }}" class="nav-link {{ request()->routeIs('departamentos.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>Departamentos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->routeIs('categorias.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tags"></i>
              <p>Categorias</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('subcategorias.index') }}" class="nav-link {{ request()->routeIs('subcategorias.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-star"></i>
              <p>Subcategorias</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('marcas.index') }}" class="nav-link {{ request()->routeIs('marcas.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bookmark"></i>
              <p>Marcas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('productos.index') }}" class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-box"></i>
              <p>Producto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Ecommerce
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link {{ request()->routeIs('sliders.index') ? 'active' : '' }}">
                  <i class="far fa-images nav-icon"></i>
                  <p>Carousel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Menu Navegaci??n</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="fas fa-percentage nav-icon"></i>
                  <p>Promociones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fas fa-ticket-alt nav-icon"></i>
                  <p>Cupones</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>