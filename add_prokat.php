<!DOCTYPE html>
<html>
<head>
    <?php
        $title = "Прокат";
        require_once "blocks/head.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<style>
    .edit{
     width: 100%;
     height: 25px;
    }
    .editMode{
     border: 1px solid black;
    }
    table, th, td {
     border: 1px solid black;
    }
    </style>-->
    <script>
    $(document).ready(function(){
     
     // Add Class
     $('.edit').click(function(){
      $(this).addClass('editMode');
     });
     
     // Save data
     $(".edit").focusout(function(){
      $(this).removeClass("editMode");
      var id = this.id;
      var split_id = id.split("_");
      var field_name = split_id[0];
      var edit_id = split_id[1];
      var value = $(this).text();
     
      $.ajax({
       url: 'aprokat.php',//файл с php скриптом, обновляющий данные в бд
       type: 'post',
       data: { field:field_name, value:value, id:edit_id },// отправляем имя поля, новое значение и id, чтобы определить, что конкретно и как надо обновить в таблице
       success:function(response){
        console.log('Save successfully');
       }
      });
     });
    });
    </script>
</head>
<body>
    <?php
        require_once "blocks/header.php";
    ?>
    <div class = "prok_table">
        <h1>Перечень инвентаря</h1>
    </div>
    <div class='prok_table'>
    <table>
    <tr>
        <th>Id</th>
        <th>Наименование</th>
        <th>Информация</th>
        <th>Количество</th>
    </tr>
    <?php 
    //$link=mysqli_connect('localhost','u1614453','Dfvgbh982312','u1614453_cson') or die(mysqli_error($link));
    $link = new mysqli("localhost", "u1614453", "Dfvgbh982312", "u1614453_cson");
    $link->query("SET NAMES 'utf8';");
    if($link->connect_error){
        die("Ошибка: " . $link->connect_error);
    }
    $query2 = "SELECT * FROM prokat";
    $result = mysqli_query($link, $query2);

    //$query2 = mysqli_query($link, "SELECT * FROM prokat");
     
      while($row = mysqli_fetch_array($result)){
        $id=$row['id'];
        $field=$row['field'];
        $info=$row['info'];
        $value=$row['value'];
        echo "<tr> 
            <td>$id</td> 
            <td>$field</td>
            <td>$info</td>
            <td contentEditable='true' class='edit' id='value_$id'>$value</td> 
            </tr>";
        }
    ?>
</table>
</div>
    <?php
        require_once "blocks/footer.php";
    ?>
</body>
</html>