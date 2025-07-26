<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($result) === 0) {
        echo "<script>alert('Akun Anda tidak terdaftar. Silakan buat akun terlebih dahulu.'); window.location='register.php';</script>";
        exit();
    }

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];

        // Log aktivitas login
        $uid = $user['id'];
        mysqli_query($conn, "INSERT INTO activity_logs (user_id, activity_type) VALUES ('$uid', 'login')");

        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Password salah'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Brownies Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fceee6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            max-width: 420px;
            margin: 80px auto;
            background-color: #fffaf7;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(92, 64, 51, 0.2);
            border: 1px solid #e0cfc3;
        }
        .login-title {
            text-align: center;
            color: #5d4037;
            font-weight: bold;
            margin-bottom: 25px;
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
<div class="login-container">
    <h2 class="login-title">Login to Brownies Shop</h2>
    <form method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required />
        </div>
        <button type="submit" class="btn btn-brown w-100">Login</button>
    </form>
    <div class="bottom-text">
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</div>
</body>
</html>