@extends('layouts.master')
@section('title')
    @lang('translation.peserta-prakerin')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.administrator')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                    <div>
                        @if (auth()->check() &&
                                auth()->user()->hasAnyRole(['master', 'adminpkl']))
                            <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#distribusiPeserta" id="distribusiPesertaBtn"
                                title="Distribusikan Peserta Prakerin">Distribusi
                                Peserta</button>
                        @endif
                        @can('create administratorpkl/peserta-prakerin')
                            <a class="btn btn-soft-primary btn-sm action"
                                href="{{ route('administratorpkl.peserta-prakerin.create') }}">Tambah</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.pkl.administratorpkl.peserta-prakerin-distribusi')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pesertaprakerin-table';

        handleDataTableEvents(datatable);
        handleAction(datatable, function(res) {
            select2Init();
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
