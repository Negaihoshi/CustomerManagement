<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta charset="UTF-8">
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("connect_db.php");

$userID = $_SESSION['userID'];
$name = $_POST['customerName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$mobile =$_POST['mobile'];
$address =$_POST['address'];

if($name != null && $email != null && $phone!= null &&  $mobile != null && $address != null){
    $sql = "insert into customer (mid, name, email, phone, mobile, address) values ('$userID','$name', '$email', '$phone', '$mobile', '$address')";
    if(mysql_query($sql))
    {

        $url = "customerList.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    else{
        echo '新增失敗!';
        die('Error: ' . mysql_error());

        $url = "addCustomer.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }  
}
else{
    //echo '您無權限觀看此頁面!';
    echo "030";
    //echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}
?>

