@extends('layouts.app')
@section('content')
    {{-- Hero & Overlapping Cards Section --}}
    <section class="relative z-[200] pt-[110px] min-[1161px]:pt-[120px] bg-white overflow-hidden pb-12 sm:pb-16">
        <div class="relative max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Blue Banner Layer (Offset from left, h-[350px]) --}}
            <div class="relative w-full">
                <div class="relative w-full lg:w-[calc(100%-180px)] lg:ml-[180px] h-[350px] bg-[#2A5A8A] flex flex-col justify-start pt-8 sm:pt-10 px-8 sm:px-14 lg:px-16">
                    <h1 class="text-[#F4DEAC] text-[clamp(22px,3vw,34px)] font-normal leading-[1.35] max-w-[560px]">
                        Your Trusted Property<br>
                        Management &amp; Hospitality<br>
                        Partner in Cambodia
                    </h1>

                    {{-- Bottom Right Gold Accent Bar --}}
                    <div class="absolute bottom-0 right-0 h-[10px] sm:h-[12px] w-[50%] sm:w-[35%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                </div>

                {{-- The 2 Overlapping Cards Layer (shifted right, lowered -mt to keep text visible) --}}
                <div class="relative z-20 -mt-[95px] sm:-mt-[110px] lg:-mt-[120px] lg:ml-[70px] flex flex-col lg:flex-row gap-5 sm:gap-6 items-start">

                    {{-- Left Card (max-w 690px, h 380px) --}}
                    <div class="w-full lg:w-[690px] lg:max-w-[690px] shrink-0 bg-[#8B2E34] h-[380px] shadow-sm flex flex-col">
                        {{-- Left Card Content --}}
                    </div>

                    {{-- Right Card (max-w 410px, h 380px) --}}
                    <div class="w-full lg:w-[410px] lg:max-w-[410px] shrink-0 bg-[#8B2E34] h-[380px] shadow-sm flex flex-col">
                        {{-- Right Card Content --}}
                    </div>

                </div>

                {{-- Text Content Below Boxes (Aligned with the boxes width and left margin) --}}
                <div class="relative z-20 mt-10 sm:mt-14 lg:ml-[70px] max-w-[1124px] flex flex-col gap-5 text-[#2b2b2b] text-[13.5px] sm:text-[14.5px] leading-relaxed">
                    <p>
                        CWD Realty &amp; Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.
                    </p>
                    <p>
                        Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors. Their willingness to meet clients personally, understand their expectations, and deliver on every commitment became the foundation of the company's reputation.
                    </p>
                    <p>
                        Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.
                    </p>
                    <p>
                        As Cambodia's real estate and hospitality industries continue to grow, CWD Realty &amp; Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- Feature Detail Section (Image/Box on Left, Text on Right) --}}
    <section class="relative z-[200] bg-white pt-6 pb-12 sm:pb-16">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:ml-[70px] max-w-[1124px] flex flex-col lg:flex-row gap-8 sm:gap-10 lg:gap-12 items-start">

                {{-- Left Red Box / Image Placeholder --}}
                <div class="w-full lg:w-[460px] lg:max-w-[460px] h-[360px] sm:h-[400px] lg:h-[420px] bg-[#8B2E34] shrink-0 shadow-sm flex flex-col">
                    {{-- Content / Image placeholder --}}
                </div>

                {{-- Right Text Content --}}
                <div class="flex-1 flex flex-col gap-4 sm:gap-5 text-[#2b2b2b] text-[13px] sm:text-[14px] leading-relaxed">
                    <p>
                        CWD Realty &amp; Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.
                    </p>
                    <p>
                        Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors. Their willingness to meet clients personally, understand their expectations, and deliver on every commitment became the foundation of the company's reputation.
                    </p>
                    <p>
                        Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.
                    </p>
                    <p>
                        As Cambodia's real estate and hospitality industries continue to grow, CWD Realty &amp; Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Blue Background Section with Insights Carousel --}}
    @php
        $insightsCards = [
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Discover Wealth Mansion',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Discover Wealth Mansion',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Discover Wealth Mansion',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Discover Wealth Mansion',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Discover Wealth Mansion',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
        ];
    @endphp

    <section
        class="relative z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] py-6 sm:py-10">
        {{-- Top Blue Background (Back Layer) --}}
        <div class="absolute inset-x-0 top-0 h-[180px] sm:h-[220px] lg:h-[250px] bg-[#2A5A8A] z-0"></div>

        {{-- Carousel in Front Layer --}}
        <div class="relative z-10 max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 sm:gap-5 lg:gap-6">
                
                {{-- Prev Button --}}
                <button id="insights-prev" type="button" aria-label="Previous"
                    class="w-10 h-10 sm:w-11 sm:h-11 rounded-full border-[1.5px] border-[#2A5A8A] bg-white text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all duration-200 hover:bg-[#2A5A8A] hover:text-white shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Carousel Track Container --}}
                <div class="overflow-hidden flex-1 py-2">
                    <div id="insights-track" class="flex gap-4 sm:gap-5 transition-transform duration-500 ease-out">
                        @foreach ($insightsCards as $card)
                            <div class="insight-slide flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(33.3333%-14px)] flex flex-col bg-[#2A5A8A] overflow-hidden">
                                {{-- Card Image with Single Bottom Gold Accent Bar --}}
                                <div class="relative w-full h-[190px] sm:h-[210px] lg:h-[230px] overflow-hidden">
                                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}"
                                        class="w-full h-full object-cover">
                                    {{-- Gold Accent Bar (Bottom Left 60% width) --}}
                                    <div class="absolute bottom-0 left-0 h-[5px] w-[60%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] z-10"></div>
                                </div>

                                {{-- Card Content --}}
                                <div class="p-5 sm:p-6 flex flex-col flex-1 bg-[#2A5A8A] justify-between">
                                    <div>
                                        <h3 class="text-[#F4DEAC] text-[16px] sm:text-[17.5px] font-bold leading-snug mb-2.5">
                                            {{ $card['title'] }}
                                        </h3>
                                        <p class="text-white/90 text-[12.5px] sm:text-[13px] leading-relaxed mb-5 font-normal">
                                            {{ $card['description'] }}
                                        </p>
                                    </div>
                                    <a href="{{ $card['link'] }}"
                                        class="text-[#F4DEAC] text-[12.5px] sm:text-[13px] font-medium hover:underline inline-flex items-center gap-1.5 mt-auto">
                                        View Full Insights &rarr;
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Next Button --}}
                <button id="insights-next" type="button" aria-label="Next"
                    class="w-10 h-10 sm:w-11 sm:h-11 rounded-full border-[1.5px] border-[#2A5A8A] bg-white text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all duration-200 hover:bg-[#2A5A8A] hover:text-white shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

            </div>
        </div>
    </section>

    @once
        <script>
            (function() {
                const track = document.getElementById('insights-track');
                const prevBtn = document.getElementById('insights-prev');
                const nextBtn = document.getElementById('insights-next');
                if (!track || !prevBtn || !nextBtn) return;

                let currentIndex = 0;

                function getVisibleSlides() {
                    if (window.innerWidth >= 1024) return 3;
                    if (window.innerWidth >= 640) return 2;
                    return 1;
                }

                function updateSlider() {
                    const slides = track.querySelectorAll('.insight-slide');
                    const totalSlides = slides.length;
                    const visibleSlides = getVisibleSlides();
                    const maxIndex = Math.max(0, totalSlides - visibleSlides);

                    if (currentIndex > maxIndex) currentIndex = maxIndex;
                    if (currentIndex < 0) currentIndex = 0;

                    if (slides.length === 0) return;
                    const slideWidth = slides[0].getBoundingClientRect().width;
                    const gap = window.innerWidth >= 640 ? 20 : 16;
                    const offset = currentIndex * (slideWidth + gap);

                    track.style.transform = `translateX(-${offset}px)`;

                    // Disable Prev button if at the start
                    if (currentIndex <= 0) {
                        prevBtn.disabled = true;
                        prevBtn.classList.add('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
                        prevBtn.classList.remove('cursor-pointer', 'hover:bg-[#2A5A8A]', 'hover:text-white');
                    } else {
                        prevBtn.disabled = false;
                        prevBtn.classList.remove('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
                        prevBtn.classList.add('cursor-pointer', 'hover:bg-[#2A5A8A]', 'hover:text-white');
                    }

                    // Disable Next button if at the end
                    if (currentIndex >= maxIndex) {
                        nextBtn.disabled = true;
                        nextBtn.classList.add('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
                        nextBtn.classList.remove('cursor-pointer', 'hover:bg-[#2A5A8A]', 'hover:text-white');
                    } else {
                        nextBtn.disabled = false;
                        nextBtn.classList.remove('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
                        nextBtn.classList.add('cursor-pointer', 'hover:bg-[#2A5A8A]', 'hover:text-white');
                    }
                }

                prevBtn.addEventListener('click', function() {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateSlider();
                    }
                });

                nextBtn.addEventListener('click', function() {
                    const visibleSlides = getVisibleSlides();
                    const totalSlides = track.querySelectorAll('.insight-slide').length;
                    const maxIndex = Math.max(0, totalSlides - visibleSlides);
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                        updateSlider();
                    }
                });

                window.addEventListener('resize', updateSlider);
                window.addEventListener('load', updateSlider);
                updateSlider();
            })();
        </script>
    @endonce


    {{-- Why Choose CWD Realty & Hospitality Section --}}
    <section class="relative z-[300] bg-white py-16 sm:py-20 lg:py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-[1200px] mx-auto">

            {{-- Heading --}}
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-[clamp(28px,3.8vw,44px)] leading-tight">
                    <span class="text-[#2A5A8A] font-normal block">Why Choose</span>
                    <span class="text-[#2A5A8A] font-bold block">CWD Realty &amp; Hospitality?</span>
                </h2>
            </div>

            {{-- Cards Container --}}
            <div class="flex flex-col gap-5 sm:gap-6">
                
                {{-- Top Row: 3 Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">

                    {{-- Card 1 --}}
                    <div class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Condominium Specialists
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            We focus on professionally managing residential condominium properties.
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Multilingual Communication
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            Our team provides professional support in multiple languages, making communication easier for both local and international clients.
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px] sm:col-span-2 lg:col-span-1">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Flexible Rental Options
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            Choose daily, weekly, monthly, or long-term accommodation based on your needs.
                        </p>
                    </div>

                </div>

                {{-- Bottom Row: 2 Cards (Centered on Desktop with identical card width) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 lg:w-[calc(66.6666%-8px)] mx-auto w-full">

                    {{-- Card 4 --}}
                    <div class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Professional Property Management
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            Helping property owners maximize occupancy while protecting the value of their investments.
                        </p>
                    </div>

                    {{-- Card 5 --}}
                    <div class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Hospitality-Focused Service
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            Our team is committed to creating a welcoming and comfortable guest experience from arrival to departure.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>
    {{-- Frequently Asked Questions --}}
    <x-faqs />

    {{-- Latest Activities --}}
    <x-latest_activities />

    {{-- Comments Section --}}
    <x-comments.comments />



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
