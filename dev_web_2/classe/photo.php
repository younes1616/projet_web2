<?php
class Photo{
    
    public function inserer($pdo,$nom,$tmp_nom,$size)
    {
        if($size>5000000)
            return false ;
        
        $allowed_extension = array("jpg","jpeg","png","gif");
        $exploade = explode(".",$nom);
        $extension = end($exploade);
        
        $query = 'insert into photo set page_id = ? , nom = ? ';
        
        if(in_array($extension,$allowed_extension))
        {
            $pdo->prepare($query)->execute([1,$nom]);
            $path = '../picture/';
            if(move_uploaded_file($tmp_nom,$path.$pdo->LastInsertId().'.jpg'))
            {return true ;}
        }
        return false ;
        
    }
    
    public function delete($pdo,$id)
    {
        $path = '../picture/'.$id.'.jpg';
        try{
            if(file_exists($path))
            {
                $query = 'delete from photo where id = ?';
                $pdo->prepare($query)->execute([$id]);
                unlink($path);
            }else return false ;
        }catch(Exception $e){return false;}
        return true ;
    }
    
    public function display($pdo,$page_id)
    {
        //var_dump(getcwd());
        $path = '../../picture/';
        $html = '';
        $query = 'select * from photo ';
        $photos = $pdo->query($query)->fetchAll();
        foreach($photos as $photo)
        {
            $html .=    '<div class="card col-md-3 col-12 my-2 mx-2 p-0" id="photo_id_'.$photo['id'].'"> 
                            <div class="card-header">
                                <input type="checkbox" name="images[]" value="'.$photo['id'].'"/>
                            </div>
                            <div class="card-body">
                                <a href="'.$path.$photo['id'].'.jpg" ><img src="'.$path.$photo['id'].'.jpg"></a>
                            </div>
                        </div>';
        }
        return $html ;
    }
    
    public function display2($pdo,$page_id)
    {
        //var_dump(getcwd());
        $path = '../../picture/';
        $html = '';
        $query = 'select * from photo where page_id = '.$page_id;
        $photos = $pdo->query($query)->fetchAll();
        foreach($photos as $photo)
        {
            $html .=    '<div class="card col-10 offset-1 my-2 mx-2 p-0" id="photo_id_'.$photo['id'].'"> 
                            <div class="card-header">
                                <input type="checkbox" name="images[]" value="'.$photo['id'].'"/>
                            </div>
                            <div class="card-body">
                                <a href="'.$path.$photo['id'].'.jpg" ><img src="'.$path.$photo['id'].'.jpg"></a>
                            </div>
                        </div>';
        }
        return $html ;
    }
    public function first($pdo,$article_id)
    {
        $query = 'select * from article_photo where article_id = '.$article_id ;
        $photos = $pdo->query($query)->fetchAll();
        if(!empty($photos[0]['photo_id']))
            return $photos[0]['photo_id'];
        return -1 ;
    
    }
    
    public function display_slide($photos,$id)
    {
        $html = '';
        if(count($photos)<1)
            return '';
        if(count($photos)==1)
            return '<img src="../../picture/'.$photos[0]['photo_id'].'.jpg" height="500px"  width="100%">';
        
            $html.=     '<div id="demo'.$id.'" class="carousel slide" data-ride="carousel">'.
                            '<div class="carousel-inner">';
                        $html.= '<div class="carousel-item active">'.
                                    '<img src="../../picture/'.$photos[0]['photo_id'].'.jpg"  width="100%" height="500px">'.
                                '</div>';
                    foreach($photos as $photo)
                    {
                        $html.= '<div class="carousel-item">'.
                                    '<img src="../../picture/'.$photo['photo_id'].'.jpg"  width="100%" height="500px">'.
                                '</div>';
                    }
                    $html.= '</div>';
        
                    $html.= '<a class="carousel-control-prev" href="#demo'.$id.'" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo'.$id.'" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>';
    
        return $html ;
    }
    public function display_slide2($photos,$id)
    {
        $html = '';
        if(count($photos)<1)
            return '';
        if(count($photos)==1)
            return '<img class="main-image" sizes="(max-width: 767px) 95vw, (max-width: 991px) 728px, 940px" src="../../picture/'.$photos[0]['photo_id'].'.jpg"  >';
        
            $html.=     '<div id="demo'.$id.'" class="carousel slide" data-ride="carousel">'.
                            '<div class="carousel-inner">';
                        $html.= '<div class="carousel-item active">'.
                                    '<img class="main-image" sizes="(max-width: 767px) 95vw, (max-width: 991px) 728px, 940px" src="../../picture/'.$photos[0]['photo_id'].'.jpg"  >'.
                                '</div>';
                    foreach($photos as $photo)
                    {
                        $html.= '<div class="carousel-item">'.
                                    '<img class="main-image" sizes="(max-width: 767px) 95vw, (max-width: 991px) 728px, 940px" src="../../picture/'.$photos[0]['photo_id'].'.jpg"  >'.
                                '</div>';
                    }
                    $html.= '</div>';
        
                    $html.= '<a class="carousel-control-prev" href="#demo'.$id.'" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo'.$id.'" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>';
    
        return $html ;
    }
}
?>