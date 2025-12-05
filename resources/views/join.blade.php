@extends('layouts.app')

@section('title', __('strings.join_tab_title'))

@section('content')
<h2 class="page-header">{{__('strings.join_the_association')}}</h2>

<div class="flex flex-col justify-center items-center mt-12 m-auto gap-8 p-10 md:w-3/4">
  <p>
    {{__('strings.join_body')}}
  </p>
  <a href="http://docs.google.com/forms/d/e/1FAIpQLSe7lozIlY1XU5zQZKRkjm8mg3tTShjvSamlY6_RFcN1qMr-Hg/viewform" target="_blank">
    <button class="fancy-btn text-md text-center rounded-2xl p-3">{{__('strings.fill_membership_form')}}</button>
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