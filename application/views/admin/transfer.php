<!-- [ breadcrumb ] start -->
<style>
         @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
         }
         .blink {
            animation: blink 3s infinite;
         }

        .payment-container {
            /*max-width: 800px;
            margin: 50px auto;*/
            width: 100%;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .payment-summary {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .payment-summary p {
            margin-bottom: 5px;
        }
        .method-group-title {
            font-size: 1.15rem;
            font-weight: bold;
            color: #28a745; /* Warna hijau seperti di gambar contoh */
            margin-top: 25px;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e9ecef; /* Garis bawah tipis */
        }
        .method-group-description {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 15px;
        }
        .method-item.active{
            border-radius: 10px;
            border: 1px solid #00aadc !important;
            background-color: #e6f7ff;
        }
        .method-item {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Untuk mendorong panah ke kanan */
            padding: 15px;
            border-bottom: 1px solid #e9ecef; /* Garis pemisah antar item */
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            position: relative;
        }
        .method-item img {
            position: absolute;
            right: 25px;
        }
        .method-item:last-child {
            border-bottom: none; /* Hapus border di item terakhir dalam grup */
        }
        .method-item:hover {
            background-color: #f1f1f1;
        }
        .method-item.selected {
            background-color: #e9f5ff; /* Latar belakang biru muda saat dipilih */
            border-left: 4px solid #007bff; /* Garis biru di kiri saat dipilih */
        }
        .method-item .method-info {
/*            display: flex;*/
            align-items: center;
        }
        .method-item img {
            max-height: 25px; /* Ukuran logo disesuaikan */
            margin-right: 15px;
            max-width: 43px;
        }
        .method-item .fa-arrow-right {
            color: #6c757d; /* Warna panah */
        }


        .method-item2.active{
            border-radius: 10px;
            border: 1px solid #00aadc !important;
            background-color: #e6f7ff;
        }
        .method-item2 {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Untuk mendorong panah ke kanan */
            padding: 15px;
            border-bottom: 1px solid #e9ecef; /* Garis pemisah antar item */
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            position: relative;
        }
        .method-item2 img {
            position: absolute;
            right: 25px;
        }
        .method-item2:last-child {
            border-bottom: none; /* Hapus border di item terakhir dalam grup */
        }
        .method-item2:hover {
            background-color: #f1f1f1;
        }
        .method-item2.selected {
            background-color: #e9f5ff; /* Latar belakang biru muda saat dipilih */
            border-left: 4px solid #007bff; /* Garis biru di kiri saat dipilih */
        }
        .method-item2 .method-info {
/*            display: flex;*/
            align-items: center;
        }
        .method-item2 img {
            max-height: 25px; /* Ukuran logo disesuaikan */
            margin-right: 15px;
            max-width: 43px;
        }
        .method-item2 .fa-arrow-right {
            color: #6c757d; /* Warna panah */
        }

        .btn-confirm {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            margin-top: 30px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 600px;
            padding: 30px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .section {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid #e0e0e0;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #555;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
            color: #444;
        }

        .detail-item strong {
            color: #222;
            font-weight: 500;
        }

        .highlight {
            color: #28a745; /* Green for highlighted text */
            font-weight: 600;
        }

        .total-payment-section {
            background-color: #e6f7ff; /* Light blue background for total */
            border-radius: 8px;
            padding: 25px;
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #b3e0ff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .total-payment-section .label {
            font-size: 22px;
            font-weight: 700;
            color: #0056b3; /* Darker blue for total label */
        }

        .total-payment-section .amount {
            font-size: 26px;
            font-weight: 800;
            color: #007bff; /* Primary blue for total amount */
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 24px;
            }
            .section {
                padding: 20px;
            }
            .total-payment-section .label {
                font-size: 20px;
            }
            .total-payment-section .amount {
                font-size: 24px;
            }
        } 

        .virtual-account-section {
            background-color: #e8f5e9; /* Light green */
            border-radius: 10px;
            padding: 30px;
            margin-top: 30px;
            text-align: center;
            border: 1px solid #c8e6c9;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.1);
        }

        .virtual-account-section .bank-logo {
/*            max-height: 40px;*/
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 127px;
        }

        .virtual-account-section .label {
            font-size: 18px;
            color: #2e7d32;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .virtual-account-number {
            font-size: 28px;
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 20px;
            background-color: #dcedc8; /* Lighter green */
            padding: 10px 15px;
            border-radius: 8px;
            display: inline-block;
            letter-spacing: 1px;
            user-select: all; /* Allows easy selection */
        }

        .copy-button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .copy-button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .copy-button:active {
            transform: translateY(0);
        }

        .copy-button.copied {
            background-color: #007bff; /* Blue when copied */
        }

        .instruction-section {
            background-color: #e3f2fd; /* Light blue */
            border-radius: 10px;
            padding: 25px;
            margin-top: 25px;
            border: 1px solid #bbdefb;
        }

        .instruction-section .section-title {
            color: #1565c0;
            border-bottom-color: #a7d9f7;
            margin-bottom: 15px;
        }

        .instruction-list {
            list-style-type: decimal;
            padding-left: 20px;
            margin: 0;
            font-size: 15px;
            color: #444;
        }
        .instruction-list li {
            margin-bottom: 8px;
        }

        .total-payment-section {
            background-color: #e6f7ff; /* Light blue background for total */
            border-radius: 10px;
            padding: 25px;
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #b3e0ff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .total-payment-section .label {
            font-size: 24px;
            font-weight: 700;
            color: #0056b3;
        }

        .total-payment-section .amount {
            font-size: 30px;
            font-weight: 800;
            color: #007bff;
        }

        .action-buttons {
            text-align: center;
            margin-top: 30px;
        }

        .action-buttons .btn {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-decoration: none;
            margin: 0 10px;
        }

        .action-buttons .btn.secondary {
            background-color: #6c757d;
        }

        .action-buttons .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .action-buttons .btn.secondary:hover {
            background-color: #5a6268;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            h1 {
                font-size: 26px;
                margin-bottom: 25px;
            }
            .section-title {
                font-size: 20px;
            }
            .detail-item {
                font-size: 13px;
            }
            .virtual-account-number {
                font-size: 24px;
                padding: 8px 10px;
            }
            .copy-button, .action-buttons .btn {
                padding: 10px 20px;
                font-size: 15px;
            }
            .total-payment-section .label {
                font-size: 20px;
            }
            .total-payment-section .amount {
                font-size: 26px;
            }
            .instruction-list {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .action-buttons {
                flex-direction: column;
                display: flex;
            }
            .action-buttons .btn {
                width: calc(100% - 20px);
                margin-bottom: 10px;
            }
        }

         .accordion {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
              max-width: 100%;
              margin: auto;
              border-radius: 12px;
              overflow: hidden;
              box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            }

            .accordion-item {
              border-bottom: 1px solid #bbdefb;
            }

            .accordion input {
              display: none;
            }

            .accordion label {
                color: #1565c0;
              display: flex;
              justify-content: space-between;
              align-items: center;
              padding: 20px;
              cursor: pointer;
              font-weight: bold;
              transition: background 0.3s;
            }

            .accordion label:hover {
              background: #f0f4f8;
            }

            .accordion label .icon {
              transition: transform 0.3s;
              color: #0077cc;
            }

            .accordion input:checked + label .icon {
              transform: rotate(90deg);
            }

            .accordion-content {
              max-height: 0;
              overflow: hidden;
              padding: 0 20px;
              color: #555;
              background: #ffffff;
              transition: max-height 0.4s ease, padding 0.3s;
            }

            .accordion input:checked ~ .accordion-content {
              max-height: 800px;
              padding: 20px;
            }

        .card-custom {
            border-radius: 1rem; /* More rounded corners */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Stronger shadow */
        }
        .qr-code-container-custom {
            border: 1px dashed #ced4da; /* Light gray dashed border */
            background-color: #e9ecef; /* Lighter background for QR section */
        }

        .card-custom {
            border-radius: 1rem; /* More rounded corners */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Stronger shadow */
        }
        .btn-custom-blue {
            background-color: #0d6efd; /* Bootstrap primary blue */
            border-color: #0d6efd;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-custom-blue:hover {
            background-color: #0b5ed7; /* Darker blue on hover */
            border-color: #0a58ca;
            transform: scale(1.05);
        }
        .btn-custom-secondary {
            background-color: #6c757d; /* Bootstrap secondary gray */
            border-color: #6c757d;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-custom-secondary:hover {
            background-color: #5c636a; /* Darker gray on hover */
            border-color: #565e64;
            transform: scale(1.05);
        }
        /* Custom style for OVO button */
        .btn-ovo {
            background-color: #4C2F8A; /* OVO's primary purple */
            border-color: #4C2F8A;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-ovo:hover {
            background-color: #3a236b; /* Darker purple on hover */
            border-color: #3a236b;
            color: white;
            transform: scale(1.05);
        }

        .btn-dana {
            background-color: #108EE9; /* DANA's primary blue */
            border-color: #108EE9;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-dana:hover {
            background-color: #0d7ac7; /* Darker blue on hover */
            border-color: #0d7ac7;
            color: white;
            transform: scale(1.05);
        }
        .barcode-container-custom {
            border: 1px dashed #ced4da; /* Light gray dashed border */
            background-color: #e9ecef; /* Lighter background for barcode section */
        }

        .btn-shopeepay {
            background-color: #EE4D2D; /* ShopeePay's primary orange */
            border-color: #EE4D2D;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-shopeepay:hover {
            background-color: #d84429; /* Darker orange on hover */
            border-color: #d84429;
            color: white;
            transform: scale(1.05);
        }
        .method-disabled{
            opacity: 0.6;
        }

        /* CSS Kustom untuk bagian batas waktu pembayaran */
        .payment-deadline-box {
            background-color: #fef3c7; /* Warna latar belakang kuning muda (setara dengan Tailwind bg-yellow-100) */
            border: 1px solid #fcd34d; /* Border kuning (setara dengan Tailwind border-yellow-300) */
            color: #92400e; /* Warna teks kuning gelap (setara dengan Tailwind text-yellow-800) */
            padding-left: 1.5rem; /* Padding horizontal 24px (setara dengan Tailwind px-6) */
            padding-right: 1.5rem; /* Padding horizontal 24px (setara dengan Tailwind px-6) */
            padding-top: 1rem; /* Padding vertikal 16px (setara dengan Tailwind py-4) */
            padding-bottom: 1rem; /* Padding vertikal 16px (setara dengan Tailwind py-4) */
            border-radius: 0.375rem; /* Sudut membulat (setara dengan Tailwind rounded-md) */
            text-align: center; /* Teks rata tengah (setara dengan Tailwind text-center) */
            font-size: 0.875rem; /* Ukuran font kecil (setara dengan Tailwind text-sm) */
        }

        .payment-deadline-box .deadline-label {
            font-weight: 600; /* Ketebalan font semi-bold (setara dengan Tailwind font-semibold) */
            margin-bottom: 0.25rem; /* Margin bawah 4px (setara dengan Tailwind mb-1) */
        }

        .payment-deadline-box .deadline-time {
            font-size: 1.125rem; /* Ukuran font besar (setara dengan Tailwind text-lg) */
            font-weight: 700; /* Ketebalan font bold (setara dengan Tailwind font-bold) */
        }

        .payment-success-box {
            background-color: #d1fae5; /* Warna latar belakang hijau sangat muda (setara dengan Tailwind bg-green-100) */
            border: 1px solid #a7f3d0; /* Border hijau muda (setara dengan Tailwind border-green-300) */
            color: #065f46; /* Warna teks hijau gelap (setara dengan Tailwind text-green-800) */
            padding-left: 1.5rem; /* Padding horizontal 24px (setara dengan Tailwind px-6) */
            padding-right: 1.5rem; /* Padding horizontal 24px (setara dengan Tailwind px-6) */
            padding-top: 1rem; /* Padding vertikal 16px (setara dengan Tailwind py-4) */
            padding-bottom: 1rem; /* Padding vertikal 16px (setara dengan Tailwind py-4) */
            border-radius: 0.375rem; /* Sudut membulat (setara dengan Tailwind rounded-md) */
            text-align: center; /* Teks rata tengah (setara dengan Tailwind text-center) */
            font-size: 1.125rem; /* Ukuran font besar (setara dengan Tailwind text-lg) */
            font-weight: 600; /* Ketebalan font semi-bold (setara dengan Tailwind font-semibold) */
            display: flex; /* Mengaktifkan Flexbox */
            align-items: center; /* Menyelaraskan item secara vertikal ke tengah */
            justify-content: center; /* Menyelaraskan item secara horizontal ke tengah */
            gap: 0.5rem; /* Jarak antar item flex (setara dengan Tailwind space-x-2) */
        }

        .payment-success-box svg {
            height: 1.5rem; /* Tinggi ikon SVG 24px (setara dengan Tailwind h-6) */
            width: 1.5rem; /* Lebar ikon SVG 24px (setara dengan Tailwind w-6) */
            color: #047857; /* Warna ikon hijau (setara dengan Tailwind text-green-600) */
        }


      </style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col">
            <div class="page-header-title">
                <h5 class="m-b-10"><?= $title ?></h5>
            </div>
            </div>
            <div class="col-auto">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><?= $title ?></li>
            </ul>
            </div>
        </div>
    </div>
</div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5><?= $title ?></h5>
                   
                </div>
                <div class="card-body">
                    <div class="content">

                        <div class="" style="padding-bottom: 1px;">
                            <div class="" style="">
                                <h2 class="text-center mb-4">Detail Pembayaran</h2>
                                <hr>
                                <h5 class="text-center mb-4 invc" >Nomor Invoice : <span class="invoicenya" style="font-weight: bold;"><?= $tagihan->invoice_id ?></span></h5>

                            <!-- Bagian Batas Waktu Pembayaran Baru -->
                            <div class="payment-deadline-box mb-2" <?php if($pilihpembayaran == "sudah") { if($detailmethod->status == "UNPAID"){} else {echo ' style="display:none" ';} } else { echo ' style="display:none" '; } ?>>
                                <p class="deadline-label">Mohon selesaikan pembayaran sebelum:</p>
                                <p class="deadline-time" style="margin-bottom:0px"><?php if($pilihpembayaran == "sudah") { echo formatTanggalIndo($detailmethod->expired_at); } else {  } ?></p>
                            </div>

                            <!-- Bagian Status Pembayaran Lunas -->
                            <div class="payment-success-box mb-2"  <?php if($pilihpembayaran == "sudah") { if($detailmethod->status == "PAID"){} else {echo ' style="display:none" ';} } else { echo ' style="display:none" '; } ?> >
                                <!-- Ikon centang SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Pembayaran Berhasil! LUNAS</span>
                            </div>

                            <div class="section">
                                <div class="section-title">Ringkasan Tagihan Anda</div>
                                <div class="detail-item">
                                    <span>Nama Lembaga:</span>
                                    <strong><?= $tagihan->nama_lembaga ?></strong>
                                </div>
                                <div class="detail-item">
                                    <span>Jumlah Siswa:</span>
                                    <strong><?= $tagihan->jumlah_siswa ?></strong>
                                </div>
                                <div class="detail-item">
                                    <span>Biaya:</span>
                                    <strong>Rp <?= number_format($tagihan->amount, 0, ',', '.') ?></strong>
                                </div>
                                
                                
                            </div>

                            <div class="section" <?php if($pilihpembayaran == "sudah") { if($detailmethod->status == "PAID"){} else {echo ' style="display:none" ';} } else { echo ' style="display:none" '; } ?>>
                                <div class="section-title">Metode Pembayaran
                                        <div style="float: right;">
                                            <?php if($pilihpembayaran == "sudah") {
                                            ?>
                                            
                                               <img src="<?= base_url() ?>uploads/payment/logo/<?= $detailmethod->method ?>.png" alt="Logo <?= $detailmethod->method ?>" class="bank-logo" style="width: 70px;">
                                            <?php } else { } ?>
                                        </div>
                                </div>
                                <div>

                                    <div class="detail-item">
                                        <span>Waktu Pembayaran:</span>
                                        <span><?php if($pilihpembayaran == "sudah") { echo (($detailmethod->tanggal_pembayaran != "") ? formatTanggalIndo($detailmethod->tanggal_pembayaran) : "-"); } else { } ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="section">
                                <div class="section-title">Rincian Pembayaran</div>

                                <div class="detail-item">
                                    <span>Tagihan Biaya:</span>
                                    <span>Rp <?= number_format($tagihan->amount, 0, ',', '.')?></span>
                                </div>
                                <div class="detail-item biayaadmin"  <?php if($pilihpembayaran == "sudah") { } else { echo ' style="display:none" '; } ?> >
                                    <span>Biaya Admin:</span>
                                    <span >Rp <span class="jumlahadmin"><?php if($pilihpembayaran == "sudah") { echo number_format($detailmethod->biayaadmin, 0, ',', '.'); } else { } ?></span></span>
                                </div>
                                <div class="detail-item biayaadmin"  <?php if($pilihpembayaran == "sudah") { } else { echo ' style="display:none" '; } ?> >
                                    <span style="font-weight: bold;">Total Pembayaran:</span>
                                    <div class="amount" style="font-weight: bold;">Rp 
                                        <span class="total_amount">
                                            <?php if($pilihpembayaran == "sudah") { echo number_format($detailmethod->amount, 0, ',', '.'); } else { echo number_format($tarifpembayaran->jumlah_tarif ?? 0, 0, ',', '.');  } ?>
                                         
                                            
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div <?php if($pilihpembayaran == "sudah") { if($detailmethod->status == "PAID"){echo ' style="display:none" ';} else {} } else {  } ?>>
                            
                                <div class="virtual-account-section for-va aftersubmit" <?php if($pilihpembayaran == "sudah") { 
                                        if($detailmethod->method != "QRIS" && $detailmethod->method != "OVO" && $detailmethod->method != "DANA" && $detailmethod->method != "ALFAMART" && $detailmethod->method != "INDOMARET" && $detailmethod->method != "ALFAMIDI" && $detailmethod->method != "SHOPEEPAY"){
                                            echo ' style="display:block" '; 

                                        } else { 
                                            echo ' style="display:none" '; 
                                        }
                                    } else { 
                                        
                                            echo ' style="display:none" '; 

                                    } ?>>

                                    <?php if($pilihpembayaran == "sudah") { ?>
                                        <?php if ($detailmethod->method == "BRIVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/BRIVA.png" alt="Logo BRI" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "MANDIRIVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/MANDIRIVA.png" alt="Logo Mandiri" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "BCAVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/BCAVA.png" alt="Logo BCA" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "BNIVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/BNIVA.png" alt="Logo BNI" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "PERMATAVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/PERMATAVA.png" alt="Logo PERMATA" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "MUAMALATVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/MUAMALATVA.png" alt="Logo MUAMALAT" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "CIMBVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/CIMBVA.png" alt="Logo CIMB" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "BSIVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/BSIVA.png" alt="Logo BSI" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "OCBCVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/OCBCVA.png" alt="Logo OCBC" class="bank-logo">
                                        <?php } else if ($detailmethod->method == "DANAMONVA") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/DANAMONVA.png" alt="Logo DANAMON" class="bank-logo">
                                        <?php } ?>

                                    <?php } else { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/DANAMONVA.png" alt="Logo DANAMON" class="bank-logo">
                                    <?php } ?>

                                    <div class="label label-va">
                                    <?php if($pilihpembayaran == "sudah") { ?>
                                        <?php if ($detailmethod->method == "BRIVA") { ?>
                                             BRI Virtual Account
                                        <?php } else if ($detailmethod->method == "MANDIRIVA") { ?>
                                             Mandiri Virtual Account
                                        <?php } else if ($detailmethod->method == "BCAVA") { ?>
                                             BCA Virtual Account
                                        <?php } else if ($detailmethod->method == "BNIVA") { ?>
                                             BNI Virtual Account
                                        <?php } else if ($detailmethod->method == "PERMATAVA") { ?>
                                             Permata Virtual Account
                                        <?php } else if ($detailmethod->method == "MUAMALATVA") { ?>
                                             Muamalat Virtual Account
                                        <?php } else if ($detailmethod->method == "CIMBVA") { ?>
                                             CIMB Niaga Virtual Account
                                        <?php } else if ($detailmethod->method == "BSIVA") { ?>
                                             BSI Virtual Account
                                        <?php } else if ($detailmethod->method == "OCBCVA") { ?>
                                             OCBC NISP  Virtual Account
                                        <?php } else if ($detailmethod->method == "DANAMONVA") { ?>
                                             Danamon Virtual Account
                                        <?php } ?>

                                    <?php } ?>
                                        </div>
                                    <div id="virtualAccountNumber" class="virtual-account-number"><?php if($pilihpembayaran == "sudah") { ?><?= $detailmethod->pay_code ?><?php } ?></div>
                                    <button class="copy-button" onclick="copyVirtualAccount()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                        </svg>
                                        <span id="copyButtonText">Salin Nomor VA</span>
                                    </button>
                                </div>

                                <!-- QR Code Section -->
                                <div class="qr-code-container-custom rounded-lg p-4 mb-4 text-center for-qris mt-4" <?php if($pilihpembayaran == "sudah") {
                                        if($detailmethod->method == "QRIS"){
                                            echo ' style="display:block" '; 

                                        } else { 
                                            echo ' style="display:none" '; 
                                        }

                                    } else {
                                        
                                            echo ' style="display:none" '; 
                                    } ?>>
                                    
                                    <p class="text-secondary mb-3">Scan QR Code di bawah menggunakan aplikasi pembayaran Anda.</p>
                                    <!-- Placeholder for QR Code Image -->
                                    <!-- You would replace this with a dynamically generated QR code image -->
                                    <img src="<?= (isset($detailmethod->qr_url) ? $detailmethod->qr_url : "" )  ?>"
                                         alt="QR Code Pembayaran"
                                         class="img-fluid rounded-lg shadow-sm mx-auto d-block qrcode" style="max-width: 400px; height: auto;">
                                    <center>
                                            <img src="<?= base_url() ?>uploads/payment/logo/QRIS.png" alt="Logo QRIS" class="bank-logo mt-3" style="width: 70px;">
                                        
                                    </center>
                                </div>

                                <div class="mb-4 text-center for-ovo mt-4" <?php if($pilihpembayaran == "sudah") {
                                        if($detailmethod->method == "OVO" || $detailmethod->method == "DANA" || $detailmethod->method == "SHOPEEPAY"){
                                            echo ' style="display:block" '; 

                                        } else { 
                                            echo ' style="display:none" '; 
                                        }

                                    } else {
                                        
                                            echo ' style="display:none" '; 
                                    } ?>>
                                    <p class="text-secondary mb-3">Klik tombol di bawah untuk melanjutkan pembayaran via <span class="method-retail"><?= (isset($detailmethod->method) ? $detailmethod->method : "" )  ?></span>.</p>
                                    <a href="<?= (isset($detailmethod->qr_url) ? $detailmethod->qr_url : "#" )  ?>" class="link-ewallet">
                                        <button class="btn <?php
                                                            if (isset($detailmethod->method)){
                                                                if($detailmethod->method == "OVO"){
                                                                    echo "btn-ovo";
                                                                } else if ($detailmethod->method == "DANA"){
                                                                    echo "btn-dana";

                                                                } else {
                                                                    echo "btn-shopeepay";

                                                                }
                                                            } 
                                                                ?> btn-lg w-75 py-3 btn-ewallet">
                                            <!-- <img src="<?= base_url() ?>uploads/payment/logo/ovo.png" alt="OVO Icon" class="me-2 rounded-full" style="vertical-align: middle;"> -->
                                            Lanjutkan Pembayaran
                                        </button>
                                    </a>
                                    <p class="text-muted mt-3 small">Anda akan diarahkan ke aplikasi <span class="method-retail"><?= (isset($detailmethod->method) ? $detailmethod->method : "" )  ?></span> untuk menyelesaikan pembayaran.</p>
                                </div>


                                <!-- Alfamart Payment Details -->
                                <div class="barcode-container-custom rounded-lg p-4 mb-4 text-center for-retail mt-4" <?php if($pilihpembayaran == "sudah") {
                                        if($detailmethod->method == "ALFAMART" || $detailmethod->method == "INDOMARET" || $detailmethod->method == "ALFAMIDI"){
                                            echo ' style="display:block" '; 

                                        } else { 
                                            echo ' style="display:none" '; 
                                        }

                                    } else {
                                        
                                            echo ' style="display:none" '; 
                                    } ?>>
                                    <?php if (isset($detailmethod->method)) : ?>
                                    
                                        <?php if ($detailmethod->method == "ALFAMART") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/alfamart.png" alt="Logo Alfamart" class="bank-logo" style="width: 70px; margin-bottom: 10px;">
                                        <?php } else if ($detailmethod->method == "ALFAMIDI") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/alfamidi.png" alt="Logo Alfamidi" class="bank-logo" style="width: 70px; margin-bottom: 10px;">
                                        <?php } else if ($detailmethod->method == "INDOMARET") { ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/indomaret.png" alt="Logo Indomaret" class="bank-logo" style="width: 70px; margin-bottom: 10px;">
                                        <?php } else if ($detailmethod->method == "BNIVA") { // sdsdfsd ?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/bni.png" alt="Logo BNI" class="bank-logo" style="width: 70px; margin-bottom: 10px;">
                                        <?php } ?>
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>uploads/payment/logo/bni.png" alt="Logo BNI" class="bank-logo" style="width: 70px; margin-bottom: 10px;">
                                    <?php endif  ?>


                                    <p class="text-secondary mb-3">Tunjukkan barcode ini atau sebutkan kode pembayaran ke kasir <span class="method-retail"><?= (isset($detailmethod->method) ? ucwords(strtolower($detailmethod->method))  : "" )  ?></span>.</p>
                                    <!-- Placeholder for Barcode Image -->
                                    <!-- <img src="<?= (isset($detailmethod->barcode_url) ? $detailmethod->barcode_url : "" )  ?>"
                                         alt="Barcode Pembayaran"
                                         class="img-fluid rounded shadow-sm mx-auto d-block" style="max-width: 250px; height: auto;"> -->
                                    <p class="payment-code mt-3">Kode Pembayaran: <div id="" class="virtual-account-number" style="background-color:unset; padding: 0px;"><?php if($pilihpembayaran == "sudah") { ?><?= $detailmethod->pay_code ?><?php } ?></div></p>
                                    
                                </div>


                                <h3 class="aftersubmit section-title" style=" border:0px solid !important; margin-top:35px; margin-bottom:10px; <?php if($pilihpembayaran == "sudah") { } else { echo ' display:none '; } ?> ">Cara Pembayaran</h3>

                                <div class="accordion aftersubmit" <?php if($pilihpembayaran == "sudah") { } else { echo ' style="display:none" '; } ?>>
                                    
                                </div>



                                
                                

                                <div class="action-buttons aftersubmit" <?php if($pilihpembayaran == "sudah") { } else { echo ' style="display:none" '; } ?>>
                                    <button class="btn btn-sudahbayar">Cek Status Pembayaran</button>
                                    <a href="<?= base_url() ?>siswa/dashboard"><button class="btn secondary">Kembali ke Beranda</button></a>
                                </div>
                            </div>

                            <input type="hidden" name="" value="<?= (int)$tagihan->amount; ?>" id="jumlah_tarif">
                            <input type="hidden" name="" value="" id="reference">
                            <input type="hidden" name="" value="" id="datamethod">
                            <input type="hidden" name="" value="<?= $tagihan->id ?>" id="invoice_id" value="">

                            <div class="hiddenaftersubmit" <?php if($pilihpembayaran == "sudah") { echo ' style="display:none" '; } else { } ?>>
                                <h4 class="mb-3" style="margin-top: 25px;">METODE PEMBAYARAN</h4>

                                <div class="method-group ">
                                    <?php foreach ($metode_pembayaran as $key) : ?>
                                        <div class="method-item mb-2" data-method="<?= $key['code'] ?>">
                                            <div class="method-info">
                                                
                                                <span><?= $key['name'] ?></span><br>
                                            </div>
                                            <?php 
                                            $img = $key['code'];
                                            if($key['code'] == "QRIS" || $key['code'] == "QRIS2" || $key['code'] == "QRISC") {
                                                $img = "QRIS";
                                            }?>
                                            <img src="<?= base_url() ?>uploads/payment/logo/<?= $img ?>.png" alt="<?= $key['name'] ?>">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-footer hiddenaftersubmit tes" style="padding:10px; bottom: 56px; <?php if($pilihpembayaran == "sudah") { echo ' display:none; '; } else { } ?> ">
                        <div class="total-payment-section" style="margin: 0px; padding: 10px 15px;">
                            <div class="label" style="font-size:18px">Total Pembayaran</div>
                            <div class="amount" style="font-size:18px">Rp 
                                <span class="total_amount">
                                    <?php if($pilihpembayaran == "sudah") { echo number_format($detailmethod->amount, 0, ',', '.'); } else { echo number_format($tagihan->amount, 0, ',', '.');  } ?>
                                
                                    
                                </span>
                            </div>
                        </div>
                        <div class="">
                        <button type="button" class="btn btn-primary btn-confirm" id="confirmPaymentBtn" style="margin-top:10px">Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>