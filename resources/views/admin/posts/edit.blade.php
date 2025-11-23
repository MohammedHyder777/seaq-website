@extends('layouts.app')

@section('content')
<h2 class="page-header">{{__('strings.edit_post')}}</h2>

<div class="m-1 md:m-7 py-7 px-15 bg-white shadow-lg rounded-xl border border-gray-100">
  <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.posts._form', ['action' => __('strings.edit')])
  </form>
</div>
@endsection