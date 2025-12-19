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
