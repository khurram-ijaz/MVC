<?php
	 
	/**
	* 
	*/
	require_once '../../MVC/Core/Controller.php';
	Class TeacherController extends Controller
	{
		public $model;

		public function __construct()
		{	
			//$this->model = parent::__construct('TeacherModel');
			echo "Controller object \n";
		}

		public function index()
		{
			echo "index running \n";
			// $result = $this->model->selectAll($this->model);
			// echo "$result";
			// print_r($result);
		}

	}
?>