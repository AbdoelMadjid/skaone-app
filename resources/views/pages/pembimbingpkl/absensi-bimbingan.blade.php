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
                        @can('create pembimbingpkl/absensi-bimbingan')
                            <a class="btn btn-primary action" href="{{ route('pembimbingpkl.absensi-bimbingan.create') }}">Tambah
                                Absensi</a>
                        @endcan
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body form-steps">
                                <form class="vertical-navs-step">
                                    <div class="row gy-5">
                                        <div class="col-lg-4">
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
                                            <!-- end nav -->
                                        </div> <!-- end col-->
                                        <div class="col-lg-8">
                                            <div class="tab-content">
                                                @foreach ($data as $index => $siswa)
                                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                        id="v-pills-{!! $siswa->nis !!}-info" role="tabpanel"
                                                        aria-labelledby="v-pills-bill-{!! $siswa->nis !!}-tab">

                                                        <div class="row">
                                                            <div class="col-md-8">
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
                                                                            {{ $siswa->rombel_nama }}</p>
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
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-12">
                                                                                    <input type="hidden" name="nis"
                                                                                        id="nis"
                                                                                        value="{{ $siswa->nis }}">
                                                                                </div>
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
                                                                    ->select('nis', 'tanggal', 'status')
                                                                    ->where('nis', $siswa->nis) // Mengambil riwayat absensi berdasarkan nis siswa
                                                                    ->orderBy('tanggal', 'desc')
                                                                    ->get();
                                                            @endphp
                                                            <div class="col-md-4">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h5 class="fs-14 text-primary mb-0"><i
                                                                            class="ri-calendar-fill align-middle me-2"></i>
                                                                        Riwayat Absen
                                                                    </h5>
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
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            @forelse ($riwayat_absensi as $absensi)
                                                                                <tr>
                                                                                    <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d-m-Y') }}
                                                                                    </td>
                                                                                    <td>{{ ucfirst(strtolower($absensi->status)) }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="2"
                                                                                        class="text-center">
                                                                                        Tidak ada riwayat absensi.
                                                                                    </td>
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
                        </form>
                    </div>
                </div>
                <!-- end -->
            </div>
            <!-- end col -->
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    </div>
    <!--end col-->
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
        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
