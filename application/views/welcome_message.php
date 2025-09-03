<!-- =========

	Template Name: Play
	Author: UIdeck
	Author URI: https://uideck.com/
	Support: https://uideck.com/support/
	Version: 1.1

========== -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SISMA05 - Sistem Informasi Sekolah & Madrasah</title>

    <!-- Primary Meta Tags -->
<meta name="title" content="SISMA05 - Sistem Informasi Sekolah & Madrasah">
<meta name="description" content="SISMA05 - Sistem Informasi Sekolah & Madrasah Team">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://uideck.com/play/">
<meta property="og:title" content="SISMA05 - Sistem Informasi Sekolah & Madrasah">
<meta property="og:description" content="SISMA05 - Sistem Informasi Sekolah & Madrasah Team">
<meta property="og:image" content="https://uideck.com/wp-content/uploads/2021/09/play-meta-bs.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://uideck.com/play/">
<meta property="twitter:title" content="SISMA05 - Sistem Informasi Sekolah & Madrasah">
<meta property="twitter:description" content="SISMA05 - Sistem Informasi Sekolah & Madrasah Team">
<meta property="twitter:image" content="https://uideck.com/wp-content/uploads/2021/09/play-meta-bs.jpg">

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="<?= base_url() ?>assets/landing/assets/images/favicon.png"
      type="image/svg"
    />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/assets/css/animate.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/assets/css/lineicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/assets/css/ud-styles.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
      .for-mobile {
        display: none;
      }
      @media (max-width: 768px) {
        .for-mobile {
          display: block;
        }
      }
    </style>
  </head>
  <body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand" href="index.html">
                <img src="<?= base_url() ?>assets/landing/assets/images/logo/logo-2.png" alt="Logo" />
              </a>
              <button class="navbar-toggler">
                <span class="toggler-icon"> </span>
                <span class="toggler-icon"> </span>
                <span class="toggler-icon"> </span>
              </button>

              <div class="navbar-collapse">
                <ul id="nav" class="navbar-nav mx-auto">
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#home">Beranda</a>
                  </li>

                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#about">Tentang Kami</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#pricing">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#faq">FAQ</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#contact">Kontak</a>
                  </li>
                  <li class="nav-item for-mobile mb-2">
                    
                    <a href="<?= base_url() ?>login" class="ud-main-btn ud-white-btn" style="float: right; width: 100%; color:white">
                      <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                  </li>
                  <li class="nav-item for-mobile">
                    
                    <a href="<?= base_url() ?>register" class="ud-main-btn ud-white-btn" style="float: right; width: 100%; color:white">
                      <i class="fas fa-user-plus"></i> Daftar
                    </a>
                  </li>
				 
				  
                </ul>
              </div>

              <div class="navbar-btn d-none d-sm-inline-block">
				
                <a href="<?= base_url() ?>login" class="ud-main-btn ud-login-btn">
                  Login
                </a>
                <a href="<?= base_url() ?>register" class="ud-main-btn ud-white-btn">
                  Daftar
                </a>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ====== Header End ====== -->

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
              <h1 class="ud-hero-title">
			  SISMA05 – Sistem Informasi Sekolah & Madrasah
              </h1>
              <p class="ud-hero-desc">
			  Kelola Sekolah Lebih Mudah, Cepat, dan Hemat
              </p>
              <ul class="ud-hero-buttons">
                <li>
                  <a href="<?= base_url() ?>register" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-white-btn">
                    Daftar Sekarang
                  </a>
                </li>
				<li>
                  <a href="<?= base_url() ?>lembaga" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-link-btn">
                    <i class="lni lni-search"></i> Cari Sekolah <i class="lni lni-arrow-right"></i>
                  </a>
                </li>
                
              </ul>
            </div>
            <div
              class="ud-hero-brands-wrapper wow fadeInUp"
              data-wow-delay=".3s"
            >
            </div>
            <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
              <img src="<?= base_url() ?>assets/landing/assets/images/hero/hero-image.jpeg" alt="hero-image" class="" style="border-radius:10px 10px 0px 0px" />
              <img
                src="<?= base_url() ?>assets/landing/assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="<?= base_url() ?>assets/landing/assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-2"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Hero End ====== -->

    <!-- ====== Features Start ====== -->
    <section id="features" class="ud-features">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title">
              <span>Features</span>
              <h2>Keunggulan Utama</h2>
              <p>
              Dengan layanan yang terjangkau, fitur lengkap, dan mudah digunakan, kami membantu lembaga Anda berkembang lebih cepat dan efisien.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".1s">
              <div class="ud-feature-icon">
                <i class="lni lni-book"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">MANAJEMEN DATA SISWA DAN PTK</h3>
                <p class="ud-feature-desc">
                  Kelola data siswa dan guru di sekolah dengan mudah 
                </p>
                
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">
              <div class="ud-feature-icon">
                <i class="fas fa-qrcode"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Absensi QR siswa dan PTK</h3>
                <p class="ud-feature-desc">
                  Kelola absensi siswa dan guru menggunakan QR code 
                </p>
                
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".2s">
              <div class="ud-feature-icon">
                <i class="fas fa-credit-card"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Payment gateway </h3>
                <p class="ud-feature-desc">
                  Mudahkan pembayaran siswa dengan system pembayaran systematis (Qris, VA, Alfamart)
                </p>
                
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".25s">
              <div class="ud-feature-icon">
                <i class="lni lni-layout"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Fitur lengkap lainya</h3>
                <p class="ud-feature-desc">
                  Manajemen file Arship, PPDB online, System' kelulusan, e-learning,
                </p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Features End ====== -->

    <!-- ====== About Start ====== -->
    <section id="about" class="ud-about">
      <div class="container">
        <div class="ud-about-wrapper wow fadeInUp" data-wow-delay=".2s">
          <div class="ud-about-content-wrapper">
            <div class="ud-about-content">
              <span class="tag">Apa Itu SISMA05?</span>
              <h2>SISMA05 - Sistem Informasi Sekolah & Madrasah</h2>
              <p>
                SISMA05 adalah solusi yang dirancang khusus untuk lembaga pendidikan, termasuk sekolah dan madrasah. 
                Dengan SISMA05, Anda dapat mengelola berbagai aspek operasional lembaga Anda dengan lebih efisien dan efektif.
              </p>

              <a href="<?= base_url() ?>register" class="ud-main-btn">Daftar Sekarang</a>
            </div>
          </div>
          <div class="ud-about-image" >
            <img src="<?= base_url() ?>assets/landing/assets/images/about/about.jpeg" alt="about-image"
            
            />
          </div>
        </div>
      </div>
    </section>
    <!-- ====== About End ====== -->

    <!-- ====== Pricing Start ====== -->
    <section id="pricing" class="ud-pricing">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title mx-auto text-center">
              <span>Pricing</span>
              <h2>Paket Harga Kami</h2>
              <p>
			          Cukup Rp <?= number_format($setting->biaya_langganan, 0, ',', '.') ?> per siswa untuk menikmati semua fitur yang tersedia.

              </p>
            </div>
          </div>
        </div>

        <div class="row g-0 align-items-center justify-content-center">
          
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div
              class="ud-single-pricing active wow fadeInUp"
              data-wow-delay=".1s"
            >
              <span class="ud-popular-tag">SISMA05</span>
              <div class="ud-pricing-header">
                <h3>Harga</h3>
                <h4>Rp <?= number_format($setting->biaya_langganan, 0, ',', '.') ?><small>/siswa</small></h4>
              </div>
              <div class="ud-pricing-body">
                <ul>
                  <li>- System PPDB Siap Pakai</li>
                  <li>- System Pengumuman Kelulusan</li>
                  <li>- Payment Gatway Keuangan</li>
                  <li>- Manajemen data Siswa dan Guru</li>
                  <li>- Manajemen File akreditasi</li>
                  <li>- dan yg lainnya</li>
                </ul>
              </div>
              <div class="ud-pricing-footer">
                <a href="<?= base_url() ?>register" class="ud-main-btn ud-white-btn">
                  Daftar Sekarang
                </a>
              </div>
            </div>
          </div>
		  <div class="col-lg-8 col-md-6 col-sm-10">
			<div
				class=" wow fadeInUp"
				data-wow-delay=".1s"
				>
				<img src="<?= base_url() ?>assets/landing/assets/images/about/responsive.jpeg" alt="pricing-image" />
			</div>
		  </div>
        </div>
      </div>
    </section>
    <!-- ====== Pricing End ====== -->

    <!-- ====== FAQ Start ====== -->
    <section id="faq" class="ud-faq">
      <div class="shape">
        <img src="<?= base_url() ?>assets/landing/assets/images/faq/shape.svg" alt="shape" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title text-center mx-auto">
              <span>FAQ</span>
              <h2> Ada Pertanyaan? Kami Punya Jawabannya</h2>
              <p>
			  Temukan jawaban dari berbagai pertanyaan umum seputar layanan kami.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".1s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apa itu SISMA05?</span>
                </button>
                <div id="collapseOne" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    SISMA05 adalah sistem informasi berbasis web/app untuk mengelola data sekolah dan madrasah.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".15s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Fitur apa saja yang tersedia di SISMA05?</span>
                </button>
                <div id="collapseTwo" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    SISMA05 menyediakan berbagai fitur untuk memudahkan pengelolaan data lembaga pendidikan, termasuk fitur manajemen data siswa, absensi, nilai, dan prestasi. <br>
                    Fitur Utama : 
                    <ul>
                      <li>- Absensi online</li>
                      <li>- Pembayaran SPP</li>
                      <li>- Jadwal pelajaran</li>
                      <li>- E-rapor</li>
                      <li>- Komunikasi guru & orang tua</li>
                      <li>- Manajemen siswa & guru</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".2s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apakah SISMA05 bisa digunakan di semua perangkat?</span>
                </button>
                <div id="collapseThree" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    SISMA05 dirancang untuk dapat diakses di semua perangkat, termasuk desktop, laptop, dan mobile device.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".1s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFour"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apakah ada versi gratis atau trial?</span>
                </button>
                <div id="collapseFour" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Ada uji coba gratis selama <?= $setting->masa_trial ?> hari.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".15s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFive"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Berapa biaya langganannya?</span>
                </button>
                <div id="collapseFive" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Biaya langganannya adalah Rp. <?= number_format($setting->biaya_langganan, 0, ',', '.') ?>/siswa/bulan.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".2s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseSix"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apakah data sekolah aman?</span>
                </button>
                <div id="collapseSix" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Data sekolah aman dan terlindungi dengan enkripsi SSL/TLS.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".25s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseSeven"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apakah bisa digunakan untuk madrasah juga?</span>
                </button>
                <div id="collapseSeven" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Ya, SISMA05 dirancang khusus untuk sekolah dan madrasah.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".3s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseEight"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Bagaimana cara mendaftar atau mulai menggunakan SISMA05?</span>
                </button>
                <div id="collapseEight" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Anda dapat mendaftar atau mulai menggunakan SISMA05 dengan menghubungi admin di nomor yang tertera di halaman utama.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".35s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseNine"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apakah membutuhkan instalasi?</span>
                </button>
                <div id="collapseNine" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Tidak, SISMA05 adalah aplikasi berbasis web/app. cukup akses melalui browser atau aplikasi.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".4s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTen"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apakah SISMA05 bisa custom sesuai kebutuhan sekolah?</span>
                </button>
                <div id="collapseTen" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Ya, SISMA05 bisa disesuaikan dengan kebutuhan sekolah.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== FAQ End ====== -->

    <!-- ====== Testimonials Start ====== --
    <section id="testimonials" class="ud-testimonials">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title mx-auto text-center">
              <span>Testimonials</span>
              <h2>Apa Kata Pengguna Kami
			  </h2>
              <p>Dengarkan pengalaman nyata dari para pengguna yang telah merasakan manfaat layanan kami.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div
              class="ud-single-testimonial wow fadeInUp"
              data-wow-delay=".1s"
            >
              <div class="ud-testimonial-ratings">
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
              </div>
              <div class="ud-testimonial-content">
                <p>
                  “Our members are so impressed. It's intuitive. It's clean.
                  It's distraction free. If you're building a community.
                </p>
              </div>
              <div class="ud-testimonial-info">
                <div class="ud-testimonial-image">
                  <img
                    src="<?= base_url() ?>assets/landing/assets/images/testimonials/author-01.png"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4>Sabo Masties</h4>
                  <p>Founder @UIdeck</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
              class="ud-single-testimonial wow fadeInUp"
              data-wow-delay=".15s"
            >
              <div class="ud-testimonial-ratings">
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
              </div>
              <div class="ud-testimonial-content">
                <p>
                  “Our members are so impressed. It's intuitive. It's clean.
                  It's distraction free. If you're building a community.
                </p>
              </div>
              <div class="ud-testimonial-info">
                <div class="ud-testimonial-image">
                  <img
                    src="<?= base_url() ?>assets/landing/assets/images/testimonials/author-02.png"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4>Margin Gesmu</h4>
                  <p>Founder @Lineicons</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
              class="ud-single-testimonial wow fadeInUp"
              data-wow-delay=".2s"
            >
              <div class="ud-testimonial-ratings">
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
              </div>
              <div class="ud-testimonial-content">
                <p>
                  “Our members are so impressed. It's intuitive. It's clean.
                  It's distraction free. If you're building a community.
                </p>
              </div>
              <div class="ud-testimonial-info">
                <div class="ud-testimonial-image">
                  <img
                    src="<?= base_url() ?>assets/landing/assets/images/testimonials/author-03.png"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4>William Smith</h4>
                  <p>Founder @GrayGrids</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    <!-- ====== Testimonials End ====== -->

    <!-- ====== Team Start ====== --
    <section id="team" class="ud-team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title mx-auto text-center">
              <span>Our Team</span>
              <h2>Meet The Team</h2>
              <p>
                There are many variations of passages of Lorem Ipsum available
                but the majority have suffered alteration in some form.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".1s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="<?= base_url() ?>assets/landing/assets/images/team/team-01.png" alt="team" />
                </div>

                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Adveen Desuza</h5>
                <h6>UI Designer</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-twitter-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".15s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="<?= base_url() ?>assets/landing/assets/images/team/team-02.png" alt="team" />
                </div>

                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Jezmin uniya</h5>
                <h6>Product Designer</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-twitter-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".2s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="<?= base_url() ?>assets/landing/assets/images/team/team-03.png" alt="team" />
                </div>

                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Andrieo Gloree</h5>
                <h6>App Developer</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-twitter-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".25s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="<?= base_url() ?>assets/landing/assets/images/team/team-04.png" alt="team" />
                </div>

                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="<?= base_url() ?>assets/landing/assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Jackie Sanders</h5>
                <h6>Content Writer</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-twitter-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Team End ====== -->

    <!-- ====== Contact Start ====== -->
    <section id="contact" class="ud-contact">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-12 col-lg-7">
            <div class="ud-contact-content-wrapper">
              <div class="ud-contact-title">
                <span>HUBUNGI KAMI</span>
                <h2>
				Mari Bicara
				<br />
				Kami terbuka untuk setiap pertanyaan, saran, maupun masukan.
                </h2>
              </div>
              <div class="ud-contact-info-wrapper">
                <div class="ud-single-info">
                  <div class="ud-info-icon">
                    <i class="lni lni-map-marker"></i>
                  </div>
                  <div class="ud-info-meta">
                    <h5>Lokasi Kami</h5>
                    <p>Jl. H. Enggus Arja No. 01 Citangkil Kota Cilegon</p>
                  </div>
                </div>
                <div class="ud-single-info">
                  <div class="ud-info-icon">
                    <i class="lni lni-envelope"></i>
                  </div>
                  <div class="ud-info-meta">
                    <h5>Ada yang Bisa Kami Bantu??</h5>
                    <p>info@sisma05.com</p>
                    <p>0878-7171-8389</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!-- ====== Contact End ====== -->

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
      <div class="shape shape-1">
        <img src="<?= base_url() ?>assets/landing/assets/images/footer/shape-1.svg" alt="shape" />
      </div>
      <div class="shape shape-2">
        <img src="<?= base_url() ?>assets/landing/assets/images/footer/shape-2.svg" alt="shape" />
      </div>
      <div class="shape shape-3">
        <img src="<?= base_url() ?>assets/landing/assets/images/footer/shape-3.svg" alt="shape" />
      </div>
      <div class="ud-footer-widgets">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 ">
              <div class="ud-widget">
                <a href="index.html" class="ud-footer-logo">
                  <img src="<?= base_url() ?>assets/landing/assets/images/logo/logo-2.png" alt="logo" />
                </a>
                <p class="ud-widget-desc">
                  Sistem Informasi Sekolah & Madrasah
                  <br>
                  Kelola Sekolah Lebih Mudah, Cepat, dan Hemat
                </p>
                <ul class="ud-widget-socials">
                  <li>
                    <a href="https://twitter.com/MusharofChy">
                      <i class="lni lni-facebook-filled"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/MusharofChy">
                      <i class="lni lni-twitter-filled"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/MusharofChy">
                      <i class="lni lni-instagram-filled"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/MusharofChy">
                      <i class="lni lni-linkedin-original"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-lg-2 ">
              <div class="ud-widget">
                <h5 class="ud-widget-title">Jelajahi Kami</h5>
                <ul class="ud-widget-links">
                  <li>
                    <a href="#home">Beranda</a>
                  </li>
                  <li>
                    <a href="#about">Tentang Kami</a>
                  </li>
                  <li>
                    <a href="#pricing">Pricing</a>
                  </li>
                  <li>
                    <a href="#faq">FAQ</a>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-lg-2 ">
              <div class="ud-widget">
                <h5 class="ud-widget-title">Lebih Lanjut</h5>
                <ul class="ud-widget-links">
                  <li>
                    <a href="#contact">Kontak</a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>login">Login</a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>register">Register</a>
                  </li>
                  
                </ul>
              </div>
            </div>
            
            <div class="col-lg-3 ">
              <div class="ud-widget">
                <h5 class="ud-widget-title">Support Payment Gateway</h5>
                <ul class="ud-widget-brands" style="gap:5px">
                  <?php foreach ($metode_pembayaran as $metode) { ?>
                    <li style="display: inline-block; width:60px; ">
                      <div style="background-color: #fff; padding: 3px; border-radius: 3px; aspect-ratio: 2/1;">
                        <img
                          src="<?= $metode['icon_url'] ?>"
                          alt="ayroui"
                          
                        />
                      </div>
                  </li>
                  <?php } ?>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ud-footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <ul class="ud-footer-bottom-left">
                <li>
                  <a href="javascript:void(0)">Privacy policy</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Support policy</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Terms of service</a>
                </li>
              </ul>
            </div>
            <div class="col-md-4">
              <p class="ud-footer-bottom-right">
                &copy; Copyright SISMA05 - 2025
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
      <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="<?= base_url() ?>assets/landing/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/landing/assets/js/main.js"></script>
    <script>
      // ==== for menu scroll
      const pageLink = document.querySelectorAll(".ud-menu-scroll");

      pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
          e.preventDefault();
          document.querySelector(elem.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
            offsetTop: 1 - 60,
          });
        });
      });

      // section menu active
      function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
          window.pageYOffset ||
          document.documentElement.scrollTop ||
          document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
          const currLink = sections[i];
          const val = currLink.getAttribute("href");
          const refElement = document.querySelector(val);
          const scrollTopMinus = scrollPos + 73;
          if (
            refElement.offsetTop <= scrollTopMinus &&
            refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
          ) {
            document
              .querySelector(".ud-menu-scroll")
              .classList.remove("active");
            currLink.classList.add("active");
          } else {
            currLink.classList.remove("active");
          }
        }
      }

      window.document.addEventListener("scroll", onScroll);
    </script>
  </body>
</html>
