@extends('admin.layout')

@section('content')
<h2 class="page-header">إنشاء فعالية جديدة</h2>

<div class="m-1 md:m-7 py-7 px-15 bg-white shadow-lg rounded-xl border border-gray-100">
  <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
    @include('admin.events._form', ['action' => 'إضافة'])
  </form>
</div>
@endsection