@extends('layouts.master')
@section('title')
    @lang('translation.tujuan-pembelajaran')
@endsection
@section('css')
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
            @lang('translation.data-ngajar')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title') - {{ $fullName }}</h5>
                    <div>
                        <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#buatMateriAjar" id="buatMateriAjarBtn" title="Buat Tujuan Pembelajaran">Tambah
                            Tujuan Pembelajaran</button>
                        <button class="btn btn-soft-primary btn-sm" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseWithicon2" aria-expanded="false" aria-controls="collapseWithicon2"
                            title="Cek Tujuan Pembelajaran">
                            <i class="ri-filter-2-line"></i>
                        </button>
                        <button id="deleteSelected" class="btn btn-soft-danger btn-sm" style="display: none;"><i
                                class="ri-delete-bin-2-line"></i></button>
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
                    <div id="datatable-wrapper" style="height: calc(100vh - 268px);">
                        {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.gurumapel.tujuan-pembelajaran-form')
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
        const datatable = 'tujuanpembelajaran-table';

        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif

        $(document).ready(function() {
            var table = $('#tujuanpembelajaran-table').DataTable();

            // Select/Deselect all checkboxes
            $('#checkAll').on('click', function() {
                $('.chk-child').prop('checked', this.checked);
                toggleDeleteButton();
            });

            // Check/uncheck individual checkboxes and toggle delete button
            $(document).on('click', '.chk-child', function() {
                if ($('.chk-child:checked').length === $('.chk-child').length) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
                toggleDeleteButton();
            });

            // Toggle delete button based on selection
            function toggleDeleteButton() {
                if ($('.chk-child:checked').length > 0) {
                    $('#deleteSelected').show();
                } else {
                    $('#deleteSelected').hide();
                }
            }

            // Handle delete button click
            $('#deleteSelected').on('click', function() {
                var selectedIds = [];
                $('.chk-child:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: 'Apa Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('gurumapel.datangajar.hapustujuanpembelajaran') }}", // Sesuaikan route
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    ids: selectedIds
                                },
                                success: function(response) {
                                    showToast('success',
                                        'Tujuan Pembelajaran berhasil dihapus!');
                                    table.ajax.reload(); // Reload DataTables
                                    // Reset semua checkbox dan hide tombol delete
                                    $('.chk-child').prop('checked', false);
                                    $('#checkAll').prop('checked', false);
                                    toggleDeleteButton
                                        (); // Update tampilan tombol delete
                                },
                                error: function(xhr) {
                                    showToast('error',
                                        'Terjadi kesalahan saat menghapus data!');
                                }
                            });
                        }
                    });
                }
            });

            $('#kode_cp, #personal_id').on('change', function() {
                var selectedOption = $('#kode_cp').find(':selected');
                var kelMapel = selectedOption.data('kel-mapel');
                var tingkat = selectedOption.data('tingkat');
                var jmlMateri = selectedOption.data('jml-materi');
                var kodeCp = selectedOption.val();
                var personalId = $('#personal_id').val();

                // Set kel_mapel, jml_materi, dan tingkat
                $('#kel_mapel').val(kelMapel || '');
                $('#jml_materi').val(jmlMateri || '');
                $('#tingkat').val(tingkat || '');

                updateSemesterValue();

                if (selectedOption) {
                    $.ajax({
                        url: '/gurumapel/datangajar/checktujuanpembelajaran',
                        method: 'GET',
                        data: {
                            id_personil: personalId,
                            kode_cp: kodeCp
                        },
                        success: function(response) {
                            if (response.exists) {
                                // Tampilkan notifikasi jika kode_cp sudah ada
                                showToast('warning', response.message);
                                // Reset semua input terkait
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
                                // Generate input materi berdasarkan jumlah materi
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

                                    // Validasi jumlah kata
                                    $('#ngisi_tp').on('input', '.tp_isi', function() {
                                        const maxWords = 25; // Batas jumlah kata
                                        const textArea = $(this);
                                        const wordCountDisplay = textArea.next(
                                            'small'
                                        ); // Elemen untuk menampilkan jumlah kata

                                        // Hitung jumlah kata
                                        const words = textArea.val().trim().split(/\s+/)
                                            .filter(word => word.length > 0);
                                        const wordCount = words.length;

                                        wordCountDisplay.text(
                                            `${wordCount}/${maxWords} kata`);

                                        if (wordCount > maxWords) {
                                            // Jika melebihi batas, ubah teks menjadi merah dan tebal
                                            wordCountDisplay.removeClass('text-muted')
                                                .addClass('text-danger fw-bold');
                                            showToast('warning',
                                                `Jumlah kata sudah melebihi batas maksimal ${maxWords} kata!`
                                            );
                                        } else {
                                            // Jika tidak, kembalikan ke normal
                                            wordCountDisplay.removeClass(
                                                'text-danger fw-bold').addClass(
                                                'text-muted');
                                        }
                                    });
                                } else {
                                    $('#ngisi_tp').empty();
                                }

                                // Fetch isi_cp dan kode_rombel
                                if (kodeCp) {
                                    var requestIsiCp = $.ajax({
                                        url: '/gurumapel/datangajar/getisicp',
                                        method: 'GET',
                                        data: {
                                            kode_cp: kodeCp
                                        }
                                    });

                                    var requestKodeRombel = $.ajax({
                                        url: '/gurumapel/datangajar/getkoderombel',
                                        method: 'GET',
                                        data: {
                                            id_personil: personalId,
                                            kode_cp: kodeCp
                                        }
                                    });

                                    var requestKodeMapel = $.ajax({
                                        url: '/gurumapel/datangajar/getkodemapel',
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
                                                ?.element || ''); // Tambahkan element data

                                            var kodeRombelArray = responseKodeRombel[0]
                                                ?.kode_rombel || [];
                                            $('#selected_rombel_ids').val(kodeRombelArray
                                                .join(',')
                                            ); // Simpan rombel ID sebagai koma

                                            var kodeMapelArray = responseKodeMapel[0]
                                                ?.kel_mapel || [];
                                            $('#kel_mapel').val(kodeMapelArray.join(
                                                ',')); // Simpan Mapel ID sebagai koma
                                        });

                                    $('#tampil_cp').show();
                                    $('#judul-tp').show();
                                    $('#button-simpan').show();
                                } else {
                                    // Sembunyikan elemen jika kode_cp tidak dipilih
                                    $('#tampil_cp').hide();
                                    $('#judul-tp').hide();
                                    $('#button-simpan').hide();
                                }
                            }
                        },
                        error: function() {
                            showToast('error',
                                'Terjadi kesalahan saat memeriksa data. Silakan coba lagi.');
                        }
                    });
                }
            });


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

                // Save materi data as JSON string
                $('#selected_tp_data').val(JSON.stringify(materiData));

                // Submit the form
                this.submit();
            });

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

            // Bersihkan tabel siswa ketika modal ditutup
            $('#buatMateriAjar').on('hidden.bs.modal', function() {
                $('#kode_cp').val('');
                // Reset semua input terkait
                $('#kel_mapel').val('');
                $('#jml_materi').val('');
                $('#tingkat').val('');
                $('#ngisi_tp').empty();
                $('#isi_cp').val('');
                $('#selected_rombel_ids').val('');
                $('#tampil_cp').hide();
                $('#judul-tp').hide();
            });

            $(document).on('click', '.edit-tp-button', function() {
                var targetTextarea = $(this).data('target'); // Ambil ID dari atribut data-target
                $(targetTextarea).show(); // Tampilkan textarea

                // Ubah tombol menjadi submit
                $(this).hide(); // Sembunyikan tombol Edit
                $(this).closest('form').find('button[type="submit"]').show(); // Tampilkan tombol Submit
            });

            $(document).on('submit', '.update-tp-form', function(e) {
                e.preventDefault(); // Cegah reload halaman

                var form = $(this);
                var id = form.data('id'); // Ambil ID dari atribut data-id
                var url = `/gurumapel/datangajar/updatetujuanpembelajaran/${id}`; // URL sesuai route
                var data = form.serialize(); // Serialisasi data form

                $.ajax({
                    url: url,
                    type: 'POST', // Gunakan POST meskipun method disimulasikan sebagai PUT
                    data: data,
                    success: function(response) {
                        // Tampilkan notifikasi sukses (opsional)
                        showToast('success', 'Data berhasil diperbarui!');

                        $('#tujuanpembelajaran-table').DataTable().ajax.reload(null, false);

                        // Sembunyikan textarea dan kembalikan tombol Edit
                        form.find('.edit-tp-textarea').hide();
                        form.find('.submit-tp-button').hide();
                        form.find('.edit-tp-button').show();
                    },
                    error: function(xhr) {
                        // Tampilkan pesan error
                        showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
            ScrollDinamicDataTable(datatable, scrollOffsetOverride = 86);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
