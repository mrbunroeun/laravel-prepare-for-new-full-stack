@extends('layouts.app')
@section('content')
    @php
        $heroData = \App\Models\HeroSection::where('page', 'daily-weekly-rentals-studio-room')->first();
        $heroTaglineHtml = $heroData?->tagline_html ?: ($heroData?->tagline_box1 ?: 'Daily &amp; Weekly Rentals');
        $heroHeadline = $heroData?->headline ?: 'Studio Room';
        $heroSubtext = (!empty($heroData?->bullets) && is_array($heroData->bullets) && count($heroData->bullets) > 0) ? $heroData->bullets[0] : "Flexible Condominium Rentals at\nWealth Mansion";
        $heroImage = $heroData?->image 
            ? (str_starts_with($heroData->image, 'http') || str_starts_with($heroData->image, '/') ? $heroData->image : asset($heroData->image))
            : asset('services/propertis_leasing/available rental units/detail_img/hero_section.png');
    @endphp

    {{-- Hero image & content wrapper --}}
    <div class="relative w-full pt-[112px] min-[1161px]:pt-[120px]">
        {{-- Hero container: dynamic responsive height that shrinks on resize and caps max height --}}
        <div class="relative w-full h-[420px] sm:h-[460px] md:h-[500px] lg:h-[540px] xl:h-[580px] max-h-[600px] overflow-hidden">
            <img class="w-full h-full object-cover object-center"
                src="{{ $heroImage }}" 
                alt="{{ $heroHeadline }} - Wealth Mansion">

            {{-- Floating Hero Card Overlay --}}
            <div class="absolute inset-0 flex items-center z-10 pointer-events-none">
                <div class="w-full max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8">
                    {{-- Gold accent bar --}}
                    <div class="h-[12px] sm:h-[15px] max-w-[26rem] sm:max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
                    <div class="max-w-[620px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                        <div class="px-0 py-6 sm:py-8 lg:py-10">
                            <h2 class="flex flex-row items-center gap-3 sm:gap-4 text-[clamp(16px,2.2vw,24px)] font-normal mb-3 sm:mb-4">
                                <span class="h-[2px] w-10 sm:w-14 bg-[#F4DEAC]"></span>
                                <span class="text-[#F4DEAC] font-normal">{!! $heroTaglineHtml !!}</span>
                            </h2>

                            <h1 class="text-white px-7 sm:px-10 text-[clamp(28px,3.8vw,46px)] font-bold leading-tight mb-3 sm:mb-4">
                                {{ $heroHeadline }}
                            </h1>

                            <div class="text-white/95 px-7 sm:px-10 text-[clamp(14px,1.8vw,16px)] font-normal leading-relaxed whitespace-pre-line">
                                {!! nl2br(e($heroSubtext)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Blue Banner Section --}}
    <section class="relative w-full bg-[#2A5A8A] z-[10] h-[130px] sm:h-[180px] md:h-[230px] lg:h-[280px]">
    </section>

    @php
        // Fetch dynamic showcase text from ServiceMaximizeSection
        $showcaseData = \App\Models\ServiceMaximizeSection::where('page', 'daily-weekly-rentals-studio-room')->first();
        $showcaseTitle = $showcaseData?->title ?: 'Flexible Condominium Rentals at Wealth Mansion';
        $showcaseParagraphs = (!empty($showcaseData?->paragraphs) && is_array($showcaseData->paragraphs) && count($showcaseData->paragraphs) > 0) 
            ? $showcaseData->paragraphs 
            : ['Whether you are looking for a compact studio or a spacious three-bedroom residence, guests can choose from different unit types based on their space requirements and length of stay.'];

        // Fetch dynamic gallery photos from ProjectGallery
        $dbGallery = \App\Models\ProjectGallery::where('page', 'daily-weekly-rentals-studio-room')
            ->where('status', 'published')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $discoverItems = [];
        if ($dbGallery->count() > 0) {
            foreach ($dbGallery as $g) {
                $imgUrl = str_starts_with($g->image, 'http') || str_starts_with($g->image, '/') ? $g->image : asset($g->image);
                $discoverItems[] = [
                    'image' => $imgUrl,
                    'title' => $g->title ?: ($g->alt_text ?: 'Studio Room view')
                ];
            }
        } else {
            $rawImages = [
                asset('services/propertis_leasing/available rental units/detail_img/hero_section.png'),
                asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png'),
                asset('services/propertis_leasing/bedroom.png'),
                asset('services/propertis_leasing/all part.png'),
                asset('services/wealth_mansion/hero_img/wealth-mainson-recovered.png'),
                asset('services/propertis_leasing/available rental units/detail_img/hero_section.png'),
                asset('services/propertis_leasing/bedroom.png'),
            ];
            foreach ($rawImages as $idx => $raw) {
                $discoverItems[] = [
                    'image' => $raw,
                    'title' => 'Studio Room view ' . ($idx + 1)
                ];
            }
        }
    @endphp

    {{-- Flexible Condominium Rentals at Wealth Mansion Section --}}
    <section class="relative z-[30] bg-transparent px-6 sm:px-10 lg:px-14 pb-16 lg:pb-24 -mt-[90px] sm:-mt-[130px] lg:-mt-[200px] overflow-x-clip">
        <div class="max-w-[1400px] mx-auto">

            {{-- Top Row on Desktop: Carousel Track on the Left, Nav Arrows on the Right --}}
            <div class="flex flex-col lg:flex-row items-start justify-between gap-6 lg:gap-10 h-auto lg:h-[600px]">

                {{-- Image Carousel Wrapper (Fixed height so scaling never pushes bottom content) --}}
                <div id="studio-carousel-height-wrapper"
                    data-scroll-reveal="right"
                    class="w-full lg:flex-1 lg:max-w-[75%] overflow-visible h-[340px] sm:h-[420px] lg:h-[600px] lg:pt-24 xl:pt-28 order-2 lg:order-1">

                    {{-- Image Track: scrollable with hidden scrollbars, aligned to top so hover scales down and pushes neighbors smoothly --}}
                    <div id="studio-carousel-track"
                        class="flex flex-row flex-nowrap items-start justify-start gap-4 sm:gap-5 lg:gap-6 min-w-0 w-full h-full overflow-x-auto scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden pt-2 pb-4">
                        @foreach ($discoverItems as $index => $item)
                            <button type="button"
                                data-base="w-[200px] sm:w-[220px] lg:w-[200px] xl:w-[210px] h-[200px] sm:h-[240px] lg:h-[250px] shrink-0 min-w-0 self-start bg-[#d9d9d9]"
                                data-active-classes="w-[300px] sm:w-[360px] lg:w-[380px] xl:w-[400px] h-[320px] sm:h-[400px] lg:h-[450px] shrink-0 min-w-0 self-start bg-[#d9d9d9] shadow-2xl z-10"
                                class="studio-carousel-item relative overflow-hidden rounded-none shadow-md transform-gpu
                                transition-[width,height,transform,box-shadow] duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] cursor-pointer
                                focus:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                                w-[200px] sm:w-[220px] lg:w-[200px] xl:w-[210px] h-[200px] sm:h-[240px] lg:h-[250px] shrink-0 min-w-0 self-start bg-[#d9d9d9]"
                                data-index="{{ $index }}"
                                data-src="{{ $item['image'] }}"
                                aria-label="{{ $item['title'] }}"
                                aria-current="false">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                    class="w-full h-full object-cover object-center transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] transform-gpu">
                            </button>
                        @endforeach
                    </div>

                </div>

                {{-- Right Navigation Arrows & Title Area --}}
                <div class="flex flex-col items-end lg:items-start shrink-0 w-full lg:w-auto lg:max-w-[280px] xl:max-w-[340px] order-1 lg:order-2 pt-[110px] sm:pt-[140px] lg:pt-[220px] xl:pt-[230px]" data-scroll-reveal="left">
                    {{-- Nav Buttons --}}
                    <div class="flex items-center gap-3 mt-4 sm:mt-6 lg:mt-0 mb-6 sm:mb-8 lg:mb-10 self-end lg:self-start">
                        <button id="studio-carousel-prev" type="button" aria-label="Previous image"
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] bg-white flex items-center justify-center cursor-pointer
                            transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105 shadow-sm
                            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                            disabled:cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="studio-carousel-next" type="button" aria-label="Next image"
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border-[1.5px] border-[#2A5A8A] text-[#2A5A8A] bg-white flex items-center justify-center cursor-pointer
                            transition-all duration-300 hover:bg-[#2A5A8A] hover:text-white hover:scale-105 shadow-sm
                            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2A5A8A] focus-visible:ring-offset-2
                            disabled:cursor-not-allowed">
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
                @foreach ($showcaseParagraphs as $p)
                    <p class="text-black/80 text-[13.5px] sm:text-[14.5px] leading-relaxed mb-3">
                        {{ $p }}
                    </p>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Fullscreen Image Lightbox Modal with sliding side previews --}}
    <div id="studio-lightbox-modal"
        class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/92 backdrop-blur-md opacity-0 transition-opacity duration-300 ease-in-out p-2 sm:p-4 lg:p-8 select-none"
        role="dialog" aria-modal="true" aria-label="Image Preview">
        
        {{-- Close Button --}}
        <button id="studio-lightbox-close" type="button" aria-label="Close preview"
            class="absolute top-4 right-4 sm:top-6 sm:right-6 z-50 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center cursor-pointer transition-all duration-200 hover:scale-105 border border-white/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Previous Button (Desktop / Tablet floating on side, Mobile positioned cleanly) --}}
        <button id="studio-lightbox-prev" type="button" aria-label="Previous image"
            class="absolute left-1.5 sm:left-4 lg:left-6 top-1/2 -translate-y-1/2 z-50 w-9 h-9 sm:w-11 sm:h-11 lg:w-13 lg:h-13 rounded-full bg-black/70 hover:bg-[#2A5A8A] text-white flex items-center justify-center cursor-pointer transition-all duration-200 hover:scale-110 border border-white/20 shadow-xl disabled:cursor-not-allowed">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        {{-- Next Button (Desktop / Tablet floating on side, Mobile positioned cleanly) --}}
        <button id="studio-lightbox-next" type="button" aria-label="Next image"
            class="absolute right-1.5 sm:right-4 lg:right-6 top-1/2 -translate-y-1/2 z-50 w-9 h-9 sm:w-11 sm:h-11 lg:w-13 lg:h-13 rounded-full bg-black/70 hover:bg-[#2A5A8A] text-white flex items-center justify-center cursor-pointer transition-all duration-200 hover:scale-110 border border-white/20 shadow-xl disabled:cursor-not-allowed">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        {{-- Gallery Stage (Left Preview + Center Focused Image + Right Preview) --}}
        <div class="relative flex items-center justify-center gap-3 sm:gap-6 lg:gap-8 w-full max-w-[96vw] max-h-[85vh] px-9 sm:px-14 md:px-0 select-none" id="studio-lightbox-content">
            
            {{-- Left Preview Image (Smaller + Light Opacity) --}}
            <div id="studio-lightbox-prev-card"
                class="hidden md:flex flex-col items-center justify-center shrink-0 w-[14vw] lg:w-[16vw] max-h-[50vh] opacity-35 hover:opacity-80 transition-all duration-300 transform scale-80 cursor-pointer pointer-events-auto group">
                <img id="studio-lightbox-prev-img" src="" alt="Previous View Preview"
                    class="w-full max-h-[45vh] object-contain rounded shadow-lg transition-all duration-300 group-hover:scale-105 filter brightness-90">
            </div>

            {{-- Main Focused Center Image Container --}}
            <div class="relative flex flex-col items-center justify-center shrink-0 w-full max-w-full md:max-w-[62vw] lg:max-w-[58vw] max-h-[82vh] z-20">
                <img id="studio-lightbox-img" src="" alt="Wealth Mansion Studio Full View"
                    class="max-w-full max-h-[65vh] sm:max-h-[72vh] lg:max-h-[75vh] w-auto h-auto object-contain rounded shadow-2xl transition-all duration-350 ease-out transform scale-100 opacity-100 will-change-transform">
                
                {{-- Caption / Counter --}}
                <div class="mt-4 flex items-center justify-between w-full px-2 text-white/90 text-sm font-medium">
                    <span id="studio-lightbox-title">Wealth Mansion Studio</span>
                    <span id="studio-lightbox-counter" class="bg-white/15 px-3 py-1 rounded-full text-xs font-semibold text-white"></span>
                </div>
            </div>

            {{-- Right Preview Image (Smaller + Light Opacity) --}}
            <div id="studio-lightbox-next-card"
                class="hidden md:flex flex-col items-center justify-center shrink-0 w-[14vw] lg:w-[16vw] max-h-[50vh] opacity-35 hover:opacity-80 transition-all duration-300 transform scale-80 cursor-pointer pointer-events-auto group">
                <img id="studio-lightbox-next-img" src="" alt="Next View Preview"
                    class="w-full max-h-[45vh] object-contain rounded shadow-lg transition-all duration-300 group-hover:scale-105 filter brightness-90">
            </div>

        </div>
    </div>

    @once
        <script>
            (function() {
                function initStudioCarousel() {
                    const track = document.getElementById("studio-carousel-track");
                    if (!track) return;

                    const items = Array.from(track.querySelectorAll(".studio-carousel-item"));
                    if (!items.length) return;

                    const prevBtn = document.getElementById("studio-carousel-prev");
                    const nextBtn = document.getElementById("studio-carousel-next");

                    const itemClassSets = items.map((item) => ({
                        base: item.dataset.base.split(/\s+/).filter(Boolean),
                        active: item.dataset.activeClasses.split(/\s+/).filter(Boolean),
                    }));

                    // Lightbox Elements
                    const lightbox = document.getElementById("studio-lightbox-modal");
                    const lightboxImg = document.getElementById("studio-lightbox-img");
                    const lightboxPrevImg = document.getElementById("studio-lightbox-prev-img");
                    const lightboxNextImg = document.getElementById("studio-lightbox-next-img");
                    const lightboxPrevCard = document.getElementById("studio-lightbox-prev-card");
                    const lightboxNextCard = document.getElementById("studio-lightbox-next-card");
                    const lightboxCounter = document.getElementById("studio-lightbox-counter");
                    const lightboxTitle = document.getElementById("studio-lightbox-title");
                    const lightboxClose = document.getElementById("studio-lightbox-close");
                    const lightboxPrev = document.getElementById("studio-lightbox-prev");
                    const lightboxNext = document.getElementById("studio-lightbox-next");
                    const lightboxContent = document.getElementById("studio-lightbox-content");

                    const imageUrls = items.map((item) => item.dataset.src);
                    let currentLightboxIndex = 0;
                    let isLightboxAnimating = false;

                    // Hover scale & mouseleave reset with rAF synchronization
                    let currentRaf = null;

                    function resetAllToBase() {
                        if (currentRaf) cancelAnimationFrame(currentRaf);
                        currentRaf = requestAnimationFrame(() => {
                            items.forEach((item, index) => {
                                const { base, active } = itemClassSets[index];
                                item.classList.remove(...active);
                                item.classList.add(...base);
                                item.setAttribute("aria-current", "false");
                            });
                        });
                    }

                    function scaleCard(targetIndex) {
                        if (currentRaf) cancelAnimationFrame(currentRaf);
                        currentRaf = requestAnimationFrame(() => {
                            items.forEach((item, index) => {
                                const { base, active } = itemClassSets[index];
                                const isHovered = index === targetIndex;
                                item.classList.remove(...(isHovered ? base : active));
                                item.classList.add(...(isHovered ? active : base));
                                item.setAttribute("aria-current", isHovered ? "true" : "false");
                            });
                        });
                    }

                    let hoverTimer = null;
                    items.forEach((item, index) => {
                        // When hovered: scale card to active size
                        item.addEventListener("mouseenter", () => {
                            clearTimeout(hoverTimer);
                            hoverTimer = setTimeout(() => {
                                scaleCard(index);
                            }, 16);
                        });

                        // When mouse leaves card: reset back to original size
                        item.addEventListener("mouseleave", () => {
                            clearTimeout(hoverTimer);
                            hoverTimer = setTimeout(() => {
                                resetAllToBase();
                            }, 30);
                        });

                        // When clicked: open fullscreen lightbox modal
                        item.addEventListener("click", () => {
                            clearTimeout(hoverTimer);
                            openLightbox(index);
                        });
                    });

                    // If mouse leaves the track completely: reset to original size
                    track.addEventListener("mouseleave", () => {
                        clearTimeout(hoverTimer);
                        resetAllToBase();
                    });

                    // Carousel Scroll Movement
                    function getStep() {
                        const firstItem = items[0];
                        const gap = 24; // corresponds to gap-6
                        return firstItem ? firstItem.getBoundingClientRect().width + gap : 300;
                    }

                    function scrollTrack(direction) {
                        const step = getStep();
                        track.scrollBy({
                            left: direction * step,
                            behavior: "smooth"
                        });
                    }

                    function updateButtons() {
                        const atStart = track.scrollLeft <= 5;
                        const atEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 5;

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
                    }

                    if (prevBtn) prevBtn.addEventListener("click", () => scrollTrack(-1));
                    if (nextBtn) nextBtn.addEventListener("click", () => scrollTrack(1));

                    track.addEventListener("scroll", updateButtons, { passive: true });
                    window.addEventListener("resize", updateButtons);
                    updateButtons();

                    // Lightbox Modal Functions with Directional Slide Transitions
                    function updateLightboxImage(index, direction = 0) {
                        const total = imageUrls.length;
                        if (index < 0) index = 0;
                        if (index >= total) index = total - 1;
                        if (index === currentLightboxIndex && direction !== 0) return;

                        currentLightboxIndex = index;
                        const hasPrev = currentLightboxIndex > 0;
                        const hasNext = currentLightboxIndex < total - 1;

                        if (direction !== 0 && lightboxImg) {
                            // direction > 0 means Right button clicked -> slide image left (-70px)
                            // direction < 0 means Left button clicked -> slide image right (+70px)
                            const exitX = direction > 0 ? "-70px" : "70px";
                            const enterX = direction > 0 ? "70px" : "-70px";

                            isLightboxAnimating = true;
                            lightboxImg.style.transition = "transform 220ms cubic-bezier(0.25, 1, 0.5, 1), opacity 220ms ease-in";
                            lightboxImg.style.transform = `translateX(${exitX}) scale(0.95)`;
                            lightboxImg.style.opacity = "0.2";

                            setTimeout(() => {
                                lightboxImg.style.transition = "none";
                                lightboxImg.src = imageUrls[currentLightboxIndex];
                                lightboxImg.style.transform = `translateX(${enterX}) scale(0.95)`;
                                lightboxImg.style.opacity = "0.2";
                                void lightboxImg.offsetWidth; // Force DOM reflow

                                lightboxImg.style.transition = "transform 320ms cubic-bezier(0.25, 1, 0.5, 1), opacity 320ms ease-out";
                                lightboxImg.style.transform = "translateX(0px) scale(1)";
                                lightboxImg.style.opacity = "1";

                                setTimeout(() => {
                                    isLightboxAnimating = false;
                                }, 320);
                            }, 180);
                        } else if (lightboxImg) {
                            // Instant initial setup on open
                            lightboxImg.style.transition = "none";
                            lightboxImg.src = imageUrls[currentLightboxIndex];
                            lightboxImg.style.transform = "translateX(0px) scale(1)";
                            lightboxImg.style.opacity = "1";
                        }

                        // Left Preview Image & Button
                        if (lightboxPrevCard) {
                            if (hasPrev) {
                                lightboxPrevCard.style.display = "flex";
                                lightboxPrevCard.style.opacity = "0.35";
                                lightboxPrevCard.style.pointerEvents = "auto";
                                if (lightboxPrevImg) lightboxPrevImg.src = imageUrls[currentLightboxIndex - 1];
                            } else {
                                lightboxPrevCard.style.display = "none";
                                lightboxPrevCard.style.pointerEvents = "none";
                            }
                        }
                        if (lightboxPrev) {
                            lightboxPrev.disabled = !hasPrev;
                            lightboxPrev.style.opacity = hasPrev ? "1" : "0";
                            lightboxPrev.style.pointerEvents = hasPrev ? "auto" : "none";
                        }

                        // Right Preview Image & Button
                        if (lightboxNextCard) {
                            if (hasNext) {
                                lightboxNextCard.style.display = "flex";
                                lightboxNextCard.style.opacity = "0.35";
                                lightboxNextCard.style.pointerEvents = "auto";
                                if (lightboxNextImg) lightboxNextImg.src = imageUrls[currentLightboxIndex + 1];
                            } else {
                                lightboxNextCard.style.display = "none";
                                lightboxNextCard.style.pointerEvents = "none";
                            }
                        }
                        if (lightboxNext) {
                            lightboxNext.disabled = !hasNext;
                            lightboxNext.style.opacity = hasNext ? "1" : "0";
                            lightboxNext.style.pointerEvents = hasNext ? "auto" : "none";
                        }

                        if (lightboxCounter) {
                            lightboxCounter.textContent = `${currentLightboxIndex + 1} / ${total}`;
                        }
                    }

                    function openLightbox(index) {
                        if (!lightbox) return;
                        updateLightboxImage(index, 0);
                        lightbox.classList.remove("hidden");
                        lightbox.classList.add("flex");
                        document.body.style.overflow = "hidden";
                        
                        requestAnimationFrame(() => {
                            lightbox.style.opacity = "1";
                        });
                    }

                    function closeLightbox() {
                        if (!lightbox) return;
                        lightbox.style.opacity = "0";
                        document.body.style.overflow = "";
                        
                        setTimeout(() => {
                            lightbox.classList.remove("flex");
                            lightbox.classList.add("hidden");
                        }, 300);
                    }

                    // Lightbox Nav Controls & Preview Clicks
                    if (lightboxPrev) lightboxPrev.addEventListener("click", (e) => {
                        e.stopPropagation();
                        if (currentLightboxIndex > 0 && !isLightboxAnimating) {
                            updateLightboxImage(currentLightboxIndex - 1, -1);
                        }
                    });

                    if (lightboxNext) lightboxNext.addEventListener("click", (e) => {
                        e.stopPropagation();
                        if (currentLightboxIndex < imageUrls.length - 1 && !isLightboxAnimating) {
                            updateLightboxImage(currentLightboxIndex + 1, 1);
                        }
                    });

                    if (lightboxPrevCard) lightboxPrevCard.addEventListener("click", (e) => {
                        e.stopPropagation();
                        if (currentLightboxIndex > 0 && !isLightboxAnimating) {
                            updateLightboxImage(currentLightboxIndex - 1, -1);
                        }
                    });

                    if (lightboxNextCard) lightboxNextCard.addEventListener("click", (e) => {
                        e.stopPropagation();
                        if (currentLightboxIndex < imageUrls.length - 1 && !isLightboxAnimating) {
                            updateLightboxImage(currentLightboxIndex + 1, 1);
                        }
                    });

                    if (lightboxClose) lightboxClose.addEventListener("click", (e) => {
                        e.stopPropagation();
                        closeLightbox();
                    });

                    if (lightbox) {
                        lightbox.addEventListener("click", (e) => {
                            if (!lightboxContent.contains(e.target) && !e.target.closest("button")) {
                                closeLightbox();
                            }
                        });
                    }

                    // Keyboard shortcuts for Lightbox
                    window.addEventListener("keydown", (e) => {
                        if (!lightbox || lightbox.classList.contains("hidden")) return;
                        if (e.key === "Escape") closeLightbox();
                        if (e.key === "ArrowLeft" && currentLightboxIndex > 0 && !isLightboxAnimating) {
                            updateLightboxImage(currentLightboxIndex - 1, -1);
                        }
                        if (e.key === "ArrowRight" && currentLightboxIndex < imageUrls.length - 1 && !isLightboxAnimating) {
                            updateLightboxImage(currentLightboxIndex + 1, 1);
                        }
                    });
                }

                if (document.readyState === "loading") {
                    document.addEventListener("DOMContentLoaded", initStudioCarousel);
                } else {
                    initStudioCarousel();
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
    <section class="mt-8 sm:mt-16 md:mt-24 pb-12 sm:pb-24">
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
