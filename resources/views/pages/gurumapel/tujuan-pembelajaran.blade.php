@extends('layouts.master')
@section('title')
    @lang('translation.tujuan-pembelajaran')
@endsection
@section('css')
    {{--  --}}
    <style>
        .judul,
        th {
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')
                    <span class="d-none d-lg-inline"> - </span>
                    <br class="d-inline d-lg-none">
                    {{ $fullName }}
                </x-heading-title>
                <div class="flex-shrink-0 me-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#buatMateriAjar" id="buatMateriAjarBtn" title="Buat Tujuan Pembelajaran"><i
                            class="ri-add-fill fs-16"></i></button>
                </div>
                <div class="flex-shrink-0 me-2">
                    <button class="btn btn-soft-primary btn-sm" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWithicon2" aria-expanded="false" aria-controls="collapseWithicon2"
                        title="Cek Tujuan Pembelajaran">
                        <i class="ri-filter-2-fill fs-16"></i>
                </div>
                <div class="flex-shrink-0">
                    <button id="deleteSelected" class="btn btn-soft-danger btn-sm" style="display: none;"><i
                            class="ri-delete-bin-2-fill fs-16"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="collapse" id="collapseWithicon2">
                <div class="card ribbon-box border shadow-none mb-lg-2">
                    <div class="card-body">
                        <div class="ribbon ribbon-primary round-shape">Cek Tujuan Pembelajaran</div>
                        <div class="ribbon-content mt-5 text-muted">
                            <table class="table " style="no border">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kel Mapel</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kode Rombel</th>
                                        <th>Rombel</th>
                                        <th>Jumlah TP</th>
                                        <th>Cek TP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($KbmPersonil as $index => $kbm)
                                        <tr>
                                            <td class='text-center'>{{ $index + 1 }}.</td>
                                            <td>{{ $kbm->kel_mapel }}</td>
                                            <td>{{ $kbm->mata_pelajaran }}</td>
                                            <td>{{ $kbm->kode_rombel }}</td>
                                            <td>{{ $kbm->rombel }}</td>
                                            <td class='text-center'>
                                                @php
                                                    // Ambil cp_terpilih
                                                    $jmlTP = DB::table('tujuan_pembelajarans')
                                                        ->where('id_personil', $kbm->id_personil)
                                                        ->where('kode_rombel', $kbm->kode_rombel)
                                                        ->where('kel_mapel', $kbm->kel_mapel)
                                                        ->where('tahunajaran', $kbm->tahunajaran)
                                                        ->where('ganjilgenap', $kbm->ganjilgenap)
                                                        ->count();
                                                @endphp
                                                @if ($jmlTP)
                                                    {{ $jmlTP }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td class='text-center'>
                                                @php
                                                    // Ambil cp_terpilih
                                                    $cpTerpilih = DB::table('tujuan_pembelajarans')
                                                        ->where('id_personil', $kbm->id_personil)
                                                        ->where('kode_rombel', $kbm->kode_rombel)
                                                        ->where('kel_mapel', $kbm->kel_mapel)
                                                        ->where('tahunajaran', $kbm->tahunajaran)
                                                        ->where('ganjilgenap', $kbm->ganjilgenap)
                                                        ->first();
                                                @endphp
                                                @if ($cpTerpilih)
                                                    <i class="bx bx-message-square-check fs-3 text-info"></i>
                                                @else
                                                    <i class="bx bx-message-square-x fs-3 text-danger"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.gurumapel.tujuan-pembelajaran-form')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        // Nama ID tabel yang digunakan
        const datatable = 'tujuanpembelajaran-table';

        $(document).ready(function() {
            // Aktifkan DataTable pada tabel yang ada
            var table = $('#tujuanpembelajaran-table').DataTable();

            // ===============================
            // Fungsi: Pilih / batal pilih semua checkbox
            // ===============================
            $('#checkAll').on('click', function() {
                // Ubah semua checkbox anak sesuai checkbox utama
                $('.chk-child').prop('checked', this.checked);
                toggleDeleteButton();
            });

            // ===============================
            // Fungsi: Periksa jika semua checkbox anak dipilih
            // ===============================
            $(document).on('click', '.chk-child', function() {
                if ($('.chk-child:checked').length === $('.chk-child').length) {
                    $('#checkAll').prop('checked', true); // Centang checkbox utama
                } else {
                    $('#checkAll').prop('checked', false); // Hilangkan centang
                }
                toggleDeleteButton();
            });

            // ===============================
            // Fungsi: Menampilkan / menyembunyikan tombol hapus
            // ===============================
            function toggleDeleteButton() {
                if ($('.chk-child:checked').length > 0) {
                    $('#deleteSelected').show(); // Munculkan tombol
                } else {
                    $('#deleteSelected').hide(); // Sembunyikan tombol
                }
            }

            // ===============================
            // Fungsi: Saat tombol hapus diklik
            // ===============================
            $('#deleteSelected').on('click', function() {
                var selectedIds = [];

                // Ambil semua ID yang dicentang
                $('.chk-child:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    // Munculkan popup konfirmasi hapus
                    Swal.fire({
                        title: 'Apa Anda yakin?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim request hapus ke server
                            $.ajax({
                                url: "{{ route('gurumapel.adminguru.hapustujuanpembelajaran') }}",
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    ids: selectedIds
                                },
                                success: function(response) {
                                    showToast('success', 'Data berhasil dihapus!');
                                    table.ajax.reload(); // Perbarui tabel

                                    // Reset checkbox
                                    $('.chk-child').prop('checked', false);
                                    $('#checkAll').prop('checked', false);
                                    toggleDeleteButton();
                                },
                                error: function() {
                                    showToast('error',
                                        'Terjadi kesalahan saat menghapus data!');
                                }
                            });
                        }
                    });
                }
            });

            // ===============================
            // Fungsi: Saat pilihan kode_cp atau personal_id berubah
            // ===============================
            $('#kode_cp, #personal_id').on('change', function() {
                var selectedOption = $('#kode_cp').find(':selected');
                var kelMapel = selectedOption.data('kel-mapel');
                var tingkat = selectedOption.data('tingkat');
                var jmlMateri = selectedOption.data('jml-materi');
                var kodeCp = selectedOption.val();
                var personalId = $('#personal_id').val();

                // Isi input tersembunyi
                $('#kel_mapel').val(kelMapel || '');
                $('#jml_materi').val(jmlMateri || '');
                $('#tingkat').val(tingkat || '');

                updateSemesterValue(); // Hitung semester

                if (selectedOption) {
                    // Cek apakah kode_cp sudah ada di database
                    $.ajax({
                        url: '/gurumapel/adminguru/checktujuanpembelajaran',
                        method: 'GET',
                        data: {
                            id_personil: personalId,
                            kode_cp: kodeCp
                        },
                        success: function(response) {
                            if (response.exists) {
                                // Kalau sudah ada, beri peringatan
                                showToast('warning', response.message);

                                // Kosongkan form
                                $('#kode_cp').val('');
                                $('#kel_mapel').val('');
                                $('#jml_materi').val('');
                                $('#tingkat').val('');
                                $('#ngisi_tp').empty();
                                $('#isi_cp').val('');
                                $('#selected_rombel_ids').val('');
                                $('#tampil_cp').hide();
                                $('#judul-tp').hide();
                                $('#button-simpan').hide();
                            } else {
                                // Kalau belum ada → buat input sesuai jumlah materi
                                if (jmlMateri) {
                                    $('#ngisi_tp').empty();

                                    for (var i = 1; i <= jmlMateri; i++) {
                                        var rowHtml = `
                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <input type="text" name="tp_kode[]" id="tp_kode_${i}" value="${kodeCp}-${i}" class="form-control" readonly>
                                                <select class="form-select mt-2" name="tp_no[]">
                                                    <option value="${i}" selected>${i}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control tp_isi" name="tp_isi[]" id="tp_isi_${i}" rows="3"></textarea>
                                                <small id="tp_isi_word_count_${i}" class="text-primary fw-bold text-muted">0/25 kata</small>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="tp_desk_tinggi[]" id="tp_desk_tinggi_${i}" value="Peserta didik mampu" class="form-control" readonly>
                                                <input type="text" name="tp_desk_rendah[]" id="tp_desk_rendah_${i}" value="Peserta didik kurang mampu" class="form-control" readonly>
                                            </div>
                                        </div>`;
                                        $('#ngisi_tp').append(rowHtml);
                                    }

                                    // Hitung jumlah kata di setiap textarea
                                    $('#ngisi_tp').on('input', '.tp_isi', function() {
                                        const maxWords = 25;
                                        const textArea = $(this);
                                        const wordCountDisplay = textArea.next('small');

                                        const words = textArea.val().trim().split(/\s+/)
                                            .filter(word => word.length > 0);
                                        const wordCount = words.length;

                                        wordCountDisplay.text(
                                            `${wordCount}/${maxWords} kata`);

                                        if (wordCount > maxWords) {
                                            wordCountDisplay.removeClass('text-muted')
                                                .addClass('text-danger fw-bold');
                                            showToast('warning',
                                                `Jumlah kata sudah melebihi ${maxWords} kata!`
                                            );
                                        } else {
                                            wordCountDisplay.removeClass(
                                                'text-danger fw-bold').addClass(
                                                'text-muted');
                                        }
                                    });
                                } else {
                                    $('#ngisi_tp').empty();
                                }

                                // Ambil isi_cp, kode_rombel, dan kode_mapel dari server
                                if (kodeCp) {
                                    var requestIsiCp = $.ajax({
                                        url: '/gurumapel/adminguru/getisicp',
                                        method: 'GET',
                                        data: {
                                            kode_cp: kodeCp
                                        }
                                    });

                                    var requestKodeRombel = $.ajax({
                                        url: '/gurumapel/adminguru/getkoderombel',
                                        method: 'GET',
                                        data: {
                                            id_personil: personalId,
                                            kode_cp: kodeCp
                                        }
                                    });

                                    var requestKodeMapel = $.ajax({
                                        url: '/gurumapel/adminguru/getkodemapel',
                                        method: 'GET',
                                        data: {
                                            id_personil: personalId,
                                            kode_cp: kodeCp
                                        }
                                    });

                                    $.when(requestIsiCp, requestKodeRombel, requestKodeMapel)
                                        .done(function(responseIsiCp, responseKodeRombel,
                                            responseKodeMapel) {
                                            $('#isi_cp').val(responseIsiCp[0]?.isi_cp ||
                                                '');
                                            $('#element_cp').val(responseIsiCp[0]
                                                ?.element || '');

                                            var kodeRombelArray = responseKodeRombel[0]
                                                ?.kode_rombel || [];
                                            $('#selected_rombel_ids').val(kodeRombelArray
                                                .join(','));

                                            var kodeMapelArray = responseKodeMapel[0]
                                                ?.kel_mapel || [];
                                            $('#kel_mapel').val(kodeMapelArray.join(','));
                                        });

                                    $('#tampil_cp').show();
                                    $('#judul-tp').show();
                                    $('#button-simpan').show();
                                } else {
                                    $('#tampil_cp').hide();
                                    $('#judul-tp').hide();
                                    $('#button-simpan').hide();
                                }
                            }
                        },
                        error: function() {
                            showToast('error', 'Terjadi kesalahan saat memeriksa data.');
                        }
                    });
                }
            });

            // ===============================
            // Fungsi: Saat form materi diajukan
            // ===============================
            $('#form-tp-ajar').on('submit', function(e) {
                e.preventDefault();

                var materiData = [];
                var jmlMateri = $('#jml_materi').val();

                for (var i = 1; i <= jmlMateri; i++) {
                    materiData.push({
                        kode_cp: $('#kode_cp').val(),
                        tp_kode: $(`#tp_kode_${i}`).val(),
                        tp_no: $(`select[name="tp_no[]"]:eq(${i - 1})`).val(),
                        tp_isi: $(`#tp_isi_${i}`).val(),
                        tp_desk_tinggi: $(`#tp_desk_tinggi_${i}`).val(),
                        tp_desk_rendah: $(`#tp_desk_rendah_${i}`).val(),
                    });
                }

                // Simpan data sebagai JSON
                $('#selected_tp_data').val(JSON.stringify(materiData));

                this.submit();
            });

            // ===============================
            // Fungsi: Hitung semester otomatis
            // ===============================
            function updateSemesterValue() {
                var ganjilgenap = $('#ganjilgenap').val();
                var tingkat = $('#tingkat').val();
                var angkatsemester = '';

                if (ganjilgenap === 'Ganjil' && tingkat == '10') angkatsemester = 1;
                else if (ganjilgenap === 'Genap' && tingkat == '10') angkatsemester = 2;
                else if (ganjilgenap === 'Ganjil' && tingkat == '11') angkatsemester = 3;
                else if (ganjilgenap === 'Genap' && tingkat == '11') angkatsemester = 4;
                else if (ganjilgenap === 'Ganjil' && tingkat == '12') angkatsemester = 5;
                else if (ganjilgenap === 'Genap' && tingkat == '12') angkatsemester = 6;

                $('#semester').val(angkatsemester);
            }

            // ===============================
            // Fungsi: Reset modal ketika ditutup
            // ===============================
            $('#buatMateriAjar').on('hidden.bs.modal', function() {
                $('#kode_cp').val('');
                $('#kel_mapel').val('');
                $('#jml_materi').val('');
                $('#tingkat').val('');
                $('#ngisi_tp').empty();
                $('#isi_cp').val('');
                $('#selected_rombel_ids').val('');
                $('#tampil_cp').hide();
                $('#judul-tp').hide();
            });

            // ===============================
            // Fungsi: Mode edit TP
            // ===============================
            $(document).on('click', '.edit-tp-button', function() {
                var targetTextarea = $(this).data('target');
                $(targetTextarea).show();

                $(this).hide();
                $(this).closest('form').find('button[type="submit"]').show();
            });

            // ===============================
            // Fungsi: Simpan hasil edit TP lewat AJAX
            // ===============================
            $(document).on('submit', '.update-tp-form', function(e) {
                e.preventDefault();

                var form = $(this);
                var id = form.data('id');
                var url = `/gurumapel/adminguru/updatetujuanpembelajaran/${id}`;
                var data = form.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        showToast('success', 'Data berhasil diperbarui!');
                        $('#tujuanpembelajaran-table').DataTable().ajax.reload(null, false);

                        form.find('.edit-tp-textarea').hide();
                        form.find('.submit-tp-button').hide();
                        form.find('.edit-tp-button').show();
                    },
                    error: function(xhr) {
                        showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            // Event tambahan untuk DataTable
            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
