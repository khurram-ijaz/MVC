<?php
	/**
	* 
	*/
	require_once 'database.php';

	class Model
	{
		public $db;
		public $table;
		public $columns = array();

		public function __construct()
		{
			$this->db = Database::getInstance()->getConnection();
		}


		public static function makeModel($type)
		{
			$modelname = ucfirst($type);
			require_once '../App/Models/'.$modelname.'.php';
			if(class_exists($modelname))
    		{	
      			return new $modelname();
    		}
		}

		// public function selectAll($model)
		// {
		// 	// $this->db->table = $model->table;
		// 	$query = "SELECT * FROM $model->table";
		// 	$result = mysqli_query($this->db , $query);
		// 	while($row = mysqli_fetch_assoc($res))
		// 	{
		// 		echo $row['first_name']."\t " ;
		// 		echo $row['last_name']. "<br>";
		// 	}

		// }

	}
?>