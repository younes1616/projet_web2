<?php
class Page{
    public function inserer($pdo,$nom,$description)
    {
        $query = 'insert into page set nom=? , description=? ';
        $pdo->prepare($query)->execute([$nom,$description]);
        return $pdo->lastInsertId();
    }
    
    public function display_client($pdo)
    {
        $query = 'select * from page';
        $pages = $pdo->query($query)->fetchAll();
        $html = '';
        foreach( $pages as $page )
        {
            $html.=     '<div class="own_card">'.
                            '<div class="detail">'.
                                
                                '<div class="text"><p>'.$page['description'] .'</p></div>'.
                                '<a class="btn btn-primary  mt-2 mr-2 font-weight-bold float-left" style="width:90%;" href="./page.php?id='.$page['id'].'">voir</a>'.
                            '</div>'.
                            '<div class="img"> 
                            <div class="titre"><h3>'.$page['nom'] .'</h3></div>'.
                                    '<span>
                                        <div class="card-footer row justify-content-center">
                                            
                                        </div>
                                    </span> 
                            </div>'.

                        '</div>' ;
        }
        return $html ;
    }
    public function lien($pdo)
    {
        $html = '';
        $query = 'select * from page';
        $pages = $pdo->query($query)->fetchAll();
        foreach($pages as $page)
        {
            $html .= '<a href="page.php?id='.$page['id'].' " class="col-md-4 text-light">'.$page['nom'].'</a>';
        }
        return $html;
    }

    public function delete($pdo,$id)
    {
        $query = 'delete from page where id = ?';
        $pdo->prepare($query)->execute([$id]);
    }

    public function display_admin($pdo)
    {
        $html = '';
        $query = 'select * from page ';
        $pages = $pdo->query($query)->fetchAll();
        foreach($pages as $page)
        {
            $html .=    '<div class="card col-md-3 col-10 my-2 mx-2 p-0" id="page_id_'.$page['id'].'"> 
                            <div class="card-header">
                                <input type="checkbox" name="articles[]" value="'.$page['id'].'"/>
                            </div>
                            <div class="card-body" style="max-height:250px;overflow-y:scroll;">
                                <h4>'.$page['nom'].'</h4>
                                <p>'.$page['description'].'</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary  mt-2 mr-2 font-weight-bold float-left" style="width:45%;" href="./page.php?id='.$page['id'].'">voir</a>
                                <a class="btn btn-success  mt-2 mr-2 font-weight-bold float-right" style="width:45%;" href="gestion_page_modification.php?id='.$page['id'].'">modifier</a>
                            </div>
                        </div>';
        }
        return $html ;
    }
    public function display_client_2($pdo)
    {
        $html = '';
        $query = 'select * from page ';
        $pages = $pdo->query($query)->fetchAll();
        foreach($pages as $page)
        {
            $html .=    '<div class="card col-md-3 col-10 my-2 mx-2 p-0" id="page_id_'.$page['id'].'"> 
                            <div class="card-header">
                                <h4>'.$page['nom'].'</h4>
                            </div>
                            <div class="card-body" style="max-height:250px;overflow-y:scroll;">
                                <p>'.$page['description'].'</p>
                            </div>
                            <div class="card-footer row justify-content-center">
                                <a class="btn btn-primary  mt-2 mr-2 font-weight-bold float-left" style="width:90%;" href="./page.php?id='.$page['id'].'">voir</a>
                            </div>
                        </div>';
        }
        return $html ;
    }
    public function existe($pdo,$id)
    {
        $query = 'select * from page where id='.$id;
        return $pdo->query($query)->fetchAll();
    }
    public function page_article_ids($pdo,$id)
    {
        $query = 'select pa.id_article from page p ,page_article pa,article a where a.id = pa.id_article and p.id = pa.id_page and p.id='.$id;
        return $pdo->query($query)->fetchAll();
    }

    public function display_page_theme($pdo,$theme)
    {
        $query = 'select * from page p , page_article pa , article a where ';
    }
}
    