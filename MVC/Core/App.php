<?php
	/**
	* 
	*/

	class App
	{
		protected $controller = "teacher" ;
		protected $method = "index" ;
		protected $params = array();


		public function __construct()
		{
			
			$url = $this->parseUrl();
			if (file_exists('../App/Controllers/'. ucfirst($url[0]) . '.php')) 
			{
				$this->controller = ucfirst($url[0]);
				unset($url[0]);
			}

			//require_once '../App/Controllers/'.$this->controller.'.php';
			require_once 'Controller.php';
			//die("In app.php");
			$this->controller = new Controller($this->controller);


			if(isset($url[1]))
        	{
            	if(method_exists($this->controller, $url[1]))
            	{
                	$this->method=$url[1];
                	unset($url[1]);
            	}
            	// else
            	// {
            	// 	echo "Method not found in controller";
            	// }
        	}


        	$this->params= $url ? array_values($url) : [];
        	call_user_func_array([$this->controller, $this->method], $this->params);
		}

		public function parseUrl()
		{
			if (isset($_GET['url']))
			{
				return $url = explode('/', filter_var(rtrim($_GET['url']), FILTER_SANITIZE_URL ));
			}
		}
	}
?>