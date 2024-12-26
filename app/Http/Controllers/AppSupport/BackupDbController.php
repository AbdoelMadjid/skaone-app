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

        $backupDir = storage_path('backups/' . now()->format('Y-m-d'));
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        foreach ($tables as $table) {
            $fileName = $backupDir . "/backup-{$table}.sql";

            try {
                // Generate CREATE TABLE statement
                $createTableQuery = DB::select("SHOW CREATE TABLE `$table`")[0]->{'Create Table'};

                // Get data from the table
                $data = DB::table($table)->get();
                $columns = Schema::getColumnListing($table);

                // Generate INSERT INTO statement
                $insertValues = [];
                foreach ($data as $row) {
                    $values = array_map(
                        fn($value) => is_null($value) ? 'NULL' : "'" . addslashes($value) . "'",
                        (array) $row
                    );
                    $insertValues[] = '(' . implode(', ', $values) . ')';
                }

                $insertQuery = sprintf(
                    "INSERT INTO `%s` (`%s`) VALUES\n%s;",
                    $table,
                    implode('`, `', $columns),
                    implode(",\n", $insertValues)
                );

                // Combine CREATE TABLE and INSERT statements
                $sqlContent = $createTableQuery . ";\n\n--\n-- Dumping data for table `$table`\n--\n\n" . $insertQuery;

                // Save to file
                file_put_contents($fileName, $sqlContent);

                session()->flash('toast_success', "Backup berhasil untuk tabel: $table");
            } catch (\Exception $e) {
                session()->flash('error', "Backup gagal untuk tabel: $table. Error: " . $e->getMessage());
            }
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
