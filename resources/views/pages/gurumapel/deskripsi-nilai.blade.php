@extends('layouts.master')
@section('title')
    @lang('translation.deskripsi-nilai')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    <div class="text-center">
                        <div class="mx-auto mb-4 profile-user position-relative d-inline-block">
                            @if ($personil->jeniskelamin == 'Perempuan')
                                <img src="{{ $personil->photo ? URL::asset('images/personil/' . $personil->photo) : URL::asset('images/gurucewek.png') }}"
                                    alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @else
                                <img src="{{ $personil->photo ? URL::asset('images/personil/' . $personil->photo) : URL::asset('images/gurulaki.png') }}"
                                    alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                            @endif
                        </div>
                        <h5 class="mb-1 fs-16">{{ $personil->namalengkap }}</h5>
                    </div>
                </div>

                <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 368px);">
                    <ul class="to-do-menu list-unstyled" id="projectlist-data">
                        <li>
                            <a data-bs-toggle="collapse" href="#velzonAdmin" class="nav-link fs-13 active">Deskripsi
                                Nilai</a>
                            <div class="collapse show" id="velzonAdmin">
                                <ul class="mb-0 sub-menu list-unstyled ps-3 vstack gap-2 mb-2">
                                    @foreach ($KbmPersonil as $kbm)
                                        <li>
                                            <a href="#" id="datadeskripsi" data-kel-mapel="{{ $kbm->kel_mapel }}"
                                                data-kode-rombel="{{ $kbm->kode_rombel }}"
                                                data-id-personil="{{ $kbm->id_personil }}"
                                                class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">
                                                        {{ $kbm->mata_pelajaran }} <br>
                                                        <i class="ri-stop-mini-fill align-middle fs-15 text-secondary"></i>
                                                        {{ $kbm->rombel }}
                                                    </h5>
                                                </div>

                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">
                                                        @php
                                                            // Ambil cp_terpilih
                                                            $jmlsiswa = DB::table('peserta_didik_rombels')
                                                                ->where('tahun_ajaran', $kbm->tahunajaran)
                                                                ->where('kode_kk', $kbm->kode_kk)
                                                                ->where('rombel_tingkat', $kbm->tingkat)
                                                                ->where('rombel_kode', $kbm->kode_rombel)
                                                                ->count();
                                                        @endphp
                                                        @if ($jmlsiswa)
                                                            {{ $jmlsiswa }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="file-manager-content w-100 p-4 pb-0">
            <div class="row mb-4">
                <div class="col-auto order-1 d-block d-lg-none">
                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                        <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                </div>
                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                    <h5 class="fw-semibold mb-0">Deskripsi Nilai <span
                            class="badge bg-primary align-bottom ms-2">v2.0.0</span></h5>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-icon fw-semibold btn-soft-danger"><i
                                    class="ri-arrow-go-back-line"></i></button>
                            <button class="btn btn-icon fw-semibold btn-soft-success"><i
                                    class="ri-arrow-go-forward-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 bg-light rounded mb-4">
                <div class="row g-2">
                    <div class="col-lg-auto">
                        <select class="form-control" data-choices data-choices-search-false name="choices-select-sortlist"
                            id="choices-select-sortlist">
                            <option value="">Sort</option>
                            <option value="By ID">By ID</option>
                            <option value="By Name">By Name</option>
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <select class="form-control" data-choices data-choices-search-false name="choices-select-status"
                            id="choices-select-status">
                            <option value="">All Tasks</option>
                            <option value="Completed">Completed</option>
                            <option value="Inprogress">Inprogress</option>
                            <option value="Pending">Pending</option>
                            <option value="New">New</option>
                        </select>
                    </div>
                    <div class="col-lg">
                        <div class="search-box">
                            <input type="text" id="searchTaskList" class="form-control search"
                                placeholder="Search task name">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal"
                            data-bs-target="#createTask">
                            <i class="ri-add-fill align-bottom"></i> Add Tasks
                        </button>
                    </div>
                </div>
            </div>

            <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
                <div class="todo-task" id="todo-task">
                    <div class="table-responsive">
                        <table class="table align-middle position-relative table-nowrap">
                            <thead class="table-active">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama Siswa</th>
                                </tr>
                            </thead>
                            <tbody id="data-nilai-siswa">


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#datadeskripsi', function(e) {
                e.preventDefault();

                // Ambil data dari atribut HTML
                let kelMapel = $(this).data('kel-mapel');
                let kodeRombel = $(this).data('kode-rombel');
                let idPersonil = $(this).data('id-personil');

                // AJAX request ke server
                $.ajax({
                    url: '/getpesertadidik', // Endpoint sesuai dengan route Laravel
                    type: 'GET',
                    data: {
                        kel_mapel: kelMapel,
                        kode_rombel: kodeRombel,
                        id_personil: idPersonil
                    },
                    success: function(response) {
                        // Kosongkan tabel sebelum menambahkan data
                        $('#data-nilai-siswa').empty();

                        // Iterasi data dan tambahkan ke tabel
                        response.forEach((item, index) => {
                            $('#data-nilai-siswa').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nis}</td>
                        <td>${item.nama_lengkap}</td>
                    </tr>
                `);
                        });
                    },
                    error: function() {
                        // Tampilkan pesan error jika gagal
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    {{--     <script src="{{ URL::asset('build/js/pages/todo.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
