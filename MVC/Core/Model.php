<?php
	/**
	* 
	*/
	require_once 'database.php';

	class Model
	{
		public function __construct()
		{

		}

		public static function makeModel($type)
		{
			
			$modelname = ucfirst($type);
			require_once '../App/Models/'.$modelname.'.php';
			if(class_exists($modelname))
    		{
      			return new $modelname();
    		}
		}
	}
?>