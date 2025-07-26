<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin["password"])) {
        $_SESSION["admin_email"] = $admin["email"];
        header("Location: home.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Brownies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7e7ce;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background-color: #fff8f0;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(102, 51, 0, 0.2);
        }

        h3 {
            color: #5c3d26;
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #d2b48c;
        }

        .btn-primary {
            background-color: #8b4513;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5c3d26;
        }

        a {
            color: #8b4513;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            background-color: #fbe9e7;
            color: #8b0000;
            border: 1px solid #d4a373;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Login Admin Brownies</h3>
        <form method="post" class="w-50 mx-auto login-container">
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Belum punya akun? <a href="signup.php">Daftar</a></p>
        </form>
    </div>
</body>
</html>