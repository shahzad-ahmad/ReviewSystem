<?php
namespace app\middleware;
use app\middlewareAcl;
session_start();
//session_destroy();
class Middleware {
	var $acl;
	public function __construct(){
		$this->acl = new Acl();
	}
	public function isAuthentic(){

		isRedirectionApplied();
		//do some authentication
		$is_Auth = $this->acl->isAllowed();
		if($is_Auth)
			return true;
		else return false;
	}
}