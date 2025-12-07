@extends('layouts.app')

@section('content')
<h1 class="page-header">{{__('strings.aboutus_page_content')}}</h1>

  @if(session('success'))
  <div class="font-[Cairo] w-fit flex gap-5 text-center m-auto mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">    {{ session('success') }}
    <button class="hover:cursor-pointer" onclick="this.parentElement.style.display='none'">x</button>
  </div>
  @endif
  <form action="{{ route('admin.aboutus.update') }}" method="POST">
    @csrf
    <div class="flex flex-col gap-7 m-1 md:m-7 py-7 px-15 bg-white shadow-lg rounded-xl border border-gray-100">
      <!-- Content -->
      <div>
        <label class="flex text-gray-700 font-medium mb-1">
          {{__('strings.content')}}
          <span class="text-red-500 ml-1 rtl:ml-0 rtl:mr-1" aria-hidden="true">*</span>
          <span class="sr-only">required</span>
        </label>
        <textarea id="content" name="content" rows="4"
          class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">{{ old('content', $content ?? '') }}</textarea>
      </div>

      <!-- Content EN -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">{{__('strings.content_en')}}</label>
        <textarea id="content" name="content_en" rows="4"
          class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">{{ old('content_en', $content_en ?? '') }}</textarea>
      </div>

      <!-- Buttons -->
      <div class="flex items-center gap-3">
        <button class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 font-medium shadow-sm transition hover:cursor-pointer">
          💾 {{__('strings.save')}}
        </button>
        <a href="{{ route('admin.dashboard') }}"
          class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-xl font-medium transition">
          {{__('strings.cancel')}}
        </a>
      </div>
    </div>
  </form>



<script src="https://cdn.jsdelivr.net/npm/tinymce@7.4.1/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#content',
    height: 400,
    menubar: true,
    directionality: 'rtl',
    plugins: 'link lists image imagetools code',
    toolbar: 'undo redo | bold italic underline | forecolor backcolor | bullist numlist | align | link | code',
    branding: false,
    paste_data_images: true
  });

  tinymce.init({
    selector: '#content_en',
    height: 400,
    menubar: true,
    // directionality: 'rtl',
    plugins: 'link lists image imagetools code',
    toolbar: 'undo redo | bold italic underline | forecolor backcolor | bullist numlist | align | link | code',
    branding: false,
    paste_data_images: true
  });
</script>
@endsection