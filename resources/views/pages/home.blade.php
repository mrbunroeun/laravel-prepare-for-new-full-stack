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
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)]  font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC]">CWD</span>
                        <span class="text-[#F4DEAC] font-normal">Real Estate Agent &amp; Developer</span>
                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Your Trusted Property Management &amp; Hospitality Partner in Cambodia
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


    {{-- CWD Realty & Hospitality --}}
    <section
        class="px-0 sm:px-[5rem] md:px-[3rem] relative z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]" data-scroll-reveal="left">
                <h2 class="text-[clamp(22px,3vw,28px)] font-bold mb-6">
                    <span class="text-[#F4DEAC]">CWD</span>
                    <span class="text-[#F4DEAC] font-normal">Realty &amp; Hospitality</span>
                </h2>

                <p class="text-white  text-[15px] leading-relaxed">
                    Specializes in condominium management, property leasing, rental management, and hospitality services in
                    Phnom Penh. Whether you're a property owner seeking professional management or a guest looking for
                    comfortable accommodation, we deliver reliable solutions with exceptional customer service.
                </p>
            </div>
        </div>
    </section>


    {{-- Who We Are section 1st one --}}
    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]" data-scroll-reveal="left">
                <h2 class="text-[clamp(28px,4vw,40px)] mb-6">
                    <span class="text-[#2A5A8A] font-normal">Who</span>
                    <span class="text-[#2A5A8A] font-bold">We Are</span>
                </h2>

                <h3 class="text-black max-w-[500px] text-[clamp(20px,2.5vw,26px)] font-semibold leading-tight mb-6">
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

    {{-- our services --}}
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
    <section class="relative z-[300] px-0 sm:px-[5rem] md:px-[3rem] bg-none ">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 pt-16 pb-0 sm:pt-20">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,36px)] min-[1200px]:mb-[7rem] mb-[2rem] mb-[clamp(2rem,5vw,5rem)] relative" data-scroll-reveal="left">
                <span class="text-[#2f6ba7] font-normal">Our</span>
                <span class="text-[#2f6ba7] font-bold">Services</span>
            </h2>

            {{-- Composition wrapper: image + dark block + cards --}}
            <div
                class="relative flex flex-col min-[1220px]:flex-row min-[1220px]:items-start min-h-[420px] sm:min-h-[520px]">

                {{-- Property image (right side on desktop, full width on mobile) --}}
                <div
                    class="flex flex-col items-end w-full min-[1220px]:w-[850px] min-[1220px]:order-2 min-[1220px]:-mt-[7.5rem]" data-scroll-reveal="right">

                    <div class="w-full h-[460px] sm:h-[640px] overflow-hidden">
                        <img src="{{ asset('home/our_services/our_services.png') }}"
                            alt="CWD Realty modern residential condominium tower in Phnom Penh"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- Gold accent bar --}}
                    <div class="self-end w-[81%] h-[15px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]">
                    </div>

                </div>

                {{-- Service cards grid --}}
                <div
                    class="relative w-full min-[1220px]:w-[54%] min-[1220px]:order-1 min-[1220px]:z-[30] min-[1220px]:-mr-[80px] min-[1220px]:mt-[68px] -mt-16 sm:-mt-20 min-[1220px]:mt-0 grid grid-cols-1 min-[770px]:grid-cols-2 gap-2 sm:gap-2.5 px-4 sm:px-0">
                    @foreach ($services as $service)
                        <div
                            class="service-card bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col min-h-[150px] min-[1220px]:min-h-[145px]" data-scroll-reveal="left" data-scroll-delay="{{ $loop->index * 100 }}">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-[#F4DEAC] text-[16px] sm:text-[18px] font-bold leading-snug">
                                    {{ $service['title'] }}
                                </h3>
                                <span class="text-[#F4DEAC] text-[26px] sm:text-[30px] font-light leading-none shrink-0">
                                    {{ $service['number'] }}
                                </span>
                            </div>

                            <p class="text-white/90 text-[15px] sm:text-[16px] leading-relaxed mt-3">
                                {{ $service['description'] }}
                            </p>

                            <a href="{{ $service['link'] }}"
                                class="text-[#F4DEAC] text-[11px] sm:text-[13px] font-medium mt-4 pt-4 inline-flex items-center gap-1 hover:underline mt-auto">
                                {{ $service['linkText'] }} <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <script>
                    function equalizeCardHeights() {
                        const cards = document.querySelectorAll('.service-card');
                        if (!cards.length) return;
                        cards.forEach(card => card.style.minHeight = '');
                        let maxHeight = 0;
                        cards.forEach(card => {
                            maxHeight = Math.max(maxHeight, card.offsetHeight);
                        });
                        cards.forEach(card => card.style.minHeight = `${maxHeight}px`);
                    }

                    window.addEventListener('load', equalizeCardHeights);
                    window.addEventListener('resize', equalizeCardHeights);
                </script>

            </div>

            {{-- Bottom spacer --}}
            <div class="h-8  sm:h-10 lg:h-16"></div>
        </div>
    </section>

    {{-- Auto Move section --}}
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
                animation: cwd-marquee 45s linear infinite;
            }

            /* Pause on hover, if wanted */
            .cwd-marquee-track:hover {
                animation-play-state: paused;
            }

            @keyframes cwd-marquee {
                from {
                    transform: translateX(-50%);
                }

                to {
                    transform: translateX(0);
                }
            }
        </style>
    </section>




    {{-- Featured Properties: background image layer + card content layer, cards can extend above image's top edge --}}
    <x-properties.featured_properties />






    {{-- Who We Are section 2nd one --}}
    <section class="relative px-0 sm:px-[5rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]" data-scroll-reveal="left">
                <h2 class="text-[clamp(28px,4vw,40px)] mb-6">
                    <span class="text-[#2A5A8A] font-normal">Who</span>
                    <span class="text-[#2A5A8A] font-bold">We Are</span>
                </h2>

                <h3 class="text-black text-[clamp(20px,2.5vw,26px)]  font-semibold leading-tight mb-6">
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
    <section class="relative px-0 sm:px-[5rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Why Choose</span>
                <span class="text-[#2A5A8A] font-bold block">CWD Realty &amp; Hospitality?</span>
            </h2>

            {{-- Cards grid --}}
            <div id="why-choose-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 items-stretch">
                @foreach ($whyChooseFeatures as $index => $feature)
                    @php
                        $direction = ($index === 0 || $index === 3) ? 'left' : (($index === 2 || $index === 4) ? 'right' : 'fade-up');
                    @endphp
                    <div data-scroll-reveal="{{ $direction }}" data-scroll-delay="{{ ($index % 3) * 100 }}" @class([
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
                    'ComingSoon',
            ],
            [
                'question' => 'Are smoking and non-smoking rooms available?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Is breakfast included?',
                'answer' =>
                    'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Are pets allowed?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'What facilities are available?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Do you provide airport transportation?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Are there discounts for weekly or monthly stays?',
                'answer' =>
                    'ComingSoon',
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
                <div class="faq-column flex flex-col gap-2" data-scroll-reveal="fade-left">
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
                <div class="faq-column flex flex-col gap-2" data-scroll-reveal="fade-right" data-scroll-delay="150">
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


    <!-- Latest activities -->
    <x-latest_activities />

    {{-- comments section --}}
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
