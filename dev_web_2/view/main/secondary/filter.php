<?php
    session_start();
    if(isset($_SESSION['mail']))
    {
        //redirection
        header('location:../member/gestion_photo.php');
        exit();
    }
    require_once'../../classe/user.php';
    require_once'../../classe/article.php';
    require_once'../../classe/page.php';
    require_once'../../classe/photo.php';
    require_once'../../control/define.php';
    
    $pdo = new PDO('mysql:dbname=id5834884_dev_web2;host=localhost','id5834884_dev_web2','held1616wissen');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $page = new Page();
    $article = new Article();
?>
