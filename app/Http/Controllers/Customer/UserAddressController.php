<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\UserAddress;

class UserAddressController extends Controller
{
    public function store(Request $request) 
    {
        $userId = Auth::id();
        if ($request->is_main_address) {
            UserAddress::where('is_main_address', true)->where('user_id', $userId)->update(['is_main_address'=> false]);
        }
        UserAddress::create(array_merge($request->all(), ['user_id' => $userId]));
        return response()->json($user->userAddresses->sortByDesc('is_main_address'));
    }

    public function storeRedirect(Request $request)
    {
        $userId = Auth::id();
        if ($request->is_main_address) {
            UserAddress::where('is_main_address', true)->where('user_id', $userId)->update(['is_main_address'=> false]);
        }
        UserAddress::create(array_merge($request->all(), ['user_id' => $userId]));
        return redirect()->back()->with(['success' => 'alamat berhasil ditambahkan!']);
    }

    public function update(Request $request) 
    {
        $userId = Auth::id();
        if ($request->is_main_address) {
            UserAddress::where('is_main_address', true)->where('user_id', $userId)->update(['is_main_address'=> false]);
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
