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

            $command = sprintf(
                'mysqldump --user=%s --password=%s --host=%s %s %s > %s',
                escapeshellarg(env('DB_USERNAME')),
                escapeshellarg(env('DB_PASSWORD')),
                escapeshellarg(env('DB_HOST')),
                escapeshellarg(env('DB_DATABASE')),
                escapeshellarg($table),
                escapeshellarg($fileName)
            );

            exec($command, $output, $returnVar);

            if ($returnVar === 0) {
                $successful[] = $table;
            } else {
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
