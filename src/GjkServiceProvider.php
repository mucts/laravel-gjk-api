<?php


namespace MuCTS\Laravel\GuiJK;


use Illuminate\Support\ServiceProvider;

class GjkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!file_exists(config_path('gjk.php'))) {
            $this->publishes([
                dirname(__DIR__) . '/config/gjk.php' => config_path('gjk.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/gjk.php', 'gjk'
        );
    }
}