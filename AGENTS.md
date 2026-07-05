# OLX Clone — Agent Guide

## Stack
- **Vanilla PHP 8+** (no framework, no composer, no npm, no dependencies)
- **MySQL** via `mysqli_*` functions (not PDO)
- **Apache** (Laragon/XAMPP on Windows)

## Project structure
- `includes/config.php` — DB connection, auto-creates DB + tables + seed categories on every page load
- `includes/functions.php` — helpers: auth check, `rupiah()`, `waktu_lalu()`, ad/category queries
- `includes/header.php` — nav + search bar (included by most pages)
- Page files are flat PHP at repo root (no router, no MVC)

## Running the project
1. Place folder in `C:\laragon\www\` or `C:\xampp\htdocs\`
2. Access `http://localhost/OLX_Clone` — database & schema are created automatically (see `config.php`)
3. `uploads/` directory must be writable
4. Seed data: hit `http://localhost/OLX_Clone/seeder.php` (creates 5 users, 20 ads; all passwords: `password123`)

## Database
4 InnoDB tables: `users`, `categories` (10 fixed), `ads`, `ad_images`.  
Auto-created by `config.php` on first request. Foreign keys with `CASCADE DELETE`.  
Timezone: `Asia/Jakarta`.

## Auth
Session-based. `bcrypt` password hashing (`PASSWORD_DEFAULT`).  
`config.php` calls `session_regenerate_id()` on first visit.  
`logout.php` calls `session_destroy()`.

## Uploads
- Max 8 images per ad
- Allowed formats: `jpg, jpeg, png, webp`
- Stored in `uploads/` with filename pattern: `{ad_id}_{timestamp}_{index}.{ext}`
- No image validation beyond extension check

## No tests, no CI, no linter, no typechecker, no build step
This project has zero automated testing, zero CI, zero linting/formatting config, and zero package management files. No commands to run.

## Known missing pages (not implemented)
`search.php`, `category.php`, social login, password reset, wishlist, WhatsApp integration, view counter.
