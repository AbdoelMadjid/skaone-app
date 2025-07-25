@extends('layouts.master')
@section('title')
    @lang('translation.ekspor-data-master')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    {{--  --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 280px);">
                <div class="col-lg-12">
                    <div class="text-center pt-4">
                        <div class="">
                            <img src="{{ URL::asset('build/images/error.svg') }}" alt=""
                                class="error-basic-img move-animation">
                        </div>
                        <div class="mt-n4">
                            <h1 class="display-1 fw-medium">404</h1>
                            <h3 class="text-uppercase">Sorry, Page not Found 😭</h3>
                            <p class="text-muted mb-4">The page you are looking for not available!</p>
                            <a href="/dashboard" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Back to
                                home</a>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2" role="alert">
                    <div class="alert-body">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                                    colors="primary:#f06548,secondary:#f7b84b" style="width:80px;height:80px"></lord-icon>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="alert-heading">Mohon Maaf !!. <br>
                                    <span class="text-danger-emphasis fs-24">Halaman
                                        @yield('title')</span>
                                </h5>
                                <p class="mb-0">Masih proses scripting. </p>
                            </div>
                        </div>
                    </div>
                    <div class="alert-content">
                        <p class="mb-0 fs-10">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
