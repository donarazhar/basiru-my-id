<p align="center">
  <img src="public/assets/img/logobasiru.png" alt="BASIRU Logo" width="120">
</p>

<h1 align="center">BASIRU.MY.ID</h1>

<p align="center">
  <strong>Website Pengembangan Kompetensi Guru PAUD</strong><br>
  Platform edukasi digital untuk mendukung peningkatan kompetensi guru Pendidikan Anak Usia Dini (PAUD)
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Bootstrap-5.2-7952B3?logo=bootstrap&logoColor=white" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white" alt="MySQL">
</p>

---

## 📖 Tentang

**BASIRU** (Belajar Asyik Seru Inspiratif dan RUpawan) adalah website yang dirancang untuk para praktisi PAUD sebagai platform berbagi ilmu, praktik baik, dan sumber belajar digital. Website ini dikelola melalui admin panel yang lengkap dan mudah digunakan.

## ✨ Fitur Utama

### 🌐 Website Publik

- **Halaman Utama** — Hero section dinamis, galeri foto, video YouTube, quiz interaktif, dan formulir kontak
- **Praktik Baik** — Kumpulan artikel best practice dengan cover image, paginasi, dan fitur share (WhatsApp, Facebook, Twitter, Copy Link)
- **Perpustakaan** — Koleksi buku dan referensi dengan link download
- **Buku Digital** — Koleksi e-book dengan cover image dan file PDF
- **Open Graph** — Preview thumbnail & deskripsi saat link dibagikan di WhatsApp/sosial media
- **Responsive** — Tampilan optimal di desktop, tablet, dan mobile

### 🔒 Admin Panel

- **Dashboard** — Statistik ringkasan konten (galeri, video, artikel, quiz, perpustakaan, buku digital)
- **Manajemen Galeri** — Upload, edit, hapus foto galeri
- **Manajemen Video** — Kelola video YouTube dengan auto-thumbnail
- **Manajemen Praktik Baik** — CRUD artikel dengan rich text editor
- **Manajemen Buku Digital** — Upload cover & file PDF
- **Manajemen Perpustakaan** — Kelola koleksi buku & referensi
- **Manajemen Quiz** — Buat quiz interaktif untuk pengunjung
- **Manajemen Pesan** — Baca & kelola pesan dari formulir kontak (badge notifikasi unread)
- **Pengaturan Situs** — Konfigurasi judul, logo, favicon, hero section, sosial media, footer
- **Profil Admin** — Upload foto, ubah nama, email, dan password

## 🛠️ Tech Stack

| Komponen   | Teknologi                       |
| ---------- | ------------------------------- |
| Backend    | Laravel 12 (PHP 8.2+)           |
| Frontend   | Blade Templates, Bootstrap 5.2  |
| Database   | MySQL 8.0                       |
| Font       | Montserrat, Lato (Google Fonts) |
| Icon       | Font Awesome 6                  |
| Animasi    | AOS (Animate On Scroll)         |
| Build Tool | Vite                            |

## 📁 Struktur Proyek

```
basiru-web/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Controller admin panel
│   │   │   ├── DashboardController.php
│   │   │   ├── GalleryController.php
│   │   │   ├── VideoController.php
│   │   │   ├── BestPracticeController.php
│   │   │   ├── DigitalBookController.php
│   │   │   ├── LibraryController.php
│   │   │   ├── QuizController.php
│   │   │   ├── ContactController.php
│   │   │   ├── SiteSettingController.php
│   │   │   └── ProfileController.php
│   │   ├── HomeController.php          # Halaman utama
│   │   ├── BestPracticeController.php  # Praktik baik (publik)
│   │   ├── DigitalBookController.php   # Buku digital (publik)
│   │   ├── LibraryController.php       # Perpustakaan (publik)
│   │   └── ContactController.php       # Formulir kontak
│   └── Models/
│       ├── User.php
│       ├── Gallery.php
│       ├── Video.php
│       ├── BestPractice.php
│       ├── DigitalBook.php
│       ├── LibraryItem.php
│       ├── Quiz.php
│       ├── Contact.php
│       └── SiteSetting.php
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php       # Layout publik
│   │   └── admin.blade.php     # Layout admin
│   ├── admin/                  # Halaman admin panel
│   ├── auth/                   # Login
│   ├── best-practices/         # Halaman praktik baik
│   ├── digital-books/          # Halaman buku digital
│   ├── library/                # Halaman perpustakaan
│   └── home.blade.php          # Halaman utama
├── routes/
│   └── web.php                 # Semua route (publik & admin)
├── database/
│   ├── migrations/             # Skema database
│   └── seeders/                # Data awal
└── public/
    └── assets/                 # Asset statis (gambar, ikon)
```

## 🚀 Instalasi

### Prasyarat

- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js 18+ & npm

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/donarazhar/basiru-my-id.git
cd basiru-my-id

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Konfigurasi database di .env
# DB_DATABASE=basiru_web
# DB_USERNAME=root
# DB_PASSWORD=your_password

# 5. Jalankan migration & seeder
php artisan migrate --seed

# 6. Buat storage link
php artisan storage:link

# 7. Build asset
npm run build

# 8. Jalankan server
php artisan serve
```

Atau gunakan shortcut:

```bash
composer setup          # Install + migrate + build
composer dev            # Jalankan server + queue + logs + vite secara bersamaan
```

### Akses

- **Website**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin
- **Login**: http://localhost:8000/login

## 📦 Database Seeders

Jalankan `php artisan db:seed` untuk mengisi data awal:

| Seeder               | Deskripsi                   |
| -------------------- | --------------------------- |
| `AdminUserSeeder`    | Akun admin default          |
| `SiteSettingSeeder`  | Pengaturan situs default    |
| `GallerySeeder`      | Contoh galeri foto          |
| `VideoSeeder`        | Contoh video                |
| `BestPracticeSeeder` | Contoh artikel praktik baik |
| `DigitalBookSeeder`  | Contoh buku digital         |
| `LibraryItemSeeder`  | Contoh koleksi perpustakaan |
| `QuizSeeder`         | Contoh quiz                 |
| `ContactSeeder`      | Contoh pesan kontak         |

## 🌍 Deployment

### Server Requirements

- PHP 8.2+ dengan ekstensi: `mbstring`, `openssl`, `pdo_mysql`, `tokenizer`, `xml`, `ctype`, `json`
- MySQL 8.0+
- Nginx atau Apache
- Composer

### Deployment Steps

```bash
# Di server
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
npm run build
```

## 📝 Lisensi

Project ini dibuat oleh **Dona R. Azhar** untuk keperluan pengembangan kompetensi guru PAUD.
