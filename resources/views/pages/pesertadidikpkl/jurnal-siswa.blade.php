@extends('layouts.master')
@section('title')
    @lang('translation.jurnal-siswa')
@endsection
@section('css')
    {{--  --}}
    <style>
        .text-center {
            text-align: center;
        }
    </style>
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
                <div class="card-body">
                    <h4 class="fs-18 lh-base mb-3">Rekapitulasi Jurnal : </h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan</th>
                                <th>Sudah</th>
                                <th>Belum</th>
                                <th>Tolak</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($rekapJurnal as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ \Carbon\Carbon::create()->month($data->bulan)->locale('id')->monthName }}
                                        {{ $data->tahun }}</td>
                                    <td class="text-center">{{ $data->sudah }}</td>
                                    <td class="text-center">{{ $data->belum }}</td>
                                    <td class="text-center">{{ $data->tolak }}</td>
                                    <td class="text-center">{{ $data->sudah + $data->belum }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        @can('create pesertadidikpkl/jurnal-siswa')
                            <a class="btn btn-soft-primary action"
                                href="{{ route('pesertadidikpkl.jurnal-siswa.create') }}">Buat
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

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('editJurnalModal');
            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                const id = button.getAttribute('data-id');
                const tanggalKirim = button.getAttribute('data-tanggal_kirim');
                const element = button.getAttribute('data-element');
                const idTp = button.getAttribute('data-id_tp');
                const keterangan = button.getAttribute('data-keterangan');
                const gambar = button.getAttribute('data-gambar');
                const penempatan = button.getAttribute('data-penempatan');

                // Isi form dengan data
                modal.querySelector('#tanggal_kirim').value = tanggalKirim;
                modal.querySelector('#element').value = element;
                modal.querySelector('#id_tp').value = idTp;
                modal.querySelector('#keterangan').value = keterangan;
                modal.querySelector('#penempatan').value = penempatan;

                // Update action form
                const form = modal.querySelector('#editJurnalForm');
                form.action = `/pesertadidikpkl/jurnal-siswa/${id}`;

                // Update image preview
                const imagePreview = modal.querySelector('#image-preview');
                if (gambar) {
                    imagePreview.src = `/images/thumbnail/${gambar}`;
                } else {
                    imagePreview.src = '{{ asset('images/noimagejurnal.jpg') }}';
                }
            });
        });

        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
