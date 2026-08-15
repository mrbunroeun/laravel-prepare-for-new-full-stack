

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

    {{--
    "Discover Wealth Mansion" carousel. --}}
   
    <section class="relative bg-white px-6 sm:px-10 lg:px-14 py-14 lg:py-20 overflow-x-clip">
        <div class="max-w-[1400px] mx-auto">

            {{-- Heading --}}
            <div class="mb-8 lg:mb-10">
                <p class="text-[#2A5A8A] text-[15px] font-normal mb-1">Discover</p>
                <h2 class="text-[#2A5A8A] text-[clamp(24px,3vw,32px)] font-bold">Wealth Mansion</h2>
            </div>

            <div class="flex items-center gap-6 lg:gap-10">

                {{-- Image group: stays centered as a whole, images never move
                 position/order — only their size changes. --}}
                <div id="discover-carousel-track"
                    class="flex-1 flex items-center justify-center gap-3 sm:gap-4 lg:gap-5 min-w-0">
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

                {{-- Navigation arrows --}}
                <div class="flex items-center gap-3 shrink-0">
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

            </div>
        </div>
    </section>

    <style>
        /* Sizes use clamp() so they scale smoothly with viewport width instead
           of jumping at fixed breakpoints — desktop lands close to the
           requested ~200x210 (active) / ~95x110 (inactive), scaling down on
           narrower screens so 4 images + arrows never overflow horizontally. */
        .discover-carousel-item {
            width: clamp(64px, 12vw, 95px);
            height: clamp(84px, 14vw, 110px);
        }

        .discover-carousel-item.is-active {
            width: clamp(130px, 22vw, 200px);
            height: clamp(150px, 24vw, 210px);
        }

        @media (max-width: 480px) {
            .discover-carousel-item {
                width: clamp(46px, 16vw, 64px);
                height: clamp(60px, 18vw, 84px);
            }

            .discover-carousel-item.is-active {
                width: clamp(96px, 34vw, 130px);
                height: clamp(112px, 36vw, 150px);
            }
        }
    </style>

    <script>
        (function() {
            const track = document.getElementById("discover-carousel-track");
            if (!track) return;

            const items = Array.from(track.querySelectorAll(".discover-carousel-item"));
            if (!items.length) return;

            const prevBtn = document.getElementById("discover-carousel-prev");
            const nextBtn = document.getElementById("discover-carousel-next");

            let activeIndex = items.findIndex(item => item.classList.contains("is-active"));
            if (activeIndex === -1) activeIndex = 0;

            function render() {
                items.forEach((item, index) => {
                    const isActive = index === activeIndex;
                    item.classList.toggle("is-active", isActive);
                    item.setAttribute("aria-current", isActive ? "true" : "false");
                });
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

            render();
        })();
    </script>