@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[850px] max-[1240px]:min-h-[700px] max-[940px]:min-h-[560px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_sectionsss.png') }}" alt="Events Hero">
    </section>

    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] lg:mt-[-4rem] mb-8 sm:mb-12 lg:mb-16 text-[#2f6ba7] pointer-events-none">
        <div class="pt-[18rem] max-[1240px]:pt-[14rem] max-[940px]:pt-[11rem] max-[640px]:pt-[9rem] max-w-[1400px] mx-auto px-6">
            <div class="max-w-[700px]">
                {{-- Gold accent bar (60% width) --}}
                <div class="h-[12px] sm:h-[15px] w-[60%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
                <div class="w-full bg-[#163049]/90 py-8 sm:py-10 px-6 sm:px-10" data-scroll-reveal="left" data-scroll-delay="100">
                    <h2 class="flex items-center gap-4 text-[clamp(24px,3.5vw,36px)] font-bold mb-6">
                        <span class="h-[2.5px] w-12 sm:w-16 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC]">Events</span>
                    </h2>

                    <h1 class="text-white text-[clamp(20px,2.8vw,32px)] font-medium leading-[1.3] mb-8">
                        Your Trusted Property<br>
                        Management &amp; Hospitality<br>
                        Partner in Cambodia
                    </h1>

                    <div class="flex items-center gap-4 sm:gap-6 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-normal px-6 sm:px-8 py-2.5 hover:bg-white hover:text-[#163049] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[1.5px] border-[#F4DEAC] text-white text-[13px] sm:text-[14.5px] font-normal px-6 sm:px-8 py-2.5 hover:bg-white hover:text-[#163049] transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Events List Section --}}
    @php
        $eventItems = [
            [
                'image' => asset('home/latest_activities/1img.png'),
                'title' => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
            [
                'image' => asset('home/latest_activities/2img.png'),
                'title' => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Your Trusted Property Management & Hospitality Partner in Cambodia',
                'description' => 'Property management is the professional administration of residential properties on behalf of owners.',
                'link' => url('/insights/view-full-insight'),
            ],
        ];
    @endphp

    <section class="relative bg-[#ffffff] z-[200]  pt-15 sm:pt-25 pb-16 sm:pb-24">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-10 sm:gap-14">
                @foreach ($eventItems as $event)
                    <div class="flex flex-col min-[860px]:flex-row gap-6 sm:gap-8 min-[860px]:gap-10 items-start">

                        {{-- Event Image Box (max-w 535px, h 240px) --}}
                        <div class="w-full min-[860px]:w-[535px] min-[860px]:max-w-[535px] h-[240px] shrink-0 overflow-hidden shadow-sm" data-scroll-reveal="left">
                            <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full block" style="width: 100%; height: 100%; object-fit: fill;">
                        </div>

                        {{-- Event Info Content --}}
                        <div class="flex-1 flex flex-col justify-between self-stretch py-1" data-scroll-reveal="right">
                            <div>
                                <h3 class="text-[#2A5A8A] text-[17px] sm:text-[18.5px] font-bold leading-snug mb-3">
                                    {{ $event['title'] }}
                                </h3>
                                <p class="text-gray-600 text-[13px] sm:text-[14px] leading-relaxed mb-4">
                                    {{ $event['description'] }}
                                </p>
                                <a href="{{ $event['link'] }}" class="text-[#2A5A8A] text-[14px] hover:underline inline-block mb-5 font-normal">
                                    Link
                                </a>
                            </div>

                            {{-- Social Share Icons --}}
                            <div class="flex items-center gap-2.5 mt-auto">
                                <a href="#" aria-label="Facebook"
                                    class="w-7 h-7 rounded-full bg-[#1877F2] flex items-center justify-center hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor">
                                        <path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.14 8.44 9.94v-7.03H7.9v-2.91h2.54V9.86c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.91h-2.34V22c4.78-.8 8.44-4.94 8.44-9.94z" />
                                    </svg>
                                </a>
                                <a href="#" aria-label="WhatsApp"
                                    class="w-7 h-7 rounded-full bg-[#25D366] flex items-center justify-center hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor">
                                        <path d="M12.02 2C6.5 2 2.02 6.48 2.02 12c0 1.77.46 3.45 1.28 4.9L2 22l5.25-1.28A9.96 9.96 0 0012.02 22C17.54 22 22 17.52 22 12S17.54 2 12.02 2zm5.85 14.24c-.25.71-1.24 1.3-2.03 1.47-.55.12-1.26.21-3.65-.78-2.99-1.24-4.92-4.26-5.07-4.46-.15-.2-1.2-1.6-1.2-3.05 0-1.45.75-2.16 1.02-2.46.27-.3.58-.37.78-.37.2 0 .39 0 .56.01.18.01.42-.07.65.5.25.6.85 2.07.92 2.22.07.15.12.33.02.53-.1.2-.15.33-.3.5-.15.18-.31.4-.44.53-.15.15-.3.31-.13.6.17.3.75 1.24 1.62 2.01 1.11.99 2.05 1.3 2.34 1.44.29.15.46.13.63-.08.17-.2.71-.83.9-1.11.19-.29.38-.24.63-.15.25.1 1.62.77 1.9.91.28.14.46.21.53.33.08.13.08.72-.17 1.43z" />
                                    </svg>
                                </a>
                                <a href="#" aria-label="Telegram"
                                    class="w-7 h-7 rounded-full bg-[#26A5E4] flex items-center justify-center hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor">
                                        <path d="M21.9 4.3c.28-1.17-.42-1.63-1.18-1.35L2.6 10.36c-1.13.45-1.11 1.08-.19 1.36l4.6 1.44 1.79 5.44c.22.6.4.83.8.83.4 0 .58-.18.8-.4l1.9-1.85 4.02 2.96c.72.4 1.24.2 1.42-.68l2.15-15.16zM8.86 13.4l9.3-5.86c.44-.27.84-.13.51.17l-7.9 7.13-.3 3.24-1.61-4.68z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Frequently Asked Questions --}}
    <x-faqs />

 

    {{-- Comments Section --}}
    <x-comments.comments />



    {{-- Looking for your next stay --}}
    <section class="relative max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-6 px-6
                        min-[900px]:ml-[-8rem] min-[900px]:mt-[-6.5rem] min-[900px]:px-0 z-20">
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
            data-scroll-reveal="left"
            class="relative z-20 max-w-[420px] mt-6 px-6
        min-[900px]:absolute min-[900px]:left-1/2 min-[900px]:ml-[-40px] min-[900px]:bottom-[-2.5rem] min-[900px]:mt-0 min-[900px]:px-0 min-[900px]:w-[420px] min-[900px]:text-left">
            <p class="text-black/70 text-[14px] sm:text-[15px] leading-relaxed">
                Whether you're searching for accommodation or professional property management services, our team is ready
                to assist you.
            </p>
        </div>
    </section>


    {{-- Professional Property --}}
    <section class="mt-20 sm:mt-24 md:mt-28 min-[900px]:mt-[17.5rem] lg:mt-[18rem] pb-8 sm:pb-12">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10">
            <div
                class="flex flex-col min-[900px]:flex-row items-center min-[900px]:items-start justify-center gap-10 min-[900px]:gap-16">

                {{-- Left: accent line + heading --}}
                <div class="flex items-start gap-4 max-w-[420px]" data-scroll-reveal="left">
                    <span class="h-[2px] w-20 shrink-0 bg-[#c9a15c] mt-3"></span>
                    <h2 class="text-[#2A5A8A] text-[16px] sm:text-[18px] font-bold leading-snug">
                        Professional Property Management, Sales, Leasing & Hospitality Services in Cambodia.
                    </h2>
                </div>

                {{-- Right: image --}}
                <div class="w-full min-[900px]:w-auto min-[900px]:shrink-0" data-scroll-reveal="right">
                    <img src="{{ asset('home/professional_property/professional_property.png') }}"
                        alt="CWD Realty professional properties"
                        class="w-full min-[900px]:w-[420px] h-auto min-h-[220px] object-cover">
                </div>

            </div>
        </div>
    </section>
@endsection
