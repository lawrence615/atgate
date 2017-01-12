<?php

namespace Mobidev\ATGate;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Mobidev\ATGate\facades\ATGateClass;

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
        // Not sure we need this
        $this->app->make('Mobidev\ATGate\controllers\ATGateController');

        App::bind('atgateclass', function () {
            return new ATGateClass();
        });
    }
}
