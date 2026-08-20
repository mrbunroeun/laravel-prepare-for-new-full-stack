@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[800px]  max-[1240px]:min-h-[650px] max-[940px]:min-h-[520px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="">
    </section>
    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] lg:mt-[-5rem] lg:mb-[10rem] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            {{-- Gold accent bar --}}
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                <div class="px-0 py-10">
                    @if(!isset($heroSection) || $heroSection->show_tagline !== false)
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)] font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        @if(($heroSection->tagline_box1_style ?? 'light-gold') !== 'hidden' && !empty($heroSection->tagline_box1 ?? 'Property'))
                            <span class="text-[#F4DEAC] {{ ($heroSection->tagline_box1_style ?? 'light-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }}">{{ $heroSection->tagline_box1 ?? 'Property' }}</span>
                        @endif
                        @if(($heroSection->tagline_box2_style ?? 'bold-gold') !== 'hidden' && !empty($heroSection->tagline_box2 ?? 'Management'))
                            <span class="text-[#F4DEAC] {{ ($heroSection->tagline_box2_style ?? 'bold-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }}">{{ $heroSection->tagline_box2 ?? 'Management' }}</span>
                        @endif
                    </h2>
                    @endif

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        {{ $heroSection->headline ?? 'Professional Property Management Services in Cambodia' }}
                    </h1>

                    <div class="flex items-center px-10 sm:px-10 gap-4 pointer-events-auto flex-wrap">
                        @if(isset($heroSection->buttons) && is_array($heroSection->buttons) && count($heroSection->buttons) > 0)
                            @foreach($heroSection->buttons as $btn)
                                <a href="{{ url($btn['url'] ?? '#') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                    {{ $btn['text'] ?? 'Learn More' }}
                                </a>
                            @endforeach
                        @else
                            <a href="{{ url('/properties') }}"
                                class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                Browse Properties
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



    {{-- CWD Realty & Hospitality     --}}
    <section
        class="px-0 sm:px-[5rem] md:px-[3rem] relative z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]" data-scroll-reveal="left">
                <h2 class="text-[clamp(22px,3vw,28px)] font-bold mb-6">
                    <span class="text-[#F4DEAC]">CWD Realty & Hospitality </span>
                </h2>

                <p class="text-white text-[15px] leading-relaxed">
                    Provides professional condominium and residential property management services in Cambodia, helping
                    property owners maximize rental income while maintaining high property standards.
                </p>
            </div>
        </div>
    </section>


    {{-- Maximize Your Property Investment --}}

    <section class="relative z-[300]  bg-white">
        <div class="max-w-[1500px] mx-auto  py-16 max-[940px]:py-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-26 items-start">

                {{-- LEFT: gold line + heading --}}
                <div class="flex flex-row" data-scroll-reveal="left">
                    <div class="h-[2px] w-full bg-[#c9a463] mr-[2rem] mt-6"></div>

                    <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,38px)] font-normal leading-tight">
                        Maximize Your Property Investment with Professional Management
                    </h2>
                </div>

                {{-- RIGHT: image + body text --}}
                <div class="flex flex-col mt-0 lg:mt-[-7rem] gap-8" data-scroll-reveal="right">
                    <img src="{{ asset('services/maximmize/maximize.png') }}" alt="Phnom Penh skyline"
                        class="w-full h-[350px] object-cover">

                    <div class="flex sm:px-[1rem] px-[2rem] flex-col gap-4">
                        <p class="text-black text-[15px] leading-relaxed">
                            Managing a rental property requires time, expertise, and consistent attention to detail. CWD
                            Realty &amp; Hospitality provides comprehensive property management services that help
                            condominium owners protect their investments, increase occupancy, and deliver exceptional
                            experiences for tenants and guests.
                        </p>

                        <p class="text-black text-[15px] leading-relaxed">
                            Whether your property is intended for daily, weekly, monthly, or long-term rentals, our
                            experienced team manages every aspect of the operation so you can enjoy peace of mind and
                            reliable returns.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>



    {{-- What is Property Management? --}}

    <section class="relative bg-white overflow-hidden">
        <div class="max-w-[1550px] mx-auto px-4 sm:px-6 py-12 sm:py-16">
            <div
                class="flex flex-col items-center gap-6 min-[700px]:flex-row min-[700px]:items-start min-[700px]:gap-8 min-[1024px]:-ml-24">
                {{-- LEFT: Property Image --}}
                <div
                    class="w-full min-[700px]:w-[35%] h-[380px] sm:h-[460px] min-[700px]:h-[560px] lg:h-[600px] overflow-hidden" data-scroll-reveal="left">
                    <img src="{{ asset('services/bg_img/bg_img.png') }}"
                        alt="What is Property Management?"
                        class="w-full h-full object-cover">
                </div>
                {{-- RIGHT: blue content card --}}
                <div class="relative z-[200] mt-[-1rem] text-[#2f6ba7] pointer-events-none w-full min-[700px]:w-[55%]" data-scroll-reveal="right">
                    {{-- Gold accent bar --}}
                    <div
                        class="h-[10px] sm:h-[15px] w-[55%] mr-auto bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]">
                    </div>
                    <div class="bg-[#2A5A8A] w-full">
                        <div class="px-6 sm:px-10 min-[1024px]:px-24 py-8 sm:py-12 min-[1024px]:py-20">
                            <h2 class="text-[clamp(22px,3vw,50px)] leading-tight mb-4">
                                <span class="text-[#F4DEAC] font-normal block">What is</span>
                                <span class="text-[#F4DEAC] font-bold block">Property </span>
                                <span class="text-[#F4DEAC] font-bold block">Management?</span>
                            </h2>
                            <p class="text-white text-[clamp(15px,1.2vw,17px)] leading-relaxed">
                                Property management is the professional administration of residential properties on
                                behalf
                                of owners. Our team oversees daily operations, tenant coordination, maintenance
                                scheduling,
                                rental administration, financial reporting, and hospitality services to ensure your
                                property
                                performs efficiently and remains well maintained.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- auto move logo --}}
    <x-auto_move.auto_move />
    {{-- Property Management Services --}}

    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] w-full overflow-hidden mt-[5rem] sm:mt-[10rem]">

        {{-- Background Image --}}
        <img src="{{ asset('services/bg_img/bg_img.png') }}" alt="Property Management Services"
            class="absolute inset-0 w-full h-full object-cover object-center">

        {{-- Dark/optional overlay if needed --}}
        {{-- <div class="absolute inset-0 bg-black/10"></div> --}}

        {{-- Main Content --}}
        <div class="relative z-10 w-full max-w-[1400px] mx-auto px-6 py-16">

            {{-- Heading + Intro --}}
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-8 mb-16" data-scroll-reveal="left">

                {{-- Heading --}}
                <h2 class="text-white text-[clamp(32px,4vw,44px)] leading-tight">
                    <span class="font-normal block">
                        Property
                    </span>

                    <span class="font-bold block">
                        Management Services
                    </span>
                </h2>

                {{-- Intro Text --}}
                <p class="text-white text-[18px] leading-relaxed max-w-[420px] lg:mt-4">
                    CWD Realty &amp; Hospitality offers comprehensive solutions across the property lifecycle.
                </p>

            </div>


            {{-- Service Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


                {{-- Service 1 --}}
                <div class="border-2 border-white p-6" data-scroll-reveal="left" data-scroll-delay="0">
                    <h4 class="text-[#F4DEAC] text-[18px] font-bold mb-3">
                        Rental Marketing &amp; Listing
                    </h4>

                    <p class="text-white text-[18px] leading-relaxed">
                        We promote your property across multiple marketing channels to attract qualified tenants
                        and maximize occupancy.
                    </p>
                </div>


                {{-- Service 2 --}}
                <div class="border-2 border-white p-6" data-scroll-reveal="fade-up" data-scroll-delay="100">
                    <h4 class="text-[#F4DEAC] text-[18px] font-bold mb-3">
                        Tenant &amp; Guest Management
                    </h4>

                    <p class="text-white text-[18px] leading-relaxed">
                        Our team manages inquiries, bookings, check-in, check-out, tenant communication, and
                        ongoing customer support.
                    </p>
                </div>


                {{-- Service 3 --}}
                <div class="border-2 border-white p-6" data-scroll-reveal="right" data-scroll-delay="200">
                    <h4 class="text-[#F4DEAC] text-[18px] font-bold mb-3">
                        Property Inspection
                    </h4>

                    <p class="text-white text-[18px] leading-relaxed">
                        Helping buyers and investors discover quality residential opportunities in Cambodia.
                    </p>
                </div>


                {{-- Service 4 --}}
                <div class="border-2 border-white p-6" data-scroll-reveal="left" data-scroll-delay="0">
                    <h4 class="text-[#F4DEAC] text-[18px] font-bold mb-3">
                        Maintenance Coordination
                    </h4>

                    <p class="text-white text-[18px] leading-relaxed">
                        We coordinate cleaning, repairs, maintenance, and contractor services to keep your
                        property in excellent condition.
                    </p>
                </div>


                {{-- Service 5 --}}
                <div class="border-2 border-white p-6" data-scroll-reveal="fade-up" data-scroll-delay="100">
                    <h4 class="text-[#F4DEAC] text-[18px] font-bold mb-3">
                        Rental Administration
                    </h4>

                    <p class="text-white text-[18px] leading-relaxed">
                        We handle booking schedules, rental agreements, payment coordination, and owner
                        reporting.
                    </p>
                </div>


                {{-- Service 6 --}}
                <div class="border-2 border-white p-6" data-scroll-reveal="right" data-scroll-delay="200">
                    <h4 class="text-[#F4DEAC] text-[18px] font-bold mb-3">
                        Hospitality Management
                    </h4>

                    <p class="text-white text-[18px] leading-relaxed">
                        Daily rental guests receive professional hospitality services to ensure a comfortable
                        stay.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- Our Management Models --}}
    <section class="relative bg-white">
        <div class="max-w-[1550px] mx-auto sm:px-[5rem] px-[2rem] py-16 sm:py-24">

            {{-- Heading --}}
            <div class="mb-12" data-scroll-reveal="left">
                <h2 class="text-[#2A5A8A] text-[clamp(32px,4vw,44px)] leading-tight">
                    <span class="font-normal block">Our</span>
                    <span class="font-normal block">Management</span>
                    <span class="font-bold block">Models</span>
                </h2>
            </div>

            {{-- Model cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-stretch">

                {{-- Revenue Sharing --}}
                <div class="flex flex-col shadow-lg overflow-hidden group h-full" data-scroll-reveal="left">
                    {{-- Image --}}
                    <div class="w-full h-[260px] sm:h-[300px] overflow-hidden bg-gray-100 shrink-0">
                        <img src="{{ asset('services/propertis_leasing/bedroom.png') }}"
                            alt="Revenue Sharing Model"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>

                    {{-- Content --}}
                    <div class="bg-[#2A5A8A] w-full flex-1 flex flex-col justify-start">
                        <div class="px-6 sm:px-8 py-8 sm:py-10">
                            <h3 class="text-[#F4DEAC] text-[22px] sm:text-[24px] font-bold mb-4">Revenue Sharing</h3>
                            <p class="text-white text-[15px] leading-relaxed">
                                Suitable for short-term rentals.
                                Property owners receive rental income while CWD Realty &amp; Hospitality manages
                                daily operations based on an agreed 10% management fee.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Long-Term Leasing Management --}}
                <div class="flex flex-col shadow-lg overflow-hidden group h-full" data-scroll-reveal="right" data-scroll-delay="100">
                    {{-- Image --}}
                    <div class="w-full h-[260px] sm:h-[300px] overflow-hidden bg-gray-100 shrink-0">
                        <img src="{{ asset('services/maximmize/maximize.png') }}"
                            alt="Long-Term Leasing Management Model"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>

                    {{-- Content --}}
                    <div class="bg-[#2A5A8A] w-full flex-1 flex flex-col justify-start">
                        <div class="px-6 sm:px-8 py-8 sm:py-10">
                            <h3 class="text-[#F4DEAC] text-[22px] sm:text-[24px] font-bold mb-4">Long-Term Leasing
                                Management</h3>
                            <p class="text-white text-[15px] leading-relaxed">
                                For long-term rental properties, we provide exclusive leasing management, tenant
                                administration, and operational support while owners receive regular $400 monthly
                                rental income and extra 5% if the daily renting exceed $400 according to the
                                management agreement.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12" data-scroll-reveal="left">
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

    {{-- Frequently Asked Questions --}}
    <section class="relative px-0 sm:px-[5rem] bg-[#e5e4e4]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 sm:py-20">
            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
            </h2>

            {{-- Two-column accordion --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">

                {{-- Left column --}}
                <div class="faq-column flex flex-col gap-2" data-scroll-reveal="left">
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
                <div class="faq-column flex flex-col gap-2" data-scroll-reveal="right" data-scroll-delay="100">
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
