<?php

namespace App\Providers;

use App\Api\Category\CategoryFactoryInterface;
use App\Api\Category\CategoryManagementInterface;
use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Model\CategoryInterface;
use App\Factory\CategoryFactory;
use App\Management\CategoryManagement;
use App\Model\Category;
use App\Repository\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
            CategoryInterface::class,
            Category::class
        );

        $this->app->bind(
            CategoryFactoryInterface::class,
            CategoryFactory::class
        );

        $this->app->singleton(
            CategoryFactoryInterface::class,
            CategoryFactory::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            CategoryManagementInterface::class,
            CategoryManagement::class
        );

        $this->app->singleton(
            CategoryManagementInterface::class,
            CategoryManagement::class
        );
    }
}
