@extends('layouts.app')

@section('title', 'البرامج والفعاليات')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="page-header">البرامج والفعاليات</h2>

    <div class="space-y-6">
        @foreach ($events as $event)
        <div class="mh-card flex flex-col h-fit md:flex-row bg-white rounded-2xl shadow-md hover:shadow-lg opacity-0 translate-y-10 transition-all duration-700 ease-out">

            {{-- Event image --}}
            <img src="{{ $event->image? asset('storage/' . $event->image) : asset('images/logos/logo-w-text.png') }}" alt="{{ $event->title }}"
                class="w-full h-full md:w-3/7 rounded-t-2xl md:rounded-se-none md:rounded-s-2xl object-cover">

            {{-- Event details --}}
            <div class="flex flex-col justify-between p-5 flex-1 text-right">

                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-3">{{ $lang == 'ar'? $event->title : $event->title_en }}</h2>

                    {{-- Description --}}
                    <p class="text-gray-700 leading-relaxed mb-4 line-clamp-3">
                        {{ ($lang == 'ar'? $event->desc : $event->desc_en) ?? '' }}
                    </p>

                    {{-- Date --}}
                    <div class="flex flex-row items-center gap-3 text-gray-600 mb-2">
                        <i class="fa fa-calendar text-xl text-teal-500"></i>
                        <span>{{$lang == 'ar'? 'ال':''}}{{ \Carbon\Carbon::parse($event->date)->translatedFormat('D d - m - Y') }}</span>
                    </div>

                    {{-- Time --}}
                    @if($event->time)
                    <div class="flex flex-row items-center gap-3 text-gray-600 mb-2">
                        <i class="fa fa-clock text-xl text-teal-500"></i>
                        <span>{{ \Carbon\Carbon::parse($event->time)->translatedFormat('g:i A') }}</span>
                    </div>
                    @endif

                    {{-- Location --}}
                    <div class="flex flex-row items-center text-gray-600 gap-3 mb-4">
                        <i class="fa fa-location-dot text-xl text-teal-500"></i>
                        <span>{{ $lang == 'ar'? $event->location : $event->location_en }}</span>
                        @if($event->location_url)
                        <a href="{{$event->location_url}}" target="_blank" class="flex flex-col items-center gap-1">
                            <i class="text-lg fa-duotone fa-solid fa-arrow-up-right-from-square"></i>
                            <p class="text-sm bg-gray-300 px-1 rounded-xl">{{ $lang == 'ar' ? 'خرائط جوجل' : 'google map' }}</p>
                        </a>
                        @endif
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