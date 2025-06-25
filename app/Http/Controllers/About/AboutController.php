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
        $user = Auth::user();
        $personalId = $user->personal_id;

        $request->validate([
            'polling_id' => 'required|exists:pollings,id',
            'answers' => 'required|array',
            'answers.*' => 'required',
        ]);

        $pollingId = $request->input('polling_id');

        $alreadyResponded = Response::where('user_id', $personalId)
            ->whereHas('question', function ($query) use ($pollingId) {
                $query->where('polling_id', $pollingId->id);
            })
            ->exists();

        if ($alreadyResponded) {
            return back()->with('error', 'Anda sudah mengisi polling ini sebelumnya.');
        }

        foreach ($request->input('answers') as $questionId => $answerValue) {
            $question = Question::find($questionId);

            if (!$question || $question->polling_id != $pollingId) {
                continue;
            }

            $data = [
                'question_id' => $questionId,
                'user_id' => $personalId,
            ];

            if ($question->question_type === 'multiple_choice') {
                if (!in_array($answerValue, ['1', '2', '3', '4', '5'])) {
                    return back()->withErrors(['answers.' . $questionId => 'Pilihan tidak valid.']);
                }
                $data['choice_answer'] = (int) $answerValue;
                $data['text_answer'] = null;
            } else {
                $wordCount = preg_match_all('/\b\w+\b/u', strip_tags($answerValue));
                if ($wordCount < 15 || $wordCount > 100) {
                    return back()->withErrors([
                        'answers.' . $questionId => 'Jawaban harus minimal 15 kata dan maksimal 100 kata.'
                    ]);
                }
                $data['text_answer'] = $answerValue;
                $data['choice_answer'] = null;
            }

            Response::create($data);
        }

        return back()->with('toast_success', 'Terima kasih, jawaban Anda telah berhasil dikirim.');
    }
}
