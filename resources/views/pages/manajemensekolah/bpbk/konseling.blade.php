@extends('layouts.master')
@section('title')
    @lang('translation.konseling')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.bimbingan-konseling')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-0 bg-success-subtle mx-n4 mt-n4 border-top">
                <div class="px-4 mb-4">
                    <div class="row">
                        <div class="py-4">
                            <h4 class="display-6 coming-soon-text">Bimbingan dan Konseling</h4>
                            <p class="col-xxl-5 align-self-center text-primary fs-15 mt-3">Melalui layanan yang tulus dan
                                penuh kepedulian,
                                Bimbingan dan Konseling SMKN 1 Kadipaten membantu siswa menghadapi tantangan, meraih
                                prestasi, dan menjadi pribadi yang berkarakter.</p>
                            <!-- Stacks - Horizontal -->
                        </div>
                    </div>
                    <div class="row g-3">
                        @foreach ($guruBpbk as $row)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="text-center p-4 border rounded">
                                    {!! $row->avatar_tag !!}
                                    <h5 class="fs-12 mt-3 mb-2">
                                        {{ trim($row->gelardepan . ' ' . $row->namalengkap . ' ' . $row->gelarbelakang) }}
                                    </h5>
                                    <p class="text-muted fs-10 mb-0">{{ $row->nip }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#siswabermasalah" role="tab"
                            aria-selected="false">
                            <i class="ri-user-2-fill text-muted align-bottom me-1"></i> Siswa Bermasalah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#tanganimasalah" role="tab"
                            aria-selected="true">
                            <i class="ri-customer-service-2-fill text-muted align-bottom me-1"></i> Tangani Masalah
                        </a>
                    </li>
                    <li class="nav-item ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-light btn-md dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-pencil-fill align-middle me-1"></i> Input Data
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('bpbk.konseling.siswa-bermasalah.index') }}" class="dropdown-item">Siswa
                                    Bermasalah</a>
                                {{-- <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="siswabermasalah" role="tabpanel">
                        <div class="card d-lg-flex gap-1 mx-n4 mt-n1 p-1 mb-2">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <x-heading-title>Data Siswa Bermasalah</x-heading-title>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tabelSiswaBermasalah" class="display compact">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Semester</th>
                                            <th>Tanggal</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Rombel</th>
                                            <th>Jenis Kasus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswaBermasalah as $i => $row)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $row->tahunajaran }}</td>
                                                <td>{{ $row->semester }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                                                <td>{{ $row->nis }}</td>
                                                <td>{{ $row->pesertaDidik->nama_lengkap ?? '-' }}</td>
                                                <td>{{ $row->rombel }}</td>
                                                <td>{{ $row->jenis_kasus }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tanganimasalah" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                ini tag tangani masalah
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {
            $('#tabelSiswaBermasalah').DataTable({
                responsive: true,
                columnDefs: [{
                        className: "text-center",
                        targets: [0, 1, 2, 3, 4, 6] // rata tengah
                    },
                    {
                        searchable: false,
                        targets: [0, 1, 2, 3, 4, 6,
                            7
                        ] // hanya kolom index 5 (nama_lengkap) yang searchable
                    }
                ],
                lengthMenu: [10, 25, 50, 100, 150],
                language: {
                    searchPlaceholder: 'Type search here'
                },
                pageLength: 50,
                paging: false,
                scrollY: 400,
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
