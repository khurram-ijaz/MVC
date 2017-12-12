<?php
/**

 */
require_once 'Model.php';
class Controller
{   public $modelname;
    public function __construct($type)
    {   
        $this->modelname = $type;
        // die($this->modelname);
        return Model::makeModel($this->modelname);
    }
   
}