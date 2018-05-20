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
            <br/>
            <div class="row">
                <div class="col-md-3 shadow" id="second">
                    <div class="scrollable" style="height:590px">
                        <?php $photo = new Photo(); echo $photo->display2($pdo,1); ?>
                    </div>
                </div>
                <form class="col-md-8 bg-dark" method="post" action="../../control/functions.php">
                    <input class="form-control mt-2 fade"   name="method" value="4"/>
                    <input class="form-control mt-2"        name="titre" placeholder="titre" />
                    <textarea class="form-control mt-2"     name="text" placeholder="text" ></textarea>
                    <input class="form-control mt-2 fade"   name="ids[]" id="ids" value=""/>
                    <input type="submit" class="btn btn-block mt-2" />
                </form>
            </div>
        </div>
        <?php require_once'bar/side.php'; ?>
    </body>
</html>
    
    
<script>
    $('document').ready(function(){
        $(':checkbox').on('change',function(){
            var id = [];
            $(':checkbox:checked').each(function(i){ id[i] = $(this).val(); });
            $('#ids').val(id) ;
        });
    });
</script>