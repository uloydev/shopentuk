<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function __invoke()
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
}
