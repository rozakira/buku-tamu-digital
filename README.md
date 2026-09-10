# Buku Tamu Digital - BPS Kota Bukittinggi

Aplikasi Buku Tamu Digital untuk mencatat data kunjungan tamu pada BPS Kota Bukittinggi.

Aplikasi ini dibuat menggunakan Laravel dan MySQL dengan fitur pencatatan tamu, pencarian data tamu, dashboard statistik, serta identifikasi sumber kunjungan berdasarkan URL yang digunakan.

## Fitur

- Form pengisian data tamu
- Validasi nama, nomor HP, dan email
- Pencatatan tanggal kunjungan
- Identifikasi sumber kunjungan:
  - Direct
  - WhatsApp
  - Instagram
  - Facebook
- Login admin
- Dashboard statistik tamu
- Rekap jumlah tamu berdasarkan sumber
- Daftar seluruh tamu
- Pencarian tamu berdasarkan nama
- Logout admin

## Teknologi

- PHP 8.2
- Laravel 12
- MySQL
- Blade
- HTML & CSS
- Laravel Breeze

## Data Tamu

Data yang dicatat oleh sistem meliputi:

- Nama Tamu
- Nomor HP
- Email
- Instansi
- Tujuan Kunjungan
- Tanggal Kunjungan
- Sumber Kunjungan

## URL Buku Tamu

Sistem menggunakan satu form buku tamu dengan beberapa URL berdasarkan sumber kunjungan:

| URL | Sumber |
|---|---|
| `/` | Direct |
| `/whatsapp` | WhatsApp |
| `/instagram` | Instagram |
| `/facebook` | Facebook |

Setiap data yang dikirim melalui URL tersebut akan otomatis menyimpan sumber kunjungan ke dalam database, sehingga admin dapat mengetahui jumlah pengunjung berdasarkan sumber kunjungannya.

## Halaman Admin

Login admin dapat diakses melalui:

```text
/login
```

Setelah login, admin dapat mengakses:

```text
/admin/dashboard
```

Dashboard menampilkan:

- Total seluruh tamu
- Jumlah tamu bulan ini
- Jumlah tamu berdasarkan sumber kunjungan

Daftar tamu dapat diakses melalui:

```text
/admin/guests
```

Pada halaman daftar tamu, admin dapat melihat seluruh data tamu dan melakukan pencarian berdasarkan nama.

## Akun Admin

Gunakan akun berikut untuk mengakses halaman admin:

```text
Email    : admin@bps.go.id
Password : Admin12345
```

## Instalasi

### 1. Clone repository

```bash
git clone [URL_REPOSITORY]
cd buku-tamu-digital
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Install dependency frontend

```bash
npm install
```

### 4. Buat file environment

Salin file `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

Pada Windows, file `.env` juga dapat dibuat dengan menyalin `.env.example` secara manual.

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Konfigurasi database

Buat database MySQL dengan nama:

```text
buku_tamu
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=buku_tamu
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL pada server yang digunakan.

### 7. Jalankan migration

```bash
php artisan migrate
```

Migration akan membuat tabel yang diperlukan oleh aplikasi, termasuk tabel `guests` untuk menyimpan data tamu.

### 8. Build frontend

```bash
npm run build
```

### 9. Jalankan aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

## Struktur Singkat

```text
app/
├── Http/
│   └── Controllers/
│       ├── Admin/
│       │   └── DashboardController.php
│       ├── Auth/
│       │   └── AuthenticatedSessionController.php
│       └── GuestController.php
└── Models/
    └── Guest.php

database/
└── migrations/
    └── create_guests_table.php

resources/
└── views/
    ├── admin/
    │   ├── dashboard.blade.php
    │   └── guests.blade.php
    └── guest/
        └── form.blade.php

routes/
└── web.php
```

## Catatan

- File `.env` tidak disertakan dalam repository karena berisi konfigurasi environment dan database.
- Gunakan `.env.example` sebagai template konfigurasi.
- Database dapat dibuat menggunakan migration Laravel yang tersedia pada folder `database/migrations`.
- Aplikasi menggunakan autentikasi admin untuk mengakses halaman dashboard dan daftar tamu.

---

**Buku Tamu Digital - BPS Kota Bukittinggi**