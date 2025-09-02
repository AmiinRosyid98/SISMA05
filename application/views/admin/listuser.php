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
                    <h5>Daftar User</h5>
                   
                </div>
                <div class="card-body">
                   
                    
                    <div class="table-responsive1">
                        <table class="table table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email / Wa</th>
                                    <th>Nama Lembaga / Kota</th>
                                    <th>Status</th>
                                    <th>Tanggal Daftar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td data-label="No"><?= $no++ ?></td>
                                        <td data-label="Nama"><?= htmlspecialchars($user['nama'] ?? '') ?></td>
                                        <td data-label="Email / Wa">
                                            <?= htmlspecialchars($user['email'] ?? '') ?><br>
                                            <?= htmlspecialchars($user['wa'] ?? '') ?>
                                        </td>
                                        <td data-label="Nama Lembaga / Kota">
                                            <?= htmlspecialchars($user['nama_lembaga'] ?? '') ?><br>
                                            <?= htmlspecialchars($user['kota'] ?? '') ?>
                                        </td>
                                        <td data-label="Status">
                                            <?php 
                                            $statusClass = '';
                                            $statusText = '';
                                            switch($user['status'] ?? '') {
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
                                        <td data-label="Tanggal Daftar"><?= !empty($user['created_at']) ? date('d M Y H:i', strtotime($user['created_at'])) : '' ?></td>
                                        <td data-label="Aksi" class="text-center">
                                            <div class="btn-group">
                                                
                                                <a href="<?= base_url('dashboard/edituser/' . ($user['id'] ?? '')) ?>" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger btn-delete-data" 
                                                        data-bs-toggle="tooltip" 
                                                        title="Hapus" 
                                                        table = "users"
                                                        data-id="<?= $user['id'] ?? '' ?>">
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

   