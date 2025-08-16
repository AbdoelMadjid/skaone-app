<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\KumpulanFaqDataTable;
use App\Models\WebSite\KumpulanFaq;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\KumpulanFaqRequest;

class KumpulanFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KumpulanFaqDataTable $kumpulanFaqDataTable)
    {
        $faqs = KumpulanFaq::all()->groupBy('kategori');
        return $kumpulanFaqDataTable->render('pages.website.kumpulan-faq', ['faqs' => $faqs,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.kumpulan-faq-form', [
            'data' => new KumpulanFaq(),
            'action' => route('websiteapp.kumpulan-faqs.store')
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
        return view('pages.website.kumpulan-faq-form', [
            'data' => $kumpulanFaq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KumpulanFaq $kumpulanFaq)
    {
        return view('pages.website.kumpulan-faq-form', [
            'data' => $kumpulanFaq,
            'action' => route('websiteapp.kumpulan-faqs.update', $kumpulanFaq->id)
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
