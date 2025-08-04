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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">Edit Nilai @yield('title') - {{ $fullName }}</h5>
            <div>
                <button id="hapusdata" class="btn btn-soft-danger btn-sm" data-kode-rombel="{{ $data->kode_rombel }}"
                    data-kel-mapel="{{ $data->kel_mapel }}" data-id-personil="{{ $data->id_personil }}"
                    data-tahunajaran="{{ $data->tahunajaran }}" data-ganjilgenap="{{ $data->ganjilgenap }}">
                    <i class="ri-delete-bin-2-line"></i>
                </button>
                <x-btn-kembali href="{{ route('gurumapel.penilaian.sumatif.index') }}" />
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
                                        id="sts[{{ $siswa->nis }}]" value="{{ old('sts.' . $siswa->nis, $siswa->sts) }}"
                                        style="width: 65px; text-align: center;" />
                                </td>
                                <td class="text-center">
                                    <input type="text" class="sas-input" name="sas[{{ $siswa->nis }}]"
                                        id="sas[{{ $siswa->nis }}]" value="{{ old('sas.' . $siswa->nis, $siswa->sas) }}"
                                        style="width: 65px; text-align: center;" />
                                </td>
                                <td class="bg-primary-subtle text-center">
                                    <input type="text" class="rerata_sumatif" name="rerata_sumatif_{{ $siswa->nis }}"
                                        id="rerata_sumatif_{{ $siswa->nis }}"
                                        value="{{ number_format((intval($siswa->sts) + intval($siswa->sas)) / 2, 0) }}"
                                        readonly style="width: 75px; text-align: center;" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12">
                    <div class="gap-2 hstack justify-content-end">
                        <x-btn-action size="btn-md" type="submit" label="Update" icon="ri-save-2-fill" class="w-100" />
                    </div>
                </div>
            </form>
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
                if (stsInput.value.trim() === "" || isNaN(stsValue)) {
                    // Jika nilai STS kosong atau NaN
                    stsInput.style.backgroundColor = 'yellow';
                    stsInput.style.color = 'black';
                } else if (stsValue < kkm || stsValue > 100) {
                    // Jika nilai STS kurang dari KKM atau lebih dari 100
                    stsInput.style.backgroundColor = 'red';
                    stsInput.style.color = 'white';
                } else {
                    // Jika nilai STS valid
                    stsInput.style.backgroundColor = '';
                    stsInput.style.color = '';
                }

                // Validasi nilai SAS
                if (sasInput.value.trim() === "" || isNaN(sasValue)) {
                    // Jika nilai SAS kosong atau NaN
                    sasInput.style.backgroundColor = 'yellow';
                    sasInput.style.color = 'black';
                } else if (sasValue < kkm || sasValue > 100) {
                    // Jika nilai SAS kurang dari KKM atau lebih dari 100
                    sasInput.style.backgroundColor = 'red';
                    sasInput.style.color = 'white';
                } else {
                    // Jika nilai SAS valid
                    sasInput.style.backgroundColor = '';
                    sasInput.style.color = '';
                }

                // Validasi rerata sumatif
                if (rerataSumatifInput.value.trim() === "" || isNaN(rerataSumatif)) {
                    // Jika rerata sumatif kosong atau NaN
                    rerataSumatifInput.style.backgroundColor = 'yellow';
                    rerataSumatifInput.style.color = 'black';
                } else if (rerataSumatif < kkm || rerataSumatif > 100) {
                    // Jika rerata sumatif kurang dari KKM atau lebih dari 100
                    rerataSumatifInput.style.backgroundColor = 'red';
                    rerataSumatifInput.style.color = 'white';
                } else {
                    // Jika rerata sumatif valid
                    rerataSumatifInput.style.backgroundColor = '';
                    rerataSumatifInput.style.color = '';
                }
            }
        });

        // Fungsi untuk memvalidasi nilai awal pada halaman
        function validateInputs() {
            // Ambil nilai KKM dari elemen dengan ID 'kkm'
            const kkm = parseFloat(document.getElementById('kkm').value) || 0;

            // Ambil semua input dengan kelas 'sts-input' dan 'sas-input'
            const stsInputs = document.querySelectorAll('.sts-input');
            const sasInputs = document.querySelectorAll('.sas-input');

            stsInputs.forEach(stsInput => {
                // Ambil NIS siswa dari atribut name input
                const siswaNis = stsInput.getAttribute('name').match(/\[(.*?)\]/)[1];
                const sasInput = document.getElementById(`sas[${siswaNis}]`);
                const rerataSumatifInput = document.getElementById(`rerata_sumatif_${siswaNis}`);

                // Ambil nilai STS, SAS, dan rerata sumatif langsung dari input
                const stsValue = parseFloat(stsInput.value) || 0;
                const sasValue = parseFloat(sasInput.value) || 0;
                const rerataSumatif = parseFloat(rerataSumatifInput.value) || 0; // Nilai dari database

                // Validasi nilai STS
                if (stsInput.value.trim() === "" || isNaN(stsValue)) {
                    // Jika nilai STS kosong atau NaN
                    stsInput.style.backgroundColor = 'yellow';
                    stsInput.style.color = 'black';
                } else if (stsValue < kkm || stsValue > 100) {
                    // Jika nilai STS kurang dari KKM atau lebih dari 100
                    stsInput.style.backgroundColor = 'red';
                    stsInput.style.color = 'white';
                } else {
                    // Jika nilai STS valid
                    stsInput.style.backgroundColor = '';
                    stsInput.style.color = '';
                }

                // Validasi nilai SAS
                if (sasInput.value.trim() === "" || isNaN(sasValue)) {
                    // Jika nilai SAS kosong atau NaN
                    sasInput.style.backgroundColor = 'yellow';
                    sasInput.style.color = 'black';
                } else if (sasValue < kkm || sasValue > 100) {
                    // Jika nilai SAS kurang dari KKM atau lebih dari 100
                    sasInput.style.backgroundColor = 'red';
                    sasInput.style.color = 'white';
                } else {
                    // Jika nilai SAS valid
                    sasInput.style.backgroundColor = '';
                    sasInput.style.color = '';
                }

                // Validasi rerata sumatif
                if (rerataSumatifInput.value.trim() === "" || isNaN(rerataSumatif)) {
                    // Jika rerata sumatif kosong atau NaN
                    rerataSumatifInput.style.backgroundColor = 'yellow';
                    rerataSumatifInput.style.color = 'black';
                } else if (rerataSumatif < kkm || rerataSumatif > 100) {
                    // Jika rerata sumatif kurang dari KKM atau lebih dari 100
                    rerataSumatifInput.style.backgroundColor = 'red';
                    rerataSumatifInput.style.color = 'white';
                } else {
                    // Jika rerata sumatif valid
                    rerataSumatifInput.style.backgroundColor = '';
                    rerataSumatifInput.style.color = '';
                }
            });
        }

        // Jalankan validasi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', validateInputs);
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
                var thnAjaran = $(this).data('tahunajaran');
                var ganjilGenap = $(this).data('ganjilgenap');

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
                                id_personil: idPersonil,
                                tahunajaran: thnAjaran,
                                ganjilgenap: ganjilGenap
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
