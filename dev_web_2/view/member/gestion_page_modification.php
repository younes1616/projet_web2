<?php
    session_start();
    require_once'filter.php';
    require_once'../../classe/user.php';
    require_once'../../classe/page.php';
    require_once'../../classe/photo.php';
    require_once'../../classe/article.php';
    require_once'../../control/define.php';
    $page = new Page();
    if(!isset($_GET['id']) or empty($_GET['id']))
        header('location:gestion_page.php');
    if(!isset($page->existe($pdo,$_GET['id'])[0]))
        header('location:index.php');
    $page_infos = $page->existe($pdo,$_GET['id']);
    $page_article_ids = $page->page_article_ids($pdo,$_GET['id']);
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
                <input class="fade" name="method" value="9">

                <h3 class="my-2">Choisissez les articles a metre dans cette page :</h3>
                <input type="text" class="fade" name="page_id" value="<?php echo $page_infos[0]['id'] ?>">
                <input type="text" class="fade" id="ids" name="ids[]" value="">
                <input name="nom" class="form-control my-2" placeholder="nom de la page" value="<?php echo $page_infos[0]['nom'] ?>" readonly>
                <textarea name="description" class="form-control my-2" placeholder="description de la page" readonly><?php echo $page_infos[0]['description'] ?></textarea>
                <label class="form-control border border-0">Choisissier le theme :</label>
                
                <div class="row justify-content-center">
                    <?php 
                        $article = new Article(); echo $article->display_admin($pdo);
                    ?>
                </div>
                <input class="btn btn-block my-3 btn-primary" type="submit" value="Suivant >">
            </form>
            <br/>
            
        </div>
        <?php require_once'bar/side.php'; ?>
    </body>
</html>
    
<script>
    var article_ids = JSON.stringify(<?php print_r(json_encode($page_article_ids ));?>);
    var id = [];

    $('document').ready(function(){
        $(':checkbox').on('change',function(){
            id=[];
            $(':checkbox:checked').each(function(i){ id[i] = $(this).val(); });
            $('#ids').val(id) ;
            console.log(id);
        });
        var i=0;
        $.each(JSON.parse(article_ids),function(index,item)
        {

            console.log($('#checkbox_id_'+item['id_article'])[0].checked=true);
            id[i]= item['id_article']  ;
            $('#ids').val(id) ;
            i++;
        });
    });
</script>