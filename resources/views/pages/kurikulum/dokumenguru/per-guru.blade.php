@extends('layouts.master')
@section('title')
    @lang('translation.per-guru')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumenguru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div>
                <div class="card">
                    <div class="card-header">
                        <div class="p-3 bg-light rounded mb-0">
                            <form>
                                <div class="row g-2">
                                    <div class="col-lg">
                                        <div class="search-box">
                                            <input type="text" id="searchKBMList" class="form-control search"
                                                placeholder="Search Nama Guru Pengajar ....">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-select-tahunajaran" id="tahunajaran-select">
                                            <option value="">Tahun Ajaran</option>
                                            @foreach ($tahunAjaranOptions as $tahunajaran)
                                                <option value="{{ $tahunajaran }}"
                                                    @if ($tahunajaran == $tahunAjaran->tahunajaran) selected @endif>
                                                    {{ $tahunajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-auto">
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-select-semester" id="semester-select">
                                            <option value="">Semester</option>
                                            <option value="Ganjil" @if ($semester && $semester->semester == 'Ganjil') selected @endif>Ganjil
                                            </option>
                                            <option value="Genap" @if ($semester && $semester->semester == 'Genap') selected @endif>Genap
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-auto">
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-select-pengajar" id="pengajar-select">
                                            <option value="">Guru Pengajar</option>
                                            @foreach ($personils as $id_personil => $namalengkap)
                                                <option value="{{ $id_personil }}">{{ $namalengkap }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'ngajareperguru-table';

        handleDataTableEvents(datatable);
        handleAction(datatable);
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
