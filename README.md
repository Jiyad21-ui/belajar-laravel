# Project Laravel CRUD Artikel

## Anggota Kelompok
1. Jiyad Al Khalqi (230705113)
2. Murdnail (230705131)
3. Rizki Ramadhan (230705087)

## Deskripsi
Project web sederhana menggunakan framework Laravel.  
Project ini dibuat sebagai pengganti ujian mata kuliah Pemrograman Web.  
Aplikasi ini memiliki fitur login, register, dan CRUD Artikel.

## Fitur
- Login
- Register
- CRUD Artikel (Create, Read, Update, Delete)

## Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- Blade Template

## Cara Menjalankan Project
1. Clone repository ini
2. Masuk ke folder project
3. Copy file `.env.example` menjadi `.env`
4. Atur konfigurasi database di file `.env`
5. Jalankan perintah berikut:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
