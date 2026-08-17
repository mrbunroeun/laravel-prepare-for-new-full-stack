@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[850px] max-[1240px]:min-h-[700px] max-[940px]:min-h-[560px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_sectionsss.png') }}" alt="Insights Hero">
    </section>

    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] lg:mt-[-5rem] lg:mb-[10rem] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            <div class="max-w-[700px]">
                {{-- Gold accent bar (60% width) --}}
                <div class="h-[12px] sm:h-[15px] w-[60%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
                <div class="w-full bg-[#163049]/90 py-8 sm:py-10 px-6 sm:px-10" data-scroll-reveal="left" data-scroll-delay="100">
                    <h2 class="flex items-center gap-4 text-[clamp(24px,3.5vw,36px)] font-bold mb-6">
                        <span class="h-[2.5px] w-12 sm:w-16 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC]">Insights</span>
                    </h2>

                    <h1 class="text-white text-[clamp(20px,2.8vw,32px)] font-medium leading-[1.3] mb-8">
                        Your Trusted Property<br>
                        Management &amp; Hospitality<br>
                        Partner in Cambodia
                    </h1>

                    <div class="flex items-center gap-4 sm:gap-6 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-normal px-6 sm:px-8 py-2.5 hover:bg-white hover:text-[#163049] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-normal px-6 sm:px-8 py-2.5 hover:bg-white hover:text-[#163049] transition-colors">
                            Contact Us
                        </a>
                    </div>
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
                <div class="overflow-hidden flex-1 py-2" data-scroll-reveal="fade-up">
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
            <div class="text-center mb-12 sm:mb-16" data-scroll-reveal="left">
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
                    <div data-scroll-reveal="left" class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Condominium Specialists
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            We focus on professionally managing residential condominium properties.
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div data-scroll-reveal="fade-up" class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Multilingual Communication
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            Our team provides professional support in multiple languages, making communication easier for both local and international clients.
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div data-scroll-reveal="right" class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px] sm:col-span-2 lg:col-span-1">
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
                    <div data-scroll-reveal="left" class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3">
                            Professional Property Management
                        </h3>
                        <p class="text-[#333333] text-[13px] sm:text-[13.5px] leading-relaxed">
                            Helping property owners maximize occupancy while protecting the value of their investments.
                        </p>
                    </div>

                    {{-- Card 5 --}}
                    <div data-scroll-reveal="right" class="border-[1.5px] border-[#4A7BB0]/60 bg-white p-6 sm:p-7 flex flex-col justify-start min-h-[150px]">
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
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-6 px-6
                        min-[900px]:ml-[-8rem] min-[900px]:mt-[-6.5rem] min-[900px]:px-0 z-20">
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
            data-scroll-reveal="left"
            class="relative z-20 max-w-[420px] mt-6 px-6
        min-[900px]:absolute min-[900px]:left-1/2 min-[900px]:ml-[-40px] min-[900px]:bottom-[-2.5rem] min-[900px]:mt-0 min-[900px]:px-0 min-[900px]:w-[420px] min-[900px]:text-left">
            <p class="text-black/70 text-[14px] sm:text-[15px] leading-relaxed">
                Whether you're searching for accommodation or professional property management services, our team is ready
                to assist you.
            </p>
        </div>
    </section>


    {{-- Professional Property --}}
    <section class="mt-20 sm:mt-28 md:mt-36 min-[900px]:mt-[16rem]">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10">
            <div
                class="flex flex-col min-[900px]:flex-row items-center min-[900px]:items-start justify-center gap-10 min-[900px]:gap-16">

                {{-- Left: accent line + heading --}}
                <div class="flex items-start gap-4 max-w-[420px]" data-scroll-reveal="left">
                    <span class="h-[2px] w-20 shrink-0 bg-[#c9a15c] mt-3"></span>
                    <h2 class="text-[#2A5A8A] text-[16px] sm:text-[18px] font-bold leading-snug">
                        Professional Property Management, Sales, Leasing & Hospitality Services in Cambodia.
                    </h2>
                </div>

                {{-- Right: image --}}
                <div class="w-full min-[900px]:w-auto min-[900px]:shrink-0" data-scroll-reveal="right">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="CWD Realty professional properties"
                        class="w-full min-[900px]:w-[420px] h-auto min-h-[220px] object-cover">
                </div>

            </div>
        </div>
    </section>
@endsection
