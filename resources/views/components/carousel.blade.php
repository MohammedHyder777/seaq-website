    <!-- Splide -->
    <div id="CarouselSplide" class="splide">
        <div class="splide__track rounded-xl">
            <div class="splide__list">
                @foreach($posts as $p)
                <div class="splide__slide w-full flex justify-center text-justify rounded-xl shadow-md overflow-hidden hover:shadow-xl">
                    <img src="{{ isset($p->image)? asset('storage/'.$p->image) : asset('images/logos/logo-w-text.png') }}"
                        class="w-full h-full object-cover hover:brightness-65 transition duration-300">
                </div>
                @endforeach
            </div>
        </div>

        <!-- Arrows -->
        <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev" aria-label="Previous">
                <i class="fa-solid fa-chevron-{{ $lang == 'ar'? 'right':'left' }} text-teal-700 text-md"></i>
            </button>
            <button class="splide__arrow splide__arrow--next" aria-label="Next">
                <i class="fa-solid fa-chevron-{{ $lang == 'ar'? 'left':'right' }} text-teal-700 text-md"></i>
            </button>
        </div>

        <!-- Pagination (optional) -->
        <div class="splide__pagination mt-4"></div>
    </div>


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#CarouselSplide', {
            type: 'loop',
            perPage: 1,
            // focus: 'center',
            gap: '1.3rem',
            // padding: {left: '2%', right: '2%'},
            drag: true,
            keyboard: 'global',
            arrows: true,
            pagination: true,
            snap: true,

            direction: '<?php echo $lang == "ar" ? "rtl" : "ltr" ?>',
        }).mount();
    });
</script>

<style>
    .splide__pagination__page {
        background: #cbd5e1;
        /* slate-300 */
        opacity: .8;
    }

    .splide__pagination__page.is-active {
        background: #0d9488 !important;
        opacity: 1;
    }
</style>
@endpush