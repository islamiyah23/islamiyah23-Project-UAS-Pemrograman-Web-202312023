<?php
session_start();

// Proteksi halaman jika belum login
if (!isset($_SESSION['admin_email'])) {
    header("Location: login_admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Home - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f2ee;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar-brownie {
            background-color: #6f4e37;
        }
        .navbar-brownie .navbar-brand,
        .navbar-brownie .nav-link,
        .navbar-brownie .nav-item a {
            color: #fff8f3;
        }
        .navbar-brownie .nav-link:hover {
            color: #ffe4d0;
        }
        .card-brownie {
            background-color: #fffaf5;
            border: 1px solid #d5c0ae;
            box-shadow: 0 4px 10px rgba(111, 78, 55, 0.15);
        }
        .text-brownie {
            color: #6f4e37;
        }
        .btn-brownie {
            background-color: #6f4e37;
            color: white;
        }
        .btn-brownie:hover {
            background-color: #5c3d2a;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-brownie">
        <div class="container">
            <a class="navbar-brand" href="#">🍫 Brownies Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home_admin.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="laporan.php">Laporan</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout_admin.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="text-brownie">Selamat Datang di Admin Panel</h2>
            <p class="text-muted">Kelola laporan penjualan brownies Anda 🍫</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card card-brownie p-4 text-center">
                    <h5 class="text-brownie">Laporan Penjualan</h5>
                    <p class="text-muted">Lihat rekap transaksi penjualan.</p>
                    <a href="laporan.php" class="btn btn-brownie w-100">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>