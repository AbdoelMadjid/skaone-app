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
use App\Models\About\Question;
use App\Models\About\Response;
use App\Models\About\TeamPengembang;
use App\Models\AppSupport\Referensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

        $pollings = Polling::with('questions')
            ->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->get();

        $user = Auth::user();
        $personal_id = $user->personal_id ?? null;

        // Ambil polling yang sudah dijawab user ini
        $respondedPollingIds = Response::where('user_id', $personal_id)
            ->whereHas('question', function ($q) {
                $q->select('id', 'polling_id');
            })
            ->with('question')
            ->get()
            ->pluck('question.polling_id')
            ->unique()
            ->toArray();

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
                'pollings' => $pollings,
                'respondedPollingIds' => $respondedPollingIds,
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

    public function submitPolling(Request $request)
    {
        // Cek user login
        $user = Auth::user();
        if (!$user || !$user->personal_id) {
            return back()->with('error', 'Anda belum login atau tidak memiliki ID personal.');
        }

        $personalId = $user->personal_id;

        // Validasi awal
        $validated = $request->validate([
            'polling_id' => 'required|exists:pollings,id',
            'answers' => 'required|array',
            'answers.*' => 'required',
        ]);

        $pollingId = $validated['polling_id'];

        // Cek apakah user sudah pernah menjawab polling ini
        $alreadyResponded = Response::where('user_id', $personalId)
            ->whereIn('question_id', function ($q) use ($pollingId) {
                $q->select('id')->from('questions')->where('polling_id', $pollingId);
            })->exists();

        if ($alreadyResponded) {
            return back()->with('error', 'Anda sudah mengisi polling ini sebelumnya.');
        }

        // Loop jawaban
        foreach ($validated['answers'] as $questionId => $answerValue) {
            $question = Question::find($questionId);
            if (!$question || $question->polling_id != $pollingId) {
                continue;
            }

            $responseData = [
                'question_id' => $questionId,
                'user_id' => $personalId,
            ];

            if ($question->question_type === 'multiple_choice') {
                $responseData['choice_answer'] = (int)$answerValue;
                $responseData['text_answer'] = null;
            } else {
                // Hitung jumlah kata
                $wordCount = str_word_count(strip_tags($answerValue));
                if ($wordCount < 15 || $wordCount > 100) {
                    return back()->withErrors([
                        'answers.' . $questionId => 'Jawaban harus minimal 15 kata dan maksimal 100 kata.'
                    ]);
                }

                $responseData['choice_answer'] = null;
                $responseData['text_answer'] = $answerValue;
            }

            Response::create($responseData);
        }

        return back()->with('toast_success', 'Terima kasih, jawaban Anda telah berhasil dikirim.');
    }
}
