<?php

namespace App\Http\Controllers;

use App\Models\ServiceManagementModel;
use Illuminate\Http\Request;

class ServiceManagementModelController extends Controller
{
    public function show(string $page = 'property-management')
    {
        $section = ServiceManagementModel::firstOrCreate(
            ['page' => $page],
            [
                'title_line1' => 'Our',
                'title_line2' => 'Management',
                'title_line3' => 'Models',
                'models' => [
                    [
                        'title' => 'Revenue Sharing',
                        'image' => 'services/propertis_leasing/bedroom.png',
                        'alt_text' => 'Revenue Sharing Model',
                        'description' => 'Suitable for short-term rentals. Property owners receive rental income while CWD Realty & Hospitality manages daily operations based on an agreed 10% management fee.'
                    ],
                    [
                        'title' => 'Long-Term Leasing Management',
                        'image' => 'services/maximmize/maximize.png',
                        'alt_text' => 'Long-Term Leasing Management Model',
                        'description' => 'For long-term rental properties, we provide exclusive leasing management, tenant administration, and operational support while owners receive regular $400 monthly rental income and extra 5% if the daily renting exceed $400 according to the management agreement.'
                    ]
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $section
        ]);
    }

    public function update(Request $request, string $page = 'property-management')
    {
        $validated = $request->validate([
            'title_line1' => 'nullable|string|max:255',
            'title_line2' => 'nullable|string|max:255',
            'title_line3' => 'nullable|string|max:255',
            'models' => 'nullable|array',
        ]);

        $modelsData = $request->input('models', []);
        if (is_string($modelsData)) {
            $modelsData = json_decode($modelsData, true) ?? [];
        }

        // Handle uploaded image files if any
        if ($request->hasFile('model_images')) {
            foreach ($request->file('model_images') as $idx => $file) {
                if ($file && isset($modelsData[$idx])) {
                    $path = $file->store('services/models', 'public');
                    $modelsData[$idx]['image'] = 'storage/' . $path;
                }
            }
        }

        $validated['models'] = $modelsData;

        $section = ServiceManagementModel::updateOrCreate(
            ['page' => $page],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Management Models saved successfully!',
            'data' => $section
        ]);
    }
}
