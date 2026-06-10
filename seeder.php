<?php
require_once 'config.php';

echo "🌱 Seeder: Memulai pengisian data dummy...\n\n";

// Hapus data lama (urutannya penting karena foreign key)
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
mysqli_query($conn, "TRUNCATE TABLE ad_images");
mysqli_query($conn, "TRUNCATE TABLE ads");
mysqli_query($conn, "TRUNCATE TABLE users");
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

echo "✓ Data lama telah dibersihkan.\n";

// ===================== USERS =====================
$users = [
    ['Ahmad Fauzi', 'ahmad@example.com', 'password123'],
    ['Siti Nurhaliza', 'siti@example.com', 'password123'],
    ['Budi Santoso', 'budi@example.com', 'password123'],
    ['Dewi Lestari', 'dewi@example.com', 'password123'],
    ['Rudi Hermawan', 'rudi@example.com', 'password123'],
];

$stmt_user = mysqli_prepare($conn, "INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$user_ids = [];
foreach ($users as $u) {
    $hash = password_hash($u[2], PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt_user, 'sss', $u[0], $u[1], $hash);
    mysqli_stmt_execute($stmt_user);
    $user_ids[] = mysqli_insert_id($conn);
    echo "  ✓ User: {$u[0]} ({$u[1]}) — password: {$u[2]}\n";
}
mysqli_stmt_close($stmt_user);

// ===================== ADS =====================
$ads_data = [
    // [user_index, category_id, title, description, price, location]
    [0, 1, 'Toyota Avanza 2018 Mulus Tangan Pertama', 'Mobil Avanza veloz 1.3L tahun 2018, kondisi sangat terawat, baru ganti ban dan aki. Pajak panjang. Harga nego sampai deal.', 125000000, 'Jakarta Selatan'],
    [0, 1, 'Honda Civic 2020 Full Service', 'Civic RS 1.5T CVT 2020, putih, low km 30rb, interior seperti baru, audio upgrade. Surat lengkap.', 320000000, 'Bandung'],
    [1, 2, 'Yamaha NMAX 2021 Kondisi Oke', 'NMAX Connected 155cc 2021, hitam, jarang dipakai, bodi mulus, pajak hidup.', 28000000, 'Surabaya'],
    [1, 2, 'Honda Vario 125 CBS ISS 2022', 'Vario 125 putih 2022, kilometer 5000an, servis rutin di AHASS, masih garansi.', 18000000, 'Depok'],
    [2, 3, 'iPhone 14 Pro Max 256GB', 'iPhone 14 Pro Max deep purple, 256GB, fullset, battery health 92%, no minus, garansi resmi iBox.', 16000000, 'Jakarta Pusat'],
    [2, 3, 'Samsung Galaxy S24 Ultra 512GB', 'S24 Ultra titanium gray, 512GB, HP baru dipakai 2 bulan, still in warranty, bonus casing.', 18500000, 'Tangerang'],
    [2, 3, 'Xiaomi Redmi Note 12 Pro 5G', 'Redmi Note 12 Pro 5G 8/256GB, hitam, kondisi 90%, kelengkapan lengkap + charger.', 3500000, 'Bekasi'],
    [3, 4, 'Kontrakan 3 Petak Jakarta Timur', 'Kontrakan baris 3 pintu, lokasi strategis dekat pasar, jalan mobil masuk, listrik 2200W.', 750000000, 'Jakarta Timur'],
    [3, 4, 'Rumah Subsidi 36/60 Tangerang', 'Rumah subsidi siap huni, 2 kamar tidur, 1 kamar mandi, SHM, lingkungan asri.', 185000000, 'Tangerang'],
    [4, 5, 'Jaket Kulit Pria Original', 'Jaket kulit asli sapi, size L, warna coklat, buatan Garut, kondisi baru dipakai 2x.', 550000, 'Garut'],
    [4, 5, 'Sepatu Nike Air Force 1 White Size 42', 'Nike AF1 putih ukuran 42, 90% baru, box dan struk masih ada. Original 100%.', 1200000, 'Jakarta Barat'],
    [0, 6, 'TV LED Samsung 43 Inch 4K', 'Samsung TU8000 43 inch 4K UHD, smart TV, masih bagus, remote dan kabel lengkap.', 3800000, 'Semarang'],
    [1, 6, 'Kulkas LG 2 Pintu Inverter', 'Kulkas LG GN-B215SQMT, 210 liter, inverter, hemat listrik, kondisi mulus.', 2500000, 'Yogyakarta'],
    [2, 7, 'Sepeda Polygon Xtrada 7 2023', 'MTB Polygon Xtrada 7 ukuran 29, frame aluminium, fork air, hydraulic disc brake.', 7500000, 'Malang'],
    [3, 7, 'Treadmill Elektrik Manual', 'Treadmill lipat untuk rumah, motor 2HP, speed 1-12 km/h, layar LED, garansi 1 tahun.', 2800000, 'Jakarta Utara'],
    [4, 8, 'Set Meja Makan 6 Kursi Jati', 'Meja makan jati ukiran 6 kursi, kondisi antik, cocok untuk rumah klasik.', 4500000, 'Solo'],
    [0, 8, 'Sofa Bed Minimalis Kulit Sintetis', 'Sofa bed 3 seater, warna cream, bahan kulit sintetis, rangka kayu, busa tebal.', 2200000, 'Bandung'],
    [1, 9, 'Les Privat Matematika SD-SMP', 'Les privat matematika, pengalaman 5 tahun, datang ke rumah, tarif Rp50rb/jam.', 50000, 'Jakarta Selatan'],
    [2, 9, 'Jasa Desain Grafis dan Logo', 'Menerima jasa desain logo, banner, feed IG, kartu nama. Harga mulai 100rb.', 100000, 'Online'],
    [3, 10, 'Mesin Fotocopy Canon IR 2625', 'Mesin fotocopy multifungsi, print scan copy, kondisi siap pakai, bonus kertas 1 rim.', 8500000, 'Surabaya'],
];

$stmt_ad = mysqli_prepare($conn, "INSERT INTO ads (user_id, category_id, title, description, price, location) VALUES (?, ?, ?, ?, ?, ?)");
$ad_ids = [];
foreach ($ads_data as $a) {
    $uid = $user_ids[$a[0]];
    mysqli_stmt_bind_param($stmt_ad, 'iissds', $uid, $a[1], $a[2], $a[3], $a[4], $a[5]);
    mysqli_stmt_execute($stmt_ad);
    $ad_ids[] = mysqli_insert_id($conn);
    echo "  ✓ Iklan: {$a[2]}\n";
}
mysqli_stmt_close($stmt_ad);

// ===================== AD IMAGES =====================
// Path gambar placeholder — ganti dengan file gambar sungguhan jika ada
$placeholder_images = [
    'uploads/placeholder1.jpg',
    'uploads/placeholder2.jpg',
    'uploads/placeholder3.jpg',
];

$stmt_img = mysqli_prepare($conn, "INSERT INTO ad_images (ad_id, image_path) VALUES (?, ?)");
foreach ($ad_ids as $ad_id) {
    $img = $placeholder_images[array_rand($placeholder_images)];
    mysqli_stmt_bind_param($stmt_img, 'is', $ad_id, $img);
    mysqli_stmt_execute($stmt_img);
}
mysqli_stmt_close($stmt_img);

echo "\n✅ Seeder selesai!\n";
echo "  - " . count($users) . " user\n";
echo "  - " . count($ads_data) . " iklan\n";
echo "  - " . count($ad_ids) . " gambar iklan\n";
echo "\n🔑 Password semua user: password123\n";
echo "📌 Contoh login: ahmad@example.com / password123\n";
