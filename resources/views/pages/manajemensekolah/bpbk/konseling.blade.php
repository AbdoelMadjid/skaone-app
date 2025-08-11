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
                                        <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                                            data-bs-target="#modalCreate">
                                            <i class="ri-add-fill"></i> Tambah Siswa Bermasalah
                                        </button>
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
                                                    <td class="text-center">
                                                        <a href="#" class="text-primary"><i
                                                                class="ri-pencil-fill"></i></a>
                                                        <a href="#" class="text-danger"><i
                                                                class="ri-delete-bin-5-fill"></i></a>
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
    @include('pages.manajemensekolah.bpbk._create_siswabermasalah')
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
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
        $(document).ready(function() {

            $('#modalCreate').on('shown.bs.modal', function() {
                $('#nis').select2({
                    dropdownParent: $('#modalCreate'),
                    width: '100%',
                });
            });


            $('#modalCreate form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    success: function(res) {
                        // Sukses — tutup modal
                        $('#modalCreate').modal('hide');
                        // Refresh data table atau lainnya
                    },
                    error: function(err) {
                        if (err.status === 422) {
                            let errors = err.responseJSON.errors;

                            $.each(errors, function(key, value) {
                                let el = $('[name="' + key + '"]', form);
                                el.addClass('is-invalid');

                                if (el.hasClass("select2-hidden-accessible")) {
                                    // Kalau elemen adalah Select2, taruh pesan setelah container-nya
                                    el.next('.select2').after(
                                        '<div class="invalid-feedback d-block">' +
                                        value[0] + '</div>');
                                } else {
                                    el.after('<div class="invalid-feedback">' + value[
                                        0] + '</div>');
                                }
                            });
                        }
                    }
                });
            });





            $('#tahunajaran').on('change', function() {
                let tahun = $(this).val();
                $('#nis').empty().append('<option value="">-- Pilih Siswa --</option>');
                $('#rombel').val('');

                if (tahun) {
                    $.ajax({
                        url: "{{ route('bpbk.getSiswaByTahun') }}",
                        type: "GET",
                        data: {
                            tahunajaran: tahun
                        },
                        success: function(res) {
                            if (res.length > 0) {
                                res.forEach(function(item) {
                                    $('#nis').append(
                                        `<option value="${item.nis}">${item.nama_lengkap}</option>`
                                    );
                                });
                                // refresh select2 setelah opsi diubah
                                $('#nis').trigger('change.select2');
                            }
                        }
                    });
                } else {
                    // reset select2 jika tahunajaran kosong
                    $('#nis').trigger('change.select2');
                }
            });

            // Saat NIS dipilih, ambil rombel otomatis
            $('#nis').on('change', function() {
                let nis = $(this).val();
                let tahun = $('#tahunajaran').val();

                if (nis && tahun) {
                    $.ajax({
                        url: "{{ route('bpbk.getRombelByNis') }}",
                        type: "GET",
                        data: {
                            nis: nis,
                            tahunajaran: tahun
                        },
                        success: function(res) {
                            $('#rombel').val(res.rombel ?? '');
                        }
                    });
                } else {
                    $('#rombel').val('');
                }
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
