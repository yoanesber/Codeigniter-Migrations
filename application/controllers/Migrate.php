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