<?php

namespace App\Http\Controllers\Pkl\PembimbingPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PembimbingPkl\AbsensiBimbinganDataTable;
use App\Models\Pkl\PembimbingPkl\AbsensiPembimbingPkl;
use App\Http\Requests\Pkl\PembimbingPkl\AbsensiPembimbingPklRequest;
use App\Models\Pkl\PesertaDidikPkl\AbsensiSiswaPkl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsensiPembimbingPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AbsensiBimbinganDataTable $absensiBimbinganDataTable)
    {
        $personal_id = Auth::user()->personal_id;

        $data = DB::table('pembimbing_prakerins')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', function ($join) {
                $join->on('penempatan_prakerins.tahunajaran', '=', 'peserta_didik_rombels.tahun_ajaran')
                    ->on('penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis');
            })
            ->select(
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.kontak_hp',
                'personil_sekolahs.photo',
                'pembimbing_prakerins.id_penempatan',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama',
                'perusahaans.alamat',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.foto',
                'peserta_didik_rombels.rombel_nama'
            )
            ->where('pembimbing_prakerins.id_personil', $personal_id)
            ->get();

        // Query terpisah untuk absensi siswa
        $absensi = DB::table('absensi_siswa_pkls')
            ->select(
                'nis',
                DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
            )
            ->groupBy('nis')
            ->get()
            ->keyBy('nis'); // Agar hasil bisa diakses langsung dengan nis sebagai key

        // Gabungkan absensi ke data utama
        $data = $data->map(function ($siswa) use ($absensi) {
            $nis = $siswa->nis;

            $siswa->jumlah_hadir = $absensi[$nis]->jumlah_hadir ?? 0;
            $siswa->jumlah_sakit = $absensi[$nis]->jumlah_sakit ?? 0;
            $siswa->jumlah_izin = $absensi[$nis]->jumlah_izin ?? 0;
            $siswa->jumlah_alfa = $absensi[$nis]->jumlah_alfa ?? 0;
            $siswa->jumlah_total = $siswa->jumlah_sakit + $siswa->jumlah_izin + $siswa->jumlah_alfa;

            return $siswa;
        });

        // Query jumlah jurnal berdasarkan NIS
        $jumlahJurnal = DB::table('jurnal_pkls')
            ->select(
                'penempatan_prakerins.nis',
                DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
            )
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->groupBy('penempatan_prakerins.nis')
            ->get()
            ->keyBy('nis');

        // Query elemen dari modul_ajars dan capaian_pembelajarans
        $elements = DB::table('modul_ajars')
            ->join('capaian_pembelajarans', 'modul_ajars.kode_cp', '=', 'capaian_pembelajarans.kode_cp')
            ->select(
                'modul_ajars.kode_cp',
                'capaian_pembelajarans.element',
                DB::raw("GROUP_CONCAT(modul_ajars.isi_tp) as isi_tp")
            )
            ->groupBy('modul_ajars.kode_cp', 'capaian_pembelajarans.element')
            ->get();

        // Query untuk jurnal dan elemen
        $journals = DB::table('jurnal_pkls')
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->select(
                'penempatan_prakerins.nis',
                'jurnal_pkls.element',
                DB::raw("COUNT(jurnal_pkls.id) as total_jurnal_cp")
            )
            ->groupBy('penempatan_prakerins.nis', 'jurnal_pkls.element')
            ->get();


        // Gabungkan data absensi dan jurnal
        $data = $data->map(function ($siswa) use ($jumlahJurnal, $elements, $journals) {
            $nis = $siswa->nis;

            // Jumlah jurnal total
            $siswa->total_jurnal = $jumlahJurnal[$nis]->total_jurnal ?? 0;

            // Gabungkan elemen dengan jurnal
            $siswa->jurnal_per_elemen = $elements->map(function ($element) use ($journals, $nis) {
                $kode_cp = $element->kode_cp;

                // Ambil jumlah jurnal dari hasil query jurnal
                $jurnal = $journals->where('nis', $nis)->where('element', $kode_cp)->first();

                return [
                    'element' => $element->element,
                    'isi_tp' => $element->isi_tp,
                    'total_jurnal_cp' => $jurnal->total_jurnal_cp ?? 0 // Default 0 jika tidak ada jurnal
                ];
            });

            return $siswa;
        });

        $data = $data->map(function ($siswa) {
            $nis = $siswa->nis;

            // Definisikan libur nasional
            $holidays = [
                '2025-01-01' => 'Libur Tahun Baru',
                '2025-01-27' => 'Isra Miraj Nabi Muhammad SAW',
                '2025-01-28' => 'Cuti Bersama',
                '2025-01-29' => 'Tahun Baru Imlek 2576 Kongzili',
                '2025-03-29' => 'Hari Suci Nyepi (Tahun Baru Saka 1947)',
                '2025-03-31' => 'Idul Fitri 1446 Hijriah',
                // Tambahkan libur lainnya sesuai kebutuhan
            ];

            // Periode bulan dan tahun
            $months = [
                ['month' => 12, 'year' => 2024],
                ['month' => 1, 'year' => 2025],
                ['month' => 2, 'year' => 2025],
                ['month' => 3, 'year' => 2025],
            ];

            $calendars = [];
            $monthlyHolidays = []; // Untuk menyimpan keterangan libur

            foreach ($months as $period) {
                $month = $period['month'];
                $year = $period['year'];

                // Ambil data absensi untuk bulan-tahun tertentu
                $absensi = DB::table('absensi_siswa_pkls')
                    ->where('nis', $nis)
                    ->whereMonth('tanggal', $month)
                    ->whereYear('tanggal', $year)
                    ->get()
                    ->keyBy(function ($item) {
                        return Carbon::parse($item->tanggal)->format('Y-m-d');
                    });

                // Generate kalender
                $daysInMonth = Carbon::create($year, $month, 1)->daysInMonth;
                $firstDayOfMonth = Carbon::create($year, $month, 1)->dayOfWeek; // 0=Sunday, 1=Monday, etc.
                $calendar = [];
                $currentDay = 1;

                for ($week = 0; $week < 6; $week++) {
                    $row = [];
                    for ($day = 0; $day < 7; $day++) {
                        if ($week === 0 && $day < $firstDayOfMonth || $currentDay > $daysInMonth) {
                            $row[] = null; // Kosongkan slot untuk hari di luar bulan ini
                        } else {
                            $date = Carbon::create($year, $month, $currentDay)->format('Y-m-d');

                            // Tentukan status berdasarkan kondisi
                            $status = 'ABSEN'; // Default jika tidak ada data absensi
                            if (isset($holidays[$date])) {
                                $status = 'LIBUR'; // Jika tanggal termasuk hari libur
                                // Simpan keterangan libur ke bulan yang sesuai
                                $monthKey = "$year-$month";
                                $monthlyHolidays[$monthKey][$date] = $holidays[$date];
                                if ($absensi->has($date)) {
                                    // Gabungkan status LIBUR dengan status absensi jika ada
                                    $status = 'LIBUR & ' . $absensi[$date]->status;
                                }
                            } elseif ($absensi->has($date)) {
                                $status = $absensi[$date]->status; // Jika ada data absensi
                            }

                            $row[] = [
                                'tanggal' => $date,
                                'status' => $status,
                            ];
                            $currentDay++;
                        }
                    }
                    $calendar[] = $row;
                }

                $calendars["$year-$month"] = $calendar;
            }

            $siswa->calendars = $calendars; // Tambahkan kalender ke data siswa
            $siswa->monthlyHolidays = $monthlyHolidays; // Tambahkan keterangan libur ke data siswa
            return $siswa;
        });

        return $absensiBimbinganDataTable->render("pages.pkl.pembimbingpkl.absensi-bimbingan", compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_personil = Auth::user()->personal_id;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $siswaterbimbingOptions = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'penempatan_prakerins.nis as id', // ID siswa sebagai value
                DB::raw("CONCAT(peserta_didik_rombels.rombel_nama, ' - ', peserta_didiks.nis, ' - ', peserta_didiks.nama_lengkap) as name") // Gabungkan NIS dan nama lengkap
            )
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->get()
            ->pluck('name', 'id') // Pluck untuk membuat key-value array
            ->toArray();

        return view('pages.pkl.pembimbingpkl.absensi-bimbingan-form', [
            'data' => new AbsensiSiswaPkl(),
            'siswaterbimbingOptions' => $siswaterbimbingOptions,
            'action' => route('pembimbingpkl.absensi-bimbingan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiPembimbingPklRequest $request)
    {
        $absensiPembimbingPkl = new AbsensiSiswaPkl($request->validated());
        $absensiPembimbingPkl->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAbsensi(Request $request, $id)
    {
        $absensi = AbsensiSiswaPkl::findOrFail($id);
        $absensi->status = $request->status;
        $absensi->save();

        return redirect()->back()->with('toast_success', 'Status absensi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data absensi berdasarkan ID
        $absensi = DB::table('absensi_siswa_pkls')->where('id', $id)->first();

        if ($absensi) {
            DB::table('absensi_siswa_pkls')->where('id', $id)->delete();
            return redirect()->back()->with('toast_success', 'Riwayat absensi berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }

    // Fungsi untuk menyimpan absensi
    public function simpanAbsensi(Request $request)
    {
        // Validasi data yang diterima
        // Validasi data yang diterima
        $validated = $request->validate([
            'nis' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:HADIR,SAKIT,IZIN,ALFA,LIBUR',
        ]);

        // Simpan data menggunakan create()
        AbsensiSiswaPkl::create([
            'nis' => $validated['nis'],
            'tanggal' => $validated['tanggal'],
            'status' => $validated['status'],
        ]);

        // Setelah berhasil disimpan, kembalikan respons sukses
        return redirect()->back()->with('toast_success', 'Absensi berhasil disimpan');
    }
}
