@extends('layouts.app')

@section('title', __('strings.about_tab_title'))

@section('content')
<h2 class="page-header">{{__('strings.seaq_name')}}</h2>

<div class="m-auto w-5/6">
    {!! $content !!}
</div>

@endsection
