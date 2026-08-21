<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#f8fafc] text-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') - CWD Realty</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Custom sleek scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
    @stack('styles')
</head>

<body class="h-full antialiased bg-[#f4f7fb] text-slate-800 overflow-x-hidden flex flex-col min-h-screen">
    <div class="flex h-screen overflow-hidden">
        {{-- Mobile Overlay --}}
        <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 z-40 bg-[#163049]/60 backdrop-blur-xs hidden lg:hidden transition-opacity duration-300"></div>

        {{-- Sidebar Component --}}
        @include('dashboard.partials.sidebar')

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#f4f7fb]">
            {{-- Top Navbar --}}
            @include('dashboard.partials.navbar')

            {{-- Page Content container --}}
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 space-y-6">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- GLOBAL DELETE COMMENT CONFIRMATION MODAL --}}
    <div id="delete-comment-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
        <div class="bg-white border border-slate-200 w-full max-w-sm rounded-2xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-comment-modal-card">
            <div class="w-14 h-14 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4 border border-rose-100 shadow-xs">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
            <h3 class="text-base font-bold text-[#163049] mb-1.5">Delete Comment Permanently?</h3>
            <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                This action cannot be undone. This review will be removed from your database and website.
            </p>

            <div id="delete-comment-preview-box" class="bg-slate-50 border border-slate-200 rounded-xl p-3 text-left mb-6 space-y-1">
                <div class="text-[11px] font-bold text-[#2A5A8A]" id="delete-comment-author">Author Name</div>
                <div class="text-xs text-slate-600 line-clamp-2 italic" id="delete-comment-text">"Comment preview..."</div>
            </div>

            <input type="hidden" id="delete-comment-id">

            <div class="flex items-center justify-center gap-3">
                <button type="button" onclick="closeDeleteCommentModal()" class="w-1/2 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="button" id="confirm-delete-comment-btn" onclick="confirmDeleteComment()" class="w-1/2 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

    {{-- Notification Toast Simulation --}}
    <div id="toast-notification" class="fixed bottom-5 right-5 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none flex items-center gap-3 bg-[#2A5A8A] text-white px-5 py-3.5 rounded-xl shadow-2xl border border-[#F4DEAC]/40">
        <div class="w-5 h-5 rounded-full bg-[#F4DEAC] text-[#163049] flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5 font-bold" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <span id="toast-message" class="text-sm font-medium">Action completed successfully</span>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (sidebar) {
                sidebar.classList.toggle('-translate-x-full');
            }
            if (overlay) {
                overlay.classList.toggle('hidden');
            }
        }

                function showToast(message, type = 'auto') {
            const toast = document.getElementById('toast-notification');
            const msgEl = document.getElementById('toast-message');
            const iconEl = toast ? toast.querySelector('svg') : null;
            if (!toast) return;
            if (message) msgEl.innerText = message;

            const isError = type === 'error' || type === 'danger' || type === 'warning' || 
                (type === 'auto' && /error|fail|invalid|must be|required|wrong|denied/i.test(message));

            if (isError) {
                toast.classList.remove('bg-[#2A5A8A]', 'border-[#F4DEAC]/40');
                toast.classList.add('bg-rose-600', 'border-rose-300');
            } else {
                toast.classList.remove('bg-rose-600', 'border-rose-300');
                toast.classList.add('bg-[#2A5A8A]', 'border-[#F4DEAC]/40');
            }

            toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
            }, 3500);
        }

        // ===============================================
        // GLOBAL NOTIFICATIONS BELL & COMMENT MODERATION
        // ===============================================
        let allCommentsData = [];
        let currentCommentFilter = 'pending'; // 'pending' | 'all'

        function toggleNotificationDropdown() {
            const dropdown = document.getElementById('navbar-notif-dropdown');
            if (!dropdown) return;

            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                setTimeout(() => {
                    dropdown.classList.remove('opacity-0', 'scale-95');
                }, 10);
                fetchAllComments();
            } else {
                dropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => dropdown.classList.add('hidden'), 200);
            }
        }

        function setCommentFilter(filter, e) {
            if (e) e.stopPropagation();
            currentCommentFilter = filter;
            const btnPending = document.getElementById('filter-btn-pending');
            const btnAll = document.getElementById('filter-btn-all');

            if (filter === 'pending') {
                btnPending.className = 'px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#F4DEAC] text-[#163049] transition-all cursor-pointer';
                btnAll.className = 'px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-white/80 hover:bg-white/20 transition-all cursor-pointer';
            } else {
                btnAll.className = 'px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#F4DEAC] text-[#163049] transition-all cursor-pointer';
                btnPending.className = 'px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-white/80 hover:bg-white/20 transition-all cursor-pointer';
            }

            renderCommentsDropdown();
        }

        async function fetchAllComments() {
            try {
                const res = await fetch('/api/comments');
                const data = await res.json();
                if (data.success) {
                    allCommentsData = data.data || [];
                    renderCommentsDropdown();
                }
            } catch (err) {
                console.error('Error fetching comments for moderation:', err);
            }
        }

        function renderCommentsDropdown() {
            const list = document.getElementById('notif-comments-list');
            const countBadge = document.getElementById('navbar-notif-badge');
            const pendingCountEl = document.getElementById('notif-dropdown-pending-count');
            const allCountEl = document.getElementById('notif-dropdown-all-count');
            const emptyState = document.getElementById('notif-empty-state');

            const pendingList = allCommentsData.filter(c => c.status === 'pending');

            if (countBadge) {
                if (pendingList.length > 0) {
                    countBadge.innerText = pendingList.length;
                    countBadge.classList.remove('hidden');
                    countBadge.classList.add('flex');
                } else {
                    countBadge.innerText = '0';
                    countBadge.classList.remove('flex');
                    countBadge.classList.add('hidden');
                }
            }

            if (pendingCountEl) pendingCountEl.innerText = pendingList.length;
            if (allCountEl) allCountEl.innerText = allCommentsData.length;

            if (!list) return;

            const displayList = currentCommentFilter === 'pending' ? pendingList : allCommentsData;

            if (displayList.length === 0) {
                list.innerHTML = '';
                if (emptyState) {
                    emptyState.innerText = currentCommentFilter === 'pending' ? 'No pending comments waiting for approval.' : 'No comments found.';
                    emptyState.classList.remove('hidden');
                }
                return;
            }

            if (emptyState) emptyState.classList.add('hidden');

            list.innerHTML = displayList.map(c => {
                let statusBadge = '';
                if (c.status === 'pending') {
                    statusBadge = `<span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-amber-100 text-amber-800">Pending</span>`;
                } else if (c.status === 'approved') {
                    statusBadge = `<span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-emerald-100 text-emerald-800">Approved (Live)</span>`;
                } else {
                    statusBadge = `<span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-rose-100 text-rose-800">Rejected</span>`;
                }

                return `
                    <div class="p-3 bg-slate-50 hover:bg-slate-100/80 rounded-xl transition-colors space-y-2 border border-slate-200/80 shadow-xs">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-full bg-[#2A5A8A] text-[#F4DEAC] flex items-center justify-center font-bold text-xs">
                                    ${c.initials || 'CW'}
                                </span>
                                <div>
                                    <div class="text-xs font-bold text-[#163049] leading-tight">${c.name}</div>
                                    <div class="mt-0.5">${statusBadge}</div>
                                </div>
                            </div>
                            <div class="flex text-amber-400 text-xs">
                                ${'★'.repeat(c.rating || 5)}${'☆'.repeat(5 - (c.rating || 5))}
                            </div>
                        </div>

                        <p class="text-[11.5px] text-slate-600 line-clamp-3 leading-relaxed italic bg-white p-2 rounded border border-slate-100">
                            "${c.text}"
                        </p>

                        <div class="flex items-center justify-between pt-1 border-t border-slate-200/60">
                            {{-- Admin Delete Button with Custom Modal --}}
                            <button onclick="promptDeleteComment(${c.id})" class="text-rose-600 hover:text-rose-800 hover:bg-rose-50 px-2 py-1 rounded text-[11px] font-semibold flex items-center gap-1 transition-colors cursor-pointer" title="Delete Comment">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span>Delete</span>
                            </button>

                            {{-- Actions --}}
                            <div class="flex items-center gap-1.5">
                                ${c.status === 'pending' ? `
                                    <button onclick="rejectComment(${c.id})" class="px-2 py-1 rounded bg-slate-200 hover:bg-slate-300 text-[11px] font-semibold text-slate-700 transition-colors cursor-pointer">
                                        Reject
                                    </button>
                                    <button onclick="approveComment(${c.id})" class="px-2.5 py-1 rounded bg-emerald-600 hover:bg-emerald-700 text-[11px] font-bold text-white shadow-xs transition-colors cursor-pointer flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Approve
                                    </button>
                                ` : (c.status === 'rejected' ? `
                                    <button onclick="approveComment(${c.id})" class="px-2.5 py-1 rounded bg-emerald-600 hover:bg-emerald-700 text-[11px] font-bold text-white shadow-xs transition-colors cursor-pointer">
                                        Approve
                                    </button>
                                ` : `
                                    <span class="text-[10px] text-emerald-600 font-bold flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Published Live
                                    </span>
                                `)}
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        async function approveComment(id) {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            try {
                const res = await fetch(`/api/comments/${id}/approve`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    showToast('Comment approved and now live on website!');
                    fetchAllComments();
                } else {
                    showToast('Error approving comment');
                }
            } catch (err) {
                console.error(err);
                showToast('Failed to connect to database');
            }
        }

        async function rejectComment(id) {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            try {
                const res = await fetch(`/api/comments/${id}/reject`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    showToast('Comment rejected.');
                    fetchAllComments();
                } else {
                    showToast('Error rejecting comment');
                }
            } catch (err) {
                console.error(err);
                showToast('Failed to connect to database');
            }
        }

        function promptDeleteComment(id) {
            const comment = allCommentsData.find(c => c.id === id);
            document.getElementById('delete-comment-id').value = id;
            if (comment) {
                document.getElementById('delete-comment-author').innerText = comment.name || 'Anonymous';
                document.getElementById('delete-comment-text').innerText = `"${comment.text || ''}"`;
            }

            const modal = document.getElementById('delete-comment-modal');
            const card = document.getElementById('delete-comment-modal-card');
            if (modal) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    card.classList.remove('scale-95');
                }, 10);
            }
        }

        function closeDeleteCommentModal() {
            const modal = document.getElementById('delete-comment-modal');
            const card = document.getElementById('delete-comment-modal-card');
            if (modal) {
                modal.classList.add('opacity-0');
                card.classList.add('scale-95');
                setTimeout(() => modal.classList.add('hidden'), 200);
            }
        }

        async function confirmDeleteComment() {
            const id = document.getElementById('delete-comment-id').value;
            const btn = document.getElementById('confirm-delete-comment-btn');
            if (btn) {
                btn.disabled = true;
                btn.innerText = 'Deleting...';
            }

            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            try {
                const res = await fetch(`/api/comments/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    showToast('Comment deleted permanently!');
                    closeDeleteCommentModal();
                    fetchAllComments();
                } else {
                    showToast('Error deleting comment');
                }
            } catch (err) {
                console.error(err);
                showToast('Failed to connect to database');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerText = 'Yes, Delete';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchAllComments();
            // Polling every 15 seconds to check for new pending comments automatically
            setInterval(fetchAllComments, 15000);

            // Close notification dropdown when clicked outside
            document.addEventListener('click', (e) => {
                const dropdown = document.getElementById('navbar-notif-dropdown');
                const btn = document.getElementById('navbar-notif-btn');
                if (dropdown && !dropdown.classList.contains('hidden')) {
                    if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
                        dropdown.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => dropdown.classList.add('hidden'), 200);
                    }
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
