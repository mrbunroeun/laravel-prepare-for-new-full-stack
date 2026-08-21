@extends('dashboard.layout')

@section('title', 'Daily & Weekly Rentals - Content Management')

@section('content')
<div class="space-y-6">
    {{-- Header Banner --}}
    <div class="border-b border-slate-200 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span>Rental Units</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">Daily & Weekly Rentals</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Daily &amp; Weekly Rentals Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage rental unit rooms (Studio, 1-Bed, 2-Bed Balcony, 3-Bed), photo galleries, pricing tiers, and page sections.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/services/property-leasing/daily-weekly-rentals') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation with Left/Right Arrow Scroll Buttons --}}
    <div class="relative flex items-center border-b border-slate-200 group py-1">
        <button type="button" onclick="scrollRentalTabsBar(-1)" id="tabs-scroll-prev" aria-label="Scroll tabs left" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all mr-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <div id="rental-tabs-nav-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            {{-- Tab 1: Hero & Banner Configuration --}}
            <button type="button" onclick="switchRentalTab('hero', event)" id="rental-tab-btn-hero" class="rental-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-bold border-b-2 border-[#2A5A8A] text-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero &amp; Header Banner</span>
            </button>

            {{-- Tab 2: Rooms / Available Rental Units (CRUD with Photo Uploads, Pricing, Suitability) --}}
            <button type="button" onclick="switchRentalTab('rooms', event)" id="rental-tab-btn-rooms" class="rental-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span class="whitespace-nowrap">Available Rental Units</span>
                <span id="tab-badge-rooms-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">4</span>
            </button>

            {{-- Tab 3: Room Gallery & Photos (Discover Carousel) --}}
            <button type="button" onclick="switchRentalTab('discover', event)" id="rental-tab-btn-discover" class="rental-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Room Gallery &amp; Photos</span>
                <span id="tab-badge-gallery-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">...</span>
            </button>

            {{-- Tab 4: Frequently Asked Questions --}}
            <button type="button" onclick="switchRentalTab('faqs', event)" id="rental-tab-btn-faqs" class="rental-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Frequently Asked Questions</span>
                <span id="tab-badge-faqs-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">...</span>
            </button>
        </div>

        <button type="button" onclick="scrollRentalTabsBar(1)" id="tabs-scroll-next" aria-label="Scroll tabs right" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all ml-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO & BANNER CONFIGURATION (MATCHING ABOUT US UX/UI)               --}}
    {{-- ========================================================================= --}}
    <div id="rental-tab-content-hero" class="rental-tab-content space-y-6">
        <form onsubmit="handleHeroSubmit(event)" class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Hero Section Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize tagline color schemes, headline text, bullet highlights, and action buttons.</p>
                </div>

                {{-- Tagline & Accent Line --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Tagline Text</label>
                        <div class="flex items-center gap-1.5">
                            <button type="button" onmousedown="event.preventDefault(); formatHeroTagline('bold');" class="px-3 py-1 bg-white border border-slate-300 hover:bg-[#2A5A8A] hover:text-white text-slate-800 rounded font-bold text-xs shadow-xs transition-colors flex items-center gap-1 cursor-pointer" title="Select text and click Bold">
                                <span class="font-black text-sm">B</span>
                                <span class="text-xs">Bold</span>
                            </button>
                            <button type="button" onmousedown="event.preventDefault(); formatHeroTagline('normal');" class="px-2.5 py-1 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded text-xs font-medium transition-colors cursor-pointer" title="Remove Bold formatting">
                                Normal
                            </button>
                        </div>
                    </div>

                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all !text-slate-900 [&&_*]:!text-slate-900" style="color: #0f172a !important;">Wealth <b>Mansion</b></div>
                </div>

                {{-- Main Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline (H1)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Headline Title</label>
                        <textarea id="hero-headline-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">Choose the Rental Option That Fits Your Stay</textarea>
                    </div>
                </div>

                {{-- Bullet Highlights List --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights List</h3>
                            <p class="text-xs text-slate-500">Add, edit, or remove highlights (e.g. • Flexible Daily Rates • Serviced Amenities)</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="addHeroBulletPoint()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Add Bullet Item</span>
                            </button>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="hero-bullets-toggle" onchange="updateHeroPreview()" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#2A5A8A]"></div>
                                <span class="ml-2 text-xs font-semibold text-slate-700">Show Bullets</span>
                            </label>
                        </div>
                    </div>

                    <div id="dynamic-bullets-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3"></div>
                </div>

                {{-- Action Buttons --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">4. Action Buttons (Maximum 3 Buttons)</h3>
                            <p class="text-xs text-slate-500">Pick destination routes directly from the route dropdown menu.</p>
                        </div>
                        <button type="button" onclick="addHeroButton()" id="add-btn-trigger" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Add Button</span>
                        </button>
                    </div>

                    <div id="hero-buttons-container" class="space-y-3"></div>
                </div>

                {{-- Single Save Button at Bottom --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" id="hero-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Hero Section
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Hero Section Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Hero Section Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview with your custom colors &amp; buttons</span>
            </div>

            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[360px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('{{ asset('hero_section/hero_section.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[650px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-bold text-[#F4DEAC]">
                                <span class="font-normal text-[#F4DEAC]">Wealth</span>
                                <span class="font-bold text-[#F4DEAC] ml-1">Mansion</span>
                            </span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-4">
                            Choose the Rental Option That Fits Your Stay
                        </h1>

                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] sm:text-[14px] mb-6 flex flex-wrap items-center gap-x-3 gap-y-1"></div>

                        <div id="preview-hero-buttons" class="flex flex-wrap items-center gap-3 pt-2">
                            <a href="/properties" class="border-[2px] border-[#F4DEAC] text-white text-[13px] font-medium px-4 py-2.5 hover:bg-white hover:text-black transition-colors">
                                Browse Properties
                            </a>
                            <a href="/contact-us" class="border-[2px] border-[#F4DEAC] text-white text-[13px] font-medium px-4 py-2.5 hover:bg-white hover:text-black transition-colors">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 2: RENTAL ROOMS (STUDIO, 1-BED, 2-BED BALCONY, 3-BED) CRUD             --}}
    {{-- ========================================================================= --}}
    <div id="rental-tab-content-rooms" class="rental-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Available Rental Rooms (Units)</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Live Database CRUD</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage Studio, 1-Bedroom, 2-Bedroom Balcony, and 3-Bedroom Suite cards, photos (up to 5 each), and pricing tiers.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateRoomModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add New Room</span>
                    </button>
                </div>
            </div>

            {{-- Grid of Room Cards --}}
            <div class="mt-6">
                <div id="rooms-cards-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5"></div>
                <div id="rooms-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm font-semibold text-slate-700">No rooms found in database.</p>
                    <button type="button" onclick="seedDefaultRooms()" class="mt-3 px-4 py-2 bg-[#2A5A8A] text-white text-xs font-semibold rounded-lg">Load Default 4 Rental Units</button>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Preview — Available Rental Units</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview with actual cards</span>
            </div>
            
            <div class="mt-6 bg-[#2A5A8A] rounded-xl p-6 sm:p-8 text-white">
                <div class="max-w-[1400px] mx-auto">
                    <div class="mb-6">
                        <h2 class="text-white text-2xl font-bold">Available Rental Units</h2>
                        <p class="text-white/80 text-xs sm:text-sm">Wealth Mansion units are available for different rental periods.</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="rooms-live-preview-grid"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 3: ROOM GALLERY & PHOTOS (DISCOVER WEALTH MANSION CAROUSEL)            --}}
    {{-- ========================================================================= --}}
    <div id="rental-tab-content-discover" class="rental-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Room Showcase Gallery Photos</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Carousel Photos</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Upload photos for the interactive full-width room discovery carousel on the room detail pages.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateGalleryModal('discover')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Upload Gallery Photo</span>
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <div id="gallery-cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5"></div>
                <div id="gallery-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm font-semibold text-slate-800">No gallery images uploaded</p>
                    <p class="text-xs text-slate-500 mt-1">Click "Upload Gallery Photo" to add images.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 4: FREQUENTLY ASKED QUESTIONS                                         --}}
    {{-- ========================================================================= --}}
    <div id="rental-tab-content-faqs" class="rental-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Database Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for Daily & Weekly Rentals.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateFaqModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add New FAQ</span>
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-[#2A5A8A] bg-slate-50">
                                <th class="py-3.5 px-4 w-12 text-center rounded-l-lg">#</th>
                                <th class="py-3.5 px-4">Question</th>
                                <th class="py-3.5 px-4 w-1/3">Answer</th>
                                <th class="py-3.5 px-4 w-28 text-center">Column</th>
                                <th class="py-3.5 px-4 w-24 text-center">Status</th>
                                <th class="py-3.5 px-4 w-36 text-right rounded-r-lg">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="faq-table-body" class="divide-y divide-slate-100 text-sm">
                            <tr>
                                <td colspan="6" class="py-8 text-center text-slate-400">Loading FAQs from database...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ========================================================================= --}}
{{-- MODAL: CREATE / EDIT RENTAL ROOM (UP TO 5 PHOTOS & PRICING)                --}}
{{-- ========================================================================= --}}
<div id="room-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="room-modal-card" class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-all duration-200 max-h-[90vh] flex flex-col">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50 shrink-0">
            <div>
                <h3 class="text-base font-bold text-[#163049]" id="room-modal-title">Edit Rental Room</h3>
                <p class="text-xs text-slate-500 mt-0.5">Manage room details, up to 5 photos, and pricing status.</p>
            </div>
            <button type="button" onclick="closeRoomModal()" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 flex items-center justify-center transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form onsubmit="handleRoomFormSubmit(event)" id="room-form" class="p-6 space-y-5 overflow-y-auto grow">
            <input type="hidden" id="room-edit-id" value="">

            {{-- Multi-Images Uploader (Up to 5) --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Room Photos (Max 5 Images for Gallery)</label>
                    <span id="room-img-count-badge" class="text-[11px] font-semibold text-slate-500">0 / 5</span>
                </div>

                <div id="room-images-preview-strip" class="grid grid-cols-5 gap-2.5"></div>

                <div>
                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Add Image File</label>
                    <input type="file" id="room-multi-file-input" accept="image/*" onchange="addRoomFileToQueue(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                    <p class="text-[10px] text-slate-400 mt-1">Upload up to 5 photos for this room type.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Room Title <span class="text-rose-500">*</span></label>
                    <input type="text" id="room-title-input" required placeholder="e.g. Studio Room" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Subtitle</label>
                    <input type="text" id="room-subtitle-input" placeholder="e.g. Compact & Practical Living" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Paragraph Description</label>
                <textarea id="room-desc-input" rows="3" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-xs text-slate-900 leading-relaxed focus:outline-none focus:border-[#2A5A8A]" placeholder="A practical choice for individuals and short-term stays."></textarea>
            </div>

            {{-- Suitable For List Editor --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">"Ideal / Suitable For:" Bullet List</label>
                    <button type="button" onclick="addRoomSuitableItem()" class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#2A5A8A] text-white text-[11px] font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                        + Add Item
                    </button>
                </div>
                <div id="room-suitable-container" class="space-y-2"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Pricing / Availability Tag</label>
                    <input type="text" id="room-status-input" value="From $35/day | $210/week | $650/month" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Link Destination</label>
                    <input type="text" id="room-link-input" value="services/property-leasing/daily-weekly-rentals/studio-room" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Sort Order</label>
                    <input type="number" id="room-sort-input" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
                <button type="button" onclick="closeRoomModal()" class="px-4 py-2 text-xs font-semibold text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="room-save-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save Room Type
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: GALLERY UPLOAD --}}
<div id="gallery-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="gallery-modal-card" class="bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-all duration-200">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div>
                <h3 class="text-base font-bold text-[#163049]" id="gallery-modal-title">Upload Gallery Photo</h3>
                <p class="text-xs text-slate-500 mt-0.5">Add photo to room showcase.</p>
            </div>
            <button type="button" onclick="closeGalleryModal()" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 flex items-center justify-center transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form onsubmit="handleGalleryFormSubmit(event)" id="gallery-form" class="p-6 space-y-4">
            <input type="hidden" id="gallery-edit-id" value="">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Image File</label>
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                        <img id="modal-img-preview" src="{{ asset('services/propertis_leasing/all part.png') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <input type="file" id="gallery-file-input" accept="image/*" onchange="previewGalleryModalFile(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Recommended: JPG, PNG, WebP up to 10MB.</p>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Title / Caption</label>
                <input type="text" id="gallery-title-input" required placeholder="e.g. Studio Room Interior" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <button type="button" onclick="closeGalleryModal()" class="px-4 py-2 text-xs font-semibold text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="gallery-save-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save Photo
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: CREATE / EDIT FAQ --}}
<div id="faq-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-lg rounded-xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="faq-modal-card">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
            <h3 class="text-base font-bold text-white flex items-center gap-2" id="faq-modal-title">
                <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                Add New FAQ
            </h3>
            <button onclick="closeFaqModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="faq-form" onsubmit="handleFaqSubmit(event)" class="p-6 space-y-4">
            <input type="hidden" id="faq-id" value="">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Question <span class="text-rose-500">*</span></label>
                <input type="text" id="faq-question" required placeholder="e.g. What is the minimum rental period?" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Answer <span class="text-rose-500">*</span></label>
                <textarea id="faq-answer" required rows="4" placeholder="Enter detailed answer..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Display Column</label>
                    <select id="faq-column" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="left">Left Column</option>
                        <option value="right">Right Column</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status</label>
                    <select id="faq-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closeFaqModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="faq-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save FAQ
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'daily-weekly-rentals';
    const roomsPageSlug = 'daily-weekly-rentals';
    const galleryPageSlug = 'daily-weekly-rentals-gallery';
    const faqPageSlug = 'daily-weekly-rentals';

    function scrollRentalTabsBar(direction) {
        const track = document.getElementById('rental-tabs-nav-track');
        if (track) {
            track.scrollBy({ left: direction * 250, behavior: 'smooth' });
        }
    }

    function switchRentalTab(tabName, evt) {
        if (evt) evt.preventDefault();
        document.querySelectorAll('.rental-tab-btn').forEach(btn => {
            btn.classList.remove('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
            btn.classList.add('text-slate-500', 'border-transparent', 'font-medium');
        });
        const activeBtn = document.getElementById(`rental-tab-btn-${tabName}`);
        if (activeBtn) {
            activeBtn.classList.remove('text-slate-500', 'border-transparent', 'font-medium');
            activeBtn.classList.add('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
        }

        document.querySelectorAll('.rental-tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        const targetContent = document.getElementById(`rental-tab-content-${tabName}`);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }
    }

    function formatImageUrl(path) {
        if (!path) return '{{ asset("services/propertis_leasing/all part.png") }}';
        if (path.startsWith('http://') || path.startsWith('https://')) return path;
        if (path.startsWith('storage/')) return '/' + path;
        return '{{ asset("") }}' + path.replace(/^\//, '');
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    // ==========================================
    // ROOMS CRUD (STUDIO, 1-BED, 2-BED, 3-BED)
    // ==========================================
    let roomsData = [];
    let roomModalImagesQueue = [];
    let roomSuitableItemsData = [];

    async function fetchRooms() {
        try {
            const res = await fetch(`/api/service-featured-properties/${roomsPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                roomsData = result.data;
                renderRoomCards();
                renderRoomsLivePreview();
            }
        } catch (err) {
            console.error('Error fetching rooms:', err);
        }
    }

    function renderRoomCards() {
        const grid = document.getElementById('rooms-cards-grid');
        const empty = document.getElementById('rooms-empty-state');
        const badge = document.getElementById('tab-badge-rooms-count');
        if (badge) badge.innerText = roomsData.length;

        if (!roomsData.length) {
            if (grid) grid.innerHTML = '';
            if (empty) empty.classList.remove('hidden');
            return;
        }

        if (empty) empty.classList.add('hidden');
        if (grid) {
            grid.innerHTML = roomsData.map((room) => {
                const images = (Array.isArray(room.detail_images) && room.detail_images.length) ? room.detail_images : [room.image || 'services/propertis_leasing/all part.png'];
                return `
                    <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden shadow-xs flex flex-col justify-between group hover:shadow-md transition-all">
                        <div class="relative w-full aspect-[16/10] bg-slate-900 overflow-hidden">
                            <img src="${formatImageUrl(images[0])}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute bottom-2 left-2 flex items-center gap-1.5 bg-black/70 px-2 py-1 rounded">
                                <span class="text-[10px] text-[#F4DEAC] font-bold">${images.length} Photos</span>
                            </div>
                        </div>

                        <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                            <div>
                                <h4 class="text-sm font-bold text-[#163049]">${escapeHtml(room.title)}</h4>
                                <p class="text-xs font-semibold text-slate-600 mt-0.5 line-clamp-1">${escapeHtml(room.subtitle || '')}</p>
                                <p class="text-xs text-[#2A5A8A] font-bold mt-2">${escapeHtml(room.status || '')}</p>
                            </div>

                            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                                <button type="button" onclick="openEditRoomModal(${room.id})" class="px-3 py-1.5 bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                                    Edit Details &amp; Photos
                                </button>
                                <button type="button" onclick="deleteRoomItem(${room.id})" class="text-xs text-rose-500 hover:text-rose-700 font-semibold cursor-pointer">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }
    }

    function renderRoomsLivePreview() {
        const previewGrid = document.getElementById('rooms-live-preview-grid');
        if (!previewGrid) return;
        previewGrid.innerHTML = roomsData.map((room) => {
            const images = (Array.isArray(room.detail_images) && room.detail_images.length) ? room.detail_images : [room.image || 'services/propertis_leasing/all part.png'];
            return `
                <div class="bg-white rounded-lg overflow-hidden text-slate-900 shadow-sm flex flex-col">
                    <div class="h-36 w-full bg-slate-100 overflow-hidden">
                        <img src="${formatImageUrl(images[0])}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col justify-between flex-1">
                        <div>
                            <h3 class="text-[#2A5A8A] font-bold text-sm">${escapeHtml(room.title)}</h3>
                            <p class="text-xs text-slate-600 mt-1 line-clamp-2">${escapeHtml(room.description || '')}</p>
                            <p class="text-xs text-[#2A5A8A] font-bold mt-2">${escapeHtml(room.status || '')}</p>
                        </div>
                        <a href="/${room.link ? room.link.replace(/^\//, '') : '#'}" target="_blank" class="text-xs font-bold text-[#2A5A8A] mt-3 inline-flex items-center gap-1 hover:underline">
                            <span>View Details</span> &rarr;
                        </a>
                    </div>
                </div>
            `;
        }).join('');
    }

    function renderRoomSuitableItems() {
        const container = document.getElementById('room-suitable-container');
        if (!container) return;
        if (!roomSuitableItemsData.length) {
            container.innerHTML = '<p class="text-[11px] text-slate-400 italic">No bullet items. Click "+ Add Item" above.</p>';
            return;
        }
        container.innerHTML = roomSuitableItemsData.map((item, idx) => `
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-[#2A5A8A]">•</span>
                <input type="text" value="${escapeHtml(item)}" oninput="updateRoomSuitableItem(${idx}, this.value)" placeholder="e.g. Business travelers" class="flex-1 px-3 py-1.5 bg-white border border-slate-300 rounded text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                <button type="button" onclick="removeRoomSuitableItem(${idx})" class="p-1 text-slate-400 hover:text-rose-600 rounded transition-colors" title="Remove bullet">✕</button>
            </div>
        `).join('');
    }

    function addRoomSuitableItem() {
        roomSuitableItemsData.push('New ideal tenant profile');
        renderRoomSuitableItems();
    }

    function removeRoomSuitableItem(idx) {
        roomSuitableItemsData.splice(idx, 1);
        renderRoomSuitableItems();
    }

    function updateRoomSuitableItem(idx, val) {
        roomSuitableItemsData[idx] = val;
    }

    function parseDescriptionAndSuitable(rawDesc) {
        if (!rawDesc) return { desc: '', suitable: ['Business travelers', 'Solo travelers', 'Couples', 'Short-term residents'] };
        const lines = rawDesc.split('\n');
        let suitableFound = false;
        const descArr = [];
        const suitableArr = [];
        for (const l of lines) {
            const trimmed = l.trim();
            if (trimmed.toLowerCase().includes('suitable for:') || trimmed.toLowerCase().includes('ideal for:')) {
                suitableFound = true;
                continue;
            }
            if (suitableFound && trimmed) {
                suitableArr.push(trimmed.replace(/^[-•*]\s*/, ''));
            } else if (!suitableFound && trimmed) {
                descArr.push(trimmed);
            }
        }
        return {
            desc: descArr.join('\n'),
            suitable: suitableArr.length ? suitableArr : ['Business travelers', 'Solo travelers', 'Couples', 'Short-term residents']
        };
    }

    function openCreateRoomModal() {
        document.getElementById('room-modal-title').innerText = 'Add Rental Room Type';
        document.getElementById('room-edit-id').value = '';
        document.getElementById('room-title-input').value = '';
        document.getElementById('room-subtitle-input').value = '';
        document.getElementById('room-desc-input').value = 'A practical choice for individuals and short-term stays.';
        document.getElementById('room-status-input').value = 'From $35/day | $210/week | $650/month';
        document.getElementById('room-link-input').value = 'services/property-leasing/daily-weekly-rentals/studio-room';
        document.getElementById('room-sort-input').value = (roomsData.length + 1);
        
        roomSuitableItemsData = ['Business travelers', 'Solo travelers', 'Couples', 'Short-term residents'];
        renderRoomSuitableItems();

        roomModalImagesQueue = [
            { type: 'url', src: 'services/propertis_leasing/all part.png' }
        ];
        renderRoomModalImages();

        const modal = document.getElementById('room-modal');
        const card = document.getElementById('room-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function openEditRoomModal(id) {
        const room = roomsData.find(r => r.id === id);
        if (!room) return;

        document.getElementById('room-modal-title').innerText = `Edit: ${room.title}`;
        document.getElementById('room-edit-id').value = room.id;
        document.getElementById('room-title-input').value = room.title || '';
        document.getElementById('room-subtitle-input').value = room.subtitle || '';
        
        const parsed = parseDescriptionAndSuitable(room.description);
        document.getElementById('room-desc-input').value = parsed.desc;
        roomSuitableItemsData = parsed.suitable;
        renderRoomSuitableItems();

        document.getElementById('room-status-input').value = room.status || 'From $35/day | $210/week | $650/month';
        document.getElementById('room-link-input').value = room.link || 'services/property-leasing/daily-weekly-rentals/studio-room';
        document.getElementById('room-sort-input').value = room.sort_order || 1;

        const imgs = (Array.isArray(room.detail_images) && room.detail_images.length) ? room.detail_images : [room.image || 'services/propertis_leasing/all part.png'];
        roomModalImagesQueue = imgs.slice(0, 5).map(src => ({ type: 'url', src: src }));
        renderRoomModalImages();

        const modal = document.getElementById('room-modal');
        const card = document.getElementById('room-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeRoomModal() {
        const modal = document.getElementById('room-modal');
        const card = document.getElementById('room-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }

    function renderRoomModalImages() {
        const container = document.getElementById('room-images-preview-strip');
        const badge = document.getElementById('room-img-count-badge');
        if (badge) badge.innerText = `${roomModalImagesQueue.length} / 5`;

        if (!container) return;
        container.innerHTML = roomModalImagesQueue.map((item, idx) => {
            const previewSrc = item.type === 'url' ? formatImageUrl(item.src) : item.preview;
            return `
                <div class="relative aspect-[4/3] bg-slate-900 rounded-lg overflow-hidden border border-slate-300 group shadow-xs">
                    <img src="${previewSrc}" class="w-full h-full object-cover">
                    <button type="button" onclick="removeRoomImageFromQueue(${idx})" class="absolute top-1 right-1 w-5 h-5 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center text-[10px] shadow cursor-pointer" title="Remove Photo">
                        ✕
                    </button>
                    <span class="absolute bottom-1 left-1 bg-black/70 text-white text-[9px] font-bold px-1 rounded">#${idx + 1}</span>
                </div>
            `;
        }).join('');
    }

    function addRoomFileToQueue(input) {
        if (input.files && input.files[0]) {
            if (roomModalImagesQueue.length >= 5) {
                if (typeof showToast === 'function') showToast('Maximum 5 images allowed per room', 'warning');
                input.value = '';
                return;
            }
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                roomModalImagesQueue.push({
                    type: 'file',
                    file: file,
                    preview: e.target.result
                });
                renderRoomModalImages();
                input.value = '';
            };
            reader.readAsDataURL(file);
        }
    }

    function removeRoomImageFromQueue(idx) {
        if (roomModalImagesQueue.length <= 1) {
            if (typeof showToast === 'function') showToast('Room must have at least 1 image', 'warning');
            return;
        }
        roomModalImagesQueue.splice(idx, 1);
        renderRoomModalImages();
    }

    async function handleRoomFormSubmit(e) {
        e.preventDefault();
        const editId = document.getElementById('room-edit-id').value;
        const saveBtn = document.getElementById('room-save-btn');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerText = 'Saving...';
        }

        try {
            const formData = new FormData();
            formData.append('page', roomsPageSlug);
            formData.append('grade', 'A');
            formData.append('title', document.getElementById('room-title-input').value);
            formData.append('subtitle', document.getElementById('room-subtitle-input').value);
            
            const desc = document.getElementById('room-desc-input').value.trim();
            const suitableList = roomSuitableItemsData.filter(s => s.trim().length > 0);
            let combinedDesc = desc;
            if (suitableList.length > 0) {
                combinedDesc += "\n\nSuitable for:\n" + suitableList.map(s => `• ${s}`).join("\n");
            }
            formData.append('description', combinedDesc);
            
            formData.append('status', document.getElementById('room-status-input').value);
            formData.append('link', document.getElementById('room-link-input').value);
            formData.append('sort_order', document.getElementById('room-sort-input').value);
            formData.append('publish_status', 'published');

            const existingUrls = roomModalImagesQueue.filter(i => i.type === 'url').map(i => i.src);
            formData.append('detail_images', JSON.stringify(existingUrls));

            const newFiles = roomModalImagesQueue.filter(i => i.type === 'file');
            newFiles.forEach((item) => {
                formData.append('detail_image_files[]', item.file);
            });

            let endpoint = `/api/service-featured-properties/${roomsPageSlug}`;
            if (editId) endpoint = `/api/service-featured-properties/update/${editId}`;

            const res = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Room details saved successfully!');
                closeRoomModal();
                fetchRooms();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving room', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save room to database', 'error');
        } finally {
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.innerText = 'Save Room Type';
            }
        }
    }

    async function deleteRoomItem(id) {
        if (!confirm('Are you sure you want to delete this room?')) return;
        try {
            const res = await fetch(`/api/service-featured-properties/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Room deleted successfully!');
                fetchRooms();
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to delete room', 'error');
        }
    }

    // ==========================================
    // GALLERY (DISCOVER ROOMS)
    // ==========================================
    let galleryItemsData = [];

    async function fetchGalleryItems() {
        try {
            const res = await fetch(`/api/project-galleries/${galleryPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                galleryItemsData = result.data;
                renderGalleryCards();
            }
        } catch (err) {
            console.error('Error fetching gallery:', err);
        }
    }

    function renderGalleryCards() {
        const grid = document.getElementById('gallery-cards-grid');
        const empty = document.getElementById('gallery-empty-state');
        const badge = document.getElementById('tab-badge-gallery-count');
        if (badge) badge.innerText = galleryItemsData.length;

        if (!galleryItemsData.length) {
            if (grid) grid.innerHTML = '';
            if (empty) empty.classList.remove('hidden');
            return;
        }

        if (empty) empty.classList.add('hidden');
        if (grid) {
            grid.innerHTML = galleryItemsData.map((item, idx) => `
                <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden shadow-xs flex flex-col justify-between group hover:shadow-md transition-all">
                    <div class="relative w-full aspect-[4/3] bg-slate-900 overflow-hidden">
                        <img src="${formatImageUrl(item.image)}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-black/70 text-white text-[10px] font-bold px-2 py-0.5 rounded">#${idx + 1}</span>
                    </div>
                    <div class="p-3.5 flex items-center justify-between">
                        <span class="text-xs font-semibold text-[#163049] truncate">${escapeHtml(item.title || 'Room Photo')}</span>
                        <button type="button" onclick="deleteGalleryItem(${item.id})" class="text-xs text-rose-500 hover:text-rose-700 font-semibold cursor-pointer">Delete</button>
                    </div>
                </div>
            `).join('');
        }
    }

    function openCreateGalleryModal() {
        document.getElementById('gallery-modal-title').innerText = 'Upload Room Gallery Photo';
        document.getElementById('gallery-edit-id').value = '';
        document.getElementById('gallery-title-input').value = '';
        const modal = document.getElementById('gallery-modal');
        const card = document.getElementById('gallery-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeGalleryModal() {
        const modal = document.getElementById('gallery-modal');
        const card = document.getElementById('gallery-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }

    function previewGalleryModalFile(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('modal-img-preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function handleGalleryFormSubmit(e) {
        e.preventDefault();
        const saveBtn = document.getElementById('gallery-save-btn');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerText = 'Saving...';
        }

        try {
            const formData = new FormData();
            formData.append('page', galleryPageSlug);
            formData.append('title', document.getElementById('gallery-title-input').value);
            formData.append('sort_order', (galleryItemsData.length + 1));
            formData.append('status', 'published');

            const fileInput = document.getElementById('gallery-file-input');
            if (fileInput && fileInput.files[0]) {
                formData.append('image_file', fileInput.files[0]);
            }

            const res = await fetch(`/api/project-galleries/${galleryPageSlug}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Photo uploaded successfully!');
                closeGalleryModal();
                fetchGalleryItems();
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to upload photo', 'error');
        } finally {
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.innerText = 'Save Photo';
            }
        }
    }

    async function deleteGalleryItem(id) {
        if (!confirm('Are you sure you want to delete this photo?')) return;
        try {
            const res = await fetch(`/api/project-galleries/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Photo deleted!');
                fetchGalleryItems();
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to delete', 'error');
        }
    }

    // ==========================================
    // FAQS MANAGEMENT
    // ==========================================
    let faqsData = [];

    async function fetchFaqs() {
        try {
            const res = await fetch(`/api/faqs?page=${faqPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                faqsData = result.data;
                renderFaqTable();
            }
        } catch (err) {
            console.error('Error fetching faqs:', err);
        }
    }

    function renderFaqTable() {
        const tbody = document.getElementById('faq-table-body');
        const badge = document.getElementById('tab-badge-faqs-count');
        if (badge) badge.innerText = faqsData.length;

        if (!faqsData.length) {
            tbody.innerHTML = '<tr><td colspan="6" class="py-8 text-center text-slate-400">No FAQs found. Click "Add New FAQ".</td></tr>';
            return;
        }

        tbody.innerHTML = faqsData.map((faq, idx) => `
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="py-3 px-4 text-center font-bold text-[#2A5A8A]">${idx + 1}</td>
                <td class="py-3 px-4 font-semibold text-[#163049]">${escapeHtml(faq.question)}</td>
                <td class="py-3 px-4 text-slate-600 text-xs">${escapeHtml(faq.answer)}</td>
                <td class="py-3 px-4 text-center text-xs uppercase">${faq.column || 'left'}</td>
                <td class="py-3 px-4 text-center"><span class="px-2 py-0.5 rounded text-[10px] font-bold ${faq.status === 'published' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}">${faq.status || 'published'}</span></td>
                <td class="py-3 px-4 text-right">
                    <button type="button" onclick="openEditFaqModal(${faq.id})" class="text-xs text-[#2A5A8A] font-bold mr-3">Edit</button>
                    <button type="button" onclick="deleteFaq(${faq.id})" class="text-xs text-rose-500 font-bold">Delete</button>
                </td>
            </tr>
        `).join('');
    }

    function openCreateFaqModal() {
        document.getElementById('faq-id').value = '';
        document.getElementById('faq-question').value = '';
        document.getElementById('faq-answer').value = '';
        const modal = document.getElementById('faq-modal');
        modal.classList.remove('hidden');
        setTimeout(() => modal.classList.remove('opacity-0'), 10);
    }

    function openEditFaqModal(id) {
        const faq = faqsData.find(f => f.id === id);
        if (!faq) return;
        document.getElementById('faq-id').value = faq.id;
        document.getElementById('faq-question').value = faq.question;
        document.getElementById('faq-answer').value = faq.answer;
        const modal = document.getElementById('faq-modal');
        modal.classList.remove('hidden');
        setTimeout(() => modal.classList.remove('opacity-0'), 10);
    }

    function closeFaqModal() {
        const modal = document.getElementById('faq-modal');
        modal.classList.add('opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function handleFaqSubmit(e) {
        e.preventDefault();
        const id = document.getElementById('faq-id').value;
        const payload = {
            page: faqPageSlug,
            question: document.getElementById('faq-question').value,
            answer: document.getElementById('faq-answer').value,
            column: document.getElementById('faq-column').value,
            status: document.getElementById('faq-status').value
        };

        const url = id ? `/api/faqs/${id}` : '/api/faqs';
        try {
            const res = await fetch(url, {
                method: id ? 'PUT' : 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('FAQ saved!');
                closeFaqModal();
                fetchFaqs();
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Error saving FAQ', 'error');
        }
    }

    async function deleteFaq(id) {
        if (!confirm('Are you sure you want to delete this FAQ?')) return;
        try {
            const res = await fetch(`/api/faqs/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('FAQ deleted!');
                fetchFaqs();
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Error deleting FAQ', 'error');
        }
    }

    // ==========================================
    // HERO & BANNER SCRIPTS (MATCHING ABOUT US)
    // ==========================================
    const availableRoutes = [
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Daily & Weekly Rentals (/services/property-leasing/daily-weekly-rentals)', url: '/services/property-leasing/daily-weekly-rentals' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Services Overview (/service)', url: '/service' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' },
        { label: 'Insights & News (/insights)', url: '/insights' }
    ];

    function formatHeroTagline(type) {
        const editor = document.getElementById('hero-tagline-editor');
        if (!editor) return;
        editor.focus();
        const sel = window.getSelection();
        if (sel && sel.rangeCount > 0 && !sel.isCollapsed) {
            if (type === 'bold') {
                document.execCommand('bold', false, null);
            } else if (type === 'normal') {
                document.execCommand('removeFormat', false, null);
                const range = sel.getRangeAt(0);
                const parent = range.commonAncestorContainer.parentElement;
                if (parent && (parent.tagName === 'B' || parent.tagName === 'STRONG')) {
                    parent.outerHTML = parent.innerHTML;
                }
            }
        } else {
            if (type === 'normal') {
                editor.innerHTML = editor.innerText;
            } else if (type === 'bold') {
                editor.innerHTML = '<b>' + editor.innerText + '</b>';
            }
        }
        updateHeroPreview();
    }

    let heroBulletsData = [
        'Flexible Daily & Weekly Rates',
        'Serviced Amenities',
        'Prime City Location',
        'VIP Hospitality Support'
    ];

    let heroButtonsData = [
        { text: 'Browse Properties', url: '/properties' },
        { text: 'Contact Us', url: '/contact-us' }
    ];

    function renderHeroBulletsInputs() {
        const container = document.getElementById('dynamic-bullets-container');
        if (!container) return;
        container.innerHTML = '';
        heroBulletsData.forEach((bullet, index) => {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2 p-2.5 bg-white border border-slate-200 rounded-lg shadow-2xs';
            div.innerHTML = `
                <span class="text-xs font-bold text-[#2A5A8A] shrink-0">•</span>
                <input type="text" value="${escapeHtml(bullet)}" oninput="updateHeroBulletText(${index}, this.value)" class="flex-1 text-xs font-medium text-slate-800 bg-transparent border-0 focus:outline-none focus:ring-0 p-0">
                <button type="button" onclick="removeHeroBulletPoint(${index})" class="text-slate-400 hover:text-red-500 p-1 rounded transition-colors cursor-pointer" title="Remove bullet">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            container.appendChild(div);
        });
        updateHeroPreview();
    }

    function addHeroBulletPoint() {
        heroBulletsData.push('New highlight feature');
        renderHeroBulletsInputs();
    }

    function removeHeroBulletPoint(index) {
        heroBulletsData.splice(index, 1);
        renderHeroBulletsInputs();
    }

    function updateHeroBulletText(index, val) {
        heroBulletsData[index] = val;
        updateHeroPreview();
    }

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        if (!container) return;

        container.innerHTML = heroButtonsData.map((btn, index) => `
            <div class="p-3.5 bg-white border border-slate-200 rounded-lg shadow-xs flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">
                    ${index + 1}
                </span>

                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Button Label</label>
                    <input type="text" value="${escapeHtml(btn.text || btn.label || '')}" oninput="updateHeroButtonText(${index}, this.value)" placeholder="e.g. Browse Properties" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Target Route Page</label>
                    <select onchange="updateHeroButtonUrl(${index}, this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        ${availableRoutes.map(route => `
                            <option value="${route.url}" ${(btn.url === route.url || btn.link === route.url) ? 'selected' : ''}>
                                ${route.label}
                            </option>
                        `).join('')}
                    </select>
                </div>

                <div class="sm:pt-4 flex items-center justify-end">
                    <button type="button" onclick="removeHeroButton(${index})" class="p-2 rounded-md hover:bg-rose-50 text-slate-400 hover:text-rose-600 transition-colors cursor-pointer" title="Remove Button">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `).join('');

        updateHeroPreview();
    }

    function addHeroButton() {
        if (heroButtonsData.length >= 3) {
            if (typeof showToast === 'function') showToast('Maximum 3 buttons allowed', 'warning');
            return;
        }
        heroButtonsData.push({ text: 'Learn More', url: '/services/property-leasing/daily-weekly-rentals' });
        renderHeroButtonsInputs();
    }

    function removeHeroButton(index) {
        if (heroButtonsData.length <= 1) {
            if (typeof showToast === 'function') showToast('Hero section should have at least 1 button', 'warning');
            return;
        }
        heroButtonsData.splice(index, 1);
        renderHeroButtonsInputs();
    }

    function updateHeroButtonText(index, val) {
        heroButtonsData[index].text = val;
        updateHeroPreview();
    }

    function updateHeroButtonUrl(index, val) {
        heroButtonsData[index].url = val;
        updateHeroPreview();
    }

    function updateHeroPreview() {
        const editor = document.getElementById('hero-tagline-editor');
        const rawHtml = editor ? editor.innerHTML.trim() : '';
        const previewTagline = document.getElementById('preview-hero-tagline');

        if (previewTagline) {
            previewTagline.innerHTML = `<span class="font-normal text-[#F4DEAC]">${rawHtml}</span>`;
        }

        const headline = document.getElementById('hero-headline-input')?.value || '';
        const previewHeadline = document.getElementById('preview-hero-headline');
        if (previewHeadline) previewHeadline.innerText = headline;

        const showBullets = document.getElementById('hero-bullets-toggle')?.checked ?? false;
        const previewBullets = document.getElementById('preview-hero-bullets');
        if (previewBullets) {
            previewBullets.style.display = (showBullets && heroBulletsData.length > 0) ? 'flex' : 'none';
            previewBullets.innerHTML = heroBulletsData.map(b => `<span>• ${escapeHtml(b)}</span>`).join('');
        }

        const previewButtons = document.getElementById('preview-hero-buttons');
        if (previewButtons) {
            previewButtons.innerHTML = heroButtonsData.map(btn => `
                <a href="${escapeHtml(btn.url || '#')}" class="border-[2px] border-[#F4DEAC] text-white text-[13px] font-medium px-4 py-2.5 hover:bg-white hover:text-black transition-colors">
                    ${escapeHtml(btn.text || btn.label || 'Button')}
                </a>
            `).join('');
        }
    }

    async function fetchHeroSection() {
        try {
            const res = await fetch('/api/hero-section/daily-weekly-rentals');
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                const editor = document.getElementById('hero-tagline-editor');
                if (editor && data.tagline_html) {
                    let cleanText = data.tagline_html.replace(/text-\[#F4DEAC\]/g, "").replace(/style="[^"]*"/g, "");
                    editor.innerHTML = cleanText;
                }
                if (data.headline) document.getElementById('hero-headline-input').value = data.headline;
                if (typeof data.show_bullets !== 'undefined') document.getElementById('hero-bullets-toggle').checked = !!data.show_bullets;
                if (Array.isArray(data.bullets) && data.bullets.length > 0) heroBulletsData = data.bullets;
                if (Array.isArray(data.buttons) && data.buttons.length > 0) heroButtonsData = data.buttons;
                renderHeroBulletsInputs();
                renderHeroButtonsInputs();
                updateHeroPreview();
            }
        } catch (err) {
            console.error('Error fetching hero section:', err);
        }
    }

    async function handleHeroSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('hero-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        try {
            const editor = document.getElementById('hero-tagline-editor');
            const rawTagline = editor ? editor.innerHTML.trim() : '';

            const payload = {
                page: 'daily-weekly-rentals',
                tagline_html: rawTagline,
                show_tagline: true,
                headline: document.getElementById('hero-headline-input').value,
                show_bullets: document.getElementById('hero-bullets-toggle').checked,
                bullets: heroBulletsData,
                buttons: heroButtonsData
            };

            const res = await fetch('/api/hero-section/daily-weekly-rentals', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Daily & Weekly Rentals Hero Section saved live!');
                updateHeroPreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving hero section', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save hero section to database', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    // Auto-open room modal if url params specified (e.g. ?tab=rooms&room=studio)
    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchRooms();
        fetchGalleryItems();
        fetchFaqs();

        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');
        if (tabParam) {
            switchRentalTab(tabParam);
        }

        const roomParam = urlParams.get('room');
        if (roomParam) {
            setTimeout(() => {
                const matched = roomsData.find(r => r.title.toLowerCase().includes(roomParam.toLowerCase()));
                if (matched) openEditRoomModal(matched.id);
            }, 600);
        }
    });
</script>
@endpush
