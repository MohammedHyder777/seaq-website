@extends('layouts.app')

@section('content')
<h1 class="page-header">{{__('strings.dashboard')}}</h1>

<div class="flex flex-col">
  <div class="flex flex-col md:flex-row justify-evenly self-center gap-5 w-2/3 mx-5 my-10 text-xl" id="pages-buttons">
    <a href="{{ route('admin.posts.index') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 pt-4 pb-3 rounded-xl shadow-md transition">{{__('strings.posts')}} 📝</a>
    <a href="{{ route('admin.events.index') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 pt-4 pb-3 rounded-xl shadow-md transition">{{__('strings.events')}} 📆</a>
    <a href="{{ route('admin.aboutus') }}" class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 pt-4 pb-3 rounded-xl shadow-md transition">{{__('strings.about_us_page')}}</a>
  </div>


  <hr class="h-15 mt-10">


  <div class="self-center gap-5 w-3/4 mx-5 my-5">
    @if(session('success'))
    <div class="w-fit flex gap-5 text-center m-auto mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
      {{ session('success') }}
      <button class="hover:cursor-pointer" onclick="this.parentElement.style.display='none'">x</button>
    </div>
    @endif

    <form action="{{ route('admin.setProfilePdf') }}" method="POST" enctype="multipart/form-data"
      class="flex flex-col md:flex-row w-full md:items-center  gap-5">
      @csrf

      <label class="block w-50 text-md font-semibold">ملف البروفايل (PDF)</label>
      <div class="flex flex-row justify-between gap-5">
        <input type="file" name="profile_pdf" accept="application/pdf"
          class="border p-2 rounded w-full">

        {{-- Open current profile if it exists --}}
        @php $pdf = \App\Models\Setting::get('profile_pdf'); @endphp
        @if($pdf)
        <a href="{{ asset('storage/'.$pdf) }}" target="_blank"
          class="text-sm text-teal-600 underline">
          الملف الحالي
        </a>
        @endif
      </div>

      <button type="submit"
        class="mt-3 bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700">
        {{__('strings.save')}}
      </button>
    </form>


    <hr class="my-5">

    <form action="{{ route('admin.setNewsletterPdf') }}" method="POST" enctype="multipart/form-data"
      class="flex flex-col md:flex-row w-full md:items-center justify-beteen gap-5">
      @csrf

      <label class="block w-50 text-md font-semibold">مجلة الرابطة (PDF)</label>
      <div class="flex flex-row justify-between gap-5">
        <input type="file" name="newsletter_pdf" accept="application/pdf"
          class="border p-2 rounded w-full">

        {{-- Open current newsletter if it exists --}}
        @php $pdf = \App\Models\Setting::get('newsletter_pdf'); @endphp
        @if($pdf)
        <a href="{{ asset('storage/'.$pdf) }}" target="_blank"
          class="text-sm text-teal-600 underline">
          الملف الحالي
        </a>
        @endif
      </div>

      <button type="submit"
        class="mt-3 bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700">
        {{__('strings.save')}}
      </button>
    </form>


    <hr class="my-5">

  </div>
</div>

@endsection