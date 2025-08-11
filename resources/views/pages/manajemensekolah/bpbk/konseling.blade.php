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
                    <div class="row">
                        <div class="col-xxl-5 align-self-center">
                            <div class="py-4">
                                <h4 class="display-6 coming-soon-text">Bimbingan dan Konseling</h4>
                                <p class="text-success fs-15 mt-3">Melalui layanan yang tulus dan penuh kepedulian,
                                    Bimbingan dan Konseling SMKN 1 Kadipaten membantu siswa menghadapi tantangan, meraih
                                    prestasi, dan menjadi pribadi yang berkarakter.</p>
                                <!-- Stacks - Horizontal -->
                            </div>
                        </div>
                        <div class="col-xxl-3 ms-auto">
                            <div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
                                <img src="{{ URL::asset('build/images/faq-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
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
                            <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-pencil-fill align-middle me-1"></i> Input Data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item"
                                        href="{{ route('bpbk.konseling.siswa-bermasalah.create') }}">Siswa
                                        Bermasalah</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Tangani Masalah</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Comming Soon</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="siswabermasalah" role="tabpanel">
                        <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <x-heading-title>Data Siswa Bermasalah</x-heading-title>
                                    <div class="flex-shrink-0">
                                        <x-btn-tambah dinamisBtn="true" can="create bpbk/konseling/siswa-bermasalah"
                                            route="bpbk.konseling.siswa-bermasalah.create" />
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 280px);">
                                    <table id="tabelSiswaBermasalah" class="table table-bordered table-striped">
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
                                                <th>Aksi</th>
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
                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                                data-bs-trigger="hover" data-bs-placement="top"
                                                                title="Edit">
                                                                <a href="{{ route('bpbk.konseling.siswa-bermasalah.edit', $row->id) }}"
                                                                    class="text-primary d-inline-block">
                                                                    <i class="ri-pencil-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                data-bs-trigger="hover" data-bs-placement="top"
                                                                title="Hapus">
                                                                <a href="javascript:void(0)"
                                                                    class="text-danger d-inline-block btn-hapus"
                                                                    data-id="{{ $row->id }}">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tanganimasalah" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                ini tag tangani masalah
                            </div>
                        </div>
                    </div><!--end tab-pane-->
                </div><!--end tab-content-->

            </div><!--end card-body-->
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script>
        $(function() {
            $('#tabelSiswaBermasalah').DataTable({
                responsive: true,
                columnDefs: [{
                        className: "text-center",
                        targets: [0, 1, 2, 3, 4, 6, 8] // rata tengah
                    },
                    {
                        searchable: false,
                        targets: [0, 1, 2, 3, 4, 6, 7,
                            8
                        ] // hanya kolom index 5 (nama_lengkap) yang searchable
                    }
                ]
            });
        });
    </script>
    <script>
        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ route('bpbk.konseling.siswa-bermasalah.destroy', ':id') }}".replace(':id', id);

            Swal.fire({
                title: 'Yakin hapus data ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // bikin form delete on the fly
                    let form = $('<form>', {
                        'method': 'POST',
                        'action': url
                    }).append('@csrf', '@method('DELETE')');

                    $('body').append(form);
                    form.submit();
                }
            });
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
