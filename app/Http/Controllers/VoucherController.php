<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function check(Request $request)
    {
        try {
            $voucher = Voucher::where('code', $request->voucher_code)->firstOrFail();
            if ($voucher->is_used) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'voucher sudah tidak berlaku'
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'sukses menggunakan voucher',
                    'data' => $voucher,
                ]);
            }
        } catch (\Throwable$th) {
            return response()->json([
                'status' => 'error',
                'message' => 'voucher tidak ditemukan!',
            ]);
        }
    }
}
