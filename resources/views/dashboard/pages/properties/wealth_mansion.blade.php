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
            <p class="text-sm text-slate-500 mt-1">Manage hero banner, discover carousel images upload, text assets, and live previews.</p>
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
        {{-- Gallery Management Table & Toolbar --}}
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
                    <button type="button" onclick="openCreateGalleryModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Upload New Image</span>
                    </button>
                </div>
            </div>

            {{-- Grid of Gallery Items --}}
            <div class="mt-6">
                <div id="gallery-cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    {{-- Dynamically populated --}}
                </div>

                {{-- Empty state --}}
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

        {{-- Live Frontend Preview Card for Discover Carousel --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Discover Carousel Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Exact representation of the frontend carousel</span>
            </div>

            <div class="mt-6 bg-[#f8fafc] rounded-xl p-6 sm:p-10 border border-slate-200">
                <div class="max-w-[1400px] mx-auto">
                    <div class="mb-6">
                        <h2 class="text-[#2A5A8A] text-2xl font-bold">
                            <span class="font-normal block text-xl">Discover</span>
                            <span>Wealth Mansion</span>
                        </h2>
                    </div>

                    <div id="live-carousel-track" class="flex flex-row flex-nowrap items-start gap-4 overflow-x-auto pb-4 scroll-smooth [scrollbar-width:none]">
                        {{-- Populated in real-time --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL: Create / Edit Gallery Image --}}
<div id="gallery-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="gallery-modal-card" class="bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-all duration-200">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div>
                <h3 class="text-base font-bold text-[#163049]" id="gallery-modal-title">Upload Gallery Image</h3>
                <p class="text-xs text-slate-500 mt-0.5">Add high-resolution project view or interior photo.</p>
            </div>
            <button type="button" onclick="closeGalleryModal()" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form onsubmit="handleGalleryFormSubmit(event)" id="gallery-form" class="p-6 space-y-4">
            <input type="hidden" id="gallery-edit-id" value="">

            {{-- Image Preview & Upload --}}
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

            {{-- Title / Caption --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Title / Caption</label>
                <input type="text" id="gallery-title-input" required placeholder="e.g. Wealth Mansion Skyline View" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            {{-- Alt Text --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Alt Text (SEO)</label>
                <input type="text" id="gallery-alt-input" placeholder="e.g. Wealth Mansion luxury residential tower" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Sort Order --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Sort Order</label>
                    <input type="number" id="gallery-order-input" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                {{-- Status --}}
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

{{-- MODAL: Delete Gallery Image Confirmation --}}
<div id="gallery-delete-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="gallery-delete-card" class="bg-white w-full max-w-sm rounded-2xl shadow-2xl border border-slate-100 p-6 text-center transform scale-95 transition-all duration-200">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete Gallery Image?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this image from the carousel? This action cannot be undone.</p>
        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteGalleryModal()" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                Cancel
            </button>
            <button type="button" onclick="confirmDeleteGalleryItem()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs shadow-sm transition-all">
                Yes, Delete
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'properties-wealth-mansion';
    const galleryPageSlug = 'wealth-mansion';

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
    // HERO SECTION SCRIPTS (100% SAME AS ABOUT US)
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

    let heroBulletsData = [
        '30% available'
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
    // DISCOVER WEALTH MANSION (GALLERY UPLOAD)
    // ==========================================
    let galleryItemsData = [];
    let galleryItemToDeleteId = null;

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
                renderLiveCarousel();
            }
        } catch (err) {
            console.error('Error fetching gallery items:', err);
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
                            <button type="button" onclick="openEditGalleryModal(${item.id})" class="px-2.5 py-1 text-xs font-semibold text-[#2A5A8A] hover:bg-[#2A5A8A]/10 rounded transition-colors flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                                <span>Edit</span>
                            </button>
                            <button type="button" onclick="promptDeleteGalleryItem(${item.id})" class="px-2 py-1 text-xs font-semibold text-rose-500 hover:bg-rose-50 rounded transition-colors cursor-pointer" title="Delete image">
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

    function renderLiveCarousel() {
        const track = document.getElementById('live-carousel-track');
        if (!track) return;

        if (!galleryItemsData.length) {
            track.innerHTML = '<p class="text-xs text-slate-400 py-4">No images in carousel.</p>';
            return;
        }

        track.innerHTML = galleryItemsData.map((item, idx) => `
            <div class="${idx === 0 ? 'w-[280px] h-[240px]' : 'w-[180px] h-[180px]'} shrink-0 bg-slate-900 rounded-none overflow-hidden relative border border-slate-300 shadow-sm transition-all">
                <img src="${formatImageUrl(item.image)}" class="w-full h-full min-w-full min-h-full object-fill">
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-2 text-[10px] text-white font-medium line-clamp-1">
                    ${escapeHtml(item.title || 'Wealth Mansion')}
                </div>
            </div>
        `).join('');
    }

    function openCreateGalleryModal() {
        document.getElementById('gallery-modal-title').innerText = 'Upload Gallery Image';
        document.getElementById('gallery-edit-id').value = '';
        document.getElementById('gallery-title-input').value = '';
        document.getElementById('gallery-alt-input').value = '';
        document.getElementById('gallery-order-input').value = (galleryItemsData.length + 1);
        document.getElementById('gallery-status-input').value = 'published';
        document.getElementById('modal-img-preview').src = '{{ asset("services/wealth_mansion/discovered/wealth-mainson-recovered4.png") }}';
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

    function openEditGalleryModal(id) {
        const item = galleryItemsData.find(g => g.id === id);
        if (!item) return;

        document.getElementById('gallery-modal-title').innerText = 'Edit Gallery Image';
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
        const saveBtn = document.getElementById('gallery-save-btn');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerText = 'Saving...';
        }

        try {
            const formData = new FormData();
            formData.append('page', galleryPageSlug);
            formData.append('title', document.getElementById('gallery-title-input').value);
            formData.append('alt_text', document.getElementById('gallery-alt-input').value);
            formData.append('sort_order', document.getElementById('gallery-order-input').value);
            formData.append('status', document.getElementById('gallery-status-input').value);

            const fileInput = document.getElementById('gallery-file-input');
            if (fileInput && fileInput.files[0]) {
                formData.append('image_file', fileInput.files[0]);
            }

            let endpoint = `/api/project-galleries/${galleryPageSlug}`;
            if (editId) {
                endpoint = `/api/project-galleries/update/${editId}`;
            }

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
                if (typeof showToast === 'function') showToast(data.message || 'Gallery image saved live!');
                closeGalleryModal();
                fetchGalleryItems();
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

    function promptDeleteGalleryItem(id) {
        galleryItemToDeleteId = id;
        const modal = document.getElementById('gallery-delete-modal');
        const card = document.getElementById('gallery-delete-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteGalleryModal() {
        galleryItemToDeleteId = null;
        const modal = document.getElementById('gallery-delete-modal');
        const card = document.getElementById('gallery-delete-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }

    async function confirmDeleteGalleryItem() {
        if (!galleryItemToDeleteId) return;
        const id = galleryItemToDeleteId;

        try {
            const res = await fetch(`/api/project-galleries/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Gallery image removed successfully!');
                closeDeleteGalleryModal();
                fetchGalleryItems();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error deleting image', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to delete image', 'error');
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchGalleryItems();
    });
</script>
@endpush
