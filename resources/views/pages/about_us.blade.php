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
            <div class="h-[15px] max-w-[30rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]" data-scroll-reveal="left"></div>
            <div class="max-w-[650px] bg-[#163049]/85 mix-blend-multiply" data-scroll-reveal="left" data-scroll-delay="100">
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
            <div class="max-w-[750px]" data-scroll-reveal="left">
                <h2 class="text-[clamp(22px,3vw,28px)] font-bold mb-6">
                    <span class="text-[#F4DEAC]">About Us</span>
                </h2>

                <p class="text-white text-[15px] leading-relaxed">

                    CWD Realty & Hospitality Specializes in property management, residential leasing, real estate services,
                    and hospitality solutions in Cambodia. We help property owners maximize the value of their investments
                    while providing comfortable, well-managed accommodation for business travelers, expatriates, tourists,
                    and long-term residents.
                </p>
            </div>
        </div>
    </section>


    {{-- Company Overview --}}
    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">
            <div class="max-w-[750px]" data-scroll-reveal="left">
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
    <section class="relative z-[300] bg-white">
        <div class="max-w-[1500px] mx-auto px-6 py-16">

            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-8 lg:gap-4 lg:min-h-[800px]">

                {{-- LEFT: image grid --}}
                <div class="grid grid-cols-2 items-end gap-x-3 lg:gap-x-4 w-full lg:w-2/5 shrink-0 lg:mt-auto" data-scroll-reveal="left">

                    {{-- sticky tall single block --}}
                    <img src="{{ asset('about_us/our_story/longest.png') }}"
                        class="sticky top-10 self-start w-full max-h-[580px] object-cover"></img>

                    {{-- two stacked blocks with gap --}}
                    <div class="flex flex-col gap-y-3 lg:gap-y-4">
                        <img src="{{ asset('about_us/our_story/top_one.png') }}" class="w-full max-h-[400px] object-cover"></img>
                        <img src="{{ asset('about_us/our_story/bottom_one.png') }}"
                            class="w-full max-h-[400px] object-cover"></img>
                    </div>

                </div>

                {{-- RIGHT: Hero content --}}
                <div class="relative z-[200] w-full lg:w-3/5 shrink-0" data-scroll-reveal="right">
                    <div class="pt-0 lg:pt-[2.5rem]">
                        {{-- Gold accent bar --}}
                        <div
                            class="h-[15px] w-full max-w-[30rem] mr-auto bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]">
                        </div>

                        <div class="bg-[#2A5A8A] w-full shadow-lg">
                            <div class="py-10">
                                <h2
                                    class="flex px-3 sm:px-10 items-center gap-4 text-[clamp(30px,3vw,50px)] font-bold mb-6">
                                    <span class="text-[#F4DEAC] font-normal">Our </span>
                                    <span class="text-[#F4DEAC]">Story</span>
                                </h2>
                                <h1 class="text-white px-3 sm:px-10 text-[clamp(20px,3vw,30px)] font-semibold  mb-10">
                                    Building Trust Through Commitment and Personal Relationships
                                </h1>
                                <div class="px-3 flex flex-col gap-5 sm:px-10 text-[clamp(15px,3vw,15px)] mb-10">
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


    {{-- auto move logo --}}
    <x-auto_move.auto_move />



    {{-- Vision, Mission and Core Values --}}
    <section
        class="relative px-0 sm:px-[5rem] md:px-[3rem] mt-[5rem] sm:mt-[10rem] w-full min-h-[1093px] bg-cover bg-center"
        style="background-image: url('{{ asset('about_us/bg/bg_img_blue.png') }}');">
        <div class="max-w-[1400px] mx-auto px-6 py-16">

            {{-- Vision / Mission / Core Values cards --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-24 items-start">

                {{-- Vision --}}
                <div class="info-card bg-[#f3f6f8] p-8 flex flex-col min-h-[360px]" data-scroll-reveal="left">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-[#2A5A8A] text-[28px] font-bold">Vision</h3>
                        <img src="{{ asset('about_us/icons/vision.svg') }}" alt="Vision" class="w-8 h-8 text-[#2A5A8A]">
                    </div>

                    <p class="text-[#2A5A8A] text-[18px] font-medium mb-4 leading-relaxed">
                        Contributing to Cambodia's Growing Property &amp; Hospitality Industry
                    </p>

                    <div class="card-text mb-6">
                        <p class="card-text-p text-black text-[18px] leading-relaxed pb-1 line-clamp-2">To become one of
                            Cambodia's most trusted property management and hospitality companies by delivering professional
                            services, creating long-term value for property owners, and supporting the sustainable growth of
                            Cambodia's real estate sector.</p>
                    </div>

                    <button type="button"
                        class="card-btn flex items-center gap-2 text-[#2A5A8A] text-[18px] font-medium pointer-events-auto cursor-pointer mt-auto">
                        See More
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                </div>

                {{-- Mission --}}
                <div class="info-card bg-[#f3f6f8] p-8 flex flex-col min-h-[360px]" data-scroll-reveal="fade-up" data-scroll-delay="100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-[#2A5A8A] text-[28px] font-bold">Mission</h3>
                        <img src="{{ asset('about_us/icons/mission.svg') }}" alt="Mission" class="w-8 h-8 text-[#2A5A8A]">
                    </div>

                    <div class="card-text mb-6">
                        <p class="card-text-p text-black text-[18px] leading-relaxed pb-1 line-clamp-2">Our mission is to
                            provide professional property management, leasing, and hospitality solutions that benefit both
                            property owners and guests.</p>
                    </div>

                    <button type="button"
                        class="card-btn flex items-center gap-2 text-[#2A5A8A] text-[18px] font-medium pointer-events-auto cursor-pointer mt-auto">
                        See More
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                </div>

                {{-- Core Values --}}
                <div class="info-card bg-[#f3f6f8] p-8 flex flex-col min-h-[360px]" data-scroll-reveal="right" data-scroll-delay="200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-[#2A5A8A] text-[28px] font-bold">Core Values</h3>
                        <img src="{{ asset('about_us/icons/core_value.svg') }}" alt="Core Values"
                            class="w-8 h-8 text-[#2A5A8A]">
                    </div>

                    <p class="text-[#2A5A8A] text-[18px] font-medium mb-4 leading-relaxed">Integrity</p>

                    <div class="card-text mb-6">
                        <p class="card-text-p text-black text-[18px] leading-relaxed pb-1 line-clamp-2">We conduct every
                            business relationship with honesty, transparency, and professionalism.</p>
                    </div>

                    <button type="button"
                        class="card-btn flex items-center gap-2 text-[#2A5A8A] text-[18px] font-medium pointer-events-auto cursor-pointer mt-auto">
                        See More
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                </div>

            </div>

            {{-- What We Do heading --}}
            <div class="mb-12" data-scroll-reveal="left">
                <h2 class="text-white text-[clamp(32px,4vw,44px)] font-normal mb-4">What We Do</h2>
                <p class="text-white text-[18px] leading-relaxed max-w-[600px]">
                    CWD Realty &amp; Hospitality offers comprehensive solutions across the property lifecycle.
                </p>
            </div>

            {{-- Service boxes --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="border-[2px] border-white/70 p-6" data-scroll-reveal="left" data-scroll-delay="0">
                    <h4 class="text-white text-[18px] font-bold mb-4">Property Management</h4>
                    <p class="text-white text-[18px] leading-relaxed">
                        Professional management services that help owners maximize occupancy, maintain property value, and
                        simplify day-to-day operations.
                    </p>
                </div>

                <div class="border-[2px] border-white/70 p-6" data-scroll-reveal="left" data-scroll-delay="100">
                    <h4 class="text-white text-[18px] font-bold mb-4">Property Leasing</h4>
                    <p class="text-white text-[18px] leading-relaxed">
                        Flexible rental solutions including daily, weekly, monthly, and long-term stays for a wide range of
                        guests.
                    </p>
                </div>

                <div class="border-[2px] border-white/70 p-6" data-scroll-reveal="right" data-scroll-delay="100">
                    <h4 class="text-white text-[18px] font-bold mb-4">Property Sales</h4>
                    <p class="text-white text-[18px] leading-relaxed">
                        Helping buyers and investors discover quality residential opportunities in Cambodia.
                    </p>
                </div>

                <div class="border-[2px] border-white/70 p-6" data-scroll-reveal="right" data-scroll-delay="200">
                    <h4 class="text-white text-[18px] font-bold mb-4">Hospitality Services</h4>
                    <p class="text-white text-[18px] leading-relaxed">
                        Enhancing every guest's stay with airport transfers, local assistance, concierge support, and
                        personalized hospitality services.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <style>
        .card-text {
            max-height: 3.6rem;
            overflow: hidden;
            transition: max-height 0.35s ease-in-out;
        }

        .card-text.open {
            max-height: 20rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.card-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const card = btn.closest('.info-card');
                    const text = card.querySelector('.card-text');
                    const paragraph = card.querySelector('.card-text-p');
                    const isOpen = text.classList.toggle('open');
                    paragraph.classList.toggle('line-clamp-2', !isOpen);
                    btn.innerHTML = isOpen ?
                        'See Less <span aria-hidden="true">&uarr;</span>' :
                        'See More <span aria-hidden="true">&rarr;</span>';
                });
            });
        });
    </script>


    @php
        $whyChooseFeatures = [
            [
                'title' => 'Condominium Specialists',
                'description' => 'We specialize in managing condominium and residential investment properties.',
            ],
            [
                'title' => 'Multilingual Communication',
                'description' =>
                    'Our team communicates effectively with local and international clients, ensuring a seamless experience for property owners, tenants, and guests.',
            ],
            [
                'title' => 'Professional Property Management',
                'description' =>
                    'We handle the operational details so property owners can enjoy peace of mind and stronger rental performance.',
            ],
            [
                'title' => 'Hospitality-Focused Service',
                'description' =>
                    'We combine professional property management with personalized guest services to create memorable experiences.',
            ],
            [
                'title' => 'Trusted Local Expertise',
                'description' =>
                    "With knowledge of Cambodia's property market and hospitality industry, we provide practical solutions tailored to each client's needs.",
            ],
        ];
    @endphp


    {{-- Why Choose CWD Realty & Hospitality --}}



    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12" data-scroll-reveal="left">
                <span class="text-[#2A5A8A] font-normal block">Why Choose</span>
                <span class="text-[#2A5A8A] font-bold block">CWD Realty &amp; Hospitality?</span>
            </h2>

            {{-- Cards grid --}}
            <div id="why-choose-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 items-stretch">
                @foreach ($whyChooseFeatures as $index => $feature)
                    @php
                        $direction = ($index === 0 || $index === 3) ? 'left' : (($index === 2 || $index === 4) ? 'right' : 'fade-up');
                    @endphp
                    <div data-scroll-reveal="{{ $direction }}" data-scroll-delay="{{ ($index % 3) * 100 }}" @class([
                        'why-choose-card h-full flex flex-col border-[2px] border-[#2A5A8A] px-6 py-6',
                        'lg:col-span-2' => $index < 3,
                        'lg:col-span-2 lg:col-start-2' => $index === 3,
                        'sm:col-span-2 sm:max-w-[calc(50%-12px)] sm:mx-auto lg:col-span-2 lg:col-start-4 lg:max-w-none lg:mx-0' =>
                            $index === 4,
                    ])>
                        <h3 class="text-[#2A5A8A] text-[15px] sm:text-[16px] font-bold mb-3 leading-snug">
                            {{ $feature['title'] }}
                        </h3>
                        <p class="text-black text-[15px] leading-relaxed">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- Business License & Credentials --}}
    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] z-[300] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16 max-[940px]:py-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-stretch">

                {{-- LEFT: text content --}}
                <div class="flex flex-col justify-center" data-scroll-reveal="left">
                    <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-8">
                        <span class="text-[#2A5A8A] font-normal block">Business License &amp;</span>
                        <span class="text-[#2A5A8A] font-bold block">Credentials</span>
                    </h2>

                    <h3 class="text-black text-[clamp(20px,2.5vw,26px)] font-bold mb-6">
                        Licensed. Trusted. Professional.
                    </h3>

                    <p class="text-black text-[18px] leading-relaxed mb-6">
                        CWD Realty &amp; Hospitality operates as a legally registered business in Cambodia, conducting our
                        services with professionalism, transparency, and compliance with local regulations.
                    </p>

                    <p class="text-black text-[18px] leading-relaxed">
                        Our commitment to ethical business practices provides confidence to property owners, investors,
                        business partners, and guests who choose to work with us.
                    </p>
                </div>

                {{-- RIGHT: stats panel --}}
                <div
                    data-scroll-reveal="right"
                    class="relative bg-[#1479B9] px-8 py-10 sm:px-10 sm:py-12 flex flex-col justify-between min-h-[420px] overflow-hidden">

                    <div class="flex flex-col gap-8">

                        <div>
                            <p class="text-white text-[18px] max-w-[230px] leading-relaxed">Memberships in professional
                                associations:</p>
                        </div>

                        <div>
                            <p class="text-white text-[18px] leading-relaxed">Years of Experience:</p>
                            <p class="text-white text-[18px] leading-relaxed ">8 Years+ Experience</p>
                            <p class="text-white text-[18px] leading-relaxed">Number of Managed Properties:</p>
                        </div>

                        <div>
                            <p class="text-white text-[18px] leading-relaxed">Occupancy Rate:</p>
                        </div>

                        <div>
                            <p class="text-white text-[18px] leading-relaxed">Number of Happy Guests or Clients:</p>
                        </div>

                    </div>

                    {{-- Placeholder mark for TBD stats --}}
                    <span
                        class="absolute bottom-4 right-6 text-black text-[80px] sm:text-[100px] font-semibold leading-none select-none pointer-events-none">
                        ?
                    </span>

                </div>

            </div>

        </div>
    </section>



                {{-- Three-column images --}}
    @php
        $img1 = !empty($aboutShowcase->image_1) ? asset($aboutShowcase->image_1) : asset('home/latest_activities/1img.png');
        $img2 = !empty($aboutShowcase->image_2) ? asset($aboutShowcase->image_2) : asset('about_us/our_story/longest.png');
        $img3 = !empty($aboutShowcase->image_3) ? asset($aboutShowcase->image_3) : asset('about_us/our_story/bottom_one.png');
        $alt1 = $aboutShowcase->alt_1 ?? 'CWD Realty Story';
        $alt2 = $aboutShowcase->alt_2 ?? 'CWD Realty Development';
        $alt3 = $aboutShowcase->alt_3 ?? 'CWD Realty Properties';
    @endphp
    <section class="relative px-0 sm:px-[5rem] md:px-[3rem] bg-white">
        <div class="max-w-[1400px] mx-auto px-6 py-16">

            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6 max-w-[1350px] mx-auto items-stretch">

                <div class="w-full aspect-[3/4] overflow-hidden shadow-lg group bg-gray-100 relative" data-scroll-reveal="left">
                    <img src="{{ $img1 }}" alt="{{ $alt1 }}"
                        class="w-full h-full object-fill block transition-transform duration-500 ease-out group-hover:scale-105">
                </div>

                <div class="w-full aspect-[3/4] overflow-hidden shadow-lg group bg-gray-100 relative" data-scroll-reveal="fade-up" data-scroll-delay="100">
                    <img src="{{ $img2 }}" alt="{{ $alt2 }}"
                        class="w-full h-full object-fill block transition-transform duration-500 ease-out group-hover:scale-105">
                </div>

                <div class="w-full aspect-[3/4] overflow-hidden shadow-lg group bg-gray-100 relative" data-scroll-reveal="right" data-scroll-delay="200">
                    <img src="{{ $img3 }}" alt="{{ $alt3 }}"
                        class="w-full h-full object-fill block transition-transform duration-500 ease-out group-hover:scale-105">
                </div>

            </div>

        </div>
    </section>




    {{-- Frequently Asked Questions --}}
    @php
        $faqLeft = [
            [
                'question' => 'What services does CWD Realty & Hospitality provide?',
                'answer' =>
                    'We provide property management, residential leasing, property sales, daily and long-term rentals, and hospitality services for property owners, investors, and guests.',
            ],
            [
                'question' => 'Who are your typical clients?',
                'answer' => 'ComingSoon',
            ],
        ];

        $faqRight = [
            [
                'question' => 'Why choose CWD Realty & Hospitality?',
                'answer' => 'ComingSoon',
            ],
        ];
    @endphp

    <x-faqs :faq-left="$faqLeft" :faq-right="$faqRight" />

    {{-- comments section --}}
    <x-comments.comments />





    {{-- Looking for your next stay --}}
    <section class="relative max-w-[1600px] mx-auto">
        <div class="max-w-full min-[900px]:max-w-[80%] ml-auto" data-scroll-reveal="right">
            <img src="{{ asset('home/looking_for_your_next/looking_for.png') }}" alt="CWD Realty residential towers"
                class="w-full h-auto min-h-[220px] object-cover">

            <div
                class="relative max-w-[520px] mt-6 px-6
                        min-[900px]:ml-[-8rem] min-[900px]:mt-[-6.5rem] min-[900px]:px-0">
                <h2 class="text-[#DCC597] text-[clamp(22px,5vw,40px)] font-bold leading-tight">
                    <span class="block min-[900px]:hidden">
                        Looking for Professional
                        Property Management or
                        Comfortable Accommodation?
                    </span>
                    <span class="hidden min-[900px]:block">
                        Looking for Professional<br>
                        Property Management or<br>
                        Comfortable Accommodation?
                    </span>
                </h2>
            </div>
        </div>

        <div
            data-scroll-reveal="left"
            class="max-w-[420px] mt-4 px-6
        min-[900px]:absolute min-[900px]:left-1/2 min-[900px]:ml-[-40px] min-[900px]:bottom-[-2rem] min-[900px]:mt-0 min-[900px]:px-0 min-[900px]:w-[420px] min-[900px]:text-left">
            <p class="text-black/70 text-[14px] pb-[4px] sm:text-[15px] leading-relaxed">
                Whether you're a property owner seeking reliable management services or a guest looking for quality
                accommodation, CWD Realty &amp; Hospitality is here to help.
            </p>

            <a href="{{ url('/contact-us') }}"
                class="inline-flex items-center gap-2 text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium hover:underline">
                Contact Our Team Today
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </section>


    {{-- Professional Property --}}
    <section class="mt-16 sm:mt-24 md:mt-30 min-[900px]:mt-[15.5rem] lg:mt-[16.5rem] pb-8 sm:pb-12">
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
