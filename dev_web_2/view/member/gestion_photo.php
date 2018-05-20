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
            <div class="col-10 offset-1">
                <a class="btn btn-success mt-2 ml-2 font-weight-bold" data-toggle="modal" data-target="#upload_pannel">upload images</a>
                <a class="btn btn-danger  mt-2 mr-2 font-weight-bold float-right" id="delete_btn">delete images</a>
            </div>
            <br/>
            <div class="row justify-content-center">
                <?php 
                    require_once'pannel/upload.php'; 
                    $photo = new Photo(); echo $photo->display($pdo,1);
                ?>
            </div>
        </div>
        <?php require_once'bar/side.php'; ?>
    </body>
</html>
    
    
<script>
    $('document').ready(function(){
        $('#delete_btn').on('click',function(){
            var id = [];
             $(':checkbox:checked').each(function(i){
                id[i] = $(this).val(); 
                 $('#photo_id_'+$(this).val()).fadeOut(1000);
                console.log(id);
                var method = 5 ;
                 $.ajax({
                     url : '../../control/functions.php',
                     method : 'post',
                     data : {method : method , id :id },
                     success:function(data)
                     {console.log(data);}
                     
                 });
             });
        });
    });
</script>