<?php
class Article{
    
    public function inserer($pdo,$titre,$text,$ids)
    {
        $query = 'insert into article set titre=? , text=? ';
        $pdo->prepare($query)->execute([$titre,$text]);
        $article_id = $pdo->lastInsertId();
        
        $article_photo = new Article_photo();
        $article_photo->insrer($pdo,$article_id,$ids);
    }
    public function display($pdo)
    {
        $path = '../picture/';
        $photo = new Photo();
        $html = '';
        $query = 'select * from article';
        $lines = $pdo->query($query)->fetchAll();
        foreach($lines as $line)
        {
            $lien = $photo->first($pdo,$line['id']);    
            $html .= '<div class="col-md-4  p-3">';
            $html .= '<div class="card bg-dark text-light">'.
                        '<div class="card-head m-3">'.
                            '<input type="checkbox"  name="articles[]" value="'.$line['id'].'">'.
                            '<div class="card-title">'.$line['titre'].'</div>'.
                        '</div>'.
                        '<hr style="color:red;">'.
                        '<div class="card-body m-3">'.
                            '<div class="card-img" style="width:100%;"><img src="'.$path.$lien.'.jpg"></div>'.
                            '<div class="card-text">'.$line['text'].'</div>'.
                        '</div>'.
                    '</div>';
            $html .= '</div>';
        }
        return $html ;
    }
    
    public function display_client($pdo)
    {
        $html = '';
        $query = 'select * from article';
        $query2= 'select * from article_photo where article_id=';
        $articles = $pdo->query($query)->fetchAll();
        $photo = new Photo();
        foreach($articles as $article)
        {
            $article_photos = $pdo->query($query2)->fetchaAll();
            html .= $photo->display_slide($article_photos,$article['id']);
        }
        return $html ;
    }
    
    
    public function display_client_2($pdo)
    {
        $html = '';
        $query = 'select * from article';
        $query2= 'select * from article_photo where article_id=';
        $articles = $pdo->query($query)->fetchAll();
        foreach($articles as $article)
        {
        $i=0;
        $photos = $pdo->query($query2.$article['id'])->fetchAll();
        $html .=    '<div class="row justify-content-center">'.
                        '<div class="card p-0 mt-3 col-10 col-md-8">'.
                            '<div class="card-header">'.$article['titre'].'</div>'.
                            '<div class="card-body bg-light">'.
                                '<h1>'.$article['titre'].'</h1>';
                            
            if(!empty($photos))
            {
            $html .='<div class="card-img">';
            $html.=     '<div id="demo'.$article['id'].'" class="carousel slide" data-ride="carousel">'.
                            '<div class="carousel-inner">';
                    foreach($photos as $photo)
                    { if($i==0)
                        $html.= '<div class="carousel-item active">'.
                                    '<img src="picture/'.$photo['photo_id'].'.jpg"  width="100%">'.
                                '</div>';
                     else 
                         $html.= '<div class="carousel-item">'.
                                    '<img src="picture/'.$photo['photo_id'].'.jpg"  width="100%">'.
                                '</div>';
                        $i++;
                    }
                    $html.='</div>';
                    if($i==2)
                    {
                        $html.='<!-- Left and right controls -->
                          <a class="carousel-control-prev" href="#demo'.$article['id'].'" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                          </a>
                          <a class="carousel-control-next" href="#demo'.$article['id'].'" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                          </a>';
                    }
                          
              $html.='</div>'.
                '</div>';
            }
            
            
                            $html.='<p>'.
                                  '<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample'.$article['id'].'" aria-expanded="false"> More Info</button>'.
                                '</p>'.
                                '<div class="collapse" id="collapseExample'.$article['id'].'">'.
                                    '<p class="justify">'.
                                    $article['text'].
                                    '</p>'.
                                '</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>';
        }
        return $html ;
    }
}

?>