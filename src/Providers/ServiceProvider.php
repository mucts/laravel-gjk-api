<?php


namespace MuCTS\Laravel\GuiJK\Providers;


use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as Provider;
use MuCTS\Laravel\GuiJK\Gjk;

class ServiceProvider extends Provider implements DeferrableProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/../config/gjk.php', 'gjk'
        );
        $this->app->singleton('gjk', function ($app) {
            return new Gjk($app->config['gjk']);
        });
    }

    public function boot()
    {
        if (!file_exists(config_path('gjk.php'))) {
            $this->publishes([
                dirname(__DIR__) . '/../config/gjk.php' => config_path('gjk.php'),
            ], 'config');
        }
    }

    public function provides()
    {
        return ['gjk', Gjk::class];
    }
}