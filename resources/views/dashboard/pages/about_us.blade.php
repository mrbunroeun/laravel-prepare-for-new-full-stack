@extends('dashboard.layout')

@section('title', 'About Us Page Management')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="border-b border-slate-200 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">About Us</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">About Us Page Content</h1>
            <p class="text-sm text-slate-500 mt-1">Manage hero section, taglines, headline text, highlight bullets, action buttons, and media for About Us.</p>
        </div>
    </div>

    <div id="tab-content-hero" class="space-y-6">
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
    
</div>
@endsection

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
            const res = await fetch('/api/hero-section/about-us');
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
            const res = await fetch('/api/hero-section/about-us', {
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


document.addEventListener('DOMContentLoaded', () => {
    if (typeof fetchHeroSection === 'function') {
        fetchHeroSection();
    }
});
</script>
@endpush