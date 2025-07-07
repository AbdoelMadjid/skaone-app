$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name=csrf_token]').attr('content')
    }
})

showLoading()
$(document).ready(function() {
    showLoading(false)
})

function handleAction(datatable, onShowAction, OnSuccessAction) {
    $('.main-content').on('click', '.action', function(e) {
        e.preventDefault()
        handleAjax(this.href)
        .onSuccess(function(res) {
            onShowAction && onShowAction(res)
            handleFormSubmit('#form_action')
            .setDataTable(datatable)
            .onSuccess(function(res) {
                OnSuccessAction && OnSuccessAction(res)
            })
            .init();
        }).execute()
    })
}

function select2Init() {
    $('.select2').select2({
        dropdownParent: $('.select2').parents('.modal-content'),
        theme: 'bootstrap-5',
        allowClear: true,
    })
    /* $('.js-example-basic-multiple').select2(); */
}

function handleDelete(datatable, onSuccessAction) {
    $('#' + datatable).on('click', '.delete', function(e) {
        e.preventDefault()
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                handleAjax(this.href, 'delete')
                .onSuccess(function(res) {
                    onSuccessAction && onSuccessAction(res)
                    showToast(res.status, res.message)
                    window.LaravelDataTables[datatable].ajax.reload(null, false)
                }, false).execute()

            }
        })

    })
}

function showToast(status = 'success', message) {
    iziToast[status]({
        title: status == 'success' ? 'Success' : (status == 'warning' ? 'Warning' : 'Error'),
        message: message,
        position: 'topRight'
    });
}

function showLoading(show = true) {
    const preloader = $(".preloader");

    if (show) {
        preloader.css({
            opacity: 1,
            visibility: "visible",
        });
    } else {
        preloader.css({
            opacity: 0,
            visibility: "hidden",
        });
    }
}

function submitLoader(formId = '#form_action') {
    const button = $(formId).find('button[type="submit"]');

    function show() {
        button.addClass("btn-load")
            .attr("disabled", true)
            .html(
                `<span class="d-flex align-items-center"><span class="flex-shrink-0 spinner-border"></span><span class="flex-grow-1 ms-2"> Loading...</span></span>`
            );
    }

    function hide(text = "Save") {
        button.removeClass("btn-load").removeAttr("disabled").text(text);
    }

    return {
        show,
        hide,
    };
}

function handleFormSubmit(selector = '#form_action') {
    function init() {
        const _this = this
        $(selector).on('submit', function(e) {
            e.preventDefault()
            const _form = this
            $.ajax({
                url: this.action,
                method: this.method,
                data: new FormData(_form),
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(_form).find('.is-invalid').removeClass('is-invalid')
                    $(_form).find('.invalid-feedback').remove()
                    submitLoader().show()
                },
                success: (res) =>  {
                    if (_this.runDefaultSuccessCallback) {
                        $('#modal_action').modal('hide')
                        showToast(res.status, res.message)
                    }

                    _this.onSuccessCallback && _this.onSuccessCallback(res)
                    _this.dataTableId && window.LaravelDataTables[_this.dataTableId].ajax.reload(null, false)
                },
                complete: function() {
                    submitLoader().hide()
                },
                error: function(err) {
                    const errors = err.responseJSON?.errors

                    if (errors) {
                        for (let [key, message] of Object.entries(errors)) {
                            $(`[name=${key}]`).addClass('is-invalid')
                            .parent()
                            .append(`<div class="invalid-feedback">${message}</div>`)
                        }
                    }

                    showToast('error', err.responseJSON?.message)
                }
            })
        })

    }

    function onSuccess(cb, runDefault = true) {
        this.onSuccessCallback = cb
        this.runDefaultSuccessCallback = runDefault
        return this
    }

    function setDataTable(id) {
        this.dataTableId = id
        return this
    }

    return {
        init,
        runDefaultSuccessCallback: true,
        onSuccess,
        setDataTable
    }
}

function handleAjax(url, method = 'get'){
    function onSuccess(cb, runDefault = true) {
        this.onSuccessCallback = cb
        this.runDefaultSuccessCallback = runDefault
        return this
    }

    function execute() {
        $.ajax({
            url,
            method,
            beforeSend: function() {
                showLoading()
            },
            complete: function() {
                showLoading(false)
            },
            success: (res) => {
                if (this.runDefaultSuccessCallback) {
                    const modal = $('#modal_action')
                    modal.html(res)
                    modal.modal('show')
                }

                this.onSuccessCallback && this.onSuccessCallback(res)

            },
            error: function(err) {
                console.log(err);
            }
        })
    }

    function onError(cb) {
        this.onErrorCallback = cb
        return this
    }

    return {
        execute,
        onSuccess,
        runDefaultSuccessCallback: true
    }
}

function handleDataTableEvents(tableId, emptyMessage = 'Silakan untuk ditambahkan terlebih dahulu.') {
    $.fn.dataTable.ext.errMode = 'none'; // Disable default error alert

    $('#' + tableId).on('error.dt', function(e, settings, techNote, message) {
        console.log('An error has been reported by DataTables: ', message);

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan dalam memuat data.',
            footer: '<div class="text-info fs-6"><a href="https://github.com/AbdoelMadjid" target="blank">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</a></div>'
        });
    });

    $('#' + tableId).on('draw.dt', function() {
        const table = $('#' + tableId).DataTable();
        if (table.data().count() === 0) {
            const pageTitle = 'Data ' + document.title +
                ' <br><h2 class="mt-4 text-danger">Masih Kosong</h2>';
            Swal.fire({
                icon: 'info',
                title: pageTitle,
                text: emptyMessage,
                footer: '<div class="text-info fs-6"><a href="https://github.com/AbdoelMadjid" target="blank">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</a></div>'
            });
        }
    });
}


// Fungsi untuk memeriksa session dan menampilkan notifikasi
function checkSessionAndShowToast() {
    const sessionElement = document.getElementById('session-message');

    if (sessionElement) {
        // Ambil data dari elemen session
        const message = sessionElement.getAttribute('data-message');
        const status = sessionElement.getAttribute('data-status') || 'success'; // Default status is 'success'

        // Tampilkan notifikasi menggunakan iziToast
        showToast(status, message);
    }
}


function initializeDynamicPagination(tableId, rowsPerPage = 10, maxVisiblePages = 3) {
    const table = $(`#${tableId}`);
    const tableBody = table.find("tbody");
    const rows = tableBody.find("tr");
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    // Tambahkan elemen pagination di bawah tabel
    const paginationId = `${tableId}-pagination`;
    table.after(`<nav><ul id="${paginationId}" class="pagination justify-content-center"></ul></nav>`);
    const pagination = $(`#${paginationId}`);

    // Fungsi untuk menampilkan baris berdasarkan halaman
    function showPage(page) {
        rows.hide(); // Sembunyikan semua baris
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.slice(start, end).show(); // Tampilkan baris yang sesuai
    }

    // Fungsi untuk membuat kontrol paginasi
    function createPagination(currentPage) {
        pagination.empty(); // Hapus paginasi sebelumnya

        // Tombol "Halaman Awal"
        pagination.append(`
<li class="page-item${currentPage === 1 ? ' disabled' : ''}">
    <a class="page-link" href="#" data-page="1" aria-label="First">
        <i class="mdi mdi-chevron-double-left"></i>
    </a>
</li>
`);

        // Tombol "Previous"
        pagination.append(`
<li class="page-item${currentPage === 1 ? ' disabled' : ''}">
    <a class="page-link" href="#" aria-label="Previous">
        <i class="mdi mdi-chevron-left"></i>
    </a>
</li>
`);

        // Tambahkan nomor halaman
        let startPage = Math.max(currentPage - Math.floor(maxVisiblePages / 2), 1);
        let endPage = Math.min(startPage + maxVisiblePages - 1, totalPages);

        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(endPage - maxVisiblePages + 1, 1);
        }

        // Tambahkan "..." sebelum halaman jika diperlukan
        if (startPage > 1) {
            pagination.append(`<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`);
            if (startPage > 2) {
                pagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
            }
        }

        // Tambahkan nomor halaman
        for (let i = startPage; i <= endPage; i++) {
            pagination.append(`
    <li class="page-item${i === currentPage ? ' active' : ''}">
        <a class="page-link" href="#" data-page="${i}">${i}</a>
    </li>
`);
        }

        // Tambahkan "..." setelah halaman jika diperlukan
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                pagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
            }
            pagination.append(
                `<li class="page-item"><a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a></li>`
            );
        }

        // Tombol "Next"
        pagination.append(`
<li class="page-item${currentPage === totalPages ? ' disabled' : ''}">
    <a class="page-link" href="#" aria-label="Next">
        <i class="mdi mdi-chevron-right"></i>
    </a>
</li>
`);

        // Tombol "Halaman Akhir"
        pagination.append(`
<li class="page-item${currentPage === totalPages ? ' disabled' : ''}">
    <a class="page-link" href="#" data-page="${totalPages}" aria-label="Last">
        <i class="mdi mdi-chevron-double-right"></i>
    </a>
</li>
`);
    }

    // Event klik untuk navigasi halaman
    pagination.on("click", ".page-link", function(e) {
        e.preventDefault();
        const pageItem = $(this).closest("li");

        if (pageItem.hasClass("disabled") || pageItem.hasClass("active")) {
            return;
        }

        let currentPage = pagination.find("li.active a").data("page");
        if ($(this).attr("aria-label") === "Previous") {
            currentPage -= 1;
        } else if ($(this).attr("aria-label") === "Next") {
            currentPage += 1;
        } else if ($(this).attr("aria-label") === "First") {
            currentPage = 1;
        } else if ($(this).attr("aria-label") === "Last") {
            currentPage = totalPages;
        } else {
            currentPage = parseInt($(this).data("page"));
        }

        // Perbarui tampilan tabel dan paginasi
        showPage(currentPage);
        createPagination(currentPage);
    });

    // Inisialisasi pertama
    if (totalRows > 0) {
        showPage(1);
        createPagination(1);
    }
}

window.ScrollDinamicDataTable = function (tableId) {
    function adjustScrollYDynamic() {
        const wrapper = document.getElementById('datatable-wrapper');
        const scrollBody = document.querySelector('.dataTables_scrollBody');
        const $table = $('#' + tableId);

        if (!$.fn.DataTable.isDataTable($table)) return;

        const table = $table.DataTable();

        if (wrapper && scrollBody && table) {
            const wrapperHeight = wrapper.offsetHeight;

            // Deteksi elemen-elemen DOM untuk menentukan offset dinamis
            let scrollOffset = 64; // default offset (footer saja)
            if (document.querySelector('.dataTables_filter')) scrollOffset += 40;
            if (document.querySelector('.dataTables_length')) scrollOffset += 40;

            if (typeof scrollOffsetOverride !== 'undefined') {
                scrollOffset = scrollOffsetOverride;
            }

            const scrollHeight = wrapperHeight - scrollOffset;

            scrollBody.style.maxHeight = scrollHeight + 'px';
            scrollBody.style.height = scrollHeight + 'px';

            table.settings()[0].oScroll.sY = scrollHeight + 'px';
            table.fixedHeader?.adjust();
        }
    }

    $('#' + tableId).on('draw.dt', adjustScrollYDynamic);
    window.addEventListener('resize', adjustScrollYDynamic);

    document.addEventListener('DOMContentLoaded', function () {
        adjustScrollYDynamic();
    });
};


window.ScrollStaticTable = function(wrapperId = 'custom-table-wrapper', scrollId = 'custom-scroll-container', offset = 56) {
    function adjustTableScrollHeight() {
        const wrapper = document.getElementById(wrapperId);
        const scrollContainer = document.getElementById(scrollId);

        if (wrapper && scrollContainer) {
            const availableHeight = wrapper.offsetHeight - offset;
            scrollContainer.style.maxHeight = availableHeight + 'px';
            scrollContainer.style.height = availableHeight + 'px';
        }
    }

    window.addEventListener('resize', adjustTableScrollHeight);
    document.addEventListener('DOMContentLoaded', adjustTableScrollHeight);
};

function showSessionSwal() {
    const items = document.querySelectorAll('.swal-session');

    items.forEach(item => {
        const status = item.dataset.status || 'info';
        const message = item.dataset.message || 'Tidak ada pesan';

        const config = {
            error: {
                title: 'Oops...!',
                icon: 'https://cdn.lordicon.com/tdrtiskw.json',
                buttonClass: 'btn btn-danger',
                buttonText: 'Tutup'
            },
            success: {
                title: 'Berhasil!',
                icon: 'https://cdn.lordicon.com/rhmbrqqg.json',
                buttonClass: 'btn btn-success',
                buttonText: 'Lanjut'
            },
            warning: {
                title: 'Peringatan!',
                icon: 'https://cdn.lordicon.com/tdrtiskw.json',
                buttonClass: 'btn btn-warning',
                buttonText: 'Mengerti'
            },
            info: {
                title: 'Informasi',
                icon: 'https://cdn.lordicon.com/tdrtiskw.json',
                buttonClass: 'btn btn-info',
                buttonText: 'Oke'
            }
        };

        const alert = config[status] || config.info;

        Swal.fire({
            html: `
                <div class="mt-3">
                    <lord-icon
                        src="${alert.icon}"
                        trigger="loop"
                        colors="primary:#f06548,secondary:#f7b84b"
                        style="width:120px;height:120px">
                    </lord-icon>
                    <div class="mt-4 pt-2 fs-15">
                        <h4>${alert.title}</h4>
                        <div class="text-muted">${item.dataset.message}</div>
                    </div>
                </div>`,
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonClass: `${alert.buttonClass} w-xs mb-1`,
            cancelButtonText: alert.buttonText,
            buttonsStyling: true,
            showCloseButton: true
        });
    });
}


