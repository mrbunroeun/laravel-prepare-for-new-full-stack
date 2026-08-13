
    {{-- auto-move part --}}
    <section class="relative w-full flex mt-[2rem] sm:mt-[5rem] justify-center ">

        <img src="{{ asset('home/auto_move_logo/auto_move_light_white.png') }}" alt="CWD Realty auto-move logo"
            class="w-full h-auto object-contain">

        {{-- Scrolling text overlay --}}
        <div class="absolute inset-0 flex items-center overflow-hidden pointer-events-none">
            <div class="cwd-marquee-track flex items-center whitespace-nowrap">
                @for ($i = 0; $i < 12; $i++)
                    <span class="text-[#2A5A8A] text-[clamp(14px,2vw,22px)] mx-6 sm:mx-10 shrink-0">
                        <span class="font-bold">CWD</span> Real Estate Agent &amp; Developer
                    </span>
                @endfor
            </div>
        </div>

        <style>
            .cwd-marquee-track {
                width: max-content;
                animation: cwd-marquee 45s linear infinite;
            }

            /* Pause on hover, if wanted */
            .cwd-marquee-track:hover {
                animation-play-state: paused;
            }

            @keyframes cwd-marquee {
                from {
                    transform: translateX(-50%);
                }

                to {
                    transform: translateX(0);
                }
            }
        </style>
    </section>