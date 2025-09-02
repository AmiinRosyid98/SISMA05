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
                    <h5>Daftar Lembaga</h5>
                   
                </div>
                <div class="card-body">
                   
                    
                    <div class="table-responsive1">
                        <table class="table table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lembaga</th>
                                    <th>User</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Status</th>
                                    <th>Tanggal Daftar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($lembaga)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($lembaga as $key): ?>
                                    <tr>
                                        <td data-label="No"><?= $no++ ?></td>
                                        <td data-label="Nama Lembaga"><?= htmlspecialchars($key->nama_lembaga ?? '') ?><br>
                                            <small>Kota : <?= htmlspecialchars($key->kab_kota ?? '') ?></small>
                                        </td>
                                        <td data-label="User"><?= htmlspecialchars($key->nama ?? '') ?></td>
                                        <td data-label="Jumlah Tagihan"><b>Rp. <?= number_format($key->jumlah_siswa * $setting->biaya_langganan * $key->periode ?? 0, 0, ',', '.') ?></b>/<?= $key->periode <= 1 ? '' : $key->periode ?> Bulan</td>             
                                        <td data-label="Status">
                                            <?php 
                                            $statusClass = '';
                                            $statusText = '';
                                            switch($key->status_pengajuan ?? '') {
                                                case 'waiting':
                                                    $statusClass = 'bg-secondary';
                                                    $statusText = 'Pending';
                                                    break;
                                                case 'aktif':
                                                    $statusClass = 'bg-success';
                                                    $statusText = 'Aktif';
                                                    break;
                                                case 'nonaktif':
                                                    $statusClass = 'bg-danger';
                                                    $statusText = 'Tidak Aktif';
                                                    break;
                                                case 'rejected':
                                                    $statusClass = 'bg-danger';
                                                    $statusText = 'Ditolak';
                                                    break;
                                                default:
                                                    $statusClass = 'bg-secondary';
                                                    $statusText = 'Tidak Diketahui';
                                            }
                                            ?>
                                            <span class="badge badge-status <?= $statusClass ?> text-white"><?= $statusText ?></span>
                                        </td>
                                        <td data-label="Tanggal Daftar"><?= !empty($key->created_at) ? date('d M Y H:i', strtotime($key->created_at)) : '' ?></td>
                                        <td data-label="Aksi" class="text-center">
                                            <div class="btn-group">
                                                <a href="<?= base_url('dashboard/detail_lembaga/' . ($key->id ?? '')) ?>" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="<?= base_url('dashboard/edit_lembaga/' . ($key->id ?? '')) ?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger btn-delete-data" 
                                                        data-bs-toggle="tooltip" 
                                                        title="Hapus" 
                                                        table = "lembaga"
                                                        data-id="<?= $key->id ?? '' ?>">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

   