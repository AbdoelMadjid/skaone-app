<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TranskripPesertaDidikController extends Controller
{
    public function index()
    {
        return view('pages.pesertadidik.transkrip-peserta-didik');
    }
}
