<?php
	if(!isset($_SESSION['mail']))
	{
		header('location:../main/');
		exit();
	}
	
	require_once'../../classe/user.php';
    require_once'../../classe/page.php';
    require_once'../../classe/article.php';
    require_once'../../classe/photo.php';
    require_once'../../control/define.php';
	$user = new User();
	$pdo = new PDO('mysql:dbname=id5834884_dev_web2;host=localhost','id5834884_dev_web2','held1616wissen');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$infos = $user->existe($pdo,$_SESSION['mail']);
?>