<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::get('store', 'HomeController@storePage')->name('store.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::get('home', 'HomeController@index')->name('home');
});
