    @php
        $latestActivities = [
            [
                'image' => asset('home/latest_activities/1img.png'),
                'title' => 'Wealth Mansion',
                'description' =>
                    'Premium condominium development offering modern residential units with excellent city access.',
            ],
            [
                'image' => asset('home/latest_activities/2img.png'),
                'title' => 'Private Residential Collection',
                'description' =>
                    'Professionally managed condominium units including premium residences and penthouses.',
            ],
            [
                'image' => asset('home/latest_activities/3img.png'),
                'title' => 'Golden Tower 268',
                'description' => 'Landmark high-rise tower offering premium residences with panoramic city views.',
            ],
            [
                'image' => asset('home/latest_activities/4img.png'),
                'title' => 'Riverside Tower',
                'description' =>
                    'Elegant riverside residences with panoramic views and premium amenities for modern living.',
            ],
            [
                'image' => asset('home/latest_activities/5img.png'),
                'title' => 'Skyline Residence',
                'description' => 'High-rise condominium living in the heart of the city, close to shopping and dining.',
            ],
            [
                'image' => asset('home/latest_activities/6img.png'),
                'title' => 'Harmony Heights',
                'description' =>
                    'Modern residential tower with rooftop lounge, gym, and unobstructed city skyline views.',
            ],
        ];
    @endphp

    {{-- Latest Activities --}}
    <section class="bg-none  ">
        <div class="max-w-[1500px] mx-auto px-6 sm:px-10 pt-16 sm:pt-20">
            {{-- Heading --}}
            <h2 class="text-[clamp(28px,4vw,40px)] px-0 sm:px-[5rem] leading-tight mb-10 sm:mb-12">
                <span class="text-[#2A5A8A] font-normal block">Latest <strong>Activities</strong></span>
            </h2>
        </div>

        <div class="max-w-[1500px] mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-0 leading-[0]">
                @foreach ($latestActivities as $activity)
                    <div class="relative overflow-hidden group h-[220px] sm:h-[240px] lg:h-[260px]">
                        <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}"
                            class="block w-full h-full object-cover">

                        {{-- Blue overlay + text, shown on hover --}}
                        <div
                            class="absolute inset-0 bg-[#2A5A8A]/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end px-6 py-6">
                            <h3
                                class="text-white text-[18px] sm:text-[20px] font-bold mb-4 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                {{ $activity['title'] }}
                            </h3>
                            <p
                                class="text-white/90 text-[13px] sm:text-[14px] leading-relaxed translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                {{ $activity['description'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="h-16 sm:h-20"></div>
    </section>