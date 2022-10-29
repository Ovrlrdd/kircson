<?php
    $name = htmlspecialchars($_POST['name']);
    $Email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    if ($name == '' || $Email == '' || $subject == '' || $message == '') {
        echo 'Заполните все поля';
        exit;
    }
    // Отправка
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: $Email\r\nReply-to: $Email\r\nContent-type: text/html; charset=utf-8\r\n";
    if(mail("prog.cson@yandex.ru", $subject, $message, $headers))
        echo "Сообщение отправлено";
    else
        echo "Сообщение не отправлено";
?>