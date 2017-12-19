<?php
	/**
	* 
	*/
	require_once '../config/config.php';
	class Database
	{	
		private $connect;
		public static $instance;
		
		function __construct()
		{
			$this->connect = mysqli_connect(Config::$host, Config::$username, 
				Config::$password, Config::$database);
			
			if (self::$instance->connect_error) 
			{
				die("Connection failed" . self::$instance->connect_error);
			}	

			//echo "Connection created successfully";
		}

		public static function getInstance()
		{
			if (self::$instance == null) 
			{
				self::$instance = new Database();
			}

			return self::$instance;
		}

		public function getConnection() {
		return $this->connect;
		}
	}
?>