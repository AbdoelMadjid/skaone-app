<?php

namespace App\Http\Controllers;

use App\Models\WelcomeDataPersonil;
use Illuminate\Http\Request;

class SkaOneWelcomeController extends Controller
{
    public function artikel_guru_hebat()
    {
        return view('skaonewelcome.artikel-guru-hebat');
    }

    public function program()
    {
        return view('skaonewelcome.program');
    }

    public function future_students()
    {
        return view('skaonewelcome.future-students');
    }

    public function current_students()
    {
        return view('skaonewelcome.current-students');
    }

    public function faculty_and_staff()
    {
        $groupsPersonil = WelcomeDataPersonil::select('jenis_group', 'group_name')
            ->groupBy('jenis_group', 'group_name')
            ->get();

        $personilData = WelcomeDataPersonil::select(
            'welcome_data_personil.id',
            'welcome_data_personil.id_personil',
            'welcome_data_personil.jenis_group',
            'welcome_data_personil.group_name',
            'welcome_data_personil.image',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'welcome_data_personil.id_personil')
            ->orderBy('welcome_data_personil.jenis_group')
            ->get();

        return view('skaonewelcome.faculty-and-staff', compact('groupsPersonil', 'personilData'));
    }

    public function events()
    {
        return view('skaonewelcome.events');
    }

    public function alumni()
    {
        return view('skaonewelcome.alumni');
    }
}
