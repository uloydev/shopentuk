<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function validate(Request $request)
    {
        return Voucher::where('code', $request->voucher_code)->firstOrFail();
    }
}
