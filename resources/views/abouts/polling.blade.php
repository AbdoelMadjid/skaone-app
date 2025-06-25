<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    canvas {
        max-height: 200px;
    }
</style>
<h4 class="mt-5">📈 Statistik Polling (Pilihan Ganda)</h4>
<div class="row">
    @foreach ($pollingStats as $index => $stat)
        <div class="col-md-4 col-sm-6 mb-4">
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
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h6>{{ $stat['question_text'] }} <span class="badge bg-info">{{ $stat['count'] }} jawaban</span>
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
