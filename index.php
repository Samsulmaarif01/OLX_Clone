<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$categories = get_categories($conn);
$ads = get_ads($conn, 8);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLX Clone - Pusatnya Nge-Deal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
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
                    <?php
                    $icon_map = [
                        'car' => 'directions_car', 'motorcycle' => 'motorcycle', 'phone' => 'smartphone',
                        'home' => 'home', 'shirt' => 'checkroom', 'tv' => 'tv',
                        'sports' => 'sports_soccer', 'kitchen' => 'kitchen', 'briefcase' => 'work',
                        'office' => 'business',
                    ];
                    ?>
                    <?php foreach ($categories as $cat): ?>
                    <a href="category.php?id=<?php echo $cat['id']; ?>" class="cat-card">
                        <div class="cat-icon"><span class="material-symbols-outlined"><?php echo $icon_map[$cat['icon']] ?? 'box'; ?></span></div>
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
                                    <img src="https://placehold.co/400x300/002f34/23e5db?text=No+Image" alt="No image">
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
                        <p class="no-ads">Belum ada iklan. <a href="post-ad.php">Pasang iklan pertama</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>