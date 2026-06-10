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
            <?php if (is_logged_in()): ?>
                <a href="myads.php">Iklan Saya</a>
                <a href="create_ad.php" class="btn-pasang">Pasang Iklan</a>
                <div class="user-dropdown">
                    <span class="user-greeting">Halo, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    <a href="logout.php" class="btn-logout">Keluar</a>
                </div>
            <?php else: ?>
                <a href="login.php">Masuk</a>
                <a href="register.php">Daftar</a>
                <a href="create_ad.php" class="btn-pasang">Pasang Iklan</a>
            <?php endif; ?>
        </nav>
    </div>
</header>