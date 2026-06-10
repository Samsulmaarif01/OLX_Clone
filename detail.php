<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Iklan - OLX Clone</title>
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

    <main class="detail-page">
        <div class="container">

            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="index.php">Beranda</a>
                <span class="sep">/</span>
                <a href="category.php?id=3">Handphone & Gadget</a>
                <span class="sep">/</span>
                <span class="current">Detail Iklan</span>
            </nav>

            <div class="detail-layout">

                <!-- ========== LEFT COLUMN ========== -->
                <div class="detail-left">

                    <!-- Image Gallery -->
                    <div class="gallery-card">
                        <div class="gallery-main">
                            <img src="images/default.jpg" alt="Gambar Iklan" id="mainImage">
                            <button class="gallery-nav prev" onclick="changeImage(-1)">&#8249;</button>
                            <button class="gallery-nav next" onclick="changeImage(1)">&#8250;</button>
                            <div class="gallery-counter" id="imageCounter">1/4</div>
                        </div>
                        <div class="gallery-thumbs" id="galleryThumbs">
                            <img src="images/default.jpg" class="thumb active" onclick="setImage(0)" alt="thumb">
                            <img src="images/default.jpg" class="thumb" onclick="setImage(1)" alt="thumb">
                            <img src="images/default.jpg" class="thumb" onclick="setImage(2)" alt="thumb">
                            <img src="images/default.jpg" class="thumb" onclick="setImage(3)" alt="thumb">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="detail-section description-card">
                        <div class="detail-section-header">
                            <h3>Deskripsi</h3>
                            <div class="detail-actions-top">
                                <button class="action-btn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 10v12"/><path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z"/></svg>
                                    <span class="like-count">0</span>
                                </button>
                                <button class="action-btn share-btn" onclick="navigator.clipboard?.writeText(window.location.href)">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                                </button>
                            </div>
                        </div>
                        <p class="description-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>

                    <!-- Detail Information -->
                    <div class="detail-section info-card">
                        <h3>Detail Iklan</h3>
                        <table class="info-table">
                            <tr>
                                <td>Kategori</td>
                                <td>Handphone & Gadget</td>
                            </tr>
                            <tr>
                                <td>Kondisi</td>
                                <td><span class="badge-condition">Baru</span></td>
                            </tr>
                            <tr>
                                <td>Merk</td>
                                <td>Samsung</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>Galaxy S24</td>
                            </tr>
                            <tr>
                                <td>Kapasitas</td>
                                <td>256 GB</td>
                            </tr>
                            <tr>
                                <td>Warna</td>
                                <td>Hitam</td>
                            </tr>
                            <tr>
                                <td>ID Iklan</td>
                                <td>123456789</td>
                            </tr>
                            <tr>
                                <td>Dilihat</td>
                                <td>234 kali</td>
                            </tr>
                            <tr>
                                <td>Diposting</td>
                                <td>10 Juni 2026</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Location -->
                    <div class="detail-section location-card">
                        <h3>Lokasi</h3>
                        <div class="location-info">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            <span>Jakarta Pusat, Jakarta</span>
                        </div>
                        <div class="location-map">Map</div>
                    </div>

                    <!-- Report -->
                    <div class="report-section">
                        <button class="report-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>
                            Laporkan iklan ini
                        </button>
                    </div>

                </div>

                <!-- ========== RIGHT COLUMN ========== -->
                <div class="detail-right">

                    <!-- Price & Title Card -->
                    <div class="sidebar-card price-card">
                        <div class="price-header">
                            <div class="ad-condition-label">Baru</div>
                        </div>
                        <div class="price-amount">Rp 12.000.000</div>
                        <h1 class="detail-title">Samsung Galaxy S24 256GB Hitam Garansi Resmi</h1>
                        <div class="detail-meta">
                            <div class="meta-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span>Jakarta Pusat</span>
                            </div>
                            <div class="meta-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <span>Hari ini</span>
                            </div>
                        </div>
                    </div>

                    <!-- Seller Card -->
                    <div class="sidebar-card seller-card">
                        <div class="seller-info">
                            <div class="seller-avatar">R</div>
                            <div class="seller-details">
                                <h4>Rizky Pratama</h4>
                                <p>Anggota sejak 2024</p>
                            </div>
                        </div>
                        <div class="seller-stats">
                            <div class="stat">
                                <span class="stat-value">12</span>
                                <span class="stat-label">Iklan</span>
                            </div>
                            <div class="stat">
                                <span class="stat-value">4.8</span>
                                <span class="stat-label">Rating</span>
                            </div>
                            <div class="stat">
                                <span class="stat-value">100%</span>
                                <span class="stat-label">Respon</span>
                            </div>
                        </div>
                        <button class="btn-chat">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            Chat dengan Penjual
                        </button>
                        <button class="btn-wa">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Hubungi via WhatsApp
                        </button>
                    </div>

                    <!-- Safety Tips -->
                    <div class="sidebar-card safety-card">
                        <h4>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Tips Keamanan
                        </h4>
                        <ul>
                            <li>Bertemulah dengan penjual di tempat umum</li>
                            <li>Periksa barang sebelum membayar</li>
                            <li>Hindari transfer pembayaran di muka</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Related Ads -->
            <section class="related-ads">
                <div class="section-header">
                    <h3>Iklan Serupa</h3>
                    <a href="search.php?q=handphone" class="lihat-semua">Lihat semua &rarr;</a>
                </div>
                <div class="ad-grid">
                    <a href="detail.php?id=5" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 10.500.000</p>
                            <h4 class="ad-title">iPhone 15 Pro Max 256GB</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Jakarta</span>
                                <span class="ad-date">2 hari lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=6" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 8.000.000</p>
                            <h4 class="ad-title">Xiaomi 14 Pro 512GB</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Bandung</span>
                                <span class="ad-date">5 hari lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=7" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 15.000.000</p>
                            <h4 class="ad-title">Samsung Galaxy S24 Ultra</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Surabaya</span>
                                <span class="ad-date">1 minggu lalu</span>
                            </p>
                        </div>
                    </a>
                    <a href="detail.php?id=8" class="ad-card">
                        <div class="ad-image">
                            <img src="images/default.jpg" alt="Gambar Iklan">
                        </div>
                        <div class="ad-body">
                            <p class="ad-price">Rp 3.500.000</p>
                            <h4 class="ad-title">Google Pixel 8 128GB</h4>
                            <p class="ad-meta">
                                <span class="ad-location">Yogyakarta</span>
                                <span class="ad-date">3 hari lalu</span>
                            </p>
                        </div>
                    </a>
                </div>
            </section>

        </div>
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

    <script>
        const images = [
            'images/default.jpg',
            'images/default.jpg',
            'images/default.jpg',
            'images/default.jpg'
        ];
        let currentIndex = 0;

        function setImage(index) {
            currentIndex = index;
            document.getElementById('mainImage').src = images[currentIndex];
            document.querySelectorAll('.thumb').forEach((el, i) => {
                el.classList.toggle('active', i === currentIndex);
            });
            document.getElementById('imageCounter').textContent = (currentIndex + 1) + '/' + images.length;
        }

        function changeImage(dir) {
            let newIndex = currentIndex + dir;
            if (newIndex < 0) newIndex = images.length - 1;
            if (newIndex >= images.length) newIndex = 0;
            setImage(newIndex);
        }
    </script>

</body>
</html>