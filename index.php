<!DOCTYPE html>
<html>
<head>
    <?php
        $title = "Кировский ЦСОН | Главная";
        require_once "blocks/head.php";
        $news = getNews (3);
    ?>
</head>
<body>
    <?php
        require_once "blocks/header.php";
    ?>
    <div id="wrapper">
        <div id="leftCol">
            <?php
                for ($i = 0; $i < count($news); $i++) {
                    echo "<div id=\"bigArticle\">";
                    echo '<img src="/img/articles/'.$news[$i]["id"].'.jpg" alt="Статья '.$news[$i]["id"].'" title="Статья '.$news[$i]["id"].'">
                    <h2>'.$news[$i]["title"].'</h2>
                    <p>'.$news[$i]["intro_text"].'</p>
                    <a href="/article.php?id='.$news[$i]["id"].'">
                        <div class="more">Далее...</div>
                    </a>
                    </div>';
                    echo "<div class=\"clear\"><br></div>";
                }
            ?>
        </div>
        <?php
            //require_once "blocks/rightCol.php";
        ?>
        <?php
            require_once "blocks/rightTips.php";
        ?>
    </div>
    <?php
        require_once "blocks/footer.php";
    ?>
</body>
</html>