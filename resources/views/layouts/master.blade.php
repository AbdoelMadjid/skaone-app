<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    <head>
        <meta charset="utf-8" />
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{ $profileApp->app_nama ?? '' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ $profileApp->app_deskripsi ?? '' }}" name="description" />
        <meta content="{{ $profileApp->app_pengembang ?? '' }}" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon"
            href="{{ $profileApp->app_icon ? URL::asset('build/images/' . $profileApp->app_icon) : URL::asset('build/images/icon-blue.png') }}">
        @include('layouts.head-css')
    </head>

    @section('body')
        @include('layouts.body')
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="modal fade" id="modal_action" tabindex="-1"
                        aria-labelledby="myModalLabel"aria-hidden="true">
                    </div>
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>

            <!-- End Page-content -->
            @include('layouts.footer')

            <div class="preloader" style="visibility:hidden;">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @php
        $iscustomizerActive = App\Helpers\Fitures::isFiturAktif('theme-customizer');
    @endphp

    @if ($iscustomizerActive)
        @if (auth()->check() &&
                auth()->user()->hasAnyRole(['master']))
            @include('layouts.customizer')
        @endif
    @endif
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')

    @php
        use Illuminate\Support\Str;

        $swalMessages = collect(session()->all())->filter(
            fn($v, $k) => Str::startsWith($k, ['error', 'success', 'warning', 'info']),
        );

        $notifyVia = session('notify_via', 'swal'); // default swal
    @endphp

    @if ($swalMessages->isNotEmpty())
        <div id="swal-session-container" style="display: none;" data-notify-via="{{ $notifyVia }}">
            @foreach ($swalMessages as $key => $message)
                @php
                    $type = Str::contains($key, 'error')
                        ? 'error'
                        : (Str::contains($key, 'success')
                            ? 'success'
                            : (Str::contains($key, 'warning')
                                ? 'warning'
                                : 'info'));
                @endphp
                <div class="swal-session" data-status="{{ $type }}" data-message="{{ $message }}">
                </div>
            @endforeach
        </div>
    @endif

    </body>

</html>
