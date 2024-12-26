<?php

namespace App\Http\Controllers\AppSupport;

use App\Models\AppSupport\BackupDb;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSupport\BackupDbRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BackupDbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = DB::select('SHOW TABLES');
        // Mendapatkan daftar file .sql yang sudah di-backup

        $backupFiles = collect(scandir(storage_path('backups/' . now()->format('Y-m-d'))))
            ->filter(function ($file) {
                return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
            })
            ->values();

        return view('pages.appsupport.backup-db', compact('tables', 'backupFiles'));
    }

    public function backupSelectedTables(Request $request)
    {
        $tables = $request->input('tables');

        if (empty($tables)) {
            return redirect()->back()->with('error', 'Tidak ada tabel yang dipilih.');
        }

        $availableTables = array_map(
            fn($table) => current((array) $table),
            DB::select('SHOW TABLES')
        );

        foreach ($tables as $table) {
            if (!in_array($table, $availableTables)) {
                return redirect()->back()->with('error', "Tabel '$table' tidak valid.");
            }
        }

        $backupDir = storage_path('backups/' . now()->format('Y-m-d'));
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $successful = [];
        $failed = [];

        foreach ($tables as $table) {
            $fileName = $backupDir . "/backup-{$table}.sql";
            $sqlContent = '';

            try {
                // Ambil struktur tabel
                $columns = DB::getSchemaBuilder()->getColumnListing($table);
                $createTableQuery = "DROP TABLE IF EXISTS `{$table}`;\n";
                $createTableQuery .= "CREATE TABLE `{$table}` (\n";

                // Ambil detail kolom
                foreach ($columns as $column) {
                    $columnDetails = DB::select("SHOW COLUMNS FROM `{$table}` LIKE '{$column}'")[0];
                    $createTableQuery .= "`{$column}` {$columnDetails->Type},\n";
                }

                $createTableQuery = rtrim($createTableQuery, ",\n") . "\n);";

                // Menambahkan CREATE TABLE query ke SQL content
                $sqlContent .= $createTableQuery . "\n\n";

                // Ambil data dari tabel dan buat query INSERT
                $rows = DB::table($table)->get();
                foreach ($rows as $row) {
                    $values = [];
                    foreach ($columns as $column) {
                        $values[] = $this->quoteValue($row->$column);
                    }
                    $insertQuery = "INSERT INTO `{$table}` (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $values) . ");\n";
                    $sqlContent .= $insertQuery;
                }

                // Simpan hasil SQL ke file
                file_put_contents($fileName, $sqlContent);

                // Tandai backup berhasil
                $successful[] = $table;
            } catch (\Exception $e) {
                // Jika ada error, tandai sebagai gagal
                $failed[] = $table;
            }
        }

        if (!empty($successful)) {
            session()->flash('toast_success', 'Backup berhasil untuk tabel: ' . implode(', ', $successful));
        }

        if (!empty($failed)) {
            session()->flash('error', 'Backup gagal untuk tabel: ' . implode(', ', $failed));
        }

        return redirect()->back();
    }

    // Fungsi untuk mengutip nilai agar aman untuk SQL
    private function quoteValue($value)
    {
        if (is_null($value)) {
            return 'NULL';
        }

        if (is_bool($value)) {
            return $value ? 'TRUE' : 'FALSE';
        }

        return '"' . addslashes($value) . '"';
    }

    public function deleteBackupFile($fileName)
    {
        $filePath = storage_path('backups/' . now()->format('Y-m-d') . '/' . $fileName);

        if (file_exists($filePath)) {
            unlink($filePath);  // Menghapus file
            return redirect()->back()->with('toast_success', 'File backup berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
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
    public function store(BackupDbRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BackupDb $backupDb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BackupDb $backupDb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BackupDbRequest $request, BackupDb $backupDb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BackupDb $backupDb)
    {
        //
    }
}
