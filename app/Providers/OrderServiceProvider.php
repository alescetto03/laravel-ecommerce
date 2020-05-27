<?php

namespace App\Providers;

use App\Api\Model\OrderInterface;
use App\Api\Order\OrderFactoryInterface;
use App\Api\Order\OrderRepositoryInterface;
use App\Factory\OrderFactory;
use App\Model\Order;
use App\Repository\OrderRepository;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
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
            OrderInterface::class,
            Order::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->bind(
            OrderFactoryInterface::class,
            OrderFactory::class
        );

        $this->app->singleton(
            OrderFactoryInterface::class,
            OrderFactory::class
        );
    }
}
