<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $products, $categories;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landingPage', 'storePage');
        $this->categories = ProductCategory::all();
        $this->products = Product::limit(10)->latest()->get();
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
        return view('landing', [
            'products' => $this->products,
            'categories' => $this->categories
        ]);
    }

    public function storePage()
    {
        return view('store.index', [
            'products' => $this->products,
            'categories' => $this->categories
        ]);
    }
}
