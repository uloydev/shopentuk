<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::prefix('store')->name('store.')->group(function(){
    Route::get('product', 'StoreController@product')->name('product');
    Route::get('product/{slug}', 'StoreController@showProduct')->name('product.show');
    Route::get('voucher', 'StoreController@voucher')->name('voucher'); 
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