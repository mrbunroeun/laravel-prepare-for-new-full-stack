<?php

namespace App\Http\Controllers;

use App\Models\EventItem;
use Illuminate\Http\Request;

class EventItemController extends Controller
{
    private array $defaults = [
        [
            'title'        => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
            'description'  => 'Property management is the professional administration of residential properties on behalf of owners.',
            'image'        => 'home/latest_activities/1img.png',
            'link'         => '/insights/view-full-insight',
            'link_text'    => 'Link',
            'facebook_url' => '',
            'whatsapp_url' => '',
            'telegram_url' => '',
            'sort_order'   => 1,
            'status'       => 'published',
        ],
        [
            'title'        => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
            'description'  => 'Property management is the professional administration of residential properties on behalf of owners.',
            'image'        => 'home/latest_activities/2img.png',
            'link'         => '/insights/view-full-insight',
            'link_text'    => 'Link',
            'facebook_url' => '',
            'whatsapp_url' => '',
            'telegram_url' => '',
            'sort_order'   => 2,
            'status'       => 'published',
        ],
        [
            'title'        => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
            'description'  => 'Property management is the professional administration of residential properties on behalf of owners.',
            'image'        => 'home/latest_activities/3img.png',
            'link'         => '/insights/view-full-insight',
            'link_text'    => 'Link',
            'facebook_url' => '',
            'whatsapp_url' => '',
            'telegram_url' => '',
            'sort_order'   => 3,
            'status'       => 'published',
        ],
    ];

    public function index()
    {
        if (EventItem::count() === 0) {
            foreach ($this->defaults as $d) {
                EventItem::create($d);
            }
        }

        $events = EventItem::orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => $events,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string|max:1000',
            'image'        => 'nullable|string|max:500',
            'link'         => 'nullable|string|max:500',
            'link_text'    => 'nullable|string|max:100',
            'facebook_url' => 'nullable|string|max:500',
            'whatsapp_url' => 'nullable|string|max:500',
            'telegram_url' => 'nullable|string|max:500',
            'sort_order'   => 'nullable|integer',
            'status'       => 'nullable|string|in:published,draft',
            'image_file'   => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('events', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        if (empty($validated['link'])) {
            $validated['link'] = '/insights/view-full-insight';
        }
        if (empty($validated['link_text'])) {
            $validated['link_text'] = 'Link';
        }
        if (empty($validated['status'])) {
            $validated['status'] = 'published';
        }

        $event = EventItem::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Event item created successfully!',
            'data'    => $event,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $event = EventItem::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string|max:1000',
            'image'        => 'nullable|string|max:500',
            'link'         => 'nullable|string|max:500',
            'link_text'    => 'nullable|string|max:100',
            'facebook_url' => 'nullable|string|max:500',
            'whatsapp_url' => 'nullable|string|max:500',
            'telegram_url' => 'nullable|string|max:500',
            'sort_order'   => 'nullable|integer',
            'status'       => 'nullable|string|in:published,draft',
            'image_file'   => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('events', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        unset($validated['image_file']);

        if (empty($validated['link'])) {
            $validated['link'] = '/insights/view-full-insight';
        }
        if (empty($validated['link_text'])) {
            $validated['link_text'] = 'Link';
        }

        $event->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Event item updated successfully!',
            'data'    => $event,
        ]);
    }

    public function destroy(int $id)
    {
        $event = EventItem::findOrFail($id);
        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event item deleted successfully!',
        ]);
    }
}
