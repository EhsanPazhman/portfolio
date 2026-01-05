# ProFolio CMS
## Multi-Tenant Developer Portfolio Engine

ProFolio CMS is a modern, dynamic, and multi-tenant portfolio management system built with Laravel 12.
It enables developers to create and manage fully customizable personal portfolios through a clean admin dashboard.
This project is designed as a portfolio engine, not a static website.

---

## 🚀 Features

- **Multi-Tenant Architecture:** Scalable system supporting multiple independent admins, each with their own isolated workspace and profile.
- **Dynamic Scoped Dashboard:** A personalized dashboard that filters statistics (Projects, Skills, Activity) based on the authenticated profile.
- **Unified Profile Orchestration:** Integrated user-profile creation logic that automatically generates professional profiles upon admin registration.
- **Global Settings Modal:** A reactive, Alpine-powered account settings interface accessible from any part of the admin panel.
- **Modern UI/UX:** A sleek, glassmorphism-inspired dark interface optimized for speed and productivity.
- **Inquiry Management:** A centralized hub for managing incoming messages and potential leads with real-time notifications.


---

## 🛠 Tech Stack

- **Framework:** [Laravel 11](https://laravel.com) (The latest PHP evolution)
- **Frontend Logic:** [Livewire 3](https://livewire.laravel.com) & [Laravel Volt](livewire.laravel.com) (Functional API)
- **Styling:** [Tailwind CSS](https://tailwindcss.com)
- **Database:** MySQL 8.4 (with complex Eloquent relationships)
- **Reactivity:** [Alpine.js](https://alpinejs.dev)
- **Asset Bundle:** [Vite 6](https://vitejs.dev)

---

## 📂 Project Structure

app/
├── Livewire/            # Livewire components
├── Models/              # Eloquent models

resources/
├── views/               # Blade templates
├── css/                 # Tailwind styles
├── js/                  # Alpine.js & JS logic

routes/
├── auth.php
├── web.php

database/
├── factories/
├── migrations/
├── seeders/


---

## ⚙️ Installation

Clone the repository:

git clone https://github.com/EhsanPazhman/portfolio.git
cd portfolio

Install dependencies:

composer install
npm install

Environment setup:

cp .env.example .env
php artisan key:generate

Configure database in .env:

DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=

Run migrations:

php artisan migrate

Build assets:

npm run build

Serve the application:

php artisan serve

---

## 🧪 Development Mode

npm run dev

---

## 🎯 Use Cases

- Personal developer portfolio
- Freelancers and remote developers
- Portfolio SaaS starter project
- Laravel + Livewire learning project

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome.
Feel free to fork the repository and submit a pull request.

---

## 📄 License

This project is open-source and available under the MIT License.

---

## 👤 Author

Ehsanullah Pazhman  
Backend Developer (Laravel / PHP)  
GitHub: https://github.com/EhsanPazhman
