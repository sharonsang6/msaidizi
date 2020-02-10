<?php
	require_once '../app/sessionconfig/headersession.php';
	require_once('../api/classfile/class.user.php');
	$user_logout = new USER();
	
	if($auth_user->is_loggedin()!="")
	{
		$auth_user->redirect('account');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$auth_user->doLogout();
		$auth_user->redirect('msaidizi/login.php');
	}
?>