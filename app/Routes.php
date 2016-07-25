<?php 
namespace app;

class Routes {

	var $url_array; 

	public function __construct(){
		$url_array = array();
	}

	public function addUrl($url, $controller, $func){
		$this->url_array[$url] = array('controller'=>$controller, 'function' => $func )	;	
	}

	public function dispatch($base_url){
		if(array_key_exists($base_url, $this->url_array) ){
			$cont =  $this->url_array[$base_url]['controller'];
			$function =  $this->url_array[$base_url]['function'];
			$cont =  $cont.'Controller';
			$class = "app\\controllers\\".$cont;
			$controller= new $class();
			$controller->$function();
		}else{		
			echo "<title>Error page</title>";
			echo "Error page loading...!!!";
			
		}
	}
}