<?php

use Illuminate\Support\Facades\Auth;
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

Route::prefix('my-account')->name('my-account.')->middleware(['auth', 'customer'])
    ->namespace('Customer')->group(function () {
        Route::post('update', 'DashboardController@updateAccount')->name('update');
        Route::get('order/history', 'DashboardController@orderHistory')->name('history.order');
        Route::get('order/current', 'DashboardController@currentOrder')->name('current.order');
        Route::get('detail', 'DashboardController@accountDetail')->name('account.detail');
        Route::get('point', 'DashboardController@accountPoint')->name('account.point');
        Route::prefix('address')->name('address.')->group(function () {
            Route::post('/', 'UserAddressController@store')->name('store');
            Route::post('/store-redirect', 'UserAddressController@storeRedirect')->name('store-redirect');
            Route::post('/update', 'UserAddressController@update')->name('update');
            Route::post('/delete', 'UserAddressController@destroy')->name('destroy');
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

        Route::get('all-category/sub', 'AllCategoryController@subCategoryIndex')->name(
            'all-category.sub.index'
        );
        Route::post('all-category/sub/store', 'AllCategoryController@subCategoryStore')->name(
            'all-category.sub.store'
        );
        Route::delete('all-category/sub/destroy/{id}', 'AllCategoryController@subCategoryDestroy')->name(
            'all-category.sub.destroy'
        );

        Route::get('all-category/parent', 'AllCategoryController@parentCategoryIndex')->name(
            'all-category.parent.index'
        );
        Route::post('all-category/parent', 'AllCategoryController@parentCategoryStore')->name(
            'all-category.parent.store'
        );
        Route::put('all-category/{id}/parent', 'AllCategoryController@parentCategoryUpdate')->name(
            'all-category.parent.update'
        );
        Route::delete('all-category/parent/{id}', 'AllCategoryController@parentCategoryDestroy')->name(
            'all-category.parent.destroy'
        );
        Route::resource('products', 'ProductController');
    });

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::resource('admins', 'Admin\AdminController')->only('index', 'store', 'update', 'destroy');
});
