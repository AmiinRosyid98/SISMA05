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
                    <h5>Daftar Tagihan</h5>
                   
                </div>
                <div class="card-body">
                   
                    
                    <div class="table-responsive1">
                        <table class="table table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice ID</th>
                                    <th>Nama Lembaga</th>
                                    <th>Invoice Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tagihan)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tagihan as $key): ?>
                                    <tr>
                                        <td data-label="No"><?= $no++ ?></td>
                                        <td data-label="Invoice ID"><?= htmlspecialchars($key->invoice_id ?? '') ?></td>
                                        <td data-label="Nama Lembaga">
                                            <?= htmlspecialchars($key->nama_lembaga ?? '') ?>
                                        </td>
                                        <td data-label="Invoice Date">
                                            <?= tanggal_indo($key->billing_date ?? '') ?>
                                        </td>
                                        <td data-label="Due Date">
                                            <?= tanggal_indo($key->due_date ?? '') ?>
                                        </td>
                                        
                                        <td data-label="Status">
                                            <?php 
                                            $statusClass = '';
                                            $statusText = '';
                                            switch($key->status ?? '') {
                                                case 'unpaid':
                                                    $statusClass = 'bg-secondary';
                                                    $statusText = 'UNPAID';
                                                    break;
                                                case 'paid':
                                                    $statusClass = 'bg-success';
                                                    $statusText = 'PAID';
                                                    break;
                                                case 'expired':
                                                    $statusClass = 'bg-danger';
                                                    $statusText = 'EXPIRED';
                                                    break;
                                                
                                                default:
                                                    $statusClass = 'bg-secondary';
                                                    $statusText = 'Tidak Diketahui';
                                            }
                                            ?>
                                            <span class="badge badge-status <?= $statusClass ?> text-white"><?= $statusText ?></span>
                                        </td>
                                        <td data-label="Amount"><?= !empty($key->amount) ? 'Rp ' . number_format($key->amount, 0, ',', '.') : '' ?></td>
                                        <td data-label="Aksi" class="text-center">
                                            <div class="btn-group">
                                                <?php if($key->status == 'unpaid') { ?>
                                                <a href="<?= base_url('dashboard/tranfer/' . ($key->id ?? '')) ?>" class="btn btn-sm  btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="ti ti-money"></i> Bayar
                                                </a>
                                                <?php } else { ?>
                                                <a href="<?= base_url('dashboard/tranfer/' . ($key->id ?? '')) ?>" class="btn btn-sm btn-secondary" disabled>
                                                    <i class="ti ti-money"></i> Lihat
                                                </a>
                                                <?php } ?>
                                                
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

   