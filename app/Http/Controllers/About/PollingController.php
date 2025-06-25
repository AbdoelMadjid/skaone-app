<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\PollingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\PollingRequest;
use App\Models\About\Polling;
use App\Models\About\Question;
use App\Models\About\Response;
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
        return $pollingDataTable->render('pages.about.polling');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.polling-form', [
            'data' => new Polling(),
            'action' => route('about.polling.store')
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
        return view('pages.about.polling-form', [
            'data' => $polling
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        return view('pages.about.polling-form', [
            'data' => $polling,
            'action' => route('about.polling.update', $polling->id)
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
