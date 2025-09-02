<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <title>Daftar Akun Lembaga</title>
    <!-- Temporarily disabled CAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="author" content="codedthemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon" />
 <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
<!-- [phosphor Icons] https://phosphoricons.com/ -->
<link rel="stylesheet" href="<?= base_url() ?>assets/fonts/phosphor/duotone/style.css" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="<?= base_url() ?>assets/fonts/tabler-icons.min.css" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="<?= base_url() ?>assets/fonts/feather.css" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome.css" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="<?= base_url() ?>assets/fonts/material.css" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" id="main-style-link" />
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style-preset.css" />

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <div class="card mt-5">
            <div class="card-body">
              <a href="#" class="d-flex justify-content-center mt-3">
                <!-- <img src="<?= base_url() ?>assets/images/logo-dark.svg" alt="image" class="img-fluid brand-logo" />
                  -->
                <!-- <h3>SISMA05</h3>
                  -->
                  <img src="<?= base_url() ?>assets/landing/assets/images/logo/logo.png" alt="Logo" class="img-fluid brand-logo" style="width: 200px;" />
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-2"><b>Daftar</b></h2>
                    <p class="f-16 mt-2">Masukkan Data Diri Anda</p>
                  </div>
                </div>
              </div>
              
              <?php if($this->session->flashdata('message')): ?>
                <?= $this->session->flashdata('message') ?>
              <?php endif; ?>
              
              <form action="<?= base_url('register') ?>" method="post">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                  <label for="nama">Nama Lengkap</label>
                  <div class="invalid-feedback">
                    <?= form_error('nama') ?>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                  <label for="email">Email</label>
                  <div class="invalid-feedback">
                    <?= form_error('email') ?>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control <?= form_error('wa') ? 'is-invalid' : '' ?>" id="wa" name="wa" placeholder="Nomor WhatsApp" value="<?= set_value('wa') ?>">
                  <label for="wa">Nomor WhatsApp</label>
                  <div class="invalid-feedback">
                    <?= form_error('wa') ?>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control <?= form_error('kota') ? 'is-invalid' : '' ?>" id="kota" name="kota" placeholder="Kota" value="<?= set_value('kota') ?>">
                  <label for="kota">Kota</label>
                  <div class="invalid-feedback">
                    <?= form_error('kota') ?>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password">
                  <label for="password">Password</label>
                  <div class="invalid-feedback">
                    <?= form_error('password') ?>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="password" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : '' ?>" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password">
                  <label for="password_confirm">Konfirmasi Password</label>
                  <div class="invalid-feedback">
                    <?= form_error('password_confirm') ?>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control <?= form_error('nama_lembaga') ? 'is-invalid' : '' ?>" id="nama_lembaga" name="nama_lembaga" placeholder="Nama Lembaga" value="<?= set_value('nama_lembaga') ?>">
                  <label for="nama_lembaga">Nama Lembaga</label>
                  <div class="invalid-feedback">
                    <?= form_error('nama_lembaga') ?>
                  </div>
                </div>

                <div class="form-check mt-4 mb-4">
                  <input class="form-check-input input-primary" type="checkbox" id="terms" name="terms" value="1" <?= set_checkbox('terms', '1') ?> required>
                  <label class="form-check-label" for="terms">
                    <span class="mb-0">Saya menyetujui <a href="#">Syarat & Ketentuan</a> yang berlaku</span>
                  </label>
                  <div class="invalid-feedback">
                    Anda harus menyetujui syarat dan ketentuan
                  </div>
                </div>

                <!-- Temporarily disabled CAPTCHA -->
                
                <div class="form-group mt-4 mb-4">
                    <div class="g-recaptcha" data-sitekey="<?= $site_key ?>"></div>
                    <?php if(form_error('g-recaptcha-response')): ?>
                        <div class="invalid-feedback d-block">
                            <?= form_error('g-recaptcha-response') ?>
                        </div>
                    <?php endif; ?>
                </div>
               

                <div class="d-grid">
                  <button type="submit" class="btn btn-primary p-2">Daftar</button>
                </div>
              </form>
              <hr />
              <h5 class="d-flex justify-content-center">Sudah Punya Akun? <a href="<?= base_url() ?>login">Login</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/icon/custom-font.js"></script>
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    <script src="<?= base_url() ?>assets/js/theme.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/feather.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
      $(document).ready(function() {
        // Initialize toastr options
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
      })
    </script>

       
    
    <script>
      <?php 
      if($this->session->flashdata('success')){
        echo 'toastr.success("' . $this->session->flashdata('success') . '");';
      }
      if($this->session->flashdata('error')){
        echo 'toastr.error("' . $this->session->flashdata('error') . '");';
      }
    ?>
    </script>
    

  </body>
  <!-- [Body] end -->
</html>
