@extends('dashboard.layout')

@section('title', 'Events Page Management')

@section('content')
<div class="space-y-6 max-w-[1400px] mx-auto pb-16">
    {{-- Header --}}
    <div class="border-b border-slate-200 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">Events</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Events Page Content</h1>
            <p class="text-sm text-slate-500 mt-1">Manage the hero banner, events list under the hero section, and FAQs.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/events') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-[#2A5A8A] hover:text-white text-xs font-bold transition-all shadow-xs">
                <span>View Live Page</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="relative flex items-center border-b border-slate-200 py-1">
        <div class="flex items-center gap-2 overflow-x-auto pb-px">
            {{-- Tab 1: Hero --}}
            <button type="button" onclick="switchEventsTab('hero', event)" id="tab-btn-hero"
                class="events-tab-btn px-5 py-3 text-sm font-bold border-b-2 border-[#2A5A8A] text-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Hero &amp; Banner</span>
            </button>

            {{-- Tab 2: Events List --}}
            <button type="button" onclick="switchEventsTab('events-list', event)" id="tab-btn-events-list"
                class="events-tab-btn px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span>Events List (Under Hero Section)</span>
                <span id="events-count-badge" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
            </button>

            {{-- Tab 3: FAQs --}}
            <button type="button" onclick="switchEventsTab('faqs', event)" id="tab-btn-faqs"
                class="events-tab-btn px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Frequently Asked Questions (FAQs)</span>
                <span id="tab-badge-faq-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
            </button>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO & BANNER                                                      --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-hero" class="events-tab-content space-y-6">
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

                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all !text-slate-900 [&&_*]:!text-slate-900" style="color: #0f172a !important;">Events</div>
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
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('{{ asset('hero_section/hero_sectionsss.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[650px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-bold text-[#F4DEAC]">
                                Events
                            </span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-4">
                            Your Trusted Property Management &amp; Hospitality Partner in Cambodia
                        </h1>

                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] sm:text-[14px] mb-6 flex flex-wrap items-center gap-x-3 gap-y-1">
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
    {{-- TAB 2: EVENTS LIST (UNDER HERO SECTION)                                    --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-events-list" class="events-tab-content hidden space-y-6">
        {{-- Table Card --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Events List Under Hero Section</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold" id="events-table-count">Loading...</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage event cards, left banners/photos, headlines, descriptions, links, and social shares.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="openEventModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs sm:text-sm font-bold shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add New Event</span>
                    </button>
                </div>
            </div>

            {{-- Events Table --}}
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-[11px] uppercase tracking-wider text-[#2A5A8A] font-bold border-b border-slate-200">
                        <tr>
                            <th class="py-3.5 px-4 w-12 text-center">#</th>
                            <th class="py-3.5 px-4 w-24 text-center">Image</th>
                            <th class="py-3.5 px-4">Title &amp; Description</th>
                            <th class="py-3.5 px-4 w-36">Link &amp; Action</th>
                            <th class="py-3.5 px-4 w-24 text-center">Status</th>
                            <th class="py-3.5 px-4 w-28 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="events-table-body" class="divide-y divide-slate-100">
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">Loading event items...</td>
                        </tr>
                    </tbody>
                </table>

                <div id="events-empty-state" class="hidden py-12 text-center">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-700">No events found in database.</p>
                    <p class="text-xs text-slate-400 mt-1">Click "Add New Event" above to create your first event card.</p>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Frontend Events Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Matches the exact look &amp; feel of /events page</span>
            </div>

            <div class="bg-[#ffffff] p-6 sm:p-10 rounded-xl border border-slate-200 shadow-inner">
                <div id="live-events-container" class="flex flex-col gap-10 sm:gap-14 max-w-[1100px] mx-auto">
                    {{-- Rendered dynamically via JS --}}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 3: FREQUENTLY ASKED QUESTIONS (FAQS)                                 --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-faqs" class="events-tab-content hidden space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Events FAQs</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for the Events page.</p>
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
                    <p class="text-xs text-slate-500 mt-1">Get started by creating your first Events FAQ item.</p>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card for FAQs --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Events FAQs Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Preview with real frontend accordion styling</span>
            </div>
            
            <div class="mt-6 bg-[#e5e4e4] rounded-xl px-4 sm:px-10 py-10 sm:py-14 text-slate-900 shadow-inner">
                <div class="max-w-[1400px] mx-auto">
                    <h2 class="text-[clamp(24px,3vw,36px)] leading-tight mb-8 sm:mb-10">
                        <span class="text-[#2A5A8A] font-normal block">Frequently</span>
                        <span class="text-[#2A5A8A] font-bold block">Asked Questions</span>
                    </h2>

                    {{-- Two-column accordion grid --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start" id="faq-live-preview-grid">
                        {{-- Populated dynamically via renderFaqLivePreview() --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ========================================================================= --}}
{{-- MODAL: CREATE / EDIT EVENT                                                --}}
{{-- ========================================================================= --}}
<div id="event-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="event-modal-card">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
            <h3 class="text-base font-bold text-white flex items-center gap-2" id="event-modal-title">
                <span class="w-2.5 h-2.5 rounded-full bg-[#F4DEAC]"></span>
                <span>Add New Event</span>
            </h3>
            <button onclick="closeEventModal()" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="event-form" onsubmit="handleEventSubmit(event)" class="p-6 space-y-4 max-h-[82vh] overflow-y-auto">
            <input type="hidden" id="event-id" value="">

            {{-- Title --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1.5">Event Title <span class="text-rose-500">*</span></label>
                <input type="text" id="event-title" required placeholder="e.g. Your Trusted Property Management & Hospitality Partner in Cambodia" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A]">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1.5">Description <span class="text-rose-500">*</span></label>
                <textarea id="event-desc" required rows="3" placeholder="Property management is the professional administration of residential properties on behalf of owners." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] leading-relaxed"></textarea>
            </div>

            {{-- Image Upload & Current Image Preview --}}
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Event Image (Recommended ~535x240 px)</label>
                
                <div class="flex items-center gap-4">
                    <div id="event-image-preview-wrapper" class="w-28 h-16 bg-slate-200 rounded-lg overflow-hidden border border-slate-300 shrink-0 relative flex items-center justify-center">
                        <img id="event-image-preview" src="" alt="Preview" class="w-full h-full object-cover hidden">
                        <span id="event-image-placeholder" class="text-[10px] text-slate-400 text-center px-1">No Image</span>
                    </div>
                    <div class="flex-1 space-y-1.5">
                        <input type="file" id="event-image-file" accept="image/*" onchange="previewSelectedImage(event)" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                        <p class="text-[11px] text-slate-400">Upload a new image file or keep the current image URL below.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase text-slate-500 mb-1">Image Path / URL (Static Asset or Full URL)</label>
                    <input type="text" id="event-image-url" placeholder="e.g. home/latest_activities/1img.png" oninput="updateModalImagePreviewFromUrl(this.value)" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            {{-- Link & Link Text --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Link URL</label>
                    <input type="text" id="event-link" placeholder="/insights/view-full-insight" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Link Text</label>
                    <input type="text" id="event-link-text" placeholder="Link" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            {{-- Social Share Overrides (Optional) --}}
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Social Share Options (Optional Overrides)</label>
                <p class="text-[11px] text-slate-500">Leave blank to automatically share this event with title &amp; URL on Facebook, WhatsApp, and Telegram.</p>

                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#1877F2] text-white flex items-center justify-center text-[10px] font-bold shrink-0">f</span>
                        <input type="text" id="event-facebook-url" placeholder="Facebook URL / page override (optional)" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#25D366] text-white flex items-center justify-center text-[10px] font-bold shrink-0">w</span>
                        <input type="text" id="event-whatsapp-url" placeholder="WhatsApp link / number override (optional)" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#26A5E4] text-white flex items-center justify-center text-[10px] font-bold shrink-0">t</span>
                        <input type="text" id="event-telegram-url" placeholder="Telegram channel / chat link override (optional)" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                </div>
            </div>

            {{-- Status & Sort Order --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status</label>
                    <select id="event-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Sort Order</label>
                    <input type="number" id="event-sort-order" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closeEventModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="event-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save Event
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ========================================================================= --}}
{{-- MODAL: DELETE EVENT CONFIRMATION                                          --}}
{{-- ========================================================================= --}}
<div id="delete-event-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-sm rounded-2xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-event-modal-card">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete Event Item?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this event from the Events page?</p>

        <input type="hidden" id="delete-event-id">

        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteEventModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                Cancel
            </button>
            <button type="button" onclick="confirmDeleteEvent()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                Yes, Delete
            </button>
        </div>
    </div>
</div>

{{-- ========================================================================= --}}
{{-- MODAL: CREATE / EDIT FAQ                                                  --}}
{{-- ========================================================================= --}}
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
                <div class="flex items-center justify-between mb-1.5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">Answer <span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-1.5">
                        <button type="button" onclick="insertEventFaqBullet()" class="px-2 py-0.5 bg-slate-100 hover:bg-[#2A5A8A] hover:text-white text-slate-700 rounded text-[11px] font-semibold transition-colors flex items-center gap-1 cursor-pointer" title="Add a bullet point item">
                            <span>• Bullet Point</span>
                        </button>
                        <button type="button" onclick="insertEventFaqFacilitiesTemplate()" class="px-2 py-0.5 bg-slate-100 hover:bg-[#2A5A8A] hover:text-white text-slate-700 rounded text-[11px] font-semibold transition-colors cursor-pointer" title="Insert facilities template">
                            <span>Facilities Template</span>
                        </button>
                    </div>
                </div>
                <textarea id="faq-answer" required rows="6" placeholder="Facilities vary by property and may include:&#10;&#10;• Swimming Pool&#10;• Fitness Center&#10;• Panoramic River View&#10;• Parking&#10;• Security&#10;• Elevator Access&#10;• Wi-Fi" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors font-sans leading-relaxed"></textarea>
                <p class="text-[11px] text-slate-400 mt-1">Tip: Use bullet items (lines starting with <code class="bg-slate-100 px-1 py-0.5 rounded text-slate-600 font-mono">•</code> or <code class="bg-slate-100 px-1 py-0.5 rounded text-slate-600 font-mono">-</code>) or multiple paragraphs.</p>
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

{{-- ========================================================================= --}}
{{-- MODAL: DELETE FAQ CONFIRMATION                                            --}}
{{-- ========================================================================= --}}
<div id="faq-delete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs hidden opacity-0 transition-opacity duration-200">
    <div id="faq-delete-card" class="bg-white border border-slate-200 rounded-2xl max-w-sm w-full p-6 shadow-2xl transform scale-95 transition-transform duration-200 text-center space-y-4">
        <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049]">Delete this FAQ?</h3>
        <p class="text-xs text-slate-500">Are you sure you want to permanently remove this question from your Events page?</p>
        <div class="flex items-center justify-center gap-3 pt-2">
            <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">Cancel</button>
            <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-lg shadow-sm transition-all cursor-pointer">Delete Now</button>
        </div>
    </div>
</div>

<script>
    const pageSlug = 'events';
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

    // Global Data
    let heroBulletsData = [];
    let heroButtonsData = [
        { text: 'Browse Properties', url: '/properties' },
        { text: 'Contact Us', url: '/contact-us' }
    ];
    let eventsData = [];
    let faqsData = [];
    let faqToDeleteId = null;

    const availableRoutes = [
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Insights (/insights)', url: '/insights' },
        { label: 'Events (/events)', url: '/events' },
        { label: 'Partners (/partners)', url: '/partners' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' }
    ];

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        renderHeroButtonsInputs();
        fetchEvents();
        fetchFaqs();
    });

    // ==========================================
    // TAB SWITCHING (Hero vs Events List vs FAQs)
    // ==========================================
    function switchEventsTab(tabId, ev) {
        if (ev) ev.preventDefault();
        document.querySelectorAll('.events-tab-content').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.events-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
            btn.classList.add('border-transparent', 'text-slate-500', 'font-medium');
        });

        const targetContent = document.getElementById(`tab-content-${tabId}`);
        const targetBtn = document.getElementById(`tab-btn-${tabId}`);

        if (targetContent) targetContent.classList.remove('hidden');
        if (targetBtn) {
            targetBtn.classList.remove('border-transparent', 'text-slate-500', 'font-medium');
            targetBtn.classList.add('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
        }

        if (tabId === 'faqs') {
            fetchFaqs();
        } else if (tabId === 'events-list') {
            fetchEvents();
        }
    }

    // ==========================================
    // HELPER FUNCTIONS
    // ==========================================
    function escapeHtml(text) {
        if (!text) return '';
        return String(text)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function resolveImageUrl(img) {
        if (!img) return '/home/latest_activities/1img.png';
        if (img.startsWith('http://') || img.startsWith('https://') || img.startsWith('//')) {
            return img;
        }
        if (img.startsWith('/')) {
            return img;
        }
        return '/' + img;
    }

    // ==========================================
    // HERO SECTION LOGIC
    // ==========================================
    function formatHeroTagline(command) {
        const editor = document.getElementById('hero-tagline-editor');
        if (!editor) return;
        editor.focus();
        if (command === 'bold') {
            document.execCommand('bold', false, null);
        } else {
            document.execCommand('removeFormat', false, null);
        }
        updateHeroPreview();
    }

    function renderHeroBulletsInputs() {
        const container = document.getElementById('dynamic-bullets-container');
        if (!container) return;
        container.innerHTML = heroBulletsData.map((b, i) => `
            <div class="flex items-center gap-2 p-2 bg-white border border-slate-300 rounded-lg shadow-xs">
                <span class="text-slate-400 font-bold text-xs">•</span>
                <input type="text" value="${escapeHtml(b)}" oninput="heroBulletsData[${i}]=this.value;updateHeroPreview();" class="w-full text-xs font-medium text-slate-800 bg-transparent outline-none">
                <button type="button" onclick="heroBulletsData.splice(${i},1);renderHeroBulletsInputs();updateHeroPreview();" class="p-1 text-slate-400 hover:text-rose-500 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>`).join('');
    }

    function addHeroBulletPoint() {
        heroBulletsData.push('New Highlight');
        renderHeroBulletsInputs();
        updateHeroPreview();
    }

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        const addBtn = document.getElementById('add-btn-trigger');
        if (!container) return;
        if (heroButtonsData.length >= 3) {
            addBtn?.classList.add('hidden');
        } else {
            addBtn?.classList.remove('hidden');
        }
        container.innerHTML = heroButtonsData.map((btn, i) => `
            <div class="p-3.5 bg-white border border-slate-200 rounded-lg flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">${i+1}</span>
                <div class="flex-1">
                    <label class="block text-[10px] font-bold uppercase text-slate-500 mb-1">Label</label>
                    <input type="text" value="${escapeHtml(btn.text)}" oninput="heroButtonsData[${i}].text=this.value;updateHeroPreview();" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div class="flex-1">
                    <label class="block text-[10px] font-bold uppercase text-slate-500 mb-1">Route</label>
                    <select onchange="heroButtonsData[${i}].url=this.value;updateHeroPreview();" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        ${availableRoutes.map(r => `<option value="${r.url}" ${btn.url===r.url?'selected':''}>${r.label}</option>`).join('')}
                    </select>
                </div>
                <div class="sm:pt-4">
                    <button type="button" onclick="heroButtonsData.splice(${i},1);renderHeroButtonsInputs();" class="p-2 rounded-md hover:bg-rose-50 text-slate-400 hover:text-rose-600 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            </div>`).join('');
        updateHeroPreview();
    }

    function addHeroButton() {
        if (heroButtonsData.length >= 3) {
            showToast('Maximum 3 buttons allowed');
            return;
        }
        heroButtonsData.push({ text: 'Browse Properties', url: '/properties' });
        renderHeroButtonsInputs();
    }

    function updateHeroPreview() {
        const rawHtml = document.getElementById('hero-tagline-editor')?.innerHTML.trim() || 'Events';
        const pt = document.getElementById('preview-hero-tagline');
        if (pt) pt.innerHTML = rawHtml;

        const headline = document.getElementById('hero-headline-input')?.value || '';
        const ph = document.getElementById('preview-hero-headline');
        if (ph) ph.innerText = headline;

        const showBullets = document.getElementById('hero-bullets-toggle')?.checked ?? false;
        const pb = document.getElementById('preview-hero-bullets');
        if (pb) {
            pb.style.display = (showBullets && heroBulletsData.length > 0) ? 'flex' : 'none';
            pb.innerHTML = heroBulletsData.map(b => `<span>• ${escapeHtml(b)}</span>`).join('');
        }

        const pButtons = document.getElementById('preview-hero-buttons');
        if (pButtons) {
            pButtons.innerHTML = heroButtonsData.map(btn => `<a href="${escapeHtml(btn.url||'#')}" class="border-[2px] border-[#F4DEAC] text-white text-[13px] font-medium px-4 py-2.5 hover:bg-white hover:text-black transition-colors">${escapeHtml(btn.text||'Button')}</a>`).join('');
        }
    }

    async function fetchHeroSection() {
        try {
            const res = await fetch(`/api/hero-section/${pageSlug}`);
            const result = await res.json();
            if (result.success && result.data) {
                const data = result.data;
                const editor = document.getElementById('hero-tagline-editor');
                if (editor && data.tagline_html) editor.innerHTML = data.tagline_html;
                if (data.headline) document.getElementById('hero-headline-input').value = data.headline;
                if (typeof data.show_bullets !== 'undefined') document.getElementById('hero-bullets-toggle').checked = !!data.show_bullets;
                if (Array.isArray(data.bullets) && data.bullets.length > 0) heroBulletsData = data.bullets;
                if (Array.isArray(data.buttons) && data.buttons.length > 0) heroButtonsData = data.buttons;
                renderHeroBulletsInputs();
                renderHeroButtonsInputs();
                updateHeroPreview();
            }
        } catch (err) {
            console.error('Error fetching hero:', err);
        }
    }

    async function handleHeroSubmit(e) {
        e.preventDefault();
        const btn = document.getElementById('hero-submit-btn');
        if (btn) { btn.disabled = true; btn.innerText = 'Saving...'; }
        try {
            const res = await fetch(`/api/hero-section/${pageSlug}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    page: pageSlug,
                    tagline_html: document.getElementById('hero-tagline-editor')?.innerHTML.trim() || 'Events',
                    show_tagline: true,
                    headline: document.getElementById('hero-headline-input').value,
                    show_bullets: document.getElementById('hero-bullets-toggle').checked,
                    bullets: heroBulletsData,
                    buttons: heroButtonsData
                })
            });
            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Events Hero Section saved!');
            } else {
                showToast(data.message || 'Error saving', 'error');
            }
        } catch (err) {
            showToast('Failed to save', 'error');
        } finally {
            if (btn) { btn.disabled = false; btn.innerText = 'Save Hero Section'; }
        }
    }

    // ==========================================
    // EVENTS CRUD LOGIC
    // ==========================================
    async function fetchEvents() {
        try {
            const res = await fetch('/api/event-items');
            const data = await res.json();
            if (data.success && Array.isArray(data.data)) {
                eventsData = data.data;
                updateEventsBadges();
                renderEventsTable();
                renderLiveEventsPreview();
            }
        } catch (err) {
            console.error('Error fetching events:', err);
        }
    }

    function updateEventsBadges() {
        const count = eventsData.length;
        const tabBadge = document.getElementById('events-count-badge');
        const tableBadge = document.getElementById('events-table-count');
        if (tabBadge) tabBadge.innerText = count;
        if (tableBadge) tableBadge.innerText = `${count} Items`;
    }

    function renderEventsTable() {
        const tbody = document.getElementById('events-table-body');
        const empty = document.getElementById('events-empty-state');
        if (!tbody) return;

        if (eventsData.length === 0) {
            tbody.innerHTML = '';
            empty?.classList.remove('hidden');
            return;
        }

        empty?.classList.add('hidden');
        tbody.innerHTML = eventsData.map((ev, index) => {
            const imgSrc = resolveImageUrl(ev.image);
            const isPublished = ev.status === 'published';
            const linkDisplay = ev.link || '/insights/view-full-insight';

            return `
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <td class="py-4 px-4 text-center font-bold text-xs text-slate-400">
                        ${ev.sort_order ?? (index + 1)}
                    </td>
                    <td class="py-4 px-4 text-center">
                        <div class="w-16 h-10 rounded-md overflow-hidden bg-slate-100 border border-slate-200 mx-auto">
                            <img src="${imgSrc}" alt="${escapeHtml(ev.title)}" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <h4 class="font-bold text-[#163049] text-sm line-clamp-1">${escapeHtml(ev.title)}</h4>
                        <p class="text-xs text-slate-500 line-clamp-2 mt-0.5">${escapeHtml(ev.description || '')}</p>
                    </td>
                    <td class="py-4 px-4">
                        <div class="text-xs font-semibold text-[#2A5A8A] truncate max-w-[130px]">${escapeHtml(ev.link_text || 'Link')}</div>
                        <div class="text-[11px] text-slate-400 truncate max-w-[130px]">${escapeHtml(linkDisplay)}</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold ${isPublished ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-slate-100 text-slate-600 border border-slate-300'}">
                            ${isPublished ? 'Published' : 'Draft'}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-right">
                        <div class="flex items-center justify-end gap-1.5">
                            <button onclick="editEvent(${ev.id})" class="p-1.5 rounded-lg text-slate-600 hover:text-[#2A5A8A] hover:bg-slate-100 transition-colors cursor-pointer" title="Edit Event">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button onclick="openDeleteEventModal(${ev.id})" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer" title="Delete Event">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        }).join('');
    }

    function renderLiveEventsPreview() {
        const container = document.getElementById('live-events-container');
        if (!container) return;

        if (eventsData.length === 0) {
            container.innerHTML = `<div class="py-8 text-center text-slate-400 text-sm">No events to preview. Add one to see the live simulation.</div>`;
            return;
        }

        container.innerHTML = eventsData.map(ev => {
            const imgSrc = resolveImageUrl(ev.image);
            const linkUrl = ev.link || '/insights/view-full-insight';
            const linkText = ev.link_text || 'Link';

            return `
                <div class="flex flex-col min-[860px]:flex-row gap-6 sm:gap-8 min-[860px]:gap-10 items-start pb-8 border-b border-slate-100 last:border-0">
                    <div class="w-full min-[860px]:w-[480px] min-[860px]:max-w-[480px] h-[220px] shrink-0 overflow-hidden shadow-xs rounded-xs">
                        <img src="${imgSrc}" alt="${escapeHtml(ev.title)}" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: fill;">
                    </div>

                    <div class="flex-1 flex flex-col justify-between self-stretch py-1">
                        <div>
                            <h3 class="text-[#2A5A8A] text-[17px] sm:text-[18.5px] font-bold leading-snug mb-3">
                                ${escapeHtml(ev.title)}
                            </h3>
                            <p class="text-gray-600 text-[13px] sm:text-[14px] leading-relaxed mb-4">
                                ${escapeHtml(ev.description || '')}
                            </p>
                            <a href="${escapeHtml(linkUrl)}" target="_blank" class="text-[#2A5A8A] text-[14px] hover:underline inline-block mb-5 font-normal">
                                ${escapeHtml(linkText)}
                            </a>
                        </div>

                        <div class="flex items-center gap-2.5 mt-auto">
                            <span class="w-7 h-7 rounded-full bg-[#1877F2] flex items-center justify-center text-white cursor-pointer hover:opacity-90 transition shadow-xs" title="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.14 8.44 9.94v-7.03H7.9v-2.91h2.54V9.86c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.91h-2.34V22c4.78-.8 8.44-4.94 8.44-9.94z"/></svg>
                            </span>
                            <span class="w-7 h-7 rounded-full bg-[#25D366] flex items-center justify-center text-white cursor-pointer hover:opacity-90 transition shadow-xs" title="WhatsApp">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor"><path d="M12.02 2C6.5 2 2.02 6.48 2.02 12c0 1.77.46 3.45 1.28 4.9L2 22l5.25-1.28A9.96 9.96 0 0012.02 22C17.54 22 22 17.52 22 12S17.54 2 12.02 2zm5.85 14.24c-.25.71-1.24 1.3-2.03 1.47-.55.12-1.26.21-3.65-.78-2.99-1.24-4.92-4.26-5.07-4.46-.15-.2-1.2-1.6-1.2-3.05 0-1.45.75-2.16 1.02-2.46.27-.3.58-.37.78-.37.2 0 .39 0 .56.01.18.01.42-.07.65.5.25.6.85 2.07.92 2.22.07.15.12.33.02.53-.1.2-.15.33-.3.5-.15.18-.31.4-.44.53-.15.15-.3.31-.13.6.17.3.75 1.24 1.62 2.01 1.11.99 2.05 1.3 2.34 1.44.29.15.46.13.63-.08.17-.2.71-.83.9-1.11.19-.29.38-.24.63-.15.25.1 1.62.77 1.9.91.28.14.46.21.53.33.08.13.08.72-.17 1.43z"/></svg>
                            </span>
                            <span class="w-7 h-7 rounded-full bg-[#26A5E4] flex items-center justify-center text-white cursor-pointer hover:opacity-90 transition shadow-xs" title="Telegram">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white" fill="currentColor"><path d="M21.9 4.3c.28-1.17-.42-1.63-1.18-1.35L2.6 10.36c-1.13.45-1.11 1.08-.19 1.36l4.6 1.44 1.79 5.44c.22.6.4.83.8.83.4 0 .58-.18.8-.4l1.9-1.85 4.02 2.96c.72.4 1.24.2 1.42-.68l2.15-15.16zM8.86 13.4l9.3-5.86c.44-.27.84-.13.51.17l-7.9 7.13-.3 3.24-1.61-4.68z"/></svg>
                            </span>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Event Modal Handlers
    function openEventModal(isEdit = false) {
        const modal = document.getElementById('event-modal');
        const card = document.getElementById('event-modal-card');
        const title = document.getElementById('event-modal-title');

        if (title) {
            title.innerHTML = `<span class="w-2.5 h-2.5 rounded-full bg-[#F4DEAC]"></span><span>${isEdit ? 'Edit Event Item' : 'Add New Event Item'}</span>`;
        }

        if (modal && card) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                card.classList.remove('scale-95');
                card.classList.add('scale-100');
            }, 10);
        }
    }

    function closeEventModal() {
        const modal = document.getElementById('event-modal');
        const card = document.getElementById('event-modal-card');
        if (modal && card) {
            modal.classList.add('opacity-0');
            card.classList.remove('scale-100');
            card.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                resetEventForm();
            }, 200);
        }
    }

    function resetEventForm() {
        document.getElementById('event-form')?.reset();
        document.getElementById('event-id').value = '';
        document.getElementById('event-image-url').value = '';
        const prevImg = document.getElementById('event-image-preview');
        const placeholder = document.getElementById('event-image-placeholder');
        if (prevImg) { prevImg.src = ''; prevImg.classList.add('hidden'); }
        if (placeholder) placeholder.classList.remove('hidden');
    }

    function previewSelectedImage(event) {
        const file = event.target.files[0];
        const prevImg = document.getElementById('event-image-preview');
        const placeholder = document.getElementById('event-image-placeholder');
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                if (prevImg) {
                    prevImg.src = e.target.result;
                    prevImg.classList.remove('hidden');
                }
                if (placeholder) placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    function updateModalImagePreviewFromUrl(url) {
        const prevImg = document.getElementById('event-image-preview');
        const placeholder = document.getElementById('event-image-placeholder');
        if (url && url.trim().length > 0) {
            if (prevImg) {
                prevImg.src = resolveImageUrl(url.trim());
                prevImg.classList.remove('hidden');
            }
            if (placeholder) placeholder.classList.add('hidden');
        } else {
            if (prevImg) prevImg.classList.add('hidden');
            if (placeholder) placeholder.classList.remove('hidden');
        }
    }

    function editEvent(id) {
        const ev = eventsData.find(e => e.id === id);
        if (!ev) return;

        document.getElementById('event-id').value = ev.id;
        document.getElementById('event-title').value = ev.title || '';
        document.getElementById('event-desc').value = ev.description || '';
        document.getElementById('event-image-url').value = ev.image || '';
        document.getElementById('event-link').value = ev.link || '/insights/view-full-insight';
        document.getElementById('event-link-text').value = ev.link_text || 'Link';
        document.getElementById('event-facebook-url').value = ev.facebook_url || '';
        document.getElementById('event-whatsapp-url').value = ev.whatsapp_url || '';
        document.getElementById('event-telegram-url').value = ev.telegram_url || '';
        document.getElementById('event-status').value = ev.status || 'published';
        document.getElementById('event-sort-order').value = ev.sort_order ?? 1;

        updateModalImagePreviewFromUrl(ev.image || '');
        openEventModal(true);
    }

    async function handleEventSubmit(e) {
        e.preventDefault();
        const id = document.getElementById('event-id').value;
        const btn = document.getElementById('event-submit-btn');
        if (btn) { btn.disabled = true; btn.innerText = 'Saving...'; }

        const formData = new FormData();
        formData.append('title', document.getElementById('event-title').value);
        formData.append('description', document.getElementById('event-desc').value);
        formData.append('link', document.getElementById('event-link').value);
        formData.append('link_text', document.getElementById('event-link-text').value);
        formData.append('facebook_url', document.getElementById('event-facebook-url').value);
        formData.append('whatsapp_url', document.getElementById('event-whatsapp-url').value);
        formData.append('telegram_url', document.getElementById('event-telegram-url').value);
        formData.append('status', document.getElementById('event-status').value);
        formData.append('sort_order', document.getElementById('event-sort-order').value);

        const fileInput = document.getElementById('event-image-file');
        if (fileInput && fileInput.files[0]) {
            formData.append('image_file', fileInput.files[0]);
        } else {
            formData.append('image', document.getElementById('event-image-url').value);
        }

        const endpoint = id ? `/api/event-items/${id}` : '/api/event-items';

        try {
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
                showToast(id ? 'Event updated successfully!' : 'Event created successfully!');
                closeEventModal();
                await fetchEvents();
            } else {
                showToast(data.message || 'Error saving event', 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Failed to save event', 'error');
        } finally {
            if (btn) { btn.disabled = false; btn.innerText = 'Save Event'; }
        }
    }

    // Delete Event Handlers
    function openDeleteEventModal(id) {
        document.getElementById('delete-event-id').value = id;
        const modal = document.getElementById('delete-event-modal');
        const card = document.getElementById('delete-event-modal-card');
        if (modal && card) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                card.classList.remove('scale-95');
                card.classList.add('scale-100');
            }, 10);
        }
    }

    function closeDeleteEventModal() {
        const modal = document.getElementById('delete-event-modal');
        const card = document.getElementById('delete-event-modal-card');
        if (modal && card) {
            modal.classList.add('opacity-0');
            card.classList.remove('scale-100');
            card.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }
    }

    async function confirmDeleteEvent() {
        const id = document.getElementById('delete-event-id').value;
        if (!id) return;

        try {
            const res = await fetch(`/api/event-items/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Event item deleted successfully!');
                closeDeleteEventModal();
                await fetchEvents();
            } else {
                showToast(data.message || 'Error deleting event', 'error');
            }
        } catch (err) {
            console.error(err);
            showToast('Failed to delete event', 'error');
        }
    }

    // ==========================================
    // FAQS SECTION JS (EVENTS PAGE)
    // ==========================================
    async function fetchFaqs() {
        try {
            const res = await fetch('/api/faqs?page=events');
            const data = await res.json();
            if (data.success) {
                faqsData = data.data;
                renderFaqsTable();
                renderFaqLivePreview();
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

    function renderFaqLivePreview() {
        const grid = document.getElementById('faq-live-preview-grid');
        if (!grid) return;

        const leftFaqs = faqsData.filter(f => f.column === 'left' && f.status === 'published');
        const rightFaqs = faqsData.filter(f => f.column === 'right' && f.status === 'published');

        function formatFaqAnswerHtml(text) {
            if (!text) return '';
            if (/<[a-z][\s\S]*>/i.test(text)) {
                return text;
            }
            const lines = text.replace(/\r\n/g, '\n').replace(/\r/g, '\n').split('\n');
            let html = '';
            let inList = false;

            for (let line of lines) {
                const trimmed = line.trim();
                const bulletMatch = trimmed.match(/^[\u2022\-\*]\s*(.+)$/);
                if (bulletMatch) {
                    if (!inList) {
                        inList = true;
                        html += '<ul class="list-disc pl-5 my-1.5 space-y-1">';
                    }
                    html += `<li class="leading-relaxed">${escapeHtml(bulletMatch[1])}</li>`;
                } else {
                    if (inList) {
                        html += '</ul>';
                        inList = false;
                    }
                    if (trimmed === '') {
                        html += '<div class="h-1.5"></div>';
                    } else {
                        html += `<p class="leading-relaxed">${escapeHtml(trimmed)}</p>`;
                    }
                }
            }
            if (inList) {
                html += '</ul>';
            }
            return html;
        }

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
                                <div class="preview-faq-panel overflow-hidden transition-all duration-300 ${isOpen ? 'max-h-[600px]' : 'max-h-0'}">
                                    <div class="${isOpen ? 'bg-[#1479B9] text-white' : 'bg-white text-black/70'} px-5 py-4 sm:px-6 sm:py-5 transition-colors duration-200">
                                        <div class="text-[13px] sm:text-[13.5px] leading-relaxed">
                                            ${formatFaqAnswerHtml(f.answer)}
                                        </div>
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

    function insertEventFaqBullet() {
        const textarea = document.getElementById('faq-answer');
        if (!textarea) return;
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const val = textarea.value;
        const prefix = (start === 0 || val[start - 1] === '\n') ? '• ' : '\n• ';
        textarea.value = val.substring(0, start) + prefix + val.substring(end);
        textarea.focus();
        textarea.selectionStart = textarea.selectionEnd = start + prefix.length;
    }

    function insertEventFaqFacilitiesTemplate() {
        const textarea = document.getElementById('faq-answer');
        if (!textarea) return;
        const template = "Facilities vary by property and may include:\n\n• Swimming Pool\n• Fitness Center\n• Panoramic River View\n• Parking\n• Security\n• Elevator Access\n• Wi-Fi";
        if (textarea.value.trim().length > 0) {
            textarea.value = textarea.value + "\n\n" + template;
        } else {
            textarea.value = template;
        }
        textarea.focus();
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
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Events FAQ';
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
                body: JSON.stringify({
                    page: 'events',
                    question: question,
                    answer: answer,
                    column: column,
                    status: status,
                })
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast(id ? 'FAQ updated successfully!' : 'FAQ created successfully!');
                closeFaqModal();
                await fetchFaqs();
            } else {
                showToast(data.message || 'Failed to save FAQ', 'error');
            }
        } catch (err) {
            console.error('Error saving FAQ:', err);
            showToast('An error occurred while saving FAQ', 'error');
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

        try {
            const res = await fetch(`/api/faqs/${faqToDeleteId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const data = await res.json();
            if (res.ok && data.success) {
                showToast('FAQ deleted successfully!');
                closeDeleteModal();
                await fetchFaqs();
            } else {
                showToast(data.message || 'Failed to delete FAQ', 'error');
            }
        } catch (err) {
            console.error('Error deleting FAQ:', err);
            showToast('An error occurred while deleting FAQ', 'error');
        }
    }
</script>
@endsection
