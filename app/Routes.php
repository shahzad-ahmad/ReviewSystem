<?php 
namespace app;

class Routes {

	var $urlArray; 
	var $urlApiArray;

	public function __construct(){
		$urlArray = array();
		$urlApiArray = array();
	}

	public function addUrl($url, $controller, $func){
		$this->urlArray[$url] = array('controller'=>$controller, 'function' => $func )	;	
	}

	public function addAPIUrl($url, $controller, $func){
		$this->urlApiArray[$url] = array('controller'=>$controller, 'function' => $func )	;	
	}

	public function getUrlApiArray(){
		return $this->urlApiArray;
	}
	public function dispatch($base_url , $server_obj){
		if(array_key_exists($base_url, $this->urlArray) ){
			$cont =  $this->urlArray[$base_url]['controller'];
			$function =  $this->urlArray[$base_url]['function'];
			$dir_lang_path = __DIR__.'/views/languages/'.CURRENT_LANGUAGE.'/'.$cont.'.php' ;
			
			if( file_exists($dir_lang_path) )
				require_once($dir_lang_path);
			$cont =  $cont.'Controller';
			$class = "app\\controllers\\".$cont;
			$controller= new $class();
			$controller->$function();
		}else if(array_key_exists($base_url, $this->urlApiArray) ){
			$cont =  $this->urlApiArray[$base_url]['controller'];
			$function =  $this->urlApiArray[$base_url]['function'];
			
			$cont =  $cont.'Controller';
			$class = "app\\api\\oAuth2\\controller\\".$cont;
			$controller= new $class($server_obj);
			$controller->$function();
		}
		else{		
			echo "<title>Error page</title>";
			echo "Error page loading...!!!";
			
		}
	}
}