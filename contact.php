<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = trim($_POST['message']);

    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (message) VALUES (?)");
        $stmt->bind_param("s", $message);
        $stmt->execute();
        $stmt->close();

        // Redirect ke home setelah berhasil
        echo "<script>alert('Terima kasih! Pesanmu sudah terkirim.'); window.location.href='home.php';</script>";
        exit();
    } else {
        echo "<script>alert('Pesan tidak boleh kosong!'); window.history.back();</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #fffaf7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .contact-section {
            max-width: 600px;
            margin: 80px auto;
            background-color: #fceee6;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 20px rgba(92, 64, 51, 0.15);
            border: 1px solid #e0cfc3;
        }

        .contact-title {
            text-align: center;
            color: #5d4037;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-description {
            text-align: center;
            color: #6d4c41;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #d7ccc8;
        }

        .form-control:focus {
            border-color: #a1887f;
            box-shadow: 0 0 0 0.2rem rgba(93, 64, 55, 0.25);
        }

        .btn-brown {
            background-color: #5d4037;
            color: white;
            font-weight: 500;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-brown:hover {
            background-color: #3e2723;
        }

        .back-btn {
            margin-top: 20px;
        }

        .icon-title {
            font-size: 35px;
            color: #a1887f;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="contact-section">
    <div class="text-center">
        <i class="fas fa-envelope icon-title"></i>
        <h1 class="contact-title">Contact Us</h1>
        <p class="contact-description">Hai! Kami senang mendengar dari kamu. Kirimkan pesan, kritik, atau saran melalui form di bawah ini 🍫</p>
    </div>

    <form method="post" class="mt-4">
        <div class="mb-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Tulis pesanmu di sini..." required></textarea>
        </div>
        <button type="submit" class="btn btn-brown w-100">Kirim Pesan</button>
    </form>

    <div class="text-center back-btn">
        <a href="home.php" class="btn btn-outline-dark mt-3">← Kembali ke Home</a>
    </div>
</div>

</body>
</html>