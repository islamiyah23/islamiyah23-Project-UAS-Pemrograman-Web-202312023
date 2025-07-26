<?php
session_start();
include 'includes/db.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data transaksi user login
$query = $conn->prepare("SELECT product, quantity, price, order_date FROM history_transaksi WHERE user_id = ? ORDER BY order_date DESC");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

// Daftar harga akurat
$hargaProduk = [
    "Ice Cream With Brownie" => 38000,
    "Strawberry Brownie" => 40000,
    "Caramel Brownie" => 30000,
    "Cream Cheese Swirl Brownie" => 35000,
    "Oreo Brownie" => 28000,
    "Chocolate Mousse Brownie" => 40000,
    "Muffins Brownie" => 28000,
    "Original Brownie" => 25000,
    "Matcha Brownie" => 30000,
    "Tiramisu Brownie" => 35000,
    "Choco Brownie" => 32000,
    "Hampers Brownie" => 50000
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>History Transaksi - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #4e342e; color: #fff8f0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .container { background-color: #6d4c41; border-radius: 15px; padding: 30px; margin-top: 50px; box-shadow: 0 0 20px rgba(0,0,0,0.3); }
        h3 { color: #ffe0b2; font-weight: bold; margin-bottom: 20px; }
        .table { background-color: #5d4037; color: #fff; }
        .table th { background-color: #3e2723; color: #fff; }
        .table td { background-color: #4e342e; color: #fff; }
        .btn-brown { background-color: #3e2723; color: #fff; border: none; font-weight: bold; padding: 10px 20px; border-radius: 10px; text-decoration: none; }
        .btn-brown:hover { background-color: #5d4037; }
    </style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <h3>🛒 History Transaksi Pembelian Anda</h3>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Tanggal Order</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; while ($row = $result->fetch_assoc()):
                $produk = $row['product'];
                $quantity = $row['quantity'];
                $price = isset($hargaProduk[$produk]) ? $hargaProduk[$produk] : $row['price'];
                $total = $quantity * $price;
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($produk); ?></td>
                    <td><?= $quantity; ?></td>
                    <td>Rp <?= number_format($price, 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($total, 0, ',', '.'); ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['order_date'])); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada transaksi pembelian.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="home.php" class="btn btn-brown mt-3">⬅ Kembali ke Home</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>