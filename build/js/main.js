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

function handleDataTableEvents(tableId) {
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
                text: 'Silakan untuk ditambahkan terlebih dahulu.',
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


