<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('home', compact('sliders'));
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
