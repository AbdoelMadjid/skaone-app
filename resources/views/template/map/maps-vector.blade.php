@extends('layouts.master')
@section('title')
    @lang('translation.vector')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.components')
        @endslot
        @slot('li_2')
            @lang('translation.maps')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Markers</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="world-map-line-markers" data-colors='["--vz-light"]' style="height: 420px"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">World Vector Map with Markers</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="world-map-markers" data-colors='["--vz-light"]' style="height: 350px" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">World Vector Map with Image Markers</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="world-map-markers-image" data-colors='["--vz-light"]' style="height: 350px" dir="ltr">
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">USA Vector Map</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="usa-vectormap" data-colors='["--vz-primary"]' style="height: 350px"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Canada Vector Map</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="canada-vectormap" data-colors='["--vz-info"]' style="height: 350px"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Russia Vector Map</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="russia-vectormap" data-colors='["--vz-success"]' style="height: 350px"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Spain Vector Map</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="spain-vectormap" data-colors='["--vz-secondary"]' style="height: 350px"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/us-merc-en.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/canada.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/russia.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/spain.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/vector-maps.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
