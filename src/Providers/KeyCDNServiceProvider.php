<?php

namespace Blokks\Services\Providers;

use Blokks\Services\KeyCDN;
use Illuminate\Support\ServiceProvider;

class KeyCDNServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('keycdn.php'),
        ]);
    }


    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Blokks\Services\KeyCDN', function ($app) {
            $apiKey = config('keycdn.api_key');
            $baseUrl = config('keycdn.base_url');

            return new KeyCDN($apiKey, $baseUrl);
        });
    }
}
