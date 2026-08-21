<?php

namespace App\Http\Controllers;

use App\Models\ProjectGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectGalleryController extends Controller
{
    /**
     * Get all gallery images for a specific project/page.
     */
    public function index(Request $request, string $page = 'wealth-mansion')
    {
        $items = ProjectGallery::where('page', $page)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        if ($items->isEmpty() && $page === 'wealth-mansion') {
            $defaults = [
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/discovered/wealth-mainson-recovered4.png',
                    'title' => 'Wealth Mansion View 1',
                    'alt_text' => 'Wealth Mansion view 1',
                    'sort_order' => 1,
                    'status' => 'published',
                ],
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/hero_img/wealth-mainson-recovered.png',
                    'title' => 'Wealth Mansion Hero View',
                    'alt_text' => 'Wealth Mansion hero view',
                    'sort_order' => 2,
                    'status' => 'published',
                ],
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/discovered/wealth-mainson-recovered4.png',
                    'title' => 'Wealth Mansion Architecture',
                    'alt_text' => 'Wealth Mansion architecture',
                    'sort_order' => 3,
                    'status' => 'published',
                ],
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/compare_wealth_mainsion/for_weatch_mansion.png',
                    'title' => 'Wealth Mansion Residence',
                    'alt_text' => 'Wealth Mansion residence',
                    'sort_order' => 4,
                    'status' => 'published',
                ],
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/discovered/wealth-mainson-recovered4.png',
                    'title' => 'Wealth Mansion Skyline',
                    'alt_text' => 'Wealth Mansion skyline',
                    'sort_order' => 5,
                    'status' => 'published',
                ],
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/hero_img/wealth-mainson-recovered.png',
                    'title' => 'Wealth Mansion Exterior',
                    'alt_text' => 'Wealth Mansion exterior',
                    'sort_order' => 6,
                    'status' => 'published',
                ],
                [
                    'page' => 'wealth-mansion',
                    'image' => 'services/wealth_mansion/compare_wealth_mainsion/for_weatch_mansion.png',
                    'title' => 'Wealth Mansion Living Space',
                    'alt_text' => 'Wealth Mansion living space',
                    'sort_order' => 7,
                    'status' => 'published',
                ],
            ];

            foreach ($defaults as $d) {
                ProjectGallery::create($d);
            }

            $items = ProjectGallery::where('page', $page)
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        }

        return response()->json([
            'success' => true,
            'data' => $items
        ]);
    }

    /**
     * Upload and store a new gallery image.
     */
    public function store(Request $request, string $page = 'wealth-mansion')
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'status' => 'nullable|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        $imagePath = $validated['image'] ?? 'services/wealth_mansion/discovered/wealth-mainson-recovered4.png';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/galleries', $filename, 'public');
            $imagePath = 'storage/' . $path;
        }

        $sortOrder = $validated['sort_order'] ?? null;
        if ($sortOrder === null) {
            $maxOrder = ProjectGallery::where('page', $page)->max('sort_order') ?? 0;
            $sortOrder = $maxOrder + 1;
        }

        $gallery = ProjectGallery::create([
            'page' => $page,
            'image' => $imagePath,
            'title' => $validated['title'] ?? 'Gallery Item',
            'alt_text' => $validated['alt_text'] ?? ($validated['title'] ?? 'Gallery Item'),
            'sort_order' => $sortOrder,
            'status' => $validated['status'] ?? 'published',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery image uploaded successfully!',
            'data' => $gallery
        ], 201);
    }

    /**
     * Update an existing gallery image.
     */
    public function update(Request $request, ProjectGallery $projectGallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            'status' => 'nullable|in:published,draft',
            'sort_order' => 'nullable|integer',
        ]);

        $data = [];
        if (isset($validated['title'])) $data['title'] = $validated['title'];
        if (isset($validated['alt_text'])) $data['alt_text'] = $validated['alt_text'];
        if (isset($validated['status'])) $data['status'] = $validated['status'];
        if (isset($validated['sort_order'])) $data['sort_order'] = $validated['sort_order'];

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/galleries', $filename, 'public');
            $data['image'] = 'storage/' . $path;
        } elseif ($request->filled('image')) {
            $data['image'] = $request->input('image');
        }

        $projectGallery->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Gallery image updated successfully!',
            'data' => $projectGallery
        ]);
    }

    /**
     * Delete a gallery image.
     */
    public function destroy(ProjectGallery $projectGallery)
    {
        $projectGallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery image deleted successfully!'
        ]);
    }
}
