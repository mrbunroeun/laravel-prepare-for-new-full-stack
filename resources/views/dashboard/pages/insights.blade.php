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
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage the Hero Banner and Insight Detail Cards shown on the Insights & News page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/insights') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="relative flex items-center border-b border-slate-200 py-1">
        <div class="flex-1 flex items-center gap-2 overflow-x-auto pb-px scroll-smooth scrollbar-none whitespace-nowrap">
            <button type="button" onclick="switchInsightsTab('hero', event)" id="tab-btn-hero"
                class="insights-tab-btn px-4 sm:px-5 py-3 text-sm font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>

            <button type="button" onclick="switchInsightsTab('cards', event)" id="tab-btn-cards"
                class="insights-tab-btn px-4 sm:px-5 py-3 text-sm font-medium text-slate-500 hover:text-[#163049] border-b-2 border-transparent flex items-center gap-2 transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <span class="whitespace-nowrap">Detail Cards</span>
                <span id="cards-count-badge" class="text-[11px] bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold px-2 py-0.5 rounded-full">0</span>
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
                            <button type="button" onmousedown="event.preventDefault(); formatHeroTagline('bold');" class="px-3 py-1 bg-white border border-slate-300 hover:bg-[#2A5A8A] hover:text-white text-slate-800 rounded font-bold text-xs shadow-xs transition-colors flex items-center gap-1 cursor-pointer">
                                <span class="font-black text-sm">B</span><span class="text-xs">Bold</span>
                            </button>
                            <button type="button" onmousedown="event.preventDefault(); formatHeroTagline('normal');" class="px-2.5 py-1 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded text-xs font-medium transition-colors cursor-pointer">Normal</button>
                        </div>
                    </div>
                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()"
                        class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all"
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
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Bullet Highlights List</h3>
                            <p class="text-xs text-slate-500">Add, edit, or remove highlights</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="addHeroBulletPoint()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Add Bullet
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

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">4. Action Buttons (Max 3)</h3>
                            <p class="text-xs text-slate-500">Pick destination routes for the CTA buttons.</p>
                        </div>
                        <button type="button" onclick="addHeroButton()" id="add-btn-trigger" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#2A5A8A] text-white text-xs font-semibold hover:bg-[#163049] transition-colors cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Add Button
                        </button>
                    </div>
                    <div id="hero-buttons-container" class="space-y-3"></div>
                </div>

                <div class="pt-4 border-t border-slate-200 flex justify-end">
                    <button type="submit" id="hero-submit-btn" class="px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                        Save Hero Section
                    </button>
                </div>
            </div>
        </form>

        {{-- Live Hero Preview --}}
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#8a6a3a]"></span>
                    <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Insights Hero Preview</h3>
                </div>
            </div>
            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[320px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div class="absolute inset-0 bg-cover bg-right opacity-40" style="background-image:url('{{ asset('hero_section/hero_sectionsss.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>
                <div class="relative z-10 max-w-[650px] w-full">
                    <div class="h-[10px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="h-[2px] w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[20px] font-bold text-[#F4DEAC]">Insights</span>
                        </div>
                        <h1 id="preview-hero-headline" class="text-white text-[22px] font-semibold leading-snug mb-4">Your Trusted Property Management & Hospitality Partner in Cambodia</h1>
                        <div id="preview-hero-bullets" class="text-[#EBD4A4] text-[13px] mb-6 flex flex-wrap gap-x-3 gap-y-1" style="display:none;"></div>
                        <div id="preview-hero-buttons" class="flex flex-wrap gap-3 pt-2">
                            <a href="/properties" class="border-[2px] border-[#F4DEAC] text-white text-[13px] px-4 py-2.5">Browse Properties</a>
                            <a href="/contact-us" class="border-[2px] border-[#F4DEAC] text-white text-[13px] px-4 py-2.5">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========== TAB 2: DETAIL CARDS ========== --}}
    <div id="tab-content-cards" class="insights-tab-content hidden space-y-6">
        {{-- Toolbar --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white border border-slate-200 rounded-xl p-4 shadow-sm">
            <div>
                <h2 class="text-base font-bold text-[#163049]">Insight Detail Cards</h2>
                <p class="text-xs text-slate-500 mt-0.5">Manage the cards shown in the carousel below the hero — title, description, image, and link.</p>
            </div>
            <button type="button" onclick="openCardModal()" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#2A5A8A] text-white text-xs font-bold hover:bg-[#163049] transition-colors shadow-sm cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New Card
            </button>
        </div>

        {{-- Cards Grid --}}
        <div id="cards-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="col-span-full flex items-center justify-center py-12 text-slate-400 text-sm">
                <svg class="w-8 h-8 mr-3 animate-spin text-[#2A5A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                Loading cards...
            </div>
        </div>
    </div>
</div>

{{-- ========== ADD/EDIT CARD MODAL ========== --}}
<div id="card-modal" class="fixed inset-0 z-[9000] flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeCardModal()"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between p-5 border-b border-slate-200">
            <h2 id="modal-title" class="text-base font-bold text-[#163049]">Add Insight Card</h2>
            <button onclick="closeCardModal()" class="p-2 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form id="card-form" onsubmit="submitCardForm(event)" class="p-5 space-y-4">
            <input type="hidden" id="card-id">

            {{-- Image Upload --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">Card Image</label>
                <div class="w-full h-[180px] rounded-xl overflow-hidden border-2 border-dashed border-slate-300 bg-slate-50 relative group">
                    <img id="card-img-preview" src="{{ asset('home/latest_activities/3img.png') }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <label class="cursor-pointer bg-white text-[#2A5A8A] text-xs font-bold px-4 py-2 rounded-lg shadow">
                            Change Image
                            <input type="file" id="card-img-file" accept="image/*" onchange="previewCardImage(this)" class="hidden">
                        </label>
                    </div>
                    <div class="absolute bottom-2 left-2 bg-black/50 text-white text-[10px] px-2 py-0.5 rounded">Hover to change</div>
                </div>
                <input type="hidden" id="card-img-current">
            </div>

            {{-- Title --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Title <span class="text-rose-500">*</span></label>
                <input type="text" id="card-title" placeholder="e.g. Discover Wealth Mansion" required
                    class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Description</label>
                <textarea id="card-description" rows="3" placeholder="Brief summary of this insight article..."
                    class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] leading-relaxed"></textarea>
            </div>

            {{-- Link & Link Text --}}
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Link URL</label>
                    <input type="text" id="card-link" value="/insights/view-full-insight"
                        class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Link Text</label>
                    <input type="text" id="card-link-text" value="View Full Insights"
                        class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            {{-- Sort Order & Status --}}
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Sort Order</label>
                    <input type="number" id="card-sort-order" value="0" min="0"
                        class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Status</label>
                    <select id="card-status" class="w-full px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeCardModal()" class="flex-1 py-2.5 rounded-lg border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 transition-colors cursor-pointer">Cancel</button>
                <button type="submit" id="card-submit-btn" class="flex-1 py-2.5 rounded-lg bg-[#2A5A8A] text-white text-sm font-bold hover:bg-[#163049] transition-colors shadow-sm cursor-pointer">Save Card</button>
            </div>
        </form>
    </div>
</div>

{{-- ========== DELETE CONFIRMATION MODAL ========== --}}
<div id="delete-modal" class="fixed inset-0 z-[9100] flex items-center justify-center p-4 hidden">
    <div class="absolute inset-0 bg-black/60" onclick="closeDeleteModal()"></div>
    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-sm p-6 text-center space-y-4">
        <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center mx-auto">
            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </div>
        <h3 class="text-base font-bold text-[#163049]">Delete Insight Card?</h3>
        <p id="delete-modal-desc" class="text-sm text-slate-500">This action cannot be undone.</p>
        <div class="flex gap-3">
            <button onclick="closeDeleteModal()" class="flex-1 py-2 rounded-lg border border-slate-300 text-slate-700 text-sm font-semibold hover:bg-slate-50 cursor-pointer">Cancel</button>
            <button id="confirm-delete-btn" onclick="confirmDelete()" class="flex-1 py-2 rounded-lg bg-rose-600 text-white text-sm font-bold hover:bg-rose-700 cursor-pointer">Delete</button>
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
    let deleteTargetId = null;
    let currentTab = 'hero';

    // ==========================================
    // TAB SWITCHING
    // ==========================================
    function switchInsightsTab(tab, e) {
        currentTab = tab;
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
        else if (command === 'normal') document.execCommand('removeFormat', false, null);
        updateHeroPreview();
    }

    function renderHeroBulletsInputs() {
        const container = document.getElementById('dynamic-bullets-container');
        if (!container) return;
        container.innerHTML = heroBulletsData.map((bullet, index) => `
            <div class="flex items-center gap-2 p-2 bg-white border border-slate-300 rounded-lg shadow-xs">
                <span class="text-slate-400 font-bold text-xs">•</span>
                <input type="text" value="${escapeHtml(bullet)}" oninput="updateHeroBulletText(${index}, this.value)" class="w-full text-xs font-medium text-slate-800 bg-transparent outline-none">
                <button type="button" onclick="removeHeroBulletPoint(${index})" class="p-1 text-slate-400 hover:text-rose-500 transition-colors cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        `).join('');
    }

    function addHeroBulletPoint() { heroBulletsData.push('New Highlight'); renderHeroBulletsInputs(); updateHeroPreview(); }
    function removeHeroBulletPoint(index) { heroBulletsData.splice(index, 1); renderHeroBulletsInputs(); updateHeroPreview(); }
    function updateHeroBulletText(index, value) { heroBulletsData[index] = value; updateHeroPreview(); }

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        const addBtn = document.getElementById('add-btn-trigger');
        if (!container) return;
        if (heroButtonsData.length >= 3) addBtn?.classList.add('hidden');
        else addBtn?.classList.remove('hidden');

        container.innerHTML = heroButtonsData.map((btn, index) => `
            <div class="p-3.5 bg-white border border-slate-200 rounded-lg shadow-xs flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">${index + 1}</span>
                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Button Label</label>
                    <input type="text" value="${escapeHtml(btn.text)}" oninput="updateHeroButtonText(${index}, this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <div class="flex-1 min-w-0">
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Target Route</label>
                    <select onchange="updateHeroButtonUrl(${index}, this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        ${availableRoutes.map(r => `<option value="${r.url}" ${btn.url === r.url ? 'selected' : ''}>${r.label}</option>`).join('')}
                    </select>
                </div>
                <div class="sm:pt-4 flex items-center justify-end">
                    <button type="button" onclick="removeHeroButton(${index})" class="p-2 rounded-md hover:bg-rose-50 text-slate-400 hover:text-rose-600 transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            </div>
        `).join('');
        updateHeroPreview();
    }

    function addHeroButton() {
        if (heroButtonsData.length >= 3) { showToast('Maximum 3 buttons allowed'); return; }
        heroButtonsData.push({ text: 'Learn More', url: '/insights' });
        renderHeroButtonsInputs();
    }
    function removeHeroButton(index) {
        if (heroButtonsData.length <= 1) { showToast('Hero section should have at least 1 button'); return; }
        heroButtonsData.splice(index, 1);
        renderHeroButtonsInputs();
    }
    function updateHeroButtonText(index, val) { heroButtonsData[index].text = val; updateHeroPreview(); }
    function updateHeroButtonUrl(index, val) { heroButtonsData[index].url = val; updateHeroPreview(); }

    function updateHeroPreview() {
        const rawHtml = document.getElementById('hero-tagline-editor')?.innerHTML.trim() || '';
        const previewTagline = document.getElementById('preview-hero-tagline');
        if (previewTagline) previewTagline.innerHTML = `<span class="font-normal text-[#F4DEAC]">${rawHtml}</span>`;

        const headline = document.getElementById('hero-headline-input')?.value || '';
        const previewHeadline = document.getElementById('preview-hero-headline');
        if (previewHeadline) previewHeadline.innerText = headline;

        const showBullets = document.getElementById('hero-bullets-toggle')?.checked ?? false;
        const previewBullets = document.getElementById('preview-hero-bullets');
        if (previewBullets) {
            previewBullets.style.display = (showBullets && heroBulletsData.length > 0) ? 'flex' : 'none';
            previewBullets.innerHTML = heroBulletsData.map(b => `<span>• ${escapeHtml(b)}</span>`).join('');
        }

        const previewButtons = document.getElementById('preview-hero-buttons');
        if (previewButtons) {
            previewButtons.innerHTML = heroButtonsData.map(btn => `
                <a href="${escapeHtml(btn.url || '#')}" class="border-[2px] border-[#F4DEAC] text-white text-[13px] font-medium px-4 py-2.5 hover:bg-white hover:text-black transition-colors">
                    ${escapeHtml(btn.text || 'Button')}
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
                if (editor && data.tagline_html) {
                    editor.innerHTML = data.tagline_html.replace(/text-\[#F4DEAC\]/g, '').replace(/style="[^"]*"/g, '');
                }
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
        const submitBtn = document.getElementById('hero-submit-btn');
        if (submitBtn) { submitBtn.disabled = true; submitBtn.innerText = 'Saving...'; }
        try {
            const payload = {
                page: pageSlug,
                tagline_html: document.getElementById('hero-tagline-editor')?.innerHTML.trim() || '',
                show_tagline: true,
                headline: document.getElementById('hero-headline-input').value,
                show_bullets: document.getElementById('hero-bullets-toggle').checked,
                bullets: heroBulletsData,
                buttons: heroButtonsData
            };
            const res = await fetch(`/api/hero-section/${pageSlug}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (res.ok && data.success) { showToast('Insights Hero Section saved!'); updateHeroPreview(); }
            else showToast(data.message || 'Error saving', 'error');
        } catch (err) { showToast('Failed to save', 'error'); }
        finally {
            if (submitBtn) { submitBtn.disabled = false; submitBtn.innerText = 'Save Hero Section'; }
        }
    }

    // ==========================================
    // INSIGHT CARDS CRUD
    // ==========================================
    async function fetchCards() {
        try {
            const res = await fetch('/api/insight-cards');
            const result = await res.json();
            if (result.success) {
                cardsData = result.data;
                renderCardsGrid();
            }
        } catch (err) {
            document.getElementById('cards-grid').innerHTML = `<div class="col-span-full text-center py-10 text-rose-500 text-sm">Failed to load cards.</div>`;
        }
    }

    function renderCardsGrid() {
        const grid = document.getElementById('cards-grid');
        const badge = document.getElementById('cards-count-badge');
        if (badge) badge.innerText = cardsData.length;

        if (cardsData.length === 0) {
            grid.innerHTML = `<div class="col-span-full text-center py-14">
                <p class="text-slate-400 text-sm mb-3">No insight cards yet.</p>
                <button onclick="openCardModal()" class="px-5 py-2 rounded-lg bg-[#2A5A8A] text-white text-xs font-bold hover:bg-[#163049] cursor-pointer">Add First Card</button>
            </div>`;
            return;
        }

        grid.innerHTML = cardsData.map(card => {
            const imgSrc = card.image ? (card.image.startsWith('storage/') ? '/' + card.image : '/' + card.image) : '/home/latest_activities/3img.png';
            return `
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm group hover:shadow-md transition-shadow">
                <div class="relative h-[170px] overflow-hidden">
                    <img src="${imgSrc}" alt="${escapeHtml(card.title)}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute bottom-0 left-0 h-[5px] w-[60%] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a]"></div>
                    <span class="absolute top-2 right-2 px-2 py-0.5 rounded text-[10px] font-bold ${card.status === 'published' ? 'bg-emerald-500 text-white' : 'bg-slate-400 text-white'}">${card.status === 'published' ? 'Published' : 'Draft'}</span>
                </div>
                <div class="p-4 space-y-2">
                    <div class="flex items-start justify-between gap-2">
                        <h3 class="text-sm font-bold text-[#163049] leading-snug flex-1">${escapeHtml(card.title)}</h3>
                        <span class="text-[10px] bg-slate-100 text-slate-500 font-semibold px-2 py-0.5 rounded shrink-0">#${card.sort_order}</span>
                    </div>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">${escapeHtml(card.description || '')}</p>
                    <a href="${escapeHtml(card.link || '#')}" target="_blank" class="text-[#2A5A8A] text-[11px] font-medium hover:underline inline-flex items-center gap-1">
                        ${escapeHtml(card.link_text || 'View Full Insights')} →
                    </a>
                </div>
                <div class="flex items-center gap-2 px-4 pb-4">
                    <button onclick="openCardModal(${card.id})" class="flex-1 py-2 rounded-lg border border-[#2A5A8A] text-[#2A5A8A] text-xs font-semibold hover:bg-[#2A5A8A] hover:text-white transition-colors cursor-pointer">Edit</button>
                    <button onclick="openDeleteModal(${card.id}, '${escapeHtml(card.title)}')" class="flex-1 py-2 rounded-lg border border-rose-300 text-rose-600 text-xs font-semibold hover:bg-rose-600 hover:text-white transition-colors cursor-pointer">Delete</button>
                </div>
            </div>`;
        }).join('');
    }

    function openCardModal(id = null) {
        const modal = document.getElementById('card-modal');
        const title = document.getElementById('modal-title');
        document.getElementById('card-id').value = '';
        document.getElementById('card-title').value = '';
        document.getElementById('card-description').value = '';
        document.getElementById('card-link').value = '/insights/view-full-insight';
        document.getElementById('card-link-text').value = 'View Full Insights';
        document.getElementById('card-sort-order').value = 0;
        document.getElementById('card-status').value = 'published';
        document.getElementById('card-img-current').value = '';
        document.getElementById('card-img-preview').src = '/home/latest_activities/3img.png';

        if (id) {
            const card = cardsData.find(c => c.id == id);
            if (!card) return;
            title.innerText = 'Edit Insight Card';
            document.getElementById('card-id').value = card.id;
            document.getElementById('card-title').value = card.title || '';
            document.getElementById('card-description').value = card.description || '';
            document.getElementById('card-link').value = card.link || '/insights/view-full-insight';
            document.getElementById('card-link-text').value = card.link_text || 'View Full Insights';
            document.getElementById('card-sort-order').value = card.sort_order ?? 0;
            document.getElementById('card-status').value = card.status || 'published';
            document.getElementById('card-img-current').value = card.image || '';
            if (card.image) {
                document.getElementById('card-img-preview').src = card.image.startsWith('storage/') ? '/' + card.image : '/' + card.image;
            }
        } else {
            title.innerText = 'Add Insight Card';
        }
        modal.classList.remove('hidden');
    }

    function closeCardModal() { document.getElementById('card-modal').classList.add('hidden'); }

    function previewCardImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => { document.getElementById('card-img-preview').src = e.target.result; };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function submitCardForm(e) {
        e.preventDefault();
        const btn = document.getElementById('card-submit-btn');
        btn.disabled = true;
        btn.innerText = 'Saving...';

        const id = document.getElementById('card-id').value;
        const formData = new FormData();
        formData.append('title', document.getElementById('card-title').value);
        formData.append('description', document.getElementById('card-description').value);
        formData.append('link', document.getElementById('card-link').value);
        formData.append('link_text', document.getElementById('card-link-text').value);
        formData.append('sort_order', document.getElementById('card-sort-order').value);
        formData.append('status', document.getElementById('card-status').value);

        const currentImg = document.getElementById('card-img-current').value;
        if (currentImg) formData.append('image', currentImg);

        const fileInput = document.getElementById('card-img-file');
        if (fileInput.files[0]) formData.append('image_file', fileInput.files[0]);

        const url = id ? `/api/insight-cards/${id}` : '/api/insight-cards';
        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
            const data = await res.json();
            if (res.ok && data.success) {
                showToast(id ? 'Card updated!' : 'Card added!');
                closeCardModal();
                fetchCards();
            } else {
                const errors = data.errors ? Object.values(data.errors).flat().join(' ') : (data.message || 'Error saving');
                showToast(errors, 'error');
            }
        } catch (err) { showToast('Failed to save card', 'error'); }
        finally { btn.disabled = false; btn.innerText = 'Save Card'; }
    }

    function openDeleteModal(id, name) {
        deleteTargetId = id;
        document.getElementById('delete-modal-desc').innerText = `"${name}" will be permanently removed.`;
        document.getElementById('delete-modal').classList.remove('hidden');
    }
    function closeDeleteModal() { document.getElementById('delete-modal').classList.add('hidden'); deleteTargetId = null; }

    async function confirmDelete() {
        if (!deleteTargetId) return;
        const btn = document.getElementById('confirm-delete-btn');
        btn.disabled = true;
        btn.innerText = 'Deleting...';
        try {
            const res = await fetch(`/api/insight-cards/${deleteTargetId}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
            });
            const data = await res.json();
            if (res.ok && data.success) { showToast('Card deleted!'); closeDeleteModal(); fetchCards(); }
            else showToast(data.message || 'Failed to delete', 'error');
        } catch (err) { showToast('Failed to delete', 'error'); }
        finally { btn.disabled = false; btn.innerText = 'Delete'; }
    }

    // ==========================================
    // TOAST & HELPERS
    // ==========================================
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;
        const toast = document.createElement('div');
        const bg = type === 'error' ? 'bg-rose-600' : type === 'warning' ? 'bg-amber-500' : 'bg-emerald-600';
        toast.className = `${bg} text-white text-sm font-medium px-5 py-3 rounded-xl shadow-xl flex items-center gap-2 pointer-events-auto max-w-xs opacity-0 transition-opacity duration-300`;
        toast.innerHTML = `<svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'error' ? 'M6 18L18 6M6 6l12 12' : 'M5 13l4 4L19 7'}"></path></svg><span>${escapeHtml(message)}</span>`;
        container.appendChild(toast);
        requestAnimationFrame(() => { toast.classList.remove('opacity-0'); toast.classList.add('opacity-100'); });
        setTimeout(() => { toast.classList.remove('opacity-100'); toast.classList.add('opacity-0'); setTimeout(() => toast.remove(), 300); }, 3000);
    }

    function escapeHtml(text) {
        if (!text) return '';
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return String(text).replace(/[&<>"']/g, m => map[m]);
    }
</script>
@endpush
