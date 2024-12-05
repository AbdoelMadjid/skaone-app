@extends('layouts.master')
@section('title')
    @lang('translation.data-kbm')
@endsection
@section('css')
    {{--     <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" /> --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.data-kbm') - {{ $fullName }}</h5>
                    <div>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#buatMateriAjar"
                            id="buatMateriAjarBtn" title="Distribusikan Mapel yang dipilih" disabled>Buat Materi Ajar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kbm" role="tab"
                                aria-selected="false">
                                KBM
                            </a>
                        </li>
                        @if ($tampilkanPanel)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#cp" role="tab" aria-selected="true">
                                    Capaian Pembelajaran
                                </a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="kbm" role="tabpanel">
                            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                        </div>
                        <div class="tab-pane" id="cp" role="tabpanel">
                            @if ($capaianPembelajarans->isEmpty())
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2"
                                            role="alert">
                                            <div class="alert-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <i class="ri-alert-line display-6 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="alert-heading">Mohon Maaf !!.</h5>
                                                        <p class="mb-0">Capaian Pembelajaran BELUM ADA. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert-content">
                                                <p class="mb-0">Scripting & Desing by. Abdul Madjid, S.Pd., M.Pd.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <table class="table table-bordered" id="tabelPilihCP">
                                    <thead>
                                        <tr>
                                            <th><input class="form-check-input" type="checkbox" id="checkAllCP"
                                                    value="optionCP"></th>
                                            <th>Kode CP - Tingkat - Fase</th>
                                            <th>Element</th>
                                            <th>Inisial MP / Nama Mata Pelajaran</th>
                                            <th>Capaian Pembelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($capaianPembelajarans as $cp)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input chk-child-pilihcp" type="checkbox"
                                                            name="chk_child_pilihcp" value="{{ $cp->id }}"
                                                            data-kode_cp="{{ $cp->kode_cp }}"
                                                            data-element="{{ $cp->element }}"
                                                            data-inisial_mp="{{ $cp->inisial_mp }}"
                                                            data-nama_matapelajaran="{{ $cp->nama_matapelajaran }}"
                                                            data-nomor_urut="{{ $cp->nomor_urut }}"
                                                            data-isi_cp="{{ $cp->isi_cp }}">
                                                    </div>
                                                </td>
                                                <td width="200">
                                                    {{ $cp->kode_cp }} <br>
                                                    Tingkat: {{ $cp->tingkat }} <br>
                                                    Fase: {{ $cp->fase }}
                                                </td>
                                                <td>{{ $cp->element }}</td>
                                                <td>
                                                    {{ $cp->inisial_mp }} /
                                                    {{ $cp->nama_matapelajaran }}
                                                </td>
                                                <td width="55%">{{ $cp->nomor_urut }}. {{ $cp->isi_cp }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.gurumapel.data-kbm-form')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'datakbm-table';

        function updateKkm(id, kkmValue) {
            $.ajax({
                url: '/gurumapel/data-kbm/update-kkm', // Rute untuk update KKM
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Sertakan CSRF token
                    id: id,
                    kkm: kkmValue
                },
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'KKM berhasil diperbarui!');
                    } else {
                        showToast('warning', 'Gagal memperbarui KKM!');
                    }
                },
                error: function(xhr) {
                    /* alert('Terjadi kesalahan'); */
                    showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }

        function handleCheckbokMapel(tableId) {
            var table = $('#' + tableId).DataTable();

            // Handle "Select All" checkbox click
            $('#checkAll').on('click', function() {
                var isChecked = this.checked;

                // Iterate through each checkbox in the current DataTable page
                table.rows({
                    page: 'current'
                }).every(function() {
                    var row = this.node();
                    var checkbox = $(row).find('.chk-child');
                    checkbox.prop('checked', isChecked); // Set checkbox checked state

                    // Add or remove 'table-active' class based on checkbox state
                    if (isChecked) {
                        $(row).addClass('table-active');
                    } else {
                        $(row).removeClass('table-active');
                    }
                });

                toggleRemoveActions(); // Call toggleRemoveActions() to handle button state
            });

            // Handle individual row checkbox click
            $('#' + datatable + ' tbody').on('click', '.chk-child', function() {
                var $row = $(this).closest('tr');
                var isChecked = this.checked;

                // Add or remove 'table-active' class based on checkbox state
                if (isChecked) {
                    $row.addClass('table-active');
                } else {
                    $row.removeClass('table-active');
                }

                // Update the "Select All" checkbox state based on individual checkboxes
                if ($('.chk-child:checked').length !== table.rows({
                        page: 'current'
                    }).count()) {
                    $('#checkAll').prop('checked', false);
                }

                if ($('.chk-child:checked').length === table.rows({
                        page: 'current'
                    }).count()) {
                    $('#checkAll').prop('checked', true);
                }

                toggleRemoveActions(); // Call toggleRemoveActions() to handle button state
            });
        }

        // Function to toggle "remove actions" button visibility based on checkbox selection
        function toggleRemoveActions() {
            var checkedCount = $('.chk-child:checked').length; // Count checked checkboxes

            // Toggle "remove actions" button
            if (checkedCount > 0) {
                $('#remove-actions').show(); // Show "remove actions" if any checkbox is checked
                $('#buatMateriAjarBtn').prop('disabled', false); // Enable "Buatkan Akun" button
            } else {
                $('#remove-actions').hide(); // Hide "remove actions" if no checkboxes are checked
                $('#buatMateriAjarBtn').prop('disabled', true); // Disable "Buatkan Akun" button
            }
        }

        // Inisialisasi DataTable
        $(document).ready(function() {

            $('#checkAllCP').on('change', function() {
                $('.chk-child-pilihcp').prop('checked', this.checked);
            });

            // Handle individual checkbox change
            $('.chk-child-pilihcp').on('change', function() {
                if ($('.chk-child-pilihcp:checked').length === $('.chk-child-pilihcp').length) {
                    $('#checkAllCP').prop('checked', true);
                } else {
                    $('#checkAllCP').prop('checked', false);
                }
            });

            $('#buatMateriAjarBtn').on('click', function() {
                let selectedIds = [];
                let selectedRows = ''; // Variable untuk menyimpan baris tabel

                let selectedRombel = []; // Array untuk menyimpan kode_rombel
                let selectedPersonil = []; // Array untuk menyimpan id_personil
                let selectedMapel = []; // Array untuk menyimpan kode_mapel
                let selectedCp = []; // Array untuk menyimpan kode_cp

                // Loop untuk mengumpulkan id
                $('.chk-child:checked').each(function() {
                    let kode_rombel = $(this).data('kode_rombel');
                    let id_personil = $(this).data('id_personil');
                    let kode_mapel = $(this).data('kode_mapel'); // Ambil kode_mapel

                    selectedIds.push($(this).val());
                    selectedRombel.push(kode_rombel); // Simpan kode_rombel
                    selectedPersonil.push(id_personil); // Simpan id_personil
                    selectedMapel.push(kode_mapel); // Simpan kode_mapel

                    // Buat baris baru untuk setiap siswa
                    selectedRows += `
            <tr>
                <td>${kode_rombel}</td>
                <td>${$(this).data('rombel')}</td>
                <td>${kode_mapel}</td>
                <td>${$(this).data('mata_pelajaran')}</td>
                <td>${id_personil}</td>
                <td>${$(this).data('namalengkap')}</td>
            </tr>
        `;
                });

                $('#selected_mapel_ids').val(selectedIds.join(','));
                $('#selected_mapel_tbody').html(selectedRows);

                // Simpan ke input tersembunyi untuk dikirim ke server
                $('#selected_rombel_ids').val(selectedRombel.join(',')); // Menyimpan kode_rombel
                $('#selected_personil_ids').val(selectedPersonil.join(',')); // Menyimpan id_personil
                $('#selected_mapel_ids').val(selectedMapel.join(',')); // Menyimpan kode_mapel

                let selectedCPRows = '';
                let selectedCPIds = [];

                // Loop through each checked CP checkbox
                $('.chk-child-pilihcp:checked').each(function() {
                    let cp_id = $(this).val();
                    let kode_cp = $(this).data('kode_cp'); // Ambil kode_cp
                    selectedCp.push(kode_cp); // Simpan kode_cp

                    // Append each selected CP as a row in the modal table
                    selectedCPRows += `
        <tr>
            <td width="200">${kode_cp}</td>
            <td>${$(this).data('element')}</td>
            <td>${$(this).data('isi_cp')}</td>
            <td width="200">
                <select class="form-select mt-3" name="nomor_materi[]">
                    <option selected>Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </td>
        </tr>
        `;

                    // Push the CP ID to the array
                    selectedCPIds.push(cp_id);
                });

                if (selectedCPIds.length === 0) {
                    showToast('error', 'Belum ada capaian pembelajaran yang dipilih!');
                    return; // Exit the function if no CPs are selected
                }

                // Update the modal table body with selected CPs
                $('#selected_cp_tbody').html(selectedCPRows);
                $('#selected_cp_ids').val(selectedCPIds.join(','));

                $('#buatMateriAjar').modal('show');
            });



            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleCheckbokMapel(datatable); // Handle checkbox selections
            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
