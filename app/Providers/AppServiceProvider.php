<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Session;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // view()->composer('views.category', function($view) {
        //     $categories = Category::all();
        //     $view->with('categories',$categories);
        //     // dd($categories);
        // });
        
        view()->composer([
            'layouts.nav',
            'layouts.nav-custom',
            'views.homepage.location',
            'views.homepage.promotion',
            'views.cart.cart'
            ],
            function($view) {
                if(Session('cart')){
                    $oldCart = Session::get('cart');
                    $cart = new Cart($oldCart);
                    $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,
                                'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
                }
            });
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
