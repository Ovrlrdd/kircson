<?php
    $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
    $event = filter_var(trim($_POST['event']), FILTER_SANITIZE_STRING);
    $date = filter_var(trim($_POST['date']), FILTER_SANITIZE_STRING);
    
    $mysql = new mysqli("localhost", "u1614453", "Dfvgbh982312", "u1614453_cson");
    
    $sql = "SELECT `event`, `eventdate` FROM `consul` WHERE `event` = '$event' AND `eventdate` = '$date'";
    
    if($result = $mysql->query($sql)){
                $rowsCount = $result->num_rows; // количество полученных строк        
    }
    
    if ($rowsCount >= 1){
        header('Location: https://kircson.ru/error.php');
    }
    elseif ($rowsCount == 0){
        $mysql->query("INSERT INTO `consul` ( `title`, `event`, `eventdate`) VALUES ( '$title', '$event', '$date')");
    
        $mysql->close();
    
    header('Location: https://kircson.ru/consul.php');
    }
?>