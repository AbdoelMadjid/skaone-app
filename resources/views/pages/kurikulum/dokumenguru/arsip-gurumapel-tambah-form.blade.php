<div class="modal fade" id="tambahPilihArsipGuru" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('kurikulum.dokumenguru.simpanpilihguru') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Tambah Pilih Arsip Walas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <x-form.select name="id_personil" label="Personil" :options="$personilSekolah" value=""
                                id="id_personil" />
                        </div>
                        <div class="col-md-3">
                            <x-form.select name="tahunajaran" label="Tahun Ajaran" :options="$tahunAjaran"
                                value="{{ old('tahunajaran', $dataPilGuru->tahunajaran) }}" id="tahun_ajaran" />
                        </div>
                        <div class="col-md-3">
                            <x-form.select name="ganjilgenap" :options="['Ganjil' => 'Ganjil', 'Genap' => 'Genap']"
                                value="{{ old('ganjilgenap', $dataPilGuru->ganjilgenap) }}" label="Ganjil Genap"
                                id="ganjilgenap" />
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="id_guru" class="form-label">Pilih Guru</label>
                                <select class="form-control select2 mb-3" name="id_guru" id="id_guru" required>
                                    <option value="">Pilih Guru</option>
                                    @foreach ($daftarGuru as $guru)
                                        @php
                                            $namaLengkap = trim(
                                                "{$guru->gelardepan} {$guru->namalengkap} {$guru->gelarbelakang}",
                                            );
                                        @endphp
                                        <option value="{{ $guru->id_personil }}"
                                            {{ $guru->id_personil == $selectedGuru ? 'selected' : '' }}>
                                            {{ $namaLengkap }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button id=" " label="Simpan" icon="ri-save-2-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
