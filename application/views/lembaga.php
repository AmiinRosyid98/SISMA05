<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Lembaga</title>
    <!-- Memuat Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <!--====== Favicon Icon ======-->
     <link
      rel="shortcut icon"
      href="<?= base_url() ?>assets/landing/assets/images/favicon.svg"
      type="image/svg"
    />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
        }
        .header-section {
            background: linear-gradient(to right, #006A6D, #2575fc);
            color: white;
            padding: 5rem 0;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }
        .search-container {
            margin-top: -3rem; /* Memindahkan search bar ke atas header */
            position: relative;
            z-index: 10;
        }
        .search-input {
            border-radius: 50px;
            padding: 1.5rem 2rem;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .card-item {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card-body h5 {
            font-weight: 600;
        }
        .no-results {
            display: none;
            text-align: center;
            margin-top: 2rem;
            color: #6c757d;
        }
        .btn-primary {
            background-color: #006A6D;
            border-color: #006A6D;
        }
        .btn-primary:hover {
            background-color: #006A6D;
            border-color: #006A6D;
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header-section text-center">
        <div class="container">
            <h1 class="fw-bold mb-3">Cari Lembaga</h1>
            <p class="lead">Temukan lembaga yang Anda cari dengan mudah dan cepat.</p>
        </div>
    </header>

    <!-- Form Pencarian -->
    <div class="container search-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control search-input" placeholder="Cari nama lembaga...">
                </div>
            </div>
        </div>
    </div>

    <!-- Hasil Pencarian -->
    <div class="container my-5">
        <div class="row g-4" id="institutionList">
            <!-- Data Lembaga akan dimuat di sini -->
            <!-- Contoh data statis untuk demonstrasi -->
            <?php foreach ($lembaga as $key) { ?>
            <div class="col-lg-4 col-md-6" data-name="<?php echo $key->nama; ?>">
                <div class="card card-item h-100">
                    <div class="card-body">
                        <div  style="display: flex; justify-content: space-between; gap: 10px;">
                            <div style="width: 100%;">
                                <h5 class="card-title"><?php echo $key->nama; ?></h5>
                                <p class="card-text text-muted fs-10" style="font-size: 12px;"><i class="fa-solid fa-location-dot"></i> <?php echo $key->alamat; ?>, <?php echo $key->kab_kota; ?>, <?php echo $key->provinsi; ?>, Kode Pos : <?php echo $key->kode_pos; ?></p>
                            </div>
                            <div style="max-width: 70px; min-width: 70px;">
                                <img src="<?php echo base_url('uploads/lembaga/logo/' . $key->logo_lembaga); ?>" alt="Logo Lembaga" class="img-fluid" style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;">
                            </div>
                        </div>
                        <a href="<?php echo $key->website; ?>" class="btn btn-primary mt-4 float-end "><i class="fa-solid fa-globe"></i> Buka Website</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
        <p id="noResultsMessage" class="no-results">Tidak ada lembaga yang sesuai dengan pencarian Anda.</p>
    </div>

    <!-- Memuat Bootstrap JS dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mengambil elemen-elemen yang diperlukan dari HTML
        const searchInput = document.getElementById('searchInput');
        const institutionList = document.getElementById('institutionList');
        const allCards = institutionList.getElementsByClassName('col-lg-4');
        const noResultsMessage = document.getElementById('noResultsMessage');

        // Menambahkan event listener untuk setiap ketikan pada input
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();
            let found = false;

            // Iterasi melalui setiap kartu lembaga
            for (let i = 0; i < allCards.length; i++) {
                const card = allCards[i];
                const cardName = card.getAttribute('data-name').toLowerCase();

                // Memeriksa apakah nama lembaga mengandung kata kunci pencarian
                if (cardName.includes(searchTerm)) {
                    card.style.display = ''; // Menampilkan kartu
                    found = true;
                } else {
                    card.style.display = 'none'; // Menyembunyikan kartu
                }
            }

            // Menampilkan atau menyembunyikan pesan 'tidak ditemukan'
            if (found) {
                noResultsMessage.style.display = 'none';
            } else {
                noResultsMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
