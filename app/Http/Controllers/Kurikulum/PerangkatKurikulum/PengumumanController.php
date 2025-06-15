<?php

namespace App\Http\Controllers\Kurikulum\PerangkatKurikulum;

use App\DataTables\Kurikulum\PerangkatKurikulum\PengumumanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatKurikulum\PengumumanRequest;
use App\Models\Kurikulum\PerangkatKurikulum\Pengumuman;
use App\Models\PengumumanJudul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = PengumumanJudul::with(['pengumumanTerkiniAktif.poin'])
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.kurikulum.perangkatkurikulum.pengumuman', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'status' => 'required|in:Y,N',
            'pengumuman' => 'required|array',
            'pengumuman.*.judul' => 'required|string|max:255',
            'pengumuman.*.urutan' => 'required|integer|min:1',
            'pengumuman.*.poin' => 'required|array|min:1',
            'pengumuman.*.poin.*' => 'required|string|max:1000',
        ]);

        DB::transaction(function () use ($request) {
            $judul = PengumumanJudul::create([
                'judul' => $request->judul,
                'status' => $request->status,
            ]);

            foreach ($request->pengumuman as $item) {
                $terkini = $judul->pengumumanTerkiniAktif()->create([
                    'judul' => $item['judul'],
                    'urutan' => $item['urutan'],
                ]);

                foreach ($item['poin'] as $isi) {
                    $terkini->poin()->create([
                        'isi' => $isi,
                    ]);
                }
            }
        });

        return redirect()->route('kurikulum.perangkatkurikulum.pengumuman.index')
            ->with('toast_success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $judul = PengumumanJudul::with('pengumumanTerkiniAktif.poin')->findOrFail($id);
        return view('pengumuman.index', compact('judul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'status' => 'required|in:Y,N',
            'pengumuman' => 'array',
            'pengumuman.*.judul' => 'required|string|max:255',
            'pengumuman.*.poin' => 'array',
            'pengumuman.*.poin.*' => 'required|string',
        ]);

        DB::transaction(function () use ($request, $id) {
            $judul = PengumumanJudul::findOrFail($id);
            $judul->update($request->only('judul', 'status'));

            foreach ($judul->pengumumanTerkiniAktif as $terkini) {
                $terkini->poin()->delete();
                $terkini->delete();
            }

            foreach ($request->pengumuman as $item) {
                $terkini = $judul->pengumumanTerkiniAktif()->create([
                    'judul' => $item['judul'],
                    'urutan' => $item['urutan'],
                ]);

                foreach ($item['poin'] as $isi) {
                    $terkini->poin()->create(['isi' => $isi]);
                }
            }
        });

        return redirect()->route('kurikulum.perangkatkurikulum.pengumuman.index')
            ->with('toast_success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $judul = PengumumanJudul::findOrFail($id);
            foreach ($judul->pengumumanTerkiniAktif as $terkini) {
                $terkini->poin()->delete();
                $terkini->delete();
            }
            $judul->delete();
        });

        return redirect()->route('kurikulum.perangkatkurikulum.pengumuman.index')
            ->with('toast_success', 'Pengumuman berhasil dihapus.');
    }

    public function show($id)
    {
        $judul = PengumumanJudul::with(['pengumumanTerkiniAktif.poin'])->findOrFail($id);

        return view('pages.kurikulum.perangkatkurikulum._detail', compact('judul'));
    }
}
