<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    
    //$pass = md5($pass."rgfhrd2");
    
    $mysql = new mysqli('localhost', 'u1614453', 'Dfvgbh982312', 'u1614453_cson');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        echo "User not found";
        exit();
    }
    
    setcookie('user', $user['login'], time() + 3600, "/");
    
    $mysql->close();
    
    header('Location: http://kircson.ru/authorization.php');
?>