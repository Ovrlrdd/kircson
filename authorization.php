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
    <div id="login">
        <?php
            if($_COOKIE['user'] == ''):
        ?>
        <div id="inp">
            <div class="col">
                <h1>Авторизация</h1>
                <form action="auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
                    <button class="btn btn-success" type="submit">Вход</button>
                </form>
            </div>
            <?php else: ?>
            <div id="authmenu">
                <div id="zag"><p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a>.</p></div>
                
                    <div id="menudown"><a href="/add_news.php">Добавить новость</a><br></div>
                    <div id="menudown"><a href="/add_taxi.php">Внести данные о соцтакси</a><br></div>
                    <div id="menudown"><a href="/add_psih.php">Добавить событие психологу</a><br></div>
                    <div id="menudown"><a href="/add_consul.php">Добавить событие юристу</a><br></div>
                    <div id="menudown"><a href="/add_prokat.php">Редактировать инвентарь</a><br></div>
                
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