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
                    <h5>Edit User</h5>
                   
                </div>
                <div class="card-body">
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="hidden" name="id" id="id" value="<?= $users['id'] ?>">
                  <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $users['nama'] ?>">
                  
                  <div class="invalid-feedback">
                    <?= form_error('nama') ?>
                  </div>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email" value="<?= $users['email'] ?>">
                  
                  <div class="invalid-feedback">
                    <?= form_error('email') ?>
                  </div>
                </div>
                <div class="form-group mb-3">
                    <label for="wa" class="form-label">Nomor WhatsApp</label>
                  <input type="text" class="form-control <?= form_error('wa') ? 'is-invalid' : '' ?>" id="wa" name="wa" placeholder="Nomor WhatsApp" value="<?= $users['wa'] ?>">
                  
                  <div class="invalid-feedback">
                    <?= form_error('wa') ?>
                  </div>
                </div>
                <div class="form-group mb-3">
                    <label for="kota" class="form-label">Kota</label>
                  <input type="text" class="form-control <?= form_error('kota') ? 'is-invalid' : '' ?>" id="kota" name="kota" placeholder="Kota" value="<?= $users['kota'] ?>">
                  
                  <div class="invalid-feedback">
                    <?= form_error('kota') ?>
                  </div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                  <input type="text" class="form-control <?= form_error('nama_lembaga') ? 'is-invalid' : '' ?>" id="nama_lembaga" name="nama_lembaga" placeholder="Nama Lembaga" value="<?= $users['nama_lembaga'] ?>">
                  
                  <div class="invalid-feedback">
                    <?= form_error('nama_lembaga') ?>
                  </div>
                </div>
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select <?= form_error('status') ? 'is-invalid' : '' ?>" id="status" name="status">
                        <!-- <option value="">Pilih Status</option> -->
                        <option value="waiting" disabled <?= $users['status'] == 'waiting' ? 'selected' : '' ?>>Waiting</option>
                        <option value="aktif" <?= $users['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="nonaktif" <?= $users['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        <option value="ditolak" <?= $users['status'] == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                    
                    <div class="invalid-feedback">
                        <?= form_error('status') ?>
                    </div>
                </div>
                <div class="" style="display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary btn-simpan-user">Simpan</button>
                </div>
                </div>
            </div>
        </div>
    </div>