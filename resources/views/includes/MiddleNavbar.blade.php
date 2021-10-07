<header class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-0">
    <div class="container flex-sm-nowrap px-3">
        <a href="mr-0 mr-sm-4 logo" class="navbar-brand">
            <img src="{{ asset('img/logo.svg') }}" alt="almacenes bomba" class="img-fluid" width="40">
        </a>

        <div class="navbar-btns d-flex position-relative order-md-3">
            <a class="navbar-btn text-white mr-3 text-decoration-none" href="">
                <i class="far fa-user"></i> 
            </a>
            <a class="navbar-btn text-white mr-3 text-decoration-none" href="">
                <i class="far fa-heart"></i> 
                <span class="badge badge-warning">0</span>
            </a>
            <a class="navbar-btn text-white text-decoration-none" href="">
                <i class="fas fa-shopping-cart"></i> 
                <span class="badge badge-warning">0</span>
                <span id="subtotal">$0.00</span>
            </a>
        </div>

        <form action="buscador" class="flex-grow-1 order-sm-2 mx-0 mx-sm-0 mx-md-3 mx-lg-5">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Ingresa tú busqueda..." 
                    style="border-bottom-left-radius: 25px; border-top-left-radius: 25px; box-shadow: none; border: none;">
                <div class="input-group-append">
                    <span class="input-group-text bg-white" style="border-bottom-right-radius: 25px; border-top-right-radius: 25px;">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>
</header>