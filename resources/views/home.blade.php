@extends('layouts.app')

@section('title', __('strings.home_tab_title'))

@section('content')


<h1 class="md:hidden text-xl text-center page-header">رابطة المهندســين السودانيين بدولة قطر<br>Sudanese Engineers Association - Qatar</h1>

<div class="flex flex-col items-center">

  <div class="mb-6 p-7 text-justify md:w-5/6">
    @include('components.carousel')
  </div>

  <div class="mb-6 p-7 text-justify w-5/6 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <h2 class="text-2xl font-bold text-teal-600 mb-6 text-center">{{__('strings.our_vision')}} 🔭</h2>
    {{__('strings.vision_body')}}
  </div>

  <div class="mb-6 p-7 text-justify w-5/6  bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <h2 class="text-2xl font-bold text-teal-600 mb-6 text-center">{{__('strings.our_mission')}} 📜</h2>
    {{__('strings.mission_body')}}
  </div>

  <div class="flex flex-col gap-15 mx-5 mb-10 p-7 text-justify transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <h2 class="text-2xl font-bold text-teal-600 mb-16 text-center">{{__('strings.objectives')}} <i class="fa-solid fa-crosshairs"></i></h2>
    <!-- <div class="ps-7 md:ps-20">{!! __('strings.objectives_body') !!}</div> -->
    <!-- From Uiverse.io by musashi-13 -->
    <div class="text-center !text-md card-3d">
      @foreach([6,5,4,3,2,1] as $i)
      <div>
        <h2 class="page-header">{{ $i }}</h2>
        <p>{{__("strings.objective_$i")}}</p>
      </div>
      @endforeach
    </div>

  </div>
</div>

<hr class="w-3/5 my-10 mx-auto">
<h2 class="text-2xl font-bold mb-6 text-center">{{__('strings.recent_news')}}</h2>

<!-- <div class="grid gap-6 md:grid-cols-3"> -->
<div class="mutual-list space-y-6">
  @foreach ($posts as $post)
  <div class="md:flex bg-white md:h-100 mutual-list-card rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    {{-- Image --}}
    <img src="{{ isset($post->image)? asset('storage/'.$post->image) : asset('images/logos/logo-w-text.png') }}"
      class="w-full h-auto md:w-1/2 md:h-full object-cover" alt="خبر">

    @php
    $body = $lang == 'ar' ? $post->body : $post->body_en;
    // Remove all images
    $body = preg_replace('/<img[^>]*>/', '', $body);
      // Optional: allow some tags
      $body = strip_tags($body, '<p><br><strong><em>
            <ul>
              <li>');
                @endphp
                {{-- Text --}}
                <div class="flex flex-col justify-between p-7 pb-15 w-full md:w-1/2">
                  <div class="flex flex-col">
                    <h3 class="text-lg text-justify font-semibold mb-2">{{ $lang == 'ar'? $post->title : $post->title_en }}</h3>
                    <p class="text-gray-600 text-justify">&nbsp;&nbsp;&nbsp;{!! Str::limit($body, 250) !!}</p>
                  </div>
                  <a href="{{ route('posts.show', $post) }}" class="{{$lang == 'ar'? 'text-left':'text-right'}} text-teal-700 hover:text-teal-800 cursor-pointer font-semibold">
                    {{__('strings.read_more')}}
                  </a>
                </div>
  </div>
  @endforeach
</div>
@endsection