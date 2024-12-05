<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\PesertaDidikDataTable;
use App\Exports\PesertaDidikExport;
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

        return $pesertaDidikDataTable->render('pages.manajemensekolah.peserta-didik', [
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
        return view('pages.manajemensekolah.peserta-didik-form', [
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

        // Check if a new icon is uploaded
        if ($request->hasFile('foto')) {
            // Delete the old icon if it exists
            if ($pesertaDidik->foto) {
                $oldIconPath = base_path('images/peserta_didik' . $pesertaDidik->foto);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }
            // Upload the new icon
            $pesertaDidikFile = $request->file('foto');
            $pesertaDidikName = time() . '_' . $pesertaDidikFile->getClientOriginalName();
            $pesertaDidikFile->move(base_path('images/peserta_didik'), $pesertaDidikName);
            $pesertaDidik->foto = $pesertaDidikName;
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
        return view('pages.manajemensekolah.peserta-didik-form', [
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
        return view('pages.manajemensekolah.peserta-didik-form', [
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
        // Proses file foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pesertaDidik->foto) {
                $oldPhotoPath = base_path('images/peserta_didik/' . $pesertaDidik->foto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Unggah foto baru
            $appPhotoFile = $request->file('foto');
            $appPhotoName = time() . '_' . $appPhotoFile->getClientOriginalName();
            $appPhotoFile->move(base_path('images/peserta_didik/'), $appPhotoName);

            // Setel nama file baru pada model
            $pesertaDidik->foto = $appPhotoName;
        }

        // Cek perubahan pada nama_lengkap dan kontak_email
        $isNameChanged = $pesertaDidik->nama_lengkap !== $request->input('nama_lengkap');
        $isEmailChanged = $pesertaDidik->kontak_email !== $request->input('kontak_email');


        // Isi atribut lain dari request kecuali 'foto'
        $pesertaDidik->fill($request->except('foto'));
        $pesertaDidik->save();

        // Update data di tabel users jika nama_lengkap atau kontak_email berubah
        if ($isNameChanged || $isEmailChanged) {
            $user = User::where('nis', $pesertaDidik->nis)->first();

            if ($user) {
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
    public function destroy(PesertaDidik $pesertaDidik)
    {
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
}
