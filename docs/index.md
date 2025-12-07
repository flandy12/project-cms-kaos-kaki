# Pengantar Project CMS Kaos Kaki

Project ini adalah **Content Management System (CMS)** yang dibuat dengan **Laravel** untuk mengelola produk kaos kaki, kategori, penjualan, dan laporan penjualan. Sistem ini memudahkan admin untuk mengelola toko tanpa harus langsung mengubah database secara manual.

---

## Tujuan Sistem

1. Mempermudah admin dalam menambah, mengubah, dan menghapus produk.
2. Mengatur kategori produk dan stok dengan mudah.
3. Menyediakan laporan penjualan yang bisa diekspor ke Excel.
4. Mempermudah manajemen user dan role untuk keamanan akses.

---

## Alur Kerja CMS

### 1. Login & Autentikasi

-   Admin melakukan login menggunakan akun yang sudah didaftarkan.
-   Sistem menggunakan Laravel Jetstream untuk autentikasi dan manajemen user.
-   Role & permission diatur agar hanya admin tertentu yang bisa mengakses fitur spesifik.

### 2. Dashboard

-   Setelah login, admin diarahkan ke dashboard.
-   Dashboard menampilkan ringkasan:
    -   Jumlah produk
    -   Total penjualan
    -   Statistik kategori
    -   Notifikasi stok rendah

### 3. Manajemen Produk

-   Admin bisa:
    -   Menambah produk baru dengan nama, kategori, harga, stok, dan foto.
    -   Mengubah detail produk.
    -   Menghapus produk yang sudah tidak dijual.
-   Sistem otomatis mengupdate stok dan menampilkan status ketersediaan produk.

### 4. Manajemen Kategori

-   Admin dapat menambah kategori baru agar produk lebih terorganisir.
-   Kategori bisa diubah atau dihapus sesuai kebutuhan.

### 5. Penjualan & Laporan

-   Admin memasukkan transaksi penjualan manual.
-   Laporan penjualan dapat diakses dan diekspor dalam format Excel.
-   Filter laporan berdasarkan tanggal, kategori, atau produk tertentu.

### 6. Manajemen User & Role

-   Admin dapat menambah user baru dan menetapkan role:
    -   Admin penuh: akses semua fitur.
    -   Staf penjualan: akses input penjualan dan laporan.
-   Setiap aksi dicatat untuk keamanan dan audit trail.

---

## Struktur CMS Secara Singkat

project-cms-kaos-kaki/

─ app/ # Logika backend Laravel
─ resources/views # Blade templates untuk frontend
─ public/ # Aset publik (CSS, JS, gambar)
─ routes/ # Route untuk web & API
─ database/ # Migrasi & seeder
─ .env # Konfigurasi environment

## ⚙️ Persyaratan Sistem

Sebelum instalasi, pastikan sistem memenuhi kebutuhan berikut:

**Server / Local Development:**

-   PHP >= 8.1
-   Composer terbaru
-   MySQL/MariaDB atau PostgreSQL
-   Node.js & npm
-   Git
-   Laragon/xampp

## 🛠 Instalasi CMS

### 1. Clone Repository

```bash
git clone https://github.com/flandy12/project-cms-kaos-kaki.git
cd project-cms-kaos-kaki


2. Install Dependensi PHP & JS
composer install
npm install
npm run dev

3.Konfigurasi Environment
- cp .env.example .env
- php artisan key:generate

4. php artisan migrate
5. php artisan serve
```
