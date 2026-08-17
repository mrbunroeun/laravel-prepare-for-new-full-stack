@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[850px] max-[1240px]:min-h-[700px] max-[740px]:min-h-[580px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="Partner Hero">
    </section>

    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] mt-0 lg:mt-[-5rem] mb-0 pb-8 sm:pb-12 lg:pb-16 text-[#2f6ba7] pointer-events-none">
        <div class="relative pt-[20rem] max-[1240px]:pt-[13rem] max-[1024px]:pt-[10.5rem] max-[740px]:pt-[8rem] max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Main Hero Text Box --}}
            <div class="relative z-[260] max-w-[720px]" data-scroll-reveal="left">
                {{-- Gold accent bar --}}
                <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                <div class="bg-[#163049]/85 mix-blend-multiply py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,2.5vw,28px)] font-normal mb-6">
                        <span class="h-[2px] w-12 sm:w-16 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC] text-[clamp(22px,2.8vw,32px)] font-normal">Partners</span>
                    </h2>

                    <h1 class="text-white px-6 sm:px-10 text-[clamp(19px,3vw,34px)] font-medium leading-snug mb-6 max-w-[90%] sm:max-w-none">
                        Build Your Career in Real Estate<br>
                        with <strong class="font-bold text-white">CWD</strong> Real Estate Agent &amp;<br>
                        Developer
                    </h1>

                    <p class="text-[#EBD4A4] text-[13px] sm:text-[14.5px] px-6 sm:px-10 mb-8 font-light tracking-wide leading-relaxed">
                        <span class="block lg:inline">• Flexible income • Strong brand</span>
                        <span class="block lg:inline lg:ml-2">• Real projects • Full sales support</span>
                    </p>

                    <div class="flex items-center px-6 sm:px-10 gap-4 pointer-events-auto">
                        <a href="{{ url('/contact-us') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-medium px-6 sm:px-8 py-3 hover:bg-[#ffffff] hover:text-[#163049] transition-colors">
                            Apply As Sale Agent
                        </a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Man Partner Image (shifted further left, strict max-w-[336px] and max-h-[504px], locked to bottom) --}}
        <div class="absolute right-6 sm:right-14 md:right-24 lg:right-[18%] xl:right-[25%] 2xl:right-[30%] bottom-0 z-[270] pointer-events-none flex justify-end" data-scroll-reveal="right">
            <img src="{{ asset('partner/man_partner.png') }}" alt="CWD Real Estate Agent"
                class="block w-[140px] sm:w-[190px] md:w-[250px] lg:w-[336px] max-w-[336px] max-h-[504px] h-auto object-contain object-bottom drop-shadow-2xl">
        </div>
    </section>


    {{-- Your Role as a Sales Partner --}}
    @php
        $roles = [
            [
                'number' => '01',
                'line1' => 'Introduce (potential) buyers to',
                'line2' => 'CWD projects',
            ],
            [
                'number' => '02',
                'line1' => 'Promote projects online',
                'line2' => 'or offline',
            ],
            [
                'number' => '03',
                'line1' => 'Arrange site visits',
                'line2' => '(with company support)',
            ],
            [
                'number' => '04',
                'line1' => 'Assist buyers through booking',
                'line2' => 'and documentation',
            ],
            [
                'number' => '05',
                'line1' => 'Earn commission upon',
                'line2' => 'successful sales',
            ],
            [
                'number' => '06',
                'line1' => 'No office commitment required.',
                'line2' => 'Performance based income.',
            ],
        ];
    @endphp

    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white py-12 sm:py-16">
        <div class="max-w-[1080px] mx-auto px-6">

            {{-- Heading Centered (2 rows) --}}
            <h2 class="text-center text-[clamp(26px,3.2vw,36px)] leading-tight mb-8 sm:mb-12" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Your Role as a</span>
                <span class="text-[#2A5A8A] font-bold block">Sales Partner</span>
            </h2>

            {{-- Cards Grid (3 columns on desktop, 2 on tablet, 1 on mobile) --}}
            <div id="sales-partner-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 items-stretch">
                @foreach ($roles as $index => $role)
                    @php
                        $dir = ($index % 3 === 0) ? 'left' : (($index % 3 === 1) ? 'fade-up' : 'right');
                    @endphp
                    <div
                        data-scroll-reveal="{{ $dir }}"
                        data-scroll-delay="{{ ($index % 3) * 100 }}"
                        class="sales-partner-card group h-full w-full flex flex-col justify-start px-6 py-6 sm:px-7 sm:py-6 bg-white border-[1.8px] border-[#1479B9] hover:bg-[#1479B9] transition-all duration-200">
                        <span
                            class="text-[30px] sm:text-[34px] font-bold leading-none mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $role['number'] }}
                        </span>
                        <p
                            class="text-[14px] sm:text-[15px] leading-snug text-black group-hover:text-white transition-colors duration-200 font-normal">
                            <span class="block">{{ $role['line1'] }}</span>
                            <span class="block">{{ $role['line2'] }}</span>
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeSalesPartnerCardHeights() {
                    var cards = document.querySelectorAll('#sales-partner-grid .sales-partner-card');
                    if (!cards.length) return;

                    cards.forEach(function(card) {
                        card.style.height = 'auto';
                    });

                    var tallest = 0;
                    cards.forEach(function(card) {
                        var cardHeight = card.getBoundingClientRect().height;
                        if (cardHeight > tallest) {
                            tallest = cardHeight;
                        }
                    });

                    cards.forEach(function(card) {
                        card.style.height = tallest + 'px';
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', equalizeSalesPartnerCardHeights);
                } else {
                    equalizeSalesPartnerCardHeights();
                }

                var resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(equalizeSalesPartnerCardHeights, 150);
                });

                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeSalesPartnerCardHeights);
                }
            })();
        </script>
    @endonce

    {{-- We Support You With ... --}}
    @php
        $supportItems = [
            [
                'icon' => 'partner/we support you/project brochures.svg',
                'title' => 'Project brochures & price lists',
            ],
            [
                'icon' => 'partner/we support you/legal ownership.svg',
                'title' => 'Legal ownership information',
            ],
            [
                'icon' => 'partner/we support you/on-site sales.svg',
                'title' => 'On-site sales team assistance',
            ],
            [
                'icon' => 'partner/we support you/sales scripts.svg',
                'title' => 'Sales scripts & training',
            ],
            [
                'icon' => 'partner/we support you/marketing photos.svg',
                'title' => 'Marketing photos & videos',
            ],
            [
                'icon' => 'partner/we support you/customer service.svg',
                'title' => 'Customer service & document handling',
            ],
        ];
    @endphp

    <section class="relative z-[300] bg-white py-12 sm:py-16 lg:py-20 overflow-visible">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Container with overlapping girl image --}}
            <div class="relative pt-12 lg:pt-24">

                {{-- Girl Image (Desktop: Anchored on far left, overlaps into the 80% blue box) --}}
                <div class="hidden lg:block absolute left-[-35px] xl:left-[-25px] 2xl:left-[-15px] bottom-0 z-20 pointer-events-none" data-scroll-reveal="left">
                    <img src="{{ asset('partner/girl_partner.png') }}" alt="CWD Support Partner"
                        class="block w-[420px] xl:w-[480px] 2xl:w-[530px] max-w-[560px] max-h-[640px] xl:max-h-[700px] h-auto object-contain object-bottom drop-shadow-2xl">
                </div>

                {{-- ~80% Width Blue Box (Aligned to Right) --}}
                <div class="w-full lg:w-[82%] xl:w-[80%] lg:ml-auto" data-scroll-reveal="right">

                    {{-- Gold Accent Bar (Top Right of Blue Box) --}}
                    <div class="flex justify-end">
                        <div class="h-[12px] sm:h-[15px] w-full max-w-[500px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    </div>

                    {{-- Dark Blue Card --}}
                    <div class="relative bg-[#2A5A8A] px-6 py-10 sm:px-10 sm:py-12 lg:py-14 lg:pr-8 xl:pr-12 lg:pl-[210px] xl:pl-[260px]">

                        {{-- Content Area --}}
                        <div class="relative z-10">

                            {{-- Mobile / Tablet Girl Image (visible on < lg) --}}
                            <div class="block lg:hidden mb-8 flex justify-center">
                                <img src="{{ asset('partner/girl_partner.png') }}" alt="CWD Support Partner"
                                    class="w-[190px] sm:w-[230px] max-w-[500px] max-h-[500px] object-contain object-bottom drop-shadow-xl">
                            </div>

                            {{-- Section Title --}}
                            <h2 class="text-[#F4DEAC] text-[clamp(24px,3.2vw,34px)] font-normal leading-tight mb-8 sm:mb-10 text-center lg:text-left">
                                We Support You<br>
                                <span class="font-light text-[#F4DEAC]">With ...</span>
                            </h2>

                            {{-- 3-Column Grid of Support Items --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8 sm:gap-x-8 sm:gap-y-10">
                                @foreach ($supportItems as $item)
                                    <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
                                        <div class="h-9 w-9 sm:h-10 sm:w-10 mb-3 flex items-center justify-center lg:justify-start">
                                            <img src="{{ asset($item['icon']) }}" alt="{{ $item['title'] }}"
                                                class="max-h-full max-w-full object-contain">
                                        </div>
                                        <p class="text-white text-[13px] sm:text-[14px] leading-snug font-light max-w-[160px]">
                                            {{ $item['title'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
<!-- auto move -->
    <x-auto_move.auto_move />

    {{-- Commission & Rewards --}}
    @php
        $rewards = [
            [
                'number' => '01',
                'line1' => 'Competitive commission',
                'line2' => 'per unit sold',
            ],
            [
                'number' => '02',
                'line1' => 'Performance bonuses for',
                'line2' => 'high achievers',
            ],
            [
                'number' => '03',
                'line1' => 'Special incentives during',
                'line2' => 'project launches',
            ],
            [
                'number' => '04',
                'line1' => 'Transparent tracking &',
                'line2' => 'fast payment',
            ],
        ];
    @endphp

    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white py-12 sm:py-16">
        <div class="max-w-[1200px] mx-auto px-6">

            {{-- Heading Centered --}}
            <h2 class="text-center text-[clamp(26px,3.2vw,36px)] text-[#2A5A8A] font-medium leading-tight mb-8 sm:mb-12" data-scroll-reveal="left">
                Commission &amp; Rewards
            </h2>

            {{-- Cards Grid (4 columns on desktop, 2 on tablet, 1 on mobile) --}}
            <div id="commission-rewards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 items-stretch">
                @foreach ($rewards as $index => $reward)
                    @php
                        $dir = $index < 2 ? 'left' : 'right';
                    @endphp
                    <div
                        data-scroll-reveal="{{ $dir }}"
                        data-scroll-delay="{{ ($index % 2) * 100 }}"
                        class="commission-reward-card group h-full w-full flex flex-col justify-start px-6 py-6 sm:px-6 sm:py-6 bg-white border-[1.8px] border-[#1479B9] hover:bg-[#1479B9] transition-all duration-200">
                        <span
                            class="text-[30px] sm:text-[34px] font-bold leading-none mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $reward['number'] }}
                        </span>
                        <p
                            class="text-[14px] sm:text-[15px] leading-snug text-black group-hover:text-white transition-colors duration-200 font-normal">
                            <span class="block">{{ $reward['line1'] }}</span>
                            <span class="block">{{ $reward['line2'] }}</span>
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeCommissionRewardCardHeights() {
                    var cards = document.querySelectorAll('#commission-rewards-grid .commission-reward-card');
                    if (!cards.length) return;

                    cards.forEach(function(card) {
                        card.style.height = 'auto';
                    });

                    var tallest = 0;
                    cards.forEach(function(card) {
                        var cardHeight = card.getBoundingClientRect().height;
                        if (cardHeight > tallest) {
                            tallest = cardHeight;
                        }
                    });

                    cards.forEach(function(card) {
                        card.style.height = tallest + 'px';
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', equalizeCommissionRewardCardHeights);
                } else {
                    equalizeCommissionRewardCardHeights();
                }

                var resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(equalizeCommissionRewardCardHeights, 150);
                });

                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeCommissionRewardCardHeights);
                }
            })();
        </script>
    @endonce

    {{-- Application Form --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white py-12 sm:py-16 lg:py-20">
        <div class="max-w-[1000px] mx-auto px-6">

            {{-- Heading Centered --}}
            <h2 class="text-center text-[clamp(28px,3.5vw,40px)] text-[#2A5A8A] font-normal leading-tight mb-10 sm:mb-14" data-scroll-reveal="left">
                Application Form
            </h2>

            {{-- Form container --}}
            <form id="partner-application-form" onsubmit="submitPartnerForm(event)" class="w-full" novalidate data-scroll-reveal="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-8 sm:mb-10">

                    {{-- Left column --}}
                    <div class="flex flex-col gap-4 sm:gap-6">
                        {{-- Full Name --}}
                        <div class="form-field-group w-full">
                            <div class="relative w-full">
                                <input type="text" name="name" id="partner-fullname" required minlength="2" maxlength="100" autocomplete="name" placeholder=" "
                                    class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all">
                                <label for="partner-fullname"
                                    class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                           peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                           peer-[:not(:placeholder-shown)]:top-2.5 peer-[:not(:placeholder-shown)]:translate-y-0 peer-[:not(:placeholder-shown)]:text-[11px] peer-[:not(:placeholder-shown)]:text-gray-400 peer-[:not(:placeholder-shown)]:font-medium">
                                    Full Name
                                </label>
                            </div>
                            <p class="field-error-text text-red-500 text-[12px] mt-1.5 pl-1">Please enter your full name</p>
                        </div>

                        {{-- Experience Level (Custom Animated Dropdown) --}}
                        <div class="form-field-group w-full">
                            <div class="custom-dropdown relative w-full" data-name="experience_level">
                                <input type="hidden" name="experience_level" value="">
                                <button type="button" class="dropdown-trigger w-full h-[54px] sm:h-[58px] px-6 pr-12 pt-5 pb-1.5 bg-[#F5F5F5] text-left text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all cursor-pointer flex items-center">
                                    <span class="selected-text text-black truncate font-normal"></span>
                                </button>
                                <span class="dropdown-label pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left">
                                    Experience Level
                                </span>
                                <span class="pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 text-[#888888] dropdown-chevron flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </span>
                                <div class="dropdown-menu absolute top-[calc(100%+6px)] left-0 w-full z-50 bg-white border border-[#2A5A8A]/20 shadow-2xl overflow-hidden opacity-0 invisible -translate-y-2 scale-[0.98] transition-all duration-200 ease-out">
                                    <div class="py-1 max-h-[220px] overflow-y-auto">
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Beginner (No experience)">
                                            Beginner (No experience)
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="1 - 2 Years">
                                            1 - 2 Years
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="3 - 5 Years">
                                            3 - 5 Years
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="5+ Years (Experienced)">
                                            5+ Years (Experienced)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="field-error-text text-red-500 text-[12px] mt-1.5 pl-1">Please select your experience level</p>
                        </div>

                        {{-- Phone Number --}}
                        <div class="form-field-group w-full">
                            <div class="relative w-full">
                                <input type="tel" name="phone" id="partner-phone" required pattern="[0-9+\s\-()]{7,20}" inputmode="tel" autocomplete="tel" placeholder=" "
                                    class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all">
                                <label for="partner-phone"
                                    class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                           peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                           peer-[:not(:placeholder-shown)]:top-2.5 peer-[:not(:placeholder-shown)]:translate-y-0 peer-[:not(:placeholder-shown)]:text-[11px] peer-[:not(:placeholder-shown)]:text-gray-400 peer-[:not(:placeholder-shown)]:font-medium">
                                    Phone Number
                                </label>
                            </div>
                            <p class="field-error-text text-red-500 text-[12px] mt-1.5 pl-1">Please enter a valid phone number (at least 8 digits)</p>
                        </div>
                    </div>

                    {{-- Right column --}}
                    <div class="flex flex-col gap-4 sm:gap-6">
                        {{-- Sex (Custom Animated Dropdown) --}}
                        <div class="form-field-group w-full">
                            <div class="custom-dropdown relative w-full" data-name="sex">
                                <input type="hidden" name="sex" value="">
                                <button type="button" class="dropdown-trigger w-full h-[54px] sm:h-[58px] px-6 pr-12 pt-5 pb-1.5 bg-[#F5F5F5] text-left text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all cursor-pointer flex items-center">
                                    <span class="selected-text text-black truncate font-normal"></span>
                                </button>
                                <span class="dropdown-label pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left">
                                    Sex
                                </span>
                                <span class="pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 text-[#888888] dropdown-chevron flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </span>
                                <div class="dropdown-menu absolute top-[calc(100%+6px)] left-0 w-full z-50 bg-white border border-[#2A5A8A]/20 shadow-2xl overflow-hidden opacity-0 invisible -translate-y-2 scale-[0.98] transition-all duration-200 ease-out">
                                    <div class="py-1 max-h-[220px] overflow-y-auto">
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Male">
                                            Male
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Female">
                                            Female
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Other">
                                            Other
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="field-error-text text-red-500 text-[12px] mt-1.5 pl-1">Please select your sex</p>
                        </div>

                        {{-- You are a (Custom Animated Dropdown) --}}
                        <div class="form-field-group w-full">
                            <div class="custom-dropdown relative w-full" data-name="you_are_a">
                                <input type="hidden" name="you_are_a" value="">
                                <button type="button" class="dropdown-trigger w-full h-[54px] sm:h-[58px] px-6 pr-12 pt-5 pb-1.5 bg-[#F5F5F5] text-left text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all cursor-pointer flex items-center">
                                    <span class="selected-text text-black truncate font-normal"></span>
                                </button>
                                <span class="dropdown-label pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left">
                                    You are a
                                </span>
                                <span class="pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 text-[#888888] dropdown-chevron flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </span>
                                <div class="dropdown-menu absolute top-[calc(100%+6px)] left-0 w-full z-50 bg-white border border-[#2A5A8A]/20 shadow-2xl overflow-hidden opacity-0 invisible -translate-y-2 scale-[0.98] transition-all duration-200 ease-out">
                                    <div class="py-1 max-h-[220px] overflow-y-auto">
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Individual Real Estate Agent">
                                            Individual Real Estate Agent
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Agency / Brokerage">
                                            Agency / Brokerage
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Freelancer / Introducer">
                                            Freelancer / Introducer
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Investor / Business Partner">
                                            Investor / Business Partner
                                        </div>
                                        <div class="dropdown-option px-6 py-3 text-[14.5px] text-[#222222] hover:bg-[#1479B9] hover:text-white transition-colors cursor-pointer" data-value="Student / Other">
                                            Student / Other
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="field-error-text text-red-500 text-[12px] mt-1.5 pl-1">Please select who you are</p>
                        </div>

                        {{-- Email --}}
                        <div class="form-field-group w-full">
                            <div class="relative w-full">
                                <input type="email" name="email" id="partner-email" required autocomplete="email" placeholder=" "
                                    class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all">
                                <label for="partner-email"
                                    class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                           peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                           peer-[:not(:placeholder-shown)]:top-2.5 peer-[:not(:placeholder-shown)]:translate-y-0 peer-[:not(:placeholder-shown)]:text-[11px] peer-[:not(:placeholder-shown)]:text-gray-400 peer-[:not(:placeholder-shown)]:font-medium">
                                    Email
                                </label>
                            </div>
                            <p class="field-error-text text-red-500 text-[12px] mt-1.5 pl-1">Please enter a valid email address</p>
                        </div>
                    </div>

                </div>

                {{-- Submit Button --}}
                <div class="flex justify-center">
                    <button type="submit"
                        class="min-w-[170px] sm:min-w-[200px] py-2 sm:py-2.5 px-8 sm:px-12 bg-white text-[#2A5A8A] border-[1.5px] border-[#C29B62] text-[15px] sm:text-[16px] font-normal hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] transition-all duration-200 cursor-pointer text-center">
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </section>

    <style>
        .form-field-group .field-error-text {
            display: none;
        }
        .form-field-group.has-error .field-error-text {
            display: block;
        }
        .form-field-group.has-error input:not([type="hidden"]),
        .form-field-group.has-error .dropdown-trigger {
            border-color: #ef4444 !important;
            background-color: #fff5f5 !important;
        }
        .form-field-group.has-error label,
        .form-field-group.has-error .dropdown-label {
            color: #ef4444 !important;
        }

        /* Custom Dropdown Animations & Floating Label */
        .dropdown-chevron {
            top: calc(50% + 7px) !important;
            transform: translateY(-50%);
            transition: transform 0.3s ease, color 0.2s ease;
        }
        .custom-dropdown.is-open .dropdown-menu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) scale(1) !important;
        }
        .custom-dropdown.is-open .dropdown-trigger {
            border-color: #2A5A8A;
            background-color: #ffffff;
        }
        .custom-dropdown.is-open .dropdown-chevron {
            transform: translateY(-50%) rotate(180deg) !important;
            color: #2A5A8A;
        }

        .custom-dropdown.is-open .dropdown-label,
        .custom-dropdown.has-value .dropdown-label {
            top: 11px !important;
            transform: translateY(0) !important;
            font-size: 11px !important;
            font-weight: 600 !important;
        }
        .custom-dropdown.is-open .dropdown-label {
            color: #2A5A8A !important;
        }
        .custom-dropdown.has-value:not(.is-open) .dropdown-label {
            color: #888888 !important;
            font-weight: 500 !important;
        }
    </style>

    @once
        <script>
            (function() {
                const partnerForm = document.getElementById('partner-application-form');
                if (!partnerForm) return;

                // Clear red error state immediately on standard inputs
                partnerForm.querySelectorAll('input:not([type="hidden"])').forEach(function(el) {
                    ['input', 'change'].forEach(function(evtName) {
                        el.addEventListener(evtName, function() {
                            const group = el.closest('.form-field-group');
                            if (group) {
                                group.classList.remove('has-error');
                            }
                        });
                    });
                });

                // Custom animated dropdown logic
                const dropdowns = partnerForm.querySelectorAll('.custom-dropdown');

                dropdowns.forEach(function(dropdown) {
                    const trigger = dropdown.querySelector('.dropdown-trigger');
                    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
                    const selectedText = dropdown.querySelector('.selected-text');
                    const options = dropdown.querySelectorAll('.dropdown-option');

                    // Toggle dropdown menu
                    trigger.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isOpen = dropdown.classList.contains('is-open');

                        // Close all dropdowns first
                        dropdowns.forEach(function(d) { d.classList.remove('is-open'); });

                        if (!isOpen) {
                            dropdown.classList.add('is-open');
                        }
                    });

                    // Select option
                    options.forEach(function(opt) {
                        opt.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const val = opt.getAttribute('data-value');
                            hiddenInput.value = val;
                            selectedText.textContent = val;

                            dropdown.classList.add('has-value');
                            dropdown.classList.remove('is-open');

                            const group = dropdown.closest('.form-field-group');
                            if (group) {
                                group.classList.remove('has-error');
                            }
                        });
                    });
                });

                // Close dropdowns when clicking outside
                document.addEventListener('click', function(e) {
                    dropdowns.forEach(function(dropdown) {
                        if (!dropdown.contains(e.target)) {
                            dropdown.classList.remove('is-open');
                        }
                    });
                });

                // Close dropdowns on ESC key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        dropdowns.forEach(function(dropdown) {
                            dropdown.classList.remove('is-open');
                        });
                    }
                });
            })();

            function submitPartnerForm(event) {
                if (event) event.preventDefault();

                let form = document.getElementById('partner-application-form');
                if (!form) return;

                let nameInput = form.querySelector('[name="name"]');
                let sexInput = form.querySelector('[name="sex"]');
                let expInput = form.querySelector('[name="experience_level"]');
                let youAreInput = form.querySelector('[name="you_are_a"]');
                let phoneInput = form.querySelector('[name="phone"]');
                let emailInput = form.querySelector('[name="email"]');

                let name = nameInput?.value?.trim() || '';
                let sex = sexInput?.value?.trim() || '';
                let experienceLevel = expInput?.value?.trim() || '';
                let youAreA = youAreInput?.value?.trim() || '';
                let phone = phoneInput?.value?.trim() || '';
                let email = emailInput?.value?.trim() || '';

                let hasError = false;
                let firstInvalidEl = null;

                function validateField(inputEl, isValid) {
                    const group = inputEl ? inputEl.closest('.form-field-group') : null;
                    if (!isValid) {
                        if (group) group.classList.add('has-error');
                        if (!firstInvalidEl) {
                            const dropdown = group?.querySelector('.custom-dropdown .dropdown-trigger');
                            firstInvalidEl = dropdown || inputEl;
                        }
                        hasError = true;
                    } else {
                        if (group) group.classList.remove('has-error');
                    }
                }

                // Condition 1: Full Name validation
                validateField(nameInput, name.length >= 2);

                // Condition 2: Experience Level validation
                validateField(expInput, experienceLevel.length > 0);

                // Condition 3: Phone Number validation
                let cleanPhone = phone.replace(/[^0-9]/g, '');
                validateField(phoneInput, cleanPhone.length >= 8);

                // Condition 4: Sex validation
                validateField(sexInput, sex.length > 0);

                // Condition 5: You are a validation
                validateField(youAreInput, youAreA.length > 0);

                // Condition 6: Email validation
                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                validateField(emailInput, email.length > 0 && emailRegex.test(email));

                if (hasError) {
                    if (firstInvalidEl) {
                        firstInvalidEl.focus();
                    }
                    return;
                }

                let message = `New Partner Application:

Full Name: ${name}
Sex: ${sex}
Experience Level: ${experienceLevel}
You are a: ${youAreA}
Phone Number: ${phone}
Email: ${email}`;

                let encoded = encodeURIComponent(message);
                let telegramUrl = `https://t.me/HasBunRoeun?text=${encoded}`;

                window.open(telegramUrl, '_blank');
            }
        </script>
    @endonce

    {{-- Frequently Asked Questions --}}
    @php
        $partnerFaqLeft = [
            [
                'question' => 'What types of properties do you manage?',
                'answer' =>
                    'We specialize in condominiums, serviced apartments, and residential investment properties throughout Phnom Penh.',
            ],
            [
                'question' => 'Can you manage both daily and long-term rentals?',
                'answer' => 'ComingSoon',
            ],
        ];

        $partnerFaqRight = [
            [
                'question' => 'How do property owners receive rental income?',
                'answer' => 'ComingSoon',
            ],
        ];
    @endphp

    <x-faqs :faqLeft="$partnerFaqLeft" :faqRight="$partnerFaqRight" />



    {{-- Request Property Management Consultation --}}
    <section class="relative max-w-[1600px] mx-auto mt-20 sm:mt-28 lg:mt-36">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="Request Property Management Consultation"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[650px] mt-6 px-6
                        min-[900px]:ml-[-8rem] min-[900px]:mt-[-8.5rem] min-[900px]:px-0 z-20">
                <h2 class="text-[#DCC597] text-[clamp(24px,4vw,42px)] font-bold leading-[1.15]">
                    Request Property<br>
                    Management Consultation
                </h2>
            </div>
        </div>
    </section>

    {{-- Build Your Career in Real Estate --}}
    <section class="mt-16 sm:mt-24 md:mt-32 min-[900px]:mt-[12rem] mb-16 sm:mb-24">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10">
            <div
                class="flex flex-col min-[900px]:flex-row items-center min-[900px]:items-start justify-center gap-10 min-[900px]:gap-16">

                {{-- Left: accent line + heading --}}
                <div class="flex items-start gap-4 max-w-[420px]" data-scroll-reveal="left">
                    <span class="h-[2px] w-20 shrink-0 bg-[#c9a15c] mt-3"></span>
                    <h2 class="text-[#2A5A8A] text-[16px] sm:text-[18px] font-bold leading-snug">
                        Build Your Career in Real Estate with CWD Real Estate Agent &amp; Developer.
                    </h2>
                </div>

                {{-- Right: image --}}
                <div class="w-full min-[900px]:w-auto min-[900px]:shrink-0" data-scroll-reveal="right">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="Build Your Career in Real Estate with CWD"
                        class="w-full min-[900px]:w-[420px] h-auto min-h-[220px] object-cover">
                </div>

            </div>
        </div>
    </section>
@endsection
