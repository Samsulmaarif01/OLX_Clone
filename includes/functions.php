<?php

require_once __DIR__ . '/config.php';

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function redirect_if_not_logged_in() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function waktu_lalu($datetime) {
    $now = time();
    $tgl = strtotime($datetime);
    $diff = $now - $tgl;

    if ($diff < 60) return 'Baru saja';
    if ($diff < 3600) return floor($diff / 60) . ' menit lalu';
    if ($diff < 86400) return floor($diff / 3600) . ' jam lalu';
    if ($diff < 172800) return 'Kemarin';
    if ($diff < 604800) return floor($diff / 86400) . ' hari lalu';
    return date('d M Y', $tgl);
}

function get_categories($conn) {
    $result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function get_category_name($conn, $id) {
    $stmt = mysqli_prepare($conn, "SELECT name FROM categories WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    return $row ? $row['name'] : 'Unknown';
}

function get_ads($conn, $limit = 8) {
    $result = mysqli_query($conn, "
        SELECT a.*, c.name AS category_name,
            (SELECT image_path FROM ad_images WHERE ad_id = a.id LIMIT 1) AS image
        FROM ads a
        JOIN categories c ON a.category_id = c.id
        ORDER BY a.created_at DESC
        LIMIT $limit
    ");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function get_ad_by_id($conn, $id) {
    $stmt = mysqli_prepare($conn, "
        SELECT a.*, c.name AS category_name, u.name AS user_name, u.created_at AS user_since
        FROM ads a
        JOIN categories c ON a.category_id = c.id
        JOIN users u ON a.user_id = u.id
        WHERE a.id = ?
    ");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function get_ad_images($conn, $ad_id) {
    $stmt = mysqli_prepare($conn, "SELECT image_path FROM ad_images WHERE ad_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $ad_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function get_user_ads($conn, $user_id) {
    $stmt = mysqli_prepare($conn, "
        SELECT a.*, c.name AS category_name,
            (SELECT image_path FROM ad_images WHERE ad_id = a.id LIMIT 1) AS image
        FROM ads a
        JOIN categories c ON a.category_id = c.id
        WHERE a.user_id = ?
        ORDER BY a.created_at DESC
    ");
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function related_ads($conn, $category_id, $exclude_id, $limit = 4) {
    $stmt = mysqli_prepare($conn, "
        SELECT a.*, c.name AS category_name,
            (SELECT image_path FROM ad_images WHERE ad_id = a.id LIMIT 1) AS image
        FROM ads a
        JOIN categories c ON a.category_id = c.id
        WHERE a.category_id = ? AND a.id != ?
        ORDER BY a.created_at DESC
        LIMIT ?
    ");
    mysqli_stmt_bind_param($stmt, 'iii', $category_id, $exclude_id, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
