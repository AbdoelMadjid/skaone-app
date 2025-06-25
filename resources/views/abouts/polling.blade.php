<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<h4 class="mt-5">📈 Statistik Polling (Pilihan Ganda)</h4>
@foreach ($pollingStats as $index => $stat)
    <div class="mb-4">
        <h6>{{ $stat['question_text'] }}</h6>
        <canvas id="chart-{{ $index }}" width="400" height="200" style="max-width: 100%;"></canvas>
        <script>
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
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });
        </script>
    </div>
@endforeach

<h4 class="mt-5">📝 Statistik Jawaban Teks</h4>
@foreach ($textResponses as $stat)
    <div class="mb-4">
        <h6>{{ $stat['question_text'] }} <span class="badge bg-info">{{ $stat['count'] }} jawaban</span></h6>
        <ul class="list-group">
            @foreach ($stat['responses'] as $response)
                <li class="list-group-item">{{ $response }}</li>
            @endforeach
        </ul>
    </div>
@endforeach
