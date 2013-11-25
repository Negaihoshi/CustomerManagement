<!doctype html>
<html lang="zh-tw" ng-app>

<head>
    <meta charset="UTF-8">

    <title>CustomerManagement</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Negaihoshi">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.png"> -->

    <link href="css/uikit.gradient.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/uikit.min.js"></script>
</head>
<body>
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="index.php">客戶管理系統</a></li>
            <li><a href="">測試1</a></li>
            <li class="uk-parent"><a href="">測試2</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <?  session_start();
                    if (empty($_SESSION['email']) == true || isset($_SESSION['email']) == false ) {
                        echo "<li><a href='lib/login.php'>登入</a></li>";
                        echo "<li><a href='lib/register.php'>註冊</a></li>";
                    }
                    else {
                        echo "<li><a href='lib/member.php'>主控台</a></li>";
                        echo "<li><a href='lib/logout.php'>登出</a></li>";
                    }
                ?>

            </ul>
        </div>
    </nav>


    <div id="content">
        <p>123</p>
    </div>
    
    <footer id="footer">
        <hr>
        <p>&copy; Company 2013</p>
    </footer>

</body>

</html>
