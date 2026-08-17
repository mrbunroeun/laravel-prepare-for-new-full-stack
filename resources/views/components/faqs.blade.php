@props([
    'faqs' => null,
    'faqLeft' => null,
    'faqRight' => null,
    'titleNormal' => 'Frequently',
    'titleBold' => 'Asked Questions',
    'firstOpen' => true,
])

@php
    $defaultFaqLeft = [
        [
            'question' => 'Why should I stay at a property managed by CWD Realty & Hospitality?',
            'answer' =>
                'We professionally manage quality condominium properties, offering clean accommodations, responsive support, flexible rental options, and convenient locations suitable for business travelers, expatriates, and tourists.',
        ],
        [
            'question' => 'How much does a room cost?',
            'answer' => 'ComingSoon',
        ],
        [
            'question' => 'Are smoking and non-smoking rooms available?',
            'answer' => 'ComingSoon',
        ],
        [
            'question' => 'Is breakfast included?',
            'answer' => 'ComingSoon',
        ],
    ];

    $defaultFaqRight = [
        [
            'question' => 'Are pets allowed?',
            'answer' => 'ComingSoon',
        ],
        [
            'question' => 'What facilities are available?',
            'answer' => 'ComingSoon',
        ],
        [
            'question' => 'Do you provide airport transportation?',
            'answer' => 'ComingSoon',
        ],
        [
            'question' => 'Are there discounts for weekly or monthly stays?',
            'answer' => 'ComingSoon',
        ],
    ];

    if ($faqs !== null && count($faqs) > 0) {
        $half = (int) ceil(count($faqs) / 2);
        $leftItems = array_slice($faqs, 0, $half);
        $rightItems = array_slice($faqs, $half);
    } else {
        $leftItems = $faqLeft ?? $defaultFaqLeft;
        $rightItems = $faqRight ?? $defaultFaqRight;
    }
@endphp

{{-- Frequently Asked Questions --}}
<section {{ $attributes->merge(['class' => 'relative px-0 sm:px-[5rem] bg-[#e5e4e4]']) }}>
    <div class="max-w-[1400px] mx-auto px-6 py-16 sm:py-20">
        {{-- Heading --}}
        <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12">
            <span class="text-[#2A5A8A] font-normal block">{{ $titleNormal }}</span>
            <span class="text-[#2A5A8A] font-bold block">{{ $titleBold }}</span>
        </h2>

        {{-- Two-column accordion --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">

            {{-- Left column --}}
            <div class="faq-column flex flex-col gap-2">
                @foreach ($leftItems as $index => $faq)
                    @php
                        $isOpen = $firstOpen && $index === 0;
                    @endphp
                    <div class="faq-item bg-[#f3f3f3]">
                        <button type="button"
                            class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                            aria-expanded="{{ $isOpen ? 'true' : 'false' }}">
                            <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                {{ $faq['question'] ?? '' }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200 {{ $isOpen ? 'rotate-90' : '' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 4l8 6-8 6V4z" />
                            </svg>
                        </button>
                        <div
                            class="faq-panel overflow-hidden transition-all duration-300 {{ $isOpen ? 'max-h-[300px]' : 'max-h-0' }}">
                            <div class="{{ $isOpen ? 'bg-[#1479B9]' : 'bg-white' }} px-5 py-4 sm:px-6 sm:py-5">
                                <p
                                    class="{{ $isOpen ? 'text-white' : 'text-black/70' }} text-[13px] sm:text-[13.5px] leading-relaxed">
                                    {{ $faq['answer'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Right column --}}
            <div class="faq-column flex flex-col gap-2">
                @foreach ($rightItems as $faq)
                    <div class="faq-item bg-[#f3f3f3]">
                        <button type="button"
                            class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                            aria-expanded="false">
                            <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                {{ $faq['question'] ?? '' }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 4l8 6-8 6V4z" />
                            </svg>
                        </button>
                        <div class="faq-panel overflow-hidden transition-all duration-300 max-h-0">
                            <div class="bg-white px-5 py-4 sm:px-6 sm:py-5">
                                <p class="text-black/70 text-[13px] sm:text-[13.5px] leading-relaxed">
                                    {{ $faq['answer'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

<script>
    (function() {
        document.querySelectorAll('.faq-toggle').forEach(function(btn) {
            if (btn.dataset.faqBound) return;
            btn.dataset.faqBound = 'true';

            btn.addEventListener('click', function() {
                const item = btn.closest('.faq-item');
                if (!item) return;
                const panel = item.querySelector('.faq-panel');
                const answerBox = panel ? panel.querySelector('div') : null;
                const answerText = answerBox ? answerBox.querySelector('p') : null;
                const arrow = btn.querySelector('.faq-arrow');
                const isOpen = btn.getAttribute('aria-expanded') === 'true';

                if (isOpen) {
                    // Close this item
                    if (panel) panel.style.maxHeight = '0px';
                    btn.setAttribute('aria-expanded', 'false');
                    if (arrow) arrow.classList.remove('rotate-90');
                    if (answerBox) {
                        answerBox.classList.remove('bg-[#1479B9]');
                        answerBox.classList.add('bg-white');
                    }
                    if (answerText) {
                        answerText.classList.remove('text-white');
                        answerText.classList.add('text-black/70');
                    }
                } else {
                    // Open this item
                    if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
                    btn.setAttribute('aria-expanded', 'true');
                    if (arrow) arrow.classList.add('rotate-90');
                    if (answerBox) {
                        answerBox.classList.add('bg-[#1479B9]');
                        answerBox.classList.remove('bg-white');
                    }
                    if (answerText) {
                        answerText.classList.add('text-white');
                        answerText.classList.remove('text-black/70');
                    }
                }
            });
        });
    })();
</script>
