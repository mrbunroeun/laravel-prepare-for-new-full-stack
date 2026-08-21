@extends('dashboard.layout')

@section('title', 'Wealth Mansion - Content Management')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="border-b border-slate-200 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span>Featured Projects</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">Wealth Mansion</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Wealth Mansion Content Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage hero banner, discover carousel gallery, unit types with multi-image scrolling, and facilities & lifestyle photos.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/properties/wealth-mansion') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation with Left/Right Arrow Scroll Buttons --}}
    <div class="relative flex items-center border-b border-slate-200 group py-1">
        {{-- Left Scroll Button --}}
        <button type="button" onclick="scrollTabsBar(-1)" id="tabs-scroll-prev" aria-label="Scroll tabs left" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all mr-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <div id="tabs-nav-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            {{-- Tab 1: Hero & Banner --}}
            <button type="button" onclick="switchWealthTab('hero', event)" id="wealth-tab-btn-hero" class="wealth-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-bold border-b-2 border-[#2A5A8A] text-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            {{-- Tab 2: Discover Wealth Mansion (Image Gallery Uploads) --}}
            <button type="button" onclick="switchWealthTab('discover', event)" id="wealth-tab-btn-discover" class="wealth-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Discover Wealth Mansion</span>
                <span id="tab-badge-gallery-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">...</span>
            </button>

            {{-- Tab 3: Unit Types (Multi-Image Click & Scroll) --}}
            <button type="button" onclick="switchWealthTab('units', event)" id="wealth-tab-btn-units" class="wealth-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span class="whitespace-nowrap">Unit Types (Multi-Images)</span>
                <span id="tab-badge-units-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">...</span>
            </button>

            {{-- Tab 4: Facilities & Lifestyle (3x2 Photo Grid) --}}
            <button type="button" onclick="switchWealthTab('facilities', event)" id="wealth-tab-btn-facilities" class="wealth-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span class="whitespace-nowrap">Facilities & Lifestyle (3x2 Photos)</span>
                <span id="tab-badge-facilities-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">...</span>
            </button>

            {{-- Tab 5: Property Availability Image --}}
            <button type="button" onclick="switchWealthTab('availability', event)" id="wealth-tab-btn-availability" class="wealth-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Property Availability Image</span>
            </button>

            {{-- Tab 6: FAQs Management --}}
            <button type="button" onclick="switchWealthTab('faqs', event)" id="wealth-tab-btn-faqs" class="wealth-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Frequently Asked Questions</span>
                <span id="tab-badge-faqs-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">...</span>
            </button>
        </div>

        {{-- Right Scroll Button --}}
        <button type="button" onclick="scrollTabsBar(1)" id="tabs-scroll-next" aria-label="Scroll tabs right" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all ml-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO & BANNER (100% SAME AS ABOUT US STRUCTURE)                    --}}
    {{-- ========================================================================= --}}
    <div id="wealth-tab-content-hero" class="wealth-tab-content space-y-6">
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

                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all !text-slate-900 [&&_*]:!text-slate-900" style="color: #0f172a !important;"><b>Wealth Mansion</b></div>
                </div>

                {{-- Main Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline (H1)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Headline Title</label>
                        <textarea id="hero-headline-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">Premium Condominiums for Sale in Phnom Penh</textarea>
                    </div>
                </div>

                {{-- Bullet Highlights List --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights / Availability Tag</h3>
                            <p class="text-xs text-slate-500">Add, edit, or remove highlights (e.g. • 30% available • Prime Riverfront • Freehold Title)</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="addHeroBulletPoint()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Add Bullet Item</span>
                            </button>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="hero-bullets-toggle" checked onchange="updateHeroPreview()" class="sr-only peer">
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
                <span class="text-xs text-slate-500">Live preview with your custom colors & buttons</span>
            </div>

            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[360px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-center opacity-50 mix-blend-luminosity" style="background-image: url('{{ asset('services/wealth_mansion/hero_img/wealth-mainson-recovered.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[650px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-bold text-[#F4DEAC]">
                                <span class="font-bold text-[#F4DEAC]">Wealth Mansion</span>
                            </span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-4">
                            Premium Condominiums for Sale in Phnom Penh
                        </h1>

                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] sm:text-[14px] mb-6 flex flex-wrap items-center gap-x-3 gap-y-1">
                            <span>• 30% available</span>
                        </div>

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
    {{-- TAB 2: DISCOVER WEALTH MANSION (GALLERY CAROUSEL UPLOADER)                --}}
    {{-- ========================================================================= --}}
    <div id="wealth-tab-content-discover" class="wealth-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Discover Wealth Mansion Images</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Carousel Gallery</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Upload new images, edit labels, reorder, or remove items from the Discover Wealth Mansion carousel.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateGalleryModal('discover')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Upload New Image</span>
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <div id="gallery-cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5"></div>
                <div id="gallery-empty-state" class="hidden py-12 text-center">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-800">No gallery images uploaded</h3>
                    <p class="text-xs text-slate-500 mt-1">Click "Upload New Image" to add your first photo.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 3: UNIT TYPES (STUDIO, 1-BED, 2-BED WITH UP TO 5 IMAGES PER CARD)     --}}
    {{-- ========================================================================= --}}
    <div id="wealth-tab-content-units" class="wealth-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Wealth Mansion Unit Types</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Max 5 Images Each</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage Studio, 1-Bedroom, and 2-Bedroom unit cards. Upload up to 5 photos per unit for the interactive click & scroll carousel.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateUnitModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add Unit Type</span>
                    </button>
                </div>
            </div>

            {{-- Grid of Unit Cards --}}
            <div class="mt-6">
                <div id="units-cards-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
                <div id="units-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm font-semibold text-slate-700">No unit types found.</p>
                    <button type="button" onclick="seedDefaultUnits()" class="mt-3 px-4 py-2 bg-[#2A5A8A] text-white text-xs font-semibold rounded-lg">Load Default Unit Types</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 4: FACILITIES & LIFESTYLE (3x2 PHOTOS CRUD)                           --}}
    {{-- ========================================================================= --}}
    <div id="wealth-tab-content-facilities" class="wealth-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Facilities & Lifestyle (3x2 Photo Grid)</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">6 Grid Photos</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Upload and customize the 6 square photos displayed in the 3x2 grid next to the Facilities & Lifestyle list (Pool, Fitness, Lounge, etc.).</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateGalleryModal('facilities')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add Facility Photo</span>
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <div id="facilities-cards-grid" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4"></div>
                <div id="facilities-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm font-semibold text-slate-700">No custom facility photos uploaded yet.</p>
                    <button type="button" onclick="seedDefaultFacilities()" class="mt-3 px-4 py-2 bg-[#2A5A8A] text-white text-xs font-semibold rounded-lg">Load Default 6 Facility Photos</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 5: PROPERTY AVAILABILITY (IMAGE UPLOAD & PREVIEW)                     --}}
    {{-- ========================================================================= --}}
    <div id="wealth-tab-content-availability" class="wealth-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Property Availability Section Photo</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Hero Photo</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Upload and change the large property showcase photo displayed next to "Available Units: Approximately 30% Available".</p>
                </div>
            </div>

            <form onsubmit="handleAvailabilitySubmit(event)" class="mt-6 space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Availability Showcase Image</label>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <div class="w-full sm:w-64 aspect-[16/10] bg-slate-900 rounded-lg overflow-hidden border border-slate-300 shrink-0">
                            <img id="availability-preview-img" src="{{ asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 space-y-3">
                            <input type="file" id="availability-file-input" accept="image/*" onchange="previewAvailabilityFile(this)" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                            <p class="text-xs text-slate-500">Recommended size: 1200x750px (JPG, PNG, WebP) with the gold accent bar on top.</p>
                            <button type="submit" id="availability-save-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                                Update Availability Image
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 6: FAQS MANAGEMENT (100% HOMEPAGE / ABOUT / SERVICE UX/UI FORMULA)   --}}
    {{-- ========================================================================= --}}
    <div id="wealth-tab-content-faqs" class="wealth-tab-content hidden space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Database Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for Wealth Mansion.</p>
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

            {{-- FAQs Table --}}
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

                {{-- Empty state --}}
                <div id="faq-empty-state" class="hidden py-12 text-center">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-slate-800">No FAQs in database</h3>
                    <p class="text-xs text-slate-500 mt-1">Get started by creating your first FAQ item.</p>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card for FAQs --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Preview with real frontend styling</span>
            </div>
            
            <div class="mt-6 bg-[#f4f4f4] rounded-xl px-4 sm:px-10 py-10 sm:py-14 text-slate-900 shadow-inner">
                <div class="max-w-[1400px] mx-auto">
                    <h2 class="text-[clamp(24px,3vw,36px)] leading-tight mb-8 sm:mb-10">
                        <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                        <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
                    </h2>

                    {{-- Two-column accordion grid --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start" id="faq-live-preview-grid">
                        {{-- Populated dynamically via renderLivePreview() --}}
                    </div>
                </div>
            </div>
        </div>
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
                <input type="text" id="faq-question" required placeholder="e.g. What unit types are available at Wealth Mansion?" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
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

{{-- MODAL: DELETE CONFIRMATION --}}
<div id="delete-faq-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-faq-modal-card">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete FAQ?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this FAQ question and answer?</p>

        <input type="hidden" id="delete-faq-id">

        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteFaqModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                Cancel
            </button>
            <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                Yes, Delete
            </button>
        </div>
    </div>
</div>

{{-- MODAL: Create / Edit Gallery Image (Shared for Discover and Facilities) --}}
<div id="gallery-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="gallery-modal-card" class="bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-all duration-200">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div>
                <h3 class="text-base font-bold text-[#163049]" id="gallery-modal-title">Upload Gallery Image</h3>
                <p class="text-xs text-slate-500 mt-0.5" id="gallery-modal-desc">Add high-resolution photo.</p>
            </div>
            <button type="button" onclick="closeGalleryModal()" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form onsubmit="handleGalleryFormSubmit(event)" id="gallery-form" class="p-6 space-y-4">
            <input type="hidden" id="gallery-edit-id" value="">
            <input type="hidden" id="gallery-target-page" value="wealth-mansion">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Image File</label>
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                        <img id="modal-img-preview" src="{{ asset('services/wealth_mansion/discovered/wealth-mainson-recovered4.png') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <input type="file" id="gallery-file-input" accept="image/*" onchange="previewGalleryModalFile(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Recommended: JPG, PNG, WebP up to 10MB.</p>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Title / Caption</label>
                <input type="text" id="gallery-title-input" required placeholder="e.g. Infinity Swimming Pool" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Alt Text (SEO)</label>
                <input type="text" id="gallery-alt-input" placeholder="e.g. Wealth Mansion luxury swimming pool" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Sort Order (1 to 6)</label>
                    <input type="number" id="gallery-order-input" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Status</label>
                    <select id="gallery-status-input" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <button type="button" onclick="closeGalleryModal()" class="px-4 py-2 text-xs font-semibold text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition-colors">
                    Cancel
                </button>
                <button type="submit" id="gallery-save-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all">
                    Save Image
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: Create / Edit Unit Type with Multi-Images (Max 5) --}}
<div id="unit-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="unit-modal-card" class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-all duration-200 max-h-[90vh] flex flex-col">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50 shrink-0">
            <div>
                <h3 class="text-base font-bold text-[#163049]" id="unit-modal-title">Edit Unit Type</h3>
                <p class="text-xs text-slate-500 mt-0.5">Manage unit details and up to 5 clickable scroll images.</p>
            </div>
            <button type="button" onclick="closeUnitModal()" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form onsubmit="handleUnitFormSubmit(event)" id="unit-form" class="p-6 space-y-5 overflow-y-auto grow">
            <input type="hidden" id="unit-edit-id" value="">

            {{-- Multi-Images Uploader (Up to 5) --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Unit Photos (Max 5 Images for Scroll)</label>
                    <span id="unit-img-count-badge" class="text-[11px] font-semibold text-slate-500">0 / 5</span>
                </div>

                <div id="unit-images-preview-strip" class="grid grid-cols-5 gap-2.5"></div>

                <div>
                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Add Image File</label>
                    <input type="file" id="unit-multi-file-input" accept="image/*" onchange="addUnitFileToQueue(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                    <p class="text-[10px] text-slate-400 mt-1">Upload up to 5 photos. The user can click left/right arrows to scroll through them.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Title (e.g. Studio Room)</label>
                    <input type="text" id="unit-title-input" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Subtitle</label>
                    <input type="text" id="unit-subtitle-input" placeholder="e.g. Compact & Practical Living" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Paragraph Description</label>
                <textarea id="unit-desc-input" rows="3" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-xs text-slate-900 leading-relaxed focus:outline-none focus:border-[#2A5A8A]" placeholder="The studio layout is suitable for individuals, couples, business professionals, and investors seeking a compact residential property."></textarea>
            </div>

            {{-- Suitable For List Editor --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">"Suitable For:" Bullet List</label>
                    <button type="button" onclick="addUnitSuitableItem()" class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-[#2A5A8A] text-white text-[11px] font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                        + Add Item
                    </button>
                </div>
                <div id="unit-suitable-container" class="space-y-2"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Availability Tag</label>
                    <input type="text" id="unit-status-input" value="30% Available" placeholder="e.g. 30% Available or XX Units" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Button / Link Destination</label>
                    <input type="text" id="unit-link-input" value="/contact-us" placeholder="e.g. /contact-us" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Sort Order</label>
                    <input type="number" id="unit-sort-input" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
                <button type="button" onclick="closeUnitModal()" class="px-4 py-2 text-xs font-semibold text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition-colors">
                    Cancel
                </button>
                <button type="submit" id="unit-save-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all">
                    Save Unit Type
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'properties-wealth-mansion';
    const galleryPageSlug = 'wealth-mansion';
    const facilitiesPageSlug = 'wealth-mansion-facilities';
    const unitsPageSlug = 'wealth-mansion-units';

    const availableRoutes = [
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Home (/)', url: '/' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Wealth Mansion (/properties/wealth-mansion)', url: '/properties/wealth-mansion' },
        { label: 'Private Residential (/properties/private-residential)', url: '/properties/private-residential' },
        { label: 'UC88 (/properties/uc88)', url: '/properties/uc88' },
        { label: 'Services Overview (/service)', url: '/service' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' },
        { label: 'Insights & News (/insights)', url: '/insights' },
        { label: 'Events (/events)', url: '/events' }
    ];

    function scrollTabsBar(direction) {
        const track = document.getElementById('tabs-nav-track');
        if (track) {
            track.scrollBy({ left: direction * 250, behavior: 'smooth' });
        }
    }

    function switchWealthTab(tabName, evt) {
        if (evt) evt.preventDefault();
        document.querySelectorAll('.wealth-tab-btn').forEach(btn => {
            btn.classList.remove('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
            btn.classList.add('text-slate-500', 'border-transparent', 'font-medium');
        });
        const activeBtn = document.getElementById(`wealth-tab-btn-${tabName}`);
        if (activeBtn) {
            activeBtn.classList.remove('text-slate-500', 'border-transparent', 'font-medium');
            activeBtn.classList.add('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
        }

        document.querySelectorAll('.wealth-tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        const targetContent = document.getElementById(`wealth-tab-content-${tabName}`);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }
    }

    // ==========================================
    // HERO SECTION SCRIPTS
    // ==========================================
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

    let heroBulletsData = ['30% available'];
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
                <button type="button" onclick="removeHeroBulletPoint(${index})" class="text-slate-400 hover:text-red-500 p-1 rounded transition-colors" title="Remove bullet">
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
        heroBulletsData.push('New highlight');
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
                    <button type="button" onclick="removeHeroButton(${index})" class="p-2 rounded-md hover:bg-rose-50 text-slate-400 hover:text-rose-600 transition-colors" title="Remove Button">
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
        heroButtonsData.push({ text: 'Learn More', url: '/contact-us' });
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

        const showBullets = document.getElementById('hero-bullets-toggle')?.checked ?? true;
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
            const res = await fetch(`/api/hero-section/${pageSlug}`);
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                const editor = document.getElementById('hero-tagline-editor');
                if (editor) {
                    if (data.tagline_html) {
                        let cleanText = data.tagline_html.replace(/text-\[#F4DEAC\]/g, "").replace(/style="[^"]*"/g, "");
                        editor.innerHTML = cleanText;
                    } else if (data.tagline_box1 || data.tagline_box2) {
                        let b1 = data.tagline_box1 || '';
                        let b2 = data.tagline_box2 || '';
                        if (data.tagline_box1_style === 'bold-gold') b1 = `<b>${b1}</b>`;
                        if (data.tagline_box2_style === 'bold-gold') b2 = `<b>${b2}</b>`;
                        editor.innerHTML = `${b1} ${b2}`.trim();
                    }
                }
                if (data.headline) document.getElementById('hero-headline-input').value = data.headline;
                if (typeof data.show_bullets !== 'undefined') document.getElementById('hero-bullets-toggle').checked = !!data.show_bullets;
                if (Array.isArray(data.bullets) && data.bullets.length > 0) heroBulletsData = data.bullets;
                if (Array.isArray(data.buttons) && data.buttons.length > 0) heroButtonsData = data.buttons;
                renderHeroBulletsInputs();
                renderHeroButtonsInputs();
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
                page: pageSlug,
                tagline_html: rawTagline,
                show_tagline: true,
                headline: document.getElementById('hero-headline-input').value,
                show_bullets: document.getElementById('hero-bullets-toggle').checked,
                bullets: heroBulletsData,
                buttons: heroButtonsData
            };

            const res = await fetch(`/api/hero-section/${pageSlug}`, {
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
                if (typeof showToast === 'function') showToast('Wealth Mansion Hero Section saved live!');
                updateHeroPreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving hero section', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save to database', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    // ==========================================
    // DISCOVER WEALTH MANSION & FACILITIES GALLERIES
    // ==========================================
    let galleryItemsData = [];
    let facilitiesItemsData = [];

    function formatImageUrl(path) {
        if (!path) return '';
        if (path.startsWith('http') || path.startsWith('/')) return path;
        return '/' + path;
    }

    async function fetchGalleryItems() {
        try {
            const res = await fetch(`/api/project-galleries/${galleryPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                galleryItemsData = result.data;
                renderGalleryCards();
            }
        } catch (err) {
            console.error('Error fetching gallery items:', err);
        }
    }

    async function fetchFacilitiesItems() {
        try {
            const res = await fetch(`/api/project-galleries/${facilitiesPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                facilitiesItemsData = result.data;
                if (!facilitiesItemsData.length) {
                    await seedDefaultFacilities();
                    return;
                }
                renderFacilitiesCards();
            }
        } catch (err) {
            console.error('Error fetching facilities items:', err);
        }
    }

    async function seedDefaultFacilities() {
        const defaults = [
            { image: 'home/latest_activities/1img.png', title: 'Swimming Pool', alt_text: 'Wealth Mansion swimming pool', sort_order: 1 },
            { image: 'home/latest_activities/2img.png', title: 'Fitness Facilities', alt_text: 'Modern fitness gym', sort_order: 2 },
            { image: 'home/latest_activities/3img.png', title: 'Security Services', alt_text: '24/7 building security', sort_order: 3 },
            { image: 'home/latest_activities/4img.png', title: 'Resident Parking', alt_text: 'Secure parking area', sort_order: 4 },
            { image: 'home/latest_activities/5img.png', title: 'Common Lounge', alt_text: 'Comfortable common spaces', sort_order: 5 },
            { image: 'home/latest_activities/6img.png', title: 'Building Management', alt_text: 'Professional concierge management', sort_order: 6 },
        ];

        for (const item of defaults) {
            const formData = new FormData();
            formData.append('page', facilitiesPageSlug);
            formData.append('title', item.title);
            formData.append('alt_text', item.alt_text);
            formData.append('image', item.image);
            formData.append('sort_order', item.sort_order);
            formData.append('status', 'published');

            await fetch(`/api/project-galleries/${facilitiesPageSlug}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
        }

        const res = await fetch(`/api/project-galleries/${facilitiesPageSlug}`);
        const result = await res.json();
        if (result.success && Array.isArray(result.data)) {
            facilitiesItemsData = result.data;
            renderFacilitiesCards();
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
                        <img src="${formatImageUrl(item.image)}" alt="${escapeHtml(item.alt_text || item.title)}" class="w-full h-full min-w-full min-h-full object-fill group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-[#163049]/80 backdrop-blur-xs text-[#F4DEAC] text-[10px] font-bold px-2 py-0.5 rounded">
                            #${item.sort_order || idx + 1}
                        </span>
                        <span class="absolute top-2 right-2 ${item.status === 'published' ? 'bg-emerald-500' : 'bg-amber-500'} text-white text-[9px] font-bold uppercase px-1.5 py-0.5 rounded">
                            ${item.status || 'published'}
                        </span>
                    </div>

                    <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                        <div>
                            <h4 class="text-xs font-bold text-[#163049] line-clamp-1">${escapeHtml(item.title || 'Untitled Image')}</h4>
                            <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">${escapeHtml(item.alt_text || 'No alt text')}</p>
                        </div>

                        <div class="flex items-center justify-between pt-2 border-t border-slate-200/80">
                            <button type="button" onclick="openEditGalleryModal(${item.id}, 'discover')" class="px-2.5 py-1 text-xs font-semibold text-[#2A5A8A] hover:bg-[#2A5A8A]/10 rounded transition-colors flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                                <span>Edit</span>
                            </button>
                            <button type="button" onclick="deleteGalleryItem(${item.id}, 'discover')" class="px-2 py-1 text-xs font-semibold text-rose-500 hover:bg-rose-50 rounded transition-colors cursor-pointer" title="Delete image">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }
    }

    function renderFacilitiesCards() {
        const grid = document.getElementById('facilities-cards-grid');
        const empty = document.getElementById('facilities-empty-state');
        const badge = document.getElementById('tab-badge-facilities-count');
        if (badge) badge.innerText = facilitiesItemsData.length;

        if (!facilitiesItemsData.length) {
            if (grid) grid.innerHTML = '';
            if (empty) empty.classList.remove('hidden');
            return;
        }

        if (empty) empty.classList.add('hidden');
        if (grid) {
            grid.innerHTML = facilitiesItemsData.map((item, idx) => `
                <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden shadow-xs flex flex-col justify-between group hover:shadow-md transition-all">
                    <div class="relative w-full aspect-square bg-slate-900 overflow-hidden">
                        <img src="${formatImageUrl(item.image)}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-[#163049]/80 backdrop-blur-xs text-[#F4DEAC] text-[10px] font-bold px-2 py-0.5 rounded">
                            Photo #${item.sort_order || idx + 1}
                        </span>
                    </div>

                    <div class="p-3 flex-1 flex flex-col justify-between space-y-2">
                        <h4 class="text-xs font-bold text-[#163049] line-clamp-1">${escapeHtml(item.title || 'Facility Photo')}</h4>
                        
                        <div class="flex items-center justify-between pt-2 border-t border-slate-200">
                            <button type="button" onclick="openEditGalleryModal(${item.id}, 'facilities')" class="text-[11px] font-semibold text-[#2A5A8A] hover:underline cursor-pointer">
                                Edit Photo
                            </button>
                            <button type="button" onclick="deleteGalleryItem(${item.id}, 'facilities')" class="text-[11px] font-semibold text-rose-500 hover:underline cursor-pointer">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }
    }

    function openCreateGalleryModal(type = 'discover') {
        const isFacility = type === 'facilities';
        const targetPage = isFacility ? facilitiesPageSlug : galleryPageSlug;
        const currentCount = isFacility ? facilitiesItemsData.length : galleryItemsData.length;

        document.getElementById('gallery-target-page').value = targetPage;
        document.getElementById('gallery-modal-title').innerText = isFacility ? 'Add Facility Photo (3x2 Grid)' : 'Upload Discover Carousel Image';
        document.getElementById('gallery-modal-desc').innerText = isFacility ? 'Upload square photo for the Facilities & Lifestyle 3x2 grid' : 'Add high-resolution project view or interior photo';
        document.getElementById('gallery-edit-id').value = '';
        document.getElementById('gallery-title-input').value = '';
        document.getElementById('gallery-alt-input').value = '';
        document.getElementById('gallery-order-input').value = (currentCount + 1);
        document.getElementById('gallery-status-input').value = 'published';
        document.getElementById('modal-img-preview').src = '{{ asset("home/latest_activities/1img.png") }}';
        document.getElementById('gallery-file-input').value = '';

        const modal = document.getElementById('gallery-modal');
        const card = document.getElementById('gallery-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function openEditGalleryModal(id, type = 'discover') {
        const isFacility = type === 'facilities';
        const items = isFacility ? facilitiesItemsData : galleryItemsData;
        const targetPage = isFacility ? facilitiesPageSlug : galleryPageSlug;
        const item = items.find(g => g.id === id);
        if (!item) return;

        document.getElementById('gallery-target-page').value = targetPage;
        document.getElementById('gallery-modal-title').innerText = isFacility ? 'Edit Facility Photo' : 'Edit Discover Image';
        document.getElementById('gallery-edit-id').value = item.id;
        document.getElementById('gallery-title-input').value = item.title || '';
        document.getElementById('gallery-alt-input').value = item.alt_text || '';
        document.getElementById('gallery-order-input').value = item.sort_order || 1;
        document.getElementById('gallery-status-input').value = item.status || 'published';
        document.getElementById('modal-img-preview').src = formatImageUrl(item.image);
        document.getElementById('gallery-file-input').value = '';

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
        const editId = document.getElementById('gallery-edit-id').value;
        const targetPage = document.getElementById('gallery-target-page').value;
        const saveBtn = document.getElementById('gallery-save-btn');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerText = 'Saving...';
        }

        try {
            const formData = new FormData();
            formData.append('page', targetPage);
            formData.append('title', document.getElementById('gallery-title-input').value);
            formData.append('alt_text', document.getElementById('gallery-alt-input').value);
            formData.append('sort_order', document.getElementById('gallery-order-input').value);
            formData.append('status', document.getElementById('gallery-status-input').value);

            const fileInput = document.getElementById('gallery-file-input');
            if (fileInput && fileInput.files[0]) {
                formData.append('image_file', fileInput.files[0]);
            }

            let endpoint = `/api/project-galleries/${targetPage}`;
            if (editId) endpoint = `/api/project-galleries/update/${editId}`;

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
                if (typeof showToast === 'function') showToast(data.message || 'Image saved live!');
                closeGalleryModal();
                if (targetPage === facilitiesPageSlug) {
                    fetchFacilitiesItems();
                } else {
                    fetchGalleryItems();
                }
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving image', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save to database', 'error');
        } finally {
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.innerText = 'Save Image';
            }
        }
    }

    async function deleteGalleryItem(id, type = 'discover') {
        if (!confirm('Are you sure you want to delete this photo?')) return;
        try {
            const res = await fetch(`/api/project-galleries/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Photo deleted successfully!');
                if (type === 'facilities') {
                    fetchFacilitiesItems();
                } else {
                    fetchGalleryItems();
                }
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to delete photo', 'error');
        }
    }

    // ==========================================
    // UNIT TYPES (MULTI-IMAGE CLICK SCROLL)
    // ==========================================
    let unitItemsData = [];
    let unitModalImagesQueue = [];

    async function fetchUnitItems() {
        try {
            const res = await fetch(`/api/service-featured-properties/${unitsPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                unitItemsData = result.data;
                if (!unitItemsData.length) {
                    await seedDefaultUnits();
                    return;
                }
                renderUnitCards();
            }
        } catch (err) {
            console.error('Error fetching units:', err);
        }
    }

    async function seedDefaultUnits() {
        const defaults = [
            {
                grade: 'A',
                title: 'Studio Room',
                subtitle: 'Compact & Practical Living',
                description: "The studio layout is suitable for individuals, couples, business professionals, and investors seeking a compact residential property.\n\nSuitable for:\n• Individual residents\n• Business travelers\n• Young professionals\n• Rental investment",
                status: '30% Available',
                image: 'services/propertis_leasing/bedroom.png',
                detail_images: [
                    'services/propertis_leasing/bedroom.png',
                    'services/propertis_leasing/all part.png'
                ],
                sort_order: 1,
                publish_status: 'published'
            },
            {
                grade: 'A',
                title: '1-bedroom',
                subtitle: 'Comfortable One-Bedroom Residence',
                description: "The 1-bedroom layout provides additional living space and privacy compared with a studio, making it suitable for both personal residence and rental investment.\n\nSuitable for:\n• Couples\n• Professionals\n• Long-term residents\n• Property investors",
                status: '30% Available',
                image: 'services/propertis_leasing/bedroom.png',
                detail_images: [
                    'services/propertis_leasing/bedroom.png',
                    'services/propertis_leasing/all part.png'
                ],
                sort_order: 2,
                publish_status: 'published'
            },
            {
                grade: 'A',
                title: '2-Bedroom with Balcony',
                subtitle: 'More Space with a Private Balcony',
                description: "The 2-bedroom residence provides additional space for families or buyers seeking a larger condominium with outdoor balcony space.\n\nSuitable for:\n• Small families\n• Shared living\n• Long-term residents\n• Investment purposes",
                status: '30% Available',
                image: 'services/propertis_leasing/all part.png',
                detail_images: [
                    'services/propertis_leasing/all part.png',
                    'services/propertis_leasing/bedroom.png'
                ],
                sort_order: 3,
                publish_status: 'published'
            }
        ];

        for (const d of defaults) {
            const formData = new FormData();
            formData.append('page', unitsPageSlug);
            formData.append('grade', d.grade);
            formData.append('title', d.title);
            formData.append('subtitle', d.subtitle);
            formData.append('description', d.description);
            formData.append('status', d.status);
            formData.append('image', d.image);
            formData.append('detail_images', JSON.stringify(d.detail_images));
            formData.append('sort_order', d.sort_order);
            formData.append('publish_status', d.publish_status);

            await fetch(`/api/service-featured-properties/${unitsPageSlug}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
        }

        const res = await fetch(`/api/service-featured-properties/${unitsPageSlug}`);
        const result = await res.json();
        if (result.success && Array.isArray(result.data)) {
            unitItemsData = result.data;
            renderUnitCards();
        }
    }

    function renderUnitCards() {
        const grid = document.getElementById('units-cards-grid');
        const empty = document.getElementById('units-empty-state');
        const badge = document.getElementById('tab-badge-units-count');
        if (badge) badge.innerText = unitItemsData.length;

        if (!unitItemsData.length) {
            if (grid) grid.innerHTML = '';
            if (empty) empty.classList.remove('hidden');
            return;
        }

        if (empty) empty.classList.add('hidden');
        if (grid) {
            grid.innerHTML = unitItemsData.map((unit, idx) => {
                const images = (Array.isArray(unit.detail_images) && unit.detail_images.length) ? unit.detail_images : [unit.image || 'services/propertis_leasing/bedroom.png'];
                return `
                    <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden shadow-xs flex flex-col justify-between group hover:shadow-md transition-all">
                        <div class="relative w-full aspect-[16/10] bg-slate-900 overflow-hidden">
                            <img src="${formatImageUrl(images[0])}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute bottom-2 left-2 flex items-center gap-1.5 bg-black/60 px-2 py-1 rounded">
                                <span class="text-[10px] text-white font-semibold">${images.length} Photos</span>
                            </div>
                        </div>

                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div>
                                <h4 class="text-sm font-bold text-[#163049]">${escapeHtml(unit.title)}</h4>
                                <p class="text-xs font-semibold text-slate-700 mt-0.5">${escapeHtml(unit.subtitle || '')}</p>
                                <p class="text-xs text-[#2A5A8A] font-bold mt-2">${escapeHtml(unit.status || '30% Available')}</p>
                            </div>

                            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                                <button type="button" onclick="openEditUnitModal(${unit.id})" class="px-3 py-1.5 bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                                    Edit Photos (${images.length}/5) & Details
                                </button>
                                <button type="button" onclick="deleteUnitItem(${unit.id})" class="text-xs text-rose-500 hover:text-rose-700 font-semibold cursor-pointer">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }
    }

    let unitSuitableItemsData = [];

    function renderUnitSuitableItems() {
        const container = document.getElementById('unit-suitable-container');
        if (!container) return;
        if (!unitSuitableItemsData.length) {
            container.innerHTML = '<p class="text-[11px] text-slate-400 italic">No bullet items yet. Click "+ Add Item" above.</p>';
            return;
        }
        container.innerHTML = unitSuitableItemsData.map((item, idx) => `
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-[#2A5A8A]">•</span>
                <input type="text" value="${escapeHtml(item)}" oninput="updateUnitSuitableItem(${idx}, this.value)" placeholder="e.g. Individual residents" class="flex-1 px-3 py-1.5 bg-white border border-slate-300 rounded text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                <button type="button" onclick="removeUnitSuitableItem(${idx})" class="p-1 text-slate-400 hover:text-rose-600 rounded transition-colors" title="Remove bullet">
                    ✕
                </button>
            </div>
        `).join('');
    }

    function addUnitSuitableItem() {
        unitSuitableItemsData.push('New resident profile');
        renderUnitSuitableItems();
    }

    function removeUnitSuitableItem(idx) {
        unitSuitableItemsData.splice(idx, 1);
        renderUnitSuitableItems();
    }

    function updateUnitSuitableItem(idx, val) {
        unitSuitableItemsData[idx] = val;
    }

    function parseDescriptionAndSuitable(rawDesc) {
        if (!rawDesc) return { desc: '', suitable: ['Individual residents', 'Business travelers', 'Young professionals', 'Rental investment'] };
        const lines = rawDesc.split('\n');
        let suitableFound = false;
        const descArr = [];
        const suitableArr = [];
        for (const l of lines) {
            const trimmed = l.trim();
            if (trimmed.toLowerCase().includes('suitable for:')) {
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
            suitable: suitableArr.length ? suitableArr : ['Individual residents', 'Business travelers', 'Young professionals', 'Rental investment']
        };
    }

    function openCreateUnitModal() {
        document.getElementById('unit-modal-title').innerText = 'Add Unit Type';
        document.getElementById('unit-edit-id').value = '';
        document.getElementById('unit-title-input').value = '';
        document.getElementById('unit-subtitle-input').value = '';
        document.getElementById('unit-desc-input').value = 'The studio layout is suitable for individuals, couples, business professionals, and investors seeking a compact residential property.';
        document.getElementById('unit-status-input').value = '30% Available';
        document.getElementById('unit-link-input').value = '/contact-us';
        document.getElementById('unit-sort-input').value = (unitItemsData.length + 1);
        
        unitSuitableItemsData = ['Individual residents', 'Business travelers', 'Young professionals', 'Rental investment'];
        renderUnitSuitableItems();

        unitModalImagesQueue = [
            { type: 'url', src: 'services/propertis_leasing/bedroom.png' }
        ];
        renderUnitModalImages();

        const modal = document.getElementById('unit-modal');
        const card = document.getElementById('unit-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function openEditUnitModal(id) {
        const unit = unitItemsData.find(u => u.id === id);
        if (!unit) return;

        document.getElementById('unit-modal-title').innerText = `Edit: ${unit.title}`;
        document.getElementById('unit-edit-id').value = unit.id;
        document.getElementById('unit-title-input').value = unit.title || '';
        document.getElementById('unit-subtitle-input').value = unit.subtitle || '';
        
        const parsed = parseDescriptionAndSuitable(unit.description);
        document.getElementById('unit-desc-input').value = parsed.desc;
        unitSuitableItemsData = parsed.suitable;
        renderUnitSuitableItems();

        document.getElementById('unit-status-input').value = unit.status || '30% Available';
        document.getElementById('unit-link-input').value = unit.link || '/contact-us';
        document.getElementById('unit-sort-input').value = unit.sort_order || 1;

        const imgs = (Array.isArray(unit.detail_images) && unit.detail_images.length) ? unit.detail_images : [unit.image || 'services/propertis_leasing/bedroom.png'];
        unitModalImagesQueue = imgs.slice(0, 5).map(src => ({ type: 'url', src: src }));
        renderUnitModalImages();

        const modal = document.getElementById('unit-modal');
        const card = document.getElementById('unit-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeUnitModal() {
        const modal = document.getElementById('unit-modal');
        const card = document.getElementById('unit-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }

    function renderUnitModalImages() {
        const container = document.getElementById('unit-images-preview-strip');
        const badge = document.getElementById('unit-img-count-badge');
        if (badge) badge.innerText = `${unitModalImagesQueue.length} / 5`;

        if (!container) return;
        container.innerHTML = unitModalImagesQueue.map((item, idx) => {
            const previewSrc = item.type === 'url' ? formatImageUrl(item.src) : item.preview;
            return `
                <div class="relative aspect-[4/3] bg-slate-900 rounded-lg overflow-hidden border border-slate-300 group shadow-xs">
                    <img src="${previewSrc}" class="w-full h-full object-cover">
                    <button type="button" onclick="removeUnitImageFromQueue(${idx})" class="absolute top-1 right-1 w-5 h-5 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center text-[10px] shadow cursor-pointer" title="Remove Photo">
                        ✕
                    </button>
                    <span class="absolute bottom-1 left-1 bg-black/70 text-white text-[9px] font-bold px-1 rounded">#${idx + 1}</span>
                </div>
            `;
        }).join('');
    }

    function addUnitFileToQueue(input) {
        if (input.files && input.files[0]) {
            if (unitModalImagesQueue.length >= 5) {
                if (typeof showToast === 'function') showToast('Maximum 5 images allowed per unit', 'warning');
                input.value = '';
                return;
            }
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                unitModalImagesQueue.push({
                    type: 'file',
                    file: file,
                    preview: e.target.result
                });
                renderUnitModalImages();
                input.value = '';
            };
            reader.readAsDataURL(file);
        }
    }

    function removeUnitImageFromQueue(idx) {
        if (unitModalImagesQueue.length <= 1) {
            if (typeof showToast === 'function') showToast('Unit should have at least 1 image', 'warning');
            return;
        }
        unitModalImagesQueue.splice(idx, 1);
        renderUnitModalImages();
    }

    async function handleUnitFormSubmit(e) {
        e.preventDefault();
        const editId = document.getElementById('unit-edit-id').value;
        const saveBtn = document.getElementById('unit-save-btn');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerText = 'Saving...';
        }

        try {
            const formData = new FormData();
            formData.append('page', unitsPageSlug);
            formData.append('grade', 'A');
            formData.append('title', document.getElementById('unit-title-input').value);
            formData.append('subtitle', document.getElementById('unit-subtitle-input').value);
            
            // Combine description and suitable for list
            const desc = document.getElementById('unit-desc-input').value.trim();
            const suitableList = unitSuitableItemsData.filter(s => s.trim().length > 0);
            let combinedDesc = desc;
            if (suitableList.length > 0) {
                combinedDesc += "\n\nSuitable for:\n" + suitableList.map(s => `• ${s}`).join("\n");
            }
            formData.append('description', combinedDesc);
            
            formData.append('status', document.getElementById('unit-status-input').value);
            formData.append('link', document.getElementById('unit-link-input').value);
            formData.append('sort_order', document.getElementById('unit-sort-input').value);
            formData.append('publish_status', 'published');

            // Collect existing URL images
            const existingUrls = unitModalImagesQueue.filter(i => i.type === 'url').map(i => i.src);
            formData.append('detail_images', JSON.stringify(existingUrls));

            // Append new uploaded image files
            const newFiles = unitModalImagesQueue.filter(i => i.type === 'file');
            newFiles.forEach((item) => {
                formData.append('detail_image_files[]', item.file);
            });

            let endpoint = `/api/service-featured-properties/${unitsPageSlug}`;
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
                if (typeof showToast === 'function') showToast('Unit photos & details saved live!');
                closeUnitModal();
                fetchUnitItems();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving unit', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save to database', 'error');
        } finally {
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.innerText = 'Save Unit Type';
            }
        }
    }

    async function deleteUnitItem(id) {
        if (!confirm('Are you sure you want to delete this unit type?')) return;
        try {
            const res = await fetch(`/api/service-featured-properties/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Unit removed successfully!');
                fetchUnitItems();
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to delete unit', 'error');
        }
    }

    // ==========================================
    // PROPERTY AVAILABILITY IMAGE
    // ==========================================
    const availabilityPageSlug = 'wealth-mansion-availability';

    function previewAvailabilityFile(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('availability-preview-img').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function fetchAvailabilityImage() {
        try {
            const res = await fetch(`/api/project-galleries/${availabilityPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data) && result.data.length > 0) {
                const item = result.data[0];
                document.getElementById('availability-preview-img').src = formatImageUrl(item.image);
            }
        } catch (err) {
            console.error('Error fetching availability image:', err);
        }
    }

    async function handleAvailabilitySubmit(e) {
        e.preventDefault();
        const fileInput = document.getElementById('availability-file-input');
        if (!fileInput.files || !fileInput.files[0]) {
            if (typeof showToast === 'function') showToast('Please select an image file to upload', 'warning');
            return;
        }

        const saveBtn = document.getElementById('availability-save-btn');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerText = 'Updating...';
        }

        try {
            const formData = new FormData();
            formData.append('page', availabilityPageSlug);
            formData.append('title', 'Property Availability');
            formData.append('image_file', fileInput.files[0]);
            formData.append('status', 'published');
            formData.append('sort_order', 1);

            const res = await fetch(`/api/project-galleries/${availabilityPageSlug}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Property Availability image updated live!');
                fetchAvailabilityImage();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error updating image', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save to database', 'error');
        } finally {
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.innerText = 'Update Availability Image';
            }
        }
    }

    // ==========================================
    // FAQS MANAGEMENT (100% HOMEPAGE / ABOUT UX/UI FORMULA)
    // ==========================================
    const faqPageSlug = 'wealth-mansion';
    let faqsData = [];

    async function fetchFaqs() {
        try {
            const res = await fetch(`/api/faqs?page=${faqPageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                faqsData = result.data;
                if (!faqsData.length) {
                    await seedDefaultFaqs();
                    return;
                }
                renderFaqsTable();
                renderLivePreview();
                const countBadge = document.getElementById('tab-badge-faqs-count');
                if (countBadge) countBadge.innerText = faqsData.length;
            }
        } catch (err) {
            console.error('Error fetching faqs:', err);
            if (typeof showToast === 'function') showToast('Error loading FAQs from database', 'error');
        }
    }

    async function seedDefaultFaqs() {
        const defaults = [
            { question: 'What unit types are available at Wealth Mansion?', answer: 'The project offers studio, 1-bedroom, 2-bedroom with balcony, and 3-bedroom layouts.', column: 'left', sort_order: 1 },
            { question: 'Is Wealth Mansion suitable for investment?', answer: 'CommingSoon', column: 'left', sort_order: 2 },
            { question: 'Can CWD help manage my unit after purchase?', answer: 'CommingSoon', column: 'right', sort_order: 1 },
            { question: 'Can I view the property before purchasing?', answer: 'CommingSoon', column: 'right', sort_order: 2 }
        ];

        for (const item of defaults) {
            await fetch('/api/faqs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    page: faqPageSlug,
                    question: item.question,
                    answer: item.answer,
                    column: item.column,
                    status: 'published',
                    sort_order: item.sort_order
                })
            });
        }

        const res = await fetch(`/api/faqs?page=${faqPageSlug}`);
        const result = await res.json();
        if (result.success && Array.isArray(result.data)) {
            faqsData = result.data;
            renderFaqsTable();
            renderLivePreview();
            const countBadge = document.getElementById('tab-badge-faqs-count');
            if (countBadge) countBadge.innerText = faqsData.length;
        }
    }

    function renderFaqsTable() {
        const tbody = document.getElementById('faq-table-body');
        const emptyState = document.getElementById('faq-empty-state');
        const countBadge = document.getElementById('tab-badge-faqs-count');

        if (countBadge) countBadge.innerText = faqsData.length;

        if (faqsData.length === 0) {
            tbody.innerHTML = '';
            emptyState.classList.remove('hidden');
            return;
        }

        emptyState.classList.add('hidden');
        tbody.innerHTML = faqsData.map((item, index) => `
            <tr class="hover:bg-slate-50/80 transition-colors group">
                <td class="py-3.5 px-4 text-center text-slate-400 font-mono text-xs">${index + 1}</td>
                <td class="py-3.5 px-4">
                    <div class="font-semibold text-[#163049] group-hover:text-[#1479B9] transition-colors">${escapeHtml(item.question)}</div>
                </td>
                <td class="py-3.5 px-4">
                    <div class="text-xs text-slate-600 line-clamp-1">${escapeHtml(item.answer)}</div>
                </td>
                <td class="py-3.5 px-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-semibold ${item.column === 'left' ? 'bg-[#2A5A8A]/10 text-[#2A5A8A]' : 'bg-[#1479B9]/10 text-[#1479B9]'}">
                        ${item.column === 'left' ? 'Left Col' : 'Right Col'}
                    </span>
                </td>
                <td class="py-3.5 px-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold ${item.status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600'}">
                        ${item.status === 'published' ? 'Published' : 'Draft'}
                    </span>
                </td>
                <td class="py-3.5 px-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <button onclick="openEditFaqModal(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-[#2A5A8A] text-slate-600 hover:text-white transition-colors cursor-pointer" title="Edit FAQ">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button onclick="promptDeleteFaq(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-rose-600 text-slate-600 hover:text-white transition-colors cursor-pointer" title="Delete FAQ">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    function renderLivePreview() {
        const grid = document.getElementById('faq-live-preview-grid');
        if (!grid) return;

        const leftFaqs = faqsData.filter(f => f.column === 'left' && f.status === 'published');
        const rightFaqs = faqsData.filter(f => f.column === 'right' && f.status === 'published');

        function renderColumn(items, isLeft) {
            return `
                <div class="faq-column flex flex-col gap-2 w-full">
                    ${items.map((f, i) => {
                        const isOpen = isLeft && i === 0;
                        return `
                            <div class="faq-item bg-white shadow-xs">
                                <button type="button"
                                    class="preview-faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer select-none"
                                    aria-expanded="${isOpen ? 'true' : 'false'}"
                                    onclick="togglePreviewFaq(this)">
                                    <span class="text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium leading-snug">
                                        ${escapeHtml(f.question)}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="preview-faq-arrow w-4 h-4 shrink-0 text-[#2A5A8A] transition-transform duration-200 ${isOpen ? 'rotate-90' : ''}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l8 6-8 6V4z" />
                                    </svg>
                                </button>
                                <div class="preview-faq-panel overflow-hidden transition-all duration-300 ${isOpen ? 'max-h-[400px]' : 'max-h-0'}">
                                    <div class="${isOpen ? 'bg-[#0B6FB8] text-white' : 'bg-white text-black/70'} px-5 py-4 sm:px-6 sm:py-5 transition-colors duration-200">
                                        <p class="text-[13px] sm:text-[13.5px] leading-relaxed">
                                            ${escapeHtml(f.answer)}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('')}
                </div>
            `;
        }

        grid.innerHTML = `
            ${renderColumn(leftFaqs, true)}
            ${renderColumn(rightFaqs, false)}
        `;
    }

    function togglePreviewFaq(btn) {
        const item = btn.closest('.faq-item');
        if (!item) return;
        const panel = item.querySelector('.preview-faq-panel');
        const contentBox = panel.querySelector('div');
        const arrow = btn.querySelector('.preview-faq-arrow');
        const isExpanded = btn.getAttribute('aria-expanded') === 'true';

        if (isExpanded) {
            panel.style.maxHeight = '0px';
            btn.setAttribute('aria-expanded', 'false');
            arrow.classList.remove('rotate-90');
            contentBox.classList.remove('bg-[#0B6FB8]', 'text-white');
            contentBox.classList.add('bg-white', 'text-black/70');
        } else {
            panel.style.maxHeight = panel.scrollHeight + 'px';
            btn.setAttribute('aria-expanded', 'true');
            arrow.classList.add('rotate-90');
            contentBox.classList.add('bg-[#0B6FB8]', 'text-white');
            contentBox.classList.remove('bg-white', 'text-black/70');
        }
    }

    function openCreateFaqModal() {
        document.getElementById('faq-id').value = '';
        document.getElementById('faq-question').value = '';
        document.getElementById('faq-answer').value = '';
        document.getElementById('faq-column').value = 'left';
        document.getElementById('faq-status').value = 'published';
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New FAQ';

        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function openEditFaqModal(id) {
        const faq = faqsData.find(f => f.id === id);
        if (!faq) return;

        document.getElementById('faq-id').value = faq.id;
        document.getElementById('faq-question').value = faq.question;
        document.getElementById('faq-answer').value = faq.answer;
        document.getElementById('faq-column').value = faq.column || 'left';
        document.getElementById('faq-status').value = faq.status || 'published';
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit FAQ';

        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeFaqModal() {
        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function handleFaqSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('faq-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

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
                if (typeof showToast === 'function') showToast(id ? 'FAQ updated in database!' : 'FAQ added to database!');
                closeFaqModal();
                fetchFaqs();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving FAQ', 'error');
            }
        } catch (err) {
            console.error('Error saving FAQ:', err);
            if (typeof showToast === 'function') showToast('Server error saving FAQ', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save FAQ';
            }
        }
    }

    function promptDeleteFaq(id) {
        document.getElementById('delete-faq-id').value = id;
        const modal = document.getElementById('delete-faq-modal');
        const card = document.getElementById('delete-faq-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteFaqModal() {
        const modal = document.getElementById('delete-faq-modal');
        const card = document.getElementById('delete-faq-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function confirmDeleteFaq() {
        const id = document.getElementById('delete-faq-id').value;
        if (!id) return;

        try {
            const res = await fetch(`/api/faqs/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('FAQ deleted from database!');
                closeDeleteFaqModal();
                fetchFaqs();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error deleting FAQ', 'error');
            }
        } catch (err) {
            console.error('Error deleting FAQ:', err);
            if (typeof showToast === 'function') showToast('Server error deleting FAQ', 'error');
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchGalleryItems();
        fetchFacilitiesItems();
        fetchUnitItems();
        fetchAvailabilityImage();
        fetchFaqs();
    });
</script>
@endpush
