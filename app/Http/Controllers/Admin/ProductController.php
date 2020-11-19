<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidation;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{


    protected function saveProduct(Product $product, Request $request)
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
    }

    // public function viewIndex()
    // {
    //     return view('store.product.manage', [
    //         'title' => 'manage product'
    //     ]);
    // }

    // public function viewShow()
    // {
    //     return view('store.product.show', [
    //         'title' => 'manage product'
    //     ]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json([
        //     'success' => true,
        //     'data' => Product::paginate(10)
        // ], 200);
        return view('store.product.manage', [
            'products' => Product::all(),
            'title' => 'manage product'
        ]);
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
    public function store(ProductValidation $request)
    {
        $product = new Product;
        $this->saveProduct($product, $request);
        // return response()->json([
        //     'success' => true,
        //     'data' => $product
        // ]);
        return redirect()->back()->with(['msg' => 'product added successfuly']);
    }

    /**
     * Display the specified product.
     *
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::inRandomOrder()->limit(4)->get();
        // return response()->json([
        //     'success' => true,
        //     'data' => Product::findOrFail($id)
        // ], 200);
        return view('store.product.show', ['product' => $product, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        // dd($product);
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductValidation $request, $id)
    {
        $updateProduct = Product::findOrFail($id);
        $this->saveProduct($updateProduct, $request);
        // return response()->json([
        //     'success' => true,
        //     'data' => $updateProduct
        // ]);
        return redirect()->back()->with(['msg' => 'product edited successfuly']);
    }

    /**
     * Remove the specified product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->productImages->each(function ($item, $key) {
            Storage::delete($item->url);
            $item->delete();
        });
        if ($product->discount) {
            $product->discount->delete();
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
