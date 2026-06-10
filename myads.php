<?php
require_once 'config.php';
require_once 'functions.php';
redirect_if_not_logged_in();

$user_id = $_SESSION['user_id'];
$ads = get_user_ads($conn, $user_id);
$categories = get_categories($conn);

// Handle delete
if (isset($_GET['delete'])) {
    $ad_id = (int) $_GET['delete'];
    $stmt = mysqli_prepare($conn, "SELECT id FROM ads WHERE id = ? AND user_id = ?");
    mysqli_stmt_bind_param($stmt, 'ii', $ad_id, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $stmt = mysqli_prepare($conn, "SELECT image_path FROM ad_images WHERE ad_id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $ad_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($img = mysqli_fetch_assoc($result)) {
            if (file_exists($img['image_path'])) unlink($img['image_path']);
        }

        mysqli_query($conn, "DELETE FROM ads WHERE id = $ad_id");
        header('Location: myads.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iklan Saya - OLX Clone</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <main class="myads-page">
        <div class="container">
            <div class="myads-header">
                <h1>Iklan Saya</h1>
                <a href="create_ad.php" class="btn-submit">+ Pasang Iklan Baru</a>
            </div>

            <?php if (count($ads) > 0): ?>
                <div class="myads-table-wrap">
                    <table class="myads-table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ads as $ad): ?>
                            <tr>
                                <td>
                                    <?php if ($ad['image']): ?>
                                        <img src="<?php echo $ad['image']; ?>" class="myad-thumb" alt="thumb">
                                    <?php else: ?>
                                        <img src="https://placehold.co/400x300/002f34/23e5db?text=No+Image" class="myad-thumb" alt="thumb">
                                    <?php endif; ?>
                                </td>
                                <td><a href="detail.php?id=<?php echo $ad['id']; ?>"><?php echo htmlspecialchars($ad['title']); ?></a></td>
                                <td><?php echo htmlspecialchars($ad['category_name']); ?></td>
                                <td><?php echo rupiah($ad['price']); ?></td>
                                <td><?php echo date('d M Y', strtotime($ad['created_at'])); ?></td>
                                <td class="action-cell">
                                    <a href="edit_ad.php?id=<?php echo $ad['id']; ?>" class="btn-sm btn-edit">Edit</a>
                                    <a href="myads.php?delete=<?php echo $ad['id']; ?>" class="btn-sm btn-hapus" onclick="return confirm('Hapus iklan ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="myads-empty">
                    <p>Kamu belum memiliki iklan.</p>
                    <a href="create_ad.php" class="btn-submit">Pasang Iklan Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2026 OLX Clone. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>