<?php
    session_start();
    require_once'filter.php';
    require_once'../../classe/user.php';
    require_once'../../classe/page.php';
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
                    <?php
                        $user_info = $user->existe($pdo,$_SESSION['mail']);  
                        if ($user_info[0]["grade"] == 1)
                            echo '<a class="btn btn-primary  mt-2 mr-2 font-weight-bold float-left" href="gestion_page_creation.php">Ajouter une page</a>
                                <a class="btn btn-danger  mt-2 mr-2 font-weight-bold float-right" id="delete_btn">delete page</a>';
                    ?>
                    
                </div>
            </div>
            <div class="row justify-content-center">
                <?php $page = new Page();echo $page->display_admin($pdo);?>
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
                 $('#page_id_'+$(this).val()).fadeOut(1000);
                console.log(id);
                var method = 45 ;
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