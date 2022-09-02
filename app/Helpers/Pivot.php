<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pivot
{
    public function sync(Request $request, Model $model, $sync): void
    {
        if (is_string($sync)) {
            $sync = [$sync];
        }

        foreach ($sync as $key => $value) {
            $input = is_string($key) ? $key : $value;

            $model->$value()->detach();

            if ($request->has($input)) {
                $model->$value()->sync($request->input($input));
            }
        }
    }
}
