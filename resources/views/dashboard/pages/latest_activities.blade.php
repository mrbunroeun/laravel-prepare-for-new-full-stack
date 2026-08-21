@extends('dashboard.layout')

@section('title', 'Latest Activities & Events Management')

@section('content')
<div class="space-y-8">
    {{-- Header Banner --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border border-slate-200/90 rounded-xl p-5 sm:p-6 shadow-xs">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                <span>Pages Management</span>
                <span class="text-slate-400">/</span>
                <span class="text-[#1479B9] font-bold">Latest Activities</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#163049] tracking-tight">Latest Activities &amp; Events Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage interactive activity cards, images, titles, and live hover descriptions for the homepage.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="openActivityModal()" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs sm:text-sm font-bold shadow-sm transition-all cursor-pointer">
                <svg class="w-4 h-4 text-[#F4DEAC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add New Activity</span>
            </button>
        </div>
    </div>

    {{-- Database Activities Table Card --}}
    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-lg font-bold text-[#163049] flex items-center gap-2">
                    <span>Homepage Activities Grid</span>
                    <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#2A5A8A]/10 text-[#2A5A8A] font-semibold" id="activity-count-badge">Loading...</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Edit title, upload photo, change sort order, or update hover text descriptions.</p>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto mt-4">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-[11px] uppercase tracking-wider text-[#2A5A8A] font-bold border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4 w-12 text-center">#</th>
                        <th class="py-3.5 px-4 w-20 text-center">Image</th>
                        <th class="py-3.5 px-4">Title</th>
                        <th class="py-3.5 px-4">Hover Description</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="activity-table-body" class="divide-y divide-slate-100">
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">Loading activities from database...</td>
                    </tr>
                </tbody>
            </table>

            <div id="activity-empty-state" class="hidden py-12 text-center">
                <p class="text-sm text-slate-400">No activities found. Click "Add New Activity" above to create one.</p>
            </div>
        </div>
    </div>

    {{-- Live Hover Simulation Grid --}}
    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-[#2A5A8A]"></span>
                <h3 class="text-sm font-bold text-[#163049] uppercase tracking-wider">Live Homepage Hover Grid Simulation</h3>
            </div>
            <span class="text-xs text-slate-500">Hover over any card below to test the live title &amp; description animation</span>
        </div>

        <div class="bg-slate-900/5 p-6 rounded-xl border border-slate-200">
            <h2 class="text-2xl font-normal text-[#2A5A8A] mb-6">
                <span>Latest</span> <strong>Activities</strong>
            </h2>

            <div id="live-activities-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                {{-- Rendered dynamically via JS with hover effect --}}
            </div>
        </div>
    </div>
</div>

{{-- MODAL: CREATE / EDIT ACTIVITY --}}
<div id="activity-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-lg rounded-xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-200" id="activity-modal-card">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-[#163049] text-white">
            <h3 class="text-base font-bold text-white flex items-center gap-2" id="activity-modal-title">
                <span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span>
                Add New Activity
            </h3>
            <button onclick="closeActivityModal()" class="text-white/70 hover:text-white p-1 rounded hover:bg-white/10 transition-colors cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="activity-form" onsubmit="handleActivitySubmit(event)" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
            <input type="hidden" id="act-id" value="">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Activity Title <span class="text-rose-500">*</span></label>
                <input type="text" id="act-title" required placeholder="e.g. Wealth Mansion or Golden Tower" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Hover Description <span class="text-rose-500">*</span></label>
                <textarea id="act-desc" required rows="3" placeholder="Enter description that appears on hover..." class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Activity Image</label>
                <input type="file" id="act-image-file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#2A5A8A] file:text-white hover:file:bg-[#163049] cursor-pointer">
                <input type="hidden" id="act-image-url" value="home/latest_activities/1img.png">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Status</label>
                    <select id="act-status" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#2A5A8A] mb-1">Sort Order</label>
                    <input type="number" id="act-sort-order" value="1" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-[#2A5A8A]">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closeActivityModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" id="act-submit-btn" class="px-5 py-2.5 rounded-lg bg-[#2A5A8A] hover:bg-[#163049] text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer">
                    Save Activity
                </button>
            </div>
        </form>
    </div>
</div>

{{-- DELETE ACTIVITY MODAL --}}
<div id="delete-act-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#163049]/60 backdrop-blur-xs p-4 hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white border border-slate-200 w-full max-w-sm rounded-xl shadow-2xl p-6 text-center transform scale-95 transition-transform duration-200" id="delete-act-modal-card">
        <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-base font-bold text-[#163049] mb-1">Delete Activity?</h3>
        <p class="text-xs text-slate-500 mb-6">Are you sure you want to delete this activity from the homepage grid?</p>

        <input type="hidden" id="delete-act-id">

        <div class="flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteActModal()" class="px-4 py-2 rounded-lg text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer">
                Cancel
            </button>
            <button type="button" onclick="confirmDeleteActivity()" class="px-5 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs sm:text-sm shadow-md transition-all cursor-pointer">
                Yes, Delete
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';
    let activitiesData = [];

    async function fetchActivities() {
        try {
            const res = await fetch('/api/latest-activities');
            const data = await res.json();
            if (data.success && Array.isArray(data.data)) {
                activitiesData = data.data;
                const badge = document.getElementById('activity-count-badge');
                if (badge) badge.innerText = `${activitiesData.length} Items`;
                renderActivitiesTable();
                renderActivitiesPreview();
            }
        } catch (err) {
            console.error('Error fetching activities:', err);
        }
    }

    function renderActivitiesTable() {
        const tbody = document.getElementById('activity-table-body');
        const empty = document.getElementById('activity-empty-state');
        if (!tbody) return;

        if (activitiesData.length === 0) {
            tbody.innerHTML = '';
            if (empty) empty.classList.remove('hidden');
            return;
        }

        if (empty) empty.classList.add('hidden');
        tbody.innerHTML = activitiesData.map((act, index) => {
            let imgSrc = act.image || 'home/latest_activities/1img.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                imgSrc = '/' + imgSrc;
            }
            return `
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <td class="py-3.5 px-4 text-center font-bold text-slate-400 text-xs">${index + 1}</td>
                    <td class="py-3.5 px-4 text-center">
                        <img src="${escapeHtml(imgSrc)}" class="w-12 h-12 object-cover rounded-lg border border-slate-200 mx-auto shadow-2xs">
                    </td>
                    <td class="py-3.5 px-4 font-bold text-[#163049]">${escapeHtml(act.title)}</td>
                    <td class="py-3.5 px-4 text-slate-600 text-xs max-w-xs truncate">${escapeHtml(act.description)}</td>
                    <td class="py-3.5 px-4 text-center">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold ${act.status === 'published' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700'}">
                            ${escapeHtml(act.status || 'published')}
                        </span>
                    </td>
                    <td class="py-3.5 px-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="editActivity(${act.id})" class="p-1.5 rounded-lg text-slate-500 hover:text-[#1479B9] hover:bg-[#1479B9]/10 transition-colors cursor-pointer" title="Edit Activity">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button onclick="promptDeleteActivity(${act.id})" class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer" title="Delete Activity">
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

    function renderActivitiesPreview() {
        const grid = document.getElementById('live-activities-grid');
        if (!grid) return;

        grid.innerHTML = activitiesData.map((act) => {
            let imgSrc = act.image || 'home/latest_activities/1img.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                imgSrc = '/' + imgSrc;
            }
            return `
                <div class="relative overflow-hidden group h-[220px] rounded-lg shadow-sm border border-slate-200">
                    <img src="${escapeHtml(imgSrc)}" class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-[#163049]/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5 text-white">
                        <h4 class="text-[#F4DEAC] font-bold text-sm mb-1.5">${escapeHtml(act.title)}</h4>
                        <p class="text-xs text-white/90 leading-relaxed line-clamp-3">${escapeHtml(act.description)}</p>
                    </div>
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-4 group-hover:opacity-0 transition-opacity duration-300">
                        <span class="text-white font-bold text-xs">${escapeHtml(act.title)}</span>
                    </div>
                </div>
            `;
        }).join('');
    }

    function openActivityModal(activity = null) {
        const modal = document.getElementById('activity-modal');
        const card = document.getElementById('activity-modal-card');
        const form = document.getElementById('activity-form');
        form.reset();

        if (activity) {
            document.getElementById('activity-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Edit Activity #' + activity.id;
            document.getElementById('act-id').value = activity.id;
            document.getElementById('act-title').value = activity.title || '';
            document.getElementById('act-desc').value = activity.description || '';
            document.getElementById('act-image-url').value = activity.image || 'home/latest_activities/1img.png';
            document.getElementById('act-status').value = activity.status || 'published';
            document.getElementById('act-sort-order').value = activity.sort_order || 1;
        } else {
            document.getElementById('activity-modal-title').innerHTML = '<span class="w-2 h-2 rounded-full bg-[#F4DEAC]"></span> Add New Activity';
            document.getElementById('act-id').value = '';
            document.getElementById('act-image-url').value = 'home/latest_activities/1img.png';
            document.getElementById('act-status').value = 'published';
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
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    function editActivity(id) {
        const activity = activitiesData.find(a => Number(a.id) === Number(id));
        if (activity) {
            openActivityModal(activity);
        }
    }

    async function handleActivitySubmit(event) {
        event.preventDefault();
        const submitBtn = document.getElementById('act-submit-btn');
        submitBtn.disabled = true;
        submitBtn.innerText = 'Saving...';

        const id = document.getElementById('act-id').value;
        const formData = new FormData();
        formData.append('title', document.getElementById('act-title').value.trim());
        formData.append('description', document.getElementById('act-desc').value.trim());
        formData.append('image', document.getElementById('act-image-url').value);
        formData.append('status', document.getElementById('act-status').value);
        formData.append('sort_order', document.getElementById('act-sort-order').value);

        const fileInput = document.getElementById('act-image-file');
        if (fileInput && fileInput.files.length > 0) {
            formData.append('image_file', fileInput.files[0]);
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
                if (typeof showToast === 'function') showToast(id ? 'Activity updated successfully!' : 'Activity added successfully!');
                closeActivityModal();
                fetchActivities();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error saving activity', 'error');
            }
        } catch (err) {
            console.error('Error saving activity:', err);
            if (typeof showToast === 'function') showToast('Server error saving activity', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Save Activity';
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
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    async function confirmDeleteActivity() {
        const id = document.getElementById('delete-act-id').value;
        if (!id) return;

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
                if (typeof showToast === 'function') showToast('Activity deleted successfully!');
                closeDeleteActModal();
                fetchActivities();
            } else {
                if (typeof showToast === 'function') showToast(data.message || 'Error deleting activity', 'error');
            }
        } catch (err) {
            console.error('Error deleting activity:', err);
            if (typeof showToast === 'function') showToast('Server error deleting activity', 'error');
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchActivities();
    });
</script>
@endpush
