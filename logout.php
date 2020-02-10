<?php require_once 'header/header.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php

	require_once 'app/sessionconfig/session.php';
	require_once 'api/classfile/class.user.php';

	// $auth_user = new USER();
	
	if($auth_user->is_loggedin()!="")
	{
		$auth_user->redirect('home');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$auth_user->doLogout();
		$auth_user->redirect('../msaidizi/login.php');
	}
