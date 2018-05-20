<?php
    session_start();
    require_once'../classe/user.php';
    require_once'../classe/page.php';
    require_once'../classe/page_article.php';
    require_once'../classe/photo.php';
    require_once'../classe/article.php';
    require_once'../classe/article_photo.php';
    require_once'define.php';
    
    
    $pdo = new PDO('mysql:dbname=id5834884_dev_web2;host=localhost','id5834884_dev_web2','held1616wissen');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['method']))
    {
        switch($_POST['method'])
        {
            //0
            case login :if( isset($_POST['mail']) && isset($_POST['password']) )
            {
                $continue = login($pdo, $_POST['mail'] , $_POST['password'] );
                if($continue)
                    $_SESSION['mail'] = $_POST['mail'];
            }
            header('location:../view/member/gestion_profile.php');
            exit;break;
              
            //1
            case create_account :if(isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']))
            {
                $continue = create_account($pdo,$_POST['mail'],$_POST['nom'],$_POST['prenom'],$_POST['password']);
                if($continue)
                    $_SESSION['mail'] = $_POST['mail'];
            }   
            header('location:../view/member/gestion_user.php');
            exit;break;
               
            //2
            case create_page :if(isset($_POST['nom']) && isset($_POST['description']) )
            {
                $id = create_page($pdo,$_POST['nom'],$_POST['description']);  
                header('location:../view/member/gestion_page_modification.php?id='.$id);
                exit();
            }  
            header('location:../view/member/gestion_page.php');
            exit;break;
                
            //3
            case upload :if(isset($_FILES['file']))
            {
                upload();
            }
            header('location:../view/member/gestion_photo.php');
            exit;break;
                
            //4
            case poster_article :if( isset($_POST['titre']) && isset($_POST['text']) && isset($_POST['ids']) )
            {
                poster_article($_POST['titre'],$_POST['text'],$_POST['ids']['0']);
            }
            header('location:../view/member/gestion_article.php');
            exit;break;
                
            //5
            case delete_photo :if(isset($_POST['id']))
            {
                delete_photo($_POST['id']);
            }
            exit;break;
               
            //6
            case get_all_user :
            {
                print_r(json_encode(get_all_user()));
            }
            exit;break;
                
            //7
            case update_user :if( isset($_POST['id']) && isset($_POST['state']) )
            {
                update_user($_POST['id'],$_POST['state']);
            }
            exit;break;
            
            //8
            case delete_user :if(isset($_POST['id']))
            {
                delete_user($_POST['id']);
            }
            exit;break;
                
            //9
            case ajouter_poste_page : if( isset($_POST['page_id']) && isset($_POST['ids']) )
            {
                ajouter_poste_page($pdo,$_POST['page_id'],$_POST['ids']);
            }
            header('location:../view/member/gestion_page.php');
            exit();break;

            //45
            case delete_page :if(isset($_POST['id']) )
            {
                delete_page($pdo, $_POST['id'] );
            }
            exit;break;
            
            //46
            case delete_article :if(isset($_POST['id']) )
            {
                delete_article($pdo, $_POST['id'] );
            }
            exit;break;
            
            //47
            case update_profile_password :if(isset($_POST['passwordo']) && isset($_POST['passwordn']) && isset($_POST['passwordc']) )
            {
                update_profile_password($pdo,$_SESSION['mail'],$_POST['passwordo'] , $_POST['passwordn'], $_POST['passwordc'] );
            }
            header('location:../view/member/gestion_profile.php');
            exit;break;
            //48
            case update_profile_picture :if(isset($_FILES['file']))
            {
                update_profile_picture($pdo,$_SESSION['mail'],$_FILES['file']);
            }
            header('location:../view/member/gestion_profile.php');
            exit;break;
            
            //49
            case update_profile :if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['description']))
            {
                update_profile($pdo,$_SESSION['mail'],$_POST['nom'],$_POST['prenom'],$_POST['description']);
            }
            header('location:../view/member/gestion_profile.php');
            exit;break;
            //50
            case logout :
            header('location:../view/main/index.php');
            logout();
            exit;break;
        }
    }

    function login($pdo,$mail,$password)
    {
        $user = new User();
        return $user->login($pdo,$mail,$password);
    }
    function create_account($pdo,$mail,$nom,$prenom,$password)
    {
        $user = new User();
        return $user->inserer($pdo,$mail,$nom,$prenom,$password);
    }
    function create_page($pdo,$nom,$description)
    {
        $page = new Page();
        return $page->inserer($pdo,$nom,$description);
    }
    function poster_article($titre,$text,$ids)
    {
        global $pdo ;
        $article = new Article();
        $article->inserer($pdo,$titre,$text,$ids);
    }
    function upload()
    {
        global $pdo;
        global  $_FILES ;
        $file = $_FILES['file'] ;
        $photo = new Photo();
        for($i=0 ; $i < count($file['name']) ; $i++ )
        {
            $photo->inserer($pdo,$file['name'][$i],$file['tmp_name'][$i],$file['size'][$i]);
        }
    }
    function delete_photo($ids)
    {
        global $pdo ;
        $photo = new Photo();
        foreach($ids as $id)
        {
            $photo->delete($pdo,$id);
        }
    }
    function get_all_user()
    {
        global $pdo ;
        $user = new User();
        return $user->get_all($pdo);
    }
    function update_user($mail,$state)
    {
        global $pdo ;
        $user = new User();
        $user->set_grade($pdo,$mail,$state);
    }
    function delete_user($mail)
    {
        global $pdo ;
        $user = new User();
        $user->delete($pdo,$mail);
    }
    //9
    function ajouter_poste_page($pdo,$page_id,$ids)
    {
        $page_article = new Page_article();
        $page_article->delete_articles($pdo,$page_id);
        $page_article->inserer($pdo,$page_id,$ids);
    }
    //45
    function delete_page($pdo, $ids )
    {
        $page = new Page();
        foreach($ids as $id)
        {
            $page->delete($pdo,$id);
        }
    }
    //46
    function delete_article($pdo, $ids )
    {
        $article = new Article();
        foreach($ids as $id)
        {
            $article->delete($pdo,$id);
        }
    }
    function update_profile_password($pdo,$user_id,$pass_o,$pass_n,$pass_c)
    {
        $user = new User();
        $user->updatePassword($pdo,$user_id,$pass_o,$pass_n,$pass_c); 

    }
    function update_profile_picture($pdo,$mail,$file)
    {
        $user = new User();
        $user->update_profile_picture($pdo,$mail,$file);
    }
    function update_profile($pdo,$mail,$nom,$prenom,$description)
    {
        $user = new User();
        $user->update_profile($pdo,$mail,$nom,$prenom,$description);
    }
    function logout()
    {
        global $_SESSION ;
        unset($_SESSION['mail']);
    }

    
    