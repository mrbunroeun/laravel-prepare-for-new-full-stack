<?php

namespace App\Http\Controllers;

use App\Models\LatestActivity;
use Illuminate\Http\Request;

class LatestActivityController extends Controller
{
    public function index()
    {
        $activities = LatestActivity::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        if ($activities->isEmpty()) {
            $defaults = [
                [
                    'title' => 'Wealth Mansion',
                    'description' => 'Premium condominium development offering modern residential units with excellent city access.',
                    'image' => 'home/latest_activities/1img.png',
                    'sort_order' => 1,
                    'status' => 'published',
                ],
                [
                    'title' => 'Private Residential Collection',
                    'description' => 'Professionally managed condominium units including premium residences and penthouses.',
                    'image' => 'home/latest_activities/2img.png',
                    'sort_order' => 2,
                    'status' => 'published',
                ],
                [
                    'title' => 'Golden Tower 268',
                    'description' => 'Landmark high-rise tower offering premium residences with panoramic city views.',
                    'image' => 'home/latest_activities/3img.png',
                    'sort_order' => 3,
                    'status' => 'published',
                ],
                [
                    'title' => 'Riverside Tower',
                    'description' => 'Elegant riverside residences with panoramic views and premium amenities for modern living.',
                    'image' => 'home/latest_activities/4img.png',
                    'sort_order' => 4,
                    'status' => 'published',
                ],
                [
                    'title' => 'Skyline Residence',
                    'description' => 'High-rise condominium living in the heart of the city, close to shopping and dining.',
                    'image' => 'home/latest_activities/5img.png',
                    'sort_order' => 5,
                    'status' => 'published',
                ],
                [
                    'title' => 'Harmony Heights',
                    'description' => 'Modern residential tower with rooftop lounge, gym, and unobstructed city skyline views.',
                    'image' => 'home/latest_activities/6img.png',
                    'sort_order' => 6,
                    'status' => 'published',
                ],
            ];

            foreach ($defaults as $d) {
                LatestActivity::create($d);
            }

            $activities = LatestActivity::orderBy('sort_order', 'asc')->get();
        }

        return response()->json([
            'success' => true,
            'data' => $activities
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'status' => 'nullable|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'act_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/activities', $filename, 'public');
            $validated['image'] = 'storage/' . $path;
        }

        if (empty($validated['sort_order'])) {
            $max = LatestActivity::max('sort_order') ?? 0;
            $validated['sort_order'] = $max + 1;
        }

        $activity = LatestActivity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Activity added successfully!',
            'data' => $activity
        ], 201);
    }

    public function update(Request $request, LatestActivity $latestActivity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'status' => 'nullable|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'act_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/activities', $filename, 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $latestActivity->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Activity updated successfully!',
            'data' => $latestActivity
        ]);
    }

    public function destroy(LatestActivity $latestActivity)
    {
        $latestActivity->delete();

        return response()->json([
            'success' => true,
            'message' => 'Activity deleted successfully!'
        ]);
    }
}
