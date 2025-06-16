<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\HariEfektif;
use App\Models\Kurikulum\DataKBM\LiburSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HariEfektifController extends Controller
{
    public function index()
    {
        $tahunAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = Semester::where('status', 'Aktif')->where('tahun_ajaran_id', $tahunAktif->id)->first();

        $tahunList = TahunAjaran::all();
        return view('pages.kurikulum.datakbm.hari-efektif', compact('tahunAktif', 'semesterAktif', 'tahunList'));
    }

    public function generateKalender(Request $request)
    {
        $tahun = TahunAjaran::findOrFail($request->tahun_ajaran_id);
        $semester = $request->semester;

        $tahun_awal = (int) explode('-', $tahun->tahunajaran)[0];
        $startMonth = $semester === 'Ganjil' ? 7 : 1;
        $endMonth = $semester === 'Ganjil' ? 12 : 6;
        $year = $semester === 'Ganjil' ? $tahun_awal : $tahun_awal + 1;

        $dates = [];
        $rekap = [];

        $liburList = LiburSekolah::where('tahun_ajaran_id', $tahun->id)
            ->where('semester', $semester)->pluck('tanggal')->toArray();

        for ($month = $startMonth; $month <= $endMonth; $month++) {
            $monthDates = [];
            $start = Carbon::create($year, $month, 1);
            $end = $start->copy()->endOfMonth();

            $hariEfektif = 0;

            while ($start <= $end) {
                $tgl = $start->format('Y-m-d');
                $isWeekday = $start->isWeekday();
                $isLibur = in_array($tgl, $liburList);

                // Hitung hari efektif
                if ($isWeekday && !$isLibur) {
                    $hariEfektif++;
                }

                $monthDates[] = [
                    'tanggal' => $tgl,
                    'is_libur' => $isLibur,
                    'is_weekday' => $isWeekday,
                ];
                $start->addDay();
            }

            $dates[$month] = $monthDates;
            $rekap[$month] = $hariEfektif;
        }

        return response()->json([
            'kalender' => $dates,
            'rekap' => $rekap
        ]);
    }


    public function toggleLibur(Request $request)
    {
        $tgl = $request->tanggal;
        $data = LiburSekolah::where('tanggal', $tgl)
            ->where('tahun_ajaran_id', $request->tahun_ajaran_id)
            ->where('semester', $request->semester)
            ->first();

        if ($data) {
            $data->delete();
            return response()->json(['status' => 'removed']);
        } else {
            LiburSekolah::create([
                'tanggal' => $tgl,
                'tahun_ajaran_id' => $request->tahun_ajaran_id,
                'semester' => $request->semester,
            ]);
            return response()->json(['status' => 'added']);
        }
    }

    public function hitungHariEfektif(Request $request)
    {
        $tahun = TahunAjaran::findOrFail($request->tahun_ajaran_id);
        $semester = $request->semester;

        $tahun_awal = (int) explode('-', $tahun->tahunajaran)[0];
        $startMonth = $semester === 'Ganjil' ? 7 : 1;
        $endMonth = $semester === 'Ganjil' ? 12 : 6;
        $year = $semester === 'Ganjil' ? $tahun_awal : $tahun_awal + 1;

        HariEfektif::where('tahun_ajaran_id', $tahun->id)->where('semester', $semester)->delete();

        $hasil = [];

        for ($month = $startMonth; $month <= $endMonth; $month++) {
            $start = Carbon::create($year, $month, 1);
            $end = $start->copy()->endOfMonth();
            $hari_efektif = 0;
            while ($start <= $end) {
                if ($start->isWeekday() && !LiburSekolah::where('tanggal', $start->format('Y-m-d'))
                    ->where('tahun_ajaran_id', $tahun->id)
                    ->where('semester', $semester)->exists()) {
                    $hari_efektif++;
                }
                $start->addDay();
            }
            HariEfektif::create([
                'tahun_ajaran_id' => $tahun->id,
                'semester' => $semester,
                'bulan' => $month,
                'jumlah_hari_efektif' => $hari_efektif
            ]);

            $hasil[] = [
                'bulan' => $month,
                'jumlah_hari_efektif' => $hari_efektif
            ];
        }

        return response()->json(['status' => 'ok', 'data' => $hasil]);
    }
}
