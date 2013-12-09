<?php session_start(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	//將session清空
	unset($_SESSION['email']);
	unset($_SESSION['loginName']);
	unset($_SESSION['userID']);
	unset($_SESSION['cid']);
	unset($_SESSION['admin']);

	$url = "../index.php";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
?>