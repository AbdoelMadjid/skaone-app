@extends('layouts.master')
@section('title')
    Agenda Kegiatan (Event)
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .fc-day-sun {
            background-color: rgb(255, 213, 213) !important;
        }

        .fc-day-sat {
            background-color: rgb(225, 240, 255) !important;
        }

        .fc-event-title {
            white-space: normal !important;
            /* Memastikan teks judul membungkus */
            overflow: visible !important;
            /* Menghindari overflow tersembunyi */
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.about')
        @endslot
    @endcomponent
    <div class="row">
        <div class="row">
            <div class="col-xl-8 col-md-8">
                <div class="card ribbon-box border shadow-none mb-lg-4">
                    <div class="card-body">
                        <div class="ribbon ribbon-info round-shape">Kalendar Pendidikan</div>
                        <div class="ribbon-content mt-5 text-muted">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card ribbon-box border shadow-none mb-lg-4">
                    <div class="card-body">
                        <div class="ribbon ribbon-info round-shape">List Event</div>
                        <div class="ribbon-content mt-5 text-muted">
                            <table class="table table-striped" id="event-list-table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Tanggal</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Event rows will be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <div id="modal-action-calendar" class="modal" tabindex="-1">

    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const modal = $('#modal-action-calendar')
        const csrfToken = $('meta[name=csrf_token]').attr('content')

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                events: `{{ route('about.events.list') }}`,
                editable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                views: {
                    dayGridMonth: {
                        buttonText: 'Month'
                    },
                    timeGridWeek: {
                        buttonText: 'Week'
                    },
                    timeGridDay: {
                        buttonText: 'Day'
                    },
                    listMonth: {
                        buttonText: 'List'
                    }
                },
                dateClick: function(info) {
                    $.ajax({
                        url: `{{ route('about.events.create') }}`,
                        data: {
                            start_date: info.dateStr,
                            end_date: info.dateStr
                        },
                        success: function(res) {
                            modal.html(res).modal('show')
                            $('.datepicker').datepicker({
                                todayHighlight: true,
                                format: 'yyyy-mm-dd'
                            });

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault()
                                const form = this
                                const formData = new FormData(form)
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide')
                                        calendar.refetchEvents()
                                        updateEventList(calendar
                                            .getEvents());
                                    },
                                    error: function(res) {

                                    }
                                })
                            })
                        }
                    })
                },
                eventClick: function({
                    event
                }) {
                    $.ajax({
                        url: `{{ url('about/events') }}/${event.id}/edit`,
                        success: function(res) {
                            modal.html(res).modal('show')

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault()
                                const form = this
                                const formData = new FormData(form)
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide')
                                        calendar.refetchEvents()
                                        updateEventList(calendar
                                            .getEvents());
                                    }
                                })
                            })
                        }
                    })
                },
                eventDrop: function(info) {
                    const event = info.event
                    $.ajax({
                        url: `{{ url('about/events') }}/${event.id}`,
                        method: 'put',
                        data: {
                            id: event.id,
                            start_date: event.startStr,
                            end_date: event.end.toISOString().substring(0, 10),
                            title: event.title,
                            category: event.extendedProps.category
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            accept: 'application/json'
                        },
                        success: function(res) {
                            iziToast.success({
                                title: 'Success',
                                message: res.message,
                                position: 'topRight'
                            });
                            updateEventList(calendar.getEvents());
                        },
                        error: function(res) {
                            const message = res.responseJSON.message
                            info.revert()
                            iziToast.error({
                                title: 'Error',
                                message: message ?? 'Something wrong',
                                position: 'topRight'
                            });
                        }
                    })
                },
                eventResize: function(info) {
                    const {
                        event
                    } = info
                    $.ajax({
                        url: `{{ url('about/events') }}/${event.id}`,
                        method: 'put',
                        data: {
                            id: event.id,
                            start_date: event.startStr,
                            end_date: event.end.toISOString().substring(0, 10),
                            title: event.title,
                            category: event.extendedProps.category
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            accept: 'application/json'
                        },
                        success: function(res) {
                            iziToast.success({
                                title: 'Success',
                                message: res.message,
                                position: 'topRight'
                            });
                            updateEventList(calendar.getEvents());
                        },
                        error: function(res) {
                            const message = res.responseJSON.message
                            info.revert()
                            iziToast.error({
                                title: 'Error',
                                message: message ?? 'Something wrong',
                                position: 'topRight'
                            });
                        }
                    })
                },
                dayCellDidMount: function(info) {
                    // Tambahkan kelas khusus untuk hari Minggu
                    if (info.date.getUTCDay() === 0) {
                        info.el.classList.add('fc-day-sun');
                    }
                },
                eventDidMount: function(info) {
                    // Update the event list when events are rendered
                    updateEventList(calendar.getEvents());
                }
            });
            calendar.render();

            function updateEventList(events) {
                const eventListTable = document.getElementById('event-list-table').getElementsByTagName('tbody')[0];
                eventListTable.innerHTML = ''; // Clear existing rows

                function formatDateString(date) {
                    const d = new Date(date);
                    const day = String(d.getDate()).padStart(2, '0');
                    const month = String(d.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                    const year = d.getFullYear();
                    return `${day}-${month}-${year}`;
                }

                events.forEach(event => {
                    const row = eventListTable.insertRow();
                    row.insertCell(0).innerText = event.title;
                    const startDate = formatDateString(event.start);
                    const endDate = event.end ? formatDateString(event.end) : formatDateString(event.start);
                    row.insertCell(1).innerText = `${startDate} - ${endDate}`;
                    row.insertCell(2).innerText = event.extendedProps.category || '';
                });
            }
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
