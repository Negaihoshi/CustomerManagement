<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_db.php");
$email = $_SESSION['email'];
$sql = "SELECT * FROM member where email = '$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$currentPassword = $_POST['currentPassword'];
$salt = substr($currentPassword, 0, 2);
$cryptPassword = crypt($currentPassword,$salt);
if($row[3]!=$cryptPassword) {
    setcookie("editError", "false", time()+60);
    $url = "memberEdit.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
if($password!=$repeatPassword) {
    setcookie("editError", "false", time()+30);
    $url = "memberEdit.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}

//紅色字體為判斷密碼是否填寫正確
if($password != null && $repeatPassword != null && $password == $repeatPassword){
    $salt = substr($password, 0, 2);
    $cryptPassword = crypt($password,$salt);
    //更新資料庫資料語法
    $sql = "update member set password='$cryptPassword' where email='$email'";
    if(mysql_query($sql)){
        $url = "customerList.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    else{
        $url = "memberEdit.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
}
else{
    setcookie("userCheck", "false", time()+60);
    $url = "login.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>