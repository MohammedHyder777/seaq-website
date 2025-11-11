@extends('admin.layout')

@section('content')
<h2 class="page-header">تعديل فعالية</h2>

<div class="m-7 py-7 px-15 bg-white shadow-lg rounded-xl border border-gray-100">
  <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.events._form', ['action' => 'تعديل'])
  </form>
</div>
@endsection