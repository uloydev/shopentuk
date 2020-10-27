<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class StoreController extends Controller
{
    private $categories;

    public function __construct()
    {
        $this->categories = ProductCategory::all();
    }

    public function product(Request $request)
    {
        $bestProducts = Product::inRandomOrder()->limit(3)->get();
        $products = Product::query();
        $httpQuery = [];

        if ($request->has('search')) {
            $httpQuery['search'] = $request->search;
            $products = $products->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%');
        }

        if ($request->has('sort')) {
            $httpQuery['sort'] = $request->sort;
            if ($request->sort == "cheap") {
                $products = $products->orderBy('price', 'asc');
            } else if ($request->sort == "expensive") {
                $products = $products->orderBy('price', 'desc');
            }
        }

        $products = $products->paginate(12);
        $products->appends($httpQuery);

        return view('store.product', [
            'products' => $products,
            'bestProducts' => $bestProducts,
            'categories' => $this->categories,
            'httpQuery' => $httpQuery,
        ]);
    }

    public function voucher(){
        return view('store.voucher', ['categories' => $this->categories]);
    }
}
