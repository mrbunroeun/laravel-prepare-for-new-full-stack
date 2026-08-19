<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUsSection;
use Illuminate\Http\Request;

class WhyChooseUsSectionController extends Controller
{
    public function show($page = 'home')
    {
        $section = WhyChooseUsSection::firstOrCreate(
            ['page' => $page],
            [
                'heading_line_1' => 'Why Choose',
                'heading_line_2' => 'CWD Realty & Hospitality?',
                'text_align' => 'left',
                'items' => [
                    [
                        'title' => 'Condominium Specialists',
                        'description' => 'We focus on professionally managing residential condominium properties.',
                    ],
                    [
                        'title' => 'Multilingual Communication',
                        'description' => 'Our team provides professional support in multiple languages, making communication easier for both local and international clients.',
                    ],
                    [
                        'title' => 'Flexible Rental Options',
                        'description' => 'Choose daily, weekly, monthly, or long-term accommodation based on your needs.',
                    ],
                    [
                        'title' => 'Professional Property Management',
                        'description' => 'Helping property owners maximize occupancy while protecting the value of their investments.',
                    ],
                    [
                        'title' => 'Hospitality-Focused Service',
                        'description' => 'Our team is committed to creating a welcoming and comfortable guest experience from arrival to departure.',
                    ],
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $section
        ]);
    }

    public function update(Request $request, $page = 'home')
    {
        $validated = $request->validate([
            'heading_line_1' => 'required|string|max:255',
            'heading_line_2' => 'required|string|max:255',
            'text_align' => 'required|in:left,center',
            'items' => 'nullable|array',
            'items.*.title' => 'required|string|max:255',
            'items.*.description' => 'required|string|max:1000',
        ]);

        $section = WhyChooseUsSection::updateOrCreate(
            ['page' => $page],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Why Choose Us section updated successfully!',
            'data' => $section
        ]);
    }
}
