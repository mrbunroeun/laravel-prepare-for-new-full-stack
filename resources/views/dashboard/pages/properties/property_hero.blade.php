@extends('dashboard.layout')

@section('title', $pageTitle . ' - Hero Management')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="border-b border-slate-200 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span>Featured Properties</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">{{ $pageTitle }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">{{ $pageTitle }} Content Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage hero banner image, tagline, headline title, availability subtext, and action buttons.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url($frontendUrl ?? '/properties') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white border border-slate-300 text-slate-700 hover:text-[#2A5A8A] hover:border-[#2A5A8A] text-xs sm:text-sm font-semibold shadow-xs transition-all">
                <span>View Live Page</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Hero Section Configuration Card --}}
    <div class="space-y-6">
        <form onsubmit="handleHeroSubmit(event)" class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm space-y-6">
                <div class="border-b border-slate-200 pb-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-[#163049]">Hero Section Configuration</h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Customize hero background image, tagline, headline text, availability subtext, and action buttons.</p>
                    </div>
                    <span class="text-xs px-2.5 py-1 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold">{{ $pageTitle }}</span>
                </div>

                {{-- 1. Hero Background Image Upload --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">1. Hero Background Image</label>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">
                        <div class="w-40 h-24 rounded-lg bg-slate-900 overflow-hidden border border-slate-300 shrink-0">
                            <img id="hero-img-preview" src="{{ $defaultImage ?? asset('services/propertis_leasing/available rental units/detail_img/hero_section.png') }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 space-y-2">
                            <input type="file" id="hero-file-input" accept="image/*" onchange="previewHeroFileInput(this)" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                            <p class="text-xs text-slate-500">Recommended: High-resolution image (JPG, PNG, WebP) up to 10MB.</p>
                        </div>
                    </div>
                </div>

                {{-- Tagline & Accent Line --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">2. Tagline Text</label>
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

                    <div id="hero-tagline-editor" contenteditable="true" oninput="updateHeroPreview()" onblur="updateHeroPreview()" class="w-full min-h-[44px] px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A] transition-all !text-slate-900 [&&_*]:!text-slate-900" style="color: #0f172a !important;"><b>{{ $pageTitle }}</b></div>
                </div>

                {{-- Main Headline --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">3. Main Headline (H1)</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Headline Title</label>
                        <textarea id="hero-headline-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">{{ $defaultHeadline ?? $pageTitle }}</textarea>
                    </div>
                </div>

                {{-- Subtext / Coming Soon / Availability --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">4. Subtext / Tag</h3>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Subtext Paragraph / Coming Soon</label>
                        <textarea id="hero-subtext-input" rows="2" oninput="updateHeroPreview()" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" placeholder="Coming Soon">Coming Soon</textarea>
                    </div>
                </div>

                {{-- Action Buttons (Maximum 3 Buttons) --}}
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#2A5A8A]">5. Action Buttons (Maximum 3 Buttons)</h3>
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

            <div class="mt-6 relative bg-slate-900 rounded-xl overflow-hidden shadow-xl min-h-[380px] flex items-center p-6 sm:p-10 border border-slate-800">
                <div id="live-preview-hero-bg" class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('{{ $defaultImage ?? asset('services/propertis_leasing/available rental units/detail_img/hero_section.png') }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#163049] via-[#163049]/80 to-transparent"></div>

                <div class="relative z-10 max-w-[620px] w-full">
                    <div class="h-[10px] sm:h-[12px] max-w-[20rem] bg-gradient-to-r from-[#8a6a3a] via-[#e8d4a8] to-[#8a6a3a] mb-0"></div>
                    <div class="bg-[#163049]/90 border border-slate-700/50 p-6 sm:p-8 backdrop-blur-sm shadow-2xl">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="h-[2px] w-10 sm:w-12 bg-[#F4DEAC]"></span>
                            <span id="preview-hero-tagline" class="text-[18px] sm:text-[22px] font-bold text-[#F4DEAC]">
                                {{ $pageTitle }}
                            </span>
                        </div>

                        <h1 id="preview-hero-headline" class="text-white text-[22px] sm:text-[30px] font-bold leading-tight mb-2">
                            {{ $defaultHeadline ?? $pageTitle }}
                        </h1>

                        <div id="preview-hero-subtext" class="text-[#F4DEAC] text-[20px] sm:text-[28px] font-light leading-tight mb-4 tracking-wide">
                            Coming Soon
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
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    const pageSlug = '{{ $pageSlug }}';

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function formatImageUrl(path) {
        if (!path) return '';
        if (path.startsWith('http') || path.startsWith('/')) return path;
        return '/' + path;
    }

    let heroBulletsData = ['Coming Soon'];
    let heroButtonsData = [
        { text: 'Browse Properties', url: '/properties' },
        { text: 'Contact Us', url: '/contact-us' }
    ];

    function formatHeroTagline(style) {
        const selection = window.getSelection();
        if (!selection || !selection.rangeCount) return;
        const editor = document.getElementById('hero-tagline-editor');
        if (!editor.contains(selection.anchorNode)) return;

        if (style === 'bold') {
            document.execCommand('bold', false, null);
        } else if (style === 'normal') {
            document.execCommand('removeFormat', false, null);
        }
        updateHeroPreview();
    }

    const availableAppRoutes = [
        { label: 'Browse Properties (/properties)', url: '/properties' },
        { label: 'Contact Us (/contact-us)', url: '/contact-us' },
        { label: 'Apply As Sale Agent (/partners#application-form-section)', url: '/partners#application-form-section' },
        { label: 'About Us (/about-us)', url: '/about-us' },
        { label: 'Wealth Mansion (/properties/wealth-mansion)', url: '/properties/wealth-mansion' },
        { label: 'Private Residential (/properties/private-residential)', url: '/properties/private-residential' },
        { label: 'UC88 (/properties/uc88)', url: '/properties/uc88' },
        { label: 'Services Overview (/service)', url: '/service' },
        { label: 'Property Management (/services/property-management)', url: '/services/property-management' },
        { label: 'Property Sales (/services/property-sales)', url: '/services/property-sales' },
        { label: 'Property Leasing (/services/property-leasing)', url: '/services/property-leasing' },
        { label: 'Hospitality Services (/services/hospitality-services)', url: '/services/hospitality-services' },
        { label: 'Daily & Weekly Rentals (/services/property-leasing/daily-weekly-rentals)', url: '/services/property-leasing/daily-weekly-rentals' },
        { label: 'Insights & News (/insights)', url: '/insights' },
        { label: 'Events (/events)', url: '/events' }
    ];

    function renderHeroButtonsInputs() {
        const container = document.getElementById('hero-buttons-container');
        const trigger = document.getElementById('add-btn-trigger');
        if (!container) return;
        if (trigger) trigger.style.display = heroButtonsData.length >= 3 ? 'none' : 'inline-flex';

        if (!heroButtonsData || heroButtonsData.length === 0) {
            container.innerHTML = `
                <div class="p-4 bg-slate-100 rounded-lg border border-dashed border-slate-300 text-center text-slate-500 text-xs">
                    No buttons added. Click "+ Add Button" above if you want to add action buttons to the hero banner.
                </div>
            `;
            updateHeroPreview();
            return;
        }

        container.innerHTML = heroButtonsData.map((btn, index) => {
            return `
                <div class="p-3.5 bg-white border border-slate-200 rounded-lg shadow-xs flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <span class="w-6 h-6 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-bold text-xs flex items-center justify-center shrink-0">
                        ${index + 1}
                    </span>

                    <div class="flex-1 min-w-0">
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Button Label</label>
                        <input type="text" value="${escapeHtml(btn.text || btn.label || '')}" oninput="updateHeroBtnText(${index}, this.value)" placeholder="e.g. Browse Properties" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                    </div>

                    <div class="flex-1 min-w-0">
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1">Target Route Page</label>
                        <select onchange="updateHeroBtnRoute(${index}, this.value)" class="w-full px-3 py-2 bg-[#f8fafc] border border-slate-300 rounded-md text-xs text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                            ${availableAppRoutes.map(route => `
                                <option value="${route.url}" ${(btn.url === route.url) ? 'selected' : ''}>
                                    ${route.label}
                                </option>
                            `).join('')}
                        </select>
                    </div>

                    <div class="sm:pt-4 flex items-center justify-end">
                        <button type="button" onclick="removeHeroButton(${index})" class="p-2 rounded-md hover:bg-rose-50 text-slate-400 hover:text-rose-600 transition-colors cursor-pointer" title="Remove Button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
        }).join('');

        updateHeroPreview();
    }

    function addHeroButton() {
        if (heroButtonsData.length >= 3) {
            if (typeof showToast === 'function') showToast('Maximum 3 buttons allowed');
            return;
        }
        heroButtonsData.push({ text: 'Browse Properties', url: '/properties' });
        renderHeroButtonsInputs();
    }

    function removeHeroButton(index) {
        heroButtonsData.splice(index, 1);
        renderHeroButtonsInputs();
    }

    function updateHeroBtnText(index, val) {
        heroButtonsData[index].text = val;
        updateHeroPreview();
    }

    function updateHeroBtnRoute(index, val) {
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

        const subtext = document.getElementById('hero-subtext-input')?.value || '';
        const previewSubtext = document.getElementById('preview-hero-subtext');
        if (previewSubtext) previewSubtext.innerText = subtext;

        const previewButtons = document.getElementById('preview-hero-buttons');
        if (previewButtons) {
            previewButtons.innerHTML = heroButtonsData.map(btn => `
                <a href="${escapeHtml(btn.url || '#')}" class="border-[2px] border-[#F4DEAC] text-white text-[13px] font-medium px-4 py-2.5 hover:bg-white hover:text-black transition-colors">
                    ${escapeHtml(btn.text || btn.label || 'Button')}
                </a>
            `).join('');
        }
    }

    function previewHeroFileInput(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('hero-img-preview');
                if (previewImg) previewImg.src = e.target.result;
                const livePreviewBg = document.getElementById('live-preview-hero-bg');
                if (livePreviewBg) livePreviewBg.style.backgroundImage = `url('${e.target.result}')`;
            };
            reader.readAsDataURL(input.files[0]);
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
                    let cleanText = data.tagline_html.replace(/text-\[#F4DEAC\]/g, "").replace(/style="[^"]*"/g, "");
                    editor.innerHTML = cleanText;
                } else if (editor && data.tagline_box1) {
                    editor.innerHTML = data.tagline_box1;
                }

                if (data.image) {
                    const heroUrl = formatImageUrl(data.image);
                    const heroPreview = document.getElementById('hero-img-preview');
                    if (heroPreview) heroPreview.src = heroUrl;
                    const livePreviewBg = document.getElementById('live-preview-hero-bg');
                    if (livePreviewBg) livePreviewBg.style.backgroundImage = `url('${heroUrl}')`;
                }

                if (data.headline) document.getElementById('hero-headline-input').value = data.headline;
                if (Array.isArray(data.bullets) && data.bullets.length > 0) {
                    heroBulletsData = data.bullets;
                    const subtextInput = document.getElementById('hero-subtext-input');
                    if (subtextInput && data.bullets[0]) {
                        subtextInput.value = data.bullets[0];
                    }
                }
                if (Array.isArray(data.buttons)) heroButtonsData = data.buttons;
                
                renderHeroButtonsInputs();
                updateHeroPreview();
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
            const subtext = document.getElementById('hero-subtext-input')?.value || '';

            const formData = new FormData();
            formData.append('page', pageSlug);
            formData.append('tagline_html', rawTagline);
            formData.append('tagline_box1', editor ? editor.innerText.trim() : '');
            formData.append('show_tagline', '1');
            formData.append('headline', document.getElementById('hero-headline-input').value);
            formData.append('show_bullets', '1');

            if (subtext) {
                formData.append('bullets[0]', subtext);
            }

            if (heroButtonsData.length === 0) {
                formData.append('buttons_empty', '1');
            } else {
                heroButtonsData.forEach((btn, idx) => {
                    formData.append(`buttons[${idx}][text]`, btn.text || btn.label || '');
                    formData.append(`buttons[${idx}][url]`, btn.url || '');
                });
            }

            const fileInput = document.getElementById('hero-file-input');
            if (fileInput && fileInput.files[0]) {
                formData.append('image_file', fileInput.files[0]);
            }

            const res = await fetch(`/api/hero-section/${pageSlug}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();
            if (res.ok && data.success) {
                if (typeof showToast === 'function') showToast(`${escapeHtml(document.getElementById('hero-headline-input').value)} Hero Section saved live!`);
                if (data.data && data.data.image) {
                    const heroUrl = formatImageUrl(data.data.image);
                    const heroPreview = document.getElementById('hero-img-preview');
                    if (heroPreview) heroPreview.src = heroUrl;
                    const livePreviewBg = document.getElementById('live-preview-hero-bg');
                    if (livePreviewBg) livePreviewBg.style.backgroundImage = `url('${heroUrl}')`;
                }
                updateHeroPreview();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving hero section', 'error');
            }
        } catch (err) {
            if (typeof showToast === 'function') showToast('Failed to save to database', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Hero Section';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchHeroSection();
    });
</script>
@endpush
