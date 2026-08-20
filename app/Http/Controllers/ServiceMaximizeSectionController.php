<?php

namespace App\Http\Controllers;

use App\Models\ServiceMaximizeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceMaximizeSectionController extends Controller
{
    /**
     * Get the maximize section for a specific page.
     */
    public function show(string $page = 'property-management')
    {
        $defaults = [
            'property-management' => [
                'title' => 'Maximize Your Property Investment with Professional Management',
                'image' => 'services/maximmize/maximize.png',
                'alt_text' => 'Phnom Penh skyline',
                'paragraphs' => [
                    'Managing a rental property requires time, expertise, and consistent attention to detail. CWD Realty & Hospitality provides comprehensive property management services that help condominium owners protect their investments, increase occupancy, and deliver exceptional experiences for tenants and guests.',
                    'Whether your property is intended for daily, weekly, monthly, or long-term rentals, our experienced team manages every aspect of the operation so you can enjoy peace of mind and reliable returns.'
                ]
            ],
            'property-sales' => [
                'title' => 'Professional Property Sales for Buyers, Investors & Owners',
                'image' => 'services/maximmize/maximize.png',
                'alt_text' => 'Phnom Penh skyline',
                'paragraphs' => [
                    'Our team understands the Cambodian property market and works closely with buyers, investors, and property owners to ensure a smooth, transparent, and successful sales process.'
                ]
            ],
            'property-leasing' => [
                'title' => 'Find professionally managed properties in Phnom Penh.',
                'image' => 'home/latest_activities/3img.png',
                'alt_text' => 'Golden Tower 322',
                'paragraphs' => [
                    'Whether you need a place for a few nights, several weeks, or an extended stay, CWD Realty & Hospitality offers flexible rental options designed around your accommodation needs.'
                ]
            ],
            'hospitality-services' => [
                'title' => 'Comfortable Stays, Convenient Services, Personalized Support',
                'image' => 'home/latest_activities/3img.png',
                'alt_text' => 'Golden Tower 322',
                'paragraphs' => [
                    'Whether you are visiting Cambodia for business, leisure, or an extended stay, our team can arrange additional services based on your needs.'
                ]
            ],
        ];

        $pageDefault = $defaults[$page] ?? $defaults['property-management'];

        $section = ServiceMaximizeSection::firstOrCreate(
            ['page' => $page],
            $pageDefault
        );

        return response()->json([
            'success' => true,
            'data' => $section
        ]);
    }

    /**
     * Save/Update the maximize section data.
     */
    public function update(Request $request, string $page = 'property-management')
    {
        $validated = $request->validate([
            'title' => 'required|string|max:500',
            'image' => 'nullable|string|max:1000',
            'alt_text' => 'nullable|string|max:255',
            'paragraphs' => 'nullable|array',
            'paragraphs.*' => 'required|string',
            'image_file' => 'nullable|image|max:10240', // 10MB max
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('services/maximize', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        $section = ServiceMaximizeSection::updateOrCreate(
            ['page' => $page],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Maximize section updated successfully!',
            'data' => $section
        ]);
    }
}
