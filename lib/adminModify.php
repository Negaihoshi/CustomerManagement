<?php session_start(); ?>
<?php
include("connect_db.php");

$admin = $_POST['admin'];
$mid = $_SESSION['userID'];


if($_SESSION['email']!= null){

    $sql = "update member set admin='$admin' where mid = '$mid'";
    if(mysql_query($sql)){
        echo '修改成功!';
        $url = "adminEdit.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    else{
        echo '修改失敗!';
        $url = "adminEdit.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";

    }
}
else{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>