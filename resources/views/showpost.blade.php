@extends('layouts.app')

@section('title', 'رابطة المهندسين السودانيين بقطر')

@section('content')
<h2 class="page-header">{{ $lang == 'ar'? $post->title : $post->title_en }}</h2>

<div class="flex flex-col justify-center mt-12 m-auto gap-8 md:w-3/4">
    <img src="{{ isset($post->image)? asset('storage/'.$post->image) : asset('images/logos/logo-w-text.png') }}" alt="صورة">

    <div class="text-md text-justify ">
        &nbsp;&nbsp;&nbsp;&nbsp;{{ $lang == 'ar'? $post->body : $post->body_en }}
    </div>
</div>
@endsection