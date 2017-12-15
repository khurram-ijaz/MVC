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
			// $result = $this->model->selectAll($this->model);
			// echo "$result";
			// print_r($result);
		}

	}
?>