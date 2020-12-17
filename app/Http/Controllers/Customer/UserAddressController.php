<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddressValidation;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    public function store(Request $request)
    {
        $userId = $request->user_id;
        if ($request->is_main_address == '1') {
            UserAddress::where('is_main_address', true)->where('user_id', $userId)
                ->update(['is_main_address' => false]);
        }
        UserAddress::create(array_merge($request->all(), ['user_id' => $userId]));
        return response()->json(User::find($userId)->userAddresses->sortByDesc('is_main_address'));
    }

    public function storeRedirect(Request $request)
    {
        $userId = Auth::id();
        if ($request->is_main_address == '1') {
            UserAddress::where('is_main_address', true)->where('user_id', $userId)
                ->update(['is_main_address' => false]);
        }
        UserAddress::create(array_merge($request->all(), ['user_id' => $userId]));
        return redirect()->back()->with(['success' => 'alamat berhasil ditambahkan!']);
    }

    public function update(UserAddressValidation $request)
    {

        $userId = Auth::id();
        if ($request->is_main_address == '1') {
            UserAddress::where('is_main_address', true)->where('user_id', $userId)->update(['is_main_address' => false]);
        }
        $address = UserAddress::findOrFail($request->id);
        $address->update($request->all());
        return redirect()->back()->with(['success' => 'alamat berhasil diperbarui!']);
    }

    public function destroy(Request $request)
    {
        $address = UserAddress::findOrFail($request->id);
        $address->delete();
        return redirect()->back()->with(['success' => 'alamat berhasil dihapus!']);
    }
}
