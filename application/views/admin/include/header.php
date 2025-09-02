<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <title>Dashboard | Berry Dashboard Template</title>
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

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


<style>

.dataTables_wrapper .d-flex {
  flex-wrap: wrap;
  justify-content: space-between;
  text-align: center;
}

/* Pastikan tabel full width */
table.dataTable {
  width: 100% !important;
  table-layout: fixed;   /* biar setiap kolom pas */
  border-collapse: collapse; /* rapatkan border */
}

/* Supaya isi cell tidak bikin tabel melebar */
table.dataTable td, 
table.dataTable th {
  white-space: normal !important;
  word-wrap: break-word;
  box-sizing: border-box;
}
@media (max-width: 768px) {

  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_paginate {
    text-align: center;
    justify-content: center !important;
    width: 100%;  /* biar center full */
  }
      .mob-text-right {
        text-align: right;
      }
        table, thead, tbody, th, td, tr {
            display: block;
            width: 100%;
        }

        thead {
            display: none; /* sembunyikan header */
        }

        tr {
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            padding: 0.5rem;
            border-radius: 8px;
            background: #fafafa;
        }

        td {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem;
            border: none;
            border-bottom: 1px solid #eee;
        }

        td::before {
            content: attr(data-label); /* ambil label dari atribut */
            font-weight: bold;
            margin-right: 1rem;
        }

        td:last-child {
            border-bottom: none;
        }
    }

    /* Dropzone styles */
    .dropzone {
        border: 2px dashed #d1d7e0;
        border-radius: 8px;
        background: #f8f9fa;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .dropzone:hover {
        border-color: #5d87ff;
        background: #f0f4ff;
    }
    .dropzone .dz-message h5 {
        margin: 1rem 0 0.5rem;
        font-weight: 600;
    }
    .dropzone .dz-preview {
        margin: 1rem 0.5rem;
    }
    .dropzone .dz-preview .dz-image {
        border-radius: 6px;
    }
    .dz-remove {
        position: absolute;
        top: 0;
        right: 0;
        background: #ff4d4d;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        font-size: 12px;
        cursor: pointer;
        z-index: 20;
    }
    .dz-remove:hover {
        background: #ff1a1a;
    }
    .badge-status {
        min-width: 70px;
    }
    .select2-container--bootstrap-5 .select2-selection {
        min-height: 38px;
    }
    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
        padding-top: 4px;
    }
    .form-control:disabled, .form-control[readonly] {
        background-color: #f8f9fa;
        opacity: 1;
    }
</style>

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
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="<?= base_url() ?>dashboard/index.html" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <!-- <img src="<?= base_url() ?>assets/images/logo-dark.svg" alt="" class="logo logo-lg" />
          -->
        <!-- <h3>SISMA05</h3>
          -->
          <img src="<?= base_url() ?>assets/landing/assets/images/logo/logo.png" alt="Logo" class="img-fluid brand-logo" style="width: 200px;" />
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Dashboard</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <?php if($this->session->userdata('role') == 'admin') { ?>
        <li class="pc-item">
          <a href="<?= base_url() ?>dashboard" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-dashboard"></i></span><span class="pc-mtext">Dashboard</span></a
          >
        </li>

        <li class="pc-item">
          <a href="<?= base_url() ?>dashboard/listuser" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-user"></i></span><span class="pc-mtext">Daftar User</span></a
          >
        </li>
        <li class="pc-item">
          <a href="<?= base_url() ?>dashboard/listlembaga" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-building"></i></span><span class="pc-mtext">Daftar Lembaga</span></a
          >
        </li> 
        <li class="pc-item">
          <a href="<?= base_url() ?>dashboard/settingtagihan" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-settings"></i></span><span class="pc-mtext">Setting Tagihan</span></a
          >
        </li> 
        <?php } ?>
        <?php if($this->session->userdata('role') == 'lembaga') { ?>
          <?php $cek_pengajuan_lembaga = $this->db->get_where('lembaga', ['user_id' => $this->session->userdata('user_id')])->row_array(); ?>
          <?php if($cek_pengajuan_lembaga){ ?>
            <li class="pc-item">
              <a href="<?= base_url() ?>dashboard/detail_lembaga" class="pc-link"
                ><span class="pc-micon"><i class="ti ti-building"></i></span><span class="pc-mtext">Lembaga</span></a
              >
            </li> 
            <li class="pc-item">
              <a href="<?= base_url() ?>dashboard/tagihan" class="pc-link"
                ><span class="pc-micon"><i class="fas fa-money-bill"></i></span><span class="pc-mtext">Tagihan</span></a
              >
            </li> 
          <?php } ?>
        <?php } ?>


        <li class="pc-item">
          <a href="<?= base_url() ?>logout" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-logout"></i></span><span class="pc-mtext">Logout</span></a
          >
        </li>

        

      </ul>
      
      <div class="w-100 text-center">
        <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
      </div>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->
 <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"><!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <li class="pc-h-item header-mobile-collapse">
      <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <img src="<?= base_url() ?>assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
        <span>
          <i class="ti ti-settings"></i>
        </span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <h4>
            Selamat Datang,
            <span class="small text-muted"><?= $this->session->userdata('nama') ?></span>
          </h4>
          <p class="text-muted"><?= $this->session->userdata('role') == "lembaga" ? "Admin Lembaga" : "Administrator" ?></p>
          <hr />
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
            
            <!-- <a href="../application/account-profile-v1.html" class="dropdown-item">
              <i class="ti ti-settings"></i>
              <span>Account Settings</span>
            </a> -->
           
            <a href="<?= base_url() ?>logout" class="dropdown-item">
              <i class="ti ti-logout"></i>
              <span>Logout</span>
            </a>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
</header>
<!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">