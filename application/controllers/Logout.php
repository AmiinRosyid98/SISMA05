<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library('session');
    }

    public function index() {
        $this->session->unset_userdata(['user_id', 'email', 'nama', 'role', 'logged_in']);
        $this->session->sess_destroy();
        redirect('login');
    }
}