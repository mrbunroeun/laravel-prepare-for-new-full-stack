@extends('dashboard.layout')

@section('title', 'About Us Page Management')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="border-b border-slate-200 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">About Us</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">About Us Page Content</h1>
            <p class="text-sm text-slate-500 mt-1">Manage hero banner, Our Story images & paragraphs, and Vision, Mission & Values.</p>
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
            <button type="button" onclick="switchAboutTab('hero', event)" id="tab-btn-hero" class="about-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-bold border-b-2 border-[#2A5A8A] text-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            {{-- Tab 2: Our Story Section --}}
            <button type="button" onclick="switchAboutTab('story', event)" id="tab-btn-story" class="about-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="whitespace-nowrap">Our Story (3 Images & Story)</span>
            </button>

            {{-- Tab 3: Vision, Mission & Values --}}
            <button type="button" onclick="switchAboutTab('values', event)" id="tab-btn-values" class="about-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="whitespace-nowrap">Vision, Mission & Core Values</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">3 Cards</span>
            </button>

            {{-- Tab 4: Showcase Images (3 Columns) --}}
            <button type="button" onclick="switchAboutTab('showcase', event)" id="tab-btn-showcase" class="about-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Showcase Images</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">3 Columns</span>
            </button>

            {{-- Tab 5: Frequently Asked Questions --}}
            <button type="button" onclick="switchAboutTab('faqs', event)" id="tab-btn-faqs" class="about-tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Frequently Asked Questions</span>
                <span id="tab-badge-faq-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
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
    {{-- TAB 1: HERO & BANNER --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-hero" class="about-tab-content space-y-6">
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

                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all !text-slate-900 [&&_*]:!text-slate-900" style="color: #0f172a !important;"><b>CWD</b> Real Estate Agent & Developer</div>
                </div>

                {{-- Main Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline (H1)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Headline Title</label>
                        <textarea id="hero-headline-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">Your Trusted Property Management & Hospitality Partner in Cambodia</textarea>
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
                                <span class="font-bold text-[#F4DEAC]">CWD</span>
                                <span class="font-normal text-[#F4DEAC] ml-1">Real Estate Agent & Developer</span>
                            </span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-4">
                            Your Trusted Property Management & Hospitality Partner in Cambodia
                        </h1>

                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] sm:text-[14px] mb-6 flex flex-wrap items-center gap-x-3 gap-y-1">
                            <span>• Flexible income</span>
                            <span>• Strong brand</span>
                            <span>• Real projects</span>
                            <span>• Full sales support</span>
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
    {{-- TAB 2: OUR STORY SECTION (CLEAN 3 IMAGES & REORDERABLE STORY) --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-story" class="about-tab-content hidden space-y-6">
        <form onsubmit="handleStorySubmit(event)" class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Our Story Section Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Upload images, edit heading, and manage story paragraphs.</p>
                </div>

                {{-- 1. Three Story Images (Visual 2-Column Layout Matching Frontend) --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Story Images Layout</h3>
                        <span class="text-xs text-slate-500">Layout directly mirrors frontend position</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-1 max-w-[850px]">
                        {{-- Left Column: Tall Image Card --}}
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs flex flex-col justify-between">
                            <div class="w-full h-[360px] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 mb-3 group">
                                <img id="story-preview-img-left" src="{{ asset('about_us/our_story/longest.png') }}" class="w-full h-full object-cover object-center">
                                <span class="absolute top-2.5 left-2.5 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-2 py-0.5 rounded">Tall Image</span>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold text-slate-600 mb-1.5">Upload New Image</label>
                                <input type="file" id="story-file-left" accept="image/*" onchange="previewStoryLocalImage('left', this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                            </div>
                        </div>

                        {{-- Right Column: 2 Stacked Image Cards --}}
                        <div class="flex flex-col gap-4">
                            {{-- Top Image Card --}}
                            <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-xs">
                                <div class="w-full h-[155px] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 mb-2.5 group">
                                    <img id="story-preview-img-top" src="{{ asset('about_us/our_story/top_one.png') }}" class="w-full h-full object-cover object-center">
                                    <span class="absolute top-2 left-2 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-2 py-0.5 rounded">Top Image</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Upload New Image</label>
                                    <input type="file" id="story-file-top" accept="image/*" onchange="previewStoryLocalImage('top', this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                                </div>
                            </div>

                            {{-- Bottom Image Card --}}
                            <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-xs">
                                <div class="w-full h-[155px] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 mb-2.5 group">
                                    <img id="story-preview-img-bottom" src="{{ asset('about_us/our_story/bottom_one.png') }}" class="w-full h-full object-cover object-center">
                                    <span class="absolute top-2 left-2 bg-black/60 backdrop-blur-xs text-white text-[10px] font-bold px-2 py-0.5 rounded">Bottom Image</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Upload New Image</label>
                                    <input type="file" id="story-file-bottom" accept="image/*" onchange="previewStoryLocalImage('bottom', this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2. Tagline & Main Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Tagline & Main Headline</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Section Title</label>
                            <input type="text" id="story-tagline-input" value="Our Story" oninput="syncStoryLivePreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Main Headline Title</label>
                            <input type="text" id="story-headline-input" value="Building Trust Through Commitment and Personal Relationships" oninput="syncStoryLivePreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        </div>
                    </div>
                </div>

                {{-- 3. Dynamic Story Paragraphs with Reordering --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Story Paragraphs (Dynamic Content)</h3>
                            <p class="text-xs text-slate-500">Add, edit, delete, or use arrows to change paragraph order.</p>
                        </div>
                        <button type="button" onclick="addStoryParagraph()" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Add Paragraph</span>
                        </button>
                    </div>

                    <div id="story-paragraphs-container" class="space-y-4"></div>
                </div>

                {{-- Single Save Button at Bottom --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" id="story-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Our Story Section
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Our Story Section Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Our Story Section Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Real-time simulation matching public page</span>
            </div>

            <div class="bg-slate-100 p-4 sm:p-8 rounded-xl border border-slate-200">
                <div class="flex flex-col lg:flex-row gap-6 items-start">
                    {{-- Preview Left 3 Images --}}
                    <div class="grid grid-cols-2 gap-3 w-full lg:w-2/5 shrink-0">
                        <div class="w-full h-[380px] bg-slate-900 rounded-lg overflow-hidden shadow-md">
                            <img id="live-story-img-left" src="{{ asset('about_us/our_story/longest.png') }}" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <div class="w-full h-[184px] bg-slate-900 rounded-lg overflow-hidden shadow-md">
                                <img id="live-story-img-top" src="{{ asset('about_us/our_story/top_one.png') }}" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="w-full h-[184px] bg-slate-900 rounded-lg overflow-hidden shadow-md">
                                <img id="live-story-img-bottom" src="{{ asset('about_us/our_story/bottom_one.png') }}" class="w-full h-full object-cover object-center">
                            </div>
                        </div>
                    </div>

                    {{-- Preview Right Content Box --}}
                    <div class="w-full lg:w-3/5 shrink-0">
                        <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                        <div class="bg-[#2A5A8A] p-6 sm:p-8 shadow-xl">
                            <h2 class="text-[#F4DEAC] text-2xl font-bold mb-3" id="live-story-tagline">Our Story</h2>
                            <h1 class="text-white text-lg sm:text-xl font-semibold mb-6 leading-tight" id="live-story-headline">Building Trust Through Commitment and Personal Relationships</h1>
                            <div class="space-y-4 text-white text-xs sm:text-sm leading-relaxed" id="live-story-paragraphs"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 3: VISION, MISSION & CORE VALUES --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-values" class="about-tab-content hidden space-y-6">
        <form onsubmit="handleValuesSubmit(event)" class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Vision, Mission & Core Values Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the 3 cards (titles, subtitles, descriptions, icons, and button labels).</p>
                </div>

                {{-- 3 Value Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="values-cards-container">
                    {{-- Card 1: Vision --}}
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Card 1: Vision</span>
                            <img id="val-icon-preview-0" src="{{ asset('about_us/icons/vision.svg') }}" class="w-7 h-7 object-contain bg-white p-1 rounded border border-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Card Title</label>
                            <input type="text" id="val-title-0" value="Vision" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs font-bold text-[#163049]">
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600">Highlight Subtitle</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="val-show-sub-0" checked onchange="toggleValSubtitle(0)" class="sr-only peer">
                                    <div class="w-8 h-4.5 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-[#2A5A8A]"></div>
                                    <span class="ml-1.5 text-[10px] font-semibold text-slate-600" id="val-sub-label-0">Show</span>
                                </label>
                            </div>
                            <textarea rows="2" id="val-subtitle-0" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800">Contributing to Cambodia's Growing Property & Hospitality Industry</textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Card Description</label>
                            <textarea rows="4" id="val-desc-0" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800 leading-relaxed">To become one of Cambodia's most trusted property management and hospitality companies by delivering professional services, creating long-term value for property owners, and supporting the sustainable growth of Cambodia's real estate sector.</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Upload Card Icon</label>
                            <input type="file" id="val-file-0" accept="image/*" onchange="previewValIcon(0, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        </div>
                    </div>

                    {{-- Card 2: Mission --}}
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Card 2: Mission</span>
                            <img id="val-icon-preview-1" src="{{ asset('about_us/icons/mission.svg') }}" class="w-7 h-7 object-contain bg-white p-1 rounded border border-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Card Title</label>
                            <input type="text" id="val-title-1" value="Mission" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs font-bold text-[#163049]">
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600">Highlight Subtitle</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="val-show-sub-1" checked onchange="toggleValSubtitle(1)" class="sr-only peer">
                                    <div class="w-8 h-4.5 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-[#2A5A8A]"></div>
                                    <span class="ml-1.5 text-[10px] font-semibold text-slate-600" id="val-sub-label-1">Show</span>
                                </label>
                            </div>
                            <textarea rows="2" id="val-subtitle-1" oninput="syncValuesLivePreview()" placeholder="Leave blank if none" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800"></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Card Description</label>
                            <textarea rows="4" id="val-desc-1" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800 leading-relaxed">Our mission is to provide professional property management, leasing, and hospitality solutions that benefit both property owners and guests.</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Upload Card Icon</label>
                            <input type="file" id="val-file-1" accept="image/*" onchange="previewValIcon(1, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        </div>
                    </div>

                    {{-- Card 3: Core Values --}}
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Card 3: Core Values</span>
                            <img id="val-icon-preview-2" src="{{ asset('about_us/icons/core_value.svg') }}" class="w-7 h-7 object-contain bg-white p-1 rounded border border-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Card Title</label>
                            <input type="text" id="val-title-2" value="Core Values" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs font-bold text-[#163049]">
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600">Highlight Subtitle</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="val-show-sub-2" checked onchange="toggleValSubtitle(2)" class="sr-only peer">
                                    <div class="w-8 h-4.5 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-[#2A5A8A]"></div>
                                    <span class="ml-1.5 text-[10px] font-semibold text-slate-600" id="val-sub-label-2">Show</span>
                                </label>
                            </div>
                            <textarea rows="2" id="val-subtitle-2" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800">Integrity</textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Card Description</label>
                            <textarea rows="4" id="val-desc-2" oninput="syncValuesLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800 leading-relaxed">We conduct every business relationship with honesty, transparency, and professionalism.</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Upload Card Icon</label>
                            <input type="file" id="val-file-2" accept="image/*" onchange="previewValIcon(2, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        </div>
                    </div>
                </div>

                {{-- Single Save Button at Bottom --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" id="values-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Vision, Mission & Values
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Vision, Mission & Values Simulation Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Vision, Mission & Values Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Real-time simulation matching the public About Us page</span>
            </div>

            <div class="relative bg-cover bg-center rounded-xl p-6 sm:p-10 shadow-xl overflow-hidden" style="background-image: url('{{ asset('about_us/bg/bg_img_blue.png') }}');">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                    {{-- Card 1 Preview --}}
                    <div class="bg-[#f3f6f8] p-6 rounded-lg shadow-md flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-[#2A5A8A] text-xl font-bold" id="live-val-title-0">Vision</h3>
                                <img id="live-val-icon-0" src="{{ asset('about_us/icons/vision.svg') }}" class="w-7 h-7 object-contain">
                            </div>
                            <p class="text-[#2A5A8A] text-sm font-medium mb-3 leading-relaxed" id="live-val-subtitle-0">Contributing to Cambodia's Growing Property & Hospitality Industry</p>
                            <p class="text-black text-xs leading-relaxed line-clamp-3 mb-4" id="live-val-desc-0">To become one of Cambodia's most trusted property management and hospitality companies by delivering professional services, creating long-term value for property owners, and supporting the sustainable growth of Cambodia's real estate sector.</p>
                        </div>
                        <div class="text-[#2A5A8A] text-xs font-semibold flex items-center gap-1 mt-auto pt-2 border-t border-slate-200/60">
                            <span id="live-val-btn-0">See More</span>
                            <span>&rarr;</span>
                        </div>
                    </div>

                    {{-- Card 2 Preview --}}
                    <div class="bg-[#f3f6f8] p-6 rounded-lg shadow-md flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-[#2A5A8A] text-xl font-bold" id="live-val-title-1">Mission</h3>
                                <img id="live-val-icon-1" src="{{ asset('about_us/icons/mission.svg') }}" class="w-7 h-7 object-contain">
                            </div>
                            <p class="text-[#2A5A8A] text-sm font-medium mb-3 leading-relaxed hidden" id="live-val-subtitle-1"></p>
                            <p class="text-black text-xs leading-relaxed line-clamp-3 mb-4" id="live-val-desc-1">Our mission is to provide professional property management, leasing, and hospitality solutions that benefit both property owners and guests.</p>
                        </div>
                        <div class="text-[#2A5A8A] text-xs font-semibold flex items-center gap-1 mt-auto pt-2 border-t border-slate-200/60">
                            <span id="live-val-btn-1">See More</span>
                            <span>&rarr;</span>
                        </div>
                    </div>

                    {{-- Card 3 Preview --}}
                    <div class="bg-[#f3f6f8] p-6 rounded-lg shadow-md flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-[#2A5A8A] text-xl font-bold" id="live-val-title-2">Core Values</h3>
                                <img id="live-val-icon-2" src="{{ asset('about_us/icons/core_value.svg') }}" class="w-7 h-7 object-contain">
                            </div>
                            <p class="text-[#2A5A8A] text-sm font-medium mb-3 leading-relaxed" id="live-val-subtitle-2">Integrity</p>
                            <p class="text-black text-xs leading-relaxed line-clamp-3 mb-4" id="live-val-desc-2">We conduct every business relationship with honesty, transparency, and professionalism.</p>
                        </div>
                        <div class="text-[#2A5A8A] text-xs font-semibold flex items-center gap-1 mt-auto pt-2 border-t border-slate-200/60">
                            <span id="live-val-btn-2">See More</span>
                            <span>&rarr;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 4: SHOWCASE IMAGES (3 COLUMNS) --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-showcase" class="about-tab-content hidden space-y-6">
        <form onsubmit="handleShowcaseSubmit(event)" class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Showcase Images Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Upload and manage the 3-column images displayed above the FAQ section.</p>
                </div>

                {{-- 3 Showcase Image Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Image 1 Card --}}
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Image 1 (Left)</span>
                            <span class="text-[11px] text-slate-400 font-medium">3:4 Aspect</span>
                        </div>
                        <div class="w-full aspect-[3/4] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 shadow-inner">
                            <img id="showcase-preview-1" src="{{ asset('home/latest_activities/1img.png') }}" class="w-full h-full object-fill">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1.5">Upload New Image</label>
                            <input type="file" id="showcase-file-1" accept="image/*" onchange="previewShowcaseLocalImage(1, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Alt / Description</label>
                            <input type="text" id="showcase-alt-1" value="CWD Realty Story" oninput="syncShowcaseLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800">
                        </div>
                    </div>

                    {{-- Image 2 Card --}}
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Image 2 (Center)</span>
                            <span class="text-[11px] text-slate-400 font-medium">3:4 Aspect</span>
                        </div>
                        <div class="w-full aspect-[3/4] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 shadow-inner">
                            <img id="showcase-preview-2" src="{{ asset('about_us/our_story/longest.png') }}" class="w-full h-full object-fill">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1.5">Upload New Image</label>
                            <input type="file" id="showcase-file-2" accept="image/*" onchange="previewShowcaseLocalImage(2, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Alt / Description</label>
                            <input type="text" id="showcase-alt-2" value="CWD Realty Development" oninput="syncShowcaseLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800">
                        </div>
                    </div>

                    {{-- Image 3 Card --}}
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Image 3 (Right)</span>
                            <span class="text-[11px] text-slate-400 font-medium">3:4 Aspect</span>
                        </div>
                        <div class="w-full aspect-[3/4] bg-slate-900 rounded-lg overflow-hidden relative border border-slate-200 shadow-inner">
                            <img id="showcase-preview-3" src="{{ asset('about_us/our_story/bottom_one.png') }}" class="w-full h-full object-fill">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1.5">Upload New Image</label>
                            <input type="file" id="showcase-file-3" accept="image/*" onchange="previewShowcaseLocalImage(3, this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Alt / Description</label>
                            <input type="text" id="showcase-alt-3" value="CWD Realty Properties" oninput="syncShowcaseLivePreview()" class="w-full px-3 py-2 bg-white border border-slate-300 rounded text-xs text-slate-800">
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4 border-t border-slate-200 flex justify-end">
                    <button type="submit" id="save-showcase-btn" class="bg-[#2A5A8A] hover:bg-[#163049] text-white px-6 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2 shadow-sm transition-all cursor-pointer">
                        <span>Save Showcase Images</span>
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Preview Simulation --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Live Showcase Preview (Frontend Simulation)</h3>
            <div class="bg-slate-100 p-6 rounded-xl border border-slate-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-[900px] mx-auto items-stretch">
                    <div class="w-full aspect-[3/4] overflow-hidden shadow-lg bg-gray-200 relative">
                        <img id="live-showcase-1" src="{{ asset('home/latest_activities/1img.png') }}" class="w-full h-full object-fill">
                    </div>
                    <div class="w-full aspect-[3/4] overflow-hidden shadow-lg bg-gray-200 relative">
                        <img id="live-showcase-2" src="{{ asset('about_us/our_story/longest.png') }}" class="w-full h-full object-fill">
                    </div>
                    <div class="w-full aspect-[3/4] overflow-hidden shadow-lg bg-gray-200 relative">
                        <img id="live-showcase-3" src="{{ asset('about_us/our_story/bottom_one.png') }}" class="w-full h-full object-fill">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ========================================================================= --}}
    {{-- TAB 5: FREQUENTLY ASKED QUESTIONS (FAQS)                                 --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-faqs" class="about-tab-content hidden space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">About Us FAQs</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for the About Us page.</p>
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
                    <p class="text-xs text-slate-500 mt-1">Get started by creating your first About Us FAQ item.</p>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card for FAQs --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live About Us Preview</h3>
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

    {{-- FAQ Create / Edit Modal --}}
    <div id="faq-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs hidden opacity-0 transition-opacity duration-200">
        <div id="faq-modal-card" class="bg-white border border-slate-200 rounded-2xl max-w-lg w-full p-6 shadow-2xl transform scale-95 transition-transform duration-200 space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 id="faq-modal-title" class="text-base font-bold text-[#163049] flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                    Add New FAQ
                </h3>
                <button type="button" onclick="closeFaqModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form onsubmit="handleFaqSubmit(event)" class="space-y-4">
                <input type="hidden" id="faq-id">

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Question <span class="text-red-500">*</span></label>
                    <input type="text" id="faq-question" required placeholder="e.g. What services does CWD provide?" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Answer <span class="text-red-500">*</span></label>
                    <textarea id="faq-answer" required rows="4" placeholder="Enter detailed answer here..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Display Column</label>
                        <select id="faq-column" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors">
                            <option value="left">Left Column</option>
                            <option value="right">Right Column</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Status</label>
                        <select id="faq-status" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors">
                            <option value="published">Published</option>
                            <option value="draft">Draft (Hidden)</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                    <button type="button" onclick="closeFaqModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">Cancel</button>
                    <button type="submit" id="faq-submit-btn" class="px-5 py-2 bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs font-bold rounded-lg shadow-sm transition-all cursor-pointer">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Delete FAQ Confirmation Modal --}}
    <div id="faq-delete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs hidden opacity-0 transition-opacity duration-200">
        <div id="faq-delete-card" class="bg-white border border-slate-200 rounded-2xl max-w-sm w-full p-6 shadow-2xl transform scale-95 transition-transform duration-200 text-center space-y-4">
            <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
            <h3 class="text-base font-bold text-[#163049]">Delete this FAQ?</h3>
            <p class="text-xs text-slate-500">Are you sure you want to permanently remove this question from your About Us page?</p>
            <div class="flex items-center justify-center gap-3 pt-2">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">Cancel</button>
                <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-lg shadow-sm transition-all cursor-pointer">Delete Now</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';

    // ==========================================
    // TAB SWITCHING (Hero vs Story vs Values)
    // ==========================================
    function scrollTabsBar(direction) {
        const track = document.getElementById('tabs-nav-track');
        if (!track) return;
        track.scrollBy({
            left: direction * 220,
            behavior: 'smooth'
        });
    }

    function switchAboutTab(tabKey, e) {
        if (e && e.preventDefault) e.preventDefault();
        const currentScrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;

        document.querySelectorAll('.about-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
            btn.classList.add('border-transparent', 'text-slate-500', 'font-medium');
        });
        document.querySelectorAll('.about-tab-content').forEach(c => c.classList.add('hidden'));

        const targetBtn = document.getElementById('tab-btn-' + tabKey);
        const targetContent = document.getElementById('tab-content-' + tabKey);

        if (targetContent) {
            targetContent.classList.remove('hidden');
        }
        if (targetBtn) {
            targetBtn.classList.add('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
            targetBtn.classList.remove('border-transparent', 'text-slate-500', 'font-medium');
        }

        window.scrollTo({ top: currentScrollY, behavior: 'instant' });
    }

    // ==========================================
    // HERO & BANNER SCRIPTS
    // ==========================================
    const availableRoutes = [
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Apply As Sale Agent (/partners#application-form-section)', url: '/partners#application-form-section' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Services Overview (/service)', url: '/service' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' },
        { label: 'Insights & News (/insights)', url: '/insights' },
        { label: 'Events (/events)', url: '/events' }
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
        'Flexible income',
        'Strong brand',
        'Real projects',
        'Full sales support'
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
            showToast('Maximum 3 buttons allowed');
            return;
        }
        heroButtonsData.push({ text: 'Learn More', url: '/about-us' });
        renderHeroButtonsInputs();
    }

    function removeHeroButton(index) {
        if (heroButtonsData.length <= 1) {
            showToast('Hero section should have at least 1 button');
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
            const res = await fetch('/api/hero-section/about-us');
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
                page: 'about-us',
                tagline_html: rawTagline,
                show_tagline: true,
                headline: document.getElementById('hero-headline-input').value,
                show_bullets: document.getElementById('hero-bullets-toggle').checked,
                bullets: heroBulletsData,
                buttons: heroButtonsData
            };

            const res = await fetch('/api/hero-section/about-us', {
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
                showToast('About Us Hero Section saved live!');
                updateHeroPreview();
            } else {
                showToast(data.message || 'Error saving hero section', 'error');
            }
        } catch (err) {
            showToast('Failed to save to database', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    // ==========================================
    // OUR STORY SECTION (WITH PARAGRAPH REORDERING)
    // ==========================================
    let storyParagraphsData = [
        'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
        'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors.',
        'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.',
        'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services that create value for both property owners and residents.'
    ];

    let currentStoryData = {
        image_left: 'about_us/our_story/longest.png',
        image_top_right: 'about_us/our_story/top_one.png',
        image_bottom_right: 'about_us/our_story/bottom_one.png'
    };

    function renderStoryParagraphsInputs() {
        const container = document.getElementById('story-paragraphs-container');
        if (!container) return;
        container.innerHTML = '';

        storyParagraphsData.forEach((para, index) => {
            const div = document.createElement('div');
            div.className = 'p-4 bg-white border border-slate-200 rounded-lg space-y-2';
            div.innerHTML = `
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center">${index + 1}</span>
                        <span class="text-xs font-bold text-[#2A5A8A]">Paragraph ${index + 1}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        {{-- Move Up Button --}}
                        <button type="button" onclick="moveStoryParagraph(${index}, -1)" ${index === 0 ? 'disabled class="opacity-30 p-1 text-slate-400 cursor-not-allowed"' : 'class="p-1 text-slate-600 hover:text-[#2A5A8A] hover:bg-slate-100 rounded transition-colors cursor-pointer"'} title="Move Up">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                        </button>
                        {{-- Move Down Button --}}
                        <button type="button" onclick="moveStoryParagraph(${index}, 1)" ${index === storyParagraphsData.length - 1 ? 'disabled class="opacity-30 p-1 text-slate-400 cursor-not-allowed"' : 'class="p-1 text-slate-600 hover:text-[#2A5A8A] hover:bg-slate-100 rounded transition-colors cursor-pointer"'} title="Move Down">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        {{-- Delete Button --}}
                        <button type="button" onclick="removeStoryParagraph(${index})" class="text-slate-400 hover:text-red-500 p-1 rounded transition-colors ml-1 cursor-pointer" title="Delete paragraph">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <textarea rows="3" oninput="updateStoryParagraphText(${index}, this.value)" class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded text-xs text-slate-800 focus:outline-none focus:bg-white focus:border-[#2A5A8A] leading-relaxed">${escapeHtml(para)}</textarea>
            `;
            container.appendChild(div);
        });

        syncStoryLivePreview();
    }

    function addStoryParagraph() {
        storyParagraphsData.push('New story paragraph description...');
        renderStoryParagraphsInputs();
    }

    function removeStoryParagraph(index) {
        if (storyParagraphsData.length <= 1) {
            showToast('Story section should have at least 1 paragraph', 'warning');
            return;
        }
        storyParagraphsData.splice(index, 1);
        renderStoryParagraphsInputs();
    }

    function moveStoryParagraph(index, direction) {
        const newIndex = index + direction;
        if (newIndex < 0 || newIndex >= storyParagraphsData.length) return;
        const temp = storyParagraphsData[index];
        storyParagraphsData[index] = storyParagraphsData[newIndex];
        storyParagraphsData[newIndex] = temp;
        renderStoryParagraphsInputs();
    }

    function updateStoryParagraphText(index, val) {
        storyParagraphsData[index] = val;
        syncStoryLivePreview();
    }

    function previewStoryLocalImage(type, input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const targetPreview = document.getElementById('story-preview-img-' + type);
                const livePreview = document.getElementById('live-story-img-' + type);
                if (targetPreview) targetPreview.src = e.target.result;
                if (livePreview) livePreview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function syncStoryLivePreview() {
        const tagline = document.getElementById('story-tagline-input')?.value || 'Our Story';
        const headline = document.getElementById('story-headline-input')?.value || 'Building Trust Through Commitment';

        const liveTagline = document.getElementById('live-story-tagline');
        const liveHeadline = document.getElementById('live-story-headline');
        const liveParagraphs = document.getElementById('live-story-paragraphs');

        if (liveTagline) liveTagline.innerText = tagline;
        if (liveHeadline) liveHeadline.innerText = headline;
        if (liveParagraphs) {
            liveParagraphs.innerHTML = storyParagraphsData.map(p => `<p class="leading-relaxed">${escapeHtml(p)}</p>`).join('');
        }
    }

    async function fetchOurStorySection() {
        try {
            const res = await fetch('/api/about-story/about-us');
            const result = await res.json();
            if (result.success && result.data) {
                const d = result.data;
                if (d.tagline) document.getElementById('story-tagline-input').value = d.tagline;
                if (d.headline) document.getElementById('story-headline-input').value = d.headline;

                if (d.image_left) {
                    currentStoryData.image_left = d.image_left;
                    const src = '/' + d.image_left.replace(/^\//, '');
                    document.getElementById('story-preview-img-left').src = src;
                    document.getElementById('live-story-img-left').src = src;
                }
                if (d.image_top_right) {
                    currentStoryData.image_top_right = d.image_top_right;
                    const src = '/' + d.image_top_right.replace(/^\//, '');
                    document.getElementById('story-preview-img-top').src = src;
                    document.getElementById('live-story-img-top').src = src;
                }
                if (d.image_bottom_right) {
                    currentStoryData.image_bottom_right = d.image_bottom_right;
                    const src = '/' + d.image_bottom_right.replace(/^\//, '');
                    document.getElementById('story-preview-img-bottom').src = src;
                    document.getElementById('live-story-img-bottom').src = src;
                }

                if (Array.isArray(d.paragraphs) && d.paragraphs.length > 0) {
                    storyParagraphsData = d.paragraphs;
                }
                renderStoryParagraphsInputs();
            }
        } catch (err) {
            console.error('Error fetching Our Story section:', err);
        }
    }

    async function handleStorySubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('story-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        try {
            const formData = new FormData();
            formData.append('page', 'about-us');
            formData.append('tagline', document.getElementById('story-tagline-input').value);
            formData.append('headline', document.getElementById('story-headline-input').value);
            formData.append('paragraphs', JSON.stringify(storyParagraphsData));

            formData.append('image_left', currentStoryData.image_left || 'about_us/our_story/longest.png');
            formData.append('image_top_right', currentStoryData.image_top_right || 'about_us/our_story/top_one.png');
            formData.append('image_bottom_right', currentStoryData.image_bottom_right || 'about_us/our_story/bottom_one.png');

            const fileLeft = document.getElementById('story-file-left').files[0];
            if (fileLeft) formData.append('image_left_file', fileLeft);

            const fileTop = document.getElementById('story-file-top').files[0];
            if (fileTop) formData.append('image_top_right_file', fileTop);

            const fileBottom = document.getElementById('story-file-bottom').files[0];
            if (fileBottom) formData.append('image_bottom_right_file', fileBottom);

            const res = await fetch('/api/about-story/about-us', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Our Story section saved successfully!');
                fetchOurStorySection();
            } else {
                showToast(data.message || 'Error saving Our Story section', 'error');
            }
        } catch (err) {
            showToast('Failed to save to database', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Our Story Section';
            }
        }
    }

    // ==========================================
    // VISION, MISSION & CORE VALUES SCRIPTS
    // ==========================================
    let valuesData = [
        {
            title: 'Vision',
            icon: 'about_us/icons/vision.svg',
            subtitle: 'Contributing to Cambodia\'s Growing Property & Hospitality Industry',
            description: 'To become one of Cambodia\'s most trusted property management and hospitality companies by delivering professional services, creating long-term value for property owners, and supporting the sustainable growth of Cambodia\'s real estate sector.',
            button_text: 'See More'
        },
        {
            title: 'Mission',
            icon: 'about_us/icons/mission.svg',
            subtitle: '',
            description: 'Our mission is to provide professional property management, leasing, and hospitality solutions that benefit both property owners and guests.',
            button_text: 'See More'
        },
        {
            title: 'Core Values',
            icon: 'about_us/icons/core_value.svg',
            subtitle: 'Integrity',
            description: 'We conduct every business relationship with honesty, transparency, and professionalism.',
            button_text: 'See More'
        }
    ];

    function previewValIcon(index, input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('val-icon-preview-' + index);
                const livePreview = document.getElementById('live-val-icon-' + index);
                if (preview) preview.src = e.target.result;
                if (livePreview) livePreview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

        function toggleValSubtitle(index) {
        const toggle = document.getElementById('val-show-sub-' + index);
        const label = document.getElementById('val-sub-label-' + index);
        const textarea = document.getElementById('val-subtitle-' + index);
        const isShown = toggle ? toggle.checked : true;

        if (label) label.innerText = isShown ? 'Show' : 'Hide';
        if (textarea) {
            if (isShown) {
                textarea.classList.remove('opacity-40', 'bg-slate-100');
                textarea.classList.add('bg-white');
            } else {
                textarea.classList.add('opacity-40', 'bg-slate-100');
                textarea.classList.remove('bg-white');
            }
        }
        syncValuesLivePreview();
    }

    function syncValuesLivePreview() {
        for (let i = 0; i < 3; i++) {
            const title = document.getElementById('val-title-' + i)?.value || '';
            const subtitle = document.getElementById('val-subtitle-' + i)?.value || '';
            const desc = document.getElementById('val-desc-' + i)?.value || '';

            const liveTitle = document.getElementById('live-val-title-' + i);
            const liveSub = document.getElementById('live-val-subtitle-' + i);
            const liveDesc = document.getElementById('live-val-desc-' + i);

            if (liveTitle) liveTitle.innerText = title;
            if (liveDesc) liveDesc.innerText = desc;
            const showSub = document.getElementById('val-show-sub-' + i)?.checked ?? true;
            if (liveSub) {
                liveSub.innerText = subtitle;
                if (showSub && subtitle.trim()) {
                    liveSub.classList.remove('hidden');
                } else {
                    liveSub.classList.add('hidden');
                }
            }
        }
    }

    async function fetchValuesSection() {
        try {
            const res = await fetch('/api/about-values/about-us');
            const result = await res.json();
            if (result.success && result.data && Array.isArray(result.data.cards)) {
                valuesData = result.data.cards;
                valuesData.forEach((c, idx) => {
                    if (idx < 3) {
                        const titleEl = document.getElementById('val-title-' + idx);
                        const subEl = document.getElementById('val-subtitle-' + idx);
                        const descEl = document.getElementById('val-desc-' + idx);
                        const btnEl = document.getElementById('val-btn-' + idx);
                        const iconPreview = document.getElementById('val-icon-preview-' + idx);
                        const liveIcon = document.getElementById('live-val-icon-' + idx);

                        if (titleEl) titleEl.value = c.title || '';
                        if (subEl) subEl.value = c.subtitle || '';
                        const showSubToggle = document.getElementById('val-show-sub-' + idx);
                        const isSubShown = typeof c.show_subtitle !== 'undefined' ? !!c.show_subtitle : (idx !== 1 || !!c.subtitle);
                        if (showSubToggle) {
                            showSubToggle.checked = isSubShown;
                            toggleValSubtitle(idx);
                        }
                        if (descEl) descEl.value = c.description || '';
                        
                        if (c.icon) {
                            const src = '/' + c.icon.replace(/^\//, '');
                            if (iconPreview) iconPreview.src = src;
                            if (liveIcon) liveIcon.src = src;
                        }
                    }
                });
                syncValuesLivePreview();
            }
        } catch (err) {
            console.error('Error fetching Values section:', err);
        }
    }

    async function handleValuesSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('values-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        try {
            const cardsPayload = [];
            for (let i = 0; i < 3; i++) {
                cardsPayload.push({
                    title: document.getElementById('val-title-' + i).value,
                    subtitle: document.getElementById('val-subtitle-' + i).value,
                    show_subtitle: document.getElementById('val-show-sub-' + i)?.checked ?? true,
                    description: document.getElementById('val-desc-' + i).value,
                    button_text: 'See More',
                    icon: valuesData[i]?.icon || (i === 0 ? 'about_us/icons/vision.svg' : (i === 1 ? 'about_us/icons/mission.svg' : 'about_us/icons/core_value.svg'))
                });
            }

            const formData = new FormData();
            formData.append('page', 'about-us');
            formData.append('cards', JSON.stringify(cardsPayload));

            for (let i = 0; i < 3; i++) {
                const file = document.getElementById('val-file-' + i).files[0];
                if (file) formData.append('icon_file_' + i, file);
            }

            const res = await fetch('/api/about-values/about-us', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Vision, Mission & Core Values saved successfully!');
                fetchValuesSection();
        fetchShowcaseSection();
        fetchFaqs();
            } else {
                showToast(data.message || 'Error saving Values section', 'error');
            }
        } catch (err) {
            showToast('Failed to save to database', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Vision, Mission & Values';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchOurStorySection();
        fetchValuesSection();
        fetchShowcaseSection();
        fetchFaqs();
    });

    function escapeHtml(text) {
        if (!text) return '';
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    // ==========================================
    // SHOWCASE SECTION JS (3-COLUMN IMAGES)
    // ==========================================
    let showcaseData = null;
    const showcaseFiles = { 1: null, 2: null, 3: null };

    async function fetchShowcaseSection() {
        try {
            const res = await fetch('/api/about-showcase/about-us');
            const data = await res.json();
            if (data.success && data.data) {
                showcaseData = data.data;
                for (let i = 1; i <= 3; i++) {
                    const imgUrl = showcaseData['image_' + i];
                    const altText = showcaseData['alt_' + i];

                    if (imgUrl) {
                        const previewEl = document.getElementById('showcase-preview-' + i);
                        const liveEl = document.getElementById('live-showcase-' + i);
                        const finalSrc = imgUrl.startsWith('http') || imgUrl.startsWith('/') ? imgUrl : ('/' + imgUrl);
                        if (previewEl) previewEl.src = finalSrc;
                        if (liveEl) liveEl.src = finalSrc;
                    }
                    const altEl = document.getElementById('showcase-alt-' + i);
                    if (altEl && altText) altEl.value = altText;
                }
            }
        } catch (e) {
            console.error('Failed to fetch showcase section:', e);
        }
    }

    function previewShowcaseLocalImage(num, input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            showcaseFiles[num] = file;
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewEl = document.getElementById('showcase-preview-' + num);
                const liveEl = document.getElementById('live-showcase-' + num);
                if (previewEl) previewEl.src = e.target.result;
                if (liveEl) liveEl.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function syncShowcaseLivePreview() {
        // live preview syncs alt text or any changes
    }

    async function handleShowcaseSubmit(e) {
        e.preventDefault();
        const btn = document.getElementById('save-showcase-btn');
        const origText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = `<span>Saving...</span>`;

        try {
            const formData = new FormData();
            formData.append('alt_1', document.getElementById('showcase-alt-1').value);
            formData.append('alt_2', document.getElementById('showcase-alt-2').value);
            formData.append('alt_3', document.getElementById('showcase-alt-3').value);

            if (showcaseFiles[1]) formData.append('image_1', showcaseFiles[1]);
            if (showcaseFiles[2]) formData.append('image_2', showcaseFiles[2]);
            if (showcaseFiles[3]) formData.append('image_3', showcaseFiles[3]);

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            const res = await fetch('/api/about-showcase/about-us', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken || '',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (data.success) {
                if (typeof showToast === 'function') {
                    showToast(data.message || 'Showcase section updated successfully!');
                }
                showcaseFiles[1] = null;
                showcaseFiles[2] = null;
                showcaseFiles[3] = null;
                fetchShowcaseSection();
        fetchFaqs();
            } else {
                if (typeof showToast === 'function') {
                    showToast(data.message || 'Failed to update showcase section', 'error');
                }
            }
        } catch (err) {
            console.error(err);
            if (typeof showToast === 'function') {
                showToast('An error occurred while saving showcase images.', 'error');
            }
        } finally {
            btn.disabled = false;
            btn.innerHTML = origText;
        }
    }

    // ==========================================
    // FAQS SECTION JS (ABOUT US PAGE)
    // ==========================================
    let faqsData = [];
    let faqToDeleteId = null;

    async function fetchFaqs() {
        try {
            const res = await fetch('/api/faqs?page=about-us');
            const data = await res.json();
            if (data.success) {
                faqsData = data.data;
                renderFaqsTable();
                renderLivePreview();
            }
        } catch (err) {
            console.error('Failed to load FAQs:', err);
            if (typeof showToast === 'function') showToast('Error loading FAQs from database', 'error');
        }
    }

    function renderFaqsTable() {
        const tbody = document.getElementById('faq-table-body');
        const emptyState = document.getElementById('faq-empty-state');
        const countBadge = document.getElementById('tab-badge-faq-count');

        if (countBadge) countBadge.innerText = faqsData.length;
        if (!tbody) return;

        if (faqsData.length === 0) {
            tbody.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            return;
        }

        if (emptyState) emptyState.classList.add('hidden');
        tbody.innerHTML = faqsData.map((item, index) => `
            <tr class="hover:bg-slate-50/80 transition-colors group">
                <td class="py-3 px-4 text-center text-slate-400 font-mono text-xs">${index + 1}</td>
                <td class="py-3 px-4">
                    <div class="font-semibold text-[#163049] group-hover:text-[#1479B9] transition-colors">${escapeHtml(item.question)}</div>
                </td>
                <td class="py-3 px-4">
                    <div class="text-xs text-slate-600 line-clamp-1">${escapeHtml(item.answer)}</div>
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-semibold ${item.column === 'left' ? 'bg-[#2A5A8A]/10 text-[#2A5A8A]' : 'bg-[#1479B9]/10 text-[#1479B9]'}">
                        ${item.column === 'left' ? 'Left Col' : 'Right Col'}
                    </span>
                </td>
                <td class="py-3 px-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold ${item.status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600'}">
                        ${item.status === 'published' ? 'Published' : 'Draft'}
                    </span>
                </td>
                <td class="py-3 px-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <button type="button" onclick="editFaq(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-[#2A5A8A] text-slate-600 hover:text-white transition-colors cursor-pointer" title="Edit FAQ">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button type="button" onclick="promptDeleteFaq(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-rose-600 text-slate-600 hover:text-white transition-colors cursor-pointer" title="Delete FAQ">
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
                            <div class="faq-item bg-[#f3f3f3] shadow-xs">
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
        const answerBox = panel ? panel.querySelector('div') : null;
        const arrow = btn.querySelector('.preview-faq-arrow');
        const isOpen = btn.getAttribute('aria-expanded') === 'true';

        if (isOpen) {
            if (panel) panel.style.maxHeight = '0px';
            btn.setAttribute('aria-expanded', 'false');
            if (arrow) arrow.classList.remove('rotate-90');
            if (answerBox) {
                answerBox.classList.remove('bg-[#1479B9]', 'text-white');
                answerBox.classList.add('bg-white', 'text-black/70');
            }
        } else {
            if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
            btn.setAttribute('aria-expanded', 'true');
            if (arrow) arrow.classList.add('rotate-90');
            if (answerBox) {
                answerBox.classList.remove('bg-white', 'text-black/70');
                answerBox.classList.add('bg-[#1479B9]', 'text-white');
            }
        }
    }

    function openCreateFaqModal() {
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New About Us FAQ';
        document.getElementById('faq-id').value = '';
        document.getElementById('faq-question').value = '';
        document.getElementById('faq-answer').value = '';
        document.getElementById('faq-column').value = 'left';
        document.getElementById('faq-status').value = 'published';

        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function editFaq(id) {
        const item = faqsData.find(f => Number(f.id) === Number(id));
        if (!item) return;

        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit FAQ #' + item.id;
        document.getElementById('faq-id').value = item.id;
        document.getElementById('faq-question').value = item.question;
        document.getElementById('faq-answer').value = item.answer;
        document.getElementById('faq-column').value = item.column;
        document.getElementById('faq-status').value = item.status;

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
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    async function handleFaqSubmit(e) {
        e.preventDefault();
        const id = document.getElementById('faq-id').value;
        const question = document.getElementById('faq-question').value.trim();
        const answer = document.getElementById('faq-answer').value.trim();
        const column = document.getElementById('faq-column').value;
        const status = document.getElementById('faq-status').value;
        const btn = document.getElementById('faq-submit-btn');

        btn.disabled = true;
        btn.innerText = 'Saving...';

        try {
            const url = id ? `/api/faqs/${id}` : '/api/faqs';
            const method = id ? 'PUT' : 'POST';

            const res = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ page: 'about-us', question, answer, column, status })
            });

            const data = await res.json();
            if (data.success) {
                closeFaqModal();
                fetchFaqs();
                if (typeof showToast === 'function') showToast(data.message || 'FAQ saved successfully!');
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Validation error', 'error');
            }
        } catch (err) {
            console.error('Error saving FAQ:', err);
            if (typeof showToast === 'function') showToast('Failed to save FAQ', 'error');
        } finally {
            btn.disabled = false;
            btn.innerText = 'Save FAQ';
        }
    }

    function promptDeleteFaq(id) {
        faqToDeleteId = id;
        const modal = document.getElementById('faq-delete-modal');
        const card = document.getElementById('faq-delete-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        faqToDeleteId = null;
        const modal = document.getElementById('faq-delete-modal');
        const card = document.getElementById('faq-delete-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    async function confirmDeleteFaq() {
        if (!faqToDeleteId) return;
        const id = faqToDeleteId;

        try {
            const res = await fetch(`/api/faqs/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            const data = await res.json();
            if (data.success) {
                closeDeleteModal();
                fetchFaqs();
                if (typeof showToast === 'function') showToast(data.message || 'FAQ deleted successfully!');
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error deleting FAQ', 'error');
            }
        } catch (err) {
            console.error('Failed to delete FAQ:', err);
            if (typeof showToast === 'function') showToast('Error deleting FAQ', 'error');
        }
    }
</script>
@endpush