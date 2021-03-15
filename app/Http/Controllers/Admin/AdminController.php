<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidaion;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->adminAcc = User::where('role', 'admin');
    }

    protected function saveAdmin(User $admin, Request $request, $msg)
    {
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = '+62' . $request->phone;
        $admin->role = 'admin';
        $admin->password = Hash::make($request->input('password', 'gakadapassword'));

        $admin->save();
        return redirect()->back()->with('msg', 'Successfully ' . $msg . ' admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $inputColumn = [
            [
                'name' => 'name',
                'type' => 'type',
                'label' => 'Admin Fullname',
                'id' => 'admin-name',
                'placeholder' => 'Ex: bariq dharmawan'
            ],
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email admin',
                'id' => 'admin-email',
                'placeholder' => 'Ex: dharmawan@bariq.me'
            ],
            [
                'name' => 'phone',
                'type' => 'tel',
                'label' => 'Admin phone number',
                'id' => 'admin-phone',
                'placeholder' => 'Ex: 87771406656'
            ],
            [
                'name' => 'joined_at',
                'type' => 'date',
                'label' => 'Admin Joining date',
                'id' => 'admin-joined-at',
                'value' => date('m/d/Y')
            ],
            [
                'name' => 'password',
                'type' => 'password',
                'label' => 'Admin default password',
                'id' => 'admin-password',
                'placeholder' => 'Ex: gakadapassword'
            ],
            [
                'name' => 'password_confirmation',
                'type' => 'password',
                'label' => 'Confirm password',
                'id' => 'admin-confirm-pw',
                'placeholder' => 'Please confirm the password'
            ],
        ];
        
        // dd(User::all());
        // dd(collect($inputColumn));
        return view('admin.manage', [
            'title' => 'manage admin',
            'inputColumn' => $inputColumn,
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
        $updateAdmin = $this->adminAcc->where('id', $id);
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
        $deleteAdmin->destroy($id);
        return redirect()->back()->with('msg', 'Successfully delete admin ' . $deleteAdmin->name);
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
            'valueMenus' => [Product::count(), 20, $totalUser],
            'links' => $links
        ]);
    }

    public function manageCustomer()
    {
        return view('customer.manage', [
            'customers' => User::where('role', 'customer')->get()
        ]);
    }
}
