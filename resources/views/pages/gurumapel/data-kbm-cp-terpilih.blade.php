@extends('layouts.master')
@section('title')
    @lang('translation.capaian-pembelajaran')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        .no-border {
            border: none;
        }

        .text-center {
            text-align: center;
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title') - {{ $fullName }}
                    </h5>
                    <div>
                        <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#pilihCapaianPembelajaran" id="pilihCapaianPembelajaranBtn"
                            title="Pilih CP">Pilih
                            Capaian Pembelajaran</button>
                        <button class="btn btn-soft-primary btn-sm" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseWithicon2" aria-expanded="false" aria-controls="collapseWithicon2"
                            title="Cek Capaian Pembelajaran Terpilih">
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
                                <div class="ribbon ribbon-primary round-shape">Cek Capaian Pembelajaran</div>
                                <div class="ribbon-content mt-5 text-muted">

                                    <table class="table" style="border: none;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kel Mapel</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Kode Rombel</th>
                                                <th>Rombel</th>
                                                <th>Jumlah CP</th>
                                                <th>Jumlah TP</th>
                                                <th>Cek CP</th>
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
                                                            $jmlCP = DB::table('cp_terpilihs')
                                                                ->where('id_personil', $kbm->id_personil)
                                                                ->where('kode_rombel', $kbm->kode_rombel)
                                                                ->where('kel_mapel', $kbm->kel_mapel)
                                                                ->where('tahunajaran', $kbm->tahunajaran)
                                                                ->where('ganjilgenap', $kbm->ganjilgenap)
                                                                ->count();
                                                        @endphp
                                                        @if ($jmlCP)
                                                            {{ $jmlCP }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        @php
                                                            // Ambil cp_terpilih
                                                            $JmlMateri = DB::table('cp_terpilihs')
                                                                ->where('id_personil', $kbm->id_personil)
                                                                ->where('kode_rombel', $kbm->kode_rombel)
                                                                ->where('kel_mapel', $kbm->kel_mapel)
                                                                ->where('tahunajaran', $kbm->tahunajaran)
                                                                ->where('ganjilgenap', $kbm->ganjilgenap)
                                                                ->sum('jml_materi');
                                                        @endphp
                                                        @if ($JmlMateri)
                                                            {{ $JmlMateri }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        @php
                                                            // Ambil cp_terpilih
                                                            $cpTerpilih = DB::table('cp_terpilihs')
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
        </div>
    </div>
    @include('pages.gurumapel.data-kbm-cp-form')
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'datacpterpilih-table';

        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif

        function updateJmlMateri(id, jmlmateriValue) {
            $.ajax({
                url: '/gurumapel/adminguru/updatejmlmateri', // Rute untuk update KKM
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Sertakan CSRF token
                    id: id,
                    jml_materi: jmlmateriValue
                },
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'Jml TP berhasil diperbarui!');
                    } else {
                        showToast('warning', 'Gagal memperbarui Jml TP!');
                    }
                },
                error: function(xhr) {
                    /* alert('Terjadi kesalahan'); */
                    showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }

        // Inisialisasi DataTable
        $(document).ready(function() {
            var table = $('#datacpterpilih-table').DataTable();
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
                                url: "{{ route('gurumapel.adminguru.hapuscppilihan') }}", // Sesuaikan route
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    ids: selectedIds
                                },
                                success: function(response) {
                                    console.log('AJAX Success:', response);
                                    showToast('success',
                                        'CP Terpilih berhasil dihapus!');
                                    table.ajax.reload(null, false); // Reload DataTables

                                    // Reset semua checkbox dan hide tombol delete
                                    $('.chk-child').prop('checked', false);
                                    $('#checkAll').prop('checked', false);
                                    toggleDeleteButton
                                        (); // Update tampilan tombol delete
                                },
                                error: function(xhr) {
                                    console.error('AJAX Error:', xhr.responseText);
                                    showToast('error',
                                        'Terjadi kesalahan saat menghapus data!');
                                }
                            });
                        }
                    });
                }
            });

            // Event listener untuk perubahan pada kode_mapel dan personal_id
            $('#kel_mapel, #personal_id').on('change', function() {
                var selectedOption = $('#kel_mapel').find(':selected');
                var kelMapel = selectedOption.data('kel-mapel'); // Ambil kode_mapel asli
                var tingkat = selectedOption.data('tingkat'); // Ambil tingkat
                var kelMapel = selectedOption.val();
                var personalId = $('#personal_id').val(); // Ambil personal_id

                $('#tingkat').val(tingkat || '');

                updateSemesterValue();

                /* let isErrorNotified =
                    false; // Variabel untuk memastikan notifikasi error hanya tampil sekali

                function handleAjaxError(xhr, defaultMessage) {
                    if (xhr.status === 400 && xhr.responseJSON && xhr.responseJSON.message) {
                        if (!isErrorNotified) { // Periksa jika notifikasi belum ditampilkan
                            showToast('warning', xhr.responseJSON.message); // Tampilkan pesan dari server
                            isErrorNotified = true; // Tandai bahwa notifikasi sudah ditampilkan
                            $('#kel_mapel').val('');
                            $('#rombel_pilih').hide();
                            $('#checkbox-kode-rombel').empty();
                            $('#checkbox-rombel').empty();
                            $('#selected_cp_tbody').empty();
                            $('#selected_cp_list').hide();
                        }
                    } else {
                        if (!isErrorNotified) { // Periksa jika notifikasi belum ditampilkan
                            console.error("Error:", xhr.statusText || defaultMessage);
                            showToast('error', defaultMessage || "Terjadi kesalahan.");
                            isErrorNotified = true; // Tandai bahwa notifikasi sudah ditampilkan
                            $('#kel_mapel').val('');
                            $('#rombel_pilih').hide();
                            $('#checkbox-kode-rombel').empty();
                            $('#checkbox-rombel').empty();
                            $('#selected_cp_tbody').empty();
                            $('#selected_cp_list').hide();
                        }
                    }
                } */

                if (selectedOption) {
                    $.ajax({
                        url: '/gurumapel/adminguru/checkcpterpilih',
                        method: 'GET',
                        data: {
                            id_personil: personalId,
                            kel_mapel: kelMapel,
                            tingkat: tingkat,
                        },
                        success: function(response) {
                            if (response.exists) {
                                // Tampilkan notifikasi jika kel_mapel sudah ada
                                showToast('warning', response.message);
                                // Reset semua input terkait
                                $('#kel_mapel').val('');
                                $('#checkbox-kode-rombel').empty();
                                $('#checkbox-rombel').empty();
                                $('#selected_cp_tbody').empty();
                                $('#selected_cp_list').hide();
                                $('#rombel_pilih').hide();
                                $('#button-simpan').hide();
                            } else {
                                if (kelMapel && tingkat) {
                                    // AJAX untuk checkbox rombel
                                    $.ajax({
                                        url: "{{ route('gurumapel.adminguru.getrombeloptions') }}",
                                        type: "GET",
                                        data: {
                                            kel_mapel: kelMapel,
                                            tingkat: tingkat,
                                            personal_id: personalId,
                                        },
                                        success: function(data) {
                                            $('#button-simpan').show();
                                            $('#rombel_pilih').show();
                                            updateRombelOptions(
                                                data
                                            ); // Fungsi untuk update checkbox rombel
                                        },
                                        error: function() {
                                            showToast('error',
                                                "Terjadi kesalahan saat mengambil data rombel."
                                            );
                                        },
                                    });

                                    // AJAX untuk capaian pembelajaran
                                    $.ajax({
                                        url: "{{ route('gurumapel.adminguru.getCapaianPembelajaran') }}",
                                        type: "GET",
                                        data: {
                                            kel_mapel: kelMapel,
                                            tingkat: tingkat,
                                        },
                                        success: function(response) {
                                            $('#selected_cp_list').show();
                                            updateCapaianPembelajaran(
                                                response
                                            ); // Fungsi untuk update tabel capaian pembelajaran
                                        },
                                        error: function() {
                                            showToast('error',
                                                "Terjadi kesalahan saat mengambil data capaian pembelajaran."
                                            );
                                        },
                                    });
                                } else {
                                    resetAll(); // Reset semua elemen jika tidak ada pilihan
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

            // Fungsi untuk memperbarui checkbox rombel
            function updateRombelOptions(data) {
                $('#checkbox-kode-rombel').empty();
                $('#checkbox-rombel').empty();

                $.each(data, function(index, item) {
                    $('#checkbox-kode-rombel').append(`
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input kode_rombel_checkbox"
                                type="checkbox"
                                name="kode_rombel[]"
                                value="${item.kode_rombel}"
                                id="kode_rombel_${item.kode_rombel}">
                            <label class="form-check-label" for="kode_rombel_${item.kode_rombel}">
                                ${item.kode_rombel}
                            </label>
                        </div><br>
                    `);

                    $('#checkbox-rombel').append(`
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input rombel_checkbox"
                                type="checkbox"
                                name="rombel[]"
                                value="${item.rombel}"
                                id="rombel_${item.kode_rombel}">
                            <label class="form-check-label" for="rombel_${item.kode_rombel}">
                                ${item.rombel}
                            </label>
                        </div><br>
                    `);
                });

                // Event untuk sinkronisasi checkbox
                $('.kode_rombel_checkbox').on('change', function() {
                    var rombel = $(this).val();
                    $('#rombel_' + rombel).prop('checked', $(this).is(':checked'));
                    updateSelectedRombelIds();
                });

                $('#check_all').on('change', function() {
                    var isChecked = $(this).is(':checked');
                    $('.kode_rombel_checkbox').prop('checked', isChecked);
                    $('.rombel_checkbox').prop('checked', isChecked);
                    updateSelectedRombelIds();
                });
            }

            // Fungsi untuk memperbarui tabel capaian pembelajaran
            function updateCapaianPembelajaran(response) {
                $('#selected_cp_tbody').empty();

                if (response.length > 0) {
                    response.forEach(item => {
                        $('#selected_cp_tbody').append(`
                            <tr>
                                <td>
                                    <input class="form-check-input chk-child-pilihcp" name="chk_child_pilihcp" type="checkbox" value="${item.kode_cp}">
                                </td>
                                <td>${item.kode_cp} - Tingkat ${item.tingkat} - Fase ${item.fase}</td>
                                <td>${item.element}</td>
                                <td>${item.kel_mapel} / ${item.mata_pelajaran}</td>
                                <td>${item.isi_cp}</td>
                                <td width='125'>
                                    <select class="form-select mt-3" name="jml_materi" style="display: none;">
                                        <option selected>Pilih</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    $('#selected_cp_tbody').append(`
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    `);
                }
            }

            // Fungsi untuk mengosongkan elemen
            function resetAll() {
                $('#checkbox-kode-rombel').empty();
                $('#checkbox-rombel').empty();
                $('#selected_cp_tbody').empty();
                $('#selected_cp_list').hide();
            }

            // Fungsi untuk memperbarui input hidden dengan nilai checkbox yang dipilih
            function updateSelectedRombelIds() {
                var selectedRombels = $('.kode_rombel_checkbox:checked').map(function() {
                    return $(this).val();
                }).get().join(',');
                $('#selected_rombel_ids').val(selectedRombels);
            }

            // Update the input value with selected rombel IDs
            function updateSelectedRombelIds() {
                var selectedRombelIds = [];
                $('.kode_rombel_checkbox:checked').each(function() {
                    selectedRombelIds.push($(this).val());
                });
                $('#selected_rombel_ids').val(selectedRombelIds.join(',')); // Join IDs with commas
            }

            $('select[name="jml_materi"]').hide();

            // Handle "Select All" checkbox
            $('#checkAllCP').on('change', function() {
                var isChecked = this.checked;
                $('.chk-child-pilihcp').prop('checked', isChecked);
                $('.chk-child-pilihcp').each(function() {
                    toggleSelectVisibility(this);
                });
                updateSelectedCPIds();
            });

            // Handle individual checkbox change
            $(document).on('change', '.chk-child-pilihcp', function() {
                if ($('.chk-child-pilihcp:checked').length === $('.chk-child-pilihcp').length) {
                    $('#checkAllCP').prop('checked', true);
                } else {
                    $('#checkAllCP').prop('checked', false);
                }
                // Update tampilan elemen <select> berdasarkan status checkbox
                toggleSelectVisibility(this);
                updateSelectedCPIds();
            });

            // Update the input value with selected IDs
            function updateSelectedCPIds() {
                var selectedIds = [];
                $('.chk-child-pilihcp:checked').each(function() {
                    selectedIds.push($(this).val());
                });
                $('#selected_cp_ids').val(selectedIds.join(',')); // Gabungkan ID dengan koma
            }

            // Fungsi untuk menampilkan/menghilangkan <select> berdasarkan checkbox
            function toggleSelectVisibility(checkbox) {
                var row = $(checkbox).closest('tr'); // Cari baris tabel terkait
                if ($(checkbox).is(':checked')) {
                    row.find('select[name="jml_materi"]').show(); // Tampilkan <select>
                } else {
                    row.find('select[name="jml_materi"]').hide(); // Sembunyikan <select>
                }
            }

            $(document).on('change', '.chk-child-pilihcp, select[name="jml_materi"]', function() {
                updateSelectedCPData();
            });


            function updateSelectedCPData() {
                var selectedCPData = [];
                $('#selected_cp_tbody tr').each(function() {
                    var checkbox = $(this).find('.chk-child-pilihcp');
                    if (checkbox.is(':checked')) {
                        var kode_cp = checkbox.val();
                        var jml_materi = $(this).find('select[name="jml_materi"]').val();
                        selectedCPData.push({
                            kode_cp: kode_cp,
                            jml_materi: jml_materi
                        });
                    }
                });

                $('#selected_cp_data').val(JSON.stringify(selectedCPData)); // Simpan sebagai JSON string
            }


            // ------------------- isi angkasemester
            function updateSemesterValue() {
                // Ambil nilai ganjilgenap dan tingkat
                var ganjilgenap = $('#ganjilgenap').val();
                var tingkat = $('#tingkat').val();

                var angkatsemester = '';

                // Cek kondisi berdasarkan kombinasi ganjilgenap dan tingkat
                if (ganjilgenap === 'Ganjil' && tingkat == '10') {
                    angkatsemester = 1;
                } else if (ganjilgenap === 'Genap' && tingkat == '10') {
                    angkatsemester = 2;
                } else if (ganjilgenap === 'Ganjil' && tingkat == '11') {
                    angkatsemester = 3;
                } else if (ganjilgenap === 'Genap' && tingkat == '11') {
                    angkatsemester = 4;
                } else if (ganjilgenap === 'Ganjil' && tingkat == '12') {
                    angkatsemester = 5;
                } else if (ganjilgenap === 'Genap' && tingkat == '12') {
                    angkatsemester = 6;
                }

                // Set nilai ke input semester
                $('#semester').val(angkatsemester);
            }

            $('#pilihCapaianPembelajaran').on('hidden.bs.modal', function() {
                $('#kel_mapel').val('');
                $('#rombel_pilih').hide();
                $('#selected_cp_tbody').empty();
                $('#selected_cp_list').hide();
            });


            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
