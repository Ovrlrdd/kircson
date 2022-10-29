<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Обратная связь";
            require_once "blocks/head.php"; 
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <script>
            $(document).ready (function () {
                $("#done").click (function () {
                    $("#messageShow").hide ();
                    var name = $("#name").val ();
                    var Email = $("#email").val ();
                    var Phone = $("#phone").val ();
                    var subject = $("#subject").val ();
                    var message = $("#message").val ();
                    var fail = "";
                    if (name.length < 3) { 
                        fail = "Имя не меньше 3 символов";
                    } else if (Email.split ('@').length - 1 == 0 || Email.split ('.').length - 1 == 0) {
                        fail = "Вы ввели некоректный E-mail";
                    } else if (Phone.length != 11 && Phone.length != 12 && Phone.length != 6) {
                        fail = "Вы ввели некоректный номер телефона";
                    } else if (subject.length < 5) {
                        fail = "Тема сообщения меньше 5 символов";
                    } else if (message.length < 20) {
                        fail = "Сообщение не менее 20 символов";
                    }
                    if (fail != "") {
                        $('#messageShow').html (fail + "<div class='clear'><br></div>");
                        $('#messageShow').show ();
                        return false;
                    }
                });  
            });
        </script>
    </head>
    <body>
        <?php require_once "blocks/header.php" ?>
        <div id="wrapper">
            <div id="leftCol">
                <div id="feedback">
                    <h1>Напишите нам</h1>
                    <form action="./mail.php" method="post">
                        <input type="text" placeholder="Имя" id="name" name="name"><br>
                        <input type="text" placeholder="Email" id="email" name="email"><br>
                        <input type="text" placeholder="Номер телефона" id="phone" name="phone"><br>
                        <input type="text" placeholder="Тема сообщения" id="subject" name="subject"><br>
                        <textarea name="message" id="message" placeholder="Введите сюда ваше сообщение"></textarea><br>
                        <br>
                        <br>
                        <br>
                        <br><input type="submit" name="done" id="done" value="Отправить"><br>
                        <div id="messageShow"></div><br>
                    </form>
                </div>
            </div>
            <?php require_once "blocks/rightTips.php" ?>
        </div>
        <?php require_once "blocks/footer.php" ?>
    </body>
</html>