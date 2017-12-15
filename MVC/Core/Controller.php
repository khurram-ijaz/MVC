<?php
/**

 */

require_once 'Model.php';

class Controller
{   
    public $model;
   
    public function __construct($type)
    {   
    	$this->model = Model::makeModel($type);
    }

    public static function makeController($type)
    {
		$controllerName = $type.'Controller';
		require_once '../App/Controllers/'.$controllerName.'.php';
			
		if(class_exists($controllerName))
    	{	
      		return new $controllerName($type);
    	}
	}
   
}