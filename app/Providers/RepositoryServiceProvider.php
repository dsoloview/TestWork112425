<?php

namespace App\Providers;

use App\Contracts\BaseRepositoryContract;
use App\Contracts\ProductsRepositoryContract;
use App\Contracts\ShopsRepositoryContract;
use App\Repository\BaseRepository;
use App\Repository\ProductsRepository;
use App\Repository\ShopsRepository;
use Faker\Provider\Base;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShopsRepositoryContract::class, ShopsRepository::class);
        $this->app->singleton(ProductsRepositoryContract::class, ProductsRepository::class);
        $this->app->singleton(BaseRepositoryContract::class, BaseRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
