<?php

/**
* 
*/
require_once '../../MVC/Core/Model.php';

class Teacher extends Model
{
	public $first_name;
	public $last_name;
	
	public function __construct()
	{
		echo "Model object \n";
		parent::__construct();
		$this->table = 'teachers';
		$this->columns = array('first_name' , 'last_name');
	}
}