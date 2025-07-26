<?php
session_start();
include 'includes/db.php';
$user_id = $_SESSION['user_id']; // Pastikan session tersedia dari login

$selectedProduk = isset($_GET['produk']) ? htmlspecialchars($_GET['produk'], ENT_QUOTES, 'UTF-8') : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    // Daftar harga produk
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

    // Ambil harga sesuai produk
    $harga = isset($hargaProduk[$produk]) ? $hargaProduk[$produk] : 0;

    if (!isset($_SESSION['order_id'])) {
        // Ambil nama dan alamat dari tabel user_profiles
        $stmt_user = $conn->prepare("SELECT nama, alamat FROM user_profiles WHERE user_id = ?");
        $stmt_user->bind_param("i", $user_id);
        $stmt_user->execute();
        $stmt_user->bind_result($nama, $alamat);
        $stmt_user->fetch();
        $stmt_user->close();

        if ($nama && $alamat) {
            $stmt = $conn->prepare("INSERT INTO orders (nama, alamat, created_at) VALUES (?, ?, NOW())");
            $stmt->bind_param("ss", $nama, $alamat);
            $stmt->execute();
            $_SESSION['order_id'] = $stmt->insert_id;
            $stmt->close();
        } else {
            echo "Data profil pengguna tidak ditemukan.";
            exit();
        }
    }

    $order_id = $_SESSION['order_id'];

    // Simpan ke tabel order_items
    $stmt2 = $conn->prepare("INSERT INTO order_items (order_id, produk, jumlah, harga) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("isii", $order_id, $produk, $jumlah, $harga);
    $stmt2->execute();
    $stmt2->close();

    // Catat ke tabel history_transaksi dengan harga sesuai
    $stmt_history = $conn->prepare("INSERT INTO history_transaksi (user_id, order_id, product, quantity, price, order_date) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt_history->bind_param("iisii", $user_id, $order_id, $produk, $jumlah, $harga);
    $stmt_history->execute();
    $stmt_history->close();

    // Redirect sesuai tombol ditekan
    if (isset($_POST['submit_done'])) {
        header("Location: struk.php?id=" . $order_id);
        exit();
    } else {
        header("Location: order.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Order Brownies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #4e342e; color: #fff8f0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .text-brown { color: #fff8f0; font-weight: bold; }
        .form-wrapper { background-color: #6d4c41; border-radius: 15px; padding: 30px; box-shadow: 0 0 15px rgba(0,0,0,0.3); }
        .form-control { border-radius: 10px; border: none; padding: 12px 15px; }
        .form-control:focus { box-shadow: 0 0 0 0.2rem rgba(255,204,128,0.25); }
        .btn-brown { background-color: #3e2723; color: white; border: none; padding: 10px 25px; border-radius: 10px; font-weight: bold; transition: background 0.3s ease; }
        .btn-brown:hover { background-color: #5d4037; }
        .btn-secondary { border-radius: 10px; background-color: #8d6e63; border: none; font-weight: bold; }
        .btn-secondary:hover { background-color: #a1887f; }
        .btn-light { background-color: #d7ccc8; color: #3e2723; border: none; font-weight: bold; }
        .btn-light:hover { background-color: #bcaaa4; }
        .action-buttons .btn { margin: 5px; }
    </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-wrapper">
                <h2 class="text-center text-brown">Form Pemesanan Brownies</h2>
                <form method="post" action="">
                    <select name="produk" class="form-control mb-3" required>
                        <option value="">Pilih Produk</option>
                        <?php
                        $produkList = [
                            "Ice Cream With Brownie", "Strawberry Brownie", "Caramel Brownie",
                            "Cream Cheese Swirl Brownie", "Oreo Brownie", "Chocolate Mousse Brownie",
                            "Muffins Brownie", "Original Brownie", "Matcha Brownie",
                            "Tiramisu Brownie", "Choco Brownie", "Hampers Brownie"
                        ];
                        foreach ($produkList as $produk) {
                            $selected = $selectedProduk === $produk ? 'selected' : '';
                            echo "<option value=\"$produk\" $selected>$produk</option>";
                        }
                        ?>
                    </select>

                    <input type="number" name="jumlah" min="1" class="form-control mb-4" placeholder="Jumlah" required>

                    <div class="d-flex justify-content-between flex-wrap action-buttons">
                        <button type="submit" name="submit_done" class="btn btn-brown">Kirim & Selesai</button>
                        <button type="submit" name="submit_add" class="btn btn-secondary">Tambah Order Lainnya</button>
                        <a href="home.php" class="btn btn-light">Kembali ke Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>