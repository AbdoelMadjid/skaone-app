@extends('layouts.master')
@section('title')
    @lang('translation.data-kelas')
@endsection
@section('css')
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
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Identitas Wali Kelas</h4>
                </div><!-- end card header -->
                <div class="card-body">

                    {{-- Menampilkan tahun ajaran dan semester aktif --}}
                    @if ($tahunAjaranAktif)
                        <h5 class="text-info">Tahun Ajaran: {{ $tahunAjaranAktif->tahunajaran }}</h5>
                        @if ($tahunAjaranAktif->semesters->isNotEmpty())
                            Semester Aktif: {{ $tahunAjaranAktif->semesters->first()->semester }}
                            ({{ $semesterAngka ?? 'Tidak dapat dihitung' }})
                        @else
                            Tidak ada semester aktif.
                        @endif
                    @else
                        <p>Tidak ada tahun ajaran aktif.</p>
                    @endif

                    {{-- Menampilkan wali kelas dan personil terkait dalam tabel --}}
                    @if ($waliKelas && $personil)
                        <h5 class="mt-5 text-info">Wali Kelas Data:</h5>
                        <table class="no-border">
                            <tbody class="no-border">
                                <tr>
                                    <td><strong>Personal ID:</strong></td>
                                    <td>{{ $waliKelas->wali_kelas }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Lengkap:</strong></td>
                                    <td>
                                        {{ $personil->gelardepan }} {{ $personil->namalengkap }}
                                        {{ $personil->gelarbelakang }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>NIP:</strong></td>
                                    <td>
                                        @if (!empty($personil->nip))
                                            {{ $personil->nip }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Kode Rombel:</strong></td>
                                    <td>{{ $waliKelas->kode_rombel }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Rombongan Belajar:</strong></td>
                                    <td>{{ $waliKelas->rombel }}</td>
                                </tr>
                                {{--                                     <tr>
                                        <td><strong>Tingkat:</strong></td>
                                        <td>{{ $waliKelas->tingkat }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Semester:</strong></td>
                                        <td>{{ $semesterAngka ?? 'Tidak dapat dihitung' }}</td>
                                    </tr> --}}
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada data wali kelas yang terkait untuk tahun ajaran aktif ini.</p>
                    @endif
                </div>
            </div><!-- end card -->
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        @if ($titimangsa)
                            Update
                        @else
                            Tambah
                        @endif TitiMangsa:
                    </h4>
                </div><!-- end card header -->
                <form action="{{ route('walikelas.data-kelas.simpantitimangsa') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="kode_rombel" id="kode_rombel" value="{{ $waliKelas->kode_rombel }}">
                        <input type="hidden" name="tahunajaran" id="tahunajaran"
                            value="{{ $tahunAjaranAktif->tahunajaran }}">
                        <input type="hidden" name="ganjilgenap" id="ganjilgenap"
                            value="{{ $tahunAjaranAktif->semesters->first()->semester }}">
                        <input type="hidden" name="semester" id="semester" value="{{ $semesterAngka }}">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.input name="alamat"
                                    value="{{ old('alamat', isset($titimangsa) ? $titimangsa->alamat : '') }}"
                                    label="Alamat" />
                            </div>
                            <div class="col-md-6">
                                <x-form.input type="date" name="titimangsa"
                                    value="{{ old('titimangsa', isset($titimangsa) ? $titimangsa->titimangsa : '') }}"
                                    label="Titimangsa" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="gap-2 hstack justify-content-end">
                            <button type="submit" class="btn btn-soft-info">
                                @if ($titimangsa)
                                    Update
                                @else
                                    Simpan
                                @endif
                            </button>
                        </div>
                    </div><!-- end card body -->
                </form>
            </div><!-- end card -->
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Data Pengajar {{ $waliKelas->rombel }}</h4>
                </div>
                <div class="card-body">
                    <table class="table " style="no border">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Mata Pelajaran</th>
                                <th>Nama Pengajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kbmData as $index => $kbm)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kbm->mata_pelajaran }}</td>
                                    <td>
                                        @if ($kbm->id_personil)
                                            @php
                                                // Ambil data pengajar
                                                $pengajar = DB::table('personil_sekolahs')
                                                    ->where('id_personil', $kbm->id_personil)
                                                    ->first();
                                            @endphp
                                            @if ($pengajar)
                                                {{ $pengajar->gelardepan }} <span
                                                    class="text-uppercase">{{ $pengajar->namalengkap }} </span>
                                                {{ $pengajar->gelarbelakang }}<br>
                                                @if (!empty($pengajar->nip))
                                                    NIP. {{ $pengajar->nip }}
                                                @else
                                                    NIP. -
                                                @endif
                                            @else
                                                Tidak ada pengajar
                                            @endif
                                        @else
                                            Tidak ada pengajar
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if ($kbmData->isEmpty())
                                <tr>
                                    <td colspan="4">Tidak ada data KBM per Rombel.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-7 col-md-7">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Data Siswa {{ $waliKelas->rombel }}</h4>
                    <a href="{{ route('walikelas.downloadpdfdatasiswa') }}" class="btn btn-soft-info">Download PDF</a>
                </div>

                <div class="card-body">
                    <table class="table" id="data-siswa">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Email/User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswaData as $index => $siswa)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nama_lengkap }}</td>
                                    <td>{{ $siswa->kontak_email }}</td>
                                </tr>
                            @endforeach
                            @if ($siswaData->isEmpty())
                                <tr>
                                    <td colspan="3">Tidak ada siswa di rombel ini.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
@section('script')
    <script>
        function showToast(status = 'success', message) {
            iziToast[status]({
                title: status == 'success' ? 'Success' : (status == 'warning' ? 'Warning' : 'Error'),
                message: message,
                position: 'topRight',
                close: true, // Tombol close
            });
        }

        @if (session('success'))
            showToast("success", "{{ session('success') }}");
        @endif
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
