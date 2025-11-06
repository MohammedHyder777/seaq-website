@extends('layouts.app')

@section('title', 'انضم للرابطة')

@section('content')
<h2 class="page-header">انضم إلى رابطة المهندسين</h2>

<div class="aspect-w-16 aspect-h-9">
  <iframe 
    src="https://docs.google.com/forms/d/e/1FAIpQLSdat1U2RYs5jbwaoYk0AuDCqfVTzm9ucUqvHUqJja_gZ-5UzA/viewform?embedded=true"
    class="w-full h-[80vh] border-0 rounded-lg shadow-md"
    allowfullscreen>
  </iframe>

  <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdat1U2RYs5jbwaoYk0AuDCqfVTzm9ucUqvHUqJja_gZ-5UzA/viewform?embedded=true" width="640" height="532" frameborder="0" marginheight="0" marginwidth="0">جارٍ التحميل…</iframe> -->
</div>
@endsection
