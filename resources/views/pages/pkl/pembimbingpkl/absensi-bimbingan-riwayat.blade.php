@php
    $riwayat_absensi = DB::table('absensi_siswa_pkls')
        ->select('id', 'nis', 'tanggal', 'status')
        ->where('nis', $siswa->nis)
        ->orderBy('tanggal', 'asc')
        ->get();
@endphp
<div class="col-md-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fs-14 text-primary mb-0"><i class="ri-calendar-fill align-middle me-2"></i>
            Riwayat Absen</h5>
        <span class="badge bg-danger rounded-pill">{{ $siswa->jumlah_hadir }}</span>
    </div>
    <div data-simplebar data-simplebar-auto-hide="false" style="max-height: 1300px;" class="px-4 mx-n4"
        data-simplebar-track="secondary">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayat_absensi as $absensi)
                    <tr
                        class="{{ \Carbon\Carbon::parse($absensi->tanggal)->month === 12 ? 'bg-info-subtle' : (\Carbon\Carbon::parse($absensi->tanggal)->month === 1 ? 'bg-warning-subtle' : (\Carbon\Carbon::parse($absensi->tanggal)->month === 2 ? 'bg-success-subtle' : (\Carbon\Carbon::parse($absensi->tanggal)->month === 3 ? 'bg-danger-subtle' : ''))) }}">
                        <td>
                            @php
                                $dayOfWeek = \Carbon\Carbon::parse($absensi->tanggal)->dayOfWeek;
                                $formattedDate = \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('l, d-m-Y');
                            @endphp

                            <span class="{{ $dayOfWeek == 0 ? 'text-danger' : ($dayOfWeek == 6 ? 'text-info' : '') }}">
                                {{ $formattedDate }}
                            </span>
                        </td>
                        <td>
                            @php
                                if ($absensi->status == 'HADIR') {
                                    $badgeColor = 'success';
                                } elseif ($absensi->status == 'SAKIT') {
                                    $badgeColor = 'warning';
                                } elseif ($absensi->status == 'IZIN') {
                                    $badgeColor = 'primary';
                                } elseif ($absensi->status == 'ALFA') {
                                    $badgeColor = 'danger';
                                } elseif ($absensi->status == 'LIBUR') {
                                    $badgeColor = 'danger';
                                } else {
                                    $badgeColor = 'secondary';
                                }
                            @endphp
                            <span
                                class="badge bg-{{ $badgeColor }}">{{ ucfirst(strtolower($absensi->status)) }}</span>
                        </td>
                        <td class='text-center'>
                            <button class="btn btn-soft-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"
                                data-id="{{ $absensi->id }}" data-status="{{ $absensi->status }}">
                                <i class='ri-edit-2-line'></i>
                            </button>
                            <!-- Tombol delete -->
                            <form action="{{ route('pembimbingpkl.absensi-bimbingan.deleteabsensi', $absensi->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-soft-danger btn-sm delete-btn">
                                    <i class='ri-delete-bin-2-line'></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">
                            Tidak ada
                            riwayat absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
