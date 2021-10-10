@extends('layouts.cliente')

@section('title', 'Inicio')

@section('content')
    <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" style="margin-top: 100px;" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $key => $item)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ \Storage::disk('local')->url($item->imagen) }}" height="500" style="overflow: hidden;" class="d-block w-100" alt="{{ $item->nombre }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <p class="fs-1 my-5 fw-bold d-block text-center">Tendencias</p>
        <div class="row">
            @for($i = 0; $i < 10; $i++)
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-sm-five mb-4">
                    <div class="card product-card">
                        <div class="card-body product-media">
                            <img src="https://themes.themewild.com/organic/assets/img/product/01.png" alt="" class="img-fluid">
                            <div class="product-card-info">
                                <h6 class="product-name">
                                    <a href="product-details.html">
                                        fresh organic apple
                                    </a>
                                </h6>
                            </div>
                            <div class="product-rating">
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                            </div>
                            <div class="product-price">
                                <p>$40.00</p>
                                <del>$50.00</del>
                            </div>
                            <button type="button" class="btn-cart">
                                <ion-icon name="cart-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    
    <div class="container">
        <div class="card delivery-card my-4">
            <div class="card-body delivery-card-content">
                <div class="row d-flex">
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-sm-five mb-4">
                        <div class="deliver-icon">
                            <ion-icon name="card-outline"></ion-icon>
                        </div>
                        <div class="delivery-info">
                            <p>Pagos 100% Seguros</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-sm-five mb-4">
                        <div class="deliver-icon">
                            <ion-icon name="storefront-outline"></ion-icon>
                        </div>
                        <div class="delivery-info">
                            <p>Envio 48 Horas</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-sm-five mb-4">
                        <div class="deliver-icon">
                            <ion-icon name="ribbon-outline"></ion-icon>
                        </div>
                        <div class="delivery-info">
                            <p>Garantia de Productos</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-sm-five mb-4">
                        <div class="deliver-icon">
                            <ion-icon name="bookmarks-outline"></ion-icon>
                        </div>
                        <div class="delivery-info">
                            <p>Promociones</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-sm-five mb-4">
                        <div class="deliver-icon">
                            <ion-icon name="shield-checkmark-outline"></ion-icon>
                        </div>
                        <div class="delivery-info">
                            <p>Tus datos seguros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection