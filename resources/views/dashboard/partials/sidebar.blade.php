<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 md:w-72 bg-[#163049] border-r border-[#2A5A8A]/40 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-xl">
    {{-- Brand Header --}}
    <div class="h-20 px-6 flex items-center justify-between border-b border-[#2A5A8A]/40 bg-[#12273c]">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">
            <div class="p-2 rounded-lg bg-white shadow-sm flex items-center justify-center">
                <img src="{{ asset('logo_nav_foot/cwd.svg') }}" alt="CWD Realty logo" class="h-6 w-auto object-contain">
            </div>
            <div>
                <span class="text-base font-bold tracking-tight text-white block">CWD Realty</span>
                <span class="text-[10px] tracking-wider uppercase font-semibold text-[#F4DEAC] block -mt-0.5">Admin Dashboard</span>
            </div>
        </a>
        <button onclick="toggleSidebar()" class="lg:hidden text-white/70 hover:text-white p-1 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    {{-- Gold accent line below header --}}
    <div class="h-[3px] w-full bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>

    {{-- Navigation Links --}}
    <div id="sidebar-nav-container" class="flex-1 overflow-y-auto px-4 py-6 space-y-6">
        <div>
            <div class="px-3 mb-2 text-[11px] font-bold uppercase tracking-wider text-[#F4DEAC]/70">Pages Content</div>
            <nav class="space-y-1">
                {{-- Home Page --}}
                <a href="{{ url('/dashboard/pages/home') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard/pages/home*') ? 'bg-[#1479B9] text-white shadow-md' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="font-semibold">Home Page</span>
                    </div>
                    <span class="text-[10px] uppercase font-bold bg-[#F4DEAC] text-[#163049] px-2 py-0.5 rounded">Active</span>
                </a>

                {{-- About Us Page --}}
                <a href="{{ url('/dashboard/pages/about-us') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard/pages/about-us*') ? 'bg-[#1479B9] text-white shadow-md' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">About Us</span>
                    </div>
                    <span class="text-[10px] uppercase font-bold bg-[#F4DEAC] text-[#163049] px-2 py-0.5 rounded">Active</span>
                </a>

                {{-- Services & Properties Dropdown --}}
                @php
                    $isServicesActive = request()->is('dashboard/pages/services/property-management*') 
                        || request()->is('dashboard/pages/services/property-sales*') 
                        || request()->is('dashboard/pages/services/property-leasing') 
                        || request()->is('dashboard/pages/services/hospitality-services*');
                @endphp
                <div class="space-y-1">
                    <button type="button" onclick="toggleSidebarServicesDropdown()" 
                        class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ $isServicesActive ? 'bg-[#2A5A8A] text-white shadow-sm' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }} cursor-pointer">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="font-semibold">Services & Properties</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-[10px] font-bold bg-[#F4DEAC]/20 text-[#F4DEAC] px-1.5 py-0.5 rounded">4</span>
                            <svg id="services-dropdown-chevron" class="w-3.5 h-3.5 text-slate-300 transition-transform duration-200 {{ $isServicesActive ? 'rotate-180 text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>

                    {{-- Dropdown Sub-Items --}}
                    <div id="services-dropdown-menu" class="pl-4 space-y-1 transition-all duration-200 {{ $isServicesActive ? '' : 'hidden' }}">
                        {{-- 1. Property Management --}}
                        <a href="{{ url('/dashboard/pages/services/property-management') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/services/property-management*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/services/property-management*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>Property Management</span>
                        </a>

                        {{-- 2. Property Sales --}}
                        <a href="{{ url('/dashboard/pages/services/property-sales') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/services/property-sales*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/services/property-sales*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>Property Sales</span>
                        </a>

                        {{-- 3. Property Leasing --}}
                        <a href="{{ url('/dashboard/pages/services/property-leasing') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/services/property-leasing*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/services/property-leasing*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>Property Leasing</span>
                        </a>

                        {{-- 4. Hospitality Services --}}
                        <a href="{{ url('/dashboard/pages/services/hospitality-services') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/services/hospitality-services*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/services/hospitality-services*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>Hospitality Services</span>
                        </a>
                    </div>
                </div>

                {{-- Properties Page --}}
                <a href="{{ url('/dashboard/pages/properties') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard/pages/properties') ? 'bg-[#1479B9] text-white shadow-md' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                        </svg>
                        <span class="font-semibold">Properties</span>
                    </div>
                    <span class="text-[10px] uppercase font-bold bg-[#F4DEAC] text-[#163049] px-2 py-0.5 rounded">Active</span>
                </a>

                {{-- Other Pages List (Matching Navbar Order: Partners, Insights & News, Events, Contact Inquiries) --}}
                @php
                    $navPages = [
                        ['title' => 'Partners', 'slug' => 'partners', 'active' => true, 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['title' => 'Insights & News', 'slug' => 'insights', 'active' => true, 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
                        ['title' => 'Events', 'slug' => 'events', 'active' => false, 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                        ['title' => 'Contact Inquiries', 'slug' => 'contact', 'active' => false, 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ];
                @endphp

                @foreach($navPages as $page)
                    <a href="{{ url('/dashboard/pages/' . $page['slug']) }}" 
                       class="flex items-center justify-between px-3.5 py-2 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard/pages/' . $page['slug']) ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->is('dashboard/pages/' . $page['slug']) ? 'text-[#F4DEAC]' : 'text-slate-400 group-hover:text-[#F4DEAC]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $page['icon'] }}"></path>
                            </svg>
                            <span>{{ $page['title'] }}</span>
                        </div>
                        @if(!empty($page['active']))
                            <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-[#F4DEAC] text-[#163049]">ACTIVE</span>
                        @else
                            <span class="text-[10px] text-slate-400 group-hover:text-white">UI</span>
                        @endif
                    </a>
                @endforeach

                {{-- Latest Activities / Events (Moved outside Home Page, below all nav items with extra top spacing) --}}
                <div class="pt-3 mt-3 border-t border-[#2A5A8A]/30">
                    <a href="{{ url('/dashboard/pages/latest-activities') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard/pages/latest-activities*') ? 'bg-[#1479B9] text-white shadow-md' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                            </svg>
                            <span class="font-semibold">Latest Activities</span>
                        </div>
                        <span class="text-[10px] uppercase font-bold bg-[#F4DEAC] text-[#163049] px-2 py-0.5 rounded">Active</span>
                    </a>
                </div>

                {{-- Featured Properties Dropdown (Positioned at bottom with mt & divider) --}}
                @php
                    $isFeaturedPropsActive = request()->is('dashboard/pages/properties/*') || request()->is('dashboard/pages/properties-wealth-mansion*') || request()->is('dashboard/pages/properties-private-residential*') || request()->is('dashboard/pages/properties-uc88*');
                @endphp
                <div class="mt-4 pt-3 border-t border-[#2A5A8A]/40 space-y-1">
                    <div class="px-3 mb-1 text-[10px] font-bold uppercase tracking-wider text-[#F4DEAC]/60">Projects Content</div>
                    <button type="button" onclick="toggleSidebarFeaturedPropsDropdown()" 
                        class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ $isFeaturedPropsActive ? 'bg-[#2A5A8A] text-white shadow-sm' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }} cursor-pointer">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="font-semibold">Featured Properties</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-[10px] font-bold bg-[#F4DEAC]/20 text-[#F4DEAC] px-1.5 py-0.5 rounded">3</span>
                            <svg id="featured-props-dropdown-chevron" class="w-3.5 h-3.5 text-slate-300 transition-transform duration-200 {{ $isFeaturedPropsActive ? 'rotate-180 text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>

                    {{-- Dropdown Sub-Items --}}
                    <div id="featured-props-dropdown-menu" class="pl-4 space-y-1 transition-all duration-200 {{ $isFeaturedPropsActive ? '' : 'hidden' }}">
                        {{-- 1. Wealth Mansion --}}
                        <a href="{{ url('/dashboard/pages/properties/wealth-mansion') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/properties/wealth-mansion*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/properties/wealth-mansion*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>Wealth Mansion</span>
                        </a>

                        {{-- 2. Private Residential --}}
                        <a href="{{ url('/dashboard/pages/properties/private-residential') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/properties/private-residential*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/properties/private-residential*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>Private Residential</span>
                        </a>

                        {{-- 3. UC88 --}}
                        <a href="{{ url('/dashboard/pages/properties/uc88') }}" 
                            class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/properties/uc88*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/properties/uc88*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                            <span>UC88</span>
                        </a>
                    </div>
                </div>

                {{-- Daily & Weekly Rentals Dropdown (Positioned cleanly BELOW Featured Properties) --}}
                @php
                    $isDailyWeeklyActive = request()->is('dashboard/pages/properties/daily-weekly-rentals*') || request()->is('dashboard/pages/services/properties-leasing-list*');
                @endphp
                <div class="mt-3 pt-3 border-t border-[#2A5A8A]/40 space-y-1">
                    <div class="px-3 mb-1 text-[10px] font-bold uppercase tracking-wider text-[#F4DEAC]/60">Rental Units</div>
                    <button type="button" onclick="toggleSidebarDailyWeeklyDropdown()" 
                        class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ $isDailyWeeklyActive ? 'bg-[#2A5A8A] text-white shadow-sm' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }} cursor-pointer">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                            </svg>
                            <span class="font-semibold text-xs sm:text-sm">Daily &amp; Weekly Rentals</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-[10px] font-bold bg-[#F4DEAC]/20 text-[#F4DEAC] px-1.5 py-0.5 rounded">4</span>
                            <svg id="daily-weekly-dropdown-chevron" class="w-3.5 h-3.5 text-slate-300 transition-transform duration-200 {{ $isDailyWeeklyActive ? 'rotate-180 text-white' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>

                    {{-- Dropdown Sub-Items (Choose Building/Room) --}}
                    <div id="daily-weekly-dropdown-menu" class="pl-4 space-y-1 transition-all duration-200 {{ $isDailyWeeklyActive ? '' : 'hidden' }}">
                        {{-- 1. Wealth Mansion Units --}}
                        <a href="{{ url('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals') }}" 
                            class="flex items-center justify-between px-3 py-2 rounded-lg text-xs font-medium transition-all group {{ request()->is('dashboard/pages/services/properties-leasing-list/daily-weekly-rentals*') && !request()->has('room') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white' }}">
                            <div class="flex items-center gap-2.5">
                                <span class="w-1.5 h-1.5 rounded-full {{ request()->is('dashboard/pages/services/properties-leasing-list/daily-weekly-rentals*') && !request()->has('room') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                                <span>Wealth Mansion Units</span>
                            </div>
                            <span class="text-[10px] text-slate-400 group-hover:text-[#F4DEAC]">Manage &rarr;</span>
                        </a>

                        {{-- 2. Rooms Dropdown (Below Wealth Mansion Units) --}}
                        @php
                            $isRoomsActive = request()->has('room') || request()->is('dashboard/pages/services/properties-leasing-list/daily-weekly-rentals*');
                        @endphp
                        <div class="space-y-1 pt-1">
                            <button type="button" onclick="toggleSidebarRoomsSubDropdown(event)" 
                                class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs font-medium transition-all group text-slate-300 hover:bg-[#2A5A8A]/30 hover:text-white cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-3.5 h-3.5 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="font-semibold">Rooms</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[9px] font-bold bg-[#F4DEAC]/20 text-[#F4DEAC] px-1 py-0.2 rounded">4</span>
                                    <svg id="rooms-subdropdown-chevron" class="w-3 h-3 text-slate-300 transition-transform duration-200 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>

                            {{-- Sub-menu for the 4 Rooms --}}
                            <div id="rooms-subdropdown-menu" class="pl-3.5 space-y-1 border-l-2 border-[#1479B9]/50 ml-3 transition-all duration-200">
                                {{-- Studio Room --}}
                                <a href="{{ url('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals/rooms/studio') }}" 
                                    class="flex items-center justify-between px-2.5 py-1.5 rounded-md text-xs font-medium transition-all group {{ request()->is('*rooms/studio*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1 h-1 rounded-full {{ request()->is('*rooms/studio*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                                        <span>Studio Room</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 group-hover:text-[#F4DEAC]">Edit &rarr;</span>
                                </a>

                                {{-- 1-Bedroom --}}
                                <a href="{{ url('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals/rooms/1bed') }}" 
                                    class="flex items-center justify-between px-2.5 py-1.5 rounded-md text-xs font-medium transition-all group {{ request()->is('*rooms/1bed*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1 h-1 rounded-full {{ request()->is('*rooms/1bed*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                                        <span>1-Bedroom</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 group-hover:text-[#F4DEAC]">Edit &rarr;</span>
                                </a>

                                {{-- 2-Bedroom Balcony --}}
                                <a href="{{ url('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals/rooms/2bed') }}" 
                                    class="flex items-center justify-between px-2.5 py-1.5 rounded-md text-xs font-medium transition-all group {{ request()->is('*rooms/2bed*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1 h-1 rounded-full {{ request()->is('*rooms/2bed*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                                        <span>2-Bedroom Balcony</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 group-hover:text-[#F4DEAC]">Edit &rarr;</span>
                                </a>

                                {{-- 3-Bedroom Suite --}}
                                <a href="{{ url('/dashboard/pages/services/properties-leasing-list/daily-weekly-rentals/rooms/3bed') }}" 
                                    class="flex items-center justify-between px-2.5 py-1.5 rounded-md text-xs font-medium transition-all group {{ request()->is('*rooms/3bed*') ? 'bg-[#1479B9] text-white font-bold' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1 h-1 rounded-full {{ request()->is('*rooms/3bed*') ? 'bg-[#F4DEAC]' : 'bg-slate-400' }}"></span>
                                        <span>3-Bedroom Suite</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 group-hover:text-[#F4DEAC]">Edit &rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    {{-- Bottom User Card --}}
    <div class="p-4 border-t border-[#2A5A8A]/40 bg-[#12273c]">
        <div class="flex items-center gap-3 p-2 rounded-lg bg-[#163049] border border-[#2A5A8A]/50">
            <div class="w-8 h-8 rounded bg-[#2A5A8A] flex items-center justify-center text-xs font-bold text-[#F4DEAC]">
                CW
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-xs font-semibold text-white truncate">CWD Backend v1.0</div>
                <div class="text-[10px] text-slate-300">Frontend UI Preview</div>
            </div>
        </div>
    </div>
</aside>

<script>
    function toggleSidebarServicesDropdown() {
        const menu = document.getElementById('services-dropdown-menu');
        const chevron = document.getElementById('services-dropdown-chevron');
        if (menu) {
            menu.classList.toggle('hidden');
        }
        if (chevron) {
            chevron.classList.toggle('rotate-180');
        }
    }

    function toggleSidebarFeaturedPropsDropdown() {
        const menu = document.getElementById('featured-props-dropdown-menu');
        const chevron = document.getElementById('featured-props-dropdown-chevron');
        if (menu) {
            menu.classList.toggle('hidden');
        }
        if (chevron) {
            chevron.classList.toggle('rotate-180');
        }
    }

    function toggleSidebarDailyWeeklyDropdown() {
        const menu = document.getElementById('daily-weekly-dropdown-menu');
        const chevron = document.getElementById('daily-weekly-dropdown-chevron');
        if (menu) {
            menu.classList.toggle('hidden');
        }
        if (chevron) {
            chevron.classList.toggle('rotate-180');
        }
    }

    function toggleSidebarRoomsSubDropdown(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        const menu = document.getElementById('rooms-subdropdown-menu');
        const chevron = document.getElementById('rooms-subdropdown-chevron');
        if (menu) {
            menu.classList.toggle('hidden');
        }
        if (chevron) {
            chevron.classList.toggle('rotate-180');
        }
    }

    // Preserve Sidebar Scroll Position on Page Navigation
    document.addEventListener('DOMContentLoaded', () => {
        const sidebarNav = document.getElementById('sidebar-nav-container');
        if (!sidebarNav) return;

        // Restore saved scroll position if available
        const savedScroll = sessionStorage.getItem('sidebar_scroll_pos');
        if (savedScroll !== null) {
            sidebarNav.scrollTop = parseInt(savedScroll, 10);
        }

        // Save scroll position when user scrolls
        sidebarNav.addEventListener('scroll', () => {
            sessionStorage.setItem('sidebar_scroll_pos', sidebarNav.scrollTop);
        }, { passive: true });

        // Ensure active item is always smoothly visible if not in view
        const activeLink = sidebarNav.querySelector('.bg-\\[\\#1479B9\\]');
        if (activeLink && savedScroll === null) {
            activeLink.scrollIntoView({ block: 'center', behavior: 'instant' });
        }
    });
</script>
