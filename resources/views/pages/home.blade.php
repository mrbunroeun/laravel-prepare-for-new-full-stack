@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[800px]  max-[1240px]:min-h-[650px] max-[940px]:min-h-[520px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="">
    </section>

    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            {{-- Gold accent bar --}}
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply">
                <div class="px-10 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)]  font-bold mb-6">
                        <span class="h-[2px] w-10 bg-[#c9a15c]"></span>
                        <span class="text-[#F4DEAC]">CWD</span>
                        <span class="text-[#F4DEAC] font-normal">Real Estate Agent &amp; Developer</span>
                    </h2>

                    <h1 class="text-white text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Your Trusted Property Management &amp; Hospitality Partner in Cambodia
                    </h1>

                    <div class="flex items-center gap-4 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[15px] font-medium px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[15px] font-medium px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- About / Realty & Hospitality section --}}
    <section class="pl-0 sm:pl-[5rem] relative  z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]">
                <h2 class="text-[clamp(22px,3vw,28px)] font-bold mb-6">
                    <span class="text-[#F4DEAC]">CWD</span>
                    <span class="text-white font-normal">Realty &amp; Hospitality</span>
                </h2>

                <p class="text-white text-[15px] leading-relaxed">
                    Specializes in condominium management, property leasing, rental management, and hospitality services in
                    Phnom Penh. Whether you're a property owner seeking professional management or a guest looking for
                    comfortable accommodation, we deliver reliable solutions with exceptional customer service.
                </p>
            </div>
        </div>
    </section>


    {{-- Who We Are section --}}
    <section class="relative pl-0 sm:pl-[5rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class=" max-w-[750px]">
                <h2 class="text-[clamp(28px,4vw,40px)] mb-6">
                    <span class="text-[#2A5A8A] font-normal">Who</span>
                    <span class="text-[#2A5A8A] font-bold">We Are</span>
                </h2>

                <h3 class="text-black text-[clamp(20px,2.5vw,26px)] font-semibold leading-tight mb-6">
                    Professional Property &amp; Hospitality Solutions
                </h3>

                <p class="text-black text-[15px] leading-relaxed">
                    CWD Realty &amp; Hospitality manages residential condominium properties while providing flexible rental
                    options for travelers, expatriates, business professionals, and long-term residents. Our experienced
                    multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable
                    stay.
                </p>
            </div>
        </div>
    </section>


    @php
        $services = [
            [
                'number' => '01',
                'title' => 'Property Management',
                'description' =>
                    'Professional management for condominium owners, including tenant coordination, maintenance supervision, occupancy management, and rental administration.',
                'link' => url('/properties'),
                'linkText' => 'View Details',
            ],
            [
                'number' => '02',
                'title' => 'Property Leasing',
                'description' => 'Daily, weekly, monthly, and long-term rental services for residential condominiums.',
                'link' => url('/properties'),
                'linkText' => 'View Properties',
            ],
            [
                'number' => '03',
                'title' => 'Sales Services',
                'description' => 'Helping buyers and investors discover quality residential properties in Cambodia.',
                'link' => url('/contact-us'),
                'linkText' => 'Learn More',
            ],
            [
                'number' => '04',
                'title' => 'Hospitality Services',
                'description' =>
                    'Airport transfers, guest assistance, city tours, housekeeping coordination, and personalized hospitality support.',
                'link' => url('/contact-us'),
                'linkText' => 'Explore Services',
            ],
        ];
    @endphp

    {{-- our services --}}
    <section class="relative z-[300] pl-0 sm:pl-[5rem] bg-none overflow-hidden">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 pt-16 pb-0 sm:pt-20">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,36px)] mb-10 sm:mb-1 relative ">
                <span class="text-[#2f6ba7] font-normal">Our</span>
                <span class="text-[#2f6ba7] font-bold">Services</span>
            </h2>

            {{-- Composition wrapper: image + dark block + cards --}}
            <div class="relative min-h-[420px] sm:min-h-[520px] lg:min-h-[600px]">

                {{-- Property image (right side on desktop, full width on mobile) --}}
                <div class="flex flex-col items-end w-full lg:absolute lg:right-0 lg:top-0 lg:w-[51%] lg:z-[20]">

                    <div class="w-full h-[260px] sm:h-[340px] lg:h-[600px]">
                        <img src="{{ asset('home/our_services/our_services.png') }}"
                            alt="CWD Realty modern residential condominium tower in Phnom Penh"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- Gold accent bar --}}
                    <div
                        class="self-start w-[81%] h-[15px]
                    bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]">
                    </div>

                </div>

                {{-- Service cards grid --}}
                <div
                    class="relative lg:absolute lg:left-0 lg:top-[18%] lg:w-[54%] z-[30]
                -mt-16 sm:-mt-20 lg:mt-0
                grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 gap-2 sm:gap-2.5
                px-4 sm:px-0">

                    @foreach ($services as $service)
                        <div
                            class="bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col justify-between min-h-[150px] lg:min-h-[145px]">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-[#F4DEAC] text-[16px] sm:text-[18px] font-bold leading-snug">
                                    {{ $service['title'] }}
                                </h3>
                                <span class="text-[#F4DEAC] text-[26px] sm:text-[30px] font-light leading-none shrink-0">
                                    {{ $service['number'] }}
                                </span>
                            </div>

                            <p class="text-white/90 text-[12px] sm:text-[13px] leading-relaxed mt-3">
                                {{ $service['description'] }}
                            </p>

                            <a href="{{ $service['link'] }}"
                                class="text-[#F4DEAC] text-[11px] sm:text-[13px] font-medium mt-4 inline-flex items-center gap-1 hover:underline">
                                {{ $service['linkText'] }} <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>

            {{-- Bottom spacer --}}
            <div class="h-8  sm:h-10 lg:h-16"></div>
        </div>
    </section>

    {{-- bg blue section --}}
    <section class="bg-[#2A5A8A] h-[450px] sm:h-[500px] md:h-[600px] lg:h-[800px] mt-[-15rem]">
        {{-- auto-move part --}}
        <section class="absolute w-full flex mt-[20rem] justify-center ">

            <img src="{{ asset('home/auto_move_logo/auto_move.png') }}" alt="CWD Realty auto-move logo"
                class="w-full h-auto object-contain">

            {{-- Scrolling text overlay --}}
            <div class="absolute inset-0 flex items-center overflow-hidden pointer-events-none">
                <div class="cwd-marquee-track flex items-center whitespace-nowrap">
                    @for ($i = 0; $i < 12; $i++)
                        <span class="text-[#F4DEAC] text-[clamp(14px,2vw,22px)] mx-6 sm:mx-10 shrink-0">
                            <span class="font-bold">CWD</span> Real Estate Agent &amp; Developer
                        </span>
                    @endfor
                </div>
            </div>

        </section>
        <style>
            .cwd-marquee-track {
                width: max-content;
                animation: cwd-marquee 25s linear infinite;
            }

            /* Pause on hover, if wanted */
            .cwd-marquee-track:hover {
                animation-play-state: paused;
            }

            @keyframes cwd-marquee {
                from {
                    transform: translateX(0);
                }

                to {
                    transform: translateX(-50%);
                }
            }
        </style>
    </section>




    {{-- Featured Properties: background image layer + card content layer, cards can extend above image's top edge --}}

    @php
        $properties = [
            [
                'image' => asset('home/properties/wealth-mansion.jpg'),
                'title' => 'Wealth Mansion',
                'description' =>
                    'Premium condominium development offering modern residential units with excellent city access.',
                'link' => url('/properties/wealth-mansion'),
            ],
            [
                'image' => asset('home/properties/private-residential-collection.jpg'),
                'title' => 'Private Residential Collection',
                'description' =>
                    'Professionally managed condominium units including premium residences and penthouses.',
                'link' => url('/properties/private-residential-collection'),
            ],
            [
                'image' => asset('home/properties/uc88-residence.jpg'),
                'title' => 'UC88 Residence',
                'description' =>
                    "Comfortable condominium living with convenient access to Phnom Penh's business districts.",
                'link' => url('/properties/uc88-residence'),
            ],
            [
                'image' => asset('home/properties/riverside-tower.jpg'),
                'title' => 'Riverside Tower',
                'description' =>
                    'Elegant riverside residences with panoramic views and premium amenities for modern living.',
                'link' => url('/properties/riverside-tower'),
            ],
            [
                'image' => asset('home/properties/skyline-residence.jpg'),
                'title' => 'Skyline Residence',
                'description' => 'High-rise condominium living in the heart of the city, close to shopping and dining.',
                'link' => url('/properties/skyline-residence'),
            ],
            [
                'image' => asset('home/properties/golden-park-condo.jpg'),
                'title' => 'Golden Park Condo',
                'description' =>
                    'Family-friendly community with landscaped gardens, pool access, and 24-hour security.',
                'link' => url('/properties/golden-park-condo'),
            ],
            [
                'image' => asset('home/properties/diamond-bay-suites.jpg'),
                'title' => 'Diamond Bay Suites',
                'description' =>
                    'Fully furnished suites ideal for expatriates and business professionals on flexible terms.',
                'link' => url('/properties/diamond-bay-suites'),
            ],
            [
                'image' => asset('home/properties/central-plaza-residence.jpg'),
                'title' => 'Central Plaza Residence',
                'description' =>
                    'Centrally located condominiums offering easy access to offices, schools, and transit.',
                'link' => url('/properties/central-plaza-residence'),
            ],
            [
                'image' => asset('home/properties/orchid-garden-villas.jpg'),
                'title' => 'Orchid Garden Villas',
                'description' => 'Spacious villa-style units surrounded by greenery, offering privacy and comfort.',
                'link' => url('/properties/orchid-garden-villas'),
            ],
            [
                'image' => asset('home/properties/harmony-heights.jpg'),
                'title' => 'Harmony Heights',
                'description' =>
                    'Modern residential tower with rooftop lounge, gym, and unobstructed city skyline views.',
                'link' => url('/properties/harmony-heights'),
            ],
        ];
    @endphp

    <section class="relative w-full min-h-[620px] sm:min-h-[680px] md:min-h-[760px] lg:min-h-[820px]">

        {{-- Background image layer: absolute, fills section, behind everything --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('home/feature_properties/feature_properties.png') }}" alt="CWD Realty featured properties"
                class="w-full h-full object-cover object-right">
        </div>

        {{-- Main content layer: sits above the image --}}
        <div class="relative z-10 max-w-[1400px] ml-0 mr-auto lg:-ml-[186px] xl:-ml-[204px]">

            {{-- Mobile/tablet heading + arrows: BEHIND the cards (lower z-index), sits on top of the image only --}}
            <div
                class="flex lg:hidden items-center justify-between absolute inset-x-0 top-0 px-4 sm:px-6 pt-8 pb-6 sm:pb-10 z-10">
                <h2 class="text-white text-[clamp(20px,3vw,30px)] leading-tight">
                    <span class="font-normal block">Featured</span>
                    <span class="font-bold block">Properties</span>
                </h2>
                <div class="flex items-center gap-3">
                    <button id="cwd-prop-prev-mobile" type="button" aria-label="Previous property"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="cwd-prop-next-mobile" type="button" aria-label="Next property"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Cards layer: pointer-events-none so its empty top padding doesn't block taps on the buttons underneath;
     pointer-events-auto is re-applied on the track so the cards/links inside stay fully clickable --}}
            <div
                class="relative z-20 pt-24 sm:pt-28 lg:pt-[2vw] lg:-translate-y-[clamp(60px,9vw,140px)] pointer-events-none">
                <div id="cwd-prop-track"
                    class="cwd-prop-track-fade pointer-events-auto flex gap-5 overflow-x-auto scroll-smooth pl-4 sm:pl-6 pr-4 sm:pr-6 lg:pr-[320px] pb-2 snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">

                    @foreach ($properties as $property)
                        <article class="cwd-prop-card shrink-0 snap-start w-[260px] sm:w-[280px] bg-white shadow-sm">

                            {{-- overflow-hidden allowed here only, to crop this card's own image --}}
                            <div class="h-[170px] w-full overflow-hidden">
                                <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}"
                                    class="w-full h-full object-cover">
                            </div>

                            <div class="px-5 py-5">
                                <h3 class="text-black text-[15px] font-bold mb-2 leading-snug">
                                    {{ $property['title'] }}
                                </h3>
                                <p class="text-black/70 text-[12.5px] leading-relaxed mb-4">
                                    {{ $property['description'] }}
                                </p>
                                <a href="{{ $property['link'] }}"
                                    class="text-[#2A5A8A] text-[12px] font-semibold inline-flex items-center gap-1 hover:underline">
                                    View Property <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>

            {{-- Featured Properties heading + navigation: desktop right panel, above the background image --}}
            <div
                class="hidden lg:flex flex-col items-start justify-start gap-10 w-[300px] absolute right-0 top-0 px-10 py-8 z-30">
                <div class="flex items-center gap-3">
                    <button id="cwd-prop-prev" type="button" aria-label="Previous property"
                        class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="cwd-prop-next" type="button" aria-label="Next property"
                        class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <h2 class="text-white -z-1 text-[clamp(24px,2.4vw,34px)] leading-tight">
                    <span class="font-normal block">Featured</span>
                    <span class="font-bold block">Properties</span>
                </h2>
            </div>

            <div class="h-10 sm:h-14 lg:h-24"></div>

        </div>

    </section>

    <style>
        /* Fade cards at both edges: right edge fades where they scroll under the arrows/heading panel,
                                                                       left edge fades once the track has been scrolled (so cards appear to disappear off the left too) */
        @media (min-width: 1024px) {
            .cwd-prop-track-fade {
                -webkit-mask-image: linear-gradient(to right,
                        transparent 0%,
                        black 40px,
                        black calc(100% - 320px),
                        transparent 100%);
                mask-image: linear-gradient(to right,
                        transparent 0%,
                        black 40px,
                        black calc(100% - 320px),
                        transparent 100%);
            }
        }
    </style>

    <script>
        (function() {
            const track = document.getElementById('cwd-prop-track');
            const prevBtns = [document.getElementById('cwd-prop-prev'), document.getElementById('cwd-prop-prev-mobile')]
                .filter(Boolean);
            const nextBtns = [document.getElementById('cwd-prop-next'), document.getElementById('cwd-prop-next-mobile')]
                .filter(Boolean);

            if (!track || (!prevBtns.length && !nextBtns.length)) return;

            function getStep() {
                const card = track.querySelector('.cwd-prop-card');
                if (!card) return 300;
                const style = window.getComputedStyle(track);
                const gap = parseFloat(style.columnGap || style.gap || '20');
                return card.offsetWidth + gap;
            }

            function updateButtons() {
                const maxScroll = track.scrollWidth - track.clientWidth - 1;
                const atStart = track.scrollLeft <= 0;
                const atEnd = track.scrollLeft >= maxScroll;

                prevBtns.forEach(btn => {
                    btn.disabled = atStart;
                    btn.classList.toggle('opacity-40', atStart);
                    btn.classList.toggle('cursor-not-allowed', atStart);
                });

                nextBtns.forEach(btn => {
                    btn.disabled = atEnd;
                    btn.classList.toggle('opacity-40', atEnd);
                    btn.classList.toggle('cursor-not-allowed', atEnd);
                });
            }

            prevBtns.forEach(btn => btn.addEventListener('click', function() {
                track.scrollBy({
                    left: -getStep(),
                    behavior: 'smooth'
                });
            }));

            nextBtns.forEach(btn => btn.addEventListener('click', function() {
                track.scrollBy({
                    left: getStep(),
                    behavior: 'smooth'
                });
            }));

            track.addEventListener('scroll', updateButtons, {
                passive: true
            });
            window.addEventListener('resize', updateButtons);
            updateButtons();
        })();
    </script>


    @php
        $whyChooseFeatures = [
            [
                'title' => 'Condominium Specialists',
                'description' => 'We focus on professionally managing residential condominium properties.',
            ],
            [
                'title' => 'Multilingual Communication',
                'description' =>
                    'Our team provides professional support in multiple languages, making communication easier for both local and international clients.',
            ],
            [
                'title' => 'Flexible Rental Options',
                'description' => 'Choose daily, weekly, monthly, or long-term accommodation based on your needs.',
            ],
            [
                'title' => 'Professional Property Management',
                'description' =>
                    'Helping property owners maximize occupancy while protecting the value of their investments.',
            ],
            [
                'title' => 'Hospitality-Focused Service',
                'description' =>
                    'Our team is committed to creating a welcoming and comfortable guest experience from arrival to departure.',
            ],
        ];
    @endphp

    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative bg-white">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 py-16 sm:py-20">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Why Choose</span>
                <span class="text-[#2A5A8A] font-bold block">CWD Realty &amp; Hospitality?</span>
            </h2>

            {{-- Cards grid --}}
            <div id="why-choose-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 items-stretch">
                @foreach ($whyChooseFeatures as $index => $feature)
                    <div @class([
                        'why-choose-card h-full flex flex-col border-[2px] border-[#2A5A8A] px-6 py-6',
                        'lg:col-span-2' => $index < 3,
                        'lg:col-span-2 lg:col-start-2' => $index === 3,
                        'sm:col-span-2 sm:max-w-[calc(50%-12px)] sm:mx-auto lg:col-span-2 lg:col-start-4 lg:max-w-none lg:mx-0' =>
                            $index === 4,
                    ])>
                        <h3 class="text-[#2A5A8A] text-[14px] sm:text-[15px] font-bold mb-3 leading-snug">
                            {{ $feature['title'] }}
                        </h3>
                        <p class="text-black text-[13px] sm:text-[13.5px] leading-relaxed">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <script>
        (function() {
            const grid = document.getElementById('why-choose-grid');
            if (!grid) return;

            function equalizeCardHeights() {
                const cards = Array.from(grid.querySelectorAll('.why-choose-card'));
                if (!cards.length) return;

                // Reset first, so shrinking the viewport doesn't keep a stale tall height
                cards.forEach(card => {
                    card.style.height = 'auto';
                });

                // Measure natural height of every card, take the tallest
                let tallest = 0;
                cards.forEach(card => {
                    const h = card.getBoundingClientRect().height;
                    if (h > tallest) tallest = h;
                });

                // Apply that height to every card, across both grid rows
                cards.forEach(card => {
                    card.style.height = tallest + 'px';
                });
            }

            // Run once content/layout is ready
            window.addEventListener('load', equalizeCardHeights);

            // Re-run on resize, since text wrapping (and therefore natural height) changes at different widths
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(equalizeCardHeights, 150);
            });

            // Run immediately too, in case DOM is already parsed by the time this script executes
            equalizeCardHeights();
        })();
    </script>
    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'Why should I stay at a property managed by CWD Realty & Hospitality?',
                'answer' =>
                    'We professionally manage quality condominium properties, offering clean accommodations, responsive support, flexible rental options, and convenient locations suitable for business travelers, expatriates, and tourists.',
            ],
            [
                'question' => 'How much does a room cost?',
                'answer' =>
                    'Rates vary depending on property, unit type, and length of stay. Contact our team for current pricing and availability.',
            ],
            [
                'question' => 'Are smoking and non-smoking rooms available?',
                'answer' =>
                    'Yes, we offer both smoking and non-smoking units depending on the property. Let us know your preference when booking.',
            ],
            [
                'question' => 'Is breakfast included?',
                'answer' =>
                    'Breakfast inclusion depends on the specific property and rental package. Our team can confirm details for your chosen unit.',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Are pets allowed?',
                'answer' =>
                    'Pet policies vary by property. Please contact us before booking to confirm whether your property allows pets.',
            ],
            [
                'question' => 'What facilities are available?',
                'answer' =>
                    'Facilities vary by property and may include pools, gyms, parking, and 24-hour security. Ask our team for details on a specific listing.',
            ],
            [
                'question' => 'Do you provide airport transportation?',
                'answer' =>
                    'Yes, airport transfer can be arranged as part of our hospitality services. Let us know your flight details in advance.',
            ],
            [
                'question' => 'Are there discounts for weekly or monthly stays?',
                'answer' =>
                    'Yes, we offer flexible rental options with better rates for weekly and monthly stays. Contact us for a custom quote.',
            ],
        ];
    @endphp

    {{-- Frequently Asked Questions --}}
    <section class="relative bg-none">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 py-16 sm:py-20">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
            </h2>

            {{-- Two-column accordion --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">

                {{-- Left column --}}
                <div class="faq-column flex flex-col gap-2">
                    @foreach ($faqLeft as $index => $faq)
                        <div class="faq-item bg-[#f3f3f3]">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200 {{ $index === 0 ? 'rotate-90' : '' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div
                                class="faq-panel overflow-hidden transition-all duration-300 {{ $index === 0 ? 'max-h-[300px]' : 'max-h-0' }}">
                                <div class="{{ $index === 0 ? 'bg-[#1479B9]' : 'bg-white' }} px-5 py-4 sm:px-6 sm:py-5">
                                    <p
                                        class="{{ $index === 0 ? 'text-white' : 'text-black/70' }} text-[13px] sm:text-[13.5px] leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Right column --}}
                <div class="faq-column flex flex-col gap-2">
                    @foreach ($faqRight as $faq)
                        <div class="faq-item bg-[#f3f3f3]">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                                aria-expanded="false">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div class="faq-panel overflow-hidden transition-all duration-300 max-h-0">
                                <div class="bg-white px-5 py-4 sm:px-6 sm:py-5">
                                    <p class="text-black/70 text-[13px] sm:text-[13.5px] leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

    <script>
        (function() {
            document.querySelectorAll('.faq-toggle').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const item = btn.closest('.faq-item');
                    const panel = item.querySelector('.faq-panel');
                    const answerBox = panel.querySelector('div');
                    const answerText = answerBox.querySelector('p');
                    const arrow = btn.querySelector('.faq-arrow');
                    const isOpen = btn.getAttribute('aria-expanded') === 'true';

                    if (isOpen) {
                        // Close this item
                        panel.style.maxHeight = '0px';
                        btn.setAttribute('aria-expanded', 'false');
                        arrow.classList.remove('rotate-90');
                        answerBox.classList.remove('bg-[#1479B9]');
                        answerBox.classList.add('bg-white');
                        answerText.classList.remove('text-white');
                        answerText.classList.add('text-black/70');
                    } else {
                        // Open this item
                        panel.style.maxHeight = panel.scrollHeight + 'px';
                        btn.setAttribute('aria-expanded', 'true');
                        arrow.classList.add('rotate-90');
                        answerBox.classList.add('bg-[#1479B9]');
                        answerBox.classList.remove('bg-white');
                        answerText.classList.add('text-white');
                        answerText.classList.remove('text-black/70');
                    }
                });
            });
        })();
    </script>


    @php
        $latestActivities = [
            [
                'image' => asset('home/latest_activities/1img.png'),
                'title' => 'Wealth Mansion',
                'description' =>
                    'Premium condominium development offering modern residential units with excellent city access.',
            ],
            [
                'image' => asset('home/latest_activities/2img.png'),
                'title' => 'Private Residential Collection',
                'description' =>
                    'Professionally managed condominium units including premium residences and penthouses.',
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Golden Tower 268',
                'description' => 'Landmark high-rise tower offering premium residences with panoramic city views.',
            ],
            [
                'image' => asset('home/latest_activities/4img.png'),
                'title' => 'Riverside Tower',
                'description' =>
                    'Elegant riverside residences with panoramic views and premium amenities for modern living.',
            ],
            [
                'image' => asset('home/latest_activities/5img.png'),
                'title' => 'Skyline Residence',
                'description' => 'High-rise condominium living in the heart of the city, close to shopping and dining.',
            ],
            [
                'image' => asset('home/latest_activities/6img.png'),
                'title' => 'Harmony Heights',
                'description' =>
                    'Modern residential tower with rooftop lounge, gym, and unobstructed city skyline views.',
            ],
        ];
    @endphp

    {{-- Latest Activities --}}
    <section class="bg-none">
        <div class="max-w-[1500px] mx-auto px-6 sm:px-10 pt-16 sm:pt-20">
            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Latest <strong>Activities</strong></span>
            </h2>
        </div>

        <div class="max-w-[1500px] mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-0 leading-[0]">
                @foreach ($latestActivities as $activity)
                    <div class="relative overflow-hidden group h-[220px] sm:h-[240px] lg:h-[260px]">
                        <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}"
                            class="block w-full h-full object-cover">

                        {{-- Blue overlay + text, shown on hover --}}
                        <div
                            class="absolute inset-0 bg-[#2A5A8A]/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end px-6 py-6">
                            <h3
                                class="text-white text-[18px] sm:text-[20px] font-bold mb-4 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                {{ $activity['title'] }}
                            </h3>
                            <p
                                class="text-white/90 text-[13px] sm:text-[14px] leading-relaxed translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                {{ $activity['description'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="h-16 sm:h-20"></div>
    </section>


    @php
        $testimonials = [
            [
                'name' => 'Lorem Name',
                'rating' => 4,
                'text' =>
                    'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
            ],
            [
                'name' => 'Lorem Name',
                'rating' => 4,
                'text' =>
                    'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
            ],
            [
                'name' => 'Lorem Name',
                'rating' => 4,
                'text' =>
                    'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
            ],
        ];
    @endphp

    {{-- Testimonials --}}
    <section class="bg-white">
        <div class="max-w-[1000px] mx-auto px-6 sm:px-10 py-16 sm:py-20">
            <div class="flex flex-col gap-8">
                @foreach ($testimonials as $item)
                    <div>
                        <div class="flex justify-end mb-2">
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 h-5 {{ $i <= $item['rating'] ? 'text-[#fec259]' : 'text-[#d8d3c8]' }}"
                                        fill="currentColor">
                                        <path
                                            d="M12 2.5l2.9 6.06 6.6.72-4.9 4.53 1.28 6.54L12 16.98l-5.88 3.37 1.28-6.54-4.9-4.53 6.6-.72L12 2.5z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        <div class="bg-[#f5f5f5] px-6 py-6 sm:px-8 sm:py-7">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-[#d9d9d9] shrink-0"></div>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-black text-[15px] font-bold">{{ $item['name'] }}</h3>
                                    <p class="text-black/70 text-[13.5px] leading-relaxed">
                                        {{ $item['text'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- Looking for your next stay --}}
    <section class="relative max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-6 px-6
                        min-[900px]:ml-[-8rem] min-[900px]:mt-[-6.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(22px,5vw,40px)] font-bold leading-tight">
                    <span class="block min-[900px]:hidden">
                        Looking for Your Next Stay or Property Management Partner?
                    </span>
                    <span class="hidden min-[900px]:block">
                        Looking for<br>
                        Your Next Stay or<br>
                        Property Management<br>
                        Partner?
                    </span>
                </h2>
            </div>
        </div>

        <div
            class="max-w-[420px] mt-4 px-6
        min-[900px]:absolute min-[900px]:left-1/2 min-[900px]:ml-[-40px] min-[900px]:bottom-[-2rem] min-[900px]:mt-0 min-[900px]:px-0 min-[900px]:w-[420px] min-[900px]:text-left">
            <p class="text-black/70 text-[14px]  sm:text-[15px] leading-relaxed">
                Whether you're searching for accommodation or professional property management services, our team is ready
                to assist you.
            </p>
        </div>
    </section>


    {{-- Professional Property --}}
    <section class="mt-16 sm:mt-24 md:mt-32 min-[900px]:mt-[12rem]">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10">
            <div
                class="flex flex-col min-[900px]:flex-row items-center min-[900px]:items-start justify-center gap-10 min-[900px]:gap-16">

                {{-- Left: accent line + heading --}}
                <div class="flex items-start gap-4 max-w-[420px]">
                    <span class="h-[2px] w-20 shrink-0 bg-[#c9a15c] mt-3"></span>
                    <h2 class="text-[#2A5A8A] text-[16px] sm:text-[18px] font-bold leading-snug">
                        Professional Property Management, Sales, Leasing & Hospitality Services in Cambodia.
                    </h2>
                </div>

                {{-- Right: image --}}
                <div class="w-full min-[900px]:w-auto min-[900px]:shrink-0">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="CWD Realty professional properties"
                        class="w-full min-[900px]:w-[420px] h-auto min-h-[220px] object-cover">
                </div>

            </div>
        </div>
    </section>
@endsection
