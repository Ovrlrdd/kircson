<!-- REPLACE WITH YOUR OWN HEADER IF YOU LIKE -->
<!DOCTYPE html>
<html>
<head>
    <?php
        $title = "Социальное такси";
        require_once "blocks/head.php";
        $news = getNews (3);
    ?>
</head>
<body>
    <?php
        require_once "blocks/header.php";
    ?>
    
<div class="calendar-wrp">
    <div class="calendar-item">
      
<?php
require ("config/config_inc.php");
// connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass) or die("Нет подключения к базе данных!");
mysqli_select_db($conn, $db);
?>

            

<!-- REPLACE WITH YOUR OWN HEADER IF YOU LIKE -->
  
  <?
  //clean input
  if (isset($_GET['month'])) { $month = $_GET['month']; $month = preg_replace ('/[[:space:]]/', ' ', $month); $month = preg_replace ('/[[:punct:]]/', ' ', $month); $month = preg_replace ('/[[:alpha:]]/', ' ', $month); }
  if (isset($_GET['year'])) { $year = $_GET['year']; $year = preg_replace ('/[[:space:]]/', ' ', $year); $year = preg_replace ('/[[:punct:]]/', ' ', $year); $year = preg_replace ('/[[:alpha:]]/', ' ', $year); if ($year < 1990) { $year = 2022; } if ($year > 2035) { $year = 2035; } }
  if (isset($_GET['today'])) { $today = $_GET['today']; $today = preg_replace ('/[[:space:]]/', ' ', $today); $today = preg_replace ('/[[:punct:]]/', ' ', $today); $today = preg_replace ('/[[:alpha:]]/', ' ', $today); }
  
  
  
  $month = (isset($month)) ? $month : date("n",time());
  $year = (isset($year)) ? $year : date("Y",time());
  $today = (isset($today))? $today : date("j", time());
  $daylong = date("l",mktime(1,1,1,$month,$today,$year));
  $monthlong = date("F",mktime(1,1,1,$month,$today,$year));
  $dayone = date("N",mktime(1,1,1,$month,1,$year));
  $numdays = date("t",mktime(1,1,1,$month,1,$year));
  $alldays = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');
  //$alldays = array( 1 => 'Пн','Вт','Ср','Чт','Пт','Сб', 'Вс');
  $next_year = $year + 1;
  $last_year = $year - 1;
  if ($today > $numdays) { $today--; }
  
  $dayone = $dayone - 1;
  
  $arr_day = array('1' => 'Понедельник','2' => 'Вторник','3' => 'Среда','4' => 'Четверг','5' => 'Пятница','6' => 'Суббота','7' => 'Воскресенье');
  $arr_month = array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
  
  //begin outer table structure
  echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"4\" width=\"528\">
          <tr>
            <td>
            <div class='calendar-item'>
              <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"611\" bgcolor=\"black\">
                <tr>
                  <td bgcolor=\"white\" valign=\"middle\" align=\"center\"><b>Занятость автомобиля на ".$arr_month[$month-1].", ".$arr_day[$day_count]." ".$today.", ".$year."</b></td>
                </tr>
              </table>
              </div>
            </td>
            <td valign=\"middle\" align=\"center\">
              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>

                  <td valign=\"middle\" align=\"center\">
                  <div class='calendar-cal'>
                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"480\" bgcolor=\"black\">
                      <tr>
                        <td bgcolor=\"white\" valign=\"middle\" align=\"center\"><b>$year</b></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              </div>
            </td>
          </tr>
          <tr>
            <td valign=\"top\">
  
                <table cellpadding=\"4\" cellspacing=\"1\" width=\"300\" height=\"490\">
                <tr>
                  <td class=\"cellbg\" valign=\"top\">";
  
  echo "<div class='calendar-event'>";
  //загрузка и отображение названия и содержимого дня в полях
  $sql_date = "$year-$month-$today";
  $eventQuery = "SELECT id, title, event FROM cal WHERE eventdate = '$sql_date';";
  $eventExec = mysqli_query($conn, $eventQuery);
  $count = stripslashes($row["id"]);
  
  while($row = mysqli_fetch_array($eventExec)) {
     $event_title = stripslashes($row["title"]);
     $event_title = htmlspecialchars($event_title);
     $event_event = stripslashes($row["event"]);
     $event_event = htmlspecialchars($event_event);
     //$event_event = preg_replace ("\n", "<br>\n", $event_event);
     
     echo "<font class=\"eventheading\">$event_title</font><br><br>\n";
     echo $event_event;
     echo "<br><br>";
  }
  echo "</div>";
                echo "</td>
                </tr>
                </table>
  
            <td valign=\"top\">
    <table cellpadding=\"1\" cellspacing=\"1\" width=\"450\">
        <tr>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=1';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=1\" class=\"normal\">Янв</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=2';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=2\" class=\"normal\">Фев</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=3';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=3\" class=\"normal\">Мар</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=4';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=4\" class=\"normal\">Апр</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=5';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=5\" class=\"normal\">Май</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=6';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=6\" class=\"normal\">Июн</a> </td>
        </tr>
        <tr>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=7';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=7\" class=\"normal\">Июл</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=8';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=8\" class=\"normal\">Авг</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=9';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=9\" class=\"normal\">Сен</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=10';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=10\" class=\"normal\">Окт</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=11';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=11\" class=\"normal\">Ноя</a> </td>
          <td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=1&month=12';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"> <a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=1&month=12\" class=\"normal\">Дек</a> </td>
        </tr>
      </table><br>\n";
  
  
  //отображаемое название месяца
  echo "<table cellpadding=\"2\" cellspacing=\"1\">\n<tr>\n";
  echo "<td class=\"cellbg\" colspan=\"7\" valign=\"middle\" align=\"center\"><font class=\"regheading\"><b>" .$arr_month[$month-1]. "</b></font>\n</td>\n";
  echo "</tr>\n<tr>\n";
  
  
  //отображение названий дней
  foreach($alldays as $value) {
    echo "<td class=\"cellbg\" valign=\"middle\" align=\"center\" width=\"10%\"><font class=\"$normaltext\" size=\"1\"><b>$value</b></font></td>\n";
  }
  echo "</tr>\n<tr>\n";
  
  
  //отображать пустые дни как nbsp
  for ($i = 0; $i < $dayone; $i++) {
    echo "<td class=\"cellbg\" valign=\"middle\" align=\"center\"><font class=\"$normaltext\" size=\"1\">&nbsp;</font></td>\n";
  }
  
  //display days
  for ($zz = 1; $zz <= $numdays; $zz++)
    {
      if ($i >= 7) {  print("</tr>\n<tr>\n"); $i=0;
    }
    //проверьте текущий день на наличие события
    $result_found = 0;
    if ($zz == $today)
    { //отметьте сегодняшнюю ячейку независимо
      echo "<td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=$zz&month=$month';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='celltoday'\" class=\"celltoday\"><a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=$zz&month=$month\" class=\"today\">$zz</a></font></td>\n";
      $result_found = 1;
    }
  
    if ($result_found != 1) {//показать стиль ячейки по умолчанию для дня
      echo "<td valign=\"middle\" align=\"center\" onClick=\"window.location='" .$_SERVER['PHP_SELF']. "?year=$year&today=$zz&month=$month';\" onMouseOver=\"this.className='cellover'\"; onMouseOut=\"this.className='cellbg'\" class=\"cellbg\"><a href=\"".$_SERVER['PHP_SELF']."?year=$year&today=$zz&month=$month\" class=\"normal\">$zz</a></td>\n";
    }
  
    $i++; $result_found = 0;
  }
  
  $create_emptys = 7 - (($dayone + $numdays) % 7);
  if ($create_emptys == 7) { $create_emptys = 0; }
  
  //отобразить оставшиеся пустые ячейки
  if ($create_emptys != 0) {
    echo "<td class=\"cellbg\" valign=\"middle\" align=\"center\" colspan=\"$create_emptys\"><font class=\"$normaltext\"> </font></td>\n";
  }
  
  echo "</tr>\n";
  echo "</table><br>\n";
  
  for ($i = $today; $i <= ($today + 6); $i++) {
    //определите, переносятся ли дни в следующий месяц
    $current_day = $i;
    $current_year = $year;
    $current_month = $month;
    if ($i > $numdays) {
      $current_day = ($i - $numdays);
      $current_month = $month + 1;
      if ($current_month > 12) {
        $current_month = 1; $current_year = $year + 1;
      }
    } 
  
    //отобразить название дня, если оно существует
    if (strlen($this_days_title) > 0) {
      echo "<font class=\"eventtitle\">$this_days_title</font>";
    }
  
    echo "</td></tr>\n";
    $this_days_title = "";
  }
  echo "</table>\n";
  
  //end outer table
  echo "</td>
          </tr>
        </table>\n";
  ?>
  </div>

</div class="calendar-wrp">
        </div>
        </div>

        <?php
            require_once "blocks/footer.php";
        ?> 
    </div>
</div>

</body>
</html>
