@extends('layouts.app')
@section('content')
    {{-- Hero image & content wrapper --}}
    <div class="relative w-full pt-[112px] min-[1161px]:pt-[120px]">
        {{-- Hero container: dynamic responsive height that shrinks on resize and caps max height --}}
        <div class="relative w-full h-[420px] sm:h-[460px] md:h-[500px] lg:h-[540px] xl:h-[580px] max-h-[600px] overflow-hidden">
            <img class="w-full h-full object-cover object-center"
                src="{{ asset('services/uc88/uc88.png') }}" 
                alt="UC88">

            {{-- Floating Hero Card Overlay --}}
            <div class="absolute inset-0 flex items-center z-10 pointer-events-none">
                <div class="w-full max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8">
                    {{-- Gold accent bar --}}
                    <div class="h-[12px] sm:h-[15px] max-w-[26rem] sm:max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
                    <div class="max-w-[580px] lg:max-w-[620px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
                        <div class="px-0 py-5 sm:py-7 lg:py-8">
                            <h2 class="flex flex-row items-center gap-3 sm:gap-4 text-[clamp(16px,2.2vw,26px)] font-bold mb-3 sm:mb-4">
                                <span class="h-[3px] w-10 sm:w-14 bg-[#F4DEAC]"></span>
                                <span class="text-[#F4DEAC] font-bold">UC88</span>
                            </h2>

                            <h1 class="text-white px-7 sm:px-10 text-[clamp(18px,2.4vw,28px)] font-semibold leading-tight mb-3 sm:mb-5">
                                Residential Property<br>Project
                            </h1>

                            <div class="text-[#F4DEAC] px-7 sm:px-10 text-[clamp(24px,3.5vw,42px)] font-light leading-tight mb-5 sm:mb-7 tracking-wide">
                                Coming Soon
                            </div>

                            <div class="flex items-center px-7 sm:px-10 gap-3 sm:gap-4 pointer-events-auto">
                                <a href="{{ url('/properties') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[12px] sm:text-[14px] font-medium px-3.5 sm:px-5 py-2 sm:py-2.5 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                    Browse Properties
                                </a>
                                <a href="{{ url('/contact-us') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[12px] sm:text-[14px] font-medium px-3.5 sm:px-5 py-2 sm:py-2.5 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


