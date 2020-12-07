<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class AllCategoryController extends Controller
{
    /**
     * Display a listing of parent category
     *
     * @return \Illuminate\Http\Response
     */
    public function parentCategoryIndex()
    {
        $categories = ProductCategory::where('is_digital_product', false)->get();
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
    public function parentCategoryStore(Request $request)
    {
        //
    }

    /**
     * Store a new sub category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subCategoryStore(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

        return redirect()->back()->with('msg', 'Successfully delete this sub category');
    }

    /**
     * Remove the sub category with his product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subCategoryDestroy($id)
    {
        $productSubCategory = ProductSubCategory::findOrFail($id);
        $productSubCategory->products()->delete();
        $productSubCategory->delete();

        return redirect()->back()->with('msg', 'Successfully delete this sub category');
    }

    public function subCategoryIndex()
    {
        $categories = ProductCategory::where('is_digital_product', false)->get();
        return view('store.product.category.manage-sub', [
            'title' => 'manage category',
            'categories' => $categories
        ]);
    }
}
