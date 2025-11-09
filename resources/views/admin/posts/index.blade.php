@extends('admin.layout')

@section('content')
<div class="p-6">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">📄 المنشورات</h2>
    <a href="{{ route('admin.posts.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md transition">
      + منشور جديد
    </a>
  </div>

  @if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white shadow-lg rounded-xl border border-gray-100">
    <table class="min-w-full text-sm text-gray-700">
      <thead class="bg-teal-600 text-white text-left">
        <tr>
          <th class="py-3 px-4 font-semibold">ID</th>
          <th class="py-3 px-4 font-semibold">Title</th>
          <th class="py-3 px-4 font-semibold">Image</th>
          <th class="py-3 px-4 font-semibold">Shown</th>
          <th class="py-3 px-4 font-semibold">Order</th>
          <th class="py-3 px-4 font-semibold">Updated</th>
          <th class="py-3 px-4 font-semibold text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr class="border-b hover:bg-gray-50 transition">
            <td class="py-3 px-4">{{ $post->id }}</td>
            <td class="py-3 px-4 font-medium">{{ $post->title }}</td>
            <td class="py-3 px-4">
              @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="w-16 h-16 object-cover rounded-md border border-gray-200">
              @else
                <span class="text-gray-400 italic">No image</span>
              @endif
            </td>
            <td class="py-3 px-4">
              @if($post->is_shown)
                <span class="text-green-600 font-semibold">✅ Yes</span>
              @else
                <span class="text-gray-400 font-semibold">❌ No</span>
              @endif
            </td>
            <td class="py-3 px-4">{{ $post->order_at_home }}</td>
            <td class="py-3 px-4">{{ $post->updated_at->diffForHumans() }}</td>
            <td class="py-3 px-4 text-center">
              <div class="flex items-center justify-center gap-2">
                <a href="{{ route('admin.posts.edit', $post) }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs shadow-sm">
                  Edit
                </a>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs shadow-sm">
                    Delete
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="py-6 text-center text-gray-500">
              No posts found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $posts->links('pagination::tailwind') }}
  </div>
</div>
@endsection
