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
            'answer' => "Facilities vary by property and may include:\n\n• Swimming Pool\n• Fitness Center\n• Panoramic River View\n• Parking\n• Security\n• Elevator Access\n• Wi-Fi",
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

    $renderFaqContent = function($text) {
        if (empty($text)) return '';
        if (preg_match('/<[a-z][\s\S]*>/i', $text)) {
            return $text;
        }

        $lines = explode("\n", str_replace(["\r\n", "\r"], "\n", $text));
        $output = [];
        $inList = false;

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (preg_match('/^[\x{2022}\-\*]\s*(.+)$/u', $trimmed, $matches)) {
                if (!$inList) {
                    $inList = true;
                    $output[] = '<ul class="list-disc pl-5 my-1.5 space-y-1">';
                }
                $output[] = '<li class="leading-relaxed">' . e($matches[1]) . '</li>';
            } else {
                if ($inList) {
                    $output[] = '</ul>';
                    $inList = false;
                }
                if ($trimmed === '') {
                    $output[] = '<div class="h-1.5"></div>';
                } else {
                    $output[] = '<p class="leading-relaxed">' . e($trimmed) . '</p>';
                }
            }
        }
        if ($inList) {
            $output[] = '</ul>';
        }
        return implode("\n", $output);
    };
@endphp

{{-- Frequently Asked Questions --}}
<section {{ $attributes->merge(['class' => 'relative px-0 sm:px-[5rem] bg-[#e5e4e4]']) }}>
    <div class="max-w-[1400px] mx-auto px-6 py-16 sm:py-20">
        {{-- Heading --}}
        <h2 class="text-[clamp(28px,4vw,40px)] leading-tight mb-10 sm:mb-12" data-scroll-reveal="fade-up">
            <span class="text-[#2A5A8A] font-normal block">{{ $titleNormal }}</span>
            <span class="text-[#2A5A8A] font-bold block">{{ $titleBold }}</span>
        </h2>

        {{-- Two-column accordion --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-start">

            {{-- Left column (slides from LEFT) --}}
            <div class="faq-column flex flex-col gap-2" data-scroll-reveal="left">
                @foreach ($leftItems as $index => $faq)
                    @php
                        $isOpen = $firstOpen && $index === 0;
                        $answer = is_array($faq) ? ($faq['answer'] ?? '') : ($faq->answer ?? '');
                        $question = is_array($faq) ? ($faq['question'] ?? '') : ($faq->question ?? '');
                    @endphp
                    <div class="faq-item bg-[#f3f3f3]">
                        <button type="button"
                            class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                            aria-expanded="{{ $isOpen ? 'true' : 'false' }}">
                            <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                {{ $question }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200 {{ $isOpen ? 'rotate-90' : '' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 4l8 6-8 6V4z" />
                            </svg>
                        </button>
                        <div
                            class="faq-panel overflow-hidden transition-all duration-300 {{ $isOpen ? 'max-h-[600px]' : 'max-h-0' }}">
                            <div class="{{ $isOpen ? 'bg-[#1479B9]' : 'bg-white' }} px-5 py-4 sm:px-6 sm:py-5 transition-colors duration-200">
                                <div
                                    class="faq-answer-content {{ $isOpen ? 'text-white' : 'text-black/70' }} text-[13px] sm:text-[13.5px] leading-relaxed">
                                    {!! $renderFaqContent($answer) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Right column (slides from RIGHT) --}}
            <div class="faq-column flex flex-col gap-2" data-scroll-reveal="right" data-scroll-delay="100">
                @foreach ($rightItems as $faq)
                    @php
                        $answer = is_array($faq) ? ($faq['answer'] ?? '') : ($faq->answer ?? '');
                        $question = is_array($faq) ? ($faq['question'] ?? '') : ($faq->question ?? '');
                    @endphp
                    <div class="faq-item bg-[#f3f3f3]">
                        <button type="button"
                            class="faq-toggle w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5 cursor-pointer"
                            aria-expanded="false">
                            <span class="faq-question text-[#2A5A8A] text-[14px] sm:text-[15px] font-medium">
                                {{ $question }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="faq-arrow w-6.5 h-6.5 shrink-0 text-[#2A5A8A] transition-transform duration-200"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 4l8 6-8 6V4z" />
                            </svg>
                        </button>
                        <div class="faq-panel overflow-hidden transition-all duration-300 max-h-0">
                            <div class="bg-white px-5 py-4 sm:px-6 sm:py-5 transition-colors duration-200">
                                <div class="faq-answer-content text-black/70 text-[13px] sm:text-[13.5px] leading-relaxed">
                                    {!! $renderFaqContent($answer) !!}
                                </div>
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
                const answerContent = answerBox ? answerBox.querySelector('.faq-answer-content') : null;
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
                    if (answerContent) {
                        answerContent.classList.remove('text-white');
                        answerContent.classList.add('text-black/70');
                    }
                } else {
                    // Open this item
                    if (panel) panel.style.maxHeight = (panel.scrollHeight + 30) + 'px';
                    btn.setAttribute('aria-expanded', 'true');
                    if (arrow) arrow.classList.add('rotate-90');
                    if (answerBox) {
                        answerBox.classList.add('bg-[#1479B9]');
                        answerBox.classList.remove('bg-white');
                    }
                    if (answerContent) {
                        answerContent.classList.add('text-white');
                        answerContent.classList.remove('text-black/70');
                    }
                }
            });
        });
    })();
</script>
