@extends('layouts.app')

@section('title', 'البرامج والفعاليات')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="page-header">البرامج والفعاليات</h2>

    <div class="space-y-6">
        @foreach ($events as $event)
        <div class="mh-card flex flex-col h-fit sm:flex-row bg-white rounded-2xl shadow-md hover:shadow-lg opacity-0 translate-y-10 transition-all duration-700 ease-out">

            {{-- Event image --}}
            <img src="{{ $event->image_url ?? asset('images/logos/logo-w-text.png') }}" alt="{{ $event->title }}"
                 class="w-full sm:w-1/3 rounded-t-2xl sm:rounded-t-0 sm:rounded-r-2xl object-cover">

            {{-- Event details --}}
            <div class="flex flex-col justify-between p-5 flex-1 text-right">

                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-3">{{ $event->title }}</h2>

                    {{-- Description --}}
                    <p class="text-gray-700 leading-relaxed mb-4 line-clamp-3">
                        {{ $event->description ?? '' }}
                    </p>

                    <div class="flex flex-row items-center text-gray-600 mb-2">
                        {{-- Calendar icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-5 w-5 text-teal-500 ml-2" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $event->date }} – {{ $event->time }}</span>
                    </div>

                    <div class="flex flex-row items-center text-gray-600 mb-4">
                        {{-- Location icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 text-teal-500 ml-2"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 10s6-6.438 6-10a6 6 0 10-12 0c0 3.562 6 10 6 10z" />
                        </svg>
                        <span>{{ $event->location }}</span>
                    </div>
                </div>

                <!-- <a href="#" class="inline-block bg-teal-500 text-white px-4 py-2 rounded-xl hover:bg-teal-600 transition-colors duration-200 self-start sm:self-end">
                    تفاصيل الفعالية
                </a> -->

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
