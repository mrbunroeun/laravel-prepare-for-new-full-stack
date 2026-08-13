   @php
       $testimonials = [
           [
               'name' => 'Lorem Name',
               'rating' => 4,
               'text' =>
                   'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
           ],
           [
               'name' => 'Lorem Name',
               'rating' => 4,
               'text' =>
                   'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
           ],
           [
               'name' => 'Lorem Name',
               'rating' => 4,
               'text' =>
                   'CWD Realty & Hospitality manages residential condominium properties while providing flexible rental options for travelers, expatriates, business professionals, and long-term residents. Our experienced multilingual team helps property owners maximize rental income while ensuring guests enjoy a comfortable stay.',
           ],
       ];
   @endphp

   {{-- Testimonials --}}
   <section class="bg-white">
       <div class="max-w-[1000px] mx-auto px-6 sm:px-10 py-16 sm:py-20">
           <div class="flex flex-col gap-8">

               {{-- New testimonial input form --}}
               <div>
                   <div class="flex justify-end mb-2">
                       <div id="new-rating" class="flex items-center gap-1" data-selected="0">
                           @for ($i = 1; $i <= 5; $i++)
                               <button type="button" class="rating-star cursor-pointer" data-value="{{ $i }}">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                       class="w-5 h-5 text-[#d8d3c8] pointer-events-none" fill="currentColor">
                                       <path
                                           d="M12 2.5l2.9 6.06 6.6.72-4.9 4.53 1.28 6.54L12 16.98l-5.88 3.37 1.28-6.54-4.9-4.53 6.6-.72L12 2.5z" />
                                   </svg>
                               </button>
                           @endfor
                       </div>
                   </div>

                   <div class="bg-[#f5f5f5] px-6 py-6 sm:px-8 sm:py-7">
                       <div class="flex items-start gap-4">
                           <div class="w-10 h-10 rounded-full bg-[#d9d9d9] shrink-0"></div>
                           <div class="flex flex-col gap-2 w-full">
                               <input type="text" id="new-name" placeholder="Your Name"
                                   class="text-black text-[15px] font-bold bg-transparent outline-none placeholder:text-black placeholder:font-bold w-full">
                               <textarea id="new-text" rows="2" placeholder="Share your experience with CWD Realty & Hospitality..."
                                   class="text-black/70 text-[13.5px] leading-relaxed bg-transparent outline-none resize-none w-full placeholder:text-black/40"></textarea>
                           </div>
                       </div>

                       <div class="flex justify-end mt-2">
                           <button type="button" id="submit-testimonial"
                               class="flex items-center gap-1 text-[#2A5A8A] text-[14px] font-medium cursor-pointer">
                               Submit
                               <span aria-hidden="true">&rarr;</span>
                           </button>
                       </div>
                   </div>
               </div>

               {{-- Existing testimonials --}}
               <div id="testimonials-list" class="flex flex-col gap-8">
                   @foreach ($testimonials as $item)
                       <div>
                           <div class="flex justify-end mb-2">
                               <div class="flex items-center gap-1">
                                   @for ($i = 1; $i <= 5; $i++)
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                           class="w-5 h-5 {{ $i <= $item['rating'] ? 'text-[#fec259]' : 'text-[#d8d3c8]' }}"
                                           fill="currentColor">
                                           <path
                                               d="M12 2.5l2.9 6.06 6.6.72-4.9 4.53 1.28 6.54L12 16.98l-5.88 3.37 1.28-6.54-4.9-4.53 6.6-.72L12 2.5z" />
                                       </svg>
                                   @endfor
                               </div>
                           </div>

                           <div class="bg-[#f5f5f5] px-6 py-6 sm:px-8 sm:py-7">
                               <div class="flex items-start gap-4">
                                   <div class="w-10 h-10 rounded-full bg-[#d9d9d9] shrink-0"></div>
                                   <div class="flex flex-col gap-2">
                                       <h3 class="text-black text-[15px] font-bold">{{ $item['name'] }}</h3>
                                       <p class="text-black/70 text-[13.5px] leading-relaxed">
                                           {{ $item['text'] }}
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

   <script>
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

           document.getElementById('submit-testimonial').addEventListener('click', function() {
               const nameInput = document.getElementById('new-name');
               const textInput = document.getElementById('new-text');
               const rating = parseInt(ratingContainer.dataset.selected, 10) || 0;

               const name = nameInput.value.trim() || 'Anonymous';
               const text = textInput.value.trim();

               if (!text) {
                   textInput.focus();
                   return;
               }

               let starsHtml = '';
               for (let i = 1; i <= 5; i++) {
                   const colorClass = i <= rating ? 'text-[#fec259]' : 'text-[#d8d3c8]';
                   starsHtml += `
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 ${colorClass}" fill="currentColor">
                            <path d="M12 2.5l2.9 6.06 6.6.72-4.9 4.53 1.28 6.54L12 16.98l-5.88 3.37 1.28-6.54-4.9-4.53 6.6-.72L12 2.5z" />
                        </svg>
                    `;
               }

               const cardHtml = `
                    <div>
                        <div class="flex justify-end mb-2">
                            <div class="flex items-center gap-1">
                                ${starsHtml}
                            </div>
                        </div>
                        <div class="bg-[#f5f5f5] px-6 py-6 sm:px-8 sm:py-7">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-[#d9d9d9] shrink-0"></div>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-black text-[15px] font-bold"></h3>
                                    <p class="text-black/70 text-[13.5px] leading-relaxed"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

               const wrapper = document.createElement('div');
               wrapper.innerHTML = cardHtml.trim();
               const newCard = wrapper.firstChild;

               newCard.querySelector('h3').textContent = name;
               newCard.querySelector('p').textContent = text;

               const list = document.getElementById('testimonials-list');
               list.insertBefore(newCard, list.firstChild);

               nameInput.value = '';
               textInput.value = '';
               ratingContainer.dataset.selected = 0;
               stars.forEach(function(s) {
                   s.classList.remove('text-[#fec259]');
                   s.classList.add('text-[#d8d3c8]');
               });
           });
       });
   </script>
