<div class="relative m-auto rounded-2xl overflow-hidden group" id="carousel">
    <!-- Slides wrapper -->
    <div id="carousel-track" class="flex transition-transform duration-1000 ease-out">

        @foreach ($posts as $post)
        <div class="w-full flex-shrink-0 p-2 md:p-4">
            <div class="relative rounded-2xl overflow-hidden shadow-xl group h-72 md:h-96">
                <img src="{{ isset($post->image)? asset('storage/'.$post->image) : asset('images/logos/logo-w-text.png') }}"
                    class="w-full h-full object-cover group-hover:brightness-65 transition duration-300">

                <!-- Title overlay -->
                <a href="{{ route('posts.show', $post) }}" class="hover:cursor-pointer">
                    <h3 class="absolute bottom-4 {{$lang == 'ar'? 'right':'left'}}-4 text-white text-xl md:text-2xl font-semibold drop-shadow-lg mh-carousel-img-title">
                        {{ $lang == 'ar'? $post->title : ($post->title_en ?? $post->title) }}
                    </h3>
                </a>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Right arrow -->
    <button id="{{$lang == 'ar'? 'carousel-prev':'carousel-next'}}"
        class="hidden md:flex absolute right-4 top-1/2 -translate-y-1/2
                   bg-white/70 hover:bg-white text-gray-800 mx-3 p-3 rounded-full shadow-lg hover:cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Left arrow -->
    <button id="{{$lang == 'ar'? 'carousel-next':'carousel-prev'}}"
        class="hidden md:flex absolute left-4 top-1/2 -translate-y-1/2
                   bg-white/70 hover:bg-white text-gray-800 mx-3 p-3 rounded-full shadow-lg hover:cursor-pointer">
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
        }

        // Auto-slide every 4 seconds
        let auto = setInterval(() => goToSlide(index + 1), 5000);

        // Stop auto slide on hover
        document.getElementById("carousel").addEventListener("mouseenter", () => clearInterval(auto));
        document.getElementById("carousel").addEventListener("mouseleave", () => {
            auto = setInterval(() => goToSlide(index + 1), 5000);
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
            if (startX - endX > 50) goToSlide(index - 1); // swipe left → previous (RTL)
            if (endX - startX > 50) goToSlide(index + 1); // swipe right → next (RTL)
            @else
            if (startX - endX > 50) goToSlide(index + 1); // normal LTR
            if (endX - startX > 50) goToSlide(index - 1);
            @endif
        });

    });
</script>

@endpush