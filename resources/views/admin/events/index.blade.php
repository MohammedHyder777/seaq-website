@extends('layouts.app')

@section('content')
<div class="p-1 md:p-6">
  <div class="flex flex-col md:flex-row items-center justify-between mb-6">
    <h2 class="page-header">{{__('strings.events_management')}}</h2>
    <a href="{{ route('admin.events.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md transition">
      {{__('strings.new_event')}} 📆
    </a>
  </div>

  @if(session('success'))
  <div class="w-fit flex gap-5 text-center m-auto mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
    {{ session('success') }}
    <button class="hover:cursor-pointer" onclick="this.parentElement.style.display='none'">x</button>
  </div>
  @endif

  <div class="overflow-x-auto bg-white shadow-lg rounded-xl border border-gray-100">
    <table class="min-w-full text-sm text-center text-gray-700">
      <thead class="bg-teal-600 text-white">
        <tr>
          <th class="py-3 px-4 font-semibold">{{__('strings.id')}}</th>
          <th class="py-3 px-4 font-semibold">{{__('strings.title')}}</th>
          <th class="py-3 px-4 font-semibold">{{__('strings.event_image')}}</th>
          <!-- <th class="py-3 px-4 font-semibold">الوصف</th> -->
          <th class="py-3 px-4 font-semibold">{{__('strings.display')}}</th>
          <th class="py-3 px-4 font-semibold">{{__('strings.datetime')}}</th>
          <th class="py-3 px-4 font-semibold">{{__('strings.updated_at')}}</th>
          <th class="py-3 px-4 font-semibold">{{__('strings.created_at')}}</th>
          <th class="py-3 px-4 font-semibold">{{__('strings.actions')}}</th>
        </tr>
      </thead>
      <tbody>
        @forelse($events as $event)
        <tr class="border-b hover:bg-gray-50 transition">
          <td class="py-3 px-4">{{ $event->id }}</td>
          <td class="py-3 px-4 font-medium">{{ $lang == 'ar'? $event->title : $event->title_en }}</td>
          <td class="py-3 px-4">
            @if($event->image)
            <img src="{{ asset('storage/'.$event->image) }}" class="m-auto w-16 h-16 object-cover rounded-md border border-gray-200">
            @else
            <span class="text-gray-400 italic">{{__('strings.no_image')}}</span>
            @endif
          </td>
          <!-- <td class="py-3 px-4">{{ $event->desc }}</td> -->
          <td class="py-3 px-4">
            @if($event->is_shown)
            <span class="text-green-600 font-semibold"><i class="fa fa-eye"></i> {{__('strings.shown_f')}}</span>
            @else
            <span class="text-gray-400 font-semibold"><i class="fa fa-eye-slash"></i> {{__('strings.hidden_f')}}</span>
            @endif
          </td>
          <td class="py-3 px-4">
            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d - m - Y') }} <br>
            {{ $event->time? \Carbon\Carbon::parse($event->time)->translatedFormat('g:i A') : '' }}
          </td>
          <td class="py-3 px-4">{{ $event->updated_at->diffForHumans() }}</td>
          <td class="py-3 px-4">{{ $event->created_at->diffForHumans() }}</td>
          <td class="py-3 px-4 text-center">
            <div class="flex items-center justify-center gap-2">
              <a href="{{ route('admin.events.edit', $event) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs shadow-sm">
                {{__('strings.edit')}}
              </a>
              <form action="{{ route('admin.events.destroy', $event) }}" method="event" onsubmit="return confirm(`{{__('strings.confirm_delete_event')}}`)">
                @csrf @method('DELETE')
                <button type="submit"
                  class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs shadow-sm hover:cursor-pointer">
                  {{__('strings.delete')}}
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="py-6 text-center text-gray-500">
            {{__('strings.no_events')}}
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $events->links('pagination::tailwind') }}
  </div>
</div>
@endsection