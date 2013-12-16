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
        $salt = substr($password, 0, 2);
        $cryptPassword = crypt($password,$salt);

        $sql = "insert into member (username, email, password) values ('$username', '$email', '$cryptPassword')";
        if(mysql_query($sql))
        {
                $sql = "SELECT * FROM member";
                $result = mysql_query($sql);
                while($row = mysql_fetch_array($result)){
                    $mid = $row[0];
                }
                $_SESSION['email'] = $email;
                $_SESSION['loginName'] = $username;
                $_SESSION['userID'] = $mid;
                $url = "customerList.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
        }
        else
        {
                echo '新增失敗!';
                $url = "../index.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
        }
}
else
{
        //echo '您無權限觀看此頁面!';
        if ($password == $repeatPassword) {
        	echo "驗證密碼失敗，密碼不相同";
        }
                $url = "register.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
}
?>

