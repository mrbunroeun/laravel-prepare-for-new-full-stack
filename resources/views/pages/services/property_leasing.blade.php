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

    {{-- Under Daily & Weekly Rentals --}}
    @php
        $allPartImg = asset('services/propertis_leasing/all part.png');
        $bedroomImg = asset('services/propertis_leasing/bedroom.png');

        $allPartImages = [$allPartImg, $bedroomImg];
        $bedroomImages = [$bedroomImg, $allPartImg];
    @endphp

    <section class="relative w-full bg-white py-14 lg:py-20 overflow-hidden">
        <div class="w-full pl-6 sm:pl-10 lg:pl-12 xl:pl-16 pr-0">
            
            {{-- Section Heading --}}
            <div class="mb-8 lg:mb-10 max-w-[1650px]">
                <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,42px)] leading-[1.15]">
                    <span class="font-normal block">Under Daily &amp; Weekly</span>
                    <span class="font-bold block">Rentals</span>
                </h2>
            </div>

            {{-- Content Row: Left Navigation Buttons + Right Scrolling Track with Blur/Fade --}}
            <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-8 xl:gap-10">

                {{-- Left circular navigation arrows aligned with top of images --}}
                <div class="flex items-center gap-3 shrink-0 pt-0 lg:pt-1">
                    <button id="rentals-prev-btn" type="button" aria-label="Previous card"
                        class="w-11 h-11 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all duration-200 hover:bg-[#2A5A8A] hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="rentals-next-btn" type="button" aria-label="Next card"
                        class="w-11 h-11 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all duration-200 hover:bg-[#2A5A8A] hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                {{-- Right Column: Scrolling Card Track with clean white edge blur --}}
                <div class="relative flex-1 min-w-0 w-full overflow-hidden">
                    <div id="rentals-track"
                        class="flex gap-6 lg:gap-7 overflow-x-auto scroll-smooth pb-4 snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden pr-12 sm:pr-20 lg:pr-28">

                        {{-- Card 1: Wealth Mansion Rentals --}}
                        <article class="cwd-rental-card shrink-0 snap-start w-[300px] sm:w-[340px] lg:w-[360px] xl:w-[380px] flex flex-col bg-[#F3F3F1] overflow-hidden transition-all duration-300 hover:-translate-y-1 shadow-sm"
                            data-images="{{ json_encode($allPartImages) }}">
                            
                            {{-- Card Image with dots --}}
                            <div class="relative w-full aspect-[16/10] overflow-hidden shrink-0">
                                <img src="{{ $allPartImg }}" alt="Wealth Mansion Rentals"
                                    class="cwd-rental-card-img w-full h-full object-cover transition-all duration-500">
                                
                                <div class="cwd-rental-card-dots absolute bottom-3 left-1/2 -translate-x-1/2 z-10 flex items-center gap-1.5" aria-hidden="true">
                                    @foreach ($allPartImages as $i => $img)
                                        <span class="cwd-rental-card-dot rounded-full transition-all duration-300 h-2 w-2"
                                            style="background:{{ $i === 0 ? '#fff' : 'rgba(255,255,255,0.55)' }};"></span>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-5 sm:p-6 flex flex-col grow justify-between">
                                <div>
                                    {{-- Title & Mini Arrows --}}
                                    <div class="flex items-center justify-between gap-3 mb-4">
                                        <h3 class="text-[#2A5A8A] text-[16px] sm:text-[17px] font-bold">
                                            Wealth Mansion Rentals
                                        </h3>
                                        <div class="flex items-center gap-1.5 shrink-0">
                                            <button type="button" aria-label="Previous image"
                                                class="cwd-rental-prev w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button" aria-label="Next image"
                                                class="cwd-rental-next w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <h4 class="text-black text-[13.5px] sm:text-[14px] font-bold leading-snug mb-3">
                                        Flexible Condominium Rentals at Wealth Mansion
                                    </h4>

                                    <p class="text-black/75 text-[12.5px] sm:text-[13px] leading-relaxed mb-3">
                                        CWD Realty &amp; Hospitality offers professionally managed rental units at Wealth Mansion, with a range of layouts to suit short stays, business trips, family accommodation, and longer-term living.
                                    </p>

                                    <p class="text-black/75 text-[12.5px] sm:text-[13px] leading-relaxed mb-4">
                                        Whether you are looking for a compact studio or a spacious three-bedroom residence, guests can choose from different unit types based on their space requirements and length of stay.
                                    </p>

                                    <h5 class="text-black text-[13px] sm:text-[13.5px] font-bold mb-2">
                                        Available Rental Units
                                    </h5>

                                    <h6 class="text-[#2A5A8A] text-[13px] sm:text-[13.5px] font-bold mb-1.5">
                                        Studio
                                    </h6>

                                    <p class="text-black/75 text-[12.5px] sm:text-[13px] leading-relaxed mb-2">
                                        A practical choice for individuals and short-term stays.
                                    </p>

                                    <p class="text-black text-[12.5px] sm:text-[13px] font-bold mb-1">Ideal for:</p>
                                    <ul class="text-black/80 text-[12px] sm:text-[12.5px] leading-relaxed space-y-0.5 list-disc pl-4 mb-4">
                                        <li>Business travelers</li>
                                        <li>Solo travelers</li>
                                        <li>Couples</li>
                                        <li>Short-term residents</li>
                                    </ul>
                                </div>

                                <a href="{{ url('/properties') }}"
                                    class="inline-flex items-center gap-1.5 text-[#2A5A8A] text-[13px] sm:text-[13.5px] font-semibold hover:underline mt-auto pt-4">
                                    <span>View Available Studio Units</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </article>

                        {{-- Card 2: 1-bedroom --}}
                        <article class="cwd-rental-card shrink-0 snap-start w-[300px] sm:w-[340px] lg:w-[360px] xl:w-[380px] flex flex-col bg-[#F3F3F1] overflow-hidden transition-all duration-300 hover:-translate-y-1 shadow-sm"
                            data-images="{{ json_encode($bedroomImages) }}">
                            
                            {{-- Card Image with dots --}}
                            <div class="relative w-full aspect-[16/10] overflow-hidden shrink-0">
                                <img src="{{ $bedroomImg }}" alt="1-bedroom"
                                    class="cwd-rental-card-img w-full h-full object-cover transition-all duration-500">
                                
                                <div class="cwd-rental-card-dots absolute bottom-3 left-1/2 -translate-x-1/2 z-10 flex items-center gap-1.5" aria-hidden="true">
                                    @foreach ($bedroomImages as $i => $img)
                                        <span class="cwd-rental-card-dot rounded-full transition-all duration-300 h-2 w-2"
                                            style="background:{{ $i === 0 ? '#fff' : 'rgba(255,255,255,0.55)' }};"></span>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-5 sm:p-6 flex flex-col grow justify-between">
                                <div>
                                    {{-- Title & Mini Arrows --}}
                                    <div class="flex items-center justify-between gap-3 mb-4">
                                        <h3 class="text-[#2A5A8A] text-[16px] sm:text-[17px] font-bold">
                                            1-bedroom
                                        </h3>
                                        <div class="flex items-center gap-1.5 shrink-0">
                                            <button type="button" aria-label="Previous image"
                                                class="cwd-rental-prev w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button" aria-label="Next image"
                                                class="cwd-rental-next w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <h4 class="text-black text-[13.5px] sm:text-[14px] font-bold leading-snug mb-3">
                                        Comfortable private living for individuals and couples.
                                    </h4>

                                    <p class="text-black text-[12.5px] sm:text-[13px] font-bold mb-1">Ideal for:</p>
                                    <ul class="text-black/80 text-[12px] sm:text-[12.5px] leading-relaxed space-y-0.5 list-disc pl-4 mb-4">
                                        <li>Business professionals</li>
                                        <li>Couples</li>
                                        <li>Expatriates</li>
                                        <li>Longer stays</li>
                                    </ul>
                                </div>

                                <a href="{{ url('/properties') }}"
                                    class="inline-flex items-center gap-1.5 text-[#2A5A8A] text-[13px] sm:text-[13.5px] font-semibold hover:underline mt-auto pt-4">
                                    <span>View Available Studio Units</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </article>

                        {{-- Card 3: 2-Bedroom with Balcony --}}
                        <article class="cwd-rental-card shrink-0 snap-start w-[300px] sm:w-[340px] lg:w-[360px] xl:w-[380px] flex flex-col bg-[#F3F3F1] overflow-hidden transition-all duration-300 hover:-translate-y-1 shadow-sm"
                            data-images="{{ json_encode($bedroomImages) }}">
                            
                            {{-- Card Image with dots --}}
                            <div class="relative w-full aspect-[16/10] overflow-hidden shrink-0">
                                <img src="{{ $bedroomImg }}" alt="2-Bedroom with Balcony"
                                    class="cwd-rental-card-img w-full h-full object-cover transition-all duration-500">
                                
                                <div class="cwd-rental-card-dots absolute bottom-3 left-1/2 -translate-x-1/2 z-10 flex items-center gap-1.5" aria-hidden="true">
                                    @foreach ($bedroomImages as $i => $img)
                                        <span class="cwd-rental-card-dot rounded-full transition-all duration-300 h-2 w-2"
                                            style="background:{{ $i === 0 ? '#fff' : 'rgba(255,255,255,0.55)' }};"></span>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-5 sm:p-6 flex flex-col grow justify-between">
                                <div>
                                    {{-- Title & Mini Arrows --}}
                                    <div class="flex items-center justify-between gap-3 mb-4">
                                        <h3 class="text-[#2A5A8A] text-[16px] sm:text-[17px] font-bold">
                                            2-Bedroom with Balcony
                                        </h3>
                                        <div class="flex items-center gap-1.5 shrink-0">
                                            <button type="button" aria-label="Previous image"
                                                class="cwd-rental-prev w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button" aria-label="Next image"
                                                class="cwd-rental-next w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <h4 class="text-black text-[13.5px] sm:text-[14px] font-bold leading-snug mb-3">
                                        More space for families, colleagues, or guests requiring an additional bedroom.
                                    </h4>

                                    <p class="text-black text-[12.5px] sm:text-[13px] font-bold mb-1">Ideal for:</p>
                                    <ul class="text-black/80 text-[12px] sm:text-[12.5px] leading-relaxed space-y-0.5 list-disc pl-4 mb-4">
                                        <li>Small families</li>
                                        <li>Business colleagues</li>
                                        <li>Long-term residents</li>
                                        <li>Guests seeking additional living space</li>
                                    </ul>
                                </div>

                                <a href="{{ url('/properties') }}"
                                    class="inline-flex items-center gap-1.5 text-[#2A5A8A] text-[13px] sm:text-[13.5px] font-semibold hover:underline mt-auto pt-4">
                                    <span>View Available Studio Units</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </article>

                        {{-- Card 4: 3-Bedroom --}}
                        <article class="cwd-rental-card shrink-0 snap-start w-[300px] sm:w-[340px] lg:w-[360px] xl:w-[380px] flex flex-col bg-[#F3F3F1] overflow-hidden transition-all duration-300 hover:-translate-y-1 shadow-sm"
                            data-images="{{ json_encode($bedroomImages) }}">
                            
                            {{-- Card Image with dots --}}
                            <div class="relative w-full aspect-[16/10] overflow-hidden shrink-0">
                                <img src="{{ $bedroomImg }}" alt="3-Bedroom"
                                    class="cwd-rental-card-img w-full h-full object-cover transition-all duration-500">
                                
                                <div class="cwd-rental-card-dots absolute bottom-3 left-1/2 -translate-x-1/2 z-10 flex items-center gap-1.5" aria-hidden="true">
                                    @foreach ($bedroomImages as $i => $img)
                                        <span class="cwd-rental-card-dot rounded-full transition-all duration-300 h-2 w-2"
                                            style="background:{{ $i === 0 ? '#fff' : 'rgba(255,255,255,0.55)' }};"></span>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-5 sm:p-6 flex flex-col grow justify-between">
                                <div>
                                    {{-- Title & Mini Arrows --}}
                                    <div class="flex items-center justify-between gap-3 mb-4">
                                        <h3 class="text-[#2A5A8A] text-[16px] sm:text-[17px] font-bold">
                                            3-Bedroom
                                        </h3>
                                        <div class="flex items-center gap-1.5 shrink-0">
                                            <button type="button" aria-label="Previous image"
                                                class="cwd-rental-prev w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button" aria-label="Next image"
                                                class="cwd-rental-next w-7 h-7 rounded-full bg-white border border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer transition-all hover:bg-[#2A5A8A] hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <h4 class="text-black text-[13.5px] sm:text-[14px] font-bold leading-snug mb-3">
                                        Spacious accommodation for families and longer stays.
                                    </h4>

                                    <p class="text-black text-[12.5px] sm:text-[13px] font-bold mb-1">Ideal for:</p>
                                    <ul class="text-black/80 text-[12px] sm:text-[12.5px] leading-relaxed space-y-0.5 list-disc pl-4 mb-4">
                                        <li>Families</li>
                                        <li>Larger groups</li>
                                        <li>Long-term residents</li>
                                        <li>Guests who require multiple bedrooms</li>
                                    </ul>
                                </div>

                                <a href="{{ url('/properties') }}"
                                    class="inline-flex items-center gap-1.5 text-[#2A5A8A] text-[13px] sm:text-[13.5px] font-semibold hover:underline mt-auto pt-4">
                                    <span>View Available Studio Units</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </article>

                    </div>

                    {{-- Left & Right soft white blur edge indicators --}}
                    <div id="rentals-edge-left" class="cwd-rentals-edge cwd-rentals-edge-left" aria-hidden="true"></div>
                    <div id="rentals-edge-right" class="cwd-rentals-edge cwd-rentals-edge-right is-visible" aria-hidden="true"></div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .cwd-rentals-edge {
            position: absolute;
            top: 0;
            bottom: 16px;
            width: 100px;
            z-index: 25;
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .cwd-rentals-edge.is-visible {
            opacity: 1;
            visibility: visible;
        }

        .cwd-rentals-edge-left {
            left: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.6) 40%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, black 0%, black 40%, transparent 100%);
            mask-image: linear-gradient(to right, black 0%, black 40%, transparent 100%);
        }

        .cwd-rentals-edge-right {
            right: 0;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.6) 40%, transparent 100%);
            -webkit-mask-image: linear-gradient(to left, black 0%, black 40%, transparent 100%);
            mask-image: linear-gradient(to left, black 0%, black 40%, transparent 100%);
        }
    </style>

    {{-- Rental Options --}}
    <section class="relative w-full bg-white mt-12 sm:mt-16 md:mt-20 py-14 sm:py-20 md:py-28 overflow-hidden">
        {{-- Background image --}}
        <div class="absolute inset-0 z-0 pointer-events-none">
            <img src="{{ asset('services/propertis_leasing/bg_rental_option.png') }}" 
                 alt="Wealth Mansion Rental Options" 
                 class="w-full h-full object-cover object-center">
        </div>

        {{-- Left side warm gradient overlay matching screenshot --}}
        <div class="absolute inset-y-0 left-0 w-full sm:w-[60%] lg:w-[48%] bg-gradient-to-r from-[#e8cf99]/85 via-[#ecdaa8]/65 to-transparent pointer-events-none z-[1]"></div>

        <div class="relative z-10 max-w-[1440px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="grid grid-cols-1 xl:grid-cols-[340px_1fr] 2xl:grid-cols-[380px_1fr] gap-8 xl:gap-14 items-center">
                {{-- LEFT: heading and subtitle --}}
                <div class="max-w-[420px] xl:max-w-[360px]">
                    <h2 class="text-[#204a74] text-[clamp(30px,3.8vw,46px)] font-bold leading-[1.15] mb-4">
                        Rental Options
                    </h2>
                    <p class="text-[#204a74] text-[14px] sm:text-[15px] leading-relaxed">
                        Wealth Mansion units are available for different rental periods, depending on unit availability.
                    </p>
                </div>

                {{-- RIGHT: 3 Rental Option Cards (drops to 1 column below xl) --}}
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 items-stretch">
                    
                    {{-- Card 1: Daily Rental --}}
                    <div class="bg-[#2A5A8A] p-6 sm:p-7 flex flex-col justify-start text-white shadow-xl">
                        <h3 class="text-white text-[18px] sm:text-[19px] font-bold mb-3">
                            Daily Rental
                        </h3>
                        <p class="text-white text-[14px] sm:text-[15px] font-medium mb-3">
                            From $35/day
                        </p>
                        <p class="text-white/90 text-[13px] sm:text-[13.5px] leading-relaxed">
                            Suitable for short-term stays, business trips, and visitors to Phnom Penh.
                        </p>
                    </div>

                    {{-- Card 2: Monthly Rentals --}}
                    <div class="bg-[#2A5A8A] p-6 sm:p-7 flex flex-col justify-start text-white shadow-xl">
                        <h3 class="text-white text-[18px] sm:text-[19px] font-bold mb-3">
                            Monthly Rentals
                        </h3>
                        <p class="text-white/90 text-[13px] sm:text-[13.5px] leading-relaxed">
                            Flexible accommodation for guests staying several days or weeks.
                        </p>
                    </div>

                    {{-- Card 3: Monthly Rental --}}
                    <div class="bg-[#2A5A8A] p-6 sm:p-7 flex flex-col justify-start text-white shadow-xl">
                        <h3 class="text-white text-[18px] sm:text-[19px] font-bold mb-3">
                            Monthly Rental
                        </h3>
                        <p class="text-white text-[14px] sm:text-[15px] font-medium mb-3">
                            Approximately $400–$450/month
                        </p>
                        <p class="text-white/90 text-[13px] sm:text-[13.5px] leading-relaxed mb-4">
                            A more economical option for expatriates, professionals, and long-term residents.
                        </p>
                        <p class="text-white/80 text-[12px] sm:text-[12.5px] leading-relaxed">
                            Rental rates vary according to unit type, smoking preference, rental period, and availability. Contact CWD for the latest rate and available units.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @once
        <script>
            (function() {
                // Per-card mini image carousel
                function initRentalCardCarousel(card) {
                    const imgEl = card.querySelector(".cwd-rental-card-img");
                    const prevBtn = card.querySelector(".cwd-rental-prev");
                    const nextBtn = card.querySelector(".cwd-rental-next");
                    const dots = Array.from(card.querySelectorAll(".cwd-rental-card-dot"));
                    if (!imgEl || !prevBtn || !nextBtn) return;

                    let images = [];
                    try {
                        images = JSON.parse(card.dataset.images || "[]");
                    } catch (err) {
                        images = [];
                    }
                    if (images.length < 2) return;

                    let index = Math.max(0, images.indexOf(imgEl.getAttribute("src")));

                    function updateDots() {
                        dots.forEach((dot, i) => {
                            dot.style.background = (i === index) ? "#fff" : "rgba(255,255,255,0.55)";
                        });
                    }

                    function showImage(newIndex) {
                        index = (newIndex + images.length) % images.length;
                        imgEl.style.opacity = "0";
                        setTimeout(() => {
                            imgEl.setAttribute("src", images[index]);
                            imgEl.style.opacity = "1";
                        }, 250);
                        updateDots();
                    }

                    prevBtn.addEventListener("click", (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        showImage(index - 1);
                    });

                    nextBtn.addEventListener("click", (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        showImage(index + 1);
                    });
                }

                document.querySelectorAll(".cwd-rental-card").forEach(card => {
                    initRentalCardCarousel(card);
                });

                // Track scroll by step + dynamic white edge blur & button state
                const track = document.getElementById("rentals-track");
                const prevBtn = document.getElementById("rentals-prev-btn");
                const nextBtn = document.getElementById("rentals-next-btn");
                const edgeLeft = document.getElementById("rentals-edge-left");
                const edgeRight = document.getElementById("rentals-edge-right");
                if (!track) return;

                const cards = Array.from(track.querySelectorAll(".cwd-rental-card"));
                if (!cards.length) return;

                function step() {
                    const firstCard = cards[0];
                    const gap = 24; // gap-6
                    return (firstCard ? firstCard.getBoundingClientRect().width : 360) + gap;
                }

                function updateEdgesAndButtons() {
                    const atStart = track.scrollLeft <= 5;
                    const atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 10;

                    if (prevBtn) {
                        prevBtn.style.opacity = atStart ? "0.3" : "1";
                        prevBtn.style.pointerEvents = atStart ? "none" : "auto";
                    }
                    if (nextBtn) {
                        nextBtn.style.opacity = atEnd ? "0.3" : "1";
                        nextBtn.style.pointerEvents = atEnd ? "none" : "auto";
                    }
                    if (edgeLeft) {
                        edgeLeft.classList.toggle("is-visible", !atStart);
                    }
                    if (edgeRight) {
                        edgeRight.classList.toggle("is-visible", !atEnd);
                    }
                }

                if (prevBtn && nextBtn) {
                    prevBtn.addEventListener("click", () => {
                        track.scrollBy({ left: -step(), behavior: "smooth" });
                    });
                    nextBtn.addEventListener("click", () => {
                        track.scrollBy({ left: step(), behavior: "smooth" });
                    });
                }

                track.addEventListener("scroll", updateEdgesAndButtons, { passive: true });
                window.addEventListener("resize", updateEdgesAndButtons);
                updateEdgesAndButtons();
            })();
        </script>
    @endonce
@endsection
