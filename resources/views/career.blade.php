@extends('layouts.app')

@section('title', __('strings.professional_development'))

@section('content')
<h2 class="page-header">{{ __('strings.career_development') }}</h2>

<div class="flex flex-col justify-center items-center mt-12 m-auto gap-8 p-10 md:w-3/4">

    {{-- PDFs --}}
    @foreach ($files as $file)
        <div class="font-[Cairo] w-full bg-white shadow-xl rounded-2xl p-6 flex flex-col md:flex-row justify-between items-center gap-4">

            <div>
                <div class="text-lg font-semibold">
                    {{ $file['title'] }}
                </div>

                @if ($file['author'])
                    <div class="text-sm text-gray-500 mt-1">
                        {{ $file['author'] }}
                    </div>
                @endif
            </div>

            <a href="{{ $file['path'] }}" download>
                <button class="fancy-btn text-md text-center rounded-2xl px-6 py-3">
                    {{ __('strings.download') }} <i class="fa-solid fa-download"></i>
                </button>
            </a>

        </div>
    @endforeach

</div>
@endsection
