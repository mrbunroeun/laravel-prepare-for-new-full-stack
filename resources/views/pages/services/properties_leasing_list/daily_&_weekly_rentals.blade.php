@extends('layouts.app')
@section('content')
    @php
        $heroData = \App\Models\HeroSection::where('page', 'daily-weekly-rentals')->first();
        
        $heroTaglineHtml = $heroData?->tagline_html ?: 'Wealth <b>Mansion</b>';
        $heroHeadline = $heroData?->headline ?: "Choose the Rental\nOption That Fits Your Stay";
        $heroShowBullets = $heroData?->show_bullets ?? false;
        $heroBullets = (is_array($heroData?->bullets) && count($heroData->bullets) > 0) ? $heroData->bullets : ['Flexible Daily Rates', 'Serviced Amenities', 'Prime Location', 'VIP Support'];
        
        $heroButtons = (is_array($heroData?->buttons) && count($heroData->buttons) > 0) ? $heroData->buttons : [
            ['text' => 'Browse Properties', 'url' => '/properties'],
            ['text' => 'Contact Us', 'url' => '/contact-us']
        ];
    @endphp

    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[850px] max-[1240px]:min-h-[700px] max-[940px]:min-h-[580px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="Properties Hero">
    </section>


    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] lg:mt-[-5rem] lg:mb-[6rem] sm:mb-[3rem] mb-[1rem] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            {{-- Gold accent bar --}}
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                <div class="px-0 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)] font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC] font-normal">{!! $heroTaglineHtml !!}</span>
                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-8 whitespace-pre-line">
                        {{ $heroHeadline }}
                    </h1>

                    @if($heroShowBullets && count($heroBullets) > 0)
                        <div class="text-[#EBD4A4] text-[13px] sm:text-[14px] px-10 sm:px-10 mb-8 flex flex-wrap items-center gap-x-3 gap-y-1">
                            @foreach($heroBullets as $bullet)
                                <span>• {{ $bullet }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="flex items-center px-10 sm:px-10 gap-4 pointer-events-auto flex-wrap">
                        @foreach($heroButtons as $btn)
                            <a href="{{ url($btn['url'] ?? '#') }}"
                                class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                {{ $btn['text'] ?? $btn['label'] ?? 'Learn More' }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>





    {{-- Featured Properties (Inline directly matching screenshot with dynamic database loading) --}}
    @php
        $cardImage = asset('services/propertis_leasing/all part.png');

        $dbRentalUnits = \App\Models\ServiceFeaturedProperty::where('page', 'daily-weekly-rentals')
            ->where('publish_status', 'published')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        if ($dbRentalUnits->isNotEmpty()) {
            $featuredProjects = $dbRentalUnits->map(function ($item) {
                // Parse description and ideal_for bullets
                $lines = explode("\n", $item->description ?? '');
                $descLines = [];
                $idealFor = [];
                $foundIdeal = false;
                foreach ($lines as $line) {
                    $trimmed = trim($line);
                    if (stripos($trimmed, 'suitable for:') !== false || stripos($trimmed, 'ideal for:') !== false) {
                        $foundIdeal = true;
                        continue;
                    }
                    if ($foundIdeal && $trimmed) {
                        // Strip any bullets, hyphens, and corrupted unicode replacement marks
                        $cleaned = preg_replace('/^[\s\x{FFFD}\x{0080}-\x{00FF}•\-\*\?]+/u', '', $trimmed);
                        $cleaned = trim($cleaned);
                        if ($cleaned !== '') {
                            $idealFor[] = $cleaned;
                        }
                    } elseif (!$foundIdeal && $trimmed) {
                        $descLines[] = $trimmed;
                    }
                }

                $imgSrc = $item->image ?: ((!empty($item->detail_images) && is_array($item->detail_images) && count($item->detail_images) > 0) ? $item->detail_images[0] : null);
                if ($imgSrc && !str_starts_with($imgSrc, 'http://') && !str_starts_with($imgSrc, 'https://')) {
                    $imgSrc = str_starts_with($imgSrc, 'storage/') ? asset($imgSrc) : asset(ltrim($imgSrc, '/'));
                }

                $targetLink = $item->link ?? 'services/property-leasing/daily-weekly-rentals/studio-room';
                if (!str_starts_with($targetLink, 'http://') && !str_starts_with($targetLink, 'https://')) {
                    $targetLink = url(ltrim($targetLink, '/'));
                }

                $pricing = [
                    'daily' => [
                        'price' => 'From $35/day',
                        'desc' => 'Suitable for short-term stays, business trips, and visitors to Phnom Penh.',
                    ],
                    'weekly' => [
                        'price' => 'From $210/week',
                        'desc' => 'Flexible weekly rates including housekeeping and high-speed internet access.',
                    ],
                    'monthly' => [
                        'price' => 'From $650/month',
                        'desc' => 'Best value for professionals and expatriates with flexible lease terms.',
                    ],
                ];

                if (!empty($item->status)) {
                    try {
                        if (str_starts_with(trim($item->status), '{')) {
                            $parsedStatus = json_decode($item->status, true);
                            if (is_array($parsedStatus)) {
                                if (isset($parsedStatus['daily'])) $pricing['daily'] = $parsedStatus['daily'];
                                if (isset($parsedStatus['weekly'])) $pricing['weekly'] = $parsedStatus['weekly'];
                                if (isset($parsedStatus['monthly'])) $pricing['monthly'] = $parsedStatus['monthly'];
                            }
                        } else {
                            $parts = explode('|', $item->status);
                            if (isset($parts[0])) $pricing['daily']['price'] = trim($parts[0]);
                            if (isset($parts[1])) $pricing['weekly']['price'] = trim($parts[1]);
                            if (isset($parts[2])) $pricing['monthly']['price'] = trim($parts[2]);
                        }
                    } catch (\Exception $e) {}
                }

                return [
                    'title' => $item->title,
                    'description' => implode(' ', $descLines) ?: ($item->subtitle ?? ''),
                    'ideal_for' => !empty($idealFor) ? $idealFor : ['Business travelers', 'Couples', 'Solo travelers', 'Short-term residents'],
                    'pricing' => $pricing,
                    'link' => $targetLink,
                    'image' => $imgSrc ?: asset('services/propertis_leasing/all part.png'),
                ];
            })->toArray();
        } else {
            $featuredProjects = [
                [
                    'title' => 'Studio',
                    'description' => 'A practical choice for individuals and short-term stays.',
                    'ideal_for' => [
                        'Business travelers',
                        'Solo travelers',
                        'Couples',
                        'Short-term residents',
                    ],
                    'pricing' => [
                        'daily' => [
                            'price' => 'From $35/day',
                            'desc' => 'Suitable for short-term stays, business trips, and visitors to Phnom Penh.',
                        ],
                        'weekly' => [
                            'price' => 'From $210/week',
                            'desc' => 'Flexible weekly rates including housekeeping and high-speed internet access.',
                        ],
                        'monthly' => [
                            'price' => 'From $650/month',
                            'desc' => 'Best value for professionals and expatriates with flexible lease terms.',
                        ],
                    ],
                    'link' => url('/services/property-leasing/daily-weekly-rentals/studio-room'),
                    'image' => $cardImage,
                ],
                [
                    'title' => '1 Bedroom',
                    'description' => 'Comfortable private living for individuals and couples.',
                    'ideal_for' => [
                        'Business professionals',
                        'Couples',
                        'Expatriates',
                        'Longer stays',
                    ],
                    'pricing' => [
                        'daily' => [
                            'price' => 'From $45/day',
                            'desc' => 'Comfortable private residence designed for short leisure or business visits.',
                        ],
                        'weekly' => [
                            'price' => 'From $270/week',
                            'desc' => 'Spacious one-bedroom living with full amenities and weekly linen service.',
                        ],
                        'monthly' => [
                            'price' => 'From $850/month',
                            'desc' => 'All-inclusive monthly living package with premium residential facilities.',
                        ],
                    ],
                    'link' => url('/services/property-leasing/daily-weekly-rentals/1-bedroom'),
                    'image' => $cardImage,
                ],
                [
                    'title' => '2-Bedroom with Balcony',
                    'description' => 'More space for families, colleagues, or guests requiring an additional bedroom.',
                    'ideal_for' => [
                        'Small families',
                        'Business colleagues',
                        'Long-term residents',
                        'Seeking additional living space',
                    ],
                    'pricing' => [
                        'daily' => [
                            'price' => 'From $70/day',
                            'desc' => 'Generous 2-bedroom space with private balcony for families and groups.',
                        ],
                        'weekly' => [
                            'price' => 'From $420/week',
                            'desc' => 'Ideal for extended family stays and team projects with weekly servicing.',
                        ],
                        'monthly' => [
                            'price' => 'From $1,300/month',
                            'desc' => 'Premium corner residences with panoramic city views and dedicated management.',
                        ],
                    ],
                    'link' => url('/services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony'),
                    'image' => $cardImage,
                ],
                [
                    'title' => '3-Bedroom',
                    'description' => 'Expansive living spaces designed for large families, executive relocations, and luxury comfort.',
                    'ideal_for' => [
                        'Large families',
                        'Executive relocations',
                        'Corporate leaders',
                        'Long-term luxury stays',
                    ],
                    'pricing' => [
                        'daily' => [
                            'price' => 'From $110/day',
                            'desc' => 'Luxurious three-bedroom living designed for executive relocations and families.',
                        ],
                        'weekly' => [
                            'price' => 'From $660/week',
                            'desc' => 'Spacious suite accommodations with comprehensive housekeeping and concierge service.',
                        ],
                        'monthly' => [
                            'price' => 'From $2,100/month',
                            'desc' => 'Expansive residences with VIP hospitality support and priority facility access.',
                        ],
                    ],
                    'link' => url('/services/property-leasing/daily-weekly-rentals/3-bedroom'),
                    'image' => $cardImage,
                ],
            ];
        }
    @endphp

    <section id="featured-properties-section" class="relative w-full bg-[#2A5A8A] z-[300] mt-0 pt-20 sm:pt-24 lg:pt-32 pb-16 sm:pb-20 scroll-mt-6 overflow-x-clip">
        {{-- Background Image Offset Down --}}
        <div class="absolute inset-x-0 bottom-0 top-[260px] sm:top-[300px] lg:top-[340px] z-0 overflow-hidden">
            <img src="{{ asset('services/propertis_leasing/available rental units/daily & weekly rentals_rental unit.png') }}"
                alt="Daily and Weekly Rentals Background"
                class="w-full h-full object-cover object-right">
        </div>

        {{-- Top Intro Text in Blue Area --}}
        <div class="relative z-10 w-full max-w-[1500px] pl-6 sm:pl-10 lg:pl-16 xl:pl-24 pr-6 sm:pr-10 mb-10 sm:mb-14 lg:mb-16">
            <div class="max-w-[480px] lg:max-w-[500px]" data-scroll-reveal="left">
                <p class="text-white text-[15px] sm:text-[16px] leading-relaxed">
                    CWD Realty &amp; Hospitality offers professionally managed rental units at Wealth Mansion, with a range of layouts to suit short stays, business trips, family accommodation, and longer-term living.
                </p>
            </div>
        </div>

        {{-- Main Content Container (Sticks to the right side and floats above bg) --}}
        <div class="relative z-10 w-full pl-6 sm:pl-10 lg:pl-16 xl:pl-24 pr-0">
            <div class="flex flex-col lg:flex-row items-stretch justify-between gap-6 lg:gap-8">

                {{-- Left: Heading, Description & Nav Arrows --}}
                <div class="relative z-20 shrink-0 max-w-[320px] self-start pt-16 sm:pt-20 lg:pt-20 xl:pt-24 flex flex-col justify-between" data-scroll-reveal="left">
                    <div>
                        <h2 class="text-[#2A5A8A] text-[clamp(28px,3vw,42px)] font-normal leading-[1.15] mb-3">
                            Available<br>
                            <span class="font-bold">Rental Units</span>
                        </h2>
                        <p class="text-black/80 text-[14px] sm:text-[15px] leading-relaxed mb-6">
                            Wealth Mansion units are available for different rental periods, depending on unit availability.
                        </p>
                    </div>

                    {{-- Navigation Arrows --}}
                    <div class="flex items-center gap-3 pt-2">
                        <button id="featured-prop-prev" type="button" aria-label="Previous property"
                            class="w-12 h-12 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] bg-transparent flex items-center justify-center cursor-pointer
                                transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105
                                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                                disabled:cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="featured-prop-next" type="button" aria-label="Next property"
                            class="w-12 h-12 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] bg-transparent flex items-center justify-center cursor-pointer
                                transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105
                                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                                disabled:cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Right: Horizontal Card Slider Track --}}
                <div class="relative min-w-0 flex-1 w-full max-w-[1240px] overflow-hidden" data-scroll-reveal="right">
                    <div id="featured-properties-track"
                        class="pointer-events-auto flex gap-4 overflow-x-auto overflow-y-hidden touch-pan-x scroll-smooth items-start pb-4
                            snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden pr-6 sm:pr-10 lg:pr-16">
                        @foreach ($featuredProjects as $index => $project)
                            @php
                                $dir = ($index === 0) ? 'left' : (($index === 1) ? 'fade-up' : 'right');
                            @endphp
                            <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ $index * 100 }}" class="featured-card-wrapper shrink-0 snap-start w-[85vw] max-w-[340px] sm:w-[330px] lg:w-[340px] xl:w-[360px] flex flex-col">
                                <div class="featured-prop-card group bg-white flex flex-col justify-between shadow-none overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1 cursor-pointer w-full"
                                    onclick="window.location='{{ $project['link'] }}'">

                                    {{-- Card Image --}}
                                    <div class="relative w-full h-[220px] sm:h-[240px] overflow-hidden shrink-0 bg-gray-100">
                                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
                                            class="featured-card-img w-full h-full object-cover transition-all duration-500 ease-out group-hover:scale-105">
                                    </div>

                                    {{-- Card Body --}}
                                    <div class="featured-card-body p-6 sm:p-7 flex flex-col justify-between flex-1">
                                        <div>
                                            {{-- Title --}}
                                            <div class="mb-3">
                                                <h3 class="text-[#2A5A8A] text-[18px] sm:text-[20px] font-bold transition-colors duration-200 group-hover:text-[#1479B9]">
                                                    {{ $project['title'] }}
                                                </h3>
                                            </div>

                                            {{-- Description --}}
                                            <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed mb-4">
                                                {{ $project['description'] }}
                                            </p>

                                            {{-- Ideal For List --}}
                                            <div class="mb-4">
                                                <p class="text-black text-[13px] sm:text-[13.5px] font-bold mb-1.5">Ideal for:</p>
                                                <ul class="text-black/80 text-[12.5px] sm:text-[13px] leading-relaxed space-y-1 list-disc pl-5">
                                                    @foreach ($project['ideal_for'] as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="mt-4 pt-3 border-t border-gray-100/80">
                                            {{-- Toggle Button with Smooth Text Fade Transition --}}
                                            <button type="button"
                                                 class="price-toggle-btn text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-2.5 inline-flex items-center gap-1 hover:underline cursor-pointer focus:outline-none"
                                                 aria-expanded="false"
                                                 onclick="event.stopPropagation();">
                                                 <span class="price-btn-label transition-opacity duration-200 ease-out inline-block">See Price</span>
                                             </button>

                                             {{-- Expandable Dropdown Container with Smooth CSS Grid Animation --}}
                                             <div class="price-panel grid grid-rows-[0fr] opacity-0 transition-all duration-300 ease-out overflow-hidden"
                                                 aria-hidden="true"
                                                 onclick="event.stopPropagation();">
                                                 <div class="overflow-hidden min-h-0">
                                                     <div class="pb-2.5 pt-0.5">
                                                         {{-- Tabs: Daily | Weekly | Monthly --}}
                                                         <div class="flex items-center gap-4 sm:gap-5 mb-2.5 text-[14px] sm:text-[15px]">
                                                             <button type="button" data-tab="daily"
                                                                 class="price-tab font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] pb-0.5 cursor-pointer focus:outline-none transition-colors">
                                                                Daily
                                                             </button>
                                                             <button type="button" data-tab="weekly"
                                                                 class="price-tab font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent pb-0.5 cursor-pointer focus:outline-none transition-colors">
                                                                Weekly
                                                             </button>
                                                             <button type="button" data-tab="monthly"
                                                                class="price-tab font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent pb-0.5 cursor-pointer focus:outline-none transition-colors">
                                                                Monthly
                                                             </button>
                                                         </div>

                                                         {{-- Pricing Details for Each Tab --}}
                                                         @foreach (['daily', 'weekly', 'monthly'] as $tabKey)
                                                             <div class="price-content price-content-{{ $tabKey }} transition-all duration-200 {{ $tabKey === 'daily' ? 'block opacity-100' : 'hidden opacity-0' }}">
                                                                <div class="text-black text-[15px] sm:text-[16px] font-bold mb-1.5">
                                                                    {{ $project['pricing'][$tabKey]['price'] }}
                                                                </div>
                                                                <p class="text-black/75 text-[12.5px] sm:text-[13px] leading-relaxed mb-1">
                                                                    {{ $project['pricing'][$tabKey]['desc'] }}
                                                                </p>
                                                             </div>
                                                         @endforeach
                                                     </div>
                                                 </div>
                                             </div>

                                             {{-- View Photos Link --}}
                                             <div class="mt-1">
                                                <a href="{{ $project['link'] }}"
                                                    class="inline-flex items-center gap-1.5 text-[#2A5A8A] group-hover:text-[#c9a463] text-[13.5px] sm:text-[14px] font-medium transition-colors duration-200">
                                                    <span>View Photos</span>
                                                    <span class="transition-transform duration-200 group-hover:translate-x-1.5" aria-hidden="true">&rarr;</span>
                                                </a>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Scroll-edge blur cues --}}
                    <div id="featured-prop-edge-left" class="featured-prop-edge featured-prop-edge-left" aria-hidden="true"></div>
                    <div id="featured-prop-edge-right" class="featured-prop-edge featured-prop-edge-right" aria-hidden="true"></div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .featured-prop-edge {
            position: absolute;
            top: 0;
            bottom: 16px;
            width: 80px;
            z-index: 30;
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
        }

        .featured-prop-edge.is-visible {
            opacity: 1;
            visibility: visible;
        }

        .featured-prop-edge-left {
            left: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.7) 0%, transparent 100%);
        }

        .featured-prop-edge-right {
            right: 0;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.7) 0%, transparent 100%);
        }
    </style>

    @once
        <script>
            (function() {
                function initPriceDropdowns() {
                    var cards = Array.from(document.querySelectorAll('.featured-prop-card'));
                    var track = document.getElementById('featured-properties-track');
                    var prevBtn = document.getElementById('featured-prop-prev');
                    var nextBtn = document.getElementById('featured-prop-next');
                    var edgeLeft = document.getElementById('featured-prop-edge-left');
                    var edgeRight = document.getElementById('featured-prop-edge-right');
                    if (!cards.length) return;

                    // Equalize initial collapsed heights across all cards based on the tallest one
                    function equalizeBaseHeights() {
                        cards.forEach(function(card) {
                            var body = card.querySelector('.featured-card-body');
                            if (body) body.style.minHeight = '';
                        });

                        var maxBodyHeight = 0;
                        cards.forEach(function(card) {
                            var body = card.querySelector('.featured-card-body');
                            if (body) {
                                var h = body.offsetHeight;
                                if (h > maxBodyHeight) maxBodyHeight = h;
                            }
                        });

                        if (maxBodyHeight > 0) {
                            cards.forEach(function(card) {
                                var body = card.querySelector('.featured-card-body');
                                if (body) body.style.minHeight = maxBodyHeight + 'px';
                            });
                        }
                    }

                    equalizeBaseHeights();
                    window.addEventListener('resize', equalizeBaseHeights);

                    // Accordion logic for each card
                    cards.forEach(function(card) {
                        var toggleBtn = card.querySelector('.price-toggle-btn');
                        var panel = card.querySelector('.price-panel');
                        var label = toggleBtn ? toggleBtn.querySelector('.price-btn-label') : null;
                        var tabs = card.querySelectorAll('.price-tab');
                        var contents = card.querySelectorAll('.price-content');
                        if (!toggleBtn || !panel) return;

                        function toggleDropdown() {
                            var isOpen = panel.classList.contains('grid-rows-[1fr]');

                            if (!isOpen) {
                                if (label) {
                                    label.style.opacity = '0';
                                    setTimeout(function() {
                                        label.textContent = 'See Less';
                                        label.style.opacity = '1';
                                    }, 120);
                                }
                                panel.classList.remove('grid-rows-[0fr]', 'opacity-0');
                                panel.classList.add('grid-rows-[1fr]', 'opacity-100');
                                panel.setAttribute('aria-hidden', 'false');
                                toggleBtn.setAttribute('aria-expanded', 'true');
                            } else {
                                if (label) {
                                    label.style.opacity = '0';
                                    setTimeout(function() {
                                        label.textContent = 'See Price';
                                        label.style.opacity = '1';
                                    }, 120);
                                }
                                panel.classList.remove('grid-rows-[1fr]', 'opacity-100');
                                panel.classList.add('grid-rows-[0fr]', 'opacity-0');
                                panel.setAttribute('aria-hidden', 'true');
                                toggleBtn.setAttribute('aria-expanded', 'false');
                            }
                        }

                        toggleBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            toggleDropdown();
                        });

                        tabs.forEach(function(tab) {
                            tab.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                var selectedTab = tab.getAttribute('data-tab');

                                tabs.forEach(function(t) {
                                    if (t === tab) {
                                        t.className = 'price-tab font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] pb-0.5 cursor-pointer focus:outline-none transition-colors';
                                    } else {
                                        t.className = 'price-tab font-medium text-gray-400 hover:text-gray-600 border-b-2 border-transparent pb-0.5 cursor-pointer focus:outline-none transition-colors';
                                    }
                                });

                                contents.forEach(function(content) {
                                    if (content.classList.contains('price-content-' + selectedTab)) {
                                        content.classList.remove('hidden');
                                        content.classList.add('block');
                                        setTimeout(function() {
                                            content.classList.remove('opacity-0');
                                            content.classList.add('opacity-100');
                                        }, 10);
                                    } else {
                                        content.classList.add('opacity-0');
                                        content.classList.remove('opacity-100');
                                        content.classList.add('hidden');
                                        content.classList.remove('block');
                                    }
                                });
                            });
                        });
                    });

                    // Slider track navigation & button state management (move one by one per click)
                    if (track) {
                        var scrollTimer = null;
                        var cardWrappers = Array.from(track.querySelectorAll('.featured-card-wrapper'));

                        function getCardOffset(idx) {
                            if (!cardWrappers[idx]) return 0;
                            return cardWrappers[idx].offsetLeft - track.offsetLeft;
                        }

                        function getCurrentIndex() {
                            var currentScroll = track.scrollLeft;
                            var closestIdx = 0;
                            var minDiff = Infinity;
                            cardWrappers.forEach(function(card, idx) {
                                var offset = card.offsetLeft - track.offsetLeft;
                                var diff = Math.abs(offset - currentScroll);
                                if (diff < minDiff) {
                                    minDiff = diff;
                                    closestIdx = idx;
                                }
                            });
                            return closestIdx;
                        }

                        function scrollToCard(idx) {
                            if (idx < 0) idx = 0;
                            if (idx >= cardWrappers.length) idx = cardWrappers.length - 1;
                            var targetScroll = getCardOffset(idx);
                            track.scrollTo({ left: targetScroll, behavior: 'smooth' });
                        }

                        function setButtons(atStart, atEnd) {
                            if (prevBtn) {
                                prevBtn.disabled = atStart;
                                prevBtn.style.opacity = atStart ? '0.35' : '1';
                                prevBtn.style.pointerEvents = atStart ? 'none' : 'auto';
                            }
                            if (nextBtn) {
                                nextBtn.disabled = atEnd;
                                nextBtn.style.opacity = atEnd ? '0.35' : '1';
                                nextBtn.style.pointerEvents = atEnd ? 'none' : 'auto';
                            }

                            var canScroll = track.scrollWidth > track.clientWidth + 1;
                            if (edgeLeft) edgeLeft.classList.toggle('is-visible', canScroll && !atStart);
                            if (edgeRight) edgeRight.classList.toggle('is-visible', canScroll && !atEnd);
                        }

                        function updateButtons() {
                            var atStart = track.scrollLeft <= 4;
                            var atEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 4;
                            setButtons(atStart, atEnd);
                        }

                        if (prevBtn) {
                            prevBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                var cur = getCurrentIndex();
                                var target = Math.max(0, cur - 1);
                                scrollToCard(target);
                            });
                        }

                        if (nextBtn) {
                            nextBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                var cur = getCurrentIndex();
                                var target = Math.min(cardWrappers.length - 1, cur + 1);
                                scrollToCard(target);
                            });
                        }

                        track.addEventListener('scroll', function() {
                            clearTimeout(scrollTimer);
                            scrollTimer = setTimeout(updateButtons, 60);
                        }, { passive: true });

                        window.addEventListener('resize', updateButtons);
                        updateButtons();
                    }
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initPriceDropdowns);
                } else {
                    initPriceDropdowns();
                }
            })();
        </script>
    @endonce

      {{-- auto move logo --}}
    <x-auto_move.auto_move />


    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading centered --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12 text-center">
                <span class="text-[#2A5A8A] font-normal">Why Choose </span>
                <span class="text-[#2A5A8A] font-bold">CWD Realty &amp; Hospitality?</span>
            </h2>

            {{-- 4-Column Cards Grid --}}
            <div id="why-choose-cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">

                {{-- Card 01 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        01
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Professionally Managed Properties
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Our properties are professionally managed to provide guests with a comfortable and convenient accommodation experience.
                    </p>
                </div>

                {{-- Card 02 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        02
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Flexible Rental Terms
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Choose from daily, weekly, or monthly rental options depending on the length of your stay.
                    </p>
                </div>

                {{-- Card 03 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        03
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Comfortable Facilities
                    </h3>
                    <div class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        <p>Selected properties offer facilities such as:</p>
                        <ul class="list-disc pl-5 my-2 space-y-0.5 text-[13px] sm:text-[13.5px]">
                            <li>Swimming Pools</li>
                            <li>Panoramic River Views</li>
                            <li>Residential Facilities</li>
                        </ul>
                        <p>Facilities vary by property.</p>
                    </div>
                </div>

                {{-- Card 04 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        04
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Hospitality Support
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Our team can also arrange additional hospitality services to make your stay more convenient.
                    </p>
                </div>

            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeWhyChooseCardHeights() {
                    var cards = document.querySelectorAll('#why-choose-cards-grid .why-choose-card');
                    if (!cards.length) return;

                    cards.forEach(function(card) {
                        card.style.minHeight = '';
                    });

                    var tallest = 0;
                    cards.forEach(function(card) {
                        var cardHeight = card.offsetHeight;
                        if (cardHeight > tallest) {
                            tallest = cardHeight;
                        }
                    });

                    cards.forEach(function(card) {
                        card.style.minHeight = tallest + 'px';
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', equalizeWhyChooseCardHeights);
                } else {
                    equalizeWhyChooseCardHeights();
                }

                var resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(equalizeWhyChooseCardHeights, 150);
                });

                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeWhyChooseCardHeights);
                }
            })();
        </script>
    @endonce

    {{-- Additional Hospitality Services --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white pb-16 sm:pb-24">
        <div class="max-w-[1400px] mx-auto px-6">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12 text-left" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Additional</span>
                <span class="text-[#2A5A8A] font-bold block">Hospitality Services</span>
            </h2>

            {{-- 2 Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-stretch">

                {{-- Card 1: Airport Pick-Up --}}
                <div class="flex flex-col" data-scroll-reveal="left">
                    {{-- Gold accent bar on top (outside) --}}
                    <div class="h-[10px] w-[300px] max-w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="bg-[#2A5A8A] shadow-md p-8 sm:p-10 flex flex-col flex-1">
                        {{-- Icon --}}
                        <div class="mb-6">
                            <img src="{{ asset('services/property_sales/airplane_map.svg') }}" alt="Airport Pick-Up"
                                class="w-12 h-12 object-contain">
                        </div>

                        {{-- Title --}}
                        <h3 class="text-[#F4DEAC] text-[18px] sm:text-[20px] font-bold mb-3">
                            Airport Pick-Up
                        </h3>

                        {{-- Description --}}
                        <p class="text-white/90 text-[14px] sm:text-[15px] leading-relaxed">
                            Need transportation when you arrive in Cambodia? CWD can arrange airport pick-up services for an additional charge.
                        </p>
                    </div>
                </div>

                {{-- Card 2: City Tour --}}
                <div class="flex flex-col" data-scroll-reveal="right" data-scroll-delay="100">
                    {{-- Gold accent bar on top (outside) --}}
                    <div class="h-[10px] w-[300px] max-w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="bg-[#2A5A8A] shadow-md p-8 sm:p-10 flex flex-col flex-1">
                        {{-- Icon --}}
                        <div class="mb-6">
                            <img src="{{ asset('services/property_sales/vichincal_map.svg') }}" alt="City Tour"
                                class="w-12 h-12 object-contain">
                        </div>

                        {{-- Title --}}
                        <h3 class="text-[#F4DEAC] text-[18px] sm:text-[20px] font-bold mb-3">
                            City Tour
                        </h3>

                        {{-- Description --}}
                        <p class="text-white/90 text-[14px] sm:text-[15px] leading-relaxed">
                            Discover Phnom Penh and surrounding destinations with optional city tour arrangements. Additional charges apply.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Who Is Our Property Leasing Service For? --}}
    @php
        $targetAudiences = [
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/business travelers.svg'),
                'title' => 'Business Travelers',
                'description' => 'Flexible accommodation for short business trips, meetings, and assignments.',
            ],
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/expatriates.svg'),
                'title' => 'Expatriates',
                'description' => 'Comfortable weekly and monthly accommodation for professionals living or working in Cambodia.',
            ],
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/tourists.svg'),
                'title' => 'Tourists',
                'description' => 'Convenient residential accommodation for visitors looking for more than a traditional hotel stay.',
            ],
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/long-term residents.svg'),
                'title' => 'Long-Term Residents',
                'description' => 'Monthly rental options for people who need a comfortable home while living in Phnom Penh.',
            ],
        ];
    @endphp

    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white pb-16 sm:pb-24 overflow-x-clip">
        <div class="max-w-[1400px] mx-auto px-6">
            <div class="flex flex-col">

                {{-- Blue box: Full width on mobile/tablet, stretching to the right edge on desktop --}}
                <div class="relative bg-[#2A5A8A] shadow-2xl w-full lg:w-[100vw]">
                    {{-- Inner Content Container with responsive padding --}}
                    <div class="w-full lg:max-w-[1400px] px-6 sm:px-10 md:px-14 lg:px-16 xl:px-20 py-10 sm:py-14 md:py-16 lg:py-20">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-10 lg:gap-14 xl:gap-18 items-center">

                            {{-- Left: Heading --}}
                            <div class="lg:col-span-5" data-scroll-reveal="left">
                                <h2 class="text-[#F4DEAC] text-[clamp(26px,3.5vw,44px)] font-normal leading-[1.2]">
                                    <span class="block">Who Is Our</span>
                                    <span class="block">Property Leasing</span>
                                    <span class="block">Service For?</span>
                                </h2>
                            </div>

                            {{-- Right: 4 Audience Items in Vertical List --}}
                            <div class="lg:col-span-7 flex flex-col gap-6 sm:gap-7" data-scroll-reveal="right">
                                @foreach ($targetAudiences as $item)
                                    <div class="flex items-start gap-4 sm:gap-5">
                                        {{-- Icon Container --}}
                                        <div class="w-9 h-9 sm:w-11 sm:h-11 shrink-0 flex items-center justify-center pt-0.5">
                                            <img src="{{ $item['icon'] }}" alt="{{ $item['title'] }}"
                                                class="max-w-full max-h-full object-contain">
                                        </div>

                                        {{-- Text --}}
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-[#F4DEAC] text-[15.5px] sm:text-[17px] font-bold leading-snug mb-1">
                                                {{ $item['title'] }}
                                            </h3>
                                            <p class="text-white/90 text-[13px] sm:text-[14px] leading-relaxed font-light break-words">
                                                {{ $item['description'] }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Gold Accent Bar underneath the blue box (outside, aligned to left edge, 650px width) --}}
                <div class="h-[12px] sm:h-[13px] md:h-[14px] w-[650px] max-w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>

            </div>
        </div>
    </section>

    {{-- Frequently Asked Questions --}}
    @php
        $dbFaqs = \App\Models\Faq::where('page', 'daily-weekly-rentals')
            ->where('status', 'published')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        if ($dbFaqs->isNotEmpty()) {
            $faqLeft = $dbFaqs->where('column', 'left')->map(fn($f) => [
                'question' => $f->question,
                'answer' => $f->answer
            ])->values()->toArray();

            $faqRight = $dbFaqs->where('column', 'right')->map(fn($f) => [
                'question' => $f->question,
                'answer' => $f->answer
            ])->values()->toArray();

            if (empty($faqLeft) && !empty($faqRight)) {
                $half = ceil(count($faqRight) / 2);
                $faqLeft = array_slice($faqRight, 0, $half);
                $faqRight = array_slice($faqRight, $half);
            } elseif (!empty($faqLeft) && empty($faqRight)) {
                $half = ceil(count($faqLeft) / 2);
                $faqRight = array_slice($faqLeft, $half);
                $faqLeft = array_slice($faqLeft, 0, $half);
            }
        } else {
            $faqLeft = [
                [
                    'question' => 'Why should I choose a CWD-managed property to stay?',
                    'answer' =>
                        'CWD Realty & Hospitality provides professionally managed residential accommodation with flexible rental options and guest support. Selected properties offer facilities such as swimming pools and panoramic river views, while additional services such as airport pick-up and city tours can be arranged upon request.',
                ],
                [
                    'question' => 'What is the difference between smoking and non-smoking accommodation?',
                    'answer' => 'Smoking is only permitted in designated outdoor areas and balconies of selected units. Non-smoking accommodation ensures a fresh and clean environment for all residents and guests.',
                ],
                [
                    'question' => 'What facilities are available?',
                    'answer' => 'Selected properties offer swimming pools, panoramic river views, fully equipped kitchens, high-speed Wi-Fi, air conditioning, and 24/7 building security. Facilities vary by unit type.',
                ],
                [
                    'question' => 'Do you provide airport pick-up and city tours?',
                    'answer' => 'Yes, CWD Realty & Hospitality can arrange airport pick-up and drop-off transfers, as well as customized Phnom Penh city tours upon request for an additional fee.',
                ],
            ];

            $faqRight = [
                [
                    'question' => 'How much does it cost to rent a property?',
                    'answer' => 'Rental rates start from $35/day for Studio units, $45/day for 1-Bedroom units, $70/day for 2-Bedroom with Balcony, and $110/day for 3-Bedroom Suites. Discounted weekly and monthly packages are also available.',
                ],
                [
                    'question' => 'Is breakfast included?',
                    'answer' => 'Our serviced residences come with full kitchen and dining amenities for self-catering. Breakfast catering packages can be requested depending on the property and length of stay.',
                ],
                [
                    'question' => 'Are pets allowed?',
                    'answer' => 'Pet policies depend on the specific condominium building guidelines. Please contact our leasing team prior to booking to confirm pet-friendly unit availability.',
                ],
            ];
        }
    @endphp

    <x-faqs :faq-left="$faqLeft" :faq-right="$faqRight" />

    {{-- Find Your Next Stay --}}
    <section class="relative mt-[4rem] sm:mt-[6rem] lg:mt-[8rem] max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="Find Your Next Stay"
                class="w-full h-auto min-h-[260px] object-cover shadow-sm">

            <div class="relative max-w-[540px] mt-6 px-6 min-[900px]:ml-[-8rem] min-[900px]:mt-[-7.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(28px,4.5vw,50px)] font-bold leading-[1.15] drop-shadow-md">
                    Find Your Next Stay
                </h2>
            </div>
        </div>
    </section>

    {{-- Looking for Flexible Accommodation in Cambodia? --}}
    <section class="mt-8 sm:mt-16 md:mt-24 pb-12 sm:pb-24">
        <div class="max-w-[1450px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10 lg:gap-14">

                {{-- Left: Accent line on the left + Content --}}
                <div class="flex items-start gap-4 sm:gap-6 lg:gap-8 max-w-[580px]">
                    <span class="h-[2px] w-20 sm:w-28 lg:w-36 shrink-0 bg-[#c9a15c] mt-3.5"></span>
                    <div class="flex flex-col items-start">
                        <h2 class="text-[#204a74] text-[clamp(20px,2.4vw,28px)] font-bold leading-tight mb-4">
                            Looking for Flexible<br>
                            Accommodation in<br>
                            Cambodia?
                        </h2>
                        <p class="text-[#204a74] text-[14px] sm:text-[14.5px] leading-relaxed mb-6">
                            Whether you need a residence for a few days, several weeks, or an extended monthly stay, CWD Realty &amp; Hospitality can help you find a suitable professionally managed property.
                        </p>
                        <div class="flex flex-col items-start gap-1.5">
                            <a href="{{ url('/properties') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] font-medium transition-all">
                                <span>Browse Available Properties</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                            <a href="{{ url('/contact-us') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] font-medium transition-all">
                                <span>Contact Our Leasing Team</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Image --}}
                <div class="w-full lg:w-auto lg:shrink-0">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="Looking for Flexible Accommodation in Cambodia"
                        class="w-full lg:w-[520px] xl:w-[580px] h-auto object-cover shadow-sm">
                </div>

            </div>
        </div>
    </section>
@endsection
