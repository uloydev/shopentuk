<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = SiteSetting::first();
        $title = 'Setting web';

        return view('setting-page.index', get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['nullable', 'string'],
            'shipping_price' => ['required', 'numeric'],
            'non_java_shipping_price' => ['required', 'numeric'],
            'point_value' => ['required', 'numeric'],
            'norek_bca' => ['required', 'numeric', 'digits_between:3,100'],
            'norek_ovo' => ['required', 'starts_with:0', 'numeric']
        ]);

        SiteSetting::first()->update([
            'title' => $request->title,
            'description' => $request->description,
            'shipping_price' => $request->shipping_price,
            'non_java_shipping_price' => $request->non_java_shipping_price,
            'point_value' => $request->point_value,
            'norek_bca' => $request->norek_bca,
            'norek_ovo' => $request->norek_ovo
        ]);

        return redirect()->back()->with('success', 'Successfull Update Site');
    }

}
