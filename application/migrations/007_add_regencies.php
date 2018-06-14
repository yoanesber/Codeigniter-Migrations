<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_regencies extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        'province_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => FALSE
                        ),
                        'status' => array(
                                'type' => 'INT',
                                'null' => FALSE,
                                'default' => 1,
                        ),
                        'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
                        'created_by' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'default' => 1,
                                'null' => FALSE,
                        ),
                        'updated_at' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE,
                        ),
                        'updated_by' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => TRUE,
                        ),
                        'FOREIGN KEY (province_id) REFERENCES provinces(id)',
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('regencies');

                //Seeder for regencies
                $data_seeder = array(
                        array('name' => 'Jakarta Barat', 'province_id' => 1),
                        array('name' => 'Jakarta Timur', 'province_id' => 1),
                        array('name' => 'Jakarta Selatan', 'province_id' => 1),
                        array('name' => 'Jakarta Utara', 'province_id' => 1),
                        array('name' => 'Jakarta Pusat', 'province_id' => 1),
                        array('name' => 'Kota Bogor', 'province_id' => 2),
                        array('name' => 'Kabputen Bogor', 'province_id' => 2)
                );
                $this->db->insert_batch('regencies', $data_seeder);
        }

        public function down()
        {
                $this->dbforge->drop_table('regencies');
        }
}