<div class="relative m-auto md:rounded-2xl overflow-hidden group" id="carousel">
    <!-- Slides wrapper -->
    <div id="carousel-track" class="flex transition-transform duration-1000 ease-out">

        @foreach ($posts as $post)
        <div class="w-full flex-shrink-0 md:rounded-2xl">
            <div class="relative md:rounded-2xl overflow-hidden shadow-xl group h-72 md:h-96">
                <img src="{{ isset($post->image)? asset('storage/'.$post->image) : asset('images/logos/logo-w-text.png') }}"
                    class="w-full h-full object-cover group-hover:brightness-65 transition duration-300">

                <!-- Title overlay -->
                <a href="{{ route('posts.show', $post) }}" class="hover:cursor-pointer">
                    <!-- <div class="absolute bottom-4 m-2 {{$lang == 'ar'? 'right':'left'}}-4 text-white text-xl md:text-2xl font-semibold drop-shadow-lg mh-carousel-img-title">
                        {{ mb_substr($lang == 'ar'? $post->title : ($post->title_en ?? $post->title), 0, 21) . " ..." }}
                    </div> -->
                </a>

                <!-- Pagination Dots -->
                <div id="carousel-dots" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20"></div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Right arrow -->
    <button id="{{$lang == 'ar'? 'carousel-prev':'carousel-next'}}"
        class="flex absolute right-4 top-1/2 -translate-y-1/2
                   bg-white/70 hover:bg-white text-gray-800 mx-3 p-1 md:p-3 rounded-full shadow-lg hover:cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Left arrow -->
    <button id="{{$lang == 'ar'? 'carousel-next':'carousel-prev'}}"
        class="flex absolute left-4 top-1/2 -translate-y-1/2
                   bg-white/70 hover:bg-white text-gray-800 mx-3 p-1 md:p-3 rounded-full shadow-lg hover:cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
        </svg>
    </button>
</div>


@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const track = document.getElementById("carousel-track");
        const slides = track.children.length;
        const prevBtn = document.getElementById("carousel-prev");
        const nextBtn = document.getElementById("carousel-next");
        let index = 0;

        function goToSlide(i) {
            index = (i + slides) % slides;
            @if($lang == 'ar')
            track.style.transform = `translateX(${index * 100}%)`; // slide RIGHT for Arabic
            @else
            track.style.transform = `translateX(-${index * 100}%)`; // slide LEFT for English
            @endif

            updateDots();
        }

        // Auto-slide every 4 seconds
        let auto = setInterval(() => goToSlide(index + 1), 6000);

        // Stop auto slide on hover
        document.getElementById("carousel").addEventListener("mouseenter", () => clearInterval(auto));
        document.getElementById("carousel").addEventListener("mouseleave", () => {
            auto = setInterval(() => goToSlide(index + 1), 6000);
        });


        // Buttons controls
        nextBtn.addEventListener("click", () => goToSlide(index + 1));
        prevBtn.addEventListener("click", () => goToSlide(index - 1));

        // Touch/Swipe for mobile
        let startX = 0;

        track.addEventListener("touchstart", (e) => {
            startX = e.touches[0].clientX;

            // stop auto-sliding
            document.getElementById("carousel").addEventListener("mouseenter", () => clearInterval(auto));
        });

        track.addEventListener("touchend", (e) => {
            let endX = e.changedTouches[0].clientX;

            @if($lang == 'ar')
            if (startX - endX > 150) goToSlide(index - 1); // swipe left → previous (RTL)
            if (endX - startX > 150) goToSlide(index + 1); // swipe right → next (RTL)
            @else
            if (startX - endX > 150) goToSlide(index + 1); // normal LTR
            if (endX - startX > 150) goToSlide(index - 1);
            @endif
        });

        /***** Dots Functionality ****/
        const dotsContainer = document.getElementById("carousel-dots");

        // Create dots dynamically
        for (let i = 0; i < slides; i++) {
            const dot = document.createElement("div");
            dot.className =
                "w-3 h-3 rounded-full bg-white/60 backdrop-blur-sm border border-white shadow cursor-pointer transition-all duration-300";


            dot.dataset.index = i; // store the slide number
            dotsContainer.appendChild(dot);
        }

        const dots = dotsContainer.querySelectorAll("div");

        function updateDots() {
            dots.forEach((dot, i) => {
                dot.className =
                    "w-3 h-3 rounded-full cursor-pointer transition-all duration-300 " +
                    (i === index ?
                        "bg-teal-500 scale-125 border-teal-200 shadow-lg" :
                        "bg-white/60 backdrop-blur-sm border-white shadow");
            });
        }

    });
</script>

@endpush