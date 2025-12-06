@extends('layouts.app')

@section('title', __('strings.profile'))

@section('content')
<h2 class="page-header">{{__('strings.profile_seaq')}}</h2>

<div class="flex flex-col justify-center items-center mt-2 m-auto gap-8 p-10 md:w-3/4">
  <a href="{{ asset('pdf/profile.pdf') }}" download>
    <button class="fancy-btn text-md text-center rounded-2xl p-3">{{__('strings.download_pdf')}} <i class="fa-solid fa-download"></i></button>
  </a>
  
  <iframe src="{{ asset('pdf/profile.pdf') }}" class="w-full h-screen"></iframe>

  <a href="{{ asset('pdf/profile.pdf') }}" download>
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