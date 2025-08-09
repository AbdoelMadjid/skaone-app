@foreach ($kompetensiArray as $kompetensi => $data)
    <div class="d-flex align-items-center py-3">
        <div class="flex-shrink-0 me-3">
            {{ $kompetensi }} ({{ $kompetensiArray[$kompetensi]['total'] }})
        </div>
        <div class="flex-grow-1">
            <div class="progress animated-progress custom-progress progress-label">
                <div class="progress-bar @if ($kompetensi == 'RPL') bg-primary @elseif($kompetensi == 'TKJ') bg-success @elseif($kompetensi == 'BD') bg-info @elseif($kompetensi == 'MP') bg-danger @elseif($kompetensi == 'AK') bg-warning @endif"
                    role="progressbar" style="width: {{ $data['persentase'] }}%" aria-valuenow="{{ $data['persentase'] }}"
                    aria-valuemin="0" aria-valuemax="100">
                    <div class="label">{{ $data['hadir'] }} ({{ $data['persentase'] }}%)</div>
                </div>
            </div>
        </div>
    </div>
@endforeach
