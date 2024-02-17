<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Category;
use View;
use Cart;
use Illuminate\Pagination\Paginator;

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
        //
        View::composer('front.master', function ($view){
            $view->with('cartItems', Cart::content());
            $view->with('categories', (new Category())->getAllCategories(['status'=>Category::ACTIVE]));
        });

        // View::composer(['front.master','front.home.index'], function ($view){
        //     $view->with('categories', Category::where('status',1)->get());
        // });

        Paginator::useBootstrap();
    }
}
