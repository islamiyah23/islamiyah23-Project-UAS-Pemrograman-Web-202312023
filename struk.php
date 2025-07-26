<?php
session_start();
include 'includes/db.php';

// Pastikan parameter ID tersedia
if (!isset($_GET['id'])) {
    echo "ID pesanan tidak ditemukan.";
    exit();
}

$order_id = intval($_GET['id']);

// Ambil data order dari database
$order_query = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$order_query->bind_param("i", $order_id);
$order_query->execute();
$order_result = $order_query->get_result();
$order = $order_result->fetch_assoc();
$order_query->close();

// Ambil semua item pesanan
$items_query = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
$items_query->bind_param("i", $order_id);
$items_query->execute();
$items_result = $items_query->get_result();

// Hapus session order agar pengguna bisa mengisi ulang form dari awal
unset($_SESSION['order_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struk Pemesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #4e342e;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff8f0;
        }

        .receipt-card {
            background-color: #6d4c41;
            padding: 30px;
            margin: 50px auto;
            border-radius: 20px;
            max-width: 700px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        .receipt-title {
            color: #ffe0b2;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .receipt-info {
            background-color: #8d6e63;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .receipt-info p {
            margin: 5px 0;
        }

        .product-list {
            background-color: #5d4037;
            border-radius: 12px;
            padding: 20px;
        }

        .product-list ul {
            list-style: none;
            padding-left: 0;
        }

        .product-list li {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #4e342e;
            border-radius: 10px;
            border: 1px solid #3e2723;
        }

        .btn-brown {
            background-color: #3e2723;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: bold;
            margin-right: 10px;
        }

        .btn-brown:hover {
            background-color: #5d4037;
        }

        .back-link {
            color: #fff8f0;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="receipt-card">
    <h2 class="receipt-title">Struk Pemesanan Brownies</h2>

    <div class="receipt-info">
        <p><strong>Nama :</strong> <?= htmlspecialchars($order['nama']) ?></p>
        <p><strong>Alamat :</strong> <?= htmlspecialchars($order['alamat']) ?></p>
        <p><strong>Tanggal Pemesanan :</strong> <?= date("d-m-Y H:i", strtotime($order['created_at'])) ?></p>
    </div>

    <div class="product-list">
        <h5 class="mb-3">Daftar Produk :</h5>
        <?php
        $total_semua = 0;
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
        <ul>
            <?php while ($item = $items_result->fetch_assoc()):
                $produk = $item['produk'];
                $jumlah = $item['jumlah'];
                $harga = isset($hargaProduk[$produk]) ? $hargaProduk[$produk] : 0;
                $subtotal = $jumlah * $harga;
                $total_semua += $subtotal;
            ?>
                <li>
                    <strong><?= htmlspecialchars($produk) ?></strong><br>
                    Jumlah : <?= $jumlah ?> x Rp<?= number_format($harga, 0, ',', '.') ?><br>
                    Total : <strong>Rp<?= number_format($subtotal, 0, ',', '.') ?></strong>
                </li>
            <?php endwhile; ?>
        </ul>
        <p class="text-end mt-3"><strong>Total Keseluruhan : Rp<?= number_format($total_semua, 0, ',', '.') ?></strong></p>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-brown" onclick="window.print()">Cetak Struk</button>
        <a href="home.php" class="btn btn-brown">Kembali ke Home</a>
    </div>
</div>

</body>
</html>