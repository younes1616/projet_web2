<?php
     session_start();
    require_once'filter.php';
?>

<Doctype html>
<html>
    <head>
        <?php require_once'../head.php';?>
    </head>
    <body>
        <?php
            require_once'bar/side.php'; 
            require_once'pannel/add_user.html';
        ?>
        <div id="main">
            <a class="btn btn-success mt-2 ml-2 font-weight-bold" data-toggle="modal" data-target="#add_user">add user</a>
            <div class="col-md-10 mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>mail</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>grade</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody id="user_body">
                    
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </body>
</html>
<script>
    function get_all_user()
    {
        var method = 6 ;
        $.ajax({
             url : '../../control/functions.php',
             method : 'post',
             data : {method : method },
             success:function(data)
             {design_user(data);}
         });
    }
    
    function update_user(id,state)
    {
        var method = 7 ;
        $.ajax({
             url : '../../control/functions.php',
             method : 'post',
             data : {method : method , id :id , state : state },
             success:function(data)
             {get_all_user();}
         });
    }
    
    function delete_user(id)
    {
        var method = 8 ;
        $.ajax({
             url : '../../control/functions.php',
             method : 'post',
             data : {method : method , id :id },
             success:function(data)
             {get_all_user();}
         });
    }
    
    function design_user(array)
    {
        var grade='';
        var html = '';
        $.each(JSON.parse(array),function(index,item)
        {
            switch(item['grade'])
            {
                case '2' : grade = 'publicateur' ; break ;
                case '3' : grade = 'editeur' ; break ;
                case '4' : grade = 'graphiste' ; break ;
            }
            html += '<tr>';
            html += '<td>'+item['mail']+'</td>';
            html += '<td>'+item['nom']+'</td>';
            html += '<td>'+item['prenom']+'</td>';
            html += '<td>'+grade+'</td>';
            html += '<td>'+
                        '<button class="btn btn-danger mr-1  delete"  onclick="delete_user('+"'"+item['mail']+"'"+')">delete      </button>'+
                        '<button class="btn btn-warning mr-1 down"    onclick="update_user('+"'"+item['mail']+"'"+',1)">downgrade   </button>'+
                        '<button class="btn btn-primary mr-0 up"      onclick="update_user('+"'"+item['mail']+"'"+',0)">upgrade     </button>'+
                    '</td>';
            html += '</tr>';
        });
        _('user_body').innerHTML = html ;
    }
</script>
<script>
    get_all_user();
</script>