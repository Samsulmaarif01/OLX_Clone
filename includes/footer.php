<?php
if (!isset($categories)) {
    if (function_exists('get_categories') && isset($conn)) {
        $categories = get_categories($conn);
    } else {
        $categories = [];
    }
}
?>
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
