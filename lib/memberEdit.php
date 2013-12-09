<?
    session_start();   
?>
<?
    if($_SESSION['email'] == null){
        echo "您無權限瀏覽此頁面";
        echo "<meta http-equiv=REFRESH CONTENT=2;url=../index.php>";
    }else {
        include("connect_db.php");
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM member where email = '$email'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular.min.js"></script>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="../js/uikit.min.js"></script>
</head>
<body>
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.php">客戶管理系統</a></li>
            <li><a href="customerList.php">客戶管理</a></li>
            <li class="uk-parent"><a href="customerAdd.php">新客戶</a></li>
        </ul>

        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
                
                <li class="uk-parent" data-uk-dropdown="">
                    <a href="memberEdit.php"><?$loginName = $_SESSION['loginName'];echo "$loginName";?> <i class="uk-icon-caret-down"></i></a>

                    <div style="" class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="memberEdit.php">修改會員資料</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="logout.php">登出</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div id="container">
        <div clss="uk-grid">
        <div class="uk-width-2-5 uk-container-center">
        <form class="uk-form uk-form-horizontal" name="editForm" method="post" action="update.php">
            <fieldset>
                <legend>會員資料</legend>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="username">使用者名稱</label>
                    <input type="text" placeholder="<?echo "$row[1]";?>" class="uk-form-width-medium" id="username" name="username" required autofucus>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="email">電子信箱</label>
                    <input type="email" placeholder="<?echo "$row[2]";?>" class="uk-form-width-medium" id="email" name="email" disabled>
                </div>

            </fieldset>
            <fieldset>
                <legend>修改密碼</legend>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="currentPassword">目前的密碼</label>
                    <input type="password" placeholder="<?echo "$row[3]";?>" class="uk-form-width-medium" id="currentPassword" name="currentPassword" required>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="password">新密碼</label>
                    <input type="password" placeholder="Enter Password" class="uk-form-width-medium" id="password" name="password" required>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="repeatPassword">再次輸入新密碼</label>
                    <input type="password" placeholder="Enter Password" class="uk-form-width-medium" id="repeatPassword" name="repeatPassword" required>
                </div> 
            </fieldset>
            <button class="uk-button" type="submit">修改</button>
        </form>

        </div>
    </div>

    </div>
    <!--
    <div class="tm-footer">
        <div class="uk-container uk-container-center uk-text-center">
            <p>&copy; Company 2013</p>
        </div>
    </div>
    -->
    <!-- Javascript -->
    <script scr="../js/uikit.min.js"></script>
</body>

</html>
