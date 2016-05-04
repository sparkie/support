<?php

namespace Sparkie\Support\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class SupportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'support');
        $this->setupRoutes($this->app->router);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Sparkie\\Support\\Http\\Controllers'], function($router)
        {
            require __DIR__ . '/../Http/routes.php';
        });
    }
}
