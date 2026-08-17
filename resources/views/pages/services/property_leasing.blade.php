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
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply">
                <div class="px-0 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)] font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC] font-normal">Property <span class="font-bold">Leasing</span></span>
                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Flexible Property Leasing for<br>Short &amp; Long Stays
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


    {{-- Comfortable, professionally managed residences --}}
    <section
        class="px-0 sm:px-[5rem] md:px-[3rem] relative z-[300] mt-[0.5rem] sm:mt-[1rem] md:mt-[1.3rem] lg:mt-[2rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[425px] ml-auto">
                <p class="text-white text-[15px] leading-relaxed">
                    Comfortable, professionally managed residences with flexible daily, weekly, and monthly rental options for business travelers, expatriates, tourists, and long-term residents in Cambodia.
                </p>
            </div>
        </div>
    </section>

    {{-- Find professionally managed properties in Phnom Penh. --}}
    <section class="relative z-[300] bg-white">
        <div class="max-w-[1500px] mx-auto py-16 max-[940px]:py-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-26 items-start">

                {{-- LEFT: image + body text --}}
                <div class="flex flex-col mt-0 lg:mt-[-7rem] gap-8">
                    <img src="{{ asset('home/latest_activities/3img.png') }}" alt="Golden Tower 322"
                        class="w-full h-auto object-cover">

                    <div class="flex sm:px-[1rem] px-[2rem] justify-end gap-4">
                        <p class="text-black text-[15px] max-w-[420px] leading-relaxed">
                            Whether you need a place for a few nights, several weeks, or an extended stay, CWD Realty &amp; Hospitality offers flexible rental options designed around your accommodation needs.
                        </p>
                    </div>
                </div>

                {{-- RIGHT: heading + gold line --}}
                <div class="flex flex-row">
                    <h2
                        class="text-[#2A5A8A] sm:px-[1rem] px-[2rem] text-[clamp(28px,3.5vw,38px)] font-normal leading-tight">
                        Find professionally managed properties in Phnom Penh.
                    </h2>

                    <div class="h-[2px] w-full bg-[#c9a463] ml-[2rem] mt-6"></div>
                </div>

            </div>

        </div>
    </section>

    {{-- Choose the Rental Option That Fits Your Stay --}}
    <section class="relative w-full overflow-hidden z-[300] my-10 sm:my-16">
        {{-- Background Image --}}
        <img src="{{ asset('services/property_sales/find professionally.png') }}" alt="Rental Options Background"
            class="absolute inset-0 w-full h-full object-cover object-center">

        {{-- Main Content --}}
        <div class="relative z-10 w-full max-w-[1700px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 py-12 lg:py-16">
            <div id="rental-options-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 xl:gap-5 items-stretch">

                {{-- Column 1: Heading --}}
                <div class="flex flex-col justify-start pt-2 pr-2">
                    <h2 class="text-white text-[clamp(26px,2.5vw,38px)] font-normal leading-[1.18]">
                        Choose the Rental<br>
                        <span class="text-[#F4DEAC] font-bold">Option That</span><br>
                        <span class="text-[#F4DEAC] font-bold">Fits Your Stay</span>
                    </h2>
                </div>

                {{-- Column 2 / Card 1: Daily & Weekly Rentals --}}
                <div class="rental-option-card bg-white p-5 xl:p-6 flex flex-col justify-between h-full shadow-md">
                    <div>
                        <h3 class="text-[#2A5A8A] text-[18px] xl:text-[20px] font-bold mb-2">
                            Daily &amp; Weekly Rentals
                        </h3>
                        <p class="text-black/80 text-[12.5px] xl:text-[13px] leading-relaxed mb-3.5">
                            Our daily and weekly rental options provide flexibility for guests who need comfortable accommodation without committing to a long-term lease.
                        </p>

                        <h4 class="text-[#2A5A8A] text-[13px] xl:text-[13.5px] font-bold mb-1">
                            Rates Starting From
                        </h4>
                        <div class="text-[#2A5A8A] text-[13px] font-medium leading-snug mb-1">
                            <p>$35 / day</p>
                            <p>$45 / day</p>
                            <p>Up to $150 / day</p>
                        </div>
                        <p class="text-black/60 text-[11.5px] xl:text-[12px] leading-snug mb-3.5">
                            Rates vary depending on the selected property, room type, and accommodation.
                        </p>

                        <h4 class="text-black text-[12.5px] xl:text-[13px] font-bold mb-1.5">
                            Suitable For
                        </h4>
                        <ul class="text-black/80 text-[12px] xl:text-[12.5px] leading-relaxed space-y-0.5 list-disc pl-4 mb-4">
                            <li>Business Travelers</li>
                            <li>Tourists</li>
                            <li>Short-Term Visitors</li>
                            <li>Couples</li>
                            <li>Expatriates</li>
                            <li>Guests attending events or meetings in Phnom Penh</li>
                        </ul>
                    </div>

                    <a href="{{ url('/properties') }}"
                        class="inline-flex items-center gap-1 text-[#2A5A8A] text-[12.5px] xl:text-[13px] font-semibold hover:underline mt-auto pt-2">
                        View Available Properties <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>

                {{-- Column 3 / Card 2: Monthly Rentals --}}
                <div class="rental-option-card bg-white p-5 xl:p-6 flex flex-col justify-between h-full shadow-md">
                    <div>
                        <h3 class="text-[#2A5A8A] text-[18px] xl:text-[20px] font-bold mb-1">
                            Monthly Rentals
                        </h3>
                        <h4 class="text-black text-[13px] xl:text-[13.5px] font-bold mb-1.5">
                            Stay Longer, Pay Less Per Day
                        </h4>
                        <p class="text-black/80 text-[12.5px] xl:text-[13px] leading-relaxed mb-3.5">
                            For guests who need accommodation for an extended period, monthly rental options provide a more practical and economical solution.
                        </p>

                        <h4 class="text-[#2A5A8A] text-[13px] xl:text-[13.5px] font-bold mb-1">
                            Monthly Rates
                        </h4>
                        <div class="text-[#2A5A8A] text-[13px] font-medium leading-snug mb-1">
                            <p>$400 / month</p>
                            <p>$450 / month</p>
                        </div>
                        <p class="text-black/60 text-[11.5px] xl:text-[12px] leading-snug mb-3.5">
                            Monthly rates may vary depending on the property and available accommodation.
                        </p>

                        <h4 class="text-black text-[12.5px] xl:text-[13px] font-bold mb-1.5">
                            Suitable For
                        </h4>
                        <ul class="text-black/80 text-[12px] xl:text-[12.5px] leading-relaxed space-y-0.5 list-disc pl-4 mb-4">
                            <li>Expatriates</li>
                            <li>Long-Term Residents</li>
                            <li>Business Professionals</li>
                            <li>Students</li>
                            <li>Corporate Staff</li>
                            <li>Guests relocating to Cambodia</li>
                        </ul>
                    </div>

                    <a href="{{ url('/contact-us') }}"
                        class="inline-flex items-center gap-1 text-[#2A5A8A] text-[12.5px] xl:text-[13px] font-semibold hover:underline mt-auto pt-2">
                        Ask About Monthly Availability <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>

                {{-- Column 4 / Card 3: Smoking & Non-Smoking Options --}}
                <div class="rental-option-card bg-white p-5 xl:p-6 flex flex-col justify-between h-full shadow-md">
                    <div>
                        <h3 class="text-[#2A5A8A] text-[18px] xl:text-[20px] font-bold mb-2">
                            Smoking &amp; Non-Smoking Options
                        </h3>
                        <p class="text-black/80 text-[12.5px] xl:text-[13px] leading-relaxed mb-3.5">
                            We offer different accommodation options based on guest preference and property availability.
                        </p>

                        <div class="mb-3.5">
                            <h4 class="text-[#2A5A8A] text-[13px] xl:text-[13.5px] font-bold mb-0.5">
                                Non-Smoking
                            </h4>
                            <p class="text-[#2A5A8A] text-[13px] font-medium mb-1">
                                From $35 / day
                            </p>
                            <p class="text-black/80 text-[12px] xl:text-[12.5px] leading-relaxed">
                                A suitable choice for guests who prefer a clean, smoke-free accommodation environment.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-[#2A5A8A] text-[13px] xl:text-[13.5px] font-bold mb-0.5">
                                Smoking
                            </h4>
                            <p class="text-[#2A5A8A] text-[13px] font-medium mb-1">
                                From $45 / day
                            </p>
                            <p class="text-black/80 text-[12px] xl:text-[12.5px] leading-relaxed">
                                Smoking accommodation is available where designated, subject to property availability.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeRentalCardHeights() {
                    const cards = document.querySelectorAll('.rental-option-card');
                    if (!cards.length) return;
                    cards.forEach(card => card.style.minHeight = '');
                    let maxH = 0;
                    cards.forEach(card => {
                        if (card.offsetHeight > maxH) maxH = card.offsetHeight;
                    });
                    cards.forEach(card => card.style.minHeight = maxH + 'px');
                }

                window.addEventListener('load', equalizeRentalCardHeights);
                window.addEventListener('resize', equalizeRentalCardHeights);
                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeRentalCardHeights);
                }
            })();
        </script>
    @endonce


      {{-- auto move logo --}}
    <x-auto_move.auto_move />


    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading centered --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12 text-center">
                <span class="text-[#2A5A8A] font-normal">Why Choose </span>
                <span class="text-[#2A5A8A] font-bold">CWD Realty &amp; Hospitality?</span>
            </h2>

            {{-- 4-Column Cards Grid --}}
            <div id="why-choose-cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">

                {{-- Card 01 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        01
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Professionally Managed Properties
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Our properties are professionally managed to provide guests with a comfortable and convenient accommodation experience.
                    </p>
                </div>

                {{-- Card 02 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        02
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Flexible Rental Terms
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Choose from daily, weekly, or monthly rental options depending on the length of your stay.
                    </p>
                </div>

                {{-- Card 03 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        03
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Comfortable Facilities
                    </h3>
                    <div class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        <p>Selected properties offer facilities such as:</p>
                        <ul class="list-disc pl-5 my-2 space-y-0.5 text-[13px] sm:text-[13.5px]">
                            <li>Swimming Pools</li>
                            <li>Panoramic River Views</li>
                            <li>Residential Facilities</li>
                        </ul>
                        <p>Facilities vary by property.</p>
                    </div>
                </div>

                {{-- Card 04 --}}
                <div class="why-choose-card group flex flex-col p-6 sm:p-7 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200 shadow-sm">
                    <span class="text-[32px] sm:text-[36px] font-bold leading-none mb-4 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                        04
                    </span>
                    <h3 class="text-[#2A5A8A] group-hover:text-white text-[16px] sm:text-[17px] font-bold leading-snug mb-3 transition-colors duration-200">
                        Hospitality Support
                    </h3>
                    <p class="text-black/80 group-hover:text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed transition-colors duration-200">
                        Our team can also arrange additional hospitality services to make your stay more convenient.
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

    {{-- Additional Hospitality Services --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white pb-16 sm:pb-24">
        <div class="max-w-[1400px] mx-auto px-6">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12 text-left">
                <span class="text-[#2A5A8A] font-normal block">Additional</span>
                <span class="text-[#2A5A8A] font-bold block">Hospitality Services</span>
            </h2>

            {{-- 2 Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-stretch">

                {{-- Card 1: Airport Pick-Up --}}
                <div class="flex flex-col bg-[#2A5A8A] shadow-md">
                    {{-- Gold accent bar on top --}}
                    <div class="h-[10px] w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="p-8 sm:p-10 flex flex-col flex-1">
                        {{-- Icon --}}
                        <div class="mb-6">
                            <img src="{{ asset('services/property_sales/airplane_map.svg') }}" alt="Airport Pick-Up"
                                class="w-12 h-12 object-contain">
                        </div>

                        {{-- Title --}}
                        <h3 class="text-[#F4DEAC] text-[18px] sm:text-[20px] font-bold mb-3">
                            Airport Pick-Up
                        </h3>

                        {{-- Description --}}
                        <p class="text-white/90 text-[14px] sm:text-[15px] leading-relaxed">
                            Need transportation when you arrive in Cambodia? CWD can arrange airport pick-up services for an additional charge.
                        </p>
                    </div>
                </div>

                {{-- Card 2: City Tour --}}
                <div class="flex flex-col bg-[#2A5A8A] shadow-md">
                    {{-- Gold accent bar on top --}}
                    <div class="h-[10px] w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="p-8 sm:p-10 flex flex-col flex-1">
                        {{-- Icon --}}
                        <div class="mb-6">
                            <img src="{{ asset('services/property_sales/vichincal_map.svg') }}" alt="City Tour"
                                class="w-12 h-12 object-contain">
                        </div>

                        {{-- Title --}}
                        <h3 class="text-[#F4DEAC] text-[18px] sm:text-[20px] font-bold mb-3">
                            City Tour
                        </h3>

                        {{-- Description --}}
                        <p class="text-white/90 text-[14px] sm:text-[15px] leading-relaxed">
                            Discover Phnom Penh and surrounding destinations with optional city tour arrangements. Additional charges apply.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'Why should I choose a CWD-managed property to stay?',
                'answer' =>
                    'CWD Realty & Hospitality provides professionally managed residential accommodation with flexible rental options and guest support. Selected properties offer facilities such as swimming pools and panoramic river views, while additional services such as airport pick-up and city tours can be arranged upon request.',
            ],
            [
                'question' => 'What is the difference between smoking and non-smoking accommodation?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'What facilities are available?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Do you provide airport pick-up and city tours?',
                'answer' => 'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'How much does it cost to rent a property?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Is breakfast included?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Are pets allowed?',
                'answer' => 'ComingSoon',
            ],
        ];
    @endphp

    <x-faqs :faq-left="$faqLeft" :faq-right="$faqRight" />

    {{-- Find Your Next Stay --}}
    <section class="relative mt-[4rem] sm:mt-[6rem] lg:mt-[8rem] max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="Find Your Next Stay"
                class="w-full h-auto min-h-[260px] object-cover shadow-sm">

            <div class="relative max-w-[540px] mt-6 px-6 min-[900px]:ml-[-8rem] min-[900px]:mt-[-7.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(28px,4.5vw,50px)] font-bold leading-[1.15] drop-shadow-md">
                    Find Your Next Stay
                </h2>
            </div>
        </div>
    </section>

    {{-- Looking for Flexible Accommodation in Cambodia? --}}
    <section class="mt-16 sm:mt-24 md:mt-32 pb-24">
        <div class="max-w-[1450px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10 lg:gap-14">

                {{-- Left: Accent line on the left + Content --}}
                <div class="flex items-start gap-4 sm:gap-6 lg:gap-8 max-w-[580px]">
                    <span class="h-[2px] w-20 sm:w-28 lg:w-36 shrink-0 bg-[#c9a15c] mt-3.5"></span>
                    <div class="flex flex-col items-start">
                        <h2 class="text-[#204a74] text-[clamp(20px,2.4vw,28px)] font-bold leading-tight mb-4">
                            Looking for Flexible<br>
                            Accommodation in<br>
                            Cambodia?
                        </h2>
                        <p class="text-[#204a74] text-[14px] sm:text-[14.5px] leading-relaxed mb-6">
                            Whether you need a residence for a few days, several weeks, or an extended monthly stay, CWD Realty &amp; Hospitality can help you find a suitable professionally managed property.
                        </p>
                        <div class="flex flex-col items-start gap-1.5">
                            <a href="{{ url('/properties') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] font-medium transition-all">
                                <span>Browse Available Properties</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                            <a href="{{ url('/contact-us') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] font-medium transition-all">
                                <span>Contact Our Leasing Team</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Image --}}
                <div class="w-full lg:w-auto lg:shrink-0">
                    <img src="{{ asset('services/private residential/Private Residential.png') }}"
                        alt="Looking for Flexible Accommodation in Cambodia"
                        class="w-full lg:w-[520px] xl:w-[580px] h-auto object-cover shadow-sm">
                </div>

            </div>
        </div>
    </section>
@endsection
