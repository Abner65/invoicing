<?php 
	include_once 'controller/user-controller.php';
	include_once 'config/config.php';
	
	$Controller = new UserController();
	
	if (!isset($_REQUEST['c'])) {
		$Controller->index();
	}else{
		$action= $_REQUEST['c'];
		call_user_func(array($Controller,$action));
	}

 ?>

