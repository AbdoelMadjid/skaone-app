{{-- Modal Create --}}
<div class="modal fade" id="modalCreate" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('bpbk.simpanSiswaBermasalah') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa Bermasalah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        {{-- Tahun Ajaran --}}
                        <div class="col-md-6">
                            <label class="form-label">Tahun Ajaran</label>
                            <select name="tahunajaran" id="tahunajaran"
                                class="form-select @error('tahunajaran') is-invalid @enderror">
                                <option value="">-- Pilih Tahun Ajaran --</option>
                                @foreach ($tahunAjaranOptions as $th)
                                    <option value="{{ $th }}">{{ $th }}</option>
                                @endforeach
                            </select>
                            @error('tahunajaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Semester --}}
                        <div class="col-md-6">
                            <label class="form-label">Semester</label>
                            <select name="semester" id="semester"
                                class="form-select @error('tahunajaran') is-invalid @enderror">
                                <option value="">-- Pilih Semester --</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Tanggal --}}
                        <div class="col-md-6">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Nama Siswa --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Siswa</label>
                            <select name="nis" id="nis"
                                class="form-select @error('nis') is-invalid @enderror">
                                <option value="">-- Pilih Tahun Ajaran Dulu --</option>
                            </select>
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Rombel --}}
                        <div class="col-md-6">
                            <label class="form-label">Rombel</label>
                            <input type="text" name="rombel" id="rombel"
                                class="form-control @error('rombel') is-invalid @enderror" readonly>
                            @error('rombel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Jenis Kasus --}}
                        <div class="col-md-6">
                            <label class="form-label">Jenis Kasus</label>
                            <select name="jenis_kasus" id="jenis_kasus"
                                class="form-select @error('jenis_kasus') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kasus --</option>
                                @foreach ($jenisKasus as $kasus)
                                    <option value="{{ $kasus }}">{{ $kasus }}</option>
                                @endforeach
                            </select>
                            @error('jenis_kasus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
