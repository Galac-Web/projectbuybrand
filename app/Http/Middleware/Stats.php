<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;

class Stats
{
    public function handle(Request $request, Closure $next)
    {
        foreach ($request->route()->parameters() as $parameter) {
            if ($parameter instanceof Model) {
                /** @var Model $parameter */
                if (array_key_exists(\App\Traits\Stats::class, trait_uses_recursive($parameter))) {
                    $this->init($parameter, fn (MorphOne $stats) => $stats->increment('views'));
                }
            }
        }

        return $next($request);
    }

    private function init(Model $model, callable $callback): void
    {
        if (!$model->stats()->exists()) {
            $model->stats()->create();
        }

        $callback($model->stats());
    }
}
