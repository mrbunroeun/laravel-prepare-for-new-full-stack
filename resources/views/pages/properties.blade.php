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
            <div class="max-w-[720px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                <div class="px-0 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,2.5vw,28px)] font-normal mb-6">
                        <span class="h-[2px] w-12 sm:w-16 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC] text-[clamp(22px,2.8vw,32px)] font-normal">Properties</span>
                    </h2>

                    <h1 class="text-white px-6 sm:px-10 text-[clamp(22px,3.2vw,36px)] font-medium leading-snug mb-10">
                        Your Trusted Property<br>
                        Management &amp; Hospitality<br>
                        Partner in Cambodia
                    </h1>

                    <div class="flex items-center px-6 sm:px-10 gap-4 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-medium px-4 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#163049] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-medium px-6 sm:px-8 py-3 hover:bg-[#ffffff] hover:text-[#163049] transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>





    {{-- Featured Properties (Inline directly matching screenshot) --}}
    @php
        $detailImages = [
            asset('home/latest_activities/1img.png'),
            asset('home/latest_activities/2img.png'),
            asset('home/latest_activities/3img.png'),
        ];

        $featuredProjects = [
            [
                'title' => 'Wealth Mansion',
                'subtitle' => 'Premium Condominium Residences',
                'description' =>
                    'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
                'status' => '30% Available',
                'link' => url('services/properties/wealth-mansion'),
                'image' => $detailImages[0],
            ],
            [
                'title' => 'Private Residential',
                'subtitle' => 'Exclusive Residential Development',
                'description' =>
                    'A private residential project featuring approximately 100 units, including penthouse residences.',
                'status' => 'Coming Soon',
                'link' => url('services/properties/private-residential'),
                'image' => $detailImages[1],
            ],
            [
                'title' => 'UC88',
                'subtitle' => 'Residential Property Project',
                'description' =>
                    'Explore the UC88 project and available residential opportunities through CWD Realty & Hospitality.',
                'status' => '30% Available',
                'link' => url('services/properties/uc88'),
                'image' => $detailImages[2],
            ],
        ];
    @endphp

    <section class="relative w-full bg-[#2A5A8A] z-[300] mt-0 pt-16 sm:pt-20 lg:pt-28 pb-16 sm:pb-20">
        {{-- Background Image Offset Down --}}
        <div class="absolute inset-x-0 bottom-0 top-[200px] sm:top-[240px] lg:top-[280px] z-0 overflow-hidden">
            <img src="{{ asset('home/feature_properties/feature_properties.png') }}"
                alt="Featured Properties Background"
                class="w-full h-full object-cover object-right">
        </div>

        {{-- Main Content Container (Sticks to the right side and floats above bg) --}}
        <div class="relative z-10 w-full pl-6 sm:pl-10 lg:pl-16 xl:pl-24 pr-0">
            <div class="flex flex-col lg:flex-row items-stretch justify-between gap-4 lg:gap-6">

                {{-- Left: Section Heading sitting on top --}}
                <div class="relative z-20 shrink-0 max-w-[320px] self-start pt-20 sm:pt-32 lg:pt-60" data-scroll-reveal="left">
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
                                data-images="{{ json_encode($detailImages) }}">

                                {{-- Card Image with Dots --}}
                                <div class="relative w-full h-[220px] sm:h-[240px] overflow-hidden shrink-0 bg-gray-100">
                                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
                                        class="featured-card-img w-full h-full object-cover transition-all duration-500 ease-out group-hover:scale-105">

                                    <div class="featured-card-dots absolute bottom-3 left-1/2 -translate-x-1/2 z-10 flex items-center gap-1.5" aria-hidden="true">
                                        @foreach ($detailImages as $i => $img)
                                            <span class="featured-card-dot rounded-full transition-all duration-300 h-2 w-2"
                                                style="background:{{ $img === $project['image'] ? '#fff' : 'rgba(255,255,255,0.55)' }};"></span>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Card Body --}}
                                <div class="p-6 sm:p-7 flex flex-col justify-between flex-1">
                                    <div>
                                        {{-- Title & Mini Arrow Controls --}}
                                        <div class="flex items-center justify-between gap-2 mb-3">
                                            <h3 class="text-[#2A5A8A] text-[17px] sm:text-[18px] font-bold transition-colors duration-200 group-hover:text-[#1479B9]">
                                                {{ $project['title'] }}
                                            </h3>
                                            <div class="flex items-center gap-1.5 shrink-0">
                                                <button type="button" aria-label="Previous image"
                                                    class="card-prev-btn w-8 h-8 rounded-full border border-[#204a74] text-[#204a74] flex items-center justify-center cursor-pointer transition-all duration-200 hover:scale-110 hover:bg-[#204a74] hover:text-white active:scale-95">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                    </svg>
                                                </button>
                                                <button type="button" aria-label="Next image"
                                                    class="card-next-btn w-8 h-8 rounded-full border border-[#204a74] text-[#204a74] flex items-center justify-center cursor-pointer transition-all duration-200 hover:scale-110 hover:bg-[#204a74] hover:text-white active:scale-95">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- Subtitle --}}
                                        <h4 class="text-black text-[14.5px] sm:text-[15px] font-bold leading-snug mb-3">
                                            {{ $project['subtitle'] }}
                                        </h4>

                                        {{-- Description --}}
                                        <p class="text-black/80 text-[13px] sm:text-[13.5px] leading-relaxed mb-6">
                                            {{ $project['description'] }}
                                        </p>
                                    </div>

                                    <div>
                                        {{-- Status --}}
                                        <div class="text-[#2A5A8A] text-[14px] sm:text-[15px] font-bold mb-6">
                                            {{ $project['status'] }}
                                        </div>

                                        {{-- Link --}}
                                        <a href="{{ $project['link'] }}"
                                            class="inline-flex items-center gap-1.5 text-[#2A5A8A] group-hover:text-[#c9a463] text-[13px] sm:text-[13.5px] font-medium transition-colors duration-200">
                                            <span>View Project</span>
                                            <span class="transition-transform duration-200 group-hover:translate-x-1.5" aria-hidden="true">&rarr;</span>
                                        </a>
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
                function initFeaturedCardCarousels() {
                    document.querySelectorAll('.featured-prop-card').forEach(function(card) {
                        var imgEl = card.querySelector('.featured-card-img');
                        var prevBtn = card.querySelector('.card-prev-btn');
                        var nextBtn = card.querySelector('.card-next-btn');
                        var dots = Array.from(card.querySelectorAll('.featured-card-dot'));
                        if (!imgEl || !prevBtn || !nextBtn) return;

                        var images = [];
                        try {
                            images = JSON.parse(card.dataset.images || '[]');
                        } catch (e) {
                            images = [];
                        }
                        if (images.length < 2) return;

                        var currentIndex = Math.max(0, images.indexOf(imgEl.getAttribute('src')));

                        function updateDots() {
                            dots.forEach(function(dot, i) {
                                dot.style.background = (i === currentIndex) ? '#fff' : 'rgba(255,255,255,0.55)';
                            });
                        }

                        function changeImage(newIndex) {
                            currentIndex = (newIndex + images.length) % images.length;
                            imgEl.style.opacity = '0';
                            setTimeout(function() {
                                imgEl.src = images[currentIndex];
                                imgEl.style.opacity = '1';
                            }, 150);
                            updateDots();
                        }

                        prevBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            changeImage(currentIndex - 1);
                        });

                        nextBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            changeImage(currentIndex + 1);
                        });
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initFeaturedCardCarousels);
                } else {
                    initFeaturedCardCarousels();
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
