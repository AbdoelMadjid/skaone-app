<?php

namespace App\Http\Controllers\WaliKelas;

use App\DataTables\WaliKelas\WaliKelasDtSiswaDataTable;
use App\Helpers\ImageHelper;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Http\Controllers\Controller;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PesertaDidikOrtu;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use App\Models\WaliKelas\TitiMangsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IdentitasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WaliKelasDtSiswaDataTable $waliKelasDtSiswaDataTable)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

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

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Cek wali kelas
        if (!$waliKelas) {
            return redirect()->route('dashboard')->with('errorWaliKelas', 'Maaf, Anda belum ditetapkan sebagai <b>Wali Kelas</b> pada <b>tahun ajaran aktif</b>. Silakan hubungi operator atau admin sekolah.');
        }
        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                if ($semesterAktif === 'Ganjil') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 1;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 3;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 5;
                    }
                } elseif ($semesterAktif === 'Genap') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 2;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 4;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 6;
                    }
                }
            }
            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            $titiMangsaExists = TitiMangsa::where('kode_rombel', $waliKelas->kode_rombel)
                ->exists();

            // Jika data catwalikelas belum tersedia, redirect atau tampilkan halaman khusus
            if (! $titiMangsaExists) {
                return redirect()
                    ->route('walikelas.data-kelas.index')
                    ->with('warning', 'Titimangsa harus diisi terlebih dahulu agar bisa membuka menu Identitas Siswa');
            }

            // Ambil data siswa berdasarkan tahun ajaran, kode rombel, dan tingkat
            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
                ->get();

            // Ambil seluruh data dari tabel peserta_didik_ortus
            $ortuData = DB::table('peserta_didik_ortus')->get();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $ortuData = collect();    // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        $statusOrtuOptions = Referensi::where('jenis', 'StatusOrtu')->pluck('data', 'data')->toArray();

        return $waliKelasDtSiswaDataTable->render(
            'pages.walikelas.identitas-siswa',
            compact(
                'tahunAjaranAktif',
                'waliKelas',
                'personil',
                'semesterAngka',
                'kbmData',
                'siswaData',
                'ortuData',
                'statusOrtuOptions'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(PesertaDidik $identitasSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaDidik $identitasSiswa)
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        //$ortu = PesertaDidikOrtu::where('nis', $identitasSiswa->nis)->first();
        $ortu = PesertaDidikOrtu::firstOrNew(['nis' => $identitasSiswa->nis]);

        $pekerjaanOrtu = Referensi::where('jenis', 'Pekerjaan')->pluck('data', 'data')->toArray();
        $statusOrtuOptions = Referensi::where('jenis', 'StatusOrtu')->pluck('data', 'data')->toArray();

        return view('pages.walikelas.identitas-siswa-form', [
            'data' => $identitasSiswa,
            'tahunAjaran' => $tahunAjaran,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'agamaOptions' => $agamaOptions,
            'ortu' => $ortu,
            'pekerjaanOrtu' => $pekerjaanOrtu,
            'statusOrtuOptions' => $statusOrtuOptions,
            'action' => route('walikelas.identitas-siswa.update', $identitasSiswa->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaDidik $identitasSiswa)
    {
        // Validasi gambar jika diunggah
        $this->validate($request, [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        // Ambil nama foto lama sebagai default
        $imageName = $identitasSiswa->foto;
        $isPhotoUpdated = false;

        // Cek jika ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            $imageFile = $request->file('foto');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $imageFile,
                directory: 'images/peserta_didik',
                oldFileName: $identitasSiswa->foto ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pd_'
            );

            $isPhotoUpdated = true;
        }

        // Cek perubahan nama atau email
        $isNameChanged = $identitasSiswa->nama_lengkap !== $request->input('nama_lengkap');
        $isEmailChanged = $identitasSiswa->kontak_email !== $request->input('kontak_email');

        // Perbarui data peserta_didik
        $identitasSiswa->fill($request->except('foto'));
        $identitasSiswa->foto = $imageName;
        $identitasSiswa->save();

        // Perbarui data ortu
        PesertaDidikOrtu::updateOrCreate(
            ['nis' => $identitasSiswa->nis],
            $request->only([
                'status_ortu',
                'nm_ayah',
                'nm_ibu',
                'pekerjaan_ayah',
                'pekerjaan_ibu',
                'ortu_alamat_blok',
                'ortu_alamat_norumah',
                'ortu_alamat_rt',
                'ortu_alamat_rw',
                'ortu_alamat_desa',
                'ortu_alamat_kec',
                'ortu_alamat_kab',
                'ortu_alamat_kodepos',
                'ortu_kontak_telepon',
                'ortu_kontak_email'
            ])
        );

        // Perbarui data di tabel users
        $user = User::where('nis', $identitasSiswa->nis)->first();
        if ($user) {
            $isAvatarDifferent = $user->avatar !== $imageName;

            if ($isPhotoUpdated || $isAvatarDifferent) {
                $user->update([
                    'name' => $request->input('nama_lengkap'),
                    'email' => $request->input('kontak_email'),
                    'avatar' => $imageName,
                ]);
            } elseif ($isNameChanged || $isEmailChanged) {
                $user->update([
                    'name' => $request->input('nama_lengkap'),
                    'email' => $request->input('kontak_email'),
                ]);
            }
        }

        return responseSuccess(true);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaDidik $identitasSiswa)
    {
        //
    }
}
