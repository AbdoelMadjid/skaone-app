@extends('layouts.master')
@section('title')
    @lang('translation.absensi-siswa-bimbingan')
@endsection
@section('css')
    {{--  --}}
    {{--  --}}
    <style>
        .absensi-badge {
            cursor: default;
            /* Default cursor */
            transition: all 0.3s ease-in-out;
        }

        .absensi-badge[data-nis][onclick] {
            cursor: pointer;
            /* Ubah ke pointer jika ada onclick */
        }

        .absen-text {
            display: inline-block;
            transition: transform 0.2s ease-in-out, color 0.2s ease-in-out;
        }

        .absensi-badge:hover .absen-text {
            transform: scale(1.1);
            /* Perbesar teks saat hover */
            color: #ffffff;
            /* Ubah warna teks */
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.pembimbingpkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                    <div>
                        {{-- @can('create pembimbingpkl/absensi-bimbingan')
                            <a class="btn btn-primary action" href="{{ route('pembimbingpkl.absensi-bimbingan.create') }}">Tambah
                                Absensi</a>
                        @endcan --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body form-steps">
                                <div class="vertical-navs-step">
                                    <div class="row gy-5">
                                        <div class="col-lg-3">
                                            <div class="nav flex-column custom-nav nav-pills" role="tablist"
                                                aria-orientation="vertical">
                                                @foreach ($data as $index => $siswa)
                                                    <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                        id="v-pills-bill-{!! $siswa->nis !!}-tab" data-bs-toggle="pill"
                                                        data-bs-target="#v-pills-{!! $siswa->nis !!}-info"
                                                        type="button" role="tab"
                                                        aria-controls="v-pills-{!! $siswa->nis !!}-info"
                                                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                                        onclick="setActiveTab({{ $siswa->nis }})">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i>
                                                            {!! $siswa->nama_lengkap !!}
                                                        </span>
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div> <!-- end col-->
                                        <div class="col-lg-9">
                                            <div class="tab-content">
                                                @foreach ($data as $index => $siswa)
                                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                        id="v-pills-{!! $siswa->nis !!}-info" role="tabpanel"
                                                        aria-labelledby="v-pills-bill-{!! $siswa->nis !!}-tab">

                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="card">
                                                                    <div class="card-body p-4 bg-info-subtle">
                                                                        <center>
                                                                            @if ($siswa->foto == 'siswacowok.png')
                                                                                <img src="{{ URL::asset('images/siswacowok.png') }}"
                                                                                    alt="User Avatar"
                                                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                                                            @elseif ($siswa->foto == 'siswacewek.png')
                                                                                <img src="{{ URL::asset('images/siswacewek.png') }}"
                                                                                    alt="User Avatar"
                                                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                                                            @else
                                                                                <img src="{{ URL::asset('images/peserta_didik/' . $siswa->foto) }}"
                                                                                    alt="User Avatar"
                                                                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                                                            @endif
                                                                            <h5 class="fs-17 mt-3 mb-2">
                                                                                {!! $siswa->nama_lengkap !!}
                                                                            </h5>
                                                                            <p class="text-muted fs-13 mb-3">
                                                                                {{ $siswa->nis }} -
                                                                                {{ $siswa->rombel_nama }}
                                                                            </p>
                                                                            <h5 class="fs-17 mt-3 mb-2">
                                                                                {!! $siswa->nama !!}
                                                                            </h5>
                                                                            <p class="text-muted fs-13 mb-3">
                                                                                {{ $siswa->alamat }}
                                                                            </p>
                                                                        </center>
                                                                        @include('pages.pkl.pembimbingpkl.absensi-bimbingan-calendar-absensi')
                                                                        <hr>
                                                                        @include('pages.pkl.pembimbingpkl.absensi-bimbingan-rekap-bulan')
                                                                        <hr>
                                                                        @include('pages.pkl.pembimbingpkl.absensi-bimbingan-rekap-total')
                                                                    </div>
                                                                </div>
                                                                @include('pages.pkl.pembimbingpkl.absensi-bimbingan-tambah-form')
                                                            </div>
                                                            @include('pages.pkl.pembimbingpkl.absensi-bimbingan-riwayat')
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>

                    </div>
                </div>
                <!-- end -->
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
            <!-- end col -->

        </div>
    </div>
    <!-- Modal untuk Edit Status -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Status Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pembimbingpkl.absensi-bimbingan.updateabsensi', ['absensi' => 'absensiId']) }}"
                    method="POST" id="editAbsensiForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="status" class="form-label">Status Kehadiran</label>
                        <select class="form-select mb-3" name="status" aria-label="Default select example">
                            <option selected>Pilih Status Kehadiran</option>
                            <option value="HADIR">HADIR</option>
                            <option value="SAKIT">SAKIT</option>
                            <option value="IZIN">IZIN</option>
                            <option value="ALFA">ALFA</option>
                            <option value="LIBUR">LIBUR</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'absensibimbingan-table';

        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif

        // Simpan tab yang aktif ke localStorage saat diklik
        function setActiveTab(nis) {
            localStorage.setItem('activeTab', nis);
        }

        // Saat halaman dimuat, periksa tab yang aktif dan setel tab tersebut
        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                const activeTabButton = document.getElementById(`v-pills-bill-${activeTab}-tab`);
                if (activeTabButton) {
                    const tab = new bootstrap.Tab(activeTabButton);
                    tab.show();
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Menambahkan event listener pada tombol Edit
            const editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari tombol yang diklik
                    const absensiId = this.getAttribute('data-id');
                    const status = this.getAttribute('data-status');

                    // Ganti URL form action dengan absensi ID yang sesuai
                    const formAction = document.getElementById('editAbsensiForm');
                    formAction.action = formAction.action.replace('absensiId', absensiId);

                    // Set status pada select di dalam modal
                    const statusSelect = document.getElementById('status');
                    statusSelect.value = status; // Sesuaikan dengan status yang ada di tombol
                });
            });
        });

        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah form dikirim langsung

                // Menampilkan SweetAlert2 confirmation dialog
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan bisa mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika diklik "Ya, hapus", kirimkan form
                        this.closest('form').submit();
                    }
                });
            });
        });

        // Ini akan mengaktifkan tab untuk siswa yang dipilih berdasarkan nis
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function() {
                let nis = tab.id.split('-')[1]; // Ambil NIS dari ID tab
                let activeTab = new bootstrap.Tab(tab);
                activeTab.show(); // Menampilkan tab yang dipilih

                // Ubah konten berdasarkan nis
                document.querySelectorAll(`#calendar-tabs-` + nis + ` .tab-pane`).forEach(pane => {
                    if (pane.id.split('-')[1] === nis) {
                        pane.classList.add('show', 'active');
                    }
                });
            });
        });

        function saveAttendance(nis, monthYear, day) {
            // Format tanggal menjadi YYYY-MM-DD
            var date = monthYear + '-' + day; // Format YYYY-MM-DD

            // Kirim data absensi dengan AJAX
            $.ajax({
                url: '/pembimbingpkl/absensi-bimbingan/simpanabsensi',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    nis: nis,
                    tanggal: date,
                    status: 'HADIR'
                },
                success: function(response) {
                    showToast('success', 'Absen berhasil ditambahkan!');
                    window.location.href =
                        "{{ route('pembimbingpkl.absensi-bimbingan.index') }}";
                },
                error: function(xhr, status, error) {
                    showToast('error', 'Terjadi kesalahan saat mengirim data.');
                    console.log(xhr.responseText); // Untuk melihat pesan error lebih detail
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const badges = document.querySelectorAll('.absensi-badge[data-nis][onclick]');

            badges.forEach(badge => {
                const textElement = badge.querySelector('.absen-text');

                badge.addEventListener('mouseenter', () => {
                    if (textElement.textContent.trim() === 'ABSEN') {
                        textElement.textContent = 'ADD'; // Ubah ke ADD saat hover
                    }
                });

                badge.addEventListener('mouseleave', () => {
                    if (textElement.textContent.trim() === 'ADD') {
                        textElement.textContent = 'ABSEN'; // Kembali ke ABSEN saat keluar hover
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
