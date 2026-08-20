<?php

namespace App\Http\Controllers;

use App\Models\AboutStorySection;
use Illuminate\Http\Request;

class AboutStorySectionController extends Controller
{
    public function show(string $page = 'about-us')
    {
        $story = AboutStorySection::firstOrCreate(
            ['page' => $page],
            [
                'tagline' => 'Our Story',
                'headline' => 'Building Trust Through Commitment and Personal Relationships',
                'paragraphs' => [
                    'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
                    'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors. Their willingness to meet clients personally, understand their expectations, and deliver on every commitment became the foundation of the company\'s reputation.',
                    'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.',
                    'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.'
                ],
                'image_left' => 'about_us/our_story/longest.png',
                'image_top_right' => 'about_us/our_story/top_one.png',
                'image_bottom_right' => 'about_us/our_story/bottom_one.png',
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $story
        ]);
    }

    public function update(Request $request, string $page = 'about-us')
    {
        // Decode JSON paragraphs if sent via FormData string
        if ($request->has('paragraphs') && is_string($request->input('paragraphs'))) {
            $decoded = json_decode($request->input('paragraphs'), true);
            if (is_array($decoded)) {
                $request->merge(['paragraphs' => $decoded]);
            }
        }

        $validated = $request->validate([
            'tagline' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:500',
            'paragraphs' => 'nullable',
            'image_left' => 'nullable|string|max:500',
            'image_top_right' => 'nullable|string|max:500',
            'image_bottom_right' => 'nullable|string|max:500',
            'image_left_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'image_top_right_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'image_bottom_right_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
        ]);

        $story = AboutStorySection::firstOrCreate(['page' => $page]);

        // Handle Image 1 (Left Tall)
        if ($request->hasFile('image_left_file')) {
            $file = $request->file('image_left_file');
            $filename = 'story_left_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/about_us', $filename, 'public');
            $story->image_left = 'storage/' . $path;
        } elseif ($request->filled('image_left')) {
            $story->image_left = $request->input('image_left');
        }

        // Handle Image 2 (Top Right)
        if ($request->hasFile('image_top_right_file')) {
            $file = $request->file('image_top_right_file');
            $filename = 'story_top_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/about_us', $filename, 'public');
            $story->image_top_right = 'storage/' . $path;
        } elseif ($request->filled('image_top_right')) {
            $story->image_top_right = $request->input('image_top_right');
        }

        // Handle Image 3 (Bottom Right)
        if ($request->hasFile('image_bottom_right_file')) {
            $file = $request->file('image_bottom_right_file');
            $filename = 'story_bottom_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/about_us', $filename, 'public');
            $story->image_bottom_right = 'storage/' . $path;
        } elseif ($request->filled('image_bottom_right')) {
            $story->image_bottom_right = $request->input('image_bottom_right');
        }

        if ($request->has('tagline')) {
            $story->tagline = $request->input('tagline') ?: 'Our Story';
        }

        if ($request->has('headline')) {
            $story->headline = $request->input('headline');
        }

        if ($request->has('paragraphs')) {
            $paragraphs = $request->input('paragraphs');
            if (is_string($paragraphs)) {
                $paragraphs = json_decode($paragraphs, true);
            }
            if (is_array($paragraphs)) {
                $story->paragraphs = array_values(array_filter($paragraphs, fn($p) => trim($p) !== ''));
            }
        }

        $story->save();

        return response()->json([
            'success' => true,
            'message' => 'Our Story section updated successfully!',
            'data' => $story
        ]);
    }
}