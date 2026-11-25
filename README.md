# Lumbini Health Care Center - Hospital & Polyclinic Web Application

A modern hospital website and management system for **Lumbini Health Care Center** (Bhairahawa, Nepal), built with **Laravel 12**, **Filament Admin Panel**, **Livewire**, and **Tailwind CSS**, replicating the high-converting editorial design layout of Brivona Demo 3.

---

## 🏥 About the Facility
- **Business Name**: Lumbini Health Care Center (Lumbini Health Care Clinic)
- **Location**: Siddharthanagar-8, Bhairahawa, Rupandehi, Lumbini Province, Nepal
- **Specializations**: Gynecology & Obstetrics, Pediatrics & Neonatology, General Medicine OPD, Orthopedics, Digital USG & 12-lead ECG, 24/7 Emergency & Pharmacy.
- **Official Facebook**: [Lumbini Health Care Clinic](https://www.facebook.com/profile.php?id=100031414824460)
- **Phone / Emergency**: `+977-071-591486`

---

## 🚀 Tech Stack
- **Backend Framework**: Laravel 12 (`laravel/framework: ^12.0`)
- **Admin Panel**: Filament (`filament/filament: ^5.11`)
- **Reactive Frontend**: Livewire (`livewire/livewire: ^4.4`)
- **Styling**: Tailwind CSS v4 (`@tailwindcss/vite`) with custom typography & tokens from the Brivona design system
- **Database**: SQLite (or MySQL/PostgreSQL configurable in `.env`)
- **Icons**: Font Awesome 6 & Heroicons

---

## 🎨 Design System & Layout Breakdown
The website replicates all 15 sections from Brivona Demo 3 / attached banner:
1. **Top Bar Announcement & Emergency Strip** (Quick contact & social links)
2. **Main Navigation Header** (Brand logo, menu anchors, "Get Appointment" CTA)
3. **Hero Section** (Doctor portrait, "Make Your Health Great Again" headline, badges, trust stats)
4. **Three Quick Service Floating Cards** (Emergency Care, Gynecology & Maternity, Digital USG & Lab)
5. **About Us Section** (Split layout with Dr. Suresh Sharma medical director quote and clinical photo)
6. **Our Services 6-Card Grid** (Gynecology, Medicine, Pediatrics, Orthopedics, Lab, 24/7 Emergency)
7. **Clinical Gallery Strip** (4-photo clinic in action grid)
8. **Crimson Statistics Bar** (`#e12454` counter: 25k+ Patients, 920+ Procedures, 850+ Recoveries, 620+ Equipments)
9. **Meet Our Skilled Team** (Specialist doctor cards, credentials, social links)
10. **Global Healthcare & Insurance Network Banner**
11. **Words From Our Patients** (5-star verified testimonial cards)
12. **Livewire Real-time Appointment Booking** (Interactive form with validation and instant confirmation)
13. **Featured Blog Articles** (Editorial health and prenatal care guides)
14. **Pre-Footer Contact Banner** (Location, Opening Hours, Emergency Hotline)
15. **Main Dark Footer** (Official Facebook link, quick links, departments, copyright)

---

## 🔑 Admin Credentials (Filament)
The admin panel is accessible at `/stnapanel`:
- **URL**: `http://localhost:8000/stnapanel`
- **Email**: `admin@lumbinihealthcare.com`
- **Password**: `password`

### Managed Filament Resources:
- 📅 **Appointments**: View, filter, and change status (`pending`, `confirmed`, `completed`, `cancelled`) of patient booking requests.
- 👨‍⚕️ **Doctors**: Manage medical specialists, bios, photos, and contact info.
- 🩺 **Services**: Manage clinical departments, descriptions, and feature status.
- 💬 **Testimonials**: Manage patient reviews and star ratings.
- 📰 **Blog Posts**: Publish health articles and medical advisories.

---

## 🛠️ Quick Start Guide

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Configure Environment & Migrate
```bash
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

### 3. Build Frontend Assets
```bash
npm run build
# Or start Vite dev server:
npm run dev
```

### 4. Run Development Server
```bash
php artisan serve
```
Open [http://localhost:8000](http://localhost:8000) to view the website.

---

## 🧪 Running Tests
All unit and feature tests can be executed via:
```bash
php artisan test
```
