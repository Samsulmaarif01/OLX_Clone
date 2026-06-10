<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasang Iklan - OLX Clone</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="header">
        <div class="header-inner">
            <a href="index.php" class="logo">
                <svg viewBox="0 0 100 28" class="logo-svg">
                    <text x="0" y="22" font-family="Inter, sans-serif" font-weight="800" font-size="24" fill="#002f34">OLX</text>
                    <text x="48" y="22" font-family="Inter, sans-serif" font-weight="300" font-size="14" fill="#002f34">Clone</text>
                </svg>
            </a>
            <nav class="header-nav">
                <a href="index.php">Kembali ke Beranda</a>
            </nav>
        </div>
    </header>

    <main class="create-ad-page">
        <div class="container">
            <div class="create-ad-layout">

                <div class="create-ad-main">
                    <div class="create-ad-header">
                        <h1>Pasang Iklan</h1>
                        <p>Isi detail barang yang ingin kamu jual</p>
                    </div>

                    <form class="create-ad-form" action="" method="POST" enctype="multipart/form-data">

                        <!-- Foto -->
                        <div class="form-card">
                            <div class="form-card-header">
                                <h2>Foto</h2>
                                <span class="form-note">Tambahkan maksimal 8 foto</span>
                            </div>
                            <div class="photo-upload-grid" id="photoGrid">
                                <div class="photo-upload-box" onclick="document.getElementById('fileInput').click()">
                                    <input type="file" id="fileInput" name="photos[]" accept="image/*" multiple hidden>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#a0a0a0" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                                    <span>Tambah Foto</span>
                                </div>
                            </div>
                            <p class="photo-hint">Format: JPG, PNG. Maks 5MB per foto</p>
                        </div>

                        <!-- Kategori -->
                        <div class="form-card">
                            <h2>Kategori</h2>
                            <div class="form-group">
                                <label for="category">Pilih kategori iklan</label>
                                <select id="category" name="category_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="1">Mobil</option>
                                    <option value="2">Motor</option>
                                    <option value="3">Handphone & Gadget</option>
                                    <option value="4">Properti</option>
                                    <option value="5">Fashion</option>
                                    <option value="6">Elektronik</option>
                                    <option value="7">Hobi & Olahraga</option>
                                    <option value="8">Rumah Tangga</option>
                                    <option value="9">Jasa & Lowongan</option>
                                    <option value="10">Kantor & Industri</option>
                                </select>
                            </div>
                        </div>

                        <!-- Judul -->
                        <div class="form-card">
                            <h2>Judul Iklan</h2>
                            <div class="form-group">
                                <label for="title">Tulis judul iklan yang menarik</label>
                                <input type="text" id="title" name="title" placeholder="Contoh: Samsung Galaxy S24 256GB Hitam Bekas" maxlength="150" required>
                                <span class="char-count"><span id="titleCount">0</span>/150</span>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-card">
                            <h2>Deskripsi</h2>
                            <div class="form-group">
                                <label for="description">Jelaskan detail barang yang kamu jual</label>
                                <textarea id="description" name="description" rows="5" placeholder="Tuliskan kondisi barang, kelengkapan, alasan menjual, dll..." required></textarea>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="form-card">
                            <h2>Harga</h2>
                            <div class="form-group">
                                <label for="price">Tentukan harga barang</label>
                                <div class="price-input-wrap">
                                    <span class="price-prefix">Rp</span>
                                    <input type="text" id="price" name="price" placeholder="Contoh: 1000000" required>
                                </div>
                            </div>
                        </div>

                        <!-- Lokasi -->
                        <div class="form-card">
                            <h2>Lokasi</h2>
                            <div class="form-group">
                                <label for="location">Tentukan lokasi barang</label>
                                <input type="text" id="location" name="location" placeholder="Contoh: Jakarta Pusat" maxlength="100">
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="form-actions">
                            <a href="index.php" class="btn-cancel">Batal</a>
                            <button type="submit" class="btn-submit">Pasang Iklan</button>
                        </div>

                    </form>
                </div>

                <!-- Sidebar Tips -->
                <aside class="create-ad-sidebar">
                    <div class="sidebar-card tips-card">
                        <h3>Tips Pasang Iklan</h3>
                        <ul>
                            <li>
                                <strong>Foto yang baik</strong>
                                <p>Gunakan foto asli dengan pencahayaan yang cukup dan latar belakang yang rapi.</p>
                            </li>
                            <li>
                                <strong>Judul yang jelas</strong>
                                <p>Sebutkan merk, model, tahun, dan kondisi barang dalam judul.</p>
                            </li>
                            <li>
                                <strong>Harga yang wajar</strong>
                                <p>Cek harga pasar agar barang cepat laku.</p>
                            </li>
                            <li>
                                <strong>Deskripsi detail</strong>
                                <p>Jelaskan kondisi, kelengkapan, dan alasan menjual.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-card info-card-sidebar">
                        <h3>Info</h3>
                        <p>Iklan akan tayang selama 90 hari secara gratis. Setelah itu, iklan dapat diperpanjang.</p>
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
        // Char counter for title
        document.getElementById('title').addEventListener('input', function() {
            document.getElementById('titleCount').textContent = this.value.length;
        });

        // Price formatting
        document.getElementById('price').addEventListener('input', function() {
            let val = this.value.replace(/[^0-9]/g, '');
            this.value = val;
        });

        // Photo preview
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const grid = document.getElementById('photoGrid');
            const uploadBox = grid.querySelector('.photo-upload-box');
            const files = Array.from(e.target.files);

            // Remove old previews (keep upload box)
            grid.querySelectorAll('.photo-preview').forEach(el => el.remove());

            files.forEach((file, index) => {
                if (index >= 7) return;
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const preview = document.createElement('div');
                    preview.className = 'photo-preview';
                    preview.innerHTML = `
                        <img src="${ev.target.result}" alt="Preview">
                        <button type="button" class="photo-remove" onclick="this.parentElement.remove()">&times;</button>
                    `;
                    grid.insertBefore(preview, uploadBox);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>

</body>
</html>