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
   
}