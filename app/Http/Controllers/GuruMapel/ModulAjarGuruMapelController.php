<?php

namespace App\Http\Controllers\GuruMapel;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\BidangKeahlian;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\ProgramKeahlian;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulAjarGuruMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Retrieve the active academic year
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        // Check if an active academic year is found
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

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Get the namalengkap of the logged-in user from personil_sekolahs table
        $personil = PersonilSekolah::where('id_personil', $personal_id)->first();
        // Concatenate gelardepan, namalengkap, and gelarbelakang
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        $bidangKeahlianList = BidangKeahlian::whereIn('idbk', [10, 11])->get();
        $identitasSekolah = IdentitasSekolah::where('id', 1)->select('nama_sekolah')->first();

        $kepsek = KepalaSekolah::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('semester', $semesterAktif->semester)
            ->first();

        return view('pages.gurumapel.bikinmodul.modul-ajar', [
            'personal_id' => $personal_id,
            'bidangKeahlianList' => $bidangKeahlianList,
            'personil' => $personil,
            'fullName' => $fullName,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'semesterAktif' => $semesterAktif,
            'identitasSekolah' => $identitasSekolah,
            'kepsek' => $kepsek,
            'tahunAjaranOptions' => $tahunAjaranOptions,
        ]);
    }

    public function getProgram($idbk)
    {
        return response()->json(ProgramKeahlian::where('id_bk', $idbk)->get());
    }

    public function getKonsentrasi($idpk)
    {
        return response()->json(KompetensiKeahlian::where('id_pk', $idpk)->get());
    }

    public function getMataPelajaran($kodeKk, $tingkat)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)->first();

        if (!$tahunAjaranAktif || !$semesterAktif) {
            return response()->json([]);
        }

        $data = KbmPerRombel::where('kode_kk', $kodeKk)
            ->where('tingkat', $tingkat) // filter berdasarkan tingkat dari select kelas
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->where('id_personil', $personal_id)
            ->select('kode_mapel', 'mata_pelajaran', 'tingkat')
            ->groupBy('kode_mapel', 'mata_pelajaran', 'tingkat')
            ->orderBy('mata_pelajaran')
            ->get();

        return response()->json($data);
    }
}
