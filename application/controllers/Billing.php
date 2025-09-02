<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Billing extends CI_Controller {

    public function __construct() {
		parent::__construct();
		// Load session library
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
		$this->load->model('Lembaga_model');
		
	}
    public function check_billing($date=null) {
        $today = $date ?? date('Y-m-d');

        // Cari semua subscription yang harus ditagih hari ini
        $subs = $this->db->where('next_billing', $today)
                         ->where('status', 'active')
                         ->get('subscriptions')
                         ->result();

        foreach ($subs as $sub) {
            $this->generate_invoice($sub);
        }

        $data = [
            'cron_name' => "check_billing",
            'status'    => "SUCCESS",
            'message'   => "Billing checked successfully",
            'created_at'=> date('Y-m-d H:i:s')
        ];
        $this->db->insert("log_cron", $data);
    }

    private function generate_invoice($sub) {
        // Buat invoice baru
        $prefix = 'INV-' . date('Ym'); // contoh: INV-202508
        $last = $this->db->like('invoice_id', $prefix, 'after')
                        ->order_by('id', 'DESC')
                        ->get('invoices')
                        ->row();

        if ($last) {
            // ambil nomor terakhir lalu +1
            $last_number = intval(substr($last->invoice_id, -4));
            $new_number  = str_pad($last_number + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $new_number  = '0001';
        }

        $invoice_id = $prefix . '-' . $new_number; 

        $invoice = [
            'invoice_id' => $invoice_id,
            'subscription_id' => $sub->id,
            'billing_date'    => $sub->next_billing,
            'due_date'        => date('Y-m-d', strtotime("+7 days", strtotime($sub->next_billing))),
            'amount'          => $sub->amount, // bisa ambil dari plan
            'status'          => 'unpaid'
        ];
        if($this->db->insert('invoices', $invoice)){
            $id_invoice = $this->db->insert_id();

            $select_sub = $this->db->select("subscriptions.*, users.nama as nama, users.wa as wa, lembaga.nama_lembaga, lembaga.periode")
                            ->from("subscriptions")
                            ->join("users","subscriptions.user_id = users.id", "left" )
                            ->join("lembaga","subscriptions.lembaga_id = lembaga.id", "left" )
                            ->where("subscriptions.id", $sub->id)->get()->row();

            $pesan = "Halo *".$select_sub->nama ."*,  " . PHP_EOL .  
                    "Kami informasikan bahwa tagihan Anda sudah terbit dengan rincian sebagai berikut:  " . PHP_EOL . PHP_EOL . 
                    
                    "*Nomor Tagihan :* ".$invoice_id . PHP_EOL . 
                    "*Nama Lembaga :* ".$select_sub->nama_lembaga . PHP_EOL . 
                    "*Jumlah Tagihan :* Rp. ".number_format($sub->amount, 0, ',', '.'). PHP_EOL . 
                    "*Jatuh Tempo :* ".tanggal_indo($invoice['due_date']). PHP_EOL . PHP_EOL .

                    "Silakan lakukan pembayaran sebelum tanggal jatuh tempo melalui metode yang tersedia.  " . PHP_EOL .
                    "Untuk melihat detail tagihan dan melakukan pembayaran, silakan klik link berikut:  " . PHP_EOL . 
                    "".base_url("dashboard/tranfer/$id_invoice")."  " . PHP_EOL . PHP_EOL . 
                    
                    "Apabila Anda sudah melakukan pembayaran, abaikan pesan ini.  " . PHP_EOL . PHP_EOL . 

                    "Terima kasih,  " . PHP_EOL .  
                    "Tim SISMA05";

            send_wa(normalize_phone($select_sub->wa), $pesan);

            // Geser next_billing ke bulan berikutnya
            $next = date('Y-m-d', strtotime("+".$select_sub->periode." month", strtotime(date("Y-m-d"))));
            $setting = $this->Admin_model->get_setting();
					$this->db->where('id', $sub->id)
						 ->update('subscriptions', [
                        'next_billing' => $next,
                        "amount" => ($select_sub->jumlah_siswa * $select_sub->periode * $setting->biaya_langganan)
                    ]);
        }
        
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
                
                $select_sub = $this->db->select("subscriptions.*, users.nama as nama, users.wa as wa, lembaga.nama_lembaga, lembaga.periode, lembaga.jumlah_siswa")
                                ->from("subscriptions")
                                ->join("users","subscriptions.user_id = users.id", "left" )
                                ->join("lembaga","subscriptions.lembaga_id = lembaga.id", "left" )
                                ->where("subscriptions.id", $getinvoice->subscription_id)->get()->row();

				$next = date('Y-m-d', strtotime("+".$select_sub->periode." month", strtotime(date("Y-m-d"))));
                $setting = $this->Admin_model->get_setting();
				// $this->db->where('id', $getinvoice->subscription_id)
				// 		 ->update('subscriptions', [
                //             'next_billing' => $next,
                //             "amount" => ($select_sub->jumlah_siswa * $select_sub->periode * $setting->biaya_langganan)
                //         ]);
                
                $pesan = "Halo ".$select_sub->nama .",  " . PHP_EOL .   

                        "Pembayaran Anda telah BERHASIL kami terima. 🎉  " . PHP_EOL . PHP_EOL .

                        "*Detail pembayaran* :  " . PHP_EOL . 
                        "*Nomor Tagihan :* ".$getinvoice->invoice_id . PHP_EOL .
                        "*Jumlah Dibayar :* Rp " . number_format($getinvoice->amount, 0, ',', '.') . PHP_EOL .
                        "*Metode Pembayaran :* ".$payment_method.  PHP_EOL .
                        "*Tanggal Pembayaran :* ".tanggal_indo(date("Y-m-d", strtotime($getinvoice->tanggal_pembayaran)))." ".date("H:i", strtotime($getinvoice->tanggal_pembayaran))."  " . PHP_EOL . PHP_EOL .

                        "Terima kasih telah melakukan pembayaran tepat waktu.  " . PHP_EOL . PHP_EOL .

                        "Salam,  " . PHP_EOL .  
                        "Tim SISMA05";
                send_wa(normalize_phone($select_sub->wa), $pesan);
            }

        } elseif ($status == 'EXPIRED' || $status == 'FAILED') {
            $this->db->where('reference', $reference);
            $this->db->update('transaksi', [ 'status' => $status ]); // 0 = gagal/belum bayar
        }

        echo json_encode(['success' => true]);
    }
}
