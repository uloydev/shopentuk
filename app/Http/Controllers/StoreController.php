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

    private function productWhere($column, $conditional, $value)
    {
        return Product::where($column, $conditional, $value);
    }

    private function getProductFromSlug($slug)
    {
        $product = $this->productWhere('slug', '=', $slug)->firstOrFail();
        if ($product->is_redeem) {
            $similarProducts = $this->productWhere('is_redeem', '=', true);
        } else {
            $similarProducts = $this->productWhere('category_id', '=', $product->productCategory->id);
        }
        $similarProducts = $similarProducts->inRandomOrder()->limit(4)->get();
        return [
            'product' => $product, 
            'products' => $similarProducts
        ];
    }

    private function getFilteredProducts(Request $request, $productType = "all")
    {
        $products = Product::with('productCategory');
        if ($productType != 'all') {
            $products = $products->whereHas('productCategory', function ($query) use ($productType){
                if ($productType == 'digital'){
                    $query->where('is_digital_product', true);
                } else if ($productType == 'non-digital') {
                    $query->where('is_digital_product', false);
                }
                if ($productType == 'redeem') {
                    $query->where('is_redeem', true);
                }
            });
        }
        $bestProducts = clone $products;
        $bestProducts = $bestProducts->inRandomOrder()->limit(3)->get();
        $httpQuery = [];
        
        if ($request->has('catId') && !empty($request->catId)) {
            $httpQuery['catId'] = $request->catId;
            $products = $products->where('category_id', $request->catId);
        }
        
        if ($request->has('subCatId') && !empty($request->subCatId)) {
            $httpQuery['subCatId'] = $request->subCatId;
            $products = $products->where('sub_category_id', $request->subCatId);
        }
        
        if ($request->has('search')) {
            $httpQuery['search'] = $request->search;
            $products = $products->where(function ($query) use ($request){
                $query->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }
        
        if ($request->has('sort')) {
            $httpQuery['sort'] = $request->sort;
            switch ($request->sort) {
                case 'cheap':
                    $products = $products->orderBy('price', 'asc');
                    break;

                case 'expensive':
                    $products = $products->orderBy('price', 'desc');
                    break;
                
                case 'promo':
                    $products = $products->inRandomOrder()->whereHas('discount');
                    break;
            }
        }
        
        $products = $products->paginate(12);
        $products->appends($httpQuery);
        
        return [
            'products' => $products,
            'bestProducts' => $bestProducts,
            'categories' => $this->categories,
            'httpQuery' => $httpQuery,
        ];
    }

    public function product(Request $request)
    {
        return view('store.product.index', $this->getFilteredProducts($request, 'non-digital'));
    }

    public function voucher(Request $request)
    {
        return view('store.voucher.index', $this->getFilteredProducts($request, 'digital'));
    }

    public function showProduct($slug)
    {
        return view('store.product.show', $this->getProductFromSlug($slug));
    }

    public function showVoucher($slug)
    {
        return view('store.voucher.show', $this->getProductFromSlug($slug));
    }

    public function tokoPoint(Request $request)
    {
        return view('store.toko-point.index', $this->getFilteredProducts($request, 'redeem'));
    }

    public function showTokoPoint($slug)
    {
        return view('store.toko-point.show', $this->getProductFromSlug($slug));
    }
}
