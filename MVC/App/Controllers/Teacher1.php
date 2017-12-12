<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors' , 1);
	require_once '../../Core/database.php';
	class Teacher {

		public function index() 
		{
			$con = Database::getInstance()->getConnection();
			$query = "SELECT * FROM `teachers`";
			$res = mysqli_query($con,$query);
			while($row = mysqli_fetch_assoc($res))
			{
				echo $row['first_name']."\t " ;
				echo $row['last_name']. "<br>";
			}
		}


		public function create()
		{
			include '../App/Views/teacher.php';
		}


		public function store()
		{
			$con = Database::getInstance()->getConnection();
			die("$con");
			$fname = $_POST['f_name'];
			$lname = $_POST['l_name'];
			$query = "INSERT INTO `teachers` (`first_name`, `last_name`) VALUES ('$fname' , '$lname') ";

			$res = mysqli_query($con, $query);
			if (mysqli_affected_rows($con) > 0) {
			 	echo "Teacher added successfully";
			}

			else{
				echo "Error occured";
			} 
		}


	}
?>