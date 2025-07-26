<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Brownie - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        body {
        background-color: #fffaf7;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .product-card {
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        }

        .product-card:hover {
        transform: scale(1.05);
        }

        .product-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
        }

        /* Tombol sesuai permintaan: warna sama, efek hover beda dari home.php */
        .btn-order {
        background-color: #5d4037;
        color: #fff;
        font-weight: 500;
        border: none;
        padding: 8px 20px;
        transition: all 0.3s ease-in-out;
        }

        .btn-order:hover {
        background-color: #7b4c34;
        color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .section-title {
        text-align: center;
        margin-bottom: 40px;
        }
    </style>
    </head>
    <body>
    <div class="container py-5">
        <h1 class="fw-bold text-center mb-3">Our Signature Brownies</h1>
        <p class="text-center text-muted mb-5">Freshly baked brownies made with love & Belgian chocolate.</p>

        <div class="row justify-content-center g-4">
        <!-- Brownie 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="ori.jpg" class="card-img-top product-img" alt="Original Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Original Brownie</h5>
                <p class="card-text text-muted">Rich & gooey chocolate brownie. Perfect for every occasion.</p>
                <p class="fw-bold text-success">Rp 25.000</p>
                <a href="order.php?produk=Original Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 2 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="cheese.jpg" class="card-img-top product-img" alt="Cream Cheese Swirl Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Cream Cheese Swirl Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 35.000</p>
                <a href="order.php?produk=Cream Cheese Swirl Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 3 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="oreo.jpg" class="card-img-top product-img" alt="Oreo Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Oreo brownie</h5>
                <p class="card-text text-muted">Brownie dengan lapisan renyah dan potongan kacang mete.</p>
                <p class="fw-bold text-success">Rp 28.000</p>
                <a href="order.php?produk=Oreo Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 4 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="mousse.jpg" class="card-img-top product-img" alt="Chocolate Mousse Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Chocolate Mousse Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 40.000</p>
                <a href="order.php?produk=Chocolate Mousse Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 5 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="muffins.jpg" class="card-img-top product-img" alt="Muffins Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Muffins Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 28.000</p>
                <a href="order.php?produk=Muffins Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 6 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="matcha.jpg" class="card-img-top product-img" alt="Matcha Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Matcha Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 30.000</p>
                <a href="order.php?produk=Matcha Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 7 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="Caramel.jpg" class="card-img-top product-img" alt="Caramel Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Caramel Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 30.000</p>
                <a href="order.php?produk=Caramel Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 8 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="brownies.jpg" class="card-img-top product-img" alt="Choco Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Choco Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 32.000</p>
                <a href="order.php?produk=Choco Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        <!-- Brownie 9 -->
        <div class="col-md-4 col-sm-6">
            <div class="card product-card">
            <img src="hampers.jpg" class="card-img-top product-img" alt="Hampers Brownie">
            <div class="card-body text-center">
                <h5 class="card-title">Hampers Brownie</h5>
                <p class="card-text text-muted">Kombinasi unik matcha dan cokelat, lembut dan aromatik.</p>
                <p class="fw-bold text-success">Rp 50.000</p>
                <a href="order.php?produk=Hampers Brownie" class="btn btn-order">Order</a>
            </div>
            </div>
        </div>

        </div>

        <div class="text-center mt-5">
        <a href="home.php" class="btn btn-outline-dark">Kembali ke Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>