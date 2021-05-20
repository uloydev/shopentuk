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
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['nullable', 'string'],
            'shipping_price' => ['required', 'numeric'],
            'non_java_shipping_price' => ['required', 'numeric'],
            'point_value' => ['required', 'numeric'],
            'norek_bca' => ['required', 'numeric', 'digits_between:3,100'],
            'norek_ovo' => ['required', 'starts_with:0', 'numeric'],
            'pemilik_bca' => ['required'],
            'pemilik_ovo' => ['required']
        ]);

        SiteSetting::first()->update($validated);

        return redirect()->route('admin.setting.index')->with('success', 'Successfull Update Site');
    }

}
