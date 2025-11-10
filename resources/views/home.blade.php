@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')


<h1 class="md:hidden text-xl text-center page-header">رابطة المهندســين السودانيين بدولة قطر<br>Sudanese Engineers Association - Qatar</h1>

<h2 class="text-2xl font-bold mb-6 text-center">آخر الأخبار</h2>

<!-- <div class="grid gap-6 md:grid-cols-3"> -->
<div class="mutual-list space-y-6">
  @foreach ($posts as $post)
  <div class="md:flex bg-white md:h-100 mutual-list-card rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
    <img src="{{ isset($post->image)? asset('storage/'.$post->image) : asset('images/logos/logo-w-text.png') }}" class="w-full md:w-1/2 md:h-full object-cover" alt="خبر">
    <div class="flex flex-col justify-between p-7 pb-15 w-full">
      <div class="flex flex-col">
        <h3 class="text-lg text-justify font-semibold mb-2">{{ $lang == 'ar'? $post->title : $post->title_en }}</h3>
        <p class="text-gray-600 text-justify">&nbsp;&nbsp;&nbsp;{{ Str::limit($lang == 'ar'? $post->body : $post->body_en, 350) }}</p>
      </div>
      <a href="{{ route('posts.show', $post) }}" class="text-left text-teal-700 hover:text-teal-800 cursor-pointer font-semibold">
        اقرأ المزيد ←
      </a>
    </div>
  </div>
  @endforeach
</div>
@endsection