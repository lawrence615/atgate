<?php

namespace Mobidev\ATGate;

use Illuminate\Support\ServiceProvider;

class ATGateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish config file
        $this->publishes([
            __DIR__ . '/config/atgate.php' => config_path('atgate.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('africatgate', function ($app) {
            return new AfricaTGate($app['config']);
        });
    }
}
