@extends('dashboard.layout')

@section('title', $pageTitle . ' - Hero Section')

@section('content')
<div class="space-y-6">
    {{-- Header Banner with Page Actions --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border border-slate-200/90 rounded-xl p-5 sm:p-6 shadow-xs">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span>Services</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9] font-bold">{{ $pageTitle }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">{{ $pageTitle }} Content & Hero Section</h1>
            <p class="text-sm text-slate-500 mt-1">Manage the hero title, tagline, call-to-action buttons, and layout for this service page.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="fetchHeroData()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold text-sm shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4 text-[#2A5A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                <span>Reload</span>
            </button>
            <a href="{{ url($frontendUrl) }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-sm shadow-md transition-all cursor-pointer">
                <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                <span>View Live Page</span>
            </a>
        </div>
    </div>

    {{-- Hero Section Configuration --}}
    <form onsubmit="handleHeroSubmit(event)" class="space-y-6">
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
            <div class="border-b border-slate-200 pb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                        <span>Hero Section Settings</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold">{{ $pageTitle }}</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize the main hero title, gold taglines, and call-to-action buttons.</p>
                </div>
                <button type="submit" id="hero-save-top-btn" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-sm shadow-md transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Save Changes</span>
                </button>
            </div>

            {{-- Tagline Customization --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50/70 p-5 rounded-xl border border-slate-200/80">
                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">
                        Tagline Box 1
                    </label>
                    <input type="text" id="hero-tagline-box1" oninput="updateHeroPreview()" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:border-[#2A5A8A] focus:outline-none transition-colors" placeholder="e.g. Property">
                    <div class="flex items-center gap-3">
                        <label class="text-xs text-slate-500 font-medium">Style:</label>
                        <select id="hero-tagline-box1-style" onchange="updateHeroPreview()" class="text-xs bg-white border border-slate-200 rounded-lg px-2.5 py-1.5 font-semibold text-slate-700 focus:outline-none">
                            <option value="light-gold">Light Gold (Normal font)</option>
                            <option value="bold-gold">Bold Gold (Bold font)</option>
                            <option value="hidden">Hide Tagline 1</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">
                        Tagline Box 2
                    </label>
                    <input type="text" id="hero-tagline-box2" oninput="updateHeroPreview()" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:border-[#2A5A8A] focus:outline-none transition-colors" placeholder="e.g. Management">
                    <div class="flex items-center gap-3">
                        <label class="text-xs text-slate-500 font-medium">Style:</label>
                        <select id="hero-tagline-box2-style" onchange="updateHeroPreview()" class="text-xs bg-white border border-slate-200 rounded-lg px-2.5 py-1.5 font-semibold text-slate-700 focus:outline-none">
                            <option value="bold-gold">Bold Gold (Bold font)</option>
                            <option value="light-gold">Light Gold (Normal font)</option>
                            <option value="hidden">Hide Tagline 2</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Main Headline --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">
                    Main Headline (H1 Title) <span class="text-red-500">*</span>
                </label>
                <textarea id="hero-headline" rows="2" required oninput="updateHeroPreview()" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:border-[#2A5A8A] focus:outline-none transition-colors" placeholder="Enter hero headline..."></textarea>
            </div>

            {{-- Call To Action Buttons --}}
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">Call-To-Action Buttons</label>
                    <button type="button" onclick="addHeroButton()" class="text-xs font-bold text-[#2A5A8A] hover:text-[#163049] flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Add Button</span>
                    </button>
                </div>
                <div id="hero-buttons-container" class="space-y-3">
                    {{-- Dynamically populated --}}
                </div>
            </div>

            {{-- Bottom Save Button --}}
            <div class="pt-4 border-t border-slate-200 flex justify-end">
                <button type="submit" id="hero-save-bottom-btn" class="inline-flex items-center gap-2 px-8 py-3 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-sm shadow-md transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Save Hero Section</span>
                </button>
            </div>
        </div>
    </form>

    {{-- Live Frontend Preview Card --}}
    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-4 border-b border-slate-200">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-[#1479B9]"></span>
                <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Hero Preview</h3>
            </div>
            <span class="text-xs text-slate-500">Real-time simulation matching the live page</span>
        </div>

        {{-- Preview Box --}}
        <div class="relative bg-slate-900 rounded-xl overflow-hidden p-8 sm:p-12 min-h-[360px] flex flex-col justify-center shadow-inner" style="background-image: url('{{ asset('hero_section/hero_section.png') }}'); background-size: cover; background-position: right center;">
            <div class="absolute inset-0 bg-[#0f2438]/60 backdrop-blur-[2px]"></div>

            <div class="relative z-10 max-w-[620px]">
                {{-- Gold Accent Bar --}}
                <div class="h-[12px] max-w-[260px] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>

                {{-- Dark Navy Box --}}
                <div class="bg-[#163049]/90 p-8 shadow-2xl border-l-2 border-[#8a6a3a]">
                    {{-- Tagline --}}
                    <div id="preview-hero-tagline" class="flex items-center gap-3 text-lg font-bold mb-4">
                        <span class="h-[3px] w-10 bg-[#F4DEAC]"></span>
                        <span id="preview-hero-tagline1" class="text-[#F4DEAC] font-normal">Property</span>
                        <span id="preview-hero-tagline2" class="text-[#F4DEAC] font-bold">Management</span>
                    </div>

                    {{-- Headline --}}
                    <h1 id="preview-hero-headline" class="text-white text-xl sm:text-2xl font-semibold leading-snug mb-6">
                        Professional Property Management Services in Cambodia
                    </h1>

                    {{-- Buttons --}}
                    <div id="preview-hero-buttons" class="flex items-center gap-3 flex-wrap">
                        <span class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-4 py-2">Browse Properties</span>
                        <span class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-4 py-2">Contact Us</span>
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
    const pageSlug = '{{ $pageSlug }}';
    let heroButtonsData = [];

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroData();
    });

    async function fetchHeroData() {
        try {
            const res = await fetch(`/api/hero-section/${pageSlug}`);
            const data = await res.json();
            if (data.success && data.data) {
                const hero = data.data;
                document.getElementById('hero-tagline-box1').value = hero.tagline_box1 || '';
                document.getElementById('hero-tagline-box1-style').value = hero.tagline_box1_style || 'light-gold';
                document.getElementById('hero-tagline-box2').value = hero.tagline_box2 || '';
                document.getElementById('hero-tagline-box2-style').value = hero.tagline_box2_style || 'bold-gold';
                document.getElementById('hero-headline').value = hero.headline || '';

                heroButtonsData = hero.buttons && Array.isArray(hero.buttons) ? hero.buttons : [
                    { text: 'Browse Properties', url: '/properties' },
                    { text: 'Contact Us', url: '/contact-us' }
                ];

                renderHeroButtons();
                updateHeroPreview();
            }
        } catch (err) {
            console.error('Error fetching hero section:', err);
            if (typeof showToast === 'function') showToast('Error loading hero section data', 'error');
        }
    }

    function renderHeroButtons() {
        const container = document.getElementById('hero-buttons-container');
        if (!container) return;

        if (heroButtonsData.length === 0) {
            container.innerHTML = `<div class="text-xs text-slate-400 italic p-3 bg-slate-50 rounded-lg">No buttons configured.</div>`;
            return;
        }

        container.innerHTML = heroButtonsData.map((btn, index) => `
            <div class="flex items-center gap-3 bg-slate-50 p-3 rounded-lg border border-slate-200/80">
                <span class="text-xs font-mono text-slate-400 font-bold w-5 text-center">${index + 1}</span>
                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <input type="text" value="${escapeHtml(btn.text)}" oninput="updateHeroButtonText(${index}, this.value)" placeholder="Button label (e.g. Contact Us)" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-[#2A5A8A]">
                    <input type="text" value="${escapeHtml(btn.url)}" oninput="updateHeroButtonUrl(${index}, this.value)" placeholder="Target link (e.g. /contact-us)" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-[#2A5A8A]">
                </div>
                <button type="button" onclick="removeHeroButton(${index})" class="p-2 text-rose-500 hover:bg-rose-50 rounded-lg transition-colors cursor-pointer" title="Remove button">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
        `).join('');
    }

    function addHeroButton() {
        if (heroButtonsData.length >= 4) {
            if (typeof showToast === 'function') showToast('Maximum 4 buttons allowed', 'warning');
            return;
        }
        heroButtonsData.push({ text: 'Learn More', url: '/properties' });
        renderHeroButtons();
        updateHeroPreview();
    }

    function removeHeroButton(index) {
        heroButtonsData.splice(index, 1);
        renderHeroButtons();
        updateHeroPreview();
    }

    function updateHeroButtonText(index, val) {
        if (heroButtonsData[index]) {
            heroButtonsData[index].text = val;
            updateHeroPreview();
        }
    }

    function updateHeroButtonUrl(index, val) {
        if (heroButtonsData[index]) {
            heroButtonsData[index].url = val;
        }
    }

    function updateHeroPreview() {
        const box1 = document.getElementById('hero-tagline-box1').value.trim();
        const box1Style = document.getElementById('hero-tagline-box1-style').value;
        const box2 = document.getElementById('hero-tagline-box2').value.trim();
        const box2Style = document.getElementById('hero-tagline-box2-style').value;
        const headline = document.getElementById('hero-headline').value.trim();

        const elTag1 = document.getElementById('preview-hero-tagline1');
        const elTag2 = document.getElementById('preview-hero-tagline2');
        const elHeadline = document.getElementById('preview-hero-headline');
        const elButtons = document.getElementById('preview-hero-buttons');

        // Tagline 1
        if (box1Style === 'hidden' || !box1) {
            elTag1.style.display = 'none';
        } else {
            elTag1.style.display = 'inline';
            elTag1.innerText = box1;
            elTag1.className = 'text-[#F4DEAC] ' + (box1Style === 'bold-gold' ? 'font-bold' : 'font-normal');
        }

        // Tagline 2
        if (box2Style === 'hidden' || !box2) {
            elTag2.style.display = 'none';
        } else {
            elTag2.style.display = 'inline';
            elTag2.innerText = box2;
            elTag2.className = 'text-[#F4DEAC] ' + (box2Style === 'bold-gold' ? 'font-bold' : 'font-normal');
        }

        // Headline
        if (elHeadline) {
            elHeadline.innerText = headline || 'Professional Services in Cambodia';
        }

        // Buttons
        if (elButtons) {
            elButtons.innerHTML = heroButtonsData.map(btn => `
                <span class="border-2 border-[#F4DEAC] text-white text-xs font-medium px-4 py-2">${escapeHtml(btn.text || 'Button')}</span>
            `).join('');
        }
    }

    async function handleHeroSubmit(e) {
        e.preventDefault();
        const box1 = document.getElementById('hero-tagline-box1').value.trim();
        const box1Style = document.getElementById('hero-tagline-box1-style').value;
        const box2 = document.getElementById('hero-tagline-box2').value.trim();
        const box2Style = document.getElementById('hero-tagline-box2-style').value;
        const headline = document.getElementById('hero-headline').value.trim();

        const btn1 = document.getElementById('hero-save-top-btn');
        const btn2 = document.getElementById('hero-save-bottom-btn');
        if (btn1) { btn1.disabled = true; btn1.innerText = 'Saving...'; }
        if (btn2) { btn2.disabled = true; btn2.innerText = 'Saving...'; }

        try {
            const payload = {
                page: pageSlug,
                show_tagline: true,
                tagline_box1: box1,
                tagline_box1_style: box1Style,
                tagline_box2: box2,
                tagline_box2_style: box2Style,
                headline: headline,
                show_bullets: false,
                bullets: [],
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
            if (data.success) {
                if (typeof showToast === 'function') showToast(data.message || 'Hero section saved successfully!');
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving hero section', 'error');
            }
        } catch (err) {
            console.error('Save failed:', err);
            if (typeof showToast === 'function') showToast('Server error while saving hero section', 'error');
        } finally {
            if (btn1) { btn1.disabled = false; btn1.innerHTML = `<svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Save Changes</span>`; }
            if (btn2) { btn2.disabled = false; btn2.innerHTML = `<svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Save Hero Section</span>`; }
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
</script>
@endpush
