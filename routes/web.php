<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $faqs = \App\Models\Faq::where('page', 'home')
        ->where('status', 'published')
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

    $aboutStory = \App\Models\AboutStorySection::firstOrCreate(
        ['page' => 'about-us'],
        [
            'tagline' => 'Our Story',
            'headline' => 'Building Trust Through Commitment and Personal Relationships',
            'paragraphs' => [
                'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
                'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors. Their willingness to meet clients personally, understand their expectations, and deliver on every commitment became the foundation of the company\'s reputation.',
                'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.',
                'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.'
            ],
            'image_left' => 'about_us/our_story/longest.png',
            'image_top_right' => 'about_us/our_story/top_one.png',
            'image_bottom_right' => 'about_us/our_story/bottom_one.png',
        ]
    );

    $aboutValues = \App\Models\AboutValuesSection::firstOrCreate(['page' => 'about-us'], [
            'cards' => [
                [
                    'title' => 'Vision',
                    'icon' => 'about_us/icons/vision.svg',
                    'subtitle' => 'Contributing to Cambodia\'s Growing Property & Hospitality Industry',
                    'description' => 'To become one of Cambodia\'s most trusted property management and hospitality companies by delivering professional services, creating long-term value for property owners, and supporting the sustainable growth of Cambodia\'s real estate sector.',
                    'button_text' => 'See More'
                ],
                [
                    'title' => 'Mission',
                    'icon' => 'about_us/icons/mission.svg',
                    'subtitle' => '',
                    'description' => 'Our mission is to provide professional property management, leasing, and hospitality solutions that benefit both property owners and guests.',
                    'button_text' => 'See More'
                ],
                [
                    'title' => 'Core Values',
                    'icon' => 'about_us/icons/core_value.svg',
                    'subtitle' => 'Integrity',
                    'description' => 'We conduct every business relationship with honesty, transparency, and professionalism.',
                    'button_text' => 'See More'
                ]
            ]
        ]);

        $aboutShowcase = \App\Models\AboutShowcaseSection::firstOrCreate(
        ['page' => 'about-us'],
        [
            'image_1' => 'home/latest_activities/1img.png',
            'image_2' => 'about_us/our_story/longest.png',
            'image_3' => 'about_us/our_story/bottom_one.png',
            'alt_1' => 'CWD Realty Story',
            'alt_2' => 'CWD Realty Development',
            'alt_3' => 'CWD Realty Properties',
        ]
    );

    $faqLeft = \App\Models\Faq::where('page', 'about-us')
        ->where('column', 'left')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    $faqRight = \App\Models\Faq::where('page', 'about-us')
        ->where('column', 'right')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    return view('pages.about_us', compact('heroSection', 'aboutStory', 'aboutValues', 'aboutShowcase', 'faqLeft', 'faqRight'));
});

Route::get('/latest-activities', function () {
    return view('pages.latest_activities');
});

Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/insights', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'insights'],
        [
            'tagline_html'  => 'Insights',
            'headline'      => "Your Trusted Property\nManagement & Hospitality\nPartner in Cambodia",
            'show_bullets'  => false,
            'bullets'       => [],
            'buttons'       => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );

    // Seed defaults if empty
    if (\App\Models\InsightCard::count() === 0) {
        $defaults = [
            ['title' => 'Discover Wealth Mansion', 'description' => 'Property management is the professional administration of residential properties on behalf of owners.', 'image' => 'home/latest_activities/3img.png', 'link' => '/insights/view-full-insight', 'link_text' => 'View Full Insights', 'sort_order' => 1, 'status' => 'published'],
            ['title' => 'Cambodia Real Estate Market 2025', 'description' => 'An in-depth look at the latest trends, investment opportunities, and growth sectors in Cambodia\'s real estate industry.', 'image' => 'home/latest_activities/3img.png', 'link' => '/insights/view-full-insight', 'link_text' => 'View Full Insights', 'sort_order' => 2, 'status' => 'published'],
            ['title' => 'Maximizing Your Rental Yield', 'description' => 'Expert strategies to help property owners improve occupancy rates and maximise their rental income.', 'image' => 'home/latest_activities/3img.png', 'link' => '/insights/view-full-insight', 'link_text' => 'View Full Insights', 'sort_order' => 3, 'status' => 'published'],
        ];
        foreach ($defaults as $d) \App\Models\InsightCard::create($d);
    }

    $insightCards = \App\Models\InsightCard::where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    // Query FAQs for Insights
    $faqLeft = \App\Models\Faq::where('page', 'insights')
        ->where('column', 'left')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    $faqRight = \App\Models\Faq::where('page', 'insights')
        ->where('column', 'right')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    return view('pages.insights', compact('heroSection', 'insightCards', 'faqLeft', 'faqRight'));
});


Route::get('/insights/view-full-insight/{id?}', function ($id = null) {
    // Query FAQs for Insights Detail
    $faqLeft = \App\Models\Faq::where('page', 'insights')
        ->where('column', 'left')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    $faqRight = \App\Models\Faq::where('page', 'insights')
        ->where('column', 'right')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    if ($id && $id !== 'all') {
        $card = \App\Models\InsightCard::find($id);
        if ($card) {
            $defaultDetail = \App\Models\InsightDetailSection::where('page', 'insights')->first();
            $detail = (object) [
                'banner_title'       => $card->banner_title ?: ($card->title ?: ($defaultDetail->banner_title ?? "Your Trusted Property\nManagement & Hospitality\nPartner in Cambodia")),
                'image_left'         => $card->image_left ?: ($card->image ?: ($defaultDetail->image_left ?? 'home/latest_activities/3img.png')),
                'image_right'        => $card->image_right ?: ($defaultDetail->image_right ?? 'home/latest_activities/3img.png'),
                'body_paragraphs'    => (!empty($card->body_paragraphs) && is_array($card->body_paragraphs)) ? $card->body_paragraphs : ($defaultDetail->body_paragraphs ?? [
                    'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
                    'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors.',
                    'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.',
                    'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.',
                ]),
                'feature_image'      => $card->feature_image ?: ($defaultDetail->feature_image ?? 'about_us/our_story/top_one.png'),
                'feature_paragraphs' => (!empty($card->feature_paragraphs) && is_array($card->feature_paragraphs)) ? $card->feature_paragraphs : ($defaultDetail->feature_paragraphs ?? [
                    'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
                    'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia.',
                    'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest.',
                    'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.',
                ]),
            ];
            return view('pages.insights_detail.view_full_insight', compact('detail', 'card', 'faqLeft', 'faqRight'));
        }
    }

    $detail = \App\Models\InsightDetailSection::firstOrCreate(
        ['page' => 'insights'],
        [
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
                'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia.',
                'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest.',
                'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.',
            ],
        ]
    );
    return view('pages.insights_detail.view_full_insight', compact('detail', 'faqLeft', 'faqRight'));
});

Route::get('/events', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'events'],
        [
            'tagline_html' => 'Events',
            'headline'     => "Your Trusted Property\nManagement & Hospitality\nPartner in Cambodia",
            'show_bullets' => false,
            'bullets'      => [],
            'buttons'      => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );

    if (\App\Models\EventItem::count() === 0) {
        app(\App\Http\Controllers\EventItemController::class)->index();
    }

    $eventItems = \App\Models\EventItem::where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    return view('pages.events', compact('heroSection', 'eventItems'));
});

Route::get('/contact-us', function () {
    return view('pages.contact_us');
});

Route::get('/properties', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'properties'],
        [
            'tagline_box1' => 'Properties',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => '',
            'tagline_box2_style' => 'bold-gold',
            'headline' => "Your Trusted Property Management & Hospitality Partner in Cambodia",
            'show_bullets' => false,
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '#featured-properties-section'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $featuredProperties = \App\Models\ServiceFeaturedProperty::where('page', 'properties')
        ->where('publish_status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    if ($featuredProperties->count() === 0) {
        $controller = new \App\Http\Controllers\ServiceFeaturedPropertyController();
        $controller->index(request(), 'properties');
        $featuredProperties = \App\Models\ServiceFeaturedProperty::where('page', 'properties')
            ->where('publish_status', 'published')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }

    $faqs = \App\Models\Faq::where('page', 'properties')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $faqLeft = $faqs->where('column', 'left')->values()->toArray();
    $faqRight = $faqs->where('column', 'right')->values()->toArray();

    return view('pages.properties', compact('heroSection', 'featuredProperties', 'faqLeft', 'faqRight'));
});

Route::get('/partners', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'partners'],
        [
            'tagline_box1' => 'Partners',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => '',
            'tagline_box2_style' => 'bold-gold',
            'headline' => "Build Your Career in Real Estate\nwith CWD Real Estate Agent &\nDeveloper",
            'show_bullets' => true,
            'bullets' => ['Flexible income', 'Strong brand', 'Real projects', 'Full sales support'],
            'buttons' => [
                ['text' => 'Apply As Sale Agent', 'url' => '#application-form-section']
            ]
        ]
    );

    $faqs = \App\Models\Faq::where('page', 'partners')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $faqLeft = $faqs->where('column', 'left')->values()->toArray();
    $faqRight = $faqs->where('column', 'right')->values()->toArray();

    return view('pages.partner', compact('heroSection', 'faqLeft', 'faqRight'));
});

Route::get('/partner', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'partners'],
        [
            'tagline_box1' => 'Partners',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => '',
            'tagline_box2_style' => 'bold-gold',
            'headline' => "Build Your Career in Real Estate\nwith CWD Real Estate Agent &\nDeveloper",
            'show_bullets' => true,
            'bullets' => ['Flexible income', 'Strong brand', 'Real projects', 'Full sales support'],
            'buttons' => [
                ['text' => 'Apply As Sale Agent', 'url' => '#application-form-section']
            ]
        ]
    );

    $faqs = \App\Models\Faq::where('page', 'partners')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $faqLeft = $faqs->where('column', 'left')->values()->toArray();
    $faqRight = $faqs->where('column', 'right')->values()->toArray();

    return view('pages.partner', compact('heroSection', 'faqLeft', 'faqRight'));
});

Route::get('/services/property-management', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'property-management'],
        [
            'tagline_box1' => 'Property',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => 'Management',
            'tagline_box2_style' => 'bold-gold',
            'headline' => 'Professional Property Management Services in Cambodia',
            'show_bullets' => false,
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $propertyMaximize = \App\Models\ServiceMaximizeSection::firstOrCreate(
        ['page' => 'property-management'],
        [
            'title' => 'Maximize Your Property Investment with Professional Management',
            'image' => 'services/maximmize/maximize.png',
            'alt_text' => 'Phnom Penh skyline',
            'paragraphs' => [
                'Managing a rental property requires time, expertise, and consistent attention to detail. CWD Realty & Hospitality provides comprehensive property management services that help condominium owners protect their investments, increase occupancy, and deliver exceptional experiences for tenants and guests.',
                'Whether your property is intended for daily, weekly, monthly, or long-term rentals, our experienced team manages every aspect of the operation so you can enjoy peace of mind and reliable returns.'
            ]
        ]
    );
    $propertyOverview = \App\Models\ServiceOverviewSection::firstOrCreate(
        ['page' => 'property-management'],
        [
            'image' => 'services/bg_img/bg_img.png',
            'alt_text' => 'What is Property Management?',
            'title_line1' => 'What is',
            'title_line2' => 'Property',
            'title_line3' => 'Management?',
            'description' => 'Property management is the professional administration of residential properties on behalf of owners. Our team oversees daily operations, tenant coordination, maintenance scheduling, rental administration, financial reporting, and hospitality services to ensure your property performs efficiently and remains well maintained.'
        ]
    );
    $managementModels = \App\Models\ServiceManagementModel::firstOrCreate(
        ['page' => 'property-management'],
        [
            'title_line1' => 'Our',
            'title_line2' => 'Management',
            'title_line3' => 'Models',
            'models' => [
                [
                    'title' => 'Revenue Sharing',
                    'image' => 'services/propertis_leasing/bedroom.png',
                    'alt_text' => 'Revenue Sharing Model',
                    'description' => 'Suitable for short-term rentals. Property owners receive rental income while CWD Realty & Hospitality manages daily operations based on an agreed 10% management fee.'
                ],
                [
                    'title' => 'Long-Term Leasing Management',
                    'image' => 'services/maximmize/maximize.png',
                    'alt_text' => 'Long-Term Leasing Management Model',
                    'description' => 'For long-term rental properties, we provide exclusive leasing management, tenant administration, and operational support while owners receive regular $400 monthly rental income and extra 5% if the daily renting exceed $400 according to the management agreement.'
                ]
            ]
        ]
    );
    $faqs = \App\Models\Faq::where('page', 'property-management')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    return view('pages.services.property_management', compact('heroSection', 'propertyMaximize', 'propertyOverview', 'managementModels', 'faqs'));
});

Route::get('/services/property-sales', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'property-sales'],
        [
            'tagline_box1' => 'Property',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => 'Sales',
            'tagline_box2_style' => 'bold-gold',
            'headline' => 'Prime Real Estate Investments & Condominium Sales in Cambodia',
            'show_bullets' => false,
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $propertyMaximize = \App\Models\ServiceMaximizeSection::firstOrCreate(
        ['page' => 'property-sales'],
        [
            'title' => 'Professional Property Sales for Buyers, Investors & Owners',
            'image' => 'services/maximmize/maximize.png',
            'alt_text' => 'Phnom Penh skyline',
            'paragraphs' => [
                'Our team understands the Cambodian property market and works closely with buyers, investors, and property owners to ensure a smooth, transparent, and successful sales process.'
            ]
        ]
    );
    $faqs = \App\Models\Faq::where('page', 'property-sales')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $featuredProperties = \App\Models\ServiceFeaturedProperty::where('page', 'property-sales')
        ->where('publish_status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    return view('pages.services.property_sales', compact('heroSection', 'propertyMaximize', 'faqs', 'featuredProperties'));
});

Route::get('/services/property-leasing', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'property-leasing'],
        [
            'tagline_box1' => 'Property',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => 'Leasing',
            'tagline_box2_style' => 'bold-gold',
            'headline' => 'Quality Condominium Rentals & Flexible Leasing Solutions',
            'show_bullets' => false,
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $propertyMaximize = \App\Models\ServiceMaximizeSection::firstOrCreate(
        ['page' => 'property-leasing'],
        [
            'title' => 'Find professionally managed properties in Phnom Penh.',
            'image' => 'home/latest_activities/3img.png',
            'alt_text' => 'Golden Tower 322',
            'paragraphs' => [
                'Whether you need a place for a few nights, several weeks, or an extended stay, CWD Realty & Hospitality offers flexible rental options designed around your accommodation needs.'
            ]
        ]
    );
    $faqs = \App\Models\Faq::where('page', 'property-leasing')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $featuredProperties = \App\Models\ServiceFeaturedProperty::where('page', 'property-leasing')
        ->where('publish_status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    return view('pages.services.property_leasing', compact('heroSection', 'propertyMaximize', 'faqs', 'featuredProperties'));
});

Route::get('/services/hospitality-services', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'hospitality-services'],
        [
            'tagline_box1' => 'Hospitality',
            'tagline_box1_style' => 'light-gold',
            'tagline_box2' => 'Services',
            'tagline_box2_style' => 'bold-gold',
            'headline' => 'Exceptional Hospitality & Accommodation Services in Cambodia',
            'show_bullets' => false,
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $propertyMaximize = \App\Models\ServiceMaximizeSection::firstOrCreate(
        ['page' => 'hospitality-services'],
        [
            'title' => 'Comfortable Stays, Convenient Services, Personalized Support',
            'image' => 'home/latest_activities/3img.png',
            'alt_text' => 'Golden Tower 322',
            'paragraphs' => [
                'Whether you are visiting Cambodia for business, leisure, or an extended stay, our team can arrange additional services based on your needs.'
            ]
        ]
    );
    $faqs = \App\Models\Faq::where('page', 'hospitality-services')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    return view('pages.services.hospitality_services', compact('heroSection', 'propertyMaximize', 'faqs'));
});

Route::get('/services/properties/wealth-mansion', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'properties-wealth-mansion'],
        [
            'tagline_box1' => 'Wealth Mansion',
            'tagline_box1_style' => 'bold-gold',
            'tagline_box2' => '',
            'tagline_box2_style' => 'light-gold',
            'headline' => 'Premium Condominiums for Sale in Phnom Penh',
            'show_bullets' => true,
            'bullets' => ['30% available'],
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $discoverGallery = \App\Models\ProjectGallery::where('page', 'wealth-mansion')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $unitProperties = \App\Models\ServiceFeaturedProperty::where('page', 'wealth-mansion-units')
        ->where('publish_status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $facilitiesGallery = \App\Models\ProjectGallery::where('page', 'wealth-mansion-facilities')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $availabilityItem = \App\Models\ProjectGallery::where('page', 'wealth-mansion-availability')->first();
    $faqs = \App\Models\Faq::where('page', 'wealth-mansion')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    return view('components.detail_service_featured_project.wealth_mansion', compact('heroSection', 'discoverGallery', 'unitProperties', 'facilitiesGallery', 'availabilityItem', 'faqs'));
});
Route::get('/properties/wealth-mansion', function () {
    $heroSection = \App\Models\HeroSection::firstOrCreate(
        ['page' => 'properties-wealth-mansion'],
        [
            'tagline_box1' => 'Wealth Mansion',
            'tagline_box1_style' => 'bold-gold',
            'tagline_box2' => '',
            'tagline_box2_style' => 'light-gold',
            'headline' => 'Premium Condominiums for Sale in Phnom Penh',
            'show_bullets' => true,
            'bullets' => ['30% available'],
            'buttons' => [
                ['text' => 'Browse Properties', 'url' => '/properties'],
                ['text' => 'Contact Us', 'url' => '/contact-us']
            ]
        ]
    );
    $discoverGallery = \App\Models\ProjectGallery::where('page', 'wealth-mansion')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $unitProperties = \App\Models\ServiceFeaturedProperty::where('page', 'wealth-mansion-units')
        ->where('publish_status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $facilitiesGallery = \App\Models\ProjectGallery::where('page', 'wealth-mansion-facilities')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    $availabilityItem = \App\Models\ProjectGallery::where('page', 'wealth-mansion-availability')->first();
    $faqs = \App\Models\Faq::where('page', 'wealth-mansion')
        ->where('status', 'published')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    return view('components.detail_service_featured_project.wealth_mansion', compact('heroSection', 'discoverGallery', 'unitProperties', 'facilitiesGallery', 'availabilityItem', 'faqs'));
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
    return view('pages.services.properties_leasing_list.detail_img.studio_room', [
        'roomSlug' => 'daily-weekly-rentals-studio-room'
    ]);
});
Route::get('/services/properties-leasing-list/detail-img/studio-room', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room', [
        'roomSlug' => 'daily-weekly-rentals-studio-room'
    ]);
});

Route::get('/services/property-leasing/daily-weekly-rentals/1-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.1_bedroom', [
        'roomSlug' => 'daily-weekly-rentals-1-bedroom'
    ]);
});
Route::get('/services/properties-leasing-list/detail-img/1-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.1_bedroom', [
        'roomSlug' => 'daily-weekly-rentals-1-bedroom'
    ]);
});

Route::get('/services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony', function () {
    return view('pages.services.properties_leasing_list.detail_img.2_bedroom_with_balcony', [
        'roomSlug' => 'daily-weekly-rentals-2-bedroom-with-balcony'
    ]);
});
Route::get('/services/properties-leasing-list/detail-img/2-bedroom-with-balcony', function () {
    return view('pages.services.properties_leasing_list.detail_img.2_bedroom_with_balcony', [
        'roomSlug' => 'daily-weekly-rentals-2-bedroom-with-balcony'
    ]);
});

Route::get('/services/property-leasing/daily-weekly-rentals/3-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.3_bedroom', [
        'roomSlug' => 'daily-weekly-rentals-3-bedroom'
    ]);
});
Route::get('/services/properties-leasing-list/detail-img/3-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.3_bedroom', [
        'roomSlug' => 'daily-weekly-rentals-3-bedroom'
    ]);
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

Route::get('/api/about-values/{page?}', [\App\Http\Controllers\AboutValuesSectionController::class, 'show']);
Route::post('/api/about-values/{page?}', [\App\Http\Controllers\AboutValuesSectionController::class, 'update']);
Route::get('/api/about-showcase/{page?}', [\App\Http\Controllers\AboutShowcaseSectionController::class, 'get']);
Route::post('/api/about-showcase/{page?}', [\App\Http\Controllers\AboutShowcaseSectionController::class, 'update']);
Route::get('/api/about-story/{page?}', [\App\Http\Controllers\AboutStorySectionController::class, 'show']);
Route::post('/api/about-story/{page?}', [\App\Http\Controllers\AboutStorySectionController::class, 'update']);
Route::get('/api/hero-section/{page?}', [\App\Http\Controllers\HeroSectionController::class, 'show']);
Route::post('/api/hero-section/{page?}', [\App\Http\Controllers\HeroSectionController::class, 'update']);

Route::get('/api/service-maximize/{page?}', [\App\Http\Controllers\ServiceMaximizeSectionController::class, 'show']);
Route::post('/api/service-maximize/{page?}', [\App\Http\Controllers\ServiceMaximizeSectionController::class, 'update']);

Route::get('/api/service-overview/{page?}', [\App\Http\Controllers\ServiceOverviewSectionController::class, 'show']);
Route::post('/api/service-overview/{page?}', [\App\Http\Controllers\ServiceOverviewSectionController::class, 'update']);

Route::get('/api/service-management-models/{page?}', [\App\Http\Controllers\ServiceManagementModelController::class, 'show']);
Route::post('/api/service-management-models/{page?}', [\App\Http\Controllers\ServiceManagementModelController::class, 'update']);

Route::get('/api/faqs', [\App\Http\Controllers\FaqController::class, 'index']);
Route::post('/api/faqs', [\App\Http\Controllers\FaqController::class, 'store']);
Route::post('/api/faqs/{faq}', [\App\Http\Controllers\FaqController::class, 'update']);
Route::delete('/api/faqs/{faq}', [\App\Http\Controllers\FaqController::class, 'destroy']);

Route::get('/api/services-section/{page?}', [\App\Http\Controllers\ServicesSectionController::class, 'show']);
Route::post('/api/services-section/{page?}', [\App\Http\Controllers\ServicesSectionController::class, 'update']);

Route::get('/api/featured-properties', [\App\Http\Controllers\FeaturedPropertyController::class, 'index']);
Route::post('/api/featured-properties', [\App\Http\Controllers\FeaturedPropertyController::class, 'store']);
Route::post('/api/featured-properties/{featuredProperty}', [\App\Http\Controllers\FeaturedPropertyController::class, 'update']);
Route::delete('/api/featured-properties/{featuredProperty}', [\App\Http\Controllers\FeaturedPropertyController::class, 'destroy']);

Route::get('/api/service-featured-properties/{page?}', [\App\Http\Controllers\ServiceFeaturedPropertyController::class, 'index']);
Route::post('/api/service-featured-properties/{page?}', [\App\Http\Controllers\ServiceFeaturedPropertyController::class, 'store']);
Route::post('/api/service-featured-properties/update/{id}', [\App\Http\Controllers\ServiceFeaturedPropertyController::class, 'update']);
Route::delete('/api/service-featured-properties/{id}', [\App\Http\Controllers\ServiceFeaturedPropertyController::class, 'destroy']);

Route::get('/api/why-choose-us/{page?}', [\App\Http\Controllers\WhyChooseUsSectionController::class, 'show']);
Route::post('/api/why-choose-us/{page?}', [\App\Http\Controllers\WhyChooseUsSectionController::class, 'update']);

Route::get('/api/latest-activities', [\App\Http\Controllers\LatestActivityController::class, 'index']);
Route::post('/api/latest-activities', [\App\Http\Controllers\LatestActivityController::class, 'store']);
Route::post('/api/latest-activities/{latestActivity}', [\App\Http\Controllers\LatestActivityController::class, 'update']);
Route::delete('/api/latest-activities/{latestActivity}', [\App\Http\Controllers\LatestActivityController::class, 'destroy']);

// Insight Cards (Insights & News detail cards)
Route::get('/api/insight-cards', [\App\Http\Controllers\InsightCardController::class, 'index']);
Route::post('/api/insight-cards', [\App\Http\Controllers\InsightCardController::class, 'store']);
Route::post('/api/insight-cards/{id}', [\App\Http\Controllers\InsightCardController::class, 'update']);
Route::delete('/api/insight-cards/{id}', [\App\Http\Controllers\InsightCardController::class, 'destroy']);

// Event Items (Events page under hero section)
Route::get('/api/event-items', [\App\Http\Controllers\EventItemController::class, 'index']);
Route::post('/api/event-items', [\App\Http\Controllers\EventItemController::class, 'store']);
Route::post('/api/event-items/{id}', [\App\Http\Controllers\EventItemController::class, 'update']);
Route::delete('/api/event-items/{id}', [\App\Http\Controllers\EventItemController::class, 'destroy']);

// Insight Detail Section (view-full-insight page content)
Route::get('/api/insight-detail/{page?}', [\App\Http\Controllers\InsightDetailSectionController::class, 'show']);
Route::post('/api/insight-detail/{page?}', [\App\Http\Controllers\InsightDetailSectionController::class, 'update']);


// Project Galleries (e.g. Discover Wealth Mansion)
Route::get('/api/project-galleries/{page?}', [\App\Http\Controllers\ProjectGalleryController::class, 'index']);
Route::post('/api/project-galleries/{page?}', [\App\Http\Controllers\ProjectGalleryController::class, 'store']);
Route::post('/api/project-galleries/update/{projectGallery}', [\App\Http\Controllers\ProjectGalleryController::class, 'update']);
Route::delete('/api/project-galleries/{projectGallery}', [\App\Http\Controllers\ProjectGalleryController::class, 'destroy']);

// Comments & Approval Routes
Route::get('/api/public-comments', [\App\Http\Controllers\CommentController::class, 'publicComments']);
Route::post('/api/comments/submit', [\App\Http\Controllers\CommentController::class, 'submit']);
Route::get('/api/comments', [\App\Http\Controllers\CommentController::class, 'index']);
Route::post('/api/comments/{comment}/approve', [\App\Http\Controllers\CommentController::class, 'approve']);
Route::post('/api/comments/{comment}/reject', [\App\Http\Controllers\CommentController::class, 'reject']);
Route::get('/dashboard/pages/latest-activities', function () {
    return view('dashboard.pages.latest_activities', [
        'pageTitle' => 'Latest Activities',
        'pageSlug' => 'latest-activities',
        'frontendUrl' => '/'
    ]);
});

Route::get('/dashboard/pages/about-us', function () {
    return view('dashboard.pages.about_us', [
        'pageTitle' => 'About Us Page',
        'pageSlug' => 'about-us'
    ]);
});

Route::get('/dashboard/pages/services/property-management', function () {
    return view('dashboard.pages.services.service_hero', [
        'pageSlug' => 'property-management',
        'pageTitle' => 'Property Management',
        'frontendUrl' => '/services/property-management'
    ]);
});

Route::get('/dashboard/pages/services/property-leasing', function () {
    return view('dashboard.pages.services.service_hero', [
        'pageSlug' => 'property-leasing',
        'pageTitle' => 'Property Leasing',
        'frontendUrl' => '/services/property-leasing'
    ]);
});

Route::get('/dashboard/pages/services/property-sales', function () {
    return view('dashboard.pages.services.service_hero', [
        'pageSlug' => 'property-sales',
        'pageTitle' => 'Property Sales',
        'frontendUrl' => '/services/property-sales'
    ]);
});

Route::get('/dashboard/pages/services/hospitality-services', function () {
    return view('dashboard.pages.services.service_hero', [
        'pageSlug' => 'hospitality-services',
        'pageTitle' => 'Hospitality Services',
        'frontendUrl' => '/services/hospitality-services'
    ]);
});

Route::get('/dashboard/pages/properties', function () {
    return view('dashboard.pages.properties', [
        'pageSlug' => 'properties',
        'pageTitle' => 'Properties & Listings',
        'frontendUrl' => '/properties'
    ]);
});

Route::get('/dashboard/pages/partners', function () {
    return view('dashboard.pages.partners', [
        'pageSlug' => 'partners',
        'pageTitle' => 'Partners',
        'frontendUrl' => '/partners'
    ]);
});

Route::get('/dashboard/pages/insights', function () {
    return view('dashboard.pages.insights', [
        'pageSlug'   => 'insights',
        'pageTitle'  => 'Insights & News',
        'frontendUrl' => '/insights'
    ]);
});

Route::get('/dashboard/pages/events', function () {
    return view('dashboard.pages.events', [
        'pageSlug'   => 'events',
        'pageTitle'  => 'Events Page',
        'frontendUrl' => '/events'
    ]);
});

Route::get('/dashboard/pages/properties/wealth-mansion', function () {
    return view('dashboard.pages.properties.wealth_mansion', [
        'pageTitle' => 'Wealth Mansion Project',
        'pageSlug' => 'properties-wealth-mansion',
        'frontendUrl' => '/properties/wealth-mansion'
    ]);
});

Route::get('/dashboard/pages/properties/private-residential', function () {
    return view('dashboard.pages.properties.property_hero', [
        'pageTitle' => 'Private Residential',
        'pageSlug' => 'properties-private-residential',
        'frontendUrl' => '/properties/private-residential',
        'defaultHeadline' => "Exclusive Residential\nDevelopment",
        'defaultImage' => asset('services/private residential/Private Residential.png')
    ]);
});

Route::get('/dashboard/pages/properties/uc88', function () {
    return view('dashboard.pages.properties.property_hero', [
        'pageTitle' => 'UC88 Residence',
        'pageSlug' => 'properties-uc88',
        'frontendUrl' => '/properties/uc88',
        'defaultHeadline' => "Residential Property\nProject",
        'defaultImage' => asset('services/uc88/uc88.png')
    ]);
});

Route::get('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals', function () {
    return view('dashboard.pages.properties.daily_weekly_rentals', [
        'pageTitle' => 'Daily & Weekly Rentals',
        'pageSlug' => 'daily-weekly-rentals',
        'frontendUrl' => '/services/property-leasing/daily-weekly-rentals'
    ]);
});

Route::get('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals/rooms/{room}', function ($room) {
    $roomMap = [
        'studio' => [
            'title' => 'Studio Room',
            'slug' => 'daily-weekly-rentals-studio-room',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/studio-room'
        ],
        'studio-room' => [
            'title' => 'Studio Room',
            'slug' => 'daily-weekly-rentals-studio-room',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/studio-room'
        ],
        '1bed' => [
            'title' => '1-Bedroom',
            'slug' => 'daily-weekly-rentals-1-bedroom',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/1-bedroom'
        ],
        '1-bedroom' => [
            'title' => '1-Bedroom',
            'slug' => 'daily-weekly-rentals-1-bedroom',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/1-bedroom'
        ],
        '2bed' => [
            'title' => '2-Bedroom Balcony',
            'slug' => 'daily-weekly-rentals-2-bedroom-with-balcony',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony'
        ],
        '2-bedroom-with-balcony' => [
            'title' => '2-Bedroom Balcony',
            'slug' => 'daily-weekly-rentals-2-bedroom-with-balcony',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony'
        ],
        '3bed' => [
            'title' => '3-Bedroom Suite',
            'slug' => 'daily-weekly-rentals-3-bedroom',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/3-bedroom'
        ],
        '3-bedroom' => [
            'title' => '3-Bedroom Suite',
            'slug' => 'daily-weekly-rentals-3-bedroom',
            'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/3-bedroom'
        ],
    ];

    $data = $roomMap[$room] ?? [
        'title' => ucwords(str_replace('-', ' ', $room)),
        'slug' => 'daily-weekly-rentals-' . $room,
        'frontendUrl' => '/services/property-leasing/daily-weekly-rentals/' . $room
    ];

    return view('dashboard.pages.properties.rooms.room_detail', [
        'pageTitle' => $data['title'],
        'pageSlug' => $data['slug'],
        'frontendUrl' => $data['frontendUrl']
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


