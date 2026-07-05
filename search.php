<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$category = isset($_GET['category']) ? (int) $_GET['category'] : 0;
$categories = get_categories($conn);

$where = "WHERE 1=1";
$params = [];
$types = '';

if ($q !== '') {
    $where .= " AND (a.title LIKE ? OR a.description LIKE ?)";
    $like = '%' . $q . '%';
    $params[] = $like;
    $params[] = $like;
    $types .= 'ss';
}

if ($category > 0) {
    $where .= " AND a.category_id = ?";
    $params[] = $category;
    $types .= 'i';
}

$sql = "SELECT a.*, c.name AS category_name,
            (SELECT image_path FROM ad_images WHERE ad_id = a.id LIMIT 1) AS image
        FROM ads a
        JOIN categories c ON a.category_id = c.id
        $where
        ORDER BY a.created_at DESC";

$stmt = mysqli_prepare($conn, $sql);
if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$ads = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result_count = count($ads);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $q ? htmlspecialchars($q) . ' - ' : ''; ?>Cari - OLX Clone</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <main class="search-page">
        <div class="container">

            <div class="search-info">
                <h1>
                    <?php if ($q): ?>
                        Hasil pencarian untuk "<strong><?php echo htmlspecialchars($q); ?></strong>"
                    <?php else: ?>
                        Semua Iklan
                    <?php endif; ?>
                </h1>
                <p class="search-count"><?php echo $result_count; ?> iklan ditemukan</p>
            </div>

            <?php if ($category > 0): ?>
                <?php $cat_name = get_category_name($conn, $category); ?>
                <div class="search-filters">
                    <span class="filter-tag">
                        <?php echo htmlspecialchars($cat_name); ?>
                        <a href="search.php?q=<?php echo urlencode($q); ?>" class="filter-remove">&times;</a>
                    </span>
                </div>
            <?php endif; ?>

            <?php if (count($ads) > 0): ?>
                <div class="ad-grid">
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
                </div>
            <?php else: ?>
                <div class="search-empty">
                    <div class="empty-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </div>
                    <h3>Tidak ditemukan</h3>
                    <p>Tidak ada iklan yang cocok dengan pencarian<?php echo $q ? ' "' . htmlspecialchars($q) . '"' : ''; ?>.</p>
                    <a href="index.php" class="btn-submit">Kembali ke Beranda</a>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
