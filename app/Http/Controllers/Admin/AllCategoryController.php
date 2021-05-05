<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryValidation;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class AllCategoryController extends Controller
{

    protected function saveCategory($request, ProductCategory $productCategory)
    {
        $title = $request->title;
        if (ProductCategory::where('title', $title)->first()) {
            $action = 'add new';
        } else {
            $action = 'update';
        }
        $productCategory->title = $title;
        $productCategory->is_digital_product = $request->boolean('is_digital_product');
        $productCategory->save();

        return redirect()->back()->with('success', "Succesfully $action category called $title");
    }

    /**
     * Display a listing of parent category
     *
     * @return \Illuminate\Http\Response
     */
    public function parentCategoryIndex()
    {
        $categories = ProductCategory::all();
        return view('store.product.category.manage-parent', [
            'title' => 'manage category',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function parentCategoryStore(ProductCategoryValidation $request)
    {
        $addNew = new ProductCategory;
        return $this->saveCategory($request, $addNew);
    }

    /**
     * Store a new sub category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subCategoryStore(ProductCategory $cat, Request $request)
    {
        ProductSubCategory::create([
            'category_id' => $cat->id,
            'title' => $request->subcategory
        ]);
        return redirect()->back()->with('success', "Successfully add sub category to $cat->title category");
    }

    public function subCategoryUpdate($cat, ProductSubCategory $sub, Request $request)
    {
        $sub->update([
            'title' => $request->subcategory,
        ]);
        return redirect()->back()->with('success', "Successfully update sub category");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parentCategoryUpdate(Request $request, $id)
    {
        $updateCategory = ProductCategory::findOrFail($id);
        return $this->saveCategory($request, $updateCategory);
    }

    /**
     * Remove the parent category with his product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parentCategoryDestroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->products()->delete();
        $productCategory->productSubCategory()->delete();
        $productCategory->delete();

        return redirect()->back()->with('success', 'Successfully delete this sub category');
    }

    /**
     * Remove the sub category with his product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subCategoryDestroy($cat, ProductSubCategory $sub)
    {
        $sub->products()->delete();
        $sub->delete();

        return redirect()->back()->with('success', 'Successfully delete this sub category');
    }

    public function subCategoryIndex(ProductCategory $cat)
    {
        return view('store.product.category.manage-sub', [
            'title' => 'manage category',
            'category' => $cat
        ]);
    }
}
