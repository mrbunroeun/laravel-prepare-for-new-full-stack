@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[800px] max-[1240px]:min-h-[650px] max-[940px]:min-h-[520px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="Hospitality Services Hero">
    </section>

    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] lg:mt-[-5rem] lg:mb-[10rem] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            {{-- Gold accent bar --}}
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
            <div class="max-w-[720px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                <div class="px-0 py-10">
                    @if(!isset($heroSection) || $heroSection->show_tagline !== false)
                    <h2 class="flex items-center gap-4 text-[clamp(20px,2.5vw,28px)] font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        @if(($heroSection->tagline_box1_style ?? 'light-gold') !== 'hidden' && !empty($heroSection->tagline_box1 ?? 'Hospitality'))
                            <span class="text-[#F4DEAC] {{ ($heroSection->tagline_box1_style ?? 'light-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }}">{{ $heroSection->tagline_box1 ?? 'Hospitality' }}</span>
                        @endif
                        @if(($heroSection->tagline_box2_style ?? 'bold-gold') !== 'hidden' && !empty($heroSection->tagline_box2 ?? 'Services'))
                            <span class="text-[#F4DEAC] {{ ($heroSection->tagline_box2_style ?? 'bold-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }}">{{ $heroSection->tagline_box2 ?? 'Services' }}</span>
                        @endif
                    </h2>
                    @endif

                    <h1 class="text-white px-6 sm:px-10 text-[clamp(22px,3.2vw,34px)] font-medium leading-snug mb-10">
                        {{ $heroSection->headline ?? 'Exceptional Hospitality & Accommodation Services in Cambodia' }}
                    </h1>

                    <div class="flex items-center px-6 sm:px-10 gap-4 pointer-events-auto flex-wrap">
                        @if(isset($heroSection->buttons) && is_array($heroSection->buttons) && count($heroSection->buttons) > 0)
                            @foreach($heroSection->buttons as $btn)
                                <a href="{{ url($btn['url'] ?? '#') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                    {{ $btn['text'] ?? 'Learn More' }}
                                </a>
                            @endforeach
                        @else
                            <a href="{{ url('/contact-us') }}"
                                class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                Request Hospitality Service
                            </a>
                            <a href="{{ url('/contact-us') }}"
                                class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                Contact Us
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- CWD Realty & Hospitality Blue Bar --}}
    <section
        class="px-0 sm:px-[5rem] md:px-[3rem] relative z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[560px]">
                <p class="text-white text-[15px] leading-relaxed">
                    At CWD Realty &amp; Hospitality, we provide more than professionally managed accommodation. Our hospitality services are designed to make your stay in Cambodia more convenient, from your arrival at the airport to exploring the city.
                </p>
            </div>
        </div>
    </section>

    {{-- Comfortable Stays, Convenient Services, Personalized Support --}}
    <section class="relative z-[300] bg-white">
        <div class="max-w-[1500px] mx-auto py-16 max-[940px]:py-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-26 items-start">

                {{-- LEFT: gold line + heading --}}
                <div class="flex flex-row">
                    <div class="h-[2px] w-full bg-[#c9a463] mr-[2rem] mt-6"></div>

                    <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,38px)] font-normal leading-tight">
                        Comfortable Stays, Convenient Services, Personalized Support
                    </h2>
                </div>

                {{-- RIGHT: image + body text --}}
                <div class="flex flex-col mt-0 lg:mt-[-7rem] gap-8">
                    <img src="{{ asset('home/latest_activities/3img.png') }}" alt="Golden Tower 322"
                        class="w-full h-auto object-cover">

                    <div class="flex sm:px-[1rem] px-[2rem] flex-col gap-4">
                        <p class="text-black text-[15px] leading-relaxed">
                            Whether you are visiting Cambodia for business, leisure, or an extended stay, our team can arrange additional services based on your needs.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>



    
    {{-- auto move logo --}}
    <x-auto_move.auto_move />

    {{-- Hospitality Services & Airport Pick-Up (90% width centered blocks) --}}
    <section class="relative bg-white pt-10 sm:pt-14 pb-14 sm:pb-20">
        
        {{-- Block 1: What Are Our Hospitality Services? --}}
        <div class="w-[90%] max-w-[1550px] mx-auto mb-3 sm:mb-4">
            {{-- Gold accent bar on top of blue box --}}
            <div class="h-[10px] sm:h-[14px] w-[50%] max-w-[500px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

            {{-- Blue Content Box --}}
            <div class="bg-[#2A5A8A] px-6 sm:px-12 lg:px-16 py-10 sm:py-14 text-white shadow-sm">
                <h2 class="text-[#F4DEAC] text-[clamp(24px,3vw,36px)] font-bold mb-2.5 leading-tight">
                    What Are Our Hospitality Services?
                </h2>
                <p class="text-white text-[15px] sm:text-[16px] font-normal mb-6">
                    Support Beyond Your Accommodation
                </p>

                <p class="text-white/95 text-[14px] sm:text-[15px] leading-relaxed max-w-[950px] mb-6">
                    CWD Realty &amp; Hospitality provides optional hospitality services for guests staying at our managed properties. These services are available upon request and are designed to make travel and local experiences more convenient.
                </p>

                <p class="text-white/95 text-[14px] sm:text-[15px] mb-2 font-medium">
                    Our current hospitality services include:
                </p>
                <ul class="list-disc pl-5 space-y-1.5 text-white/90 text-[14px] sm:text-[15px] mb-6">
                    <li>Airport Pick-Up</li>
                    <li>City Tour Arrangement</li>
                </ul>

                <p class="text-white/80 text-[13px] sm:text-[14px]">
                    Additional charges apply.
                </p>
            </div>
        </div>

        {{-- Block 2: Airport Pick-Up Service --}}
        <div class="w-[90%] max-w-[1550px] mx-auto bg-[#f4f5f8] px-6 sm:px-12 lg:px-16 py-12 sm:py-16 shadow-sm mb-3 sm:mb-4">
            <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,40px)] font-bold mb-8 sm:mb-10 leading-tight">
                Airport Pick-Up Service
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 xl:gap-24 items-start">
                
                {{-- LEFT COLUMN: Details + Suitable for + CTA --}}
                <div class="flex flex-col">
                    <h3 class="text-black text-[15.5px] sm:text-[16.5px] font-bold mb-3 leading-snug">
                        Start Your Stay with a Convenient Airport Transfer
                    </h3>
                    <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed mb-3.5">
                        Arriving in Cambodia should be simple and stress-free. CWD Realty &amp; Hospitality can arrange airport pick-up services for guests staying at our managed properties.
                    </p>
                    <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed mb-6">
                        Our team can coordinate your airport arrival and transportation to your accommodation, helping you begin your stay comfortably.
                    </p>

                    <h4 class="text-black text-[14.5px] sm:text-[15px] font-bold mb-2.5">
                        Airport Pick-Up Is Suitable For
                    </h4>
                    <ul class="list-disc pl-5 space-y-1.5 text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed mb-8">
                        <li>International travelers</li>
                        <li>Business travelers</li>
                        <li>Tourists</li>
                        <li>Expatriates</li>
                        <li>Families</li>
                        <li>First-time visitors to Cambodia</li>
                    </ul>

                    <a href="{{ url('/contact-us') }}"
                        class="group inline-flex items-center gap-2 text-[#2A5A8A] hover:text-[#c9a463] text-[14.5px] sm:text-[15px] font-bold transition-colors w-max">
                        <span>Request Airport Pick-Up</span>
                        <span class="transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                    </a>
                </div>

                {{-- RIGHT COLUMN: How It Works --}}
                <div class="flex flex-col">
                    <h3 class="text-black text-[15.5px] sm:text-[16.5px] font-bold mb-5 leading-snug">
                        How It Works
                    </h3>

                    <div class="space-y-5 text-[13.5px] sm:text-[14px]">
                        <div>
                            <h4 class="text-black font-bold mb-1">
                                1. Share Your Arrival Details
                            </h4>
                            <p class="text-black/80 leading-relaxed">
                                Provide your arrival date, flight information, and number of passengers.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-black font-bold mb-1">
                                2. Confirm the Service
                            </h4>
                            <p class="text-black/80 leading-relaxed">
                                Our team confirms the availability and applicable additional charge.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-black font-bold mb-1">
                                3. Airport Pick-Up
                            </h4>
                            <p class="text-black/80 leading-relaxed">
                                Your transportation is arranged according to the confirmed arrival details.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-black font-bold mb-1">
                                4. Transfer to Your Accommodation
                            </h4>
                            <p class="text-black/80 leading-relaxed">
                                Travel from the airport to your CWD-managed accommodation.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Block 3: City Tour Services (Blue Card) --}}
        <div class="w-[90%] max-w-[1550px] mx-auto mb-3 sm:mb-4">
            {{-- Gold accent bar on top of blue box --}}
            <div class="h-[10px] sm:h-[14px] w-[50%] max-w-[500px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

            {{-- Blue Content Box --}}
            <div class="bg-[#2A5A8A] px-6 sm:px-12 lg:px-16 py-10 sm:py-14 text-white shadow-sm">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 xl:gap-24 items-start">
                    
                    {{-- Left Column --}}
                    <div class="flex flex-col">
                        <h2 class="text-[#F4DEAC] text-[clamp(24px,3vw,36px)] font-bold mb-3 leading-tight">
                            City Tour Services
                        </h2>
                        <h3 class="text-white text-[15px] sm:text-[16px] font-bold mb-4 leading-snug">
                            Discover Cambodia with Convenient City Tour Arrangements
                        </h3>
                        <p class="text-white/95 text-[13.5px] sm:text-[14.5px] leading-relaxed mb-4">
                            For guests who want to explore Phnom Penh and experience more of Cambodia during their stay, CWD Realty &amp; Hospitality can arrange city tour services upon request.
                        </p>
                        <p class="text-white/95 text-[13.5px] sm:text-[14.5px] leading-relaxed mb-8">
                            Whether you are visiting for business or leisure, a city tour can provide an opportunity to discover local destinations and experience the city beyond your accommodation.
                        </p>

                        <a href="{{ url('/contact-us') }}"
                            class="group inline-flex items-center gap-2 text-white hover:text-[#F4DEAC] text-[14.5px] sm:text-[15px] font-bold transition-colors w-max">
                            <span>Ask About City Tours</span>
                            <span class="transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        </a>
                    </div>

                    {{-- Right Column --}}
                    <div class="flex flex-col">
                        <h4 class="text-white text-[14.5px] sm:text-[15px] font-normal mb-2.5">
                            City Tour Services Are Suitable For
                        </h4>
                        <ul class="list-disc pl-5 space-y-1 text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed mb-6">
                            <li>Tourists</li>
                            <li>First-time visitors</li>
                            <li>Business travelers with free time</li>
                            <li>Families</li>
                            <li>Long-stay guests</li>
                            <li>International visitors</li>
                        </ul>

                        <h4 class="text-white text-[15px] sm:text-[15.5px] font-bold mb-1.5">
                            Personalized Arrangement
                        </h4>
                        <p class="text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed">
                            City tour arrangements can be discussed with our team based on your preferred destinations, schedule, and requirements.
                        </p>
                    </div>

                </div>
            </div>
        </div>

        {{-- Block 4: Hospitality for Different Types of Guests (Light Gray Card) --}}
        <div class="w-[90%] max-w-[1550px] mx-auto bg-[#f4f5f8] px-6 sm:px-12 lg:px-16 py-12 sm:py-16 shadow-sm">
            <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,40px)] font-bold mb-8 sm:mb-10 leading-tight">
                Hospitality for Different<br>
                Types of Guests
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-24 items-start">
                
                {{-- Left Column --}}
                <div class="flex flex-col space-y-6">
                    <div>
                        <h3 class="text-black text-[15.5px] sm:text-[16.5px] font-bold mb-1.5">
                            Business Travelers
                        </h3>
                        <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed">
                            Make your business trip more convenient with accommodation and optional airport transportation services.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-black text-[15.5px] sm:text-[16.5px] font-bold mb-1.5">
                            Tourists
                        </h3>
                        <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed">
                            Enjoy a comfortable place to stay while having the option to arrange city tours during your visit.
                        </p>
                    </div>
                </div>

                {{-- Right Column --}}
                <div class="flex flex-col space-y-6">
                    <div>
                        <h3 class="text-black text-[15.5px] sm:text-[16.5px] font-bold mb-1.5">
                            Expatriates &amp; Long-Term Guests
                        </h3>
                        <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed">
                            Combine flexible accommodation with additional services when needed throughout your stay.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-black text-[15.5px] sm:text-[16.5px] font-bold mb-1.5">
                            Families &amp; Groups
                        </h3>
                        <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed">
                            Airport transportation and city tour arrangements can help make travel more convenient for families and groups.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </section>


    {{-- Why Choose CWD Hospitality Services --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading centered --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12 text-center">
                <span class="text-[#2A5A8A] font-normal">Why Choose </span>
                <span class="text-[#2A5A8A] font-bold">CWD Hospitality Services?</span>
            </h2>

            {{-- 4-Column Cards Grid --}}
            <div id="why-choose-cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">

                {{-- Card 01 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        01
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Convenient
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Arrange additional services through one hospitality team while staying at a CWD-managed property.
                    </p>
                </div>

                {{-- Card 02 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        02
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Flexible
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Services are arranged according to your travel requirements and availability.
                    </p>
                </div>

                {{-- Card 03 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        03
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Local Support
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Our team can assist guests with practical arrangements during their stay in Cambodia.
                    </p>
                </div>

                {{-- Card 04 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        04
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Connected to Your Accommodation
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Hospitality services can be coordinated alongside your CWD property rental.
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





    {{-- Hospitality & Property Leasing --}}
    <section class="relative w-full overflow-hidden z-[300] mt-12 sm:mt-16 lg:mt-20 mb-0">
        {{-- Background Image --}}
        <img src="{{ asset('services/property_sales/find professionally.png') }}" alt="Hospitality & Property Leasing"
            class="absolute inset-0 w-full h-full object-cover object-right md:object-center">

        {{-- Dark gradient overlay for optimal readability --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#163049]/60 via-[#163049]/30 to-transparent"></div>

        {{-- Main Content --}}
        <div class="relative z-10 w-full max-w-[1500px] mx-auto px-6 sm:px-10 lg:px-12 py-14 sm:py-18 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 xl:gap-16 items-center">

                {{-- Left Column: Title, Subtitle, Text, and CTA Button --}}
                <div class="lg:col-span-6 flex flex-col justify-start" data-scroll-reveal="left">
                    <h2 class="text-[#F4DEAC] text-[clamp(32px,3.8vw,52px)] font-bold leading-[1.1] mb-4 sm:mb-6">
                        Hospitality<br>
                        &amp; Property Leasing
                    </h2>

                    <h3 class="text-white text-[clamp(20px,2.2vw,30px)] font-bold leading-snug mb-3 sm:mb-4">
                        More Than a Place to Stay
                    </h3>

                    <p class="text-white text-[14.5px] sm:text-[15px] leading-relaxed max-w-[500px] mb-6 sm:mb-8 font-normal">
                        CWD Realty &amp; Hospitality combines professionally managed accommodation with optional hospitality services.
                    </p>

                    <div>
                        <a href="{{ url('/services/property-leasing') }}"
                            class="inline-flex items-center gap-2 px-6 sm:px-8 py-3 sm:py-3.5 bg-white text-[#204a74] text-[14px] sm:text-[15px] font-bold shadow-lg hover:bg-[#F4DEAC] hover:text-[#163049] transition-all duration-200">
                            View Property Leasing <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>

                {{-- Right Column: 2 White Cards --}}
                <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 items-stretch" data-scroll-reveal="right">

                    {{-- Card 1: Guests can choose from --}}
                    <div class="bg-white p-6 sm:p-7 xl:p-8 flex flex-col justify-start shadow-xl h-full">
                        <h4 class="text-[#204a74] text-[15px] sm:text-[16px] font-bold leading-snug mb-4">
                            Guests can choose from:
                        </h4>
                        <h5 class="text-black text-[14px] sm:text-[15px] font-bold mb-3">
                            Exclusive Residential Development
                        </h5>
                        <ul class="text-black/85 text-[13px] sm:text-[14px] leading-relaxed space-y-1.5 list-disc pl-5">
                            <li>Daily Rentals</li>
                            <li>Weekly Rentals</li>
                            <li>Monthly Rentals</li>
                        </ul>
                    </div>

                    {{-- Card 2: Selected properties offer --}}
                    <div class="bg-white p-6 sm:p-7 xl:p-8 flex flex-col justify-start shadow-xl h-full">
                        <h4 class="text-[#204a74] text-[15px] sm:text-[16px] font-bold leading-snug mb-4">
                            Selected properties offer different unit types, including:
                        </h4>
                        <h5 class="text-black text-[14px] sm:text-[15px] font-bold mb-3">
                            Residential Property Project
                        </h5>
                        <ul class="text-black/85 text-[13px] sm:text-[14px] leading-relaxed space-y-1.5 list-disc pl-5">
                            <li>Studio</li>
                            <li>1-Bedroom</li>
                            <li>2-Bedroom</li>
                            <li>3-Bedroom</li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- Additional Charges (Blue Bar with Overlapping Left Image Formula) --}}
    <section class="relative z-[300] bg-[#2A5A8A] mt-0 mb-28 sm:mb-36 lg:mb-44">
        <div class="max-w-[1500px] mx-auto px-6 sm:px-10 lg:px-12 py-10 sm:py-14 lg:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 xl:gap-16 items-center">

                {{-- Left: Golden Tower 322 Image (Shifted further to the bottom) --}}
                <div class="lg:col-span-6 flex justify-center lg:justify-start" data-scroll-reveal="left">
                    <div class="relative w-full max-w-[560px] mt-0 lg:mt-[-3rem] lg:mb-[-13rem] shadow-2xl z-20 overflow-hidden">
                        <img src="{{ asset('home/latest_activities/3img.png') }}"
                            alt="Golden Tower 322 - Additional Charges"
                            class="w-full h-auto object-cover">
                    </div>
                </div>

                {{-- Right: Content inside Blue Bar --}}
                <div class="lg:col-span-6 flex flex-col justify-start py-4 lg:py-0" data-scroll-reveal="right">
                    <h2 class="text-[#F4DEAC] text-[clamp(30px,3.8vw,48px)] font-normal leading-tight mb-5 sm:mb-6">
                        Additional <span class="text-[#F4DEAC] font-bold">Charges</span>
                    </h2>

                    <div class="flex flex-col gap-4 text-white text-[14.5px] sm:text-[15px] leading-relaxed font-normal max-w-[540px]">
                        <p>
                            Airport pick-up and city tour services are additional services and are not included in the standard accommodation rental rate.
                        </p>

                        <p>
                            The applicable charge depends on the requested service and arrangement.
                        </p>

                        <p>
                            For the latest pricing and availability, please contact our team before your arrival.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- How to Request Hospitality Services --}}
    @php
        $bookingSteps = [
            [
                'step' => 'Step 01',
                'title' => 'Contact Us',
                'description' => 'Tell us which hospitality service you require.',
            ],
            [
                'step' => 'Step 02',
                'title' => 'Provide Your Details',
                'description' => 'For airport pick-up, provide your arrival date, flight information, and passenger details. For city tours, tell us your preferred date, schedule, and destinations.',
            ],
            [
                'step' => 'Step 03',
                'title' => 'Confirm the Service',
                'description' => 'Our team will confirm availability and applicable charges.',
            ],
            [
                'step' => 'Step 04',
                'title' => 'Enjoy Your Stay',
                'description' => 'Once confirmed, our team coordinates the requested service for you.',
            ],
        ];
    @endphp

    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white pb-16 sm:pb-24">
        <div class="max-w-[1400px] mx-auto px-6">

            {{-- Heading --}}
            <div class="mb-10 sm:mb-14" data-scroll-reveal="left">
                <h2 class="text-[clamp(28px,3.8vw,44px)] leading-tight mb-2">
                    <span class="text-[#2A5A8A] font-normal block">How to Request</span>
                    <span class="text-[#2A5A8A] font-bold block">Hospitality Services</span>
                </h2>
                <p class="text-black text-[16px] sm:text-[17.5px] font-normal">
                    Simple Booking Process
                </p>
            </div>

            {{-- 4 Cards Grid with Hover Effect --}}
            <div id="booking-process-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 items-stretch">
                @foreach ($bookingSteps as $index => $step)
                    @php
                        $dir = ($index === 0) ? 'left' : (($index === 3) ? 'right' : 'fade-up');
                    @endphp
                    <div
                        data-scroll-reveal="{{ $dir }}"
                        data-scroll-delay="{{ $index * 100 }}"
                        class="booking-step-card group flex flex-col justify-start p-6 sm:p-7 bg-white border-[1.8px] border-[#1479B9] hover:bg-[#1479B9] transition-all duration-200 shadow-sm cursor-pointer">
                        <span class="text-[20px] sm:text-[22px] font-normal mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $step['step'] }}
                        </span>
                        <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold mb-2.5 transition-colors duration-200">
                            {{ $step['title'] }}
                        </h3>
                        <p class="text-black/80 group-hover:text-white/95 text-[13px] sm:text-[13.5px] leading-relaxed transition-colors duration-200">
                            {{ $step['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeBookingStepHeights() {
                    var cards = document.querySelectorAll('#booking-process-grid .booking-step-card');
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
                    document.addEventListener('DOMContentLoaded', equalizeBookingStepHeights);
                } else {
                    equalizeBookingStepHeights();
                }

                var resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(equalizeBookingStepHeights, 150);
                });

                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeBookingStepHeights);
                }
            })();
        </script>
    @endonce

    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'Is airport pick-up included in the rental price?',
                'answer' =>
                    'Contact CWD Realty & Hospitality before your arrival and provide your flight and arrival information. Our team will confirm availability and the applicable charge.',
            ],
            [
                'question' => 'Do you provide city tours?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Are airport pick-up and city tours included in monthly rental rates?',
                'answer' => 'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Can I request a city tour after I have already checked in?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Are hospitality services available for monthly rental guests?',
                'answer' => 'ComingSoon',
            ],
        ];
    @endphp

    <x-faqs :faq-left="$faqLeft" :faq-right="$faqRight" />

    {{-- Explore Our Accommodation --}}
    <section class="relative w-full overflow-hidden my-12 sm:my-16 md:my-20">
        {{-- Background Image --}}
        <img src="{{ asset('services/hospitality_services/explore_our_acommodation.png') }}"
            alt="Explore Our Accommodation"
            class="absolute inset-0 w-full h-full object-cover object-center">

        {{-- Content Overlay --}}
        <div class="relative z-10 max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14 py-16 sm:py-24 lg:py-28">
            <div class="max-w-[620px]">
                {{-- Gold accent bar on top left --}}
                <div class="h-[10px] sm:h-[12px] w-[60%] max-w-[320px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                {{-- Dark Blue Card --}}
                <div class="bg-[#122e49]/85 backdrop-blur-[2px] p-8 sm:p-10 lg:p-12 text-white shadow-xl">
                    <h2 class="text-[#F4DEAC] text-[clamp(26px,3.2vw,38px)] font-normal leading-tight mb-2">
                        Explore Our <span class="text-[#F4DEAC] font-bold">Accommodation</span>
                    </h2>
                    <h3 class="text-white text-[16px] sm:text-[17px] font-bold mb-4">
                        Find a Place to Stay in Cambodia
                    </h3>
                    <p class="text-white/95 text-[14px] sm:text-[15px] leading-relaxed mb-6">
                        Choose from flexible daily, weekly, and monthly rental options at CWD-managed properties.
                    </p>
                    <a href="{{ url('/properties') }}"
                        class="group inline-flex items-center gap-2 text-white hover:text-[#F4DEAC] text-[15px] sm:text-[16px] font-bold transition-colors w-max">
                        <span>View Properties for Rent</span>
                        <span class="transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact Our Hospitality Team --}}
    <section class="relative mt-[4rem] sm:mt-[6rem] lg:mt-[8rem] max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="Contact Our Hospitality Team"
                class="w-full h-auto min-h-[260px] object-cover shadow-sm">

            <div class="relative max-w-[580px] mt-6 px-6 min-[900px]:ml-[-8rem] min-[900px]:mt-[-7.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(28px,4.5vw,52px)] font-bold leading-[1.12] drop-shadow-md">
                    Contact<br>
                    Our Hospitality Team
                </h2>
            </div>
        </div>
    </section>

    {{-- Planning Your Stay in Cambodia? --}}
    <section class="mt-8 sm:mt-16 md:mt-24 pb-12 sm:pb-24">
        <div class="max-w-[1450px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10 lg:gap-14">

                {{-- Left: Accent line on the left + Content --}}
                <div class="flex items-start gap-4 sm:gap-6 lg:gap-8 max-w-[580px] w-full" data-scroll-reveal="left">
                    <span class="h-[2px] w-16 sm:w-28 lg:w-36 shrink-0 bg-[#c9a15c] mt-3.5"></span>
                    <div class="flex flex-col items-start flex-1 min-w-0">
                        <h2 class="text-[#204a74] text-[clamp(22px,2.5vw,30px)] font-bold leading-tight mb-4">
                            Planning Your Stay<br>
                            in Cambodia?
                        </h2>
                        <p class="text-[#204a74] text-[14px] sm:text-[14.5px] leading-relaxed mb-4">
                            Let CWD Realty &amp; Hospitality help make your arrival and stay more convenient.
                        </p>
                        <p class="text-[#204a74] text-[14px] sm:text-[14.5px] leading-relaxed mb-6">
                            Whether you need airport pick-up, a city tour, or assistance choosing suitable accommodation, contact our team to discuss your requirements.
                        </p>
                        <div class="flex flex-col items-start gap-1.5 w-full">
                            <a href="{{ url('/contact-us') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] sm:text-[14.5px] font-medium transition-all w-max">
                                <span>Request Hospitality Service</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                            <a href="{{ url('/contact-us') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] sm:text-[14.5px] font-medium transition-all w-max">
                                <span>Contact Us</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Image --}}
                <div class="w-full lg:w-auto lg:shrink-0" data-scroll-reveal="right">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="Planning Your Stay in Cambodia"
                        class="w-full lg:w-[520px] xl:w-[580px] h-auto object-cover">
                </div>

            </div>
        </div>
    </section>
@endsection
