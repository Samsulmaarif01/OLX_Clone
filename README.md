# OLX Clone

![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-InnoDB-4479A1?logo=mysql)
![License](https://img.shields.io/badge/Lisensi-MIT-green)

Platform jual beli online terinspirasi dari [OLX Indonesia](https://www.olx.co.id) — dibangun dengan **PHP 8+ native**, **MySQL**, dan **nol dependensi eksternal**.

## Fitur

### Tersedia
- **Autentikasi pengguna** — registrasi, login/logout, session-based, bcrypt
- **Kelola iklan** — pasang (PDO), edit, hapus iklan dengan upload gambar (max 8 foto, format JPG/PNG/WebP)
- **Pencarian** — pencarian teks pada judul dan deskripsi iklan
- **Kategori** — 10 kategori bawaan dengan ikon Material
- **Lokasi** — 31 kota besar Indonesia, terintegrasi dengan database
- **Detail iklan** — galeri gambar, breadcrumb, iklan terkait, info penjual
- **Dashboard "Iklan Saya"** — kelola seluruh iklan milik sendiri
- **Toggle password** — tampilkan/sembunyikan password pada form login dan registrasi
- **Tampilan responsif** — mobile-first, adaptif di semua ukuran layar
- **Provisioning otomatis** — skema database dan data awal dibuat otomatis saat pertama diakses
- **Seeder demo** — 5 pengguna + 20 iklan contoh dengan satu klik

### Belum Tersedia
- Halaman filter kategori
- Login sosial (Google / Facebook)
- Reset password
- Wishlist / Favorit
- Integrasi WhatsApp
- Counter pengunjung

## Teknologi

| Lapisan | Teknologi |
|---------|-----------|
| **Backend** | PHP 8+ (native `mysqli` + `PDO`) |
| **Frontend** | HTML5, CSS3 (custom properties, grid, flexbox), JavaScript vanilla |
| **Database** | MySQL dengan InnoDB, foreign key, cascade delete |
| **Dependensi** | Tidak ada — zero dependency, tanpa Composer, tanpa npm |

## Skema Database

5 tabel InnoDB yang dibuat otomatis oleh `includes/config.php` saat pertama kali akses.

| Tabel | Deskripsi |
|-------|-----------|
| `users` | Data pengguna terdaftar (password bcrypt) |
| `categories` | 10 kategori iklan tetap dengan nama ikon Material |
| `ads` | Iklan: judul, deskripsi, harga, lokasi |
| `ad_images` | Gambar terkait iklan (cascade delete) |
| `locations` | 31 kota besar Indonesia |

**Relasi:**
- Satu pengguna memiliki banyak iklan
- Satu kategori memiliki banyak iklan
- Satu iklan memiliki banyak gambar (semua cascade on delete)

## Panduan Instalasi

### Prasyarat

- PHP 8.0+
- MySQL 5.7+ / MariaDB 10.3+
- Apache (Laragon, XAMPP, atau sejenisnya)

### Langkah-langkah

1. Letakkan folder ini di direktori web root:
   ```
   C:\laragon\www\OLX_Clone\
   ```
   atau
   ```
   C:\xampp\htdocs\OLX_Clone\
   ```

2. Pastikan folder `uploads/` memiliki izin tulis.

3. Buka browser dan akses:
   ```
   http://localhost/OLX_Clone
   ```
   **Database dan tabel akan dibuat secara otomatis** — tidak perlu konfigurasi manual.

4. *(Opsional)* Import `sql/olx_clone.sql` melalui phpMyAdmin sebagai alternatif.

### Mengisi Data Demo

Kunjungi `http://localhost/OLX_Clone/seeder.php` untuk mengisi database dengan:
- 5 pengguna demo
- 20 iklan contoh dengan gambar placeholder

Semua akun demo menggunakan password: **`password123`**

| Email | Password |
|-------|----------|
| ahmad@example.com | password123 |
| siti@example.com | password123 |
| budi@example.com | password123 |
| dewi@example.com | password123 |
| rudi@example.com | password123 |

## Struktur Proyek

```
OLX_Clone/
├── assets/
│   └── css/
│       └── style.css          # Seluruh styling CSS
├── includes/
│   ├── config.php             # Koneksi DB & pembuatan skema otomatis
│   ├── functions.php          # Fungsi bantu (helper)
│   └── header.php             # Navigasi & search bar
├── sql/
│   └── olx_clone.sql          # Dump database (import manual)
├── uploads/                   # Upload gambar iklan
├── index.php                  # Beranda
├── login.php                  # Masuk
├── register.php               # Daftar
├── logout.php                 # Keluar
├── post-ad.php                # Pasang iklan (PDO)
├── edit_ad.php                # Edit iklan
├── detail.php                 # Detail iklan dengan galeri
├── search.php                 # Hasil pencarian
├── myads.php                  # Dashboard iklan saya
├── seeder.php                 # Seeder data demo
├── AGENTS.md                  # Panduan untuk AI agent
├── LICENSE                    # Lisensi MIT
└── README.md
```

## Catatan

- **Tanpa framework** — proyek ini sengaja dibuat dengan vanilla PHP. Tidak ada Composer, npm, atau build step.
- **Zona waktu** disetel ke `Asia/Jakarta`.
- **Pelaporan error** dikonfigurasi untuk mencatat tanpa menampilkan ke layar.
- Seluruh halaman menggunakan file PHP flat di root — tanpa router atau pola MVC.
- `header.php` digunakan oleh hampir semua halaman dan menyediakan navigasi, pencarian, serta UI yang adaptif terhadap status login.

## Lisensi

MIT
