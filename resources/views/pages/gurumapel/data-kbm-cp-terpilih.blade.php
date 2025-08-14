@extends('layouts.master')
@section('title')
    @lang('translation.capaian-pembelajaran')
@endsection
@section('css')
    {{--  --}}
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
                        data-bs-target="#pilihCapaianPembelajaran" id="pilihCapaianPembelajaranBtn" title="Pilih CP"><i
                            class="ri-add-fill fs-16"></i></button>
                </div>
                <div class="flex-shrink-0 me-2">
                    <button class="btn btn-soft-primary btn-sm" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWithicon2" aria-expanded="false" aria-controls="collapseWithicon2"
                        title="Cek Capaian Pembelajaran Terpilih">
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
    @include('pages.gurumapel.data-kbm-cp-form')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'datacpterpilih-table'; // ID tabel DataTable yang akan digunakan

        // Fungsi untuk mengupdate jumlah materi (jml_materi) ke server
        function updateJmlMateri(id, jmlmateriValue) {
            $.ajax({
                url: '/gurumapel/adminguru/updatejmlmateri', // URL endpoint untuk update jumlah materi
                type: 'POST', // Metode pengiriman data
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF untuk keamanan
                    id: id, // ID data yang akan diupdate
                    jml_materi: jmlmateriValue // Nilai jumlah materi baru
                },
                success: function(response) {
                    // Jika berhasil update di server
                    if (response.success) {
                        showToast('success', 'Jumlah TP berhasil diperbarui!');
                    } else {
                        showToast('warning', 'Gagal memperbarui jumlah TP!');
                    }
                },
                error: function(xhr) {
                    // Jika ada error pada proses AJAX
                    console.error('AJAX Error:', xhr.responseText);
                    showToast('error', 'Terjadi kesalahan');
                }
            });
        }

        // Jalankan kode ketika halaman selesai dimuat
        $(document).ready(function() {
            var table = $('#datacpterpilih-table').DataTable(); // Inisialisasi DataTable

            // ------------------ Checkbox Pilih Semua Data Utama ------------------
            $('#checkAll').on('click', function() {
                // Centang/Uncentang semua checkbox anak sesuai checkbox utama
                $('.chk-child').prop('checked', this.checked);
                toggleDeleteButton(); // Perbarui status tombol hapus
            });

            // Event ketika checkbox anak diubah
            $(document).on('click', '.chk-child', function() {
                // Jika semua anak tercentang, centang checkbox utama
                if ($('.chk-child:checked').length === $('.chk-child').length) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
                toggleDeleteButton();
            });

            // Fungsi untuk menampilkan atau menyembunyikan tombol hapus
            function toggleDeleteButton() {
                if ($('.chk-child:checked').length > 0) {
                    $('#deleteSelected').show(); // Tampilkan jika ada yang terpilih
                } else {
                    $('#deleteSelected').hide(); // Sembunyikan jika tidak ada
                }
            }

            // ------------------ Tombol Hapus Data Terpilih ------------------
            $('#deleteSelected').on('click', function() {
                var selectedIds = []; // Array untuk menyimpan ID data terpilih
                $('.chk-child:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    // Konfirmasi penghapusan menggunakan SweetAlert
                    Swal.fire({
                        title: 'Apa Anda yakin?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim permintaan hapus ke server
                            $.ajax({
                                url: "{{ route('gurumapel.adminguru.hapuscppilihan') }}", // Endpoint hapus
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}', // Token keamanan
                                    ids: selectedIds // Kirim daftar ID
                                },
                                success: function(response) {
                                    console.log('AJAX Success:', response);
                                    showToast('success',
                                        'CP Terpilih berhasil dihapus!');
                                    table.ajax.reload(null,
                                        false); // Reload DataTable tanpa reset halaman

                                    // Reset checkbox setelah penghapusan
                                    $('.chk-child').prop('checked', false);
                                    $('#checkAll').prop('checked', false);
                                    toggleDeleteButton();
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

            // ------------------ Event perubahan dropdown kel_mapel atau personal_id ------------------
            $('#kel_mapel, #personal_id').on('change', function() {
                var selectedOption = $('#kel_mapel').find(':selected');
                var kelMapel = selectedOption.data('kel-mapel'); // Ambil kode_mapel
                var tingkat = selectedOption.data('tingkat'); // Ambil tingkat kelas
                var kelMapel = selectedOption.val();
                var personalId = $('#personal_id').val(); // Ambil ID personal

                $('#tingkat').val(tingkat || ''); // Set input tingkat

                updateSemesterValue(); // Perbarui nilai semester otomatis

                if (selectedOption) {
                    // Cek apakah kombinasi mapel dan personal_id sudah terdaftar
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
                                // Tampilkan peringatan jika data sudah ada
                                showToast('warning', response.message);
                                // Reset semua pilihan terkait
                                $('#kel_mapel').val('');
                                $('#checkbox-kode-rombel').empty();
                                $('#checkbox-rombel').empty();
                                $('#selected_cp_tbody').empty();
                                $('#selected_cp_list').hide();
                                $('#rombel_pilih').hide();
                                $('#button-simpan').hide();
                            } else {
                                if (kelMapel && tingkat) {
                                    // ------------------ Ambil data rombel untuk checkbox ------------------
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
                                                data); // Isi daftar rombel
                                        },
                                        error: function() {
                                            showToast('error',
                                                "Gagal mengambil data rombel.");
                                        },
                                    });

                                    // ------------------ Ambil data capaian pembelajaran ------------------
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
                                                ); // Isi tabel capaian pembelajaran
                                        },
                                        error: function() {
                                            showToast('error',
                                                "Gagal mengambil data capaian pembelajaran."
                                            );
                                        },
                                    });
                                } else {
                                    resetAll(); // Kosongkan semua jika tidak ada pilihan
                                }
                            }
                        },
                        error: function() {
                            showToast('error', 'Terjadi kesalahan saat memeriksa data.');
                        }
                    });
                }
            });

            // ------------------ Fungsi untuk mengisi daftar rombel ke checkbox ------------------
            function updateRombelOptions(data) {
                $('#checkbox-kode-rombel').empty();
                $('#checkbox-rombel').empty();

                // Tambahkan setiap item rombel sebagai checkbox
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

                // Sinkronisasi centang kode_rombel dan rombel
                $('.kode_rombel_checkbox').on('change', function() {
                    var rombel = $(this).val();
                    $('#rombel_' + rombel).prop('checked', $(this).is(':checked'));
                    updateSelectedRombelIds();
                });

                // Event untuk centang semua rombel
                $('#check_all').on('change', function() {
                    var isChecked = $(this).is(':checked');
                    $('.kode_rombel_checkbox').prop('checked', isChecked);
                    $('.rombel_checkbox').prop('checked', isChecked);
                    updateSelectedRombelIds();
                });
            }

            // ------------------ Fungsi untuk mengisi tabel capaian pembelajaran ------------------
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

            // ------------------ Fungsi untuk mengosongkan semua elemen ------------------
            function resetAll() {
                $('#checkbox-kode-rombel').empty();
                $('#checkbox-rombel').empty();
                $('#selected_cp_tbody').empty();
                $('#selected_cp_list').hide();
            }

            // ------------------ Fungsi update daftar ID rombel terpilih ------------------
            function updateSelectedRombelIds() {
                var selectedRombelIds = [];
                $('.kode_rombel_checkbox:checked').each(function() {
                    selectedRombelIds.push($(this).val());
                });
                $('#selected_rombel_ids').val(selectedRombelIds.join(','));
            }

            // ------------------ Logika untuk Pilih Semua CP ------------------
            $('select[name="jml_materi"]').hide();

            $('#checkAllCP').on('change', function() {
                var isChecked = this.checked;
                $('.chk-child-pilihcp').prop('checked', isChecked);
                $('.chk-child-pilihcp').each(function() {
                    toggleSelectVisibility(this);
                });
                updateSelectedCPIds();
            });

            $(document).on('change', '.chk-child-pilihcp', function() {
                if ($('.chk-child-pilihcp:checked').length === $('.chk-child-pilihcp').length) {
                    $('#checkAllCP').prop('checked', true);
                } else {
                    $('#checkAllCP').prop('checked', false);
                }
                toggleSelectVisibility(this);
                updateSelectedCPIds();
            });

            // Update input hidden dengan ID CP yang terpilih
            function updateSelectedCPIds() {
                var selectedIds = [];
                $('.chk-child-pilihcp:checked').each(function() {
                    selectedIds.push($(this).val());
                });
                $('#selected_cp_ids').val(selectedIds.join(','));
            }

            // Tampilkan atau sembunyikan <select> jumlah materi
            function toggleSelectVisibility(checkbox) {
                var row = $(checkbox).closest('tr');
                if ($(checkbox).is(':checked')) {
                    row.find('select[name="jml_materi"]').show();
                } else {
                    row.find('select[name="jml_materi"]').hide();
                }
            }

            // ------------------ Update data CP terpilih dengan jumlah materi ------------------
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
                $('#selected_cp_data').val(JSON.stringify(selectedCPData));
            }

            // ------------------ Fungsi menghitung semester berdasarkan ganjil/genap dan tingkat ------------------
            function updateSemesterValue() {
                var ganjilgenap = $('#ganjilgenap').val();
                var tingkat = $('#tingkat').val();
                var angkatsemester = '';

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

                $('#semester').val(angkatsemester);
            }

            // ------------------ Event ketika modal CP ditutup ------------------
            $('#pilihCapaianPembelajaran').on('hidden.bs.modal', function() {
                $('#kel_mapel').val('');
                $('#rombel_pilih').hide();
                $('#selected_cp_tbody').empty();
                $('#selected_cp_list').hide();
            });

            // ------------------ Proses submit form pilih CP ------------------
            $('#form_pilih_cp').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const submitBtn = $('#button-simpan');

                submitBtn.prop('disabled', true).text('Menyimpan...');

                $.ajax({
                    url: "{{ route('gurumapel.adminguru.savecpterpilih') }}",
                    method: "POST",
                    data: new FormData(form[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                                timer: 4000,
                                showConfirmButton: false
                            });

                            $('#pilihCapaianPembelajaran').modal('hide');
                            form[0].reset();
                            $('#datacpterpilih-table').DataTable().ajax.reload(null, false);
                        } else {
                            Swal.fire('Gagal', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let list = '';
                            $.each(errors, function(key, value) {
                                list += `- ${value}<br>`;
                            });
                            showToast('error', list);
                        } else {
                            showToast('error',
                                `Terjadi kesalahan: ${xhr.responseJSON?.message || 'Tidak diketahui.'}`
                            );
                        }
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).text('Simpan');
                    }
                });
            });

            // ------------------ Inisialisasi dan event tambahan DataTable ------------------
            $('#' + datatable).DataTable();
            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
