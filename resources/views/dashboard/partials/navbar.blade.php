<header class="h-20 bg-white border-b border-slate-200 px-4 sm:px-6 lg:px-8 flex items-center justify-between z-30 sticky top-0 shadow-xs">
    <div class="flex items-center gap-4">
        {{-- Mobile Hamburger --}}
        <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg text-slate-600 hover:text-[#163049] hover:bg-slate-100 transition-colors focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        {{-- Search bar --}}
        <div class="relative hidden sm:block w-64 md:w-80">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" placeholder="Search sections, FAQs, logs..." 
                class="w-full pl-10 pr-4 py-2 bg-[#f8fafc] border border-slate-200 rounded-lg text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2A5A8A] focus:ring-1 focus:ring-[#2A5A8A]/30 transition-all">
        </div>
    </div>

    {{-- Right actions --}}
    <div class="flex items-center gap-3 sm:gap-4">
        {{-- Visit Site Button --}}
        <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 px-3.5 sm:px-4 py-2 rounded-lg text-xs font-semibold bg-[#2A5A8A] hover:bg-[#163049] text-white transition-colors shadow-xs">
            <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
            <span class="hidden sm:inline">View Website</span>
        </a>

        {{-- Status indicator --}}
        <div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            Frontend Simulation Mode
        </div>

        {{-- Notifications bell with Pending Comments Dropdown --}}
        <div class="relative">
            <button onclick="toggleNotificationDropdown()" id="navbar-notif-btn" class="relative p-2 rounded-lg text-slate-500 hover:text-[#163049] hover:bg-slate-100 transition-colors cursor-pointer" title="Comment Notifications">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span id="navbar-notif-badge" class="{{ (isset($initialPendingCommentsCount) && $initialPendingCommentsCount > 0) ? 'flex' : 'hidden' }} absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 bg-red-600 text-white text-[10px] font-extrabold rounded-full items-center justify-center shadow-md animate-pulse border-2 border-white">{{ $initialPendingCommentsCount ?? 0 }}</span>
            </button>

            {{-- Notification Dropdown --}}
            <div id="navbar-notif-dropdown" class="hidden absolute right-0 mt-2 w-80 sm:w-96 bg-white border border-slate-200 rounded-2xl shadow-2xl z-50 overflow-hidden transform scale-95 opacity-0 transition-all duration-200">
                <div class="px-5 py-3.5 bg-[#163049] text-white flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-white">Comments Moderation</h4>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <button onclick="setCommentFilter('pending', event)" id="filter-btn-pending" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#F4DEAC] text-[#163049] transition-all">Pending (<span id="notif-dropdown-pending-count">0</span>)</button>
                        <button onclick="setCommentFilter('all', event)" id="filter-btn-all" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-white/10 text-white/80 hover:bg-white/20 transition-all">All (<span id="notif-dropdown-all-count">0</span>)</button>
                    </div>
                </div>

                <div id="notif-comments-list" class="max-h-96 overflow-y-auto divide-y divide-slate-100 p-3 space-y-2.5">
                    {{-- Rendered dynamically via JS --}}
                </div>

                <div id="notif-empty-state" class="p-8 text-center text-xs text-slate-400 hidden">
                    No comments found.
                </div>
            </div>
        </div>

        {{-- User profile avatar --}}
        <div class="flex items-center gap-3 pl-2 border-l border-slate-200">
            <div class="w-9 h-9 rounded-lg bg-[#2A5A8A] flex items-center justify-center font-bold text-[#F4DEAC] text-sm shadow-sm">
                AD
            </div>
            <div class="hidden xl:block text-left">
                <div class="text-xs font-semibold text-[#163049]">Admin User</div>
                <div class="text-[11px] text-slate-500">Super Administrator</div>
            </div>
        </div>
    </div>
</header>
