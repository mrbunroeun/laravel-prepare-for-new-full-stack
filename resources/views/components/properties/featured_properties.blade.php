        @php
            $properties = \App\Models\FeaturedProperty::where('status', 'published')
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get()
                ->toArray();

            if (empty($properties)) {
                $properties = [
                    [
                        'image' => asset('home/latest_activities/1img.png'),
                        'title' => 'Wealth Mansion',
                        'description' =>
                            'Premium condominium development offering modern residential units with excellent city access.',
                        'link' => url('/properties/wealth-mansion'),
                        'link_text' => 'View Property',
                    ],
                    [
                        'image' => asset('home/latest_activities/2img.png'),
                        'title' => 'Private Residential Collection',
                        'description' =>
                            'Professionally managed condominium units including premium residences and penthouses.',
                        'link' => url('/properties/private-residential-collection'),
                        'link_text' => 'View Property',
                    ],
                    [
                        'image' => asset('home/latest_activities/3img.png'),
                        'title' => 'UC88 Residence',
                        'description' =>
                            "Comfortable condominium living with convenient access to Phnom Penh's business districts.",
                        'link' => url('/properties/uc88-residence'),
                        'link_text' => 'View Property',
                    ],
                ];
            }
        @endphp

        <section class="relative w-full min-h-[500px] sm:min-h-[550px] md:min-h-[600px] lg:min-h-[660px]">

            {{-- Background image layer: absolute, fills section, behind everything --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('home/feature_properties/feature_properties.png') }}" alt="CWD Realty featured properties"
                    class="w-full h-full object-cover object-right">
            </div>

            {{-- Main content layer: sits above the image --}}
            <div class="relative z-10 max-w-[1400px] ml-0 mr-auto lg:-ml-[186px] xl:-ml-[204px]">

                {{-- Mobile/tablet heading + arrows --}}
                <div
                    class="flex lg:hidden items-center justify-between absolute inset-x-0 top-0 px-4 sm:px-6 pt-8 pb-6 sm:pb-10 z-10">
                    <h2 class="text-[#F4DEAC] text-[clamp(20px,3vw,30px)] leading-tight">
                        <span class="font-normal block">Featured</span>
                        <span class="font-bold block">Properties</span>
                    </h2>
                    <div class="flex items-center gap-3">
                        <button id="cwd-featured-prev-mobile" type="button" aria-label="Previous property"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center cursor-pointer justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="cwd-featured-next-mobile" type="button" aria-label="Next property"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center cursor-pointer justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Cards layer --}}
                <div
                    class="relative z-20 pt-24 sm:pt-28 lg:pt-[2vw] lg:-translate-y-[clamp(60px,9vw,140px)] pointer-events-none" data-scroll-reveal="right">
                    <div id="cwd-featured-track"
                        class="cwd-featured-fade pointer-events-auto flex gap-5 overflow-x-auto scroll-smooth pl-4 sm:pl-10 lg:pl-[20rem] pr-4 sm:pr-6 lg:pr-[320px] scroll-pl-4 sm:scroll-pl-10 lg:scroll-pl-[20rem] pb-2 snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">

                        @foreach ($properties as $property)
                            @php
                                $img = $property['image'] ?? 'home/latest_activities/1img.png';
                                if (!str_starts_with($img, 'http') && !str_starts_with($img, '/')) {
                                    $img = asset($img);
                                }
                            @endphp
                            <a href="{{ url($property['link'] ?? '#') }}"
                                class="cwd-featured-card block shrink-0 snap-start w-[260px] sm:w-[280px] bg-white shadow-sm cursor-pointer group transition-transform duration-300 hover:shadow-md">

                                <div class="h-[170px] w-full overflow-hidden bg-gray-100">
                                    <img src="{{ $img }}" alt="{{ $property['title'] }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                </div>

                                <div class="px-5 py-5">
                                    <h3 class="text-black text-[15px] font-bold mb-2 leading-snug group-hover:text-[#2A5A8A] transition-colors">
                                        {{ $property['title'] }}
                                    </h3>
                                    <p class="text-black/70 text-[12.5px] leading-relaxed mb-4">
                                        {{ $property['description'] }}
                                    </p>
                                    <span
                                        class="text-[#2A5A8A] text-[12px] font-semibold inline-flex items-center gap-1 group-hover:underline">
                                        {{ $property['link_text'] ?? 'View Property' }} <span aria-hidden="true" class="transition-transform group-hover:translate-x-1">→</span>
                                    </span>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>

                {{-- Featured Properties heading + navigation --}}
                <div
                    class="hidden lg:flex flex-col items-start justify-start gap-10 w-[300px] absolute right-0 top-0 px-10 py-8 z-30 pointer-events-auto">
                    <div class="flex items-center gap-3">
                        <button id="cwd-featured-prev" type="button" aria-label="Previous property"
                            class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center cursor-pointer hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="cwd-featured-next" type="button" aria-label="Next property"
                            class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center cursor-pointer hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <h2 class="text-[#F4DEAC] text-[clamp(24px,2.4vw,34px)] leading-tight select-none">
                        <span class="font-normal block">Featured</span>
                        <span class="font-bold block">Properties</span>
                    </h2>
                </div>

                <div class="h-6 sm:h-8 lg:h-12"></div>

            </div>

        </section>

        <style>
            @media (min-width: 1024px) {
                .cwd-featured-fade {
                    -webkit-mask-image: linear-gradient(to right,
                            transparent 0%,
                            black 40px,
                            black calc(100% - 320px),
                            transparent 100%);
                    mask-image: linear-gradient(to right,
                            transparent 0%,
                            black 40px,
                            black calc(100% - 320px),
                            transparent 100%);
                }

            }
        </style>

        <script>
            (function() {
                const track = document.getElementById("cwd-featured-track");
                const prevBtn = document.getElementById("cwd-featured-prev");
                const nextBtn = document.getElementById("cwd-featured-next");
                const prevBtnMobile = document.getElementById("cwd-featured-prev-mobile");
                const nextBtnMobile = document.getElementById("cwd-featured-next-mobile");

                if (!track) return;

                const cards = Array.from(track.querySelectorAll(".cwd-featured-card"));
                if (!cards.length) return;

                const GAP = 20; // matches gap-5 (1.25rem = 20px)
                let scrollTimer = null;

                function step() {
                    // Move by one card width + gap, so it always works no matter how many cards exist
                    return cards[0].getBoundingClientRect().width + GAP;
                }

                function scrollByStep(direction) {
                    track.scrollBy({
                        left: direction * step(),
                        behavior: "smooth"
                    });
                }

                function setButtons(atStart, atEnd) {
                    [prevBtn, prevBtnMobile].forEach(btn => {
                        if (!btn) return;
                        btn.style.opacity = atStart ? "0.25" : "1";
                        btn.style.pointerEvents = atStart ? "none" : "auto";
                    });
                    [nextBtn, nextBtnMobile].forEach(btn => {
                        if (!btn) return;
                        btn.style.opacity = atEnd ? "0.25" : "1";
                        btn.style.pointerEvents = atEnd ? "none" : "auto";
                    });
                }

                function updateButtons() {
                    const atStart = track.scrollLeft <= 1;
                    const atEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 1;
                    setButtons(atStart, atEnd);
                }

                function scrollToRightEnd() {
                    track.scrollLeft = track.scrollWidth - track.clientWidth;
                    updateButtons();
                }

                track.addEventListener("scroll", () => {
                    clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(updateButtons, 100);
                }, {
                    passive: true
                });

                if (prevBtn) prevBtn.addEventListener("click", () => scrollByStep(-1));
                if (nextBtn) nextBtn.addEventListener("click", () => scrollByStep(1));
                if (prevBtnMobile) prevBtnMobile.addEventListener("click", () => scrollByStep(-1));
                if (nextBtnMobile) nextBtnMobile.addEventListener("click", () => scrollByStep(1));

                window.addEventListener("resize", () => {
                    updateButtons();
                });

                // Scroll to the very right product on initial load / refresh
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', () => {
                        requestAnimationFrame(scrollToRightEnd);
                    });
                } else {
                    requestAnimationFrame(scrollToRightEnd);
                }
                window.addEventListener('load', scrollToRightEnd);
                setTimeout(scrollToRightEnd, 150);
            })();
        </script>
