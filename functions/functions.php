<?php
    $mysqli = false;
    function connectDB () {
        global $mysqli;
        $mysqli = new mysqli("localhost", "u1614453", "Dfvgbh982312", "u1614453_cson");
        $mysqli->query("SET NAMES 'utf8';");
    }
    
    function closeDB () {
        global $mysqli;
        $mysqli->close ();
    }
    
    function getNews ($limit) {
        global $mysqli;
        connectDB ();
        $result = $mysqli->query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT $limit");
        closeDB ();
        return resultToArray ($result);
    }
    
    function News ($limit, $id) {
        global $mysqli;
        connectDB ();
        //$mysqli->query("SET NAMES 'utf-8';");
        if($id)
            $where = "WHERE `id` = ".$id;
        $result = $mysqli->query("SELECT * FROM `news` $where ORDER BY `id` DESC LIMIT $limit");
        closeDB ();
        if(!$id) 
            return resultToArray;
        else 
            return $result->fetch_assoc();
        
    }
    
    function resultToArray ($result) {
        $array = array ();
        while (($row = $result->fetch_assoc()) != false) {
            $array[] = $row;
        }
        return $array;
    }
    
    function calDB () {
        $db = "u1614453_cson"; //database name
        $db_host = "localhost"; //database host
        $db_user = "u1614453"; //username to connect to database
        $db_pass = "Dfvgbh982312";  //password to connect to database
        
        $conn = mysql_connect($db_host, $db_user, $db_pass) or die("Нет подключения к базе данных!");
        mysql_select_db($db, $conn);
    }
    
    function prokat () {
            $conn = new mysqli("localhost", "u1614453", "Dfvgbh982312", "u1614453_cson");
            $conn->query("SET NAMES 'utf8';");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT field, info, value FROM prokat";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // количество полученных строк
                //echo "<p>Получено объектов: $rowsCount</p>";
                echo "<div class = 'prok_table'>";
                echo "<table width = '100%'><tr><th>Наименование</th><th>Характеристики</th><th>Количество</th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                        echo "<td>" . $row["field"] . "</td>";
                        echo "<td>" . $row["info"] . "</td>";
                        echo "<td>" . $row["value"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
            $conn->close();
    }
?>