<!DOCTYPE html>
<html lang="{{ lang() }}">
<head>
    @include('layouts.inc.head')
    @include('layouts.inc.favicon')

    <link rel="preload" href="/styles/main.css" as="style">
    <link rel="preload" href="/scripts/main.js" as="script">
    <link rel="preconnect" href="//cdn.jsdelivr.net">
    <link rel="preconnect" href="//cdnjs.cloudflare.com">

    {{-- Plugins --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/libs/perfect-scrollbar-1.5.3/css/perfect-scrollbar.css">

    {{-- Main --}}
    <link rel="stylesheet" href="/styles/main.css">
    {{-- <link rel="stylesheet" href="{{ mix('styles/app.css') }}"> --}}

    <script>
        const app = {
            token: '{{ csrf_token() }}',
            locale: '{{ lang() }}',
        }
    </script>
    <style>
        img {
            image-rendering: -webkit-optimize-contrast;
        }
    </style>
    @stack('scripts-head')
</head>
<body>
    @include('layouts.inc.header')
    @yield('content')
    @include('layouts.inc.footer')
    @include('layouts.inc.message')
    @stack('modal')

    {{-- <script src="{{ mix('scripts/app.js') }}"></script> --}}
    {{-- <script src="/assets/libs/perfect-scrollbar-1.5.3/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.js"></script>
    <script src="/scripts/plugins/d3.v2.js"></script> --}}

    {{-- plugins --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.js"></script>
    <script src="/scripts/plugins/d3.v2.js"></script>
    <script src="/assets/libs/perfect-scrollbar-1.5.3/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    @stack('plugins')

    {{-- main --}}
    <script src="/scripts/main.js"></script>
    <script src="/scripts/graph.js"></script>
    @stack('scripts')
</body>
</html>