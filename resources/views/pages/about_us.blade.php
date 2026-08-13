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


    {{--About Us--}}
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
                    CWD Realty & Hospitality is a Cambodian property management and hospitality company committed to delivering professional real estate services with exceptional customer care. Our expertise spans property management, residential leasing, property sales, and guest hospitality, providing tailored solutions for both property owners and tenants.
                </p>
                <p class="text-black text-[15px] leading-relaxed">
                    We understand that every property is an investment and every guest experience matters. By combining operational excellence, responsive communication, and local market knowledge, we create long-term value for property owners while ensuring a comfortable and enjoyable stay for our guests.
                </p>
            </div>
        </div>
    </section>


{{-- CWD real estate --}}
{{-- <section class="relative z-[200] lg:mt-[-5rem] lg:mb-[10rem] text-[#2f6ba7] pointer-events-none overflow-x-hidden">
    <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">

        <div class="grid lg:grid-cols-[minmax(0,1fr)_minmax(0,1.35fr)] gap-14 lg:gap-20 items-start">

            {{-- LEFT: asymmetrical black block composition --}}
            <div class="grid grid-cols-[minmax(110px,45%)_1fr] gap-x-6 lg:gap-x-10 max-[640px]:grid-cols-2 max-[640px]:gap-x-4">

                {{-- Column 2 wrapper: BLACK 2 + BLACK 3 stacked with gap-y --}}
                <div class="col-start-2 flex flex-col gap-y-10 lg:gap-y-14 max-[640px]:col-start-2">
                    {{-- BLACK 2 (top) --}}
                    <div class="bg-[#000000] h-[220px] w-full max-[640px]:h-[220px]"></div>

                    {{-- BLACK 3 (below) --}}
                    <div class="bg-[#000000] h-[180px] w-full max-[640px]:h-[180px]"></div>
                </div>

                {{-- BLACK 1 (left, lower, offset down) --}}
                <div class="bg-[#000000] col-start-1 row-start-1 w-full h-[420px] self-end max-[640px]:col-start-1 max-[640px]:self-start max-[640px]:h-[380px]"></div>

            </div>

            {{-- RIGHT: existing CWD content --}}
            <div>
                {{-- Gold accent bar --}}
                <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply">
                    <div class="px-0 py-10">

                        <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)] font-bold mb-6">
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

        </div>

    </div>
{{-- </section>  --}}




{{-- Two-column image grid --}}
<section class="relative bg-white pointer-events-none">
    <div class="max-w-[1400px] mx-auto px-6 py-16">

        <div class="grid grid-cols-2 items-start gap-x-6 lg:gap-x-8 max-w-[700px]">

            {{-- LEFT: sticky tall single block --}}
            <div class="sticky top-10 self-start bg-[#000000] w-full h-[580px]"></div>

            {{-- RIGHT: two stacked blocks with gap --}}
            <div class="flex flex-col gap-y-6 lg:gap-y-8">
                <div class="bg-[#000000] w-full h-[400px]"></div>
                <div class="bg-[#000000] w-full h-[380px]"></div>
            </div>

        </div>

    </div>

    {{-- Hero content, aligned to the right --}}
    <div class="relative z-[200] lg:mt-[-5rem] lg:mb-[10rem] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            <div class="ml-auto max-w-[650px]">
                {{-- Gold accent bar --}}
                <div class="h-[15px] max-w-[30rem] ml-auto bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
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

        </div>
    </div>
</section>

@endsection
