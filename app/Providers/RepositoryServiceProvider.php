<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepositoryEloquent;
use App\Repositories\Interfaces\UserRepository;

use App\Repositories\AreaRepositoryEloquent;
use App\Repositories\Interfaces\AreaRepository;

use App\Repositories\ReserveRepositoryEloquent;
use App\Repositories\Interfaces\ReserveRepository;

use App\Repositories\ScheduleRepositoryEloquent;
use App\Repositories\Interfaces\ScheduleRepository;

use App\Repositories\InvitedRepositoryEloquent;
use App\Repositories\Interfaces\InvitedRepository;

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
        $this->app->bind(
            ReserveRepository::class,
            ReserveRepositoryEloquent::class
        );
        $this->app->bind(
            ScheduleRepository::class,
            ScheduleRepositoryEloquent::class
        );
        $this->app->bind(
            InvitedRepository::class,
            InvitedRepositoryEloquent::class
        );
    }
}
