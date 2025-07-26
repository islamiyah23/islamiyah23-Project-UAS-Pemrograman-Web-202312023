<?php
session_start();
include "includes/db.php";

// Cek jika belum login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = intval($_SESSION["user_id"]);
$query = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pemesanan - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f7f3eb; }
        h3 { color: #5c3d26; font-weight: bold; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4 text-center">📄 Riwayat Pemesanan Anda</h3>
    <?php if (mysqli_num_rows($query) > 0): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['order_date'])); ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= nl2br(htmlspecialchars($row['address'])); ?></td>
                    <td>Rp<?= number_format($row['total_price'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="struk.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success mb-1" target="_blank">🖨️ Unduh Struk</a>
                        <a href="kirim_wa.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-primary mb-1" target="_blank">📲 Kirim WA</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="alert alert-info text-center">
        Anda belum memiliki riwayat pemesanan. Silakan lakukan pemesanan terlebih dahulu.
    </div>
    <?php endif; ?>
    <div class="text-center mt-3">
        <a href="home.php" class="btn btn-secondary">⬅️ Kembali ke Home</a>
    </div>
</div>
</body>
</html>