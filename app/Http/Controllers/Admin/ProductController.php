<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductValidation;
use App\Models\ProductSubCategory;

class ProductController extends Controller
{

    protected function saveProduct(Product $product, Request $request)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->point_price = $request->point_price;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();
    }

    public function index()
    {
        return view('store.product.manage', [
            'categories' => ProductCategory::all(),
            'subCategories' => ProductSubCategory::all(),
            'products' => Product::all(),
            'title' => 'manage product'
        ]);
    }

    public function store(ProductValidation $request)
    {
        $product = new Product;
        $this->saveProduct($product, $request);

        return redirect()->back()->with(['msg' => 'product added successfuly']);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::inRandomOrder()->limit(4)->get();

        return view('store.product.show', ['product' => $product, 'products' => $products]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $updateProduct = Product::findOrFail($id);
        $this->saveProduct($updateProduct, $request);

        return redirect()->back()->with(['msg' => 'product edited successfuly']);
    }

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
