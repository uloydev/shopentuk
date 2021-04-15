<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discount-voucher.manage')->with([
            'title' => 'Management Discount Voucher',
            'vouchers' => Voucher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string', 'unique:vouchers'],
            'discount_value' => ['required', 'numeric'],
            'expired_at' => ['required', 'date'],
        ]);
        Voucher::create($validated);
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Discount Voucher']);
    }

    public function update(Request $request, Voucher $voucher)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string', 'unique:vouchers,id,'.$voucher->id],
            'discount_value' => ['required', 'numeric'],
            'expired_at' => ['required', 'date'],
        ]);
        $voucher->update($validated);
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Discount Voucher']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Discount Voucher']);
    }
}
