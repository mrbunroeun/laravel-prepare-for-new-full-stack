@props(['discoverGallery' => null])

@php
    if (isset($discoverGallery) && $discoverGallery->count() > 0) {
        $discoverImages = $discoverGallery->map(function($item) {
            $img = $item->image;
            return (str_starts_with($img, 'http') || str_starts_with($img, 'storage/')) ? asset($img) : asset($img);
        })->toArray();
    } else {
        $discoverImages = [
            asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
            asset('services/wealth_mansion/hero_img/wealth-mainson-recovered.png'),
            asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
            asset('services/wealth_mansion/compare_wealth_mainsion/for_weatch_mansion.png'),
            asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
            asset('services/wealth_mansion/hero_img/wealth-mainson-recovered.png'),
            asset('services/wealth_mansion/compare_wealth_mainsion/for_weatch_mansion.png'),
        ];
    }
@endphp

{{-- "Discover Wealth Mansion" carousel. --}}

<section class="relative bg-white px-6 sm:px-10 lg:px-14 py-14 lg:py-20 overflow-x-clip">
    <div class="max-w-[1400px] mx-auto">

        {{-- Heading --}}
        <div class="mb-8 lg:mb-10" data-scroll-reveal="left">
            <h2 class="text-[#2A5A8A] text-[clamp(22px,3vw,30px)] leading-tight">
                <span class="font-normal block">Discover</span>
                <span class="font-bold block">Wealth Mansion</span>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row items-center lg:items-start gap-6 lg:gap-10">

            {{-- Navigation arrows: order-1 puts them above the track on mobile/tablet; lg:order-2 moves them to the right on desktop. --}}
            <div class="flex items-center justify-center gap-3 shrink-0 order-1 lg:order-2" data-scroll-reveal="fade-up">
                <button id="discover-carousel-prev" type="button" aria-label="Previous image"
                    class="w-11 h-11 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer
                    transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="discover-carousel-next" type="button" aria-label="Next image"
                    class="w-11 h-11 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer
                    transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            {{-- Height wrapper --}}
            <div id="discover-carousel-height-wrapper"
                data-scroll-reveal="right"
                class="w-full lg:flex-1 lg:w-[80%] mx-auto overflow-hidden transition-[height] duration-500 ease-in-out order-2 lg:order-1">

                {{-- Image track: scrollable with hidden scrollbars, showing 4 items in view --}}
                <div id="discover-carousel-track"
                    class="flex flex-row flex-nowrap items-start justify-start gap-3 sm:gap-4 lg:gap-5 min-w-0 w-full overflow-x-auto scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden pb-4">
                    @foreach ($discoverImages as $index => $image)
                        <button type="button"
                            data-base="w-[200px] sm:w-[220px] lg:w-[200px] xl:w-[210px] h-[200px] sm:h-[240px] lg:h-[250px] shrink-0 min-w-0 lg:self-start bg-[#d9d9d9]"
                            data-active-classes="w-[300px] sm:w-[360px] lg:w-[380px] xl:w-[400px] h-[320px] sm:h-[400px] lg:h-[450px] shrink-0 min-w-0 lg:self-start lg:-mt-4 bg-[#d9d9d9]"
                            class="discover-carousel-item relative overflow-hidden rounded-none
                            transition-all duration-500 ease-in-out cursor-pointer
                            focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                            {{ $index === 0 ? 'w-[300px] sm:w-[360px] lg:w-[380px] xl:w-[400px] h-[320px] sm:h-[400px] lg:h-[450px] shrink-0 min-w-0 lg:self-start lg:-mt-4 bg-[#d9d9d9]' : 'w-[200px] sm:w-[220px] lg:w-[200px] xl:w-[210px] h-[200px] sm:h-[240px] lg:h-[250px] shrink-0 min-w-0 lg:self-start bg-[#d9d9d9]' }}"
                            data-index="{{ $index }}" aria-label="Show image {{ $index + 1 }} as active"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                            <img src="{{ $image }}" alt="Wealth Mansion view {{ $index + 1 }}"
                                class="w-full h-full min-w-full min-h-full object-fill transition-transform duration-500 ease-in-out">
                        </button>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section>

<script>
    (function() {
        const wrapper = document.getElementById("discover-carousel-height-wrapper");
        const track = document.getElementById("discover-carousel-track");
        if (!wrapper || !track) return;

        const items = Array.from(track.querySelectorAll(".discover-carousel-item"));
        if (!items.length) return;

        const prevBtn = document.getElementById("discover-carousel-prev");
        const nextBtn = document.getElementById("discover-carousel-next");
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
    })();
</script>