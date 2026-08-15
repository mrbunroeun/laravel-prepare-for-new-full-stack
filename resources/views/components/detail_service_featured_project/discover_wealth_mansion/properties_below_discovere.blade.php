@php
    // Same set of detail images reused for every card's mini image-carousel.
$detailImages = [
    asset('home/latest_activities/1img.png'),
    asset('home/latest_activities/2img.png'),
    asset('home/latest_activities/3img.png'),
];

// The three unit-type cards.
$properties = [
    [
        'image' => asset('home/latest_activities/1img.png'),
        'title' => 'Studio Room',
        'subtitle' => 'Compact & Practical Living',
        'description' => 'The studio layout is suitable for individuals, couples, business professionals, and investors seeking a compact residential property.',
        'suitableFor' => [
            'Individual residents',
            'Business travelers',
            'Young professionals',
            'Rental investment',
        ],
        'units' => 'XX Units Available',
        'link' => url('services/properties/wealth-mansion'),
    ],
    [
        'image' => asset('home/latest_activities/2img.png'),
        'title' => '1-bedroom',
        'subtitle' => 'Comfortable One-Bedroom Residence',
        'description' => 'The 1-bedroom layout provides additional living space and privacy compared with a studio, making it suitable for both personal residence and rental investment.',
        'suitableFor' => [
            'Couples',
            'Professionals',
            'Long-term residents',
            'Property investors',
        ],
        'units' => 'XX Units Available',
        'link' => url('services/properties/private-residential'),
    ],
    [
        'image' => asset('home/latest_activities/3img.png'),
        'title' => '2-Bedroom with Balcony',
        'subtitle' => 'More Space with a Private Balcony',
        'description' => 'The 2-bedroom residence provides additional space for families or buyers seeking a larger condominium with outdoor balcony space.',
        'suitableFor' => [
            'Small families',
            'Shared living',
            'Long-term residents',
            'Investment purposes',
        ],
        'units' => 'XX Units Available',
        'link' => url('services/properties/uc88'),
    ],
];
@endphp

{{--
    LAYOUT:
      Section is full-bleed (w-full, no outer max-width/mx-auto) so the
      white background runs edge-to-edge across the viewport. The card
      grid itself is capped at a max-width and pushed to the right via
      ml-auto, matching the reference: empty space on the left, cards
      hugging the right side.

    CARD DESIGN (unit-type cards):
      Light-gray card body, top image with a centered dot-indicator strip
      (same ● ○ ○ pattern as the original carousel cards) tracking which
      of the 3 detail images is showing, title + prev/next mini carousel
      controls on one row, subtitle, full (non-clamped) description, a
      "Suitable for:" bullet list, a bold "XX Units Available" line, and
      a "Contact Us" link.
--}}
<section class="relative w-full bg-white">
    <div class="w-full px-6 sm:px-8 lg:pl-0 lg:pr-14 py-14">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-8 ml-auto w-full lg:w-[80%]">

            @foreach ($properties as $property)
                <article
                    class="cwd-featured-card group flex flex-col
                        bg-[#F3F3F1] rounded-none overflow-hidden cursor-pointer
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

                        <p class="text-black text-[15px] font-bold leading-snug mb-2">
                            {{ $property['subtitle'] }}
                        </p>

                        <p class="text-black/70 text-[14px] leading-relaxed mb-4">
                            {{ $property['description'] }}
                        </p>

                        <p class="text-black text-[14px] font-bold mb-2">Suitable for:</p>
                        <ul class="mb-4 space-y-1">
                            @foreach ($property['suitableFor'] as $item)
                                <li class="flex items-start gap-2 text-black/80 text-[14px] leading-relaxed">
                                    <span class="mt-[9px] w-[5px] h-[5px] rounded-full bg-black/60 shrink-0"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <p class="text-[#2A5A8A] text-[14px] font-bold mb-4">
                            {{ $property['units'] }}
                        </p>

                        {{-- mt-auto keeps the CTA pinned to the bottom so cards
                             with shorter/longer content still align. --}}
                        <a href="{{ $property['link'] }}"
                            class="cwd-featured-card-link relative z-10 mt-auto text-[#2A5A8A] text-[14px] font-semibold
                                inline-flex items-center gap-1 w-max
                                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2 rounded-sm">
                            <span
                                class="border-b border-transparent group-hover:border-[#2A5A8A] transition-colors duration-300">Contact
                                Us</span>
                            <span aria-hidden="true"
                                class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</section>

<style>
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
</style>

<script>
    (function() {
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
        // Clicking anywhere on the card (including the image) goes to the
        // property page. Only the mini-carousel buttons opt out via
        // stopPropagation above; the "Contact Us" link navigates itself.
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

        document.querySelectorAll(".cwd-featured-card").forEach(card => {
            initCardCarousel(card);
            initCardNavigation(card);
        });
    })();
</script>