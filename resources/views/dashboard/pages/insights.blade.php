@extends('dashboard.layout')

@section('title', 'Insights & News - Content Management - CWD Realty')

@section('content')
<div class="space-y-6 max-w-[1400px] mx-auto pb-16">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200 pb-5">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                <span>Dashboard</span><span>/</span><span>Pages</span><span>/</span>
                <span class="text-[#1479B9] font-bold">Insights & News</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Insights & News Content Management</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage the Hero Banner, Detail Cards, View Full Insight page content, and FAQs.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/insights') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            <a href="{{ url('/insights/view-full-insight') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#2A5A8A]/10 border border-[#2A5A8A]/30 text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Full Insight</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="relative flex items-center border-b border-slate-200 py-1">
        <div class="flex-1 flex items-center gap-1 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            <button type="button" onclick="switchInsightsTab('hero', event)" id="tab-btn-hero"
                class="insights-tab-btn px-4 py-3 text-sm font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>Hero & Banner</span>
            </button>
            <button type="button" onclick="switchInsightsTab('cards', event)" id="tab-btn-cards"
                class="insights-tab-btn px-4 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                <span>Detail Cards & Full Insight Content</span>
                <span id="cards-count-badge" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
            </button>
            <button type="button" onclick="switchInsightsTab('faqs', event)" id="tab-btn-faqs"
                class="insights-tab-btn px-4 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>FAQs</span>
                <span id="tab-badge-faq-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
            </button>
        </div>
    </div>

    {{-- ========== TAB 1: HERO & BANNER ========== --}}
    <div id="tab-content-hero" class="insights-tab-content space-y-6">
        <form onsubmit="handleHeroSubmit(event)" class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Insights Hero Section Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize tagline formatting, headline text, bullet highlights, and action buttons.</p>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Tagline Text</label>
                        <div class="flex items-center gap-1.5">
                            <button type="button" onmousedown="event.preventDefault(); formatHeroTagline('bold');" class="px-3 py-1 bg-white border border-slate-300 hover:bg-[#2A5A8A] hover:text-white text-slate-800 rounded font-bold text-xs shadow-xs transition-colors flex items-center gap-1 cursor-pointer"><span class="font-black text-sm">B</span><span class="text-xs">Bold</span></button>
                            <button type="button" onmousedown="event.preventDefault(); formatHeroTagline('normal');" class="px-2.5 py-1 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded text-xs font-medium transition-colors cursor-pointer">Normal</button>
                        </div>
                    </div>
                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()"
                        class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A]"
                        style="color:#0f172a!important;">Insights</div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline (H1)</h3>
                    <textarea id="hero-headline-input" rows="3" oninput="updateHeroPreview()"
                        class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">Your Trusted Property
Management & Hospitality
Partner in Cambodia</textarea>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div><h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights</h3></div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="addHeroBulletPoint()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Add Bullet
                            </button>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="hero-bullets-toggle" onchange="updateHeroPreview()" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#2A5A8A]"></div>
                                <span class="ml-2 text-xs font-semibold text-slate-700">Show</span>
                            </label>
                        </div>
                    </div>
                    <div id="dynamic-bullets-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3"></div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">4. Action Buttons (Max 3)</h3>
                        <button type="button" onclick="addHeroButton()" id="add-btn-trigger" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Add Button
                        </button>
                    </div>
                    <div id="hero-buttons-container" class="space-y-3"></div>
                </div>

                <div class="pt-4 border-t border-slate-200 flex justify-end">
                    <button type="submit" id="hero-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">Save Hero Section</button>
                </div>
            </div>
        </form>

        {{-- Live Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center gap-2 pb-4 border-b border-slate-200">
                <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Hero Preview</h3>
            </div>
            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[280px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-right opacity-40" style="background-image:url('{{ asset('hero_section/hero_sectionsss.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>
                <div class="relative z-10 max-w-[600px] w-full">
                    <div class="h-[8px] max-w-[16rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    <div class="bg-[#163049]/90 p-6">
                        <div class="flex items-center gap-3 mb-3"><span class="h-[2px] w-10 bg-[#F4DEAC]"></span><span id="preview-hero-tagline" class="text-[18px] font-bold text-[#F4DEAC]">Insights</span></div>
                        <h1 id="preview-hero-headline" class="text-white text-[20px] font-semibold leading-snug mb-3">Your Trusted Property Management & Hospitality Partner in Cambodia</h1>
                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] mb-4 flex flex-wrap gap-x-3 gap-y-1" style="display:none;"></div>
                        <div id="preview-hero-buttons" class="flex flex-wrap gap-3">
                            <a href="#" class="border-[2px] border-[#F4DEAC] text-white text-[13px] px-4 py-2">Browse Properties</a>
                            <a href="#" class="border-[2px] border-[#F4DEAC] text-white text-[13px] px-4 py-2">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========== TAB 2: DETAIL CARDS & FULL INSIGHT CONTENT ========== --}}
    <div id="tab-content-cards" class="insights-tab-content hidden space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white border border-slate-200 rounded-xl p-4 shadow-sm">
            <div>
                <h2 class="text-base font-bold text-[#163049]">Insight Detail Cards &amp; Full Insight Pages</h2>
                <p class="text-xs text-slate-500 mt-0.5">Manage both the overview cards and their connected View Full Insight detail pages. Clicking each card on frontend redirects to its specific detail page.</p>
            </div>
            <button type="button" onclick="openCardModal()" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#2A5A8A] text-white text-xs font-bold hover:bg-[#163049] transition-colors shadow-sm cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Add New Card &amp; Detail Page
            </button>
        </div>
        <div id="cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="col-span-full flex items-center justify-center py-12 text-slate-400 text-sm">
                <svg class="w-8 h-8 mr-3 animate-spin text-[#2A5A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                Loading cards...
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 4: FREQUENTLY ASKED QUESTIONS (FAQS)                                 --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-faqs" class="insights-tab-content hidden space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Insights FAQs</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for the Insights &amp; View Full Insight pages.</p>
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
                    <p class="text-xs text-slate-500 mt-1">Get started by creating your first Insights FAQ item.</p>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card for FAQs --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Insights FAQ Preview</h3>
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

{{-- ========== CARD & DETAIL MODAL ========== --}}
<div id="card-modal" class="fixed inset-0 z-[9000] flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeCardModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[92vh] flex flex-col overflow-hidden">
        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-slate-50">
            <div>
                <h2 id="modal-title" class="text-lg font-bold text-[#163049]">Add Insight Card &amp; Detail Page</h2>
                <p class="text-xs text-slate-500 mt-0.5">Edit the overview card (top) and the connected "View Full Insight" detail page (bottom).</p>
            </div>
            <button onclick="closeCardModal()" class="p-2 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        {{-- Modal Scrollable Body --}}
        <form id="card-form" onsubmit="submitCardForm(event)" class="flex-1 overflow-y-auto p-6 space-y-8">
            <input type="hidden" id="card-id">

            {{-- ============================================================ --}}
            {{-- PART 1 (TOP): OVERVIEW CARD (NOT DETAIL)                      --}}
            {{-- ============================================================ --}}
            <div class="bg-white border-2 border-[#2A5A8A]/20 rounded-xl p-5 shadow-xs space-y-5">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-[#2A5A8A] text-white font-black text-xs flex items-center justify-center">1</span>
                        <div>
                            <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Top Section: Overview Card (Not Detail)</h3>
                            <p class="text-[11px] text-slate-500">Displayed in the cards carousel on the /insights page.</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-semibold px-2.5 py-1 rounded bg-[#2A5A8A]/10 text-[#2A5A8A]">Carousel Slide</span>
                </div>

                {{-- Card Image --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Card Thumbnail Image</label>
                    <div class="w-full sm:w-[320px] h-[160px] rounded-xl overflow-hidden border-2 border-dashed border-slate-300 bg-slate-50 relative group">
                        <img id="card-img-preview" src="{{ asset('home/latest_activities/3img.png') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <label class="cursor-pointer bg-white text-[#2A5A8A] text-xs font-bold px-3 py-1.5 rounded-lg shadow">
                                Change Image<input type="file" id="card-img-file" accept="image/*" onchange="previewCardImage(this)" class="hidden">
                            </label>
                        </div>
                    </div>
                    <input type="hidden" id="card-img-current">
                </div>

                {{-- Card Title & Description --}}
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Card Title <span class="text-rose-500">*</span></label>
                        <input type="text" id="card-title" placeholder="e.g. Discover Wealth Mansion" required oninput="syncCardTitleToBanner(this.value)" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Card Short Description</label>
                        <textarea id="card-description" rows="2" placeholder="Brief summary for carousel card..." class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed"></textarea>
                    </div>
                </div>

                {{-- Link & Order & Status --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Button / Link Text</label>
                        <input type="text" id="card-link-text" value="View Full Insights" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Sort Order</label>
                        <input type="number" id="card-sort-order" value="0" min="0" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-[#2A5A8A]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Status</label>
                        <select id="card-status" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-[#2A5A8A]">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="card-link" value="">
            </div>

            {{-- ============================================================ --}}
            {{-- PART 2 (BOTTOM): VIEW FULL INSIGHT DETAIL PAGE CONTENT        --}}
            {{-- ============================================================ --}}
            <div class="bg-slate-50 border-2 border-slate-200 rounded-xl p-5 shadow-xs space-y-6">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-[#1479B9] text-white font-black text-xs flex items-center justify-center">2</span>
                        <div>
                            <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Bottom Section: View Full Insight Detail Page</h3>
                            <p class="text-[11px] text-slate-500">Content shown when visitors click "View Full Insights" on this card.</p>
                        </div>
                    </div>
                    <span id="detail-preview-link-container"></span>
                </div>

                {{-- Detail Banner Headline --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Blue Banner Headline</label>
                    <textarea id="modal-detail-banner-title" rows="2" placeholder="Headline on blue banner..." class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed"></textarea>
                </div>

                {{-- Two Overlapping Images --}}
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Detail Hero Images (Two Overlapping Cards)</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Left Image --}}
                        <div class="space-y-1.5">
                            <span class="text-xs font-semibold text-slate-600">Left Image (Large — 690px)</span>
                            <div class="relative h-[150px] rounded-lg overflow-hidden border-2 border-dashed border-slate-300 bg-white group">
                                <img id="modal-detail-img-left-preview" src="{{ asset('home/latest_activities/3img.png') }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <label class="cursor-pointer bg-white text-[#2A5A8A] text-xs font-bold px-3 py-1.5 rounded-lg shadow">
                                        Change Image
                                        <input type="file" id="modal-detail-img-left-file" accept="image/*" onchange="previewDetailImg(this, 'modal-detail-img-left-preview')" class="hidden">
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" id="modal-detail-img-left-current">
                        </div>

                        {{-- Right Image --}}
                        <div class="space-y-1.5">
                            <span class="text-xs font-semibold text-slate-600">Right Image (Small — 410px)</span>
                            <div class="relative h-[150px] rounded-lg overflow-hidden border-2 border-dashed border-slate-300 bg-white group">
                                <img id="modal-detail-img-right-preview" src="{{ asset('home/latest_activities/3img.png') }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <label class="cursor-pointer bg-white text-[#2A5A8A] text-xs font-bold px-3 py-1.5 rounded-lg shadow">
                                        Change Image
                                        <input type="file" id="modal-detail-img-right-file" accept="image/*" onchange="previewDetailImg(this, 'modal-detail-img-right-preview')" class="hidden">
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" id="modal-detail-img-right-current">
                        </div>
                    </div>
                </div>

                {{-- Body Paragraphs --}}
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Body Text Paragraphs</label>
                        <button type="button" onclick="addModalBodyParagraph()" class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Add Paragraph
                        </button>
                    </div>
                    <div id="modal-body-paragraphs-container" class="space-y-2.5"></div>
                </div>

                {{-- Feature Section --}}
                <div class="space-y-4 pt-2 border-t border-slate-200">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">4. Feature Section (Image + Text)</label>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        {{-- Feature Image --}}
                        <div class="space-y-1.5">
                            <span class="text-xs font-semibold text-slate-600">Feature Image (Left, 460px)</span>
                            <div class="relative h-[160px] rounded-lg overflow-hidden border-2 border-dashed border-slate-300 bg-white group">
                                <img id="modal-detail-feature-img-preview" src="{{ asset('about_us/our_story/top_one.png') }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <label class="cursor-pointer bg-white text-[#2A5A8A] text-xs font-bold px-3 py-1.5 rounded-lg shadow">
                                        Change Image
                                        <input type="file" id="modal-detail-feature-img-file" accept="image/*" onchange="previewDetailImg(this, 'modal-detail-feature-img-preview')" class="hidden">
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" id="modal-detail-feature-img-current">
                        </div>

                        {{-- Feature Paragraphs --}}
                        <div class="lg:col-span-2 space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-slate-600">Feature Paragraphs (Right Column)</span>
                                <button type="button" onclick="addModalFeatureParagraph()" class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Add
                                </button>
                            </div>
                            <div id="modal-feature-paragraphs-container" class="space-y-2.5"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Footer / Buttons --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="closeCardModal()" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 cursor-pointer">Cancel</button>
                <button type="submit" id="card-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-sm font-bold shadow-md transition-all cursor-pointer">Save Card &amp; Detail Page</button>
            </div>
        </form>
    </div>
</div>

{{-- ========== CARD DELETE MODAL ========== --}}
<div id="delete-card-modal" class="fixed inset-0 z-[9100] flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/60" onclick="closeDeleteCardModal()"></div>
    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-sm p-6 text-center space-y-4">
        <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center mx-auto">
            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </div>
        <h3 class="text-base font-bold text-[#163049]">Delete Card?</h3>
        <p id="delete-card-modal-desc" class="text-sm text-slate-500">This action cannot be undone.</p>
        <div class="flex gap-3">
            <button onclick="closeDeleteCardModal()" class="flex-1 py-2 rounded-lg border border-slate-300 text-slate-700 text-sm font-semibold cursor-pointer">Cancel</button>
            <button onclick="confirmDeleteCard()" class="flex-1 py-2 rounded-lg bg-rose-600 text-white text-sm font-bold hover:bg-rose-700 cursor-pointer">Delete</button>
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
                <input type="text" id="faq-question" required placeholder="e.g. Why should I stay at a property managed by CWD?" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors">
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
        <p class="text-xs text-slate-500">Are you sure you want to permanently remove this question from your Insights page?</p>
        <div class="flex items-center justify-center gap-3 pt-2">
            <button type="button" onclick="closeDeleteFaqModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">Cancel</button>
            <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-lg shadow-sm transition-all cursor-pointer">Delete Now</button>
        </div>
    </div>
</div>

{{-- ========== FAQ DELETE MODAL ========== --}}
<div id="delete-faq-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div id="delete-faq-modal-card" class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete FAQ?</h3>
        <p class="text-xs text-slate-500 mb-6">This action cannot be undone.</p>
        <input type="hidden" id="delete-faq-id">
        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteFaqModal()" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-100 cursor-pointer">Cancel</button>
            <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs shadow-sm cursor-pointer">Yes, Delete</button>
        </div>
    </div>
</div>

{{-- Toast --}}
<div id="toast-container" class="fixed bottom-5 right-5 z-[9999] space-y-2 pointer-events-none"></div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'insights';
    const availableRoutes = [
        { label: 'Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Home (/)', url: '/' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Partners (/partners)', url: '/partners' },
        { label: 'Insights & News (/insights)', url: '/insights' }
    ];

    let heroBulletsData = [];
    let heroButtonsData = [
        { text: 'Browse Properties', url: '/properties' },
        { text: 'Contact Us', url: '/contact-us' }
    ];
    let cardsData = [];
    let deleteCardId = null;
    let faqsData = [];
    let bodyParas = [];
    let featureParas = [];

    // ==========================================
    // TABS
    // ==========================================
    function switchInsightsTab(tab, e) {
        document.querySelectorAll('.insights-tab-btn').forEach(btn => {
            btn.classList.remove('font-bold', 'text-[#2A5A8A]', 'border-[#2A5A8A]');
            btn.classList.add('font-medium', 'text-slate-500', 'border-transparent');
        });
        const activeBtn = document.getElementById('tab-btn-' + tab);
        if (activeBtn) {
            activeBtn.classList.remove('font-medium', 'text-slate-500', 'border-transparent');
            activeBtn.classList.add('font-bold', 'text-[#2A5A8A]', 'border-[#2A5A8A]');
        }
        document.querySelectorAll('.insights-tab-content').forEach(el => el.classList.add('hidden'));
        const content = document.getElementById('tab-content-' + tab);
        if (content) content.classList.remove('hidden');

        if (tab === 'cards') fetchCards();
        if (tab === 'faqs') fetchFaqs();
        if (tab === 'detail') fetchDetailSection();
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        renderHeroButtonsInputs();
    });

    // ==========================================
    // HERO SECTION
    // ==========================================
    function formatHeroTagline(command) {
        const editor = document.getElementById('hero-tagline-editor');
        if (!editor) return;
        editor.focus();
        if (command === 'bold') document.execCommand('bold', false, null);
        else document.execCommand('removeFormat', false, null);
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

    function addHeroBulletPoint() { heroBulletsData.push('New Highlight'); renderHeroBulletsInputs(); updateHeroPreview(); }

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        const addBtn = document.getElementById('add-btn-trigger');
        if (!container) return;
        if (heroButtonsData.length >= 3) addBtn?.classList.add('hidden');
        else addBtn?.classList.remove('hidden');
        container.innerHTML = heroButtonsData.map((btn, i) => `
            <div class="p-3.5 bg-white border border-slate-200 rounded-lg flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">${i+1}</span>
                <div class="flex-1"><label class="block text-[10px] font-bold uppercase text-slate-500 mb-1">Label</label>
                    <input type="text" value="${escapeHtml(btn.text)}" oninput="heroButtonsData[${i}].text=this.value;updateHeroPreview();" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div class="flex-1"><label class="block text-[10px] font-bold uppercase text-slate-500 mb-1">Route</label>
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
        if (heroButtonsData.length >= 3) { showToast('Maximum 3 buttons allowed'); return; }
        heroButtonsData.push({ text: 'Learn More', url: '/insights' });
        renderHeroButtonsInputs();
    }

    function updateHeroPreview() {
        const rawHtml = document.getElementById('hero-tagline-editor')?.innerHTML.trim() || '';
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
        } catch (err) { console.error('Error fetching hero:', err); }
    }

    async function handleHeroSubmit(e) {
        e.preventDefault();
        const btn = document.getElementById('hero-submit-btn');
        if (btn) { btn.disabled = true; btn.innerText = 'Saving...'; }
        try {
            const res = await fetch(`/api/hero-section/${pageSlug}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: JSON.stringify({
                    page: pageSlug,
                    tagline_html: document.getElementById('hero-tagline-editor')?.innerHTML.trim() || '',
                    show_tagline: true,
                    headline: document.getElementById('hero-headline-input').value,
                    show_bullets: document.getElementById('hero-bullets-toggle').checked,
                    bullets: heroBulletsData,
                    buttons: heroButtonsData
                })
            });
            const data = await res.json();
            if (res.ok && data.success) showToast('Insights Hero Section saved!');
            else showToast(data.message || 'Error saving', 'error');
        } catch (err) { showToast('Failed to save', 'error'); }
        finally { if (btn) { btn.disabled = false; btn.innerText = 'Save Hero Section'; } }
    }

    // ==========================================
    // INSIGHT CARDS & DETAIL PAGE MANAGEMENT
    // ==========================================
    let modalBodyParas = [];
    let modalFeatureParas = [];

    async function fetchCards() {
        try {
            const res = await fetch('/api/insight-cards');
            const result = await res.json();
            if (result.success) { cardsData = result.data; renderCardsGrid(); }
        } catch (err) {
            document.getElementById('cards-grid').innerHTML = '<div class="col-span-full text-center py-10 text-rose-500 text-sm">Failed to load cards.</div>';
        }
    }

    function renderCardsGrid() {
        const grid = document.getElementById('cards-grid');
        const badge = document.getElementById('cards-count-badge');
        if (badge) badge.innerText = cardsData.length;
        if (cardsData.length === 0) {
            grid.innerHTML = `<div class="col-span-full text-center py-14"><p class="text-slate-400 text-sm mb-3">No insight cards yet.</p><button onclick="openCardModal()" class="px-5 py-2 rounded-lg bg-[#2A5A8A] text-white text-xs font-bold cursor-pointer">Add First Card</button></div>`;
            return;
        }
        grid.innerHTML = cardsData.map(card => {
            const imgSrc = card.image ? (card.image.startsWith('storage/') ? '/' + card.image : '/' + card.image) : '/home/latest_activities/3img.png';
            const detailUrl = `/insights/view-full-insight/${card.id}`;
            return `<div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm group hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="relative h-[170px] overflow-hidden">
                        <img src="${imgSrc}" alt="${escapeHtml(card.title)}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute bottom-0 left-0 h-[5px] w-[60%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                        <span class="absolute top-2 right-2 px-2 py-0.5 rounded text-[10px] font-bold ${card.status==='published'?'bg-emerald-500 text-white':'bg-slate-400 text-white'}">${card.status==='published'?'Published':'Draft'}</span>
                    </div>
                    <div class="p-4 space-y-2">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-sm font-bold text-[#163049] leading-snug flex-1">${escapeHtml(card.title)}</h3>
                            <span class="text-[10px] bg-slate-100 text-slate-500 font-semibold px-2 py-0.5 rounded shrink-0">#${card.sort_order}</span>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">${escapeHtml(card.description||'')}</p>
                        <div class="pt-1 flex items-center justify-between">
                            <a href="${detailUrl}" target="_blank" class="text-[#1479B9] text-[11px] font-bold hover:underline inline-flex items-center gap-1">
                                <span>${escapeHtml(card.link_text||'View Full Insights')}</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-4 pb-4 pt-2 border-t border-slate-100">
                    <button onclick="openCardModal(${card.id})" class="flex-1 py-2 rounded-lg bg-[#2A5A8A] text-white text-xs font-bold hover:bg-[#163049] transition-colors cursor-pointer shadow-xs">Edit Card &amp; Detail</button>
                    <button onclick="openDeleteCardModal(${card.id},'${escapeHtml(card.title)}')" class="px-3 py-2 rounded-lg border border-rose-300 text-rose-600 text-xs font-semibold hover:bg-rose-600 hover:text-white transition-colors cursor-pointer">Delete</button>
                </div>
            </div>`;
        }).join('');
    }

    const defaultDetailContent = {
        banner_title: "Your Trusted Property\nManagement & Hospitality\nPartner in Cambodia",
        image_left: 'home/latest_activities/3img.png',
        image_right: 'home/latest_activities/3img.png',
        body_paragraphs: [
            'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
            'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia. Through frequent international travel, face-to-face meetings, business presentations, and contract negotiations, they established valuable relationships with overseas partners and property investors.',
            'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest. We believe that lasting business relationships are built through professionalism, transparency, and consistently delivering value.',
            'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.'
        ],
        feature_image: 'about_us/our_story/top_one.png',
        feature_paragraphs: [
            'CWD Realty & Hospitality was founded with a clear vision—to create a professional property management and hospitality company built on trust, integrity, and long-term partnerships.',
            'Our journey began with founders who were committed to expanding business opportunities beyond Cambodia.',
            'Today, that same commitment continues to shape how we serve every property owner, tenant, investor, and guest.',
            'As Cambodia\'s real estate and hospitality industries continue to grow, CWD Realty & Hospitality remains dedicated to providing dependable property management, flexible leasing solutions, and exceptional hospitality services.'
        ]
    };

    function syncCardTitleToBanner(val) {
        const bannerInput = document.getElementById('modal-detail-banner-title');
        if (bannerInput && (!bannerInput.value || bannerInput.value === defaultDetailContent.banner_title)) {
            bannerInput.value = val;
        }
    }

    function openCardModal(id = null) {
        const modal = document.getElementById('card-modal');
        document.getElementById('card-id').value = '';
        document.getElementById('card-title').value = '';
        document.getElementById('card-description').value = '';
        document.getElementById('card-link-text').value = 'View Full Insights';
        document.getElementById('card-sort-order').value = 0;
        document.getElementById('card-status').value = 'published';
        document.getElementById('card-img-current').value = '';
        document.getElementById('card-img-preview').src = '/home/latest_activities/3img.png';
        document.getElementById('card-img-file').value = '';

        // Reset Detail Fields
        document.getElementById('modal-detail-banner-title').value = defaultDetailContent.banner_title;
        document.getElementById('modal-detail-img-left-preview').src = '/' + defaultDetailContent.image_left;
        document.getElementById('modal-detail-img-left-current').value = defaultDetailContent.image_left;
        document.getElementById('modal-detail-img-left-file').value = '';

        document.getElementById('modal-detail-img-right-preview').src = '/' + defaultDetailContent.image_right;
        document.getElementById('modal-detail-img-right-current').value = defaultDetailContent.image_right;
        document.getElementById('modal-detail-img-right-file').value = '';

        document.getElementById('modal-detail-feature-img-preview').src = '/' + defaultDetailContent.feature_image;
        document.getElementById('modal-detail-feature-img-current').value = defaultDetailContent.feature_image;
        document.getElementById('modal-detail-feature-img-file').value = '';

        modalBodyParas = [...defaultDetailContent.body_paragraphs];
        modalFeatureParas = [...defaultDetailContent.feature_paragraphs];

        document.getElementById('modal-title').innerText = 'Add New Insight Card & Detail Page';
        const previewContainer = document.getElementById('detail-preview-link-container');
        previewContainer.innerHTML = '';

        if (id) {
            const card = cardsData.find(c => c.id == id);
            if (!card) return;
            document.getElementById('modal-title').innerText = `Edit: ${card.title}`;
            document.getElementById('card-id').value = card.id;
            document.getElementById('card-title').value = card.title || '';
            document.getElementById('card-description').value = card.description || '';
            document.getElementById('card-link-text').value = card.link_text || 'View Full Insights';
            document.getElementById('card-sort-order').value = card.sort_order ?? 0;
            document.getElementById('card-status').value = card.status || 'published';
            document.getElementById('card-img-current').value = card.image || '';
            if (card.image) {
                document.getElementById('card-img-preview').src = card.image.startsWith('storage/') ? '/' + card.image : '/' + card.image;
            }

            // Populate Card Detail Fields
            document.getElementById('modal-detail-banner-title').value = card.banner_title || card.title || defaultDetailContent.banner_title;

            if (card.image_left) {
                document.getElementById('modal-detail-img-left-preview').src = card.image_left.startsWith('storage/') ? '/' + card.image_left : '/' + card.image_left;
                document.getElementById('modal-detail-img-left-current').value = card.image_left;
            } else if (card.image) {
                document.getElementById('modal-detail-img-left-preview').src = card.image.startsWith('storage/') ? '/' + card.image : '/' + card.image;
                document.getElementById('modal-detail-img-left-current').value = card.image;
            }

            if (card.image_right) {
                document.getElementById('modal-detail-img-right-preview').src = card.image_right.startsWith('storage/') ? '/' + card.image_right : '/' + card.image_right;
                document.getElementById('modal-detail-img-right-current').value = card.image_right;
            }

            if (card.feature_image) {
                document.getElementById('modal-detail-feature-img-preview').src = card.feature_image.startsWith('storage/') ? '/' + card.feature_image : '/' + card.feature_image;
                document.getElementById('modal-detail-feature-img-current').value = card.feature_image;
            }

            if (Array.isArray(card.body_paragraphs) && card.body_paragraphs.length > 0) {
                modalBodyParas = [...card.body_paragraphs];
            }
            if (Array.isArray(card.feature_paragraphs) && card.feature_paragraphs.length > 0) {
                modalFeatureParas = [...card.feature_paragraphs];
            }

            previewContainer.innerHTML = `<a href="/insights/view-full-insight/${card.id}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1 rounded bg-[#1479B9]/10 text-[#1479B9] hover:bg-[#1479B9] hover:text-white text-xs font-semibold transition-colors"><span>View Live Detail Page</span><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg></a>`;
        }

        renderModalParas();
        modal.classList.remove('hidden');
    }

    function closeCardModal() {
        document.getElementById('card-modal').classList.add('hidden');
    }

    function previewCardImage(input) {
        if (input.files && input.files[0]) {
            const r = new FileReader();
            r.onload = e => { document.getElementById('card-img-preview').src = e.target.result; };
            r.readAsDataURL(input.files[0]);
        }
    }

    function previewDetailImg(input, previewId) {
        if (input.files && input.files[0]) {
            const r = new FileReader();
            r.onload = e => { document.getElementById(previewId).src = e.target.result; };
            r.readAsDataURL(input.files[0]);
        }
    }

    function renderModalParas() {
        renderParaList('modal-body-paragraphs-container', modalBodyParas, 'removeModalBodyPara', 'updateModalBodyPara');
        renderParaList('modal-feature-paragraphs-container', modalFeatureParas, 'removeModalFeaturePara', 'updateModalFeaturePara');
    }

    function renderParaList(containerId, paraArray, onRemove, onInput) {
        const c = document.getElementById(containerId);
        if (!c) return;
        c.innerHTML = paraArray.map((p, i) => `
            <div class="flex items-start gap-2">
                <span class="mt-2.5 text-slate-400 text-xs font-bold shrink-0">${i+1}.</span>
                <textarea oninput="${onInput}(${i},this.value)" rows="2" class="flex-1 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">${escapeHtml(p)}</textarea>
                <button type="button" onclick="${onRemove}(${i})" class="mt-2.5 p-1.5 rounded-lg text-slate-400 hover:text-rose-500 hover:bg-rose-50 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </div>`).join('');
    }

    function addModalBodyParagraph() { modalBodyParas.push(''); renderModalParas(); }
    function removeModalBodyPara(i) { modalBodyParas.splice(i, 1); renderModalParas(); }
    function updateModalBodyPara(i, v) { modalBodyParas[i] = v; }

    function addModalFeatureParagraph() { modalFeatureParas.push(''); renderModalParas(); }
    function removeModalFeaturePara(i) { modalFeatureParas.splice(i, 1); renderModalParas(); }
    function updateModalFeaturePara(i, v) { modalFeatureParas[i] = v; }

    async function submitCardForm(e) {
        e.preventDefault();
        const btn = document.getElementById('card-submit-btn');
        btn.disabled = true; btn.innerText = 'Saving Card & Detail...';
        const id = document.getElementById('card-id').value;
        const formData = new FormData();

        // Top: Card Overview Fields
        formData.append('title', document.getElementById('card-title').value);
        formData.append('description', document.getElementById('card-description').value);
        formData.append('link_text', document.getElementById('card-link-text').value);
        formData.append('sort_order', document.getElementById('card-sort-order').value);
        formData.append('status', document.getElementById('card-status').value);

        const currentImg = document.getElementById('card-img-current').value;
        if (currentImg) formData.append('image', currentImg);
        const fileInput = document.getElementById('card-img-file');
        if (fileInput.files[0]) formData.append('image_file', fileInput.files[0]);

        // Bottom: Detail Page Fields
        formData.append('banner_title', document.getElementById('modal-detail-banner-title').value);
        formData.append('body_paragraphs', JSON.stringify(modalBodyParas.filter(p => p.trim())));
        formData.append('feature_paragraphs', JSON.stringify(modalFeatureParas.filter(p => p.trim())));

        const leftCurrent = document.getElementById('modal-detail-img-left-current').value;
        if (leftCurrent) formData.append('image_left', leftCurrent);
        const leftFile = document.getElementById('modal-detail-img-left-file');
        if (leftFile && leftFile.files[0]) formData.append('image_left_file', leftFile.files[0]);

        const rightCurrent = document.getElementById('modal-detail-img-right-current').value;
        if (rightCurrent) formData.append('image_right', rightCurrent);
        const rightFile = document.getElementById('modal-detail-img-right-file');
        if (rightFile && rightFile.files[0]) formData.append('image_right_file', rightFile.files[0]);

        const featCurrent = document.getElementById('modal-detail-feature-img-current').value;
        if (featCurrent) formData.append('feature_image', featCurrent);
        const featFile = document.getElementById('modal-detail-feature-img-file');
        if (featFile && featFile.files[0]) formData.append('feature_image_file', featFile.files[0]);

        const url = id ? `/api/insight-cards/${id}` : '/api/insight-cards';
        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
            const data = await res.json();
            if (res.ok && data.success) {
                showToast(id ? 'Card & Detail Page updated!' : 'Card & Detail Page created!');
                closeCardModal();
                fetchCards();
            } else {
                const errors = data.errors ? Object.values(data.errors).flat().join(' ') : (data.message || 'Error saving');
                showToast(errors, 'error');
            }
        } catch (err) {
            showToast('Failed to save card & detail page', 'error');
        } finally {
            btn.disabled = false;
            btn.innerText = 'Save Card & Detail Page';
        }
    }

    function openDeleteCardModal(id, name) {
        deleteCardId = id;
        document.getElementById('delete-card-modal-desc').innerText = `"${name}" and its detail page will be permanently removed.`;
        document.getElementById('delete-card-modal').classList.remove('hidden');
    }

    function closeDeleteCardModal() {
        document.getElementById('delete-card-modal').classList.add('hidden');
        deleteCardId = null;
    }

    async function confirmDeleteCard() {
        if (!deleteCardId) return;
        try {
            const res = await fetch(`/api/insight-cards/${deleteCardId}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) {
                showToast('Card & Detail Page deleted!');
                closeDeleteCardModal();
                fetchCards();
            } else {
                showToast(data.message || 'Failed to delete', 'error');
            }
        } catch (err) {
            showToast('Failed to delete', 'error');
        }
    }

    // ==========================================
    // FAQS
    // ==========================================
    async function fetchFaqs() {
        try {
            const res = await fetch(`/api/faqs?page=${pageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                faqsData = result.data;
                renderFaqsTable();
                renderLivePreview();
                const badge = document.getElementById('tab-badge-faq-count');
                if (badge) badge.innerText = faqsData.length;
            }
        } catch (err) { console.error('Error fetching faqs:', err); }
    }

    function renderFaqsTable() {
        const tbody = document.getElementById('faq-table-body');
        const empty = document.getElementById('faq-empty-state');
        const badge = document.getElementById('tab-badge-faq-count');
        if (badge) badge.innerText = faqsData.length;
        if (faqsData.length === 0) { tbody.innerHTML = ''; empty.classList.remove('hidden'); return; }
        empty.classList.add('hidden');
        tbody.innerHTML = faqsData.map((item, index) => `
            <tr class="hover:bg-slate-50/80 transition-colors group border-b border-slate-100">
                <td class="py-3.5 px-4 text-center text-slate-400 font-mono text-xs">${index + 1}</td>
                <td class="py-3.5 px-4"><div class="font-semibold text-[#163049] group-hover:text-[#1479B9] transition-colors text-sm">${escapeHtml(item.question)}</div></td>
                <td class="py-3.5 px-4 hidden md:table-cell"><div class="text-xs text-slate-600 line-clamp-1">${escapeHtml(item.answer)}</div></td>
                <td class="py-3.5 px-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-semibold ${item.column==='left'?'bg-[#2A5A8A]/10 text-[#2A5A8A]':'bg-[#1479B9]/10 text-[#1479B9]'}">${item.column==='left'?'Left Col':'Right Col'}</span>
                </td>
                <td class="py-3.5 px-4 text-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold ${item.status==='published'?'bg-emerald-50 text-emerald-700 border border-emerald-200':'bg-slate-100 text-slate-600'}">${item.status==='published'?'Published':'Draft'}</span>
                </td>
                <td class="py-3.5 px-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <button onclick="openEditFaqModal(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-[#2A5A8A] text-slate-600 hover:text-white transition-colors cursor-pointer" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button onclick="promptDeleteFaq(${item.id})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-rose-600 text-slate-600 hover:text-white transition-colors cursor-pointer" title="Delete">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </td>
            </tr>`).join('');
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
        document.getElementById('faq-id').value = '';
        document.getElementById('faq-question').value = '';
        document.getElementById('faq-answer').value = '';
        document.getElementById('faq-column').value = 'left';
        document.getElementById('faq-status').value = 'published';
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Insights FAQ';
        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => { modal.classList.remove('opacity-0'); card.classList.remove('scale-95'); }, 10);
    }

    function openEditFaqModal(id) {
        const faq = faqsData.find(f => f.id === id);
        if (!faq) return;
        document.getElementById('faq-id').value = faq.id;
        document.getElementById('faq-question').value = faq.question;
        document.getElementById('faq-answer').value = faq.answer;
        document.getElementById('faq-column').value = faq.column || 'left';
        document.getElementById('faq-status').value = faq.status || 'published';
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit FAQ #' + faq.id;
        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.remove('hidden');
        setTimeout(() => { modal.classList.remove('opacity-0'); card.classList.remove('scale-95'); }, 10);
    }

    function closeFaqModal() {
        const modal = document.getElementById('faq-modal');
        const card = document.getElementById('faq-modal-card');
        modal.classList.add('opacity-0'); card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    async function handleFaqSubmit(e) {
        e.preventDefault();
        const btn = document.getElementById('faq-submit-btn');
        if (btn) { btn.disabled = true; btn.innerText = 'Saving...'; }
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
            const res = await fetch(url, { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }, body: JSON.stringify(payload) });
            const data = await res.json();
            if (res.ok && data.success) { showToast(id ? 'FAQ updated!' : 'FAQ added!'); closeFaqModal(); fetchFaqs(); }
            else showToast(data.message || 'Error saving FAQ', 'error');
        } catch (err) { showToast('Server error saving FAQ', 'error'); }
        finally { if (btn) { btn.disabled = false; btn.innerText = 'Save FAQ'; } }
    }

    let faqToDeleteId = null;

    function promptDeleteFaq(id) {
        faqToDeleteId = id;
        const modal = document.getElementById('faq-delete-modal');
        const card = document.getElementById('faq-delete-card');
        modal.classList.remove('hidden');
        setTimeout(() => { modal.classList.remove('opacity-0'); card.classList.remove('scale-95'); }, 10);
    }

    function closeDeleteFaqModal() {
        const modal = document.getElementById('faq-delete-modal');
        const card = document.getElementById('faq-delete-card');
        modal.classList.add('opacity-0'); card.classList.add('scale-95');
        setTimeout(() => { modal.classList.add('hidden'); faqToDeleteId = null; }, 200);
    }

    async function confirmDeleteFaq() {
        if (!faqToDeleteId) return;
        try {
            const res = await fetch(`/api/faqs/${faqToDeleteId}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' } });
            const data = await res.json();
            if (res.ok && data.success) { showToast('FAQ deleted!'); closeDeleteFaqModal(); fetchFaqs(); }
            else showToast(data.message || 'Error deleting FAQ', 'error');
        } catch (err) { showToast('Server error deleting FAQ', 'error'); }
    }

    // ==========================================
    // TOAST & HELPERS
    // ==========================================
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;
        const bg = type === 'error' ? 'bg-rose-600' : type === 'warning' ? 'bg-amber-500' : 'bg-emerald-600';
        const toast = document.createElement('div');
        toast.className = `${bg} text-white text-sm font-medium px-5 py-3 rounded-xl shadow-xl flex items-center gap-2 pointer-events-auto max-w-xs opacity-0 transition-opacity duration-300`;
        toast.innerHTML = `<svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type==='error'?'M6 18L18 6M6 6l12 12':'M5 13l4 4L19 7'}"></path></svg><span>${escapeHtml(message)}</span>`;
        container.appendChild(toast);
        requestAnimationFrame(() => { toast.classList.remove('opacity-0'); toast.classList.add('opacity-100'); });
        setTimeout(() => { toast.classList.remove('opacity-100'); toast.classList.add('opacity-0'); setTimeout(() => toast.remove(), 300); }, 3500);
    }

    function escapeHtml(text) {
        if (!text) return '';
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return String(text).replace(/[&<>"']/g, m => map[m]);
    }
</script>
@endpush
