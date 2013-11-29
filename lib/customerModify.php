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
$sql = "SELECT * FROM customer where mid = '$mid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$cid = $row[2];

if($_SESSION['email']!= null)
{
        //更新資料庫資料語法
        $sql = "update customer set name='$customerName', email='$email', phone='$phone', mobile='$mobile', address='$address' where cid='$cid' and mid = '$mid'";
        echo "$sql";
        if(mysql_query($sql))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=customerList.php>';
        }
        else
        {
                echo '修改失敗!';
               
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>