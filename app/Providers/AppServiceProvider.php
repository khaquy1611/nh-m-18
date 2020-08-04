<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\CartHelper;
use App\Models\Category;
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
       view()->composer('*',function($view){
            $view->with([
                'cart'=> new CartHelper()
            ]);
       });
    }
}
