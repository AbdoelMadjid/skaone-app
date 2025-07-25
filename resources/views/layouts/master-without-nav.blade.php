<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-sidebar-image="none">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | {{ $profileApp->app_nama ?? '' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ $profileApp->app_deskripsi ?? '' }}" name="description" />
        <meta content="{{ $profileApp->app_pengembang ?? '' }}" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon"
            href="{{ $profileApp->app_icon ? URL::asset('build/images/' . $profileApp->app_icon) : URL::asset('build/images/icon-blue.png') }}">
        @include('layouts.head-css')
    </head>

    @yield('body')

    @yield('content')

    @include('layouts.vendor-scripts')
    </body>

</html>
