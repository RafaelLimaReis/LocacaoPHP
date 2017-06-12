<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The site controllers namespace
     *
     * @var string
     */
    protected $siteNamespace = 'App\Http\Controllers\Site';

    /**
     * The admin controllers namespace
     *
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * The app controllers namespace
     *
     * @var string
     */
    protected $appNamespace = 'App\Http\Controllers\App';

    /**
     * The api controllers namespace
     *
     * @var string
     */
    protected $apiNamespace = 'App\Http\Controllers\Api';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->adminNamespace,
            'domain' => $this->devPrefix() . 'admin.',
            'middleware' => 'web',
            'as' => 'admin.',
        ], function ($router) {
            require app_path('Http/Routes/Admin.php');
        });

        $router->group([
            'namespace' => $this->appNamespace,
            'domain' => $this->devPrefix() . 'app.',
            'middleware' => 'web',
            'as' => 'app.',
        ], function ($router) {
            require app_path('Http/Routes/App.php');
        });

        $router->group([
            'namespace' => $this->apiNamespace,
            'domain' => $this->devPrefix() . 'api.',
            'middleware' => 'api',
            'as' => 'api.',
        ], function ($router) {
            require app_path('Http/Routes/Api.php');
        });

        $router->group([
            'namespace' => $this->siteNamespace,
            'domain' => $this->devPrefix(),
            'middleware' => 'web',
            'as' => 'site.',
        ], function ($router) {
            require app_path('Http/Routes/Site.php');
        });
    }

    public function devPrefix()
    {
        return app()->environment('dev') ? 'dev.' : '';
    }
}
