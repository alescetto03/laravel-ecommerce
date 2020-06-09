<?php

namespace App\Providers;

use App\Api\Badge\BadgeFactoryInterface;
use App\Api\Badge\BadgeManagementInterface;
use App\Api\Badge\BadgeRepositoryInterface;
use App\Api\Model\BadgeInterface;
use App\Factory\BadgeFactory;
use App\Management\BadgeManagement;
use App\Model\Badge;
use App\Repository\BadgeRepository;
use Illuminate\Support\ServiceProvider;

class BadgeServiceProvider extends ServiceProvider
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
            BadgeInterface::class,
            Badge::class
        );

        $this->app->bind(
            BadgeRepositoryInterface::class,
            BadgeRepository::class
        );

        $this->app->singleton(
            BadgeRepositoryInterface::class,
            BadgeRepository::class
        );

        $this->app->bind(
            BadgeFactoryInterface::class,
            BadgeFactory::class
        );

        $this->app->singleton(
            BadgeFactoryInterface::class,
            BadgeFactory::class
        );

        $this->app->bind(
            BadgeManagementInterface::class,
            BadgeManagement::class
        );

        $this->app->singleton(
            BadgeManagementInterface::class,
            BadgeManagement::class
        );
    }
}
