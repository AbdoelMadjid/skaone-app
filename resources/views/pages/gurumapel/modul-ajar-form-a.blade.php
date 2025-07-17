<div>
    <h5 class="mb-1">A. INFORMASI UMUM</h5>
    <p class="text-muted mb-4">Identitas Modul</p>
</div>

<div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="country" class="form-label">Jenjang</label>
                <select class="form-select" id="jenjang">
                    <option value="">Pilih jenjang...</option>
                    <option selected>SMK</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="state" class="form-label">Fase</label>
                <select class="form-select" id="fase">
                    <option value="">Pilih Fase...</option>
                    <option value="E">Fase E</option>
                    <option value="F">Fase F</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="state" class="form-label">Kelas</label>
                <select class="form-select" id="kelas" disabled>
                    <option value="">Pilih Kelas...</option>
                </select>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
            <select class="form-select" id="bidang_keahlian" disabled>
                <option value="">Pilih Bidang Keahlian...</option>
                @foreach ($bidangKeahlianList as $bk)
                    <option value="{{ $bk->idbk }}">{{ $bk->nama_bk }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <select class="form-select" id="program_keahlian" disabled>
                <option value="">Pilih Program Keahlian...</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
            <select class="form-select" id="konsentrasi_keahlian" disabled>
                <option value="">Pilih Konsentrasi Keahlian...</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <select class="form-select" id="mata_pelajaran" disabled>
                <option value="">Pilih Mata Pelajaran...</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="topik-modul" class="form-label">Topik Modul</label>
            <input type="text" class="form-control" id="topik-modul" placeholder="isi topik"
                value="ini adalah topik modul ajar, silakan di sesuaikan">
        </div>
    </div>
</div>
