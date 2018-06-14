<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_menus extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'label' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        'url' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        'parent' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                        ),
                        'order' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'status' => array(
                                'type' => 'INT',
                                'null' => FALSE,
                        ),
                        'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
                        'created_by' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                        ),
                        'updated_at' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'updated_by' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                        ),
                        'FOREIGN KEY (parent) REFERENCES menus(id)'
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('menus');
        }

        public function down()
        {
                $this->dbforge->drop_table('menus');
        }
}