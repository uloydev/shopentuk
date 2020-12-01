<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function(){
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('dashboard', 'DashboardController')->name('dashboard');
        Route::resources([
            'all-category' => 'AllCategoryController',
            'products' => 'ProductController'
        ]);
    });
});
