<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faqs::all();
        return view('admin.cms.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ], [
            'question.required' => __('validation.required', ['attribute' => __('gen.question')]),
            'question.string' => __('validation.string', ['attribute' => __('gen.question')]),
            'answer.required' => __('validation.required', ['attribute' => __('gen.answer')]),
            'answer.string' => __('validation.string', ['attribute' => __('gen.answer')]),
        ]);

        Faqs::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'created_by' => getAuthUserId(),
            'updated_by' => getAuthUserId(),
        ]);


        return redirect()->route('cms.faqs.index')
            ->with('message', __('gen.created_successfully', ['attribute' => __('gen.faqs_short')]));
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
    public function edit(Faqs $faq)
    {
        return view('admin.cms.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ], [
            'question.required' => __('validation.required', ['attribute' => __('gen.question')]),
            'question.string' => __('validation.string', ['attribute' => __('gen.question')]),
            'answer.required' => __('validation.required', ['attribute' => __('gen.answer')]),
            'answer.string' => __('validation.string', ['attribute' => __('gen.answer')]),
        ]);

        Faqs::where('id', $id)
            ->update([
                'question' => $request->question,
                'answer' => $request->answer,
                'updated_by' => getAuthUserId(),
            ]);


        return redirect()->route('cms.faqs.index')
            ->with('message', __('gen.updated_successfully', ['attribute' => __('gen.faqs_short')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();
        return redirect()->route('cms.faqs.index')
            ->with('message', __('gen.deleted_successfully', ['attribute' => __('gen.faqs_short')]));
    }
}
