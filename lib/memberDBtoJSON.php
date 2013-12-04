<?php
    include("connect_db.php");
    session_start();
    $mid = $_SESSION['userID'];
    $sql = "SELECT * FROM member";
    $result = mysql_query($sql);
    $JsonTable = array();
    while($row = mysql_fetch_array($result)){
        $JsonTable[] = array("mid"=>"$row[0]","username"=>"$row[1]","email"=>"$row[2]", "password"=>"$row[3]", "admin"=> "$row[4]","registerDate"=>"$row[5]");
    }
    echo json_encode($JsonTable, JSON_UNESCAPED_UNICODE);
?>