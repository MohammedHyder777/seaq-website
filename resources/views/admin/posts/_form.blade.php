@csrf

<div class="mb-3">
  <label class="form-label">العنوان</label>
  <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>

<div class="mb-3">
  <label class="form-label">Title (EN)</label>
  <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $post->title_en ?? '') }}">
</div>

<div class="mb-3">
  <label class="form-label">صورة المنشور</label>
  <input type="file" name="image" class="form-control">
  @if(!empty($post->image))
    <img src="{{ asset('storage/'.$post->image) }}" class="mt-2 rounded" width="150">
  @endif
</div>

<div class="mb-3">
  <label class="form-label">النصّ</label>
  <textarea name="body" rows="4" class="form-control">{{ old('body', $post->body ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Body (EN)</label>
  <textarea name="body_en" rows="4" class="form-control">{{ old('body_en', $post->body_en ?? '') }}</textarea>
</div>

<div class="form-check mb-3">
  <input type="checkbox" name="is_shown" value="1" class="form-check-input"
         {{ old('is_shown', $post->is_shown ?? false) ? 'checked' : '' }}>
  <label class="form-check-label">عرض في الصفحة الرئيسة</label>
</div>

<div class="mb-3">
  <label class="form-label">الترتيب في الصفحة الرئيسة</label>
  <input type="number" name="order_at_home" class="form-control" value="{{ old('order_at_home', $post->order_at_home ?? 0) }}">
</div>

<button class="btn btn-primary">حفظ</button>
