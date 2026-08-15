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
                    <h2 class="flex flex-row items-center gap-4 text-[clamp(20px,3vw,30px)]  font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[rgb(244,222,172)]"></span>
                        <span class="text-[#F4DEAC] font-normal"><strong> Wealth Mansion</strong>
                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Professional Property Sales
                        for Buyers, Investors & Owners
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






    {{-- Maximize Your Property Investment --}}

    <section class="relative z-[300] bg-white overflow-x-clip">

        {{-- FULL-WIDTH IMAGE: breaks out of the max-w container to span the
     entire viewport width, edge-to-edge, regardless of where this
     section sits inside a wider layout. `overflow-x-clip` on the
     section (not `overflow-hidden`) stops this from creating a
     horizontal scrollbar while still allowing normal vertical
     overflow (shadows, etc.) elsewhere in the page. --}}
        <div class="max-w-[1600px] mx-auto py-16 max-[940px]:py-12">

            {{-- Text block: 60% width on desktop, full width on mobile.
             No `mx-auto` here — it stays flush against the left edge of
             the outer max-w container instead of being centered, so
             there's no extra space on the left at any breakpoint. --}}
            <div class="w-full lg:w-[60%]">
                <div class="flex flex-row items-start">
                    <div class="h-[2px] w-full bg-[#c9a463] mr-[2rem] mt-6"></div>

                    <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,38px)] font-normal leading-tight">
                        Modern condominium residences designed for comfortable living
                        and property investment
                        in Phnom Penh.
                    </h2>
                </div>
            </div>

        </div>

    </section>

    
    {{-- About [Property Name] --}}

    <section class="relative bg-white overflow-x-clip">

        <div class="relative w-screen left-1/2 right-1/2 -mx-[50vw]">

            {{-- Gold accent bar, aligned to the same container as "Modern condominium..." --}}
            <div class="max-w-[1600px] mx-auto">
                <div class="h-[15px] w-full max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            </div>

            {{-- Full-width navy block --}}
            <div class="bg-[#2A5A8A]">
                {{-- Container matches "Modern condominium residences..." above.
         On mobile/tablet the text stays centered inside this container;
         from lg breakpoint up, it's pushed ~20% of the container's
         width to the right. --}}
                <div class="max-w-[1600px] mx-auto">
                    <div class="max-w-[700px] mx-auto text-left lg:mx-0 lg:ml-[18%] lg:text-left px-[3rem] py-14 lg:py-20">

                        <h2 class="text-[clamp(28px,4vw,42px)] leading-tight mb-6">
                            <span class="text-[#F4DEAC] font-normal">About </span><span
                                class="text-[#F4DEAC] font-bold">Wealth
                                Mansion</span>
                        </h2>

                        <p class="text-white text-[15px] leading-relaxed mb-4">
                            Wealth Mansion is a residential condominium project offering a range of unit layouts designed
                            for different lifestyles and investment requirements.
                        </p>

                        <p class="text-white text-[15px] leading-relaxed">
                            CWD Realty &amp; Hospitality provides buyers with information about available unit types,
                            layouts,
                            pricing, and purchasing procedures to help them make informed property decisions.
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </section>

{{-- discover section --}}
    <x-detail_service_featured_project.discover_wealth_mansion.discover_wealth_mansion/>


     {{-- below discover section --}}
    <x-detail_service_featured_project.discover_wealth_mansion.properties_below_discovere/>


    {{-- auto move logo --}}
    <x-auto_move.auto_move />


    {{-- Compare Wealth Mansion Unit Types --}}
    @php
        $compareColumns = [
            [
                'heading' => 'Unit Type',
                'items' => ['Studio', '1 Bedroom', '2 Bedrooms', '3 Bedrooms'],
            ],
            [
                'heading' => 'Best For',
                'items' => ['Singles / Investors', 'Couples / Professionals', 'Small families', 'Families'],
            ],
            [
                'heading' => 'Key Feature',
                'items' => ['Compact living', 'Private bedroom', 'Additional space + balcony', 'Spacious layout'],
            ],
        ];
    @endphp

    <section class="relative w-full bg-white mt-12 sm:mt-20 md:mt-28 py-14 sm:py-20 md:py-28 overflow-hidden">
        {{-- Background image: ~80% width sticking to the right (original image, no overlays or blur) --}}
        <div class="absolute top-0 right-0 bottom-0 w-full lg:w-[80%] z-0 pointer-events-none">
            <img src="{{ asset('services/wealth_mansion/compare_wealth_mainsion/for_weatch_mansion.png') }}" 
                 alt="Wealth Mansion Interior" 
                 class="w-full h-full object-cover object-center lg:object-right">
        </div>

        <div class="relative z-10 max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="grid grid-cols-1 lg:grid-cols-[380px_1fr] gap-10 lg:gap-14 items-center">
                {{-- LEFT: heading --}}
                <div>
                    <h2 class="text-[#2A5A8A] text-[clamp(32px,4.2vw,48px)] leading-[1.15]">
                        <span class="font-normal block">Compare</span>
                        <span class="font-bold block">Wealth Mansion</span>
                        <span class="font-bold block">Unit Types</span>
                    </h2>
                </div>

                {{-- RIGHT: comparison columns --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-5">
                    @foreach ($compareColumns as $column)
                        <div class="bg-[#2A5A8A] px-6 py-6 md:px-7 md:py-8 shadow-xl">
                            <h3 class="text-[#F4DEAC] text-[17px] md:text-[18px] font-bold mb-3">
                                {{ $column['heading'] }}
                            </h3>
                            <div class="h-px bg-white/30 mb-4"></div>
                            <ul class="space-y-3">
                                @foreach ($column['items'] as $item)
                                    <li class="text-white text-[15px] leading-snug">
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Why Consider Wealth Mansion? --}}
    @php
        $whyConsiderFeatures = [
            [
                'number' => '01.',
                'title' => 'A Property Project with Golden Visa Eligibility',
                'description' => "Wealth Mansion offers an opportunity for eligible international investors to combine Cambodian property investment with a potential pathway to long-term residence through Cambodia's My 2nd Home (CM2H) program, commonly known as Cambodia's Golden Visa.",
                'linkText' => 'Property Management Services',
                'url' => url('/services/property-management'),
            ],
            [
                'number' => '02.',
                'title' => 'Multiple Unit Choices',
                'description' => 'Different layouts allow buyers to select a residence based on lifestyle and investment objectives.',
                'linkText' => 'Property Management Services',
                'url' => url('/services/property-management'),
            ],
            [
                'number' => '03.',
                'title' => 'Residential & Investment Potential',
                'description' => 'The range of unit sizes can accommodate both owner-occupiers and investors looking for rental opportunities.',
                'linkText' => 'Property Management Services',
                'url' => url('/services/property-management'),
            ],
            [
                'number' => '04.',
                'title' => 'Professional Property Support',
                'description' => 'CWD Realty & Hospitality can assist buyers with property information, viewing arrangements, and transaction coordination.',
                'linkText' => 'Property Management Services',
                'url' => url('/services/property-management'),
            ],
            [
                'number' => '05.',
                'title' => 'Property Management Support',
                'description' => 'For investors who intend to rent their unit, CWD can potentially provide property management and leasing services after purchase.',
                'linkText' => 'Property Management Services',
                'url' => url('/services/property-management'),
            ],
        ];
    @endphp

    <section class="relative px-4 sm:px-8 lg:px-14 z-[300] bg-white py-16 sm:py-24">
        <div class="max-w-[1400px] mx-auto">
            {{-- Heading --}}
            <h2 class="text-center text-[clamp(28px,4vw,44px)] leading-tight mb-12 sm:mb-16">
                <span class="text-[#2A5A8A] font-normal">Why Consider </span>
                <span class="text-[#2A5A8A] font-bold">Wealth Mansion?</span>
            </h2>

            {{-- 
                Responsive Layout:
                - Desktop (lg): 3 cards in row 1, 2 cards centered in row 2 (same width).
                - Tablet (md / sm): 2 columns, with 5th card centered on row 3.
                - Mobile: 1 column centered.
            --}}
            <div class="flex flex-wrap justify-center gap-6 sm:gap-7 items-stretch">
                @foreach ($whyConsiderFeatures as $feature)
                    <div class="why-consider-card w-full sm:w-[calc(50%-0.9rem)] lg:w-[calc(33.333%-1.2rem)] flex flex-col justify-between p-6 sm:p-7 md:p-8 bg-white border-[2px] border-[#4A88BE] shadow-sm hover:shadow-md transition-all duration-300">
                        <div>
                            <span class="text-[34px] sm:text-[38px] font-bold leading-none mb-2.5 block text-[#2A5A8A]">
                                {{ $feature['number'] }}
                            </span>
                            <h3 class="text-[15.5px] sm:text-[16.5px] font-bold text-[#2A5A8A] mb-3 leading-snug">
                                {{ $feature['title'] }}
                            </h3>
                            <p class="text-[13.5px] sm:text-[14px] leading-relaxed text-black/75">
                                {{ $feature['description'] }}
                            </p>
                        </div>
                        <a href="{{ $feature['url'] }}"
                            class="inline-flex items-center gap-2 pt-6 text-[13.5px] sm:text-[14px] font-medium text-[#2C78BA] hover:text-[#163049] group transition-colors duration-200 mt-auto">
                            <span>{{ $feature['linkText'] }}</span>
                            <span aria-hidden="true" class="transition-transform group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Facilities & Lifestyle --}}
    <section class="relative bg-white overflow-x-clip">
        <div class="relative w-screen left-1/2 right-1/2 -mx-[50vw]">
            {{-- Gold accent bar --}}
            <div class="max-w-[1600px] mx-auto">
                <div class="h-[15px] w-full max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            </div>

            {{-- Full-width navy block --}}
            <div class="bg-[#2A5A8A] py-16 lg:py-24">
                <div class="max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                        
                        {{-- LEFT: 3x2 photo grid with NO GAP and NO TEXT --}}
                        <div class="lg:col-span-7 grid grid-cols-3 gap-0 overflow-hidden shadow-2xl">
                            @php
                                $facilityPhotos = [
                                    asset('home/latest_activities/1img.png'),
                                    asset('home/latest_activities/2img.png'),
                                    asset('home/latest_activities/3img.png'),
                                    asset('home/latest_activities/4img.png'),
                                    asset('home/latest_activities/5img.png'),
                                    asset('home/latest_activities/6img.png'),
                                ];
                            @endphp
                            @foreach ($facilityPhotos as $photo)
                                <div class="relative w-full aspect-square overflow-hidden group bg-[#163049]">
                                    <img src="{{ $photo }}" alt="Wealth Mansion Facility"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                </div>
                            @endforeach
                        </div>

                        {{-- RIGHT: Facilities & Lifestyle info --}}
                        <div class="lg:col-span-5 text-left">
                            <h2 class="text-[#F4DEAC] text-[clamp(32px,4vw,50px)] font-normal leading-[1.15] mb-5">
                                Facilities &amp;<br>Lifestyle
                            </h2>

                            <p class="text-white text-[15px] leading-relaxed mb-4">
                                Use cards for verified facilities<br>such as:
                            </p>

                            <ul class="space-y-1.5 text-white/95 text-[14.5px] sm:text-[15px]">
                                <li class="flex items-center gap-2.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white shrink-0"></span>
                                    <span>Swimming Pool</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white shrink-0"></span>
                                    <span>Fitness Facilities</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white shrink-0"></span>
                                    <span>Security</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white shrink-0"></span>
                                    <span>Parking</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white shrink-0"></span>
                                    <span>Common Areas</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white shrink-0"></span>
                                    <span>Building Management</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Investment Opportunity --}}
    <section class="relative w-full bg-white py-16 lg:py-24">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                {{-- LEFT: Heading & Overview --}}
                <div class="lg:col-span-5">
                    <h2 class="text-[#2A5A8A] text-[clamp(32px,4.5vw,50px)] leading-[1.15] mb-6">
                        <span class="font-normal block">Investment</span>
                        <span class="font-bold block">Opportunity</span>
                    </h2>
                    <h3 class="text-black font-bold text-[14.5px] sm:text-[15px] mb-2 leading-snug">
                        Buying for Residence or Rental?
                    </h3>
                    <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed">
                        Wealth Mansion may appeal to<br class="hidden sm:inline"> two major buyer groups:
                    </p>
                </div>

                {{-- RIGHT: 2 Navy Feature Cards --}}
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                    {{-- Card 1: Home Buyers --}}
                    <div>
                        <div class="h-[6px] w-[110px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                        <div class="bg-[#2A5A8A] p-7 md:p-8 flex flex-col justify-between shadow-lg min-h-[220px]">
                            <div>
                                <h3 class="text-[#F4DEAC] text-[22px] sm:text-[24px] font-normal mb-3 leading-snug">
                                    Home Buyers
                                </h3>
                                <p class="text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed mb-6">
                                    For buyers looking for a condominium residence suitable for personal living.
                                </p>
                            </div>
                            <a href="{{ url('/services/property-sales') }}"
                                class="inline-flex items-center gap-1.5 text-white/90 hover:text-[#F4DEAC] text-[13.5px] sm:text-[14px] font-medium transition-colors mt-auto">
                                <span>Ask About Rental Management</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    {{-- Card 2: Property Investors --}}
                    <div>
                        <div class="h-[6px] w-[110px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                        <div class="bg-[#2A5A8A] p-7 md:p-8 flex flex-col justify-between shadow-lg min-h-[220px]">
                            <div>
                                <h3 class="text-[#F4DEAC] text-[22px] sm:text-[24px] font-normal mb-3 leading-snug">
                                    Property Investors
                                </h3>
                                <p class="text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed mb-6">
                                    For investors seeking residential property that can potentially be placed into CWD's rental management portfolio.
                                </p>
                            </div>
                            <a href="{{ url('/services/property-management') }}"
                                class="inline-flex items-center gap-1.5 text-white/90 hover:text-[#F4DEAC] text-[13.5px] sm:text-[14px] font-medium transition-colors mt-auto">
                                <span>Ask About Rental Management</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Property Availability --}}
    <section class="relative w-full bg-white py-14 lg:py-20 border-t border-gray-100">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                {{-- LEFT: Media Preview Showcase --}}
                <div class="lg:col-span-6">
                    <div class="relative bg-[#163049] overflow-hidden shadow-xl aspect-video sm:aspect-[16/10] flex items-center justify-center group">
                        <img src="{{ asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png') }}" 
                             alt="Wealth Mansion Building Preview" 
                             class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center p-6 text-center">
                            <div class="w-14 h-14 rounded-full bg-[#F4DEAC] text-[#163049] flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <span class="text-white text-[16px] font-bold tracking-wide uppercase">Wealth Mansion Tower</span>
                            <span class="text-[#F4DEAC] text-[13px] font-medium mt-1">45 Storeys • Waterfront Landmark</span>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Availability Specs & Inquiries --}}
                <div class="lg:col-span-6">
                    <h2 class="text-[#2A5A8A] text-[clamp(28px,4vw,40px)] leading-tight mb-2">
                        <span class="font-normal block">Property</span>
                        <span class="font-bold block">Availability</span>
                    </h2>
                    <p class="text-black/70 text-[14.5px] mb-6">
                        Wealth Mansion Unit Status &amp; Key Specifications Overview
                    </p>

                    <div class="divide-y divide-gray-200 border-y border-gray-200 mb-8">
                        <div class="py-3 flex justify-between items-center text-[14px]">
                            <span class="text-black/60 font-medium">Total Project Units</span>
                            <span class="text-[#2A5A8A] font-bold">1,184 Residential Units</span>
                        </div>
                        <div class="py-3 flex justify-between items-center text-[14px]">
                            <span class="text-black/60 font-medium">Building Height</span>
                            <span class="text-[#2A5A8A] font-bold">45 Storeys</span>
                        </div>
                        <div class="py-3 flex justify-between items-center text-[14px]">
                            <span class="text-black/60 font-medium">Ownership Structure</span>
                            <span class="text-[#2A5A8A] font-bold">Freehold Strata Title (Foreign 100%)</span>
                        </div>
                        <div class="py-3 flex justify-between items-center text-[14px]">
                            <span class="text-black/60 font-medium">Available Unit Types</span>
                            <span class="text-[#2A5A8A] font-bold">Studio, 1BR, 2BR, 3BR</span>
                        </div>
                        <div class="py-3 flex justify-between items-center text-[14px]">
                            <span class="text-black/60 font-medium">Handover Status</span>
                            <span class="text-[#2A5A8A] font-bold">Ready for Move-in &amp; Handover</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ url('/contact-us') }}"
                            class="inline-flex items-center gap-2 bg-[#2A5A8A] text-white px-7 py-3.5 text-[14.5px] font-semibold hover:bg-[#163049] transition-colors shadow-md">
                            <span>Request Price List &amp; Inventory</span>
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                        <a href="{{ url('/properties') }}"
                            class="inline-flex items-center gap-2 border-[2px] border-[#2A5A8A] text-[#2A5A8A] px-6 py-3 text-[14.5px] font-semibold hover:bg-[#2A5A8A] hover:text-white transition-colors">
                            <span>Browse Units</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Property Viewing Banner --}}
    <section class="relative w-full overflow-hidden bg-cover bg-right sm:bg-center py-20 lg:py-28"
        style="background-image: url('{{ asset('hero_section/hero_section.png') }}');">
        <div class="absolute inset-0 bg-[#0d2235]/40 backdrop-blur-[0.5px]"></div>

        <div class="relative z-10 max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="max-w-[620px]">
                {{-- Gold accent bar --}}
                <div class="h-[12px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                <div class="bg-[#163049]/90 backdrop-blur-md p-8 sm:p-10 shadow-2xl">
                    <h2 class="text-[#F4DEAC] text-[clamp(24px,3.5vw,36px)] font-bold leading-tight mb-2">
                        Property Viewing
                    </h2>
                    <h3 class="text-white text-[17px] sm:text-[19px] font-semibold mb-4">
                        Schedule a Private Showroom Tour
                    </h3>
                    <p class="text-white/90 text-[14.5px] leading-relaxed mb-8">
                        Experience Wealth Mansion firsthand. Contact our dedicated property specialists to arrange a personalized unit tour or live video consultation.
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ url('/contact-us') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[14px] sm:text-[15px] font-semibold px-6 py-3 hover:bg-[#F4DEAC] hover:text-[#163049] transition-colors">
                            Book a Viewing
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[2px] border-white/70 text-white text-[14px] sm:text-[15px] font-semibold px-6 py-3 hover:bg-white hover:text-[#163049] transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'What types of units are available at Wealth Mansion?',
                'answer' => 'Wealth Mansion features a selection of modern Studio, 1-Bedroom, 2-Bedroom with Balcony, and 3-Bedroom residences, thoughtfully planned for comfort, privacy, and long-term rental demand.',
            ],
            [
                'question' => 'Can foreign nationals purchase units with freehold ownership?',
                'answer' => 'Yes, foreign buyers can legally own condominium units at Wealth Mansion under 100% freehold Strata Title ownership from the 1st floor upward in accordance with Cambodian property laws.',
            ],
            [
                'question' => 'Can I buy a unit and have CWD manage it for rental leasing?',
                'answer' => 'Yes. CWD Realty & Hospitality provides complete end-to-end property management including tenant sourcing, leasing contracts, rent collection, routine maintenance, and monthly financial reports.',
            ],
            [
                'question' => 'What lifestyle amenities are provided for residents?',
                'answer' => 'Residents enjoy an infinity pool with river panoramas, modern fitness center, sky garden lounge, 24/7 security with CCTV, concierge services, and dedicated secure parking.',
            ],
            [
                'question' => 'What is the handover timeline and unit condition?',
                'answer' => 'Wealth Mansion is completed and ready for immediate handover and occupancy, with selected fully-fitted or furnished units available for immediate move-in or rental leasing.',
            ],
        ];

        $faqRight = [
            [
                'question' => 'What is the step-by-step purchasing procedure?',
                'answer' => 'The purchase procedure includes unit selection & reservation deposit, signing the Sales and Purchase Agreement (SPA), following the payment schedule, and title transfer with CWD legal support.',
            ],
            [
                'question' => 'Are flexible payment terms or financing options available?',
                'answer' => 'Yes, flexible stage payment schedules and bank loan assistance with recognized local and international partner banks are available for eligible buyers.',
            ],
            [
                'question' => 'Can I arrange a private site viewing or virtual video tour?',
                'answer' => 'Yes, our sales team arranges both on-site showroom walkthroughs and private virtual 360/video consultations for overseas investors and clients.',
            ],
            [
                'question' => 'What are the expected rental yields in Chroy Changvar?',
                'answer' => 'Chroy Changvar condominiums typically yield between 6% and 9% annually, benefiting from strong expatriate and professional tenant demand in a prime waterfront district.',
            ],
            [
                'question' => 'How can I check the latest unit pricing and availability?',
                'answer' => 'You can reach out to our property sales consultants via our website contact form, direct phone call, or email to receive the official up-to-date availability and price sheet.',
            ],
        ];
    @endphp

    <section class="relative px-0 sm:px-[5rem] bg-[#e5e4e4] py-16 sm:py-20">
        <div class="max-w-[1400px] mx-auto px-6">
            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
            </h2>

            {{-- Two-column accordion --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">
                {{-- Left column --}}
                <div class="faq-column flex flex-col gap-2.5">
                    @foreach ($faqLeft as $index => $faq)
                        <div class="faq-item bg-[#f3f3f3] shadow-sm">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-semibold">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-5 h-5 shrink-0 text-[#2A5A8A] transition-transform duration-200 {{ $index === 0 ? 'rotate-90' : '' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div class="faq-panel overflow-hidden transition-all duration-300 {{ $index === 0 ? 'max-h-[300px]' : 'max-h-0' }}">
                                <div class="{{ $index === 0 ? 'bg-[#1479B9]' : 'bg-white' }} px-5 py-4 sm:px-6 sm:py-5">
                                    <p class="{{ $index === 0 ? 'text-white' : 'text-black/75' }} text-[13.5px] sm:text-[14px] leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Right column --}}
                <div class="faq-column flex flex-col gap-2.5">
                    @foreach ($faqRight as $faq)
                        <div class="faq-item bg-[#f3f3f3] shadow-sm">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                                aria-expanded="false">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-semibold">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-5 h-5 shrink-0 text-[#2A5A8A] transition-transform duration-200"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div class="faq-panel overflow-hidden transition-all duration-300 max-h-0">
                                <div class="bg-white px-5 py-4 sm:px-6 sm:py-5">
                                    <p class="text-black/75 text-[13.5px] sm:text-[14px] leading-relaxed">
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

    {{-- Looking for your next stay / Find Your Wealth Mansion Residence --}}
    <section class="relative mt-[2rem] sm:mt-[5rem] max-w-[1600px] mx-auto pb-16">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty Wealth Mansion residences"
                class="w-full h-auto min-h-[220px] object-cover">

            <div class="relative max-w-[540px] mt-6 px-6 min-[900px]:ml-[-8rem] min-[900px]:mt-[-6.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(22px,5vw,40px)] font-bold leading-tight drop-shadow-md">
                    Find Your Wealth Mansion Residence
                </h2>
            </div>
        </div>

        <div class="max-w-[460px] mt-8 px-6 min-[900px]:ml-[calc(20%+2rem)] min-[900px]:mt-6 min-[900px]:px-0">
            <div class="h-[2px] w-24 bg-[#c9a463] mb-4"></div>
            <h3 class="text-[#2A5A8A] text-[18px] sm:text-[20px] font-bold leading-snug mb-3">
                Request Property Management &amp; Sales Consultation
            </h3>
            <p class="text-black/70 text-[14px] leading-relaxed mb-6">
                Connect with our specialized real estate team for tailored unit selections, financing guidance, and comprehensive property management services.
            </p>

            @php
                $links = [
                    ['label' => 'Property Leasing', 'url' => url('/services/property-sales'), 'active' => true],
                    ['label' => 'Hospitality Services', 'url' => url('/services/property-management'), 'active' => false],
                    ['label' => 'Property Listings', 'url' => url('/properties'), 'active' => false],
                    ['label' => 'Contact Us', 'url' => url('/contact-us'), 'active' => false],
                ];
            @endphp

            <nav class="flex flex-col divide-y divide-gray-200 border border-gray-200 shadow-sm">
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}"
                        class="group flex items-center justify-between px-5 py-3.5 text-[15px] font-medium bg-white text-[#2A5A8A] transition-colors hover:bg-[#2A5A8A] hover:text-[#DCC597]">
                        <span>{{ $link['label'] }}</span>
                        <span aria-hidden="true" class="text-[#2A5A8A] transition-all group-hover:text-[#DCC597] group-hover:translate-x-1">
                            &rarr;
                        </span>
                    </a>
                @endforeach
            </nav>
        </div>
    </section>

    <script>
        (function() {
            // Equalize Why Consider Card Heights
            function equalizeWhyConsiderCards() {
                const cards = document.querySelectorAll('.why-consider-card');
                if (!cards.length) return;
                cards.forEach(c => c.style.height = 'auto');
                if (window.innerWidth >= 768) {
                    let maxH = 0;
                    cards.forEach(c => {
                        const h = c.getBoundingClientRect().height;
                        if (h > maxH) maxH = h;
                    });
                    cards.forEach(c => c.style.height = maxH + 'px');
                }
            }

            // FAQ Accordion Logic
            document.querySelectorAll('.faq-toggle').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const item = btn.closest('.faq-item');
                    const panel = item.querySelector('.faq-panel');
                    const answerBox = panel.querySelector('div');
                    const answerText = answerBox.querySelector('p');
                    const arrow = btn.querySelector('.faq-arrow');
                    const isOpen = btn.getAttribute('aria-expanded') === 'true';

                    if (isOpen) {
                        panel.style.maxHeight = '0px';
                        btn.setAttribute('aria-expanded', 'false');
                        arrow.classList.remove('rotate-90');
                        answerBox.classList.remove('bg-[#1479B9]');
                        answerBox.classList.add('bg-white');
                        answerText.classList.remove('text-white');
                        answerText.classList.add('text-black/75');
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + 'px';
                        btn.setAttribute('aria-expanded', 'true');
                        arrow.classList.add('rotate-90');
                        answerBox.classList.add('bg-[#1479B9]');
                        answerBox.classList.remove('bg-white');
                        answerText.classList.add('text-white');
                        answerText.classList.remove('text-black/75');
                    }
                });
            });

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', equalizeWhyConsiderCards);
            } else {
                equalizeWhyConsiderCards();
            }

            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(equalizeWhyConsiderCards, 150);
            });
        })();
    </script>
@endsection
