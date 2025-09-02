<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Load session library
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
		
		
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
	 * 
	 */

	private $api_url = "https://app.saifudin.web.id/send-message";
    private $api_key = "CT8wXjOMsa4WtVWHeLHpar5uPq4WkJ"; // ganti sesuai API key Anda
    private $sender  = "628883558303"; // nomor WA device Anda
	public function index()
	{
		$url = tripay_link() . 'merchant/payment-channel';
		$result = tripay_get($url);
		$data['metode_pembayaran'] = $result['data'];
		$data['setting'] = $this->Admin_model->get_setting();
		$this->load->view('welcome_message',$data);
	}

	public function send()
    {
        $target  = "6285784325916"; // nomor tujuan
        $message = "Hello World from CI3 aam";

		send_wa($target, $message);
    }
}
