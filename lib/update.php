<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_db.php");

$username = $_POST['username'];
$currentPassword = $_POST['currentPassword'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$email = $_POST['email'];


//紅色字體為判斷密碼是否填寫正確
if($_SESSION['username'] != null && $password != null && $repeatPassword != null && $password == $repeatPassword)
{
        $username = $_SESSION['username'];
    
        //更新資料庫資料語法
        $sql = "update member set password=$password where email='$email'";
        if(mysql_query($sql))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>