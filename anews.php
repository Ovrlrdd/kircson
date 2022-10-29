<?php
    require_once "blocks/head.php";
    $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
    $intro_text = filter_var(trim($_POST['intro_text']), FILTER_SANITIZE_STRING);
    $full_text = filter_var(trim($_POST['full_text']), FILTER_SANITIZE_STRING);
    
    $mysql = new mysqli("localhost", "u1614453", "Dfvgbh982312", "u1614453_cson");
    $mysql->set_charset("utf8");
    
    
    $mysql->query("INSERT INTO `news` ( `title`, `intro_text`, `full_text`) VALUES ( '$title', '$intro_text', '$full_text')");
    
    
    header('Location: /');
?>