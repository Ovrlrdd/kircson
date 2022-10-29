<!DOCTYPE html>
<html>
<head>
    <?php
        $title = "Новости";
        require_once "blocks/head.php";
        //$news = getFull ($_GET["id"]);
        $news = News (1, $_GET["id"]);
    ?>
</head>
<body>
    <?php require_once "blocks/header.php" ?>
    
    <div id="wrapper">
        <div id="leftCol">
            
        <?php
                echo '<div id="bigArticle"><img src="/img/articles/'.$news["id"].'.jpg" alt="Статья '.$news["id"].'" title="Статья '.$news["id"].'">
                <h2>'.$news["title"].'</h2>
                <p>'.$news["full_text"].'</p>
                </div>';
        ?>
        </div>
        
        <?php require_once "blocks/rightCol.php" ?>
        
    </div>
    
    <?php require_once "blocks/footer.php" ?>
    
</body>
</html>