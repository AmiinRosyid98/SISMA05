<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        // Set default values for optional fields
        $user_data = [
            'nama' => $data['nama'],
            'email' => $data['email'],
            'wa' => $data['wa'],
            'kota' => $data['kota'],
            'password' => $data['password'],
            'nama_lembaga' => $data['nama_lembaga'],
            'role' => 'lembaga',
            'status' => 'aktif',
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->db->insert('users', $user_data);
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
    
    public function get_users_by_role($role) {
        return $this->db->get_where('users', ['role' => $role])->result_array();
    }
    
    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_all_users() {
        return $this->db->get_where('users', ['role' => 'lembaga', 'deleted_at' => null])->result_array();
    }
    public function delete_data($id, $table) {
        $this->db->where('id', $id);
        $this->db->update($table, ['deleted_at' => date('Y-m-d H:i:s')]);
        return $this->db->affected_rows() > 0;
    }
    public function edit_data($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows() > 0;
    }
    public function get_all_users_aktif() {
        return $this->db->get_where('users', ['status' => 'aktif', 'role' => 'lembaga', 'deleted_at' => null])->num_rows();
    }   
}
