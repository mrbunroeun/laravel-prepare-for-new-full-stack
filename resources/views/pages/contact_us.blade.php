@extends('layouts.app')

@section('hide_footer', 'true')

@section('content')
    {{-- Fixed Hero Background Image (z-[100] sits on top of navbar background) --}}
    <div class="fixed inset-0 w-full h-full z-[100] pointer-events-none overflow-hidden">
        <img class="w-full h-full object-cover object-right"
            src="{{ asset('hero_section/hero_sectionsss.png') }}" alt="Contact Us Hero">
    </div>

    {{-- Centered Contact Content Section --}}
    <section class="relative z-[200] min-h-screen flex items-center justify-center pt-28 max-md:pt-36 pb-12 sm:pt-28 sm:pb-16 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-[1180px] mx-auto my-auto max-md:mt-4">

            {{-- Gold accent bar on top --}}
            <div class="h-[12px] sm:h-[14px] w-[45%] sm:w-[35%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

            {{-- Dark Blue Translucent Container --}}
            <div class="w-full bg-[#163049]/90 backdrop-blur-sm p-6 sm:p-7 lg:p-9 shadow-2xl">
                    <div class="grid grid-cols-1 md:grid-cols-[1.6fr_0.5fr_1.1fr] gap-8 lg:gap-12 text-white">

                        {{-- Left Column: Logo + Tagline + Paragraph + Socials --}}
                        <div class="flex flex-col gap-4" data-scroll-reveal="left">
                            <a href="{{ url('/') }}" class="self-start inline-block transition-opacity duration-200 hover:opacity-90" aria-label="Go to Home">
                                <img src="{{ asset('logo_nav_foot/footer_logo.svg') }}" alt="CWD Logo" class="h-14 sm:h-16 w-auto">
                            </a>

                            <h3 class="flex items-center gap-3 text-[16px] sm:text-[18px] font-bold text-[#F4DEAC] max-md:mt-2">
                                <span class="h-[2px] w-8 sm:w-10 bg-[#F4DEAC]"></span>
                                <a href="{{ url('/') }}" class="hover:opacity-95 transition-opacity">
                                    <span><strong class="text-[#F4DEAC] font-bold">CWD</strong> Real Estate Agent &amp; Developer</span>
                                </a>
                            </h3>

                            <p class="text-white/80 text-[13px] sm:text-[14px] leading-relaxed max-w-[480px]">
                                CWD Realty &amp; Hospitality specializes in condominium management, property leasing, rental management, and hospitality services in Phnom Penh. Whether you're a property owner seeking professional management or a guest looking for comfortable accommodation, we deliver reliable solutions with exceptional customer service.
                            </p>

                            <div class="flex items-center gap-3 mt-2">
                                <a href="#" aria-label="Facebook"
                                    class="w-7 h-7 rounded-full bg-[#1877F2] flex items-center justify-center hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor">
                                        <path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.14 8.44 9.94v-7.03H7.9v-2.91h2.54V9.86c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.91h-2.34V22c4.78-.8 8.44-4.94 8.44-9.94z" />
                                    </svg>
                                </a>
                                <a href="#" aria-label="WhatsApp"
                                    class="w-7 h-7 rounded-full bg-[#25D366] flex items-center justify-center hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor">
                                        <path d="M12.02 2C6.5 2 2.02 6.48 2.02 12c0 1.77.46 3.45 1.28 4.9L2 22l5.25-1.28A9.96 9.96 0 0012.02 22C17.54 22 22 17.52 22 12S17.54 2 12.02 2zm5.85 14.24c-.25.71-1.24 1.3-2.03 1.47-.55.12-1.26.21-3.65-.78-2.99-1.24-4.92-4.26-5.07-4.46-.15-.2-1.2-1.6-1.2-3.05 0-1.45.75-2.16 1.02-2.46.27-.3.58-.37.78-.37.2 0 .39 0 .56.01.18.01.42-.07.65.5.25.6.85 2.07.92 2.22.07.15.12.33.02.53-.1.2-.15.33-.3.5-.15.18-.31.4-.44.53-.15.15-.3.31-.13.6.17.3.75 1.24 1.62 2.01 1.11.99 2.05 1.3 2.34 1.44.29.15.46.13.63-.08.17-.2.71-.83.9-1.11.19-.29.38-.24.63-.15.25.1 1.62.77 1.9.91.28.14.46.21.53.33.08.13.08.72-.17 1.43z" />
                                    </svg>
                                </a>
                                <a href="#" aria-label="Telegram"
                                    class="w-7 h-7 rounded-full bg-[#26A5E4] flex items-center justify-center hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor">
                                        <path d="M21.9 4.3c.28-1.17-.42-1.63-1.18-1.35L2.6 10.36c-1.13.45-1.11 1.08-.19 1.36l4.6 1.44 1.79 5.44c.22.6.4.83.8.83.4 0 .58-.18.8-.4l1.9-1.85 4.02 2.96c.72.4 1.24.2 1.42-.68l2.15-15.16zM8.86 13.4l9.3-5.86c.44-.27.84-.13.51.17l-7.9 7.13-.3 3.24-1.61-4.68z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        {{-- Middle Column: Quick Links --}}
                        <div class="flex flex-col gap-1.5 max-md:mt-6 max-w-[260px]" data-scroll-reveal="fade-up" data-scroll-delay="100">
                            <h4 class="text-[#DCC597] text-[15px] sm:text-[16px] font-bold mb-1">Quick Links</h4>
                            <a href="{{ url('/') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">Home</a>
                            <a href="{{ url('/about-us') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">About Us</a>

                            {{-- Services with Click Dropdown --}}
                            <div class="flex flex-col">
                                <button type="button" id="contact-services-toggle" aria-expanded="false"
                                    class="flex items-center justify-between text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200 cursor-pointer text-left w-full group py-0.5 outline-none">
                                    <span>Services</span>
                                    <svg id="contact-services-arrow" class="w-3.5 h-3.5 text-white/80 transition-all duration-300 transform group-hover:text-[#DCC597]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                
                                {{-- Submenu links --}}
                                <div id="contact-services-menu" class="max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out flex flex-col gap-1.5 pl-2.5">
                                    <a href="{{ url('/services/property-management') }}" class="text-white/80 text-[12px] sm:text-[12.5px] hover:text-[#DCC597] transition-colors duration-200 pt-1.5">Property Management</a>
                                    <a href="{{ url('/services/property-sales') }}" class="text-white/80 text-[12px] sm:text-[12.5px] hover:text-[#DCC597] transition-colors duration-200">Property Sales</a>
                                    <a href="{{ url('/services/property-leasing') }}" class="text-white/80 text-[12px] sm:text-[12.5px] hover:text-[#DCC597] transition-colors duration-200">Property Leasing</a>
                                    <a href="{{ url('/services/hospitality-services') }}" class="text-white/80 text-[12px] sm:text-[12.5px] hover:text-[#DCC597] transition-colors duration-200 pb-0.5">Hospitality Services</a>
                                </div>
                            </div>

                            <a href="{{ url('/properties') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">Properties</a>
                            <a href="{{ url('/partners') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">Partners</a>
                            <a href="{{ url('/insights') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">Insights</a>
                            <a href="{{ url('/events') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">Events</a>
                            <a href="{{ url('/contact-us') }}" class="text-white/90 text-[13px] sm:text-[14px] hover:text-[#DCC597] transition-colors duration-200">Contact Us</a>
                        </div>

                        {{-- Right Column: Contact Info & Map --}}
                        <div class="flex flex-col gap-2 max-md:mt-6" data-scroll-reveal="right" data-scroll-delay="200">
                            <h4 class="text-[#DCC597] text-[15px] sm:text-[16px] font-bold mb-1">Contact Information</h4>
                            <p class="text-white/80 text-[12.5px] sm:text-[13px] leading-relaxed">
                                Wealth Mansion, 6F, Room Number 27, Tonle Sap Street, Village 3, Chroy Changva Commune, Chroy Changva District, Phnom Penh
                            </p>
                            <p class="text-white/80 text-[12.5px] sm:text-[13px]">(+855) 86 7777 05</p>
                            <a href="mailto:info@cwdrealty.com" class="text-white/80 hover:text-[#DCC597] transition-colors duration-200 text-[12.5px] sm:text-[13px]">info@cwdrealty.com</a>
                            <a href="https://www.cwdrealty.com" target="_blank" class="text-white/80 hover:text-[#DCC597] transition-colors duration-200 text-[12.5px] sm:text-[13px]">www.cwdrealty.com</a>

                            <div class="mt-0.5">
                                <p class="text-white text-[12.5px] sm:text-[13px] font-semibold">Operating Hours:</p>
                                <p class="text-white/80 text-[12px] sm:text-[12.5px]">Monday – Friday | 8:00 AM – 6:00 PM</p>
                            </div>

                            {{-- Embedded Map --}}
                            <div id="map" class="mt-2 w-full h-[120px] sm:h-[130px] rounded overflow-hidden border border-white/20">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.570228393522!2d104.93170727570776!3d11.58264774378822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095166292b95bf%3A0x6b4458f3353ee5c8!2sWealth%20Mansion!5e0!3m2!1sen!2skh!4v1700000000000!5m2!1sen!2skh"
                                    class="w-full h-full border-0"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <script>
        (function() {
            var toggle = document.getElementById('contact-services-toggle');
            var menu = document.getElementById('contact-services-menu');
            var arrow = document.getElementById('contact-services-arrow');
            if (toggle && menu) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    var isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                    if (isExpanded) {
                        toggle.setAttribute('aria-expanded', 'false');
                        menu.style.maxHeight = '0px';
                        menu.style.opacity = '0';
                        if (arrow) arrow.style.transform = 'rotate(0deg)';
                    } else {
                        toggle.setAttribute('aria-expanded', 'true');
                        menu.style.maxHeight = (menu.scrollHeight + 30) + 'px';
                        menu.style.opacity = '1';
                        if (arrow) arrow.style.transform = 'rotate(180deg)';
                    }
                });
            }
        })();
    </script>
@endsection
