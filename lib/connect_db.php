<?
	include ("configure.php");
	//echo "starting connect...<br>";
	// 建立資料庫連線
	$link = mysql_connect($DB_HOST . ":" . $DB_PORT, $DB_USERNAME, $DB_PASSWORD) or die("connect error");
	//echo "connect success<br>";


	// 選擇資料庫
	mysql_select_db($DB_NAME, $link) or die("select database error");
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER SET utf8");
	//echo "select database success<br>";
	//關閉資料庫連線
	//mysql_close ($link);
?>