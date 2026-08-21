<?php

namespace App\Http\Controllers;

use App\Models\InsightDetailSection;
use Illuminate\Http\Request;

class InsightDetailSectionController extends Controller
{
    private static array $defaults = [
        'banner_title'       => "Your Trusted Property\nManagement & Hospitality\nPartner in Cambodia",
        'image_left'         => 'home/latest_activities/3img.png',
        'image_right'        => 'home/latest_activities/3img.png',
        'body_paragraphs'    => [
            'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
            'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors.',
            'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.',
            'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.',
        ],
        'feature_image'      => 'about_us/our_story/top_one.png',
        'feature_paragraphs' => [
            'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
            'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors.',
            'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest.',
            'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.',
        ],
    ];

    public function show(string $page = 'insights')
    {
        $section = InsightDetailSection::firstOrCreate(
            ['page' => $page],
            self::$defaults
        );

        return response()->json(['success' => true, 'data' => $section]);
    }

    public function update(Request $request, string $page = 'insights')
    {
        $section = InsightDetailSection::firstOrCreate(['page' => $page], self::$defaults);

        $data = [];

        if ($request->has('banner_title'))    $data['banner_title'] = $request->input('banner_title');
        if ($request->has('body_paragraphs')) $data['body_paragraphs'] = is_string($request->input('body_paragraphs'))
            ? json_decode($request->input('body_paragraphs'), true)
            : $request->input('body_paragraphs');
        if ($request->has('feature_paragraphs')) $data['feature_paragraphs'] = is_string($request->input('feature_paragraphs'))
            ? json_decode($request->input('feature_paragraphs'), true)
            : $request->input('feature_paragraphs');

        // Image handling
        if ($request->hasFile('image_left_file')) {
            $path = $request->file('image_left_file')->store('insights/detail', 'public');
            $data['image_left'] = 'storage/' . $path;
        } elseif ($request->has('image_left')) {
            $data['image_left'] = $request->input('image_left');
        }

        if ($request->hasFile('image_right_file')) {
            $path = $request->file('image_right_file')->store('insights/detail', 'public');
            $data['image_right'] = 'storage/' . $path;
        } elseif ($request->has('image_right')) {
            $data['image_right'] = $request->input('image_right');
        }

        if ($request->hasFile('feature_image_file')) {
            $path = $request->file('feature_image_file')->store('insights/detail', 'public');
            $data['feature_image'] = 'storage/' . $path;
        } elseif ($request->has('feature_image')) {
            $data['feature_image'] = $request->input('feature_image');
        }

        $section->update($data);

        return response()->json(['success' => true, 'message' => 'Insight detail section saved!', 'data' => $section]);
    }
}
