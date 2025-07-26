<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_email'])) {
    header("Location: login_admin.php");
    exit();
}

require_once '../includes/db.php';

// Pastikan ada ID produk
if (!isset($_GET['id'])) {
    echo "ID produk tidak ditemukan.";
    exit();
}

$id = intval($_GET['id']);

// Query hapus produk
$stmt = $conn->prepare("DELETE FROM order_items WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['message'] = "Produk berhasil dihapus.";
} else {
    $_SESSION['message'] = "Gagal menghapus produk.";
}

$stmt->close();
header("Location: home.php");
exit();
?>