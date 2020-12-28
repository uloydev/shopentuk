<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::resource('contact-us', 'FeedbackController')->only('index', 'store', 'destroy');

Route::prefix('voucher')->name('voucher.')->group(function () {
    Route::post('validate', 'VoucherController@check')->name('validate');
});

Route::prefix('store')->name('store.')->group(function () {
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', 'StoreController@product')->name('index');
        Route::get('/{slug}', 'StoreController@showProduct')->name('show');
    });
    Route::prefix('voucher')->name('voucher.')->group(function () {
        Route::get('/', 'StoreController@voucher')->name('index');
        Route::get('/{slug}', 'StoreController@showVoucher')->name('show');
    });
    Route::prefix('toko-point')->name('toko-point.')->group(function () {
        Route::get('/', 'StoreController@tokoPoint')->name('index');
        Route::get('/redeem', 'StoreController@redeem')->name('redeem.index');
        Route::get('/{slug}', 'StoreController@showTokoPoint')->name('show');
    });
    Route::post('checkout', 'CheckoutController@store')->name('checkout')->middleware(['auth', 'customer']);
});

Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('confirmation', 'PaymentController@showConfirm')->name('show-confirm');
    Route::post('confirmation', 'PaymentController@store')->name('store');
    Route::get('returning', 'PaymentController@showReturning')->name('returning');
});

Auth::routes();

Route::resource('cart', 'CartController');

Route::get('register', function () {
    return redirect('login');
});

// customer only routes
Route::namespace('Customer')->middleware(['auth', 'customer'])->group(function () {
    // my account routes
    Route::prefix('my-account')->name('my-account.')->group(function () {
        Route::post('update', 'DashboardController@updateAccount')->name('update');
        Route::get('order/history', 'DashboardController@orderHistory')->name('history.order');
        Route::get('order/current', 'DashboardController@currentOrder')->name('current.order');
        Route::get('detail', 'DashboardController@accountDetail')->name('account.detail');
        Route::get('point', 'DashboardController@pointHistory')->name('point.history');
        // address routes
        Route::prefix('address')->name('address.')->group(function () {
            Route::post('/', 'UserAddressController@store')->name('store');
            Route::post('/store-redirect', 'UserAddressController@storeRedirect')->name('store-redirect');
            Route::put('/update', 'UserAddressController@update')->name('update');
            Route::post('/delete', 'UserAddressController@destroy')->name('destroy');
        });
    });
    // game routes
    Route::prefix('game')->name('game.')->group(function () {
        Route::get('/', 'GameController@index')->name('index');
        Route::post('bid', 'GameController@makeBid')->name('bid');
        Route::post('bid/cancel', 'GameController@cancelBid')->name('bid.cancel');
        Route::get('current', 'GameController@currentGame')->name('current');
        Route::get('rules', 'GameController@rulesGame')->name('rules');
    });
});

// admin route
Route::namespace('Admin')->prefix('admin')->middleware(['admin', 'auth'])->name('admin.')
    ->group(function () {
        Route::permanentRedirect('/', 'dashboard');
        Route::get('dashboard', 'DashboardController')->name('dashboard');
        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/', 'OrderController@index')->name('index');
            Route::get('new', 'OrderController@newOrder')->name('new');
            Route::name('refund.')->prefix('refund')->group(function () {
                Route::get('/', 'OrderController@toRefund')->name('index');
                Route::get('/{order}', 'OrderController@showRefundForm')->name('show');
                Route::post('/{order}', 'OrderController@makeRefund')->name('store');
            });
        });

        Route::get('all-category/{cat}/sub', 'AllCategoryController@subCategoryIndex')->name(
            'all-category.sub.index'
        );
        Route::post('all-category/{cat}/sub/store', 'AllCategoryController@subCategoryStore')->name(
            'all-category.sub.store'
        );
        Route::post('all-category/{cat}/sub/update/{sub}', 'AllCategoryController@subCategoryUpdate')->name(
            'all-category.sub.update'
        );
        Route::delete('all-category/{cat}/sub/destroy/{sub}', 'AllCategoryController@subCategoryDestroy')->name(
            'all-category.sub.destroy'
        );

        Route::get('all-category', 'AllCategoryController@parentCategoryIndex')->name(
            'all-category.index'
        );
        Route::post('all-category', 'AllCategoryController@parentCategoryStore')->name(
            'all-category.store'
        );
        Route::put('all-category/{id}', 'AllCategoryController@parentCategoryUpdate')->name(
            'all-category.update'
        );
        Route::delete('all-category/{id}', 'AllCategoryController@parentCategoryDestroy')->name(
            'all-category.destroy'
        );
        Route::resource('products', 'ProductController');
    });

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::resource('admins', 'Admin\AdminController')->only('index', 'store', 'update', 'destroy');
});
