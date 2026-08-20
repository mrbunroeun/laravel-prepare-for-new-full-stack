@extends('dashboard.layout')

@section('title', $pageTitle . ' - Content Management')

@section('content')
<div class="space-y-6">
    {{-- Header Banner --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border border-slate-200/90 rounded-xl p-5 sm:p-6 shadow-xs">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span>Services</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9] font-bold">{{ $pageTitle }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">{{ $pageTitle }} Content Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage hero banner, tagline, headline, CTA buttons, and page sections.</p>
        </div>
    </div>

    {{-- Tabs Navigation with Left/Right Arrow Scroll Buttons --}}
    <div class="relative flex items-center border-b border-slate-200 group py-1">
        {{-- Left Scroll Button --}}
        <button type="button" onclick="scrollServiceTabsBar(-1)" id="service-tabs-scroll-prev" aria-label="Scroll tabs left" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all mr-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        {{-- Tabs Track Container (Strict 1 Line, No Wrap, Smooth Scroll) --}}
        <div id="service-tabs-nav-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            <button type="button" onclick="switchServiceTab('hero', event)" id="service-tab-btn-hero" class="service-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            <button type="button" onclick="switchServiceTab('maximize', event)" id="service-tab-btn-maximize" class="service-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span class="whitespace-nowrap">
                    @if($pageSlug === 'property-management')
                        Maximize Your Property
                    @elseif($pageSlug === 'property-sales')
                        Professional Property Sales
                    @elseif($pageSlug === 'property-leasing')
                        Find Professionally Managed
                    @elseif($pageSlug === 'hospitality-services')
                        Comfortable Stays Showcase
                    @else
                        Showcase Section
                    @endif
                </span>
            </button>

            @if($pageSlug === 'property-management')
            <button type="button" onclick="switchServiceTab('overview', event)" id="service-tab-btn-overview" class="service-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">What is Property Management?</span>
            </button>

            <button type="button" onclick="switchServiceTab('models', event)" id="service-tab-btn-models" class="service-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span class="whitespace-nowrap">Our Management Models</span>
            </button>
            @endif

            @if($pageSlug === 'property-sales')
            <button type="button" onclick="switchServiceTab('properties', event)" id="service-tab-btn-properties" class="service-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span class="whitespace-nowrap">Featured Properties</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full" id="tab-badge-properties-count">...</span>
            </button>
            @endif

            <button type="button" onclick="switchServiceTab('faqs', event)" id="service-tab-btn-faqs" class="service-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Frequently Asked Questions</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full" id="tab-badge-faq-count">...</span>
            </button>
        </div>

        {{-- Right Scroll Button --}}
        <button type="button" onclick="scrollServiceTabsBar(1)" id="service-tabs-scroll-next" aria-label="Scroll tabs right" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all ml-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO SECTION --}}
    {{-- ========================================================================= --}}
    <div id="service-tab-content-hero" class="service-tab-content space-y-6">
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

                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all !text-slate-900 [&&_*]:!text-slate-900" style="color: #0f172a !important;"><b>Property</b> Management</div>
                </div>

                {{-- Main Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline (H1)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Headline Title</label>
                        <textarea id="hero-headline-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]"></textarea>
                    </div>
                </div>

                {{-- Bullet Highlights List --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights List</h3>
                            <p class="text-xs text-slate-500">Add, edit, or remove highlights (e.g. • Flexible income • Strong brand • Real projects • Full sales support)</p>
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
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('{{ asset('hero_section/hero_section.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[650px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-bold text-[#F4DEAC]">
                                <span class="font-bold text-[#F4DEAC]">Property</span>
                                <span class="font-normal text-[#F4DEAC] ml-1">Management</span>
                            </span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-4">
                            Professional Property Management Services in Cambodia
                        </h1>

                        <div id="preview-hero-bullets" class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-white/80 font-medium mb-6">
                            {{-- Bullets populated dynamically --}}
                        </div>

                        <div id="preview-hero-buttons" class="flex items-center gap-3 flex-wrap">
                            <span class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-4 py-2">Browse Properties</span>
                            <span class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-4 py-2">Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 2: SHOWCASE / MAXIMIZE SECTION                                        --}}
    {{-- ========================================================================= --}}
    <div id="service-tab-content-maximize" class="service-tab-content space-y-6 hidden">
        <form onsubmit="handleMaximizeSubmit(event)" class="space-y-6" id="maximize-form">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">
                        @if($pageSlug === 'property-management')
                            Maximize Your Property Section
                        @elseif($pageSlug === 'property-sales')
                            Professional Property Sales Section
                        @elseif($pageSlug === 'property-leasing')
                            Find Professionally Managed Section
                        @elseif($pageSlug === 'hospitality-services')
                            Comfortable Stays Showcase Section
                        @else
                            Showcase Section
                        @endif
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the heading title, section showcase image, and body paragraphs.</p>
                </div>

                {{-- 1. Section Title --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Section Title (H2)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Heading Title</label>
                        <input type="text" id="maximize-title-input" oninput="updateMaximizePreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 font-semibold focus:outline-none focus:border-[#2A5A8A]" value="Maximize Your Property Investment with Professional Management">
                    </div>
                </div>

                {{-- 2. Section Image --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Section Image</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start max-w-[850px]">
                        {{-- Image Card --}}
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs flex flex-col justify-between">
                            <div class="w-full h-[220px] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 mb-3 group">
                                <img id="maximize-image-preview-thumb" src="{{ asset('services/maximmize/maximize.png') }}" class="w-full h-full object-cover object-center">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1.5">Upload New Image</label>
                                <input type="file" id="maximize-image-file" accept="image/*" onchange="previewMaximizeLocalImage(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                            </div>
                        </div>

                        {{-- Alt Text & SEO --}}
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs space-y-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">Image Details & SEO</label>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Alt Text (Accessibility & SEO)</label>
                                <input type="text" id="maximize-alt-input" oninput="updateMaximizePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="Phnom Penh skyline">
                            </div>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                Upload a landscape photo for this section. The image automatically preserves its proportions and stays in the exact 350px display container.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- 3. Body Paragraphs --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Body Paragraphs</h3>
                            <p class="text-xs text-slate-500">Add, edit, or reorder paragraphs under the image.</p>
                        </div>
                        <button type="button" onclick="addMaximizeParagraph()" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Add Paragraph</span>
                        </button>
                    </div>

                    <div id="maximize-paragraphs-container" class="space-y-4">
                        {{-- Populated via JS --}}
                    </div>
                </div>

                {{-- Single Save Button at Bottom --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" id="maximize-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Maximize Section
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Maximize Section Simulation --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#c9a463]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Section Preview Simulation</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview matching exact frontend layout & image proportion</span>
            </div>

            <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-6 sm:p-10">
                <div class="max-w-[1200px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-start">
                    {{-- LEFT: gold line + heading --}}
                    <div class="flex flex-row">
                        <div class="h-[2px] w-full bg-[#c9a463] mr-6 mt-4"></div>
                        <h2 id="preview-maximize-title" class="text-[#2A5A8A] text-[24px] sm:text-[30px] font-normal leading-tight">
                            Maximize Your Property Investment with Professional Management
                        </h2>
                    </div>

                    {{-- RIGHT: image + body text --}}
                    <div class="flex flex-col gap-6">
                        <img id="preview-maximize-img" src="{{ asset('services/maximmize/maximize.png') }}" alt="Preview Image" class="w-full h-[300px] sm:h-[350px] object-cover rounded shadow-sm border border-slate-200">

                        <div id="preview-maximize-paragraphs" class="flex flex-col gap-3">
                            {{-- Populated via JS --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($pageSlug === 'property-management')
    {{-- ========================================================================= --}}
    {{-- TAB 3: WHAT IS PROPERTY MANAGEMENT? --}}
    {{-- ========================================================================= --}}
    <div id="service-tab-content-overview" class="service-tab-content space-y-6 hidden">
        <form onsubmit="handleOverviewSubmit(event)" class="space-y-6" id="overview-form">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">What is Property Management? Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the section showcase image, title lines, and description.</p>
                </div>

                {{-- 1. Section Image --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Section Tall Image</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start max-w-[850px]">
                        {{-- Image Card --}}
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs flex flex-col justify-between">
                            <div class="w-full h-[260px] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 mb-3 group">
                                <img id="overview-image-preview-thumb" src="{{ asset('services/bg_img/bg_img.png') }}" class="w-full h-full object-fill object-center">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1.5">Upload New Image</label>
                                <input type="file" id="overview-image-file" accept="image/*" onchange="previewOverviewLocalImage(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                            </div>
                        </div>

                        {{-- Alt Text & SEO --}}
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs space-y-3">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">Image Details & SEO</label>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Alt Text (Accessibility & SEO)</label>
                                <input type="text" id="overview-alt-input" oninput="updateOverviewPreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="What is Property Management?">
                            </div>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                Upload a tall vertical/portrait image for this section. The image automatically stretches or shrinks to fill the entire container.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- 2. Section Heading Title --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Section Heading Title (3 Lines)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Line 1 (Normal Text)</label>
                            <input type="text" id="overview-title1-input" oninput="updateOverviewPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="What is">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Line 2 (Bold Gold)</label>
                            <input type="text" id="overview-title2-input" oninput="updateOverviewPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]" value="Property">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Line 3 (Bold Gold)</label>
                            <input type="text" id="overview-title3-input" oninput="updateOverviewPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]" value="Management?">
                        </div>
                    </div>
                </div>

                {{-- 3. Section Description --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Description Paragraph</h3>
                    <div>
                        <textarea id="overview-description-input" rows="4" oninput="updateOverviewPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">Property management is the professional administration of residential properties on behalf of owners. Our team oversees daily operations, tenant coordination, maintenance scheduling, rental administration, financial reporting, and hospitality services to ensure your property performs efficiently and remains well maintained.</textarea>
                    </div>
                </div>

                {{-- Single Save Button at Bottom --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" id="overview-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Section
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Section Simulation --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Section Preview Simulation</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview matching exact frontend layout</span>
            </div>

            <div class="mt-6 bg-slate-100 border border-slate-200 rounded-xl p-6 overflow-hidden">
                <div class="max-w-[1100px] mx-auto flex flex-col md:flex-row items-stretch gap-6">
                    {{-- LEFT: Property Image --}}
                    <div class="w-full md:w-[40%] h-[320px] rounded-lg overflow-hidden shadow-md">
                        <img id="preview-overview-img" src="{{ asset('services/bg_img/bg_img.png') }}" alt="Preview" class="w-full h-full object-fill">
                    </div>

                    {{-- RIGHT: Blue Card --}}
                    <div class="w-full md:w-[60%] flex flex-col justify-center">
                        <div class="h-[8px] w-[50%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                        <div class="bg-[#2A5A8A] p-6 sm:p-8 text-white rounded-b-lg md:rounded-none">
                            <h2 class="text-[22px] sm:text-[28px] leading-tight mb-3">
                                <span id="preview-overview-t1" class="text-[#F4DEAC] font-normal block">What is</span>
                                <span id="preview-overview-t2" class="text-[#F4DEAC] font-bold block">Property</span>
                                <span id="preview-overview-t3" class="text-[#F4DEAC] font-bold block">Management?</span>
                            </h2>
                            <p id="preview-overview-desc" class="text-white text-xs sm:text-sm leading-relaxed">
                                Property management is the professional administration of residential properties on behalf of owners.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 4: OUR MANAGEMENT MODELS --}}
    {{-- ========================================================================= --}}
    <div id="service-tab-content-models" class="service-tab-content space-y-6 hidden">
        <form onsubmit="handleModelsSubmit(event)" class="space-y-6" id="models-form">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Our Management Models Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the heading title lines, and add/edit the model cards with images and descriptions.</p>
                </div>

                {{-- 1. Section Heading Title --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Section Heading Title (3 Lines)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Line 1 (Normal)</label>
                            <input type="text" id="models-title1-input" oninput="updateModelsPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="Our">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Line 2 (Normal)</label>
                            <input type="text" id="models-title2-input" oninput="updateModelsPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="Management">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Line 3 (Bold)</label>
                            <input type="text" id="models-title3-input" oninput="updateModelsPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]" value="Models">
                        </div>
                    </div>
                </div>

                {{-- 2. Management Models Cards --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Management Model Cards</h3>
                            <p class="text-xs text-slate-500">Configure images, titles, and descriptions for each model.</p>
                        </div>
                        <button type="button" onclick="addManagementModel()" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Add Model Card</span>
                        </button>
                    </div>

                    <div id="management-models-container" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Populated via JS --}}
                    </div>
                </div>

                {{-- Single Save Button at Bottom --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" id="models-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Management Models
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Section Simulation --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Models Preview Simulation</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview matching exact frontend layout & stretch/shrink fill image rule</span>
            </div>

            <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-6 sm:p-10">
                <div class="max-w-[1200px] mx-auto">
                    {{-- Heading --}}
                    <div class="mb-8">
                        <h2 class="text-[#2A5A8A] text-[26px] sm:text-[32px] leading-tight">
                            <span id="preview-models-t1" class="font-normal block">Our</span>
                            <span id="preview-models-t2" class="font-normal block">Management</span>
                            <span id="preview-models-t3" class="font-bold block">Models</span>
                        </h2>
                    </div>

                    {{-- Cards Grid --}}
                    <div id="preview-models-cards" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        {{-- Populated via JS --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($pageSlug === 'property-sales')
    {{-- ========================================================================= --}}
    {{-- TAB: FEATURED PROPERTIES (GRADE A, B, C MANAGEMENT)                       --}}
    {{-- ========================================================================= --}}
    <div id="service-tab-content-properties" class="service-tab-content hidden space-y-6">
        {{-- Database Properties Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Featured Properties</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#1479B9]/10 text-[#1479B9] font-semibold">Grade A, B, C Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage property cards for each Grade. If all properties in a grade are deleted, frontend automatically displays a clean <strong>"Coming Soon"</strong> box.</p>
                </div>
                <button onclick="openServicePropertyModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs sm:text-sm font-bold shadow-sm transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add New Property</span>
                </button>
            </div>

            {{-- Grade Sub-Filter Tabs --}}
            <div class="flex items-center gap-2 my-4 border-b border-slate-100 pb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-2">Filter Grade:</span>
                <button type="button" onclick="setServicePropertyGrade('A')" id="btn-prop-grade-A" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all cursor-pointer bg-[#2A5A8A] text-white shadow-xs">
                    Grade A <span id="count-badge-grade-A" class="ml-1 px-1.5 py-0.2 rounded-full bg-white/20 text-white text-[10px]">0</span>
                </button>
                <button type="button" onclick="setServicePropertyGrade('B')" id="btn-prop-grade-B" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all cursor-pointer bg-slate-100 text-slate-600 hover:bg-slate-200">
                    Grade B <span id="count-badge-grade-B" class="ml-1 px-1.5 py-0.2 rounded-full bg-slate-200 text-slate-700 text-[10px]">0</span>
                </button>
                <button type="button" onclick="setServicePropertyGrade('C')" id="btn-prop-grade-C" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all cursor-pointer bg-slate-100 text-slate-600 hover:bg-slate-200">
                    Grade C <span id="count-badge-grade-C" class="ml-1 px-1.5 py-0.2 rounded-full bg-slate-200 text-slate-700 text-[10px]">0</span>
                </button>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-[11px] uppercase tracking-wider text-[#2A5A8A] font-bold border-b border-slate-200">
                        <tr>
                            <th class="py-3.5 px-4 w-12 text-center">#</th>
                            <th class="py-3.5 px-4 w-20 text-center">Image</th>
                            <th class="py-3.5 px-4">Title & Subtitle</th>
                            <th class="py-3.5 px-4">Description</th>
                            <th class="py-3.5 px-4 text-center">Grade</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="service-property-table-body" class="divide-y divide-slate-100">
                        {{-- Populated by JS --}}
                    </tbody>
                </table>

                <div id="service-property-empty-state" class="hidden py-12 text-center">
                    <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-700">No properties found in this grade</p>
                    <p class="text-xs text-slate-400 mt-1">Frontend will display the <strong>"Coming Soon"</strong> badge for this grade.</p>
                </div>
            </div>
        </div>

        {{-- Live Featured Properties Carousel Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Section Preview (<span id="preview-active-grade-label">Grade A</span>)</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview matching exact frontend slider layout</span>
            </div>

            <div class="relative bg-slate-900 rounded-xl overflow-hidden p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-right opacity-30" style="background-image: url('{{ asset('home/feature_properties/feature_properties.png') }}');"></div>
                <div class="relative z-10">
                    <h2 class="text-[#F4DEAC] text-xl sm:text-2xl font-bold mb-6">
                        <span class="font-normal block">Featured</span>
                        <span class="block">Properties (<span id="preview-active-grade-title">Grade A</span>)</span>
                    </h2>

                    {{-- Horizontal scroll container --}}
                    <div id="service-live-property-track" class="flex gap-4 overflow-x-auto pb-4 pt-1 [scrollbar-width:thin]">
                        {{-- Rendered dynamically via JS --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- ========================================================================= --}}
    {{-- TAB 5: FREQUENTLY ASKED QUESTIONS (100% HOMEPAGE UX/UI FORMULA)          --}}
    {{-- ========================================================================= --}}
    <div id="service-tab-content-faqs" class="service-tab-content hidden space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Database Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for {{ $pageTitle }}.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="openCreateFaqModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
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
            
            <div class="mt-6 bg-[#e5e4e4] rounded-xl px-4 sm:px-10 py-10 sm:py-14 text-slate-900 shadow-inner">
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
                <input type="text" id="faq-question" required placeholder="e.g. What types of properties do you manage?" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
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

{{-- MODAL: CREATE / EDIT SERVICE PROPERTY --}}
<div id="service-property-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-lg rounded-xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="service-property-modal-card">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
            <h3 class="text-base font-bold text-white flex items-center gap-2" id="service-property-modal-title">
                <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                Add New Property
            </h3>
            <button onclick="closeServicePropertyModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="service-property-form" onsubmit="handleServicePropertySubmit(event)" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
            <input type="hidden" id="sprop-id" value="">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Target Grade <span class="text-rose-500">*</span></label>
                    <select id="sprop-grade" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]">
                        <option value="A">Grade A</option>
                        <option value="B">Grade B</option>
                        <option value="C">Grade C</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status Badge <span class="text-rose-500">*</span></label>
                    <input type="text" id="sprop-status" required placeholder="e.g. 30% Available or Coming Soon" value="30% Available" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Property Title <span class="text-rose-500">*</span></label>
                <input type="text" id="sprop-title" required placeholder="e.g. Wealth Mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Subtitle / Development Type</label>
                <input type="text" id="sprop-subtitle" placeholder="e.g. Premium Condominium Residences" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Description <span class="text-rose-500">*</span></label>
                <textarea id="sprop-description" required rows="3" placeholder="Enter concise property highlights..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Property Image</label>
                <input type="file" id="sprop-image-file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                <input type="hidden" id="sprop-image-url" value="home/latest_activities/1img.png">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Page Link URL <span class="text-rose-500">*</span></label>
                    <input type="text" id="sprop-link" required value="/services/properties/wealth-mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Button Text</label>
                    <input type="text" id="sprop-link-text" value="View Project" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Publish Status</label>
                    <select id="sprop-publish-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Sort Order</label>
                    <input type="number" id="sprop-sort-order" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closeServicePropertyModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="sprop-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save Property
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: DELETE SERVICE PROPERTY CONFIRMATION --}}
<div id="delete-service-property-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-service-property-modal-card">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete Property?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this property from the Grade set?</p>

        <input type="hidden" id="delete-service-property-id">

        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteServicePropertyModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                Cancel
            </button>
            <button type="button" onclick="confirmDeleteServiceProperty()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                Yes, Delete
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = '{{ $pageSlug }}';

    const availableRoutes = [
        { label: 'Home (/)', url: '/' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' },
        { label: 'Insights & News (/insights)', url: '/insights' },
        { label: 'Events (/events)', url: '/events' },
        { label: 'Partners (/partner)', url: '/partner' }
    ];

    let heroBulletsData = [
        'Flexible income',
        'Strong brand',
        'Real projects',
        'Full sales support'
    ];

    let heroButtonsData = [
        { text: 'Browse Properties', url: '/properties' },
        { text: 'Contact Us', url: '/contact-us' }
    ];

    // Maximize section state
    let maximizeParagraphsData = [
        'Managing a rental property requires time, expertise, and consistent attention to detail. CWD Realty & Hospitality provides comprehensive property management services that help condominium owners protect their investments, increase occupancy, and deliver exceptional experiences for tenants and guests.',
        'Whether your property is intended for daily, weekly, monthly, or long-term rentals, our experienced team manages every aspect of the operation so you can enjoy peace of mind and reliable returns.'
    ];
    let maximizeCurrentImgUrl = '{{ asset('services/maximmize/maximize.png') }}';
    let maximizeSelectedFile = null;

    // Overview section state
    let overviewCurrentImgUrl = '{{ asset('services/bg_img/bg_img.png') }}';
    let overviewSelectedFile = null;

    // Management Models section state
    let managementModelsData = [
        {
            title: 'Revenue Sharing',
            image: 'services/propertis_leasing/bedroom.png',
            alt_text: 'Revenue Sharing Model',
            description: 'Suitable for short-term rentals. Property owners receive rental income while CWD Realty & Hospitality manages daily operations based on an agreed 10% management fee.'
        },
        {
            title: 'Long-Term Leasing Management',
            image: 'services/maximmize/maximize.png',
            alt_text: 'Long-Term Leasing Management Model',
            description: 'For long-term rental properties, we provide exclusive leasing management, tenant administration, and operational support while owners receive regular $400 monthly rental income and extra 5% if the daily renting exceed $400 according to the management agreement.'
        }
    ];
    let modelSelectedFiles = {};

    // FAQ section state
    let faqsData = [];

    // Service Featured Properties state
    let servicePropertiesData = [];
    let activePropertyGrade = 'A';

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchMaximizeSection();
        fetchFaqs();
        if (pageSlug === 'property-management') {
            fetchOverviewSection();
            fetchManagementModels();
        }
        if (pageSlug === 'property-sales') {
            fetchServiceProperties();
        }
    });

    function scrollServiceTabsBar(direction) {
        const track = document.getElementById('service-tabs-nav-track');
        if (track) {
            track.scrollBy({ left: direction * 250, behavior: 'smooth' });
        }
    }

    function switchServiceTab(tabName, evt) {
        if (evt) evt.preventDefault();
        document.querySelectorAll('.service-tab-btn').forEach(btn => {
            btn.classList.remove('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
            btn.classList.add('text-slate-500', 'border-transparent', 'font-medium');
        });
        const activeBtn = document.getElementById(`service-tab-btn-${tabName}`);
        if (activeBtn) {
            activeBtn.classList.remove('text-slate-500', 'border-transparent', 'font-medium');
            activeBtn.classList.add('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
        }

        document.querySelectorAll('.service-tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        const targetContent = document.getElementById(`service-tab-content-${tabName}`);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }
    }

    // ==========================================
    // HERO LOGIC
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
        if (heroBulletsData.length >= 3) {
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
                <a href="javascript:void(0)" class="border-[2px] border-[#F4DEAC] text-white text-[12px] font-medium px-4 py-2 hover:bg-[#ffffff] hover:text-[#000000] transition-colors">
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
                if (typeof showToast === 'function') showToast(data.message || 'Hero section saved successfully!');
                updateHeroPreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving hero section', 'error');
            }
        } catch (err) {
            console.error('Save failed:', err);
            if (typeof showToast === 'function') showToast('Server error while saving hero section', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    // ==========================================
    // MAXIMIZE SECTION LOGIC
    // ==========================================
    async function fetchMaximizeSection() {
        try {
            const res = await fetch(`/api/service-maximize/${pageSlug}`);
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                if (data.title) {
                    document.getElementById('maximize-title-input').value = data.title;
                }
                if (data.alt_text) {
                    document.getElementById('maximize-alt-input').value = data.alt_text;
                }
                if (data.image) {
                    let fullImg = data.image;
                    if (!fullImg.startsWith('http') && !fullImg.startsWith('/')) {
                        fullImg = `/${fullImg}`;
                    }
                    maximizeCurrentImgUrl = fullImg;
                    const thumb = document.getElementById('maximize-image-preview-thumb');
                    if (thumb) thumb.src = maximizeCurrentImgUrl;
                    const prevImg = document.getElementById('preview-maximize-img');
                    if (prevImg) prevImg.src = maximizeCurrentImgUrl;
                }
                if (Array.isArray(data.paragraphs) && data.paragraphs.length > 0) {
                    maximizeParagraphsData = data.paragraphs;
                }
                renderMaximizeParagraphs();
                updateMaximizePreview();
            }
        } catch (err) {
            console.error('Error fetching maximize section:', err);
        }
    }

    function renderMaximizeParagraphs() {
        const container = document.getElementById('maximize-paragraphs-container');
        if (!container) return;

        container.innerHTML = maximizeParagraphsData.map((p, idx) => `
            <div class="p-4 bg-white border border-slate-200 rounded-lg shadow-2xs space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-[#2A5A8A]">Paragraph ${idx + 1}</span>
                    <div class="flex items-center gap-1">
                        <button type="button" onclick="moveMaximizeParagraph(${idx}, -1)" ${idx === 0 ? 'disabled' : ''} class="p-1 rounded hover:bg-slate-100 text-slate-500 disabled:opacity-30 disabled:cursor-not-allowed cursor-pointer" title="Move Up">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                        </button>
                        <button type="button" onclick="moveMaximizeParagraph(${idx}, 1)" ${idx === maximizeParagraphsData.length - 1 ? 'disabled' : ''} class="p-1 rounded hover:bg-slate-100 text-slate-500 disabled:opacity-30 disabled:cursor-not-allowed cursor-pointer" title="Move Down">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <button type="button" onclick="removeMaximizeParagraph(${idx})" ${maximizeParagraphsData.length <= 1 ? 'disabled' : ''} class="p-1 rounded hover:bg-rose-50 text-slate-400 hover:text-rose-600 disabled:opacity-30 disabled:cursor-not-allowed cursor-pointer" title="Delete Paragraph">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>
                <textarea rows="3" oninput="updateMaximizeParagraphText(${idx}, this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">${escapeHtml(p)}</textarea>
            </div>
        `).join('');

        updateMaximizePreview();
    }

    function addMaximizeParagraph() {
        maximizeParagraphsData.push('New paragraph describing professional property management services and returns.');
        renderMaximizeParagraphs();
    }

    function removeMaximizeParagraph(idx) {
        if (maximizeParagraphsData.length <= 1) return;
        maximizeParagraphsData.splice(idx, 1);
        renderMaximizeParagraphs();
    }

    function moveMaximizeParagraph(idx, dir) {
        const newIdx = idx + dir;
        if (newIdx < 0 || newIdx >= maximizeParagraphsData.length) return;
        const temp = maximizeParagraphsData[idx];
        maximizeParagraphsData[idx] = maximizeParagraphsData[newIdx];
        maximizeParagraphsData[newIdx] = temp;
        renderMaximizeParagraphs();
    }

    function updateMaximizeParagraphText(idx, val) {
        maximizeParagraphsData[idx] = val;
        updateMaximizePreview();
    }

    function previewMaximizeLocalImage(input) {
        if (!input.files || !input.files[0]) return;
        const file = input.files[0];
        maximizeSelectedFile = file;

        const reader = new FileReader();
        reader.onload = function(evt) {
            const dataUrl = evt.target.result;
            const thumb = document.getElementById('maximize-image-preview-thumb');
            if (thumb) thumb.src = dataUrl;
            const prevImg = document.getElementById('preview-maximize-img');
            if (prevImg) prevImg.src = dataUrl;
        };
        reader.readAsDataURL(file);
    }

    function updateMaximizePreview() {
        const title = document.getElementById('maximize-title-input')?.value || '';
        const prevTitle = document.getElementById('preview-maximize-title');
        if (prevTitle) prevTitle.innerText = title;

        const prevParas = document.getElementById('preview-maximize-paragraphs');
        if (prevParas) {
            prevParas.innerHTML = maximizeParagraphsData.map(p => `
                <p class="text-black text-[13px] leading-relaxed">${escapeHtml(p)}</p>
            `).join('');
        }
    }

    async function handleMaximizeSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('maximize-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving Section...';
        }

        try {
            const formData = new FormData();
            formData.append('title', document.getElementById('maximize-title-input').value);
            formData.append('alt_text', document.getElementById('maximize-alt-input').value);
            maximizeParagraphsData.forEach((p, idx) => {
                formData.append(`paragraphs[${idx}]`, p);
            });

            if (maximizeSelectedFile) {
                formData.append('image_file', maximizeSelectedFile);
            }

            const res = await fetch(`/api/service-maximize/${pageSlug}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Maximize Section saved live!');
                if (data.data && data.data.image) {
                    let fullImg = data.data.image;
                    if (!fullImg.startsWith('http') && !fullImg.startsWith('/')) {
                        fullImg = `/${fullImg}`;
                    }
                    maximizeCurrentImgUrl = fullImg;
                }
                updateMaximizePreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving section', 'error');
            }
        } catch (err) {
            console.error('Save failed:', err);
            if (typeof showToast === 'function') showToast('Server error while saving section', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Maximize Section';
            }
        }
    }

    // ==========================================
    // OVERVIEW SECTION LOGIC (WHAT IS PROPERTY MANAGEMENT)
    // ==========================================
    async function fetchOverviewSection() {
        try {
            const res = await fetch(`/api/service-overview/${pageSlug}`);
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                if (data.title_line1) document.getElementById('overview-title1-input').value = data.title_line1;
                if (data.title_line2) document.getElementById('overview-title2-input').value = data.title_line2;
                if (data.title_line3) document.getElementById('overview-title3-input').value = data.title_line3;
                if (data.description) document.getElementById('overview-description-input').value = data.description;
                if (data.alt_text) document.getElementById('overview-alt-input').value = data.alt_text;
                if (data.image) {
                    let fullImg = data.image;
                    if (!fullImg.startsWith('http') && !fullImg.startsWith('/')) {
                        fullImg = `/${fullImg}`;
                    }
                    overviewCurrentImgUrl = fullImg;
                    const thumb = document.getElementById('overview-image-preview-thumb');
                    if (thumb) thumb.src = overviewCurrentImgUrl;
                    const prevImg = document.getElementById('preview-overview-img');
                    if (prevImg) prevImg.src = overviewCurrentImgUrl;
                }
                updateOverviewPreview();
            }
        } catch (err) {
            console.error('Error fetching overview section:', err);
        }
    }

    function previewOverviewLocalImage(input) {
        if (!input.files || !input.files[0]) return;
        const file = input.files[0];
        overviewSelectedFile = file;

        const reader = new FileReader();
        reader.onload = function(evt) {
            const dataUrl = evt.target.result;
            const thumb = document.getElementById('overview-image-preview-thumb');
            if (thumb) thumb.src = dataUrl;
            const prevImg = document.getElementById('preview-overview-img');
            if (prevImg) prevImg.src = dataUrl;
        };
        reader.readAsDataURL(file);
    }

    function updateOverviewPreview() {
        const t1 = document.getElementById('overview-title1-input')?.value || 'What is';
        const t2 = document.getElementById('overview-title2-input')?.value || 'Property';
        const t3 = document.getElementById('overview-title3-input')?.value || 'Management?';
        const desc = document.getElementById('overview-description-input')?.value || '';

        const prevT1 = document.getElementById('preview-overview-t1');
        if (prevT1) prevT1.innerText = t1;
        const prevT2 = document.getElementById('preview-overview-t2');
        if (prevT2) prevT2.innerText = t2;
        const prevT3 = document.getElementById('preview-overview-t3');
        if (prevT3) prevT3.innerText = t3;

        const prevDesc = document.getElementById('preview-overview-desc');
        if (prevDesc) prevDesc.innerText = desc;
    }

    async function handleOverviewSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('overview-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving Section...';
        }

        try {
            const formData = new FormData();
            formData.append('title_line1', document.getElementById('overview-title1-input').value);
            formData.append('title_line2', document.getElementById('overview-title2-input').value);
            formData.append('title_line3', document.getElementById('overview-title3-input').value);
            formData.append('description', document.getElementById('overview-description-input').value);
            formData.append('alt_text', document.getElementById('overview-alt-input').value);

            if (overviewSelectedFile) {
                formData.append('image_file', overviewSelectedFile);
            }

            const res = await fetch(`/api/service-overview/${pageSlug}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('What is Property Management section saved live!');
                if (data.data && data.data.image) {
                    let fullImg = data.data.image;
                    if (!fullImg.startsWith('http') && !fullImg.startsWith('/')) {
                        fullImg = `/${fullImg}`;
                    }
                    overviewCurrentImgUrl = fullImg;
                }
                updateOverviewPreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving section', 'error');
            }
        } catch (err) {
            console.error('Save failed:', err);
            if (typeof showToast === 'function') showToast('Server error while saving section', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Section';
            }
        }
    }

    // ==========================================
    // MANAGEMENT MODELS LOGIC
    // ==========================================
    async function fetchManagementModels() {
        try {
            const res = await fetch(`/api/service-management-models/${pageSlug}`);
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                if (data.title_line1) document.getElementById('models-title1-input').value = data.title_line1;
                if (data.title_line2) document.getElementById('models-title2-input').value = data.title_line2;
                if (data.title_line3) document.getElementById('models-title3-input').value = data.title_line3;
                if (Array.isArray(data.models) && data.models.length > 0) {
                    managementModelsData = data.models;
                }
                renderManagementModelsInputs();
                updateModelsPreview();
            }
        } catch (err) {
            console.error('Error fetching models:', err);
        }
    }

    function renderManagementModelsInputs() {
        const container = document.getElementById('management-models-container');
        if (!container) return;

        container.innerHTML = managementModelsData.map((model, idx) => {
            let imgDisplay = model.image || 'services/propertis_leasing/bedroom.png';
            if (!imgDisplay.startsWith('http') && !imgDisplay.startsWith('/')) {
                imgDisplay = `/${imgDisplay}`;
            }

            return `
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                    <span class="text-xs font-bold text-[#2A5A8A] flex items-center gap-1.5">
                        <span class="w-5 h-5 rounded-full bg-[#2A5A8A]/10 flex items-center justify-center text-[10px]">${idx + 1}</span>
                        <span>Model Card ${idx + 1}</span>
                    </span>
                    <button type="button" onclick="removeManagementModel(${idx})" ${managementModelsData.length <= 1 ? 'disabled' : ''} class="p-1 rounded hover:bg-rose-50 text-slate-400 hover:text-rose-600 disabled:opacity-30 disabled:cursor-not-allowed transition-colors cursor-pointer" title="Delete Model">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>

                {{-- Image Uploader --}}
                <div class="space-y-2">
                    <div class="w-full h-[160px] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 group">
                        <img id="model-thumb-${idx}" src="${imgDisplay}" class="w-full h-full object-fill">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Upload New Image</label>
                        <input type="file" accept="image/*" onchange="previewModelLocalImage(${idx}, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Model Title</label>
                    <input type="text" value="${escapeHtml(model.title || '')}" oninput="updateModelField(${idx}, 'title', this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Alt Text</label>
                    <input type="text" value="${escapeHtml(model.alt_text || '')}" oninput="updateModelField(${idx}, 'alt_text', this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Description Paragraph</label>
                    <textarea rows="3" oninput="updateModelField(${idx}, 'description', this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">${escapeHtml(model.description || '')}</textarea>
                </div>
            </div>
            `;
        }).join('');

        updateModelsPreview();
    }

    function addManagementModel() {
        managementModelsData.push({
            title: 'New Management Model',
            image: 'services/propertis_leasing/bedroom.png',
            alt_text: 'Model Image',
            description: 'Provide tailored property management and leasing administration services.'
        });
        renderManagementModelsInputs();
    }

    function removeManagementModel(idx) {
        if (managementModelsData.length <= 1) return;
        managementModelsData.splice(idx, 1);
        delete modelSelectedFiles[idx];
        renderManagementModelsInputs();
    }

    function updateModelField(idx, field, val) {
        if (!managementModelsData[idx]) return;
        managementModelsData[idx][field] = val;
        updateModelsPreview();
    }

    function previewModelLocalImage(idx, input) {
        if (!input.files || !input.files[0]) return;
        const file = input.files[0];
        modelSelectedFiles[idx] = file;

        const reader = new FileReader();
        reader.onload = function(evt) {
            const dataUrl = evt.target.result;
            const thumb = document.getElementById(`model-thumb-${idx}`);
            if (thumb) thumb.src = dataUrl;
            managementModelsData[idx].previewDataUrl = dataUrl;
            updateModelsPreview();
        };
        reader.readAsDataURL(file);
    }

    function updateModelsPreview() {
        const t1 = document.getElementById('models-title1-input')?.value || 'Our';
        const t2 = document.getElementById('models-title2-input')?.value || 'Management';
        const t3 = document.getElementById('models-title3-input')?.value || 'Models';

        const prevT1 = document.getElementById('preview-models-t1');
        if (prevT1) prevT1.innerText = t1;
        const prevT2 = document.getElementById('preview-models-t2');
        if (prevT2) prevT2.innerText = t2;
        const prevT3 = document.getElementById('preview-models-t3');
        if (prevT3) prevT3.innerText = t3;

        const cardsContainer = document.getElementById('preview-models-cards');
        if (cardsContainer) {
            cardsContainer.innerHTML = managementModelsData.map(m => {
                let img = m.previewDataUrl || m.image || 'services/propertis_leasing/bedroom.png';
                if (!img.startsWith('http') && !img.startsWith('/') && !img.startsWith('data:')) {
                    img = `/${img}`;
                }
                return `
                <div class="flex flex-col shadow-md rounded-lg overflow-hidden bg-white">
                    <div class="w-full h-[180px] sm:h-[220px] overflow-hidden bg-gray-100 shrink-0">
                        <img src="${img}" alt="${escapeHtml(m.alt_text || m.title || '')}" class="w-full h-full object-fill">
                    </div>
                    <div class="bg-[#2A5A8A] p-5 text-white flex-1 flex flex-col justify-start">
                        <h3 class="text-[#F4DEAC] text-lg font-bold mb-2">${escapeHtml(m.title || '')}</h3>
                        <p class="text-white text-xs leading-relaxed opacity-90">${escapeHtml(m.description || '')}</p>
                    </div>
                </div>
                `;
            }).join('');
        }
    }

    async function handleModelsSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('models-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving Models...';
        }

        try {
            const formData = new FormData();
            formData.append('title_line1', document.getElementById('models-title1-input').value);
            formData.append('title_line2', document.getElementById('models-title2-input').value);
            formData.append('title_line3', document.getElementById('models-title3-input').value);

            // Clean models data (remove previewDataUrl before sending)
            const cleanModels = managementModelsData.map(m => {
                const copy = Object.assign({}, m);
                delete copy.previewDataUrl;
                return copy;
            });

            cleanModels.forEach((m, idx) => {
                formData.append(`models[${idx}][title]`, m.title || '');
                formData.append(`models[${idx}][image]`, m.image || '');
                formData.append(`models[${idx}][alt_text]`, m.alt_text || '');
                formData.append(`models[${idx}][description]`, m.description || '');
            });

            // Append uploaded files
            for (const [idx, file] of Object.entries(modelSelectedFiles)) {
                if (file) {
                    formData.append(`model_images[${idx}]`, file);
                }
            }

            const res = await fetch(`/api/service-management-models/${pageSlug}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Management Models saved live!');
                modelSelectedFiles = {};
                if (data.data && Array.isArray(data.data.models)) {
                    managementModelsData = data.data.models;
                }
                renderManagementModelsInputs();
                updateModelsPreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving models', 'error');
            }
        } catch (err) {
            console.error('Save models failed:', err);
            if (typeof showToast === 'function') showToast('Server error while saving models', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Management Models';
            }
        }
    }

    // ==========================================
    // FAQS LOGIC (100% HOMEPAGE UX/UI FORMULA)
    // ==========================================
    async function fetchFaqs() {
        try {
            const res = await fetch(`/api/faqs?page=${pageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                faqsData = result.data;
                renderFaqsTable();
                renderLivePreview();
                const countBadge = document.getElementById('tab-badge-faq-count');
                if (countBadge) countBadge.innerText = faqsData.length;
            }
        } catch (err) {
            console.error('Error fetching faqs:', err);
            if (typeof showToast === 'function') showToast('Error loading FAQs from database', 'error');
        }
    }

    function renderFaqsTable() {
        const tbody = document.getElementById('faq-table-body');
        const emptyState = document.getElementById('faq-empty-state');
        const countBadge = document.getElementById('tab-badge-faq-count');

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
                            <div class="faq-item bg-[#f3f3f3] shadow-2xs">
                                <button type="button"
                                    class="preview-faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer select-none"
                                    aria-expanded="${isOpen ? 'true' : 'false'}"
                                    onclick="togglePreviewFaq(this)">
                                    <span class="text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium leading-snug">
                                        ${escapeHtml(f.question)}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="preview-faq-arrow w-6 h-6 shrink-0 text-[#2A5A8A] transition-transform duration-200 ${isOpen ? 'rotate-90' : ''}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l8 6-8 6V4z" />
                                    </svg>
                                </button>
                                <div class="preview-faq-panel overflow-hidden transition-all duration-300 ${isOpen ? 'max-h-[400px]' : 'max-h-0'}">
                                    <div class="${isOpen ? 'bg-[#1479B9] text-white' : 'bg-white text-black/70'} px-5 py-4 sm:px-6 sm:py-5 transition-colors duration-200">
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
            contentBox.classList.remove('bg-[#1479B9]', 'text-white');
            contentBox.classList.add('bg-white', 'text-black/70');
        } else {
            panel.style.maxHeight = panel.scrollHeight + 'px';
            btn.setAttribute('aria-expanded', 'true');
            arrow.classList.add('rotate-90');
            contentBox.classList.add('bg-[#1479B9]', 'text-white');
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
            page: pageSlug,
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

    // =========================================================================
    // FEATURED PROPERTIES (GRADE A, B, C) LOGIC FOR PROPERTY SALES
    // =========================================================================
    async function fetchServiceProperties() {
        try {
            const res = await fetch(`/api/service-featured-properties/${pageSlug}`);
            const json = await res.json();
            if (json.success && Array.isArray(json.data)) {
                servicePropertiesData = json.data;
                renderServicePropertiesTable();
                renderServicePropertiesPreview();
                updateServicePropertyBadges();
            }
        } catch (err) {
            console.error('Error fetching service properties:', err);
        }
    }

    function updateServicePropertyBadges() {
        const countA = servicePropertiesData.filter(p => p.grade === 'A').length;
        const countB = servicePropertiesData.filter(p => p.grade === 'B').length;
        const countC = servicePropertiesData.filter(p => p.grade === 'C').length;
        const total = servicePropertiesData.length;

        const badgeA = document.getElementById('count-badge-grade-A');
        const badgeB = document.getElementById('count-badge-grade-B');
        const badgeC = document.getElementById('count-badge-grade-C');
        const badgeTotal = document.getElementById('tab-badge-properties-count');

        if (badgeA) badgeA.innerText = countA;
        if (badgeB) badgeB.innerText = countB;
        if (badgeC) badgeC.innerText = countC;
        if (badgeTotal) badgeTotal.innerText = total;
    }

    function setServicePropertyGrade(grade) {
        activePropertyGrade = grade;

        ['A', 'B', 'C'].forEach(g => {
            const btn = document.getElementById(`btn-prop-grade-${g}`);
            if (btn) {
                if (g === grade) {
                    btn.classList.remove('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
                    btn.classList.add('bg-[#2A5A8A]', 'text-white', 'shadow-xs');
                } else {
                    btn.classList.remove('bg-[#2A5A8A]', 'text-white', 'shadow-xs');
                    btn.classList.add('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
                }
            }
        });

        const labelEl = document.getElementById('preview-active-grade-label');
        const titleEl = document.getElementById('preview-active-grade-title');
        const gradeText = `Grade ${grade}`;
        if (labelEl) labelEl.innerText = gradeText;
        if (titleEl) titleEl.innerText = gradeText;

        renderServicePropertiesTable();
        renderServicePropertiesPreview();
    }

    function renderServicePropertiesTable() {
        const tbody = document.getElementById('service-property-table-body');
        const emptyState = document.getElementById('service-property-empty-state');
        if (!tbody) return;

        let filtered = servicePropertiesData;
        if (activePropertyGrade !== 'all') {
            filtered = servicePropertiesData.filter(p => p.grade === activePropertyGrade);
        }

        if (filtered.length === 0) {
            tbody.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            return;
        }

        if (emptyState) emptyState.classList.add('hidden');

        tbody.innerHTML = filtered.map((item, index) => {
            let imgSrc = item.image || 'home/latest_activities/1img.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                imgSrc = '/' + imgSrc;
            }
            const isPublished = (item.publish_status || 'published') === 'published';

            return `
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <td class="py-3 px-4 text-center font-bold text-xs text-slate-400">${index + 1}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="w-14 h-10 rounded overflow-hidden bg-slate-800 mx-auto border border-slate-200">
                            <img src="${escapeHtml(imgSrc)}" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <span class="font-bold text-slate-900 text-sm block">${escapeHtml(item.title)}</span>
                        <span class="text-xs text-slate-500 block">${escapeHtml(item.subtitle || '')}</span>
                    </td>
                    <td class="py-3 px-4 text-xs text-slate-600 max-w-[280px]">
                        <p class="line-clamp-2">${escapeHtml(item.description || '')}</p>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold ${item.grade === 'A' ? 'bg-amber-100 text-amber-800' : (item.grade === 'B' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800')}">
                            Grade ${escapeHtml(item.grade)}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold ${isPublished ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-600'}">
                            ${isPublished ? 'Published' : 'Draft'}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-1.5">
                            <button onclick="editServiceProperty(${item.id})" class="p-1.5 rounded-lg text-slate-500 hover:text-[#2A5A8A] hover:bg-slate-100 transition-colors" title="Edit Property">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button onclick="promptDeleteServiceProperty(${item.id})" class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Property">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        }).join('');
    }

    function renderServicePropertiesPreview() {
        const track = document.getElementById('service-live-property-track');
        if (!track) return;

        let filtered = servicePropertiesData;
        if (activePropertyGrade !== 'all') {
            filtered = servicePropertiesData.filter(p => p.grade === activePropertyGrade);
        }

        if (filtered.length === 0) {
            track.innerHTML = `
                <div class="w-full py-10 text-center flex flex-col items-center justify-center min-h-[220px] bg-slate-950/60 border border-white/10 rounded-lg p-6">
                    <div class="w-12 h-12 rounded-full bg-white/10 text-[#F4DEAC] flex items-center justify-center mb-3 border border-[#F4DEAC]/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-[#F4DEAC] text-xl font-bold mb-1">Coming Soon</h3>
                    <p class="text-white/70 text-xs max-w-sm">No properties in this grade. The live frontend will show this clean Coming Soon state.</p>
                </div>
            `;
            return;
        }

        track.innerHTML = filtered.map(item => {
            let imgSrc = item.image || 'home/latest_activities/1img.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                imgSrc = '/' + imgSrc;
            }
            return `
                <div class="w-[280px] shrink-0 bg-white rounded-none overflow-hidden shadow-lg flex flex-col">
                    <div class="h-[150px] w-full bg-slate-800 relative overflow-hidden">
                        <img src="${escapeHtml(imgSrc)}" class="w-full h-full object-fill">
                    </div>
                    <div class="p-4 flex flex-col grow">
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h4 class="text-[#2A5A8A] font-bold text-sm leading-snug truncate">${escapeHtml(item.title)}</h4>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-blue-50 text-[#2A5A8A] shrink-0">Grade ${escapeHtml(item.grade)}</span>
                        </div>
                        <p class="text-slate-700 text-xs font-semibold mb-1 truncate">${escapeHtml(item.subtitle || '')}</p>
                        <p class="text-slate-500 text-[11px] leading-relaxed line-clamp-2 mb-3">${escapeHtml(item.description || '')}</p>
                        <div class="mt-auto pt-2 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-[11px] font-bold text-[#2A5A8A]">${escapeHtml(item.status || '30% Available')}</span>
                            <span class="text-[11px] font-semibold text-[#2A5A8A] flex items-center gap-1">${escapeHtml(item.link_text || 'View Project')} &rarr;</span>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    function openServicePropertyModal(property = null) {
        const modal = document.getElementById('service-property-modal');
        const card = document.getElementById('service-property-modal-card');
        const form = document.getElementById('service-property-form');
        form.reset();

        if (property) {
            document.getElementById('service-property-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit Featured Property';
            document.getElementById('sprop-id').value = property.id;
            document.getElementById('sprop-grade').value = property.grade || 'A';
            document.getElementById('sprop-status').value = property.status || '30% Available';
            document.getElementById('sprop-title').value = property.title || '';
            document.getElementById('sprop-subtitle').value = property.subtitle || '';
            document.getElementById('sprop-description').value = property.description || '';
            document.getElementById('sprop-image-url').value = property.image || 'home/latest_activities/1img.png';
            document.getElementById('sprop-link').value = property.link || '/services/properties/wealth-mansion';
            document.getElementById('sprop-link-text').value = property.link_text || 'View Project';
            document.getElementById('sprop-publish-status').value = property.publish_status || 'published';
            document.getElementById('sprop-sort-order').value = property.sort_order || 1;
        } else {
            document.getElementById('service-property-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Property';
            document.getElementById('sprop-id').value = '';
            document.getElementById('sprop-grade').value = (activePropertyGrade !== 'all' ? activePropertyGrade : 'A');
            document.getElementById('sprop-status').value = '30% Available';
            document.getElementById('sprop-title').value = '';
            document.getElementById('sprop-subtitle').value = 'Premium Condominium Residences';
            document.getElementById('sprop-description').value = '';
            document.getElementById('sprop-image-url').value = 'home/latest_activities/1img.png';
            document.getElementById('sprop-link').value = '/services/properties/wealth-mansion';
            document.getElementById('sprop-link-text').value = 'View Project';
            document.getElementById('sprop-publish-status').value = 'published';
            document.getElementById('sprop-sort-order').value = (servicePropertiesData.length + 1);
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeServicePropertyModal() {
        const modal = document.getElementById('service-property-modal');
        const card = document.getElementById('service-property-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    function editServiceProperty(id) {
        const property = servicePropertiesData.find(p => p.id === id);
        if (property) {
            openServicePropertyModal(property);
        }
    }

    async function handleServicePropertySubmit(event) {
        event.preventDefault();
        const submitBtn = document.getElementById('sprop-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving Property...';
        }

        const id = document.getElementById('sprop-id').value;
        const formData = new FormData();
        formData.append('grade', document.getElementById('sprop-grade').value);
        formData.append('status', document.getElementById('sprop-status').value);
        formData.append('title', document.getElementById('sprop-title').value);
        formData.append('subtitle', document.getElementById('sprop-subtitle').value);
        formData.append('description', document.getElementById('sprop-description').value);
        formData.append('image', document.getElementById('sprop-image-url').value);
        formData.append('link', document.getElementById('sprop-link').value);
        formData.append('link_text', document.getElementById('sprop-link-text').value);
        formData.append('publish_status', document.getElementById('sprop-publish-status').value);
        formData.append('sort_order', document.getElementById('sprop-sort-order').value);

        const fileInput = document.getElementById('sprop-image-file');
        if (fileInput && fileInput.files.length > 0) {
            formData.append('image_file', fileInput.files[0]);
        }

        const url = id ? `/api/service-featured-properties/update/${id}` : `/api/service-featured-properties/${pageSlug}`;

        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast(id ? 'Property updated successfully!' : 'Property added successfully!');
                closeServicePropertyModal();
                fetchServiceProperties();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving property', 'error');
            }
        } catch (err) {
            console.error('Error saving property:', err);
            if (typeof showToast === 'function') showToast('Server error saving property', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Property';
            }
        }
    }

    function promptDeleteServiceProperty(id) {
        document.getElementById('delete-service-property-id').value = id;
        const modal = document.getElementById('delete-service-property-modal');
        const card = document.getElementById('delete-service-property-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteServicePropertyModal() {
        const modal = document.getElementById('delete-service-property-modal');
        const card = document.getElementById('delete-service-property-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function confirmDeleteServiceProperty() {
        const id = document.getElementById('delete-service-property-id').value;
        if (!id) return;

        try {
            const res = await fetch(`/api/service-featured-properties/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Property deleted successfully!');
                closeDeleteServicePropertyModal();
                fetchServiceProperties();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error deleting property', 'error');
            }
        } catch (err) {
            console.error('Error deleting property:', err);
            if (typeof showToast === 'function') showToast('Server error deleting property', 'error');
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
</script>
@endpush
