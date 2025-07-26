<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog - Brownies Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f3ef;
            color: #4e342e;
        }

        .btn-brown {
            background-color: #6d4c41;
            color: white;
        }

        .btn-brown:hover {
            background-color: #5d4037;
            color: white;
        }

        .card-title {
            color: #3e2723;
        }

        .card-text {
            font-size: 0.95rem;
        }

        .card {
            border: none;
            background-color: #fffaf5;
        }

        .card-img-top {
            max-height: 400px;
            object-fit: cover;
        }

        .hidden-text {
            display: none;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #5d4037;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4 fw-bold">Brownies Shop Blog</h1>
        <p class="text-center mb-5">Baca cerita menarik seputar produk, pelanggan, dan tips seputar brownies!</p>

        <div class="row g-4">
            <!-- Blog 1 -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <img src="legen.jpg" class="card-img-top" alt="Behind the Brownie" />
                    <div class="card-body">
                        <h5 class="card-title">Kisah Dibalik Brownies Legendaris Kami</h5>
                        <p class="card-text">Berawal dari dapur kecil di rumah nenek, kini menjadi salah satu brownies favorit di kota.</p>
                        <button class="btn btn-sm btn-brown" onclick="toggleStory('story1')">Baca Selengkapnya</button>
                        <div id="story1" class="hidden-text">
                            <p>
                                Pada tahun 1998, nenek kami mulai bereksperimen membuat brownies untuk cucu-cucunya. Resep sederhana itu dibuat dari bahan lokal seperti cokelat bubuk dan mentega asli. Karena rasa dan kelembutannya yang khas, para tetangga mulai memesan untuk acara keluarga.
                            </p>
                            <p>
                                Kini, kami mempertahankan resep itu dan menambahkan sentuhan modern, tanpa menghilangkan rasa nostalgia yang melekat di setiap gigitannya. Brownies kami dibuat dengan cinta, seperti yang nenek lakukan dulu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog 2 -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <img src="cara.jpg" class="card-img-top" alt="Brownie Tips" />
                    <div class="card-body">
                        <h5 class="card-title">Tips Menyimpan Brownie Tetap Lembut</h5>
                        <p class="card-text">Brownie sering mengeras? Ikuti 3 tips ini agar selalu moist & chewy seperti baru dipanggang.</p>
                        <button class="btn btn-sm btn-brown" onclick="toggleStory('story2')">Baca Selengkapnya</button>
                        <div id="story2" class="hidden-text">
                            <ul>
                                <li><strong>Bungkus dengan plastik wrap:</strong> Simpan brownies dalam suhu ruang dan bungkus rapat dengan plastik wrap agar tidak terkena udara.</li>
                                <li><strong>Gunakan wadah kedap udara:</strong> Simpan dalam kotak tertutup atau tupperware agar kelembapan terjaga.</li>
                                <li><strong>Hangatkan sebelum makan:</strong> Hangatkan 10–15 detik di microwave sebelum disajikan agar kembali lembut dan aroma cokelatnya keluar.</li>
                            </ul>
                            <p>Dengan cara ini, kamu bisa menikmati brownies seperti baru dipanggang meski sudah disimpan beberapa hari!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="home.php" class="btn btn-outline-dark">Kembali ke Home</a>
        </div>
    </div>

    <script>
        function toggleStory(id) {
            const story = document.getElementById(id);
            if (story.style.display === "none" || story.style.display === "") {
                story.style.display = "block";
            } else {
                story.style.display = "none";
            }
        }
    </script>
</body>
</html>