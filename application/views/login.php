<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <title>Login | Berry Dashboard Template</title>
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
          <div class="card my-5">
            <div class="card-body">
              <a href="#" class="d-flex justify-content-center">
                <!-- <img src="<?= base_url() ?>assets/images/logo-dark.svg" alt="image" class="img-fluid brand-logo" />
                  -->
                <!-- SISMA05 -->
                <img src="<?= base_url() ?>assets/landing/assets/images/logo/logo.png" alt="Logo" class="img-fluid brand-logo" style="width: 200px;" />
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-2"><b>Login</b></h2>
                    <p class="f-16 mt-2">Masukkan Email dan Password Anda</p>
                  </div>
                </div>
              </div>
              
              <form id="loginForm" method="post" action="<?= base_url('login/auth') ?>" >
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required />
                  <label for="email">Email address</label>
                  <div class="invalid-feedback" id="emailError"></div>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                  <label for="password">Password</label>
                  <div class="invalid-feedback" id="passwordError"></div>
                </div>
              <div class="d-flex mt-1 justify-content-between">
                <div class="form-check">
                  <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                  <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                </div>
                <!-- <h5 class="text-secondary">Lupa Password?</h5> -->
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-secondary" id="loginBtn">
                  <span id="loginBtnText">Login</span>
                  <span id="loginSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </button>
              </div>
              <hr />
              <h5 class="d-flex justify-content-center">Belum Punya Akun? <a href="<?= base_url('register') ?>">Daftar</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="<?= base_url() ?>assets/js/plugins/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/icon/custom-font.js"></script>
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/feather.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr CSS -->
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

        // Handle form submission
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $btn = $('#loginBtn');
            var $btnText = $('#loginBtnText');
            var $spinner = $('#loginSpinner');
            
            // Reset validation
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').text('');
            
            // Show loading state
            $btn.prop('disabled', true);
            $btnText.text('Memproses...');
            $spinner.removeClass('d-none');
            
            // Submit form via AJAX
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = response.redirect || 'dashboard';
                        }, 1500);
                    } else {
                        toastr.error(response.message);
                        
                        // Show validation errors if any
                        if (response.errors) {
                            $.each(response.errors, function(field, message) {
                                var $input = $('[name="' + field + '"]');
                                var $error = $('#' + field + 'Error');
                                
                                if ($input.length && $error.length) {
                                    $input.addClass('is-invalid');
                                    $error.text(message);
                                }
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan. Silakan coba lagi.');
                },
                complete: function() {
                    // Reset button state
                    $btn.prop('disabled', false);
                    $btnText.text('Login');
                    $spinner.addClass('d-none');
                }
            });
        });
        
        // Initialize theme and other scripts
        if (typeof layout_change === 'function') layout_change('light');
        if (typeof font_change === 'function') font_change('Roboto');
        if (typeof change_box_container === 'function') change_box_container('false');
        if (typeof layout_caption_change === 'function') layout_caption_change('true');
        if (typeof layout_rtl_change === 'function') layout_rtl_change('false');
        if (typeof preset_change === 'function') preset_change('preset-1');
    });

    <?php if($this->session->flashdata('message')): ?>
        toastr.error('<?= $this->session->flashdata('message') ?>');
    <?php endif; ?>

    

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
