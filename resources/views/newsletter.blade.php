@extends('layouts.app')

@section('title', __('strings.newsletter'))

@section('content')
<h2 class="page-header">{{__('strings.newsletter_seaq')}}</h2>

@php
$newsletterPdf = \App\Models\Setting::get('newsletter_pdf');
@endphp

<div class="flex flex-col justify-center items-center mt-2 m-auto gap-8 p-10 md:w-3/4">
  <a href="{{ asset('storage/' . $newsletterPdf) }}" download>
    <button class="fancy-btn text-md text-center rounded-2xl p-3">{{__('strings.download_pdf')}} <i class="fa-solid fa-download"></i></button>
  </a>

  <iframe src="{{ asset('storage/' . $newsletterPdf) }}"
    class="hidden lg:block w-full h-screen" allowfullscreen></iframe>
  <!-- Notification for tabs and phones -->
  <div class="lg:hidden text-blue-600 bg-blue-400/30 rounded-2xl p-5 text-center text-base">
    <p>{!!__('strings.notification_for_tabs_and_phones')!!}</p>
  </div>

  <a href="{{ asset('storage/' . $newsletterPdf) }}" download class="hidden md:block">
    <button class="fancy-btn text-md text-center rounded-2xl p-3">{{__('strings.download_pdf')}} <i class="fa-solid fa-download"></i></button>
  </a>
</div>

@endsection