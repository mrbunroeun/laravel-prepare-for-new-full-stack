<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturedPropertyController extends Controller
{
    public function index()
    {
        $properties = FeaturedProperty::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        // If table is empty, seed defaults
        if ($properties->isEmpty()) {
            $defaults = [
                [
                    'title' => 'Wealth Mansion',
                    'description' => 'Premium condominium development offering modern residential units with excellent city access.',
                    'image' => 'home/latest_activities/1img.png',
                    'link' => '/properties/wealth-mansion',
                    'link_text' => 'View Property',
                    'sort_order' => 1,
                    'status' => 'published',
                ],
                [
                    'title' => 'Private Residential Collection',
                    'description' => 'Professionally managed condominium units including premium residences and penthouses.',
                    'image' => 'home/latest_activities/2img.png',
                    'link' => '/properties/private-residential-collection',
                    'link_text' => 'View Property',
                    'sort_order' => 2,
                    'status' => 'published',
                ],
                [
                    'title' => 'UC88 Residence',
                    'description' => "Comfortable condominium living with convenient access to Phnom Penh's business districts.",
                    'image' => 'home/latest_activities/3img.png',
                    'link' => '/properties/uc88-residence',
                    'link_text' => 'View Property',
                    'sort_order' => 3,
                    'status' => 'published',
                ],
            ];

            foreach ($defaults as $d) {
                FeaturedProperty::create($d);
            }

            $properties = FeaturedProperty::orderBy('sort_order', 'asc')->get();
        }

        return response()->json([
            'success' => true,
            'data' => $properties
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'link' => 'required|string|max:255',
            'link_text' => 'nullable|string|max:50',
            'status' => 'nullable|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'prop_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/properties', $filename, 'public');
            $validated['image'] = 'storage/' . $path;
        }

        if (empty($validated['sort_order'])) {
            $max = FeaturedProperty::max('sort_order') ?? 0;
            $validated['sort_order'] = $max + 1;
        }

        $validated['link_text'] = $validated['link_text'] ?? 'View Property';
        $validated['status'] = $validated['status'] ?? 'published';

        $property = FeaturedProperty::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Featured property added successfully!',
            'data' => $property
        ], 201);
    }

    public function update(Request $request, FeaturedProperty $featuredProperty)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'link' => 'required|string|max:255',
            'link_text' => 'nullable|string|max:50',
            'status' => 'nullable|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'prop_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/properties', $filename, 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $featuredProperty->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Featured property updated successfully!',
            'data' => $featuredProperty
        ]);
    }

    public function destroy(FeaturedProperty $featuredProperty)
    {
        $featuredProperty->delete();

        return response()->json([
            'success' => true,
            'message' => 'Featured property deleted successfully!'
        ]);
    }
}
