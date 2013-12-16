<?
    session_start();
?>
<?
    if(isset($_SESSION['email'])== false){
            setcookie("userCheck", "false", time()+60);
            $url = "login.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
    }
?>
<!doctype html>
<html lang="zh-tw" ng-app="CustomerList">

<head>
    <meta charset="UTF-8">

    <title>CustomerManagement</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Negaihoshi">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.png"> -->

    <link href="../css/uikit.gradient.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
    <script src="../js/customerList.js"></script>
    <script src="../js/uikit.min.js"></script>
</head>
<body ng-controller="SearchCtrl">
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
                            <li><a href="#">Another item</a></li>
                            <li class="uk-nav-header">Header</li>
                            <li><a href="#">Item</a></li>
                            <li><a href="#">Another item</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="logout.php">登出</a></li>
                        </ul>
                    </div>
                </li>
        </div>
    </nav>

    <div id="container">
        <?
            include("connect_db.php");
            $cid = $_GET['cid'];
            $mid = $_SESSION['userID'];
            $_SESSION['cid'] = $cid;
            $sql = "SELECT * FROM customer where cid = '$cid' and mid = '$mid'";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
        ?>

        <form class="uk-form" name="editForm" method="post" action="customerModify.php">
            <fieldset>
                <legend>客戶資料</legend>
                <div id="customerInput">
                    <label class="uk-form-label" for="customerName">客戶名稱</label>
                    <input type="text"  class="uk-form-width-small" placeholder="<?echo "$row[2]";?>" id="customerName" name="customerName" required autofucus>

                    <label class="uk-form-label" for="email">電子信箱</label>
                    <input type="email"  class="uk-form-width-medium" placeholder="<?echo "$row[3]";?>" id="email" name="email">

                    <label class="uk-form-label" for="phone">聯絡電話</label>
                    <input type="number"  class="uk-form-width-small" placeholder="<?echo "$row[4]";?>" id="phone" name="phone">

                    <label class="uk-form-label" for="mobile">行動電話</label>
                    <input type="number"  class="uk-form-width-small" placeholder="<?echo "$row[5]";?>" id="mobile" name="mobile">

                    <label class="uk-form-label" for="address">地址</label>
                    <input type="text"  class="uk-form-width-medium" placeholder="<?echo "$row[6]";?>" id="address" name="address">

                </div>
            </fieldset>
            <button class="uk-button" type="submit">修改</button>
            <button class="uk-button" type="reset">重置</button>
            <a class="uk-button uk-button-danger" href="customerDelete.php">刪除</a>
        </form>
    </div>

    <footer id="footer">
        <hr>
        <p>&copy; Company 2013</p>
    </footer>

    <!-- Javascript -->
    <script scr="../js/uikit.min.js"></script>
</body>

</html>
