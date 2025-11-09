@extends('admin.layout')

@section('content')
<h2>تعديل منشور</h2>

<form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @include('admin.posts._form')
</form>
@endsection
