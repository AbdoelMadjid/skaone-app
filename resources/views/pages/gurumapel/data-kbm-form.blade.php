<!-- Extra Large modal example -->
<div class="modal fade" id="buatMateriAjar" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('gurumapel.simpanmateriajar') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Materi Ajar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                aria-selected="false">
                                Identitas Guru Mapel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#product1" role="tab"
                                aria-selected="false">
                                Mata Pelajaran di Pilih
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab"
                                aria-selected="false">
                                Capaian Pembelajaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab"
                                aria-selected="true">
                                Isian Materi Ajar
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="selected_rombel_ids" id="selected_rombel_ids"
                                        value="">
                                    <input type="hidden" name="selected_personil_ids" id="selected_personil_ids"
                                        value="">
                                    <p><strong>Tahun Ajaran Aktif:</strong> {{ $tahunAjaran->tahunajaran }}</p>
                                    <p><strong>Semester Aktif:</strong> {{ $semester->semester }}</p>
                                    <p><strong>Nama Lengkap:</strong> {{ $fullName }}</p>
                                    <p><strong>Personal ID:</strong> {{ $personal_id }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="product1" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="selected_mapel_ids" id="selected_mapel_ids"
                                        value="">
                                    <div id="selected_mapel_list">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Kode Rombel</th>
                                                    <th>Rombel</th>
                                                    <th>Kode Mapel</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Personil Id</th>
                                                    <th>Guru Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected_mapel_tbody">
                                                <!-- Baris data kbm per rombel sesuai user yang login yang dipilih akan muncul di sini -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="selected_cp_ids" id="selected_cp_ids" value="">
                                    <div id="selected_cp_list">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="200">Kode CP</th>
                                                    <th>Element</th>
                                                    <th>Capaian Pembelajaran</th>
                                                    <th>Jumlah Materi Ajar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected_cp_tbody">
                                                <!-- Baris data capaian pembelajaran  yang dipilih akan muncul di sini -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal">
                        <i class="ri-close-line me-1 align-middle"></i> Close
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
