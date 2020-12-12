<?php

namespace App\Providers;

use App\Models\UserAddress;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Adminmart\Alert as AdminMartAlert;

class AppServiceProvider extends ServiceProvider
{



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::share('categories', ProductCategory::all());

        View::composer('*', function ($view) {
            $view->with('auth', Auth::user());

            //get all column on UserAddress except user_id
            $userAddress = new UserAddress();
            $addressColumnExceptUserId = array_diff($userAddress->getFillable(), ['user_id']);
            $inputIds = array_map(function ($label) {
                return Str::kebab($label);
            }, $addressColumnExceptUserId);
            $inputText = array_map(function ($text) {
                return Str::of($text)->replace('_', ' ')->title();
            }, $addressColumnExceptUserId);

            $view->with('columns', $addressColumnExceptUserId);
            $view->with('inputIds', $inputIds);
            $view->with('inputText', $inputText);
        });

        Blade::directive('currency', function ($value) {
            return "Rp <?php echo number_format($value) ?>";
        });

        Blade::component('adminmart-alert', AdminMartAlert::class);
    }
}
