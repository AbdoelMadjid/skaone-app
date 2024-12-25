@extends('layouts.master')
@section('title')
    @lang('translation.validasi-jurnal')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.pembimbingpkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        {{--  @can('create pesertadidikpkl/jurnal-siswa')
                            <a class="btn btn-primary action" href="{{ route('pesertadidikpkl.jurnal-siswa.create') }}">Buat
                                Jurnal Siswa</a>
                        @endcan --}}
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-auto ms-auto">
                                <div>
                                    <select class="form-control" id="idPenempatan">
                                        <option value="all" selected>Pilih Peserta Terbimbing</option>
                                        @foreach ($optionsArray as $id => $nama)
                                            <option value="{{ $id }}">{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" id="idvalidasi">
                                        <option value="all" selected>Validasi</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'validasijurnal-table';

        $(document).ready(function() {
            const table = $("#validasijurnal-table").DataTable();

            // Event pencarian dan filter
            $("#idPenempatan, #idvalidasi").on("change keyup", function() {
                table.ajax.reload();
            });


            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
