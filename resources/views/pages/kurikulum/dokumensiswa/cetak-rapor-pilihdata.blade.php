                {{-- <form action="{{ route('kurikulum.dokumentsiswa.cetak-rapor.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <x-form.input name="id_personil" value="{{ $personal_id }}" label="ID Personil"
                                id="id_personil" disabled />
                        </div>
                        <div class="col-md-3">
                            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaranOptions"
                                value="{{ old('tahunajaran', isset($dataPilCR) ? $dataPilCR->tahunajaran : '') }}"
                                id="tahun_ajaran" />
                        </div>
                        <div class="col-md-3">
                            <x-form.select name="semester" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
                                value="{{ old('semester', isset($dataPilCR) ? $dataPilCR->semester : '') }}"
                                label="Semester" id="semester" />
                        </div>
                        <div class="col-md-4">
                            <x-form.select name="kode_kk" label="Kompetensi Keahlian" :options="$kompetensiKeahlianOptions"
                                value="{{ old('kode_kk', isset($dataPilCR) ? $dataPilCR->kode_kk : '') }}"
                                id="kode_kk" />
                        </div>
                        <div class="col-md-2">
                            <x-form.select name="tingkat" :options="['10' => '10', '11' => '11', '12' => '12']"
                                value="{{ old('tingkat', isset($dataPilCR) ? $dataPilCR->tingkat : '') }}"
                                label="Tingkat" id="tingkat" />
                        </div>
                        <div class="col-md-4">
                            <x-form.select name="kode_rombel" :options="$rombelOptions"
                                value="{{ old('kode_rombel', isset($dataPilCR) ? $dataPilCR->kode_rombel : '') }}"
                                label="Kode Rombel" id="kode_rombel" />
                        </div>
                        <div class="col-md-4">
                            <x-form.select name="nis" :options="$pesertadidikOptions"
                                value="{{ old('nis', isset($dataPilCR) ? $dataPilCR->nis : '') }}" label="Peserta Didik"
                                id="nis" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="gap-2 hstack justify-content-end">
                            <button type="submit" class="btn btn-soft-success">Simpan</button>
                        </div>
                    </div>
                </form> --}}

                {{-- <form action="{{ route('kurikulum.dokumentsiswa.cetak-rapor.store') }}" method="post">
                    @csrf
                    <div class="ribbon-content mt-5">
                        <input type="hidden" name="id_personil" value="{{ $personal_id }}">

                        <div class="row">
                            <div class="col-md-3">
                                <label for="tahunajaran">Tahun Ajaran</label>
                                <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                    <option value="" selected>Pilih TA</option>
                                    @foreach ($tahunAjaranOptions as $tahunajaran => $thajar)
                                        <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="semester">Semester</label>
                                <select class="form-control mb-3" name="semester" id="semester" required>
                                    <option value="" selected>Pilih Semester</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="kode_kk">Kompetensi Keahlian</label>
                                <select class="form-control mb-3" name="kode_kk" id="kode_kk" required>
                                    <option value="" selected>Pilih Kompetensi Keahlian</option>
                                    @foreach ($kompetensiKeahlianOptions as $idkk => $nama_kk)
                                        <option value="{{ $idkk }}">{{ $nama_kk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="tingkat">Tingkat</label>
                                <select class="form-control mb-3" name="tingkat" id="tingkat" required>
                                    <option value="" selected>Pilih Tingkat</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="kode_rombel">Rombongan Belajar</label>
                                <select class="form-control mb-3" name="kode_rombel" id="kode_rombel" required>
                                    <option value="" selected>Pilih Rombel</option>
                                    <!-- Data akan dimuat secara dinamis -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="kode_peserta_didik">Peserta Didik</label>
                                <select class="form-control mb-3" name="kode_peserta_didik" id="kode_peserta_didik"
                                    required>
                                    <option value="" selected>Pilih Peserta Didik</option>
                                    <!-- Data akan dimuat secara dinamis -->
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <div class="gap-2 hstack justify-content-end">
                                    <button type="submit" class="btn btn-soft-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}

                <script>
                    $(document).ready(function() {
                        $('#tahunajaran, #kode_kk, #tingkat').on('change', function() {
                            var tahunajaran = $('#tahunajaran').val();
                            var kode_kk = $('#kode_kk').val();
                            var tingkat = $('#tingkat').val();

                            if (tahunajaran && kode_kk && tingkat) {
                                $.ajax({
                                    url: "{{ route('kurikulum.dokumentsiswa.getrombeloptions') }}",
                                    type: "GET",
                                    data: {
                                        tahunajaran: tahunajaran,
                                        kode_kk: kode_kk,
                                        tingkat: tingkat
                                    },
                                    success: function(data) {
                                        $('#kode_rombel').empty();
                                        $('#kode_rombel').append(
                                            '<option value="" selected>Pilih Rombel</option>');
                                        $.each(data, function(index, item) {
                                            $('#kode_rombel').append('<option value="' + item
                                                .kode_rombel + '">' + item.rombel + '</option>');
                                        });
                                    }
                                });
                            } else {
                                $('#kode_rombel').empty();
                                $('#kode_rombel').append('<option value="" selected>Pilih Rombel</option>');
                            }
                        });
                    });
                </script>
