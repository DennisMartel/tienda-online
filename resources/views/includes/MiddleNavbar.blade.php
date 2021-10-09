<nav class="navbar navbar-expand-sm navbar-light bg-white py-4 border-bottom fixed-top shadow">
    <div class="container">
        <div class="e-shop-widget-header">
            <a class="navbar-brand" href="#">
                <img src="https://themes.themewild.com/organic/assets/img/logo.png" alt="" height="30">
            </a>
            <a class="nav-link e-shop-widget-btn-header" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <ion-icon name="grid-outline"></ion-icon>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="input-group e-shop-search-bar">
                <input type="text" class="form-control e-shop-input-search" placeholder="Busca tú producto aquí" id="basic-url" aria-describedby="basic-addon3">
                <span class="input-group-text fs-4 e-shop-icon-search">
                    <ion-icon name="search-outline"></ion-icon>
                </span>
            </div>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <a href="" class="nav-link e-shop-btn-header">
                    <ion-icon name="person-outline"></ion-icon>
                </a>
                <a href="" class="nav-link e-shop-btn-header">
                    <ion-icon name="heart-outline"></ion-icon>
                    <span class="e-shop-badge-btn">0</span>
                </a>
                <a class="nav-link e-shop-btn-header" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <ion-icon name="cart-outline"></ion-icon>
                    <span class="e-shop-badge-btn">0</span>
                </a>
            </ul>
        </div>
    </div>
</nav>

<!-- MENU -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">
        <img src="https://themes.themewild.com/organic/assets/img/logo.png" alt="" height="30">
      </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="accordion" style="border: none;" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" style="background: #fff; box-shadow: none; color: #555;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Vegetales Frescos
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" style="background: #fff; box-shadow: none; color: #555;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Frutas y Juegos
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" style="background: #fff; box-shadow: none; color: #555;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Comida Rápida
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CART -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header border-bottom">
    <h5 id="offcanvasRightLabel" class="e-shop-offcanvas-total-item">Total Item (5)</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" style="overflow: hidden;">
    <ul class="cart-list">
        @for ($i = 0; $i < 5; $i++)
            <li class="cart-item border-bottom">
                <div class="cart-media">
                    <a href="">
                        <img src="https://themes.themewild.com/organic/assets/img/product/01.png" alt="">
                    </a>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-single.html">fresh organic apple</a></h6>
                        <p>Precio - $15.00</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action">
                            <button class="action-minus" title="Quantity Minus">
                                <ion-icon name="remove-outline"></ion-icon>
                            </button>
                            <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                            <button class="action-plus" title="Quantity Plus">
                                <ion-icon name="add-outline"></ion-icon>
                            </button>
                        </div>
                        <h6>$40.00</h6>
                    </div>
                </div>
            </li>
        @endfor
    </ul>
    {{-- <div class="cart-footer">
        <a class="cart-checkout-btn" href="checkout.html">
            <span class="checkout-label">Proceder al Pago <span class="checkout-price">$200.00</span>        </span>
        </a>
    </div> --}}
  </div>
</div>