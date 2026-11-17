@extends('admin.layout')

@section('title', 'Site Settings')
@section('page_title', 'General Site Settings & Contact Info')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="max-width: 850px;">
  <div class="mb-3">
    <h5 class="fw-bold mb-1">Debpriyan Travels Configuration</h5>
    <p class="text-muted small">Update company contact numbers, official email, physical address, and site-wide branding.</p>
  </div>

  <form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-semibold">Website Brand Name</label>
        <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name'] ?? 'Debpriyan Travels') }}" required>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">English Tagline</label>
        <input type="text" name="site_tagline" class="form-control" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'Your Journey, Our Responsibility') }}">
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Bengali Tagline</label>
        <input type="text" name="bengali_tagline" class="form-control" value="{{ old('bengali_tagline', $settings['bengali_tagline'] ?? 'সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা') }}">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Primary Phone Number</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa-solid fa-phone text-muted"></i></span>
          <input type="text" name="phone_1" class="form-control" value="{{ old('phone_1', $settings['phone_1'] ?? '9433053668') }}" required>
        </div>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">Secondary Phone Number</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa-solid fa-phone text-muted"></i></span>
          <input type="text" name="phone_2" class="form-control" value="{{ old('phone_2', $settings['phone_2'] ?? '9432430360') }}">
        </div>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-semibold">WhatsApp Number (with country code)</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa-brands fa-whatsapp text-success"></i></span>
          <input type="text" name="whatsapp_number" class="form-control" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '919433053668') }}" required>
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Official Email Address</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa-solid fa-envelope text-muted"></i></span>
          <input type="email" name="email" class="form-control" value="{{ old('email', $settings['email'] ?? 'debpriyan2021@gmail.com') }}" required>
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-semibold">Office Address</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa-solid fa-location-dot text-muted"></i></span>
          <input type="text" name="address" class="form-control" value="{{ old('address', $settings['address'] ?? 'Kolkata - 700161, West Bengal') }}" required>
        </div>
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">Short About Description (Used in Footer &amp; About)</label>
        <textarea name="about_short" class="form-control" rows="2">{{ old('about_short', $settings['about_short'] ?? '') }}</textarea>
      </div>

      <div class="col-12">
        <label class="form-label fw-semibold">SEO Meta Description</label>
        <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
      </div>

      <div class="col-12 mt-4 pt-3 border-top">
        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">
          <i class="fa-solid fa-save me-1"></i> Save Site Settings
        </button>
      </div>
    </div>
  </form>
</div>

@endsection
