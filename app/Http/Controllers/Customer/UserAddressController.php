<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\UserAddress;

class UserAddressController extends Controller
{
    public function store(Request $request) {
        $user = Auth::user();
        UserAddress::create(array_merge($request->all(), ['user_id' => $user->id]));
        return response()->json($user->userAddresses->sortByDesc('is_main_address'));
    }
}
