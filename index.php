<?php
require_once 'config.php';
require_once 'functions.php';

$categories = get_categories($conn);
$ads = get_ads($conn, 8);
?>
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

    <?php include 'includes/header.php'; ?>

    <nav class="category-nav">
        <div class="container">
            <?php foreach ($categories as $cat): ?>
                <a href="category.php?id=<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></a>
            <?php endforeach; ?>
        </div>
    </nav>

    <main>
        <section class="hero-banner">
            <div class="container">
                <div class="hero-content">
                    <h2>Pusatnya Nge-Deal</h2>
                    <p>Temukan barang impianmu dengan harga terbaik</p>
                </div>
            </div>
        </section>

        <section class="categories-section">
            <div class="container">
                <div class="section-header">
                    <h3>Kategori Populer</h3>
                    <a href="categories.php" class="lihat-semua">Lihat semua &rarr;</a>
                </div>
                <div class="category-grid">
                    <?php foreach ($categories as $cat): ?>
                    <a href="category.php?id=<?php echo $cat['id']; ?>" class="cat-card">
                        <div class="cat-icon"><?php echo strtoupper(substr($cat['name'], 0, 2)); ?></div>
                        <span><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="ads-section">
            <div class="container">
                <div class="section-header">
                    <h3>Iklan Terbaru</h3>
                    <a href="search.php" class="lihat-semua">Lihat semua &rarr;</a>
                </div>
                <div class="ad-grid">
                    <?php if (count($ads) > 0): ?>
                        <?php foreach ($ads as $ad): ?>
                        <a href="detail.php?id=<?php echo $ad['id']; ?>" class="ad-card">
                            <div class="ad-image">
                                <?php if ($ad['image']): ?>
                                    <img src="<?php echo $ad['image']; ?>" alt="<?php echo htmlspecialchars($ad['title']); ?>">
                                <?php else: ?>
                                    <img src="images/default.jpg" alt="No image">
                                <?php endif; ?>
                            </div>
                            <div class="ad-body">
                                <p class="ad-price"><?php echo rupiah($ad['price']); ?></p>
                                <h4 class="ad-title"><?php echo htmlspecialchars($ad['title']); ?></h4>
                                <p class="ad-meta">
                                    <span class="ad-location"><?php echo htmlspecialchars($ad['location'] ?: 'Indonesia'); ?></span>
                                    <span class="ad-date"><?php echo waktu_lalu($ad['created_at']); ?></span>
                                </p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-ads">Belum ada iklan. <a href="create_ad.php">Pasang iklan pertama</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

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
                        <?php foreach (array_slice($categories, 0, 4) as $cat): ?>
                            <li><a href="category.php?id=<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></a></li>
                        <?php endforeach; ?>
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