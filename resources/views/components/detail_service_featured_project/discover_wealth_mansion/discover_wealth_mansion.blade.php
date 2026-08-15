@php
    // Replace these with your actual existing image paths — keep the
    // same 4 images you already use for this section.
    $discoverImages = [
        asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
        asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
        asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
        asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
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

        {{-- Mobile/tablet: column layout, arrows on top, single-column
             stack below. Desktop (lg+): row layout, track on the left,
             arrows on the right, top-aligned so growth pushes downward. --}}
        <div class="flex flex-col lg:flex-row items-center lg:items-start gap-6 lg:gap-10">

            {{-- Navigation arrows: order-1 puts them above the track on
                 mobile/tablet; lg:order-2 moves them to the right on desktop. --}}
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
                 flow when the active image scales. Widths on every item
                 top out at w-full below lg (and fit exactly within the
                 track's own width at lg), so nothing can ever overflow
                 horizontally — overflow-hidden here only clips vertically
                 in practice. --}}
            <div id="discover-carousel-height-wrapper"
                class="w-full lg:flex-1 lg:w-[80%] mx-auto overflow-hidden transition-[height] duration-500 ease-in-out order-2 lg:order-1">

                {{-- Image group: single column on phone/tablet, single row
                     of 4 on desktop. Images never change order — only size. --}}
                <div id="discover-carousel-track"
                    class="flex flex-col lg:flex-row lg:flex-nowrap items-center lg:items-start justify-center gap-3 sm:gap-4 lg:gap-5 min-w-0 w-full">
                    @foreach ($discoverImages as $index => $image)
                        {{-- Both size states are written out as literal,
                             complete Tailwind classes below (via data-base /
                             data-active attributes) — no arbitrary-variant
                             stacking, no CSS specificity guesswork. JS swaps
                             the full class list directly with classList. --}}
                        <button type="button"
                            data-base="w-full h-[200px] sm:h-[260px] lg:flex-1 lg:h-[246px] min-w-0"
                            data-active-classes="w-full h-[300px] sm:h-[380px] lg:flex-[2] lg:h-[445px] min-w-0"
                            class="discover-carousel-item relative overflow-hidden rounded-none
                            transition-all duration-500 ease-in-out
                            focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                            w-full h-[200px] sm:h-[260px] lg:flex-1 lg:h-[246px] min-w-0"
                            data-index="{{ $index }}" aria-label="Show image {{ $index + 1 }} as active"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                            {{-- object-contain: the full image always shows
                                 inside its box, never cropped. --}}
                            <img src="{{ $image }}" alt="Wealth Mansion view {{ $index + 1 }}"
                                class="w-full h-full object-contain transition-transform duration-500 ease-in-out">
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

        // Read each item's base/active class lists straight from the data
        // attributes (which contain literal Tailwind classes written in
        // the Blade markup above), so JS never invents or guesses classes.
        const itemClassSets = items.map((item) => ({
            base: item.dataset.base.split(/\s+/).filter(Boolean),
            active: item.dataset.activeClasses.split(/\s+/).filter(Boolean),
        }));

        // Every item starts on its base classes; index 0 is active by
        // convention (matches the original markup's default state).
        let activeIndex = 0;

        // --- Real height-following logic -----------------------------------

        // Measures the TRACK's own rendered height (not just the active
        // item) so this works whether images are laid out as a single row
        // (desktop) or stacked in one column (phone/tablet).
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

        // After the active item changes, wait a frame so the browser has
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
                const { base, active } = itemClassSets[index];
                const isActive = index === activeIndex;
                // Directly swap the literal class lists — no CSS selector
                // logic involved, so there's nothing that can silently
                // fail to apply.
                item.classList.remove(...(isActive ? base : active));
                item.classList.add(...(isActive ? active : base));
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

        // Apply the active state to item 0 on load (matches markup default).
        render();

        setWrapperHeight(true);

        images.forEach((img) => {
            if (img.complete) {
                setWrapperHeight(true);
            } else {
                img.addEventListener("load", () => setWrapperHeight(true));
            }
        });

        // Recalculate on resize — covers phone↔tablet↔desktop breakpoint
        // switches, since Tailwind's sm:/lg: classes change sizing there.
        let resizeRaf = null;
        window.addEventListener("resize", () => {
            if (resizeRaf) cancelAnimationFrame(resizeRaf);
            resizeRaf = requestAnimationFrame(() => setWrapperHeight(true));
        });
    })();
</script>