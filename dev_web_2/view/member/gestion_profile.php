<?php
    session_start();
    require_once'filter.php';
    
    $path = '../../picture_profile/'.$infos[0]['id'].'.jpg';
    
    
?>

<Doctype html>
<html>
    <head>
        <?php require_once'../head.php';?>
        <?php //require_once'script/script.html'; ?>
    </head>
    <body>
        <div id="main">
            <?php require_once'pannel/profile-description.php'; ?>
            <?php require_once'pannel/profile-password.php'; ?>
            <div class="d-inline col-md-3 ">
                <button class="btn btn-primary mb-1 mt-2" data-toggle="modal" data-target="#profile-description">
                    <span class="fa fa-plus"></span> Modifier votre infos
                </button>
            </div>
            <div class="d-inline col-md-3 ">
                <button class="btn btn-primary mb-1 mt-2" data-toggle="modal" data-target="#profile-password">
                    <span class="fa fa-plus"></span> Modifier votre password
                </button>
            </div>
            <form action="../../control/functions.php" method="post" class="col-md-3 text-center float-right" enctype="multipart/form-data">
              <h3><?php echo $infos[0]['nom']." ".$infos[0]['prenom']; ?></h3>

                <?php if(file_exists($path))
                {echo '<img src="'.$path.'" alt="" class="d-block img-fluid mb-3">';}?>

              <button class="btn btn-primary btn-block hvr-icon-buzz-out-image" type="button" onclick="_('file').click()">Changer l'image</button>
              <input class="fade" type="file" name="file" id="file">
              <button type="submit" name="method" value="48" class="btn btn-danger btn-block hvr-icon-buzz-out-cancel">valider</button>
              <label>Description</label>
              <p><?php echo $infos[0]['description'];?></p>
            </form >
            
            <!-- here the page content begin  -->
            
        </div>
        <?php require_once'bar/side.php'; ?>
    </body>
</html>