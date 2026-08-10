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
    <section class="bg-[#2A5A8A] h-[900px] mt-[-15rem]">
    </section>

    {{-- auto-move part --}}
    <section class="absolute w-full flex mt-[-35rem] sm:mt-[-35rem] justify-center ">

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



    {{-- Image Featured Properties --}}
    <section class="relative mt-[-25rem] sm:mt-[-20rem] md:mt-[-10rem] lg:mt-[0rem]  w-full overflow-hidden">
        <img src="{{ asset('home/feature_properties/feature_properties.png') }}" alt="CWD Realty featured properties"
            class="w-full h-auto min-h-[520px] sm:min-h-[520px] md:min-h-[600px] lg:min-h-[700px] object-cover object-right">
    </section>

    {{-- Featured Properties --}}
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
    <section class="relative">

        {{-- Featured Properties --}}
        <section class="relative w-full lg:mt-[-58rem] md:mt-[-50rem] sm:mt-[-40rem] mt-[-35rem]  z-10 overflow-hidden">
            <div class="max-w-[1400px] ml-0 mr-auto lg:-ml-[186px] xl:-ml-[204px] relative">

                {{-- Right panel: arrows + heading, sits fixed on the right, overlapping the cards --}}
                <div
                    class="hidden lg:flex flex-col items-start justify-between w-[300px] absolute right-0 top-0 bottom-0 px-10 py-16 z-[50]">
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

                    <h2 class="text-white text-[clamp(24px,2.4vw,34px)] leading-tight">
                        <span class="font-normal block">Featured</span>
                        <span class="font-bold block">Properties</span>
                    </h2>
                </div>

                {{-- Mobile/tablet heading + arrows (stacked above cards) --}}
                <div class="flex lg:hidden items-center justify-between px-4 sm:px-6 pt-16 pb-8">
                    <h2 class="text-white text-[clamp(24px,4vw,30px)] leading-tight">
                        <span class="font-normal block">Featured</span>
                        <span class="font-bold block">Properties</span>
                    </h2>
                    <div class="flex items-center gap-3">
                        <button id="cwd-prop-prev-mobile" type="button" aria-label="Previous property"
                            class="w-10 h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="cwd-prop-next-mobile" type="button" aria-label="Next property"
                            class="w-10 h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Card track: full width, runs behind the right panel on desktop --}}
                <div class="pb-16 sm:pb-20 lg:pt-16 lg:pb-16">
                    <div id="cwd-prop-track"
                        class="flex gap-5 overflow-x-auto scroll-smooth pl-4 sm:pl-6 pr-4 sm:pr-6 lg:pr-[320px] pb-2 snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">

                        @foreach ($properties as $property)
                            <article class="cwd-prop-card shrink-0 snap-start w-[260px] sm:w-[280px] bg-white shadow-sm">

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

            </div>
        </section>

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
    </section>



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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($whyChooseFeatures as $index => $feature)
                    <div @class([
                        'border border-[#2A5A8A]/40 px-6 py-6',
                        'lg:col-start-2' => $index === 3,
                        'lg:col-start-3' => $index === 4,
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
@endsection
