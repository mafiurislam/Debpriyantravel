@extends('admin.layout')

@section('title', $vehicle->exists ? 'Edit Vehicle' : 'Add Vehicle')
@section('page_title', $vehicle->exists ? 'Edit Fleet Vehicle' : 'Add New Vehicle')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 800px;">
  <form action="{{ $vehicle->exists ? route('admin.vehicles.update', $vehicle) : route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($vehicle->exists)
      @method('PUT')
    @endif

    <div class="row g-3">
      <div class="col-md-7">
        <label class="form-label fw-semibold">Vehicle Name *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $vehicle->name) }}" placeholder="e.g. Maruti Swift Dzire Sedan" required>
      </div>

      <div class="col-md-5">
        <label class="form-label fw-semibold">Category</label>
        <select name="category" class="form-select">
          <option value="Sedan" {{ old('category', $vehicle->category) == 'Sedan' ? 'selected' : '' }}>Sedan</option>
          <option value="SUV" {{ old('category', $vehicle->category) == 'SUV' ? 'selected' : '' }}>SUV</option>
          <option value="Tempo Traveller" {{ old('category', $vehicle->category) == 'Tempo Traveller' ? 'selected' : '' }}>Tempo Traveller</option>
          <option value="Bus" {{ old('category', $vehicle->category) == 'Bus' ? 'selected' : '' }}>Luxury Bus / Coach</option>
          <option value="Electric Vehicle" {{ old('category', $vehicle->category) == 'Electric Vehicle' ? 'selected' : '' }}>Electric Vehicle (EV)</option>
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Seating Capacity</label>
        <input type="text" name="capacity" class="form-control" value="{{ old('capacity', $vehicle->capacity) }}" placeholder="e.g. 4 Seater + Driver">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Rate Per Hour</label>
        <input type="text" name="rate_hourly" class="form-control" value="{{ old('rate_hourly', $vehicle->rate_hourly) }}" placeholder="e.g. ₹150 / hr">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Rate Per KM</label>
        <input type="text" name="rate_km" class="form-control" value="{{ old('rate_km', $vehicle->rate_km) }}" placeholder="e.g. ₹15 / km">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Package Rate / Note</label>
        <input type="text" name="rate_package" class="form-control" value="{{ old('rate_package', $vehicle->rate_package) }}" placeholder="e.g. Local Drop ₹899 | 8hr/80km ₹1,899">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Key Features (Comma Separated)</label>
        <textarea name="features" class="form-control" rows="2" placeholder="e.g. Air Conditioned, Pushback Seats, GPS Tracking, Uniformed Driver">{{ old('features', $vehicle->features) }}</textarea>
        <small class="text-muted">Separate multiple features with commas.</small>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Image Path</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $vehicle->image) }}" placeholder="assets/images/sedan.jpg">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload Vehicle Photo</label>
        <input type="file" name="image_file" class="form-control" accept="image/*">
      </div>

      @if($vehicle->image)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Current Vehicle Image:</small>
          <img src="{{ asset($vehicle->image) }}" alt="Preview" style="max-height: 90px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-12">
        <label class="form-label fw-semibold">WhatsApp Inquiry Text</label>
        <input type="text" name="whatsapp_message" class="form-control" value="{{ old('whatsapp_message', $vehicle->whatsapp_message) }}" placeholder="e.g. Hello Debpriyan Travels, I want to book Dzire Sedan.">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Sort Order (Sequence)</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $vehicle->sort_order ?? 0) }}">
      </div>

      <div class="col-md-6 d-flex align-items-center mt-4">
        <div class="form-check form-switch fs-5">
          <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $vehicle->exists ? $vehicle->is_active : true) ? 'checked' : '' }}>
          <label class="form-check-label fs-6 fw-semibold" for="isActive">Display on Website</label>
        </div>
      </div>

      <div class="col-12 mt-4 pt-3 border-top d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> {{ $vehicle->exists ? 'Update Vehicle' : 'Save Vehicle' }}
        </button>
        <a href="{{ route('admin.vehicles.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
      </div>
    </div>
  </form>
</div>

@endsection
