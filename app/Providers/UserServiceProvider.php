<?php

namespace App\Providers;

use App\Api\Model\UserInterface;
use App\Api\User\UserFactoryInterface;
use App\Api\User\UserRepositoryInterface;
use App\Factory\UserFactory;
use App\Model\User;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
            UserInterface::class,
            User::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserFactoryInterface::class,
            UserFactory::class
        );

        $this->app->singleton(
            UserFactoryInterface::class,
            UserFactory::class
        );
    }
}
