@extends('layouts.app')
@section('content')
    {{-- Hero image section --}}
    <section
        class="absolute top-0 left-0 w-full z-[100] h-[2000px] text-[3rem] text-[#2f6ba7] pointer-events-none overflow-hidden">
        <img class="absolute min-h-[800px]  max-[1240px]:min-h-[650px] max-[940px]:min-h-[520px] max-[940px]:pt-[2rem] w-full object-cover object-right"
            src="{{ asset('hero_section/hero_section.png') }}" alt="">
    </section>

    {{-- Hero content, sits above the hero image --}}
    <section class="relative z-[200] text-[#2f6ba7] pointer-events-none">
        <div class="pt-[20rem] max-[1240px]:pt-[15rem] max-[940px]:pt-[10rem] max-w-[1400px] mx-auto px-6">
            {{-- Gold accent bar --}}
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply">
                <div class="px-10 py-10">
                    <h2 class="flex items-center gap-4 text-[clamp(20px,3vw,30px)]  font-bold mb-6">
                        <span class="h-[2px] w-10 bg-[#c9a15c]"></span>
                        <span class="text-[#F4DEAC]">CWD</span>
                        <span class="text-[#F4DEAC] font-normal">Real Estate Agent &amp; Developer</span>
                    </h2>

                    <h1 class="text-white text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Your Trusted Property Management &amp; Hospitality Partner in Cambodia
                    </h1>

                    <div class="flex items-center gap-4 pointer-events-auto">
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


    {{-- About / Realty & Hospitality section --}}
    <section class="pl-0 sm:pl-[5rem] relative  z-[300] mt-[1rem] sm:mt-[2rem] md:mt-[2.3rem] lg:mt-[4rem] bg-[#2A5A8A]">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]">
                <h2 class="text-[clamp(22px,3vw,28px)] font-bold mb-6">
                    <span class="text-[#F4DEAC]">CWD</span>
                    <span class="text-white font-normal">Realty &amp; Hospitality</span>
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
    <section class="relative pl-0 sm:pl-[5rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class=" max-w-[750px]">
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


    {{-- our services --}}
    <section class="relative bg-white overflow-hidden">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 pt-16 pb-0 sm:pt-20">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,36px)] mb-10 sm:mb-14 relative z-[50]">
                <span class="text-[#2f6ba7] font-normal">Our</span>
                <span class="text-[#2f6ba7] font-bold">Services</span>
            </h2>

            {{-- Composition wrapper: image + dark block + cards --}}
            <div class="relative min-h-[420px] sm:min-h-[520px] lg:min-h-[600px]">

                {{-- Dark blue background block (lower-left, behind cards) --}}
                <div class="hidden lg:block absolute left-0 right-[48%] bottom-0 top-[45%]  z-[10]"></div>
                <div class="hidden sm:block lg:hidden absolute left-0 right-0 bottom-0 top-[55%] bg-[#2F6190] z-[10]"></div>

                {{-- Property image (right side on desktop, full width on mobile) --}}
                <div
                    class="relative w-full h-[260px] sm:h-[340px] lg:absolute lg:right-0 lg:top-0 lg:w-[51%] lg:h-full z-[20]">
                    <img src="{{ asset('home/our_services/our_services.png') }}"
                        alt="CWD Realty modern residential condominium tower in Phnom Penh"
                        class="w-full h-full object-cover">
                </div>

                {{-- Service cards grid --}}
                <div
                    class="relative lg:absolute lg:left-0 lg:top-[18%] lg:w-[54%] z-[30]
                        -mt-16 sm:-mt-20 lg:mt-0
                        grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 gap-2 sm:gap-2.5
                        px-4 sm:px-0">

                    {{-- Card 01 --}}
                    <div
                        class="bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col justify-between min-h-[150px] lg:min-h-[145px]">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-white text-[13px] sm:text-[14px] font-bold leading-snug">
                                Property Management
                            </h3>
                            <span
                                class="text-white/30 text-[26px] sm:text-[30px] font-light leading-none shrink-0">01</span>
                        </div>
                        <p class="text-white/90 text-[10px] sm:text-[11px] leading-relaxed mt-3">
                            Professional management for condominium owners, including tenant coordination, maintenance
                            supervision, occupancy management, and rental administration.
                        </p>
                        <a href="{{ url('/properties') }}"
                            class="text-[#F4DEAC] text-[9px] sm:text-[10px] font-medium mt-4 inline-flex items-center gap-1 hover:underline">
                            View Details <span aria-hidden="true">→</span>
                        </a>
                    </div>

                    {{-- Card 02 --}}
                    <div
                        class="bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col justify-between min-h-[150px] lg:min-h-[145px]">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-white text-[13px] sm:text-[14px] font-bold leading-snug">
                                Property Leasing
                            </h3>
                            <span
                                class="text-white/30 text-[26px] sm:text-[30px] font-light leading-none shrink-0">02</span>
                        </div>
                        <p class="text-white/90 text-[10px] sm:text-[11px] leading-relaxed mt-3">
                            Daily, weekly, monthly, and long-term rental services for residential condominiums.
                        </p>
                        <a href="{{ url('/properties') }}"
                            class="text-[#F4DEAC] text-[9px] sm:text-[10px] font-medium mt-4 inline-flex items-center gap-1 hover:underline">
                            View Properties <span aria-hidden="true">→</span>
                        </a>
                    </div>

                    {{-- Card 03 --}}
                    <div
                        class="bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col justify-between min-h-[150px] lg:min-h-[145px]">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-white text-[13px] sm:text-[14px] font-bold leading-snug">
                                Sales Services
                            </h3>
                            <span
                                class="text-white/30 text-[26px] sm:text-[30px] font-light leading-none shrink-0">03</span>
                        </div>
                        <p class="text-white/90 text-[10px] sm:text-[11px] leading-relaxed mt-3">
                            Helping buyers and investors discover quality residential properties in Cambodia.
                        </p>
                        <a href="{{ url('/contact-us') }}"
                            class="text-[#F4DEAC] text-[9px] sm:text-[10px] font-medium mt-4 inline-flex items-center gap-1 hover:underline">
                            Learn More <span aria-hidden="true">→</span>
                        </a>
                    </div>

                    {{-- Card 04 --}}
                    <div
                        class="bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col justify-between min-h-[150px] lg:min-h-[145px]">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-white text-[13px] sm:text-[14px] font-bold leading-snug">
                                Hospitality Services
                            </h3>
                            <span
                                class="text-white/30 text-[26px] sm:text-[30px] font-light leading-none shrink-0">04</span>
                        </div>
                        <p class="text-white/90 text-[10px] sm:text-[11px] leading-relaxed mt-3">
                            Airport transfers, guest assistance, city tours, housekeeping coordination, and personalized
                            hospitality support.
                        </p>
                        <a href="{{ url('/contact-us') }}"
                            class="text-[#F4DEAC] text-[9px] sm:text-[10px] font-medium mt-4 inline-flex items-center gap-1 hover:underline">
                            Explore Services <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Bottom spacer so dark block/cards don't get clipped on mobile --}}
            <div class="h-8 sm:h-10 lg:h-0"></div>
        </div>
    </section>
@endsection
