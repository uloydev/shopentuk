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

    public function update($id)
    {
        SiteSetting::first()->update([
            'title' => request('title'),
            'description' => request('description'),
            'shipping_price' => request('shipping_price'),
            'non_java_shipping_price' => request('non_java_shipping_price'),
            'point_value' => request('point_value'),
        ]);

        return redirect()->back()->with('success', 'Successfull Update Site');
    }

}
