<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\View\Components\Adminmart\Alert as AdminMartAlert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use URL;

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
        View::share('userDetail', Auth::user());

        Blade::directive('currency', function ($value) {
            return "Rp <?php echo number_format($value) ?>";
        });

        Blade::component('adminmart-alert', AdminMartAlert::class);
    }
}
