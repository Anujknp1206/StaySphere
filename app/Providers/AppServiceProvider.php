<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageManager::class, function () {
            return new ImageManager(new Driver());// use 'imagick' if preferred
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::first();
        View::share('setting', $setting);
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $cartCount = collect($cart)->sum('quantity');
            $view->with('cartCount', $cartCount);
        });
    }
}
