@extends('dashboard.layout')

@section('title', 'Partners - Content Management - CWD Realty')

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
                <span class="text-[#1479B9] font-bold">Partners</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Partners Content Management</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage the Hero Banner, Bullet Highlights, Action Buttons, and Frequently Asked Questions.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/partners') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="relative flex items-center border-b border-slate-200 group py-1">
        <div id="partners-tabs-track" class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            <button type="button" onclick="switchPartnerTab('hero', event)" id="partner-tab-btn-hero" class="partner-tab-btn px-4 sm:px-5 py-3 text-sm font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            <button type="button" onclick="switchPartnerTab('faqs', event)" id="partner-tab-btn-faqs" class="partner-tab-btn px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="whitespace-nowrap">Frequently Asked Questions</span>
                <span class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full" id="tab-badge-faq-count">...</span>
            </button>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 1: HERO & BANNER CONFIGURATION                                        --}}
    {{-- ========================================================================= --}}
    <div id="partner-tab-content-hero" class="partner-tab-content space-y-6">
        <form onsubmit="handleHeroSubmit(event)" class="space-y-6" id="hero-form">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="text-lg font-bold text-[#163049]">Partners Hero Section Configuration</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the tagline, headline, bullet points, and CTA button.</p>
                </div>

                {{-- Tagline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Header Tagline</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Tagline Text</label>
                            <input type="text" id="hero-tagline1-input" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" value="Partners">
                        </div>
                    </div>
                </div>

                {{-- Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Main Headline</h3>
                    <div>
                        <textarea id="hero-headline-input" rows="3" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed">Build Your Career in Real Estate
with CWD Real Estate Agent &
Developer</textarea>
                    </div>
                </div>

                {{-- Bullet Highlights List --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights List</h3>
                            <p class="text-xs text-slate-500">Edit or add bullet highlights (e.g. • Flexible income • Strong brand • Real projects • Full sales support)</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="addHeroBulletPoint()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Add Bullet</span>
                            </button>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="hero-bullets-toggle" checked onchange="updateHeroPreview()" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#2A5A8A]"></div>
                                <span class="ml-2 text-xs font-semibold text-slate-700">Show Bullets</span>
                            </label>
                        </div>
                    </div>

                    <div id="dynamic-bullets-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3"></div>
                </div>

                {{-- Action Buttons --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">4. Action Buttons</h3>
                            <p class="text-xs text-slate-500">CTA button linking to the application form or page sections.</p>
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
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Partners Hero Preview</h3>
                </div>
                <span class="text-xs text-slate-500">Live preview matching exact frontend layout</span>
            </div>

            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[380px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-right opacity-40 mix-blend-luminosity" style="background-image: url('{{ asset('hero_section/hero_section.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[680px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-normal text-[#F4DEAC]">Partners</span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[19px] sm:text-[24px] font-medium leading-snug mb-4">
                            Build Your Career in Real Estate<br>
                            with CWD Real Estate Agent & Developer
                        </h1>

                        <p id="preview-hero-bullets" class="text-[#EBD4A4] text-xs sm:text-sm font-light tracking-wide leading-relaxed mb-6">
                            • Flexible income • Strong brand • Real projects • Full sales support
                        </p>

                        <div id="preview-hero-buttons" class="flex items-center gap-3 flex-wrap">
                            <span class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-5 py-2.5">Apply As Sale Agent</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- TAB 2: FREQUENTLY ASKED QUESTIONS (CRUD)                                  --}}
    {{-- ========================================================================= --}}
    <div id="partner-tab-content-faqs" class="partner-tab-content hidden space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            {{-- Toolbar --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Frequently Asked Questions</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">Database Management</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Add, edit, or delete FAQ questions and answers for the Partners page.</p>
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
            <button type="button" onclick="confirmDeleteFaq()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                Yes, Delete
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = 'partners';

    const availableRoutes = [
        { label: 'Apply As Sale Agent Form (#application-form-section)', url: '#application-form-section' },
        { label: 'Home (/)', url: '/' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Properties (/properties)', url: '/properties' },
        { label: 'Partners (/partners)', url: '/partners' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' }
    ];

    let bulletsData = ['Flexible income', 'Strong brand', 'Real projects', 'Full sales support'];
    let heroButtonsData = [
        { text: 'Apply As Sale Agent', url: '#application-form-section' }
    ];
    let faqsData = [];

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
        fetchFaqs();
    });

    // ==========================================
    // TABS SWITCHING
    // ==========================================
    function switchPartnerTab(tabKey, e) {
        if (e) e.preventDefault();
        
        document.querySelectorAll('.partner-tab-btn').forEach(btn => {
            btn.classList.remove('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
            btn.classList.add('text-slate-500', 'border-transparent', 'font-medium');
        });

        const activeBtn = document.getElementById(`partner-tab-btn-${tabKey}`);
        if (activeBtn) {
            activeBtn.classList.remove('text-slate-500', 'border-transparent', 'font-medium');
            activeBtn.classList.add('text-[#2A5A8A]', 'border-[#2A5A8A]', 'font-bold');
        }

        document.querySelectorAll('.partner-tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        const targetContent = document.getElementById(`partner-tab-content-${tabKey}`);
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
                document.getElementById('hero-tagline1-input').value = h.tagline_box1 || 'Partners';
                document.getElementById('hero-headline-input').value = h.headline || 'Build Your Career in Real Estate\nwith CWD Real Estate Agent &\nDeveloper';
                
                if (Array.isArray(h.bullets) && h.bullets.length > 0) {
                    bulletsData = h.bullets;
                }
                document.getElementById('hero-bullets-toggle').checked = (h.show_bullets !== false);

                if (Array.isArray(h.buttons) && h.buttons.length > 0) {
                    heroButtonsData = h.buttons;
                }
                
                renderBulletInputs();
                renderHeroButtonsInputs();
                updateHeroPreview();
            }
        } catch (err) {
            console.error('Error loading hero section:', err);
        }
    }

    function renderBulletInputs() {
        const container = document.getElementById('dynamic-bullets-container');
        if (!container) return;

        container.innerHTML = bulletsData.map((bullet, index) => `
            <div class="flex items-center gap-2 p-2 bg-white border border-slate-300 rounded-lg shadow-xs">
                <span class="text-slate-400 font-bold text-xs">•</span>
                <input type="text" value="${escapeHtml(bullet)}" oninput="updateBulletText(${index}, this.value)" placeholder="Highlight item" class="w-full text-xs font-medium text-slate-800 bg-transparent outline-none">
                <button type="button" onclick="removeHeroBulletPoint(${index})" class="p-1 text-slate-400 hover:text-rose-500 transition-colors" title="Delete item">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `).join('');
    }

    function addHeroBulletPoint() {
        bulletsData.push('New Highlight');
        renderBulletInputs();
        updateHeroPreview();
    }

    function removeHeroBulletPoint(index) {
        bulletsData.splice(index, 1);
        renderBulletInputs();
        updateHeroPreview();
    }

    function updateBulletText(index, value) {
        bulletsData[index] = value;
        updateHeroPreview();
    }

    function updateHeroPreview() {
        const tagline = document.getElementById('hero-tagline1-input').value || 'Partners';
        const headline = document.getElementById('hero-headline-input').value || 'Build Your Career in Real Estate\nwith CWD Real Estate Agent & Developer';
        const showBullets = document.getElementById('hero-bullets-toggle').checked;

        const tagEl = document.getElementById('preview-hero-tagline');
        const headEl = document.getElementById('preview-hero-headline');
        const bulletsEl = document.getElementById('preview-hero-bullets');
        const btnsEl = document.getElementById('preview-hero-buttons');

        if (tagEl) tagEl.innerText = tagline;
        if (headEl) headEl.innerHTML = escapeHtml(headline).replace(/\n/g, '<br>');

        if (bulletsEl) {
            if (showBullets && bulletsData.length > 0) {
                bulletsEl.classList.remove('hidden');
                bulletsEl.innerText = bulletsData.map(b => '• ' + b).join(' ');
            } else {
                bulletsEl.classList.add('hidden');
            }
        }

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
            heroButtonsData.push({ text: 'Apply As Sale Agent', url: '#application-form-section' });
            renderHeroButtonsInputs();
            updateHeroPreview();
        }
    }

    function removeHeroButton(index) {
        heroButtonsData.splice(index, 1);
        renderHeroButtonsInputs();
        updateHeroPreview();
    }

    function updateHeroButtonText(index, value) {
        heroButtonsData[index].text = value;
        updateHeroPreview();
    }

    function updateHeroButtonUrl(index, value) {
        heroButtonsData[index].url = value;
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
            show_tagline: true,
            headline: document.getElementById('hero-headline-input').value,
            show_bullets: document.getElementById('hero-bullets-toggle').checked,
            bullets: bulletsData.filter(b => b.trim().length > 0),
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
                showToast('Partners hero section saved live!');
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
    // FAQS CRUD LOGIC
    // ==========================================
    async function fetchFaqs() {
        try {
            const res = await fetch(`/api/faqs?page=${pageSlug}`);
            const result = await res.json();
            if (result.success && Array.isArray(result.data)) {
                faqsData = result.data;
                if (!faqsData.length) {
                    await seedDefaultPartnersFaqs();
                    return;
                }
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

    async function seedDefaultPartnersFaqs() {
        const defaults = [
            {
                question: 'What types of properties do you manage?',
                answer: 'We specialize in condominiums, serviced apartments, and residential investment properties throughout Phnom Penh.',
                column: 'left',
                sort_order: 1
            },
            {
                question: 'Can you manage both daily and long-term rentals?',
                answer: 'Yes, our flexible management agreements support both short-term serviced hospitality rentals and long-term residential leases.',
                column: 'left',
                sort_order: 2
            },
            {
                question: 'How do property owners receive rental income?',
                answer: 'Owners receive transparent monthly statements and disbursements directly into their nominated bank account.',
                column: 'right',
                sort_order: 1
            }
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
                    page: pageSlug,
                    question: item.question,
                    answer: item.answer,
                    column: item.column,
                    status: 'published',
                    sort_order: item.sort_order
                })
            });
        }

        const res = await fetch(`/api/faqs?page=${pageSlug}`);
        const result = await res.json();
        if (result.success && Array.isArray(result.data)) {
            faqsData = result.data;
            renderFaqsTable();
            renderLivePreview();
            const countBadge = document.getElementById('tab-badge-faq-count');
            if (countBadge) countBadge.innerText = faqsData.length;
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
                showToast(id ? 'FAQ updated in database!' : 'FAQ added to database!');
                closeFaqModal();
                fetchFaqs();
            } else {
                showToast(data.message || 'Error saving FAQ');
            }
        } catch (err) {
            console.error('Error saving FAQ:', err);
            showToast('Server error saving FAQ');
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
                showToast('FAQ deleted from database!');
                closeDeleteFaqModal();
                fetchFaqs();
            } else {
                showToast(data.message || 'Error deleting FAQ');
            }
        } catch (err) {
            console.error('Error deleting FAQ:', err);
            showToast('Server error deleting FAQ');
        }
    }

    function escapeHtml(text) {
        if (!text) return '';
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return String(text).replace(/[&<>"']/g, m => map[m]);
    }
</script>
@endpush
