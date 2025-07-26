<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $password_raw = $_POST['password'];
    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email tidak valid'); window.location='register.php';</script>";
        exit();
    }

    if (strlen($password_raw) < 6) {
        echo "<script>alert('Password minimal 6 karakter'); window.location='register.php';</script>";
        exit();
    }

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email sudah digunakan'); window.location='register.php';</script>";
    } else {
        mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$email', '$password')");
        $user_id = mysqli_insert_id($conn);
        mysqli_query($conn, "INSERT INTO user_profiles (user_id, nama, alamat) VALUES ('$user_id', '$nama', '$alamat')");
        echo "<script>alert('Registrasi berhasil, silakan login'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Brownies Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fceee6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-container {
            max-width: 420px;
            margin: 80px auto;
            background-color: #fffaf7;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(92, 64, 51, 0.2);
            border: 1px solid #e0cfc3;
        }
        .register-title {
            text-align: center;
            color: #5d4037;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .register-icon {
            font-size: 45px;
            color: #a1887f;
            margin-bottom: 15px;
        }
        .form-label {
            color: #5d4037;
            font-weight: 500;
        }
        .btn-brown {
            background-color: #5d4037;
            color: white;
            font-weight: 500;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-brown:hover {
            background-color: #3e2723;
        }
        .form-control:focus {
            border-color: #a1887f;
            box-shadow: 0 0 0 0.2rem rgba(93, 64, 55, 0.25);
        }
        .bottom-text {
            text-align: center;
            margin-top: 20px;
        }
        .bottom-text a {
            color: #5d4037;
            text-decoration: none;
            font-weight: 500;
        }
        .bottom-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="text-center register-icon">
            <i class="fas fa-cookie-bite"></i>
        </div>
        <h2 class="register-title">Create Your Account</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required />
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Create Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <button type="submit" class="btn btn-brown w-100">Register</button>
        </form>
        <div class="bottom-text">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>