@extends('layouts.master')
@section('title')
    @lang('translation.polling')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <style>
        canvas {
            max-height: 200px;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.web-site-app')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
            <div>
                @can('create websiteapp/polling')
                    <a class="btn btn-soft-primary btn-sm action" href="{{ route('websiteapp.polling.create') }}">Tambah
                        Polling</a>
                @endcan
                <a class="btn btn-soft-primary btn-sm" href="{{ route('websiteapp.question.index') }}">Pertanyaan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 285px);">
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <h4 class="mt-0">📈 Statistik Polling (Pilihan Ganda)</h4>
                        <div class="row">
                            @foreach ($pollingStats as $index => $stat)
                                <div class="col-md-6 col-sm-6 mb-6">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <h6 class="mb-3">{{ $stat['question_text'] }}</h6>
                                            <div style="height: 220px;">
                                                <canvas id="chart-{{ $index }}"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <script>
                            @foreach ($pollingStats as $index => $stat)
                                const ctx{{ $index }} = document.getElementById('chart-{{ $index }}').getContext('2d');
                                new Chart(ctx{{ $index }}, {
                                    type: 'pie',
                                    data: {
                                        labels: ['1', '2', '3', '4', '5'],
                                        datasets: [{
                                            label: 'Jumlah Jawaban',
                                            data: {!! json_encode(array_values($stat['answers'])) !!},
                                            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                position: 'bottom',
                                            }
                                        }
                                    }
                                });
                            @endforeach
                        </script>
                        <h4 class="mt-5">📝 Statistik Jawaban Teks</h4>
                        <div class="row">
                            @foreach ($textResponses as $index => $stat)
                                <div class="col-md-12 mb-12">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body">
                                            <h6>{{ $stat['question_text'] }} <span
                                                    class="badge bg-info">{{ $stat['count'] }}
                                                    jawaban</span>
                                            </h6>

                                            {{-- Chart --}}
                                            @if (!empty($stat['top_words']))
                                                <canvas id="textChart-{{ $index }}" height="200"></canvas>
                                                <script>
                                                    const ctxText{{ $index }} = document.getElementById('textChart-{{ $index }}').getContext('2d');
                                                    new Chart(ctxText{{ $index }}, {
                                                        type: 'bar',
                                                        data: {
                                                            labels: {!! json_encode(array_keys($stat['top_words'])) !!},
                                                            datasets: [{
                                                                label: 'Frekuensi Kata',
                                                                data: {!! json_encode(array_values($stat['top_words'])) !!},
                                                                backgroundColor: '#36b9cc'
                                                            }]
                                                        },
                                                        options: {
                                                            responsive: true,
                                                            indexAxis: 'y',
                                                            plugins: {
                                                                legend: {
                                                                    display: false
                                                                }
                                                            },
                                                            scales: {
                                                                x: {
                                                                    beginAtZero: true
                                                                }
                                                            }
                                                        }
                                                    });
                                                </script>
                                            @else
                                                <p class="text-muted">Belum ada data yang cukup untuk ditampilkan.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h4 class="mt-5">📝 Statistik Jawaban Teks</h4>

                        <div class="accordion" id="textResponsesAccordion">
                            @foreach ($textResponses as $index => $stat)
                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                            aria-controls="collapse{{ $index }}">
                                            {{ $stat['question_text'] }}
                                            <span class="badge bg-info ms-2">{{ $stat['count'] }} jawaban</span>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $index }}"
                                        data-bs-parent="#textResponsesAccordion">
                                        <div class="accordion-body">
                                            @if (!empty($stat['responses']))
                                                <ul class="list-group">
                                                    @foreach ($stat['responses'] as $response)
                                                        <li class="list-group-item">{{ $response }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="text-muted">Belum ada jawaban untuk pertanyaan ini.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>



    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'polling-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
