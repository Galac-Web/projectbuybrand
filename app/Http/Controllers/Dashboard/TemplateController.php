<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function __invoke(Request $request)
    {
        $template = 'dashboard.templates.' . $request->template;

        if (!view()->exists($template)) {
            throw new \Exception('Template not found');
        }

        return view($template, $request->all());
    }
}
