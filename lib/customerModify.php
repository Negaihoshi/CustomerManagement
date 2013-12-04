<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_db.php");

$customerName = $_POST['customerName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$mid = $_SESSION['userID'];
$cid = $_SESSION['cid'];

if($_SESSION['email']!= null){

    $sql = "update customer set name='$customerName', email='$email', phone='$phone', mobile='$mobile', address='$address' where cid='$cid' and mid = '$mid'";
    if(mysql_query($sql)){
        echo '修改成功!';
        $url = "customerList.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    else{
        echo '修改失敗!';
        $url = "customerList.php";
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