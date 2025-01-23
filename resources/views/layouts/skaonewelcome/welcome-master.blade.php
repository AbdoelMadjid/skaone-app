<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Title -->
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{ $profileApp->app_nama ?? '' }}</title>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta content="{{ $profileApp->app_deskripsi ?? '' }}" name="description" />
        <meta content="{{ $profileApp->app_pengembang ?? '' }}" name="author" />

        @include('layouts.skaonewelcome.welcome-head-css')
    </head>

    <body>
        <main>
            <!-- Header -->
            @include('layouts.skaonewelcome.welcome-header')
            <!-- End Header -->

            @yield('content')

            <!-- Footer -->
            @include('layouts.skaonewelcome.welcome-footer')
            <!-- End Footer -->

            <!-- Go to Top -->
            <a class="js-go-to u-go-to-v1 u-shadow-v32 g-width-40 g-height-40 g-color-primary g-color-white--hover g-bg-white g-bg-main--hover g-bg-main--focus g-font-size-12 rounded-circle"
                href="#" data-type="fixed" data-position='{
       "bottom": 15,
       "right": 15
     }'
                data-offset-top="400" data-compensation="#js-header" data-show-effect="slideInUp"
                data-hide-effect="slideInDown">
                <i class="hs-icon hs-icon-arrow-top"></i>
            </a>
            <!-- End Go to Top -->
        </main>

        @include('layouts.skaonewelcome.welcome-vendor-scripts')


    </body>

</html>
