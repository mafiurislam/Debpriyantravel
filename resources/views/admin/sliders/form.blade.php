@extends('admin.layout')

@section('title', $slider->exists ? 'Edit Slide' : 'Create Slide')
@section('page_title', $slider->exists ? 'Edit Hero Slide' : 'Create New Hero Slide')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 800px;">
  <form action="{{ $slider->exists ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($slider->exists)
      @method('PUT')
    @endif

    <div class="row g-3">
      <div class="col-md-8">
        <label class="form-label fw-semibold">Slide Title (English)</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" placeholder="e.g. Kolkata to All India Luxury Bus Service">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Badge Text</label>
        <input type="text" name="badge" class="form-control" value="{{ old('badge', $slider->badge) }}" placeholder="e.g. 24/7 Premium Bus Booking">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Bengali Subtitle</label>
        <input type="text" name="bengali_title" class="form-control" value="{{ old('bengali_title', $slider->bengali_title) }}" placeholder="e.g. কলকাতা থেকে সমগ্র ভারতে নিরাপদ ও বিলাসবহুল ভ্রমণ">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Slide Description</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Enter slide description text...">{{ old('description', $slider->description) }}</textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Image Path or URL</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $slider->image) }}" placeholder="assets/images/slider/slide-sujata-tempo.webp">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload New Image</label>
        <input type="file" name="image_file" class="form-control" accept="image/*">
      </div>

      @if($slider->image)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Current Image:</small>
          <img src="{{ asset($slider->image) }}" alt="Preview" style="max-height: 90px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-md-6">
        <label class="form-label fw-semibold">Button Text</label>
        <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $slider->button_text ?? 'Book Now') }}">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Button Link / Route</label>
        <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $slider->button_link ?? '#') }}" placeholder="bus-booking or https://wa.me/...">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Sort Order (Display Sequence)</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $slider->sort_order ?? 0) }}">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch fs-5">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $slider->exists ? $slider->is_active : true) ? 'checked' : '' }}>
          <label class="form-check-label fs-6 fw-semibold" for="isActive">Display / Active on Website</label>
        </div>
      </div>

      <div class="col-12 mt-4 pt-3 border-top d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> {{ $slider->exists ? 'Update Slide' : 'Create Slide' }}
        </button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
      </div>
    </div>
  </form>
</div>

@endsection
