CREATE DATABASE IF NOT EXISTS olx_clone;
USE olx_clone;

-- Tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabel categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    icon VARCHAR(100) DEFAULT NULL
) ENGINE=InnoDB;

-- Tabel ads
CREATE TABLE IF NOT EXISTS ads (
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
) ENGINE=InnoDB;

-- Tabel ad_images
CREATE TABLE IF NOT EXISTS ad_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (ad_id) REFERENCES ads(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Seed categories
INSERT INTO categories (id, name, icon) VALUES
(1, 'Mobil', 'car'),
(2, 'Motor', 'motorcycle'),
(3, 'Handphone & Gadget', 'phone'),
(4, 'Properti', 'home'),
(5, 'Fashion', 'shirt'),
(6, 'Elektronik', 'tv'),
(7, 'Hobi & Olahraga', 'sports'),
(8, 'Rumah Tangga', 'kitchen'),
(9, 'Jasa & Lowongan', 'briefcase'),
(10, 'Kantor & Industri', 'office')
ON DUPLICATE KEY UPDATE name = VALUES(name);
