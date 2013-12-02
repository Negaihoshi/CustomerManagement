<?php
    include("connect_db.php");
    
    $sql = "SELECT * FROM customer";
    $result = mysql_query($sql);
    $JsonTable = array();
    $cidnumber =0;
    while($row = mysql_fetch_array($result)){
        $JsonTable[] = array("cid"=>"$row[0]","mid"=>"$row[1]","name"=>"$row[2]", "email"=>"$row[3]", "tel"=> "$row[4]",
            "mobile"=>"$row[5]" ,"address"=>"$row[6]", "addDate"=>"$row[7]");
        $cidnumber = $row[0];
    }
    $_SESSION['$cid'] = $cidnumber;
    echo json_encode($JsonTable, JSON_UNESCAPED_UNICODE);
?>