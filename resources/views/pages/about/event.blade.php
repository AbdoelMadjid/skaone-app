@extends('layouts.master')
@section('title')
    Agenda Kegiatan (Event)
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.6/main.min.css" rel="stylesheet">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.about')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.6/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.6/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.6/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.6/locales-all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                events: "{{ route('about.events.data') }}",
                locale: 'id',
                dateClick: function(info) {
                    var title = prompt('Enter Event Title:');
                    var start = info.dateStr;
                    var end = info.dateStr;

                    if (title) {
                        fetch("{{ route('about.events.store') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    title: title,
                                    start_date: start,
                                    end_date: end
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.success);
                                calendar.refetchEvents();
                            });
                    }
                },
                eventDrop: function(info) {
                    var id = info.event.id;
                    var title = info.event.title;
                    var start = info.event.startStr;
                    var end = info.event.endStr;

                    fetch("{{ route('about.events.update', '') }}/" + id, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                title: title,
                                start_date: start,
                                end_date: end
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.success);
                            calendar.refetchEvents();
                        });
                },
                eventClick: function(info) {
                    if (confirm("Are you sure you want to delete this event?")) {
                        var id = info.event.id;

                        fetch("{{ route('about.events.destroy', '') }}/" + id, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.success);
                                info.event.remove();
                            });
                    }
                }
            });

            calendar.render();
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
