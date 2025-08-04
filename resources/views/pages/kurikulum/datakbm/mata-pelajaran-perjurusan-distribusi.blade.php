<div class="modal fade" id="distribusiMapel" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('kurikulum.datakbm.simpandistribusi') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Distribusi Mata Pelajaran Per Rombel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"
                    style="max-height: calc(100vh - 200px); overflow-y: auto; margin-top:5px; margin-bottom:15px;">
                    <input type="hidden" name="selected_mapel_ids" id="selected_mapel_ids" value="">
                    <input type="hidden" name="id_personil" id="id_personil" value="">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="tahunajaran">Tahun Ajaran</label>
                            <select class="form-control mb-3" name="tahunajaran" id="tahunajaran" required>
                                <option value="" selected>Pilih TA</option>
                                @foreach ($tahunAjaran as $tahunajaran => $thajar)
                                    <option value="{{ $tahunajaran }}">{{ $thajar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_kk">Kompetensi Keahlian</label>
                            <select class="form-control mb-3" name="kode_kk" id="kode_kk" required>
                                <option value="" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlian as $idkk => $nama_kk)
                                    <option value="{{ $idkk }}">{{ $nama_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control mb-3" name="tingkat" id="tingkat" required>
                                <option value="" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="kode_rombel">Pilih Kode Rombel</label><br>
                            <div id="checkbox-kode-rombel"></div> {{-- value nya kode_rombel, optionsnya rombel --}}
                        </div>

                        <div class="col-md-4">
                            <label for="rombel">Pilih Rombel</label><br>
                            <div id="checkbox-rombel"></div> {{-- valuenya rombel option nya rombel --}}
                        </div>

                        <div class="col-md-4">
                            <label for="check_all">Kode Rombel dan Rombel</label><br>
                            <div class="form-check form-switch form-check-inline">
                                <input type="checkbox" id="check_all" class="form-check-input">
                                <label for="check_all" class="form-check-label">Check All</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ganjilgenap">Ganjil/Genap</label>
                            <select class="form-control mb-3" name="ganjilgenap" id="ganjilgenap" required>
                                <option value="" selected>Pilih Ganjil/Genap</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="semester">Semester</label>
                            <select class="form-control mb-3" name="semester" id="semester" required>
                                <option value="" selected>Pilih Semester</option>
                                @foreach ($angkaSemester as $semester)
                                    <option value="{{ $semester }}">{{ $semester }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="kkm">KKM</label>
                            <select class="form-control mb-3" name="kkm" id="kkm" required>
                                <option value="" selected>Pilih KKM</option>
                                @foreach ($angkaKKM as $kkm)
                                    <option value="{{ $kkm }}">{{ $kkm }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="selected_mapel_list">
                        <!-- Tabel ini akan diisi dengan data peserta didik yang dipilih -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kelompok Mapel</th>
                                    <th>Kode Mapel</th>
                                    <th>Mata Pelajaran</th> <!-- Tambahkan kolom Nama KK -->
                                </tr>
                            </thead>
                            <tbody id="selected_mapel_tbody">
                                <!-- Baris data mapel yang dipilih akan muncul di sini -->
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <x-form.modal-footer-button id="" label="Distribusikan" icon="ri-share-circle-fill" />
                </div>
            </form>
        </div>
    </div>
</div>
