<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_db.php");
$mid = $_SESSION['userID'];
$cid = $_SESSION['cid'];


    $sql = "delete from customer where mid = '$mid' and cid = '$cid'";
    if(mysql_query($sql)){
        echo '刪除成功!';
        $url = "customerList.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    else{
        echo '刪除失敗!';
        $url = "customerList.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
?>