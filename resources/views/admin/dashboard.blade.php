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
    <div class="font-[Cairo] w-fit flex gap-5 text-center m-auto mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg"> {{ session('success') }}
      <button class="hover:cursor-pointer" onclick="this.parentElement.style.display='none'">x</button>
    </div>
    @endif

    <form action="{{ route('admin.setProfilePdf') }}" method="POST" enctype="multipart/form-data"
      class="flex flex-col md:flex-row w-full md:items-center  gap-5">
      @csrf

      <label class="block w-50 text-md font-semibold">{{__('strings.profile_file')}} (PDF)</label>
      <div class="flex flex-row justify-between gap-5">
        <input type="file" name="profile_pdf" accept="application/pdf"
          class="text-xs border p-2 rounded w-full hover:cursor-pointer">

        {{-- Open current profile if it exists --}}
        @php $pdf = \App\Models\Setting::get('profile_pdf'); @endphp
        @if($pdf)
        <a href="{{ asset('storage/'.$pdf) }}" target="_blank"
          class="text-sm text-teal-600 underline">
          {{__('strings.current_file')}}
        </a>
        @endif
      </div>

      <button type="submit"
        class="mt-3 bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700 hover:cursor-pointer">
        {{__('strings.save')}}
      </button>
    </form>


    <hr class="my-5">

    <form action="{{ route('admin.setNewsletterPdf') }}" method="POST" enctype="multipart/form-data"
      class="flex flex-col md:flex-row w-full md:items-center justify-beteen gap-5">
      @csrf

      <label class="block w-50 text-md font-semibold">{{__('strings.newsletter_file')}} (PDF)</label>
      <div class="flex flex-row justify-between gap-5">
        <input type="file" name="newsletter_pdf" accept="application/pdf"
          class="text-xs border p-2 rounded w-full hover:cursor-pointer">

        {{-- Open current newsletter if it exists --}}
        @php $pdf = \App\Models\Setting::get('newsletter_pdf'); @endphp
        @if($pdf)
        <a href="{{ asset('storage/'.$pdf) }}" target="_blank"
          class="text-sm text-teal-600 underline">
          {{__('strings.current_file')}}
        </a>
        @endif
      </div>

      <button type="submit"
        class="mt-3 bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700  hover:cursor-pointer">
        {{__('strings.save')}}
      </button>
    </form>


    <hr class="my-5">

  </div>

  <div class="self-center gap-5 w-3/4 mx-5 my-5">
    @if(session('pw_success'))
    <div class="font-[Cairo] w-fit flex gap-5 text-center m-auto mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg"> {{ session('pw_success') }}
      <button class="hover:cursor-pointer" onclick="this.parentElement.style.display='none'">x</button>
    </div>
    @endif

    <button onclick="pwModal.showModal()"
      class="text-center bg-teal-600 hover:bg-teal-700 text-white px-6 pt-4 pb-3 rounded-xl shadow-md transition">
      تغيير كلمة المرور 🔐
    </button>

    @error('old_pw')
      <p class="text-red-500 text-sm m-4">{{ $message }}</p>
    @enderror


  </div>
</div>


<!-- Modal Background -->
<dialog id="pwModal"
  class="fixed inset max-h-none max-w-none m-auto bg-black/50 w-screen h-screen">

  <!-- Modal Box -->
  <div class="bg-white w-10/12 md:w-2/3 lg:w-1/3 m-auto p-6 rounded-xl shadow-xl relative">

    <h2 class="page-header !text-xl">تغيير كلمة المرور</h2>
    
    <form action="{{ route('admin.changePassword') }}" method="POST" class="flex flex-col gap-4">
      @csrf

      <div>
        <label>كلمة المرور الحالية</label>
        <input type="password" name="old_pw" class="border p-2 rounded w-full" required>
      </div>

      <div>
        <label>كلمة المرور الجديدة</label>
        <input type="password" name="new_pw" class="border p-2 rounded w-full" required>
      </div>

      <div>
        <label>تأكيد كلمة المرور الجديدة</label>
        <input type="password" name="new_pw_confirmation" class="border p-2 rounded w-full" required>
      </div>

      <!-- Buttons -->
      <div class="flex items-center gap-3">
        <button type="submit"
          class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 font-medium shadow-sm transition hover:cursor-pointer">
          💾 {{__('strings.save')}}
        </button>
        <button type="button" onclick="pwModal.close()"
          class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-xl font-medium transition hover:cursor-pointer">
          {{__('strings.cancel')}}
        </button>
      </div>
    </form>

    <!-- Close Button -->
    <button onclick="pwModal.close()"
      class="absolute top-5 left-5 text-gray-600 hover:text-gray-900 text-xl hover:cursor-pointer hover:text-red-400">
      ✕
    </button>
  </div>
</dialog>


@endsection