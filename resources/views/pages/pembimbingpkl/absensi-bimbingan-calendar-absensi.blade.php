<div class="card card-height-100">
    <div class="card-header">
        CALENDAR ABSENSI
    </div>
    <div class="card-body">
        <div class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" id="calendar-tabs-{{ $siswa->nis }}"
            role="tablist">
            @foreach ($siswa->calendars as $monthYear => $calendar)
                <button class="nav-link {{ $loop->first ? 'active' : '' }} text-center"
                    id="tab-{{ $siswa->nis }}-{{ $monthYear }}" data-bs-toggle="tab"
                    data-bs-target="#content-{{ $siswa->nis }}-{{ $monthYear }}" type="button" role="tab"
                    aria-controls="content-{{ $siswa->nis }}-{{ $monthYear }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ \Carbon\Carbon::createFromFormat('Y-m', $monthYear)->translatedFormat('F') }}
                </button>
            @endforeach
        </div>

        <div class="tab-content" id="calendar-tabs-content-{{ $siswa->nis }}">
            @foreach ($siswa->calendars as $monthYear => $calendar)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="content-{{ $siswa->nis }}-{{ $monthYear }}" role="tabpanel"
                    aria-labelledby="tab-{{ $siswa->nis }}-{{ $monthYear }}">
                    <div class="table-responsive">
                        <table class="table table-bordered">
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
                            <tbody class="text-center">
                                @foreach ($calendar as $week)
                                    <tr>
                                        @foreach ($week as $key => $day)
                                            @if ($day)
                                                <td
                                                    class="{{ $key == 0 ? 'bg-danger-subtle' : ($key == 6 ? 'bg-info-subtle' : '') }}">
                                                    <div>{{ \Carbon\Carbon::parse($day['tanggal'])->day }}</div>
                                                    <div>
                                                        <span
                                                            class="badge absensi-badge
                                                                {{ str_contains($day['status'], 'HADIR') ? 'bg-success' : '' }}
                                                                {{ str_contains($day['status'], 'SAKIT') ? 'bg-warning' : '' }}
                                                                {{ str_contains($day['status'], 'IZIN') ? 'bg-primary' : '' }}
                                                                {{ str_contains($day['status'], 'ALFA') ? 'bg-danger' : '' }}
                                                                {{ str_contains($day['status'], 'ABSEN') ? 'bg-secondary' : '' }}
                                                                {{ str_contains($day['status'], 'LIBUR') ? 'bg-danger' : '' }}"
                                                            @if (str_contains($day['status'], 'ABSEN')) data-nis="{{ $siswa->nis }}"
                                                            data-tanggal="{{ $day['tanggal'] }}"
                                                            onclick="saveAttendance('{{ $siswa->nis }}', '{{ $monthYear }}', '{{ \Carbon\Carbon::parse($day['tanggal'])->day }}')" @endif>
                                                            {{-- <span class="absen-text">
                                                                {{ $day['status'] === 'LIBUR' ? 'LIBUR' : $day['status'] }}
                                                            </span> --}}
                                                            <!-- Badge untuk LIBUR jika statusnya LIBUR -->
                                                            @if (str_contains($day['status'], 'LIBUR'))
                                                                <span class="badge bg-danger">
                                                                    LIBUR
                                                                </span>
                                                            @endif
                                                            <!-- Badge untuk status absensi seperti HADIR, SAKIT, IZIN, dll -->
                                                            @if (str_contains($day['status'], 'HADIR'))
                                                                @if (str_contains($day['status'], 'LIBUR'))
                                                                    <BR>
                                                                @endif
                                                                <span class="badge bg-success">
                                                                    HADIR
                                                                </span>
                                                            @elseif (str_contains($day['status'], 'SAKIT'))
                                                                @if (str_contains($day['status'], 'LIBUR'))
                                                                    <BR>
                                                                @endif
                                                                <span class="badge bg-warning">
                                                                    SAKIT
                                                                </span>
                                                            @elseif (str_contains($day['status'], 'IZIN'))
                                                                @if (str_contains($day['status'], 'LIBUR'))
                                                                    <BR>
                                                                @endif
                                                                <span class="badge bg-primary">
                                                                    IZIN
                                                                </span>
                                                            @elseif (str_contains($day['status'], 'ALFA'))
                                                                @if (str_contains($day['status'], 'LIBUR'))
                                                                    <BR>
                                                                @endif
                                                                <span class="badge bg-danger">
                                                                    ALFA
                                                                </span>
                                                            @elseif (str_contains($day['status'], 'ABSEN'))
                                                                <span class="badge bg-secondary absen-text">
                                                                    ABSEN
                                                                </span>
                                                            @endif
                                                        </span>



                                                    </div>
                                                </td>
                                            @else
                                                <td class="bg-primary-subtle"></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Keterangan Libur -->
                        @if (!empty($siswa->monthlyHolidays[$monthYear] ?? []))
                            <div>
                                <h6>Keterangan Libur Bulan
                                    {{ \Carbon\Carbon::parse($monthYear . '-01')->translatedFormat('F Y') }}
                                </h6>
                                <span class="fs-10">
                                    @foreach ($siswa->monthlyHolidays[$monthYear] ?? [] as $date => $description)
                                        {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}:
                                        {{ $description }} <br>
                                    @endforeach
                                </span>
                                <br><br>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
