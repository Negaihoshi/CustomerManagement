<?php
    include("connect_db.php");

    $sql = "SELECT * FROM customer";
    $result = mysql_query($sql);
    $JsonTable = array();
    while($row = mysql_fetch_array($result)){
        $JsonTable[] = array("id"=>"$row[0]","name"=>"$row[1]", "email"=>"$row[2]", "tel"=> "$row[3]", "mobile"=>"$row[4]" ,"address"=>"$row[5]", "RegisterDate"=>"$row[6]");
    }
    //json_encode($JsonTable, JSON_UNESCAPED_UNICODE);
    echo json_encode($JsonTable, JSON_UNESCAPED_UNICODE);

    /*
    //$Data = json_decode()
    //$json = json_decode($JsonTable);
    echo "<table class='uk-table'><caption>客戶資料</caption><thead>";
    echo "<tr><th>ID</th><th>客戶名稱</th><th>信箱</th><th>聯絡電話</th><th>行動電話</th><th>地址</th><th>RegisterDate</th></tr></thead><tbody>";


        $sql = "SELECT * FROM customer";
        $result = mysql_query($sql);
        while( $row = mysql_fetch_row($result)){
            echo "<tr><td>$row[0]</td><td><a href=''>$row[1]</a></td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
        }
    echo "</tbody></table>";
    */
?>