# 🚀 ProFolio CMS - Multi-Tenant Developer Portfolio Engine

**ProFolio CMS** is a high-performance, dynamic content management system designed for developers and creatives. Built with the cutting-edge **TALL Stack (Laravel 12, Livewire 3, Alpine.js, Tailwind CSS)**, it moves beyond static portfolios by offering a scalable, multi-user architecture.

## 🌟 Key Highlights

- **Multi-Tenant Architecture:** Scalable system supporting multiple independent admins, each with their own isolated workspace and profile.
- **Dynamic Scoped Dashboard:** A personalized dashboard that filters statistics (Projects, Skills, Activity) based on the authenticated profile.
- **Unified Profile Orchestration:** Integrated user-profile creation logic that automatically generates professional profiles upon admin registration.
- **Global Settings Modal:** A reactive, Alpine-powered account settings interface accessible from any part of the admin panel.
- **Modern UI/UX:** A sleek, glassmorphism-inspired dark interface optimized for speed and productivity.
- **Inquiry Management:** A centralized hub for managing incoming messages and potential leads with real-time notifications.

## 🛠 Technical Stack

- **Framework:** [Laravel 11](laravel.com) (The latest PHP evolution)
- **Frontend Logic:** [Livewire 3](livewire.laravel.com) & [Laravel Volt](livewire.laravel.comdocs/volt) (Functional API)
- **Styling:** [Tailwind CSS](tailwindcss.com)
- **Database:** MySQL 8.4 (with complex Eloquent relationships)
- **Reactivity:** [Alpine.js](alpinejs.dev)
- **Asset Bundle:** [Vite 6](vitejs.dev)

## 🏗 System Architecture

The core of the system relies on an abstract **`AdminComponent`**. This base class dynamically resolves the `profile_id` for each authenticated admin, ensuring strict data isolation across all Livewire components. By leveraging **Laravel Volt**, the application benefits from reduced boilerplate and significantly faster development cycles.

## 🚀 Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone github.com
   cd profolio-cms
Use code with caution.

Install dependencies:
bash
composer install
npm install
Use code with caution.

Environment Configuration:
bash
cp .env.example .env
php artisan key:generate
Use code with caution.

Database Migration:
Update your .env with your database credentials first.
bash
php artisan migrate
Use code with caution.

Storage Link:
bash
php artisan storage:link
Use code with caution.

Run Development Server:
bash
npm run dev
php artisan serve
Use code with caution.

📸 Preview
(Add high-quality screenshots of the Dashboard and the Home profile here)
🛡️ Security
This project implements:
Role-Based Access Control (RBAC).
Secure CSRF protection for Livewire actions.
Scoped Eloquent queries to prevent cross-profile data leaks.
📝 License
Distributed under the MIT License. See LICENSE for more information.
Developed by Ehsan Pazhman