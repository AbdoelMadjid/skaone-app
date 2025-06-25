<?php

namespace App\Http\Controllers\About;

use App\Http\Requests\About\AboutRequest;
use App\Models\About\About;
use App\Http\Controllers\Controller;
use App\Models\About\DailyMessages;
use App\Models\About\FiturCoding;
use App\Models\About\Galery;
use App\Models\About\KumpulanFaq;
use App\Models\About\PhotoSlide;
use App\Models\About\Polling;
use App\Models\About\TeamPengembang;
use App\Models\AppSupport\Referensi;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fiturCodings = FiturCoding::all();
        $faqs = KumpulanFaq::all()->groupBy('kategori');
        $teamPengembang = TeamPengembang::all(); // Fetch all team members
        $photoSlides = PhotoSlide::all(); // Fetch all team members

        $categoryGalery = Referensi::where('jenis', 'KategoriGalery')->pluck('data', 'data')->toArray();
        $galleries = Galery::all();
        $dailyMessages = DailyMessages::all(); // Fetch data dari DailyMessage


        $pollings = Polling::with('questions.responses')->get();
        $pollingStats = [];
        $textResponses = [];

        foreach ($pollings as $polling) {
            foreach ($polling->questions as $question) {
                if ($question->question_type === 'multiple_choice') {
                    $stats = [];

                    for ($i = 1; $i <= 5; $i++) {
                        $stats[$i] = $question->responses->where('choice_answer', $i)->count();
                    }

                    $pollingStats[] = [
                        'question_id' => $question->id,
                        'question_text' => $question->question_text,
                        'answers' => $stats,
                    ];
                } elseif ($question->question_type === 'text') {
                    $responses = $question->responses->pluck('text_answer')->filter()->toArray();

                    $textResponses[] = [
                        'question_id' => $question->id,
                        'question_text' => $question->question_text,
                        'responses' => $responses,
                        'count' => count($responses),
                    ];
                }
            }
        }

        return view(
            'pages.about.about',
            [
                'faqs' => $faqs,
                'fiturCodings' => $fiturCodings,
                'teamPengembang' => $teamPengembang,
                'photoSlides' => $photoSlides,
                'categoryGalery' => $categoryGalery,
                'galleries' => $galleries,
                'dailyMessages' => $dailyMessages,
                'pollingStats' => $pollingStats,
                'textResponses' => $textResponses,
            ]
        );
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
    public function store(AboutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
