<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
redirect_if_not_logged_in();

$user_id = $_SESSION['user_id'];
$ad_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$ad = get_ad_by_id($conn, $ad_id);
if (!$ad || $ad['user_id'] != $user_id) {
    header('Location: myads.php');
    exit;
}

$images = get_ad_images($conn, $ad_id);
$categories = get_categories($conn);
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = (int) $_POST['category_id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = str_replace(',', '', $_POST['price']);
    $location = trim($_POST['location']);

    if (empty($title) || empty($description) || empty($price) || $category_id < 1) {
        $error = 'Semua field wajib diisi.';
    } elseif (!is_numeric($price) || $price <= 0) {
        $error = 'Harga harus angka positif.';
    } else {
        $stmt = mysqli_prepare($conn, "UPDATE ads SET category_id=?, title=?, description=?, price=?, location=? WHERE id=? AND user_id=?");
        mysqli_stmt_bind_param($stmt, 'issdsii', $category_id, $title, $description, $price, $location, $ad_id, $user_id);
        mysqli_stmt_execute($stmt);

        if (!empty($_FILES['photos']['name'][0])) {
            $upload_dir = 'uploads/';
            $total = count($_FILES['photos']['name']);
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            for ($i = 0; $i < $total && $i < 8; $i++) {
                if ($_FILES['photos']['error'][$i] === 0) {
                    $ext = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
                    if (!in_array($ext, $allowed)) continue;
                    $filename = $ad_id . '_' . time() . '_' . $i . '.' . $ext;
                    $dest = $upload_dir . $filename;
                    if (move_uploaded_file($_FILES['photos']['tmp_name'][$i], $dest)) {
                        $stmt = mysqli_prepare($conn, "INSERT INTO ad_images (ad_id, image_path) VALUES (?, ?)");
                        mysqli_stmt_bind_param($stmt, 'is', $ad_id, $dest);
                        mysqli_stmt_execute($stmt);
                    }
                }
            }
        }

        header('Location: detail.php?id=' . $ad_id);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Iklan - OLX Clone</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <main class="create-ad-page">
        <div class="container">
            <?php if ($error): ?>
                <div class="alert alert-error" style="margin-bottom:16px"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="create-ad-layout">
                <div class="create-ad-main">
                    <div class="create-ad-header">
                        <h1>Edit Iklan</h1>
                    </div>

                    <form class="create-ad-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-card">
                            <div class="form-card-header">
                                <h2>Foto</h2>
                                <span class="form-note">Tambahkan maksimal 8 foto</span>
                            </div>
                            <div class="photo-upload-grid" id="photoGrid">
                                <?php foreach ($images as $img): ?>
                                <div class="photo-preview">
                                    <img src="<?php echo $img['image_path']; ?>" alt="Foto">
                                </div>
                                <?php endforeach; ?>
                                <div class="photo-upload-box" onclick="document.getElementById('fileInput').click()">
                                    <input type="file" id="fileInput" name="photos[]" accept="image/*" multiple hidden>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#a0a0a0" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                                    <span>Tambah Foto</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-card">
                            <h2>Kategori</h2>
                            <div class="form-group">
                                <label for="category">Pilih kategori iklan</label>
                                <select id="category" name="category_id" required>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?php echo $cat['id']; ?>" <?php echo $cat['id'] == $ad['category_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-card">
                            <h2>Judul Iklan</h2>
                            <div class="form-group">
                                <label for="title">Judul iklan</label>
                                <input type="text" id="title" name="title" maxlength="150" value="<?php echo htmlspecialchars($ad['title']); ?>" required>
                                <span class="char-count"><span id="titleCount"><?php echo strlen($ad['title']); ?></span>/150</span>
                            </div>
                        </div>

                        <div class="form-card">
                            <h2>Deskripsi</h2>
                            <div class="form-group">
                                <label for="description">Deskripsi barang</label>
                                <textarea id="description" name="description" rows="5" required><?php echo htmlspecialchars($ad['description']); ?></textarea>
                            </div>
                        </div>

                        <div class="form-card">
                            <h2>Harga</h2>
                            <div class="form-group">
                                <label for="price">Harga barang</label>
                                <div class="price-input-wrap">
                                    <span class="price-prefix">Rp</span>
                                    <input type="text" id="price" name="price" value="<?php echo number_format($ad['price'], 0, ',', ''); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-card">
                            <h2>Lokasi</h2>
                            <div class="form-group">
                                <label for="location">Lokasi barang</label>
                                <input type="text" id="location" name="location" maxlength="100" value="<?php echo htmlspecialchars($ad['location']); ?>">
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="detail.php?id=<?php echo $ad_id; ?>" class="btn-cancel">Batal</a>
                            <button type="submit" class="btn-submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

                <aside class="create-ad-sidebar">
                    <div class="sidebar-card tips-card">
                        <h3>Tips Pasang Iklan</h3>
                        <ul>
                            <li><strong>Foto yang baik</strong><p>Gunakan foto asli dengan pencahayaan yang cukup.</p></li>
                            <li><strong>Judul yang jelas</strong><p>Sebutkan merk, model, tahun, dan kondisi barang.</p></li>
                            <li><strong>Harga yang wajar</strong><p>Cek harga pasar agar barang cepat laku.</p></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2026 OLX Clone. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('title').addEventListener('input', function() {
            document.getElementById('titleCount').textContent = this.value.length;
        });
        document.getElementById('price').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const grid = document.getElementById('photoGrid');
            const uploadBox = grid.querySelector('.photo-upload-box');
            Array.from(e.target.files).forEach((file, index) => {
                if (index >= 7) return;
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const preview = document.createElement('div');
                    preview.className = 'photo-preview';
                    preview.innerHTML = '<img src="' + ev.target.result + '" alt="Preview"><button type="button" class="photo-remove" onclick="this.parentElement.remove()">&times;</button>';
                    grid.insertBefore(preview, uploadBox);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>

</body>
</html>