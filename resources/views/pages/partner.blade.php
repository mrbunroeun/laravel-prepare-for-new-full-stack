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
            <div class="relative z-[260] max-w-[720px]">
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

                    <p class="text-white/90 text-[13px] sm:text-[14.5px] px-6 sm:px-10 mb-8 font-light tracking-wide leading-relaxed">
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
        <div class="absolute right-6 sm:right-14 md:right-24 lg:right-[18%] xl:right-[25%] 2xl:right-[30%] bottom-0 z-[270] pointer-events-none flex justify-end">
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
            <h2 class="text-center text-[clamp(26px,3.2vw,36px)] leading-tight mb-8 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Your Role as a</span>
                <span class="text-[#2A5A8A] font-bold block">Sales Partner</span>
            </h2>

            {{-- Cards Grid (3 columns on desktop, 2 on tablet, 1 on mobile) --}}
            <div id="sales-partner-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 items-stretch">
                @foreach ($roles as $role)
                    <div
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
                <div class="hidden lg:block absolute left-[-35px] xl:left-[-25px] 2xl:left-[-15px] bottom-0 z-20 pointer-events-none">
                    <img src="{{ asset('partner/girl_partner.png') }}" alt="CWD Support Partner"
                        class="block w-[420px] xl:w-[480px] 2xl:w-[530px] max-w-[560px] max-h-[640px] xl:max-h-[700px] h-auto object-contain object-bottom drop-shadow-2xl">
                </div>

                {{-- ~80% Width Blue Box (Aligned to Right) --}}
                <div class="w-full lg:w-[82%] xl:w-[80%] lg:ml-auto">

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
            <h2 class="text-center text-[clamp(26px,3.2vw,36px)] text-[#2A5A8A] font-medium leading-tight mb-8 sm:mb-12">
                Commission &amp; Rewards
            </h2>

            {{-- Cards Grid (4 columns on desktop, 2 on tablet, 1 on mobile) --}}
            <div id="commission-rewards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 items-stretch">
                @foreach ($rewards as $reward)
                    <div
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
            <h2 class="text-center text-[clamp(28px,3.5vw,40px)] text-[#2A5A8A] font-normal leading-tight mb-10 sm:mb-14">
                Application Form
            </h2>

            {{-- Form container --}}
            <form id="partner-application-form" onsubmit="submitPartnerForm(event)" class="w-full" novalidate>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-8 sm:mb-10">

                    {{-- Left column --}}
                    <div class="flex flex-col gap-4 sm:gap-6">
                        {{-- Full Name --}}
                        <div class="form-field-group relative w-full">
                            <input type="text" name="name" id="partner-fullname" required minlength="2" maxlength="100" autocomplete="name" placeholder=" "
                                class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all">
                            <label for="partner-fullname"
                                class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                       peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                       peer-[:not(:placeholder-shown)]:top-2.5 peer-[:not(:placeholder-shown)]:translate-y-0 peer-[:not(:placeholder-shown)]:text-[11px] peer-[:not(:placeholder-shown)]:text-gray-400 peer-[:not(:placeholder-shown)]:font-medium">
                                Full Name
                            </label>
                        </div>

                        {{-- Experience Level --}}
                        <div class="form-field-group relative w-full">
                            <select name="experience_level" id="partner-experience" required
                                class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all appearance-none cursor-pointer">
                                <option value="" disabled selected hidden></option>
                                <option value="Beginner (No experience)" class="text-black">Beginner (No experience)</option>
                                <option value="1 - 2 Years" class="text-black">1 - 2 Years</option>
                                <option value="3 - 5 Years" class="text-black">3 - 5 Years</option>
                                <option value="5+ Years (Experienced)" class="text-black">5+ Years (Experienced)</option>
                            </select>
                            <label for="partner-experience"
                                class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                       peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                       peer-valid:top-2.5 peer-valid:translate-y-0 peer-valid:text-[11px] peer-valid:text-gray-400 peer-valid:font-medium">
                                Experience Level
                            </label>
                            <div class="pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 text-[#888888]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- Phone Number --}}
                        <div class="form-field-group relative w-full">
                            <input type="tel" name="phone" id="partner-phone" required pattern="[0-9+\s\-()]{7,20}" inputmode="tel" autocomplete="tel" placeholder=" "
                                class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all">
                            <label for="partner-phone"
                                class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                       peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                       peer-[:not(:placeholder-shown)]:top-2.5 peer-[:not(:placeholder-shown)]:translate-y-0 peer-[:not(:placeholder-shown)]:text-[11px] peer-[:not(:placeholder-shown)]:text-gray-400 peer-[:not(:placeholder-shown)]:font-medium">
                                Phone Number
                            </label>
                        </div>
                    </div>

                    {{-- Right column --}}
                    <div class="flex flex-col gap-4 sm:gap-6">
                        {{-- Sex --}}
                        <div class="form-field-group relative w-full">
                            <select name="sex" id="partner-sex" required
                                class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all appearance-none cursor-pointer">
                                <option value="" disabled selected hidden></option>
                                <option value="Male" class="text-black">Male</option>
                                <option value="Female" class="text-black">Female</option>
                                <option value="Other" class="text-black">Other</option>
                            </select>
                            <label for="partner-sex"
                                class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                       peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                       peer-valid:top-2.5 peer-valid:translate-y-0 peer-valid:text-[11px] peer-valid:text-gray-400 peer-valid:font-medium">
                                Sex
                            </label>
                            <div class="pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 text-[#888888]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- You are a --}}
                        <div class="form-field-group relative w-full">
                            <select name="you_are_a" id="partner-you-are" required
                                class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all appearance-none cursor-pointer">
                                <option value="" disabled selected hidden></option>
                                <option value="Individual Real Estate Agent" class="text-black">Individual Real Estate Agent</option>
                                <option value="Agency / Brokerage" class="text-black">Agency / Brokerage</option>
                                <option value="Freelancer / Introducer" class="text-black">Freelancer / Introducer</option>
                                <option value="Investor / Business Partner" class="text-black">Investor / Business Partner</option>
                                <option value="Student / Other" class="text-black">Student / Other</option>
                            </select>
                            <label for="partner-you-are"
                                class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                       peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                       peer-valid:top-2.5 peer-valid:translate-y-0 peer-valid:text-[11px] peer-valid:text-gray-400 peer-valid:font-medium">
                                You are a
                            </label>
                            <div class="pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 text-[#888888]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-field-group relative w-full">
                            <input type="email" name="email" id="partner-email" required autocomplete="email" placeholder=" "
                                class="peer w-full h-[54px] sm:h-[58px] px-6 pt-5 pb-1.5 bg-[#F5F5F5] text-black text-[15px] border border-transparent focus:border-[#2A5A8A] focus:bg-white outline-none transition-all">
                            <label for="partner-email"
                                class="pointer-events-none absolute left-6 top-1/2 -translate-y-1/2 text-[14.5px] text-[#888888] transition-all duration-200 origin-left
                                       peer-focus:top-2.5 peer-focus:translate-y-0 peer-focus:text-[11px] peer-focus:text-[#2A5A8A] peer-focus:font-semibold
                                       peer-[:not(:placeholder-shown)]:top-2.5 peer-[:not(:placeholder-shown)]:translate-y-0 peer-[:not(:placeholder-shown)]:text-[11px] peer-[:not(:placeholder-shown)]:text-gray-400 peer-[:not(:placeholder-shown)]:font-medium">
                                Email
                            </label>
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
        .form-field-group.has-error input,
        .form-field-group.has-error select {
            border-color: #ef4444 !important;
            background-color: #fff5f5 !important;
        }
        .form-field-group.has-error label {
            color: #ef4444 !important;
        }
    </style>

    @once
        <script>
            (function() {
                // Clear red error state immediately when user types or changes an input
                const partnerForm = document.getElementById('partner-application-form');
                if (partnerForm) {
                    partnerForm.querySelectorAll('input, select').forEach(function(el) {
                        ['input', 'change'].forEach(function(evtName) {
                            el.addEventListener(evtName, function() {
                                const group = el.closest('.form-field-group');
                                if (group) {
                                    group.classList.remove('has-error');
                                }
                            });
                        });
                    });
                }
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
                        if (!firstInvalidEl) firstInvalidEl = inputEl;
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

    <section class="relative px-0 sm:px-[5rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]">
                <h2 class="text-[clamp(28px,4vw,40px)] mb-6">
                    <span class="text-[#2A5A8A] font-normal">Who</span>
                    <span class="text-[#2A5A8A] font-bold">We Are</span>
                </h2>

                <h3 class="text-black text-[clamp(20px,2.5vw,26px)]  font-semibold leading-tight mb-6">
                    Professional Property &amp; Hospitality Solutions
                </h3>

                <p class="text-black text-[15px] leading-relaxed">
                    CWD Realty &amp; Hospitality manages residential condominium properties while providing flexible rental
                    options for travelers, expatriates, business professionals, and long-term residents. Our experienced
                    multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable
                    stay.
                </p>
            </div>
        </div>
    </section>


    @php
        $whyChooseFeatures = [
            [
                'title' => 'Condominium Specialists',
                'description' => 'We focus on professionally managing residential condominium properties.',
            ],
            [
                'title' => 'Multilingual Communication',
                'description' =>
                    'Our team provides professional support in multiple languages, making communication easier for both local and international clients.',
            ],
            [
                'title' => 'Flexible Rental Options',
                'description' => 'Choose daily, weekly, monthly, or long-term accommodation based on your needs.',
            ],
            [
                'title' => 'Professional Property Management',
                'description' =>
                    'Helping property owners maximize occupancy while protecting the value of their investments.',
            ],
            [
                'title' => 'Hospitality-Focused Service',
                'description' =>
                    'Our team is committed to creating a welcoming and comfortable guest experience from arrival to departure.',
            ],
        ];
    @endphp


    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative px-0 sm:px-[5rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Why Choose</span>
                <span class="text-[#2A5A8A] font-bold block">CWD Realty &amp; Hospitality?</span>
            </h2>

            {{-- Cards grid --}}
            <div id="why-choose-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 items-stretch">
                @foreach ($whyChooseFeatures as $index => $feature)
                    <div @class([
                        'why-choose-card h-full flex flex-col border-[2px] border-[#2A5A8A] px-6 py-6',
                        'lg:col-span-2' => $index < 3,
                        'lg:col-span-2 lg:col-start-2' => $index === 3,
                        'sm:col-span-2 sm:max-w-[calc(50%-12px)] sm:mx-auto lg:col-span-2 lg:col-start-4 lg:max-w-none lg:mx-0' =>
                            $index === 4,
                    ])>
                        <h3 class="text-[#2A5A8A] text-[14px] sm:text-[15px] font-bold mb-3 leading-snug">
                            {{ $feature['title'] }}
                        </h3>
                        <p class="text-black text-[13px] sm:text-[13.5px] leading-relaxed">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <script>
        (function() {
            const grid = document.getElementById('why-choose-grid');
            if (!grid) return;

            function equalizeCardHeights() {
                const cards = Array.from(grid.querySelectorAll('.why-choose-card'));
                if (!cards.length) return;

                // Reset first, so shrinking the viewport doesn't keep a stale tall height
                cards.forEach(card => {
                    card.style.height = 'auto';
                });

                // Measure natural height of every card, take the tallest
                let tallest = 0;
                cards.forEach(card => {
                    const h = card.getBoundingClientRect().height;
                    if (h > tallest) tallest = h;
                });

                // Apply that height to every card, across both grid rows
                cards.forEach(card => {
                    card.style.height = tallest + 'px';
                });
            }

            // Run once content/layout is ready
            window.addEventListener('load', equalizeCardHeights);

            // Re-run on resize, since text wrapping (and therefore natural height) changes at different widths
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(equalizeCardHeights, 150);
            });

            // Run immediately too, in case DOM is already parsed by the time this script executes
            equalizeCardHeights();
        })();
    </script>


    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'Why should I stay at a property managed by CWD Realty & Hospitality?',
                'answer' =>
                    'We professionally manage quality condominium properties, offering clean accommodations, responsive support, flexible rental options, and convenient locations suitable for business travelers, expatriates, and tourists.',
            ],
            [
                'question' => 'How much does a room cost?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Are smoking and non-smoking rooms available?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Is breakfast included?',
                'answer' =>
                    'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Are pets allowed?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'What facilities are available?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Do you provide airport transportation?',
                'answer' =>
                    'ComingSoon',
            ],
            [
                'question' => 'Are there discounts for weekly or monthly stays?',
                'answer' =>
                    'ComingSoon',
            ],
        ];
    @endphp

    {{-- Frequently Asked Questions --}}
    <section class="relative px-0 sm:px-[5rem] bg-[#e5e4e4]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 sm:py-20">
            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
            </h2>

            {{-- Two-column accordion --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">

                {{-- Left column --}}
                <div class="faq-column flex flex-col gap-2">
                    @foreach ($faqLeft as $index => $faq)
                        <div class="faq-item bg-[#f3f3f3]">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200 {{ $index === 0 ? 'rotate-90' : '' }}"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div
                                class="faq-panel overflow-hidden transition-all duration-300 {{ $index === 0 ? 'max-h-[300px]' : 'max-h-0' }}">
                                <div class="{{ $index === 0 ? 'bg-[#1479B9]' : 'bg-white' }} px-5 py-4 sm:px-6 sm:py-5">
                                    <p
                                        class="{{ $index === 0 ? 'text-white' : 'text-black/70' }} text-[13px] sm:text-[13.5px] leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Right column --}}
                <div class="faq-column flex flex-col gap-2">
                    @foreach ($faqRight as $faq)
                        <div class="faq-item bg-[#f3f3f3]">
                            <button type="button"
                                class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                                aria-expanded="false">
                                <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                    {{ $faq['question'] }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 4l8 6-8 6V4z" />
                                </svg>
                            </button>
                            <div class="faq-panel overflow-hidden transition-all duration-300 max-h-0">
                                <div class="bg-white px-5 py-4 sm:px-6 sm:py-5">
                                    <p class="text-black/70 text-[13px] sm:text-[13.5px] leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

    <script>
        (function() {
            document.querySelectorAll('.faq-toggle').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const item = btn.closest('.faq-item');
                    const panel = item.querySelector('.faq-panel');
                    const answerBox = panel.querySelector('div');
                    const answerText = answerBox.querySelector('p');
                    const arrow = btn.querySelector('.faq-arrow');
                    const isOpen = btn.getAttribute('aria-expanded') === 'true';

                    if (isOpen) {
                        // Close this item
                        panel.style.maxHeight = '0px';
                        btn.setAttribute('aria-expanded', 'false');
                        arrow.classList.remove('rotate-90');
                        answerBox.classList.remove('bg-[#1479B9]');
                        answerBox.classList.add('bg-white');
                        answerText.classList.remove('text-white');
                        answerText.classList.add('text-black/70');
                    } else {
                        // Open this item
                        panel.style.maxHeight = panel.scrollHeight + 'px';
                        btn.setAttribute('aria-expanded', 'true');
                        arrow.classList.add('rotate-90');
                        answerBox.classList.add('bg-[#1479B9]');
                        answerBox.classList.remove('bg-white');
                        answerText.classList.add('text-white');
                        answerText.classList.remove('text-black/70');
                    }
                });
            });
        })();
    </script>


    @php
        $latestActivities = [
            [
                'image' => asset('home/latest_activities/1img.png'),
                'title' => 'Wealth Mansion',
                'description' =>
                    'Premium condominium development offering modern residential units with excellent city access.',
            ],
            [
                'image' => asset('home/latest_activities/2img.png'),
                'title' => 'Private Residential Collection',
                'description' =>
                    'Professionally managed condominium units including premium residences and penthouses.',
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Golden Tower 268',
                'description' => 'Landmark high-rise tower offering premium residences with panoramic city views.',
            ],
            [
                'image' => asset('home/latest_activities/4img.png'),
                'title' => 'Riverside Tower',
                'description' =>
                    'Elegant riverside residences with panoramic views and premium amenities for modern living.',
            ],
            [
                'image' => asset('home/latest_activities/5img.png'),
                'title' => 'Skyline Residence',
                'description' => 'High-rise condominium living in the heart of the city, close to shopping and dining.',
            ],
            [
                'image' => asset('home/latest_activities/6img.png'),
                'title' => 'Harmony Heights',
                'description' =>
                    'Modern residential tower with rooftop lounge, gym, and unobstructed city skyline views.',
            ],
        ];
    @endphp

    {{-- Latest Activities --}}
    <section class="bg-none  ">
        <div class="max-w-[1500px] mx-auto px-6 sm:px-10 pt-16 sm:pt-20">
            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] px-0 sm:px-[5rem] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Latest <strong>Activities</strong></span>
            </h2>
        </div>

        <div class="max-w-[1500px] mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-0 leading-[0]">
                @foreach ($latestActivities as $activity)
                    <div class="relative overflow-hidden group h-[220px] sm:h-[240px] lg:h-[260px]">
                        <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}"
                            class="block w-full h-full object-cover">

                        {{-- Blue overlay + text, shown on hover --}}
                        <div
                            class="absolute inset-0 bg-[#2A5A8A]/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end px-6 py-6">
                            <h3
                                class="text-white text-[18px] sm:text-[20px] font-bold mb-4 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                {{ $activity['title'] }}
                            </h3>
                            <p
                                class="text-white/90 text-[13px] sm:text-[14px] leading-relaxed translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                {{ $activity['description'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="h-16 sm:h-20"></div>
    </section>

    {{-- comments section --}}
    <x-comments.comments />



    {{-- Looking for your next stay --}}
    <section class="relative max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-6 px-6
                        min-[900px]:ml-[-8rem] min-[900px]:mt-[-6.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(22px,5vw,40px)] font-bold leading-tight">
                    <span class="block min-[900px]:hidden">
                        Looking for Your Next Stay or Property Management Partner?
                    </span>
                    <span class="hidden min-[900px]:block">
                        Looking for<br>
                        Your Next Stay or<br>
                        Property Management<br>
                        Partner?
                    </span>
                </h2>
            </div>
        </div>

        <div
            class="max-w-[420px] mt-4 px-6
        min-[900px]:absolute min-[900px]:left-1/2 min-[900px]:ml-[-40px] min-[900px]:bottom-[-2rem] min-[900px]:mt-0 min-[900px]:px-0 min-[900px]:w-[420px] min-[900px]:text-left">
            <p class="text-black/70 text-[14px]  sm:text-[15px] leading-relaxed">
                Whether you're searching for accommodation or professional property management services, our team is ready
                to assist you.
            </p>
        </div>
    </section>


    {{-- Professional Property --}}
    <section class="mt-16 sm:mt-24 md:mt-32 min-[900px]:mt-[12rem]">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10">
            <div
                class="flex flex-col min-[900px]:flex-row items-center min-[900px]:items-start justify-center gap-10 min-[900px]:gap-16">

                {{-- Left: accent line + heading --}}
                <div class="flex items-start gap-4 max-w-[420px]">
                    <span class="h-[2px] w-20 shrink-0 bg-[#c9a15c] mt-3"></span>
                    <h2 class="text-[#2A5A8A] text-[16px] sm:text-[18px] font-bold leading-snug">
                        Professional Property Management, Sales, Leasing & Hospitality Services in Cambodia.
                    </h2>
                </div>

                {{-- Right: image --}}
                <div class="w-full min-[900px]:w-auto min-[900px]:shrink-0">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="CWD Realty professional properties"
                        class="w-full min-[900px]:w-[420px] h-auto min-h-[220px] object-cover">
                </div>

            </div>
        </div>
    </section>
@endsection
