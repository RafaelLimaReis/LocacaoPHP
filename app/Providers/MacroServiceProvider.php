<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once base_path() . '/resources/macros.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
