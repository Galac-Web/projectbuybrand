<?php

namespace App\Providers;

use App\Services\Routes\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Traits\Macros\RouteMacro as Macro;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    use Macro;

    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/';

    public function boot(): void
    {
        if (method_exists(self::class, 'macros')) {
            self::macros();
        }

        parent::boot();
    }

    /**
     * Map Routes
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapDashboardRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Web
     *
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        $middleware = [
            'web' => true,
            'location' => env('APP_LOCATION', false),
            'multilanguage' => multilanguage()->enabled(),
        ];

        $middleware = collect($middleware)->filter()->keys()->toArray();

        Route::middleware($middleware)
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Dashboard
     *
     * @return void
     */
    protected function mapDashboardRoutes(): void
    {
        $dashboard = Str::of(Dashboard::NAME)->trim('\\/')->lower();

        $base = [
            'prefix'    => (string) $dashboard,
            'name'      => (string) $dashboard->finish('.'),
            'namespace' => $this->namespace . (string) $dashboard->ucfirst()->start('\\')
        ];

        $data = [
            'auth' => [
                'middleware' => ['web'],
            ],
            'base' => [
                'group' => base_path('routes/' . (string) $dashboard . '.php'),
                'middleware' => ['web', 'dashboard.auth', 'dashboard'],
            ],
        ];

        foreach ($data as $name => $value) {
            Dashboard::routes(array_merge($base, $value), $name === 'auth');
        }
    }

    /**
     * API
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
