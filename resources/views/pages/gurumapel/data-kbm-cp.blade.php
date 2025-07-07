<div class="modal fade" id="modalCapaianPembelajaran" tabindex="-1" aria-labelledby="modalCapaianPembelajaranLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCapaianPembelajaranLabel">Capaian Pembelajaran </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table" id="capaianPembelajaranTable">
                    <thead>
                        <tr>
                            <th width="150">Kode CP</th>
                            <th>Tingkat / Fase</th>
                            <th>Element</th>
                            <th>Nama Mata Pelajaran</th>
                            <th width="300">Isi CP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic content will be injected here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalElement = document.getElementById('modalCapaianPembelajaran');
        const modalTableBody = document.querySelector('#capaianPembelajaranTable tbody');

        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const inisialMp = this.querySelector('i').getAttribute('data-inisial_mp');
                const tingkat = this.querySelector('i').getAttribute('data-tingkat');

                fetchCapaianPembelajaranData(inisialMp, tingkat);
            });
        });

        function fetchCapaianPembelajaranData(inisialMp, tingkat) {
            fetch(`/gurumapel/adminguru/fetch-capaian-pembelajaran?inisial_mp=${inisialMp}&tingkat=${tingkat}`)
                .then(response => response.json())
                .then(data => {
                    modalTableBody.innerHTML = ''; // Clear previous data

                    data.forEach(row => {
                        const rowElement = `
                        <tr>
                            <td>${row.kode_cp}</td>
                            <td>${row.tingkat} / ${row.fase}</td>
                            <td>${row.element}</td>
                            <td>${row.nama_matapelajaran}</td>
                            <td>${row.nomor_urut}. ${row.isi_cp}</td>
                        </tr>
                    `;
                        modalTableBody.insertAdjacentHTML('beforeend', rowElement);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    });
</script>
