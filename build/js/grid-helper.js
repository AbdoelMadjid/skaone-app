// Fungsi untuk inisialisasi Grid.js dengan pagination fleksibel
function initGrid(columns, data, containerId, paginationLimit = 36) {
    const container = document.getElementById(containerId);

    // Tampilkan spinner sebelum data dimuat
    //document.getElementById('loading-spinner').style.display = 'block';
    container.style.display = 'none'; // Sembunyikan kontainer sampai data siap

    // Delay untuk simulasi pemuatan data (misalnya jika data besar)
    setTimeout(() => {
        new gridjs.Grid({
            columns: columns,
            data: data,
            pagination: data.length > paginationLimit ? { limit: paginationLimit } : false,
            search: true,
            sort: true,
            resizable: true
        }).render(container);

        // Sembunyikan spinner dan tampilkan tabel setelah rendering selesai
        document.getElementById('loading-spinner').style.display = 'none';
        document.getElementById('loading-spinner-2').style.display = 'none';
        container.style.display = 'block';
    }, 500); // Simulasi delay pemuatan (500ms)
}
