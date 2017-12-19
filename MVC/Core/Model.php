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
		public $result = array();
		public $columnNames = [];

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


		public function selectAll($model)
		{
			$query = "SELECT * FROM ".$model->table."";
			$mysqli_result = mysqli_query($this->db , $query);
			while($row = mysqli_fetch_assoc($mysqli_result))
			{
				$result[] = $row;
			}
			return $result;
		}


		public function insert($model)
		{	
			foreach ($model->columns as $key) 
			{
				$this->columnNames[$key] = "'".$model->$key."'";
			}
			$fieldNames = implode("," , array_keys($this->columnNames));
			$fieldValues = implode("," , array_values($this->columnNames));
			$query = "INSERT INTO ".$model->table." (".$fieldNames.") "." VALUES ($fieldValues) ";
			$result = mysqli_query($this->db , $query);
			if (mysqli_affected_rows($this->db)>0) 
			{
				return $result;
			}
		}

	}