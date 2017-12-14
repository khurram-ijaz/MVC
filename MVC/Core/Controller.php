<?php
/**

 */

require_once 'Model.php';

class Controller
{   
    public $model;
    public $controller;

    public function __construct($type)
    {   
    	$this->model = Model::makeModel($type);
    	
    	$class = $type.'Controller';
		return $this->controller = self::makeController($class);
    }

    public static function makeController($type)
    {
		$controllerName = ucfirst($type);
		require_once '../App/Controllers/'.$controllerName.'.php';
			
		if(class_exists($controllerName))
    	{	
      		return new $controllerName();
    	}
	}
   
}