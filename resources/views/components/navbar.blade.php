@php
    $navItems = [
        ['label' => 'Home', 'url' => url('/'), 'pattern' => '/'],
        ['label' => 'About Us', 'url' => url('/about-us'), 'pattern' => 'about-us*'],
        [
            'label' => 'Services',
            'url' => url('/service'),
            'pattern' => ['service*', 'services*'],
            'submenu' => [
                ['label' => 'Property Management', 'url' => url('/services/property-management'), 'pattern' => 'services/property-management*'],
                ['label' => 'Property Sales', 'url' => url('/services/property-sales'), 'pattern' => 'services/property-sales*'],
                ['label' => 'Property Leasing', 'url' => url('/services/property-leasing'), 'pattern' => ['services/property-leasing*', 'services/properties-leasing-list*']],
                ['label' => 'Hospitality Services', 'url' => url('/services/hospitality-services'), 'pattern' => 'services/hospitality-services*'],
            ],
        ],
        ['label' => 'Properties', 'url' => url('/properties'), 'pattern' => 'properties*', 'exclude' => 'properties/wealth-mansion*'],
        ['label' => 'Partners', 'url' => url('/partners'), 'pattern' => 'partners*'],
        ['label' => 'Insights', 'url' => url('/insights'), 'pattern' => 'insights*'],
        ['label' => 'Events', 'url' => url('/events'), 'pattern' => 'events*'],
        ['label' => 'Contact Us', 'url' => url('/contact-us'), 'pattern' => 'contact-us*'],
    ];

    // Find the nav item that has a submenu, so we can render its dropdown
    // OUTSIDE the transformed flex container (fixes the containing-block bug).
    $servicesItem = collect($navItems)->firstWhere('label', 'Services');
@endphp

<header id="site-header" class="absolute top-0 left-0 w-full pointer-events-none">
    {{-- Header background: sits underneath hero image (z-[50]) --}}
    <div class="absolute inset-0 bg-white z-[50] pointer-events-none"></div>

    {{-- Header navigation content: highest z-index so Logo & Hamburger stay visible even when mobile menu is open --}}
    <nav aria-label="Main navigation" class="max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8 relative z-[900] pointer-events-auto">
        <div class="flex items-center justify-between py-10 relative -translate-x-[1.5%]">

            {{-- Logo, stuck to the left --}}
            <a href="{{ url('/') }}" class="relative z-[950] flex-shrink-0 pointer-events-auto">
                <img src="{{ asset('logo_nav_foot/cwd.svg') }}" alt="Company logo" class="h-8 min-[1161px]:h-10 w-auto">
            </a>

            {{-- Desktop nav, absolutely centered on the page regardless of logo width --}}
            <ul class="hidden min-[1161px]:flex items-center gap-8 xl:gap-10 absolute left-[42%] top-1/2 -translate-x-1/2 -translate-y-1/2 w-max whitespace-nowrap z-[950] pointer-events-auto">
                @foreach ($navItems as $item)
                    @php
                        $pattern = is_array($item['pattern']) ? $item['pattern'] : [$item['pattern']];
                        $isActive = request()->is(...$pattern);
                        if (!empty($item['exclude'])) {
                            $excludePattern = is_array($item['exclude']) ? $item['exclude'] : [$item['exclude']];
                            if (request()->is(...$excludePattern)) {
                                $isActive = false;
                            }
                        }
                        $hasSubmenu = isset($item['submenu']);
                        if ($hasSubmenu && !$isActive) {
                            $isActive = collect($item['submenu'])->contains(function($sub) {
                                $subPattern = is_array($sub['pattern']) ? $sub['pattern'] : [$sub['pattern']];
                                return request()->is(...$subPattern);
                            });
                        }
                    @endphp
                    <li class="relative {{ $hasSubmenu ? 'nav-has-submenu' : '' }}">
                        @if ($hasSubmenu)
                            <a href="javascript:void(0)"
                                class="cursor-pointer relative inline-block pb-1 text-[#2c4a75] text-[15px] xl:text-[16px] font-medium tracking-wide
                                    transition-colors duration-200 hover:text-[#1a3358]
                                    after:content-[''] after:absolute after:left-0 after:-bottom-[2px] after:h-[2px]
                                    after:bg-[#2c4a75] after:transition-all after:duration-300
                                    {{ $isActive ? 'after:w-full' : 'after:w-0 hover:after:w-full' }}">
                                {{ $item['label'] }}
                            </a>
                        @else
                            <a href="{{ $item['url'] }}"
                                @if ($isActive) aria-current="page" @endif
                                class="relative inline-block pb-1 text-[#2c4a75] text-[15px] xl:text-[16px] font-medium tracking-wide
                                    transition-colors duration-200 hover:text-[#1a3358]
                                    after:content-[''] after:absolute after:left-0 after:-bottom-[2px] after:h-[2px]
                                    after:bg-[#2c4a75] after:transition-all after:duration-300
                                    {{ $isActive ? 'after:w-full' : 'after:w-0 hover:after:w-full' }}">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>

            {{-- Hamburger for mobile --}}
            <button
                id="navbar-toggle"
                type="button"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
                class="max-[1160px]:flex hidden relative cursor-pointer z-[950] pointer-events-auto flex-col justify-center items-center w-10 h-10 gap-[5px]">
                <span class="block w-6 h-[2px] bg-[#2c4a75] transition-transform duration-300" id="bar-1"></span>
                <span class="block w-6 h-[2px] bg-[#2c4a75] transition-opacity duration-300" id="bar-2"></span>
                <span class="block w-6 h-[2px] bg-[#2c4a75] transition-transform duration-300" id="bar-3"></span>
            </button>
        </div>
    </nav>
</header>

{{-- Full-width dropdown panel: outside <header> so its z-index floats ON TOP of the hero image --}}
@if ($servicesItem)
    <div
        id="services-dropdown"
        class="fixed left-0 w-screen bg-[#2c4a75]/60 backdrop-blur-sm
            opacity-0 invisible -translate-y-3
            transition-all duration-300 ease-out
            z-[850] pointer-events-auto shadow-lg">
        <ul class="flex items-center justify-center gap-10 xl:gap-14 py-4 max-w-[1400px] mx-auto px-4">
            @foreach ($servicesItem['submenu'] as $sub)
                @php
                    $subPattern = is_array($sub['pattern']) ? $sub['pattern'] : [$sub['pattern']];
                    $subActive = request()->is(...$subPattern);
                @endphp
                <li>
                    <a href="{{ $sub['url'] }}"
                        @if ($subActive) aria-current="page" @endif
                        class="text-[15px] xl:text-[16px] font-medium tracking-wide whitespace-nowrap transition-colors duration-200
                            {{ $subActive ? 'text-[#DCC597]' : 'text-white hover:text-[#DCC597]' }}">
                        {{ $sub['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Mobile menu: sits at z-[800], behind the z-[950] logo & hamburger button so both stay visible --}}
<div
    id="mobile-menu"
    class="max-[1160px]:block hidden fixed inset-0 top-0 bg-white opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out z-[800] overflow-y-auto">
    <div class="flex flex-col items-start gap-1 px-6 pt-24 pb-10 min-h-screen">
        <ul class="flex flex-col items-start gap-1 w-full">
            @foreach ($navItems as $item)
                @php
                    $pattern = is_array($item['pattern']) ? $item['pattern'] : [$item['pattern']];
                    $isActive = request()->is(...$pattern);
                    if (!empty($item['exclude'])) {
                        $excludePattern = is_array($item['exclude']) ? $item['exclude'] : [$item['exclude']];
                        if (request()->is(...$excludePattern)) {
                            $isActive = false;
                        }
                    }
                    $hasSubmenu = isset($item['submenu']);
                @endphp
                <li class="w-full text-left">
                    @if ($hasSubmenu)
                        @php
                            $isSubActiveAny = collect($item['submenu'])->contains(function($sub) {
                                $subPattern = is_array($sub['pattern']) ? $sub['pattern'] : [$sub['pattern']];
                                return request()->is(...$subPattern);
                            });
                        @endphp
                        <button type="button"
                            class="mobile-submenu-toggle w-full flex items-center justify-between py-3 text-[#2c4a75] text-[17px] font-medium text-left cursor-pointer {{ ($isActive || $isSubActiveAny) ? 'border-b-2 border-[#2c4a75]' : '' }}"
                            aria-expanded="{{ $isSubActiveAny ? 'true' : 'false' }}">
                            <span>{{ $item['label'] }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="mobile-submenu-arrow w-4 h-4 transition-transform duration-300 text-[#2c4a75] {{ $isSubActiveAny ? 'rotate-180' : '' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="mobile-submenu-panel grid {{ $isSubActiveAny ? 'grid-rows-[1fr]' : 'grid-rows-[0fr]' }} transition-all duration-300 ease-in-out overflow-hidden">
                            <ul class="min-h-0 flex flex-col items-start gap-1 pl-4 w-full pt-1 pb-2">
                                @foreach ($item['submenu'] as $sub)
                                    @php
                                        $subPattern = is_array($sub['pattern']) ? $sub['pattern'] : [$sub['pattern']];
                                        $subActive = request()->is(...$subPattern);
                                    @endphp
                                    <li class="w-full text-left">
                                        <a href="{{ $sub['url'] }}"
                                            @if ($subActive) aria-current="page" @endif
                                            class="mobile-nav-link inline-block py-2 text-[15px] font-medium transition-colors hover:text-[#2c4a75]
                                                {{ $subActive ? 'text-[#2c4a75] font-semibold border-b-2 border-[#2c4a75]' : 'text-[#2c4a75]/80' }}">
                                            {{ $sub['label'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a href="{{ $item['url'] }}"
                            @if ($isActive) aria-current="page" @endif
                            class="mobile-nav-link inline-block py-3 text-[#2c4a75] text-[17px] font-medium
                                {{ $isActive ? 'border-b-2 border-[#2c4a75]' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- Scroll-to-top button: hidden until the user scrolls past the header --}}
<button
    id="scroll-to-top"
    type="button"
    aria-label="Scroll back to top"
    class="fixed bottom-6 cursor-pointer right-6 z-[500] w-12 h-12 rounded-full bg-[#2c4a75] text-white
        flex items-center justify-center shadow-lg
        opacity-0 invisible translate-y-3
        transition-all duration-300 ease-out
        hover:bg-[#1a3358]">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
    </svg>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ---- Mobile menu ----
        const toggle = document.getElementById('navbar-toggle');
        const menu = document.getElementById('mobile-menu');
        const bar1 = document.getElementById('bar-1');
        const bar2 = document.getElementById('bar-2');
        const bar3 = document.getElementById('bar-3');

        function closeMenu() {
            menu.classList.remove('opacity-100');
            menu.classList.add('opacity-0', 'pointer-events-none');
            toggle.setAttribute('aria-expanded', 'false');
            bar1.style.transform = '';
            bar2.style.opacity = '1';
            bar3.style.transform = '';
            document.body.style.overflow = '';
        }

        function openMenu() {
            menu.classList.remove('opacity-0', 'pointer-events-none');
            menu.classList.add('opacity-100');
            toggle.setAttribute('aria-expanded', 'true');
            bar1.style.transform = 'translateY(7px) rotate(45deg)';
            bar2.style.opacity = '0';
            bar3.style.transform = 'translateY(-7px) rotate(-45deg)';
            document.body.style.overflow = 'hidden';
        }

        toggle.addEventListener('click', function() {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true';
            isOpen ? closeMenu() : openMenu();
        });

        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Mobile submenu smooth accordion toggle
        document.querySelectorAll('.mobile-submenu-toggle').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const panel = this.nextElementSibling;
                const arrow = this.querySelector('.mobile-submenu-arrow');
                const isOpen = panel.classList.contains('grid-rows-[1fr]');

                if (isOpen) {
                    panel.classList.remove('grid-rows-[1fr]');
                    panel.classList.add('grid-rows-[0fr]');
                    this.setAttribute('aria-expanded', 'false');
                    if (arrow) arrow.classList.remove('rotate-180');
                } else {
                    panel.classList.remove('grid-rows-[0fr]');
                    panel.classList.add('grid-rows-[1fr]');
                    this.setAttribute('aria-expanded', 'true');
                    if (arrow) arrow.classList.add('rotate-180');
                }
            });
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1161) closeMenu();
        });

        // ---- Services dropdown (JS-driven, positioned against real header height) ----
        const servicesTrigger = document.querySelector('.nav-has-submenu');
        const dropdown = document.getElementById('services-dropdown');
        const header = document.getElementById('site-header');

        if (servicesTrigger && dropdown && header) {
            let hideTimeout;

            function positionDropdown() {
                const headerRect = header.getBoundingClientRect();
                const overlap = 10;
                dropdown.style.top = (headerRect.bottom - overlap) + 'px';
            }

            function showDropdown() {
                clearTimeout(hideTimeout);
                positionDropdown();
                dropdown.classList.remove('opacity-0', 'invisible', '-translate-y-3');
                dropdown.classList.add('opacity-100', 'visible', 'translate-y-0');
            }

            function hideDropdown() {
                hideTimeout = setTimeout(() => {
                    dropdown.classList.add('opacity-0', 'invisible', '-translate-y-3');
                    dropdown.classList.remove('opacity-100', 'visible', 'translate-y-0');
                }, 250);
            }

            servicesTrigger.addEventListener('mouseenter', showDropdown);
            servicesTrigger.addEventListener('mouseleave', hideDropdown);
            dropdown.addEventListener('mouseenter', showDropdown);
            dropdown.addEventListener('mouseleave', hideDropdown);

            window.addEventListener('resize', positionDropdown);
            window.addEventListener('scroll', positionDropdown);
        }

        // ---- Scroll-to-top button ----
        const scrollBtn = document.getElementById('scroll-to-top');
        const headerEl = document.getElementById('site-header');

        if (scrollBtn && headerEl) {
            function toggleScrollBtn() {
                const headerBottom = headerEl.getBoundingClientRect().bottom;
                const pastHeader = headerBottom < 0;

                if (pastHeader) {
                    scrollBtn.classList.remove('opacity-0', 'invisible', 'translate-y-3');
                    scrollBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
                } else {
                    scrollBtn.classList.add('opacity-0', 'invisible', 'translate-y-3');
                    scrollBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
                }
            }

            window.addEventListener('scroll', toggleScrollBtn);
            toggleScrollBtn();

            // Custom scroll animation: starts slow, accelerates toward the end.
            // easeInCubic gives that "slow -> fast -> fast" feel you asked for.
            function easeInCubic(t) {
                return t * t * t;
            }

            function smoothScrollToTop(duration = 900) {
                const startY = window.scrollY || window.pageYOffset;
                if (startY === 0) return;

                const startTime = performance.now();

                function step(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = easeInCubic(progress);

                    window.scrollTo(0, startY - startY * eased);

                    if (progress < 1) {
                        requestAnimationFrame(step);
                    }
                }

                requestAnimationFrame(step);
            }

            scrollBtn.addEventListener('click', () => smoothScrollToTop());
        }
    });
</script>