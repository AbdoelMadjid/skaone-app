@extends('layouts.master')
@section('title')
    @lang('translation.persuratan')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.tata-usaha')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2" role="alert">
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ri-alert-line display-6 align-middle"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="alert-heading">Mohon Maaf !!. <br>Halaman @yield('title')</h5>
                                    <p class="mb-0">Masih proses scripting. </p>
                                </div>
                            </div>
                        </div>
                        <div class="alert-content">
                            <p class="mb-0">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
