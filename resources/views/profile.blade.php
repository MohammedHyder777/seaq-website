@extends('layouts.app')

@section('title', __('strings.profile'))

@section('content')
<h2 class="page-header">{{__('strings.profile_seaq')}}</h2>

@php
    $profilePdf = \App\Models\Setting::get('profile_pdf');
@endphp

<div class="flex flex-col justify-center items-center mt-2 m-auto gap-8 p-10 md:w-3/4">
  <a href="{{ asset('storage/' . $profilePdf) }}" download>
    <button class="fancy-btn text-md text-center rounded-2xl p-3">{{__('strings.download_pdf')}} <i class="fa-solid fa-download"></i></button>
  </a>
  
  <iframe src="{{ asset('storage/' . $profilePdf) }}" 
          class="hidden lg:block w-full h-screen" allowfullscreen></iframe>
  <!-- Notification for tabs and phones -->
   <div class="lg:hidden text-blue-600 bg-blue-400/30 rounded-2xl p-5 text-center text-base">
      <p>{!!__('strings.notification_for_tabs_and_phones')!!}</p>
   </div>

  <a href="{{ asset('storage/' . $profilePdf) }}" download class="hidden md:block">
    <button class="fancy-btn text-md text-center rounded-2xl p-3">{{__('strings.download_pdf')}} <i class="fa-solid fa-download"></i></button>
  </a>
</div>

<!-- <div class="aspect-w-16 aspect-h-9">
  <iframe 
    src="https://docs.google.com/forms/d/e/1FAIpQLSe7lozIlY1XU5zQZKRkjm8mg3tTShjvSamlY6_RFcN1qMr-Hg/viewform?embedded=true"
    class="w-full h-[80vh] border-0 rounded-lg shadow-md"
    allowfullscreen>
  </iframe>
</div> -->
@endsection