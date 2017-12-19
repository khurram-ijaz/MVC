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
			$results = $this->model->selectAll($this->model);
			foreach ($results as $column => $value) 
			{
			 	foreach ($value as $key => $data) 
			 	{
			 		if(isset($key)) 
			 		{
			 			echo $data . ",";
			 		}
			 	}
				echo "<br>";
			}
		}


		public function create()
		{
			require '../App/Views/teacher.php';
		}


		public function store()
		{
			$this->model->first_name = $_REQUEST["f_name"];
			$this->model->last_name = $_REQUEST["l_name"];
			
			$result = $this->model->insert($this->model);

			if($result)
			{
				echo "Successfully inserted";
			}
			else
			{
				echo "Could not insert!";
			}
		}

	}