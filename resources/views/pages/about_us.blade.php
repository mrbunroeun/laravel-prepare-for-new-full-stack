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
                    <span class="text-[#F4DEAC]">CWD</span>
                    <span class="text-[#F4DEAC] font-normal">Realty &amp; Hospitality</span>
                </h2>

                <p class="text-white text-[15px] leading-relaxed">
                    Specializes in condominium management, property leasing, rental management, and hospitality services in
                    Phnom Penh. Whether you're a property owner seeking professional management or a guest looking for
                    comfortable accommodation, we deliver reliable solutions with exceptional customer service.
                </p>
            </div>
        </div>
    </section>


    {{-- Who We Are section --}}
    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]">
                <h2 class="text-[clamp(28px,4vw,40px)] mb-6">
                    <span class="text-[#2A5A8A] font-normal">Who</span>
                    <span class="text-[#2A5A8A] font-bold">We Are</span>
                </h2>

                <h3 class="text-black text-[clamp(20px,2.5vw,26px)] font-semibold leading-tight mb-6">
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
@endsection
