<?php
	 
	/**
	* 
	*/
	require_once '../../MVC/Core/Controller.php';
	Class Teacher extends Controller
	{
		protected $model;
		public function __construct()
		{	
			$this->model = parent::__construct('Teacher');
		}

		public function index()
		{
			echo "index running";
		}

	}
?>