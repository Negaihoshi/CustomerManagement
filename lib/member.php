<?
    session_start();   
?>
<?
    if($_SESSION['email'] == null){
        echo "您無權限瀏覽此頁面";
        echo "<meta http-equiv=REFRESH CONTENT=2;url=../index.php>";
    }
?>
<!doctype html>
<html lang="zh-tw" ng-app>

<head>
    <meta charset="UTF-8">

    <title>CustomerManagement</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Negaihoshi">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.png"> -->

    <link href="../css/uikit.gradient.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc3/angular.min.js"></script>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.php">客戶管理系統</a></li>
            <li><a href="customerList.php">客戶管理</a></li>
            <li class="uk-parent"><a href="addCustomer.php">新客戶</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="member.php"><?$loginName = $_SESSION['loginName'];echo "$loginName";?></a></li>
                <li><a href="memberEdit.php">修改會員資料</a></li>
                <li><a href="logout.php">登出</a></li>
            </ul>
        </div>
    </nav>


    <div id="container">
        
        <?php
        include("connect_db.php");

        //此判斷為判定觀看此頁有沒有權限
        //說不定是路人或不相關的使用者
        //因此要給予排除



echo "<table class='uk-table'><caption>會員資料</caption><thead>";
echo "<tr><th>ID</th><th>UserName</th><th>Email</th><th>Password</th><th>Admin</th><th>RegisterDate</th></tr></thead><tbody>";
        if($_SESSION['email'] != null)
        {        
                //將資料庫裡的所有會員資料顯示在畫面上
                $sql = "SELECT * FROM member";
                $result = mysql_query($sql);
                while( $row = mysql_fetch_row($result))
                {
                   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
                }
        }
        else
        {
                echo '您無權限觀看此頁面!';
             //   echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        echo "</tbody></table>";
        ?>

    </div>
    
    <footer id="footer">
        <hr>
        <p>&copy; Company 2013</p>
    </footer>

    <!-- Javascript -->
    <script scr="../js/uikit.min.js"></script>
</body>

</html>
