@php
        $comments = \App\Models\Comment::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($comments->isEmpty()) {
            $comments = collect([
                (object)[
                    'name' => 'Bun Roeun',
                    'initials' => 'BR',
                    'rating' => 5,
                    'text' => 'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.'
                ],
                (object)[
                    'name' => 'Has Bun',
                    'initials' => 'HB',
                    'rating' => 5,
                    'text' => 'Exceptional service and quick response times. The management team went above and beyond to make my stay in Phnom Penh seamless and relaxing.'
                ]
            ]);
        }
    @endphp

    {{-- Testimonials Section --}}
    <section class="bg-white relative">
        <div class="max-w-[1000px] mx-auto px-6 sm:px-10 py-16 sm:py-20">
            <div class="flex flex-col gap-8">

                {{-- New testimonial input form --}}
                <div>
                    <div class="flex justify-end mb-2">
                        <div id="new-rating" class="flex items-center gap-1" data-selected="5">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" class="rating-star cursor-pointer" data-value="{{ $i }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 h-5 text-[#fec259] pointer-events-none" fill="currentColor">
                                        <path
                                            d="M12 2.5l2.9 6.06 6.6.72-4.9 4.53 1.28 6.54L12 16.98l-5.88 3.37 1.28-6.54-4.9-4.53 6.6-.72L12 2.5z" />
                                    </svg>
                                </button>
                            @endfor
                        </div>
                    </div>

                    <div class="bg-[#f5f5f5] px-6 py-6 sm:px-8 sm:py-7 rounded-sm shadow-xs border border-slate-100">
                        <div class="flex items-start gap-4">
                            {{-- Dynamic Live Initials Badge or Default Avatar --}}
                            <div id="new-comment-avatar" class="w-11 h-11 rounded-full bg-[#2A5A8A] text-[#F4DEAC] flex items-center justify-center font-bold text-sm shrink-0 tracking-wider shadow-xs uppercase">
                                CW
                            </div>

                            <div class="flex flex-col gap-2 w-full">
                                <input type="text" id="new-name" placeholder="Your Name (e.g. Has Bun)" oninput="updateInputAvatar(this.value)"
                                    class="text-black text-[15px] font-bold bg-transparent outline-none placeholder:text-black/50 placeholder:font-bold w-full">
                                <textarea id="new-text" rows="2" placeholder="Share your experience with CWD Realty & Hospitality..."
                                    class="text-black/75 text-[13.5px] leading-relaxed bg-transparent outline-none resize-none w-full placeholder:text-black/40"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end mt-3 pt-2 border-t border-slate-200/60">
                            <button type="button" id="submit-testimonial"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded bg-[#2A5A8A] hover:bg-[#163049] text-white text-xs font-semibold shadow-xs transition-colors cursor-pointer">
                                <span>Submit Review</span>
                                <span aria-hidden="true">&rarr;</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Existing Approved Testimonials --}}
                <div id="testimonials-list" class="flex flex-col gap-8">
                    @foreach ($comments as $index => $item)
                        @php
                            $initials = $item->initials ?? \App\Models\Comment::extractInitials($item->name ?? 'User');
                        @endphp
                        <div data-scroll-reveal="{{ $index % 2 === 0 ? 'left' : 'right' }}">
                            <div class="flex justify-end mb-2">
                                <div class="flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 {{ $i <= $item->rating ? 'text-[#fec259]' : 'text-[#d8d3c8]' }}"
                                            fill="currentColor">
                                            <path
                                                d="M12 2.5l2.9 6.06 6.6.72-4.9 4.53 1.28 6.54L12 16.98l-5.88 3.37 1.28-6.54-4.9-4.53 6.6-.72L12 2.5z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>

                            <div class="bg-[#f5f5f5] px-6 py-6 sm:px-8 sm:py-7 rounded-sm">
                                <div class="flex items-start gap-4">
                                    {{-- Rounded initials box --}}
                                    <div class="w-11 h-11 rounded-full bg-[#2A5A8A] text-[#F4DEAC] flex items-center justify-center font-bold text-sm shrink-0 tracking-wider shadow-xs uppercase">
                                        {{ $initials }}
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h3 class="text-black text-[15px] font-bold">{{ $item->name }}</h3>
                                        <p class="text-black/70 text-[13.5px] leading-relaxed">
                                            {{ $item->text }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    {{-- RIGHT SIDE BEAUTIFUL POPUP NOTIFICATION --}}
    <div id="comment-approval-popup" class="fixed top-8 right-6 z-50 max-w-md w-full transform translate-x-[120%] transition-transform duration-500 ease-out pointer-events-none">
        <div class="bg-[#163049] text-white p-5 rounded-2xl shadow-2xl border-2 border-[#F4DEAC]/60 flex items-start gap-4 pointer-events-auto backdrop-blur-md">
            {{-- Icon --}}
            <div class="w-11 h-11 rounded-xl bg-[#2A5A8A] text-[#F4DEAC] flex items-center justify-center shrink-0 shadow-sm border border-[#F4DEAC]/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            {{-- Message Body --}}
            <div class="flex-1">
                <div class="flex items-center justify-between gap-2 mb-1">
                    <h4 class="text-sm font-bold text-[#F4DEAC] flex items-center gap-1.5">
                        <span>Comment Submitted!</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    </h4>
                    <button onclick="closeCommentPopup()" class="text-white/60 hover:text-white p-0.5 rounded cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-white/85 leading-relaxed">
                    Thank you! Your comment has been created successfully. It is currently under review and will appear on the website once approved by an administrator.
                </p>
                <div class="mt-3 flex items-center gap-2 text-[11px] text-[#F4DEAC]/80 font-mono bg-white/10 px-2.5 py-1 rounded-md">
                    <span>Status:</span>
                    <span class="font-bold text-amber-300">Pending Admin Approval</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getInitials(name) {
            name = (name || '').trim();
            if (!name) return 'CW';
            const words = name.split(/\s+/).filter(Boolean);
            if (words.length >= 2) {
                return (words[0][0] + words[1][0]).toUpperCase();
            }
            return name.substring(0, 2).toUpperCase();
        }

        function updateInputAvatar(name) {
            const avatar = document.getElementById('new-comment-avatar');
            if (avatar) {
                avatar.innerText = getInitials(name);
            }
        }

        function showCommentPopup() {
            const popup = document.getElementById('comment-approval-popup');
            if (!popup) return;
            popup.classList.remove('translate-x-[120%]');
            popup.classList.add('translate-x-0');
            setTimeout(closeCommentPopup, 7000);
        }

        function closeCommentPopup() {
            const popup = document.getElementById('comment-approval-popup');
            if (!popup) return;
            popup.classList.remove('translate-x-0');
            popup.classList.add('translate-x-[120%]');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const ratingContainer = document.getElementById('new-rating');
            const stars = ratingContainer.querySelectorAll('.rating-star svg');

            stars.forEach(function(star, index) {
                star.parentElement.addEventListener('click', function() {
                    const value = index + 1;
                    ratingContainer.dataset.selected = value;
                    stars.forEach(function(s, i) {
                        s.classList.toggle('text-[#fec259]', i < value);
                        s.classList.toggle('text-[#d8d3c8]', i >= value);
                    });
                });
            });

            const submitBtn = document.getElementById('submit-testimonial');
            if (submitBtn) {
                submitBtn.addEventListener('click', async function() {
                    const nameInput = document.getElementById('new-name');
                    const textInput = document.getElementById('new-text');
                    const rating = parseInt(ratingContainer.dataset.selected, 10) || 5;

                    const name = nameInput.value.trim() || 'Anonymous';
                    const text = textInput.value.trim();

                    if (!text) {
                        textInput.focus();
                        return;
                    }

                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Submitting...';

                    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                    try {
                        const res = await fetch('/api/comments/submit', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrf,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                name: name,
                                text: text,
                                rating: rating
                            })
                        });

                        const data = await res.json();
                        if (res.ok && data.success) {
                            showCommentPopup();
                            nameInput.value = '';
                            textInput.value = '';
                            ratingContainer.dataset.selected = 5;
                            stars.forEach(function(s) {
                                s.classList.add('text-[#fec259]');
                                s.classList.remove('text-[#d8d3c8]');
                            });
                            updateInputAvatar('');
                        } else {
                            alert(data.message || 'Error submitting comment');
                        }
                    } catch (err) {
                        console.error('Error submitting comment:', err);
                        alert('Could not submit comment at this time.');
                    } finally {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<span>Submit Review</span><span aria-hidden="true">&rarr;</span>';
                    }
                });
            }
        });
    </script>
