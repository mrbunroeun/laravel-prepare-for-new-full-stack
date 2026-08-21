<?php

namespace App\Http\Controllers;

use App\Models\InsightCard;
use Illuminate\Http\Request;

class InsightCardController extends Controller
{
    private array $defaults = [
        [
            'title'       => 'Discover Wealth Mansion',
            'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
            'image'       => 'home/latest_activities/3img.png',
            'link'        => '/insights/view-full-insight',
            'link_text'   => 'View Full Insights',
            'sort_order'  => 1,
            'status'      => 'published',
        ],
        [
            'title'       => 'Cambodia Real Estate Market 2025',
            'description' => 'An in-depth look at the latest trends, investment opportunities, and growth sectors in Cambodia\'s real estate industry.',
            'image'       => 'home/latest_activities/3img.png',
            'link'        => '/insights/view-full-insight',
            'link_text'   => 'View Full Insights',
            'sort_order'  => 2,
            'status'      => 'published',
        ],
        [
            'title'       => 'Maximizing Your Rental Yield',
            'description' => 'Expert strategies to help property owners improve occupancy rates and maximise their rental income.',
            'image'       => 'home/latest_activities/3img.png',
            'link'        => '/insights/view-full-insight',
            'link_text'   => 'View Full Insights',
            'sort_order'  => 3,
            'status'      => 'published',
        ],
    ];

    public function index()
    {
        if (InsightCard::count() === 0) {
            foreach ($this->defaults as $d) {
                InsightCard::create($d);
            }
        }

        $cards = InsightCard::orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => $cards,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image'       => 'nullable|string|max:500',
            'link'        => 'nullable|string|max:500',
            'link_text'   => 'nullable|string|max:100',
            'sort_order'  => 'nullable|integer',
            'status'      => 'nullable|string|in:published,draft',
            'image_file'  => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('insights/cards', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        $card = InsightCard::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Insight card created successfully!',
            'data'    => $card,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $card = InsightCard::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image'       => 'nullable|string|max:500',
            'link'        => 'nullable|string|max:500',
            'link_text'   => 'nullable|string|max:100',
            'sort_order'  => 'nullable|integer',
            'status'      => 'nullable|string|in:published,draft',
            'image_file'  => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('insights/cards', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        $card->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Insight card updated successfully!',
            'data'    => $card,
        ]);
    }

    public function destroy(int $id)
    {
        $card = InsightCard::findOrFail($id);
        $card->delete();

        return response()->json([
            'success' => true,
            'message' => 'Insight card deleted successfully!',
        ]);
    }
}
