@extends('dashboard.layout')

@section('title', 'Home Page Management')

@section('content')
<div class="space-y-8" id="home-dashboard-app">
    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200 pb-6">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">Home Page</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Home Page Content & Sections</h1>
            <p class="text-sm text-slate-500 mt-1">Manage FAQs, Hero Section, Services, Features, and Highlights for the main landing page.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="fetchFaqs()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold text-sm shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4 text-[#2A5A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                <span>Reload from DB</span>
            </button>
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-sm shadow-md transition-all cursor-pointer">
                <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                <span>View Live Site</span>
            </a>
        </div>
    </div>

    {{-- Quick Stat Summary Widgets --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Total FAQs Widget --}}
        <div class="bg-white border border-slate-200/90 rounded-xl p-5 shadow-xs hover:border-[#2A5A8A]/40 transition-colors">
            <div class="flex items-center justify-between text-slate-500 mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total FAQs (Database)</span>
                <div class="w-8 h-8 rounded-lg bg-[#2A5A8A]/10 text-[#2A5A8A] flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-bold text-[#163049]" id="stat-faq-count">...</div>
            <div class="text-xs text-slate-500 mt-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block"></span>
                <span class="text-emerald-700 font-semibold">Live connected</span> to MySQL database
            </div>
        </div>

        {{-- Services List Widget --}}
        <div class="bg-white border border-slate-200/90 rounded-xl p-5 shadow-xs hover:border-[#2A5A8A]/40 transition-colors">
            <div class="flex items-center justify-between text-slate-500 mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Services List</span>
                <div class="w-8 h-8 rounded-lg bg-[#1479B9]/10 text-[#1479B9] flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-bold text-[#163049]">4 Services</div>
            <div class="text-xs text-slate-500 mt-1">Management, Leasing, Sales, Hospitality</div>
        </div>

        {{-- Why Choose Us Widget --}}
        <div class="bg-white border border-slate-200/90 rounded-xl p-5 shadow-xs hover:border-[#2A5A8A]/40 transition-colors">
            <div class="flex items-center justify-between text-slate-500 mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Why Choose Us</span>
                <div class="w-8 h-8 rounded-lg bg-[#8a6a3a]/15 text-[#8a6a3a] flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-bold text-[#163049]">5 Features</div>
            <div class="text-xs text-slate-500 mt-1">Highlighted on homepage</div>
        </div>

        {{-- Page Status Widget --}}
        <div class="bg-white border border-slate-200/90 rounded-xl p-5 shadow-xs hover:border-[#2A5A8A]/40 transition-colors">
            <div class="flex items-center justify-between text-slate-500 mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Backend Status</span>
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-bold text-emerald-600">Database Active</div>
            <div class="text-xs text-slate-500 mt-1">Changes sync instantly to live frontend</div>
        </div>
    </div>

    {{-- Tabs for Home page sections with Left/Right Arrow Scroll Buttons --}}
    <div class="relative flex items-center border-b border-slate-200 group">
        {{-- Left Scroll Button --}}
        <button type="button" onclick="scrollTabsBar(-1)" id="tabs-scroll-prev" aria-label="Scroll tabs left" class="shrink-0 p-1.5 rounded-lg text-slate-400 hover:text-[#163049] hover:bg-slate-100 transition-colors mr-1 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        {{-- Tabs Track Container (Matching Exact Homepage Order) --}}
        <div id="tabs-nav-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            {{-- 1. Hero & Banner --}}
            <button type="button" onclick="switchTab('hero', event)" id="tab-btn-hero" class="tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-bold border-b-2 border-[#2A5A8A] text-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            {{-- 2. Our Services Cards --}}
            <button type="button" onclick="switchTab('services', event)" id="tab-btn-services" class="tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span class="whitespace-nowrap">Our Services Cards</span>
            </button>

            {{-- 3. Featured Properties --}}
            <button type="button" onclick="switchTab('properties', event)" id="tab-btn-properties" class="tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="whitespace-nowrap">Featured Properties</span>
                <span class="text-[11px] bg-[#1479B9]/10 text-[#1479B9] font-bold px-2 py-0.5 rounded-full" id="tab-badge-prop-count">6</span>
            </button>

            {{-- 4. Why Choose Us --}}
            <button type="button" onclick="switchTab('why-us', event)" id="tab-btn-why-us" class="tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="whitespace-nowrap">Why Choose Us</span>
            </button>

            {{-- 5. FAQs Section --}}
            <button type="button" onclick="switchTab('faqs', event)" id="tab-btn-faqs" class="tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">FAQs Section</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full" id="tab-badge-faq-count">8</span>
            </button>

            {{-- 6. Latest Activities --}}
            <button type="button" onclick="switchTab('activities', event)" id="tab-btn-activities" class="tab-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
                <span class="whitespace-nowrap">Latest Activities</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full" id="tab-badge-activity-count">6</span>
            </button>
        </div>

        {{-- Right Scroll Button --}}
        <button type="button" onclick="scrollTabsBar(1)" id="tabs-scroll-next" aria-label="Scroll tabs right" class="shrink-0 p-1.5 rounded-lg text-slate-400 hover:text-[#163049] hover:bg-slate-100 transition-colors ml-1 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    {{-- ======================================================== --}}
    {{-- TAB 1: FAQS SECTION (CONNECTED TO LARAVEL MYSQL BACKEND) --}}
    {{-- ======================================================== --}}
    <div id="tab-content-faqs" class="tab-content space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Database Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers in your database.</p>
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
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Homepage Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Preview with real frontend styling</span>
            </div>
            
            <div class="mt-6 bg-[#e5e4e4] rounded-xl px-4 sm:px-10 py-10 sm:py-14 text-slate-900 shadow-inner">
                <div class="max-w-[1400px] mx-auto">
                    {{-- Homepage Heading placed right on top of the accordion grid --}}
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

    {{-- ======================================================== --}}
    {{-- TAB 2: HERO SECTION MANAGER                              --}}
    {{-- ======================================================== --}}
    <div id="tab-content-hero" class="tab-content hidden space-y-6">
        {{-- Hero Settings Configuration Form (Placed on TOP) --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="border-b border-slate-200 pb-4 mb-6">
                <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                    <span>Hero Section Configuration</span>
                    <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Home Landing Hero</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize tagline color schemes, headline text, bullet highlights, and up to 3 action buttons.</p>
            </div>

            <form onsubmit="handleHeroSubmit(event)" class="space-y-6">
                {{-- SECTION 1: CLEAN WYSIWYG TAGLINE EDITOR --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Tagline Text</label>
                        <div class="flex items-center gap-1.5">
                            <button type="button" onmousedown="event.preventDefault(); document.execCommand('bold', false, null); updateHeroPreview();" class="px-3 py-1 bg-white border border-slate-300 hover:bg-[#2A5A8A] hover:text-white text-slate-800 rounded font-bold text-xs shadow-xs transition-colors flex items-center gap-1 cursor-pointer" title="Select text and click Bold">
                                <span class="font-black text-sm">B</span>
                                <span class="text-xs">Bold</span>
                            </button>
                            <button type="button" onmousedown="event.preventDefault(); document.execCommand('removeFormat', false, null); updateHeroPreview();" class="px-2.5 py-1 bg-white border border-slate-300 hover:bg-slate-100 text-slate-500 rounded text-xs transition-colors cursor-pointer" title="Remove Bold">
                                Normal
                            </button>
                        </div>
                    </div>

                    {{-- Visual Rich Text Contenteditable Box --}}
                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all"><b>CWD</b> Real Estate Agent & Developer</div>
                </div>

                {{-- SECTION 2: MAIN HEADLINE --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline (H1)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Headline Title</label>
                        <textarea id="hero-headline-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">Your Trusted Property Management & Hospitality Partner in Cambodia</textarea>
                    </div>
                </div>

                {{-- SECTION 3: BULLET HIGHLIGHTS LIST (ADD MORE DYNAMICALLY) --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights List</h3>
                            <p class="text-xs text-slate-500">Add, edit, or remove highlights (e.g. • Flexible income • Strong brand • Real projects • Full sales support)</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="addBulletPoint()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
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

                    {{-- Dynamic Bullets Container --}}
                    <div id="dynamic-bullets-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        {{-- Populated via Javascript --}}
                    </div>
                </div>

                {{-- SECTION 4: CALL TO ACTION BUTTONS (MAX 3) --}}
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

                    {{-- Dynamic Buttons Container --}}
                    <div id="hero-buttons-container" class="space-y-3">
                        {{-- Rendered dynamically via JS --}}
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="button" onclick="showToast('Reset to default homepage values')" class="px-4 py-2.5 rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-100 text-xs sm:text-sm font-semibold">
                        Reset Defaults
                    </button>
                    <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Hero Section
                    </button>
                </div>
            </form>
        </div>

        {{-- Live Hero Section Preview (Placed on BOTTOM) --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Hero Section Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview with your custom colors & buttons</span>
            </div>

            {{-- Visual Hero Simulation Container --}}
            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[360px] flex items-center p-6 sm:p-10 border border-slate-800">
                {{-- Background simulated city image --}}
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('{{ asset('hero_section/hero_section.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                {{-- Hero card replica --}}
                <div class="relative z-10 max-w-[650px] w-full">
                    {{-- Gold accent bar --}}
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        {{-- Tagline / Header line --}}
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-bold text-[#F4DEAC]">
                                <span class="font-bold text-[#F4DEAC]">CWD</span>
                                <span class="font-normal text-[#F4DEAC] ml-1">Real Estate Agent & Developer</span>
                            </span>
                        </div>

                        {{-- Main Headline --}}
                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-4">
                            Your Trusted Property Management & Hospitality Partner in Cambodia
                        </h1>

                        {{-- Bullet points list (if enabled) --}}
                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] sm:text-[14px] mb-6 flex flex-wrap items-center gap-x-3 gap-y-1">
                            <span>• Flexible income</span>
                            <span>• Strong brand</span>
                            <span>• Real projects</span>
                            <span>• Full sales support</span>
                        </div>

                        {{-- Action buttons --}}
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

    {{-- TAB 3: SERVICES --}}
    <div id="tab-content-services" class="tab-content hidden space-y-6">
        <form onsubmit="handleServicesSubmit(event)" class="space-y-6">
            {{-- Services Configuration Header & Right Image Section --}}
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                            <span>Our Services Section Configuration</span>
                            <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#1479B9]/10 text-[#1479B9] font-semibold">4 Cards & Right Side Image</span>
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Edit title, description, target link for each service card, and update the right-side cover image.</p>
                    </div>
                    
                </div>

                {{-- Right Side Image Manager --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Right-Side Cover Image</h3>
                            <p class="text-xs text-slate-500">Image will automatically fill and stretch to perfectly fit the fixed aspect container (460px / 640px height).</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                        {{-- Image Preview Box --}}
                        <div class="relative w-full h-48 sm:h-56 bg-slate-900 rounded-lg overflow-hidden border border-slate-300 shadow-xs flex flex-col justify-end">
                            <img id="services-preview-image" src="{{ asset('home/our_services/our_services.png') }}" alt="Services Image Preview" class="w-full h-full object-cover object-center">
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent p-3 flex items-center justify-between">
                                <span class="text-[11px] text-white/90 font-medium">Cover Container Preview</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-emerald-500 text-white font-bold">Auto-Fit Object Cover</span>
                            </div>
                        </div>

                        {{-- Image Upload Controls --}}
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Upload New Image File</label>
                                <input type="file" id="services-image-file" accept="image/*" onchange="previewServicesImageFile(this)" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                                <span class="text-[11px] text-slate-400 mt-1 block">Supports JPG, PNG, WEBP. Small or large images will stretch cleanly to fill the full container.</span>
                                <input type="hidden" id="services-image-url" value="home/our_services/our_services.png">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4 Services Cards Editable Fields --}}
                <div class="space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Services Cards (4 Cards)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="services-cards-editor-container">
                        {{-- Card 1 --}}
                        <div class="p-5 rounded-xl bg-[#1479B9] text-white shadow-sm space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#F4DEAC]">Card 01</span>
                                <input type="text" id="svc-card-number-0" value="01" class="w-12 px-2 py-1 bg-white/10 border border-white/20 rounded text-center text-xs font-bold text-[#F4DEAC]">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-[#F4DEAC] mb-1">Title</label>
                                <input type="text" id="svc-card-title-0" value="Property Management" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-sm font-bold text-[#F4DEAC] placeholder-white/50 focus:outline-none focus:bg-white/25">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-white/80 mb-1">Description</label>
                                <textarea id="svc-card-desc-0" rows="3" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-xs text-white placeholder-white/50 focus:outline-none focus:bg-white/25 leading-relaxed">Professional management for condominium owners, including tenant coordination, maintenance supervision, occupancy management, and rental administration.</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2 border-t border-white/20">
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Link Target</label>
                                    <input type="text" id="svc-card-link-0" value="/services/property-management" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Button Label</label>
                                    <input type="text" id="svc-card-linktext-0" value="View Details" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-[#F4DEAC]">
                                </div>
                            </div>
                        </div>

                        {{-- Card 2 --}}
                        <div class="p-5 rounded-xl bg-[#1479B9] text-white shadow-sm space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#F4DEAC]">Card 02</span>
                                <input type="text" id="svc-card-number-1" value="02" class="w-12 px-2 py-1 bg-white/10 border border-white/20 rounded text-center text-xs font-bold text-[#F4DEAC]">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-[#F4DEAC] mb-1">Title</label>
                                <input type="text" id="svc-card-title-1" value="Property Leasing" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-sm font-bold text-[#F4DEAC] placeholder-white/50 focus:outline-none focus:bg-white/25">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-white/80 mb-1">Description</label>
                                <textarea id="svc-card-desc-1" rows="3" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-xs text-white placeholder-white/50 focus:outline-none focus:bg-white/25 leading-relaxed">Daily, weekly, monthly, and long-term rental services for residential condominiums.</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2 border-t border-white/20">
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Link Target</label>
                                    <input type="text" id="svc-card-link-1" value="/services/property-leasing" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Button Label</label>
                                    <input type="text" id="svc-card-linktext-1" value="View Properties" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-[#F4DEAC]">
                                </div>
                            </div>
                        </div>

                        {{-- Card 3 --}}
                        <div class="p-5 rounded-xl bg-[#1479B9] text-white shadow-sm space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#F4DEAC]">Card 03</span>
                                <input type="text" id="svc-card-number-2" value="03" class="w-12 px-2 py-1 bg-white/10 border border-white/20 rounded text-center text-xs font-bold text-[#F4DEAC]">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-[#F4DEAC] mb-1">Title</label>
                                <input type="text" id="svc-card-title-2" value="Sales Services" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-sm font-bold text-[#F4DEAC] placeholder-white/50 focus:outline-none focus:bg-white/25">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-white/80 mb-1">Description</label>
                                <textarea id="svc-card-desc-2" rows="3" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-xs text-white placeholder-white/50 focus:outline-none focus:bg-white/25 leading-relaxed">Helping buyers and investors discover quality residential properties in Cambodia.</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2 border-t border-white/20">
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Link Target</label>
                                    <input type="text" id="svc-card-link-2" value="/insights" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Button Label</label>
                                    <input type="text" id="svc-card-linktext-2" value="Learn More" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-[#F4DEAC]">
                                </div>
                            </div>
                        </div>

                        {{-- Card 4 --}}
                        <div class="p-5 rounded-xl bg-[#1479B9] text-white shadow-sm space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#F4DEAC]">Card 04</span>
                                <input type="text" id="svc-card-number-3" value="04" class="w-12 px-2 py-1 bg-white/10 border border-white/20 rounded text-center text-xs font-bold text-[#F4DEAC]">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-[#F4DEAC] mb-1">Title</label>
                                <input type="text" id="svc-card-title-3" value="Hospitality Services" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-sm font-bold text-[#F4DEAC] placeholder-white/50 focus:outline-none focus:bg-white/25">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold uppercase text-white/80 mb-1">Description</label>
                                <textarea id="svc-card-desc-3" rows="3" class="w-full px-3 py-2 bg-white/15 border border-white/25 rounded-md text-xs text-white placeholder-white/50 focus:outline-none focus:bg-white/25 leading-relaxed">Airport transfers, guest assistance, city tours, housekeeping coordination, and personalized hospitality support.</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2 border-t border-white/20">
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Link Target</label>
                                    <input type="text" id="svc-card-link-3" value="/services/hospitality-services" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase text-white/70 mb-1">Button Label</label>
                                    <input type="text" id="svc-card-linktext-3" value="Explore Services" class="w-full px-2 py-1.5 bg-white/10 border border-white/20 rounded text-[11px] text-[#F4DEAC]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
                    <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Services Section
                    </button>
                </div>
            </div>
        </form>

        {{-- LIVE HOMEPAGE SERVICES PREVIEW (BELOW FORM) --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Homepage Services Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Real-time simulation matching the public homepage</span>
            </div>

            {{-- Live Services Container Simulation --}}
            <div class="bg-[#f8fafc] border border-slate-200 rounded-xl p-6 sm:p-10 overflow-hidden">
                {{-- Heading --}}
                <h2 class="text-2xl sm:text-3xl font-normal text-[#2f6ba7] mb-8">
                    <span>Our</span> <span class="font-bold">Services</span>
                </h2>

                {{-- Interactive Replica Grid --}}
                <div class="relative flex flex-col lg:flex-row lg:items-start min-h-[420px]">
                    {{-- Right Side Image --}}
                    <div class="flex flex-col items-end w-full lg:w-[58%] lg:order-2">
                        <div class="w-full h-[320px] sm:h-[420px] overflow-hidden bg-slate-900 shadow-md">
                            <img id="live-preview-services-image" src="{{ asset('home/our_services/our_services.png') }}" alt="Services Live Preview" class="w-full h-full object-cover object-center block">
                        </div>
                        <div class="self-end w-[81%] h-[10px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    </div>

                    {{-- Left Overlapping Cards --}}
                    <div class="relative w-full lg:w-[52%] lg:order-1 lg:z-[30] lg:-mr-[60px] lg:mt-[40px] -mt-12 lg:mt-0 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        {{-- Preview Card 01 --}}
                        <div class="bg-[#1479B9] p-4 sm:p-5 flex flex-col justify-between shadow-md text-white min-h-[140px]">
                            <div class="flex items-start justify-between gap-2">
                                <h3 id="live-card-title-0" class="text-[#F4DEAC] text-[15px] sm:text-[16px] font-bold leading-snug">Property Management</h3>
                                <span id="live-card-number-0" class="text-[#F4DEAC] text-[22px] sm:text-[26px] font-light leading-none">01</span>
                            </div>
                            <p id="live-card-desc-0" class="text-white/90 text-xs sm:text-[13px] leading-relaxed mt-2">
                                Professional management for condominium owners, including tenant coordination, maintenance supervision, occupancy management, and rental administration.
                            </p>
                            <span id="live-card-link-0" class="text-[#F4DEAC] text-xs font-medium mt-3 inline-flex items-center gap-1">
                                View Details →
                            </span>
                        </div>

                        {{-- Preview Card 02 --}}
                        <div class="bg-[#1479B9] p-4 sm:p-5 flex flex-col justify-between shadow-md text-white min-h-[140px]">
                            <div class="flex items-start justify-between gap-2">
                                <h3 id="live-card-title-1" class="text-[#F4DEAC] text-[15px] sm:text-[16px] font-bold leading-snug">Property Leasing</h3>
                                <span id="live-card-number-1" class="text-[#F4DEAC] text-[22px] sm:text-[26px] font-light leading-none">02</span>
                            </div>
                            <p id="live-card-desc-1" class="text-white/90 text-xs sm:text-[13px] leading-relaxed mt-2">
                                Daily, weekly, monthly, and long-term rental services for residential condominiums.
                            </p>
                            <span id="live-card-link-1" class="text-[#F4DEAC] text-xs font-medium mt-3 inline-flex items-center gap-1">
                                View Properties →
                            </span>
                        </div>

                        {{-- Preview Card 03 --}}
                        <div class="bg-[#1479B9] p-4 sm:p-5 flex flex-col justify-between shadow-md text-white min-h-[140px]">
                            <div class="flex items-start justify-between gap-2">
                                <h3 id="live-card-title-2" class="text-[#F4DEAC] text-[15px] sm:text-[16px] font-bold leading-snug">Sales Services</h3>
                                <span id="live-card-number-2" class="text-[#F4DEAC] text-[22px] sm:text-[26px] font-light leading-none">03</span>
                            </div>
                            <p id="live-card-desc-2" class="text-white/90 text-xs sm:text-[13px] leading-relaxed mt-2">
                                Helping buyers and investors discover quality residential properties in Cambodia.
                            </p>
                            <span id="live-card-link-2" class="text-[#F4DEAC] text-xs font-medium mt-3 inline-flex items-center gap-1">
                                Learn More →
                            </span>
                        </div>

                        {{-- Preview Card 04 --}}
                        <div class="bg-[#1479B9] p-4 sm:p-5 flex flex-col justify-between shadow-md text-white min-h-[140px]">
                            <div class="flex items-start justify-between gap-2">
                                <h3 id="live-card-title-3" class="text-[#F4DEAC] text-[15px] sm:text-[16px] font-bold leading-snug">Hospitality Services</h3>
                                <span id="live-card-number-3" class="text-[#F4DEAC] text-[22px] sm:text-[26px] font-light leading-none">04</span>
                            </div>
                            <p id="live-card-desc-3" class="text-white/90 text-xs sm:text-[13px] leading-relaxed mt-2">
                                Airport transfers, guest assistance, city tours, housekeeping coordination, and personalized hospitality support.
                            </p>
                            <span id="live-card-link-3" class="text-[#F4DEAC] text-xs font-medium mt-3 inline-flex items-center gap-1">
                                Explore Services →
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================== --}}
    {{-- TAB: FEATURED PROPERTIES MANAGER                         --}}
    {{-- ======================================================== --}}
    <div id="tab-content-properties" class="tab-content hidden space-y-6">
        {{-- Database Properties Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Featured Properties</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#1479B9]/10 text-[#1479B9] font-semibold">Carousel Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage and add more properties to the Featured Properties slider on the homepage.</p>
                </div>
                <button onclick="openPropertyModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs sm:text-sm font-bold shadow-sm transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add New Property</span>
                </button>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-[11px] uppercase tracking-wider text-[#2A5A8A] font-bold border-b border-slate-200">
                        <tr>
                            <th class="py-3.5 px-4 w-12 text-center">#</th>
                            <th class="py-3.5 px-4 w-20 text-center">Image</th>
                            <th class="py-3.5 px-4">Property Title</th>
                            <th class="py-3.5 px-4">Description</th>
                            <th class="py-3.5 px-4">Target Link</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="property-table-body" class="divide-y divide-slate-100">
                        {{-- Populated by JS --}}
                    </tbody>
                </table>

                <div id="property-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm text-slate-400">No properties found in database. Click "Add New Property" to create one.</p>
                </div>
            </div>
        </div>

        {{-- Live Featured Properties Carousel Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Homepage Slider Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Real-time preview of cards in the homepage carousel</span>
            </div>

            <div class="relative bg-slate-900 rounded-xl overflow-hidden p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-right opacity-30" style="background-image: url('{{ asset('home/feature_properties/feature_properties.png') }}');"></div>
                <div class="relative z-10">
                    <h2 class="text-[#F4DEAC] text-xl sm:text-2xl font-bold mb-6">
                        <span class="font-normal block">Featured</span>
                        <span class="block">Properties</span>
                    </h2>

                    {{-- Horizontal scroll container --}}
                    <div id="live-property-track" class="flex gap-4 overflow-x-auto pb-4 pt-1 [scrollbar-width:thin]">
                        {{-- Rendered dynamically via JS --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: CREATE / EDIT PROPERTY --}}
    <div id="property-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
        <div class="bg-white border border-slate-200 w-full max-w-lg rounded-xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="property-modal-card">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
                <h3 class="text-base font-bold text-white flex items-center gap-2" id="property-modal-title">
                    <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                    Add New Featured Property
                </h3>
                <button onclick="closePropertyModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="property-form" onsubmit="handlePropertySubmit(event)" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
                <input type="hidden" id="prop-id" value="">

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Property Title <span class="text-rose-500">*</span></label>
                    <input type="text" id="prop-title" required placeholder="e.g. Wealth Mansion or UC88 Residence" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Description <span class="text-rose-500">*</span></label>
                    <textarea id="prop-desc" required rows="3" placeholder="Enter concise property highlights..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Property Image</label>
                    <input type="file" id="prop-image-file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                    <input type="hidden" id="prop-image-url" value="home/latest_activities/1img.png">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Page Link URL <span class="text-rose-500">*</span></label>
                        <input type="text" id="prop-link" required value="/properties/wealth-mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Button Text</label>
                        <input type="text" id="prop-link-text" value="View Property" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status</label>
                        <select id="prop-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Sort Order</label>
                        <input type="number" id="prop-sort-order" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <button type="button" onclick="closePropertyModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" id="prop-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Property
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- DELETE PROPERTY MODAL --}}
    <div id="delete-prop-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
        <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-prop-modal-card">
            <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
            <h3 class="text-base font-bold text-[#163049] mb-1">Delete Property?</h3>
            <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this featured property from the homepage?</p>

            <input type="hidden" id="delete-prop-id">

            <div class="flex items-center justify-center gap-3">
                <button type="button" onclick="closeDeletePropModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                    Cancel
                </button>
                <button type="button" onclick="confirmDeleteProperty()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

    {{-- TAB 4: WHY CHOOSE US --}}
    <div id="tab-content-why-us" class="tab-content hidden space-y-6">
        <form onsubmit="handleWhyChooseUsSubmit(event)" class="space-y-6">
            {{-- Section Heading & Alignment Settings --}}
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                            <span>Why Choose Us Section</span>
                            <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Heading & Alignment</span>
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the heading lines, choose between Left-aligned or Center-aligned heading, and edit the 5 highlight cards.</p>
                    </div>
                    <button type="submit" id="why-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Why Choose Us
                    </button>
                </div>

                {{-- Heading Text & Alignment Selector --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-5 bg-slate-50 rounded-xl border border-slate-200">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1.5">Heading Line 1</label>
                        <input type="text" id="why-heading-1" value="Why Choose" oninput="syncWhyLivePreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1.5">Heading Line 2</label>
                        <input type="text" id="why-heading-2" value="CWD Realty & Hospitality?" oninput="syncWhyLivePreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1.5">Heading Alignment</label>
                        <div class="grid grid-cols-2 gap-2">
                            <button type="button" onclick="setWhyAlignment('left')" id="why-align-btn-left" class="px-4 py-2.5 rounded-lg border-2 border-[#2A5A8A] bg-[#2A5A8A] text-white text-xs font-bold flex items-center justify-center gap-2 cursor-pointer transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h14"></path>
                                </svg>
                                <span>Left</span>
                            </button>
                            <button type="button" onclick="setWhyAlignment('center')" id="why-align-btn-center" class="px-4 py-2.5 rounded-lg border-2 border-slate-300 bg-white text-slate-700 text-xs font-bold flex items-center justify-center gap-2 cursor-pointer transition-all hover:bg-slate-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M7 12h10M5 18h14"></path>
                                </svg>
                                <span>Center</span>
                            </button>
                        </div>
                        <input type="hidden" id="why-text-align" value="left">
                    </div>
                </div>

                {{-- 5 Highlight Cards Editor --}}
                <div class="space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Highlight Pillar Cards (5 Items)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="why-items-editor-container">
                        {{-- Rendered dynamically or via 5 static inputs --}}
                        @for ($i = 0; $i < 5; $i++)
                            <div class="p-4 bg-white border-2 border-[#2A5A8A] rounded-xl space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Pillar {{ $i + 1 }}</span>
                                    <span class="w-2 h-2 rounded-full bg-[#2A5A8A]"></span>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 mb-1">Title</label>
                                    <input type="text" id="why-card-title-{{ $i }}" oninput="syncWhyLivePreview()" class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-md text-xs font-bold text-[#2A5A8A] focus:outline-none focus:bg-white focus:border-[#2A5A8A]">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-700 mb-1">Description</label>
                                    <textarea id="why-card-desc-{{ $i }}" oninput="syncWhyLivePreview()" rows="3" class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-md text-xs text-slate-700 focus:outline-none focus:bg-white focus:border-[#2A5A8A] leading-relaxed"></textarea>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </form>

        {{-- Live Why Choose Us Section Preview (Below Form) --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Homepage Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Real-time simulation of the Why Choose Us section</span>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 sm:p-10">
                {{-- Live Heading --}}
                <div id="live-why-heading-container" class="mb-10 text-left">
                    <h2 class="text-2xl sm:text-3xl leading-tight">
                        <span id="live-why-heading-1" class="text-[#2A5A8A] font-normal block">Why Choose</span>
                        <span id="live-why-heading-2" class="text-[#2A5A8A] font-bold block">CWD Realty & Hospitality?</span>
                    </h2>
                </div>

                {{-- Live Cards Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="bg-white border-2 border-[#2A5A8A] p-5 shadow-xs flex flex-col justify-between min-h-[140px]">
                            <h3 id="live-why-card-title-{{ $i }}" class="text-[#2A5A8A] text-sm font-bold mb-2 leading-snug">Card Title</h3>
                            <p id="live-why-card-desc-{{ $i }}" class="text-black text-xs leading-relaxed">Card Description</p>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================== --}}
    {{-- TAB 6: LATEST ACTIVITIES MANAGER                         --}}
    {{-- ======================================================== --}}
    <div id="tab-content-activities" class="tab-content hidden space-y-6">
        {{-- Database Activities Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Latest Activities</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Grid & Hover Effects</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize images, titles, and descriptions that appear when users hover over the activity cards.</p>
                </div>
                <button onclick="openActivityModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs sm:text-sm font-bold shadow-sm transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add New Activity</span>
                </button>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-[11px] uppercase tracking-wider text-[#2A5A8A] font-bold border-b border-slate-200">
                        <tr>
                            <th class="py-3.5 px-4 w-12 text-center">#</th>
                            <th class="py-3.5 px-4 w-20 text-center">Image</th>
                            <th class="py-3.5 px-4">Title</th>
                            <th class="py-3.5 px-4">Hover Description</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="activity-table-body" class="divide-y divide-slate-100">
                        {{-- Populated by JS --}}
                    </tbody>
                </table>

                <div id="activity-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm text-slate-400">No activities found. Click "Add New Activity" to create one.</p>
                </div>
            </div>
        </div>

        {{-- Live Hover Simulation Grid --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Homepage Hover Grid Simulation</h3>
                </div>
                <span class="text-xs text-slate-500">Hover over any card below to test the live title & description animation</span>
            </div>

            <div class="bg-slate-900/5 p-6 rounded-xl border border-slate-200">
                <h2 class="text-2xl font-normal text-[#2A5A8A] mb-6">
                    <span>Latest</span> <strong>Activities</strong>
                </h2>

                <div id="live-activities-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    {{-- Rendered dynamically via JS with hover effect --}}
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: CREATE / EDIT ACTIVITY --}}
    <div id="activity-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
        <div class="bg-white border border-slate-200 w-full max-w-lg rounded-xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="activity-modal-card">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
                <h3 class="text-base font-bold text-white flex items-center gap-2" id="activity-modal-title">
                    <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                    Add New Activity
                </h3>
                <button onclick="closeActivityModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="activity-form" onsubmit="handleActivitySubmit(event)" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
                <input type="hidden" id="act-id" value="">

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Activity Title <span class="text-rose-500">*</span></label>
                    <input type="text" id="act-title" required placeholder="e.g. Wealth Mansion or Golden Tower" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Hover Description <span class="text-rose-500">*</span></label>
                    <textarea id="act-desc" required rows="3" placeholder="Enter description that appears on hover..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Activity Image</label>
                    <input type="file" id="act-image-file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                    <input type="hidden" id="act-image-url" value="home/latest_activities/1img.png">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status</label>
                        <select id="act-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Sort Order</label>
                        <input type="number" id="act-sort-order" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeActivityModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" id="act-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Activity
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- DELETE ACTIVITY MODAL --}}
    <div id="delete-act-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
        <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-act-modal-card">
            <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
            <h3 class="text-base font-bold text-[#163049] mb-1">Delete Activity?</h3>
            <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this activity from the homepage grid?</p>

            <input type="hidden" id="delete-act-id">

            <div class="flex items-center justify-center gap-3">
                <button type="button" onclick="closeDeleteActModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                    Cancel
                </button>
                <button type="button" onclick="confirmDeleteActivity()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all">
                    Yes, Delete
                </button>
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
            <button onclick="closeFaqModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="faq-form" onsubmit="handleFaqSubmit(event)" class="p-6 space-y-4">
            <input type="hidden" id="faq-id" value="">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">Question <span class="text-rose-500">*</span></label>
                <input type="text" id="faq-question" required placeholder="e.g., Are pets allowed in the condominium?" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">Answer <span class="text-rose-500">*</span></label>
                <textarea id="faq-answer" required rows="4" placeholder="Enter detailed answer..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#2A5A8A]"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">Display Column</label>
                    <select id="faq-column" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="left">Left Column</option>
                        <option value="right">Right Column</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">Status</label>
                    <select id="faq-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closeFaqModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                    Cancel
                </button>
                <button type="submit" id="faq-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save to Database
                </button>
            </div>
        </form>
    </div>
</div>

{{-- DELETE CONFIRMATION MODAL --}}
<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-modal-card">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete FAQ from Database?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to permanently delete this FAQ item from MySQL?</p>

        <input type="hidden" id="delete-faq-id">

        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                Cancel
            </button>
            <button type="button" id="confirm-delete-btn" onclick="confirmDeleteFaq()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all">
                Yes, Delete
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let faqsData = [];
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    document.addEventListener('DOMContentLoaded', () => {
        fetchFaqs();
    });

    function scrollTabsBar(direction) {
        const track = document.getElementById('tabs-nav-track');
        if (!track) return;
        track.scrollBy({
            left: direction * 220,
            behavior: 'smooth'
        });
    }

    function switchTab(tabKey, e) {
        if (e && e.preventDefault) e.preventDefault();

        // Capture exact current scroll position of the page
        const currentScrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
            btn.classList.add('border-transparent', 'text-slate-500', 'font-medium');
        });
        document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));

        const targetBtn = document.getElementById('tab-btn-' + tabKey);
        const targetContent = document.getElementById('tab-content-' + tabKey);

        if (targetContent) {
            targetContent.classList.remove('hidden');
        }

        if (targetBtn) {
            targetBtn.classList.add('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
            targetBtn.classList.remove('border-transparent', 'text-slate-500', 'font-medium');
            
            // Only scroll the horizontal tabs track container, NOT the window/page
            const track = document.getElementById('tabs-nav-track');
            if (track) {
                const btnLeft = targetBtn.offsetLeft;
                const btnWidth = targetBtn.offsetWidth;
                const trackWidth = track.offsetWidth;
                track.scrollTo({
                    left: btnLeft - (trackWidth / 2) + (btnWidth / 2),
                    behavior: 'smooth'
                });
            }
        }

        // Restore exact vertical scroll position so page never jumps
        window.scrollTo({
            top: currentScrollY,
            behavior: 'instant'
        });
    }

    async function fetchFaqs() {
        try {
            const res = await fetch('/api/faqs');
            const data = await res.json();
            if (data.success) {
                faqsData = data.data;
                renderFaqsTable();
                renderLivePreview();
                showToast('Loaded ' + faqsData.length + ' FAQs from database');
            }
        } catch (err) {
            console.error('Failed to load FAQs:', err);
            showToast('Error loading FAQs from database');
        }
    }

    function renderFaqsTable() {
        const tbody = document.getElementById('faq-table-body');
        const emptyState = document.getElementById('faq-empty-state');
        const countBadge = document.getElementById('tab-badge-faq-count');
        const statCount = document.getElementById('stat-faq-count');

        if (countBadge) countBadge.innerText = faqsData.length;
        if (statCount) statCount.innerText = faqsData.length;

        if (faqsData.length === 0) {
            tbody.innerHTML = '';
            emptyState.classList.remove('hidden');
            return;
        }

        emptyState.classList.add('hidden');
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
                        <button onclick="editFaq(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-[#2A5A8A] text-slate-600 hover:text-white transition-colors cursor-pointer" title="Edit FAQ">
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
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Homepage FAQ';
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

        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit FAQ Item #' + item.id;
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
                body: JSON.stringify({ question, answer, column, status })
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast(data.message);
                closeFaqModal();
                await fetchFaqs();
            } else {
                showToast(data.message || 'Validation error');
            }
        } catch (err) {
            console.error('Error saving FAQ:', err);
            showToast('Failed to save to database');
        } finally {
            btn.disabled = false;
            btn.innerText = 'Save to Database';
        }
    }

    function promptDeleteFaq(id) {
        document.getElementById('delete-faq-id').value = id;
        const modal = document.getElementById('delete-modal');
        const card = document.getElementById('delete-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        const card = document.getElementById('delete-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    async function confirmDeleteFaq() {
        const id = document.getElementById('delete-faq-id').value;
        const btn = document.getElementById('confirm-delete-btn');
        btn.disabled = true;
        btn.innerText = 'Deleting...';

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
                showToast('FAQ deleted from database');
                closeDeleteModal();
                await fetchFaqs();
            } else {
                showToast('Error deleting FAQ');
            }
        } catch (err) {
            console.error('Delete error:', err);
            showToast('Failed to delete from database');
        } finally {
            btn.disabled = false;
            btn.innerText = 'Yes, Delete';
        }
    }

    // ==========================================
    // HERO SECTION STATE & INTERACTIVITY
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
        { label: 'Events (/events)', url: '/events' },
    ];

    let heroButtonsData = [
        { text: 'Browse Properties', url: '/properties' },
        { text: 'Contact Us', url: '/contact-us' }
    ];

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        const addBtnTrigger = document.getElementById('add-btn-trigger');
        if (!container) return;

        if (heroButtonsData.length >= 3) {
            if (addBtnTrigger) addBtnTrigger.classList.add('hidden');
        } else {
            if (addBtnTrigger) addBtnTrigger.classList.remove('hidden');
        }

        container.innerHTML = heroButtonsData.map((btn, index) => `
            <div class="p-3.5 bg-white border border-slate-200 rounded-lg shadow-xs flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">
                    ${index + 1}
                </span>

                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Button Label</label>
                    <input type="text" value="${escapeHtml(btn.text)}" oninput="updateHeroButtonText(${index}, this.value)" placeholder="e.g. Apply As Sale Agent" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Target Route Page</label>
                    <select onchange="updateHeroButtonUrl(${index}, this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        ${availableRoutes.map(route => `
                            <option value="${route.url}" ${btn.url === route.url ? 'selected' : ''}>
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
        heroButtonsData.push({
            text: 'Apply As Sale Agent',
            url: '/partners#application-form-section'
        });
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

    // ==========================================
    // BULLETS LIST DYNAMIC MANAGEMENT
    // ==========================================
    let heroBulletsData = [
        'Flexible income',
        'Strong brand',
        'Real projects',
        'Full sales support'
    ];

    function renderBulletsInputs() {
        const container = document.getElementById('dynamic-bullets-container');
        if (!container) return;

        container.innerHTML = heroBulletsData.map((bullet, index) => `
            <div class="flex items-center gap-1.5 bg-white border border-slate-300 rounded-md px-2.5 py-1.5 shadow-xs">
                <span class="text-[#8a6a3a] text-xs font-bold shrink-0">•</span>
                <input type="text" value="${escapeHtml(bullet)}" oninput="updateBulletText(${index}, this.value)" placeholder="Highlight text" class="w-full text-xs text-slate-800 bg-transparent focus:outline-none">
                <button type="button" onclick="removeBulletPoint(${index})" class="text-slate-400 hover:text-rose-600 p-1 rounded transition-colors shrink-0" title="Remove bullet">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `).join('');

        updateHeroPreview();
    }

    function addBulletPoint() {
        heroBulletsData.push('New Highlight');
        renderBulletsInputs();
    }

    function removeBulletPoint(index) {
        heroBulletsData.splice(index, 1);
        renderBulletsInputs();
    }

    function updateBulletText(index, val) {
        heroBulletsData[index] = val;
        updateHeroPreview();
    }

    // ==========================================
    // UNIFIED TAGLINE ACTIONS & HELPERS
    // ==========================================
    function updateHeroPreview() {
        // 1. Tagline Preview (Unified Box + Bold)
        const editor = document.getElementById('hero-tagline-editor');
        const rawHtml = editor ? editor.innerHTML.trim() : '';
        const previewTagline = document.getElementById('preview-hero-tagline');

        if (previewTagline) {
            if (!rawHtml || rawHtml === '<br>') {
                previewTagline.parentElement.classList.add('hidden');
            } else {
                previewTagline.parentElement.classList.remove('hidden');
                // Clean HTML: ensure bold elements inherit font-bold and rest is gold
                previewTagline.innerHTML = `<span class="font-normal text-[#F4DEAC]">${rawHtml}</span>`;
            }
        }

        // 2. Headline
        const headline = document.getElementById('hero-headline-input')?.value || 'Your Trusted Property Management & Hospitality Partner in Cambodia';
        const previewHeadline = document.getElementById('preview-hero-headline');
        if (previewHeadline) {
            previewHeadline.innerText = headline;
        }

        // 3. Bullets Preview
        const showBullets = document.getElementById('hero-bullets-toggle')?.checked;
        const bulletsContainer = document.getElementById('preview-hero-bullets');
        const activeBullets = heroBulletsData.map(b => b.trim()).filter(Boolean);

        if (bulletsContainer) {
            if (showBullets && activeBullets.length > 0) {
                bulletsContainer.classList.remove('hidden');
                bulletsContainer.innerHTML = activeBullets.map(b => `<span>• ${escapeHtml(b)}</span>`).join('');
            } else {
                bulletsContainer.classList.add('hidden');
            }
        }

        // 4. Buttons Preview
        const previewBtns = document.getElementById('preview-hero-buttons');
        if (previewBtns) {
            previewBtns.innerHTML = heroButtonsData.map(btn => `
                <a href="${btn.url}" class="border-[2px] border-[#F4DEAC] text-white text-[13px] sm:text-[14px] font-medium px-4 sm:px-6 py-2.5 hover:bg-white hover:text-[#163049] transition-colors cursor-pointer inline-block">
                    ${escapeHtml(btn.text)}
                </a>
            `).join('');
        }
    }

    // ==========================================
    // INITIAL LOAD & SUBMIT TO LARAVEL BACKEND
    // ==========================================
    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
    });

    async function fetchHeroSection() {
        try {
            const res = await fetch('/api/hero-section/home');
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                // Tagline Editor
                const editor = document.getElementById('hero-tagline-editor');
                if (editor) {
                    if (data.tagline_html) {
                        editor.innerHTML = data.tagline_html;
                    } else if (data.tagline_box1 || data.tagline_box2) {
                        let combined = '';
                        if (data.tagline_box1_style !== 'hidden' && data.tagline_box1) {
                            combined += data.tagline_box1_style === 'bold-gold' ? `<b>${data.tagline_box1}</b>` : data.tagline_box1;
                        }
                        if (data.tagline_box2_style !== 'hidden' && data.tagline_box2) {
                            combined += (combined ? ' ' : '') + (data.tagline_box2_style === 'bold-gold' ? `<b>${data.tagline_box2}</b>` : data.tagline_box2);
                        }
                        editor.innerHTML = combined || '<b>CWD</b> Real Estate Agent & Developer';
                    }
                }

                // Headline
                document.getElementById('hero-headline-input').value = data.headline || '';

                // Bullets
                document.getElementById('hero-bullets-toggle').checked = !!data.show_bullets;
                if (Array.isArray(data.bullets) && data.bullets.length > 0) {
                    heroBulletsData = data.bullets;
                }

                // Buttons
                if (Array.isArray(data.buttons) && data.buttons.length > 0) {
                    heroButtonsData = data.buttons;
                }

                renderHeroButtonsInputs();
                renderBulletsInputs();
                updateHeroPreview();
            }
        } catch (err) {
            console.error('Error fetching hero section:', err);
            renderHeroButtonsInputs();
            renderBulletsInputs();
            updateHeroPreview();
        }
    }

    async function handleHeroSubmit(e) {
        e.preventDefault();
        const submitBtn = e.target.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving to Database...';
        }

        const editor = document.getElementById('hero-tagline-editor');
        const taglineHtml = editor ? editor.innerHTML.trim() : '';

        const payload = {
            tagline_html: taglineHtml,
            show_tagline: true,
            headline: document.getElementById('hero-headline-input')?.value || '',
            show_bullets: document.getElementById('hero-bullets-toggle')?.checked || false,
            bullets: heroBulletsData.map(b => b.trim()).filter(Boolean),
            buttons: heroButtonsData.map(btn => ({ text: btn.text.trim(), url: btn.url.trim() })).filter(b => b.text && b.url)
        };

        try {
            const res = await fetch('/api/hero-section/home', {
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
                showToast('Hero section saved to database and live on frontend!');
                updateHeroPreview();
            } else {
                showToast(data.message || 'Error saving hero section');
            }
        } catch (err) {
            console.error('Error saving hero section:', err);
            showToast('Failed to save to database');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    // ==========================================
    // SERVICES SECTION HANDLERS & API
    // ==========================================
    function syncServicesLivePreview() {
        // Image
        const urlInput = document.getElementById('services-image-url')?.value;
        const liveImg = document.getElementById('live-preview-services-image');
        if (liveImg && urlInput) {
            liveImg.src = urlInput.startsWith('http') || urlInput.startsWith('/') ? urlInput : '/' + urlInput;
        }

        // Cards (0 to 3)
        for (let i = 0; i < 4; i++) {
            const num = document.getElementById(`svc-card-number-${i}`)?.value || `0${i+1}`;
            const title = document.getElementById(`svc-card-title-${i}`)?.value || '';
            const desc = document.getElementById(`svc-card-desc-${i}`)?.value || '';
            const linkText = document.getElementById(`svc-card-linktext-${i}`)?.value || 'View Details';

            const pNum = document.getElementById(`live-card-number-${i}`);
            const pTitle = document.getElementById(`live-card-title-${i}`);
            const pDesc = document.getElementById(`live-card-desc-${i}`);
            const pLink = document.getElementById(`live-card-link-${i}`);

            if (pNum) pNum.innerText = num;
            if (pTitle) pTitle.innerText = title;
            if (pDesc) pDesc.innerText = desc;
            if (pLink) pLink.innerText = `${linkText} →`;
        }
    }

    function previewServicesImageFile(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('services-preview-image');
                const liveImg = document.getElementById('live-preview-services-image');
                if (img) img.src = e.target.result;
                if (liveImg) liveImg.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            showToast('Image file selected for upload');
        }
    }

    function previewServicesImageUrl(url) {
        if (!url) return;
        const img = document.getElementById('services-preview-image');
        const liveImg = document.getElementById('live-preview-services-image');
        const fullUrl = url.startsWith('http') || url.startsWith('/') ? url : '/' + url;
        if (img) img.src = fullUrl;
        if (liveImg) liveImg.src = fullUrl;
    }

    async function fetchServicesSection() {
        try {
            const res = await fetch('/api/services-section/home');
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                // Image
                if (data.image_url) {
                    document.getElementById('services-image-url').value = data.image_url;
                    previewServicesImageUrl(data.image_url);
                }

                // Cards (4 cards)
                if (Array.isArray(data.cards) && data.cards.length > 0) {
                    data.cards.forEach((card, i) => {
                        const numInput = document.getElementById(`svc-card-number-${i}`);
                        const titleInput = document.getElementById(`svc-card-title-${i}`);
                        const descInput = document.getElementById(`svc-card-desc-${i}`);
                        const linkInput = document.getElementById(`svc-card-link-${i}`);
                        const linkTextInput = document.getElementById(`svc-card-linktext-${i}`);

                        if (numInput) numInput.value = card.number || `0${i+1}`;
                        if (titleInput) titleInput.value = card.title || '';
                        if (descInput) descInput.value = card.description || '';
                        if (linkInput) linkInput.value = card.link || '';
                        if (linkTextInput) linkTextInput.value = card.linkText || 'View Details';
                    });
                }

                syncServicesLivePreview();
            }
        } catch (err) {
            console.error('Error loading services section:', err);
        }
    }

    async function handleServicesSubmit(e) {
        e.preventDefault();
        const submitBtn = e.target.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving to Database...';
        }

        const formData = new FormData();
        formData.append('section_title', 'Our Services');

        const imageFile = document.getElementById('services-image-file')?.files[0];
        if (imageFile) {
            formData.append('image_file', imageFile);
        } else {
            formData.append('image_url', document.getElementById('services-image-url')?.value || '');
        }

        const cards = [];
        for (let i = 0; i < 4; i++) {
            cards.push({
                number: document.getElementById(`svc-card-number-${i}`)?.value || `0${i+1}`,
                title: document.getElementById(`svc-card-title-${i}`)?.value || '',
                description: document.getElementById(`svc-card-desc-${i}`)?.value || '',
                link: document.getElementById(`svc-card-link-${i}`)?.value || '',
                linkText: document.getElementById(`svc-card-linktext-${i}`)?.value || 'View Details',
            });
        }

        cards.forEach((card, idx) => {
            formData.append(`cards[${idx}][number]`, card.number);
            formData.append(`cards[${idx}][title]`, card.title);
            formData.append(`cards[${idx}][description]`, card.description);
            formData.append(`cards[${idx}][link]`, card.link);
            formData.append(`cards[${idx}][linkText]`, card.linkText);
        });

        try {
            const res = await fetch('/api/services-section/home', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Services cards & cover image updated live!');
                if (data.data && data.data.image_url) {
                    document.getElementById('services-image-url').value = data.data.image_url;
                    previewServicesImageUrl(data.data.image_url);
                }
                syncServicesLivePreview();
            } else {
                showToast(data.message || 'Error saving services section');
            }
        } catch (err) {
            console.error('Error saving services section:', err);
            showToast('Failed to save to database');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Services Section';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchServicesSection();
        // Add live input listeners on all service card inputs
        for (let i = 0; i < 4; i++) {
            ['number', 'title', 'desc', 'link', 'linktext'].forEach(field => {
                const el = document.getElementById(`svc-card-${field}-${i}`);
                if (el) el.addEventListener('input', syncServicesLivePreview);
            });
        }
    });

    // ==========================================
    // FEATURED PROPERTIES CRUD & LIVE PREVIEW
    // ==========================================
    let propertiesData = [];

    async function fetchFeaturedProperties() {
        try {
            const res = await fetch('/api/featured-properties');
            const data = await res.json();
            if (data.success) {
                propertiesData = data.data;
                renderPropertyTable();
                renderLivePropertyTrack();
                const badge = document.getElementById('tab-badge-prop-count');
                if (badge) badge.innerText = propertiesData.length;
            }
        } catch (err) {
            console.error('Failed to load featured properties:', err);
        }
    }

    function renderPropertyTable() {
        const tbody = document.getElementById('property-table-body');
        const emptyState = document.getElementById('property-empty-state');
        if (!tbody) return;

        if (propertiesData.length === 0) {
            tbody.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            return;
        }

        if (emptyState) emptyState.classList.add('hidden');
        tbody.innerHTML = propertiesData.map((item, index) => {
            let img = item.image || 'home/latest_activities/1img.png';
            if (!img.startsWith('http') && !img.startsWith('/')) img = '/' + img;

            return `
                <tr class="hover:bg-slate-50/80 transition-colors group">
                    <td class="py-3 px-4 text-center text-slate-400 font-mono text-xs">${index + 1}</td>
                    <td class="py-3 px-4 text-center">
                        <img src="${img}" alt="${escapeHtml(item.title)}" class="w-12 h-9 object-cover rounded shadow-xs mx-auto border border-slate-200">
                    </td>
                    <td class="py-3 px-4">
                        <div class="font-bold text-[#163049] group-hover:text-[#1479B9] transition-colors">${escapeHtml(item.title)}</div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="text-xs text-slate-600 line-clamp-2 max-w-xs">${escapeHtml(item.description)}</div>
                    </td>
                    <td class="py-3 px-4">
                        <span class="text-xs font-mono text-[#2A5A8A] bg-[#2A5A8A]/10 px-2 py-0.5 rounded">${escapeHtml(item.link)}</span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold ${item.status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600'}">
                            ${item.status === 'published' ? 'Published' : 'Draft'}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="editProperty(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-[#2A5A8A] text-slate-600 hover:text-white transition-colors cursor-pointer" title="Edit Property">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button onclick="promptDeleteProperty(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-rose-600 text-slate-600 hover:text-white transition-colors cursor-pointer" title="Delete Property">
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

    function renderLivePropertyTrack() {
        const track = document.getElementById('live-property-track');
        if (!track) return;

        track.innerHTML = propertiesData.map(item => {
            let img = item.image || 'home/latest_activities/1img.png';
            if (!img.startsWith('http') && !img.startsWith('/')) img = '/' + img;

            return `
                <div class="shrink-0 w-[240px] bg-white shadow-md border border-slate-200 flex flex-col group overflow-hidden">
                    <div class="h-[140px] w-full overflow-hidden bg-slate-100">
                        <img src="${img}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="text-sm font-bold text-[#163049] mb-1 leading-snug">${escapeHtml(item.title)}</h4>
                            <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">${escapeHtml(item.description)}</p>
                        </div>
                        <span class="text-[#2A5A8A] text-xs font-semibold mt-3 inline-flex items-center gap-1">
                            ${escapeHtml(item.link_text || 'View Property')} →
                        </span>
                    </div>
                </div>
            `;
        }).join('');
    }

    function openPropertyModal(id = null) {
        const modal = document.getElementById('property-modal');
        const card = document.getElementById('property-modal-card');
        const titleEl = document.getElementById('property-modal-title');
        const form = document.getElementById('property-form');

        form.reset();
        document.getElementById('prop-id').value = '';

        if (id) {
            const item = propertiesData.find(p => p.id === id);
            if (item) {
                titleEl.innerHTML = `<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit Featured Property`;
                document.getElementById('prop-id').value = item.id;
                document.getElementById('prop-title').value = item.title || '';
                document.getElementById('prop-desc').value = item.description || '';
                document.getElementById('prop-image-url').value = item.image || '';
                document.getElementById('prop-link').value = item.link || '';
                document.getElementById('prop-link-text').value = item.link_text || 'View Property';
                document.getElementById('prop-status').value = item.status || 'published';
                document.getElementById('prop-sort-order').value = item.sort_order || 1;
            }
        } else {
            titleEl.innerHTML = `<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Featured Property`;
            document.getElementById('prop-sort-order').value = propertiesData.length + 1;
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closePropertyModal() {
        const modal = document.getElementById('property-modal');
        const card = document.getElementById('property-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    function editProperty(id) {
        openPropertyModal(id);
    }

    async function handlePropertySubmit(e) {
        e.preventDefault();
        const id = document.getElementById('prop-id').value;
        const submitBtn = document.getElementById('prop-submit-btn');

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        const formData = new FormData();
        formData.append('title', document.getElementById('prop-title').value);
        formData.append('description', document.getElementById('prop-desc').value);
        formData.append('link', document.getElementById('prop-link').value);
        formData.append('link_text', document.getElementById('prop-link-text').value);
        formData.append('status', document.getElementById('prop-status').value);
        formData.append('sort_order', document.getElementById('prop-sort-order').value);

        const file = document.getElementById('prop-image-file').files[0];
        if (file) {
            formData.append('image_file', file);
        } else {
            formData.append('image', document.getElementById('prop-image-url').value);
        }

        const url = id ? `/api/featured-properties/${id}` : '/api/featured-properties';

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
                showToast(data.message || 'Property saved successfully!');
                closePropertyModal();
                fetchFeaturedProperties();
            } else {
                showToast(data.message || 'Error saving property');
            }
        } catch (err) {
            console.error('Error saving property:', err);
            showToast('Failed to connect to database');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Property';
            }
        }
    }

    function promptDeleteProperty(id) {
        document.getElementById('delete-prop-id').value = id;
        const modal = document.getElementById('delete-prop-modal');
        const card = document.getElementById('delete-prop-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeletePropModal() {
        const modal = document.getElementById('delete-prop-modal');
        const card = document.getElementById('delete-prop-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function confirmDeleteProperty() {
        const id = document.getElementById('delete-prop-id').value;
        try {
            const res = await fetch(`/api/featured-properties/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Featured property deleted from database!');
                closeDeletePropModal();
                fetchFeaturedProperties();
            } else {
                showToast('Error deleting property');
            }
        } catch (err) {
            console.error('Error deleting property:', err);
            showToast('Failed to delete property');
        }
    }

    // ==========================================
    // WHY CHOOSE US CRUD & LIVE PREVIEW
    // ==========================================
    function setWhyAlignment(align) {
        document.getElementById('why-text-align').value = align;
        const btnLeft = document.getElementById('why-align-btn-left');
        const btnCenter = document.getElementById('why-align-btn-center');

        if (align === 'left') {
            btnLeft.className = 'px-4 py-2.5 rounded-lg border-2 border-[#2A5A8A] bg-[#2A5A8A] text-white text-xs font-bold flex items-center justify-center gap-2 cursor-pointer transition-all';
            btnCenter.className = 'px-4 py-2.5 rounded-lg border-2 border-slate-300 bg-white text-slate-700 text-xs font-bold flex items-center justify-center gap-2 cursor-pointer transition-all hover:bg-slate-50';
        } else {
            btnCenter.className = 'px-4 py-2.5 rounded-lg border-2 border-[#2A5A8A] bg-[#2A5A8A] text-white text-xs font-bold flex items-center justify-center gap-2 cursor-pointer transition-all';
            btnLeft.className = 'px-4 py-2.5 rounded-lg border-2 border-slate-300 bg-white text-slate-700 text-xs font-bold flex items-center justify-center gap-2 cursor-pointer transition-all hover:bg-slate-50';
        }

        syncWhyLivePreview();
    }

    function syncWhyLivePreview() {
        const line1 = document.getElementById('why-heading-1')?.value || 'Why Choose';
        const line2 = document.getElementById('why-heading-2')?.value || 'CWD Realty & Hospitality?';
        const align = document.getElementById('why-text-align')?.value || 'left';

        const pLine1 = document.getElementById('live-why-heading-1');
        const pLine2 = document.getElementById('live-why-heading-2');
        const pContainer = document.getElementById('live-why-heading-container');

        if (pLine1) pLine1.innerText = line1;
        if (pLine2) pLine2.innerText = line2;
        if (pContainer) {
            pContainer.className = align === 'center' ? 'mb-10 text-center' : 'mb-10 text-left';
        }

        for (let i = 0; i < 5; i++) {
            const title = document.getElementById(`why-card-title-${i}`)?.value || '';
            const desc = document.getElementById(`why-card-desc-${i}`)?.value || '';

            const pTitle = document.getElementById(`live-why-card-title-${i}`);
            const pDesc = document.getElementById(`live-why-card-desc-${i}`);

            if (pTitle) pTitle.innerText = title;
            if (pDesc) pDesc.innerText = desc;
        }
    }

    async function fetchWhyChooseUsSection() {
        try {
            const res = await fetch('/api/why-choose-us/home');
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                if (data.heading_line_1) document.getElementById('why-heading-1').value = data.heading_line_1;
                if (data.heading_line_2) document.getElementById('why-heading-2').value = data.heading_line_2;
                if (data.text_align) setWhyAlignment(data.text_align);

                if (Array.isArray(data.items) && data.items.length > 0) {
                    data.items.forEach((item, i) => {
                        if (i < 5) {
                            const titleInput = document.getElementById(`why-card-title-${i}`);
                            const descInput = document.getElementById(`why-card-desc-${i}`);
                            if (titleInput) titleInput.value = item.title || '';
                            if (descInput) descInput.value = item.description || '';
                        }
                    });
                }
                syncWhyLivePreview();
            }
        } catch (err) {
            console.error('Error fetching Why Choose Us section:', err);
        }
    }

    async function handleWhyChooseUsSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('why-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving to Database...';
        }

        const items = [];
        for (let i = 0; i < 5; i++) {
            items.push({
                title: document.getElementById(`why-card-title-${i}`)?.value || '',
                description: document.getElementById(`why-card-desc-${i}`)?.value || '',
            });
        }

        const payload = {
            heading_line_1: document.getElementById('why-heading-1')?.value || 'Why Choose',
            heading_line_2: document.getElementById('why-heading-2')?.value || 'CWD Realty & Hospitality?',
            text_align: document.getElementById('why-text-align')?.value || 'left',
            items: items
        };

        try {
            const res = await fetch('/api/why-choose-us/home', {
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
                showToast('Why Choose Us section & alignment saved live!');
                syncWhyLivePreview();
            } else {
                showToast(data.message || 'Error saving Why Choose Us section');
            }
        } catch (err) {
            console.error('Error saving Why Choose Us:', err);
            showToast('Failed to save to database');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Why Choose Us';
            }
        }
    }

    // ==========================================
    // LATEST ACTIVITIES CRUD & LIVE PREVIEW
    // ==========================================
    let activitiesData = [];

    async function fetchLatestActivities() {
        try {
            const res = await fetch('/api/latest-activities');
            const data = await res.json();
            if (data.success) {
                activitiesData = data.data;
                renderActivitiesTable();
                renderLiveActivitiesGrid();
                const badge = document.getElementById('tab-badge-activity-count');
                if (badge) badge.innerText = activitiesData.length;
            }
        } catch (err) {
            console.error('Failed to load latest activities:', err);
        }
    }

    function renderActivitiesTable() {
        const tbody = document.getElementById('activity-table-body');
        const emptyState = document.getElementById('activity-empty-state');
        if (!tbody) return;

        if (activitiesData.length === 0) {
            tbody.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            return;
        }

        if (emptyState) emptyState.classList.add('hidden');
        tbody.innerHTML = activitiesData.map((item, index) => {
            let img = item.image || 'home/latest_activities/1img.png';
            if (!img.startsWith('http') && !img.startsWith('/')) img = '/' + img;

            return `
                <tr class="hover:bg-slate-50/80 transition-colors group">
                    <td class="py-3 px-4 text-center text-slate-400 font-mono text-xs">${index + 1}</td>
                    <td class="py-3 px-4 text-center">
                        <img src="${img}" alt="${escapeHtml(item.title)}" class="w-12 h-9 object-cover rounded shadow-xs mx-auto border border-slate-200">
                    </td>
                    <td class="py-3 px-4">
                        <div class="font-bold text-[#163049] group-hover:text-[#2A5A8A] transition-colors">${escapeHtml(item.title)}</div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="text-xs text-slate-600 line-clamp-2 max-w-sm">${escapeHtml(item.description)}</div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold ${item.status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600'}">
                            ${item.status === 'published' ? 'Published' : 'Draft'}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="editActivity(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-[#2A5A8A] text-slate-600 hover:text-white transition-colors cursor-pointer" title="Edit Activity">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button onclick="promptDeleteActivity(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-rose-600 text-slate-600 hover:text-white transition-colors cursor-pointer" title="Delete Activity">
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

    function renderLiveActivitiesGrid() {
        const grid = document.getElementById('live-activities-grid');
        if (!grid) return;

        grid.innerHTML = activitiesData.map(item => {
            let img = item.image || 'home/latest_activities/1img.png';
            if (!img.startsWith('http') && !img.startsWith('/')) img = '/' + img;

            return `
                <div class="relative overflow-hidden group h-[160px] rounded-lg shadow-sm border border-slate-200 cursor-pointer">
                    <img src="${img}" alt="${escapeHtml(item.title)}" class="block w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-[#2A5A8A]/80 opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-4 backdrop-blur-[2px]">
                        <h4 class="text-[#F4DEAC] text-sm font-bold mb-1 leading-snug translate-y-2 group-hover:translate-y-0 transition-transform duration-300">${escapeHtml(item.title)}</h4>
                        <p class="text-white/90 text-xs leading-relaxed line-clamp-2 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">${escapeHtml(item.description)}</p>
                    </div>
                </div>
            `;
        }).join('');
    }

    function openActivityModal(id = null) {
        const modal = document.getElementById('activity-modal');
        const card = document.getElementById('activity-modal-card');
        const titleEl = document.getElementById('activity-modal-title');
        const form = document.getElementById('activity-form');

        form.reset();
        document.getElementById('act-id').value = '';

        if (id) {
            const item = activitiesData.find(a => a.id === id);
            if (item) {
                titleEl.innerHTML = `<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit Activity`;
                document.getElementById('act-id').value = item.id;
                document.getElementById('act-title').value = item.title || '';
                document.getElementById('act-desc').value = item.description || '';
                document.getElementById('act-image-url').value = item.image || '';
                document.getElementById('act-status').value = item.status || 'published';
                document.getElementById('act-sort-order').value = item.sort_order || 1;
            }
        } else {
            titleEl.innerHTML = `<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Activity`;
            document.getElementById('act-sort-order').value = activitiesData.length + 1;
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeActivityModal() {
        const modal = document.getElementById('activity-modal');
        const card = document.getElementById('activity-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    function editActivity(id) {
        openActivityModal(id);
    }

    async function handleActivitySubmit(e) {
        e.preventDefault();
        const id = document.getElementById('act-id').value;
        const submitBtn = document.getElementById('act-submit-btn');

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        const formData = new FormData();
        formData.append('title', document.getElementById('act-title').value);
        formData.append('description', document.getElementById('act-desc').value);
        formData.append('status', document.getElementById('act-status').value);
        formData.append('sort_order', document.getElementById('act-sort-order').value);

        const file = document.getElementById('act-image-file').files[0];
        if (file) {
            formData.append('image_file', file);
        } else {
            formData.append('image', document.getElementById('act-image-url').value);
        }

        const url = id ? `/api/latest-activities/${id}` : '/api/latest-activities';

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
                showToast(data.message || 'Activity saved successfully!');
                closeActivityModal();
                fetchLatestActivities();
            } else {
                showToast(data.message || 'Error saving activity');
            }
        } catch (err) {
            console.error('Error saving activity:', err);
            showToast('Failed to connect to database');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Activity';
            }
        }
    }

    function promptDeleteActivity(id) {
        document.getElementById('delete-act-id').value = id;
        const modal = document.getElementById('delete-act-modal');
        const card = document.getElementById('delete-act-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeDeleteActModal() {
        const modal = document.getElementById('delete-act-modal');
        const card = document.getElementById('delete-act-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function confirmDeleteActivity() {
        const id = document.getElementById('delete-act-id').value;
        try {
            const res = await fetch(`/api/latest-activities/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Activity deleted from database!');
                closeDeleteActModal();
                fetchLatestActivities();
            } else {
                showToast('Error deleting activity');
            }
        } catch (err) {
            console.error('Error deleting activity:', err);
            showToast('Failed to delete activity');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchFeaturedProperties();
        fetchWhyChooseUsSection();
        fetchLatestActivities();
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
</script>
@endpush
@endsection
