@extends('admin.layout')

@section('title', 'Route Highlight Banner')
@section('page_title', 'Route Highlight Banner Section')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 850px;">
  <div class="mb-3">
    <h5 class="fw-bold mb-1">All India Route Highlight Banner</h5>
    <p class="text-muted small">This banner appears prominently below the hero slider, showcasing All-India connectivity routes, contact information, and tagline.</p>
  </div>

  <form action="{{ route('admin.route-highlight.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label fw-semibold">Badge Text</label>
        <input type="text" name="badge" class="form-control" value="{{ old('badge', $highlight->badge) }}" placeholder="PAN-INDIA CONNECTIVITY">
      </div>

      <div class="col-md-8">
        <label class="form-label fw-semibold">Section Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $highlight->title) }}" placeholder="All India Bus Booking Ticket Available" required>
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Bengali Tagline</label>
        <input type="text" name="bengali_tagline" class="form-control" value="{{ old('bengali_tagline', $highlight->bengali_tagline) }}" placeholder="সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Description Text</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $highlight->description) }}</textarea>
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Connected Routes (Comma Separated)</label>
        <input type="text" name="routes" class="form-control" value="{{ old('routes', $highlight->routes) }}" placeholder="SILIGURI, DIGHA, ASANSOL, VARANASI, DELHI, MUMBAI, CHENNAI, HYDERABAD">
        <small class="text-muted">Separate cities with commas. They will be rendered as route badges.</small>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Banner Image Path</label>
        <input type="text" name="image" class="form-control" value="{{ old('image', $highlight->image) }}" placeholder="assets/images/banners/banner-routes.jpg">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Or Upload New Banner Image</label>
        <input type="file" name="image_file" class="form-control" accept="image/*">
      </div>

      @if($highlight->image)
      <div class="col-12">
        <div class="p-2 border rounded bg-light d-inline-block">
          <small class="d-block text-muted mb-1">Current Banner Image:</small>
          <img src="{{ asset($highlight->image) }}" alt="Preview" style="max-height: 110px; border-radius: 6px;">
        </div>
      </div>
      @endif

      <div class="col-md-4">
        <label class="form-label fw-semibold">Contact Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $highlight->phone) }}" placeholder="9432430360">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Contact Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $highlight->email) }}" placeholder="debpriyan2021@gmail.com">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Address Text</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $highlight->address) }}" placeholder="KOLKATA-700161">
      </div>

      <div class="col-12 mt-4 pt-3 border-top">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> Save Changes to Route Banner
        </button>
      </div>
    </div>
  </form>
</div>

@endsection
