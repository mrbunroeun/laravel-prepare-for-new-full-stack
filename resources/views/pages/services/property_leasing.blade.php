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
    @php
        $rentalProperties = [
            [
                'image' => asset('home/latest_activities/1img.png'),
                'title' => 'Wealth Mansion',
                'subtitle' => 'Premium Condominium Residences',
                'description' => 'Our daily and weekly rental options provide flexibility for guests who need comfortable accommodation without committing to a long-term lease..',
                'status' => '30% Available',
                'link' => url('/services/property-leasing/daily-weekly-rentals'),
            ],
            [
                'image' => asset('home/latest_activities/2img.png'),
                'title' => 'Condo Name 2',
                'subtitle' => 'Exclusive Residential Development',
                'description' => 'A private residential project featuring approximately 100 units, including penthouse residences.',
                'status' => 'Coming Soon',
                'link' => url('/services/property-leasing/daily-weekly-rentals'),
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Condo Name 3',
                'subtitle' => 'Residential Property Project',
                'description' => 'Explore the UC88 project and available residential opportunities through CWD Realty & Hospitality.',
                'status' => '30% Available',
                'link' => url('/services/property-leasing/daily-weekly-rentals'),
            ],
            [
                'image' => asset('home/latest_activities/4img.png'),
                'title' => 'Condo Name 4',
                'subtitle' => 'Modern Urban Living',
                'description' => 'Comfortable, fully serviced apartment residences designed for short-term visits and extended monthly stays.',
                'status' => '30% Available',
                'link' => url('/services/property-leasing/daily-weekly-rentals'),
            ],
            [
                'image' => asset('home/latest_activities/5img.png'),
                'title' => 'Condo Name 5',
                'subtitle' => 'Luxury Riverside Suites',
                'description' => 'Spacious units offering panoramic river views, premier amenities, and dedicated hospitality management.',
                'status' => 'Coming Soon',
                'link' => url('/services/property-leasing/daily-weekly-rentals'),
            ],
        ];
    @endphp

    <section class="relative w-full overflow-hidden z-[300] my-10 sm:my-16 py-12 lg:py-20">
        {{-- Background Image --}}
        <img src="{{ asset('services/property_sales/find professionally.png') }}" alt="Rental Options Background"
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-r from-black/40 via-black/15 to-transparent pointer-events-none"></div>

        {{-- Main Content --}}
        <div class="relative z-10 w-full max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <div class="flex flex-col lg:flex-row items-start gap-8 xl:gap-10">

                {{-- Left: Heading & Nav Arrows --}}
                <div class="flex flex-col justify-between pt-2 shrink-0 w-full lg:w-[240px] xl:w-[270px] lg:min-h-[300px]" data-scroll-reveal="left">
                    <div>
                        <h2 class="text-[#F4DEAC] text-[clamp(28px,2.8vw,42px)] font-normal leading-[1.18] mb-6">
                            Daily &amp; Weekly<br>
                            <span class="font-bold">Rentals</span>
                        </h2>
                    </div>

                    {{-- Navigation Arrows --}}
                    <div class="flex items-center gap-3 pt-2 lg:pt-8">
                        <button id="rental-options-prev" type="button" aria-label="Previous property"
                            class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] bg-white/5 sm:bg-transparent flex items-center justify-center cursor-pointer
                                transition-all duration-300 hover:bg-[#F4DEAC] hover:text-[#163049] hover:scale-105
                                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#F4DEAC] focus-visible:ring-offset-2
                                disabled:cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="rental-options-next" type="button" aria-label="Next property"
                            class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] bg-white/5 sm:bg-transparent flex items-center justify-center cursor-pointer
                                transition-all duration-300 hover:bg-[#F4DEAC] hover:text-[#163049] hover:scale-105
                                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#F4DEAC] focus-visible:ring-offset-2
                                disabled:cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Right: Horizontal Card Slider Track (Bleeds smoothly right, revealing 4th card slightly) --}}
                <div class="relative min-w-0 flex-1 w-full -mr-4 sm:-mr-6 lg:-mr-8 xl:-mr-12 overflow-hidden" data-scroll-reveal="right">
                    <div id="rental-options-track"
                        class="rental-fade-mask pointer-events-auto flex gap-5 overflow-x-auto scroll-smooth items-stretch pb-4
                            snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden pr-6 sm:pr-10 lg:pr-[120px]">

                        @foreach ($rentalProperties as $property)
                            <article
                                class="rental-option-card group shrink-0 snap-start flex flex-col
                                    w-[82vw] max-w-[310px] sm:w-[280px] lg:w-[285px] xl:w-[300px]
                                    bg-white rounded-none overflow-hidden cursor-pointer shadow-md
                                    transition-all duration-300 ease-out hover:-translate-y-1
                                    focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2"
                                data-link="{{ $property['link'] }}"
                                tabindex="0" role="link" aria-label="View details for {{ $property['title'] }}">

                                <div class="relative h-[180px] sm:h-[190px] w-full overflow-hidden shrink-0">
                                    <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}"
                                        class="rental-card-img w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                                </div>

                                <div class="px-5 py-5 sm:px-6 sm:py-6 flex flex-col grow">
                                    <h3 class="text-[#2A5A8A] text-[17px] xl:text-[18px] font-bold leading-snug mb-1.5">
                                        {{ $property['title'] }}
                                    </h3>

                                    <h4 class="text-black text-[14px] xl:text-[14.5px] font-bold leading-snug mb-2.5">
                                        {{ $property['subtitle'] }}
                                    </h4>

                                    <p class="text-black/70 text-[12.5px] xl:text-[13px] leading-relaxed mb-4 line-clamp-3">
                                        {{ $property['description'] }}
                                    </p>

                                    <p class="text-[#2A5A8A] text-[13.5px] font-bold mb-5">
                                        {{ $property['status'] }}
                                    </p>

                                    <a href="{{ $property['link'] }}"
                                        class="rental-card-link relative z-10 mt-auto text-[#2A5A8A] text-[13px] xl:text-[13.5px] font-semibold
                                            inline-flex items-center gap-1.5 w-max
                                            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2">
                                        <span class="border-b border-transparent group-hover:border-[#2A5A8A] transition-colors duration-300">View Project</span>
                                        <span aria-hidden="true" class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (min-width: 1024px) {
            .rental-fade-mask {
                -webkit-mask-image: linear-gradient(to right,
                        black 0%,
                        black calc(100% - 100px),
                        transparent 100%);
                mask-image: linear-gradient(to right,
                        black 0%,
                        black calc(100% - 100px),
                        transparent 100%);
                transition: -webkit-mask-image 0.2s ease, mask-image 0.2s ease;
            }
        }
    </style>

    @once
        <script>
            (function() {
                const track = document.getElementById("rental-options-track");
                const prevBtn = document.getElementById("rental-options-prev");
                const nextBtn = document.getElementById("rental-options-next");

                if (!track) return;

                const cards = Array.from(track.querySelectorAll(".rental-option-card"));
                let scrollTimer = null;

                function getCardOffset(idx) {
                    if (!cards[idx]) return 0;
                    return cards[idx].offsetLeft - track.offsetLeft;
                }

                function getCurrentIndex() {
                    const currentScroll = track.scrollLeft;
                    let closestIdx = 0;
                    let minDiff = Infinity;
                    cards.forEach((card, idx) => {
                        const offset = card.offsetLeft - track.offsetLeft;
                        const diff = Math.abs(offset - currentScroll);
                        if (diff < minDiff) {
                            minDiff = diff;
                            closestIdx = idx;
                        }
                    });
                    return closestIdx;
                }

                function scrollToCard(idx) {
                    if (idx < 0) idx = 0;
                    if (idx >= cards.length) idx = cards.length - 1;
                    track.scrollTo({
                        left: getCardOffset(idx),
                        behavior: "smooth"
                    });
                }

                function setButtons(atStart, atEnd) {
                    if (prevBtn) {
                        prevBtn.disabled = atStart;
                        prevBtn.style.opacity = atStart ? "0.35" : "1";
                        prevBtn.style.pointerEvents = atStart ? "none" : "auto";
                    }
                    if (nextBtn) {
                        nextBtn.disabled = atEnd;
                        nextBtn.style.opacity = atEnd ? "0.35" : "1";
                        nextBtn.style.pointerEvents = atEnd ? "none" : "auto";
                    }

                    // Update left and right edge fade masks dynamically
                    if (window.innerWidth >= 1024) {
                        const leftFade = atStart ? "black 0%" : "transparent 0%, black 50px";
                        const rightFade = atEnd ? "black 100%" : "black calc(100% - 100px), transparent 100%";
                        const mask = `linear-gradient(to right, ${leftFade}, ${rightFade})`;
                        track.style.webkitMaskImage = mask;
                        track.style.maskImage = mask;
                    } else {
                        track.style.webkitMaskImage = "none";
                        track.style.maskImage = "none";
                    }
                }

                function updateButtons() {
                    const atStart = track.scrollLeft <= 4;
                    const atEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 4;
                    setButtons(atStart, atEnd);
                }

                if (prevBtn) {
                    prevBtn.addEventListener("click", () => {
                        const cur = getCurrentIndex();
                        scrollToCard(Math.max(0, cur - 1));
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener("click", () => {
                        const cur = getCurrentIndex();
                        scrollToCard(Math.min(cards.length - 1, cur + 1));
                    });
                }

                track.addEventListener("scroll", () => {
                    clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(updateButtons, 40);
                }, { passive: true });

                cards.forEach((card) => {
                    card.addEventListener("click", (e) => {
                        if (e.target.closest("a")) return;
                        const link = card.dataset.link;
                        if (link) window.location.href = link;
                    });

                    card.addEventListener("keydown", (e) => {
                        if (e.key === "Enter" || e.key === " ") {
                            if (e.target.closest("a")) return;
                            e.preventDefault();
                            const link = card.dataset.link;
                            if (link) window.location.href = link;
                        }
                    });
                });

                function equalizeCardHeights() {
                    if (!cards.length) return;
                    cards.forEach(c => c.style.height = "auto");
                    let maxH = 0;
                    cards.forEach(c => {
                        const h = c.getBoundingClientRect().height;
                        if (h > maxH) maxH = h;
                    });
                    if (maxH > 0) {
                        cards.forEach(c => c.style.height = maxH + "px");
                    }
                    updateButtons();
                }

                window.addEventListener("load", equalizeCardHeights);
                window.addEventListener("resize", equalizeCardHeights);
                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeCardHeights);
                }
                equalizeCardHeights();
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
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12 text-left" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Additional</span>
                <span class="text-[#2A5A8A] font-bold block">Hospitality Services</span>
            </h2>

            {{-- 2 Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-stretch">

                {{-- Card 1: Airport Pick-Up --}}
                <div class="flex flex-col" data-scroll-reveal="left">
                    {{-- Gold accent bar on top (outside) --}}
                    <div class="h-[10px] w-[300px] max-w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="bg-[#2A5A8A] shadow-md p-8 sm:p-10 flex flex-col flex-1">
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
                <div class="flex flex-col" data-scroll-reveal="right" data-scroll-delay="100">
                    {{-- Gold accent bar on top (outside) --}}
                    <div class="h-[10px] w-[300px] max-w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="bg-[#2A5A8A] shadow-md p-8 sm:p-10 flex flex-col flex-1">
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

    {{-- Who Is Our Property Leasing Service For? --}}
    @php
        $targetAudiences = [
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/business travelers.svg'),
                'title' => 'Business Travelers',
                'description' => 'Flexible accommodation for short business trips, meetings, and assignments.',
            ],
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/expatriates.svg'),
                'title' => 'Expatriates',
                'description' => 'Comfortable weekly and monthly accommodation for professionals living or working in Cambodia.',
            ],
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/tourists.svg'),
                'title' => 'Tourists',
                'description' => 'Convenient residential accommodation for visitors looking for more than a traditional hotel stay.',
            ],
            [
                'icon' => asset('services/propertis_leasing/who_is_our_property/long-term residents.svg'),
                'title' => 'Long-Term Residents',
                'description' => 'Monthly rental options for people who need a comfortable home while living in Phnom Penh.',
            ],
        ];
    @endphp

    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white pb-16 sm:pb-24 overflow-x-clip">
        <div class="max-w-[1400px] mx-auto px-6">
            <div class="flex flex-col">

                {{-- Blue box: Full width on mobile/tablet, stretching to the right edge on desktop --}}
                <div class="relative bg-[#2A5A8A] shadow-2xl w-full lg:w-[100vw]">
                    {{-- Inner Content Container with responsive padding --}}
                    <div class="w-full lg:max-w-[1400px] px-6 sm:px-10 md:px-14 lg:px-16 xl:px-20 py-10 sm:py-14 md:py-16 lg:py-20">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-10 lg:gap-14 xl:gap-18 items-center">

                            {{-- Left: Heading --}}
                            <div class="lg:col-span-5" data-scroll-reveal="left">
                                <h2 class="text-[#F4DEAC] text-[clamp(26px,3.5vw,44px)] font-normal leading-[1.2]">
                                    <span class="block">Who Is Our</span>
                                    <span class="block">Property Leasing</span>
                                    <span class="block">Service For?</span>
                                </h2>
                            </div>

                            {{-- Right: 4 Audience Items in Vertical List --}}
                            <div class="lg:col-span-7 flex flex-col gap-6 sm:gap-7" data-scroll-reveal="right">
                                @foreach ($targetAudiences as $item)
                                    <div class="flex items-start gap-4 sm:gap-5">
                                        {{-- Icon Container --}}
                                        <div class="w-9 h-9 sm:w-11 sm:h-11 shrink-0 flex items-center justify-center pt-0.5">
                                            <img src="{{ $item['icon'] }}" alt="{{ $item['title'] }}"
                                                class="max-w-full max-h-full object-contain">
                                        </div>

                                        {{-- Text --}}
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-[#F4DEAC] text-[15.5px] sm:text-[17px] font-bold leading-snug mb-1">
                                                {{ $item['title'] }}
                                            </h3>
                                            <p class="text-white/90 text-[13px] sm:text-[14px] leading-relaxed font-light break-words">
                                                {{ $item['description'] }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Gold Accent Bar underneath the blue box (outside, aligned to left edge, 650px width) --}}
                <div class="h-[12px] sm:h-[13px] md:h-[14px] w-[650px] max-w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>

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
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="Looking for Flexible Accommodation in Cambodia"
                        class="w-full lg:w-[520px] xl:w-[580px] h-auto object-cover shadow-sm">
                </div>

            </div>
        </div>
    </section>

@endsection
