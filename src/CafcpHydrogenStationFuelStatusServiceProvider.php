<?php

namespace Mechawrench\CafcpHydrogenStationFuelStatus;

use Illuminate\Support\ServiceProvider;

class CafcpHydrogenStationFuelStatusServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cafcp-hydrogen-station-fuel-status');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'cafcp-hydrogen-station-fuel-status');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('cafcp-hydrogen-station-fuel-status.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/cafcp-hydrogen-station-fuel-status'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/cafcp-hydrogen-station-fuel-status'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/cafcp-hydrogen-station-fuel-status'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cafcp-hydrogen-station-fuel-status');

        // Register the main class to use with the facade
        $this->app->singleton('cafcp-hydrogen-station-fuel-status', function () {
            return new CafcpHydrogenStationFuelStatus;
        });
    }
}
