<?php
    $field= $_POST['field'];
    $value = $_POST['value'];
    $id = $_POST['id'];
     
    //подключаемся к бд
    $link=mysqli_connect("localhost", "u1614453", "Dfvgbh982312", "u1614453_cson") or die(mysqli_error($link));
     
    //делаем запрос на обновление строки
    $query = "UPDATE prokat SET ".$field."=".$value." WHERE id=".$id;
    mysqli_query($link,$query);
?>