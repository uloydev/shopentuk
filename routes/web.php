<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::prefix('store')->name('store.')->group(function(){
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', 'StoreController@product')->name('index');
        Route::get('/{slug}', 'StoreController@showProduct')->name('show');
    });
    Route::prefix('voucher')->name('voucher.')->group(function () {
        Route::get('/', 'StoreController@voucher')->name('index');
        Route::get('/{slug}', 'StoreController@showVoucher')->name('show');
    });
});

Route::prefix('payment')->name('payment.')->group(function(){
    Route::get('konfirmasi-pembayaran', 'PaymentController@showConfirm')->name('show-confirm');
    Route::get('cart', 'PaymentController@cart')->name('cart');
});

Auth::routes();

Route::get('register', function () {
    return redirect('login');
});

Route::get('my-account', 'HomeController@index')->name('my-account');

Route::namespace('Admin')->prefix('admin')->middleware(['admin'])->name('admin.')->group(function () {
    Route::get('/', function (){
        return redirect()->route('admin.dashboard');
    });
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::resources([
        'all-category' => 'AllCategoryController',
        'products' => 'ProductController'
    ]);
});

Route::post('/dummy-post', function (){
    return redirect()->back();
});