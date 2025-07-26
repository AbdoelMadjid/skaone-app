@extends('layouts.master')
@section('title')
    @lang('translation.app-profil')
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
    @if (auth()->check() &&
            auth()->user()->hasAnyRole(['master']))
        <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <x-heading-title>@yield('title')</x-heading-title>
                </div>
            </div>
            <div class="card-body p-1">
                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2" role="alert">
                            <div class="alert-body">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-alert-line display-6 align-middle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="alert-heading">Mohon Maaf !!. <br>Halaman @yield('title')</h5>
                                        <p class="mb-0">TIDAK BISA ANDA AKSES. </p>
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
    @endif
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'appprofil-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
