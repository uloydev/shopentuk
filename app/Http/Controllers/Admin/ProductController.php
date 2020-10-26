<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->point_price = $request->point_price;
        $product->category_id = $request->category_id;
        if ($request->has('sub_category_id')) {
            $product->sub_category_id = $request->sub_category_id;
        }
        $product->save();
        return redirect()->back()->with(['msg' => 'product added successfuly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->point_price = $request->point_price;
        $product->category_id = $request->category_id;
        if ($request->has('sub_category_id')) {
            $product->sub_category_id = $request->sub_category_id;
        }
        $product->save();
        return redirect()->back()->with(['msg' => 'product edited successfuly']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->productImages) {
            $product->productImages->each(function ($item, $key) {
                Storage::delete($item->url);
                $item->delete();
            });
        }
        $product->delete();
        return redirect()->back()->with(['msg' => 'product deleted successfuly']);
    }

    public function editImages(Product $product) 
    {
        return view('admin.product.edit-image', ['images' => $product->productImages]);
    }

    public function destroyImage(Product $product, ProductImage $image)
    {
        Storage::delete($image->url);
        $image->delete();
        return redirect()->back()->with(['msg' => 'product image deleted successfuly']);
    }

    public function storeImage(Product $product, Request $request)
    {
        $filename = Storage::putFile('uploads/image', $request->file('image'));
        ProductImage::create([
            'url' => $filename,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with(['msg' => 'product image added successfuly']);
    }

    public function setMainImage(Product $product, ProductImage $image)
    {
        if ($product->mainImage) {
            $product->mainImage->update(['is_main_image' => false]);
        }
        $image->update(['is_main_image' => true]);
        return redirect()->back()->with(['msg' => 'set main product image successfuly']);
    }
}
