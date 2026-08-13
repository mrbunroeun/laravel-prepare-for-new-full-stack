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
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply">
                <div class="px-0 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)]  font-bold mb-6">
                        <span class="h-[3px] w-15 bg-[#F4DEAC]"></span>
                        <span class="text-[#F4DEAC]">CWD</span>
                        <span class="text-[#F4DEAC] font-normal">Real Estate Agent &amp; Developer</span>
                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Your Trusted Property Management &amp; Hospitality Partner in Cambodia
                    </h1>

                    <div class="flex items-center px-10 sm:px-10 gap-4 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[15px] font-medium px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[15px] font-medium px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- About Us --}}
    <section
        class="px-0 sm:px-[5rem] md:px-[3rem] relative z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]">
                <h2 class="text-[clamp(22px,3vw,28px)] font-bold mb-6">
                    <span class="text-[#F4DEAC]">About Us</span>
                </h2>

                <p class="text-white text-[15px] leading-relaxed">
                    Specializes in condominium management, property leasing, rental management, and hospitality services in
                    Phnom Penh. Whether you're a property owner seeking professional management or a guest looking for
                    comfortable accommodation, we deliver reliable solutions with exceptional customer service.
                </p>
            </div>
        </div>
    </section>


    {{-- Company Overview --}}
    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]">
                <h2 class="text-[clamp(28px,4vw,40px)] mb-6">
                    <span class="text-[#2A5A8A] font-normal">Company </span>
                    <span class="text-[#2A5A8A] font-bold">Overview</span>
                </h2>

                <h3 class="text-black text-[clamp(20px,2.5vw,26px)] max-w-[450px] font-semibold leading-tight mb-6">
                    Professional Property Management with a Hospitality Mindset
                </h3>

                <p class="text-black text-[15px] pb-[25px] leading-relaxed">
                    CWD Realty & Hospitality is a Cambodian property management and hospitality company committed to
                    delivering professional real estate services with exceptional customer care. Our expertise spans
                    property management, residential leasing, property sales, and guest hospitality, providing tailored
                    solutions for both property owners and tenants.
                </p>
                <p class="text-black text-[15px] leading-relaxed">
                    We understand that every property is an investment and every guest experience matters. By combining
                    operational excellence, responsive communication, and local market knowledge, we create long-term value
                    for property owners while ensuring a comfortable and enjoyable stay for our guests.
                </p>
            </div>
        </div>
    </section>




    {{-- Two-column image grid + Hero content --}}
    <section class="relative z-[300] bg-white pointer-events-none">
        <div class="max-w-[1500px] mx-auto px-6 py-16">

            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-8 lg:gap-4 lg:min-h-[800px]">

                {{-- LEFT: black-block grid --}}
                <div class="grid grid-cols-2 items-end gap-x-3 lg:gap-x-4 w-full lg:w-2/5 shrink-0 lg:mt-auto">

                    {{-- sticky tall single block --}}
                    <img src="{{ asset('about_us/1.our_story/longest.png') }}"
                        class="sticky top-10 self-start bg-[#000000] w-full h-[580px]"></img>

                    {{-- two stacked blocks with gap --}}
                    <div class="flex flex-col gap-y-3 lg:gap-y-4">
                        <img src="{{ asset('about_us/1.our_story/top_one.png') }}" class="bg-none w-full h-[400px]"></img>
                        <img src="{{ asset('about_us/1.our_story/bottom_one.png') }}"
                            class="bg-none w-full h-[400px]"></img>
                    </div>

                </div>

                {{-- RIGHT: Hero content --}}
                <div class="relative z-[200] text-[#2f6ba7] pointer-events-none w-full lg:w-3/5 shrink-0">
                    <div class="pt-0 lg:pt-[2.5rem]">
                        {{-- Gold accent bar --}}
                        <div
                            class="h-[15px] w-full max-w-[30rem] mr-auto bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]">
                        </div>

                        <div class="bg-[#163049]/85 w-full mix-blend-multiply">
                            <div class="py-10">
                                <h2
                                    class="flex px-10 sm:px-10 items-center gap-4 text-[clamp(30px,3vw,50px)]  font-bold mb-6">
                                    <span class="text-[#F4DEAC] font-normal">Our </span>
                                    <span class="text-[#F4DEAC]">Story</span>
                                </h2>
                                <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold  mb-10">
                                    Building Trust Through Commitment and Personal Relationships
                                </h1>
                                <div class="px-10 flex flex-col gap-5 sm:px-10 text-[clamp(15px,3vw,15px)] mb-10">
                                    <p class="text-white  ">
                                        CWD Realty & Hospitality was founded with a clear vision—to create a professional
                                        property management and hospitality company built on trust, integrity, and long-term
                                        partnerships.
                                    </p>
                                    <p class="text-white  ">
                                        Our journey began with founders who were committed to expanding business
                                        opportunities
                                        beyond Cambodia. Through frequent international travel, face-to-face meetings,
                                        business
                                        presentations, and contract negotiations, they established valuable relationships
                                        with
                                        overseas partners and property investors. Their willingness to meet clients
                                        personally,
                                        understand their expectations, and deliver on every commitment became the foundation
                                        of
                                        the company's reputation.
                                    </p>
                                    <p class="text-white  ">

                                        Today, that same commitment continues to shape how we serve every property owner,
                                        tenant, investor, and guest. We believe that lasting business relationships are
                                        built
                                        through professionalism, transparency, and consistently delivering value.
                                    </p>
                                    <p class="text-white  ">
                                        As Cambodia's real estate and hospitality industries continue to grow, CWD Realty &
                                        Hospitality remains dedicated to providing dependable property management, flexible
                                        leasing solutions, and exceptional hospitality services that create value for both
                                        property owners and residents.
                                    </p>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>



    {{-- auto-move part --}}
    <section class="relative w-full flex mt-[2rem] sm:mt-[5rem] justify-center ">

        <img src="{{ asset('home/auto_move_logo/auto_move_light_white.png') }}" alt="CWD Realty auto-move logo"
            class="w-full h-auto object-contain">

        {{-- Scrolling text overlay --}}
        <div class="absolute inset-0 flex items-center overflow-hidden pointer-events-none">
            <div class="cwd-marquee-track flex items-center whitespace-nowrap">
                @for ($i = 0; $i < 12; $i++)
                    <span class="text-[#2A5A8A] text-[clamp(14px,2vw,22px)] mx-6 sm:mx-10 shrink-0">
                        <span class="font-bold">CWD</span> Real Estate Agent &amp; Developer
                    </span>
                @endfor
            </div>
        </div>

        <style>
            .cwd-marquee-track {
                width: max-content;
                animation: cwd-marquee 45s linear infinite;
            }

            /* Pause on hover, if wanted */
            .cwd-marquee-track:hover {
                animation-play-state: paused;
            }

            @keyframes cwd-marquee {
                from {
                    transform: translateX(-50%);
                }

                to {
                    transform: translateX(0);
                }
            }
        </style>
    </section>


    {{-- bg --}}
    <section></section>
    
@endsection
