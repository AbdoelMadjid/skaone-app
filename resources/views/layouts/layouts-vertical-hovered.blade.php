<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-layout-style="default"
    data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover"
    data-layout-width="fluid">

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

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('layouts.topbar')
            @include('layouts.sidebar')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <!-- Start content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div> <!-- content -->
                </div>
                @include('layouts.footer')
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        @include('layouts.customizer')
        <!-- END Right Sidebar -->

        @include('layouts.vendor-scripts')
    </body>

</html>
