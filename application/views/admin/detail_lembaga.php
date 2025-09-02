<!-- [ breadcrumb ] start -->
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
                    <?php if($this->session->userdata('role') == 'admin') {?>
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard/daftar_lembaga') ?>">Daftar Lembaga</a></li>
                    <?php } ?>
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
            <div class="card-header" style="display: flex; width:100% ">
                <h5 style="width: 100%;"><?= $title ?></h5>
                <div class="float-end" style="<?php if($this->session->userdata('role') == 'admin') {?>min-width: 182px;<?php } else {?>min-width: 94px;<?php } ?>">
                    <?php if($this->session->userdata('role') == 'admin') {?>

                    <a href="<?= base_url('dashboard/daftar_lembaga') ?>" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <?php } ?>
                    <a href="<?= base_url('dashboard/edit_lembaga/' . $lembaga->id) ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <?php if($this->session->userdata('role') == 'admin') { } else {?>
                    <?php if ($lembaga->status_pengajuan == 'waiting') { ?>
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <i class="fas fa-exclamation-circle me-1"></i> Pengajuan Lembaga anda masih menunggu persetujuan admin
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($lembaga->status_pengajuan == 'rejected') { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-1"></i> Pengajuan Lembaga anda ditolak admin<br>
                            <span class="text-muted"><b>Alasan:</b> <?= $lembaga->alasan_ditolak ?? "-" ?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($lembaga->status_pengajuan == 'nonaktif') { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-1"></i> Pengajuan Lembaga anda dinonaktifkan admin
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <!-- Logo dan Informasi Utama -->
                    <div class="col-md-4 text-center mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img src="<?= base_url('uploads/lembaga/logo/' . (!empty($lembaga->logo_lembaga) ? $lembaga->logo_lembaga : 'default.png')) ?>" 
                                     alt="Logo <?= $lembaga->nama_lembaga ?>" 
                                     class="img-fluid rounded-circle mb-3" 
                                     style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #fff; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                <h4 class="mb-1"><?= $lembaga->nama_lembaga ?></h4>
                                <p class="text-muted mb-2">NPSN: <?= $lembaga->npsn ?></p>
                                <span class="badge bg-<?= $lembaga->status_lembaga === 'NEGERI' ? 'primary' : 'success' ?> mb-3">
                                    <?= $lembaga->status_lembaga ?>
                                </span>

                                <div>
                                <?php if ($lembaga->latitude && $lembaga->longitude): ?>
                                    <div class="position-relative">
                                        <div id="propertyMap" style="height: 150px; width: 100%; border-radius: 8px; overflow: hidden; border: 1px solid #e0e0e0;"></div>
                                        <div class="mt-3 text-end">
                                            <a href="https://www.google.com/maps?q=<?= $lembaga->latitude ?>,<?= $lembaga->longitude ?>" 
                                            target="_blank" 
                                            class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-external-link me-1"></i> Buka di Google Maps
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-4">
                                        <i class="ti ti-map-off fs-1 text-muted mb-3 d-block"></i>
                                        <p class="text-muted mb-3">Lokasi tidak tersedia</p>
                                        
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Informasi -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-4" id="lembagaTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                                            <i class="fas fa-info-circle me-1"></i> Informasi Umum
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                            <i class="fas fa-address-book me-1"></i> Kontak & Alamat
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="kepsek-tab" data-bs-toggle="tab" data-bs-target="#kepsek" type="button" role="tab" aria-controls="kepsek" aria-selected="false">
                                            <i class="fas fa-user-tie me-1"></i> Kepala Sekolah
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="lembagaTabContent">
                                    <!-- Tab Informasi Umum -->
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-school me-2"></i>Nama Lembaga</label>
                                                    <h5 class="mb-0"><?= $lembaga->nama_lembaga ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"> <i class="fas fa-hashtag me-2"></i> NPSN</label>
                                                    <h5 class="mb-0"><?= $lembaga->npsn ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"> <i class="fas fa-flag me-2"></i>Status Lembaga</label>
                                                    <h5 class="mb-0">
                                                        <span class="badge bg-<?= $lembaga->status_lembaga === 'NEGERI' ? 'primary' : 'success' ?>">
                                                            <?= $lembaga->status_lembaga ?>
                                                        </span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-sitemap me-2"></i> Lembaga Naungan</label>
                                                    <h5 class="mb-0"><?= $lembaga->lembaga_naungan ?? '-' ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"> <i class="fas fa-users me-2"></i>Jumlah Siswa</label>
                                                    <h5 class="mb-0"><?= $lembaga->jumlah_siswa ?? '-' ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab Kontak & Alamat -->
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap</label>
                                                    <p class="mb-0"><?= $lembaga->alamat ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"> <i class="fas fa-city me-2"></i>Kota/Kabupaten</label>
                                                    <p class="mb-0"><?= $lembaga->kab_kota ?? '-' ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-map me-2"></i>Provinsi</label>
                                                    <p class="mb-0"><?= $lembaga->provinsi ?? '-' ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-mail-bulk me-2"></i> Kode Pos</label>
                                                    <p class="mb-0"><?= $lembaga->kode_pos ?? '-' ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-phone-alt me-2"></i> Nomor Telepon</label>
                                                    <p class="mb-0">
                                                        <?php if(!empty($lembaga->nomor_telp)): ?>
                                                            <a href="tel:<?= $lembaga->nomor_telp ?>"><?= $lembaga->nomor_telp ?></a>
                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-envelope me-2"></i>Email</label>
                                                    <p class="mb-0">
                                                        <?php if(!empty($lembaga->email)): ?>
                                                            <a href="mailto:<?= $lembaga->email ?>"><?= $lembaga->email ?></a>
                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-globe me-2"></i>Website</label>
                                                    <p class="mb-0">
                                                        <?php if(!empty($lembaga->website)): ?>
                                                            <a href="<?= (strpos($lembaga->website, 'http') === 0 ? '' : 'https://') . $lembaga->website ?>" target="_blank">
                                                                <?= $lembaga->website ?>
                                                            </a>
                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab Kepala Sekolah -->
                                    <div class="tab-pane fade" id="kepsek" role="tabpanel" aria-labelledby="kepsek-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-user-tie me-2"></i>Nama Kepala Sekolah</label>
                                                    <h5 class="mb-0"><?= $lembaga->nama_kepala_sekolah ?? '-' ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-item mb-3 p-3 bg-light rounded">
                                                    <label class="form-label text-muted small mb-1"><i class="fas fa-id-card me-2"></i>NIP Kepala Sekolah</label>
                                                    <p class="mb-0"><?= $lembaga->nip_nuptk ?? '-' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>  
</div>

<style>
    /* Custom styles for detail page */
    .info-item {
        transition: all 0.3s ease;
        border-left: 3px solid #4680ff;
    }
    
    .info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .nav-tabs .nav-link {
        color: #6c757d;
        font-weight: 500;
        border: none;
        padding: 0.75rem 1.25rem;
        position: relative;
    }
    
    .nav-tabs .nav-link.active {
        color: #4680ff;
        background: transparent;
        border: none;
    }
    
    .nav-tabs .nav-link.active:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: #4680ff;
    }
    
    .nav-tabs .nav-link:hover:not(.active) {
        border: none;
        color: #2c3e50;
    }
    
    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    }
    
    .card-header {
        background: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .badge {
        font-weight: 500;
        padding: 0.4em 0.8em;
    }
    
    a {
        color: #4680ff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    a:hover {
        color: #2a56c6;
    }
</style>

<script>
    // Add active class to current nav item
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Add active class to current nav item
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('.nav-link');
        
        menuItems.forEach(item => {
            if (item.href === currentLocation) {
                item.classList.add('active');
            }
        });
    });
</script>