<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\PengawasUjianDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\PerangkatUjian\DaftarPengawasUjian;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\PengawasUjian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengawasUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PengawasUjianDataTable $pengawasUjianDataTable)
    {
        //
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif
        if (!$identitasUjian) {
            return redirect()->back()->with('error', 'Tidak ada identitas ujian yang aktif.');
        }

        $daftarPengawas = DaftarPengawasUjian::where('kode_ujian', $identitasUjian->kode_ujian)
            ->orderBy('kode_pengawas')
            ->get();


        return $pengawasUjianDataTable->render('pages.kurikulum.perangkatujian.adminujian.crud-pengawas-ujian', [
            'identitasUjian' => $identitasUjian,
            'daftarPengawas' => $daftarPengawas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $ruanganOptions = [];
        for ($i = 1; $i <= 50; $i++) {
            $ruanganOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-pengawas-ujian-form', [
            'data' => new PengawasUjian(),
            'action' => route('kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.store'),
            'identitasUjian' => $identitasUjian,
            'ruanganOptions' => $ruanganOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PengawasUjian $pengawasUjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengawasUjian $pengawasUjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengawasUjian $pengawasUjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengawasUjian $pengawasUjian)
    {
        //
    }

    public function loadFormPengawas()
    {
        $identitasUjian = IdentitasUjian::where('status', 'aktif')->first(); // atau ambil dari relasi
        if (!$identitasUjian) {
            return redirect()->back()->with('error', 'Tidak ada identitas ujian yang aktif.');
        }

        $namaLengkapTerpakai = DaftarPengawasUjian::where('kode_ujian', $identitasUjian->kode_ujian)
            ->pluck('nama_lengkap')
            ->toArray();

        $personils = PersonilSekolah::select('id_personil', 'nip', 'gelardepan', 'namalengkap', 'gelarbelakang')
            ->where('jenispersonil', 'Guru')
            ->orderBy('id_personil', 'asc')
            ->orderBy('nip', 'desc')
            ->where('aktif', 'Aktif')
            ->whereNotIn(DB::raw("CONCAT_WS(' ', gelardepan, namalengkap, gelarbelakang)"), $namaLengkapTerpakai)
            ->get();


        // Ambil daftar pengawas yang sudah terpakai untuk ujian ini
        $pengawasTerpakai = DaftarPengawasUjian::where('kode_ujian', $identitasUjian->kode_ujian)
            ->pluck('kode_pengawas')
            ->toArray();

        return view(
            'pages.kurikulum.perangkatujian.adminujian.crud-pengawas-ujian-tambah-form',
            compact('personils', 'identitasUjian', 'pengawasTerpakai', 'namaLengkapTerpakai')
        );
    }

    public function simpanpengawasMassal(Request $request)
    {
        $kodeUjian = $request->input('kode_ujian');
        $kodePengawasList = $request->input('kode_pengawas', []);
        $nips = $request->input('nip', []);
        $namaLengkaps = $request->input('nama_lengkap', []);

        // Gabungkan input manual (jika kode_pengawas terisi)
        if ($request->manual_kode_pengawas) {
            foreach ($request->manual_kode_pengawas as $key => $kode) {
                if ($kode) {
                    // Gunakan indeks unik, misalnya 'manual_0', 'manual_1', dst
                    $manualKey = 'manual_' . $key;

                    $kodePengawasList[$manualKey] = $kode;
                    $nips[$manualKey] = $request->manual_nip[$key] ?? null;
                    $namaLengkaps[$manualKey] = $request->manual_nama_lengkap[$key] ?? null;
                }
            }
        }

        // Cek duplikat kode_pengawas
        $semuaKodePengawas = array_filter(array_values($kodePengawasList));
        $duplikat = array_diff_assoc($semuaKodePengawas, array_unique($semuaKodePengawas));
        if (count($duplikat) > 0) {
            return redirect()->back()->with('error', 'Terdapat kode pengawas yang duplikat. Harap periksa kembali.');
        }

        // Simpan semua pengawas (otomatis & manual)
        foreach ($kodePengawasList as $id => $kodePengawas) {
            if ($kodePengawas) {
                // Cek apakah sudah ada di database
                $cek = DaftarPengawasUjian::where('kode_ujian', $kodeUjian)
                    ->where('kode_pengawas', $kodePengawas)
                    ->exists();

                if ($cek) {
                    return redirect()->back()->with('error', 'Kode pengawas ' . $kodePengawas . ' sudah digunakan.');
                }

                DaftarPengawasUjian::create([
                    'kode_ujian'    => $kodeUjian,
                    'kode_pengawas' => $kodePengawas,
                    'nip'           => $nips[$id] ?? null,
                    'nama_lengkap'  => $namaLengkaps[$id] ?? null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data pengawas berhasil disimpan.');
    }
}
