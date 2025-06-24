<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\QuestionDataTable;
use App\Http\Controllers\Controller;
use App\Models\About\Polling;
use App\Models\About\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QuestionDataTable $questionDataTable)
    {
        // Handle the question section
        return $questionDataTable->render('pages.about.question');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pollingId = Polling::pluck('title', 'id')->toArray();
        return view('pages.about.question-form', [
            'data' => new Question(),
            'action' => route('about.question.store'),
            'pollingId' => $pollingId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Question $question)
    {
        $data = $request->validate([
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

        $question->create($data);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
