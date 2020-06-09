<?php

namespace App\Providers;

use App\Api\Model\ProductBadgeInterface;
use App\Api\ProductBadge\ProductBadgeFactoryInterface;
use App\Api\ProductBadge\ProductBadgeRepositoryInterface;
use App\Factory\ProductBadgeFactory;
use App\Model\ProductBadge;
use App\Repository\ProductBadgeRepository;
use Illuminate\Support\ServiceProvider;

class ProductBadgeServiceProvider extends ServiceProvider
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
            ProductBadgeInterface::class,
            ProductBadge::class
        );

        $this->app->bind(
            ProductBadgeRepositoryInterface::class,
            ProductBadgeRepository::class
        );

        $this->app->singleton(
            ProductBadgeRepositoryInterface::class,
            ProductBadgeRepository::class
        );

        $this->app->bind(
            ProductBadgeFactoryInterface::class,
            ProductBadgeFactory::class
        );

        $this->app->singleton(
            ProductBadgeFactoryInterface::class,
            ProductBadgeFactory::class
        );
    }
}
