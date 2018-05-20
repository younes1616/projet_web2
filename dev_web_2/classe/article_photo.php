<?php
class Article_photo{
    
    public function insrer($pdo,$article_id,$ids)
    {
        $ids = explode(",",$ids);
        if(empty($ids[0]))
            return false ;
        $query = 'insert into article_photo set article_id=? , photo_id=? ';
        foreach($ids as $id)
        {
            
            $pdo->prepare($query)->execute([$article_id,$id]);
        }
        
    }
}

?>