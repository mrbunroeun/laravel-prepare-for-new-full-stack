@extends('layouts.app')
@section('content')
    {{-- Hero & Overlapping Cards Section --}}
    <section class="relative z-[200] pt-[110px] min-[1161px]:pt-[120px] bg-white overflow-hidden pb-12 sm:pb-16">
        <div class="relative max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Blue Banner Layer (Offset from left, h-[350px]) --}}
            <div class="relative w-full">
                <div class="relative w-full lg:w-[calc(100%-180px)] lg:ml-[180px] h-[350px] bg-[#2A5A8A] flex flex-col justify-start pt-8 sm:pt-10 px-8 sm:px-14 lg:px-16">
                    <h1 class="text-[#F4DEAC] text-[clamp(22px,3vw,34px)] font-normal leading-[1.35] max-w-[560px]">
                        Your Trusted Property<br>
                        Management &amp; Hospitality<br>
                        Partner in Cambodia
                    </h1>

                    {{-- Bottom Right Gold Accent Bar --}}
                    <div class="absolute bottom-0 right-0 h-[10px] sm:h-[12px] w-[50%] sm:w-[35%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                </div>

                {{-- The 2 Overlapping Cards Layer (shifted right, lowered -mt to keep text visible) --}}
                <div class="relative z-20 -mt-[95px] sm:-mt-[110px] lg:-mt-[120px] lg:ml-[70px] flex flex-col lg:flex-row gap-5 sm:gap-6 items-start">

                    {{-- Left Card (max-w 690px, h 380px) --}}
                    <div class="w-full lg:w-[690px] lg:max-w-[690px] shrink-0 h-[380px] overflow-hidden shadow-sm flex flex-col bg-gray-100">
                        <img src="{{ asset('home/latest_activities/3img.png') }}" alt="CWD Insight Detail" class="w-full h-full block" style="width: 100%; height: 100%; object-fit: fill;">
                    </div>

                    {{-- Right Card (max-w 410px, h 380px) --}}
                    <div class="w-full lg:w-[410px] lg:max-w-[410px] shrink-0 h-[380px] overflow-hidden shadow-sm flex flex-col bg-gray-100">
                        <img src="{{ asset('home/latest_activities/3img.png') }}" alt="CWD Insight Highlight" class="w-full h-full block" style="width: 100%; height: 100%; object-fit: fill;">
                    </div>

                </div>

                {{-- Text Content Below Boxes (Aligned with the boxes width and left margin) --}}
                <div class="relative z-20 mt-10 sm:mt-14 lg:ml-[70px] max-w-[1124px] flex flex-col gap-5 text-[#2b2b2b] text-[13.5px] sm:text-[14.5px] leading-relaxed">
                    <p>
                        CWD Realty &amp; Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.
                    </p>
                    <p>
                        Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors. Their willingness to meet clients personally, understand their expectations, and deliver on every commitment became the foundation of the company's reputation.
                    </p>
                    <p>
                        Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.
                    </p>
                    <p>
                        As Cambodia's real estate and hospitality industries continue to grow, CWD Realty &amp; Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- Feature Detail Section (Image/Box on Left, Text on Right) --}}
    <section class="relative z-[200] bg-white pt-6 pb-12 sm:pb-16">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:ml-[70px] max-w-[1124px] flex flex-col lg:flex-row gap-8 sm:gap-10 lg:gap-12 items-start">

                {{-- Left Box with Image --}}
                <div class="w-full lg:w-[460px] lg:max-w-[460px] h-[360px] sm:h-[400px] lg:h-[420px] overflow-hidden shadow-sm flex flex-col bg-gray-100 shrink-0">
                    <img src="{{ asset('about_us/our_story/top_one.png') }}" alt="CWD Realty & Hospitality Journey" class="w-full h-full block" style="width: 100%; height: 100%; object-fit: fill;">
                </div>

                {{-- Right Text Content --}}
                <div class="flex-1 flex flex-col gap-4 sm:gap-5 text-[#2b2b2b] text-[13px] sm:text-[14px] leading-relaxed">
                    <p>
                        CWD Realty &amp; Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.
                    </p>
                    <p>
                        Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors. Their willingness to meet clients personally, understand their expectations, and deliver on every commitment became the foundation of the company's reputation.
                    </p>
                    <p>
                        Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.
                    </p>
                    <p>
                        As Cambodia's real estate and hospitality industries continue to grow, CWD Realty &amp; Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.
                    </p>
                </div>

            </div>
        </div>
    </section>

   


    {{-- Frequently Asked Questions --}}
    <x-faqs />

    {{-- Latest Activities --}}
    <x-latest_activities />

    {{-- Comments Section --}}
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
