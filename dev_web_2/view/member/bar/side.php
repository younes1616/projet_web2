<?php $user_info = $user->existe($pdo,$_SESSION['mail']);  ?>
<div id="sidebar" class="visible shadow">
    <ul>
        <li class="tag_name"><span class="desc" > <?php echo $infos[0]['nom'].' '.$infos[0]['prenom'];  ?></span></li>
        <li><a href="gestion_profile.php"><span class="fa fa-user"></span><span class="desc">     Profile</span></a></li>
        <li><a href="gestion_page.php"   ><span class="fa fa-flag"  ></span><span class="desc"> Page   </span></a></li>
        
        <?php if($user_info[0]["grade"]<4 )
            echo '<li><a href="gestion_article.php"><span class="fa fa-pencil"></span><span class="desc"> Editer article </span></a></li>
            <li><a href="gestion_articles.php"><span class="fa fa-pencil"></span><span class="desc"> gestion articles </span></a></li>';
        ?>
        <li><a href="gestion_photo.php"  ><span class="fa fa-folder"></span><span class="desc"> galerie</span></a></li>

        <?php if ($user_info[0]["grade"] == 1)
            echo '<li><a href="gestion_user.php"   ><span class="fa fa-cog"   ></span><span class="desc"> Gestion user</span></a></li>';
        ?>
        <form action="../../control/functions.php" method="post">
            <li class="nav-item ">
                <button style="width: 100%;" name="method" value="50" type="submit"><span class="fa fa-signin"></span><span class="desc">logout</span></button>
            </li>
        </form>
    </ul>
</div>
        
	

	