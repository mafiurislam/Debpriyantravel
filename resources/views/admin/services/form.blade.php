@extends('admin.layout')

@section('title', $service->exists ? 'Edit Service' : 'Add Service')
@section('page_title', $service->exists ? 'Edit Core Service' : 'Add New Core Service')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 800px;">
  <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($service->exists)
      @method('PUT')
    @endif

    <div class="row g-3">
      <div class="col-md-7">
        <label class="form-label fw-semibold">Service Title *</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" placeholder="e.g. Car Rental (Self Drive / With Driver)" required>
      </div>

      <div class="col-md-5">
        <label class="form-label fw-semibold">Category / Badge</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $service->category ?? 'Fleet / Rental') }}" placeholder="e.g. Fleet / Rental">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Bengali Subtitle</label>
        <input type="text" name="bengali_subtitle" class="form-control" value="{{ old('bengali_subtitle', $service->bengali_subtitle) }}" placeholder="e.g. গাড়ি ভাড়া (সেলফ ড্রাইভ / ড্রাইভার সহ)">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Service Description / Rate Details</label>
        <textarea name="description" class="form-control" rows="4" placeholder="Enter service description, rates, vehicle types...">{{ old('description', $service->description) }}</textarea>
        <small class="text-muted">Lines will be displayed with line breaks on the website.</small>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">FontAwesome Icon Class</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="{{ $service->icon ?: 'fa-solid fa-car' }}"></i></span>
          <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon ?? 'fa-solid fa-car') }}" placeholder="fa-solid fa-car">
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Button Text</label>
        <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', $service->btn_text ?? 'Book Service') }}">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Image Path</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $service->image) }}" placeholder="assets/images/sedan.jpg">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload Image</label>
        <input type="file" name="image_file" class="form-control" accept="image/*">
      </div>

      @if($service->image)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Current Card Image:</small>
          <img src="{{ asset($service->image) }}" alt="Preview" style="max-height: 90px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-12">
        <label class="form-label fw-semibold">Pre-Filled WhatsApp Inquiry Message</label>
        <textarea name="whatsapp_message" class="form-control" rows="2" placeholder="e.g. Hello Debpriyan Travels, I want to inquire about Dzire Car Rental...">{{ old('whatsapp_message', $service->whatsapp_message) }}</textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Sort Order (Sequence)</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch fs-5">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $service->exists ? $service->is_active : true) ? 'checked' : '' }}>
          <label class="form-check-label fs-6 fw-semibold" for="isActive">Display on Website</label>
        </div>
      </div>

      <div class="col-12 mt-4 pt-3 border-top d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> {{ $service->exists ? 'Update Service' : 'Create Service' }}
        </button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
      </div>
    </div>
  </form>
</div>

@endsection
