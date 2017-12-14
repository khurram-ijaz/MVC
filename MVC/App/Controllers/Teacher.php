<?php
	 
	/**
	* 
	*/
	require_once '../../MVC/Core/Controller.php';
	Class Teacher extends Controller
	{
		public $model;

		public function __construct()
		{	
			$this->model = parent::__construct('TeacherModel');
		}

		public function index()
		{
			echo "index running \n";
		}

	}
?>