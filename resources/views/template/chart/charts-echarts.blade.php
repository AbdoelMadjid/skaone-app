@extends('layouts.master')
@section('title')
    @lang('translation.echarts')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.components')
        @endslot
        @slot('li_2')
            @lang('translation.charts')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Line Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-line" data-colors='["--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stacked Line Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-line-stacked"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Area Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-area" data-colors='["--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stacked Area Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-area-stacked"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Step Line</h4>
                </div>
                <div class="card-body">
                    <div id="chart-step-line" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Line Y Category</h4>
                </div>
                <div class="card-body">
                    <div id="chart-line-y-category" data-colors='["--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic Bar</h4>
                </div>
                <div class="card-body">
                    <div id="chart-bar" data-colors='["--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Bar Label</h4>
                </div>
                <div class="card-body">
                    <div id="chart-bar-label-rotation"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]' class="e-charts">
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Horizontal Bar</h4>
                </div>
                <div class="card-body">
                    <div id="chart-horizontal-bar" data-colors='["--vz-primary", "--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stacked Horizontal Bar</h4>
                </div>
                <div class="card-body">
                    <div id="chart-horizontal-bar-stacked"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pie Charts</h4>
                </div>
                <div class="card-body">
                    <div id="chart-pie"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Doughnut Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-doughnut"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic Scatter Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-scatter" data-colors='["--vz-primary"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Candlestick Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-candlestick" data-colors='["--vz-danger", "--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Graph Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-graph" data-colors='["--vz-primary"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Treemap Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-treemap" data-colors='["--vz-primary", "--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Sunburst Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-sunburst" data-colors='["--vz-warning", "--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Parallel Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-parallel" data-colors='["--vz-success"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Sankey Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-sankey"
                        data-colors='["--vz-info", "--vz-success", "--vz-warning", "--vz-danger", "--vz-primary"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Funnel Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-funnel"
                        data-colors='["--vz-primary", "--vz-danger, "--vz-info", "--vz-success", "--vz-wrning"]'
                        class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Gauge Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-gauge" data-colors='["--vz-primary"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Heatmap Chart</h4>
                </div>
                <div class="card-body">
                    <div id="chart-heatmap" data-colors='["--vz-primary", "--vz-warning"]' class="e-charts"></div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/echarts.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
