<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
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
        Builder::defaultStringLength(191);

        view()->composer('layouts.header', function($view) {
            $cart = $this->app->make('App\Api\Model\CartInterface');
            $categoryRepository = $this->app->make('App\Api\Category\CategoryRepositoryInterface');

            $view->with('cart', $cart->count())->with('categories', $categoryRepository->getAll());
        });
    }
}
