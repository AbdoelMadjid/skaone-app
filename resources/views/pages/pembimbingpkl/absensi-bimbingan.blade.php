@extends('layouts.master')
@section('title')
    @lang('translation.absensi-siswa-bimbingan')
@endsection
@section('css')
    {{--  --}}
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
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
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
                                                            <div class="col-md-7">
                                                                <div class="card text-center">
                                                                    <div class="card-body p-4 bg-info-subtle">
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
                                                                            {{ $siswa->nis }} - {{ $siswa->rombel_nama }}
                                                                        </p>
                                                                        <h5 class="fs-17 mt-3 mb-2">
                                                                            {!! $siswa->nama !!}
                                                                        </h5>
                                                                        <p class="text-muted fs-13 mb-3">
                                                                            {{ $siswa->alamat }}
                                                                        </p>

                                                                        <!-- Tambahkan Data Absensi -->
                                                                        <hr>
                                                                        <div class="card card-height-100">
                                                                            <div class="card-header">
                                                                                REKAPITULASI ABSENSI PESERTA
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div
                                                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                                                                                    <p class="fw-medium mb-0"><i
                                                                                            class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                                                        <strong>HADIR:</strong>
                                                                                    </p>
                                                                                    <div>
                                                                                        <span
                                                                                            class="text-success fw-medium fs-12">{{ $siswa->jumlah_hadir }}
                                                                                            Hari</span>
                                                                                    </div>
                                                                                </div><!-- end -->
                                                                                <div
                                                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                                                                                    <p class="fw-medium mb-0"><i
                                                                                            class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                                                        <strong>SAKIT:</strong>
                                                                                    </p>
                                                                                    <div>
                                                                                        <span
                                                                                            class="text-success fw-medium fs-12">{{ $siswa->jumlah_sakit }}
                                                                                            Hari</span>
                                                                                    </div>
                                                                                </div><!-- end -->
                                                                                <div
                                                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                                                                                    <p class="fw-medium mb-0"><i
                                                                                            class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                                                        <strong>IZIN:</strong>
                                                                                    </p>
                                                                                    <div>
                                                                                        <span
                                                                                            class="text-success fw-medium fs-12">{{ $siswa->jumlah_izin }}
                                                                                            Hari</span>
                                                                                    </div>
                                                                                </div><!-- end -->
                                                                                <div
                                                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                                                                                    <p class="fw-medium mb-0"><i
                                                                                            class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                                                        <strong>ALFA:</strong>
                                                                                    </p>
                                                                                    <div>
                                                                                        <span
                                                                                            class="text-success fw-medium fs-12">{{ $siswa->jumlah_alfa }}
                                                                                            Hari</span>
                                                                                    </div>
                                                                                </div><!-- end -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <form
                                                                    action="{{ route('pembimbingpkl.absensi-bimbingan.simpanabsensi') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="card">
                                                                        <div class="card-header">Tambah Absensi</div>
                                                                        <div class="card-body">
                                                                            <input type="hidden" name="nis"
                                                                                value="{{ $siswa->nis }}">
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-4">
                                                                                    <x-form.input type="date"
                                                                                        name="tanggal"
                                                                                        label="Tanggal Kehadiran"
                                                                                        value="" id="tanggal" />
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <x-form.select name="status"
                                                                                        :options="[
                                                                                            'HADIR' => 'HADIR',
                                                                                            'SAKIT' => 'SAKIT',
                                                                                            'IZIN' => 'IZIN',
                                                                                            'ALFA' => 'ALFA',
                                                                                        ]" value=""
                                                                                        label="Status Kehadiran" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="gap-2 hstack justify-content-end">
                                                                                <button type="submit"
                                                                                    class="btn btn-soft-info">Simpan</button>
                                                                            </div>
                                                                        </div><!-- end card body -->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            @php
                                                                $riwayat_absensi = DB::table('absensi_siswa_pkls')
                                                                    ->select('id', 'nis', 'tanggal', 'status')
                                                                    ->where('nis', $siswa->nis)
                                                                    ->orderBy('tanggal', 'asc')
                                                                    ->get();
                                                            @endphp
                                                            <div class="col-md-5">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h5 class="fs-14 text-primary mb-0"><i
                                                                            class="ri-calendar-fill align-middle me-2"></i>
                                                                        Riwayat Absen</h5>
                                                                    <span
                                                                        class="badge bg-danger rounded-pill">{{ $siswa->jumlah_hadir }}</span>
                                                                </div>
                                                                <div class="px-4 mx-n4" data-simplebar
                                                                    style="height: calc(100vh - 256px);">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($riwayat_absensi as $absensi)
                                                                                <tr>
                                                                                    <td>
                                                                                        @php
                                                                                            $dayOfWeek = \Carbon\Carbon::parse(
                                                                                                $absensi->tanggal,
                                                                                            )->dayOfWeek;
                                                                                            $formattedDate = \Carbon\Carbon::parse(
                                                                                                $absensi->tanggal,
                                                                                            )->translatedFormat(
                                                                                                'l, d-m-Y',
                                                                                            );
                                                                                        @endphp

                                                                                        <span
                                                                                            class="{{ $dayOfWeek == 0 ? 'text-danger' : ($dayOfWeek == 6 ? 'text-info' : '') }}">
                                                                                            {{ $formattedDate }}
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>{{ ucfirst(strtolower($absensi->status)) }}
                                                                                    </td>
                                                                                    <td class='text-center'>
                                                                                        <button
                                                                                            class="btn btn-soft-warning btn-sm"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#editModal"
                                                                                            data-id="{{ $absensi->id }}"
                                                                                            data-status="{{ $absensi->status }}">
                                                                                            <i class='ri-edit-2-line'></i>
                                                                                        </button>
                                                                                        <!-- Tombol delete -->
                                                                                        <form
                                                                                            action="{{ route('pembimbingpkl.absensi-bimbingan.deleteabsensi', $absensi->id) }}"
                                                                                            method="POST"
                                                                                            style="display:inline;">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit"
                                                                                                class="btn btn-soft-danger btn-sm delete-btn">
                                                                                                <i
                                                                                                    class='ri-delete-bin-2-line'></i>
                                                                                            </button>
                                                                                        </form>

                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="2"
                                                                                        class="text-center">
                                                                                        Tidak ada
                                                                                        riwayat absensi.</td>
                                                                                </tr>
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
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
                <div class="card-body">
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
                <form action="{{ route('pembimbingpkl.absensi-bimbingan.update', ['absensi' => 'absensiId']) }}"
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
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

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
        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
