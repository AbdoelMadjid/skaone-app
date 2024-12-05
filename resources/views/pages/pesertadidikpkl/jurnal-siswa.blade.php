@extends('layouts.master')
@section('title')
    @lang('translation.jurnal-siswa')
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
            @lang('translation.pesertadidikpkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        @can('create pesertadidikpkl/jurnal-siswa')
                            <a class="btn btn-primary action" href="{{ route('pesertadidikpkl.jurnal-siswa.create') }}">Buat
                                Jurnal Siswa</a>
                        @endcan
                    </div>
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
        const datatable = 'jurnalsiswa-table';

        function updateTujuanPembelajaran(kodeCp) {
            const tujuanPembelajaranSelect = document.getElementById('id_tp');
            const kodeKk = document.getElementById('idKodeKK').value; // Ambil kode_kk dari input hidden

            // Kosongkan opsi sebelumnya
            tujuanPembelajaranSelect.innerHTML = '<option value="">Pilih Tujuan Pembelajaran</option>';

            if (kodeCp && kodeKk) {
                fetch(`{{ url('/pesertadidikpkl/get-tp') }}/${kodeCp}/${kodeKk}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id; // Gunakan id sebagai nilai opsi
                            option.textContent = item.isi_tp; // Gunakan isi_tp sebagai teks opsi
                            tujuanPembelajaranSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching TP data:', error));
            }
        }



        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
