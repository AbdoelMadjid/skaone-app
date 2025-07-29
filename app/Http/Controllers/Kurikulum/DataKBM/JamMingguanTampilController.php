<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JamMingguanTampilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-tampil', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
        ]);
    }


    public function simpanJadwal(Request $request)
    {
        $request->validate([
            'tahunajaran' => 'required',
            'semester' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
            'kode_rombel' => 'required',
            'id_personil' => 'required|exists:personil_sekolahs,id_personil',
            'kode_mapel_rombel' => 'required|string|max:100',
            'hari' => 'required|string',
            'jam_ke' => 'required|integer',
            'jumlah_jam' => 'required|integer|min:1|max:10',
        ]);

        $startJam = (int) $request->jam_ke;
        $jumlahJam = (int) $request->jumlah_jam;

        for ($i = 0; $i < $jumlahJam; $i++) {
            JadwalMingguan::updateOrCreate(
                [
                    'tahunajaran' => $request->tahunajaran,
                    'semester' => $request->semester,
                    'kode_kk' => $request->kode_kk,
                    'tingkat' => $request->tingkat,
                    'kode_rombel' => $request->kode_rombel,
                    'jam_ke' => $startJam + $i,
                    'hari' => $request->hari,
                ],
                [
                    'id_personil' => $request->id_personil,
                    'mata_pelajaran' => $request->kode_mapel_rombel,
                ]
            );
        }

        return redirect()->back()->with('success', 'Jadwal berhasil disimpan.');
    }


    public function hapusManual(Request $request)
    {
        $kode = $request->kode_rombel;
        $hari = $request->hari;
        $jam = $request->jam_ke;

        // Hapus jadwal
        JadwalMingguan::where('kode_rombel', $kode)
            ->where('hari', $hari)
            ->where('jam_ke', $jam)
            ->delete();

        // Redirect ke URL tampil (bisa juga simpan session flash jika perlu)
        return redirect()->to(
            url('kurikulum/datakbm/jadwal-mingguan-tampil') . '?' . http_build_query([
                'tahunajaran' => $request->tahunajaran,
                'semester' => $request->semester,
                'kompetensikeahlian' => $request->kompetensikeahlian,
                'tingkat' => $request->tingkat,
                'kode_rombel' => $kode,
            ])
        )->with('success', 'Jadwal berhasil dihapus.');
    }
}
