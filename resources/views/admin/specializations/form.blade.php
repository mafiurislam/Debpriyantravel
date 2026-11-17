@extends('admin.layout')

@section('title', $specialization->exists ? 'Edit Category' : 'Add Category')
@section('page_title', $specialization->exists ? 'Edit Category Card' : 'Add Travel Category Card')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 800px;">
  <form action="{{ $specialization->exists ? route('admin.specializations.update', $specialization) : route('admin.specializations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($specialization->exists)
      @method('PUT')
    @endif

    <div class="row g-3">
      <div class="col-md-7">
        <label class="form-label fw-semibold">Card Title *</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $specialization->title) }}" placeholder="e.g. All India Ticket Booking" required>
      </div>

      <div class="col-md-5">
        <label class="form-label fw-semibold">Bengali Subtitle</label>
        <input type="text" name="bengali_subtitle" class="form-control" value="{{ old('bengali_subtitle', $specialization->bengali_subtitle) }}" placeholder="e.g. সমগ্র ভারত টিকিট বুকিং">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Image Path</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $specialization->image) }}" placeholder="assets/images/banners/sujata-bus.jpg">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload Image</label>
        <input type="file" name="image_file" class="form-control" accept="image/*">
      </div>

      @if($specialization->image)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Current Image:</small>
          <img src="{{ asset($specialization->image) }}" alt="Preview" style="max-height: 90px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-md-6">
        <label class="form-label fw-semibold">Button Text</label>
        <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', $specialization->btn_text ?? 'Explore') }}">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Button Link / WhatsApp URL</label>
        <input type="text" name="btn_link" class="form-control" value="{{ old('btn_link', $specialization->btn_link ?? '#') }}" placeholder="bus-booking or https://wa.me/...">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Sort Order (Sequence)</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $specialization->sort_order ?? 0) }}">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch fs-5">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $specialization->exists ? $specialization->is_active : true) ? 'checked' : '' }}>
          <label class="form-check-label fs-6 fw-semibold" for="isActive">Display on Website</label>
        </div>
      </div>

      <div class="col-12 mt-4 pt-3 border-top d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> {{ $specialization->exists ? 'Update Category' : 'Create Category' }}
        </button>
        <a href="{{ route('admin.specializations.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
      </div>
    </div>
  </form>
</div>

@endsection
