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
                <form id="formLembaga" method="POST" action="<?= base_url('dashboard/ubah_lembaga') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Data Lembaga</h5>
                            <div class="form-group mb-3">
                                <label for="nama_lembaga" class="form-label">NPSN <span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="<?= $lembaga->id ?>">
                                <input type="text" class="form-control <?= form_error('npsn') ? 'is-invalid' : '' ?>" 
                                    id="npsn" name="npsn" required 
                                    value="<?= $lembaga->npsn ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('npsn') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_lembaga" class="form-label">Nama Lembaga <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('nama_lembaga') ? 'is-invalid' : '' ?>" 
                                    id="nama_lembaga" name="nama_lembaga" required 
                                    value="<?= $lembaga->nama_lembaga ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('nama_lembaga') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lembaga_naungan" class="form-label">Lembaga Naungan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('lembaga_naungan') ? 'is-invalid' : '' ?>" 
                                    id="lembaga_naungan" name="lembaga_naungan" required 
                                    value="<?= $lembaga->lembaga_naungan ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('lembaga_naungan') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="lembaga_naungan" class="form-label">Status Lembaga <span class="text-danger">*</span></label>
                                        <select class="form-select <?= form_error('status_lembaga') ? 'is-invalid' : '' ?>" 
                                            id="status_lembaga" name="status_lembaga" required>
                                            <option value="">-- Pilih Status Lembaga --</option>
                                            <option value="NEGERI" <?= $lembaga->status_lembaga == 'NEGERI' ? 'selected' : '' ?>>NEGERI</option>
                                            <option value="SWASTA" <?= $lembaga->status_lembaga == 'SWASTA' ? 'selected' : '' ?>>SWASTA</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('status_lembaga') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="pemerintah" class="form-label">Pemerintah <span class="text-danger">*</span></label>
                                        <select class="form-select <?= form_error('pemerintah') ? 'is-invalid' : '' ?>" 
                                            id="pemerintah" name="pemerintah" required>
                                            <option value="">-- Pilih Pemerintah --</option>
                                            <option value="KOTA" <?= $lembaga->pemerintah == 'KOTA' ? 'selected' : '' ?>>KOTA</option>
                                            <option value="KABUPATEN" <?= $lembaga->pemerintah == 'KABUPATEN' ? 'selected' : '' ?>>KABUPATEN</option>
                                            <option value="KOTA" <?= $lembaga->pemerintah == 'KOTA' ? 'selected' : '' ?>>KOTA</option>
                                            <option value="PROVINSI" <?= $lembaga->pemerintah == 'PROVINSI' ? 'selected' : '' ?>>PROVINSI</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('pemerintah') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" 
                                    id="alamat" name="alamat" rows="3" required><?= $lembaga->alamat ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('alamat') ?>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="kabupaten_kota" class="form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?= form_error('kabupaten_kota') ? 'is-invalid' : '' ?>" 
                                            id="kabupaten_kota" name="kabupaten_kota" required 
                                            value="<?= $lembaga->kab_kota ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('kabupaten_kota') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?= form_error('provinsi') ? 'is-invalid' : '' ?>" 
                                            id="provinsi" name="provinsi" required 
                                            value="<?= $lembaga->provinsi ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('provinsi') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header px-0 pt-0 mb-2" >
                                        <h5 class="card-title"><i class="ti ti-map-pin me-2"></i>Lokasi</h5>
                                    </div>
                                    <div class="">
                                        <div id="map" style="height: 300px; width: 100%; border-radius: 5px; margin-bottom: 15px;"></div>
                                        <div class="alert alert-info py-2 small">
                                            <i class="ti ti-info-circle me-1"></i> Geser pin untuk menyesuaikan lokasi
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="latitude" name="latitude" required readonly value="<?= $lembaga->latitude ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="longitude" name="longitude" required readonly value="<?= $lembaga->longitude ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="getLocationBtn" class="btn btn-outline-primary btn-sm w-100 mb-3">
                                            <i class="ti ti-navigation me-1"></i> Dapatkan Lokasi Saya
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                            <label for="telepon" class="form-label">No. Telepon</label>
                                            <input type="text" class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>" 
                                                id="telepon" name="telepon" 
                                                value="<?= $lembaga->nomor_telp ?>">
                                            <div class="invalid-feedback">
                                                <?= form_error('telepon') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="kode_pos" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control <?= form_error('kode_pos') ? 'is-invalid' : '' ?>" 
                                            id="kode_pos" name="kode_pos" 
                                            value="<?= $lembaga->kode_pos ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('kode_pos') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                        <input type="text" class="form-control <?= form_error('jumlah_siswa') ? 'is-invalid' : '' ?>" 
                                            id="jumlah_siswa" name="jumlah_siswa" 
                                            value="<?= $lembaga->jumlah_siswa ?>">
                                        <small>Tagihan per <span id="periode_tagihan"><?= $lembaga->periode <= 1 ? '' : $lembaga->periode ?></span> bulan = Rp. <span id="tagihan"><?= number_format($lembaga->jumlah_siswa * $setting->biaya_langganan * $lembaga->periode, 0, ',', '.') ?></span></small>
                                        <div class="invalid-feedback">
                                            <?= form_error('jumlah_siswa') ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="periode" class="form-label">Periode Tagihan</label>
                                        <select name="periode" id="periode" class="form-control">
                                            <option value="">Pilih Periode</option>
                                            <option value="1" <?= $lembaga->periode == 1 ? 'selected' : '' ?>>1 Bulan</option>
                                            <option value="3" <?= $lembaga->periode == 3 ? 'selected' : '' ?>>3 Bulan</option>
                                            <option value="6" <?= $lembaga->periode == 6 ? 'selected' : '' ?>>6 Bulan</option>
                                            <option value="12" <?= $lembaga->periode == 12 ? 'selected' : '' ?>>12 Bulan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('periode') ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" 
                                    id="email" name="email" required 
                                    value="<?= $lembaga->email ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('email') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control <?= form_error('website') ? 'is-invalid' : '' ?>" 
                                    id="website" name="website" 
                                    value="<?= $lembaga->website ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('website') ?>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">Data Kepala Sekolah</h5>
                            <div class="form-group mb-3">
                                <label for="nama_kepala_sekolah" class="form-label">Nama Kepala Sekolah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('nama_kepala_sekolah') ? 'is-invalid' : '' ?>" 
                                    id="nama_kepala_sekolah" name="nama_kepala_sekolah" required 
                                    value="<?= $lembaga->nama_kepala_sekolah ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('nama_kepala_sekolah') ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nip_nuptk" class="form-label">NIP / NUPTK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= form_error('nip_nuptk') ? 'is-invalid' : '' ?>" 
                                    id="nip_nuptk" name="nip_nuptk" required 
                                    value="<?= $lembaga->nip_nuptk ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('nip_nuptk') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5 class="mb-3">Logo Lembaga</h5>
                            <img id="img_preview" src="<?= base_url('uploads/lembaga/logo/'.$lembaga->logo_lembaga) ?>" alt="Logo Lembaga" class="img-fluid mb-3 width" style="width: 100px; height: 100px; object-fit: cover; border: 5px solid #fff; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                            <div class="form-group mb-3">
                                <label for="logo" class="form-label">Logo Lembaga <span class="text-danger">*</span> <small class="text-muted">(Format: JPG/JPEG/PNG, Maks: 2MB)</small></label>
                                <input type="file" class="form-control <?= form_error('logo') ? 'is-invalid' : '' ?>" 
                                    id="logo" name="logo" accept="image/*" >
                                <div class="invalid-feedback">
                                    <?= form_error('logo') ?>
                                </div>
                            </div>

                            
                        </div>
                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="galeri" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select <?= form_error('status_pengajuan') ? 'is-invalid' : '' ?>" 
                                    id="status_pengajuan" name="status_pengajuan" required>
                                    <option value="waiting" <?= $lembaga->status_pengajuan == 'waiting' ? 'selected' : '' ?>>Waiting</option>
                                    <option value="aktif" <?= $lembaga->status_pengajuan == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="nonaktif" <?= $lembaga->status_pengajuan == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                                    <option value="rejected" <?= $lembaga->status_pengajuan == 'rejected' ? 'selected' : '' ?>>Ditolak</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('status_pengajuan') ?>
                                </div>
                            </div>
                        </div>
                            
                            <div class="col-md-12" id="alasan_ditolak" <?php if ($lembaga->status_pengajuan != 'rejected'): ?>style="display: none;"<?php endif; ?>>
                                <div class="form-group mb-3">
                                    <label for="galeri" class="form-label">Alasan Ditolak <span class="text-danger">*</span></label>
                                    <textarea class="form-control <?= form_error('alasan_ditolak') ? 'is-invalid' : '' ?>" 
                                         name="alasan_ditolak"><?= $lembaga->alasan_ditolak ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= form_error('alasan_ditolak') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="" style="display: flex; justify-content: flex-end; gap: 10px;">
                        <?php if($this->session->userdata('role') == 'admin'): ?>
                        <a href="<?= base_url('dashboard/list_lembaga') ?>" class="btn btn-secondary">Batal</a>
                        
                        <?php else: ?>
                        <a href="<?= base_url('dashboard/detail_lembaga') ?>" class="btn btn-secondary">Batal</a>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary btn-simpan-lembaga">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>