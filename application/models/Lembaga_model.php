<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all lembaga
    public function get_all_lembaga() {

        $query = $this->db->select('users.nama, lembaga.*')
        ->from('lembaga')
        ->join('users', 'lembaga.user_id = users.id', 'left')
        ->order_by('lembaga.created_at', 'DESC')->get();
        return $query->result();
    }
    public function get_all_lembaga_aktif() {

        $query = $this->db->select('users.nama, lembaga.*')
        ->from('lembaga')
        ->join('users', 'lembaga.user_id = users.id', 'left')
        ->where('lembaga.status_pengajuan', 'aktif')
        ->where('lembaga.deleted_at', null)
        ->order_by('lembaga.created_at', 'DESC')->get();
        return $query->result();
    }

    // Get lembaga by ID
    public function get_lembaga_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('lembaga')->row();
    }

    // Get lembaga by NPSN
    public function get_lembaga_by_npsn($npsn) {
        $this->db->where('npsn', $npsn);
        return $this->db->get('lembaga')->row();
    }

    // Get lembaga by user ID
    public function get_lembaga_by_user_id($user_id) {
        $this->db->where('user_id', $user_id)->order_by('created_at', 'DESC')->limit(1);
        return $this->db->get('lembaga')->row();
    }

    // Create new lembaga
    public function create_lembaga($data) {
        $this->db->insert('lembaga', $data);
        return $this->db->insert_id();
    }

    // Update lembaga
    public function update_lembaga($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('lembaga', $data);
    }

    // Delete lembaga
    public function delete_lembaga($id) {
        // First, get the logo filename to delete the file
        $lembaga = $this->get_lembaga_by_id($id);
        if ($lembaga && $lembaga->logo_lembaga !== 'default.png') {
            $logo_path = FCPATH . 'uploads/lembaga/logo/' . $lembaga->logo_lembaga;
            if (file_exists($logo_path)) {
                unlink($logo_path);
            }
        }
        
        // Then delete the record from database
        $this->db->where('id', $id);
        return $this->db->delete('lembaga');
    }

    // Check if NPSN already exists
    public function is_npsn_exists($npsn, $exclude_id = null) {
        $this->db->where('npsn', $npsn);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->get('lembaga')->num_rows() > 0;
    }

    public function get_all_lembaga_aktif_count() {
        return $this->db->get_where('lembaga', ['status_pengajuan' => 'aktif', 'deleted_at' => null])->num_rows();
    }

    
}
