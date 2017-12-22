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
		public $columnValues = [];

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
			$query = "SELECT * FROM ".$model->table." ";
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
				$this->columnValues[$key] = "'".$model->$key."'";
			}
			$fieldNames = implode("," , array_keys($this->columnValues));
			$fieldValues = implode("," , array_values($this->columnValues));
			$query = "INSERT INTO ".$model->table." (".$fieldNames.") "." VALUES ($fieldValues) ";
			$result = mysqli_query($this->db , $query);
			if (mysqli_affected_rows($this->db)>0) 
			{
				return $result;
			}
		}


		public function selectWhere($model, $condition)
		{
			$query = "SELECT * FROM ".$model->table." WHERE id = ".$condition." ";
			$result = mysqli_query($this->db , $query);
			if (mysqli_num_rows($result) > 0) 
			{
				return $result;
			}
			else
			{
				echo "Could not fetch data";
			}
		}


		public function update($model)
		{	
			$id_key = key($model->id); 
			$condition = $model->id[$id_key];		
			$column_count = count($model->columns);
			$c = 1;
			foreach ($model->columns as $key) 
			{
				$this->columnValues[$key] = "'".$model->$key."'";
			}

			$query = " UPDATE ".$model->table." SET  ";

			foreach ($this->columnValues as $key => $value) 
			{
				$query = $query.$key ."=". $value;
				
				if($c++!= $column_count)
            	{
               		$query = $query ."," ;
            	}
			}

			$query = $query ."WHERE ". $id_key ."=". $condition;
			$result = mysqli_query($this->db , $query);
			if (mysqli_affected_rows($this->db)>0) 
			{
				return $result;
			}
			else
			{
				echo "Could not update";
			}
		}


		public function delete($model)
		{
			$id_key = key($model->id); 
			$condition = $model->id[$id_key];	
			echo "$condition";
			$query = " DELETE FROM ".$model->table." WHERE " .$id_key ."=". $condition ;
			$result = mysqli_query($this->db , $query);
			
			if (mysqli_affected_rows($this->db)>0) 
			{
				return $result;
			}
			else
			{
				echo "Could not delete";
			}
		}


	}