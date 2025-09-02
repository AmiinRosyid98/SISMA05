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
                <form id="formLembaga" method="POST" action="<?= base_url('dashboard/simpan_setting_tagihan') ?>" enctype="multipart/form-data">
                    <h4 class="mb-3">Setting Tripay</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tripay_link" class="form-label">Tripay Link <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('tripay_link') ? 'is-invalid' : '' ?>" 
                                    id="tripay_link" name="tripay_link" required 
                                    value="<?= $setting->tripay_link ?>">
                                <small>Link Tripay</small>
                                <div class="invalid-feedback">
                                    <?= form_error('tripay_link') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tripay_api_key" class="form-label">Tripay API Key <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('tripay_api_key') ? 'is-invalid' : '' ?>" 
                                    id="tripay_api_key" name="tripay_api_key" required 
                                    value="<?= $setting->tripay_api_key ?>">
                                <small>API Key Tripay</small>
                                <div class="invalid-feedback">
                                    <?= form_error('tripay_api_key') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tripay_private_key" class="form-label">Tripay Private Key <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('tripay_private_key') ? 'is-invalid' : '' ?>" 
                                    id="tripay_private_key" name="tripay_private_key" required 
                                    value="<?= $setting->tripay_private_key ?>">
                                <small>Private Key Tripay</small>
                                <div class="invalid-feedback">
                                    <?= form_error('tripay_private_key') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tripay_merchant_id" class="form-label">Merchant ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('tripay_merchant_id') ? 'is-invalid' : '' ?>" 
                                    id="tripay_merchant_id" name="tripay_merchant_id" required 
                                    value="<?= $setting->tripay_merchant_id ?>">
                                <small>Merchant ID Tripay</small>
                                <div class="invalid-feedback">
                                    <?= form_error('tripay_merchant_id') ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h4 class="mt-4 mb-3">Biaya Langganan</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="biaya_langganan" class="form-label">Biaya Langganan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('biaya_langganan') ? 'is-invalid' : '' ?>" 
                                    id="biaya_langganan" name="biaya_langganan" required 
                                    value="<?= $setting->biaya_langganan ?>">
                                <small>Biaya langganan per siswa perbulan</small>
                                <div class="invalid-feedback">
                                    <?= form_error('biaya_langganan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="masa_trial" class="form-label">Masa Trial <span class="text-danger">*</span></label>
                                <select class="form-select <?= form_error('masa_trial') ? 'is-invalid' : '' ?>" 
                                    id="masa_trial" name="masa_trial" required>
                                    <option value="">-- Pilih Masa Trial --</option>
                                    <option value="7" <?= $setting->masa_trial == '7' ? 'selected' : '' ?>>7 Hari</option>
                                    <option value="30" <?= $setting->masa_trial == '30' ? 'selected' : '' ?>>1 Bulan</option>
                                    <option value="90" <?= $setting->masa_trial == '90' ? 'selected' : '' ?>>3 Bulan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('masa_trial') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>