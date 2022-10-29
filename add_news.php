<!DOCTYPE html>
<html>
<head>
    <?php
        $title = "Авторизация";
        require_once "blocks/head.php";
    ?>
</head>
<body>
    <?php
        require_once "blocks/header.php";
    ?>
    <div class="container mt-4">
        <?php
            if($_COOKIE['user'] == ''):
        ?>
        <div class="row">
            <h1>Для продолжения <a href="/authorization.php">авторизируйтесь</a></h1>
            <?php else: ?>
            <!--<p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a>.</p>-->
        <div id="wrapper">
        <div id="leftCol">
            <div id="feedback">
                <?php
                    if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
                    {
                        $name = "img/articles/" . $_FILES["filename"]["name"];
                        move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
                        echo "Файл загружен";
                    }
                ?>
                    <h2>Загрузка изображения</h2>
                    <form method="post" enctype="multipart/form-data">
                    <input type="file" name="filename" size="10" /><br />
                    <input type="submit" value="Загрузить" />
                    </form>
                <h1>Добавить статью</h1>
                <form action="anews.php" method="post" accept-charset="UTF-8">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Название статьи"><br>
                    <textarea name="intro_text" id="intro_text" placeholder="Превью статьи"></textarea><br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <textarea name="full_text" id="full_text" placeholder="Полный текст статьи"></textarea><br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div id="addbtn"><button type="submit">Добавить</button></div>
                </form>
            </div>
            </div>
        </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
        require_once "blocks/footer.php";
    ?>
</div>
</body>
</html>