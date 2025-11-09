@extends('admin.layout')

@section('content')
<h2>إنشاء منشور جديد</h2>

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
  @include('admin.posts._form')
</form>
@endsection
