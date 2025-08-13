@extends('layouts.master')
@section('title')
    @lang('translation.peserta-didik-rombel')
@endsection
@section('css')
    {{--  --}}
    <link href="{{ URL::asset('build/libs/multi.js/multi.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown>
                        <x-btn-tambah can="create kurikulum/datakbm/peserta-didik-rombel"
                            route="kurikulum.datakbm.peserta-didik-rombel.create" label="Rombel PD" icon="ri-add-line" />
                        <div class="dropdown-divider"></div>
                        <x-btn-action href="{{ route('manajemensekolah.peserta-didik.index') }}" label="Peserta Didik"
                            icon="ri-user-fill" />
                        <x-btn-action label="Generate Akun" icon="ri-admin-fill" data-bs-toggle="modal"
                            data-bs-target="#generateAkun" id="generateAkunBtn" title="generateAkun" />
                        <x-btn-action label="Naik Kelas / Kelulusan" icon="ri-anticlockwise-2-fill" data-bs-toggle="modal"
                            data-bs-target="#generateNaikKelas" id="generateNaikKelasBtn" title="generateAkun" />
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row g-3">
                <div class="col-lg">
                </div>
                <div class="col-lg-auto">
                    <div class="search-box">
                        <input type="text" class="form-control form-control-sm search" placeholder="Nama Siswa ....">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idThnAjaran">
                        <option value="all" selected>Pilih Tahun Ajaran</option>
                        @foreach ($tahunAjaranOptions as $thnajar)
                            <option value="{{ $thnajar }}" {{ $thnajar == $tahunAjaranAktif ? 'selected' : '' }}>
                                {{ $thnajar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idKodeKK">
                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                        @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                            <option value="{{ $id }}">{{ $kode_kk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idTingkat">
                        <option value="all" selected>Pilih Tingkat</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="col-lg-auto me-3">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idRombel" disabled>
                        <option value="all" selected>Pilih Rombel</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.kurikulum.datakbm.peserta-didik-rombel-generateakun')
    @include('pages.kurikulum.datakbm.peserta-didik-rombel-naik-kelas')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pesertadidikrombel-table';

        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            $('#idThnAjaran, #idKodeKK, #idTingkat, #idRombel').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.thajarSiswa = $('#idThnAjaran').val(); // Ambil nilai dari dropdown idThnAjaran
                data.kodeKKSiswa = $('#idKodeKK').val(); // Ambil nilai dari dropdown idKodeKK
                data.tingkatSiswa = $('#idTingkat').val(); // Ambil nilai dari dropdown idTingkat
                data.rombelSiswa = $('#idRombel').val(); // Ambil nilai dari dropdown idJenkel
            });
        }

        // Function untuk mengecek apakah dropdown rombel harus di-disable atau tidak
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var kodeKK = $('#idKodeKK').val();
            var tingKat = $('#idTingkat').val();

            // Jika salah satu dari Tahun Ajaran atau Kompetensi Keahlian belum dipilih
            if (tahunAjaran === 'all' || kodeKK === 'all' || tingKat === 'all') {
                // Disable dropdown Rombel
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}", // Route untuk request data rombel
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    kode_kk: kodeKK,
                    tingkat: tingKat
                },
                success: function(data) {
                    console.log('Response dari server:', data); // Cek apakah response data sudah benar

                    var rombelSelect = $('#idRombel');
                    rombelSelect.empty(); // Kosongkan pilihan sebelumnya

                    rombelSelect.append(
                        '<option value="all" selected>Pilih Rombel</option>'); // Tambahkan default option

                    if (Object.keys(data).length > 0) {
                        $.each(data, function(key, value) {
                            rombelSelect.append('<option value="' + key + '">' + value + '</option>');
                        });
                    } else {
                        rombelSelect.append('<option value="none">Tidak ada rombel tersedia</option>');
                    }

                    $('#idRombel').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error pada AJAX:', xhr.responseText); // Handle error
                }
            });
        }
        // Inisialisasi DataTable
        $(document).ready(function() {

            // Event listener ketika dropdown Tahun Ajaran atau Kompetensi Keahlian berubah
            $('#idThnAjaran, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel(); // Panggil fungsi untuk mengecek apakah Rombel harus di-disable
            });

            // Cek status Rombel saat halaman pertama kali dimuat
            checkDisableRombel();

            $('#tahunajaran, #kode_kk, #tingkat').on('change', function() {
                // Clear table whenever any of the dropdowns change
                $('#selected_datasiswa_tbody').empty();
                $('#selected_rombel_ids').val(''); // Clear selected rombel ids when filters change

                var tahunajaran = $('#tahunajaran').val();
                var kode_kk = $('#kode_kk').val();
                var tingkat = $('#tingkat').val();

                if (tahunajaran && kode_kk && tingkat) {
                    $.ajax({
                        url: "{{ route('kurikulum.datakbm.get-rombels') }}",
                        type: "GET",
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(data) {
                            $('#checkbox-kode-rombel').empty();
                            $('#checkbox-rombel').empty();
                            $('#jmlsiswa-rombel').empty();

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
                                $('#jmlsiswa-rombel').append(
                                    `${item.rombel}: ${item.jumlah_siswa}<br>`);
                            });

                            // Update hidden input for selected rombel IDs whenever a checkbox changes
                            $('.kode_rombel_checkbox').on('change', function() {
                                updateSelectedRombelIds(); // Update hidden input
                                var rombel = $(this).val();
                                if ($(this).is(':checked')) {
                                    $('#rombel_' + rombel).prop('checked', true);
                                    fetchSelectedSiswaData([rombel]);
                                } else {
                                    $('#rombel_' + rombel).prop('checked', false);
                                    $('#selected_datasiswa_tbody tr[data-rombel="' +
                                            rombel + '"]')
                                        .remove();
                                }
                            });

                            $('#check_all').on('change', function() {
                                var isChecked = $(this).is(':checked');
                                $('.kode_rombel_checkbox').each(function() {
                                    $(this).prop('checked', isChecked);
                                    var rombel = $(this).val();
                                    $('#rombel_' + rombel).prop('checked',
                                        isChecked);
                                    if (isChecked) {
                                        fetchSelectedSiswaData([rombel]);
                                    } else {
                                        $('#selected_datasiswa_tbody').empty();
                                    }
                                });
                                updateSelectedRombelIds
                                    (); // Update hidden input for all selected rombels
                            });
                        }
                    });
                } else {
                    // Clear the rombel checkboxes and table if dropdown values are incomplete
                    $('#checkbox-kode-rombel').empty();
                    $('#checkbox-rombel').empty();
                    $('#jmlsiswa-rombel').empty();
                    $('#selected_datasiswa_tbody').empty();
                    $('#selected_rombel_ids').val(''); // Clear selected rombel ids if dropdowns are empty
                }
            });

            // Function to update the hidden input with selected rombel IDs
            function updateSelectedRombelIds() {
                var selectedRombels = [];
                $('.kode_rombel_checkbox:checked').each(function() {
                    selectedRombels.push($(this).val());
                });
                $('#selected_rombel_ids').val(selectedRombels.join(
                    ',')); // Join selected rombel IDs as comma-separated values
            }

            function fetchSelectedSiswaData(rombels) {
                $.ajax({
                    url: "{{ route('kurikulum.datakbm.get-student-data') }}", // Define this route in your controller
                    type: "POST",
                    data: {
                        rombels: rombels,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $.each(data, function(index, item) {
                            $('#selected_datasiswa_tbody').append(`
                    <tr data-rombel="${item.kode_rombel}">
                        <td>${index + 1}</td>
                        <td>${item.rombel}</td>
                        <td>${item.nis}</td>
                        <td>${item.nama_siswa}</td>
                        <td>${item.email}</td>
                    </tr>
                `);
                        });
                    }
                });
            }

            /// PROSES NAIK KELAS
            function loadRombelNaikKelas() {
                const tahunajaran = $('#tahunajaranNK1').val();
                const kode_kk = $('#kode_kk_NK1').val();
                const tingkat = $('#tingkatNK1').val();

                if (tahunajaran && kode_kk && tingkat) {
                    $.ajax({
                        url: "{{ route('kurikulum.datakbm.getrombelnaikkelas') }}",
                        method: "GET",
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(data) {
                            let options = '<option value="">Pilih Rombel</option>';
                            data.forEach(function(item) {
                                options +=
                                    `<option value="${item.kode_rombel}">${item.rombel}</option>`;
                            });
                            $('#rombelNK1').html(options);
                        },
                        error: function() {
                            alert('Gagal mengambil data rombel.');
                        }
                    });
                } else {
                    $('#rombelNK1').html('<option value="">Pilih Rombel</option>');
                }
            }

            $('#tahunajaranNK1, #kode_kk_NK1, #tingkatNK1').on('change', loadRombelNaikKelas);

            // Untuk Rombel Tahun Ajaran Baru (NK2)
            function loadRombelNaikKelasBaru() {
                const tahunajaran = $('#tahunajaranNK2').val();
                const kode_kk = $('#kode_kk_NK2').val();
                const tingkat = $('#tingkatNK2').val();

                if (tahunajaran && kode_kk && tingkat) {
                    $.ajax({
                        url: "{{ route('kurikulum.datakbm.getrombelnaikkelas') }}",
                        method: "GET",
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(data) {
                            let options = '<option value="">Pilih Rombel</option>';
                            data.forEach(function(item) {
                                options +=
                                    `<option value="${item.kode_rombel}">${item.rombel}</option>`;
                            });
                            $('#rombelNK2').html(options);
                        },
                        error: function() {
                            alert('Gagal mengambil data rombel untuk tahun ajaran baru.');
                        }
                    });
                } else {
                    $('#rombelNK2').html('<option value="">Pilih Rombel</option>');
                }
            }

            // Trigger saat salah satu field berubah
            $('#tahunajaranNK2, #kode_kk_NK2, #tingkatNK2').on('change', loadRombelNaikKelasBaru);

            //tampilkan data siswa
            $('#rombelNK1').on('change', function() {
                const tahunajaran = $('#tahunajaranNK1').val();
                const kode_kk = $('#kode_kk_NK1').val();
                const tingkat = $('#tingkatNK1').val();
                const kode_rombel = $(this).val();
                const tahunajaranBaru = $('#tahunajaranNK2').val(); // ambil tahun ajaran baru
                const isKelulusan = $('#tingkatNK1').val() === '12'; // otomatis deteksi

                if (tahunajaran && kode_kk && tingkat && kode_rombel) {
                    $.ajax({
                        url: '{{ route('kurikulum.datakbm.getsiswanaikkelas') }}',
                        method: 'GET',
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat,
                            kode_rombel: kode_rombel,
                            tahunajaran_baru: tahunajaranBaru,
                            mode: isKelulusan ? 'kelulusan' : 'naik_kelas'
                        },
                        success: function(data) {
                            let rows = '';
                            data.forEach(function(siswa, index) {
                                rows += `
                        <tr>
                            <td>${siswa.no}</td>
                            <td>${siswa.nis}</td>
                            <td>${siswa.nama}</td>
                            <td>${siswa.jk}</td>
                            <td>${siswa.status}</td>
                            <td class="text-center">
                                <input type="checkbox" name="selected_siswa[]" class="check-siswa" value="${siswa.nis}">
                            </td>
                        </tr>
                    `;
                            });

                            $('#selected_datasiswa_tbody_nk').html(rows);
                        },
                        error: function() {
                            alert('Gagal memuat data siswa.');
                        }
                    });
                }
            });

            $('#tahunajaranNK2').on('change', function() {
                $('#rombelNK1').trigger('change');
            });

            $('#kode_kk_NK1, #tingkatNK1').on('change', function() {
                $('#selected_datasiswa_tbody_nk').html('');
            });

            //notifikasi kk tidak sama
            $('#kode_kk_NK2').on('change', function() {
                const kk1 = $('#kode_kk_NK1').val();
                const kk2 = $('#kode_kk_NK2').val();

                if (kk1 && kk2 && kk1 !== kk2) {
                    $('#notifikasi_kk_tidak_sama').removeClass('d-none');
                } else {
                    $('#notifikasi_kk_tidak_sama').addClass('d-none');
                }
            });

            $('#kode_kk_NK1').on('change', function() {
                $('#kode_kk_NK2').trigger('change'); // Paksa recheck tingkatNK2
            });

            // notifikasi tingkat tidak sesuai
            $('#tingkatNK2').on('change', function() {
                const tingkatNK1 = parseInt($('#tingkatNK1').val());
                const tingkatNK2 = parseInt($('#tingkatNK2').val());

                if (tingkatNK1 && tingkatNK2) {
                    if (tingkatNK2 !== tingkatNK1 + 1) {
                        $('#notifikasi_tingkat_tidak_valid')
                            .removeClass('d-none')
                            .text(`Tingkat harus ${tingkatNK1 + 1} jika saat ini tingkat ${tingkatNK1}.`);
                    } else {
                        $('#notifikasi_tingkat_tidak_valid').addClass('d-none').text('');
                    }
                } else {
                    $('#notifikasi_tingkat_tidak_valid').addClass('d-none').text('');
                }
            });

            $('#tingkatNK1').on('change', function() {
                $('#tingkatNK2').trigger('change'); // Paksa recheck tingkatNK2
            });


            // Validasi apakah rombel baru sesuai aturan format nama
            function validateNamaRombelBaru() {
                const rombelNamaNK1 = $('#rombelNK1 option:selected').text().trim();
                const rombelNamaNK2 = $('#rombel_namaNK2').val().trim();

                const tingkatNK1 = parseInt($('#tingkatNK1').val());
                const tingkatNK2 = parseInt($('#tingkatNK2').val());

                if (!rombelNamaNK1 || !rombelNamaNK2 || isNaN(tingkatNK1) || isNaN(tingkatNK2)) {
                    $('#notif_koderombel').text(''); // jangan tampilkan pesan apapun
                    return;
                }

                // Misal: rombelNamaNK1 = "10 TKJ 1" → replace 10 jadi 11
                const expectedRombelBaru = rombelNamaNK1.replace(/^\d+/, tingkatNK2);

                if (rombelNamaNK2 !== expectedRombelBaru) {
                    $('#notif_koderombel').text('Rombel Baru yang dipilih SALAH');
                } else {
                    $('#notif_koderombel').text('');
                }
            }

            $('#rombelNK1').on('change', function() {
                $('#rombelNK2').trigger('change'); // Paksa recheck tingkatNK2
            });

            // Fungsi untuk isi input rombel_nama
            function updateRombelNama() {
                const rombelText = $('#rombelNK2 option:selected').text();
                $('#rombel_namaNK2').val(rombelText.trim());
            }

            // Pastikan fungsi dijalankan saat select berubah
            //$(document).on('change', '#rombelNK2', updateRombelNama);
            $(document).on('change', '#rombelNK2', function() {
                updateRombelNama();
                validateNamaRombelBaru();
            });

            // Jalankan juga saat form dikirim, sebagai jaga-jaga terakhir
            $('#formNaikKelas').on('submit', function() {
                updateRombelNama();
            });

            $(document).on('change', '#selected_datasiswa_list_nk thead input[type="checkbox"]', function() {
                const checked = $(this).is(':checked');
                $('#selected_datasiswa_list_nk tbody .check-siswa').prop('checked', checked);
            });


            //=========================
            // proses kelulusan

            $('#tingkatNK1').on('change', function() {
                const tingkatNK1 = $(this).val();
                const form = $('#formNaikKelas');
                const submitBtn = $('#submitNaikKelasBtn');

                if (tingkatNK1 === '12') {
                    // Mode Kelulusan
                    form.attr('action', '{{ route('kurikulum.datakbm.formkelulusan') }}');
                    submitBtn.text('Kelulusan');
                    submitBtn.removeClass('btn-primary').addClass('btn-success');
                    $('#notif_kelulusan').removeClass('d-none');

                    // Nonaktifkan required untuk input NK2
                    $('#tahunajaranNK2').removeAttr('required');
                    $('#kode_kk_NK2').removeAttr('required');
                    $('#tingkatNK2').removeAttr('required');
                    $('#rombelNK2').removeAttr('required');
                } else {
                    // Mode Naik Kelas
                    form.attr('action', '{{ route('kurikulum.datakbm.formgeneratenaikkelas') }}');
                    submitBtn.text('Generate Naik Kelas');
                    submitBtn.removeClass('btn-success').addClass('btn-primary');
                    $('#notif_kelulusan').addClass('d-none');

                    // Aktifkan kembali required untuk input NK2
                    $('#tahunajaranNK2').attr('required', true);
                    $('#kode_kk_NK2').attr('required', true);
                    $('#tingkatNK2').attr('required', true);
                    $('#rombelNK2').attr('required', true);
                }
            });




            ///=====================

            $('#' + datatable).DataTable();

            handleFilterAndReload(datatable);
            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
