@extends('layouts.app')
@section('content')
    {{-- Hero image & content wrapper --}}
    <div class="relative w-full pt-[112px] min-[1161px]:pt-[120px]">
        {{-- Hero container: dynamic responsive height that shrinks on resize and caps max height --}}
        <div class="relative w-full h-[420px] sm:h-[460px] md:h-[500px] lg:h-[540px] xl:h-[580px] max-h-[600px] overflow-hidden">
            <img class="w-full h-full object-cover object-center"
                src="{{ asset('services/propertis_leasing/all part.png') }}" 
                alt="2-Bedroom with Balcony - Wealth Mansion">

            {{-- Floating Hero Card Overlay --}}
            <div class="absolute inset-0 flex items-center z-10 pointer-events-none">
                <div class="w-full max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8">
                    {{-- Gold accent bar --}}
                    <div class="h-[12px] sm:h-[15px] max-w-[26rem] sm:max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
                    <div class="max-w-[620px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                        <div class="px-0 py-6 sm:py-8 lg:py-10">
                            <h2 class="flex flex-row items-center gap-3 sm:gap-4 text-[clamp(16px,2.2vw,24px)] font-normal mb-3 sm:mb-4">
                                <span class="h-[2px] w-10 sm:w-14 bg-[#F4DEAC]"></span>
                                <span class="text-[#F4DEAC] font-normal">Daily &amp; Weekly Rentals</span>
                            </h2>

                            <h1 class="text-white px-7 sm:px-10 text-[clamp(28px,3.8vw,46px)] font-bold leading-tight mb-3 sm:mb-4">
                                2-Bedroom with Balcony
                            </h1>

                            <div class="text-white/95 px-7 sm:px-10 text-[clamp(14px,1.8vw,16px)] font-normal leading-relaxed">
                                Flexible Condominium Rentals at<br>
                                Wealth Mansion
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Blue Banner Section --}}
    <section class="relative w-full bg-[#2A5A8A] z-[10] h-[200px] sm:h-[240px] lg:h-[280px]">
    </section>

    @php
        $discoverImages = [
            asset('services/propertis_leasing/all part.png'),
            asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
            asset('services/propertis_leasing/available rental units/detail_img/hero_section.png'),
            asset('services/propertis_leasing/bedroom.png'),
            asset('services/wealth_mansion/hero_img/wealth-mainson-recovered.png'),
            asset('services/propertis_leasing/available rental units/detail_img/hero_section.png'),
            asset('services/propertis_leasing/bedroom.png'),
        ];
    @endphp

    {{-- Flexible Condominium Rentals at Wealth Mansion Section --}}
    <section class="relative z-[30] bg-transparent px-6 sm:px-10 lg:px-14 pb-16 lg:pb-24 -mt-[140px] sm:-mt-[170px] lg:-mt-[200px] overflow-x-clip">
        <div class="max-w-[1400px] mx-auto">

            {{-- Top Row on Desktop: Carousel Track on the Left, Nav Arrows on the Right --}}
            <div class="flex flex-col lg:flex-row items-center lg:items-start justify-between gap-6 lg:gap-10">

                {{-- Image Carousel Wrapper --}}
                <div id="bedroom2-carousel-height-wrapper"
                    data-scroll-reveal="right"
                    class="w-full lg:flex-1 lg:max-w-[75%] overflow-hidden transition-[height] duration-500 ease-in-out order-2 lg:order-1">

                    {{-- Image Track: scrollable with hidden scrollbars, showing 4 items in view --}}
                    <div id="bedroom2-carousel-track"
                        class="flex flex-row flex-nowrap items-start justify-start gap-3 sm:gap-4 lg:gap-5 min-w-0 w-full overflow-x-auto scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden pb-4">
                        @foreach ($discoverImages as $index => $image)
                            <button type="button"
                                data-base="w-[200px] sm:w-[220px] lg:w-[200px] xl:w-[210px] h-[200px] sm:h-[240px] lg:h-[250px] shrink-0 min-w-0 lg:self-start bg-[#d9d9d9]"
                                data-active-classes="w-[300px] sm:w-[360px] lg:w-[380px] xl:w-[400px] h-[320px] sm:h-[400px] lg:h-[450px] shrink-0 min-w-0 lg:self-start lg:-mt-4 bg-[#d9d9d9]"
                                class="bedroom2-carousel-item relative overflow-hidden rounded-none shadow-md
                                transition-all duration-500 ease-in-out cursor-pointer
                                focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                                {{ $index === 0 ? 'w-[300px] sm:w-[360px] lg:w-[380px] xl:w-[400px] h-[320px] sm:h-[400px] lg:h-[450px] shrink-0 min-w-0 lg:self-start lg:-mt-4 bg-[#d9d9d9]' : 'w-[200px] sm:w-[220px] lg:w-[200px] xl:w-[210px] h-[200px] sm:h-[240px] lg:h-[250px] shrink-0 min-w-0 lg:self-start bg-[#d9d9d9]' }}"
                                data-index="{{ $index }}" aria-label="Show image {{ $index + 1 }} as active"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                                <img src="{{ $image }}" alt="Wealth Mansion 2-Bedroom view {{ $index + 1 }}"
                                    class="w-full h-full object-cover object-center transition-transform duration-500 ease-in-out">
                            </button>
                        @endforeach
                    </div>

                </div>

                {{-- Right Navigation Arrows & Title Area --}}
                <div class="flex flex-col items-end lg:items-start shrink-0 w-full lg:w-auto lg:max-w-[280px] xl:max-w-[340px] order-1 lg:order-2 pt-[150px] sm:pt-[185px] lg:pt-[220px] xl:pt-[230px]" data-scroll-reveal="left">
                    {{-- Nav Buttons --}}
                    <div class="flex items-center gap-3 mb-6 sm:mb-8 lg:mb-10 self-end lg:self-start">
                        <button id="bedroom2-carousel-prev" type="button" aria-label="Previous image"
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] bg-white flex items-center justify-center cursor-pointer
                            transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105 shadow-sm
                            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="bedroom2-carousel-next" type="button" aria-label="Next image"
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] bg-white flex items-center justify-center cursor-pointer
                            transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105 shadow-sm
                            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    {{-- Title with Gold Accent Line --}}
                    <div class="mt-2 sm:mt-4 lg:mt-4 w-full">
                        <h2 class="text-[#2A5A8A] text-[clamp(24px,2.8vw,36px)] font-bold leading-[1.2]">
                            <span class="flex items-center gap-3">
                                Flexible Condominium
                                <span class="h-[2px] w-12 sm:w-16 bg-[#c9a463] inline-block shrink-0"></span>
                            </span>
                            Rentals at Wealth<br>
                            Mansion
                        </h2>
                    </div>
                </div>

            </div>

            {{-- Bottom Subtext on the Left --}}
            <div class="max-w-[460px] mt-8 sm:mt-10" data-scroll-reveal="left">
                <p class="text-black/80 text-[13.5px] sm:text-[14.5px] leading-relaxed">
                    Whether you are looking for a compact studio or a spacious three-bedroom residence, guests can choose from different unit types based on their space requirements and length of stay.
                </p>
            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function initBedroom2Carousel() {
                    const wrapper = document.getElementById("bedroom2-carousel-height-wrapper");
                    const track = document.getElementById("bedroom2-carousel-track");
                    if (!wrapper || !track) return;

                    const items = Array.from(track.querySelectorAll(".bedroom2-carousel-item"));
                    if (!items.length) return;

                    const prevBtn = document.getElementById("bedroom2-carousel-prev");
                    const nextBtn = document.getElementById("bedroom2-carousel-next");
                    const images = Array.from(track.querySelectorAll("img"));

                    const itemClassSets = items.map((item) => ({
                        base: item.dataset.base.split(/\s+/).filter(Boolean),
                        active: item.dataset.activeClasses.split(/\s+/).filter(Boolean),
                    }));

                    let activeIndex = 0; // Default active to the 1st left image

                    function setWrapperHeight(instant = false) {
                        const height = track.getBoundingClientRect().height;
                        if (instant) {
                            const prevTransition = wrapper.style.transition;
                            wrapper.style.transition = "none";
                            wrapper.style.height = height + "px";
                            void wrapper.offsetHeight;
                            wrapper.style.transition = prevTransition;
                        } else {
                            wrapper.style.height = height + "px";
                        }
                    }

                    function scrollActiveIntoView() {
                        const activeItem = items[activeIndex];
                        if (activeItem && track) {
                            const trackWidth = track.clientWidth;
                            const itemLeft = activeItem.offsetLeft - track.offsetLeft;
                            const itemWidth = activeItem.offsetWidth;
                            let targetScroll = itemLeft - (trackWidth - itemWidth) / 4;
                            if (targetScroll < 0) targetScroll = 0;
                            if (targetScroll > track.scrollWidth - trackWidth) targetScroll = track.scrollWidth - trackWidth;
                            track.scrollTo({ left: targetScroll, behavior: "smooth" });
                        }
                    }

                    function updateWrapperHeightAfterChange() {
                        requestAnimationFrame(() => {
                            requestAnimationFrame(() => {
                                setWrapperHeight(false);
                                scrollActiveIntoView();
                            });
                        });
                    }

                    function render() {
                        items.forEach((item, index) => {
                            const { base, active } = itemClassSets[index];
                            const isActive = index === activeIndex;
                            item.classList.remove(...(isActive ? base : active));
                            item.classList.add(...(isActive ? active : base));
                            item.setAttribute("aria-current", isActive ? "true" : "false");
                        });
                        updateWrapperHeightAfterChange();
                    }

                    function goTo(index) {
                        const total = items.length;
                        activeIndex = (index + total) % total; // Loops continuously in both directions
                        render();
                    }

                    prevBtn && prevBtn.addEventListener("click", () => goTo(activeIndex - 1));
                    nextBtn && nextBtn.addEventListener("click", () => goTo(activeIndex + 1));

                    items.forEach((item, index) => {
                        item.addEventListener("click", () => goTo(index));
                    });

                    render();
                    setWrapperHeight(true);

                    images.forEach((img) => {
                        if (img.complete) {
                            setWrapperHeight(true);
                        } else {
                            img.addEventListener("load", () => setWrapperHeight(true));
                        }
                    });

                    let resizeRaf = null;
                    window.addEventListener("resize", () => {
                        if (resizeRaf) cancelAnimationFrame(resizeRaf);
                        resizeRaf = requestAnimationFrame(() => setWrapperHeight(true));
                    });
                }

                if (document.readyState === "loading") {
                    document.addEventListener("DOMContentLoaded", initBedroom2Carousel);
                } else {
                    initBedroom2Carousel();
                }
            })();
        </script>
    @endonce
    
    {{-- auto move logo --}}
    <x-auto_move.auto_move />


    
    {{-- Comments Section --}}
    <x-comments.comments />


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
