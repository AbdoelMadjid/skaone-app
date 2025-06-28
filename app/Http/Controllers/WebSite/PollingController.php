<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\PollingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\PollingRequest;
use App\Models\WebSite\Polling;
use App\Models\WebSite\Question;
use App\Models\WebSite\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PollingDataTable $pollingDataTable)
    {
        // Handle the polling section
        $aingPengguna = User::find(Auth::user()->id);

        $pollings = Polling::with('questions') // include relasi
            ->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->get();


        // Ambil semua polling yang sudah dijawab user (berdasarkan polling_id dari response -> question)
        $respondedPollingIds = Response::where('user_id', $aingPengguna->id)
            ->whereIn('question_id', function ($query) {
                $query->select('id')->from('questions');
            })
            ->with('question')
            ->get()
            ->pluck('question.polling_id')
            ->unique()
            ->toArray();

        $pollingIds = Polling::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->pluck('id');

        $userIds = Response::whereHas('question', function ($q) use ($pollingIds) {
            $q->whereIn('polling_id', $pollingIds);
        })->pluck('user_id')->unique();

        $usersWhoPolled = User::whereIn('id', $userIds)->get();

        $pollingsQstats = Polling::with('questions.responses')->get();
        $pollingStats = [];
        $textResponses = [];

        foreach ($pollingsQstats as $polling) {
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

                    $wordFrequency = [];

                    foreach ($responses as $response) {
                        $words = preg_split('/\s+/', strip_tags(strtolower($response))); // lowercase dan strip tag
                        foreach ($words as $word) {
                            $word = trim($word, ".,!?\"'()[]{}"); // bersihkan simbol
                            if (mb_strlen($word) < 4) continue; // abaikan kata pendek (opsional)
                            $wordFrequency[$word] = ($wordFrequency[$word] ?? 0) + 1;
                        }
                    }

                    // Ambil 10 kata paling sering
                    arsort($wordFrequency);
                    $topWords = array_slice($wordFrequency, 0, 10);

                    $textResponses[] = [
                        'question_id' => $question->id,
                        'question_text' => $question->question_text,
                        'responses' => $responses,
                        'count' => count($responses),
                        'top_words' => $topWords,
                    ];
                }
            }
        }

        return $pollingDataTable->render('pages.website.polling', [
            'aingPengguna' => $aingPengguna,
            'pollings' => $pollings,
            'respondedPollingIds' => $respondedPollingIds,
            'usersWhoPolled' => $usersWhoPolled,
            'pollingStats' => $pollingStats,
            'textResponses' => $textResponses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.polling-form', [
            'data' => new Polling(),
            'action' => route('websiteapp.polling.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PollingRequest $request)
    {
        $polling = new Polling($request->validated());
        $polling->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Polling $polling)
    {
        return view('pages.website.polling-form', [
            'data' => $polling
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        return view('pages.website.polling-form', [
            'data' => $polling,
            'action' => route('websiteapp.polling.update', $polling->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PollingRequest $request, Polling $polling)
    {
        $polling->fill($request->validated());
        $polling->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        $polling->delete();

        return responseSuccessDelete();
    }

    public function submitPolling(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'polling_id' => 'required|exists:pollings,id',
            'answers' => 'required|array',
            'answers.*' => 'required',
        ]);

        $pollingId = $request->input('polling_id');

        $alreadyResponded = Response::whereHas('question', function ($query) use ($pollingId) {
            $query->where('polling_id', $pollingId);
        })->where('user_id', $user->id)->exists();

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
                'user_id' => $user->id,
            ];

            if ($question->question_type === 'multiple_choice') {
                if (!in_array($answerValue, ['1', '2', '3', '4', '5'])) {
                    return back()->withErrors(['answers.' . $questionId => 'Pilihan tidak valid.']);
                }
                $data['choice_answer'] = (int) $answerValue;
                $data['text_answer'] = null;
            } else {
                $wordCount = preg_match_all('/\b\w+\b/u', strip_tags($answerValue));
                if ($wordCount < 3 || $wordCount > 100) {
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
