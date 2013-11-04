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

    <title>SurveySystem</title>
    <link rel="stylesheet" href="">

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
            <li class="uk-active"><a href="../index.html">問卷系統</a></li>
            <li><a href="oldSurveyList.php">舊問卷</a></li>
            <li class="uk-parent"><a href="newSurveyList.php">新問卷</a></li>
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




        if($_SESSION['email'] != null)
        {
                echo '<a href="register.php">新增</a>    ';
                echo '<a href="update.php">修改</a>    ';
                echo '<a href="delete.php">刪除</a>  <br><br>';
            
                //將資料庫裡的所有會員資料顯示在畫面上
                $sql = "SELECT * FROM member";
                $result = mysql_query($sql);
                while( $row = mysql_fetch_row($result))
                {
                    echo "ID：$row[0]<br> 使用者名稱：$row[1]<br>" . 
                    "密碼：$row[3] <br> 註冊時間：$row[4] <br>";
                }
        }
        else
        {
                echo '您無權限觀看此頁面!';
             //   echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }

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
