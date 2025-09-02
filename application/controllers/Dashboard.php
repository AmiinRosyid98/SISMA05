<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Load session library
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
		$this->load->model('Lembaga_model');
		// Check if user is not logged in
		if (!$this->session->userdata('logged_in')) {
			// Set message
			$this->session->set_flashdata('message', 'Silakan login terlebih dahulu!');
			// Redirect to login page
			redirect('login');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('role') == 'lembaga') {
			redirect('dashboard/detail_lembaga');
			$cek_pengajuan_lembaga = $this->db->get_where('lembaga', ['user_id' => $this->session->userdata('user_id')])->row_array();
			// var_dump("cek");die;
			if($cek_pengajuan_lembaga){
				redirect('dashboard/detail_lembaga');
			}
		} else {
			// redirect('dashboard');
		}
		// get all coordinate lembaga
		$data['lembaga'] = $this->Lembaga_model->get_all_lembaga_aktif();
		// jumlah user aktif
		$data['jumlah_user_aktif'] = $this->User_model->get_all_users_aktif();
		$data['jumlah_lembaga_aktif'] = $this->Lembaga_model->get_all_lembaga_aktif_count();

		// jumlah total pendapatan
		$data['total_pendapatan'] = $this->Admin_model->get_total_pendapatan();
		$data['total_lembaga_belum_bayar'] = $this->Admin_model->get_total_lembaga_belum_bayar();
		$this->load->view('admin/include/header');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/include/footer');
	}

	public function listuser(){
		$data['title'] = 'List User';
		$data['users'] = $this->User_model->get_all_users();
		$this->load->view('admin/include/header');
		$this->load->view('admin/listuser', $data);
		$this->load->view('admin/include/footer');
	}

	public function listlembaga(){
		$data['title'] = 'List Lembaga';
		$data['lembaga'] = $this->Lembaga_model->get_all_lembaga();
		$data['setting'] = $this->Admin_model->get_setting();
		$this->load->view('admin/include/header');
		$this->load->view('admin/listlembaga', $data);
		$this->load->view('admin/include/footer');
	}
	public function deletedata(){
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		if($table == 'lembaga'){
			if($this->Lembaga_model->delete_lembaga($id)){
				echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
			}else{
				echo json_encode(['status' => 'error', 'message' => 'Data gagal dihapus!']);
			}
		}else{
			if($this->User_model->delete_data($id, $table)){
				echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
			}else{
				echo json_encode(['status' => 'error', 'message' => 'Data gagal dihapus!']);
			}
		}
		
	}
	public function pengajuan_lembaga(){
		if($this->session->userdata('role') == 'lembaga') {
			$cek_pengajuan_lembaga = $this->db->get_where('lembaga', ['user_id' => $this->session->userdata('user_id')])->row_array();
			if($cek_pengajuan_lembaga){
				redirect('dashboard/detail_lembaga');
			}
		} else {
			redirect('dashboard');
		}
		$data['title'] = 'Pengajuan Lembaga';
		$data['users'] = $this->User_model->get_all_users();
		$this->load->view('admin/include/header');
		$this->load->view('admin/pengajuan_lembaga', $data);
		$this->load->view('admin/include/footer');
	}
	public function detail_lembaga($id=null){
		if($this->session->userdata('role') == 'lembaga') {
			$cek_pengajuan_lembaga = $this->db->get_where('lembaga', ['user_id' => $this->session->userdata('user_id')])->row_array();
			if(!$cek_pengajuan_lembaga){
				redirect('dashboard/pengajuan_lembaga');
			}
		}
			
		$data['title'] = 'Detail Lembaga';
		if($id){
			$data['lembaga'] = $this->Lembaga_model->get_lembaga_by_id($id);
		}else{
			$data['lembaga'] = $this->Lembaga_model->get_lembaga_by_user_id($this->session->userdata('user_id'));
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/detail_lembaga', $data);
		$this->load->view('admin/include/footer');
	}
	public function edituser($id){
		$data['title'] = 'Edit User';
		$data['users'] = $this->User_model->get_user_by_id($id);
		$this->load->view('admin/include/header');
		$this->load->view('admin/edituser', $data);
		$this->load->view('admin/include/footer');
	}
	public function doedituser(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$wa = $this->input->post('wa');
		$kota = $this->input->post('kota');
		$nama_lembaga = $this->input->post('nama_lembaga');
		$status = $this->input->post('status');
		$data = [
			'nama' => $nama,
			'email' => $email,
			'wa' => $wa,
			'kota' => $kota,
			'nama_lembaga' => $nama_lembaga,
			'status' => $status
		];
		if($this->User_model->edit_data($id, $data)){
			$this->session->set_flashdata('message', 'Data berhasil diubah!');

			echo json_encode(['status' => 'success', 'message' => 'Data berhasil diubah!']);
		}else{
			echo json_encode(['status' => 'error', 'message' => 'Data gagal diubah!']);
		}
	}

	public function form_lembaga(){
		$data['title'] = 'Form Lembaga';
		$data['users'] = $this->User_model->get_all_users();
		$data['setting'] = $this->Admin_model->get_setting();
		$this->load->view('admin/include/header');
		$this->load->view('admin/form_lembaga', $data);
		$this->load->view('admin/include/footer');
	}
	public function simpan_lembaga(){
        // Load form validation library
        $this->load->library('form_validation');
        $this->load->helper('file');

        // Set validation rules
        $this->form_validation->set_rules('npsn', 'NPSN', 'required|is_unique[lembaga.npsn]');
        $this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'required');
        $this->form_validation->set_rules('lembaga_naungan', 'Lembaga Naungan', 'required');
        $this->form_validation->set_rules('status_lembaga', 'Status Lembaga', 'required');
        $this->form_validation->set_rules('pemerintah', 'Pemerintah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama_kepala_sekolah', 'Nama Kepala Sekolah', 'required');
        $this->form_validation->set_rules('nip_nuptk', 'NIP/NUPTK', 'required');
        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa', 'required');
        $this->form_validation->set_rules('periode', 'Periode Tagihan', 'required');

        // Custom error messages
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('valid_email', 'Format {field} tidak valid');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar');

        // Check if form validation passed
        if ($this->form_validation->run() === FALSE) {
            // If validation fails, reload the form with validation errors
			// var_dump(validation_errors());die;
            $data['title'] = 'Tambah Data Lembaga';
            redirect('dashboard/form_lembaga');
        } else {
            // Create upload directory if not exists
            $upload_path = FCPATH . 'uploads/lembaga/logo/';

			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, TRUE);
			}

			// fix path biar jadi full absolute Windows path
			$upload_path = realpath($upload_path) . DIRECTORY_SEPARATOR;

            // Configure upload
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'logo_' . time() . '_' . rand(1000, 9999);
            $config['file_ext_tolower'] = TRUE;
            $config['overwrite'] = FALSE;

			// var_dump($upload_path);
			// var_dump(is_dir($upload_path));
			// var_dump(is_writable($upload_path));
			// die;

            // $this->load->library('upload', $config);
			$this->load->library('upload');
			$this->upload->initialize($config);

            // Check if file was uploaded
            if (!empty($_FILES['logo']['name'])) {
                if ($this->upload->do_upload('logo')) {
                    $upload_data = $this->upload->data();
                    $logo = $upload_data['file_name'];
                } else {
                    // If file upload fails, set error and reload form
                    $this->session->set_flashdata('error', $this->upload->display_errors());
					var_dump($_FILES['logo']['name']);	
					var_dump($this->upload->display_errors());die;

                    redirect('dashboard/form_lembaga');
                    return;
                }
            } else {
                $logo = 'default.jpg';
            }

            // Prepare data for database
            $data = array(
                'npsn' => $this->input->post('npsn'),
                'nama_lembaga' => $this->input->post('nama_lembaga'),
                'lembaga_naungan' => $this->input->post('lembaga_naungan'),
                'status_lembaga' => $this->input->post('status_lembaga'),
                'pemerintah' => $this->input->post('pemerintah'),
                'alamat' => $this->input->post('alamat'),
                'kab_kota' => $this->input->post('kabupaten_kota'),
                'provinsi' => $this->input->post('provinsi'),
                'kode_pos' => $this->input->post('kode_pos'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'nomor_telp' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'website' => $this->input->post('website'),
                'jumlah_siswa' => $this->input->post('jumlah_siswa'),
                'periode' => $this->input->post('periode'),
                'nama_kepala_sekolah' => $this->input->post('nama_kepala_sekolah'),
                'nip_nuptk' => $this->input->post('nip_nuptk'),
                'logo_lembaga' => $logo,
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('user_id')
            );

            // Insert data to database
            $this->Lembaga_model->create_lembaga($data);

            // Set success message and redirect
            $this->session->set_flashdata('success', 'Data lembaga berhasil disimpan');
            redirect('dashboard/detail_lembaga');
        }
    }

	public function daftar_lembaga(){
		$data['title'] = 'Daftar Lembaga';
		$data['users'] = $this->User_model->get_all_users();
		$this->load->view('admin/include/header');
		$this->load->view('admin/daftar_lembaga', $data);
		$this->load->view('admin/include/footer');
	}

	public function edit_lembaga($id){
		$data['title'] = 'Edit Lembaga';
		$data['lembaga'] = $this->Lembaga_model->get_lembaga_by_id($id);
		$data['setting'] = $this->Admin_model->get_setting();
		$this->load->view('admin/include/header');
		$this->load->view('admin/edit_lembaga', $data);
		$this->load->view('admin/include/footer');
	}

	public function ubah_lembaga(){
		$id = $this->input->post('id');
		$npsn = $this->input->post('npsn');
		$nama_lembaga = $this->input->post('nama_lembaga');
		$lembaga_naungan = $this->input->post('lembaga_naungan');
		$status_lembaga = $this->input->post('status_lembaga');
		$pemerintah = $this->input->post('pemerintah');
		$alamat = $this->input->post('alamat');
		$kab_kota = $this->input->post('kabupaten_kota');
		$provinsi = $this->input->post('provinsi');
		$kode_pos = $this->input->post('kode_pos');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$nomor_telp = $this->input->post('telepon');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		$jumlah_siswa = $this->input->post('jumlah_siswa');
		$periode = $this->input->post('periode');
		$nama_kepala_sekolah = $this->input->post('nama_kepala_sekolah');
		$nip_nuptk = $this->input->post('nip_nuptk');
		// $logo = $this->input->post('logo');
		$upload_path = FCPATH . 'uploads/lembaga/logo/';

		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
		}

		// fix path biar jadi full absolute Windows path
		$upload_path = realpath($upload_path) . DIRECTORY_SEPARATOR;

		// Configure upload
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048; // 2MB
		$config['file_name'] = 'logo_' . time() . '_' . rand(1000, 9999);
		$config['file_ext_tolower'] = TRUE;
		$config['overwrite'] = FALSE;

		// var_dump($upload_path);
		// var_dump(is_dir($upload_path));
		// var_dump(is_writable($upload_path));
		// die;

		// $this->load->library('upload', $config);
		$this->load->library('upload');
		$this->upload->initialize($config);

		// Check if file was uploaded
		if (!empty($_FILES['logo']['name'])) {
			if ($this->upload->do_upload('logo')) {
				$upload_data = $this->upload->data();
				$logo = $upload_data['file_name'];
			} else {
				// If file upload fails, set error and reload form
				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('dashboard/form_lembaga');
				return;
			}
		} else {
			// $logo = $logo;
		}
		$data = [
			'npsn' => $npsn,
			'nama_lembaga' => $nama_lembaga,
			'lembaga_naungan' => $lembaga_naungan,
			'status_lembaga' => $status_lembaga,
			'pemerintah' => $pemerintah,
			'alamat' => $alamat,
			'kab_kota' => $kab_kota,
			'provinsi' => $provinsi,
			'kode_pos' => $kode_pos,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'nomor_telp' => $nomor_telp,
			'email' => $email,
			'website' => $website,
			'jumlah_siswa' => $jumlah_siswa,
			'periode' => $periode,
			'nama_kepala_sekolah' => $nama_kepala_sekolah,
			'nip_nuptk' => $nip_nuptk
		];
		if (!empty($_FILES['logo']['name'])) {
			$data['logo_lembaga'] = $logo;
		}

		if($this->session->userdata('role') == 'admin'){
			$data['status_pengajuan'] = $this->input->post('status_pengajuan');
			$data['alasan_ditolak'] = $this->input->post('alasan_ditolak') ?? '';

			// get apakah subscribtion sudah ada atau belum

			$get_subscription = $this->db->get_where('subscriptions', ['lembaga_id' => $id])->row();
			if($get_subscription){
				
			}else{
				$lembaga = $this->Lembaga_model->get_lembaga_by_id($id);
				$user = $this->User_model->get_user_by_id($lembaga->user_id);
				$pesan = "";
				if($this->input->post('status_pengajuan') == 'aktif'){
					$start_date = date('Y-m-d');
					$setting = $this->Admin_model->get_setting();
					$trial_end = date('Y-m-d', strtotime("+".$setting->masa_trial." day", strtotime($start_date)));
					$lembaga = $this->Lembaga_model->get_lembaga_by_id($id);
					$user = $this->User_model->get_user_by_id($lembaga->user_id);
					$amount = $jumlah_siswa * $setting->biaya_langganan * $lembaga->periode;
					$tagihan = [
						'user_id' => $lembaga->user_id,
						'lembaga_id' => $id,
						'start_date' => $start_date,
						'trial_end' => $trial_end,
						'next_billing' => $trial_end, // pertama kali ditagih pas habis trial
						'amount' => $amount,
						// 'status' => 'trial',
						'status' => 'active',
					];
	
					$this->db->insert('subscriptions', $tagihan);

					$pesan = "Halo *".$user['nama']."*,". PHP_EOL . PHP_EOL . 

						"Lembaga Anda dengan nama *".$lembaga->nama_lembaga."* telah *DISETUJUI* oleh admin.". PHP_EOL .
						"Sekarang lembaga Anda sudah aktif di sistem dan dapat digunakan.". PHP_EOL . PHP_EOL . 

						"Terima kasih,". PHP_EOL .
						"Tim SISMA05";
					
				} else if($this->input->post('status_pengajuan') == 'nonaktif') {
					$pesan = "Halo *".$user['nama']."*,". PHP_EOL . PHP_EOL . 

						"Lembaga *".$lembaga->nama_lembaga."* saat ini *DINONAKTIFKAN* oleh admin". PHP_EOL .
						"Untuk informasi lebih lanjut atau pengajuan aktivasi kembali, silakan hubungi tim admin.". PHP_EOL . PHP_EOL . 

						"Terima kasih,". PHP_EOL .
						"Tim SISMA05";
					

				} else if($this->input->post('status_pengajuan') == 'rejected') {
					$pesan = "Halo *".$user['nama']."*,". PHP_EOL . PHP_EOL . 

						"Lembaga *".$lembaga->nama_lembaga."* saat ini *DITOLAK* oleh admin". PHP_EOL .
						"_Alasan : ".$data['alasan_ditolak']."_". PHP_EOL .
						"Untuk informasi lebih lanjut atau pengajuan aktivasi kembali, silakan hubungi tim admin.". PHP_EOL . PHP_EOL . 

						"Terima kasih,". PHP_EOL .
						"Tim SISMA05";
					
				}
				send_wa(normalize_phone($user['wa']), $pesan);
			}

			
		}
		

		if($this->Lembaga_model->update_lembaga($id, $data)){
			$this->session->set_flashdata('success', 'Data lembaga berhasil diubah');
			if($this->session->userdata('role') == 'admin'){
				redirect('dashboard/listlembaga');
			}else{
				redirect('dashboard/detail_lembaga');
			}
		}else{
			$this->session->set_flashdata('error', 'Data lembaga gagal diubah');
			redirect('dashboard/edit_lembaga/'.$id);
		}


	}

	public function settingtagihan(){
		
		$data['title'] = 'Setting Tagihan';
		$data['setting'] = $this->Admin_model->get_setting();
		$this->load->view('admin/include/header');
		$this->load->view('admin/settingtagihan', $data);
		$this->load->view('admin/include/footer');
	}

	public function simpan_setting_tagihan(){
		$data = [
			'tripay_link' => $this->input->post('tripay_link'),
			'tripay_api_key' => $this->input->post('tripay_api_key'),
			'tripay_private_key' => $this->input->post('tripay_private_key'),
			'tripay_merchant_id' => $this->input->post('tripay_merchant_id'),
			'biaya_langganan' => $this->input->post('biaya_langganan'),
			'masa_trial' => $this->input->post('masa_trial'),
		];
		if($this->Admin_model->update_setting_tagihan($data)){
			$this->session->set_flashdata('success', 'Data setting tagihan berhasil disimpan');
			redirect('dashboard/settingtagihan');
		}else{
			$this->session->set_flashdata('error', 'Data setting tagihan gagal disimpan');
			redirect('dashboard/settingtagihan');
		}
	}

	public function tagihan(){
		
		$data['title'] = 'Tagihan';
		$data['tagihan'] = $this->Admin_model->get_tagihan();
		$this->load->view('admin/include/header');
		$this->load->view('admin/tagihan', $data);
		$this->load->view('admin/include/footer');
	}

	public function tranfer($id){

		$url = tripay_link() . 'merchant/payment-channel';
		$result = tripay_get($url);

		$cek_sudah_baya = $this->db->select('*')
										->from('transaksi n')
										->where(" n.id_invoice = $id
												AND (status = 'UNPAID' OR status = 'PAID') ")
										->order_by("n.id", "DESC")
										->limit(1)->get();
			if($cek_sudah_baya->num_rows()>0){
				$data['pilihpembayaran'] = "sudah";
				$data['detailmethod'] = $cek_sudah_baya->row();
			} else {
				$data['pilihpembayaran'] = "belum";
				$data['detailmethod']	= "";
			}

		

		$data['title'] = 'Lakukan Pembayaran';
		$data['tagihan'] = $this->Admin_model->get_tagihan_by_id($id);
		$data['metode_pembayaran'] = $result['data'];
		// $data['pilihpembayaran'] = 'belum';
		
		$this->load->view('admin/include/header');
		$this->load->view('admin/transfer', $data);
		$this->load->view('admin/include/footer');
	}

	public function fee_calculator($param=null, $amount=null)
	{
		$amount = $_POST['total'] ?? $amount;
		$code = $_POST['method'] ?? $param;
		$url = tripay_link() . 'merchant/fee-calculator';
		$params = ['amount' => $amount];
		if ($code) {
			$params['code'] = $code;
		}
		// Gabungkan URL dengan query
		$url_query = $url . '?' . http_build_query($params);
		$result = tripay_get($url_query);

		$merchantFee = $result['data'][0]['total_fee']['merchant'];

		$jumlahtotal = $amount + $merchantFee;

		if(!$param){

			echo json_encode(array(
				"status" => "success",
				//sadasda
				"biayaadmin" => $merchantFee,
				"jumlahtotal" => $jumlahtotal,
				"biayaadmin_format" => number_format($merchantFee, 0, ',', '.'),
				// sdsdfsd
			));
			die;

		} else {
			return json_encode(array(
				"status" => "success",
				//sadasda
				"biayaadmin" => $merchantFee,
				"jumlahtotal" => $jumlahtotal,
				"biayaadmin_format" => number_format($merchantFee, 0, ',', '.'),
				// sdsdfsd
			));
		}
	}

	function formatTanggalIndo($datetime) {
        // Ubah ke timestamp
        $timestamp = strtotime($datetime);
        
        // Array nama bulan dalam Bahasa Indonesia
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        
        $tgl = date('d', $timestamp);
        $bln = (int)date('m', $timestamp); // jadi integer untuk ambil dari array
        $thn = date('Y', $timestamp);
        $jam = date('H:i', $timestamp);

        return "$tgl {$bulanIndo[$bln]} $thn, Pukul $jam WIB";
    }

	public function create_tripay()
    {
        $this->load->helper('tripay');
        $this->load->model('Tripay_Model');

        $method                 = $this->input->post('method');

        $jumlah_tarif           = $this->input->post('jumlah_tarif');
        $invoice_id           = $this->input->post('invoice_id');

        $expired_time = $this->get_expired_time_by_method($method);
        $expired_time_db = date("Y-m-d H:i:s", $expired_time);


        
        // $amount = $jumlah_tarif;
        $pos = $this->Admin_model->get_tagihan_by_id($invoice_id);
		$merchant_ref = $pos->invoice_id;
        $amount = $pos->amount;
        // var_dump($this->cekbiayaadmin($method, $amount));die;
        $response = $this->fee_calculator($method, $amount);
		// var_dump($response);die;
        $biayaadmin = json_decode($response)->biayaadmin; // langsung ambil dari array

        $lembaga = $this->Lembaga_model->get_lembaga_by_id($pos->lembaga_id);
		
		$user = $this->User_model->get_user_by_id($lembaga->user_id);
		// var_dump($user['email']);die;
        $amount = $amount + $biayaadmin;

        $customer_email = $user['email'];

        // Step 1: expire transaksi lama yang belum dibayar
        $this->Tripay_Model->expire_unpaid_before($customer_email);

        // Step 2: buat transaksi baru
        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchant_ref,
            'amount'         => $amount,
            'customer_name'  => $user['nama'],
            'customer_email' => $customer_email,
            'customer_phone' => $user['wa'],
            'order_items'    => [
                [
                    'sku'      => $merchant_ref,
                    'name'     => "Tagihan Lembaga ".$lembaga->nama_lembaga,
                    'price'    => $amount,
                    'quantity' => 1
                ]
            ],
            'callback_url'   => base_url('tripay/callback'),
            'return_url'     => base_url('tripay/selesai'),
            'expired_time'   => $expired_time,
            'signature'      => tripay_signature($merchant_ref, $amount)
        ];

        $response = tripay_post(tripay_link()."transaction/create", $data);

        if (isset($response['success']) && $response['success']) {
            $trx = $response['data'];
            $trx['expired_time_db'] = $this->formatTanggalIndo($expired_time_db);

            $barcodeUrl = null;
            foreach ($response['data']['instructions'] as $instruksi) {
                if (isset($instruksi['image_url'])) {
                    $barcodeUrl = $instruksi['image_url'];
                    break;
                }
            }

            $this->Tripay_Model->insert([
                'merchant_ref'    => $trx['merchant_ref'],
                'reference'       => $trx['reference'],
                'method'          => $trx['payment_method'],
                'amount'          => $trx['amount'],
                'amount_awal'     => $jumlah_tarif ,
                'biayaadmin'      => $biayaadmin ,
                'status'          => $trx['status'],
                // 'expired_at'      => date('Y-m-d H:i:s', strtotime($trx['expired_time'])),
                'expired_at'      => $expired_time_db,
                'created_at'      => date("Y-m-d H:i:s"),
                'customer_email'  => $customer_email,
                'pay_code'      => isset($trx['pay_code']) ? $trx['pay_code'] : null,
                'qr_url'        => ($trx['payment_method'] === 'OVO' || $trx['payment_method'] === 'DANA' || $trx['payment_method'] === 'SHOPEEPAY') 
                                    ? $trx['checkout_url'] 
                                    : (isset($trx['qr_url']) ? $trx['qr_url'] : null),
                'barcode_url' => $barcodeUrl,

                'id_invoice'            => $invoice_id,
                
            ]);

			$pesan =
				"Halo ".$user['nama'] .PHP_EOL . PHP_EOL .  

				"Anda telah memilih metode pembayaran: $method" . PHP_EOL . PHP_EOL . 
				
				"Nomor Tagihan : $pos->invoice_id" . PHP_EOL . 
				"Nama Lembaga : $lembaga->nama_lembaga" . PHP_EOL . 
				"Jumlah Tagihan : Rp ".number_format($pos->amount, 0, ',', '.')."" . PHP_EOL . PHP_EOL . 

				"Mohon segera lakukan pembayaran sebelum tanggal ".$this->formatTanggalIndo($expired_time_db)."." . PHP_EOL . 
				"Untuk detail pembayaran, silahkan klik link berikut : " . PHP_EOL . 
				base_url("dashboard/tranfer/$invoice_id") . PHP_EOL . PHP_EOL . 
				"Jika lewat dari tanggal tersebut, tagihan akan otomatis dibatalkan." . PHP_EOL . PHP_EOL . 

				"Terima kasih,  " . PHP_EOL . 
				"Tim SISMA05";
			send_wa(normalize_phone($user['wa']), $pesan);
            echo json_encode(['success' => true, 'data' => $trx]);
        } else {
            echo json_encode(['success' => false, 'message' => $response['message'] ?? 'Error tidak diketahui']);
        }
    }

	function get_expired_time_by_method($method_code)
    {
        $now = time();

        // Ubah ke uppercase agar match dengan key mapping
        $method_code = strtoupper($method_code);

        // Map durasi expired dalam detik
        $expire_map = [
            // Bank VA - 24 jam
            'BCAVA'        => 60 * 60 * 24,
            'BNIVA'        => 60 * 60 * 24,
            'BRIVA'        => 60 * 60 * 24,
            'MANDIRIVA'    => 60 * 60 * 24,
            'PERMATAVA'    => 60 * 60 * 24,
            'MUAMALATVA'   => 60 * 60 * 2,
            'DANAMONVA'    => 60 * 60 * 24,
            'CIMBVA'       => 60 * 60 * 24,
            'OCBCVA'       => 60 * 60 * 24,
            'BSIVA'        => 60 * 60 * 2,
            'SAMPOERNAVA'  => 60 * 60 * 24,

            // Retail - 24 jam
            'ALFAMART'     => 60 * 60 * 24,
            'INDOMARET'    => 60 * 60 * 24,
            'ALFAMIDI'     => 60 * 60 * 24,

            // QRIS - 15 menit
            'QRIS'         => 60 * 60,

            // Ewallets
            'OVO'          => 60 * 60,
            'DANA'         => 60 * 60,
            'LINKAJA'      => 60 * 60,
            'SHOPEEPAY'    => 60 * 60,
            // hiihihihihi
        ];

        // Gunakan default 24 jam jika tidak ditemukan
        $expire_seconds = $expire_map[$method_code] ?? (60 * 60 * 24);


        // Return sebagai UNIX timestamp
        // var_dump($now + $expire_seconds);die;
        return $now + $expire_seconds;
    }

	public function cekpembayaran(){
        $ID = $_POST['ID'];

        $db = $this->db->select('*')
                        ->from("transaksi")
                        ->where("reference", $ID)
                        ->limit(1)
                        ->get()->row();
        if($db->status == "PAID"){
            echo json_encode(array(
                "status" => "success"
            ));die;
        } else {
            echo json_encode(array(
                "status" => "tidak"
            ));die;
        }

    }

	public function get_instruksi_ajax()
    {
        $reference = $this->input->post('reference');
        $apiKey = tripay_api_key(); // Ganti dengan API key Tripay kamu

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => tripay_link().'transaction/detail?reference=' . $reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        echo $response;
    }

	public function callback() {
        // Ambil input JSON
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Validasi callback signature
        $callbackSignature = $_SERVER['HTTP_X_CALLBACK_SIGNATURE'];
        $privateKey = tripay_private_key(); // dari dashboard Tripay
        $validSignature = hash_hmac('sha256', $json, $privateKey);

        if ($callbackSignature !== $validSignature) {
            show_error('Invalid signature', 403);
        }

        // Validasi event
        if ($_SERVER['HTTP_X_CALLBACK_EVENT'] !== 'payment_status') {
            show_error('Invalid callback event', 403);
        }

        // Ambil data pembayaran
        $reference = $data['reference'];
        $status = $data['status'];

        $reference = $data['reference'];
        $merchant_ref = $data['merchant_ref'];
        $payment_method = $data['payment_method'];
        $payment_method_code = $data['payment_method_code'];
        $total_amount = $data['total_amount'];
        $amount_received = $data['amount_received'];
        $status = $data['status'];
        $paid_at = $data['paid_at'];
        $note = $data['note'];

        // Lakukan update ke database
        if ($status == 'PAID') {
            // contoh update status transaksi
            $this->db->where('reference', $reference);
            $this->db->update('transaksi', ['status' => $status, 'tanggal_pembayaran' => date("Y-m-d H:i:s")  ]); // 1 = lunas

            $getdata = $this->db->select("*")
                                ->from("transaksi")
                                ->where('reference', $reference)
                                ->get()->row();

			
            if($getdata){
				// update invoices
				$this->db->where('id', $getdata->id_invoice);



            	$this->db->update('invoices', ['status' => 'paid', 'tanggal_pembayaran' => date("Y-m-d H:i:s")  ]); // 1 = lunas
                
				// Geser next_billing ke bulan berikutnya

				$getinvoice = $this->db->select("*")
                                ->from("invoices")
                                ->where('id', $getdata->id_invoice)
                                ->get()->row();

				$next = date('Y-m-d', strtotime("+1 month", strtotime(date("Y-m-d"))));
				$this->db->where('id', $getinvoice->subscription_id)
						 ->update('subscriptions', ['next_billing' => $next]);
            }

        } elseif ($status == 'EXPIRED' || $status == 'FAILED') {
            $this->db->where('reference', $reference);
            $this->db->update('transaksi', [ 'status' => $status ]); // 0 = gagal/belum bayar
        }

        echo json_encode(['success' => true]);
    }

	
}
