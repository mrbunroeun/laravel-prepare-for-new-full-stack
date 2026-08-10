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


    @php
        $services = [
            [
                'number' => '01',
                'title' => 'Property Management',
                'description' =>
                    'Professional management for condominium owners, including tenant coordination, maintenance supervision, occupancy management, and rental administration.',
                'link' => url('/properties'),
                'linkText' => 'View Details',
            ],
            [
                'number' => '02',
                'title' => 'Property Leasing',
                'description' => 'Daily, weekly, monthly, and long-term rental services for residential condominiums.',
                'link' => url('/properties'),
                'linkText' => 'View Properties',
            ],
            [
                'number' => '03',
                'title' => 'Sales Services',
                'description' => 'Helping buyers and investors discover quality residential properties in Cambodia.',
                'link' => url('/contact-us'),
                'linkText' => 'Learn More',
            ],
            [
                'number' => '04',
                'title' => 'Hospitality Services',
                'description' =>
                    'Airport transfers, guest assistance, city tours, housekeeping coordination, and personalized hospitality support.',
                'link' => url('/contact-us'),
                'linkText' => 'Explore Services',
            ],
        ];
    @endphp

    {{-- our services --}}
    <section class="relative pl-0 sm:pl-[5rem] bg-none overflow-hidden">
        <div class="max-w-[1400px] mx-auto px-6 sm:px-10 pt-16 pb-0 sm:pt-20">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,36px)] mb-10 sm:mb-1 relative ">
                <span class="text-[#2f6ba7] font-normal">Our</span>
                <span class="text-[#2f6ba7] font-bold">Services</span>
            </h2>

            {{-- Composition wrapper: image + dark block + cards --}}
            <div class="relative min-h-[420px] sm:min-h-[520px] lg:min-h-[600px]">

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

                    @foreach ($services as $service)
                        <div
                            class="bg-[#1479B9] px-5 py-5 sm:px-6 sm:py-6 flex flex-col justify-between min-h-[150px] lg:min-h-[145px]">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-[#F4DEAC] text-[16px] sm:text-[18px] font-bold leading-snug">
                                    {{ $service['title'] }}
                                </h3>
                                <span class="text-[#F4DEAC] text-[26px] sm:text-[30px] font-light leading-none shrink-0">
                                    {{ $service['number'] }}
                                </span>
                            </div>

                            <p class="text-white/90 text-[12px] sm:text-[13px] leading-relaxed mt-3">
                                {{ $service['description'] }}
                            </p>

                            <a href="{{ $service['link'] }}"
                                class="text-[#F4DEAC] text-[11px] sm:text-[13px] font-medium mt-4 inline-flex items-center gap-1 hover:underline">
                                {{ $service['linkText'] }} <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    @endforeach

                </div>

                {{-- Gold accent bar, sits directly under the whole composition (cards + image) --}}
                <div
                    class="lg:absolute lg:left-0 lg:right-0 lg:bottom-0 w-full h-[15px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mt-2 lg:mt-0">
                </div>

            </div>

            {{-- Bottom spacer --}}
            <div class="h-8 sm:h-10 lg:h-6"></div>
        </div>
    </section>

    {{-- Auto move brand section --}}
    <section class="bg-[#2A5A8A] h-[800px] mt-[-15rem]">

    </section>
@endsection
