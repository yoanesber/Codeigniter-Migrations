<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_districts extends CI_Migration {

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
                        'regency_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => FALSE
                        ),
                        'postal_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'null' => TRUE,
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
                        'FOREIGN KEY (regency_id) REFERENCES regencies(id)',
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('districts');

                //Seeder for districts
                $data_seeder = array(
                        array('name' => 'Cilincing', 'regency_id' => 4, 'postal_code' => '14120'),
                        array('name' => 'Semper Timur', 'regency_id' => 4, 'postal_code' => '14130'),
                );
                $this->db->insert_batch('districts', $data_seeder);
        }

        public function down()
        {
                $this->dbforge->drop_table('districts');
        }
}