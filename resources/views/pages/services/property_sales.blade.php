@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[800px]  max-[1240px]:min-h-[650px] max-[940px]:min-h-[520px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="">
    </section>


    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] lg:mt-[-5rem] lg:mb-[10rem] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            {{-- Gold accent bar --}}
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                <div class="px-0 py-10">
                    @if(!isset($heroSection) || $heroSection->show_tagline !== false)
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)] font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        @if(!empty($heroSection->tagline_html))
                            <span class="text-[#F4DEAC] font-normal">{!! $heroSection->tagline_html !!}</span>
                        @else
                            <span class="text-[#F4DEAC]">
                                @if(($heroSection->tagline_box1_style ?? 'light-gold') !== 'hidden' && !empty($heroSection->tagline_box1 ?? 'Property'))
                                    <span class="{{ ($heroSection->tagline_box1_style ?? 'light-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }}">{{ $heroSection->tagline_box1 ?? 'Property' }}</span>
                                @endif
                                @if(($heroSection->tagline_box2_style ?? 'bold-gold') !== 'hidden' && !empty($heroSection->tagline_box2 ?? 'Sales'))
                                    <span class="{{ ($heroSection->tagline_box2_style ?? 'bold-gold') === 'bold-gold' ? 'font-bold' : 'font-normal' }} ml-1">{{ $heroSection->tagline_box2 ?? 'Sales' }}</span>
                                @endif
                            </span>
                        @endif
                    </h2>
                    @endif

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        {{ $heroSection->headline ?? 'Prime Real Estate Investments & Condominium Sales in Cambodia' }}
                    </h1>

                    @if(!empty($heroSection->show_bullets) && !empty($heroSection->bullets) && is_array($heroSection->bullets))
                    <div class="px-10 sm:px-10 flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-white/80 font-medium mb-6">
                        @foreach($heroSection->bullets as $bullet)
                            <span>• {{ $bullet }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="flex items-center px-10 sm:px-10 gap-4 pointer-events-auto flex-wrap">
                        @if(isset($heroSection->buttons) && is_array($heroSection->buttons) && count($heroSection->buttons) > 0)
                            @foreach($heroSection->buttons as $btn)
                                <a href="{{ url($btn['url'] ?? '#') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                    {{ $btn['text'] ?? $btn['label'] ?? 'Learn More' }}
                                </a>
                            @endforeach
                        @else
                            <a href="{{ url('/properties') }}"
                                class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                Browse Properties
                            </a>
                            <a href="{{ url('/contact-us') }}"
                                class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                Contact Us
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>





    {{--  Whether you're purchasing --}}

    <section
        class="px-0 sm:px-[5rem] md:px-[3rem] relative z-[300] mt-[0.5rem] sm:mt-[1rem] md:mt-[1.3rem] lg:mt-[2rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[425px] ml-auto" data-scroll-reveal="right">
                <p class="text-white text-[15px] leading-relaxed">
                    Whether you're purchasing your first condominium, expanding your investment portfolio, or selling
                    residential property, CWD Realty &amp; Hospitality provides professional guidance throughout every stage
                    of the transaction.
                </p>
            </div>
        </div>
    </section>


    {{-- Maximize Your Property Investment --}}

    <section class="relative z-[300]  bg-white">
        <div class="max-w-[1500px] mx-auto  py-16 max-[940px]:py-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-26 items-start">

                {{-- LEFT: image + body text --}}
                <div class="flex flex-col mt-0 lg:mt-[-7rem] gap-8" data-scroll-reveal="left">
                    <img src="{{ asset('services/maximmize/maximize.png') }}" alt="Phnom Penh skyline"
                        class="w-full h-[350px] object-cover">

                    <div class="flex sm:px-[1rem] px-[2rem] justify-end gap-4">
                        <p class="text-black text-[15px] max-w-[420px] leading-relaxed">
                            Our team understands the Cambodian property market and works closely with buyers, investors, and
                            property owners to ensure a smooth, transparent, and successful sales process.
                        </p>
                    </div>
                </div>

                {{-- RIGHT: heading + gold line --}}
                <div class="flex flex-row" data-scroll-reveal="right">
                    <h2
                        class="text-[#2A5A8A] sm:px-[1rem] px-[2rem] text-[clamp(28px,3.5vw,38px)] font-normal leading-tight">
                        Professional Property Sales for Buyers, Investors & Owners
                    </h2>

                    <div class="h-[2px] w-full bg-[#c9a463] ml-[2rem] mt-6"></div>
                </div>

            </div>

        </div>
    </section>


    {{-- feature project  --}}

    <x-feature_project_properties_sale.featured_project />

    {{-- auto move logo --}}

    <x-auto_move.auto_move />

    {{-- Why Choose CWD Realty & Hospitality --}}
    <section class="relative px-0 sm:px-[2rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal">Why Choose </span>
                <span class="text-[#2A5A8A] font-bold">CWD Realty &amp; Hospitality?</span>
            </h2>

            @php
                $whyChooseFeatures = [
                    [
                        'number' => '01',
                        'title' => 'Condominium management specialists',
                    ],
                    [
                        'number' => '02',
                        'title' => 'Professional multilingual communication',
                    ],
                    [
                        'number' => '03',
                        'title' => 'Strong rental marketing experience',
                    ],
                    [
                        'number' => '04',
                        'title' => 'Transparent owner reporting',
                    ],
                    [
                        'number' => '05',
                        'title' => 'Reliable maintenance coordination',
                    ],
                    [
                        'number' => '06',
                        'title' => 'Hospitality-focused management',
                    ],
                    [
                        'number' => '07',
                        'title' => 'Personalized owner support',
                    ],
                ];

                $whyChooseRowOne = array_slice($whyChooseFeatures, 0, 4);
                $whyChooseRowTwo = array_slice($whyChooseFeatures, 4);
            @endphp

            {{-- Row 1: 4 columns --}}
            <div id="why-choose-row-one" class="grid grid-cols-2 lg:grid-cols-4 gap-6 items-stretch mb-6">
                @foreach ($whyChooseRowOne as $index => $feature)
                    @php
                        $dir = $index < 2 ? 'left' : 'right';
                    @endphp
                    <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ ($index % 2) * 100 }}"
                        class="why-choose-card group h-full w-full flex flex-col px-6 py-6 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200">
                        <span
                            class="text-[36px] sm:text-[40px] font-bold leading-none mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $feature['number'] }}
                        </span>
                        <p
                            class="text-[15px] leading-relaxed text-black group-hover:text-white transition-colors duration-200">
                            {{ $feature['title'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            {{-- Row 2: remaining cards, centered --}}
            <div id="why-choose-row-two" class="flex flex-wrap justify-center gap-6">
                @foreach ($whyChooseRowTwo as $index => $feature)
                    @php
                        $dir = $index === 0 ? 'left' : ($index === 1 ? 'fade-up' : 'right');
                    @endphp
                    <div data-scroll-reveal="{{ $dir }}" data-scroll-delay="{{ $index * 100 }}"
                        class="why-choose-card group w-[calc(50%-0.75rem)] lg:w-[calc(25%-1.125rem)] flex flex-col px-6 py-6 bg-white border-[2px] border-[#1479B9] hover:bg-[#1479B9] transition-colors duration-200">
                        <span
                            class="text-[36px] sm:text-[40px] font-bold leading-none mb-3 text-[#2A5A8A] group-hover:text-[#F4DEAC] transition-colors duration-200">
                            {{ $feature['number'] }}
                        </span>
                        <p
                            class="text-[15px] leading-relaxed text-black group-hover:text-white transition-colors duration-200">
                            {{ $feature['title'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @once
        <script>
            (function() {
                function equalizeWhyChooseCardHeights() {
                    var cards = document.querySelectorAll(
                        '#why-choose-row-one .why-choose-card, #why-choose-row-two .why-choose-card');
                    if (!cards.length) return;

                    // Reset heights first so we measure natural content height, not a previously-set tall value
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

                // Run once DOM is ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', equalizeWhyChooseCardHeights);
                } else {
                    equalizeWhyChooseCardHeights();
                }

                // Re-run on resize (debounced) since column count / text wrapping changes at breakpoints
                var resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(equalizeWhyChooseCardHeights, 150);
                });

                // Re-run once web fonts finish loading, since font swaps can change text height after initial measurement
                if (document.fonts && document.fonts.ready) {
                    document.fonts.ready.then(equalizeWhyChooseCardHeights);
                }
            })
            ();
        </script>
    @endonce





    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'What types of properties does CWD Realty & Hospitality offer for sale?',
                'answer' =>
                    'CWD focuses on residential properties and condominium projects in Cambodia, including projects such as Wealth Mansion, Private Residential, and UC88, subject to current availability.',
            ],
            [
                'question' => ' What types of units are available at Wealth Mansion?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => ' Can I buy a property and have CWD manage it for rental?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => ' Can I purchase a property for personal residence?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => ' Does CWD provide support during the purchasing process?',
                'answer' => 'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Can foreigners buy property in Cambodia?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Can I arrange a property viewing before buying?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'Can CWD help me choose a property for investment?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'What information should I check before purchasing a property?',
                'answer' => 'ComingSoon',
            ],
            [
                'question' => 'How can I check the latest property prices and availability?',
                'answer' => 'ComingSoon',
            ],
        ];
    @endphp

    {{-- Frequently Asked Questions --}}
    <x-faqs :faq-left="$faqLeft" :faq-right="$faqRight" />

    {{-- Looking for your next stay --}}
    <section class="relative mt-[2rem] sm:mt-[5rem] max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-4 px-6
                    min-[900px]:ml-[-8rem] min-[900px]:mt-[-8.5rem] min-[900px]:px-0 z-20">
                <h2 class="text-[#DCC597] text-[clamp(22px,5vw,40px)] font-bold leading-tight drop-shadow-sm">
                    <span class="block min-[900px]:hidden">
                        Looking for Professional
                        Property Management or
                        Comfortable Accommodation?
                    </span>
                    <span class="hidden min-[900px]:block">
                        Request Property <br>
                        Management Consultation
                    </span>
                </h2>
            </div>
        </div>

        <div class="max-w-[420px] mt-10 px-6 min-[900px]:ml-[calc(20%+2rem)] min-[900px]:mt-14 lg:mt-16 min-[900px]:px-0 mb-12 sm:mb-16" data-scroll-reveal="left">
            @php
                $links = [
                    ['label' => 'Property Leasing', 'url' => url('/services/property-leasing'), 'active' => true],
                    ['label' => 'Hospitality Services', 'url' => url('/services/hospitality-services'), 'active' => false],
                    ['label' => 'Property Listings', 'url' => url('/properties'), 'active' => false],
                    ['label' => 'Contact Us', 'url' => url('/contact-us'), 'active' => false],
                ];
            @endphp

            <nav class="flex flex-col divide-y divide-gray-200 border border-gray-200 shadow-sm">
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}"
                        class="group flex items-center justify-between px-5 py-3 text-[15px] font-medium
                   bg-white text-[#2A5A8A] transition-colors
                   hover:bg-[#2A5A8A] hover:text-[#DCC597]">
                        <span>{{ $link['label'] }}</span>
                        <span aria-hidden="true"
                            class="text-[#2A5A8A] transition-all group-hover:text-[#DCC597] group-hover:translate-x-1">
                            &rarr;
                        </span>
                    </a>
                @endforeach
            </nav>
        </div>
    </section>
@endsection
