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
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title') - {{ $fullName }}</h5>
                    <div>
                        <button type="button" class="btn btn-soft-info" data-bs-toggle="modal" data-bs-target="#buatMateriAjar"
                            id="buatMateriAjarBtn" title="Buat Tujuan Pembelajaran">Tambah Tujuan Pembelajaran</button>
                        <button id="deleteSelected" class="btn btn-soft-danger" style="display: none;"><i
                                class="ri-delete-bin-2-line"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
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
                                        'Materi Ajar berhasil dihapus!');
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
                                } else {
                                    // Sembunyikan elemen jika kode_cp tidak dipilih
                                    $('#tampil_cp').hide();
                                    $('#judul-tp').hide();
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

            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
