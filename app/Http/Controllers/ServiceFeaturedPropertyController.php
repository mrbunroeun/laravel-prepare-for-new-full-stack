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
            'status' => 'nullable|string|max:100',
            'image' => 'nullable|string|max:1000',
            'link' => 'nullable|string|max:1000',
            'link_text' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'publish_status' => 'nullable|string|in:published,draft',
            'image_file' => 'nullable|image|max:10240',
        ]);

        $validated['page'] = $page;
        $validated['grade'] = str_replace('Grade ', '', $validated['grade']); // normalize to A, B, C

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('services/properties', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        if (!isset($validated['detail_images']) || empty($validated['detail_images'])) {
            $validated['detail_images'] = [
                $validated['image'] ?? 'home/latest_activities/1img.png',
                'home/latest_activities/2img.png',
                'home/latest_activities/3img.png',
            ];
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
            'status' => 'nullable|string|max:100',
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
        }

        unset($validated['image_file']);

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
