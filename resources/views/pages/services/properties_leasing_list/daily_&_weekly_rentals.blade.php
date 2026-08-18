@extends('layouts.app')
@section('content')
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
                        <span class="text-[#F4DEAC] font-normal">Wealth <strong class="font-bold">Mansion</strong></span>
                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Choose the Rental<br>
                        Option That Fits Your Stay
                    </h1>

                    <div class="flex items-center px-10 sm:px-10 gap-4 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>





    {{-- Featured Properties (Inline directly matching screenshot) --}}
    @php
        $cardImage = asset('services/propertis_leasing/all part.png');

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
                'link' => url('/properties'),
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
                'link' => url('/properties'),
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
                'link' => url('/properties'),
                'image' => $cardImage,
            ],
        ];
    @endphp

    <section id="featured-properties-section" class="relative w-full bg-[#2A5A8A] z-[300] mt-0 pt-20 sm:pt-24 lg:pt-32 pb-16 sm:pb-20 scroll-mt-6">
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
            <div class="flex flex-col lg:flex-row items-stretch justify-between gap-4 lg:gap-6">

                {{-- Left: Section Heading sitting on top --}}
                <div class="relative z-20 shrink-0 max-w-[320px] self-start pt-6 sm:pt-10 lg:pt-14" data-scroll-reveal="left">
                    <h2 class="leading-tight">
                        <span class="text-[#F4DEAC] text-[clamp(26px,3vw,38px)] font-normal block mb-1">Featured</span>
                        <span class="text-[#F4DEAC] text-[clamp(34px,4.5vw,56px)] font-bold block leading-none">Properties</span>
                    </h2>
                </div>

                {{-- Right: 3 Featured Project Cards stuck to the right with small gap --}}
                <div id="featured-properties-grid" class="flex-1 w-full max-w-[1240px] grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4 items-stretch pr-0">
                    @foreach ($featuredProjects as $index => $project)
                        @php
                            $dir = ($index === 0) ? 'left' : (($index === 1) ? 'fade-up' : 'right');
                        @endphp
                        <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ $index * 100 }}" class="h-full flex flex-col">
                            <div class="featured-prop-card group bg-white flex flex-col justify-between shadow-xl hover:shadow-2xl overflow-hidden transition-all duration-300 ease-out hover:-translate-y-2 h-full cursor-pointer"
                                onclick="window.location='{{ $project['link'] }}'">

                                {{-- Card Image --}}
                                <div class="relative w-full h-[220px] sm:h-[240px] overflow-hidden shrink-0 bg-gray-100">
                                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
                                        class="featured-card-img w-full h-full object-cover transition-all duration-500 ease-out group-hover:scale-105">
                                </div>

                                {{-- Card Body --}}
                                <div class="p-6 sm:p-7 flex flex-col justify-between flex-1">
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

                                    <div class="mt-4 pt-3 border-t border-gray-100/80" onclick="event.stopPropagation();">
                                        {{-- Initial "See Price" Button (visible only when collapsed) --}}
                                        <button type="button"
                                            class="price-toggle-btn text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-2 inline-flex items-center gap-1 hover:underline cursor-pointer focus:outline-none transition-all duration-200">
                                            <span>See Price</span>
                                        </button>

                                        {{-- Expandable Dropdown Container with Smooth CSS Grid Animation --}}
                                        <div class="price-panel grid grid-rows-[0fr] opacity-0 transition-all duration-300 ease-out overflow-hidden" aria-hidden="true">
                                            <div class="overflow-hidden min-h-0">
                                                <div class="pb-3 pt-0.5">
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
                                                            <p class="text-black/75 text-[12.5px] sm:text-[13px] leading-relaxed mb-2.5">
                                                                {{ $project['pricing'][$tabKey]['desc'] }}
                                                            </p>
                                                        </div>
                                                    @endforeach

                                                    {{-- See Less Button (visible only when expanded) --}}
                                                    <button type="button"
                                                        class="price-see-less-btn text-[#2A5A8A] text-[14px] sm:text-[14.5px] font-bold hover:underline cursor-pointer focus:outline-none mt-1">
                                                        See Less
                                                    </button>
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

            </div>
        </div>
    </section>

    @once
        <script>
            (function() {
                function initPriceDropdowns() {
                    document.querySelectorAll('.featured-prop-card').forEach(function(card) {
                        var toggleBtn = card.querySelector('.price-toggle-btn');
                        var panel = card.querySelector('.price-panel');
                        var seeLessBtn = card.querySelector('.price-see-less-btn');
                        var tabs = card.querySelectorAll('.price-tab');
                        var contents = card.querySelectorAll('.price-content');
                        if (!toggleBtn || !panel) return;

                        function openPrice() {
                            toggleBtn.classList.add('hidden');
                            panel.classList.remove('grid-rows-[0fr]', 'opacity-0');
                            panel.classList.add('grid-rows-[1fr]', 'opacity-100');
                            panel.setAttribute('aria-hidden', 'false');
                        }

                        function closePrice() {
                            panel.classList.remove('grid-rows-[1fr]', 'opacity-100');
                            panel.classList.add('grid-rows-[0fr]', 'opacity-0');
                            panel.setAttribute('aria-hidden', 'true');
                            setTimeout(function() {
                                toggleBtn.classList.remove('hidden');
                            }, 220);
                        }

                        toggleBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            openPrice();
                        });

                        if (seeLessBtn) {
                            seeLessBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                closePrice();
                            });
                        }

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
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initPriceDropdowns);
                } else {
                    initPriceDropdowns();
                }
            })();
        </script>
    @endonce
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

            {{-- Heading Centered --}}
            <h2 class="text-center text-[clamp(28px,4vw,42px)] leading-tight mb-12 sm:mb-16" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal">Why Choose </span>
                <span class="text-[#2A5A8A] font-bold">CWD Realty &amp; Hospitality?</span>
            </h2>

            @php
                $whyChooseFeatures = [
                    [
                        'number' => '01',
                        'title' => 'Condominium management specialists',
                    ],
                    [
                        'number' => '02',
                        'title' => 'Professional multilingual communication',
                    ],
                    [
                        'number' => '03',
                        'title' => 'Strong rental marketing experience',
                    ],
                    [
                        'number' => '04',
                        'title' => 'Transparent owner reporting',
                    ],
                    [
                        'number' => '05',
                        'title' => 'Reliable maintenance coordination',
                    ],
                    [
                        'number' => '06',
                        'title' => 'Hospitality-focused management',
                    ],
                    [
                        'number' => '07',
                        'title' => 'Personalized owner support',
                    ],
                ];

                $whyChooseRowOne = array_slice($whyChooseFeatures, 0, 4);
                $whyChooseRowTwo = array_slice($whyChooseFeatures, 4);
            @endphp

            {{-- Row 1: 4 columns --}}
            <div id="why-choose-row-one" class="grid grid-cols-2 lg:grid-cols-4 gap-6 items-stretch mb-6">
                @foreach ($whyChooseRowOne as $index => $feature)
                    @php
                        $dir = $index < 2 ? 'left' : 'right';
                    @endphp
                    <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ ($index % 2) * 100 }}"
                        class="why-choose-card group h-full w-full flex flex-col px-6 py-6 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200">
                        <span
                            class="text-[36px] sm:text-[40px] font-bold leading-none mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $feature['number'] }}
                        </span>
                        <p
                            class="text-[15px] leading-relaxed text-black group-hover:text-white transition-colors duration-200">
                            {{ $feature['title'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            {{-- Row 2: remaining cards, centered --}}
            <div id="why-choose-row-two" class="flex flex-wrap justify-center gap-6">
                @foreach ($whyChooseRowTwo as $index => $feature)
                    @php
                        $dir = $index === 0 ? 'left' : ($index === 1 ? 'fade-up' : 'right');
                    @endphp
                    <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ $index * 100 }}"
                        class="why-choose-card group w-[calc(50%-0.75rem)] lg:w-[calc(25%-1.125rem)] flex flex-col px-6 py-6 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200">
                        <span
                            class="text-[36px] sm:text-[40px] font-bold leading-none mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $feature['number'] }}
                        </span>
                        <p
                            class="text-[15px] leading-relaxed text-black group-hover:text-white transition-colors duration-200">
                            {{ $feature['title'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeWhyChooseCardHeights() {
                    var cards = document.querySelectorAll(
                        '#why-choose-row-one .why-choose-card, #why-choose-row-two .why-choose-card');
                    if (!cards.length) return;

                    // Reset heights first so we measure natural content height, not a previously-set tall value
                    cards.forEach(function(card) {
                        card.style.height = 'auto';
                    });

                    var tallest = 0;
                    cards.forEach(function(card) {
                        var cardHeight = card.getBoundingClientRect().height;
                        if (cardHeight > tallest) {
                            tallest = cardHeight;
                        }
                    });

                    cards.forEach(function(card) {
                        card.style.height = tallest + 'px';
                    });
                }

                // Run once DOM is ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', equalizeWhyChooseCardHeights);
                } else {
                    equalizeWhyChooseCardHeights();
                }

                // Re-run on resize (debounced) since column count / text wrapping changes at breakpoints
                var resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(equalizeWhyChooseCardHeights, 150);
                });

                // Re-run once web fonts finish loading, since font swaps can change text height after initial measurement
                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeWhyChooseCardHeights);
                }
            })
            ();
        </script>
    @endonce





    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'What types of properties do you manage?',
                'answer' =>
                    'We specialize in condominiums, serviced apartments, and residential investment properties throughout Phnom Penh.',
            ],
            [
                'question' => 'Can you manage both daily and long-term rentals?',
                'answer' => 'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'How do property owners receive rental income?',
                'answer' => 'ComingSoon',
            ],
        ];
    @endphp

    <x-faqs :faq-left="$faqLeft" :faq-right="$faqRight" />




    {{-- Looking for your next stay --}}
    <section class="relative mt-[2rem] sm:mt-[5rem] max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-4 px-6
                    min-[900px]:ml-[-8rem] min-[900px]:mt-[-8.5rem] min-[900px]:px-0 z-20">
                <h2 class="text-[#DCC597] text-[clamp(22px,5vw,40px)] font-bold leading-tight drop-shadow-sm">
                    <span class="block min-[900px]:hidden">
                        Looking for Professional
                        Property Management or
                        Comfortable Accommodation?
                    </span>
                    <span class="hidden min-[900px]:block">
                        Request Property <br>
                        Management Consultation
                    </span>
                </h2>
            </div>
        </div>

        <div class="max-w-[420px] mt-10 px-6 min-[900px]:ml-[calc(20%+2rem)] min-[900px]:mt-14 lg:mt-16 min-[900px]:px-0 mb-12 sm:mb-16" data-scroll-reveal="left">
            @php
                $links = [
                    ['label' => 'Property Leasing', 'url' => url('/services/property-leasing'), 'active' => true],
                    ['label' => 'Hospitality Services', 'url' => url('/services/hospitality-services'), 'active' => false],
                    ['label' => 'Property Listings', 'url' => url('/properties'), 'active' => false],
                    ['label' => 'Contact Us', 'url' => url('/contact-us'), 'active' => false],
                ];
            @endphp

            <nav class="flex flex-col divide-y divide-gray-200 border border-gray-200 shadow-sm">
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}"
                        class="group flex items-center justify-between px-5 py-3 text-[15px] font-medium
                   bg-white text-[#2A5A8A] transition-colors
                   hover:bg-[#2A5A8A] hover:text-[#DCC597]">
                        <span>{{ $link['label'] }}</span>
                        <span aria-hidden="true"
                            class="text-[#2A5A8A] transition-all group-hover:text-[#DCC597] group-hover:translate-x-1">
                            &rarr;
                        </span>
                    </a>
                @endforeach
            </nav>
        </div>
    </section>
@endsection
