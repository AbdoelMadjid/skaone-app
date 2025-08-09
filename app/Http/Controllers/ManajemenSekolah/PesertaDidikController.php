<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\PesertaDidikDataTable;
use App\Exports\PesertaDidikExport;
use App\Helpers\ImageHelper;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\PesertaDidikRequest;
use App\Imports\PesertaDidikImport;
use App\Models\AppSupport\Referensi;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PesertaDidikPerRombel;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesertaDidikDataTable $pesertaDidikDataTable)
    {
        // Ambil data untuk dropdown jenis personil
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        // Ambil data untuk dropdown status
        $jenkelOptions = [
            'Laki-laki',
            'Perempuan'
        ];

        // Hitung total hasil berdasarkan filter yang diterapkan
        $totalCount = PesertaDidik::when(request('idKK'), function ($query) {
            return $query->where('idkk', request('idKK'));
        })
            ->when(request('idJenkel'), function ($query) {
                return $query->where('jeniskelamin', request('idJenkel'));
            })
            ->count();

        //$rombels = RombonganBelajar::select('id', 'tahunajaran', 'rombel')->get();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'rombel')->toArray();

        $peserta_didiks = PesertaDidik::join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didiks.*', 'kompetensi_keahlians.nama_kk', 'kompetensi_keahlians.idkk')
            ->get()
            ->groupBy('idkk'); // Mengelompokkan berdasarkan idkk

        return $pesertaDidikDataTable->render('pages.manajemensekolah.pesertadidik.peserta-didik', [
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'jenkelOptions' => $jenkelOptions,
            'totalCount' => $totalCount,  // Kirim total hasil ke view
            'tahunAjaran' => $tahunAjaran,
            'rombonganBelajar' => $rombonganBelajar,
            'peserta_didiks' => $peserta_didiks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.manajemensekolah.pesertadidik.peserta-didik-form', [
            'data' => new PesertaDidik(),
            'tahunAjaran' => $tahunAjaran,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'agamaOptions' => $agamaOptions,
            'action' => route('manajemensekolah.peserta-didik.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesertaDidikRequest $request)
    {
        $pesertaDidik = new PesertaDidik($request->except(['foto']));

        if ($request->hasFile('foto')) {
            $imageFile = $request->file('foto');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('foto'),
                directory: 'images/peserta_didik',
                oldFileName: $pesertaDidik->foto ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pd_'
            );

            $pesertaDidik->foto = $imageName;
        }

        $pesertaDidik->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaDidik $pesertaDidik)
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.manajemensekolah.pesertadidik.peserta-didik-form', [
            'data' => $pesertaDidik,
            'tahunAjaran' => $tahunAjaran,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'agamaOptions' => $agamaOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaDidik $pesertaDidik)
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.manajemensekolah.pesertadidik.peserta-didik-form', [
            'data' => $pesertaDidik,
            'tahunAjaran' => $tahunAjaran,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'agamaOptions' => $agamaOptions,
            'action' => route('manajemensekolah.peserta-didik.update', $pesertaDidik->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PesertaDidikRequest $request, PesertaDidik $pesertaDidik)
    {
        $this->validate($request, [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        $imageName = $pesertaDidik->foto; // Nama foto default (sebelum diubah)
        $isPhotoUpdated = false; // Untuk melacak apakah foto diperbarui

        if ($request->hasFile('foto')) {
            $imageFile = $request->file('foto');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('foto'),
                directory: 'images/peserta_didik',
                oldFileName: $pesertaDidik->foto ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pd_'
            );

            $pesertaDidik->foto = $imageName;
            $isPhotoUpdated = true;
        }

        // Cek perubahan nama atau email
        $isNameChanged = $pesertaDidik->nama_lengkap !== $request->input('nama_lengkap');
        $isEmailChanged = $pesertaDidik->kontak_email !== $request->input('kontak_email');

        // Perbarui data di `peserta_didik`
        $pesertaDidik->fill($request->except('foto'));
        $pesertaDidik->foto = $imageName; // Perbarui nama foto jika ada
        $pesertaDidik->save();

        // Perbarui data di tabel `users` sesuai kondisi
        $user = User::where('nis', $pesertaDidik->nis)->first();
        if ($user) {
            // Periksa apakah avatar berbeda dengan foto
            $isAvatarDifferent = $user->avatar !== $imageName;

            // Opsi 1: Jika foto diperbarui, avatar selalu diupdate
            // Opsi 2: Jika foto dan avatar berbeda, sinkronkan avatar dengan foto
            if ($isPhotoUpdated || $isAvatarDifferent) {
                $user->update([
                    'name' => $request->input('nama_lengkap'),
                    'email' => $request->input('kontak_email'),
                    'avatar' => $imageName, // Sinkronkan avatar dengan foto
                ]);
            } else {
                // Jika hanya nama atau email yang berubah
                if ($isNameChanged || $isEmailChanged) {
                    $user->update([
                        'name' => $request->input('nama_lengkap'),
                        'email' => $request->input('kontak_email'),
                    ]);
                }
            }
        }

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaDidik $pesertaDidik)
    {
        if ($pesertaDidik->foto) {
            $imagePath = base_path('images/peserta_didik/' . $pesertaDidik->foto);
            // Periksa dan hapus file image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $pesertaDidik->delete();

        return responseSuccessDelete();
    }

    public function getRombel(Request $request)
    {
        $rombels = RombonganBelajar::where('tahunajaran', $request->tahunajaran)
            ->where('id_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->get();

        return response()->json($rombels);
    }


    // Method untuk distribusi siswa yang di ceklist ke rombel
    public function simpandistribusi(Request $request)
    {
        // Validasi input
        $request->validate([
            'selected_siswa_ids' => 'required',
            'tahun_ajaran' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
            'kode_rombel' => 'required',
            'rombel' => 'required',
        ]);

        // Ambil daftar ID siswa yang dipilih
        $selectedSiswaIds = explode(',', $request->input('selected_siswa_ids'));

        // Data lainnya dari form
        $tahunAjaran = $request->input('tahun_ajaran');
        $kodeKK = $request->input('kode_kk');
        $tingkat = $request->input('tingkat');
        $kodeRombel = $request->input('kode_rombel');
        $rombel = $request->input('rombel');

        // Loop dan simpan setiap siswa ke dalam tabel peserta_didik_per_kelas
        foreach ($selectedSiswaIds as $siswaId) {
            $pesertaDidik = PesertaDidik::find($siswaId);

            if ($pesertaDidik) {
                PesertaDidikRombel::create([
                    'tahun_ajaran' => $tahunAjaran,
                    'kode_kk' => $kodeKK,
                    'rombel_tingkat' => $tingkat,
                    'rombel_kode' => $kodeRombel,
                    'rombel_nama' => $rombel,
                    'nis' => $pesertaDidik->nis,
                ]);
            }
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('success', 'Siswa berhasil didistribusikan ke rombel.');
    }


    // eksport excel pakai maatwebsite/excel
    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new PesertaDidikImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }

    public function exportExcel()
    {
        return Excel::download(new PesertaDidikExport, 'peserta_didik.xlsx');
    }



    // Metode untuk ekspor data ke Excel
    public function pdexportExcel()
    {
        $pesertadidiks = PesertaDidik::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul di baris pertama
        $sheet->setCellValue('A1', 'Data Peserta Didik');
        $sheet->mergeCells('A1:Q1'); // Menggabungkan sel dari A1 sampai L1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Membuat judul tebal
        $sheet->getStyle('A1')->getFont()->setSize(14); // Mengatur ukuran font
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Membuat baris kedua kosong
        $sheet->setCellValue('A2', '');

        // Menambahkan header/kolom di baris ketiga
        $sheet->setCellValue('A3', 'NO.');
        $sheet->setCellValue('B3', 'NIS');
        $sheet->setCellValue('C3', 'NISN');
        $sheet->setCellValue('D3', 'TA Masuk');
        $sheet->setCellValue('E3', 'Kode KK');
        $sheet->setCellValue('F3', 'Nama Lengkap');
        $sheet->setCellValue('G3', 'Tempat/Tgl Laihr');
        $sheet->setCellValue('H3', 'Jenis Kelamin');
        $sheet->setCellValue('I3', 'Agama');
        $sheet->setCellValue('J3', 'Status Dalam Keluarga');
        $sheet->setCellValue('K3', 'Anak Ke-');
        $sheet->setCellValue('L3', 'Sekolah Asal');
        $sheet->setCellValue('M3', 'DIterima kelas');
        $sheet->setCellValue('N3', 'Diterima Tanggal');
        $sheet->setCellValue('O3', 'Asal SMP/MTs');
        $sheet->setCellValue('P3', 'Keterangan Pindah');
        $sheet->setCellValue('Q3', 'Status Aktif');
        $sheet->setCellValue('R3', 'Alasan Status');
        $sheet->setCellValue('S3', 'No. HP');
        $sheet->setCellValue('T3', 'Email');
        $sheet->setCellValue('U3', 'Photo');
        $sheet->setCellValue('V3', 'Alamat Lengkap');

        $sheet->getStyle('A3:V3')->getFont()->setBold(true); // Membuat header tebal
        $sheet->getStyle('A3:V3')->getAlignment()->setHorizontal('center'); // Meratakan teks di tengah
        $sheet->getStyle('A3:V3')->getBorders()->getAllBorders()->setBorderStyle('thin'); // Menambahkan border

        // Mengatur tinggi baris judul kolom menjadi 25 piksel
        $sheet->getRowDimension(3)->setRowHeight(25);

        // Mengatur teks pada header agar berada di tengah secara vertikal dan horizontal
        $sheet->getStyle('A3:V3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A3:V3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Mengatur lebar kolom A hingga L kecuali kolom I
        /* foreach (range('A', 'L') as $columnID) {
            if ($columnID !== 'I') {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
        } */

        // Mengatur lebar kolom I secara manual agar sesuai dengan judul kolom
        //$sheet->getColumnDimension('I')->setWidth(15); // Sesuaikan dengan lebar teks header "Semester 3"


        // Menambahkan data mulai dari baris keempat
        $row = 4;
        $no = 1; // Inisialisasi variabel untuk nomor otomatis

        foreach ($pesertadidiks as $pesertadidik) {

            // Format tanggal dari database
            $tgl_lahir = Carbon::parse($pesertadidik->tanggal_lahir)->translatedFormat('d F Y');
            $alamat = '';

            if ($pesertadidik->alamat_blok) {
                $alamat .= 'Blok ' . $pesertadidik->alamat_blok . ' ';
            }

            $alamat .= 'No. ' . $pesertadidik->alamat_norumah . ', RT ' . $pesertadidik->alamat_rt . ' / RW ' . $pesertadidik->alamat_rw;
            $alamat .= ', ' . $pesertadidik->alamat_desa . ', ' . $pesertadidik->alamat_kec;
            $alamat .= ', ' . $pesertadidik->alamat_kab . ' - ' . $pesertadidik->alamat_kodepos;


            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $pesertadidik->nis);
            $sheet->setCellValue('C' . $row, $pesertadidik->nisn);
            $sheet->setCellValue('D' . $row, $pesertadidik->thnajaran_masuk);
            $sheet->setCellValue('E' . $row, $pesertadidik->kode_kk);
            $sheet->setCellValue('F' . $row, $pesertadidik->nama_lengkap);
            $sheet->setCellValue('G' . $row, $pesertadidik->tempat_lahir . ', ' . $tgl_lahir);
            $sheet->setCellValue('H' . $row, $pesertadidik->jenis_kelamin);
            $sheet->setCellValue('I' . $row, $pesertadidik->agama);
            $sheet->setCellValue('J' . $row, $pesertadidik->status_dalam_kel);
            $sheet->setCellValue('K' . $row, $pesertadidik->anak_ke);
            $sheet->setCellValue('L' . $row, $pesertadidik->sekolah_asal);
            $sheet->setCellValue('M' . $row, $pesertadidik->diterima_kelas);
            $sheet->setCellValue('N' . $row, $pesertadidik->diterima_tanggal);
            $sheet->setCellValue('O' . $row, $pesertadidik->asalsiswa);
            $sheet->setCellValue('P' . $row, $pesertadidik->keterangan_pindah);
            $sheet->setCellValue('Q' . $row, $pesertadidik->status);
            $sheet->setCellValue('R' . $row, $pesertadidik->alasan_status);
            $sheet->setCellValue('S' . $row, "'" . $pesertadidik->kontak_telepon);
            $sheet->setCellValue('T' . $row, $pesertadidik->kontak_email);
            $sheet->setCellValue('U' . $row, $pesertadidik->foto);
            $sheet->setCellValue('V' . $row, $alamat);

            // Menambahkan border untuk setiap sel dalam baris
            $sheet->getStyle('A' . $row . ':V' . $row)
                ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            // Menambahkan format center secara horizontal
            $sheet->getStyle('A' . $row . ':C' . $row)->getAlignment()->setHorizontal('center');
            //$sheet->getStyle('G' . $row . ':L' . $row)->getAlignment()->setHorizontal('center');

            $no++;
            $row++;
        }

        // Menambahkan satu baris kosong setelah data terakhir
        $row++;

        /* // Menambahkan tanggal hari ini dan keterangan di baris berikutnya
        $sheet->setCellValue('I' . $row, 'Majalengka, ' . now()->format('d F Y'));
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan teks "Wakil Kepala Sekolah Bidang Kurikulum"
        $row++;
        $sheet->setCellValue('I' . $row, 'Wakil Kepala Sekolah Bidang Kurikulum');
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan 3 baris kosong
        $row += 3;

        // Menambahkan teks "ABDUL MADJID, S.Pd., M.Pd."
        $sheet->setCellValue('I' . $row, 'ABDUL MADJID, S.Pd., M.Pd.');
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan teks NIP
        $row++;
        $sheet->setCellValue('I' . $row, 'NIP. 197611282000121002');
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); */

        // Setelah semua data diisi, terapkan pengaturan font untuk seluruh sheet
        /* $sheet->getStyle('A1:V' . $row) // Rentang dari A1 sampai ke baris terakhir yang diisi
            ->getFont()->setName('Arial Narrow')->setSize(11); */

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'PesertaDidik.xlsx';
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Return response untuk download file
        return response()->download($filePath);
    }

    // Metode untuk impor data dari Excel
    public function pdimportExcel(Request $request)
    {
        // Validate file
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        // Capture the uploaded file
        $file = $request->file('file');
        $filePath = $file->store('temp'); // Store file in storage/app/temp

        try {
            // Load the spreadsheet
            $spreadsheet = IOFactory::load(storage_path('app/' . $filePath));
            $sheet = $spreadsheet->getActiveSheet();
            $row = 2; // Start from the second row (first row is usually the header)

            // Prepare an array to hold the data for batch insert
            $dataToInsert = [];

            // Loop through the rows and process data
            while ($sheet->getCell('A' . $row)->getValue() != '') {
                $namaLengkap = strtolower(str_replace(' ', '_', $sheet->getCell('F' . $row)->getValue()));
                $email = $namaLengkap . '@skaone.com';

                $dataToInsert[] = [
                    'nis' => $sheet->getCell('B' . $row)->getValue(),
                    'nisn' => $sheet->getCell('C' . $row)->getValue(),
                    'thnajaran_masuk' => $sheet->getCell('D' . $row)->getValue(),
                    'kode_kk' => $sheet->getCell('E' . $row)->getValue(),
                    'nama_lengkap' => $sheet->getCell('F' . $row)->getValue(),
                    'tempat_lahir' => $sheet->getCell('G' . $row)->getValue(),
                    'tanggal_lahir' => $sheet->getCell('H' . $row)->getValue(),
                    'jenis_kelamin' => $sheet->getCell('I' . $row)->getValue(),
                    'agama' => $sheet->getCell('J' . $row)->getValue(),
                    'status_dalam_kel' => $sheet->getCell('K' . $row)->getValue(),
                    'anak_ke' => $sheet->getCell('L' . $row)->getValue(),
                    'sekolah_asal' => $sheet->getCell('M' . $row)->getValue(),
                    'diterima_kelas' => $sheet->getCell('N' . $row)->getValue(),
                    'diterima_tanggal' => $sheet->getCell('O' . $row)->getValue(),
                    'asalsiswa' => $sheet->getCell('P' . $row)->getValue(),
                    'keterangan_pindah' => $sheet->getCell('Q' . $row)->getValue(),
                    'alamat_blok' => $sheet->getCell('R' . $row)->getValue(),
                    'alamat_norumah' => $sheet->getCell('S' . $row)->getValue(),
                    'alamat_rt' => $sheet->getCell('T' . $row)->getValue(),
                    'alamat_rw' => $sheet->getCell('U' . $row)->getValue(),
                    'alamat_desa' => $sheet->getCell('V' . $row)->getValue(),
                    'alamat_kec' => $sheet->getCell('W' . $row)->getValue(),
                    'alamat_kab' => $sheet->getCell('X' . $row)->getValue(),
                    'alamat_kodepos' => $sheet->getCell('Y' . $row)->getValue(),
                    'kontak_telepon' => $sheet->getCell('Z' . $row)->getValue(),
                    'kontak_email' => $email,
                    'foto' => $sheet->getCell('AB' . $row)->getValue(),
                    'status' => $sheet->getCell('AC' . $row)->getValue(),
                    'alasan_status' => $sheet->getCell('AD' . $row)->getValue(),
                ];

                $row++;
            }

            // Insert the data in batches
            PesertaDidik::insert($dataToInsert); // Batch insert to reduce queries

            // Optionally, remove the uploaded file after processing
            Storage::delete($filePath);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (\Exception $e) {
            // Handle errors and delete the file if there's an error
            Storage::delete($filePath);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    public function uploadPesertaDidik(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file_excel');

        try {
            // Load file Excel
            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();

            // Iterasi setiap baris mulai dari baris kedua (mengabaikan header)
            $data = [];
            foreach ($sheet->getRowIterator(2) as $row) {
                $rowIndex = $row->getRowIndex();

                $nis = $sheet->getCell("B{$rowIndex}")->getValue();
                $nisn = $sheet->getCell("C{$rowIndex}")->getValue();
                $thnajaran_masuk = $sheet->getCell("D{$rowIndex}")->getValue();
                $kode_kk = $sheet->getCell("E{$rowIndex}")->getValue();
                $nama_lengkap = $sheet->getCell("F{$rowIndex}")->getValue();
                $tempat_lahir = $sheet->getCell("G{$rowIndex}")->getValue();
                $tanggal_lahir = $sheet->getCell("H{$rowIndex}")->getValue();
                $jenis_kelamin = $sheet->getCell("I{$rowIndex}")->getValue();
                $agama = $sheet->getCell("J{$rowIndex}")->getValue();
                $status_dalam_kel = $sheet->getCell("K{$rowIndex}")->getValue();
                $anak_ke = $sheet->getCell("L{$rowIndex}")->getValue();
                $sekolah_asal = $sheet->getCell("M{$rowIndex}")->getValue();
                $diterima_kelas = $sheet->getCell("N{$rowIndex}")->getValue();
                $diterima_tanggal = $sheet->getCell("O{$rowIndex}")->getValue();
                $asalsiswa = $sheet->getCell("P{$rowIndex}")->getValue();
                $keterangan_pindah = $sheet->getCell("Q{$rowIndex}")->getValue();
                $alamat_blok = $sheet->getCell("R{$rowIndex}")->getValue();
                $alamat_norumah = $sheet->getCell("S{$rowIndex}")->getValue();
                $alamat_rt = $sheet->getCell("T{$rowIndex}")->getValue();
                $alamat_rw = $sheet->getCell("U{$rowIndex}")->getValue();
                $alamat_desa = $sheet->getCell("V{$rowIndex}")->getValue();
                $alamat_kec = $sheet->getCell("W{$rowIndex}")->getValue();
                $alamat_kab = $sheet->getCell("X{$rowIndex}")->getValue();
                $alamat_kodepos = $sheet->getCell("Y{$rowIndex}")->getValue();
                $kontak_telepon = $sheet->getCell("Z{$rowIndex}")->getValue();
                // Skip kolom AA karena tidak dipakai
                $foto = $sheet->getCell("AB{$rowIndex}")->getValue();
                $status = $sheet->getCell("AC{$rowIndex}")->getValue();
                $alasan_status = $sheet->getCell("AD{$rowIndex}")->getValue();

                // Format email
                $nama_slug = strtolower(str_replace(' ', '_', $nama_lengkap));
                $email = $nama_slug . '@skaone.com';

                // Tambahkan ke array data
                $data[] = [
                    'nis' => $nis,
                    'nisn' => $nisn,
                    'thnajaran_masuk' => $thnajaran_masuk,
                    'kode_kk' => $kode_kk,
                    'nama_lengkap' => $nama_lengkap,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'agama' => $agama,
                    'status_dalam_kel' => $status_dalam_kel,
                    'anak_ke' => $anak_ke,
                    'sekolah_asal' => $sekolah_asal,
                    'diterima_kelas' => $diterima_kelas,
                    'diterima_tanggal' => $diterima_tanggal,
                    'asalsiswa' => $asalsiswa,
                    'keterangan_pindah' => $keterangan_pindah,
                    'alamat_blok' => $alamat_blok,
                    'alamat_norumah' => $alamat_norumah,
                    'alamat_rt' => $alamat_rt,
                    'alamat_rw' => $alamat_rw,
                    'alamat_desa' => $alamat_desa,
                    'alamat_kec' => $alamat_kec,
                    'alamat_kab' => $alamat_kab,
                    'alamat_kodepos' => $alamat_kodepos,
                    'kontak_telepon' => $kontak_telepon,
                    'kontak_email' => $email,
                    'foto' => $foto,
                    'status' => $status,
                    'alasan_status' => $alasan_status,
                ];
            }

            if (count($data) === 0) {
                return redirect()->back()->with('error', 'Tidak ada data yang bisa diimpor.');
            }

            // Insert data ke database
            PesertaDidik::insert($data);
            $jumlah = count($data);

            return redirect()->back()->with('success', "Data berhasil diimpor! Total baris: {$jumlah}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
