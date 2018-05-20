<?php require_once'secondary/filter.php';?>
<Doctype html>
<html>
    <head>
        <?php require_once'../head.php';?>
    </head>
    <body>
        <?php require_once'secondary/nav.html';?>
        <div class="mt-4">
            <h2 class="row justify-content-center pt-3">Menu</h2>
            <div class="container row justify-content-center">
                <?php echo $page->display_client($pdo); ?>
            </div>
        </div>
            
    </body>
</html>