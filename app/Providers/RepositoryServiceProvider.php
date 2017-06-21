<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepositoryEloquent;
use App\Repositories\Interfaces\UserRepository;

use App\Repositories\AreaRepositoryEloquent;
use App\Repositories\Interfaces\AreaRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
        $this->app->bind(
            AreaRepository::class,
            AreaRepositoryEloquent::class
        );
    }
}
