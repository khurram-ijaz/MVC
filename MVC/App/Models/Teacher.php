<?php
	/**
	* 
	*/
	require_once '../../MVC/Core/Model.php';
	class Teacher extends Model
	{
		// public $first_name;
		// public $last_name;


		public function __construct()
		{
			echo "New object";
			// $this->table = 'Teachers';
			// $this->columns = array('first_name' , 'last_name');

		}
	}
?>