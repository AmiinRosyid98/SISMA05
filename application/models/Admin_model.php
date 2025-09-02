<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cek_pengajuan_lembaga($id){
        return $this->db->get_where('lembaga', ['user_id' => $id])->row_array();
    }

    public function update_setting_tagihan($data){
        $this->db->where('id', 1);
        return $this->db->update('setting', $data);
    }

    public function get_setting(){
        return $this->db->get_where('setting', ['id' => 1])->row();

        
    }

    public function get_tagihan(){
        if($this->session->userdata('role') == 'admin') {
            $this->db->select('i.*,  l.nama_lembaga')
                     ->from('invoices i')
                     ->join('subscriptions s', 'i.subscription_id = s.id', 'left')
                     ->join('lembaga l', 's.lembaga_id = l.id', 'left')
                     ->order_by('i.id', 'DESC');
        } else {
            $this->db->select('i.*,  l.nama_lembaga')
                     ->from('invoices i')
                     ->join('subscriptions s', 'i.subscription_id = s.id', 'left')
                     ->join('lembaga l', 's.lembaga_id = l.id', 'left')
                     ->where('l.user_id', $this->session->userdata('user_id'))
                     ->order_by('i.id', 'DESC');
        }
        return $this->db->get()->result();
    }

    public function get_tagihan_by_id($id){
            $this->db->select('i.*,  l.nama_lembaga, l.jumlah_siswa, l.id as lembaga_id')
                     ->from('invoices i')
                     ->join('subscriptions s', 'i.subscription_id = s.id', 'left')
                     ->join('lembaga l', 's.lembaga_id = l.id', 'left')
                     ->where('i.id', $id)
                     ->order_by('i.id', 'DESC');
        return $this->db->get()->row();
    }

    public function get_total_pendapatan(){
        $query = $this->db->select("SUM(invoices.amount) as total")
                    ->from('invoices')
                    ->where('status','paid')
                    ->get()->row();
        return $query->total;
    }
    public function get_total_lembaga_belum_bayar(){
        $query = $this->db->select("SUM(invoices.amount) as total")
                    ->from('invoices')
                    ->where('status','unpaid')

                    ->get()->row();
        return $query->total;
    }
}