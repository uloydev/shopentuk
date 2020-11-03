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
        return view('store.product.index', $this->getFilteredProducts($request, false));
    }
    
    public function voucher(Request $request)
    {
        return view('store.voucher.index', $this->getFilteredProducts($request, true));
    }
    
    public function showProduct($slug)
    {
        return view('store.product.show', $this->getProductFromSlug($slug));
    }

    public function showVoucher($slug)
    {
        return view('store.voucher.show', $this->getProductFromSlug($slug));
    }

    private function getProductFromSlug($slug)
    {
        $productTitle = strtolower(ucwords(str_replace('-', ' ', $slug)));
        $product = $this->productWhere('title', 'LIKE', "%$productTitle%")->first();
        $products = $this->productWhere('category_id', '=', $product->productCategory->id)->inRandomOrder()->limit(4)->get();
        return [
            'product' => $product, 
            'products' => $products
        ];
    }

    private function productWhere($column, $conditional, $value)
    {
        return Product::where($column, $conditional, $value);
    }
    
    private function getFilteredProducts(Request $request, bool $isDigitalProduct)
    {
        $products = Product::with('productCategory')->whereHas('productCategory', function ($query) use ($isDigitalProduct){
            $query->where('is_digital_product', $isDigitalProduct);
        });
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
            if ($request->sort == "cheap") {
                $products = $products->orderBy('price', 'asc');
            } else if ($request->sort == "expensive") {
                $products = $products->orderBy('price', 'desc');
            }else if ($request->sort == "promo") {
                $products = $products->inRandomOrder()->whereHas('discount');
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
    
}
