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
            <div class="card-header" style="display: flex; width:100% ">
                <h5 style="width: 100%;"><?= $title ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Panduan Penggunaan SISMA</h4>

                        <?php if ($this->session->userdata('role') == 'admin') { ?>
                        
                        <div class="mb-4">
                            <h5 class="text-primary">1. Pendahuluan</h5>
                            <p>SISMA (Sistem Informasi Manajemen Lembaga) adalah sistem yang dirancang untuk memudahkan pengelolaan data lembaga pendidikan. Panduan ini akan membantu Anda memahami cara menggunakan sistem ini dengan efektif.</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">2. Login ke Sistem</h5>
                            <ol>
                                <li>Buka browser dan akses alamat website SISMA</li>
                                <li>Masukkan username dan password yang telah diberikan</li>
                                <li>Klik tombol <strong>Login</strong></li>
                            </ol>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">3. Menu Utama</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Menu</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Dashboard</strong></td>
                                            <td>Halaman utama yang menampilkan ringkasan informasi sistem</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Daftar User</strong></td>
                                            <td>Mengelola data user ( edit, hapus, lihat detail)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Daftar Lembaga</strong></td>
                                            <td>Mengelola data lembaga pendidikan (edit, hapus, lihat detail)</td>
                                        </tr>
                                        
                                        <tr>
                                            <td><strong>Setting Tagihan</strong></td>
                                            <td>Ubah setting tagihan (setting tripay, biaya langganan, masa trial)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">4. Mengelola Data User</h5>

                            <h6>4.1 Mengedit Data User</h6>
                            <ol>
                                <li>Pilih menu <strong>Daftar User</strong></li>
                                <li>Cari user yang akan diedit</li>
                                <li>Klik ikon <i class="fas fa-edit"></i> pada kolom aksi</li>
                                <li>Lakukan perubahan yang diperlukan</li>
                                <li>Klik tombol <strong>Simpan</strong> untuk menyimpan perubahan</li>
                            </ol>

                            <h6>4.2 Menghapus Data User</h6>
                            <ol>
                                <li>Pilih menu <strong>Daftar User</strong></li>
                                <li>Cari user yang akan dihapus</li>
                                <li>Klik ikon <i class="fas fa-trash"></i> pada kolom aksi</li>
                                <li>Konfirmasi penghapusan data</li>
                            </ol>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">5. Mengelola Daftar Lembaga</h5>
                            <h6>5.1 Melihat Detail Lembaga</h6>
                            <ol>
                                <li>Pilih menu <strong>Daftar Lembaga</strong></li>
                                <li>Klik ikon <i class="fas fa-eye"></i> pada kolom aksi</li>
                                <li>Detail lembaga akan ditampilkan</li>
                            </ol>

                            <h6>5.2 Mengedit Data Lembaga</h6>
                            <ol>
                                <li>Pilih menu <strong>Daftar Lembaga</strong></li>
                                <li>Cari lembaga yang akan diedit</li>
                                <li>Klik ikon <i class="fas fa-edit"></i> pada kolom aksi</li>
                                <li>Lakukan perubahan yang diperlukan</li>
                                <li>Klik tombol <strong>Simpan</strong> untuk menyimpan perubahan</li>
                            </ol>

                            <h6>5.3 Menghapus Data Lembaga</h6>
                            <ol>
                                <li>Pilih menu <strong>Daftar Lembaga</strong></li>
                                <li>Cari lembaga yang akan dihapus</li>
                                <li>Klik ikon <i class="fas fa-trash"></i> pada kolom aksi</li>
                                <li>Konfirmasi penghapusan data</li>
                            </ol>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">5. Setting Tagihan</h5>
                            <ol>
                                <li>Pilih menu <strong>Setting Tagihan</strong></li>
                                <li>Ubah data tagihan</li>
                                <li>Klik tombol <strong>Simpan</strong> untuk menyimpan perubahan</li>
                            </ol>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary">6. Bantuan</h5>
                            <p>Jika Anda mengalami kesulitan dalam menggunakan sistem, silakan hubungi:</p>
                            <ul>
                                <li>Email: info@sisma05.com</li>
                                <li>Telepon: 0878-7171-8389</li>
                                <li>Jam Operasional: Senin - Jumat, 08:00 - 17:00 WIB</li>
                            </ul>
                        </div>
                        <?php } else { ?>
                            <div class="mb-4">
                                <h5 class="text-primary">1. Pendahuluan</h5>
                                <p>Selamat datang di SISMA (Sistem Informasi Manajemen Lembaga). Panduan ini akan membantu Anda dalam menggunakan sistem.</p>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">2. Menu Utama</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Menu</th>
                                                <th>Fungsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Ajukan Lembaga</strong></td>
                                                <td>Ajukan lembaga baru, <br>ini adalah halaman awal pertama kali setelah anda mendaftar</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Lembaga</strong></td>
                                                <td>Lihat detail lembaga, <br>setelah anda mengajukan lembaga, maka akan muncul menu lembaga untuk melihat detail lembaga dan mengelola data lembaga</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tagihan</strong></td>
                                                <td>Lihat tagihan lembaga Anda, apabila lembaga sudah disetujui, maka akan muncul menu tagihan adalah halaman untuk melihat tagihan lembaga Anda </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">3. Mengajukan Lembaga Baru</h5>
                                <p>Jika lembaga Anda belum terdaftar, Anda dapat mengajukan pendaftaran:</p>
                                <ol>
                                    
                                    <li>Klik tombol <strong>Ajukan Lembaga</strong></li>
                                    <li>Isi semua data lembaga dengan lengkap dan benar</li>
                                    <li>Klik tombol <strong>Ajukan</strong></li>
                                    <li>Tunggu persetujuan dari admin</li>
                                </ol>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Status pengajuan dapat dilihat di menu <strong>Lembaga</strong>.
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">4. Mengedit Data Lembaga</h5>
                                <p>Setelah Anda mengajukan lembaga, Anda dapat mengedit data lembaga:</p>
                                <ol>
                                    <li>Pilih menu <strong>Lembaga</strong></li>
                                    <li>Klik tombol <strong>Edit</strong></li>
                                    <li>Lakukan perubahan yang diperlukan</li>
                                    <li>Klik tombol <strong>Simpan</strong></li>
                                </ol>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">5. Tagihan</h5>
                                <p>Daftar tagihan ini akan muncul secara berkala setelah lembaga disetujui:</p>
                                <ol>
                                    <li>Pilih menu <strong>Tagihan</strong></li>
                                    <li>Lihat tagihan yang akan dibayar</li>
                                    <li>Klik tombol <strong>Bayar</strong></li>
                                    <li>Pilih metode pembayaran</li>
                                    <li>Klik tombol <strong>Lakukan Pembayaran</strong></li>
                                    <li>Kemudian muncul halaman detail pembayaran, lakukan pembayaran sesuai metode pembayaran yang dipilih</li>
                                    <li>Jika pembayaran berhasil, maka status tagihan akan berubah menjadi <strong>Lunas</strong></li>
                                </ol>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">5. Bantuan</h5>
                                <p>Jika Anda mengalami kesulitan, silakan hubungi:</p>
                                <ul>
                                    <li>Email: info@sisma05.com</li>
                                    <li>Telepon: 0878-7171-8389</li>
                                    <li>Jam Operasional: Senin - Jumat, 08:00 - 17:00 WIB</li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
