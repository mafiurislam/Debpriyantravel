@extends('admin.layout')

@section('title', $video->exists ? 'Edit Video Review' : 'Add Video Review')
@section('page_title', $video->exists ? 'Edit Video Review' : 'Add New Video Review')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 800px;">
  <form action="{{ $video->exists ? route('admin.videos.update', $video) : route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($video->exists)
      @method('PUT')
    @endif

    <div class="row g-3">
      <div class="col-12">
        <label class="form-label fw-semibold">Review Title *</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" placeholder="e.g. Tempo Traveller Kolkata - Sujata Travels Review 1" required>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">YouTube Video ID or Full URL *</label>
        <input type="text" name="youtube_id" class="form-control" value="{{ old('youtube_id', $video->youtube_id) }}" placeholder="e.g. ae9BJzASXNI or https://youtu.be/ae9BJzASXNI" required>
        <small class="text-muted">Enter either the 11-character video ID or full YouTube URL.</small>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Custom Thumbnail Path</label>
        <input type="text" name="thumbnail" class="form-control" value="{{ old('thumbnail', $video->thumbnail) }}" placeholder="assets/images/videos/video-thumb-1.webp">
        <small class="text-muted">Leave empty to auto-load YouTube's high-res thumbnail.</small>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload Thumbnail</label>
        <input type="file" name="thumbnail_file" class="form-control" accept="image/*">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $video->sort_order ?? 0) }}">
      </div>

      @if($video->thumbnail || $video->youtube_id)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Preview:</small>
          <img src="{{ asset($video->thumbnail ?: 'https://img.youtube.com/vi/' . $video->youtube_id . '/hqdefault.jpg') }}" alt="Preview" style="max-height: 90px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-12 d-flex align-items-center mt-3">
        <div class="form-check form-switch fs-5">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $video->exists ? $video->is_active : true) ? 'checked' : '' }}>
          <label class="form-check-label fs-6 fw-semibold" for="isActive">Display on Website</label>
        </div>
      </div>

      <div class="col-12 mt-4 pt-3 border-top d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> {{ $video->exists ? 'Update Video' : 'Add Video' }}
        </button>
        <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
      </div>
    </div>
  </form>
</div>

@endsection
