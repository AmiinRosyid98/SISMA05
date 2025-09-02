<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_lembaga_table extends CI_Migration {

    public function up() {
        // Create lembaga table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'npsn' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'unique' => TRUE
            ),
            'nama_lembaga' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'lembaga_naungan' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'status_lembaga' => array(
                'type' => 'ENUM',
                'constraint' => ['NEGERI', 'SWASTA'],
                'default' => 'NEGERI'
            ),
            'pemerintah' => array(
                'type' => 'ENUM',
                'constraint' => ['KOTA', 'KABUPATEN', 'PROVINSI'],
                'default' => 'KOTA'
            ),
            'alamat' => array(
                'type' => 'TEXT'
            ),
            'kabupaten_kota' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'provinsi' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'kode_pos' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => TRUE
            ),
            'telepon' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'website' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'nama_kepala_sekolah' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'nip_nuptk' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'logo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default.png'
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'created_by' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updated_by' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('lembaga');
    }

    public function down() {
        $this->dbforge->drop_table('lembaga');
    }
}
