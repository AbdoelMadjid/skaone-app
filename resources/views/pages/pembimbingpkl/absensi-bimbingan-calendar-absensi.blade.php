<div class="card card-height-100">
    <div class="card-header">
        CALENDAR ABSENSI
    </div>
    <div class="card-body">
        <div class="nav nav-tabs mb-3" id="calendar-tabs-{{ $siswa->nis }}" role="tablist">
            @foreach ($siswa->calendars as $monthYear => $calendar)
                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                    id="tab-{{ $siswa->nis }}-{{ $monthYear }}" data-bs-toggle="tab"
                    data-bs-target="#content-{{ $siswa->nis }}-{{ $monthYear }}" type="button" role="tab"
                    aria-controls="content-{{ $siswa->nis }}-{{ $monthYear }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ \Carbon\Carbon::createFromFormat('Y-m', $monthYear)->translatedFormat('F Y') }}
                </button>
            @endforeach
        </div>

        <div class="tab-content" id="calendar-tabs-content-{{ $siswa->nis }}">
            @foreach ($siswa->calendars as $monthYear => $calendar)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="content-{{ $siswa->nis }}-{{ $monthYear }}" role="tabpanel"
                    aria-labelledby="tab-{{ $siswa->nis }}-{{ $monthYear }}">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Ahad</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                    <th>Sabtu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calendar as $week)
                                    <tr>
                                        @foreach ($week as $day)
                                            @if ($day)
                                                <td>
                                                    <div>{{ \Carbon\Carbon::parse($day['tanggal'])->day }}</div>
                                                    <div>
                                                        <span
                                                            class="badge
                                                            {{ $day['status'] === 'HADIR' ? 'bg-success' : '' }}
                                                            {{ $day['status'] === 'SAKIT' ? 'bg-warning' : '' }}
                                                            {{ $day['status'] === 'IZIN' ? 'bg-primary' : '' }}
                                                            {{ $day['status'] === 'ALFA' ? 'bg-danger' : '' }}
                                                            {{ $day['status'] === 'BLM ABSEN' ? 'bg-secondary' : '' }}">
                                                            {{ $day['status'] }}
                                                        </span>
                                                    </div>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
