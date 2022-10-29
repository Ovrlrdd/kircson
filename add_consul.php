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
            <div id="login">
            <div id="inp">
                <div class="col">
                    <h1>Юрист</h1>
                    <form action="aconsul.php" method="post">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Название"><br>
                        <input type="text" class="form-control" name="event" id="event" placeholder="Введите промежуток времени"><br>
                        <input type="text" class="form-control" name="date" id="date" placeholder="Введите дату в формате гггг-мм-дд"><br>
                        <button class="btn btn-success" type="submit">Добавить</button>
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