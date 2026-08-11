@extends('layouts.app')
@section('content')
    <section class="text-[3rem] text-[#ac1b1b] mt-[20rem]">
        <div>This is the about us</div>

        {{-- Featured Properties: background image layer + card content layer, cards can extend above image's top edge --}}

        @php
            $properties = [
                [
                    'image' => asset('home/latest_activities/1img.png'),
                    'title' => 'Wealth Mansion Ohio Oajldflkd',
                    'description' =>
                        'Premium condominium development offering modern residential units with excellent city access.',
                    'link' => url('/properties/wealth-mansion'),
                ],
                [
                    'image' => asset('home/latest_activities/2img.png'),
                    'title' => 'Private Residential Collection',
                    'description' =>
                        'Professionally managed condominium units including premium residences and penthouses.',
                    'link' => url('/properties/private-residential-collection'),
                ],
                [
                    'image' => asset('home/latest_activities/3img.png'),
                    'title' => 'UC88 Residence',
                    'description' =>
                        "Comfortable condominium living with convenient access to Phnom Penh's business districts.",
                    'link' => url('/properties/uc88-residence'),
                ],

                [
                    'image' => asset('home/latest_activities/1img.png'),
                    'title' => 'Wealth Mansion',
                    'description' =>
                        'Premium condominium development offering modern residential units with excellent city access.',
                    'link' => url('/properties/wealth-mansion'),
                ],
                [
                    'image' => asset('home/latest_activities/2img.png'),
                    'title' => 'Private Residential Collection',
                    'description' =>
                        'Professionally managed condominium units including premium residences and penthouses.',
                    'link' => url('/properties/private-residential-collection'),
                ],
            ];
        @endphp

        <section class="relative w-full min-h-[620px] sm:min-h-[680px] md:min-h-[760px] lg:min-h-[820px]">

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
                    <h2 class="text-white text-[clamp(20px,3vw,30px)] leading-tight">
                        <span class="font-normal block">Featured</span>
                        <span class="font-bold block">Properties</span>
                    </h2>
                    <div class="flex items-center gap-3">
                        <button id="cwd-prop-prev-mobile" type="button" aria-label="Previous property"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="cwd-prop-next-mobile" type="button" aria-label="Next property"
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Cards layer --}}
                <div
                    class="relative z-20 pt-24 sm:pt-28 lg:pt-[2vw] lg:-translate-y-[clamp(60px,9vw,140px)] pointer-events-none">
                    <div id="cwd-prop-track"
                        class="cwd-prop-track-fade pointer-events-auto flex gap-5 overflow-x-auto scroll-smooth pl-4 sm:pl-6 pr-4 sm:pr-6 lg:pr-[320px] pb-2 snap-x snap-mandatory [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">

                        @foreach ($properties as $property)
                            <article
                                class="cwd-prop-card shrink-0 snap-start w-[260px] sm:w-[280px] bg-white shadow-sm cursor-pointer">

                                <div class="h-[170px] w-full overflow-hidden">
                                    <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}"
                                        class="w-full h-full object-cover">
                                </div>

                                <div class="px-5 py-5">
                                    <h3 class="text-black text-[15px] font-bold mb-2 leading-snug">
                                        {{ $property['title'] }}
                                    </h3>
                                    <p class="text-black/70 text-[12.5px] leading-relaxed mb-4">
                                        {{ $property['description'] }}
                                    </p>
                                    <a href="{{ $property['link'] }}"
                                        class="text-[#2A5A8A] text-[12px] font-semibold inline-flex items-center gap-1 hover:underline">
                                        View Property <span aria-hidden="true">→</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>

                {{-- Featured Properties heading + navigation --}}
                <div
                    class="hidden lg:flex flex-col items-start justify-start gap-10 w-[300px] absolute right-0 top-0 px-10 py-8 z-30">
                    <div class="flex items-center gap-3">
                        <button id="cwd-prop-prev" type="button" aria-label="Previous property"
                            class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center cursor-pointer hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="cwd-prop-next" type="button" aria-label="Next property"
                            class="w-11 h-11 rounded-full border-[1.5px] border-[#F4DEAC] text-[#F4DEAC] flex items-center justify-center cursor-pointer hover:bg-[#F4DEAC] hover:text-[#2A5A8A] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <h2 class="text-white -z-1 text-[clamp(24px,2.4vw,34px)] leading-tight">
                        <span class="font-normal block">Featured</span>
                        <span class="font-bold block">Properties</span>
                    </h2>
                </div>

                <div class="h-10 sm:h-14 lg:h-24"></div>

            </div>

        </section>

     
        <script>
            (function() {
                const track = document.getElementById('cwd-prop-track');
                const prevBtns = [document.getElementById('cwd-prop-prev'), document.getElementById('cwd-prop-prev-mobile')]
                    .filter(Boolean);
                const nextBtns = [document.getElementById('cwd-prop-next'), document.getElementById('cwd-prop-next-mobile')]
                    .filter(Boolean);

                console.log('[carousel] track found:', !!track, 'prevBtns:', prevBtns.length, 'nextBtns:', nextBtns.length);

                if (!track) return;

                const cards = Array.from(track.querySelectorAll('.cwd-prop-card'));
                console.log('[carousel] cards found:', cards.length);
                if (!cards.length) return;

                function getMaxScroll() {
                    return Math.max(0, track.scrollWidth - track.clientWidth);
                }

                function getCardPositions() {
                    const trackRect = track.getBoundingClientRect();
                    return cards.map(card => {
                        const cardRect = card.getBoundingClientRect();
                        return (cardRect.left - trackRect.left) + track.scrollLeft;
                    });
                }

                function getCurrentIndex() {
                    const positions = getCardPositions();
                    let closest = 0;
                    let closestDiff = Infinity;
                    positions.forEach((pos, i) => {
                        const diff = Math.abs(pos - track.scrollLeft);
                        if (diff < closestDiff) {
                            closestDiff = diff;
                            closest = i;
                        }
                    });
                    return closest;
                }

                function scrollToIndex(index) {
                    const positions = getCardPositions();
                    const maxScroll = getMaxScroll();
                    const clampedIndex = Math.max(0, Math.min(index, positions.length - 1));
                    const target = Math.max(0, Math.min(positions[clampedIndex], maxScroll));
                    console.log('[carousel] scrollToIndex', index, '-> clamped', clampedIndex, 'target', target,
                        'currentScrollLeft', track.scrollLeft);
                    track.scrollTo({
                        left: target,
                        behavior: 'smooth'
                    });
                }

                function updateButtons() {
                    const maxScroll = getMaxScroll();
                    const tolerance = 4;
                    const atStart = track.scrollLeft <= tolerance;
                    const atEnd = track.scrollLeft >= maxScroll - tolerance;

                    prevBtns.forEach(btn => btn.classList.toggle('opacity-40', atStart));
                    nextBtns.forEach(btn => btn.classList.toggle('opacity-40', atEnd));
                }

                prevBtns.forEach(btn => btn.addEventListener('click', function() {
                    console.log('[carousel] PREV clicked');
                    const current = getCurrentIndex();
                    scrollToIndex(current - 1);
                }));

                nextBtns.forEach(btn => btn.addEventListener('click', function() {
                    console.log('[carousel] NEXT clicked');
                    const current = getCurrentIndex();
                    scrollToIndex(current + 1);
                }));

                track.addEventListener('scroll', updateButtons, {
                    passive: true
                });
                window.addEventListener('resize', updateButtons);
                updateButtons();

                cards.forEach(function(card, i) {
                    card.addEventListener('click', function(e) {
                        if (e.target.closest('a')) return;
                        scrollToIndex(i);
                    });
                });
            })();
        </script>
    </section>
@endsection
