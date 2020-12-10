<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function check(Request $request)
    {
        try {
            return response()->json([
                'status' => 'success',
                'message' => 'sukses menggunakan voucher',
                'data' => Voucher::where('code', $request->voucher_code)->firstOrFail()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'voucher tidak ditemukan!'
            ]);
        }
    }
}
