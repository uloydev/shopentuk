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
        return view('store.product', $this->getFilteredProducts($request, false));
    }

    public function voucher(Request $request)
    {
        return view('store.voucher', $this->getFilteredProducts($request, true));
    }

    private function getFilteredProducts(Request $request, bool $isDigitalProduct)
    {
        $products = Product::with('productCategory')->whereHas('productCategory', function ($query) use ($isDigitalProduct){
            $query->where('is_digital_product', $isDigitalProduct);
        });
        $bestProducts = $products->inRandomOrder()->limit(3)->get();
        $httpQuery = [];

        if ($request->has('search')) {
            $httpQuery['search'] = $request->search;
            $products = $products->where(function ($query) use ($request){
                $query->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%');
            });
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
        return [
            'products' => $products,
            'bestProducts' => $bestProducts,
            'categories' => $this->categories->where('is_digital_product', $isDigitalProduct),
            'httpQuery' => $httpQuery,
        ];
    }
}
