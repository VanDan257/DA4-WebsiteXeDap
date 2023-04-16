<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\categoryModel;
use Session;
use App\Models\cartModel;


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
        view()->composer('*', function($view){
            $categories = categoryModel::all();

            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new cartModel($oldCart);
            }    
            // $view->with(['categories', $categories, 'cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 
            // 'totalPrice'=>$cart->totalPrice, 'totalQuantity'=>$cart->totalQuantity]);
            $view->with('categories', $categories);
        });
    }
}
