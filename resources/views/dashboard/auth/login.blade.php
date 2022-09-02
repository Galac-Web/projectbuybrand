<!DOCTYPE html>
<html lang="{{ lang() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <link href="/assets/dashboard/css/app.css" rel="stylesheet">
    <link href="/assets/dashboard/css/sb-admin-2.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-4 d-none d-lg-block bg-login-image" style="background: url('/assets/images/logo-main.svg'); background-position: center right; background-repeat: no-repeat; background-size: 75%;"></div>
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">@lang('Sign In')</h1>
                                    </div>
                                    <form action="@route('login')" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="@lang('E-Mail')">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="@lang('Password')">
                                        </div>
                                        <div class="form-group d-none">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" id="remember" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="remember">
                                                    @lang('Remember Me')
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-4">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    @lang('Log In')
                                                    <i class="fal fa-fw fa-sign-in"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>