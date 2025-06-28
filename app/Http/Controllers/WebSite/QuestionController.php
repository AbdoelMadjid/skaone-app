<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\QuestionDataTable;
use App\Http\Controllers\Controller;
use App\Models\WebSite\Polling;
use App\Models\WebSite\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QuestionDataTable $questionDataTable)
    {
        // Handle the question section
        return $questionDataTable->render('pages.website.question');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pollingId = Polling::pluck('title', 'id')->toArray();
        $data = new Question();
        $data->choice_descriptions = []; // Untuk mencegah error saat blade render

        return view('pages.website.question-form', [
            'data' => $data,
            'action' => route('websiteapp.question.store'),
            'pollingId' => $pollingId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Question $question)
    {
        $data = $request->validate([
            'polling_id' => 'required|exists:pollings,id',
            'question_text' => 'required|string',
            'question_type' => 'required|in:multiple_choice,text',
            'choice_descriptions' => 'nullable|array',
            'choice_descriptions.*' => 'nullable|string|max:255',
        ]);

        // Biarkan array dikirim langsung jika multiple_choice
        if ($data['question_type'] !== 'multiple_choice') {
            $data['choice_descriptions'] = null;
        }


        Question::create($data);

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {

        $pollingId = Polling::pluck('title', 'id')->toArray();

        // Decode choice_descriptions jika multiple_choice
        if ($question->question_type === 'multiple_choice' && is_string($question->choice_descriptions)) {
            $question->choice_descriptions = json_decode($question->choice_descriptions, true);
        }

        return view('pages.website.question-form', [
            'data' => $question,
            'action' => route('websiteapp.question.update', $question->id),
            'pollingId' => $pollingId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'polling_id' => 'required|exists:pollings,id',
            'question_text' => 'required|string',
            'question_type' => 'required|in:multiple_choice,text',
            'choice_descriptions' => 'nullable|array',
            'choice_descriptions.*' => 'nullable|string|max:255',
        ]);

        if ($data['question_type'] === 'multiple_choice') {
            $data['choice_descriptions'] = json_encode($data['choice_descriptions']);
        } else {
            $data['choice_descriptions'] = null;
        }

        $question->update($data);

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return responseSuccessDelete();
    }
}
