<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->extend('command.controller.make', function ($command, $app) {
            return new \App\Console\Commands\ControllerMake($app['files']);
        });
    }

    public function boot()
    {
        
    }
}
