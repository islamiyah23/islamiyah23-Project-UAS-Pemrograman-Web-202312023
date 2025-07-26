<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fffaf7;
        }

        .navbar {
            background-color: #fffaf7;
        }

        .navbar-brand, .nav-link {
            color: #5d4037 !important;
            font-weight: bold;
        }

        .hero-section {
            background: #fffaf7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 80px 10%;
            position: relative;
        }

        .hero-text {
            max-width: 50%;
        }

        .hero-text h1 {
            font-weight: bold;
            color: #3e2723;
        }

        .hero-text p {
            color: #5d4037;
            font-size: 18px;
        }

        .hero-buttons .btn {
            margin-right: 10px;
            border-radius: 20px;
            font-weight: 500;
            padding: 8px 20px;
        }

        .btn-read {
            border: 1px solid #d32f2f;
            color: #d32f2f;
        }

        .btn-read:hover {
            background-color: #d32f2f;
            color: white;
        }

        .btn-order {
            background-color: #5d4037;
            color: white;
            border: none;
        }

        .btn-order:hover {
            background-color: #3e2723;
        }

        .hero-img img {
            max-width: 400px;
            border-radius: 10px;
        }

        .wave {
            margin-top: -60px;
        }

        .specials-section {
            background-color: #ffffff;
            padding: 60px 10%;
            text-align: center;
        }

        .product-card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        @media (max-width: 767.98px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
            }
            .hero-text, .hero-img {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="home.php">Brownies Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="brownie.php">Brownie</a></li>
                <li class="nav-item"><a class="nav-link" href="recipes.php">Recipes</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                <li class="nav-item"><a class="nav-link" href="activity_log.php">Aktivitas</a></li>
                <li class="nav-item"><a class="nav-link" href="history_transaksi.php">History</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-text">
        <h1>Order your favorite brownies online and enjoy them at home!</h1>
        <p>"Setiap lapisannya penuh cinta, setiap potongannya bikin bahagia."</p>
        <div class="hero-buttons mt-4">
            <a href="about_brownies_shop.html" class="btn btn-read">READ MORE</a>
            <a href="order.php" class="btn btn-order">ORDER NOW</a>
        </div>
    </div>
    <div class="hero-img">
        <img src="brownies.jpg" alt="Brownie Hero Image"/>
    </div>
</section>

<!-- Wave Divider -->
<div class="wave">
    <svg viewBox="0 0 500 100" preserveAspectRatio="none" style="display:block; width:100%; height:60px;">
        <path d="M0,0 C150,100 350,0 500,100 L500,00 L0,0 Z" style="stroke: none; fill: #fff;"></path>
    </svg>
</div>

<!-- Specials Section -->
<section class="specials-section">
    <h2 class="mb-3 fw-bold">Best Sellers</h2>
    <p class="text-muted mb-5">Discover our top-selling signature brownies and taste the difference!</p>
    <div class="row justify-content-center g-4">

        <!-- Product 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
                <img src="ice cream brownies.jpg" class="card-img-top product-img" alt="Ice Cream With Brownie">
                <div class="card-body text-center">
                    <h5 class="card-title">Ice Cream With Brownie</h5>
                    <p class="card-text">Rp 38.000</p>
                    <a href="order.php" class="btn btn-order">ORDER</a>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
                <img src="strawberry.jpg" class="card-img-top product-img" alt="Strawberry Brownie">
                <div class="card-body text-center">
                    <h5 class="card-title">Strawberry Brownie</h5>
                    <p class="card-text">Rp 40.000</p>
                    <a href="order.php" class="btn btn-order">ORDER</a>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
                <img src="tiramisu.jpg" class="card-img-top product-img" alt="Tiramisu Brownie">
                <div class="card-body text-center">
                    <h5 class="card-title">Tiramisu Brownie</h5>
                    <p class="card-text">Rp 35.000</p>
                    <a href="order.php" class="btn btn-order">ORDER</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>