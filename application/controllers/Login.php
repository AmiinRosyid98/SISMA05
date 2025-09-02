<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->library('session');
        
        /* Temporarily disabled CAPTCHA
        // Load reCAPTCHA config
        $this->load->config('recaptcha');
        $this->site_key = $this->config->item('recaptcha_site_key');
        $this->secret_key = $this->config->item('recaptcha_secret_key');
        */
    }

    public function index() {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }
        $this->load->view('login');
    }

    public function auth() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $response = [
                'status' => 'error',
                'message' => validation_errors(null, null)
            ];
        } else {
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', false);
            
            $user = $this->User_model->get_user_by_email($email);
            
            if ($user) {
                if($user['deleted_at'] != null){
                    $response = [
                        'status' => 'error',
                        'message' => 'Akun Anda telah dihapus. Silakan hubungi administrator.'
                    ];
                } 
                if (password_verify($password, $user['password'])) {
                    if ($user['status'] === 'aktif') {
                        $userdata = [
                            'user_id' => $user['id'],
                            'email' => $user['email'],
                            'nama' => $user['nama'],
                            'role' => $user['role'],
                            'logged_in' => true
                        ];
                        $this->session->set_userdata($userdata);
                        if($user['role'] == 'admin'){
                            $response = [
                                'status' => 'success',
                                'message' => 'Login berhasil!',
                                'redirect' => base_url('dashboard')
                            ];
                        }else{
                            $cek_pengajuan_lembaga = $this->Admin_model->cek_pengajuan_lembaga($user['id']);
                            // var_dump($cek_pengajuan_lembaga);die;
                            if($cek_pengajuan_lembaga){

                                
                                if($cek_pengajuan_lembaga['deleted_at'] != NULL){
                                    $redirect = base_url('dashboard/pengajuan_lembaga');
                                }else{
                                    $redirect = base_url('dashboard/detail_lembaga');
                                }
                            }else{
                                $redirect = base_url('dashboard/pengajuan_lembaga');
                            }
                            $response = [
                                'status' => 'success',
                                'message' => 'Login berhasil!',
                                'redirect' => $redirect
                            ];
                        }
                    } else {
                        $response = [
                            'status' => 'error',
                            'message' => 'Akun Anda belum aktif. Silakan hubungi administrator.'
                        ];
                    }
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Password yang Anda masukkan salah.'
                    ];
                }
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Email tidak terdaftar.'
                ];
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function logout() {
        $this->session->unset_userdata(['user_id', 'email', 'nama', 'role', 'logged_in']);
        $this->session->sess_destroy();
        redirect('login');
    }
}