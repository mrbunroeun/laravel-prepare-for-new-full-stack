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
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            <div class="max-w-[720px] bg-[#163049]/85 mix-blend-multiply">
                <div class="px-0 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,2.5vw,28px)] font-bold mb-6">
                        <span class="h-[2px] w-12 sm:w-16 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC] font-normal">Hospitality <span class="font-bold">Services</span></span>
                    </h2>

                    <h1 class="text-white px-6 sm:px-10 text-[clamp(22px,3.2vw,34px)] font-medium leading-snug mb-10">
                        Comfortable Stays, Convenient Services,<br>
                        Personalized Support
                    </h1>

                    <div class="flex flex-wrap items-center px-6 sm:px-10 gap-4 pointer-events-auto">
                        <a href="{{ url('/contact-us') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-medium px-4 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#163049] transition-colors">
                            Request Hospitality Service
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
                        class="inline-flex items-center gap-2 text-[#2A5A8A] hover:text-[#c9a463] text-[14.5px] sm:text-[15px] font-bold transition-colors w-max">
                        <span>Request Airport Pick-Up</span>
                        <span aria-hidden="true">&rarr;</span>
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
                            class="inline-flex items-center gap-2 text-white hover:text-[#F4DEAC] text-[14.5px] sm:text-[15px] font-bold transition-colors w-max">
                            <span>Ask About City Tours</span>
                            <span aria-hidden="true">&rarr;</span>
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


    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
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
                @foreach ($whyChooseRowOne as $feature)
                    <div
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
                @foreach ($whyChooseRowTwo as $feature)
                    <div
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

    {{-- Frequently Asked Questions --}}
    <section class="relative px-0 sm:px-[5rem] bg-[#e5e4e4]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 sm:py-20">
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

        <div class="max-w-[420px] mt-8 px-6 min-[900px]:ml-[calc(20%+2rem)] min-[900px]:mt-6 min-[900px]:px-0">
            @php
                $links = [
                    ['label' => 'Property Leasing', 'url' => url('/property-leasing'), 'active' => true],
                    ['label' => 'Hospitality Services', 'url' => url('/hospitality-services'), 'active' => false],
                    ['label' => 'Property Listings', 'url' => url('/property-listings'), 'active' => false],
                    ['label' => 'Contact Us', 'url' => url('/contact-us'), 'active' => false],
                ];
            @endphp

            <nav class="flex flex-col divide-y divide-gray-200 border border-gray-200">
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
