<?php

namespace Musil;

use Illuminate\Support\ServiceProvider;

class MusilServiceProvider extends ServiceProvider
{
    protected $commands = [];

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('musil.php'),
            __DIR__.'/helper.php' => app_path('Helpers/musil.php'),
        ], 'config');
    }

    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $helper)
            require_once($helper);
    }
}