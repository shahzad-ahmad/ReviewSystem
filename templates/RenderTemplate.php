<?php
namespace templates;
class RenderTemplate{

	public static $viewName;
	public static $templateName;

	public static function set($view, $template){
		$viewName = $view;
		$templateName = $template;
	}

	public static function loadPage(){
		require_once(self::$templateName.'/index.php');
	}

}