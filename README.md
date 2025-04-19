# 📚 ReadTogether — A Simple Laravel Book Club Platform

A Laravel-based web app where users can browse books, express interest, leave comments, and rate titles. Admins can manage the book collection and moderate interactions.

## ✨ Features

- 🔐 User Authentication (Login/Register)
- 👥 User Roles: Admin & Viewer
- 📘 Book CRUD (Admin only)
- ⭐ Ratings and Reviews (Users)
- 💬 Commenting system
- ❤️ "Mark as Interested" feature
- 🖼️ Book image uploads
- 🔎 Search and pagination
- 🎨 Responsive layout using Tailwind CSS

## ⚙️ Tech Stack

- **Framework**: Laravel 10+
- **Frontend**: Blade, Tailwind CSS
- **Auth**: Laravel Breeze / Jetstream (choose one)
- **Database**: MySQL or PostgreSQL
- **Optional**: Livewire or Alpine.js (for interactivity)

## 🏁 Getting Started

### 1. Clone the repo

```bash
git clone https://github.com/your-username/readtogether.git
cd readtogether
```

### 2. Install dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Setup environment

```bash
cp .env.example .env
php artisan key:generate
```

Update your `.env` file with your database credentials.

### 4. Migrate and seed

```bash
php artisan migrate --seed
```

This will create the tables and seed:
- Admin user: `admin@example.com` / `password`
- Viewer user: `viewer@example.com` / `password`

## 🔐 User Roles

- **Admin**: Can create, edit, delete books and moderate content
- **Viewer**: Can rate, comment, express interest

Role is assigned via a boolean `is_admin` field in the `users` table.

## 🗂 Project Structure

```plaintext
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
├── Models/
│   ├── Book.php
│   ├── Comment.php
│   ├── Rating.php
│   └── Interest.php
resources/
├── views/
│   ├── books/
│   ├── comments/
│   ├── layouts/
│   └── dashboard.blade.php
routes/
├── web.php
├── admin.php (optional)
database/
├── seeders/
├── migrations/
```

## 📷 Screenshots (optional)

_Soon..._

## 📌 To Do / Improvements

- [ ] Add filtering by genre
- [ ] Email notifications for new comments (optional)
- [ ] Add book tags (many-to-many)
- [ ] API routes (for mobile or SPA)

## 🙌 Credits

Inspired by Laravel learning paths. Designed for educational use and practicing Laravel concepts.

## 📄 License

MIT License
