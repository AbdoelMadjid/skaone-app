<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JadwalPerGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        // Check if an active semester is found
        if (!$semesterAktif) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $tahunAjaran = $request->get('tahunajaran');
        $semester = $request->get('semester');
        $idPersonil = $request->get('id_personil');
        $jadwal = collect();
        $namaGuru = '-';
        $grid = [];

        if ($tahunAjaran && $semester && $idPersonil) {
            // Ambil jadwal berdasarkan guru
            $jadwal = JadwalMingguan::where('tahunajaran', $tahunAjaran)
                ->where('semester', $semester)
                ->where('id_personil', $idPersonil)
                ->get();

            // Ambil nama guru
            $namaGuru = PersonilSekolah::where('id_personil', $idPersonil)->value('namalengkap') ?? '-';

            foreach ($jadwal as $item) {
                $rombel = KbmPerRombel::where('kode_mapel_rombel', $item->mata_pelajaran)->value('rombel') ?? '-';
                $mapel = KbmPerRombel::where('kode_mapel_rombel', $item->mata_pelajaran)->value('mata_pelajaran') ?? '-';

                $grid[$item->jam_ke][$item->hari] = [
                    'mapel' => $mapel,
                    'rombel' => $rombel,
                ];
            }
        }

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $jamList = [
            1 => '6:30 - 7:10',
            2 => '7:10 - 7:50',
            3 => '7:50 - 8:30',
            4 => '8:30 - 9:10',
            5 => '9:10 - 9:50',
            6 => '9:50 - 10:00',
            7 => '10:00 - 10:40',
            8 => '10:40 - 11:20',
            9 => '11:20 - 12:00',
            10 => '12:00 - 13:00',
            11 => '13:00 - 13:40',
            12 => '13:40 - 14:20',
            13 => '14:20 - 15:00',
        ];

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $guruMapelOptions = PersonilSekolah::where('jenispersonil', 'Guru')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-per-guru', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'guruMapelOptions' => $guruMapelOptions,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
            'semesterAktif' => $semesterAktif->semester,
            'tahunAjaran' => $tahunAjaran,
            'semester' => $semester,
            'idPersonil' => $idPersonil,
            'jadwal' => $jadwal,
            'namaGuru' => $namaGuru,
            'grid' => $grid,
            'hariList' => $hariList,
            'jamList' => $jamList
        ]);
    }
}
