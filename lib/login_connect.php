<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("connect_db.php");
	$email = $_POST['email'];
	$password = $_POST['password'];
	echo "$email<br>";
	echo "$password<br>";
	$sql = "SELECT * FROM member where email = '$email'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	
	echo "$row[0] . $row[1] . $row[2] . $row[3] . $row[4]";

	//判斷帳號與密碼是否為空白
	//以及MySQL資料庫裡是否有這個會員
	if($email != null && $password != null  && $row[3] == $password && ($row[2] == $email||$row[1] == $username)){
		//將帳號寫入session，方便驗證使用者身份
		$_SESSION['email'] = $email;
		$_SESSION['loginName'] = $row[1];
		echo '登入成功!';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
	}
	else{
		echo '登入失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
	}
?>