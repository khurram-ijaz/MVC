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
				header('location: index');
			}
			else
			{
				echo "Could not insert!";
			}
		}


		public function edit($id)
		{
			$condition = $id;
			$result = $this->model->selectWhere($this->model, $condition );
			if ($result) 
			{
				require '../App/Views/update_teacher.php';
			}
		}


		public function update($id)
		{
			$this->model->id['id'] = $id;
			$this->model->first_name = $_REQUEST["f_name"];
			$this->model->last_name = $_REQUEST["l_name"];
			$result = $this->model->update($this->model);
			
			if ($result) 
			{
				header('location: ../index');
			}
		}

		public function delete($id)
		{
			$this->model->id['id'] = $id;
			$result = $this->model->delete($this->model);
			if ($result) 
			{
				header('location: ../index');
			}
		}

	}