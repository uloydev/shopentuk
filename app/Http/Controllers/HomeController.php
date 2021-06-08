<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landingPage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function landingPage()
    {
        $products = Product::where('is_redeem', false)->limit(10)->latest()->get();
        $catalogs = [
            (object) [
                'heading' => 'Store',
                'subheading' => 'clothing and fashion',
                'route' => route('store.product.index')
            ],
            (object) [
                'heading' => 'Voucher',
                'subheading' => 'Voucher and Digital stuff',
                'route' => route('store.voucher.index')
            ],
            (object) [
                'heading' => 'Game',
                'subheading' => 'Play Game and get Point',
                'route' => route('game.index')
            ],
            (object) [
                'heading' => 'Toko Point',
                'subheading' => 'Redeem your point with product, voucher or cash',
                'route' => route('store.toko-point.index')
            ],
        ];

        return view('landing', get_defined_vars());
    }
}
