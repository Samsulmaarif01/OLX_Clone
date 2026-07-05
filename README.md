# OLX Clone

Platform jual beli online berbasis **PHP 8+** & **MySQL** — clone dari OLX Indonesia.  
Tanpa framework, 100% vanilla PHP/HTML/CSS/JS.

## Fitur

### Sudah Tersedia
- Registrasi & login pengguna (session-based, bcrypt)
- Pasang iklan dengan upload gambar (max 8 foto, preview client-side)
- Edit & hapus iklan milik sendiri
- 10 kategori iklan
- Halaman detail iklan dengan galeri gambar, breadcrumb, & iklan terkait
- Dashboard kelola iklan ("My Ads")
- Pencarian teks (halaman search, tinggal implementasi)
- Responsive design (mobile-first)
- Database auto-setup (dibuat otomatis saat pertama akses)
- Seeder untuk data dummy

### Belum Tersedia
- Halaman pencarian (`search.php`)
- Filter per kategori (`category.php`)
- Login sosial (Google/Facebook)
- Reset password
- Wishlist / Like
- Integrasi WhatsApp
- View counter

## Database

**4 tabel** (InnoDB, auto-created oleh `includes/config.php`):

| Tabel | Keterangan |
|-------|-----------|
| `users` | id, name, email, password (bcrypt), created_at |
| `categories` | id, name, icon — 10 kategori bawaan |
| `ads` | id, user_id, category_id, title, description, price, location, created_at |
| `ad_images` | id, ad_id, image_path |

Relasi: 1 user memiliki banyak iklan, 1 kategori memiliki banyak iklan, 1 iklan memiliki banyak gambar (cascade delete).

## Cara Menjalankan

### Prasyarat
- PHP 8+
- MySQL
- Web server (Apache via Laragon/XAMPP)

### Langkah
1. Letakkan folder ini di `C:\laragon\www\` atau `C:\xampp\htdocs\`
2. **(Otomatis)** Cukup akses `http://localhost/OLX_Clone` — database & tabel dibuat otomatis
3. **(Manual)** Alternatif: import `sql/olx_clone.sql` ke phpMyAdmin
4. Pastikan folder `uploads/` memiliki izin tulis
5. Akses `http://localhost/OLX_Clone`

### Isi Data Dummy
Kunjungi `http://localhost/OLX_Clone/seeder.php`  
Membuat 5 user & 20 iklan contoh. Semua password: `password123`

### Kredensial Test (setelah seeder)

| Email | Password |
|-------|----------|
| ahmad@example.com | password123 |
| siti@example.com | password123 |
| budi@example.com | password123 |
| dewi@example.com | password123 |
| rudi@example.com | password123 |

## Struktur File

```
OLX_Clone/
├── assets/
│   └── css/
│       └── style.css         # Semua styling (CSS)
├── includes/
│   ├── config.php            # Konfigurasi DB & auto-create schema
│   ├── functions.php         # Helper functions
│   └── header.php            # Navigasi & search bar
├── sql/
│   └── olx_clone.sql         # Dump SQL (manual import)
├── uploads/                  # Folder upload gambar
├── index.php                 # Halaman utama
├── login.php                 # Login
├── register.php              # Registrasi
├── logout.php                # Logout
├── post-ad.php               # Pasang iklan (PDO)
├── edit_ad.php               # Edit iklan
├── detail.php                # Detail iklan
├── myads.php                 # Dashboard iklan saya
├── seeder.php                # Seeder data dummy
├── LICENSE                   # MIT
└── README.md
```

## Teknologi

- **Backend:** PHP 8+ (native, mysqli)
- **Frontend:** HTML5, CSS3 (custom properties, grid, flexbox), JavaScript vanilla
- **Database:** MySQL
- **Dependencies:** None (zero external packages)

## Lisensi

MIT
