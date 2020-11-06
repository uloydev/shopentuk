<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $totalUser = User::where([
            ['role', '<>', 'admin'],
            ['role', '<>', 'superadmin']
        ])->count();
        return view('admin.dashboard', [
            'menus' => ['Total products', 'Total order', 'Total customer'],
            'valueMenus' => [Product::count(), 20, $totalUser]
        ]);
    }
}
