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
                        <span class="h-[3px] w-15 bg-[rgb(244,222,172)]"></span>
                        <span class="text-[#F4DEAC] font-normal">Property<br> <span
                                class="text-[#F4DEAC] font-bold">Management</span></span>

                    </h2>

                    <h1 class="text-white px-10 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold leading-tight mb-10">
                        Professional Property Management
                        Services in Cambodia
                    </h1>

                    <div class="flex items-center px-10 sm:px-10 gap-4 pointer-events-auto">
                        <a href="{{ url('/properties') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ url('/contact-us') }}"
                            class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
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
                    <span class="text-[#F4DEAC]">CWD Realty & Hospitality </span>
                </h2>

                <p class="text-white text-[15px] leading-relaxed">
                    Provides professional condominium and residential property management services in Cambodia, helping
                    property owners maximize rental income while maintaining high property standards.
                </p>
            </div>
        </div>
    </section>


    {{-- Maximize Your Property Investment --}}
    <section class="relative z-[300] bg-white">
        <div class="max-w-[1500px] mx-auto  py-16 max-[940px]:py-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-26 items-start">

                {{-- LEFT: gold line + heading --}}
                <div class="flex flex-row ">
                    <div class="h-[2px] w-full bg-[#c9a463] mr-[2rem] mt-6"></div>

                    <h2 class="text-[#2A5A8A] text-[clamp(28px,3.5vw,38px)] font-normal leading-tight">
                        Maximize Your Property Investment with Professional Management
                    </h2>
                </div>

                {{-- RIGHT: image + body text --}}
                <div class="flex flex-col mt-0 lg:mt-[-7rem] gap-8">
                    <img src="{{ asset('services/maximmize/maximize.png') }}" alt="Phnom Penh skyline"
                        class="w-full h-[350px] object-cover">

                    <div class="flex flex-col gap-4">
                        <p class="text-black text-[15px] leading-relaxed">
                            Managing a rental property requires time, expertise, and consistent attention to detail. CWD
                            Realty &amp; Hospitality provides comprehensive property management services that help
                            condominium owners protect their investments, increase occupancy, and deliver exceptional
                            experiences for tenants and guests.
                        </p>

                        <p class="text-black text-[15px] leading-relaxed">
                            Whether your property is intended for daily, weekly, monthly, or long-term rentals, our
                            experienced team manages every aspect of the operation so you can enjoy peace of mind and
                            reliable returns.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>



    {{-- What is Property Management --}}
    <section class="relative bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16">

            <div class="grid grid-cols-1 lg:grid-cols-2 items-start">

                {{-- LEFT: black placeholder block --}}
                <div class="bg-[#000000] w-full h-[280px] lg:h-[300px]"></div>

                {{-- RIGHT: blue content card --}}
                <div
                    class="relative z-[200] text-[#2f6ba7] pointer-events-none w-full lg:w-4/5 lg:ml-[-2rem] lg:mt-[1.5rem]">
                    {{-- Gold accent bar --}}
                    <div class="h-[8px] w-[85%] ml-auto bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

                    <div class="bg-[#2A5A8A] w-full">
                        <div class="px-6 sm:px-8 py-6 sm:py-8">
                            <h2 class="text-[clamp(20px,2.5vw,26px)] leading-tight mb-4">
                                <span class="text-[#F4DEAC] font-normal block">What is</span>
                                <span class="text-[#F4DEAC] font-bold block">Property Management?</span>
                            </h2>

                            <p class="text-white text-[13px] sm:text-[13.5px] leading-relaxed">
                                Property management is the professional administration of residential properties on behalf
                                of owners. Our team oversees daily operations, tenant coordination, maintenance scheduling,
                                rental administration, financial reporting, and hospitality services to ensure your property
                                performs efficiently and remains well maintained.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
