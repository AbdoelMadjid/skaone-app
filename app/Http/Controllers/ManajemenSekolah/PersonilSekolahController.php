<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\PersonilSekolahDataTable;
use App\Helpers\ImageHelper;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\PersonilSekolahRequest;
use App\Models\AppSupport\Referensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Support\Str;

class PersonilSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PersonilSekolahDataTable $personilSekolah)
    {
        // Ambil data untuk dropdown jenis personil
        $jenisPersonilOptions = PersonilSekolah::select('jenispersonil')
            ->distinct()
            ->pluck('jenispersonil')
            ->toArray();

        // Ambil data untuk dropdown status
        $statusOptions = [
            'Aktif',
            'Tidak Aktif',
            'Pensiun',
            'Pindah',
            'Keluar'
        ];
        return $personilSekolah->render('pages.manajemensekolah.personil.personil-sekolah', [
            'jenisPersonilOptions' => $jenisPersonilOptions,
            'statusOptions' => $statusOptions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        return view('pages.manajemensekolah.personil.personil-sekolah-form', [
            'data' => new PersonilSekolah(),
            'agamaOptions' => $agamaOptions,
            'action' => route('manajemensekolah.personil-sekolah.store')

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonilSekolahRequest $request)
    {
        $personilSekolah = new PersonilSekolah($request->except(['photo']));

        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('photo'),
                directory: 'images/personil',
                oldFileName: $personilSekolah->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pgw_'
            );

            $personilSekolah->photo = $imageName;
        }

        $personilSekolah->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonilSekolah $personilSekolah)
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        return view('pages.manajemensekolah.personil.personil-sekolah-form', [
            'data' => $personilSekolah,
            'agamaOptions' => $agamaOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonilSekolah $personilSekolah)
    {
        $agamaOptions = Referensi::where('jenis', 'Agama')->pluck('data', 'data')->toArray();
        return view('pages.manajemensekolah.personil.personil-sekolah-form', [
            'data' => $personilSekolah,
            'agamaOptions' => $agamaOptions,
            'action' => route('manajemensekolah.personil-sekolah.update', $personilSekolah->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonilSekolahRequest $request, PersonilSekolah $personilSekolah)
    {
        // Proses file foto jika ada yang diunggah
        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('photo'),
                directory: 'images/personil',
                oldFileName: $personilSekolah->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pgw_'
            );

            $personilSekolah->photo = $imageName;
        }

        // Isi atribut lain dari request kecuali 'photo'
        $personilSekolah->fill($request->except('photo'));

        // Simpan model dengan atribut yang telah diubah
        $personilSekolah->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonilSekolah $personilSekolah)
    {
        $personilSekolah->delete();

        return responseSuccessDelete();
    }

    public function generateAkun(Request $request)
    {
        $request->validate([
            'selected_personil_ids' => 'required', // Validasi bahwa id harus ada
        ]);

        $personilIds = $request->input('selected_personil_ids'); // Mendapatkan daftar ID personil yang dipilih
        $personilIdsArray = explode(',', $personilIds); // Mengubah string menjadi array

        foreach ($personilIdsArray as $id_personil) {
            $personil = PersonilSekolah::find($id_personil);

            if ($personil) {
                // Cek jika email sudah ada di tabel users
                $existingUser = User::where('email', $personil->kontak_email)->first();

                // Jika akun sudah ada, abaikan dan lanjut ke yang berikutnya
                if ($existingUser) {
                    continue; // Abaikan akun yang sudah ada
                }

                // Lakukan proses pembuatan akun
                $user = User::create([
                    'name' => $personil->namalengkap,
                    'avatar' => "personil.jpg",
                    'email' => $personil->kontak_email,
                    'password' => Hash::make('Siliwangi30'), // Atau bisa menggunakan password generator
                    'personal_id' => $personil->id_personil, // Menyimpan id_personil ke personil_id di tabel users
                ]);

                // Assign role berdasarkan jenispersonil
                switch ($personil->jenispersonil) {
                    case 'Kepala Sekolah':
                        $user->assignRole('kepsek');
                        break;
                    case 'Guru':
                        $user->assignRole('guru');
                        break;
                    case 'Tata Usaha':
                        $user->assignRole('tatausaha');
                        break;
                }

                // Update status jika akun sudah dibuat
                $personil->update(['akun_terbuat' => true]);
            }
        }

        return redirect()->back()->with('success', 'Akun berhasil dibuat untuk personil yang belum memiliki akun.');
    }



    /**
     * IMPOR DAN EXSPOR DATA EXCEL.
     */
    // Metode untuk ekspor data ke Excel
    public function ps_exportExcel()
    {
        $personilsekolahs = PersonilSekolah::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul di baris pertama
        $sheet->setCellValue('A1', 'DATA PERSONIL SEKOLAH');
        $sheet->mergeCells('A1:N1'); // Menggabungkan sel dari A1 sampai L1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Membuat judul tebal
        $sheet->getStyle('A1')->getFont()->setSize(14); // Mengatur ukuran font
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Membuat baris kedua kosong
        $sheet->setCellValue('A2', '');

        // Menambahkan header/kolom di baris ketiga
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'NIP');
        $sheet->setCellValue('C3', 'Gelar Depan');
        $sheet->setCellValue('D3', 'Nama Lengkap');
        $sheet->setCellValue('E3', 'Gelar Belakang');
        $sheet->setCellValue('F3', 'Jenis Kelamin');
        $sheet->setCellValue('G3', 'Jenis Personil');
        $sheet->setCellValue('H3', 'Tempat Lahir');
        $sheet->setCellValue('I3', 'Tanggal Lahir');
        $sheet->setCellValue('J3', 'Agama');
        $sheet->setCellValue('K3', 'Email');
        $sheet->setCellValue('L3', 'No. Handphone');
        $sheet->setCellValue('M3', 'Photo');
        $sheet->setCellValue('N3', 'Aktif');

        $sheet->getStyle('A3:N3')->getFont()->setBold(true); // Membuat header tebal
        $sheet->getStyle('A3:N3')->getAlignment()->setHorizontal('center'); // Meratakan teks di tengah
        $sheet->getStyle('A3:N3')->getBorders()->getAllBorders()->setBorderStyle('thin'); // Menambahkan border

        // Mengatur lebar kolom A hingga L kecuali kolom I
        /* foreach (range('A', 'L') as $columnID) {
            if ($columnID !== 'I') {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
        } */
        $sheet->getColumnDimension('A', 'N')->setAutoSize(true);

        // Mengatur lebar kolom I secara manual agar sesuai dengan judul kolom
        $sheet->getColumnDimension('I')->setWidth(15); // Sesuaikan dengan lebar teks header "Semester 3"


        // Mengatur tinggi baris judul kolom menjadi 25 piksel
        $sheet->getRowDimension(3)->setRowHeight(25);

        // Mengatur teks pada header agar berada di tengah secara vertikal dan horizontal
        $sheet->getStyle('A3:N3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A3:N3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Menambahkan data mulai dari baris keempat
        $row = 4;
        foreach ($personilsekolahs as $personilsekolah) {
            $sheet->setCellValue('A' . $row, $personilsekolah->id_personil);
            $sheet->setCellValue('B' . $row, $personilsekolah->nip);
            $sheet->setCellValue('C' . $row, $personilsekolah->gelardepan);
            $sheet->setCellValue('D' . $row, $personilsekolah->namalengkap);
            $sheet->setCellValue('E' . $row, $personilsekolah->gelarbelakang);
            $sheet->setCellValue('F' . $row, $personilsekolah->jeniskelamin);
            $sheet->setCellValue('G' . $row, $personilsekolah->jenispersonil);
            $sheet->setCellValue('H' . $row, $personilsekolah->tempatlahir);
            $sheet->setCellValue('I' . $row, $personilsekolah->tanggallahir);
            $sheet->setCellValue('J' . $row, $personilsekolah->agama);
            $sheet->setCellValue('K' . $row, $personilsekolah->kontak_email);
            $sheet->setCellValue('L' . $row, $personilsekolah->kontak_hp);
            $sheet->setCellValue('M' . $row, $personilsekolah->photo);
            $sheet->setCellValue('N' . $row, $personilsekolah->aktif);

            // Menambahkan border untuk setiap sel dalam baris
            $sheet->getStyle('A' . $row . ':N' . $row)
                ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            /* $sheet->getStyle('A' . $row . ':D' . $row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('G' . $row . ':L' . $row)->getAlignment()->setHorizontal('center'); */

            $row++;
        }

        /* // Menambahkan satu baris kosong setelah data terakhir
        $row++;

        // Menambahkan tanggal hari ini dan keterangan di baris berikutnya
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
        /* $sheet->getStyle('A1:L' . $row) // Rentang dari A1 sampai ke baris terakhir yang diisi
            ->getFont()->setName('Times New Roman')->setSize(12); */

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'PersonilSekolah.xlsx';
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Return response untuk download file
        return response()->download($filePath);
    }

    // Metode untuk impor data dari Excel
    public function importExcel(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        try {
            DB::beginTransaction();

            // Load the uploaded file
            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getRealPath());

            // Get the first worksheet in the Excel file
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Loop through the rows, starting from the second row (to skip headers)
            foreach ($rows as $index => $row) {
                if ($index == 0) continue; // Skip the header row

                // Insert each row into the database
                PersonilSekolah::create([
                    'nip' => $row[0],
                    'gelardepan' => $row[1],
                    'namalengkap' => $row[2],
                    'gelarbelakang' => $row[3],
                    'jeniskelamin' => $row[4],
                    'jenispersonil' => $row[5],
                    'tempatlahir' => $row[6],
                    'tanggallahir' => $row[7],
                    'agama' => $row[8],
                    'kontak_email' => $row[9],
                    'kontak_hp' => $row[10],
                    'photo' => $row[11],
                    'aktif' => $row[12],
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error importing the data: ' . $e->getMessage());
        }
    }
}
