<?php
// order_process.php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = (int) $_POST['jumlah'];

    // Simpan ke tabel orders
    $stmt = $conn->prepare("INSERT INTO orders (nama, alamat) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama, $alamat);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Simpan ke tabel order_items
    $stmt2 = $conn->prepare("INSERT INTO order_items (order_id, produk, jumlah) VALUES (?, ?, ?)");
    $stmt2->bind_param("isi", $order_id, $produk, $jumlah);
    $stmt2->execute();
    $stmt2->close();

    header("Location: struk.php?id=$order_id");
    exit();
} else {
    echo "Invalid request.";
}
?>