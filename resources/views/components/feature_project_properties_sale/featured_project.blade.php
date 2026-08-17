@php
    // Same set of detail images reused for every card's mini image-carousel.
$detailImages = [
    asset('home/latest_activities/1img.png'),
    asset('home/latest_activities/2img.png'),
    asset('home/latest_activities/3img.png'),
];

// Base pool of unique properties. Grade sets are built by cycling
// through this pool to reach the required count for each grade.
$baseProperties = [
    [
        'image' => asset('home/latest_activities/1img.png'),
        'title' => 'Wealth Mansion',
        'subtitle' => 'Premium Condominium Residences',
        'description' => 'Studio, 1-bedroom, 2-bedroom, and 3-bedroom residences with selected units available.',
        'status' => '30% Available',
        'link' => url('services/properties/wealth-mansion'),
    ],
    [
        'image' => asset('home/latest_activities/2img.png'),
        'title' => 'Private Residential',
        'subtitle' => 'Exclusive Residential Development',
        'description' =>
            'A private residential project featuring approximately 100 units, including penthouse residences.',
        'status' => 'Coming Soon',
        'link' => url('services/properties/private-residential'),
    ],
    [
        'image' => asset('home/latest_activities/3img.png'),
        'title' => 'UC88',
        'subtitle' => 'Residential Property Project',
        'description' =>
            'Explore the UC88 project and available residential opportunities through CWD Realty & Hospitality.',
        'status' => '30% Available',
        'link' => url('services/properties/uc88'),
    ],
];

// Cycle the base pool to build a set of $count properties.
$buildPropertySet = function (array $base, int $count) {
    $set = [];
    for ($i = 0; $i < $count; $i++) {
        $set[] = $base[$i % count($base)];
    }
    return $set;
};

// Grade A = original 5-card set, Grade B = 7 cards, Grade C = 3 cards.
$propertiesByGrade = [
    'A' => $buildPropertySet($baseProperties, 5),
    'B' => $buildPropertySet($baseProperties, 7),
    'C' => $buildPropertySet($baseProperties, 3),
];

$grades = [
    ['key' => 'A', 'label' => 'Grade A'],
    ['key' => 'B', 'label' => 'Grade B'],
    ['key' => 'C', 'label' => 'Grade C'],
];

$activeGrade = 'A';
    $properties = $propertiesByGrade[$activeGrade];
@endphp

{{--
    LAYOUT MODEL (desktop, lg+):

      section (bg-white)
      ├─ z-0  background image — offset DOWN from the top (starts at
      │        --bg-offset), NOT inset-0. This leaves plain white space
      │        above it for the arrows to sit in, matching the reference.
      ├─ z-10 content wrapper (arrows, mobile heading)
      └─ z-20/30 overlap row (sidebar + cards) — pulled up with a negative
               top margin so it starts right around the white→image
               transition and visually floats over the photo, with the
               cards extending well down into the image.

    On mobile/tablet the background goes back to full-bleed (top-0) and
    there is no negative margin — the spec explicitly says not to reuse
    the desktop overlap values on small screens.

    GRADE FILTER:
      Clicking "Grade A" / "Grade B" / "Grade C" in the sidebar swaps the
      card set client-side (no page reload):
        - Grade A -> original 5 properties
        - Grade B -> 7 properties
        - Grade C -> 3 properties
      All three sets are pre-rendered server-side into a JSON payload
      (#cwd-featured-properties-data) so the JS below never has to guess
      at property data — it just re-renders cards from that payload and
      re-wires the same per-card behavior (mini image carousel, whole-card
      click-through) used on initial load.
--}}
<section class="relative w-full bg-white min-h-[640px] sm:min-h-[700px] lg:min-h-[900px]">

    {{-- Background image layer (z-0). Offset down on desktop only. --}}
    <div class="absolute inset-x-0 top-0 bottom-0 lg:top-[190px] z-0 overflow-hidden">
        <img src="{{ asset('home/feature_properties/feature_properties.png') }}" alt="CWD Realty featured properties"
            class="w-full h-full object-cover object-right">
        {{-- Overlay lives inside the same background layer, just above the
             raw image (z-[1] within this stacking context = spec's
             "background overlay" tier). Subtle — only strong enough to
             help the sidebar text read against a bright sky. --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/35 via-black/5 to-transparent"></div>
    </div>

    {{-- Content layer (z-10): arrows + mobile heading live here, in the
         white space above the background image on desktop. --}}
    <div class="relative z-10 max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-14 pt-10 sm:pt-14">

        {{-- Top row: top nav arrows (desktop) --}}
        <div class="hidden lg:flex items-center gap-3 pb-8" data-scroll-reveal="fade-up">
            <button id="cwd-featured-prev" type="button" aria-label="Previous property"
                class="w-11 h-11 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer
                    transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2 focus-visible:ring-offset-transparent
                    disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="cwd-featured-next" type="button" aria-label="Next property"
                class="w-11 h-11 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] flex items-center justify-center cursor-pointer
                    transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2 focus-visible:ring-offset-transparent
                    disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        {{-- Mobile/tablet heading + arrows --}}
        <div class="flex lg:hidden items-center justify-between pb-6" data-scroll-reveal="left">
            <h2 class="text-[#F4DEAC] text-[clamp(22px,4vw,30px)] leading-tight">
                <span class="font-normal block">Featured</span>
                <span class="font-bold block">Properties</span>
            </h2>
            <div class="flex items-center gap-3">
                <button id="cwd-featured-prev-mobile" type="button" aria-label="Previous property"
                    class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center cursor-pointer justify-center
                        transition-all duration-300 hover:bg-[#F4DEAC] hover:text-[#163049]
                        focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#F4DEAC] focus-visible:ring-offset-2
                        disabled:cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="cwd-featured-next-mobile" type="button" aria-label="Next property"
                    class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center cursor-pointer justify-center
                        transition-all duration-300 hover:bg-[#F4DEAC] hover:text-[#163049]
                        focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#F4DEAC] focus-visible:ring-offset-2
                        disabled:cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Overlap row: sidebar + cards. On desktop this is pulled up
             with a negative margin so it starts right where the white
             space meets the background image and then floats down over
             the photo. No negative margin on mobile/tablet — the spec
             is explicit that the desktop overlap values shouldn't be
             reused there. --}}
        <div
            class="relative grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-8 lg:gap-10 items-start
                    pb-14 lg:pb-24 lg:-mt-6">

            {{-- LEFT: sidebar --}}
            <div class="relative z-20 hidden lg:flex flex-col gap-8 bg-transparent px-8 pt-20" data-scroll-reveal="left">
                <h2 class="text-[#F4DEAC] drop-shadow-md text-[clamp(28px,2.6vw,40px)] leading-tight">
                    <span class="font-normal block">Featured</span>
                    <span class="font-bold block">Properties</span>
                </h2>

                <nav id="cwd-featured-grade-nav" class="flex flex-col gap-3 w-full"
                    aria-label="Filter properties by grade">
                    @foreach ($grades as $grade)
                        <a href="#" data-grade="{{ $grade['key'] }}"
                            aria-current="{{ $grade['key'] === $activeGrade ? 'true' : 'false' }}"
                            class="cwd-featured-grade-link group flex items-center justify-between px-5 py-3 text-[15px] font-medium transition-all duration-300
                                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#F4DEAC] focus-visible:ring-offset-2 focus-visible:ring-offset-black
                                {{ $grade['key'] === $activeGrade
                                    ? 'bg-[#2A5A8A] text-[#F4DEAC]'
                                    : 'text-[#F4DEAC] hover:text-white hover:bg-white/10' }}">
                            <span>{{ $grade['label'] }}</span>
                            <span aria-hidden="true"
                                class="transition-transform duration-300 group-hover:translate-x-1">
                                &rarr;
                            </span>
                        </a>
                    @endforeach
                </nav>
            </div>

            {{-- RIGHT: card carousel --}}
            <div class="relative z-30 min-w-0" data-scroll-reveal="right">
                <div id="cwd-featured-track"
                    class="pointer-events-auto flex gap-5 overflow-x-auto scroll-smooth items-stretch pb-2
                        snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">

                    @foreach ($properties as $property)
                        <article
                            class="cwd-featured-card group shrink-0 snap-start flex flex-col
                                w-[82vw] max-w-[320px] sm:w-[300px] lg:w-[320px]
                                bg-white rounded-none overflow-hidden cursor-pointer
                                transition-all duration-300 ease-out
                                hover:-translate-y-1
                                focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2"
                            data-images="{{ json_encode($detailImages) }}" data-link="{{ $property['link'] }}"
                            tabindex="0" role="link" aria-label="View details for {{ $property['title'] }}">

                            <div style="position:relative; height:190px; width:100%; overflow:hidden; flex-shrink:0;">
                                <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}"
                                    class="cwd-featured-card-img"
                                    style="width:100%; height:100%; object-fit:cover; transition:opacity .5s ease-out, transform .5s ease-out;">

                                {{-- Image position indicator: ● ○ ○, centered at the
                                     bottom edge of the image. --}}
                                <div class="cwd-featured-card-dots"
                                    style="position:absolute; bottom:12px; left:50%; transform:translateX(-50%); z-index:10; display:flex; align-items:center; gap:8px;"
                                    aria-hidden="true">
                                    @foreach ($detailImages as $i => $img)
                                        <span class="cwd-featured-card-dot"
                                            style="border-radius:9999px; transition:all .3s; height:8px; width:8px; background:{{ $i === 0 ? '#fff' : 'rgba(255,255,255,0.55)' }};"></span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="px-6 py-6 flex flex-col grow">
                                <div style="display:flex; align-items:center; justify-content:space-between; gap:12px;"
                                    class="mb-3">
                                    <h3 class="text-[#2A5A8A] text-[clamp(18px,1.4vw,19px)] font-bold leading-snug">
                                        {{ $property['title'] }}
                                    </h3>

                                    {{-- Prev/next mini-carousel controls: live in the content
                                         row next to the title, not over the photo. --}}
                                    <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                                        <button type="button" aria-label="Previous image"
                                            class="cwd-featured-card-prev"
                                            style="width:34px; height:34px; border-radius:9999px; background:#fff; border:1.5px solid #2A5A8A; color:#2A5A8A; display:flex; align-items:center; justify-content:center; cursor:pointer; transition:all .2s;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width:14px;height:14px;"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button type="button" aria-label="Next image" class="cwd-featured-card-next"
                                            style="width:34px; height:34px; border-radius:9999px; background:#fff; border:1.5px solid #2A5A8A; color:#2A5A8A; display:flex; align-items:center; justify-content:center; cursor:pointer; transition:all .2s;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width:14px;height:14px;"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <p class="text-black text-[15px] font-semibold leading-snug mb-2">
                                    {{ $property['subtitle'] }}
                                </p>

                                <p class="text-black/70 text-[14px] leading-relaxed mb-4 line-clamp-2">
                                    {{ $property['description'] }}
                                </p>

                                <p class="text-[#2A5A8A] text-[14px] font-bold mb-4">
                                    {{ $property['status'] }}
                                </p>

                                {{-- mt-auto keeps the CTA pinned to the bottom so cards
                                     with shorter/longer descriptions still align. --}}
                                <a href="{{ $property['link'] }}"
                                    class="cwd-featured-card-link relative z-10 mt-auto text-[#2A5A8A] text-[14px] font-semibold
                                        inline-flex items-center gap-1 w-max
                                        focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2 rounded-sm">
                                    <span
                                        class="border-b border-transparent group-hover:border-[#2A5A8A] transition-colors duration-300">View
                                        Project</span>
                                    <span aria-hidden="true"
                                        class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                                </a>
                            </div>
                        </article>
                    @endforeach

                </div>

                {{-- Scroll-edge blur cues: a soft blurred strip fades in
                     on whichever side still has cards to scroll to, so
                     it's obvious at a glance that more content sits off
                     to the left/right. Toggled via JS based on scroll
                     position; purely visual (pointer-events disabled so
                     they never block clicks on nearby cards). --}}
                <div id="cwd-featured-edge-left" class="cwd-featured-edge cwd-featured-edge-left" aria-hidden="true">
                </div>
                <div id="cwd-featured-edge-right" class="cwd-featured-edge cwd-featured-edge-right"
                    aria-hidden="true"></div>
            </div>

        </div>
    </div>

</section>

{{-- Server-rendered grade -> property-set payload, consumed by the grade
     filter JS below. Kept as a JSON script tag rather than a data-*
     attribute since the payload can get sizeable (7 properties for Grade B). --}}
<script type="application/json" id="cwd-featured-properties-data">{!! json_encode($propertiesByGrade) !!}</script>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Plain CSS hover effects — not dependent on Tailwind's build/purge,
       so these always render even if the arbitrary utility classes above
       haven't been recompiled yet. */
    .cwd-featured-card:hover .cwd-featured-card-img {
        transform: scale(1.04);
    }

    .cwd-featured-card-prev:hover,
    .cwd-featured-card-next:hover {
        background: #2A5A8A !important;
        color: #fff !important;
        transform: scale(1.1);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25) !important;
    }

    /* Grade-switch transition: track dims/settles slightly while the old
       cards are swapped out, then each new card "pops" in with a staggered
       scale + fade so the change reads as a deliberate animation rather
       than an instant swap. */
    #cwd-featured-track {
        transition: opacity 0.18s ease, transform 0.18s ease;
    }

    #cwd-featured-track.cwd-track-leaving {
        opacity: 0;
        transform: scale(0.98);
    }

    @keyframes cwdCardPop {
        0% {
            opacity: 0;
            transform: scale(0.85) translateY(14px);
        }

        60% {
            opacity: 1;
            transform: scale(1.03) translateY(-2px);
        }

        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .cwd-featured-card.cwd-card-pop {
        animation: cwdCardPop 0.45s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: var(--cwd-pop-delay, 0s);
    }

    /* Scroll-edge blur cues. Sit on top of the track (above the cards),
       blur whatever scrolls underneath them, and fade out toward the
       card side via a mask so the blur reads as an edge effect rather
       than a hard bar. Hidden by default; JS toggles opacity/visibility
       based on whether that side still has content to scroll to. */
    .cwd-featured-edge {
        position: absolute;
        top: 0;
        bottom: 8px;
        width: 140px;
        /* was 56px */
        z-index: 40;
        pointer-events: none;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.25s ease;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .cwd-featured-edge.is-visible {
        opacity: 1;
        visibility: visible;
    }

    .cwd-featured-edge-left {
        left: 0;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.55) 0%, rgba(0, 0, 0, 0.15) 60%, transparent 100%);
        -webkit-mask-image: linear-gradient(to right, black 0%, transparent 100%);
        mask-image: linear-gradient(to right, black 0%, transparent 100%);
    }

    .cwd-featured-edge-right {
        right: 0;
        background: linear-gradient(to left, rgba(0, 0, 0, 0.55) 0%, rgba(0, 0, 0, 0.15) 60%, transparent 100%);
        -webkit-mask-image: linear-gradient(to left, black 0%, transparent 100%);
        mask-image: linear-gradient(to left, black 0%, transparent 100%);
    }

    @med    ia (max-width: 640px) {
        .cwd-featured-edge {
            width: 80px;
            /* was 36px */
        }
    }
</style>

<script>
    (function() {
        const track = document.getElementById("cwd-featured-track");
        if (!track) return;

        const DETAIL_IMAGES = {!! json_encode($detailImages) !!};

        // Grade -> property-set payload rendered server-side.
        let PROPERTIES_BY_GRADE = {};
        const dataEl = document.getElementById("cwd-featured-properties-data");
        if (dataEl) {
            try {
                PROPERTIES_BY_GRADE = JSON.parse(dataEl.textContent || "{}");
            } catch (err) {
                PROPERTIES_BY_GRADE = {};
            }
        }

        const GAP = 20; // matches gap-5 (1.25rem = 20px)
        let scrollTimer = null;
        let cards = [];

        function step() {
            return cards.length ? cards[0].getBoundingClientRect().width + GAP : 0;
        }

        function scrollByStep(direction) {
            track.scrollBy({
                left: direction * step(),
                behavior: "smooth"
            });
        }

        // Only the main track's own scroll buttons (desktop + mobile) get
        // disabled at the start/end of the track. The per-card "scroll
        // detail" buttons are a completely separate feature (cycling that
        // one card's images) and must never be affected by main-track
        // scroll position.
        const edgeLeft = document.getElementById("cwd-featured-edge-left");
        const edgeRight = document.getElementById("cwd-featured-edge-right");

        function setButtons(atStart, atEnd) {
            document.querySelectorAll(
                "#cwd-featured-prev, #cwd-featured-prev-mobile"
            ).forEach(btn => {
                btn.disabled = atStart;
                btn.style.opacity = atStart ? "0.3" : "1";
                btn.style.pointerEvents = atStart ? "none" : "auto";
            });
            document.querySelectorAll(
                "#cwd-featured-next, #cwd-featured-next-mobile"
            ).forEach(btn => {
                btn.disabled = atEnd;
                btn.style.opacity = atEnd ? "0.3" : "1";
                btn.style.pointerEvents = atEnd ? "none" : "auto";
            });

            // Blur cue only makes sense if there's actually something to
            // scroll at all (track wider than its viewport). "Remaining
            // on the left" -> blur the left edge; "remaining on the
            // right" -> blur the right edge.
            const canScroll = track.scrollWidth > track.clientWidth + 1;
            if (edgeLeft) edgeLeft.classList.toggle("is-visible", canScroll && !atStart);
            if (edgeRight) edgeRight.classList.toggle("is-visible", canScroll && !atEnd);
        }

        function updateButtons() {
            const atStart = track.scrollLeft <= 1;
            const atEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 1;
            setButtons(atStart, atEnd);
        }

        track.addEventListener("scroll", () => {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(updateButtons, 100);
        }, {
            passive: true
        });

        document.querySelectorAll("#cwd-featured-prev, #cwd-featured-prev-mobile")
            .forEach(btn => btn.addEventListener("click", () => scrollByStep(-1)));
        document.querySelectorAll("#cwd-featured-next, #cwd-featured-next-mobile")
            .forEach(btn => btn.addEventListener("click", () => scrollByStep(1)));

        window.addEventListener("resize", updateButtons);

        // ---- Per-card mini image carousel (image + dots) ----
        function initCardCarousel(card) {
            const imgEl = card.querySelector(".cwd-featured-card-img");
            const prevBtn = card.querySelector(".cwd-featured-card-prev");
            const nextBtn = card.querySelector(".cwd-featured-card-next");
            const dots = Array.from(card.querySelectorAll(".cwd-featured-card-dot"));
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
                }, 300);
                updateDots();
            }

            prevBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation(); // don't trigger the card's own navigation
                showImage(index - 1);
            });

            nextBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                showImage(index + 1);
            });
        }

        // ---- Whole-card navigation ----
        // Clicking anywhere on the card (including the image, per spec)
        // goes to the property page. Only the mini-carousel buttons opt out
        // via stopPropagation above; the "View Project" link navigates itself.
        function initCardNavigation(card) {
            const link = card.dataset.link;
            if (!link) return;

            card.addEventListener("click", (e) => {
                if (e.target.closest("button")) return;
                if (e.target.closest("a")) return;
                window.location.href = link;
            });

            card.addEventListener("keydown", (e) => {
                if (e.key === "Enter" || e.key === " ") {
                    if (e.target.closest("button") || e.target.closest("a")) return;
                    e.preventDefault();
                    window.location.href = link;
                }
            });
        }

        function escapeHtml(str) {
            const div = document.createElement("div");
            div.textContent = String(str == null ? "" : str);
            return div.innerHTML;
        }

        // Builds one card's DOM node, mirroring the Blade markup exactly
        // so grade-switched cards look and behave identically to the
        // server-rendered ones.
        function buildCardElement(property) {
            const article = document.createElement("article");
            article.className = "cwd-featured-card group shrink-0 snap-start flex flex-col " +
                "w-[82vw] max-w-[320px] sm:w-[300px] lg:w-[320px] " +
                "bg-white rounded-none overflow-hidden cursor-pointer " +
                "transition-all duration-300 ease-out hover:-translate-y-1 " +
                "focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2";
            article.setAttribute("tabindex", "0");
            article.setAttribute("role", "link");
            article.setAttribute("aria-label", "View details for " + property.title);
            article.dataset.link = property.link;
            article.dataset.images = JSON.stringify(DETAIL_IMAGES);

            const dotsHtml = DETAIL_IMAGES.map((img, i) =>
                `<span class="cwd-featured-card-dot" style="border-radius:9999px; transition:all .3s; height:8px; width:8px; background:${i === 0 ? '#fff' : 'rgba(255,255,255,0.55)'};"></span>`
            ).join("");

            article.innerHTML = `
                <div style="position:relative; height:190px; width:100%; overflow:hidden; flex-shrink:0;">
                    <img src="${escapeHtml(property.image)}" alt="${escapeHtml(property.title)}"
                        class="cwd-featured-card-img"
                        style="width:100%; height:100%; object-fit:cover; transition:opacity .5s ease-out, transform .5s ease-out;">
                    <div class="cwd-featured-card-dots" style="position:absolute; bottom:12px; left:50%; transform:translateX(-50%); z-index:10; display:flex; align-items:center; gap:8px;" aria-hidden="true">
                        ${dotsHtml}
                    </div>
                </div>
                <div class="px-6 py-6 flex flex-col grow">
                    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px;" class="mb-3">
                        <h3 class="text-[#2A5A8A] text-[clamp(18px,1.4vw,19px)] font-bold leading-snug">
                            ${escapeHtml(property.title)}
                        </h3>
                        <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                            <button type="button" aria-label="Previous image" class="cwd-featured-card-prev"
                                style="width:34px; height:34px; border-radius:9999px; background:#fff; border:1.5px solid #2A5A8A; color:#2A5A8A; display:flex; align-items:center; justify-content:center; cursor:pointer; transition:all .2s;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button type="button" aria-label="Next image" class="cwd-featured-card-next"
                                style="width:34px; height:34px; border-radius:9999px; background:#fff; border:1.5px solid #2A5A8A; color:#2A5A8A; display:flex; align-items:center; justify-content:center; cursor:pointer; transition:all .2s;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-black text-[15px] font-semibold leading-snug mb-2">${escapeHtml(property.subtitle)}</p>
                    <p class="text-black/70 text-[14px] leading-relaxed mb-4 line-clamp-2">${escapeHtml(property.description)}</p>
                    <p class="text-[#2A5A8A] text-[14px] font-bold mb-4">${escapeHtml(property.status)}</p>
                    <a href="${escapeHtml(property.link)}"
                        class="cwd-featured-card-link relative z-10 mt-auto text-[#2A5A8A] text-[14px] font-semibold inline-flex items-center gap-1 w-max focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2 rounded-sm">
                        <span class="border-b border-transparent group-hover:border-[#2A5A8A] transition-colors duration-300">View Project</span>
                        <span aria-hidden="true" class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>
            `;

            return article;
        }

        // Stagger amount (ms) between each card's pop-in animation.
        const POP_STAGGER_MS = 60;

        function initTrack({
            animateIn = false
        } = {}) {
            cards = Array.from(track.querySelectorAll(".cwd-featured-card"));
            cards.forEach((card, i) => {
                initCardCarousel(card);
                initCardNavigation(card);

                if (animateIn) {
                    card.style.setProperty("--cwd-pop-delay", (i * POP_STAGGER_MS) + "ms");
                    card.classList.add("cwd-card-pop");
                    card.addEventListener("animationend", () => {
                        card.classList.remove("cwd-card-pop");
                        card.style.removeProperty("--cwd-pop-delay");
                    }, {
                        once: true
                    });
                }
            });
            track.scrollLeft = 0;
            updateButtons();
        }

        // Renders a new set of properties into the track (used on initial
        // load and whenever a grade filter is clicked).
        function renderProperties(properties, {
            animateIn = false
        } = {}) {
            track.innerHTML = "";
            const fragment = document.createDocumentFragment();
            properties.forEach(property => fragment.appendChild(buildCardElement(property)));
            track.appendChild(fragment);
            initTrack({
                animateIn
            });
        }

        // ---- Grade filter ----
        const gradeLinks = Array.from(document.querySelectorAll(".cwd-featured-grade-link"));
        const TRACK_FADE_MS = 180;
        let isSwitchingGrade = false;

        function setActiveGrade(gradeKey) {
            const properties = PROPERTIES_BY_GRADE[gradeKey];
            if (!Array.isArray(properties) || isSwitchingGrade) return;

            gradeLinks.forEach(link => {
                const isActive = link.dataset.grade === gradeKey;
                link.setAttribute("aria-current", isActive ? "true" : "false");
                link.classList.toggle("bg-[#2A5A8A]", isActive);
                link.classList.toggle("text-[#F4DEAC]", isActive);
                link.classList.toggle("hover:text-white", !isActive);
                link.classList.toggle("hover:bg-white/10", !isActive);
            });

            // Fade/settle the current cards out, swap the DOM while
            // invisible, then fade the track back in with each new card
            // popping in on a stagger — reads as one smooth transition
            // rather than an instant content swap.
            isSwitchingGrade = true;
            track.classList.add("cwd-track-leaving");

            setTimeout(() => {
                renderProperties(properties, {
                    animateIn: true
                });
                track.classList.remove("cwd-track-leaving");
                isSwitchingGrade = false;
            }, TRACK_FADE_MS);
        }

        gradeLinks.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const gradeKey = link.dataset.grade;
                if (!gradeKey) return;
                setActiveGrade(gradeKey);
            });
        });

        // Initial wiring for the server-rendered Grade A cards.
        initTrack();
    })();
</script>
