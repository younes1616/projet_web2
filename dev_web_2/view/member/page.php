<?php
    session_start();
     require_once'filter.php';
     $page = new Page();
     
     if(!isset($_GET['id']))
        header('location:gestio_page.php');
    if(!isset($page->existe($pdo,$_GET['id'])[0]))
        header('location:gestio_page.php');
     $page_infos = $page->existe($pdo,$_GET['id']);
        
?>
<Doctype html>
<html>
    <head>
        <?php require_once'../head.php';?>
        <?php require_once'bar/side.php';?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Example Page - Webflow Template</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Webflow" name="generator">
        <link href="../Example Page - Webflow Template_files/template-tokyo.webflow.08028cc60.css" rel="stylesheet" type="text/css">
        <script src="../Example Page - Webflow Template_files/webfont.js.téléchargement"></script>
        <link rel="stylesheet" href="../Example Page - Webflow Template_files/css">
        <script type="text/javascript">WebFont.load({
            google: {
                families: ["Montserrat:400,700","Roboto:300,regular,500"]
              }
            });
        </script>
        <script src="./Example Page - Webflow Template_files/modernizr-2.7.1.js.téléchargement" type="text/javascript"></script>
    </head>
    <body style="background-image:url('picture/');width:100%;height:100%;">
        <!-- header -->
        <div class="section" id="main">
        <div class="w-container">
            <div class="content-wrapper w-dyn-list">
                <div class="w-dyn-items">
                    <div class="header-section">
                        <div class="w-container">
                            <div class="blog-home-link w-inline-block w--current">
                                <h1 class="blog-name"><?php echo $page_infos[0]['nom'] ?> </h1>
                                
                                <p class="blog-content"><?php echo $page_infos[0]['description'] ?> </p>
                            </div>
                            <div class="navigation-bar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- here the page content begin  -->
        <diV class="container">
            <h2 class="row justify-content-center"></h2>
            <?php $article = new Article(); echo $article->display_client_theme($pdo,$_GET['id']);?>
        </diV>
        <div class="footer">
        <div class="w-container">
            <div>
                <a class="social-icon-link w-inline-block" href="#">
                    <div src="" width="20">
                </a>
                <a class="social-icon-link w-inline-block" href="#">
                    <div src="" width="20">
                </a>
                <a class="social-icon-link w-inline-block" href="#">
                    <div src="" width="20">
                </a>
            </div>
            <div class="footer-text">Powered by Webflow</div>
        </div>
    </div>
            
    </body>
</html>