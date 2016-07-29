<?php
namespace templates;
class RenderTemplate{

	public static $viewName;
	public static $templateName;

	public static function set($view, $template){
		$viewName = $view;
		$templateName = $template;
	}

	public static function loadPage($list_customer_html_param = null){
		$list_customer_html = $list_customer_html_param;
		
		require_once(self::$templateName.'/index.php');
	}

}