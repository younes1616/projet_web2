<?php
class Page_article{
    public function inserer($pdo,$page_id,$ids)
    {
        $query = 'insert into page_article set id_article=? , id_page=? ';
        try{
            $ids = explode(',',$ids[0]);
            foreach($ids as $id)
            {
                $pdo->prepare($query)->execute([$id , $page_id]);
            }
        }catch(Exception $e)
        {
            return false ;
        }
        return true ;
    }

    
    public function delete_articles($pdo,$id)
    {
        $query = 'delete from page_article where id_page='.$id;
        return $pdo->prepare($query)->execute();
    }
    
    
}