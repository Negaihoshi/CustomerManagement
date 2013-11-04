<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta charset="UTF-8">
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("connect_db.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword =$_POST['repeatPassword'];


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($username != null && $email != null && $password != null && $repeatPassword != null && $password == $repeatPassword){

        //新增資料進資料庫語法
        $sql = "insert into member (username, email, password) values ('$username', '$email', '$password')";
        if(mysql_query($sql))
        {
                //echo '新增成功!';
                $_SESSION['email'] = $email;
                $_SESSION['loginName'] = $username;
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../index.html>';
        }
}
else
{
        //echo '您無權限觀看此頁面!';
        if ($password == $repeatPassword) {
        	echo "驗證密碼失敗，密碼不相同";
        }
        echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}
?>

