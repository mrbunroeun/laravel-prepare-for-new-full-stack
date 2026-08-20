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
    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-6">
        <div>
            <div class="px-3 mb-2 text-[11px] font-bold uppercase tracking-wider text-[#F4DEAC]/70">Core Management</div>
            <nav class="space-y-1">
                <a href="{{ url('/dashboard') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard') ? 'bg-[#2A5A8A] text-white shadow-sm' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                    <svg class="w-5 h-5 {{ request()->is('dashboard') ? 'text-[#F4DEAC]' : 'text-slate-400 group-hover:text-[#F4DEAC]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>Overview</span>
                </a>
            </nav>
        </div>

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
                    $isServicesActive = request()->is('dashboard/pages/services*') || request()->is('dashboard/pages/property-*') || request()->is('dashboard/pages/hospitality-*');
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

                {{-- Other Pages List --}}
                @php
                    $navPages = [
                        ['title' => 'Properties', 'slug' => 'properties', 'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z'],
                        ['title' => 'Insights & News', 'slug' => 'insights', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
                        ['title' => 'Events', 'slug' => 'events', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                        ['title' => 'Partners', 'slug' => 'partners', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['title' => 'Contact Inquiries', 'slug' => 'contact', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ];
                @endphp

                @foreach($navPages as $page)
                    <a href="{{ url('/dashboard/pages/' . $page['slug']) }}" 
                       class="flex items-center justify-between px-3.5 py-2 rounded-lg text-sm font-medium transition-all group {{ request()->is('dashboard/pages/' . $page['slug']) ? 'bg-[#2A5A8A] text-white' : 'text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $page['icon'] }}"></path>
                            </svg>
                            <span>{{ $page['title'] }}</span>
                        </div>
                        <span class="text-[10px] text-slate-400 group-hover:text-white">UI</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <div>
            <div class="px-3 mb-2 text-[11px] font-bold uppercase tracking-wider text-[#F4DEAC]/70">System & Tools</div>
            <nav class="space-y-1">
                <a href="{{ url('/dashboard/settings') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-lg text-sm font-medium text-slate-300 hover:bg-[#2A5A8A]/40 hover:text-white transition-all">
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>General Settings</span>
                </a>
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
</script>
