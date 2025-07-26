<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fdf6f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            color: #5d3a00;
            font-weight: bold;
        }

        .table thead {
            background-color: #8d6e63;
            color: white;
        }

        .btn-edit {
            background-color: #795548;
            color: white;
        }

        .btn-hapus {
            background-color: #d32f2f;
            color: white;
        }

        .btn-edit:hover {
            background-color: #5d4037;
        }

        .btn-hapus:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>
<?php include 'navigasi.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Laporan Penjualan Brownies</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($conn, "
            SELECT o.id as order_id, o.nama, o.alamat, oi.id as item_id, oi.produk, oi.jumlah, (oi.jumlah * oi.harga) AS total, o.created_at 
            FROM orders o 
            JOIN order_items oi ON o.id = oi.order_id 
            ORDER BY o.created_at DESC
        ");

        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['produk']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>
                    <td>" . date("d-m-Y", strtotime($row['created_at'])) . "</td>
                    <td>
                        <a href='edit.php?id={$row['item_id']}' class='btn btn-sm btn-edit'>Edit</a>
                        <a href='hapus.php?id={$row['item_id']}' class='btn btn-sm btn-hapus' onclick=\"return confirm('Yakin ingin menghapus pesanan ini?')\">Hapus</a>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>