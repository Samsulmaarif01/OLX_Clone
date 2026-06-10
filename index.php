<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLX Clone - Pusatnya Nge-Deal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="header-inner">
            <a href="index.php" class="logo">
                <svg viewBox="0 0 100 28" class="logo-svg">
                    <text x="0" y="22" font-family="Inter, sans-serif" font-weight="800" font-size="24" fill="#002f34">OLX</text>
                    <text x="48" y="22" font-family="Inter, sans-serif" font-weight="300" font-size="14" fill="#002f34">Clone</text>
                </svg>
            </a>
            <div class="header-location">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#002f34" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <span>Seluruh Indonesia</span>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#002f34" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
            </div>
            <div class="header-search">
                <form action="search.php" method="GET">
                    <input type="text" name="q" placeholder="Cari di OLX Clone" autocomplete="off">
                    <button type="submit">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </button>
                </form>
            </div>
            <nav class="header-nav">
                <a href="login.php">Masuk</a>
                <a href="register.php">Daftar</a>
                <a href="create_ad.php" class="btn-pasang">Pasang Iklan</a>
            </nav>
        </div>
    </header>

    <!-- Navigasi Kategori -->
    <nav class="category-nav">
        <div class="container">
            <a href="category.php?id=1">Mobil</a>
            <a href="category.php?id=2">Motor</a>
            <a href="category.php?id=3">Handphone & Gadget</a>
            <a href="category.php?id=4">Properti</a>
            <a href="category.php?id=5">Fashion</a>
            <a href="category.php?id=6">Elektronik</a>
            <a href="category.php?id=7">Hobi & Olahraga</a>
            <a href="category.php?id=8">Rumah Tangga</a>
            <a href="category.php?id=9">Jasa & Lowongan</a>
            <a href="category.php?id=10">Kantor & Industri</a>
        </div>
    </nav>

    <main>
        <!-- Hero Banner -->
        <section class="hero-banner">
            <div class="container">
                <div class="hero-content">
                    <h2>Pusatnya Nge-Deal</h2>
                    <p>Temukan barang impianmu dengan harga terbaik</p>
                </div>
            </div>
        </section>

        <!-- Kategori Ikon -->
        <section class="categories-section">
            <div class="container">
                <div class="section-header">
                    <h3>Kategori Populer</h3>
                    <a href="categories.php" class="lihat-semua">Lihat semua &rarr;</a>
                </div>
                <div class="category-grid">
                    <a href="category.php?id=1" class="cat-card">
                        <div class="cat-icon" style="background:#ffe6e6">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#e53935" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/><circle cx="8" cy="14" r="1.5" fill="#e53935"/><circle cx="16" cy="14" r="1.5" fill="#e53935"/></svg>
                        </div>
                        <span>Mobil</span>
                    </a>
                    <a href="category.php?id=2" class="cat-card">
                        <div class="cat-icon" style="background:#e6f7ff">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0097a7" stroke-width="1.5"><circle cx="6" cy="16" r="3"/><circle cx="18" cy="16" r="3"/><path d="M6 13V5h6l4 4v4"/><line x1="12" y1="5" x2="12" y2="9" stroke="#0097a7"/><line x1="12" y1="9" x2="16" y2="9" stroke="#0097a7"/></svg>
                        </div>
                        <span>Motor</span>
                    </a>
                    <a href="category.php?id=3" class="cat-card">
                        <div class="cat-icon" style="background:#e8f5e9">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#43a047" stroke-width="1.5"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/><line x1="9" y1="6" x2="15" y2="6"/></svg>
                        </div>
                        <span>Handphone</span>
                    </a>
                    <a href="category.php?id=4" class="cat-card">
                        <div class="cat-icon" style="background:#fff3e0">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ef6c00" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        </div>
                        <span>Properti</span>
                    </a>
                    <a href="category.php?id=5" class="cat-card">
                        <div class="cat-icon" style="background:#fce4ec">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#d81b60" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        </div>
                        <span>Fashion</span>
                    </a>
                    <a href="category.php?id=6" class="cat-card">
                        <div class="cat-icon" style="background:#e3f2fd">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#1565c0" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        </div>
                        <span>Elektronik</span>
                    </a>
                    <a href="category.php?id=7" class="cat-card">
                        <div class="cat-icon" style="background:#f3e5f5">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#8e24aa" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        </div>
                        <span>Hobi & Olahraga</span>
                    </a>
                    <a href="category.php?id=8" class="cat-card">
                        <div class="cat-icon" style="background:#fff8e1">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#f57f17" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><line x1="9" y1="22" x2="9" y2="12" stroke="#f57f17"/><line x1="15" y1="22" x2="15" y2="12" stroke="#f57f17"/><line x1="9" y1="12" x2="15" y2="12" stroke="#f57f17"/></svg>
                        </div>
                        <span>Rumah Tangga</span>
                    </a>
                    <a href="category.php?id=9" class="cat-card">
                        <div class="cat-icon" style="background:#e0f7fa">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#00838f" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <span>Jasa & Lowongan</span>
                    </a>
                    <a href="category.php?id=10" class="cat-card">
                        <div class="cat-icon" style="background:#eceff1">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#546e7a" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <span>Kantor & Industri</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Iklan Terbaru -->
        <section class="ads-section">
            <div class="container">
                <div class="section-header">
                    <h3>Iklan Terbaru</h3>
                    <a href="search.php" class="lihat-semua">Lihat semua &rarr;</a>
                </div>
                <div class="ad-grid">
                    <a href="detail.php?id=1" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                            <span class="ad-condition">Baru</span>
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 1.000.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Jakarta Pusat</span>
                                <span class="ad-date">Hari ini</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=2" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 2.500.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Bandung</span>
                                <span class="ad-date">Kemarin</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=3" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 50.000.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Surabaya</span>
                                <span class="ad-date">3 hari lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=4" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 150.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Yogyakarta</span>
                                <span class="ad-date">1 minggu lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=5" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 12.000.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Tangerang</span>
                                <span class="ad-date">5 hari lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=6" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                            <span class="ad-featured">Premium</span>
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 850.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Depok</span>
                                <span class="ad-date">2 hari lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=7" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 5.000.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Semarang</span>
                                <span class="ad-date">4 hari lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=8" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 350.000</p>
                            <h4 class="ad-title">Judul Iklan Menarik Disini</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Bogor</span>
                                <span class="ad-date">Hari ini</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h5>OLX Clone</h5>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Bantuan</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Kategori</h5>
                    <ul>
                        <li><a href="category.php?id=1">Mobil</a></li>
                        <li><a href="category.php?id=2">Motor</a></li>
                        <li><a href="category.php?id=3">Handphone</a></li>
                        <li><a href="category.php?id=4">Properti</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Ikuti Kami</h5>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">YouTube</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Download Aplikasi</h5>
                    <p class="app-desc">Tersedia di Google Play dan App Store</p>
                    <div class="app-badges">
                        <span class="badge">Google Play</span>
                        <span class="badge">App Store</span>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 OLX Clone. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>