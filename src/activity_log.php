<?php
session_start();
include 'includes/db.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil log aktivitas
$query = mysqli_query($conn, "SELECT * FROM activity_logs WHERE user_id='$user_id' ORDER BY activity_time DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Log Aktivitas - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #4e342e;
            color: #fff8f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #6d4c41;
            border-radius: 15px;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }

        h3 {
            color: #ffe0b2;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .table {
            background-color: #5d4037;
            color: #fff; /* putih tegas */
        }

        .table th {
            background-color: #3e2723;
            color: #fff;
            border: none;
            text-align: center;
        }

        .table td {
            background-color: #4e342e;
            border: none;
            color: #fff; /* putih tegas */
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) td {
            background-color: #5d4037;
            color: #fff; /* putih tegas tetap pada baris ganjil */
        }

        .btn-brown {
            background-color: #3e2723;
            color: #fff8f0;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
        }

        .btn-brown:hover {
            background-color: #5d4037;
        }
    </style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
    <h3>📅 Log Aktivitas Anda</h3>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Aktivitas</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($query) > 0): ?>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= ucfirst($row['activity_type']); ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($row['activity_time'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Belum ada aktivitas login/logout.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="home.php" class="btn btn-brown">⬅ Kembali ke Home</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>