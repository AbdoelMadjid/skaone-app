@extends('layouts.master')
@section('title')
    @lang('translation.sumatif')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.penilaian')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Edit Nilai @yield('title') - {{ $fullName }}</h5>
                    <div>
                        <button id="hapusdata" class="btn btn-soft-danger" data-kode-rombel="{{ $data->kode_rombel }}"
                            data-kel-mapel="{{ $data->kel_mapel }}" data-id-personil="{{ $data->id_personil }}">
                            <i class="ri-delete-bin-2-line"></i>
                        </button>
                        <a class="btn btn-soft-info" href="{{ route('gurumapel.penilaian.formatif.index') }}">Kembali</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('pages.gurumapel.ident-kbm')
                        <div class="col-xl-6 col-md-6">
                            <!-- Rounded Ribbon -->
                            <div class="card ribbon-box border shadow-none mb-lg-3">
                                <div class="card-body">
                                    <div class="ribbon ribbon-primary round-shape">Tujuan Pembelajaran</div>
                                    <h5 class="fs-14 text-end"></h5>
                                    <div class="ribbon-content mt-5 text-muted">
                                        <table>
                                            @foreach ($tujuanPembelajaran as $index => $tp)
                                                <tr>
                                                    <td valign="top" width='25px'>{{ $index + 1 }}.</td>
                                                    <td>{{ $tp->tp_isi }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                    <form action="{{ route('gurumapel.penilaian.sumatif.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->
                        <input type="hidden" name="kode_mapel_rombel" value="{{ $data->kode_mapel_rombel }}">
                        <input type="hidden" name="tahunajaran" value="{{ $data->tahunajaran }}">
                        <input type="hidden" name="kode_kk" value="{{ $data->kode_kk }}">
                        <input type="hidden" name="tingkat" value="{{ $data->tingkat }}">
                        <input type="hidden" name="ganjilgenap" value="{{ $data->ganjilgenap }}">
                        <input type="hidden" name="semester" value="{{ $data->semester }}">
                        <input type="hidden" name="kode_rombel" value="{{ $data->kode_rombel }}">
                        <input type="hidden" name="rombel" value="{{ $data->rombel }}">
                        <input type="hidden" name="kel_mapel" value="{{ $data->kel_mapel }}">
                        <input type="hidden" name="kode_mapel" value="{{ $data->kode_mapel }}">
                        <input type="hidden" name="mata_pelajaran" value="{{ $data->mata_pelajaran }}">
                        <input type="hidden" name="kkm" id="kkm" value="{{ $data->kkm }}">
                        <input type="hidden" name="id_personil" value="{{ $data->id_personil }}">
                        <input type="hidden" name="jml_tp" id="jml_tp" value="{{ $jumlahTP }}">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>STS</th>
                                    <th>SAS</th>
                                    <th>Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody id="selected_siswa_tbody">
                                @foreach ($pesertaDidik as $index => $siswa)
                                    <tr>
                                        <td class="bg-primary-subtle text-center">{{ $index + 1 }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama_lengkap }}</td>
                                        <td class="text-center">
                                            <input type="text" class="sts-input" name="sts[{{ $siswa->nis }}]"
                                                id="sts[{{ $siswa->nis }}]"
                                                value="{{ old('sts.' . $siswa->nis, $siswa->sts) }}"
                                                style="width: 65px; text-align: center;" />
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="sas-input" name="sas[{{ $siswa->nis }}]"
                                                id="sas[{{ $siswa->nis }}]"
                                                value="{{ old('sas.' . $siswa->nis, $siswa->sas) }}"
                                                style="width: 65px; text-align: center;" />
                                        </td>
                                        <td class="bg-primary-subtle text-center">
                                            <input type="text" class="rerata_sumatif"
                                                name="rerata_sumatif_{{ $siswa->nis }}"
                                                id="rerata_sumatif_{{ $siswa->nis }}"
                                                value="{{ number_format(($siswa->sts + $siswa->sas) / 2, 0) }}" readonly
                                                style="width: 75px; text-align: center;" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-lg-12">
                            <div class="gap-2 hstack justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('sts-input') || e.target.classList.contains('sas-input')) {
                // Ambil NIS siswa dari atribut name input
                const siswaNis = e.target.getAttribute('name').match(/\[(.*?)\]/)[1];

                // Ambil elemen input STS dan SAS
                const stsInput = document.getElementById(`sts[${siswaNis}]`);
                const sasInput = document.getElementById(`sas[${siswaNis}]`);

                // Ambil nilai KKM dari elemen dengan ID 'kkm'
                const kkm = parseFloat(document.getElementById('kkm').value) || 0;

                // Ambil nilai STS dan SAS, jika tidak valid set ke 0
                const stsValue = parseFloat(stsInput.value) || 0;
                const sasValue = parseFloat(sasInput.value) || 0;

                // Hitung rata-rata sumatif (STS + SAS) / 2
                const rerataSumatif = (stsValue + sasValue) / 2;

                // Update kolom rerata_sumatif
                const rerataSumatifInput = document.getElementById(`rerata_sumatif_${siswaNis}`);
                rerataSumatifInput.value = rerataSumatif.toFixed(0); // Format dengan 2 desimal

                // Validasi nilai STS
                if (stsValue < kkm || stsValue > 100) {
                    stsInput.style.backgroundColor = 'red';
                    stsInput.style.color = 'white';
                } else {
                    stsInput.style.backgroundColor = '';
                    stsInput.style.color = '';
                }

                // Validasi nilai SAS
                if (sasValue < kkm || sasValue > 100) {
                    sasInput.style.backgroundColor = 'red';
                    sasInput.style.color = 'white';
                } else {
                    sasInput.style.backgroundColor = '';
                    sasInput.style.color = '';
                }

                // Validasi rerata sumatif
                if (rerataSumatif < kkm || rerataSumatif > 100) {
                    rerataSumatifInput.style.backgroundColor = 'red';
                    rerataSumatifInput.style.color = 'white';
                } else {
                    rerataSumatifInput.style.backgroundColor = '';
                    rerataSumatifInput.style.color = '';
                }
            }
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif
        $(document).ready(function() {
            $('#hapusdata').on('click', function() {
                // Ambil data dari atribut data-* pada tombol
                var kodeRombel = $(this).data('kode-rombel');
                var kelMapel = $(this).data('kel-mapel');
                var idPersonil = $(this).data('id-personil');

                Swal.fire({
                    title: 'Apa Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('gurumapel.penilaian.hapusnilaisumatif') }}", // Ganti dengan route sesuai
                            type: 'POST', // Atau gunakan DELETE jika sesuai
                            data: {
                                _token: '{{ csrf_token() }}',
                                kode_rombel: kodeRombel,
                                kel_mapel: kelMapel,
                                id_personil: idPersonil
                            },
                            success: function(response) {
                                showToast('success', 'Data berhasil dihapus!');
                                // Reload tabel atau halaman jika perlu
                                window.location.href =
                                    "{{ route('gurumapel.penilaian.sumatif.index') }}";
                            },
                            error: function(xhr) {
                                showToast('error',
                                    'Terjadi kesalahan saat menghapus data!');
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
