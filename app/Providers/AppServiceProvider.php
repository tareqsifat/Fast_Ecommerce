<?php

namespace App\Providers;

use App\Models\Add;
use App\Models\ProductStyle;
use App\Models\Sitedefault;
use App\Models\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // $webadds = Add::get();
        // View::share('webadds', $webadds);


        $settings = Sitedefault::first();
        View::share('settings', $settings);

        // Add to cart product button Productstyle 
        $product_styles = ProductStyle::first();
        View::share('product_styles', $product_styles);


        // $social = Social::where('status',0)->orderBy('id','desc')->get();
        // View::share('social', $social);
    }
}
