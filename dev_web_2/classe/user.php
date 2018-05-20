<?php
class User{
    public function inserer($pdo,$mail,$nom,$prenom,$password)
    {
        if(empty($this->existe($pdo,$mail)))
        {
            $query = 'insert into user set mail = ? , nom = ? , prenom = ? , password = ?';
            $pdo->prepare($query)->execute([$mail,$nom,$prenom,$password]);
            return true ;
        }
        return false ;
    }
    
    public function delete($pdo,$mail)
    {
        $query = 'update user set deleted = ? where mail = '."'".htmlspecialchars($mail)."'";
        $pdo->prepare($query)->execute([deleted]);
    }
    
    function set_grade($pdo,$mail,$state)
    {
        $query_gruade = 'select grade from user where mail = '."'".htmlspecialchars($mail)."'";
        $grade = $pdo->query($query_gruade)->fetchAll()[0][0];
        if($grade>2 && $state == 0)
            $grade = $grade - 1 ;
        if($grade<4 && $state == 1)
            $grade = $grade + 1 ;
        $query = 'update user set grade=? where mail = '."'".htmlspecialchars($mail)."'";
        $pdo->prepare($query)->execute([$grade]);
    }
    
    
    
    public function login($pdo,$mail,$password)
    {
        $query = 'select * from user where mail = '."'".htmlspecialchars($mail)."'".' and password = '."'".htmlspecialchars($password)."'".' and not deleted ';
        return !empty($pdo->query($query)->fetchAll());
    }
    
    public function existe($pdo,$mail)
    {
        $query = 'select * from user where mail = '."'".$mail."'".' and deleted = '.not_deleted ;
        return $pdo->query($query)->fetchAll();
    }
    
    public function get_all($pdo)
    {
        $query = 'select * from user where not grade = 1 and deleted = '.not_deleted;
        return $pdo->query($query)->fetchAll();
    }

    public function update_profile($pdo,$mail,$nom,$prenom,$description)
    {
        $query = 'update user set nom=? , prenom=? , description=? where mail=?';
        $pdo->prepare($query)->execute([htmlspecialchars($nom),htmlspecialchars($prenom),htmlspecialchars($description),htmlspecialchars($mail)]);
    }
    public function updatePassword($pdo,$user_id,$pass_o,$pass_n,$pass_c)
    {
        if($pass_n==!$pass_c)
            return false ;
        $query = 'update user set password =? where mail=? and password=?';
        $pdo->prepare($query)->execute([$pass_n,$user_id,$pass_o]);
        return true ;
    }
    
    public function update_profile_picture($pdo,$mail,$file)
    {
        $infos = $this->existe($pdo,$mail);
        $allowed_extension = array("jpg","jpeg","png","gif");
        $exploade = explode(".",$file['name']);
        $extension = end($exploade);
        
        if(in_array($extension,$allowed_extension))
        {
            $path = '../picture_profile/'.$infos[0]['id'].'.jpg';
            if(move_uploaded_file($file['tmp_name'],$path))
            {return true ;}
        }
        return false ;
        echo "string";
    }
}
?>