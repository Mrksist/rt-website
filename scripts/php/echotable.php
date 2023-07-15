<?php 
    function formNewsList($type){
        include 'db.php';
        $result = "";
        $query = $conn->query("SELECT * FROM ".$type.";");
        $row = $query->fetch_array(MYSQLI_ASSOC);
        while($row){
            $result = $result.'<div class="article-wrapper">';
            if(isset($row["logo"])) $result = $result.'<img src="/cdn/'.$row["logo"].'.png" class="img-block-logo" title="Logo">';
            $result = $result.'<a style="text-decoration: none" href="/?page='.$type.'&id='.$row['id'].'">';
            $result = $result.'<h1 class="table">'.$row["name"].'</h1>';
            $result = $result.'<p class="table-date">Последнее обновление: '.$row["date"].'</p>';
            $result = $result.'<p class="table">'.$row["description"].'</p>';
            $result = $result.'</a>
            </div>';
            $row = $query->fetch_array(MYSQLI_ASSOC);
        }
        return $result;
    }
    function formArticle($type, $id, $date){
        $result = "";
        include 'parser.php';
        $result = $result.'<div class="article-content-wrapper">';
        $result = $result.'<div class="article-content">';
        $result = $result.'<p class="table-date">Последнее обновление: '.$date.'</p>';
        $result = $result.parsemd('archive/'.$type.'_'.$id.'.md');
        $result = $result.'
            </div>
            </div>';
        return $result;
    }
?>