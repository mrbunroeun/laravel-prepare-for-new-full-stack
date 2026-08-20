<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs (JSON API for Dashboard & Live updates)
     */
    public function index(Request $request)
    {
        $query = Faq::query();
        
        if ($request->filled('page')) {
            $query->where('page', $request->input('page'));
        }

        $faqs = $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $faqs
        ]);
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|string|max:100',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'column' => 'required|in:left,right',
            'status' => 'required|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        if (empty($validated['page'])) {
            $validated['page'] = 'home';
        }

        if (!isset($validated['sort_order'])) {
            $maxOrder = Faq::where('page', $validated['page'])->max('sort_order') ?? 0;
            $validated['sort_order'] = $maxOrder + 1;
        }

        $faq = Faq::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully!',
            'data' => $faq
        ], 201);
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'page' => 'nullable|string|max:100',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'column' => 'required|in:left,right',
            'status' => 'required|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        $faq->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully!',
            'data' => $faq
        ]);
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully!'
        ]);
    }
}
