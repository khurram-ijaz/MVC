<?php
	 
	/**
	* 
	*/

	require_once '../../MVC/Core/Controller.php';
	Class TeacherController extends Controller
	{
		protected $model;
		public function __construct()
		{	
			$this->model = parent::__construct('TeacherModel');
		}

		public function index()
		{
			echo "index running";
		}

	}
?>