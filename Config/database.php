<?php 
class DATABASE_CONFIG {

	/*public $development = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '3Lma91c0',
		'database' => 'mailer',
		'prefix' => '',
		'encoding' => 'utf8',
	);*/
	
	public $development = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'c21_www',
		'password' => '2doKvQPunI',
		'database' => 'c21_www',
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
	public $production = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost', //'192.168.1.20',
		'login' => 'mailer',
		'password' => 'cQiEaHNKvdwDKhdQB3zw9K0SDmyzW1JL', //'G1S53rw3r',
		'database' => 'mailer',
		'prefix' => '',
		'encoding' => 'utf8',
	);

	function __construct() { 
//         $this->default = ($_SERVER['SERVER_ADDR'] == '127.0.0.1') ? $this->development : $this->production; 
		$this->default = $this->development;
	} 
    
    function DATABASE_CONFIG() { 
        $this->__construct(); 
    } 
}
