# Debpriyan Travels & Transport Solution (Laravel + SQLite)

A modern, dynamic transport booking and fleet rental web application for **Debpriyan Travels**, Kolkata. Fully built with **PHP Laravel 11/12**, **SQLite database**, **Bootstrap 5.3**, and an interactive **Admin Content Management Dashboard**.

---

## 🚀 Key Features

- **100% Dynamic Front-End Website**:
  - **Homepage (`/`)**: Hero banner carousel with uncropped aspect ratio, All-India routes highlight section, 5 Core Transport & Rental Services (including Maruti Dzire hourly & per-km tariff), 4 Core Specializations (Bus Ticket Booking, All India Ticket Booking, Car Rental, Bus Rental), Fleet Showcase, Customer Video Reviews gallery with modal playback, and CTA banner.
  - **About Us (`/about`)**: Company profile, vision, mission, and fleet milestones.
  - **Services (`/services`)**: Full service catalog with WhatsApp inquiry links and dynamic FAQ accordion.
  - **Tour Packages (`/packages`)**: Handcrafted tour packages (Sundarbans, Digha, Darjeeling, Mayapur, etc.).
  - **Car Rental (`/car-rental`)**: Fleet tariffs, vehicle features, fixed-rate airport/station transfer packages, and comprehensive rate charts.
  - **Bus Booking (`/bus-booking`)**: All-India bus timetable, popular routes, and instant seat booking.
  - **Contact Us (`/contact`)**: 24x7 phone lines, WhatsApp dispatch desk, physical location, and inquiry form.
- **Section-by-Section Admin Dashboard (`/admin`)**:
  - Secure authentication system.
  - **Hero Sliders**: Create, edit, reorder, and delete homepage slider banners.
  - **Route Banner**: Edit All-India connectivity routes, phone, email, and banner graphics.
  - **Core Services**: Create, edit, and delete services with rates, icons, and custom WhatsApp messages.
  - **Travel Categories**: Manage specialization cards and redirection buttons.
  - **Fleet / Vehicles**: Manage vehicles, seating capacity, hourly rates, per-km rates, and features.
  - **Video Reviews**: Add, edit, or delete customer YouTube review videos and thumbnails.
  - **Tour Packages**: Manage destinations, pricing, inclusions, and itineraries.
  - **Site Settings**: Centralized configuration for phone numbers, WhatsApp, email, address, and SEO meta.
  - **Booking Inquiries & Leads**: View, track, filter (new/contacted/confirmed), and respond to incoming customer leads on WhatsApp.

---

## 🔐 Admin Dashboard Credentials

- **Admin Login URL**: `/admin/login`
- **User ID**: `adminat@12345`
- **Password**: `admin123`

---

## 🛠️ Local Development Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/mafiurislam/Debpriyantravel.git
   cd Debpriyantravel
   ```

2. **Install Composer dependencies**:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup (SQLite)**:
   The repository already includes the pre-populated `database/database.sqlite` file. If you ever want to re-seed fresh data:
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Start Development Server**:
   ```bash
   php artisan serve
   ```
   Open `http://localhost:8000` in your browser.

---

## 🌐 Live Hosting & Deployment Guide

### Option 1: Shared Hosting / cPanel (via Git)

1. **In cPanel**:
   - Go to **Git Version Control** and clone your repository into `public_html` (or a subdomain directory).
   - Ensure PHP version is set to **PHP 8.2 or PHP 8.3** with `pdo_sqlite` and `sqlite3` enabled in **Select PHP Version / MultiPHP Manager**.
2. **Terminal / SSH**:
   ```bash
   cd public_html
   composer install --no-dev --optimize-autoloader
   cp .env.example .env
   php artisan key:generate
   ```
3. **Permissions**:
   Ensure `storage` and `bootstrap/cache` are writable:
   ```bash
   chmod -R 775 storage bootstrap/cache database
   ```
4. **DocumentRoot**:
   - The repository includes a root `.htaccess` and root `index.php` that automatically forwards requests to `public/` even if your cPanel DocumentRoot is set to `public_html`.
   - Alternatively, you can set DocumentRoot directly to `public_html/public`.

### Option 2: VPS / Cloud (Ubuntu / Nginx / Apache)

1. Clone repo into `/var/www/debpriyantravels`.
2. Configure web server document root to `/var/www/debpriyantravels/public`.
3. Set permissions:
   ```bash
   chown -R www-data:www-data /var/www/debpriyantravels/storage /var/www/debpriyantravels/bootstrap/cache /var/www/debpriyantravels/database
   chmod -R 775 /var/www/debpriyantravels/storage /var/www/debpriyantravels/bootstrap/cache /var/www/debpriyantravels/database
   ```
4. Run:
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

## 📞 Support & Dispatch Desk

- **Phone**: 9433053668 / 9432430360
- **Email**: debpriyan2021@gmail.com
- **Office**: Kolkata - 700161, West Bengal, India
