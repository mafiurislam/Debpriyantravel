@extends('admin.layout')

@section('title', $package->exists ? 'Edit Package' : 'Add Package')
@section('page_title', $package->exists ? 'Edit Tour Package' : 'Add New Tour Package')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 800px;">
  <form action="{{ $package->exists ? route('admin.packages.update', $package) : route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($package->exists)
      @method('PUT')
    @endif

    <div class="row g-3">
      <div class="col-md-7">
        <label class="form-label fw-semibold">Package Name *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" placeholder="e.g. Sundarbans Wildlife & Mangrove Safari" required>
      </div>

      <div class="col-md-5">
        <label class="form-label fw-semibold">Bengali Title</label>
        <input type="text" name="bengali_name" class="form-control" value="{{ old('bengali_name', $package->bengali_name) }}" placeholder="e.g. সুন্দরবন জঙ্গল ও ক্যানিং সাফারি ট্যুর">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Destination</label>
        <input type="text" name="destination" class="form-control" value="{{ old('destination', $package->destination) }}" placeholder="e.g. Sundarbans, West Bengal">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Duration</label>
        <input type="text" name="duration" class="form-control" value="{{ old('duration', $package->duration) }}" placeholder="e.g. 2 Days / 1 Night">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Price / Fare</label>
        <input type="text" name="price" class="form-control" value="{{ old('price', $package->price) }}" placeholder="e.g. ₹3,500 / person">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Package Overview Description</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Describe the tour itinerary...">{{ old('description', $package->description) }}</textarea>
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Tour Highlights (Comma Separated)</label>
        <input type="text" name="highlights" class="form-control" value="{{ old('highlights', $package->highlights) }}" placeholder="e.g. Boat Cruise, Tiger Camp, Mangrove Safari, All Meals">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Image Path</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $package->image) }}" placeholder="assets/images/pkg-sundarbans.jpg">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload Package Image</label>
        <input type="file" name="image_file" class="form-control" accept="image/*">
      </div>

      @if($package->image)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Current Image:</small>
          <img src="{{ asset($package->image) }}" alt="Preview" style="max-height: 90px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-md-6">
        <label class="form-label fw-semibold">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $package->sort_order ?? 0) }}">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch fs-5">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $package->exists ? $package->is_active : true) ? 'checked' : '' }}>
          <label class="form-check-label fs-6 fw-semibold" for="isActive">Display on Website</label>
        </div>
      </div>

      <div class="col-12 mt-4 pt-3 border-top d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> {{ $package->exists ? 'Update Package' : 'Create Package' }}
        </button>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
      </div>
    </div>
  </form>
</div>

@endsection
