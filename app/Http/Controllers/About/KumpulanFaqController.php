<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\KumpulanFaqDataTable;
use App\Models\About\KumpulanFaq;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\KumpulanFaqRequest;

class KumpulanFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KumpulanFaqDataTable $kumpulanFaqDataTable)
    {
        return $kumpulanFaqDataTable->render('pages.about.kumpulan-faq');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.kumpulan-faq-form', [
            'data' => new KumpulanFaq(),
            'action' => route('about.kumpulan-faqs.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KumpulanFaqRequest $request)
    {
        $kumpulanFaq = new KumpulanFaq($request->validated());
        $kumpulanFaq->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(KumpulanFaq $kumpulanFaq)
    {
        return view('pages.about.kumpulan-faq-form', [
            'data' => $kumpulanFaq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KumpulanFaq $kumpulanFaq)
    {
        return view('pages.about.kumpulan-faq-form', [
            'data' => $kumpulanFaq,
            'action' => route('about.kumpulan-faqs.update', $kumpulanFaq->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KumpulanFaqRequest $request, KumpulanFaq $kumpulanFaq)
    {
        $kumpulanFaq->fill($request->validated());
        $kumpulanFaq->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KumpulanFaq $kumpulanFaq)
    {
        $kumpulanFaq->delete();

        return responseSuccessDelete();
    }
}
