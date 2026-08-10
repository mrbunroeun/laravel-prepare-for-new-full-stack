@php
    $navItems = [
        ['label' => 'Home', 'url' => url('/'), 'pattern' => '/'],
        ['label' => 'About Us', 'url' => url('/about-us'), 'pattern' => 'about-us'],
        ['label' => 'Services', 'url' => url('/services'), 'pattern' => 'services'],
        ['label' => 'Properties', 'url' => url('/properties'), 'pattern' => 'properties'],
        ['label' => 'Partners', 'url' => url('/partners'), 'pattern' => 'partners'],
        ['label' => 'Insights', 'url' => url('/insights'), 'pattern' => 'insights'],
        ['label' => 'Events', 'url' => url('/events'), 'pattern' => 'events'],
        ['label' => 'Contact Us', 'url' => url('/contact-us'), 'pattern' => 'contact-us'],
    ];
@endphp
<header class="absolute top-0 left-0 bg-white w-full ">
    <nav aria-label="Main navigation" class="max-w-[1400px] mx-auto px-4 sm:px-6 min-[1161px]:px-8">
        <div class="flex items-center justify-between py-10 relative z-[500] -translate-x-[1.5%]">

            {{-- Logo, stuck to the left --}}
            <a href="{{ url('/') }}" class="z-[600] flex-shrink-0">
                <img src="{{ asset('logo_nav_foot/CWD.svg') }}" alt="Company logo" class="h-8 min-[1161px]:h-10 w-auto">
            </a>

            {{-- Desktop nav, absolutely centered on the page regardless of logo width --}}
            <ul class="hidden min-[1161px]:flex items-center gap-8 xl:gap-10 absolute left-[42%] top-1/2 -translate-x-1/2 -translate-y-1/2 w-max whitespace-nowrap">
                @foreach ($navItems as $item)
                    @php
                        $isActive = request()->is($item['pattern']);
                    @endphp
                    <li>
                        <a href="{{ $item['url'] }}"
                            @if ($isActive) aria-current="page" @endif
                            class="relative inline-block pb-1 text-[#2c4a75] text-[15px] xl:text-[16px] font-medium tracking-wide
                                transition-colors duration-200 hover:text-[#1a3358]
                                after:content-[''] after:absolute after:left-0 after:-bottom-[2px] after:h-[2px]
                                after:bg-[#2c4a75] after:transition-all after:duration-300
                                {{ $isActive ? 'after:w-full' : 'after:w-0 hover:after:w-full' }}">
                            {{ $item['label'] }}
                        </a>
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
                class="max-[1160px]:flex hidden relative cursor-pointer z-[400] flex-col justify-center items-center w-10 h-10 gap-[5px]">
                <span class="block w-6 h-[2px] bg-[#2c4a75] transition-transform duration-300" id="bar-1"></span>
                <span class="block w-6 h-[2px] bg-[#2c4a75] transition-opacity duration-300" id="bar-2"></span>
                <span class="block w-6 h-[2px] bg-[#2c4a75] transition-transform duration-300" id="bar-3"></span>
            </button>
        </div>
    </nav>
</header>

{{-- Mobile menu: moved OUTSIDE <header> so its z-index isn't trapped in the header's stacking context --}}
<div
    id="mobile-menu"
    class="max-[1160px]:block hidden fixed inset-0 top-0 bg-white opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out z-[300] overflow-y-auto">
    <div class="flex flex-col items-start gap-1 px-6 pt-24 pb-10 min-h-screen">
        <ul class="flex flex-col items-start gap-1 w-full">
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->is($item['pattern']);
                @endphp
                <li class="w-full text-left">
                    <a href="{{ $item['url'] }}"
                        @if ($isActive) aria-current="page" @endif
                        class="mobile-nav-link inline-block py-3 text-[#2c4a75] text-[17px] font-medium
                            {{ $isActive ? 'border-b-2 border-[#2c4a75]' : '' }}">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1161) closeMenu();
        });
    });
</script>