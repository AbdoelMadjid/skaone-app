<div class="modal-header">
    <h5 class="modal-title">Tambah Pengawas Ujian</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">
    <input type="hidden" name="kode_ujian" value="{{ $identitasUjian?->kode_ujian }}">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Kode Pengawas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personils as $p)
                <tr>
                    <td>{{ $p->id_personil }}</td>
                    <td>{{ $p->nip }}</td>
                    <td>{{ $p->gelardepan }} {{ $p->namalengkap }} {{ $p->gelarbelakang }}</td>
                    <td>
                        <input type="hidden" name="nip[{{ $p->id_personil }}]" value="{{ $p->nip }}">
                        <input type="hidden" name="nama_lengkap[{{ $p->id_personil }}]"
                            value="{{ $p->gelardepan }} {{ $p->namalengkap }} {{ $p->gelarbelakang }}">
                        <select name="kode_pengawas[{{ $p->id_personil }}]" class="form-select" id="pilihpengawas2">
                            <option value="">-- Pilih Kode --</option>
                            @for ($i = 1; $i <= 100; $i++)
                                @php
                                    $kode = str_pad($i, 2, '0', STR_PAD_LEFT);
                                    $isDisabled = in_array($kode, $pengawasTerpakai ?? []);
                                @endphp
                                <option value="{{ $kode }}" {{ $isDisabled ? 'disabled' : '' }}>
                                    {{ $kode }} {{ $isDisabled ? '(Sudah dipakai)' : '' }}
                                </option>
                            @endfor
                        </select>
                    </td>
                </tr>
            @endforeach
            {{-- Tambahan baris input manual --}}
            @for ($i = 1; $i <= 2; $i++)
                <tr>
                    <td>Manual</td>
                    <td>
                        <input type="text" name="nip[manual_{{ $i }}]" class="form-control"
                            placeholder="NIP">
                    </td>
                    <td>
                        <input type="text" name="nama_lengkap[manual_{{ $i }}]" class="form-control"
                            placeholder="Nama Lengkap">
                    </td>
                    <td>
                        <select name="kode_pengawas[manual_{{ $i }}]" class="form-select">
                            <option value="">-- Pilih Kode --</option>
                            @for ($iKode = 1; $iKode <= 100; $iKode++)
                                @php
                                    $kode = str_pad($iKode, 2, '0', STR_PAD_LEFT);
                                    $isDisabled = in_array($kode, $pengawasTerpakai ?? []);
                                @endphp
                                <option value="{{ $kode }}" {{ $isDisabled ? 'disabled' : '' }}>
                                    {{ $kode }} {{ $isDisabled ? '(Sudah dipakai)' : '' }}
                                </option>
                            @endfor
                        </select>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <x-form.modal-footer-button id=" " label="Simpan" icon="ri-save-2-fill" />
</div>
