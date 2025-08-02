<?php

namespace App\Http\Controllers\AppSupport;

use App\Models\AppSupport\BackupDb;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSupport\BackupDbRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BackupDbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan daftar tabel
        $tables = DB::select('SHOW TABLES');
        $tables = array_map(fn($table) => current((array) $table), $tables);

        // Mendapatkan daftar file .sql yang sudah di-backup
        $backupDir = 'backups/' . now()->format('Y-m-d');
        $backupFiles = collect(Storage::files($backupDir))
            ->filter(fn($file) => pathinfo($file, PATHINFO_EXTENSION) === 'sql')
            ->map(fn($file) => basename($file))
            ->values();

        return view('pages.appsupport.backup-db', compact('tables', 'backupFiles'));
    }

    /**
     * Backup selected tables.
     */
    public function backupSelectedTables(Request $request)
    {
        $tables = $request->input('tables');

        if (empty($tables)) {
            return redirect()->back()->with('error', 'Tidak ada tabel yang dipilih.');
        }

        $backupDir = 'backups/' . now()->format('Y-m-d');
        if (!Storage::exists($backupDir)) {
            Storage::makeDirectory($backupDir, 0755, true);
        }

        foreach ($tables as $table) {
            $fileName = "$backupDir/backup-{$table}.sql";

            try {
                // Generate CREATE TABLE statement
                $createTableQuery = DB::select("SHOW CREATE TABLE `$table`")[0]->{'Create Table'};

                // Get data from the table
                $data = DB::table($table)->get();
                $columns = Schema::getColumnListing($table);

                // Handle empty tables
                if ($data->isEmpty()) {
                    $sqlContent = $createTableQuery . ";\n\n-- No data for table `$table` --\n";
                } else {
                    // Generate INSERT INTO statement
                    $insertValues = [];
                    foreach ($data as $row) {
                        $values = array_map(
                            fn($value) => DB::connection()->getPdo()->quote($value),
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

                    $sqlContent = $createTableQuery . ";\n\n--\n-- Dumping data for table `$table`\n--\n\n" . $insertQuery;
                }

                // Save to file
                Storage::put($fileName, $sqlContent);

                session()->flash('success', "Backup berhasil untuk tabel: $table");
            } catch (\Exception $e) {
                session()->flash('error', "Backup gagal untuk tabel: $table. Error: " . $e->getMessage());
            }
        }

        return redirect()->back();
    }

    /**
     * Delete a backup file.
     */
    public function deleteBackupFile($fileName)
    {
        $backupDir = 'backups/' . now()->format('Y-m-d');
        $filePath = "$backupDir/$fileName";

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return redirect()->back()->with('toast_success', 'File backup berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
