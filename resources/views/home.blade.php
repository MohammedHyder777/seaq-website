@extends('layouts.app')

@section('title', __('strings.home_tab_title'))

@section('content')


<div class="flex flex-col items-center">

  <!-- <div class="mb-16 text-justify md:w-3/4 shadow-2xl max-md:max-w-[100vw] max-md:relative 
            max-md:ml-[calc(-50vw+50%)] max-md:mr-[calc(-50vw+50%)] md:rounded-2xl"> -->
  <div class="mb-8 text-justify w-screen max-sm:-px-4 md:w-3/4 md:rounded-2xl shadow-2xl">
    @include('components.carousel')
  </div>

  <!-- <h2 class="!mb-8 !text-xl md:hidden md:!text-2xl text-center page-header transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">رابطة المهندســين السودانيين بدولة قطر<br>Sudanese Engineers Association - Qatar</h2> -->

  <img src="{{ asset('images/logos/logo-w-text.png') }}" class="mb-8 w-2/3 md:h-[24.78svw] md:w-[40svw] transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out" alt="seaq">

  <div class="mb-6 p-7 text-justify w-5/6 md:w-3/5 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <h2 class="text-2xl font-bold text-teal-600 mb-6 text-center">{{__('strings.our_vision')}} 🔭</h2>
    {{__('strings.vision_body')}}
  </div>

  <div class="mb-6 p-7 text-justify w-5/6 md:w-3/5  bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <h2 class="text-2xl font-bold text-teal-600 mb-6 text-center">{{__('strings.our_mission')}} 📜</h2>
    {{__('strings.mission_body')}}
  </div>


  <div class="flex flex-col items-center justify-center w-3/4 gap-8 m-5 mb-10 transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <h2 class="text-2xl font-bold text-teal-600 text-center">
      {{__('strings.objectives')}} <i class="fa-solid fa-crosshairs"></i>
    </h2>

    <!-- Splide -->
    <div id="objectivesSplide" class="splide w-[86%] md:w-[60%]">
      <div class="splide__track !overflow-visible rounded-xl">
        <div class="splide__list">
          @foreach([1,2,3,4,5,6] as $i)
          <div class="splide__slide flex justify-center mb-6 p-10 text-justify  bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl">
            <div class="text-center">
              <h2 class="page-header !text-4xl mb-10">{{ $i }}</h2>
              <p>{{ __("strings.objective_$i") }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Arrows -->
      <div class="splide__arrows">
        <button class="splide__arrow splide__arrow--prev -mx-4" aria-label="Previous">
          <i class="fa-solid fa-chevron-{{ $lang == 'ar'? 'right':'left' }} text-teal-700 text-md"></i>
        </button>
        <button class="splide__arrow splide__arrow--next -mx-4" aria-label="Next">
          <i class="fa-solid fa-chevron-{{ $lang == 'ar'? 'left':'right' }} text-teal-700 text-md"></i>
        </button>
      </div>

      <!-- Pagination (optional) -->
      <div class="splide__pagination mt-4"></div>
    </div>
  </div>
</div>



<hr class="w-3/5 my-10 mx-auto">
<h2 class="text-2xl font-bold mb-6 text-center">{{__('strings.recent_news')}}</h2>

<div class="mutual-list space-y-6">
  @foreach ($posts as $post)
  <div class="flex flex-row bg-white h-40 md:h-100 mutual-list-card rounded-xl shadow-md overflow-hidden hover:shadow-xl max-sm:hover:cursor-pointer transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    {{-- Image --}}
    <!-- <div class=""> -->
    <img src="{{ isset($post->image)? asset('storage/'.$post->image) : asset('images/logos/logo-w-text.png') }}"
      class="w-1/2 aspect-[16/9] object-cover" alt="خبر">
    <!-- </div> -->

    @php
    $body = $lang == 'ar' ? $post->body : $post->body_en;
    // Remove all images
    $body = preg_replace('/<img[^>]*>/', '', $body);
      $body = strip_tags($body);

      @endphp
      {{-- Text --}}
      <div class="flex flex-col justify-between p-7 md:pb-15 w-full md:w-1/2">
        <div class="flex flex-col justify-center max-sm:flex-grow">
          <h3 class="line-clamp-4 text-sm md:text-lg text-justify md:font-semibold mb-2">{{ $lang == 'ar'? $post->title : $post->title_en }}</h3>
          <p class="max-sm:hidden text-gray-600 text-justify">&nbsp;&nbsp;&nbsp;{!! Str::limit($body, 175) !!}</p>
        </div>
        <a href="{{ route('posts.show', $post) }}" class="max-sm:hidden {{$lang == 'ar'? 'text-left':'text-right'}} font-[Cairo] text-teal-700 hover:text-teal-800 cursor-pointer font-semibold">
          {{__('strings.read_more')}}
        </a>
      </div>
  </div>
  @endforeach
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    new Splide('#objectivesSplide', {
      type: 'loop',
      perPage: 1,
      focus: 'center',
      gap: '1.3rem',
      // padding: {left: '2%', right: '2%'},
      drag: true,
      keyboard: 'global',
      arrows: true,
      pagination: true,
      // snap: true,
      // breakpoints: {
      //   768: {
      //     padding: {left: '6%', right: '6%'},
      //     gap: '1rem',
      //   },
      //   1024: {
      //     padding: {left: '12%', right: '12%'},
      //   }
      // },

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

  #objectivesSplide>div>div>.splide__slide {
    opacity: 0.5;
    /* transform: scale(0.85); */
    transition: all .3s ease;
  }

  #objectivesSplide>div>div>.splide__slide.is-active {
    opacity: 1;
    /* scale: 1.05; */
    transform: scale(1.02);
  }
</style>

<!-- MAKE THE POSTS CARDS CLICKABLE IN SMALL SCREENS -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    if (window.innerWidth < 768) { // Tailwind md breakpoint
      document.querySelectorAll('.mutual-list-card').forEach(card => {
        card.addEventListener('click', () => {
          const url = card.querySelector('a').href;
          window.location.href = url;
        });
      });
    }
  });
</script>

@endpush