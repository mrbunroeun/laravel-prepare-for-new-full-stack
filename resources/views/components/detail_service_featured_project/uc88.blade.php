@extends('layouts.app')
@section('content')
    {{-- Hero image & content wrapper --}}
    <div class="relative w-full pt-[112px] min-[1161px]:pt-[120px]">
        {{-- Hero container with original image aspect ratio (2160:908) --}}
        <div class="relative w-full aspect-[2160/908] min-h-[500px] sm:min-h-[580px] lg:min-h-[680px]">
            <img class="w-full h-full object-cover object-center"
                src="{{ asset('services/uc88/uc88.png') }}" 
                alt="UC88">

            {{-- Floating Hero Card Overlay --}}
            <div class="absolute inset-0 flex items-center z-10 pointer-events-none">
                <div class="w-full max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8">
                    {{-- Gold accent bar --}}
                    <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply">
                        <div class="px-0 py-8 sm:py-10">
                            <h2 class="flex flex-row items-center gap-4 text-[clamp(18px,2.5vw,28px)] font-bold mb-4 sm:mb-6">
                                <span class="h-[3px] w-12 sm:w-15 bg-[#F4DEAC]"></span>
                                <span class="text-[#F4DEAC] font-bold">UC88</span>
                            </h2>

                            <h1 class="text-white px-8 sm:px-10 text-[clamp(20px,2.8vw,30px)] font-semibold leading-tight mb-4 sm:mb-6">
                                Residential Property<br>Project
                            </h1>

                            <div class="text-[#F4DEAC] px-8 sm:px-10 text-[clamp(28px,4vw,48px)] font-light leading-tight mb-6 sm:mb-8 tracking-wide">
                                Coming Soon
                            </div>

                            <div class="flex items-center px-8 sm:px-10 gap-4 pointer-events-auto">
                                <a href="{{ url('/properties') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-2.5 sm:py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
                                    Browse Properties
                                </a>
                                <a href="{{ url('/contact-us') }}"
                                    class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[15px] font-medium px-3 sm:px-6 py-2.5 sm:py-3 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
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

