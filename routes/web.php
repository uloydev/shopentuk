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

Route::prefix('my-account')->name('my-account.')->middleware(['auth', 'customer'])
->namespace('Customer')->group(function(){
    Route::permanentRedirect('/', 'my-account/detail');
    Route::get('order/history', 'DashboardController@orderHistory')->name('history.order');
    Route::get('order/current', 'DashboardController@currentOrder')->name('current.order');
    Route::get('detail', 'DashboardController@accountDetail')->name('account.detail');
    Route::get('point', 'DashboardController@accountPoint')->name('account.point');
});

Route::namespace('Admin')->prefix('admin')->middleware(['admin', 'auth'])->name('admin.')->group(function(){
    Route::permanentRedirect('/', 'dashboard');
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    // Route::prefix('products')->name('products.')->group(function(){
    //     Route::get('/', 'ProductController@viewIndex')->name('index');
    //     Route::get('show', 'ProductController@viewShow')->name('show');
    // });
    Route::resources([
        'all-category' => 'AllCategoryController',
        'products' => 'ProductController'
    ]);
});

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::resource('admins', 'Admin\AdminController')->only('index', 'store', 'update', 'destroy');
});

Route::post('/dummy-post', function (){
    return redirect()->back();
});