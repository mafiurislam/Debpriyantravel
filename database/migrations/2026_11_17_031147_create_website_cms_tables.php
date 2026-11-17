<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Hero Sliders
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('bengali_title')->nullable();
            $table->string('badge')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->default('assets/images/slider/slide-sujata-tempo.webp');
            $table->string('button_text')->default('Book Now');
            $table->string('button_link')->default('#');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Route Highlights Banner
        Schema::create('route_highlights', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('PAN-INDIA CONNECTIVITY');
            $table->string('title')->default('All India Bus Booking Ticket Available');
            $table->string('bengali_tagline')->default('সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা');
            $table->text('description')->nullable();
            $table->string('image')->default('assets/images/banners/banner-routes.jpg');
            $table->text('routes')->nullable();
            $table->string('phone')->default('9432430360');
            $table->string('email')->default('debpriyan2021@gmail.com');
            $table->string('address')->default('KOLKATA-700161');
            $table->timestamps();
        });

        // 3. Core Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('bengali_subtitle')->nullable();
            $table->string('category')->default('Fleet & Travel');
            $table->text('description')->nullable();
            $table->string('icon')->default('fa-solid fa-car');
            $table->string('image')->nullable();
            $table->string('btn_text')->default('Book Service');
            $table->text('whatsapp_message')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 4. Specializations / Core Travel Categories
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('bengali_subtitle')->nullable();
            $table->string('image')->default('assets/images/sedan.jpg');
            $table->string('btn_text')->default('Explore');
            $table->string('btn_link')->default('#');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Customer Video Reviews
        Schema::create('video_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('youtube_id');
            $table->string('thumbnail')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 6. Fleet Vehicles
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('Sedan');
            $table->string('capacity')->nullable();
            $table->string('rate_hourly')->nullable();
            $table->string('rate_km')->nullable();
            $table->string('rate_package')->nullable();
            $table->text('features')->nullable();
            $table->string('image')->nullable();
            $table->text('whatsapp_message')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 7. Tour Packages
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bengali_name')->nullable();
            $table->string('destination')->nullable();
            $table->string('duration')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->text('highlights')->nullable();
            $table->text('inclusions')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 8. Site Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('label')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });

        // 9. Booking Inquiries & Leads
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('service_type')->nullable();
            $table->string('vehicle_preferred')->nullable();
            $table->string('journey_date')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('drop_location')->nullable();
            $table->integer('passengers')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('tour_packages');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('video_reviews');
        Schema::dropIfExists('specializations');
        Schema::dropIfExists('services');
        Schema::dropIfExists('route_highlights');
        Schema::dropIfExists('hero_sliders');
    }
};
