<?php

namespace App\Providers;

use App\Api\Model\RoleUserInterface;
use App\Api\RoleUser\RoleUserFactoryInterface;
use App\Api\RoleUser\RoleUserRepositoryInterface;
use App\Factory\RoleUserFactory;
use App\Model\RoleUser;
use App\Repository\RoleUserRepository;
use Illuminate\Support\ServiceProvider;

class RoleUserServiceProvider extends ServiceProvider
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
            RoleUserInterface::class,
            RoleUser::class
        );

        $this->app->bind(
            RoleUserRepositoryInterface::class,
            RoleUserRepository::class
        );

        $this->app->singleton(
            RoleUserRepositoryInterface::class,
            RoleUserRepository::class
        );

        $this->app->bind(
            RoleUserFactoryInterface::class,
            RoleUserFactory::class
        );
    }
}
