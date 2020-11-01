<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::prefix('store')->name('store.')->group(function(){
    Route::prefix('product')->name('product')->group(function () {
        Route::get('/', 'StoreController@product');
        Route::get('/{slug}', 'StoreController@showProduct')->name('.show');
    });
    Route::prefix('voucher')->name('voucher')->group(function () {
        Route::get('/', 'StoreController@voucher');
        Route::get('/{slug}', 'StoreController@showVoucher')->name('.show');
    });
});
Route::get('konfirmasi-pembayaran', 'PaymentController@showConfirm')->name('payment.show-confirm');

Auth::routes();

Route::get('/register', function () {
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::get('home', 'HomeController@index')->name('home');
});