@extends('admin.layout')

@section('content')
  <h1 class="page-header">شاشة التحكم</h1>

  <div class="flex flex-col">
    <div class="flex flex-col md:flex-row justify-evenly self-center gap-5 w-2/3 mx-5 my-10 text-2xl" id="pages-buttons">
      <a href="{{ route('admin.posts.index') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg shadow-md transition">المنشورات 📝</a>
      <a href="{{ route('admin.events.index') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg shadow-md transition">الفعاليات 📆</a>
      <a href="{{-- route('admin.aboutus') --}}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg shadow-md transition">صفحة من نحن؟</a>
    </div>
  </div>
  
@endsection