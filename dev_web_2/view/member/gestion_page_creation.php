<?php
    session_start();
    require_once'filter.php';
    require_once'../../classe/user.php';
    require_once'../../classe/photo.php';
    require_once'../../control/define.php';
    
?>

<Doctype html>
<html>
    <head>
        <?php require_once'../head.php';?>
    </head>
    <body>
        <div id="main">
            <!-- here the page content begin  -->
            <form class="container" action="../../control/functions.php" method="post">
                <input class="fade" name="method" value="2">
                <h3 class="my-2">First step :</h3>
                <input name="nom" class="form-control my-2" placeholder="nom de la page">
                <textarea name="description" class="form-control my-2" placeholder="description de la page"></textarea>
                <label class="form-control border border-0">Choisissier le theme :</label>
                
                
                <input class="btn btn-block my-3 btn-primary" type="submit" value="Suivant >">
            </form>
            <br/>
            
        </div>
        <?php require_once'bar/side.php'; ?>
    </body>
</html>