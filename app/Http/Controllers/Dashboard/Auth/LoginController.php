<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');

        debugbar()->disable();
    }

    public function __invoke()
    {
        return view('dashboard.auth.login');
    }
}
