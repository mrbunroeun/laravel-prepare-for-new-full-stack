<?php

namespace App\Http\Controllers;

use App\Models\ServicesSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesSectionController extends Controller
{
    public function show(string $page = 'home')
    {
        $services = ServicesSection::firstOrCreate(
            ['page' => $page],
            [
                'section_title' => 'Our Services',
                'image_url' => 'home/our_services/our_services.png',
                'cards' => [
                    [
                        'number' => '01',
                        'title' => 'Property Management',
                        'description' => 'Professional management for condominium owners, including tenant coordination, maintenance supervision, occupancy management, and rental administration.',
                        'link' => '/services/property-management',
                        'linkText' => 'View Details'
                    ],
                    [
                        'number' => '02',
                        'title' => 'Property Leasing',
                        'description' => 'Daily, weekly, monthly, and long-term rental services for residential condominiums.',
                        'link' => '/services/property-leasing',
                        'linkText' => 'View Properties'
                    ],
                    [
                        'number' => '03',
                        'title' => 'Sales Services',
                        'description' => 'Helping buyers and investors discover quality residential properties in Cambodia.',
                        'link' => '/insights',
                        'linkText' => 'Learn More'
                    ],
                    [
                        'number' => '04',
                        'title' => 'Hospitality Services',
                        'description' => 'Airport transfers, guest assistance, city tours, housekeeping coordination, and personalized hospitality support.',
                        'link' => '/services/hospitality-services',
                        'linkText' => 'Explore Services'
                    ]
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    public function update(Request $request, string $page = 'home')
    {
        $validated = $request->validate([
            'section_title' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'cards' => 'nullable|array',
            'cards.*.number' => 'required|string|max:10',
            'cards.*.title' => 'required|string|max:255',
            'cards.*.description' => 'required|string',
            'cards.*.link' => 'nullable|string|max:255',
            'cards.*.linkText' => 'nullable|string|max:50',
        ]);

        $section = ServicesSection::firstOrCreate(['page' => $page]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'services_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/services', $filename, 'public');
            $section->image_url = 'storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $section->image_url = $request->input('image_url');
        }

        if ($request->has('section_title')) {
            $section->section_title = $request->input('section_title') ?: 'Our Services';
        }

        if ($request->has('cards')) {
            $cards = $request->input('cards');
            if (is_string($cards)) {
                $cards = json_decode($cards, true);
            }
            $section->cards = $cards;
        }

        $section->save();

        return response()->json([
            'success' => true,
            'message' => 'Services section updated successfully!',
            'data' => $section
        ]);
    }
}
