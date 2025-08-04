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
            <h5 class="card-title mb-0 flex-grow-1">Tambah Nilai @yield('title') - {{ $fullName }}</h5>
            <div>
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
            <form action="{{ route('gurumapel.penilaian.sumatif.store') }}" method="post">
                @csrf
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
                                        id="sts[{{ $siswa->nis }}]" value=""
                                        style="width: 65px; text-align: center;" />
                                </td>
                                <td class="text-center">
                                    <input type="text" class="sas-input" name="sas[{{ $siswa->nis }}]"
                                        id="sas[{{ $siswa->nis }}]" value=""
                                        style="width: 65px; text-align: center;" />
                                </td>
                                <td class="bg-primary-subtle text-center">
                                    <input type="text" class="rerata_sumatif" name="rerata_sumatif_{{ $siswa->nis }}"
                                        id="rerata_sumatif_{{ $siswa->nis }}" readonly
                                        style="width: 75px; text-align: center;" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12">
                    <div class="gap-2 hstack justify-content-end">
                        <x-btn-action size="btn-md" type="submit" label="Create" icon="ri-pencil-fill" class="w-100" />
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
