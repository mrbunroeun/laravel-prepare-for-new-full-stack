<?php

namespace App\Http\Controllers;

use App\Models\AboutShowcaseSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutShowcaseSectionController extends Controller
{
    public function get($page = 'about-us')
    {
        $section = AboutShowcaseSection::firstOrCreate(
            ['page' => $page],
            [
                'image_1' => 'home/latest_activities/1img.png',
                'image_2' => 'about_us/our_story/longest.png',
                'image_3' => 'about_us/our_story/bottom_one.png',
                'alt_1' => 'CWD Realty Story',
                'alt_2' => 'CWD Realty Development',
                'alt_3' => 'CWD Realty Properties',
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $section,
        ]);
    }

    public function update(Request $request, $page = 'about-us')
    {
        $section = AboutShowcaseSection::firstOrCreate(['page' => $page]);

        $data = [
            'alt_1' => $request->input('alt_1', $section->alt_1 ?? 'CWD Realty Story'),
            'alt_2' => $request->input('alt_2', $section->alt_2 ?? 'CWD Realty Development'),
            'alt_3' => $request->input('alt_3', $request->input('alt_3', $section->alt_3 ?? 'CWD Realty Properties')),
        ];

        // Handle file uploads
        foreach (['image_1', 'image_2', 'image_3'] as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $file = $request->file($imgKey);
                $filename = time() . '_' . $imgKey . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads/about_us', $filename, 'public');
                $data[$imgKey] = 'storage/' . $path;
            } elseif ($request->filled($imgKey)) {
                $data[$imgKey] = $request->input($imgKey);
            }
        }

        $section->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Showcase section updated successfully!',
            'data' => $section,
        ]);
    }
}