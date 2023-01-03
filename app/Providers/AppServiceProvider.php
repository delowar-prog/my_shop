<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Cart;
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
       View::composer('layouts.inc.header_top',function ($data){
        $data->with('cartQty',Cart::count());
        $data->with('cartTotal',Cart::total());
        });
    }
}
