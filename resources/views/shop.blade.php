@extends('layouts.cliente')

@section('title', 'Inicio')

@section('content')
<div class="container" style="margin-top: 160px">
    <div class="row">
        <div class="col-md-3">
            <div class="card shop-box-filter mb-3">
                <div class="card-body shop-box-content-filter">
                    <p>Categorias</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                        Damas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1">
                        <label class="form-check-label" for="flexCheckChecked1">
                        Caballeros
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2">
                        <label class="form-check-label" for="flexCheckChecked2">
                        Niños
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3">
                        <label class="form-check-label" for="flexCheckChecked3">
                        Niñas
                        </label>
                    </div>
                </div>
            </div>
            <div class="card shop-box-filter mb-3">
                <div class="card-body shop-box-content-filter">
                    <p>Marcas</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4">
                        <label class="form-check-label" for="flexCheckChecked4">
                        Puma
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked5">
                        <label class="form-check-label" for="flexCheckChecked5">
                        Nike
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked6">
                        <label class="form-check-label" for="flexCheckChecked6">
                        Polo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked7">
                        <label class="form-check-label" for="flexCheckChecked7">
                        Lacoste
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shop-section-filter">
                <div class="card-body shop-section-content-filter">
                    
                </div>
            </div>
            <div class="row">
                @for($i = 0; $i < 16; $i++)
                    <div class="col-6 col-sm-6 col-md-3 mb-4">
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
    </div>
</div>
@endsection