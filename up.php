<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>

<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a class="active" href="#about">About</a></li>
</ul>

<?php
if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
{
    $name = "img/" . $_FILES["filename"]["name"];
    move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
    echo "Файл загружен";
}
?>
<h2>Загрузка файла</h2>
<form method="post" enctype="multipart/form-data">
Выберите файл: <input type="file" name="filename" size="10" /><br /><br />
<input type="submit" value="Загрузить" />
</form>

</body>
</html>