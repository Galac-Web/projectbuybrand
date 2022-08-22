<!DOCTYPE html>
<html lang="{{ lang() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('title')
    <title>@yield('title') - @lang('Dashboard') — {{ config('app.name') }}</title>
    @else
    <title>@lang('Dashboard') — {{ config('app.name') }}</title>
    @endif
    <link href="{{ mix('/assets/dashboard/css/app.css') }}" rel="stylesheet">
    <link href="/assets/dashboard/css/sb-admin-2.css" rel="stylesheet">
    <script>
        const app = {
            uploads: {
                ckeditor: {
                    url: '@route('dashboard.ckeditor.upload')',
                },
            },
        };
    </script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <x-dashboard.menu />
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('dashboard.layouts.inc.topbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        @yield('buttons')
                    </div>
                    <div id="app">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('dashboard.layouts.inc.footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @stack('modal')
    @include('dashboard.layouts.inc.modals')
    <script src="/assets/dashboard/js/app.js"></script>
    @stack('scripts')
</body>
</html>