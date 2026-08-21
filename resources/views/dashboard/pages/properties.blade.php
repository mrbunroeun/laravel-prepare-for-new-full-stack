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
            <p class="text-xs sm:text-sm text-slate-500 mt-1">Manage the Hero Banner section for the Properties page.</p>
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
            <button type="button" class="px-4 sm:px-5 py-3 text-sm font-bold text-[#2A5A8A] border-b-2 border-[#2A5A8A] flex items-center gap-2 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="whitespace-nowrap">Hero & Banner</span>
            </button>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- HERO & BANNER CONFIGURATION                                               --}}
    {{-- ========================================================================= --}}
    <div id="tab-content-hero" class="space-y-6">
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

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
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

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
</script>
@endpush
