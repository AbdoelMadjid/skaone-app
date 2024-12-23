@extends('layouts.master')
@section('title')
    @lang('translation.informasi-bimbingan')
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
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="bg-info-subtle position-relative">
                    <div class="card-body p-5">
                        <div class="text-center mt-sm-1 mb-5 text-black-50">
                            <div>
                                <a href="/" class="d-inline-block auth-logo">
                                    <img src="{{ $data->first()->photo ? URL::asset('images/personil/' . $data->first()->photo) : URL::asset('images/user-dummy-img.jpg') }}"
                                        alt="User Avatar" class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                </a>
                            </div>
                            <h5 class="fs-17 mt-3 mb-2">
                                {{ $data->first()->gelardepan ?? '' }}
                                {!! $data->first()->namalengkap ?? '' !!}
                                {{ $data->first()->gelarbelakang ?? '' }}
                            </h5>
                        </div>
                    </div>
                    <div class="shape">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none"
                            viewBox="0 0 1440 60">
                            <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z"
                                    style="fill: var(--vz-secondary-bg);"></path>
                            </g>
                            <defs>
                                <mask id="SvgjsMask1001">
                                    <rect width="1440" height="80" fill="#ffffff"></rect>
                                </mask>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="card-body p-6">
                    <div class="row">
                        @foreach ($data as $siswa)
                            <div class="col-lg-4">
                                <div class="card text-center">
                                    <div class="card-body p-4 bg-info-subtle">
                                        @if ($siswa->foto == 'siswacowok.png')
                                            <img src="{{ URL::asset('images/siswacowok.png') }}" alt="User Avatar"
                                                class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                        @elseif ($siswa->foto == 'siswacewek.png')
                                            <img src="{{ URL::asset('images/siswacewek.png') }}" alt="User Avatar"
                                                class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                        @else
                                            <img src="{{ URL::asset('images/peserta_didik/' . $siswa->foto) }}"
                                                alt="User Avatar"
                                                class="rounded-circle avatar-xl img-thumbnail user-profile-image">
                                        @endif
                                        <h5 class="fs-17 mt-3 mb-2">{!! $siswa->nama_lengkap !!}</h5>
                                        <p class="text-muted fs-13 mb-3">{{ $siswa->rombel_nama }}</p>
                                        <h5 class="fs-17 mt-3 mb-2">{!! $siswa->nama !!}</h5>
                                        <p class="text-muted fs-13 mb-3">{{ $siswa->alamat }}</p>

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
                                        <!-- Jumlah Jurnal -->
                                        <div class="card card-height-100">
                                            <div class="card-header">
                                                REKAPITULASI JURNAL
                                            </div>
                                            <div class="card-body">
                                                @foreach ($siswa->jurnal_per_elemen as $jurnal)
                                                    <div
                                                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                                                        <p class="fw-medium fs-10 mb-0"><i
                                                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                            <strong>{{ $jurnal['element'] }}</strong>
                                                        </p>
                                                        <div>

                                                            <span
                                                                class="text-success fw-medium fs-12">{{ $jurnal['total_jurnal_cp'] }}</span>
                                                        </div>
                                                    </div><!-- end -->
                                                @endforeach
                                            </div>
                                            <div class="card-footer">
                                                <div
                                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-0">
                                                    <p class="fw-medium mb-0"><i
                                                            class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                                                        <strong>Total Jurnl</strong>
                                                    </p>
                                                    <div>

                                                        <span class="text-success fw-medium fs-12">
                                                            {{ $siswa->total_jurnal }}</span>
                                                    </div>
                                                </div><!-- end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
