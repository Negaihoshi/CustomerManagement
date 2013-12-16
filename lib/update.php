<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_db.php");

$currentPassword = $_POST['currentPassword'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$email = $_SESSION['email'];

//紅色字體為判斷密碼是否填寫正確
if($password != null && $repeatPassword != null && $password == $repeatPassword)
{

        //更新資料庫資料語法
        $sql = "update member set password=$password where email='$email'";
        if(mysql_query($sql))
        {
                echo '修改成功!';
                $url = "customerList.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
        }
        else
        {
                echo '修改失敗!';
                $url = "member.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
        }
}
else
{
        echo '您無權限觀看此頁面!';
        $url = "../index.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
}
?>