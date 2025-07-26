<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin_email'])) {
    header("Location: login_admin.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit();
}

$item_id = intval($_GET['id']);

// Ambil data
$query = "SELECT order_items.*, orders.nama, orders.alamat, orders.id as order_id 
            FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            WHERE order_items.id = $item_id";

$result = mysqli_query($conn, $query);
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data tidak ditemukan.";
    exit();
}

$data = mysqli_fetch_assoc($result);

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $produk = mysqli_real_escape_string($conn, $_POST['produk']);
    $jumlah = intval($_POST['jumlah']);
    $harga = floatval($_POST['harga']);

    // Update orders
    $update1 = mysqli_query($conn, "UPDATE orders SET nama='$nama', alamat='$alamat' WHERE id={$data['order_id']}");

    // Update order_items
    $update2 = mysqli_query($conn, "UPDATE order_items SET produk='$produk', jumlah=$jumlah, harga=$harga WHERE id=$item_id");

    if ($update1 && $update2) {
        header("Location: laporan.php");
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #4e342e; /* cokelat gelap */
            color: #f3e5ab; /* krem terang */
        }
        .form-control {
            background-color: #6d4c41; /* cokelat sedang */
            border-color: #3e2723;
            color: #fff;
        }
        .form-control:focus {
            background-color: #795548;
            border-color: #ffccbc;
            color: #fff;
        }
        label {
            color: #fff3e0;
        }
        h3 {
            color: #ffe0b2;
        }
        .btn {
            font-weight: bold;
        }
    </style>
</head>
<body class="container py-5">
    <div class="col-md-8 offset-md-2">
        <h3 class="mb-4">Edit Data Pemesanan</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pemesan</label>
                <input type="text" class="form-control" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="produk" value="<?= htmlspecialchars($data['produk']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" value="<?= $data['jumlah'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" step="0.01" name="harga" value="<?= $data['harga'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="laporan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
