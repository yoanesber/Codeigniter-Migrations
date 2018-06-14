<<<<<<< HEAD
<H2>Codeigniter - Migrations</H2>
=======
<H2>Ratchet - PHP Websocket</H2>
>>>>>>> faf2851b7ac5b5669b7a1c0cd6df9ab518989466

Migrations are a convenient way for you to alter your database in a structured and organized manner. You could edit fragments of SQL by hand but you would then be responsible for telling other developers that they need to go and run them. You would also have to keep track of which changes need to be run against the production machines next time you deploy.


<<<<<<< HEAD
## Installation
=======
## Intallation
>>>>>>> faf2851b7ac5b5669b7a1c0cd6df9ab518989466

Please see the `migrations section <http://localhost/_Project/HJM_Logistic3/user_guide/libraries/migration.html>`_
of the CodeIgniter User Guide.

1. Set up database's setting file in `application\config\database.php`:
2. Set up Migration's setting file in `application\config\migration.php`:

   ```
   $config['migration_enabled'] = FALSE;
   to
   $config['migration_enabled'] = TRUE;
   ```

   ```
   $config['migration_type'] = '';
   to
   $config['migration_type'] = 'sequential';
   or
   $config['migration_type'] = 'timestamp';

    Notes:
   'sequential' = Sequential migration naming (001_add_blog.php)
   'timestamp'  = Timestamp migration naming (20121031104401_add_blog.php)Use timestamp format YYYYMMDDHHIISS.
   ```

   ```
   $config['migration_auto_latest'] = FALSE;
   to
   $config['migration_auto_latest'] = TRUE;
   
   Notes:
   If this is set to TRUE when you load the migrations class and have
   $config['migration_enabled'] set to TRUE the system will auto migrate
   to your latest migration (whatever $config['migration_version'] is
   set to). This way you do not have to call migrations anywhere else
   in your code to have the latest migration.
   ```

   ```
   $config['migration_version'] = '';
   
   Notes:
   Let the value be empty, so the system will auto migrate to your latest migration.
   ```

3. Create migrations file in `application\migrations\` directory (you must create this folder manually):

   ```
   <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Migration_Add_roles extends CI_Migration {

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
                    ));
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('roles');
            }

            public function down()
            {
                    $this->dbforge->drop_table('roles');
            }
    }
   ```
Save this file as `application\migrations\001_add_roles.php`

4. Create a controller file in `application\controllers\` directory. This file will run your all migrations.

   ```
   <?php
    class Migrate extends CI_Controller
    {
            public function index()
            {
                    $this->load->library('migration');

                    if ($this->migration->latest() === FALSE)
                    {
                            show_error($this->migration->error_string());
            }
            else {
                if(sizeof($this->migration->find_migrations()) > 0){
                    foreach($this->migration->find_migrations() as $f)
                        echo $f . "<br/>";
                }
                else echo "No migration file found!!";
            }
        }
    }
   ```
Save this file as `application\controllers\Migrate.php`

5. Run the Migrate controller on your browser `http://localhost/Codeigniter_Migrations/index.php/Migrate/index`.
6. Next, check your database, whether table roles already created.