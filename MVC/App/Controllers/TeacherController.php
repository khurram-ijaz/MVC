<?php
	 
	/**
	* 
	*/
	require_once '../../MVC/Core/Controller.php';

	Class TeacherController extends Controller
	{
		public $model;

		public function __construct($type)
		{	
			echo "Controller object \n";
			$this->model = parent::__construct($type);
		}

		public function index()
		{
			echo "index running \n";

			$results = $this->model->selectAll($this->model);
			foreach ($results as $column => $value) 
			{
			 	// echo "Column=" . $column. " Value=" .$value. ",<br />";
			 	foreach ($value as $key => $data) 
			 	{
			 		if(isset($key)) 
			 		{
			 			echo $data . ",";
			 		}
			 	}
				echo "<br />";
			}
		}

	}
?>