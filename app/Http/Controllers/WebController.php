<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        $productos = DB::table('productos')->select(DB::raw('CONCAT(productos_imagenes.imagenes) as imagenes'), 
        'productos.id', 'productos.nombre', 'productos.slug', 'productos.precio_venta')
        ->join('productos_imagenes', 'productos_imagenes.producto_id', '=', 'productos.id')
        ->where('status', 'ACTIVO')->take(10)->get();
        return view('home', compact('sliders','productos'));
    }

    public function product_detail($slug)
    {
        return view('product');
    }

    public function shop()
    {
        return view('shop');
    }
}
