<?php
    include("connect_db.php");

    $sql = "SELECT * FROM customer";
    $result = mysql_query($sql);
    $JsonTable = array();
    while($row = mysql_fetch_array($result)){
        $JsonTable[] = array("id"=>"$row[0]","name"=>"$row[1]", "email"=>"$row[2]", "tel"=> "$row[3]", "mobile"=>"$row[4]" ,"address"=>"$row[5]", "addDate"=>"$row[6]");
    }
    echo json_encode($JsonTable, JSON_UNESCAPED_UNICODE);
?>