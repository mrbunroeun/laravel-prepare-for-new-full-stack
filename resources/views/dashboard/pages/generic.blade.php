@extends('dashboard.layout')

@section('title', $pageTitle ?? 'Page Management')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200 pb-6">
        <div>
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9]">{{ $pageTitle ?? 'Section' }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">{{ $pageTitle ?? 'Page Management' }}</h1>
            <p class="text-sm text-slate-500 mt-1">Manage content, banners, text assets, and media for this section.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="showToast('Section settings saved!')" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-sm shadow-sm transition-all cursor-pointer">
                Save Changes
            </button>
        </div>
    </div>

    {{-- Content Card --}}
    <div class="bg-white border border-slate-200 rounded-xl p-6 sm:p-8 space-y-6 shadow-sm">
        <div class="flex items-center gap-3 p-4 rounded-lg bg-[#2A5A8A]/10 border border-[#2A5A8A]/20 text-[#163049] text-sm">
            <svg class="w-5 h-5 shrink-0 text-[#2A5A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <span class="font-bold">Frontend UI Template Ready:</span> You are viewing the management interface for <strong class="text-[#2A5A8A]">{{ $pageTitle ?? 'this page' }}</strong>. You can switch to the Home Page tab to manage FAQs.
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">Page Title</label>
                <input type="text" value="{{ $pageTitle ?? 'Page' }}" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">URL Route Slug</label>
                <input type="text" value="/{{ $pageSlug ?? '' }}" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-2">Page Meta Description</label>
            <textarea rows="3" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]" placeholder="Meta description for SEO optimization...">Professional real estate and property management services provided by CWD Realty.</textarea>
        </div>

        <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
            <a href="{{ url('/dashboard/pages/home') }}" class="text-xs font-semibold text-[#2A5A8A] hover:underline flex items-center gap-1">
                ← Back to Home Page (FAQs Manager)
            </a>
            <button onclick="showToast('Content synced successfully')" class="px-4 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold cursor-pointer">
                Sync with Live Website
            </button>
        </div>
    </div>
</div>
@endsection
