<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library('session');
       $this->load->model('Lembaga_model');
    }

    public function index()
	{
		$data['lembaga'] = $this->Lembaga_model->get_all_lembaga_aktif();
		$this->load->view('lembaga', $data);
	}
}