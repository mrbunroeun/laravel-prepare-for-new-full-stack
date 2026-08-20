<?php

namespace App\Http\Controllers;

use App\Models\ServiceOverviewSection;
use Illuminate\Http\Request;

class ServiceOverviewSectionController extends Controller
{
    /**
     * Get the overview section for a specific page.
     */
    public function show(string $page = 'property-management')
    {
        $section = ServiceOverviewSection::firstOrCreate(
            ['page' => $page],
            [
                'image' => 'services/bg_img/bg_img.png',
                'alt_text' => 'What is Property Management?',
                'title_line1' => 'What is',
                'title_line2' => 'Property',
                'title_line3' => 'Management?',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners. Our team oversees daily operations, tenant coordination, maintenance scheduling, rental administration, financial reporting, and hospitality services to ensure your property performs efficiently and remains well maintained.'
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $section
        ]);
    }

    /**
     * Save/Update the overview section data.
     */
    public function update(Request $request, string $page = 'property-management')
    {
        $validated = $request->validate([
            'image' => 'nullable|string|max:1000',
            'alt_text' => 'nullable|string|max:255',
            'title_line1' => 'nullable|string|max:255',
            'title_line2' => 'nullable|string|max:255',
            'title_line3' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240', // 10MB max
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('services/overview', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        $section = ServiceOverviewSection::updateOrCreate(
            ['page' => $page],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Section updated successfully!',
            'data' => $section
        ]);
    }
}
