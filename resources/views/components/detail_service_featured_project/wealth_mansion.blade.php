@extends('layouts.app')
@section('content')
    {{-- Hero image & content wrapper --}}
    <div class="relative w-full pt-[112px] min-[1161px]:pt-[120px]">
        {{-- Hero container: dynamic responsive height that shrinks on resize and caps max height --}}
        <div class="relative w-full h-[420px] sm:h-[460px] md:h-[500px] lg:h-[540px] xl:h-[580px] max-h-[600px] overflow-hidden">
            <img class="w-full h-full object-cover object-center"
                src="{{ asset('services/wealth_mansion/hero_img/wealth-mainson-recovered.png') }}" 
                alt="Wealth Mansion">

            {{-- Floating Hero Card Overlay --}}
            <div class="absolute inset-0 flex items-center z-10 pointer-events-none">
                <div class="w-full max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8">
                    {{-- Gold accent bar --}}
                    <div class="h-[12px] sm:h-[15px] max-w-[26rem] sm:max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
                    <div class="max-w-[580px] lg:max-w-[620px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                        <div class="px-0 py-5 sm:py-7 lg:py-8">
                            @if(!isset($heroSection) || $heroSection->show_tagline !== false)
                            <h2 class="flex flex-row items-center gap-3 sm:gap-4 text-[clamp(16px,2.2vw,26px)] font-bold mb-3 sm:mb-4">
                                <span class="h-[3px] w-10 sm:w-14 bg-[#F4DEAC]"></span>
                                @if(!empty($heroSection->tagline_html))
                                    <span class="text-[#F4DEAC] font-normal">{!! $heroSection->tagline_html !!}</span>
                                @else
                                    <span class="text-[#F4DEAC]">
                                        @if(($heroSection->tagline_box1_style ?? 'bold-gold') !== 'hidden' && !empty($heroSection->tagline_box1 ?? 'Wealth Mansion'))
                                            <span class="{{ ($heroSection->tagline_box1_style ?? 'bold-gold') === 'light-gold' ? 'font-normal' : 'font-bold' }}">{{ $heroSection->tagline_box1 ?? 'Wealth Mansion' }}</span>
                                        @endif
                                        @if(($heroSection->tagline_box2_style ?? 'light-gold') !== 'hidden' && !empty($heroSection->tagline_box2))
                                            <span class="{{ ($heroSection->tagline_box2_style ?? 'light-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }} ml-1">{{ $heroSection->tagline_box2 }}</span>
                                        @endif
                                    </span>
                                @endif
                            </h2>
                            @endif

                            <h1 class="text-white px-7 sm:px-10 text-[clamp(18px,2.4vw,28px)] font-semibold leading-tight mb-3 sm:mb-5">
                                {{ $heroSection->headline ?? 'Premium Condominiums for Sale in Phnom Penh' }}
                            </h1>

                            @if(!empty($heroSection->show_bullets) && !empty($heroSection->bullets) && is_array($heroSection->bullets))
                                @if(count($heroSection->bullets) === 1 && !str_starts_with($heroSection->bullets[0], '•'))
                                    <div class="text-[#F4DEAC] px-7 sm:px-10 text-[clamp(24px,3.5vw,42px)] font-light leading-tight mb-5 sm:mb-7 tracking-wide">
                                        {{ $heroSection->bullets[0] }}
                                    </div>
                                @else
                                    <div class="px-7 sm:px-10 flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-white/80 font-medium mb-5 sm:mb-7">
                                        @foreach($heroSection->bullets as $bullet)
                                            <span>• {{ $bullet }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            @endif

                            <div class="flex items-center px-7 sm:px-10 gap-3 sm:gap-4 pointer-events-auto flex-wrap">
                                @if(isset($heroSection->buttons) && is_array($heroSection->buttons) && count($heroSection->buttons) > 0)
                                    @foreach($heroSection->buttons as $btn)
                                        <a href="{{ url($btn['url'] ?? '#') }}"
                                            class="border-[2px] border-[#F4DEAC] text-white text-[12px] sm:text-[14px] font-medium px-3.5 sm:px-5 py-2 sm:py-2.5 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                            {{ $btn['text'] ?? $btn['label'] ?? 'Learn More' }}
                                        </a>
                                    @endforeach
                                @else
                                    <a href="{{ url('/properties') }}"
                                        class="border-[2px] border-[#F4DEAC] text-white text-[12px] sm:text-[14px] font-medium px-3.5 sm:px-5 py-2 sm:py-2.5 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                        Browse Properties
                                    </a>
                                    <a href="{{ url('/contact-us') }}"
                                        class="border-[2px] border-[#F4DEAC] text-white text-[12px] sm:text-[14px] font-medium px-3.5 sm:px-5 py-2 sm:py-2.5 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                        Contact Us
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









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
            <div class="w-full lg:w-[60%]" data-scroll-reveal="left">
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
            <div class="max-w-[1600px] mx-auto" data-scroll-reveal="left">
                <div class="h-[15px] w-full max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            </div>

            {{-- Full-width navy block --}}
            <div class="bg-[#2A5A8A]">
                {{-- Container matches "Modern condominium residences..." above.
         On mobile/tablet the text stays centered inside this container;
         from lg breakpoint up, it's pushed ~20% of the container's
         width to the right. --}}
                <div class="max-w-[1600px] mx-auto">
                    <div class="max-w-[700px] mx-auto text-left lg:mx-0 lg:ml-[18%] lg:text-left px-[3rem] py-14 lg:py-20" data-scroll-reveal="left">

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
    <x-detail_service_featured_project.discover_wealth_mansion.discover_wealth_mansion :discover-gallery="$discoverGallery ?? null" />


     {{-- below discover section --}}
    <x-detail_service_featured_project.discover_wealth_mansion.properties_below_discovere :unit-properties="$unitProperties ?? null" />


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
                <div data-scroll-reveal="left">
                    <h2 class="text-[#2A5A8A] text-[clamp(32px,4.2vw,48px)] leading-[1.15]">
                        <span class="font-normal block">Compare</span>
                        <span class="font-bold block">Wealth Mansion</span>
                        <span class="font-bold block">Unit Types</span>
                    </h2>
                </div>

                {{-- RIGHT: comparison columns --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-5" data-scroll-reveal="right">
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
            <h2 class="text-center text-[clamp(28px,4vw,44px)] leading-tight mb-12 sm:mb-16" data-scroll-reveal="left">
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
                @foreach ($whyConsiderFeatures as $index => $feature)
                    @php
                        $dir = ($index % 3 === 0) ? 'left' : (($index % 3 === 1) ? 'fade-up' : 'right');
                    @endphp
                    <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ ($index % 3) * 100 }}" class="why-consider-card w-full sm:w-[calc(50%-0.9rem)] lg:w-[calc(33.333%-1.2rem)] flex flex-col justify-between p-6 sm:p-7 md:p-8 bg-white border-[2px] border-[#4A88BE] shadow-sm hover:shadow-md transition-all duration-300">
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
                        <div class="lg:col-span-7 grid grid-cols-3 gap-0 overflow-hidden shadow-2xl" data-scroll-reveal="left">
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
                        <div class="lg:col-span-5 text-left" data-scroll-reveal="right">
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
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 xl:gap-20 items-center">
                
                {{-- LEFT: Heading & Overview --}}
                <div class="lg:col-span-5" data-scroll-reveal="left">
                    <h2 class="text-[#2A5A8A] text-[clamp(32px,4.5vw,50px)] leading-[1.1] mb-8">
                        <span class="font-normal block">Investment</span>
                        <span class="font-bold block">Opportunity</span>
                    </h2>
                    <h3 class="text-black font-bold text-[14.5px] sm:text-[15px] mb-2 leading-snug">
                        Buying for Residence or Rental?
                    </h3>
                    <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-snug">
                        Wealth Mansion may appeal to<br class="hidden sm:inline"> two major buyer groups:
                    </p>
                </div>

                {{-- RIGHT: 2 Navy Feature Cards --}}
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-3.5 items-stretch" data-scroll-reveal="right">
                    {{-- Card 1: Home Buyers --}}
                    <div class="flex flex-col h-full">
                        <div class="h-[8px] sm:h-[10px] w-[140px] sm:w-[150px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] shrink-0"></div>
                        <div class="bg-[#2A5A8A] p-7 sm:p-8 md:p-9 flex flex-col justify-between shadow-lg grow">
                            <div>
                                <h3 class="text-[#F4DEAC] text-[22px] sm:text-[25px] font-normal mb-3 leading-snug">
                                    Home Buyers
                                </h3>
                                <p class="text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed mb-8">
                                    For buyers looking for a condominium residence suitable for personal living.
                                </p>
                            </div>
                            <a href="{{ url('/contact-us') }}"
                                class="inline-flex items-center gap-1.5 text-white/90 hover:text-[#F4DEAC] text-[13.5px] sm:text-[14px] font-medium transition-colors mt-auto">
                                <span>Ask About Rental Management</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    {{-- Card 2: Property Investors --}}
                    <div class="flex flex-col h-full">
                        <div class="h-[8px] sm:h-[10px] w-[140px] sm:w-[150px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] shrink-0"></div>
                        <div class="bg-[#2A5A8A] p-7 sm:p-8 md:p-9 flex flex-col justify-between shadow-lg grow">
                            <div>
                                <h3 class="text-[#F4DEAC] text-[22px] sm:text-[25px] font-normal mb-3 leading-snug">
                                    Property Investors
                                </h3>
                                <p class="text-white/90 text-[13.5px] sm:text-[14px] leading-relaxed mb-8">
                                    For investors seeking residential property that can potentially be placed into CWD's rental management portfolio.
                                </p>
                            </div>
                            <a href="{{ url('/contact-us') }}"
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
    <section class="relative w-full bg-white py-16 lg:py-24">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 xl:gap-20 items-center">
                
                {{-- LEFT: Property Image with Top-Right Gold Accent Bar --}}
                <div class="lg:col-span-7" data-scroll-reveal="left">
                    <div class="h-[8px] sm:h-[10px] w-1/2 ml-auto bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    <div class="relative w-full aspect-[16/10] overflow-hidden shadow-xl bg-[#163049]">
                        <img src="{{ asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png') }}" 
                             alt="Wealth Mansion Property Availability" 
                             class="w-full h-full object-cover">
                    </div>
                </div>

                {{-- RIGHT: Availability Details --}}
                <div class="lg:col-span-5 text-left" data-scroll-reveal="right">
                    <h2 class="text-[#2A5A8A] text-[clamp(32px,4.5vw,50px)] leading-[1.1] mb-6">
                        <span class="font-normal block">Property</span>
                        <span class="font-bold block">Availability</span>
                    </h2>

                    <h3 class="text-[#1479B9] font-bold text-[16px] sm:text-[17px] mb-2 leading-snug">
                        Available Units
                    </h3>

                    <p class="text-black/80 text-[13.5px] sm:text-[14px] leading-relaxed mb-4">
                        Approximately 30% Available<br>
                        Availability can change as units are sold.
                    </p>

                    <p class="text-black/80 text-[13.5px] sm:text-[14px] mb-2 font-normal">
                        For the latest:
                    </p>

                    <ul class="space-y-1 text-black/80 text-[13.5px] sm:text-[14px] mb-6">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black/70 shrink-0"></span>
                            <span>Unit availability</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black/70 shrink-0"></span>
                            <span>Floor</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black/70 shrink-0"></span>
                            <span>Unit size</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black/70 shrink-0"></span>
                            <span>Orientation</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black/70 shrink-0"></span>
                            <span>Price</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-black/70 shrink-0"></span>
                            <span>Payment terms</span>
                        </li>
                    </ul>

                    <a href="{{ url('/contact-us') }}"
                        class="inline-flex items-center gap-1.5 text-[#1479B9] hover:text-[#163049] text-[13.5px] sm:text-[14px] font-medium transition-colors">
                        <span>Contact CWD Realty &amp; Hospitality</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>

            </div>
    </section>

    {{-- Property Viewing Banner --}}
    <section class="relative w-full overflow-hidden min-h-[380px] lg:h-[390px] flex items-center bg-[#0d2235]">
        {{-- Background Image --}}
        <img src="{{ asset('services/wealth_mansion/properties_viewing/properties_viewing.png') }}" 
             alt="Wealth Mansion Property Viewing" 
             class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none">

        <div class="relative z-10 w-full max-w-[1450px] mx-auto px-6 sm:px-10 lg:px-14 py-8 lg:py-0">
            <div class="max-w-[550px]" data-scroll-reveal="left">
                {{-- Gold accent bar --}}
                <div class="h-[7px] sm:h-[8px] w-[220px] sm:w-[250px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                <div class="bg-[#133352]/90 backdrop-blur-sm p-7 sm:p-8 md:p-9 shadow-2xl">
                    <h2 class="text-[clamp(28px,3.2vw,42px)] leading-tight mb-2.5">
                        <span class="text-[#F4DEAC] font-normal">Property </span>
                        <span class="text-[#F4DEAC] font-bold">Viewing</span>
                    </h2>

                    <h3 class="text-white font-bold text-[14px] sm:text-[15px] mb-2.5 leading-snug">
                        Visit Wealth Mansion
                    </h3>

                    <p class="text-white/90 text-[13px] sm:text-[13.5px] leading-relaxed mb-6">
                        Our team can arrange property viewings and provide information about available units.
                    </p>

                    <a href="{{ url('/contact-us') }}"
                        class="inline-flex items-center gap-1.5 text-[#F4DEAC] text-[13.5px] sm:text-[14px] font-bold hover:translate-x-1 transition-all group">
                        <span>Schedule a Property Viewing</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'What unit types are available at Wealth Mansion?',
                'answer' => 'The project offers studio, 1-bedroom, 2-bedroom with balcony, and 3-bedroom layouts.',
            ],
            [
                'question' => 'Is Wealth Mansion suitable for investment?',
                'answer' => 'CommingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Can CWD help manage my unit after purchase?',
                'answer' => 'CommingSoon',
            ],
            [
                'question' => 'Can I view the property before purchasing?',
                'answer' => 'CommingSoon',
            ],
        ];
    @endphp

    <section class="relative bg-[#f4f4f4] py-16 sm:py-24">
        <div class="max-w-[1450px] mx-auto px-6 sm:px-10 lg:px-14">
            {{-- Heading --}}
            <h2 class="text-[clamp(32px,4.5vw,50px)] leading-[1.1] mb-10 sm:mb-14" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
            </h2>

            {{-- Two-column accordion --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">
                {{-- Left column --}}
                <div class="faq-column flex flex-col gap-2.5" data-scroll-reveal="left">
                    @foreach ($faqLeft as $index => $faq)
                        <div class="faq-item bg-white shadow-sm overflow-hidden">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-4.5 bg-white cursor-pointer"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[14.5px] font-normal">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-3.5 h-3.5 shrink-0 text-[#2A5A8A] transition-transform duration-200 {{ $index === 0 ? 'rotate-90' : '' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div class="faq-panel overflow-hidden transition-all duration-300 {{ $index === 0 ? 'max-h-[300px]' : 'max-h-0' }}">
                                <div class="{{ $index === 0 ? 'bg-[#0B6FB8]' : 'bg-white' }} px-5 py-4 sm:px-6 sm:py-5">
                                    <p class="{{ $index === 0 ? 'text-white' : 'text-black/75' }} text-[13.5px] sm:text-[14px] leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Right column --}}
                <div class="faq-column flex flex-col gap-2.5" data-scroll-reveal="right" data-scroll-delay="100">
                    @foreach ($faqRight as $faq)
                        <div class="faq-item bg-white shadow-sm overflow-hidden">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-4.5 bg-white cursor-pointer"
                                aria-expanded="false">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[14.5px] font-normal">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-3.5 h-3.5 shrink-0 text-[#2A5A8A] transition-transform duration-200"
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

    {{-- Find Your Wealth Mansion Residence --}}
    <section class="relative mt-[4rem] sm:mt-[6rem] lg:mt-[8rem] max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty Wealth Mansion residences"
                class="w-full h-auto min-h-[260px] object-cover shadow-sm">

            <div class="relative max-w-[540px] mt-6 px-6 min-[900px]:ml-[-8rem] min-[900px]:mt-[-7.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(28px,4.5vw,50px)] font-bold leading-[1.15] drop-shadow-md">
                    Find Your<br>
                    Wealth Mansion<br>
                    Residence
                </h2>
            </div>
        </div>
    </section>

    {{-- Looking for a home or investment property in Phnom Penh? --}}
    <section class="mt-16 sm:mt-24 md:mt-32 pb-24">
        <div class="max-w-[1450px] mx-auto px-6 sm:px-10 lg:px-14">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10 lg:gap-14">

                {{-- Left: Accent line on the left + Content --}}
                <div class="flex items-start gap-4 sm:gap-6 lg:gap-8 max-w-[580px]" data-scroll-reveal="left">
                    <span class="h-[2px] w-20 sm:w-28 lg:w-36 shrink-0 bg-[#c9a15c] mt-3.5"></span>
                    <div class="flex flex-col items-start">
                        <h2 class="text-[#204a74] text-[clamp(20px,2.4vw,28px)] font-bold leading-tight mb-4">
                            Looking for a home or investment<br class="hidden sm:inline"> property in Phnom Penh?
                        </h2>
                        <p class="text-[#204a74] text-[14px] sm:text-[14.5px] leading-relaxed mb-6">
                            Let CWD Realty &amp; Hospitality help you find the right unit.
                        </p>
                        <div class="flex flex-col items-start gap-1.5">
                            <a href="{{ url('/properties') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] font-medium transition-all">
                                <span>View Available Units</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                            <a href="{{ url('/contact-us') }}"
                                class="inline-flex items-center gap-2 text-[#204a74] hover:bg-[#204a74] hover:text-[#ECCFA0] px-4 py-2 text-[14px] font-medium transition-all">
                                <span>Contact Sales Team</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: image --}}
                <div class="w-full lg:w-auto lg:shrink-0" data-scroll-reveal="right">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="CWD Realty professional properties"
                        class="w-full lg:w-[520px] xl:w-[580px] h-auto object-cover shadow-sm">
                </div>

            </div>
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
