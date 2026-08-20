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
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage the Hero Banner and Featured Properties showcased on the Properties page.</p>
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

    {{-- Tabs Navigation with Left/Right Arrow Scroll Buttons --}}
    <div class="relative flex items-center border-b border-slate-200 group py-1">
        {{-- Left Scroll Button --}}
        <button type="button" onclick="scrollTabsBar(-1)" aria-label="Scroll tabs left" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all mr-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        {{-- Tabs Track Container (Strict 1 Line, No Wrap, Smooth Scroll) --}}
        <div id="properties-tabs-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            <button type="button" onclick="switchTab('hero', event)" id="tab-btn-hero" class="tab-nav-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            <button type="button" onclick="switchTab('featured', event)" id="tab-btn-featured" class="tab-nav-btn shrink-0 px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span class="whitespace-nowrap">Featured Properties</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full" id="tab-badge-prop-count">3</span>
            </button>
        </div>

        {{-- Right Scroll Button --}}
        <button type="button" onclick="scrollTabsBar(1)" aria-label="Scroll tabs right" class="shrink-0 w-8 h-8 rounded-full bg-white border border-slate-300 shadow-sm text-[#2A5A8A] hover:bg-[#2A5A8A] hover:text-white hover:border-[#2A5A8A] flex items-center justify-center transition-all ml-2 cursor-pointer z-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO & BANNER CONFIGURATION                                        --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-hero" class="tab-pane space-y-6">
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
    {{-- TAB 2: FEATURED PROPERTIES (3 PROPERTIES CAROUSEL & CARDS)               --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-featured" class="tab-pane hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Featured Properties</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#1479B9]/10 text-[#1479B9] font-semibold">Properties Page</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage the 3 featured properties (Wealth Mansion, Private Residential Collection, UC88 Residence) shown on the Properties page.</p>
                </div>
                <button onclick="openPropModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs sm:text-sm font-bold shadow-sm transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <th class="py-3.5 px-4">Title & Subtitle</th>
                            <th class="py-3.5 px-4">Description</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-4">Target Link</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="properties-table-body" class="divide-y divide-slate-100">
                        {{-- Populated via JS --}}
                    </tbody>
                </table>

                <div id="properties-empty-state" class="hidden py-12 text-center">
                    <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-700">No properties configured</p>
                    <p class="text-xs text-slate-400 mt-1">Click "Add New Property" to add property cards.</p>
                </div>
            </div>
        </div>

        {{-- Live Featured Properties Preview (Exact Properties Page Replica) --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Properties Page Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview matching exact Properties page layout</span>
            </div>

            <div class="relative bg-[#2A5A8A] rounded-xl overflow-hidden p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-right opacity-35" style="background-image: url('{{ asset('home/feature_properties/feature_properties.png') }}');"></div>
                <div class="relative z-10">
                    <h2 class="text-[#F4DEAC] text-xl sm:text-2xl font-bold mb-6">
                        <span class="font-normal block">Featured</span>
                        <span class="block">Properties</span>
                    </h2>

                    {{-- 3-Column Card Grid --}}
                    <div id="live-properties-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        {{-- Rendered dynamically via JS --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL: CREATE / EDIT PROPERTY --}}
<div id="prop-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-lg rounded-xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="prop-modal-card">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
            <h3 class="text-base font-bold text-white flex items-center gap-2" id="prop-modal-title">
                <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                Add New Property
            </h3>
            <button onclick="closePropModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="prop-form" onsubmit="handlePropSubmit(event)" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
            <input type="hidden" id="prop-edit-id" value="">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Property Title <span class="text-rose-500">*</span></label>
                <input type="text" id="prop-edit-title" required placeholder="e.g. Wealth Mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 font-bold focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Subtitle / Development Type</label>
                <input type="text" id="prop-edit-subtitle" placeholder="e.g. Premium Condominium Residences" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Description <span class="text-rose-500">*</span></label>
                <textarea id="prop-edit-description" required rows="3" placeholder="Enter concise property description..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status Badge <span class="text-rose-500">*</span></label>
                    <input type="text" id="prop-edit-status" required placeholder="e.g. 30% Available or Coming Soon" value="30% Available" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Sort Order</label>
                    <input type="number" id="prop-edit-sort" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Property Image</label>
                <input type="file" id="prop-edit-image-file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                <input type="hidden" id="prop-edit-image-url" value="home/latest_activities/1img.png">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Page Link URL <span class="text-rose-500">*</span></label>
                    <input type="text" id="prop-edit-link" required value="/properties/wealth-mansion" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Button Text</label>
                    <input type="text" id="prop-edit-link-text" value="View Property" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closePropModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="prop-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save Property
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: DELETE CONFIRMATION --}}
<div id="delete-prop-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-prop-modal-card">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete Property?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this property from the Properties page?</p>

        <input type="hidden" id="delete-prop-target-id">

        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeletePropModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                Cancel
            </button>
            <button type="button" onclick="confirmDeleteProp()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                Yes, Delete
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'properties';

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

    let propertiesData = [];

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchProperties();
    });

    function scrollTabsBar(direction) {
        const track = document.getElementById('properties-tabs-track');
        if (track) {
            track.scrollBy({ left: direction * 250, behavior: 'smooth' });
        }
    }

    function switchTab(tabName, evt) {
        if (evt) evt.preventDefault();
        document.querySelectorAll('.tab-nav-btn').forEach(btn => {
            btn.classList.remove('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
            btn.classList.add('text-slate-500', 'border-transparent', 'font-medium');
        });
        const activeBtn = document.getElementById(`tab-btn-${tabName}`);
        if (activeBtn) {
            activeBtn.classList.remove('text-slate-500', 'border-transparent', 'font-medium');
            activeBtn.classList.add('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
        }

        document.querySelectorAll('.tab-pane').forEach(content => {
            content.classList.add('hidden');
        });
        const targetContent = document.getElementById(`tab-content-${tabName}`);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }
    }

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
    // FEATURED PROPERTIES LOGIC
    // ==========================================
    async function fetchProperties() {
        try {
            const res = await fetch(`/api/service-featured-properties/${pageSlug}`);
            const json = await res.json();
            if (json.success && Array.isArray(json.data)) {
                propertiesData = json.data;
                renderPropertyTable();
                renderLivePropertiesGrid();
                const badge = document.getElementById('tab-badge-prop-count');
                if (badge) badge.innerText = propertiesData.length;
            }
        } catch (err) {
            console.error('Error fetching properties:', err);
        }
    }

    function renderPropertyTable() {
        const tbody = document.getElementById('properties-table-body');
        const emptyState = document.getElementById('properties-empty-state');
        if (!tbody) return;

        if (propertiesData.length === 0) {
            tbody.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            return;
        }

        if (emptyState) emptyState.classList.add('hidden');

        tbody.innerHTML = propertiesData.map((item, index) => {
            let imgSrc = item.image || 'home/latest_activities/1img.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                imgSrc = '/' + imgSrc;
            }

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
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-[#2A5A8A]/10 text-[#2A5A8A]">
                            ${escapeHtml(item.status || '30% Available')}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-xs text-[#2A5A8A] font-mono">
                        ${escapeHtml(item.link || '')}
                    </td>
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-1.5">
                            <button onclick="editProp(${item.id})" class="p-1.5 rounded-lg text-slate-500 hover:text-[#2A5A8A] hover:bg-slate-100 transition-colors" title="Edit Property">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button onclick="promptDeleteProp(${item.id})" class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Property">
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

    function renderLivePropertiesGrid() {
        const grid = document.getElementById('live-properties-grid');
        if (!grid) return;

        if (propertiesData.length === 0) {
            grid.innerHTML = `
                <div class="col-span-full py-12 text-center text-white/70">
                    <p class="text-sm">No properties to display.</p>
                </div>
            `;
            return;
        }

        grid.innerHTML = propertiesData.map(item => {
            let imgSrc = item.image || 'home/latest_activities/1img.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                imgSrc = '/' + imgSrc;
            }

            return `
                <div class="bg-white shadow-xl overflow-hidden flex flex-col justify-between h-full">
                    <div class="relative w-full h-[180px] overflow-hidden bg-gray-100">
                        <img src="${escapeHtml(imgSrc)}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 flex flex-col justify-between flex-1">
                        <div>
                            <h3 class="text-[#2A5A8A] text-base font-bold mb-1">${escapeHtml(item.title)}</h3>
                            <h4 class="text-black text-xs font-bold mb-2">${escapeHtml(item.subtitle || '')}</h4>
                            <p class="text-black/80 text-xs leading-relaxed mb-4 line-clamp-3">${escapeHtml(item.description || '')}</p>
                        </div>
                        <div>
                            <div class="text-[#2A5A8A] text-xs font-bold mb-3">${escapeHtml(item.status || '30% Available')}</div>
                            <span class="inline-flex items-center gap-1 text-[#2A5A8A] text-xs font-medium">
                                <span>${escapeHtml(item.link_text || 'View Property')}</span> &rarr;
                            </span>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    function openPropModal(property = null) {
        const modal = document.getElementById('prop-modal');
        const card = document.getElementById('prop-modal-card');
        const form = document.getElementById('prop-form');
        form.reset();

        if (property) {
            document.getElementById('prop-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit Property';
            document.getElementById('prop-edit-id').value = property.id;
            document.getElementById('prop-edit-title').value = property.title || '';
            document.getElementById('prop-edit-subtitle').value = property.subtitle || '';
            document.getElementById('prop-edit-description').value = property.description || '';
            document.getElementById('prop-edit-status').value = property.status || '30% Available';
            document.getElementById('prop-edit-sort').value = property.sort_order || 1;
            document.getElementById('prop-edit-image-url').value = property.image || 'home/latest_activities/1img.png';
            document.getElementById('prop-edit-link').value = property.link || '/properties/wealth-mansion';
            document.getElementById('prop-edit-link-text').value = property.link_text || 'View Property';
        } else {
            document.getElementById('prop-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Property';
            document.getElementById('prop-edit-id').value = '';
            document.getElementById('prop-edit-title').value = '';
            document.getElementById('prop-edit-subtitle').value = 'Premium Condominium Residences';
            document.getElementById('prop-edit-description').value = '';
            document.getElementById('prop-edit-status').value = '30% Available';
            document.getElementById('prop-edit-sort').value = propertiesData.length + 1;
            document.getElementById('prop-edit-image-url').value = 'home/latest_activities/1img.png';
            document.getElementById('prop-edit-link').value = '/properties/wealth-mansion';
            document.getElementById('prop-edit-link-text').value = 'View Property';
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            card.classList.remove('scale-95');
        }, 10);
    }

    function closePropModal() {
        const modal = document.getElementById('prop-modal');
        const card = document.getElementById('prop-modal-card');
        modal.classList.add('opacity-0');
        card.classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }

    function editProp(id) {
        const prop = propertiesData.find(p => p.id === id);
        if (prop) openPropModal(prop);
    }

    async function handlePropSubmit(event) {
        event.preventDefault();
        const submitBtn = document.getElementById('prop-submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving Property...';
        }

        const id = document.getElementById('prop-edit-id').value;
        const formData = new FormData();
        formData.append('grade', 'A');
        formData.append('title', document.getElementById('prop-edit-title').value);
        formData.append('subtitle', document.getElementById('prop-edit-subtitle').value);
        formData.append('description', document.getElementById('prop-edit-description').value);
        formData.append('status', document.getElementById('prop-edit-status').value);
        formData.append('sort_order', document.getElementById('prop-edit-sort').value);
        formData.append('image', document.getElementById('prop-edit-image-url').value);
        formData.append('link', document.getElementById('prop-edit-link').value);
        formData.append('link_text', document.getElementById('prop-edit-link-text').value);
        formData.append('publish_status', 'published');

        const fileInput = document.getElementById('prop-edit-image-file');
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
                closePropModal();
                fetchProperties();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving property', 'error');
            }
        } catch (err) {
            console.error('Error saving property:', err);
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Property';
            }
        }
    }

    function promptDeleteProp(id) {
        document.getElementById('delete-prop-target-id').value = id;
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

    async function confirmDeleteProp() {
        const id = document.getElementById('delete-prop-target-id').value;
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
                closeDeletePropModal();
                fetchProperties();
            }
        } catch (err) {
            console.error('Error deleting property:', err);
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
</script>
@endpush
