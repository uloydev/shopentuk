<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::resources([
            'all-category' => 'AllCategoryController',
            'products' => 'ProductController'
        ]);
    });
    Route::get('game/current', 'Admin\GameController@currentGame')->name('game.current');
});
