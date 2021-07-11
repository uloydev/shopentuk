<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidaion;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    protected $adminAcc;

    public function __construct()
    {
        $this->adminAcc = User::where('role', 'admin');
    }

    protected function saveAdmin(User $admin, Request $request, $msg)
    {
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->role = 'admin';
        $admin->password = Hash::make($request->input('password', 'gakadapassword'));

        $admin->save();
        return redirect()->back()->with('success', 'Successfully ' . $msg . ' admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::all());
        // dd(collect($inputColumn));
        return view('admin.manage', [
            'title' => 'manage admin',
            'admins' => $this->adminAcc->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidaion $request)
    {
        $addAdmin = new User;
        return $this->saveAdmin($addAdmin, $request, 'add new');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateAdmin = $this->adminAcc->find($id);
        return $this->saveAdmin($updateAdmin, $request, 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteAdmin = $this->adminAcc->where('id', $id);
        $deleteAdmin->delete();
        return redirect()->back()->with('success', 'Successfully delete admin');
    }

    public function dashboard()
    {
        $totalUser = User::where('role', 'customer')->count();
        $links = [
            route('admin.products.index'),
            route('admin.all-category.index'),
            route('admin.products.index')
        ];

        return view('admin.dashboard', [
            'menus' => ['Total products', 'Total order', 'Total customer'],
            'valueMenus' => [Product::count(), Order::count(), $totalUser],
            'links' => $links
        ]);
    }

    public function manageCustomer()
    {
        return view('customer.manage', [
            'customers' => User::where('role', 'customer')->get()
        ]);
    }

    public function updateCustomer(Request $request, User $user)
    {
        // dd($user);
        $user->update($request->only(['phone', 'pemilik_rekening', 'bank', 'rekening']));
        return redirect()->back()->with('success', 'Successfully Update User ' . $user->email);
    }

    public function changePasswordForm(Request $request)
    {
        return view('admin.change-password', ['title' => 'change password']);
    }

    public function updatePasswordAdmin(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        Auth::user()->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with('success', 'password changed');
    }

    public function updatePasswordCustomer(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with('success', 'Successfully Update Password User ' . $user->email);
    }
}
