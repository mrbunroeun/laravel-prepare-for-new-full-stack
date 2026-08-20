<?php

namespace App\Http\Controllers;

use App\Models\AboutValuesSection;
use Illuminate\Http\Request;

class AboutValuesSectionController extends Controller
{
    public function show(string $page = 'about-us')
    {
        $section = AboutValuesSection::firstOrCreate(
            ['page' => $page],
            [
                'cards' => [
                    [
                        'title' => 'Vision',
                        'icon' => 'about_us/icons/vision.svg',
                        'subtitle' => 'Contributing to Cambodia\'s Growing Property & Hospitality Industry',
                        'description' => 'To become one of Cambodia\'s most trusted property management and hospitality companies by delivering professional services, creating long-term value for property owners, and supporting the sustainable growth of Cambodia\'s real estate sector.',
                        'button_text' => 'See More'
                    ],
                    [
                        'title' => 'Mission',
                        'icon' => 'about_us/icons/mission.svg',
                        'subtitle' => '',
                        'description' => 'Our mission is to provide professional property management, leasing, and hospitality solutions that benefit both property owners and guests.',
                        'button_text' => 'See More'
                    ],
                    [
                        'title' => 'Core Values',
                        'icon' => 'about_us/icons/core_value.svg',
                        'subtitle' => 'Integrity',
                        'description' => 'We conduct every business relationship with honesty, transparency, and professionalism.',
                        'button_text' => 'See More'
                    ]
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $section
        ]);
    }

    public function update(Request $request, string $page = 'about-us')
    {
        // Decode JSON cards if sent as string
        if ($request->has('cards') && is_string($request->input('cards'))) {
            $decoded = json_decode($request->input('cards'), true);
            if (is_array($decoded)) {
                $request->merge(['cards' => $decoded]);
            }
        }

        $validated = $request->validate([
            'cards' => 'nullable|array',
            'cards.*.title' => 'required|string|max:255',
            'cards.*.subtitle' => 'nullable|string|max:500',
            'cards.*.description' => 'required|string',
            'cards.*.button_text' => 'nullable|string|max:100',
        ]);

        $section = AboutValuesSection::firstOrCreate(['page' => $page]);

        $cards = $request->input('cards', []);
        if (is_string($cards)) {
            $cards = json_decode($cards, true);
        }

        // Handle icon file uploads for each card
        for ($i = 0; $i < count($cards); $i++) {
            if ($request->hasFile("icon_file_{$i}")) {
                $file = $request->file("icon_file_{$i}");
                $filename = "val_icon_{$i}_" . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads/about_us', $filename, 'public');
                $cards[$i]['icon'] = 'storage/' . $path;
            }
        }

        $section->cards = $cards;
        $section->save();

        return response()->json([
            'success' => true,
            'message' => 'Vision, Mission & Core Values updated successfully!',
            'data' => $section
        ]);
    }
}