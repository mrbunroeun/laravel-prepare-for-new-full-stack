@extends('dashboard.layout')

@section('title', 'Properties - Content Management - CWD Realty')

@section('content')
<div class="space-y-6 max-w-[1400px] mx-auto pb-16">
    {{-- Header with breadcrumb & actions --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200 pb-5">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                <span>Dashboard</span>
                <span>/</span>
                <span>Pages</span>
                <span>/</span>
                <span class="text-[#1479B9] font-bold">Properties</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Properties & Listings Content Management</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage Hero Banner and Frequently Asked Questions (FAQs) for the Properties page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/properties') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="relative flex items-center border-b border-slate-200 group py-1">
        <div id="properties-tabs-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            {{-- Tab 1: Hero & Banner --}}
            <button type="button" onclick="switchPropertiesTab('hero', event)" id="tab-btn-hero" class="properties-tab-btn px-4 sm:px-5 py-3 text-sm font-bold border-b-2 border-[#2A5A8A] text-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            {{-- Tab 2: Featured Properties --}}
            <button type="button" onclick="switchPropertiesTab('featured', event)" id="tab-btn-featured" class="properties-tab-btn px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="whitespace-nowrap">Featured Properties</span>
                <span id="tab-badge-featured-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
            </button>

            {{-- Tab 3: Frequently Asked Questions (FAQs) --}}
            <button type="button" onclick="switchPropertiesTab('faqs', event)" id="tab-btn-faqs" class="properties-tab-btn px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Frequently Asked Questions (FAQs)</span>
                <span id="tab-badge-faq-count" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
            </button>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO & BANNER CONFIGURATION                                        --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-hero" class="properties-tab-content space-y-6">
        <form onsubmit="handleHeroSubmit(event)" class="space-y-6" id="hero-form">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Properties Hero Section Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the tagline, headline, and action buttons for the Properties page header.</p>
                </div>

                {{-- Tagline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Header Tagline</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Tagline Text</label>
                            <input type="text" id="hero-tagline1-input" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="Properties">
                        </div>
                    </div>
                </div>

                {{-- Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline</h3>
                    <div>
                        <textarea id="hero-headline-input" rows="3" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">Your Trusted Property Management & Hospitality Partner in Cambodia</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Action Buttons</h3>
                            <p class="text-xs text-slate-500">Pick destination routes for the CTA buttons.</p>
                        </div>
                        <button type="button" onclick="addHeroButton()" id="add-hero-btn-trigger" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Add Button</span>
                        </button>
                    </div>

                    <div id="hero-buttons-container" class="space-y-3"></div>
                </div>

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
                <span class="text-xs text-slate-500">Live preview matching exact frontend layout</span>
            </div>

            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[360px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('{{ asset('hero_section/hero_section.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[650px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-normal text-[#F4DEAC]">Properties</span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[20px] sm:text-[26px] font-semibold leading-snug mb-6">
                            Your Trusted Property Management & Hospitality Partner in Cambodia
                        </h1>

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
    {{-- TAB 2: FEATURED PROPERTIES (MULTI-IMAGE CRUD)                            --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-featured" class="properties-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Featured Properties Cards</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Multi-Images</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit or delete Featured Property cards shown on the Properties page. Upload up to 5 photos per card for the interactive left/right carousel.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateFeaturedModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add Featured Property</span>
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <div id="featured-cards-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
                <div id="featured-empty-state" class="hidden py-12 text-center">
                    <p class="text-sm font-semibold text-slate-700">No featured properties found.</p>
                    <p class="text-xs text-slate-400 mt-1">Click "Add Featured Property" to create the first card.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 3: FREQUENTLY ASKED QUESTIONS (FAQS)                                 --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-faqs" class="properties-tab-content hidden space-y-6">
        {{-- Database FAQs Management Table --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Properties FAQs</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for the Properties & Listings page.</p>
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
                    <p class="text-xs text-slate-500 mt-1">Get started by creating your first Properties FAQ item.</p>
                </div>
            </div>
        </div>

        {{-- Live Frontend Preview Card for FAQs --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Properties Preview</h3>
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
                        {{-- Populated dynamically via renderFaqLivePreview() --}}
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
                    <input type="text" id="faq-question" required placeholder="e.g. What types of properties do you manage?" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors">
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
            <p class="text-xs text-slate-500">Are you sure you want to permanently remove this question from your Properties page?</p>
            <div class="flex items-center justify-center gap-3 pt-2">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">Cancel</button>
                <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-lg shadow-sm transition-all cursor-pointer">Delete Now</button>
            </div>
        </div>
    </div>

{{-- MODAL: Create / Edit Featured Property (Multi-Images up to 5) --}}
<div id="featured-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="featured-modal-card" class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-all duration-200 max-h-[90vh] flex flex-col">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50 shrink-0">
            <div>
                <h3 class="text-base font-bold text-[#163049]" id="featured-modal-title">Add Featured Property</h3>
                <p class="text-xs text-slate-500 mt-0.5">Manage property details and up to 5 clickable scroll images.</p>
            </div>
            <button type="button" onclick="closeFeaturedModal()" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form onsubmit="handleFeaturedFormSubmit(event)" id="featured-form" class="p-6 space-y-5 overflow-y-auto grow">
            <input type="hidden" id="featured-edit-id" value="">

            {{-- Multi-Images Uploader (Up to 5) --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Property Photos (Max 5 Images for Carousel)</label>
                    <span id="featured-img-count-badge" class="text-[11px] font-semibold text-slate-500">0 / 5</span>
                </div>
                <div id="featured-images-preview-strip" class="grid grid-cols-5 gap-2.5"></div>
                <div>
                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Add Image File</label>
                    <input type="file" id="featured-multi-file-input" accept="image/*" onchange="addFeaturedFileToQueue(this)" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                    <p class="text-[10px] text-slate-400 mt-1">Upload up to 5 photos. First image is shown as the card thumbnail. Users can click left/right arrows to scroll through them.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Title <span class="text-rose-500">*</span></label>
                    <input type="text" id="featured-title-input" required placeholder="e.g. Wealth Mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Subtitle</label>
                    <input type="text" id="featured-subtitle-input" placeholder="e.g. Premium Condominium Residences" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Description</label>
                <textarea id="featured-desc-input" rows="3" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-xs text-slate-900 leading-relaxed focus:outline-none focus:border-[#2A5A8A]" placeholder="Brief property description shown on the card."></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Availability Tag</label>
                    <input type="text" id="featured-status-input" value="30% Available" placeholder="e.g. 30% Available or Coming Soon" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Button / Link Destination</label>
                    <input type="text" id="featured-link-input" value="/properties/wealth-mansion" placeholder="e.g. /properties/wealth-mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Link Button Text</label>
                    <input type="text" id="featured-linktext-input" value="View Property" placeholder="e.g. View Property" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Sort Order</label>
                    <input type="number" id="featured-sort-input" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Publish Status</label>
                    <select id="featured-publish-input" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
                <button type="button" onclick="closeFeaturedModal()" class="px-4 py-2 text-xs font-semibold text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition-colors">Cancel</button>
                <button type="submit" id="featured-save-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all">Save Property</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: Delete Confirmation for Featured Property --}}
<div id="featured-delete-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden items-center justify-center p-4 transition-all duration-200 opacity-0">
    <div id="featured-delete-card" class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-sm text-center transform scale-95 transition-all duration-200">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete Property?</h3>
        <p class="text-xs text-slate-500 mb-6">This will permanently remove the featured property card from the page.</p>
        <input type="hidden" id="featured-delete-id">
        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeFeaturedDeleteModal()" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors">Cancel</button>
            <button type="button" onclick="confirmDeleteFeatured()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs shadow-md transition-all cursor-pointer">Yes, Delete</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'properties';

    // ==========================================
    // TAB SWITCHING (Hero vs FAQs)
    // ==========================================
    function switchPropertiesTab(tabKey, e) {
        if (e && e.preventDefault) e.preventDefault();
        const currentScrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;

        document.querySelectorAll('.properties-tab-btn').forEach(btn => {
            btn.classList.remove('border-[#2A5A8A]', 'text-[#2A5A8A]', 'font-bold');
            btn.classList.add('border-transparent', 'text-slate-500', 'font-medium');
        });
        document.querySelectorAll('.properties-tab-content').forEach(c => c.classList.add('hidden'));

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

    const availableRoutes = [
        { label: 'Home (/)', url: '/' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Featured Properties Section (#featured-properties-section)', url: '#featured-properties-section' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' }
    ];

    let heroButtonsData = [
        { text: 'Browse Properties', url: '#featured-properties-section' },
        { text: 'Contact Us', url: '/contact-us' }
    ];

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchFeaturedItems();
        fetchFaqs();
    });

    // ==========================================
    // HERO SECTION LOGIC
    // ==========================================
    async function fetchHeroSection() {
        try {
            const res = await fetch(`/api/hero-section/${pageSlug}`);
            const data = await res.json();
            if (data.success && data.data) {
                const h = data.data;
                document.getElementById('hero-tagline1-input').value = h.tagline_box1 || 'Properties';
                document.getElementById('hero-headline-input').value = h.headline || 'Your Trusted Property Management & Hospitality Partner in Cambodia';
                if (Array.isArray(h.buttons) && h.buttons.length > 0) {
                    heroButtonsData = h.buttons;
                }
                renderHeroButtonsInputs();
                updateHeroPreview();
            }
        } catch (err) {
            console.error('Error loading hero section:', err);
        }
    }

    function updateHeroPreview() {
        const tagline = document.getElementById('hero-tagline1-input').value || 'Properties';
        const headline = document.getElementById('hero-headline-input').value || 'Your Trusted Property Management & Hospitality Partner in Cambodia';

        const tagEl = document.getElementById('preview-hero-tagline');
        const headEl = document.getElementById('preview-hero-headline');
        const btnsEl = document.getElementById('preview-hero-buttons');

        if (tagEl) tagEl.innerText = tagline;
        if (headEl) headEl.innerText = headline;

        if (btnsEl) {
            btnsEl.innerHTML = heroButtonsData.map(btn => `
                <a href="${btn.url || '#'}" class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-4 py-2 hover:bg-white hover:text-[#163049] transition-colors">
                    ${escapeHtml(btn.text)}
                </a>
            `).join('');
        }
    }

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        const addBtn = document.getElementById('add-hero-btn-trigger');
        if (!container) return;

        if (heroButtonsData.length >= 3) {
            if (addBtn) addBtn.classList.add('hidden');
        } else {
            if (addBtn) addBtn.classList.remove('hidden');
        }

        container.innerHTML = heroButtonsData.map((btn, index) => `
            <div class="p-3.5 bg-white border border-slate-200 rounded-lg shadow-xs flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">
                    ${index + 1}
                </span>

                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Button Label</label>
                    <input type="text" value="${escapeHtml(btn.text)}" oninput="updateHeroButtonText(${index}, this.value)" placeholder="Button text" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>

                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Target Route</label>
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
    }

    function addHeroButton() {
        if (heroButtonsData.length < 3) {
            heroButtonsData.push({ text: 'Explore Now', url: '/properties' });
            renderHeroButtonsInputs();
            updateHeroPreview();
        }
    }

    function updateHeroButtonText(index, val) {
        heroButtonsData[index].text = val;
        updateHeroPreview();
    }

    function updateHeroButtonUrl(index, val) {
        heroButtonsData[index].url = val;
        updateHeroPreview();
    }

    function removeHeroButton(index) {
        heroButtonsData.splice(index, 1);
        renderHeroButtonsInputs();
        updateHeroPreview();
    }

    async function handleHeroSubmit(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('hero-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        const payload = {
            tagline_box1: document.getElementById('hero-tagline1-input').value,
            tagline_box1_style: 'light-gold',
            tagline_box2: '',
            tagline_box2_style: 'bold-gold',
            headline: document.getElementById('hero-headline-input').value,
            show_bullets: false,
            bullets: [],
            buttons: heroButtonsData
        };

        try {
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
                if (typeof showToast === 'function') showToast('Properties Hero section saved successfully!');
            }
        } catch (err) {
            console.error('Error saving hero:', err);
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    // ==========================================
    // FAQS SECTION JS (PROPERTIES PAGE)
    // ==========================================
    let faqsData = [];
    let faqToDeleteId = null;

    async function fetchFaqs() {
        try {
            const res = await fetch(`/api/faqs?page=${pageSlug}`);
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
        document.getElementById('faq-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Properties FAQ';
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
                body: JSON.stringify({ page: pageSlug, question, answer, column, status })
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

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    // ==========================================
    // FEATURED PROPERTIES CRUD
    // ==========================================
    const featuredPageSlug = 'properties';
    let featuredItemsData = [];
    let featuredModalImagesQueue = [];
    let featuredDeleteId = null;

    function formatImageUrl(src) {
        if (!src) return '';
        if (src.startsWith('http') || src.startsWith('/')) return src;
        return '/' + src;
    }

    async function fetchFeaturedItems() {
        try {
            const res = await fetch(`/api/service-featured-properties/${featuredPageSlug}`);
            const data = await res.json();
            if (data.success) {
                featuredItemsData = data.data || [];
                renderFeaturedGrid();
                const badge = document.getElementById('tab-badge-featured-count');
                if (badge) badge.innerText = featuredItemsData.length;
            }
        } catch (err) {
            console.error('Error fetching featured properties:', err);
        }
    }

    function renderFeaturedGrid() {
        const grid = document.getElementById('featured-cards-grid');
        const empty = document.getElementById('featured-empty-state');
        if (!grid) return;

        if (!featuredItemsData.length) {
            grid.innerHTML = '';
            if (empty) { empty.classList.remove('hidden'); }
            return;
        }
        if (empty) { empty.classList.add('hidden'); }

        grid.innerHTML = featuredItemsData.map(item => {
            const images = (Array.isArray(item.detail_images) && item.detail_images.length)
                ? item.detail_images
                : (item.image ? [item.image] : []);
            const thumbSrc = images.length ? formatImageUrl(images[0]) : '';
            const thumbHtml = thumbSrc
                ? `<img src="${escapeHtml(thumbSrc)}" class="w-full h-full object-cover">`
                : `<div class="w-full h-full flex items-center justify-center text-slate-400"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>`;

            const statusBadge = item.publish_status === 'published'
                ? `<span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Published</span>`
                : `<span class="inline-flex items-center gap-1 text-[10px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full"><span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>Draft</span>`;

            return `
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                <div class="relative w-full aspect-video bg-slate-100 shrink-0">
                    ${thumbHtml}
                    <span class="absolute top-2 right-2">${statusBadge}</span>
                    ${images.length > 1 ? `<span class="absolute bottom-2 left-2 bg-black/60 text-white text-[10px] font-semibold px-2 py-0.5 rounded-full">${images.length} photos</span>` : ''}
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                    <div>
                        <h4 class="text-sm font-bold text-[#163049]">${escapeHtml(item.title)}</h4>
                        <p class="text-xs font-semibold text-slate-700 mt-0.5">${escapeHtml(item.subtitle || '')}</p>
                        <p class="text-xs text-[#2A5A8A] font-bold mt-2">${escapeHtml(item.status || '30% Available')}</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                        <button type="button" onclick="openEditFeaturedModal(${item.id})" class="px-3 py-1.5 bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer">
                            Edit Photos (${images.length}/5) &amp; Details
                        </button>
                        <button type="button" onclick="promptDeleteFeatured(${item.id})" class="text-xs text-rose-500 hover:text-rose-700 font-semibold cursor-pointer">Delete</button>
                    </div>
                </div>
            </div>`;
        }).join('');
    }

    function renderFeaturedModalImages() {
        const container = document.getElementById('featured-images-preview-strip');
        const badge = document.getElementById('featured-img-count-badge');
        if (badge) badge.innerText = `${featuredModalImagesQueue.length} / 5`;
        if (!container) return;
        container.innerHTML = featuredModalImagesQueue.map((item, idx) => {
            const previewSrc = item.type === 'url' ? formatImageUrl(item.src) : item.preview;
            return `
            <div class="relative aspect-[4/3] bg-slate-900 rounded-lg overflow-hidden border border-slate-300 shadow-xs">
                <img src="${escapeHtml(previewSrc)}" class="w-full h-full object-cover">
                <button type="button" onclick="removeFeaturedImageFromQueue(${idx})" class="absolute top-1 right-1 w-5 h-5 bg-rose-600 hover:bg-rose-700 text-white rounded-full flex items-center justify-center text-[10px] shadow cursor-pointer" title="Remove">✕</button>
                <span class="absolute bottom-1 left-1 bg-black/70 text-white text-[9px] font-bold px-1 rounded">#${idx + 1}</span>
            </div>`;
        }).join('');
    }

    function addFeaturedFileToQueue(input) {
        if (input.files && input.files[0]) {
            if (featuredModalImagesQueue.length >= 5) {
                if (typeof showToast === 'function') showToast('Maximum 5 images allowed', 'warning');
                input.value = '';
                return;
            }
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                featuredModalImagesQueue.push({ type: 'file', file: file, preview: e.target.result });
                renderFeaturedModalImages();
                input.value = '';
            };
            reader.readAsDataURL(file);
        }
    }

    function removeFeaturedImageFromQueue(idx) {
        if (featuredModalImagesQueue.length <= 1) {
            if (typeof showToast === 'function') showToast('At least 1 image is required', 'warning');
            return;
        }
        featuredModalImagesQueue.splice(idx, 1);
        renderFeaturedModalImages();
    }

    function openCreateFeaturedModal() {
        document.getElementById('featured-modal-title').innerText = 'Add Featured Property';
        document.getElementById('featured-edit-id').value = '';
        document.getElementById('featured-title-input').value = '';
        document.getElementById('featured-subtitle-input').value = '';
        document.getElementById('featured-desc-input').value = '';
        document.getElementById('featured-status-input').value = '30% Available';
        document.getElementById('featured-link-input').value = '/properties/wealth-mansion';
        document.getElementById('featured-linktext-input').value = 'View Property';
        document.getElementById('featured-sort-input').value = featuredItemsData.length + 1;
        document.getElementById('featured-publish-input').value = 'published';
        featuredModalImagesQueue = [];
        renderFeaturedModalImages();
        const modal = document.getElementById('featured-modal');
        const card = document.getElementById('featured-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function openEditFeaturedModal(id) {
        const item = featuredItemsData.find(i => i.id == id);
        if (!item) { console.error('Featured item not found:', id); return; }
        document.getElementById('featured-modal-title').innerText = 'Edit: ' + item.title;
        document.getElementById('featured-edit-id').value = item.id;
        document.getElementById('featured-title-input').value = item.title || '';
        document.getElementById('featured-subtitle-input').value = item.subtitle || '';
        document.getElementById('featured-desc-input').value = item.description || '';
        document.getElementById('featured-status-input').value = item.status || '30% Available';
        document.getElementById('featured-link-input').value = item.link || '/properties/wealth-mansion';
        document.getElementById('featured-linktext-input').value = item.link_text || 'View Property';
        document.getElementById('featured-sort-input').value = item.sort_order || 1;
        document.getElementById('featured-publish-input').value = item.publish_status || 'published';
        const imgs = (Array.isArray(item.detail_images) && item.detail_images.length) ? item.detail_images : (item.image ? [item.image] : []);
        featuredModalImagesQueue = imgs.slice(0, 5).map(src => ({ type: 'url', src: src }));
        renderFeaturedModalImages();
        const modal = document.getElementById('featured-modal');
        const card = document.getElementById('featured-modal-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeFeaturedModal() {
        const modal = document.getElementById('featured-modal');
        const card = document.getElementById('featured-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }

    async function handleFeaturedFormSubmit(e) {
        e.preventDefault();
        const editId = document.getElementById('featured-edit-id').value;
        const saveBtn = document.getElementById('featured-save-btn');
        if (saveBtn) { saveBtn.disabled = true; saveBtn.innerText = 'Saving...'; }

        try {
            const formData = new FormData();
            formData.append('page', featuredPageSlug);
            formData.append('grade', 'A');
            formData.append('title', document.getElementById('featured-title-input').value);
            formData.append('subtitle', document.getElementById('featured-subtitle-input').value);
            formData.append('description', document.getElementById('featured-desc-input').value);
            formData.append('status', document.getElementById('featured-status-input').value);
            formData.append('link', document.getElementById('featured-link-input').value);
            formData.append('link_text', document.getElementById('featured-linktext-input').value);
            formData.append('sort_order', document.getElementById('featured-sort-input').value);
            formData.append('publish_status', document.getElementById('featured-publish-input').value);

            const existingUrls = featuredModalImagesQueue.filter(i => i.type === 'url').map(i => i.src);
            formData.append('detail_images', JSON.stringify(existingUrls));

            featuredModalImagesQueue.filter(i => i.type === 'file').forEach(item => {
                formData.append('detail_image_files[]', item.file);
            });

            let endpoint = `/api/service-featured-properties/${featuredPageSlug}`;
            if (editId) endpoint = `/api/service-featured-properties/update/${editId}`;

            const res = await fetch(endpoint, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast('Featured property saved!');
                closeFeaturedModal();
                fetchFeaturedItems();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving property', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save to database', 'error');
        } finally {
            if (saveBtn) { saveBtn.disabled = false; saveBtn.innerText = 'Save Property'; }
        }
    }

    function promptDeleteFeatured(id) {
        featuredDeleteId = id;
        document.getElementById('featured-delete-id').value = id;
        const modal = document.getElementById('featured-delete-modal');
        const card = document.getElementById('featured-delete-card');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closeFeaturedDeleteModal() {
        featuredDeleteId = null;
        const modal = document.getElementById('featured-delete-modal');
        const card = document.getElementById('featured-delete-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }

    async function confirmDeleteFeatured() {
        if (!featuredDeleteId) return;
        const id = featuredDeleteId;
        try {
            const res = await fetch(`/api/service-featured-properties/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (data.success) {
                closeFeaturedDeleteModal();
                fetchFeaturedItems();
                if (typeof showToast === 'function') showToast(data.message || 'Property deleted!');
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error deleting property', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Error deleting property', 'error');
        }
    }
</script>
@endpush
