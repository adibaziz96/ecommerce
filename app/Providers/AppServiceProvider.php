<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Auth,DB;

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
        view()->composer('*', function($view){
            if(Auth::check()){
                $cart = count(Cart::select('cart.user_id','cart.name','cart.imageSrc','cart.imageAlt','cart.price','cart.color','cart.size',DB::raw('count(*) as total'))
                                    ->where('user_id',Auth::user()->id)
                                    ->groupBy(['user_id','name','imageSrc','imageAlt','price','color','size'])
                                    ->get());
                View::share('cart',$cart);
            }
        });
    }
}
