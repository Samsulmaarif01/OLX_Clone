<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'olx_clone';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

mysqli_select_db($conn, $DB_NAME) or mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $DB_NAME") or die('Gagal buat database');
mysqli_select_db($conn, $DB_NAME) or die('Gagal pilih database');

mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

$tables = [
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        icon VARCHAR(100) DEFAULT NULL
    ) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS ads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        category_id INT NOT NULL,
        title VARCHAR(150) NOT NULL,
        description TEXT DEFAULT NULL,
        price DECIMAL(15,2) NOT NULL,
        location VARCHAR(100) DEFAULT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
    ) ENGINE=InnoDB",
    "CREATE TABLE IF NOT EXISTS ad_images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ad_id INT NOT NULL,
        image_path VARCHAR(255) NOT NULL,
        FOREIGN KEY (ad_id) REFERENCES ads(id) ON DELETE CASCADE
    ) ENGINE=InnoDB"
];

foreach ($tables as $sql) {
    if (!mysqli_query($conn, $sql)) {
        die('Error create table: ' . mysqli_error($conn));
    }
}

mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

mysqli_query($conn, "INSERT IGNORE INTO categories (id, name, icon) VALUES
(1, 'Mobil', 'car'), (2, 'Motor', 'motorcycle'), (3, 'Handphone & Gadget', 'phone'),
(4, 'Properti', 'home'), (5, 'Fashion', 'shirt'), (6, 'Elektronik', 'tv'),
(7, 'Hobi & Olahraga', 'sports'), (8, 'Rumah Tangga', 'kitchen'),
(9, 'Jasa & Lowongan', 'briefcase'), (10, 'Kantor & Industri', 'office')");

date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
