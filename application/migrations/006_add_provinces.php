<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_provinces extends CI_Migration {

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
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('provinces');

                //Seeder for provinces
                $data_seeder = array(
                        array('name' => 'DKI Jakarta'),
                        array('name' => 'Jawa Barat')
                );
                $this->db->insert_batch('provinces', $data_seeder);
        }

        public function down()
        {
                $this->dbforge->drop_table('provinces');
        }
}