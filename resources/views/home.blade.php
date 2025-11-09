@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')

<?php $lang = "ar"?>

<h1 class="md:hidden text-xl text-center page-header">رابطة المهندســين السودانيين بدولة قطر<br>Sudanese Engineers Associatio - Qatar</h1>

<h2 class="text-2xl font-bold mb-6 text-center">آخر الأخبار</h2>

<!-- <div class="grid gap-6 md:grid-cols-3"> -->
<div class="mutual-list space-y-6">
  @foreach ([1,2,3] as $i)
    <div class="md:flex bg-white md:h-100 mutual-list-card rounded-xl shadow-md overflow-hidden hover:shadow-xl transition mh-card opacity-0 translate-y-10 transition-all duration-700 ease-out">
      <img src="{{ asset('images/image.png') }}" class="w-full md:w-1/2 md:h-full object-cover" alt="خبر">
      <div class="p-5">
        <h3 class="text-lg font-semibold mb-2">عنوان الخبر {{ $i }}</h3>
        <p class="text-gray-600">هذا نص موجز عن الخبر رقم {{ $i }}...هذا نص موجز عن الخبر رقم {{ $i }}...هذا نص موجز عن الخبر رقم {{ $i }}...هذا نص موجز عن الخبر رقم {{ $i }}...</p>
      </div>
    </div>
  @endforeach
</div>
@endsection
