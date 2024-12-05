@extends('layouts.master')
@section('title')
    @lang('translation.select2')
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.components')
        @endslot
        @slot('li_2')
            @lang('translation.forms')
        @endslot
    @endcomponent

    <div class="alert alert-danger" role="alert">
        This is <strong>Select2</strong> page in wihch we have used <b>jQuery</b> with cdn link!
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Select2</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use <code>js-example-basic-single</code>, <code>js-example-basic-multiple</code>,
                        <code>js-example-data-array</code>, <code>js-example-templating</code>,
                        <code>select-flag-templating</code>, class to show select2 example.
                    </p>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Basic Select</h6>
                            <select class="js-example-basic-single" name="state">
                                <option value="AL">Alabama</option>
                                <option value="MA">Madrid</option>
                                <option value="TO">Toronto</option>
                                <option value="LO">Londan</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Multi Select</h6>
                            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <optgroup label="UK">
                                    <option value="London">London</option>
                                    <option value="Manchester" selected>Manchester</option>
                                    <option value="Liverpool">Liverpool</option>
                                </optgroup>
                                <optgroup label="FR">
                                    <option value="Paris">Paris</option>
                                    <option value="Lyon">Lyon</option>
                                    <option value="Marseille">Marseille</option>
                                </optgroup>
                                <optgroup label="SP">
                                    <option value="Madrid" selected>Madrid</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Malaga">Malaga</option>
                                </optgroup>
                                <optgroup label="CA">
                                    <option value="Montreal">Montreal</option>
                                    <option value="Toronto">Toronto</option>
                                    <option value="Vancouver">Vancouver</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Ajax Select</h6>
                            <select class="js-example-data-array" name="state"></select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Templating</h6>
                            <select class="form-control js-example-templating">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <h6 class="fw-semibold">Selections Templating</h6>
                            <select class="form-control select-flag-templating">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Disabling a Select2 Control</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Select2 will respond to the disabled attribute on <code>&lt;select&gt;</code>
                        elements. You can also initialize Select2 with disabled: true to get the same effect.</p>
                    <div class="vstack gap-3">
                        <select class="js-example-disabled" name="state">
                            <option value="AL">Alabama</option>
                            <option value="MA">Madrid</option>
                            <option value="TO">Toronto</option>
                            <option value="LO">Londan</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        <select class="js-example-disabled-multi" name="states[]" multiple="multiple">
                            <optgroup label="UK">
                                <option value="London">London</option>
                                <option value="Manchester" selected>Manchester</option>
                                <option value="Liverpool">Liverpool</option>
                            </optgroup>
                            <optgroup label="FR">
                                <option value="Paris">Paris</option>
                                <option value="Lyon">Lyon</option>
                                <option value="Marseille">Marseille</option>
                            </optgroup>
                            <optgroup label="SP">
                                <option value="Madrid" selected>Madrid</option>
                                <option value="Barcelona">Barcelona</option>
                                <option value="Malaga">Malaga</option>
                            </optgroup>
                            <optgroup label="CA">
                                <option value="Montreal">Montreal</option>
                                <option value="Toronto">Toronto</option>
                                <option value="Vancouver">Vancouver</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="hstack gap-2 mt-3">
                        <button type="button" class="js-programmatic-enable btn btn-primary">
                            Enable
                        </button>
                        <button type="button" class="js-programmatic-disable btn btn-success">
                            Disable
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
