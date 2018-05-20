<?php
    session_start();
    require_once'filter.php';
    require_once'../../classe/user.php';
    require_once'../../classe/article.php';
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
            <div class="row">
                <div class="col-10 offset-1">
                    <a class="btn btn-success mt-2 ml-2 font-weight-bold" href="gestion_article.php" >editer article</a>
                    <a class="btn btn-danger  mt-2 mr-2 font-weight-bold float-right" id="delete_btn">delete article</a>
                </div>
            </div>
            <br/>
            <div class="row justify-content-center">
                <?php 
                    $article = new Article(); echo $article->display_admin($pdo);
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
                 $('#article_id_'+$(this).val()).fadeOut(1000);
                console.log(id);
                var method = 46 ;
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