@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-ujian')
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
            @lang('translation.perangkat-ujian')
        @endslot
        @slot('li_3')
            @lang('translation.administrasi-ujian')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    {{-- <x-btn-single label="Tambah Massal" icon="ri-checkbox-multiple-fill" iconSmall="ri-save-2-line"
                        responsive="true" id="btnTambahMassal" /> --}}
                    <x-btn-action dinamisBtn="true" label="Tambah Massal" icon="ri-checkbox-multiple-fill"
                        id="btnTambahMassal" />
                    <x-btn-tambah dinamisBtn="true" can="create kurikulum/perangkatujian/administrasi-ujian/jadwal-ujian"
                        route="kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.create" label="Tambah"
                        icon="ri-add-line" />
                </div>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.index') }}"
                            class="dropdown-item">Ruang Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.index') }}"
                            class="dropdown-item">Peserta
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.index') }}"
                            class="dropdown-item">Jadwal
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.index') }}"
                            class="dropdown-item">Pengawas
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}"
                            class="dropdown-item">Kembali</a>
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.kurikulum.perangkatujian.adminujian.crud-jadwal-ujian-form-massal')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'jadwalujian-table';

        $(document).ready(function() {
            // Buka modal
            $('#btnTambahMassal').click(function() {
                $('#massal_kode_kk').val('');
                $('#massal_tingkat').val('');
                $('#massal_table_wrap').html('');
                $('#modalMassal').modal('show');
            });

            // Event ketika select berubah
            $('#massal_kode_kk, #massal_tingkat').on('change', function() {
                let kode_kk = $('#massal_kode_kk').val();
                let tingkat = $('#massal_tingkat').val();

                if (kode_kk && tingkat) {
                    $.ajax({
                        url: '{{ url('kurikulum/perangkatujian/generatejadwalmassal') }}',
                        type: 'GET',
                        data: {
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(res) {
                            let html = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam Ke</th>
                            <th>Jam Ujian</th>
                            <th>Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>`;

                            res.tanggal.forEach((tglObj, index) => {
                                let tanggal = new Date(tglObj.date).toISOString().split(
                                    'T')[0];

                                for (let ke = 1; ke <= 4; ke++) {
                                    html += `<tr>`;

                                    // Input tanggal disimpan di setiap baris secara hidden
                                    html +=
                                        `<input type="hidden" name="tanggal[]" value="${tanggal}">`;

                                    // Tampilkan tanggal hanya di baris pertama
                                    if (ke === 1) {
                                        html += `<td rowspan="4">${tanggal}</td>`;
                                    }

                                    html += `
                            <td><input type="hidden" name="jam_ke[]" value="${ke}">${ke}</td>
                            <td><input type="hidden" name="jam_ujian[]" value="${res.jamKeList[ke]}">${res.jamKeList[ke]}</td>
                            <td>
                                <select name="mata_pelajaran[]" class="form-select">
                                    <option value="">-- Pilih --</option>`;

                                    res.mapel.forEach((mp) => {
                                        html +=
                                            `<option value="${mp}">${mp}</option>`;
                                    });

                                    html += `
                                    <option value="Dasar-Dasar Kejuruan">Dasar-Dasar Kejuruan</option>
                                    <option value="Konsentrasi Keahlian">Konsentrasi Keahlian</option>
                                    <option value="Mata Pelajaran Pilihan">Mata Pelajaran Pilihan</option>
                                </select>
                            </td>
                        </tr>`;
                                }
                            });

                            html += `</tbody></table>`;
                            $('#massal_table_wrap').html(html);
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert('Gagal memuat data jadwal');
                        }
                    });
                }
            });

            $('#formMassal').submit(function(e) {
                e.preventDefault();
                let data = [];

                $('#massal_table_wrap tbody tr').each(function() {
                    let tanggal = $(this).find('input[name="tanggal[]"]').val();
                    let jam_ke = $(this).find('input[name="jam_ke[]"]').val();
                    let jam_ujian = $(this).find('input[name="jam_ujian[]"]').val();
                    let mata_pelajaran = $(this).find('select[name="mata_pelajaran[]"]').val();

                    if (mata_pelajaran) {
                        data.push({
                            kode_ujian: '{{ $ujianAktif->kode_ujian ?? '' }}',
                            kode_kk: $('#massal_kode_kk').val(),
                            tingkat: $('#massal_tingkat').val(),
                            tanggal: tanggal,
                            jam_ke: jam_ke,
                            jam_ujian: jam_ujian,
                            mata_pelajaran: mata_pelajaran
                        });
                    }
                });

                $.ajax({
                    url: '{{ url('kurikulum/perangkatujian/simpan-massal') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: data
                    },
                    success: function() {
                        showToast('success', 'Data berhasil disimpan');
                        $('#jadwalujian-table').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        showToast('error', 'Terjadi kesalahan saat menyimpan');
                    }
                });
            });
        });


        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
