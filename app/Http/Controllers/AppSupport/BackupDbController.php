<?php

namespace App\Http\Controllers\AppSupport;

use App\Models\AppSupport\BackupDb;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSupport\BackupDbRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackupDbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = DB::select('SHOW TABLES');

        return view('pages.appsupport.backup-db', compact('tables'));
    }

    public function backupSelectedTables(Request $request)
    {
        $tables = $request->input('tables');

        if (empty($tables)) {
            return redirect()->back()->with('error', 'Tidak ada tabel yang dipilih.');
        }

        foreach ($tables as $table) {
            $count = DB::table($table)->count();

            if ($count == 0) {
                // Informasi bahwa tabel kosong (jika diperlukan)
                continue;
            }

            // Lanjutkan dengan proses backup meskipun kosong
            $fileName = storage_path("app/backup-{$table}.sql");

            $command = sprintf(
                'mysqldump --user=%s --password=%s --host=%s %s %s > %s',
                env('DB_USERNAME'),
                env('DB_PASSWORD'),
                env('DB_HOST'),
                env('DB_DATABASE'),
                $table,
                $fileName
            );

            exec($command);
        }

        return redirect()->back()->with('success', 'Backup berhasil dibuat untuk tabel yang dipilih.');
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
