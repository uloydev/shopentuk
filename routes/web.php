<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::get('store/product', 'StoreController@product')->name('store.product');
Route::get('store/voucher', 'StoreController@voucher')->name('store.voucher');
Route::get('konfirmasi-pembayaran', 'PaymentController@confirm')->name('payment.confirm');

Auth::routes();
Route::permanentRedirect('register', 'login');

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::get('home', 'HomeController@index')->name('home');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');