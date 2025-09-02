<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        
        /* Temporarily disabled CAPTCHA
        // Load reCAPTCHA config
        $this->load->config('recaptcha');
        $this->site_key = $this->config->item('recaptcha_site_key');
        $this->secret_key = $this->config->item('recaptcha_secret_key');
        
        */

        $this->load->config('recaptcha');
        $this->site_key = $this->config->item('recaptcha_site_key');
        $this->secret_key = $this->config->item('recaptcha_secret_key');
    }

    public function index() {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('wa', 'Nomor WhatsApp', 'required|trim|numeric');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'required|trim');
        // Temporarily disabled CAPTCHA
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');

        // Temporarily disabled CAPTCHA verification
        $recaptcha = $this->input->post('g-recaptcha-response');
        $recaptcha_verified = $this->verify_recaptcha($recaptcha);
        // $recaptcha_verified = true; // Always true when CAPTCHA is disabled

        if ($this->form_validation->run() == FALSE) {
            // Temporarily disabled CAPTCHA error message
            $data['site_key'] = $this->site_key;
            if (!$recaptcha_verified && $this->input->post('g-recaptcha-response')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi CAPTCHA gagal!</div>');
            }
            $this->load->view('register', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'wa' => htmlspecialchars($this->input->post('wa', true)),
                'kota' => htmlspecialchars($this->input->post('kota', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_lembaga' => htmlspecialchars($this->input->post('nama_lembaga', true)),
                'role' => 'lembaga',
                'status' => 'aktif',
            ];

            if ($this->User_model->register($data)) {

                $pesan = "Yth ".$data['nama']." dari ".$data['nama_lembaga'].",". PHP_EOL .  
                            "Pendaftaran Anda berhasil! 🎉". PHP_EOL .  PHP_EOL .  

                            "Silakan login menggunakan akun Anda melalui link berikut:  ". PHP_EOL .  
                            "Link login : " . base_url('login') . PHP_EOL . PHP_EOL .

                            "Terima kasih,  ". PHP_EOL .  
                            "Tim SISMA05"
                        ;

                send_wa(normalize_phone($data['wa']), $pesan);
                $this->session->set_flashdata('success', 'Pendaftaran berhasil! Silahkan Login');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Pendaftaran gagal! Silakan coba lagi.');
                redirect('register');
            }
        }
    }

    private function verify_recaptcha($recaptcha_response) {
        if (empty($recaptcha_response)) {
            return false;
        }

        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$this->secret_key}&response={$recaptcha_response}");
        $captcha_response = json_decode($verify);
        
        return ($captcha_response->success == true && $captcha_response->score >= 0.5);
    }

    public function test() {
        $data = [
            'nama' => "admin",
            'email' => "admin@gmail.com",
            'wa' => "08883558303",
            'kota' => "Bandung",
            'password' => password_hash("admin", PASSWORD_DEFAULT),
            'nama_lembaga' => "admin",
            'role' => 'admin',
            'status' => 'active'
        ];

        if ($this->User_model->register($data)) {
            $this->session->set_flashdata('message', 'Pendaftaran berhasil! Akun Anda sedang menunggu persetujuan admin.');
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Pendaftaran gagal! Silakan coba lagi.');
            redirect('register');
        }
    }
}
