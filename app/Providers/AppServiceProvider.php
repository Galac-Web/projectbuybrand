<?php

namespace App\Providers;

use Illuminate\Foundation\Application as App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\App\Services\DaData::class, function (App $app) {
            return new \App\Services\DaData(env('DADATA_API_KEY'), env('DADATA_SECRET_KEY'));
        });
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }
}
