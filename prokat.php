<!DOCTYPE html>
<html>
<head>
    <?php
        $title = "Прокат";
        require_once "blocks/head.php";
    ?>
</head>
<body>
    <?php
        require_once "blocks/header.php";
    ?>
    <div class = "prok_table">
        <h1>Перечень инвентаря</h1>
    </div>
        <?php
            prokat ();
        ?>
    <?php
        require_once "blocks/footer.php";
    ?>
</body>
</html>