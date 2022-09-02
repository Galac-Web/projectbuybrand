<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\View\View;
use App\View\Composers\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as Facade;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Settings::class);
    }

    public function boot()
    {
        // For example:
        // $this->composer('index', fn (View $view) => $view);
        
        $this->composer('*', Settings::class);
        $this->composer('layouts.inc.header', fn (View $view) => $view->with('languages', Language::active()->get()));

        // Dashboard
        $this->composer('dashboard.*', function (View $view) {
            $view->with('route', $this->app->make(\App\Helpers\Route::class));
            $view->with('ajax', request()->ajax());
        });

        $this->composer('dashboard.templates.*', function (View $view) {
            $view->with('template', \Illuminate\Support\Str::after($view->getName(), 'dashboard.templates.'));
        });
    }

    private function composer($views, $callback): array
    {
        return Facade::composer($views, $callback);
    }
}
