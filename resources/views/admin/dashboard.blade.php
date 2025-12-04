@extends('layouts.app')

@section('content')
  <h1 class="page-header">{{__('strings.dashboard')}}</h1>

  <div class="flex flex-col">
    <div class="flex flex-col md:flex-row justify-evenly self-center gap-5 w-2/3 mx-5 my-10 text-xl" id="pages-buttons">
      <a href="{{ route('admin.posts.index') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 py-4 rounded-lg shadow-md transition">{{__('strings.posts')}} 📝</a>
      <a href="{{ route('admin.events.index') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 py-4 rounded-lg shadow-md transition">{{__('strings.events')}} 📆</a>
      <a href="{{ route('admin.aboutus') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 py-4 rounded-lg shadow-md transition">{{__('strings.about_us_page')}}</a>
    </div>
  </div>
  
@endsection