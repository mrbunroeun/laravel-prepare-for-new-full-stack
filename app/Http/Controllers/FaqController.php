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
        $page = $request->input('page', 'home');

        if ($request->filled('page') && Faq::where('page', $page)->count() === 0) {
            $defaults = [
                ['page' => $page, 'question' => 'Why should I stay at a property managed by CWD Realty & Hospitality?', 'answer' => 'We professionally manage quality condominium properties, offering clean accommodations, responsive support, flexible rental options, and convenient locations suitable for business travelers, expatriates, and tourists.', 'column' => 'left', 'status' => 'published', 'sort_order' => 1],
                ['page' => $page, 'question' => 'How much does a room cost?', 'answer' => 'ComingSoon', 'column' => 'left', 'status' => 'published', 'sort_order' => 2],
                ['page' => $page, 'question' => 'Are smoking and non-smoking rooms available?', 'answer' => 'ComingSoon', 'column' => 'left', 'status' => 'published', 'sort_order' => 3],
                ['page' => $page, 'question' => 'Is breakfast included?', 'answer' => 'ComingSoon', 'column' => 'left', 'status' => 'published', 'sort_order' => 4],
                ['page' => $page, 'question' => 'Are pets allowed?', 'answer' => 'ComingSoon', 'column' => 'right', 'status' => 'published', 'sort_order' => 5],
                ['page' => $page, 'question' => 'What facilities are available?', 'answer' => 'ComingSoon', 'column' => 'right', 'status' => 'published', 'sort_order' => 6],
                ['page' => $page, 'question' => 'Do you provide airport transportation?', 'answer' => 'ComingSoon', 'column' => 'right', 'status' => 'published', 'sort_order' => 7],
                ['page' => $page, 'question' => 'Are there discounts for weekly or monthly stays?', 'answer' => 'ComingSoon', 'column' => 'right', 'status' => 'published', 'sort_order' => 8],
            ];
            foreach ($defaults as $d) {
                Faq::create($d);
            }
        }

        $query = Faq::query();
        
        if ($request->filled('page')) {
            $query->where('page', $page);
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
