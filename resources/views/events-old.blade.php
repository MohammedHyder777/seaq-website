@extends('layouts.app')

@section('title', 'البرامج والفعاليات')

@section('content')
<div class="container mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold text-center text-teal-600 mb-10">البرامج والفعاليات</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        {{-- Example event card --}}
        @foreach ($events as $event)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">

            <img src="{{ $event->image_url }}" alt="{{ $event->title }}" 
                class="w-full h-48 object-cover">

            <div class="p-5 flex flex-col justify-between h-full">

                <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $event->title }}</h2>

                <div class="flex items-center text-gray-600 mb-2">
                    {{-- Calendar icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-5 w-5 text-teal-500 ml-2" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $event->date }} – {{ $event->time }}</span>
                </div>

                <div class="flex items-center text-gray-600 mb-4">
                    {{-- Location icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-5 w-5 text-teal-500 ml-2" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 10s6-6.438 6-10a6 6 0 10-12 0c0 3.562 6 10 6 10z" />
                    </svg>
                    <span>{{ $event->location }}</span>
                </div>

                <a href="#" class="inline-block mt-auto bg-teal-500 text-white px-4 py-2 rounded-xl hover:bg-teal-600 transition-colors duration-200 text-center">
                    تفاصيل الفعالية
                </a>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
