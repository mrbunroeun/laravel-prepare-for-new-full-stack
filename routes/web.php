<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $faqs = \App\Models\Faq::where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    $faqLeft = $faqs->where('column', 'left')->values()->toArray();
    $faqRight = $faqs->where('column', 'right')->values()->toArray();

    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'home'],
        [
            'tagline_box1' => 'CWD',
            'tagline_box1_style' => 'bold-gold',
            'tagline_box2' => 'Real Estate Agent & Developer',
            'tagline_box2_style' => 'light-gold',
            'headline' => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
            'show_bullets' => false,
            'bullets' => ['Flexible income', 'Strong brand', 'Real projects', 'Full sales support'],
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );

    $servicesSection = \App\Models\ServicesSection::firstOrCreate(
        ['page' => 'home'],
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

    $whyChooseUsSection = \App\Models\WhyChooseUsSection::firstOrCreate(
        ['page' => 'home'],
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

    return view('pages.home', compact('faqLeft', 'faqRight', 'heroSection', 'servicesSection', 'whyChooseUsSection'));
});

Route::get('/about-us', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'about-us'],
        [
            'tagline_box1' => 'CWD',
            'tagline_box1_style' => 'bold-gold',
            'tagline_box2' => 'Real Estate Agent & Developer',
            'tagline_box2_style' => 'light-gold',
            'headline' => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
            'show_bullets' => false,
            'bullets' => ['Flexible income', 'Strong brand', 'Real projects', 'Full sales support'],
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );

    return view('pages.about_us', compact('heroSection'));
});

Route::get('/latest-activities', function () {
    return view('pages.latest_activities');
});

Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/insights', function () {
    return view('pages.insights');
});

Route::get('/insights/view-full-insight', function () {
    return view('pages.insights_detail.view_full_insight');
});

Route::get('/events', function () {
    return view('pages.events');
});

Route::get('/contact-us', function () {
    return view('pages.contact_us');
});

Route::get('/properties', function () {
    return view('pages.properties');
});

Route::get('/partners', function () {
    return view('pages.partner');
});

Route::get('/partner', function () {
    return view('pages.partner');
});

Route::get('/services/property-management', function () {
    return view('pages.services.property_management');
});

Route::get('/services/property-sales', function () {
    return view('pages.services.property_sales');
});

Route::get('/services/property-leasing', function () {
    return view('pages.services.property_leasing');
});

Route::get('/services/hospitality-services', function () {
    return view('pages.services.hospitality_services');
});

Route::get('/services/properties/wealth-mansion', function () {
    return view('components.detail_service_featured_project.wealth_mansion');
});
Route::get('/properties/wealth-mansion', function () {
    return view('components.detail_service_featured_project.wealth_mansion');
});

Route::get('/services/properties/uc88', function () {
    return view('components.detail_service_featured_project.uc88');
});
Route::get('/properties/uc88', function () {
    return view('components.detail_service_featured_project.uc88');
});
Route::get('/properties/uc88-residence', function () {
    return view('components.detail_service_featured_project.uc88');
});

Route::get('/services/properties/private-residential', function () {
    return view('components.detail_service_featured_project.private_residential');
});
Route::get('/properties/private-residential', function () {
    return view('components.detail_service_featured_project.private_residential');
});
Route::get('/properties/private-residential-collection', function () {
    return view('components.detail_service_featured_project.private_residential');
});

Route::get('/services/property-leasing/daily-weekly-rentals', function () {
    return view('pages.services.properties_leasing_list.daily_&_weekly_rentals');
});
Route::get('/services/properties-leasing-list/daily-weekly-rentals', function () {
    return view('pages.services.properties_leasing_list.daily_&_weekly_rentals');
});
Route::get('/services/property-leasing/daily-weekly-rentals/studio-room', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/studio-room', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

Route::get('/services/property-leasing/daily-weekly-rentals/1-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/1-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

Route::get('/services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/2-bedroom-with-balcony', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

Route::get('/services/property-leasing/daily-weekly-rentals/3-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
// ==========================================
// Dashboard Routes (Frontend UI Preview & Backend)
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard.pages.home');
});

Route::get('/dashboard/pages/home', function () {
    return view('dashboard.pages.home');
});

Route::get('/api/faqs', [\App\Http\Controllers\FaqController::class, 'index']);
Route::post('/api/faqs', [\App\Http\Controllers\FaqController::class, 'store']);
Route::put('/api/faqs/{faq}', [\App\Http\Controllers\FaqController::class, 'update']);
Route::delete('/api/faqs/{faq}', [\App\Http\Controllers\FaqController::class, 'destroy']);

Route::get('/api/hero-section/{page?}', [\App\Http\Controllers\HeroSectionController::class, 'show']);
Route::post('/api/hero-section/{page?}', [\App\Http\Controllers\HeroSectionController::class, 'update']);

Route::get('/api/services-section/{page?}', [\App\Http\Controllers\ServicesSectionController::class, 'show']);
Route::post('/api/services-section/{page?}', [\App\Http\Controllers\ServicesSectionController::class, 'update']);

Route::get('/api/featured-properties', [\App\Http\Controllers\FeaturedPropertyController::class, 'index']);
Route::post('/api/featured-properties', [\App\Http\Controllers\FeaturedPropertyController::class, 'store']);
Route::post('/api/featured-properties/{featuredProperty}', [\App\Http\Controllers\FeaturedPropertyController::class, 'update']);
Route::delete('/api/featured-properties/{featuredProperty}', [\App\Http\Controllers\FeaturedPropertyController::class, 'destroy']);

Route::get('/api/why-choose-us/{page?}', [\App\Http\Controllers\WhyChooseUsSectionController::class, 'show']);
Route::post('/api/why-choose-us/{page?}', [\App\Http\Controllers\WhyChooseUsSectionController::class, 'update']);

Route::get('/api/latest-activities', [\App\Http\Controllers\LatestActivityController::class, 'index']);
Route::post('/api/latest-activities', [\App\Http\Controllers\LatestActivityController::class, 'store']);
Route::post('/api/latest-activities/{latestActivity}', [\App\Http\Controllers\LatestActivityController::class, 'update']);
Route::delete('/api/latest-activities/{latestActivity}', [\App\Http\Controllers\LatestActivityController::class, 'destroy']);

// Comments & Approval Routes
Route::get('/api/public-comments', [\App\Http\Controllers\CommentController::class, 'publicComments']);
Route::post('/api/comments/submit', [\App\Http\Controllers\CommentController::class, 'submit']);
Route::get('/api/comments', [\App\Http\Controllers\CommentController::class, 'index']);
Route::post('/api/comments/{comment}/approve', [\App\Http\Controllers\CommentController::class, 'approve']);
Route::post('/api/comments/{comment}/reject', [\App\Http\Controllers\CommentController::class, 'reject']);
Route::delete('/api/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy']);

Route::get('/dashboard/pages/about-us', function () {
    return view('dashboard.pages.about_us', [
        'pageTitle' => 'About Us Page',
        'pageSlug' => 'about-us'
    ]);
});
Route::get('/dashboard/pages/{slug}', function ($slug) {
    $titles = [
        'about-us' => 'About Us Page',
        'services' => 'Services Page',
        'properties' => 'Properties & Listings',
        'insights' => 'Insights & News',
        'events' => 'Events Page',
        'partners' => 'Partners Page',
        'contact' => 'Contact Inquiries',
    ];
    $title = $titles[$slug] ?? ucwords(str_replace('-', ' ', $slug)) . ' Page';
    return view('dashboard.pages.generic', [
        'pageTitle' => $title,
        'pageSlug' => $slug
    ]);
});

Route::get('/dashboard/settings', function () {
    return view('dashboard.pages.generic', [
        'pageTitle' => 'General Settings',
        'pageSlug' => 'settings'
    ]);
});


