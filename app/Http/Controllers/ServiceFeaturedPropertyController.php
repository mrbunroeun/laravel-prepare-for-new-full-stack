<?php

namespace App\Http\Controllers;

use App\Models\ServiceFeaturedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceFeaturedPropertyController extends Controller
{
    /**
     * Get featured properties for a specific page and optionally by grade.
     */
    public function index(Request $request, string $page = 'property-sales')
    {
        // Seed default records if empty
        if (ServiceFeaturedProperty::where('page', $page)->count() === 0) {
            $this->seedDefaults($page);
        }

        $query = ServiceFeaturedProperty::where('page', $page);

        if ($request->has('grade') && !empty($request->grade)) {
            $query->where('grade', $request->grade);
        }

        $properties = $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();

        // Group by grade
        $byGrade = [
            'A' => $properties->where('grade', 'A')->values(),
            'B' => $properties->where('grade', 'B')->values(),
            'C' => $properties->where('grade', 'C')->values(),
        ];

        return response()->json([
            'success' => true,
            'data' => $properties,
            'by_grade' => $byGrade,
        ]);
    }

    /**
     * Store a new featured property.
     */
    public function store(Request $request, string $page = 'property-sales')
    {
        $validated = $request->validate([
            'grade' => 'required|string|in:A,B,C,Grade A,Grade B,Grade C',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'image' => 'nullable|string|max:1000',
            'link' => 'nullable|string|max:1000',
            'link_text' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'publish_status' => 'nullable|string|in:published,draft',
            'image_file' => 'nullable|image|max:10240',
        ]);

        $validated['page'] = $page;
        $validated['grade'] = str_replace('Grade ', '', $validated['grade']); // normalize to A, B, C

        // Handle single main image file
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('services/properties', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        // Handle detail images (max 5) — new uploads first, then existing URL images
        $newUploads = [];
        if ($request->hasFile('detail_image_files')) {
            foreach ($request->file('detail_image_files') as $file) {
                $path = $file->store('services/properties', 'public');
                $newUploads[] = 'storage/' . $path;
            }
        }

        $existingUrls = [];
        if ($request->has('detail_images')) {
            $raw = $request->input('detail_images');
            $existingUrls = is_string($raw) ? (json_decode($raw, true) ?? []) : (array) $raw;
            // Strip out placeholder/default images if new uploads exist
            if (!empty($newUploads)) {
                $existingUrls = array_values(array_filter($existingUrls, function($img) {
                    return !str_contains($img, 'home/latest_activities') &&
                           !str_contains($img, 'services/propertis_leasing');
                }));
            }
        }

        // New uploads first, then existing keeper URLs
        $detailImages = array_values(array_slice(array_merge($newUploads, $existingUrls), 0, 5));

        if (empty($detailImages) && !empty($validated['image'])) {
            $detailImages = [$validated['image']];
        }

        $validated['detail_images'] = $detailImages;
        if (!empty($detailImages)) {
            $validated['image'] = $detailImages[0];
        }

        $property = ServiceFeaturedProperty::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Property added successfully!',
            'data' => $property
        ]);
    }

    /**
     * Update an existing property.
     */
    public function update(Request $request, int $id)
    {
        $property = ServiceFeaturedProperty::findOrFail($id);

        $validated = $request->validate([
            'grade' => 'required|string|in:A,B,C,Grade A,Grade B,Grade C',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'image' => 'nullable|string|max:1000',
            'link' => 'nullable|string|max:1000',
            'link_text' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'publish_status' => 'nullable|string|in:published,draft',
            'image_file' => 'nullable|image|max:10240',
        ]);

        $validated['grade'] = str_replace('Grade ', '', $validated['grade']);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('services/properties', 'public');
            $validated['image'] = 'storage/' . $path;
            $validated['detail_images'] = ['storage/' . $path];
        }

        unset($validated['image_file']);

        // Handle detail images (max 5) — new uploads first, then existing URL images
        $newUploads = [];
        if ($request->hasFile('detail_image_files')) {
            foreach ($request->file('detail_image_files') as $file) {
                $path = $file->store('services/properties', 'public');
                $newUploads[] = 'storage/' . $path;
            }
        }

        $existingUrls = [];
        if ($request->has('detail_images')) {
            $raw = $request->input('detail_images');
            $existingUrls = is_string($raw) ? (json_decode($raw, true) ?? []) : (array) $raw;
            // Strip placeholder images when real uploads come in
            if (!empty($newUploads)) {
                $existingUrls = array_values(array_filter($existingUrls, function($img) {
                    return !str_contains($img, 'home/latest_activities') &&
                           !str_contains($img, 'services/propertis_leasing');
                }));
            }
        }

        // New uploads first, then kept URLs
        $detailImages = array_values(array_slice(array_merge($newUploads, $existingUrls), 0, 5));

        if (!empty($detailImages)) {
            $validated['detail_images'] = $detailImages;
            $validated['image'] = $detailImages[0];
        }

        $property->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Property updated successfully!',
            'data' => $property
        ]);
    }

    /**
     * Delete a property.
     */
    public function destroy(int $id)
    {
        $property = ServiceFeaturedProperty::findOrFail($id);
        $property->delete();

        return response()->json([
            'success' => true,
            'message' => 'Property deleted successfully!'
        ]);
    }

    /**
     * Seed default properties for the given page.
     */
    private function seedDefaults(string $page)
    {
        if ($page === 'properties') {
            $defaults = [
                [
                    'page' => 'properties',
                    'grade' => 'A',
                    'title' => 'Wealth Mansion',
                    'subtitle' => 'Premium Condominium Residences',
                    'description' => 'Premium condominium development offering modern residential units with excellent city access.',
                    'status' => '30% Available',
                    'image' => 'home/latest_activities/1img.png',
                    'link' => '/properties/wealth-mansion',
                    'link_text' => 'View Property',
                    'sort_order' => 1,
                ],
                [
                    'page' => 'properties',
                    'grade' => 'A',
                    'title' => 'Private Residential Collection',
                    'subtitle' => 'Exclusive Residential Development',
                    'description' => 'Professionally managed condominium units including premium residences and penthouses.',
                    'status' => 'Coming Soon',
                    'image' => 'home/latest_activities/2img.png',
                    'link' => '/properties/private-residential-collection',
                    'link_text' => 'View Property',
                    'sort_order' => 2,
                ],
                [
                    'page' => 'properties',
                    'grade' => 'A',
                    'title' => 'UC88 Residence',
                    'subtitle' => 'Residential Property Project',
                    'description' => "Comfortable condominium living with convenient access to Phnom Penh's business districts.",
                    'status' => '30% Available',
                    'image' => 'home/latest_activities/3img.png',
                    'link' => '/properties/uc88-residence',
                    'link_text' => 'View Property',
                    'sort_order' => 3,
                ],
            ];

            foreach ($defaults as $item) {
                $item['detail_images'] = [
                    $item['image'],
                    'home/latest_activities/2img.png',
                    'home/latest_activities/3img.png',
                ];
                $item['publish_status'] = 'published';
                ServiceFeaturedProperty::create($item);
            }
            return;
        }

        if ($page === 'daily-weekly-rentals') {
            $rentalDefaults = [
                [
                    'page' => 'daily-weekly-rentals',
                    'grade' => 'A',
                    'title' => 'Studio Room',
                    'subtitle' => 'Compact & Practical Living',
                    'description' => "A practical choice for individuals and short-term stays.\n\nSuitable for:\n• Business travelers\n• Solo travelers\n• Couples\n• Short-term residents",
                    'status' => 'From $35/day | $210/week | $650/month',
                    'image' => 'services/propertis_leasing/all part.png',
                    'detail_images' => [
                        'services/propertis_leasing/available rental units/detail_img/hero_section.png',
                        'services/wealth_mansion/discovered/wealth-mainson-recovered4.png',
                        'services/propertis_leasing/bedroom.png',
                        'services/propertis_leasing/all part.png',
                        'services/wealth_mansion/hero_img/wealth-mainson-recovered.png'
                    ],
                    'link' => 'services/property-leasing/daily-weekly-rentals/studio-room',
                    'link_text' => 'View Details',
                    'sort_order' => 1,
                    'publish_status' => 'published',
                ],
                [
                    'page' => 'daily-weekly-rentals',
                    'grade' => 'A',
                    'title' => '1-Bedroom',
                    'subtitle' => 'Comfortable One-Bedroom Residence',
                    'description' => "Comfortable private living for individuals and couples.\n\nSuitable for:\n• Business professionals\n• Couples\n• Expatriates\n• Longer stays",
                    'status' => 'From $45/day | $270/week | $850/month',
                    'image' => 'services/propertis_leasing/all part.png',
                    'detail_images' => [
                        'services/propertis_leasing/available rental units/detail_img/hero_section.png',
                        'services/wealth_mansion/discovered/wealth-mainson-recovered4.png',
                        'services/propertis_leasing/bedroom.png',
                        'services/propertis_leasing/all part.png'
                    ],
                    'link' => 'services/property-leasing/daily-weekly-rentals/1-bedroom',
                    'link_text' => 'View Details',
                    'sort_order' => 2,
                    'publish_status' => 'published',
                ],
                [
                    'page' => 'daily-weekly-rentals',
                    'grade' => 'A',
                    'title' => '2-Bedroom Balcony',
                    'subtitle' => 'More Space with a Private Balcony',
                    'description' => "More space for families, colleagues, or guests requiring an additional bedroom.\n\nSuitable for:\n• Small families\n• Business colleagues\n• Long-term residents\n• Seeking additional living space",
                    'status' => 'From $70/day | $420/week | $1,300/month',
                    'image' => 'services/propertis_leasing/all part.png',
                    'detail_images' => [
                        'services/propertis_leasing/all part.png',
                        'services/propertis_leasing/bedroom.png',
                        'services/wealth_mansion/discovered/wealth-mainson-recovered4.png'
                    ],
                    'link' => 'services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony',
                    'link_text' => 'View Details',
                    'sort_order' => 3,
                    'publish_status' => 'published',
                ],
                [
                    'page' => 'daily-weekly-rentals',
                    'grade' => 'A',
                    'title' => '3-Bedroom Suite',
                    'subtitle' => 'Expansive Luxury Living Spaces',
                    'description' => "Expansive living spaces designed for large families, executive relocations, and luxury comfort.\n\nSuitable for:\n• Large families\n• Executive relocations\n• Corporate leaders\n• Long-term luxury stays",
                    'status' => 'From $110/day | $660/week | $2,100/month',
                    'image' => 'services/propertis_leasing/all part.png',
                    'detail_images' => [
                        'services/propertis_leasing/all part.png',
                        'services/wealth_mansion/hero_img/wealth-mainson-recovered.png',
                        'services/wealth_mansion/discovered/wealth-mainson-recovered4.png'
                    ],
                    'link' => 'services/property-leasing/daily-weekly-rentals/3-bedroom',
                    'link_text' => 'View Details',
                    'sort_order' => 4,
                    'publish_status' => 'published',
                ],
            ];
            foreach ($rentalDefaults as $item) {
                ServiceFeaturedProperty::create($item);
            }
            return;
        }

        if ($page === 'property-leasing') {
            $leasingDefaults = [
                [
                    'page' => 'property-leasing',
                    'grade' => 'A',
                    'title' => 'Wealth Mansion',
                    'subtitle' => 'Premium Condominium Residences',
                    'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                    'status' => '30% Available',
                    'image' => 'home/latest_activities/1img.png',
                    'link' => 'services/property-leasing/daily-weekly-rentals',
                    'link_text' => 'View Project',
                    'sort_order' => 1,
                    'publish_status' => 'published',
                ],
                [
                    'page' => 'property-leasing',
                    'grade' => 'A',
                    'title' => 'Wealth Mansion',
                    'subtitle' => 'Premium Condominium Residences',
                    'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                    'status' => '30% Available',
                    'image' => 'home/latest_activities/1img.png',
                    'link' => 'services/property-leasing/daily-weekly-rentals',
                    'link_text' => 'View Project',
                    'sort_order' => 2,
                    'publish_status' => 'published',
                ],
                [
                    'page' => 'property-leasing',
                    'grade' => 'A',
                    'title' => 'Wealth Mansion',
                    'subtitle' => 'Premium Condominium Residences',
                    'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                    'status' => '30% Available',
                    'image' => 'home/latest_activities/1img.png',
                    'link' => 'services/property-leasing/daily-weekly-rentals',
                    'link_text' => 'View Project',
                    'sort_order' => 3,
                    'publish_status' => 'published',
                ],
                [
                    'page' => 'property-leasing',
                    'grade' => 'A',
                    'title' => 'Private Residential',
                    'subtitle' => 'Exclusive Residential Development',
                    'description' => 'A private residential project featuring approximately 100 units, including penthouse residences.',
                    'status' => 'Coming Soon',
                    'image' => 'home/latest_activities/2img.png',
                    'link' => 'services/property-leasing/daily-weekly-rentals',
                    'link_text' => 'View Project',
                    'sort_order' => 4,
                    'publish_status' => 'published',
                ],
            ];
            foreach ($leasingDefaults as $item) {
                ServiceFeaturedProperty::create($item);
            }
            return;
        }

        $defaults = [
            // Grade A
            [
                'page' => $page,
                'grade' => 'A',
                'title' => 'Wealth Mansion',
                'subtitle' => 'Premium Condominium Residences',
                'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/1img.png',
                'link' => 'services/properties/wealth-mansion',
                'sort_order' => 1,
            ],
            [
                'page' => $page,
                'grade' => 'A',
                'title' => 'Private Residential',
                'subtitle' => 'Exclusive Residential Development',
                'description' => 'A private residential project featuring approximately 100 units, including penthouse residences.',
                'status' => 'Coming Soon',
                'image' => 'home/latest_activities/2img.png',
                'link' => 'services/properties/private-residential',
                'sort_order' => 2,
            ],
            [
                'page' => $page,
                'grade' => 'A',
                'title' => 'UC88',
                'subtitle' => 'Residential Property Project',
                'description' => 'Explore the UC88 project and available residential opportunities through CWD Realty & Hospitality.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/3img.png',
                'link' => 'services/properties/uc88',
                'sort_order' => 3,
            ],
            [
                'page' => $page,
                'grade' => 'A',
                'title' => 'Golden Tower 322',
                'subtitle' => 'High-Yield Investment Property',
                'description' => 'Fully furnished residential suites in the vibrant BKK district with dedicated leasing support.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/4img.png',
                'link' => 'services/properties/wealth-mansion',
                'sort_order' => 4,
            ],
            [
                'page' => $page,
                'grade' => 'A',
                'title' => 'Riverside Residence',
                'subtitle' => 'Waterfront Condominium Complex',
                'description' => 'Panoramic river views with rooftop sky bar, infinity pool, and concierge hospitality.',
                'status' => 'Coming Soon',
                'image' => 'home/latest_activities/5img.png',
                'link' => 'services/properties/wealth-mansion',
                'sort_order' => 5,
            ],

            // Grade B
            [
                'page' => $page,
                'grade' => 'B',
                'title' => 'Wealth Mansion',
                'subtitle' => 'Premium Condominium Residences',
                'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/1img.png',
                'link' => 'services/properties/wealth-mansion',
                'sort_order' => 1,
            ],
            [
                'page' => $page,
                'grade' => 'B',
                'title' => 'Private Residential',
                'subtitle' => 'Exclusive Residential Development',
                'description' => 'A private residential project featuring approximately 100 units, including penthouse residences.',
                'status' => 'Coming Soon',
                'image' => 'home/latest_activities/2img.png',
                'link' => 'services/properties/private-residential',
                'sort_order' => 2,
            ],
            [
                'page' => $page,
                'grade' => 'B',
                'title' => 'UC88',
                'subtitle' => 'Residential Property Project',
                'description' => 'Explore the UC88 project and available residential opportunities through CWD Realty & Hospitality.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/3img.png',
                'link' => 'services/properties/uc88',
                'sort_order' => 3,
            ],

            // Grade C
            [
                'page' => $page,
                'grade' => 'C',
                'title' => 'Wealth Mansion',
                'subtitle' => 'Premium Condominium Residences',
                'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/1img.png',
                'link' => 'services/properties/wealth-mansion',
                'sort_order' => 1,
            ],
            [
                'page' => $page,
                'grade' => 'C',
                'title' => 'UC88',
                'subtitle' => 'Residential Property Project',
                'description' => 'Explore the UC88 project and available residential opportunities through CWD Realty & Hospitality.',
                'status' => '30% Available',
                'image' => 'home/latest_activities/3img.png',
                'link' => 'services/properties/uc88',
                'sort_order' => 2,
            ],
        ];

        foreach ($defaults as $item) {
            $item['detail_images'] = [
                $item['image'],
                'home/latest_activities/2img.png',
                'home/latest_activities/3img.png',
            ];
            $item['link_text'] = 'View Project';
            $item['publish_status'] = 'published';
            ServiceFeaturedProperty::create($item);
        }
    }
}
