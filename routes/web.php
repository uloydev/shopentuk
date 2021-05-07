<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@landingPage')->name('landing-page');
Route::resource('contact-us', 'FeedbackController')->only('index', 'store', 'destroy');
Route::get('news/archive', 'NewsController@index')->name('news.index');

Route::prefix('admin')->name('admin.')->middleware(['admin', 'auth'])->group(function () {
    Route::get('news/manage', 'NewsController@index')->name('news.manage');
    Route::post('news/store', 'NewsController@store')->name('news.store');
    Route::delete('news/delete/{news}', 'NewsController@destroy')->name('news.destroy');
    Route::put('news/update/{news}', 'NewsController@update')->name('news.update');
    Route::get('feedback-customer', 'FeedbackController@manage')->name(
        'contact-us.manage'
    );
});


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
        Route::get('/{slug}', 'StoreController@showTokoPoint')->name('show');
    });
    Route::post('checkout', 'CheckoutController@store')->name('checkout')->middleware([
        'auth', 'customer'
    ]);
});

Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('confirmation', 'PaymentController@showConfirm')->name('show-confirm');
    Route::get('manage', 'PaymentController@manage')->name('manage-confirm');
    Route::post('confirmation/{id}', 'PaymentController@store')->name('store');
    Route::post('input-resi', 'PaymentController@inputResi')->name('input-resi');
});

Auth::routes();

Route::resource('cart', 'CartController');

Route::get('register', function () {
    return redirect('login');
});

Route::prefix('refund')->name('refund.')->group(function (){
    Route::post('request/{order}', 'RefundController@request')->name('request');
    Route::get('manage', 'RefundController@manage')->name('manage')->middleware('admin');
    Route::post('kirim', 'RefundController@kirimBukti')->name('kirim-bukti')->middleware('admin');
});


// customer only routes
Route::namespace('Customer')->middleware(['auth', 'customer'])->group(function () {
    // my account routes
    Route::prefix('my-account')->name('my-account.')->group(function () {
        Route::get('wishlist', 'DashboardController@wishlistProduct')->name('product.favorite');
        Route::post('wishlist', 'DashboardController@storeWishlist')->name('favorite.store');
        Route::delete('wishlist/{favoriteProduct}', 'DashboardController@removeWishlist')->name(
            'favorite.remove'
        );
        Route::post('update', 'DashboardController@updateAccount')->name('update');
        Route::get('order/history', 'DashboardController@orderHistory')->name('history.order');
        Route::put('order/finish/{order}', 'DashboardController@finishOrder')->name(
            'finish.order'
        );
        Route::get('order/current', 'DashboardController@currentOrder')->name('current.order');
        Route::put('order/cancel/{order}', 'DashboardController@cancelBeforePaid')->name(
            'cancel.order'
        );
        Route::get('detail', 'DashboardController@accountDetail')->name('account.detail');
        Route::get('point', 'DashboardController@pointHistory')->name('point.history');
        // address routes
        Route::prefix('address')->name('address.')->group(function () {
            Route::post('/', 'UserAddressController@store')->name('store');
            Route::post('/store-redirect', 'UserAddressController@storeRedirect')->name(
                'store-redirect'
            );
            Route::put('/update', 'UserAddressController@update')->name('update');
            Route::post('/delete', 'UserAddressController@destroy')->name('destroy');
        });
    });
    // game routes
    Route::prefix('game')->name('game.')->group(function () {
        Route::get('/', 'GameController@index')->name('index');
        Route::post('bid', 'GameController@makeBid')->name('bid');
        Route::post('bid/cancel', 'GameController@cancelBid')->name('bid.cancel');
        Route::post('current', 'GameController@currentGame')->name('current');
        Route::get('test', 'GameController@test');
        Route::get('game-history', 'GameController@gameHistory')->name('game-history');
        Route::get('bid-history', 'GameController@bidHistory')->name('bid-history');
        Route::get('option-reward', 'GameController@optionReward')->name('option-reward');
    });
});

// admin route
Route::namespace('Admin')->prefix('admin')->middleware(['admin', 'auth'])->name('admin.')
->group(
    function () {
        Route::get('manage-customer', 'AdminController@manageCustomer')->name('manage-customer');
        Route::put('manage-customer/{user}', 'AdminController@updateCustomer')->name('manage-customer.update');
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/', 'OrderController@index')->name('index');
            Route::get('new', 'OrderController@newOrder')->name('new');
            Route::put('cancel/{order}', 'OrderController@cancel')->name('cancel');
            Route::put('submit-voucher-code/{order}', 'OrderController@submitVoucherCode')->name('submit-voucher-code');
            Route::put('change-status/{order}', 'OrderController@changeStatus')->name(
                'change-status'
            );
        });

        Route::get('all-category/{cat}/sub', 'AllCategoryController@subCategoryIndex')->name(
            'all-category.sub.index'
        );
        Route::post('all-category/{cat}/sub/store', 'AllCategoryController@subCategoryStore')
        ->name('all-category.sub.store');
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
        Route::resource('products' , 'ProductController');
        Route::resource('payment' , 'PaymentController');
        Route::resource('product-discounts' , 'ProductDiscountController');
        Route::resource('rules' , 'RulesController')->only(['store', 'index', 'destroy']);
        Route::resource('vouchers' , 'VoucherController')->only([
            'store', 'index', 'destroy', 'update'
        ]);
        Route::resource('setting' , 'SettingController')->only(['index', 'update']);

        
        // game management routes
        Route::name('game.')->prefix('game')->group(function () {
            Route::get('history', 'GameController@history')->name('history');
            Route::get('custom-game', 'GameController@customGame')->name('custom-game');
            Route::post('custom-game', 'GameController@storeCustomGame')->name('custom-game.store');
            Route::get('current', 'GameController@currentGame')->name('current');
            Route::post('current', 'GameController@setGameWinner')->name('current.set-winner');
        });
    }
);

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::resource('admins', 'Admin\AdminController')->only(
        'index', 'store', 'update', 'destroy'
    );
});
