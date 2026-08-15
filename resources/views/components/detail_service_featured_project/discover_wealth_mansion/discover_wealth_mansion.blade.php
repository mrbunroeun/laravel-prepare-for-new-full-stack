@php
    // Replace these with your actual existing image paths — keep the
    // same 4 images you already use for this section.
    $discoverImages = [
        asset('discover/wealth_mansion_1.png'),
        asset('discover/wealth_mansion_2.png'),
        asset('discover/wealth_mansion_3.png'),
        asset('discover/wealth_mansion_4.png'),
    ];
@endphp

{{-- "Discover Wealth Mansion" carousel. --}}

<section class="relative bg-white px-6 sm:px-10 lg:px-14 py-14 lg:py-20 overflow-x-clip">
    <div class="max-w-[1400px] mx-auto">

        {{-- Heading --}}
        <div class="mb-8 lg:mb-10">
            <p class="text-[#2A5A8A] text-[15px] font-normal mb-1">Discover</p>
            <h2 class="text-[#2A5A8A] text-[clamp(24px,3vw,32px)] font-bold">Wealth Mansion</h2>
        </div>

        {{-- Mobile/tablet: column layout, arrows on top, small centered
             stack below (drops to 1 column). Desktop (lg+): row layout,
             track on the left, arrows on the right, top-aligned so growth
             pushes downward only. --}}
        <div class="flex flex-col lg:flex-row items-center lg:items-start gap-6 lg:gap-10">

            {{-- Navigation arrows: order-1 puts them above the track on
                 mobile; lg:order-2 moves them to the right on desktop. --}}
            <div class="flex items-center justify-center gap-3 shrink-0 order-1 lg:order-2">
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

            {{-- Height wrapper: JS sets a real pixel height here so anything
                 below the carousel is pushed down/up by actual document
                 flow when the active image scales. order-2 keeps it below
                 the arrows on mobile; lg:order-1 puts it on the left on
                 desktop. --}}
            <div id="discover-carousel-height-wrapper"
                class="w-full lg:flex-1 lg:w-[80%] mx-auto overflow-hidden transition-[height] duration-500 ease-in-out order-2 lg:order-1">

                {{-- Image group: small centered stack, single column, on
                     mobile/tablet; single row of 4 on desktop. Images never
                     change order — only size. On mobile the resting size is
                     small, and the active image jumps to a much larger size. --}}
                <div id="discover-carousel-track"
                    class="flex flex-col lg:flex-row lg:flex-nowrap items-center lg:items-start justify-center gap-3 sm:gap-4 lg:gap-5 min-w-0">
                    @foreach ($discoverImages as $index => $image)
                        <button type="button"
                            class="discover-carousel-item relative shrink-0 overflow-hidden bg-gray-100 rounded-none
                            transition-all duration-500 ease-in-out
                            focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                            {{ $index === 0 ? 'is-active' : '' }}"
                            data-index="{{ $index }}" aria-label="Show image {{ $index + 1 }} as active"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                            <img src="{{ $image }}" alt="Wealth Mansion view {{ $index + 1 }}"
                                class="w-full h-full object-cover transition-transform duration-500 ease-in-out">
                        </button>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section>

<style>
    /* --- Mobile / tablet (below lg): small resting thumbnails, single
       column. Clicking one makes it jump to a much bigger size — a big
       visible size difference, not a subtle nudge. --}}
    */
    .discover-carousel-item {
        width: clamp(90px, 28vw, 130px);
        height: clamp(70px, 22vw, 100px);
    }

    .discover-carousel-item.is-active {
        width: clamp(220px, 85vw, 320px);
        height: clamp(180px, 68vw, 260px);
    }

    /* --- Desktop (lg+): original single-row-of-4 layout, top-aligned,
       active image growing width+height in place. --}}
    */
    @media (min-width: 1024px) {
        .discover-carousel-item {
            width: clamp(130px, 16vw, 212px);
            height: clamp(150px, 18vw, 246px);
        }

        .discover-carousel-item.is-active {
            width: clamp(260px, 32vw, 424px);
            height: clamp(280px, 34vw, 445px);
        }
    }
</style>

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

        let activeIndex = items.findIndex(item => item.classList.contains("is-active"));
        if (activeIndex === -1) activeIndex = 0;

        // --- Real height-following logic -----------------------------------

        // Measures the TRACK's own rendered height (not just the active
        // item) so this works whether images are laid out as a single row
        // (desktop) or stacked in one column (mobile).
        function setWrapperHeight(instant = false) {
            const height = track.getBoundingClientRect().height;

            if (instant) {
                const prevTransition = wrapper.style.transition;
                wrapper.style.transition = "none";
                wrapper.style.height = height + "px";
                void wrapper.offsetHeight; // force reflow
                wrapper.style.transition = prevTransition;
            } else {
                wrapper.style.height = height + "px";
            }
        }

        // After the active class changes, wait a frame so the browser has
        // applied the new width/height (and started its own transition)
        // before measuring — avoids measuring stale layout.
        function updateWrapperHeightAfterChange() {
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    setWrapperHeight(false);
                });
            });
        }

        // --- Carousel logic ---------------------------------------------

        function render() {
            items.forEach((item, index) => {
                const isActive = index === activeIndex;
                item.classList.toggle("is-active", isActive);
                item.setAttribute("aria-current", isActive ? "true" : "false");
            });
            updateWrapperHeightAfterChange();
        }

        function goTo(index) {
            const total = items.length;
            activeIndex = (index + total) % total; // wraps both directions
            render();
        }

        prevBtn && prevBtn.addEventListener("click", () => goTo(activeIndex - 1));
        nextBtn && nextBtn.addEventListener("click", () => goTo(activeIndex + 1));

        // Clicking a thumbnail directly also makes it active.
        items.forEach((item, index) => {
            item.addEventListener("click", () => goTo(index));
        });

        // --- Initial setup, image load, and resize handling --------------

        items.forEach((item, index) => {
            const isActive = index === activeIndex;
            item.classList.toggle("is-active", isActive);
            item.setAttribute("aria-current", isActive ? "true" : "false");
        });

        setWrapperHeight(true);

        images.forEach((img) => {
            if (img.complete) {
                setWrapperHeight(true);
            } else {
                img.addEventListener("load", () => setWrapperHeight(true));
            }
        });

        // Recalculate on resize — also covers the mobile↔desktop breakpoint
        // switch, since that changes both column count and active-item sizing.
        let resizeRaf = null;
        window.addEventListener("resize", () => {
            if (resizeRaf) cancelAnimationFrame(resizeRaf);
            resizeRaf = requestAnimationFrame(() => setWrapperHeight(true));
        });
    })();
</script>