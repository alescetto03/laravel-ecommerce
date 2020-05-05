<?php

namespace App\Providers;

use App\Api\Model\RoleInterface;
use App\Api\Role\RoleFactoryInterface;
use App\Api\Role\RoleRepositoryInterface;
use App\Factory\RoleFactory;
use App\Model\Role;
use App\Repository\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
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
            RoleInterface::class,
            Role::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            RoleFactoryInterface::class,
            RoleFactory::class
        );

        $this->app->singleton(
            RoleFactoryInterface::class,
            RoleFactory::class
        );
    }
}