<?php
/**

 */
require_once 'Model.php';

class Controller
{   
    public $model;
   
    public function __construct($type)
    {   
    	return $this->model = Model::makeModel($type);
    }

    public static function makeController($type)
    {
    	if ($modeltype = stristr($type,"controller", true)) 
    	{
    		require_once '../App/Controllers/'.$type.'.php';
    		if(class_exists($type))
    		{	
      			return new $type($modeltype);
    		}
    	}

    	else
    	{
    		$controllerName = $type.'Controller';
			require_once '../App/Controllers/'.$controllerName.'.php';
			
			if(class_exists($controllerName))
    		{	
      			return new $controllerName($type);
    		}
    	}
	}
   
}