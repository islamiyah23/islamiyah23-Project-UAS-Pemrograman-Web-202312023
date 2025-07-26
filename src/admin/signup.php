<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO admin_users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Pendaftaran berhasil. Silakan login.";
        header("Location: login_admin.php");
        exit;
    } else {
        $error = "Gagal mendaftar. Coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f3f0;
            font-family: 'Segoe UI', sans-serif;
        }
        .brownie-card {
            background: #fff8f3;
            border: 1px solid #d3b8a0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(83, 53, 30, 0.1);
        }
        .btn-brown {
            background-color: #6f4e37;
            color: white;
        }
        .btn-brown:hover {
            background-color: #5a3d2b;
        }
        .text-brown {
            color: #6f4e37;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="w-100 mx-auto" style="max-width: 480px;">
            <div class="brownie-card p-4">
                <h3 class="text-center text-brown mb-4">Sign Up Admin</h3>
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-brown w-100">Daftar</button>
                    <p class="text-center mt-3">Sudah punya akun? <a href="login_admin.php" class="text-brown">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>