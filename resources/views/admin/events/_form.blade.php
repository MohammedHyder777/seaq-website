@csrf

<div class="space-y-6">

  <!-- Title -->
  <div>
    <label class="flex text-gray-700 font-medium mb-1">
      العنوان
      <span class="text-red-500 ml-1 rtl:ml-0 rtl:mr-1" aria-hidden="true">*</span>
      <span class="sr-only">required</span> {{-- only appears to screen-readers not humans --}}
    </label>
    <input type="text" name="title" required
      value="{{ old('title', $event->title ?? '') }}"
      class="w-full border border-gray-30 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800 placeholder-gray-400">
  </div>

  <!-- Title EN -->
  <div>
    <label class="flex text-gray-700 font-medium mb-1">العنوان (EN)</label>
    <input type="text" name="title_en"
      value="{{ old('title_en', $event->title_en ?? '') }}"
      class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">
  </div>

  <!-- Image -->
  <div>
    <label class="block flex flex-row gap-5 text-gray-700 font-medium mb-1">
      الصورة
      <p class="mt-1 text-sm text-gray-500">إن لم ترغب في {{$action}} الصورة فاترك حقل الصورة فارغا.</p>
    </label>
    <input type="file" name="image" id="image" value="{{old('image', $event->image ?? '')}}"
      class="w-full text-gray-700 border border-gray-300 rounded-lg px-3 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-teal-500">

    @if(isset($event) && $event->image)
    <div id="image-preview" class="flex gap-5 mt-3">
      <img src="{{ asset('storage/'.$event->image) }}" class="w-40 h-40 object-cover rounded-lg shadow">

    <!-- <button type="button" onclick="removeImage()" class="flex items-center text-red-600 hover:text-red-800 cursor-pointer">
      <i class="fa fa-trash mr-1"></i> حذف الصورة
    </button>

    <input type="hidden" name="remove_image" id="remove-image"> -->
  </div>
  @endif
</div>

<!-- Description -->
<div>
  <label class="flex text-gray-700 font-medium mb-1">الوصف</label>
  <textarea name="desc" rows="4"
    class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">{{ old('desc', $event->desc ?? '') }}</textarea>
</div>

<!-- Description EN -->
<div>
  <label class="block text-gray-700 font-medium mb-1">الوصف (EN)</label>
  <textarea name="desc_en" rows="4"
    class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">{{ old('desc_en', $event->desc_en ?? '') }}</textarea>
</div>

<div>
  <label class="text-gray-700 font-medium mb-1">الموقع</label>
  <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">
</div>

<div>
  <label class="text-gray-700 font-medium mb-1">الموقع (EN)</label>
  <input type="text" name="location_en" value="{{ old('location_en', $event->location_en ?? '') }}" class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">
</div>

<div>
  <label class="text-gray-700 font-medium mb-1">رابط الموقع</label>
  <input type="url" name="location_url" value="{{ old('location_url', $event->location_url ?? '') }}" class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">
</div>

<div class="flex gap-4">
  <div>
    <label class="text-gray-700 font-medium mb-1">
      التاريخ
      <span class="text-red-500 ml-1 rtl:ml-0 rtl:mr-1" aria-hidden="true">*</span>
      <span class="sr-only">required</span>
    </label>
    <input type="date" name="date" value="{{ old('date', isset($event)? optional($event->date)->format('Y-m-d') : '') }}" required class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">
  </div>
  <div>
    <label class="text-gray-700 font-medium mb-1">الوقت</label>
    <input type="time" name="time" value="{{ old('time', isset($event)? optional($event->time)->format('H:i') : '') }}" class="w-full border border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-lg px-4 py-2 text-gray-800">
  </div>
</div>

<!-- Show on Events page -->
<div class="flex items-center gap-7">
  <label class="text-gray-700 font-medium">عرض في صفحة الفعاليات</label>
  <input type="checkbox" name="is_shown" value="1"
    class="w-7 h-7 text-teal-600 border-gray-300 focus:ring-teal-500"
    {{ old('is_shown', $event->is_shown ?? false) ? 'checked' : '' }}>
</div>

<!-- Buttons -->
<div class="flex items-center gap-3">
  <button type="submit"
    class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-lg font-medium shadow-sm transition hover:cursor-pointer">
    💾 حفظ
  </button>
  <a href="{{ route('admin.events.index') }}"
    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-medium transition">
    إلغاء
  </a>
</div>

</div>

<script>
  /*
  function removeImage() {

    if (!confirm('أترغب في إزالة صورة هذا المنشور؟')) return;
    // Set the remove_image input value to 1;
    document.getElementById('remove-image').value = 1;
    // Hide the image preview (image and remove button)
    document.getElementById("image-preview").style.display = 'none';

  }
  */
</script>