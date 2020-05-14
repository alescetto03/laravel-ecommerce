<?php

namespace App\Providers;

use App\Api\Model\ProductInterface;
use App\Api\Product\ProductFactoryInterface;
use App\Api\Product\ProductManagementInterface;
use App\Api\Product\ProductRepositoryInterface;
use App\Factory\ProductFactory;
use App\Management\ProductManagement;
use App\Model\Product;
use App\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            ProductInterface::class,
            Product::class
        );

        $this->app->bind(
            ProductFactoryInterface::class,
            ProductFactory::class
        );

        $this->app->singleton(
            ProductFactoryInterface::class,
            ProductFactory::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            ProductManagementInterface::class,
            ProductManagement::class
        );

        $this->app->singleton(
            ProductManagementInterface::class,
            ProductManagement::class
        );
    }
}
