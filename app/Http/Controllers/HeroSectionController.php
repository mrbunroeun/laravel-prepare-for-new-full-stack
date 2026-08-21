<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Get the hero section for a specific page (defaults to 'home').
     */
    public function show(string $page = 'home')
    {
        $defaultHeadline = 'Your Trusted Property Management & Hospitality Partner in Cambodia';
        $defaultTagline1 = 'CWD';
        $defaultTagline2 = 'Real Estate Agent & Developer';
        $defaultHtml = null;
        $defaultBullets = ['Flexible income', 'Strong brand', 'Real projects', 'Full sales support'];

        if ($page === 'daily-weekly-rentals') {
            $defaultHeadline = "Choose the Rental\nOption That Fits Your Stay";
            $defaultTagline1 = 'Wealth';
            $defaultTagline2 = 'Mansion';
            $defaultHtml = 'Wealth <b>Mansion</b>';
            $defaultBullets = ['Flexible Daily & Weekly Rates', 'Serviced Amenities', 'Prime City Location', 'VIP Hospitality Support'];
        }

        $hero = HeroSection::firstOrCreate(
            ['page' => $page],
            [
                'tagline_html' => $defaultHtml,
                'show_tagline' => true,
                'tagline_box1' => $defaultTagline1,
                'tagline_box1_style' => 'light-gold',
                'tagline_box2' => $defaultTagline2,
                'tagline_box2_style' => 'bold-gold',
                'headline' => $defaultHeadline,
                'show_bullets' => false,
                'bullets' => $defaultBullets,
                'buttons' => [
                    ['text' => 'Browse Properties', 'url' => '/properties'],
                    ['text' => 'Contact Us', 'url' => '/contact-us']
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $hero
        ]);
    }

    /**
     * Save/Update the hero section data.
     */
    public function update(Request $request, string $page = 'home')
    {
        $validated = $request->validate([
            'tagline_html' => 'nullable|string|max:1000',
            'show_tagline' => 'required|boolean',
            'tagline_box1' => 'nullable|string|max:255',
            'tagline_box1_style' => 'nullable|in:bold-gold,light-gold,hidden',
            'tagline_box2' => 'nullable|string|max:255',
            'tagline_box2_style' => 'nullable|in:bold-gold,light-gold,hidden',
            'headline' => 'required|string|max:1000',
            'show_bullets' => 'required|boolean',
            'bullets' => 'nullable|array',
            'buttons' => 'nullable|array|max:3',
            'buttons.*.text' => 'required|string|max:255',
            'buttons.*.url' => 'required|string|max:255',
        ]);

        $hero = HeroSection::updateOrCreate(
            ['page' => $page],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Hero section updated successfully!',
            'data' => $hero
        ]);
    }
}
