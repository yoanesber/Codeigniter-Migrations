<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_menus extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                        ),
                        'menu_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
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
                        'FOREIGN KEY (user_id) REFERENCES users(id)',
                        'FOREIGN KEY (menu_id) REFERENCES menus(id)',
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('user_menus');
        }

        public function down()
        {
                $this->dbforge->drop_table('user_menus');
        }
}