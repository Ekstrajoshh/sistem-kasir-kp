# ☕ Sistem Kasir & Manajemen Meja (Cafe POS)

Aplikasi Point of Sales (POS) berbasis web yang dirancang khusus untuk efisiensi operasional kafe/restoran, fokus pada manajemen menu, kategori, dan pemantauan status meja secara real-time.

## 🛠️ Tech Stack & Arsitektur
- **Backend:** Laravel 11/12
- **Frontend:** Blade Templating + **Bootstrap 5** (Migrasi dari Tailwind CSS)
- **Styling:** Custom SCSS dengan nuansa "Cafe Modern" (Coffee Tones)
- **Database:** SQLite
- **Assets Bundler:** Vite

## ✨ Fitur yang Sudah Selesai Dikerjakan

### 1. Fondasi Sistem & UI/UX
- [x] **Migrasi UI ke Bootstrap 5:** Menghapus total ketergantungan Tailwind CSS untuk kemudahan kustomisasi.
- [x] **Tema Cafe Modern:** Implementasi palet warna kopi (#3C2A21, #5F4033), font Poppins, dan icon Bootstrap.
- [x] **Layout Utama (Sidebar):** Navigasi samping yang responsif dengan indikator halaman aktif.
- [x] **Konfigurasi Vite SCSS:** Pipeline asset yang sudah terkonfigurasi untuk memproses file Sass.

### 2. Manajemen Database & Model
- [x] **Skema Database Lengkap:** Migrasi untuk tabel `users`, `categories`, `menus`, `tables`, `orders`, dan `order_items`.
- [x] **Relasi Eloquent:** Semua model (`Category`, `Menu`, `Table`, `Order`, `OrderItem`) sudah memiliki relasi yang tepat.
- [x] **Auto-Slug:** Generasi slug otomatis untuk kategori menggunakan Laravel Str.
- [x] **Database Seeder:** Data awal (Admin, Kategori, Menu, & Meja) untuk mempermudah testing.

### 3. Fitur CRUD (Selesai/On-Progress)
- [x] **Kategori Menu:** Full CRUD (Tambah, Lihat, Edit, Hapus).
- [x] **Manajemen Menu:** Backend controller siap, View Daftar Menu (Index) dengan desain modern.
- [x] **Manajemen Meja:** Backend controller siap, View Visualisasi Meja (Grid System) yang menunjukkan status Tersedia/Terisi.

## 🚀 Cara Instalasi
Jika Anda baru mengunduh atau mereset proyek ini, ikuti langkah berikut:

1. **Install Dependensi PHP:**
   ```bash
   composer install
   ```

2. **Install Dependensi Frontend:**
   ```bash
   npm install
   ```

3. **Konfigurasi Database:**
   Pastikan di file `.env` jalur database sudah absolut (sudah otomatis saya settingkan):
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=C:\laragon\www\sistem-kasir\database\database.sqlite
   ```

4. **Migrasi & Seeding:**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Jalankan Aplikasi:**
   ```bash
   # Terminal 1 (Laravel)
   php artisan serve
   
   # Terminal 2 (Vite Assets)
   npm run dev
   ```

## 🔐 Akun Demo (Default Seeder)
- **Email:** `admin@cafe.com`
- **Password:** `password`

## 📝 Catatan Perbaikan Terakhir
- Memperbaiki error `Database file does not exist` dengan menggunakan absolute path di `.env`.
- Membersihkan konflik `PostCSS` akibat sisa konfigurasi Tailwind.
- Menghapus `welcome.blade.php` dan mengalihkan landing page langsung ke Dashboard/Kategori.
